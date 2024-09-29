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
class Languages extends Model {

	public $timestamps = false;

	protected $fillable = [];

	protected $guarded = [ ];

	public static function languageCode( $langId ) {
		$lang = Languages::find($langId) ;
		if( $lang->flag ) {
			$l = $lang->name ;
			$lprefix = substr($l, 0, 3) ;
			return strtoupper($lprefix) ;
		}
		else {
			return 'OTH' ;
		}
	}
}