<?php
/**
 * Created by PhpStorm.
 * User: Hashim PK
 * Date: 12/9/2017
 * Time: 1:40 PM
 */

namespace Qudratom\Utilities;

use Illuminate\Support\Facades\DB;

class DateTime {

    public static function dbNow()
    {
        return DB::raw('NOW()') ;
    }
    public static function dbDate()
    {
        return DB::raw('CURDATE()') ;
    }
    public static function dbTime()
    {
        return DB::raw('TIME()') ;
    }
    public static function clientDate($dt = null, $format = 'd-m-Y')
    {
        return self::clientDateTime($dt, $format);
    }
    public static function clientTime($dt = null, $format = 'h:i a')
    {
        return self::clientDateTime($dt, $format);
    }

    public static function clientDateTime($dt = null, $format = 'd-m-Y h:i a')
    {
        if( $dt === null)
        {
            return '' ;
        }
        if ($dt)
        {
            $t = strtotime($dt);

            if ($t && $t != -19800 && $dt != '0000-00-00' && $dt != '0000-00-00 00:00:00')
            {
                return Date($format, $t);
            }
        }
        return '';
    }
    public static function mysqlDate($dt = null)
    {
        return self::mysqlDateTime($dt, 'Y-m-d') ;
    }
    public static function mysqlDateTime($dt = null, $format = 'Y-m-d H:i:s')
    {
        if( $dt === null)
        {
            return '' ;
        }

        if ($dt)
        {
            $ret = Date($format, strtotime($dt));

            if ( $ret != '1970-01-01 00:00:00' && $ret != '1970-01-01' )
            {
                return $ret ;
            }
        }
        return '';
    }

}
