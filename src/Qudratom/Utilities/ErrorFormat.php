<?php

namespace Qudratom\Utilities;


use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class ErrorFormat
{
    public static function format($inObject, $map)
    {
        if( is_object($inObject) ) {
            $inArray = $inObject->toArray() ;
        }
        else if( is_array($inObject) ) {
            $inArray = $inObject ;
        }
        $outArray = array() ;
        foreach( $inArray as $k => $v )
        {
            if( is_array($v) ) {
                $outArray[$map[$k]] = implode(" ", $v) ;
            }
            else {
                $outArray[$map[$k]] = $v ;
            }
        }
        return $outArray ;
    }
    public static function messages(){
        $messages = [
            'required' => 'This field is required.',
        ];
    }
}
?>