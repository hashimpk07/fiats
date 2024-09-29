<?php
namespace Qudratom\Utilities;

use App\Models\CashAdvance;
use App\Models\CashAdvanceReturn;
use App\Models\Expense;
use App\Models\GiftIssue;
use Illuminate\Support\Facades\DB;

class Notification
{
    public static function countPendingClaims()
    {
        return DB::table(DB::raw('claims AS c'))
            ->select(DB::raw('COUNT(*) as cnt'))
            ->where('c.realization_status', '!=', CONFIRMED )
            ->pluck('cnt') ;
    }
    public static function countUnbalancedAdjustments()
    {
        return 0 ;
    }
    public static function countUnbalancedAdvances()
    {
        return 0 ;
    }
    public static function countExpiringDocuments()
    {
        return DB::table(DB::raw('people AS p'))
            ->select(DB::raw('COUNT(*) as cnt'))
            ->join('people_documents AS pd', 'pd.people_id', '=', 'p.id')
            ->where('pd.expiry', '<', DB::raw('NOW()'))
            ->pluck('cnt') ;
    }
    public static function countCashBalanceAlerts()
    {
        return DB::table(DB::raw('cash_accounts AS c'))
            ->select(DB::raw('SUM(ae.amount) AS tamount, c.name, c.id, cd.alert_level'))
            ->join('cash_account_details AS cd', 'cd.cash_account_id', '=', 'c.id')
            ->join('account_entries AS ae', function($join) {
                    $join->on('ae.cash_account_id', '=', 'c.id') ;
                    $join->on('ae.currency_id', '=', 'cd.currency_id') ;
                }
            )->where('cd.is_deleted', '0')
            ->groupBy('ae.cash_account_id', 'ae.currency_id' )
            ->havingRaw( 'SUM(ae.amount) < cd.alert_level')
            ->get() ;
    }

    public static function pendingUploads(){

        $TripGiftIssue = GiftIssue::where( 'status', '=', 'C' )->where( 'attachment_file', '=', '' )
            ->join('trip_gift_issues as c','c.gift_issue_id','=','gift_issues.id')->count() ;
        $CashGiftIssue = GiftIssue::where( 'status', '=', 'C' )->where( 'attachment_file', '=', '' )
            ->join('cash_gift_issues as c','c.gift_issue_id','=','gift_issues.id')->count() ;
        $cashExpense = Expense::where( 'status', '=', 'C' )->where( 'file', '=', '' )
            ->join('cash_expenses as c','c.expense_id','=','expenses.id')->count() ;
        $tripExpense = Expense::where( 'status', '=', 'C' )->where( 'file', '=', '' )
            ->join('trip_expenses as c','c.expense_id','=','expenses.id')->count() ;
        $cashAdvanceReturn = CashAdvanceReturn::where( 'status', '=', 'C' )->where( 'attachment_file', '=', '' )->count() ;
        $cashAdvance =  CashAdvance::where( 'status', '=', 'C' )->where( 'attachment_file', '=', '' )->count() ;

        $TotalUploadFile = $CashGiftIssue + $TripGiftIssue + $cashExpense + $tripExpense + $cashAdvanceReturn + $cashAdvance ;

        return array( 'CashGiftIssue' => $CashGiftIssue,
            'TripGiftIssue' => $TripGiftIssue,
            'CashExpense' => $cashExpense,
            'TripExpense' => $tripExpense,
            'CashAdvanceReturn' => $cashAdvanceReturn,
            'CashAdvance' => $cashAdvance,
            'Total' => $TotalUploadFile
        ) ;
    }

}