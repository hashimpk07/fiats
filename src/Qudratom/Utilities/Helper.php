<?php
/**
 * Created by PhpStorm.
 * User: nithin
 * Date: 12/9/2015
 * Time: 1:40 PM
 */

namespace Qudratom\Utilities;

use App\Models\Currency;
use App\Models\Parameters;
use App\Models\Templates;
use App\Models\Viewstate;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class Helper {

    public static function ageAsOf( $dob , $date_as_of = null ) {
      //  $dob = str_ireplace("-", "/", $dob) ;

        $birthDate = explode("/", $dob);

       /* $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
            ? ((date("Y", strtotime($date_as_of)) - $birthDate[2]) - 1)
            : (date("Y", strtotime($date_as_of)) - $birthDate[2]));
        return $age ; */

        $dob=explode("-",$dob);
        $curMonth = date("m");
        $curDay = date("j");
        $curYear = date("Y");
        $age = $curYear - $dob[0];
        if($curMonth<$dob[1] || ($curMonth==$dob[1] && $curDay<$dob[2]))
            $age--;
        return $age;
    }
    public static function arrayToInQuery( $array ) {
        $str = "" ;
        if( @ count($array) < 1 )
        {
            return 'NULL' ;
        }
        foreach( $array AS $one ) {
            if( $str ) {
                $str .= "," ;
            }
            $str .= "'$one'" ;
        }
        return $str ;
    }
    /**
     * Get current action details
     *
     * @param $typical
     * @return mixed
     */
    public static function actionDetail($typical)
    {
        $action = app('request')->route()->getAction() ;
        $cname = basename($action['controller']) ;
        list($controller, $function) = explode('@', $cname) ;

        $set = ['controller' => $controller, 'method' => $function ] ;
        if( isset($set[$typical]) )
        {
            return $set[$typical] ;
        }
    }

    public static function onePassAdjacencyTree($array, $colMap = null )
    {
        $ITEM_ID	= 'item_id' ;
        $PARENT_ID	= 'parent_id' ;
        $NAME		= 'name' ;
        $CHILDREN	= 'children' ;

        if( is_array($colMap) )
        {
            if( isset($colMap['item_id']) )
            {
                $ITEM_ID = $colMap['item_id'] ;
            }
            if( isset($colMap['parent_id']) )
            {
                $PARENT_ID = $colMap['parent_id'] ;
            }
            if( isset($colMap['name']) )
            {
                $NAME = $colMap['name'] ;
            }
            if( isset($colMap['children']) )
            {
                $CHILDREN = $colMap['children'] ;
            }
        }
        $refs = array();
        $list = array();

        foreach( $array as $data )
        {
            $thisref = &$refs[ $data->$ITEM_ID ];

            $thisref[$PARENT_ID] =  $data->$PARENT_ID;
            $thisref[$NAME] = $data->$NAME;

            if ($data->$PARENT_ID == 0) {
                $list[ $data->$ITEM_ID] = &$thisref;
            } else {
                $refs[ $data->$PARENT_ID ]['children'][ $data->$ITEM_ID ] = &$thisref;
            }
        }

        return $list ;
    }
    public static function vsColumns($table)
    {
        $data = Viewstate::where('name', $table)->pluck('data') ;

        $indata = Input::get('vs_columns') ;

        if( is_array($indata) )
        {
            return $indata ;
        }
        else {
            if ($data != null) {
                return json_decode($data);
            }
            return [] ;
        }
    }

    public static function convert_number_to_words($number, $code)
    {
        $det = Currency::find($code);
        $coin = $det->coin;
        $note = $det->note;
        $coinPrint = '';

        $negative = 'negative ';
        $decimal = ' '.$note.' ';


        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int)$number < 0) || (int)$number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . Helper::word(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }
        $string = Helper::word(abs($number));
        $string .= $decimal;
        if (null !== $fraction && is_numeric($fraction)&&$fraction>0) {
            $coinPrint =' '.$coin.' ';
            $words = "and ";
            $words .= Helper::word($fraction);
            $string = $string . $words ;
        }

        return $string.$coinPrint;
    }
    public static function word($number)
    {
        $hyphen = '-';
        $conjunction = ' and ';
        $separator = ', ';
        $dictionary = array(
            0 => 'zero',
            1 => 'one',
            2 => 'two',
            3 => 'three',
            4 => 'four',
            5 => 'five',
            6 => 'six',
            7 => 'seven',
            8 => 'eight',
            9 => 'nine',
            10 => 'ten',
            11 => 'eleven',
            12 => 'twelve',
            13 => 'thirteen',
            14 => 'fourteen',
            15 => 'fifteen',
            16 => 'sixteen',
            17 => 'seventeen',
            18 => 'eighteen',
            19 => 'nineteen',
            20 => 'twenty',
            30 => 'thirty',
            40 => 'fourty',
            50 => 'fifty',
            60 => 'sixty',
            70 => 'seventy',
            80 => 'eighty',
            90 => 'ninety',
            100 => 'hundred',
            1000 => 'thousand',
            1000000 => 'million',
            1000000000 => 'billion',
            1000000000000 => 'trillion',
            1000000000000000 => 'quadrillion',
            1000000000000000000 => 'quintillion'
        );
        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens = ((int)($number / 10)) * 10;
                $units = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . Helper::word($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int)($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = Helper::word($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= Helper::word($remainder);
                }
                break;
        }
        return $string;
    }
    public static function numberFormat( $number )
    {
        return number_format($number, 2) ;
    }
    public static function queryBalance($currency, $account)
    {
        if( !$currency ||  !$account ) {
            return 0.0 ;
        }
        $balance = DB::table('cash_accounts AS c')
            ->select( DB::raw("SUM(e.amount) AS total_amount") )

            ->leftJoin('account_entries AS e', 'e.cash_account_id', '=', 'c.id')
            ->where('c.id', '=', $account)
            ->where('e.currency_id', '=', $currency)
            ->groupBy('c.id')->pluck('total_amount') ;

        return doubleval($balance);
    }
    public static function buildCsv( $records, $columnMap, $vscolumns, $skipSls = false, &$colsSet = null)
    {
        $array_keys = array_keys($columnMap) ;
        $ret = [] ;
        $i = 0 ;

        if( is_object($records) )
        {
            $records = $records->getArray() ;
        }

        $doNotReturn = false ;
        if( count($records) < 1 )
        {
            $doNotReturn = true ;
        }
        $skipSlNo = false ;
        if( count($records) < 1)
        {
            $records = ['No record found'] ;
            $skipSlNo = true ;
        }
        $colsSetBool = false ;
        $colsSet = [] ;

        foreach( $records as $key => $value )
        {
            $i ++ ;
            $k = 0 ;

            foreach( $columnMap as $col => $attr )
            {
                if( is_array($attr) )
                {
                    if( isset($attr['column']) )
                    {
                        $col = @$attr['column'];
                    }
                }

                if( is_object($value) ) {
                    $oneValue = @$value->$col;
                }
                else {
                    $oneValue = @$value[$col];

                    if( is_null($oneValue) )
                    {
                        $oneValue = @$value[$k] ;
                    }
                }
                $k ++ ;


                $oneCol = $attr ;
                if( is_array($attr) ) {


                    $oneCol = $attr['title'] ;
                    if( is_object(@$attr['map']) )
                    {
                        $oneValue = $attr['map']->explain($oneValue) ;
                    }
                }
                //if sl no
                if( ! $skipSlNo && $col == '#' )
                {
                    $one[$oneCol] = (($skipSls) ? $oneValue : $i) ;
                }
                else {
                    $one[$oneCol] = $oneValue;
                }
                if( ! $colsSetBool  ) {
                    $colsSet[] = $oneCol;
                }
            }

            $colsSetBool = true ;

            $ret[] = $one ;
        }

        if( $doNotReturn )
        {
            return [] ;
        }

        return $ret ;
    }
    public static function getControllerPrefix() {
        $controller = self::actionDetail('controller') ;
        return self::getClassPrefix($controller) ;
    }
    public static function getClassPrefix($class)
    {
        $class_name = $class ;
        if( is_object($class) )
        {
            $class_name = get_class($class) ;
        }
        $class_name = str_ireplace("\\", '//', $class_name) ;
        $class_name = basename($class_name) ;

        return str_replace('Controller', '', $class_name) ;
    }
    public static function convertCamel($input) {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }
    public static function multyArrayInsert( $array, $int, $colsSet ) {
        $newSet = [] ;
        $x = 0 ;
        foreach( $array as $v )
        {
            $newSet[$x] = $v ;
            if( $int == $x )
            {
                $x ++ ;
                $newSet[$x] = $colsSet ;
            }
            $x ++ ;
        }
        return $newSet ;
    }

    public static function lastPart($controller, $seperator = '\\')
    {
        $parts = explode($seperator, $controller) ;

        return end($parts) ;
    }

    function SumOfUppload(){


        $CashGiftIssue =GiftIssue :: where( 'status', '=', 'C' )->where( 'attachment_file', '=', '' )->count();
        $cashExpense = Expense::where( 'status', '=', 'C' )->where( 'file', '=', '' )->count();
        $cashAdvanceReturn =CashAdvanceReturn::where( 'status', '=', 'C' )->where( 'attachment_file', '=', '' )->count();
        $cashAdvance =  CashAdvance::where( 'status', '=', 'C' )->where( 'attachment_file', '=', '' )->count();

        $TotalUploadFile=$CashGiftIssue+$cashExpense+$cashAdvanceReturn+$cashAdvance;
        return $UploadFiles = array($CashGiftIssue, $cashExpense, $cashAdvanceReturn,$cashAdvance,$TotalUploadFile);


    }
    static function headerLessCsv($list, $filename )
    {
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
            ,   'Content-type'        => 'text/csv'
            ,   'Content-Disposition' => "attachment; filename=$filename"
            ,   'Expires'             => '0'
            ,   'Pragma'              => 'public'
        ];

        # add headers for each column in the CSV download

        $callback = function() use ($list)
        {
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) {
                if( $row ) {
                    fputcsv($FH, $row);
                }
            }
            fclose($FH);
        };
        return \Illuminate\Support\Facades\Response::stream($callback, 200, $headers);
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
        if( count($list) > 0 ) {
            array_unshift($list, array_keys($list[0]));
        }

        $callback = function() use ($list)
        {
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) {
                if( $row ) {
                    fputcsv($FH, $row);
                }
            }
            fclose($FH);
        };
        return \Illuminate\Support\Facades\Response::stream($callback, 200, $headers);
    }
    public static function toNumber($str)
    {
        if( is_array($str) )
        {
            foreach( $str as $k => $v )
            {
                $str[$k] = str_replace( ",", "", $v );
            }
            return $str ;
        }
        else {
            return str_replace( ",", "", $str );
        }
    }

    public static function tellGender( $mf )
    {
        if( strtoupper($mf) == 'M' ) {
            return 'Male' ;
        }
        else if( strtoupper($mf) == 'F' ) {
            return 'Female' ;
        }
        return '' ;
    }

    public static function printPostalAddress( $rec ) {
        $addr = "" ;

        if($rec['name']){
            $addr .= $rec['name'] ;
        }

        if( $rec['address'] )
        {
            $addr .= '<br/>'.$rec['address'] ;
        }
        if( $rec['mobile'] )
        {
            $addr .= '<br/>Phone:' . $rec['mobile'] ;
        }
        if( $addr ) {
            $addr .= '<br/>' ;
        }
        return $addr ;
    }

    public static function getSmsConfig()
    {
        $all = Parameters::all( ['name', 'value'] ) ;
        $config = [] ;
        foreach( $all as $one ) {
            switch( $one->name ) {
                case 'SMS_URL' :
                    $config['SMS_URL'] = $one->value ;
                    break ;
                case 'SMS_SENDER' :
                    $config['SMS_SENDER'] = $one->value ;
                    break ;
                case 'SMS_WORKINGKEY' :
                    $config['SMS_WORKINGKEY'] = $one->value ;
                    break ;
            }
        }
        return $config ;
    }
    public static function getEmailConfig($update = true)
    {
        $all = Parameters::all( ['name', 'value'] ) ;

        $config = [] ;
        foreach( $all as $one ) {
            switch( $one->name ) {
                case 'MAIL_DRIVER' :
                    $config['MAIL_DRIVER'] = $one->value ;
                    if( $update ) {
                        Config::set('mail.driver', $one->value);
                    }
                    break ;
                case 'MAIL_HOST' :
                    $config['MAIL_HOST'] = $one->value ;
                    if( $update ) {
                        Config::set('mail.host', $one->value);
                    }
                    break ;
                case 'MAIL_USERNAME' :
                    $config['MAIL_USERNAME'] = $one->value ;
                    if( $update ) {
                        Config::set('mail.username', $one->value);
                    }
                    break ;
                case 'MAIL_PASSWORD' :
                    $config['MAIL_PASSWORD'] = $one->value ;
                    if( $update ) {
                        Config::set('mail.password', $one->value);
                    }
                    break ;
                case 'MAIL_SENDER' :
                    $config['MAIL_SENDER'] = $one->value ;
                    break ;
            }
        }
        return $config ;
    }
    /*
     * one email at a time implementation
     */
    public static function sendEmail( $template_code, $template_vars ) {

        $config = self::getEmailConfig(true) ; //update the config if not yet updated.
        $tpl = Templates::where('type', '=', 'E')->where('code', '=', $template_code )->first() ;

        if( !isset($template_vars['to']) ) {
            trigger_error('to: not specified in template_vars') ;
            return ;
        }
        $message = $tpl->message ;
        foreach( $template_vars as $k => $v )
        {
            $message = str_ireplace($k, $v, $message) ;
        }
        $data = [
            'content' => $message ,
            'subject' => $tpl->subject ,
            'template_vars' => $template_vars,
            'sender' => $config['MAIL_SENDER'],
        ];

        global $__g_email_params ;
        $__g_email_params = $data ;
        Mail::send('templates.email', $data, function ($message) {
            global $__g_email_params ;
            $message->from($__g_email_params['sender']) ;
            $message->subject($__g_email_params['subject']) ;
            $message->to($__g_email_params['template_vars']['to']) ;
        });
    }
    public static function sendSms( $to, $template_code, $template_vars )
    {
        $config = self::getSmsConfig() ;

        $sender = $config['SMS_SENDER'] ;
        $outgoingUrl = $config['SMS_URL'] ;
        $workingkey = $config['SMS_WORKINGKEY'] ;

        if( ! is_array($to) ) {
            $to = array( $to ) ;
        }

        $tpl = Templates::where('type', '=', 'S')->where('code', '=', $template_code )->first() ;
        $message = $tpl->message ;
        foreach( $template_vars as $k => $v )
        {
            $message = str_ireplace( '{' . $k . '}', $v, $message) ;
        }

        foreach ($to as $one )
        {
            $_tmpUrl = $outgoingUrl;
            $_tmpMsg = $message ;

            $tostr = $one ;

            if ( ! $tostr)
            {
                continue;
            }
            $_tmpMsg = urlencode($_tmpMsg);

            //create url
            $_tmpUrl = str_ireplace('%to', $tostr, $_tmpUrl);
            $_tmpUrl = str_ireplace('%message', $_tmpMsg, $_tmpUrl);
            $_tmpUrl = str_ireplace('%sender', $sender, $_tmpUrl);
            $_tmpUrl = str_ireplace('%workingkey', $workingkey, $_tmpUrl);

            //outgoing...
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $_tmpUrl);
            //curl_setopt($ch, CURLOPT_HEADER, TRUE);
            curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_exec($ch);
            //OR
            file_get_contents($outgoingUrl) ;
        }
    }

}