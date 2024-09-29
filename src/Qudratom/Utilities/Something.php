<?php
namespace Qudratom\Utilities;


class Something
{
    public static function AorB( $suggestionOne, $suggestionTwo )
    {
        if( $suggestionOne ) {
            return $suggestionOne ;
        }
        return $suggestionTwo ;
    }
    public static function valueByMode( $addVal, $editVal, $viewVal /* = null */ , $mode )
    {
        if( $mode == ADD ) {
            return $addVal ;
        }
        if( $mode == EDIT ) {
            return $editVal ;
        }
        if( $mode == VIEW ) {
            if( $viewVal === null ) {
                return $editVal ;
            }
            return $viewVal ;
        }
        return null ;
    }
}