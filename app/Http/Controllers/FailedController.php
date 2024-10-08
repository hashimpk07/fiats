<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

class FailedController extends Controller {

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
	public function index()
	{
		$args['ref_no'] = Input::get('ref_no') ;
		return view('messages.failed', $args);
	}

}