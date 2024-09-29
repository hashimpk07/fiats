<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Qudratom\Response\Response;
use Qudratom\Response\ResponseBuilder;
use Qudratom\Utilities\ErrorFormat;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
//		$this->middleware('auth');
	}
	public function validateForm() {
		//error fields
		$errfields = array(
			'name'         => 'eName',
			'email'  => 'eEmail',
			'mobile'  => 'eMobile',
			'message'      => 'eMessage'
		);
		//lable display attributes
		$attributes = array(
			'name'   => 'Name',
			'email'  => 'Email',
			'mobile' => 'Mobile',
			'message'=> 'Message',
		);
		//validation data
		$data = [
			'name'         => Input::get('name'),
			'email'  => Input::get('email'),
			'mobile'  => Input::get('mobile'),
			'message'      => Input::get('message'),
		];
		//validation rules
		$rules = [
			'name'         => [ 'required' ],
			'email'  => [ 'required' ],
			'mobile'  => [ 'numeric' ]
		];

		$validator = Validator::make( $data, $rules );
		$validator->setAttributeNames( $attributes );

		if ( $validator->fails() ) {
			$errors = $validator->messages();

			return ErrorFormat::format( $errors, $errfields );
		}
		return null ;
	}
	public function send() {
		//if any error return
		$errors = $this->validateForm() ;
		if ( $errors != null ) {
			if ( count( $errors ) > 0 ) {
				return Response::send( Response::bulider()->setStatus( ResponseBuilder::$FAIL )->addErrors( $errors )->setMessage( 'Please fix errors' )->build() );
			}
		}

		$name = Input::get('name');
		$email = Input::get('email');
		$mobile = Input::get('mobile');
		$message = Input::get('message');

		$data = [
			'name' => $name,
			'email' => $email,
			'mobile' => $mobile,
			'message' => $message,
		];

		Mail::send('emails.contactus', $data, function ($message) {
			$message->from('nithin@alpha.qudratom.com') ;
			$message->sender('nithin@alpha.qudratom.com') ;
			$message->to('fiatscriptura@gmail.com') ;
		});

		return Response::send( Response::bulider()->addScript(" setTimeout( function() { window.location.href='" . url('/') . "'; }, 2000 ) ")->setStatus( ResponseBuilder::$OK )->setMessage( 'Success' )->build() );
	}

	/**
	 * Show the application dashboard to the member.
	 *
	 * @return Response
	 */
	public function index()
	{
		if( Input::get('btnSend') ) {
//			$this->sendMail() ;
		}
		return view('home.page');
	}

}
