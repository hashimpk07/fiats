<?php
/**
 * Created by PhpStorm.
 * User: nithin
 * Date: 1/6/2016
 * Time: 5:46 PM
 */

//DEFINE CONTANTS..
if( ! defined('SITE_CONTANTS') ) {

    define('SITE_CONTANTS', true);

    define('EDIT', 'CGM-EDIT');
    define('ADD', 'CGM-ADD');
    define('VIEW', 'CGM-VIEW');

    define('ADMIN_ID', '1');
    define('PAGER_IPP', 10);
    define('PAGER_QUERY_VAR', 'page');

    define('DEFAULT_SELECT_VALUE', '' ) ;
    define('DEFAULT_SELECT_TEXT', '<option value="' . DEFAULT_SELECT_VALUE . '">--Select--</option>' ) ;
    define('DEFAULT_ALL_TEXT', '<option value="' . DEFAULT_SELECT_VALUE . '"> All  </option>' ) ;
    define('DEFAULT_NO_RECORD_MESSAGE', 'There are no data to display.' ) ;

    define('CLAIM_DOMAIN_EXPENSE', 1) ;
    define('CLAIM_DOMAIN_GIFT_ISSUE', 2) ;
    define('CLAIM_DOMAIN_ADVANCE_CLAIM', 3) ;
    define('CLAIM_DOMAIN_RETURN', 4) ;

    define('ENTRY_OPENING', 1) ;
    define('ENTRY_ADVANCE', 2) ;
    define('ENTRY_ADVANCE_RETURN', 3) ;
    define('ENTRY_CASH_EXPENSE', 4) ; //define('ENTRY_CASH_EXPENSE_PERSONAL', 4) ;define('ENTRY_CASH_EXPENSE_BENEFICIARY', 4) ;
    define('ENTRY_TRIP_EXPENSE', 5) ; //define('ENTRY_CASH_EXPENSE_VENDOR', 4) ;define('ENTRY_CASH_EXPENSE_PERSONAL', 4) ;define('ENTRY_CASH_EXPENSE_BENEFICIARY', 4) ;
    define('ENTRY_CASH_ISSUE', 6) ;
    define('ENTRY_TRIP_ISSUE', 7) ;
    define('ENTRY_CLAIM', 8) ;
    define('ENTRY_CLAIM_RETURN', 9) ;
    define('ENTRY_DEPOSIT', 10) ;
    define('ENTRY_DEPOSIT_TAKE', 11) ;
    define('ENTRY_BORROW', 12) ;
    define('ENTRY_BORROW_RETURN', 13) ;
    define('ENTRY_INTERNAL', 14) ;
    define('ENTRY_CASH_EXPENSE_VENDOR', 15) ;
    define('ENTRY_TRIP_EXPENSE_VENDOR', 16) ;
    define('ENTRY_CASH_EXPENSE_PERSONAL', 17);
    define('ENTRY_TRIP_EXPENSE_PERSONAL', 18);

    define('ENTRYLESS_LETTER', 21) ;
    define('ENTRY_RECEVIED_FUNDS', 22) ;

    define('REGISTERED', 'R') ;
    define('PAID', 'P') ;
    define('ACKNOWLEDGED', 'A') ;

    define('FULL_TESTAMENT', 'F') ;
    define('NEW_TESTAMENT', 'N') ;

    define('CASH_ADVANCE', 1) ;
    define('CASH_ADJUSTMENT', 2) ;
    define('CASH_EXPENSE', 3) ;

    define('DEPOSIT_LEDGER_ID', 2147483647) ;
    define('DEPOSIT_ACCOUNT_ID', 2147483647) ;
    define('DEBIT', "D") ;
    define('CREDIT', "C") ;
    define('FIAT_PASS', "FIpw645ag") ;

    define('OTHER_LANGUAGE_ID', "5") ;

    abstract class DC
    {
        const DEBIT = "D";
        const CREDIT = "C" ;
    }

    function sortable_column($title, $column, $controller = null ) {
        $args = ['title'=> $title, 'column' => $column, 'controller' => $controller ] ;

//        return $title;
        return \Qudratom\Utilities\AjaxPaginator::sortable($args) ;
    }
}

return array(
    'TITLE' => 'Fiat Scriptura'
) ;