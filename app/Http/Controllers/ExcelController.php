<?php namespace App\Http\Controllers;

use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ExcelController extends Controller {

	/**
	 * @param $action
	 *
	 * @return mixed
	 */
	public function printList( $action ) {

		return \App::call( 'App\Http\Controllers' . '\\' . $action . 'Controller@listcsv' ) ;
	}
	public function printWord( $action ) {

	}
}