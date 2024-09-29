<?php namespace App\Http\Controllers;

use App\Models\Otps;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Qudratom\Response\Response;
use Qudratom\Response\ResponseBuilder;
use Qudratom\Utilities\ErrorFormat;

class OtpController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
//		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the member.
	 *
	 * @return Response
	 */
	public function index() {


		if( \Illuminate\Support\Facades\Auth::check() ) {
			return  redirect('person') ;
			return ;
		}

            $this->index = true;
            return $this->page();

	}
	public function page() {

		return View::make( 'otp.page', [
			'url'             => action( 'OtpController@onAdd' ),
		] );
	}

	public function doValidate( $mode ) {
		//error fields
		$errfields = array(
			'txtMobile'        => 'eMobile',
		);
		if( $mode == 'VERIFY' ) {
			$errfields['txtOtp'] = 'eOtp' ;
		}
		//lable display attributes
		$attributes = array(
			'txtMobile'        => 'Mobile',
		);
		if( $mode == 'VERIFY' ) {
			$attributes['txtOtp'] = 'OTP' ;
		}
		//validation data
		$data = [
			'txtMobile'        => Input::get( 'txtMobile' ),
		];
		if( $mode == 'VERIFY' ) {
			$data['txtOtp'] = Input::get('txtMobile') ;
		}
		//validation rules
		$rules    = [
			'txtMobile'        => [ 'required','numeric', 'regex:/[0-9]{10}/' ],
		];
		if( $mode == 'VERIFY' ) {
			$data['txtOtp'] = ['required', 'max:6|min:6'] ;
		}

		$validator = Validator::make( $data, $rules );
		$validator->setAttributeNames( $attributes );

		if ( $validator->fails() ) {
			$errors = $validator->messages();

			return ErrorFormat::format( $errors, $errfields );
		}

		return null;
	}
	public static function sendOtp( $to, $otp )
	{
		$vars = [
			'otp' => $otp,
		];

		\Qudratom\Utilities\Helper::sendSms($to, 'OTP', $vars) ;
	}
	public function onSendOtp()
	{
		$mobile = Input::get('txtMobile');

		//if any error return
		$errors = $this->doValidate(ADD);

		if ($errors != null) {
			if (count($errors) > 0) {
				return Response::send(Response::bulider()->setStatus(ResponseBuilder::$FAIL)->addErrors($errors)->setMessage('Please fix errors')->build()) ;
			}
		}

		$otp = rand(100000,999999) ;

		$o = new Otps();
		$o->mobile = $mobile ;
		$o->otp = $otp ;
		if( $o->save() )
		{
			self::sendOtp($mobile, $otp) ;

			return Response::send(Response::bulider()->setStatus(ResponseBuilder::$OK)
				->addData(['show_otp' => true /*, 'TODO_WARNING' => $otp*/ ])
				->setMessage('Sent successfully ')->build()) ;
		}
		return Response::send(Response::bulider()->setStatus(ResponseBuilder::$FAIL)->setMessage('Operation failed, Please try again later.')->build()) ;
	}
	public function onVerifyOtp()
	{
		$mobile = Input::get('txtMobile') ;
		$otp = Input::get('txtOtp') ;

		//if any error return
		$errors = $this->doValidate('VERIFY') ;

		if ($errors != null) {
			if (count($errors) > 0) {
				return Response::send(Response::bulider()->setStatus(ResponseBuilder::$FAIL)->addErrors($errors)->setMessage('Please fix errors')->build()) ;
			}
		}

		if( Otps::where('mobile', '=', $mobile)->where('otp', '=', $otp)->exists() )
		{
			Session::set('creator', $mobile) ;

			return Response::send(Response::bulider()->setStatus(ResponseBuilder::$OK)
				->addScript("window.location.href='" . url('person') . "?mobile=" . $mobile . "';")
				->setMessage('Success')->build()) ;
		}
		return Response::send(Response::bulider()->setStatus(ResponseBuilder::$FAIL)->setMessage('Verification Failed')->build()) ;
	}
	public function onAdd()
	{
		if( Input::get('btnGetOtp') ) {
			return self::onSendOtp() ;
		}
		else if( Input::get('btnVerify') ) {
			return self::onVerifyOtp() ;
		}
	}
}
