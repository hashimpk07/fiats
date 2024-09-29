<?php

	/*
	 * To change this license header, choose License Headers in Project Properties.
	 * To change this template file, choose Tools | Templates
	 * and open the template in the editor.
	 */

	namespace App\Http\Controllers;

	use App\Models\Virtual\Profile;
	use App\Models\People;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Facades\Input;
	use Illuminate\Support\Facades\Validator;
	use Qudratom\Response\JsonResponse;
	use Qudratom\Response\Response;

	use Illuminate\Support\Facades\View;
	use Qudratom\Response\ResponseBuilder;
	use Qudratom\Utilities\ErrorFormat;

	class ProfileController extends Controller {
		/**
		 * Show the profile for the given member.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function index()
		{
			return $this->listtable() ;
		}
		public function listtable()
		{
			$data = "" ;
			$a = Auth::user();
			if ($a) {

				$id = Auth::user()->id;
				$data = $this->edit($id);
			}

			return View::make('profile.page', [
				'formhtml'=> urldecode($data),
				'url' => action('ProfileController@edit'),
			] ) ;
		}
		public function doValidate($mode, $id)
		{
			$old = Input::get('txtOldPassword') ;
			$pass1 = Input::get('txtNewPasssword') ;
			$pass2 = Input::get('txtConfirmPassword') ;

			//error fields
			$errfields = array(
				'txtOldPassword' => 'eOldPassword',
				'txtNewPassword' => 'eNewPassword',
				'txtConfirmPassword' => 'eConfirmPassword',
			) ;
			//lable display attributes
			$attributes = array(
				'txtOldPassword' => 'Old Password',
				'txtNewPassword' => 'New Password',
				'txtConfirmPassword' => 'Confirm Password',
			) ;
			//validation data
			$data = [
				'txtOldPassword' => Input::get('txtOldPassword'),
				'txtNewPassword' => Input::get('txtNewPassword'),
				'txtConfirmPassword' => Input::get('txtConfirmPassword'),
			];
			//validation rules
			$rules = [
				'txtOldPassword' => ['required', 'password_check:people,password,id=' . $id],
				'txtNewPassword' => ['required'],
				'txtConfirmPassword' => ['required']
			] ;

			$validator = Validator::make( $data, $rules );
			$validator->setAttributeNames($attributes) ;

			if ($validator->fails())
			{
				$errors = $validator->messages() ;
				return ErrorFormat::format($errors, $errfields) ;
			}
			return null ;
		}
		public function onEdit($id)
		{
			$old = Input::get('txtOldPassword');
			$pass1 = Input::get('txtNewPassword');

			//if any error return
			$errors = $this->doValidate(EDIT, $id);

			if ($errors != null) {
				if (count($errors) > 0) {

					return Response::send(Response::bulider()->setStatus(ResponseBuilder::$FAIL)->addErrors($errors)->setMessage('Please fix errors')->build()) ;
				}
			}

			$p = People::find($id) ;
			$p->password = Hash::make($pass1) ;
			if( $p->save() )
			{
				return Response::send(Response::bulider()->setStatus(ResponseBuilder::$OK)->setMessage('Success')->build()) ;
			}
			return Response::send(Response::bulider()->setStatus(ResponseBuilder::$FAIL)->setMessage('Failed')->build()) ;
		}
		public function edit($id)
		{
			$ca = People::find($id) ;
			
			$vars = array(
				'url' => action('ProfileController@onEdit', [$id] ),
				'record' => $ca,
				'CGM_MODE' => EDIT,
			) ;
			return urlencode(View::make('profile.add', $vars)->render()) ;
		}
		public function view($id)
		{
			$ca = People::find($id) ;

			$vars = array(
				'CGM_MODE' => VIEW,
				'record' => $ca,
				'url' => action('ProfileController@onEdit'),
			) ;
			return urlencode(View::make('profile.add', $vars)->render()) ;
		}
	}