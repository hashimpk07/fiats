<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Qudratom\Utilities\DateTime;
use Qudratom\Utilities\Objectize;

/**
 * Class DummyClass
 */
class Persons extends Model {

	public $timestamps = false;

	protected $fillable = [];

	protected $guarded = [ ];

	public static function filter( $query ) {
		$keyword = Input::get( "search" );
		if ( $keyword ) {
			$query->where( 'm.reg_no', 'LIKE', "%$keyword%" );
			$query->orwhere( 'm.name', 'LIKE', "%$keyword%" );
			$query->orwhere( 'm.email', 'LIKE', "%$keyword%" );
			$query->orwhere( 'm.mobile', 'LIKE', "%$keyword%" );
			$date = DateTime::mysqlDate( $keyword );
			if ( $date ) {
				$query->orwhere( 'm.dt', 'LIKE', "$date%" );
			}
		}
	}

	public static function detail( $id ) {
		return DB::table( DB::raw( 'members AS m' ) )
			->select( DB::raw( ' m.*, l.name AS language ' ) )
			->leftJoin( 'languages AS l', 'l.id', '=', 'm.language_id' )
			->where( 'm.id', '=', $id )
			->first();
	}
	public static function listquery() {
		return DB::table( DB::raw( 'members AS m' ) )
			->select( DB::raw( ' m.*, l.name AS language ' ) )
			->leftJoin( 'languages AS l', 'l.id', '=', 'm.language_id' )
			->where( function ( $query ) {
				self::filter( $query );
			} )
			->groupBy( 'm.id' )
			->orderBy( self::sortBy( 'm.id' ), self::sortOrder( 'DESC' ) ) ;
	}
}