<?php
/**
 * Created by PhpStorm.
 * User: nithin
 * Date: 5/25/2015
 * Time: 4:01 PM
 */

namespace Qudratom\Response;

class Response
{

    static function status($status, $msg, $array = null)
    {
        $obj = new ResponseBuilder() ;
        $data = $obj->setStatus($status)->setMessage($msg)->addData($array)->build() ;

        //output it..
        if( self::$TYPE == 'JSON' ) {
            return self::response($data);
        }
    }
    static function bulider()
    {
        return new ResponseBuilder();
    }
    static function failed($msg)
    {
        $obj = new ResponseBuilder();
        $obj->setStatus( ResponseBuilder::$FAIL )->setMessage( $msg )->build() ;
        return self::send( $obj->build() ) ;
    }
    static function success($msg)
    {
        $obj = new ResponseBuilder();
        $obj->setStatus( ResponseBuilder::$OK )->setMessage( $msg )->build() ;
        return send( $obj->build() ) ;
    }
    static function send($array)
    {
        return \Illuminate\Support\Facades\Response::json($array);
    }
    static function csv($list, $filename )
    {
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
            ,   'Content-type'        => 'text/csv'
            ,   'Content-Disposition' => "attachment; filename=$filename"
            ,   'Expires'             => '0'
            ,   'Pragma'              => 'public'
        ];

        # add headers for each column in the CSV download
        array_unshift($list, array_keys($list[0]));

        $callback = function() use ($list)
        {
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) {
                fputcsv($FH, $row);
            }
            fclose($FH);
        };
        return \Illuminate\Support\Facades\Response::stream($callback, 200, $headers);
    }
};