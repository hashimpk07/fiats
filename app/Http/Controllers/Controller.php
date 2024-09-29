<?php namespace App\Http\Controllers;

use App\Models\People;
use App\Models\PermissionDetail;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Qudratom\Utilities\Helper;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	public static $set;

	public $vstable = '' ;
	/**
	 * Controller constructor.
	 */
	public function __construct() {
		$this->middleware( 'auth' );
//		$this->Permissions();

		$this->vstable = Helper::getClassPrefix($this) ;
	}

	/**
	 * Get the Current Users Permissions
	 */
	public static function Permissions() {

		if ( Auth::check() ) {
			$emp_id        = Auth::user()->id;
			$people        = People::find( $emp_id );
			$permission_id = $people->permission_id;

			$permission_details = PermissionDetail::leftJoin( 'page_actions as pa', 'permission_details.page_action_id', '=', 'pa.id' )
			                                      ->leftJoin( 'pages as p', 'pa.page_id', '=', 'p.id' )
			                                      ->leftJoin( 'actions as a', 'pa.action_id', '=', 'a.id' )
			                                      ->where( 'permission_details.permission_id', $permission_id )
			                                      ->select( '*', 'p.name as page', 'a.name as action' )
			                                      ->get();

			foreach ( $permission_details as $permission_detail ) {
				$page                          = strtolower( $permission_detail->page );
				$action                        = strtolower( $permission_detail->action );
				self::$set[ $page ][ $action ] = 1;
			}
		}
	}

	/**
	 * Check Permission for Action
	 *
	 * @param $page
	 * @param $action
	 *
	 * @return bool
	 */
	public static function ActionAllowed( $page, $action ) {
		if ( isset( self::$set[ $page ][ $action ] ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Check Permission For Pages
	 *
	 * @param $page
	 *
	 * @return bool
	 */
	public static function PageAllowed( $page ) {
		if ( isset( self::$set[ $page ] ) ) {
			return true;
		}

		return false;
	}
}