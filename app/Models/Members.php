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
class Members extends Model {

	public $timestamps = false;

	protected $fillable = [];

	protected $guarded = [ ];

	public static function filter( $query ) {
		$keyword = Input::get( "search" );
		$selSalution = Input::get( "selSalution" );
		$selGender = Input::get( "selGender" );
		$selMaritalStatus = Input::get( "selMaritalStatus" );
		$selLanguage = Input::get( "selLanguage" );
		$selTestament = Input::get( "selTestament" );
		$selStatus = Input::get( "selStatus" );

		if ( $keyword ) {

			$query->where( function($query) {
				$keyword = Input::get( "search" );
				$query->where( 'm.reg_no', 'LIKE', "%$keyword%" );
				$query->orwhere( 'm.name', 'LIKE', "%$keyword%" );
				$query->orwhere( 'm.email', 'LIKE', "%$keyword%" );
				$query->orwhere( 'm.mobile', 'LIKE', "%$keyword%" );
				$query->orwhere( 'm.religion', 'LIKE', "%$keyword%" );
				$query->orwhere( 'm.caste', 'LIKE', "%$keyword%" );
				$query->orwhere( 'm.occupation', 'LIKE', "%$keyword%" );
				$query->orwhere( 'm.parish', 'LIKE', "%$keyword%" );
				$query->orwhere( 'm.diocese', 'LIKE', "%$keyword%" );
				$query->orwhere( 'l.name', 'LIKE', "%$keyword%" );

				$date = DateTime::mysqlDate( $keyword );
				if ( $date ) {
					$query->orwhere( 'm.dob', 'LIKE', "$date%" );
					$query->orwhere( 'm.ack_dt', 'LIKE', "$date%" );
					$query->orwhere( 'm.dt', 'LIKE', "$date%" );
				}

			}) ;
		}
		if ( $selSalution) {
			$query->where( function($q) {
				$selSalution = Input::get( "selSalution" );
				$q->where('m.salutation_id', $selSalution) ;
			} );
		}
		if ( $selGender) {
			$query->where( function($q) {
				$selGender = Input::get( "selGender" );

				$q->where('m.gender', $selGender) ;
			} );
		}
		if ( $selMaritalStatus) {
			$query->where( function($q) {
				$selMaritalStatus = Input::get( "selMaritalStatus" );
				$q->where('m.marital_status', $selMaritalStatus) ;
			} );
		}
		if ( $selLanguage) {

			$query->where( function($q) {
				$selLanguage = Input::get( "selLanguage" );
                if($selLanguage>=5){
                    $q->where('l.flag', '==' ,1) ;
                }
                else{
                    $q->where('m.language_id', $selLanguage) ;
                }
			} );
		}
		if ( $selTestament) {
			$query->where( function($q) {
				$selTestament = Input::get( "selTestament" );

				$q->where('m.testament', $selTestament) ;
			} );
		}
		if ( $selStatus) {
			$query->where( function($q) {
				$selStatus = Input::get( "selStatus" );
					$q->where('m.status', $selStatus) ;
			} );
		}
	}
	public static function detail( $id ) {
		return DB::table( DB::raw( 'members AS m' ) )
			->select( DB::raw( ' p.date as payment_date, m.*,m.ack_dt as ack_dt, l.name AS language ' ) )
			->leftJoin( 'languages AS l', 'l.id', '=', 'm.language_id' )
			->leftJoin( 'payments AS p', 'p.creator_ref', '=', 'm.creator_ref' )
			->where( 'm.id', '=', $id )
			->first();
	}
	public static function listquery($creator = null) {

		$selAgeGroup = Input::get( "selAgeGroup" );

		$builder = DB::table( DB::raw( 'members AS m' ) )
		             ->select( DB::raw( "
		             FLOOR(
		             	FLOOR(
						(
							if( m.testament = 'N',
				   				TIMESTAMPDIFF(YEAR, m.dob, (SELECT value FROM parameters WHERE name='N_DATE')),
				   				TIMESTAMPDIFF(YEAR, m.dob, (SELECT value FROM parameters WHERE name='T_DATE'))
				  		) -1) / 10) + 1 ) AS agegroup, m.*,m.ack_dt as ack_dt,l.name AS language,l.flag as flag,m.salutation_id as salution" )

					 )->leftJoin( 'languages AS l', 'l.id', '=', 'm.language_id' )
		             ->where( function ( $query ) {
			             self::filter( $query );
		             });
		if( $creator ) {
			$builder->where('m.creator_ref', '=', $creator) ;
			$builder->where('m.payment_id', '<', 1) ;
		}
		if ( $selAgeGroup ) {
			if( $selAgeGroup == 1 ) {
				$builder->havingRaw(" agegroup='0' OR agegroup='1' ");
			}
			else {
				$builder->havingRaw(" agegroup='$selAgeGroup' ");
			}
		}
		$builder->groupBy( 'm.id' )
		        ->orderBy( self::sortBy( 'm.id' ), self::sortOrder( 'DESC' ) );

		return $builder;
	}

}