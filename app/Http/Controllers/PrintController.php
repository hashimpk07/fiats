<?php namespace App\Http\Controllers;

use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PrintController extends Controller {

	/**
	 * @param $action
	 *
	 * @return mixed
	 */
	public function printList( $action ) {

		$tablehtml = \App::call( 'App\Http\Controllers' . '\\' . $action . 'Controller@listtable', [true] ) ;

		$caption = preg_replace( "([A-Z])", " $0", $action );

		return View::make( 'listprint.page', compact( 'tablehtml', 'caption') );
	}
	/**
	 * @param $action
	 *
	 * @return mixed
	 */
	public function printAction( $controller, $action , $arguments = 0 ) {

		$tablehtml = \App::call( 'App\Http\Controllers' . '\\' . $controller . 'Controller@' . $action, [$arguments] ) ;

		$caption = preg_replace( "([A-Z])", " $0", $controller );

		return View::make( 'listprint.page', compact( 'tablehtml', 'caption') );
	}
}