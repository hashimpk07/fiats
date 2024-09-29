<?php
    $claims = \Qudratom\Utilities\Notification::countPendingClaims() ;
    $cashbalanceset = \Qudratom\Utilities\Notification::countCashBalanceAlerts() ;

$cashStr = '' ;
foreach( $cashbalanceset as $k => $v )
{
    $cashStr .= '<li><a href="javascript:void(0);" class="no-action" >' . $v->name . ' (' . $v->tamount . ')</a></li>' ;
}
if( $cashStr )
{
    $cashStr = '<ul class="notification-row">' . $cashStr . '</ul>' ;
}

$cashbalance = count($cashbalanceset) ;

$uploadList = \Qudratom\Utilities\Notification::pendingUploads() ;

$totalNotifications = intval( $claims + $cashbalance  +$uploadList['Total'] ) ;
?>

<li class="purple">
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                <span class="badge badge-important">
                    {{ $totalNotifications }}
                </span>
    </a>

    <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
        <li class="dropdown-header">
            <i class="ace-icon fa fa-exclamation-triangle"></i>
            {{ $totalNotifications }} Notifications
        </li>

        @if( $totalNotifications > 0 )
            <li class="dropdown-content">
                <ul class="dropdown-menu dropdown-navbar navbar-pink">

                    @if($claims > 0 )
                        <li>
                            <a href="{{ action('ClaimController@index', ['D'] ) }}">
                                {{ $claims }} Pending Claims
                            </a>
                        </li>
                    @endif

                    @if($cashbalance > 0 )
                    <li>
                        <a href="{{ action('CashAccountController@index' ) }}">
                            {{ $cashbalance }} Cash Balance Alerts

                            {!! $cashStr !!}
                        </a>
                    </li>
                    @endif

                    @if($uploadList['Total'] > 0 )
                    <li>
                            <a>
                            {{ $uploadList['Total'] }} Pending Uploads</i>

                           <ul class="notification-row" >
                               @if($uploadList['CashExpense'] > 0 )
                               <li>
                                   <a href="{{ action('CashExpenseController@index',['notification'] ) }}">

                                            Cash Expense ({{ $uploadList['CashExpense'] }})</a>
                                   </li> @endif
                               @if($uploadList['TripExpense'] > 0 )
                               <li>
                                   <a href="{{ action('TripExpenseController@index',['notification'] ) }}">

                                            Trip Expense ({{ $uploadList['TripExpense'] }})</a>
                                  </li> @endif
                               @if($uploadList['CashGiftIssue'] > 0 )
                               <li> <a href="{{ action('CashGiftIssueController@index' ,['notification']) }}">

                                           Cash GiftIssue ({{ $uploadList['CashGiftIssue'] }})</a>
                                  </li> @endif
                               @if($uploadList['TripGiftIssue'] > 0 )
                               <li> <a href="{{ action('TripGiftIssueController@index' ,['notification'] ) }}">
                              Trip GiftIssue ( {{ $uploadList['TripGiftIssue'] }})</a>
                                 </li> @endif
                               @if($uploadList['CashAdvanceReturn'] > 0 )
                               <li> <a href="{{ action('CashAdvanceReturnController@index',['attachment_file=notification']  ) }}">

                                            CashAdvance Return ({{ $uploadList['CashAdvanceReturn']}})</a>
                                   </li> @endif
                               @if($uploadList['CashAdvance'] > 0 )
                               <li> <a href="{{ action('CashAdvanceController@index',['notification'] ) }}">

                                            CashAdvance ({{ $uploadList['CashAdvance'] }})</a>
                                   </li> @endif
                           </ul>
                            </a>
                    </li>
                    @endif

                </ul>
            </li>
        @endif
    </ul>
</li>