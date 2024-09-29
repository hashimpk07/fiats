<?php namespace App\Http\Controllers;

use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class WordController extends Controller {

	/**
	 * @param $action
	 *
	 * @return mixed
	 */
	public function printWord( $action ) {

		return \App::call( 'App\Http\Controllers' . '\\' . $action . 'Controller@listword' ) ;
	}
}