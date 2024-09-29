<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

class SuccessController extends Controller {

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
//		$this->middleware('guest');
	}

	/**
	 * Show the application dashboard to the member.
	 *
	 * @return Response
	 */
	public function index()
	{
		$args['ref_no'] = Input::get('ref_no') ;
		return view('messages.success', $args);
	}
}