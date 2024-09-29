<?php
/**
 * Created by PhpStorm.
 * User: nithin
 * Date: 5/25/2015
 * Time: 4:01 PM
 */

namespace Qudratom\Response;

class ResponseBuilder {

    protected $__status = '' ;
    protected $__message = '' ;
    protected $__script = '' ;
    protected $__data = array() ;

    public static $OK = 'OK' ;
    public static $FAIL = 'FAIL' ;
    public static $SILENT = 'SILENT' ;
    public static $TYPE = 'JSON' ;

    /**
     * @param $status boolean true or false
     */
    function setStatus($status)
    {
        $this->__status = $status ;
        return $this ;
    }
    function setMessage($msg)
    {
        $this->__message = $msg ;
        return $this ;
    }
    function addScript($code)
    {
        $this->__script .= $code ;
        return $this ;
    }
    function redirect($url)
    {
        $redirect = "window.location.href='$url'; " ;
        $this->__script .= $redirect ;
        return $this ;
    }
    function addData($data)
    {
        if( ! is_array($data) )
        {
            $data = array() ;
        }
        $this->__data = array_merge($this->__data, $data) ;
        return $this ;
    }
    function enable($fields){
        return $this->state($fields, 'enable') ;
    }
    function disable($fields){
        return $this->state($fields, 'disable') ;
    }
    function show($fields){
        return $this->state($fields, 'show') ;
    }
    function hide($fields){
        return $this->state($fields, 'hide') ;
    }
    private function state($fields, $state) {
        $str = '' ;
        foreach( $fields as $one ) {
            switch( $state ) {
                case 'show' :
                    $str .= "jQuery($one).show() ;" ;
                break ;
                case 'hide' :
                    $str .= "jQuery($one).hide() ;";
                break ;
                case 'enable' :
                    $str .= "jQuery($one).removeAttr('disabled') ;";
                break ;
                case 'disable' :
                    $str .= "jQuery($one).attr('disabled', 'disabled') ;";
                break ;
            }
        }

        if( strlen($str) > 0 ) {
            return $this->addScript($str);
        }
        return $this ;
    }
    function addErrors($data)
    {
        if( ! is_array($data) )
        {
            $data = array() ;
        }
        $this->__data['.cgm-error'] = "" ;
        $this->__data = array_merge($this->__data, $data) ;

        //fill js
        $this->addScript(" $('html, body').stop().animate({ scrollTop: jQuery('.cgm-error:not(:empty)').eq(0).offset().top - 30 });") ;
        return $this ;
    }
    function build()
    {
        if (!is_array($this->__data)) {
            $this->__data = array();
        }

        $array = array();
        $array = array_merge($array, $this->__data);

        if ($this->__status == self::$OK) {
            $array['__status'] = self::$OK;
        } else {
            $array['__status'] = self::$FAIL;
        }
        if ($this->__message) {
            if( $array['__status'] == self::$OK ) {
                $array['idSuccessMsg'] = $this->__message;
            }
            else {
                $array['idFailureMsg'] = $this->__message;
            }
        }
        if( $this->__script ) {
            $array['__script'] = $this->__script;
        }

        return $array ;
    }
}