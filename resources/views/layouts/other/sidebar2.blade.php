<?php
/**
 * Created by PhpStorm.
 * User: Sajill
 * Date: 12/16/2015
 * Time: 12:57 PM
 */
?>
<div id="sidebar" class="sidebar responsive">
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'fixed')
        } catch (e) {
        }
    </script>

    <!-- /.
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div>-sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="@yield('class_dash')">
            <a href="{{ URL::to('/') }}">
                <i class="menu-icon fa fa-th"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="@yield('class_pep')">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> People</span>

                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="@yield('class_pep_grp')">
                    <a href="{{ URL::to('people_group') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Groups
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="@yield('class_pep_invid')">
                    <a href="{{ URL::to('pepinvid') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Individuals
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="@yield('class_pety')">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-database"></i>
                <span class="menu-text"> Petty Cash </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li class="@yield('class_bal')">
                    <a href="{{ URL::to('bal') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Balance Viewer
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="@yield('class_cashisu')">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Cash Issue
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="@yield('class_pca')">
                            <a href="#">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Petty Cash Account
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="@yield('class_ctyp')">
                            <a href="#" class="dropdown-toggle">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Type
                                <b class="arrow fa fa-angle-down"></b>
                            </a>
                            <b class="arrow"></b>
                            <ul class="submenu">
                                <li class="@yield('class_cadv')">
                                    <a href="{{ URL::to('adv') }}">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Advance
                                    </a>

                                    <b class="arrow"></b>
                                </li>

                                <li class="@yield('class_cadj')">
                                    <a href="{{ URL::to('adj') }}">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Adjustment
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                                <li class="@yield('class_cexp')">
                                    <a href="#" class="dropdown-toggle">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Expenses
                                        <b class="arrow fa fa-angle-down"></b>
                                    </a>
                                    <b class="arrow"></b>
                                    <ul class="submenu">
                                        <li class="@yield('class_ctyp')">
                                            <a href="{{ URL::to('exptyp') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Type
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                        <li class="@yield('class_cfrm')">
                                            <a href="{{ URL::to('cshfrm') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Cash From
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                        <li class="@yield('class_cvch')">
                                            <a href="{{ URL::to('vchdet') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Voucher Details
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="@yield('class_cshcr')">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Cash Receipt
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="@yield('class_crpca')">
                            <a href="#">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Petty Cash Account
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="@yield('class_crtyp')">
                            <a href="#" class="dropdown-toggle">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Type
                                <b class="arrow fa fa-angle-down"></b>
                            </a>
                            <b class="arrow"></b>
                            <ul class="submenu">
                                <li class="@yield('class_cradv')">
                                    <a href="{{ URL::to('advrtn') }}">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Advance Return
                                    </a>
                                    <b class="arrow"></b>
                                </li>
                                <li class="@yield('class_cradj')">
                                    <a href="{{ URL::to('adjrtn') }}">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Adjustment Return
                                    </a>
                                    <b class="arrow"></b>
                                </li>
                                <li class="@yield('class_crclm')">
                                    <a href="{{ URL::to('crclm') }}">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Claims
                                    </a>
                                    <b class="arrow"></b>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="@yield('class_intran')">
                    <a href="{{ URL::to('int_tran') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Internal Transfer
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="@yield('class_stview')">
                    <a href="{{ URL::to('stat_view') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Statement Viewer
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="@yield('class_pcpca')">
                    <a href="{{ URL::to('pett_acc') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Petty Cash Accounts
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="@yield('class_pcpexp')">
                    <a href="{{ URL::to('expense_type') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Expense Type
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="@yield('class_cgift')">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-gift"></i>
                <span class="menu-text"> Gifts </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="@yield('class_cshgift')">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Cash Gifts
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="@yield('class_cshgiftlst')">
                            <a href="{{ URL::to('cashgift') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Gift List
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="@yield('class_cshgiftclm')">
                            <a href="{{ URL::to('cashgift_claim') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Gift Claims
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="@yield('class_cshgiftisu')">
                            <a href="{{ URL::to('cashgift_issue') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Gift Issue
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="@yield('class_mgift')">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Material Gifts
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="@yield('class_mtlgift')">
                            <a href="{{ URL::to('materialgift_list') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Gift List
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="@yield('class_mtlclm')">
                            <a href="{{ URL::to('materialgift_claim') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Material Claim/Receipt
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="@yield('class_mtlisu')">
                            <a href="{{ URL::to('materialgift_issue') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Gift Issue
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="@yield('class_pepdl')">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text"> People Deposits- Loan Deals </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="@yield('class_pepdep')">
                    <a href="{{ URL::to('pep_dep') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Deposit
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="@yield('class_pepbrw')">
                    <a href="{{ URL::to('pep_brw') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Borrow
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="@yield('class_curr')">
            <a href="{{ URL::to('currency') }}">
                <i class="menu-icon fa fa-usd"></i>
                <span class="menu-text"> Currencies </span>
            </a>

            <b class="arrow"></b>

        </li>

        <li class="@yield('class_rep')">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-file-o"></i>

                <span class="menu-text">
                    Reports
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="@yield('class_peprept')">
                    <a href="{{ URL::to('pep_rept') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        People
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="@yield('class_indvdrept')">
                    <a href="{{ URL::to('indvid_rept') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Individuals
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Expense
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Gift
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Dashboard
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Calender View
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Custom Reports
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-bullhorn"></i>
                <span class="menu-text"> Notifications </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Blank Page
                    </a>

                    <b class="arrow"></b>
                </li>

            </ul>
        </li>

    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left"
           data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        } catch (e) {
        }
    </script>
</div>
