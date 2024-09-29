<?php

namespace Qudratom\Utilities;


use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class AjaxPaginator
{
    public static $method = 'listtable' ;

//object(Illuminate\Pagination\LengthAwarePaginator)[298]
//protected 'total' => int 15
//protected 'lastPage' => int 2
//protected 'items' =>
//object(Illuminate\Support\Collection)[297]
//protected 'items' =>
//
//protected 'perPage' => int 10
//protected 'currentPage' => int 2
//protected 'path' => string 'http://127.0.0.1/cgm/index.php/cash_account/' (length=44)
//protected 'query' =>
//array (size=0)
//empty
//protected 'fragment' => null
//protected 'pageName' => string 'page' (length=4)

    public static function makeQuery($excludes = [])
    {
        $input = Input::except(PAGER_QUERY_VAR) ;
        $ret = "" ;
        foreach( $input as $k => $v )
        {
            if( PAGER_QUERY_VAR == $k ) {
                continue ;
            }
            if( in_array($k, $excludes) ) {
                continue ;
            }

            if( is_array($v) ) {

                foreach( $v as $x => $y ) {
                    if( $ret )
                    {
                        $ret .= '&' ;
                    }
                    $ret .= "$x" . "[]=$y" ;
                }
            }
            else {
                if( $ret )
                {
                    $ret .= '&' ;
                }
                $ret .= "$k=$v" ;
            }
        }
        return $ret ;
    }
    public static function url($targetElement, $actionBaseUrl )
    {
        $path = URL::action($actionBaseUrl);
        $queryString = self::makeQuery() ;
        if( $queryString ){
            $queryString = "&" . $queryString ;
        }
        $html = '<ul class="pagination"><li><a href="javascript:;" onclick="getData(\'' . $path . '?' . PAGER_QUERY_VAR . '=' . '1' . $queryString . '\', {}, \'' . $targetElement .  '\')" >' . 'First' . '</a></li>' ;

    }
    public static function render($pager, $targetElement, $actionBaseUrl )
    {
        if( ! is_object($pager) ) {
            return ;
        }
        $currentPage = $pager->currentPage() ;
        $lastPage = $pager->lastPage() ;

        $before = 0 ;
        $beforePlus = 0 ;
        $after = 0 ;
        $afterPlus = 0 ;
        if( $currentPage+5 < $lastPage ) {
            $after = 5 ;
        }
        else {
            $after = $lastPage - $currentPage ;
            $beforePlus = 5 - $after ;
        }

        if( $currentPage > 5 ) {
            $before = 4 ;
        }
        else {
            $before = $currentPage ;
            $afterPlus = 5 - $currentPage ;
        }

        $start = $currentPage - ($before + $beforePlus) ;
        $end = $currentPage + ($after + $afterPlus) ;
        $start = ($start <= 0) ? 1 : $start ;
        $end = ($end >= $lastPage) ? $lastPage : $end ;

        $path = URL::action($actionBaseUrl);
        $queryString = self::makeQuery() ;
        if( $queryString ){
            $queryString = "&" . $queryString ;
        }
        $html = '<ul class="pagination"><li><a href="javascript:;" onclick="getData(\'' . $path . '?' . PAGER_QUERY_VAR . '=' . '1' . $queryString . '\', {}, \'' . $targetElement .  '\')" >' . 'First' . '</a></li>' ;

        if( $start > 1 ) {
            $html .= '<li><a href="javascript:;" >' . '...' . '</a></li>' ;
        }
        $pages = 0 ;
        for( $i = $start; $i <= $end; $i ++ )
        {
            $pages ++ ;
            $html .="<li class='" ;
            if( $currentPage == $i )
            {
                $html .= "active" ;
            }
            $html .="' " ;

            $html .='><a href="javascript:;" onclick="getData(\'' . $path . '?' . PAGER_QUERY_VAR . '=' . $i . $queryString . '\', {}, \'' . $targetElement .  '\')" >' . $i . '</a></li>' ;
        }
        if( $end < $lastPage ) {
            $html .= '<li><a href="javascript:;" >' . '...' . '</a></li>' ;
        }
        $html .= '<li><a href="javascript:;" onclick="getData(\'' . $path . '?' . PAGER_QUERY_VAR . '=' . $lastPage . $queryString . '\', {}, \'' . $targetElement .  '\')" >' . 'Last' . '</a></li>' ;
        $html .= '</ul>' ;
        $refreshPage = '<a style="display:none" class="refreshHtmlTable" href="javascript:;" onclick="getData(\'' . $path . '?' . PAGER_QUERY_VAR . '=' . $currentPage . $queryString . '\', {}, \'' . $targetElement .  '\')" >' . 'Current Page' . '</a>' ;

        if( $pages > 1 )
        {
            return $html  . $refreshPage ;
        }
        return $refreshPage ;
    }
    public static function sortable($array)
    {
        if( isset($array['controller']) ) {
            $controller = $array['controller'];
        }
        else {
            $controller = Helper::actionDetail('controller') ;
        }
        $cname = Helper::lastPart( $controller ) ;

        $column = urlencode(Crypt::encrypt($array['column'])) ;
        $title = $array['title'] ;

        $targetElement = 'id' . str_ireplace( "Controller", "", $cname)  . 'TabularWrap' ;

        $path = URL::action($cname . '@' . self::$method ) ;
        $queryString = self::makeQuery(['sort-by', 'sort-order']) ;

        if( $queryString ){
            $queryString = "&" . $queryString ;
        }
        if( $queryString ){
            $queryString .= "&" ;
        }
        $order = Input::get('sort-order') ;

        if( $order != 'desc' ) {
            $order = 'desc' ;
        }
        else {
            $order = 'asc' ;
        }
        $pageNo = Input::get(PAGER_QUERY_VAR) | 1 ;
        $queryString .= "&sort-by=" . $column . '&sort-order=' . $order ;

        return '<a href="javascript:;" onclick="getData(\'' . $path . '?' . PAGER_QUERY_VAR . '=' . $pageNo . $queryString . '\', {}, \'' . $targetElement .  '\')" >' . $title . '</a>' ;
    }
}