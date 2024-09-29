<?php
/**
 * Created by PhpStorm.
 * User: Sajill
 * Date: 12/16/2015
 * Time: 12:57 PM
 */
?>
<div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse">
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
    </script>

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
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="hover">
            <a href="index.html">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="active open hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-users"></i>
							<span class="menu-text">
								People
							</span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="active open hover">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Customer
                    </a>

                    <b class="arrow"></b>

                </li>

                <li class="hover">
                    <a href="typography.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Vendor
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="hover">
                    <a href="elements.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        External Agent
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="hover">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>

                        Three Level Menu
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="hover">
                            <a href="#">
                                <i class="menu-icon fa fa-leaf green"></i>
                                Item #1
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="hover">
                            <a href="#" class="dropdown-toggle">
                                <i class="menu-icon fa fa-pencil orange"></i>

                                4th level
                                <b class="arrow fa fa-angle-down"></b>
                            </a>

                            <b class="arrow"></b>

                            <ul class="submenu">
                                <li class="hover">
                                    <a href="#">
                                        <i class="menu-icon fa fa-plus purple"></i>
                                        Add Product
                                    </a>

                                    <b class="arrow"></b>
                                </li>

                                <li class="hover">
                                    <a href="#">
                                        <i class="menu-icon fa fa-eye pink"></i>
                                        View Products
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-cubes"></i>
                <span class="menu-text"> Petty Cash </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="hover">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Balance Viewer
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Cash Issue
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="hover">
                            <a href="#">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Petty Cash Account
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="hover">
                            <a href="#" class="dropdown-toggle">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Type
                                <b class="arrow fa fa-angle-down"></b>
                            </a>
                            <b class="arrow"></b>
                            <ul class="submenu">
                                <li class="hover">
                                    <a href="#">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Advance
                                    </a>

                                    <b class="arrow"></b>
                                </li>

                                <li class="hover">
                                    <a href="#">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Adjustment
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                                <li class="hover">
                                    <a href="#">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Expenses
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="hover">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Cash Receipt
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="hover">
                            <a href="#">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Petty Cash Account
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="hover">
                            <a href="#" class="dropdown-toggle">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Type
                                <b class="arrow fa fa-angle-down"></b>
                            </a>
                            <b class="arrow"></b>
                            <ul class="submenu">
                                <li class="hover">
                                    <a href="#">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Advance Return
                                    </a>

                                    <b class="arrow"></b>
                                </li>

                                <li class="hover">
                                    <a href="#">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Adjustment Return
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                                <li class="hover">
                                    <a href="#">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Claims
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="hover">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Internal Transfer
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Statement Viewer
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Petty Cash Accounts
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Expense Type
                    </a>
                    <b class="arrow"></b>
                </li>

            </ul>
        </li>

        <li class="hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-usd"></i>
                <span class="menu-text"> Gifts </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="hover">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Cash Gifts
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="hover">
                            <a href="#">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Gift List
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="hover">
                            <a href="#">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Gift Claims
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="#">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Gift Issue
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="hover">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Material Gifts
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="hover">
                            <a href="#">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Gift List
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="hover">
                            <a href="#">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Material Claim/Receipt
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="#">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Gift Issue
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-shopping-cart"></i>
                <span class="menu-text"> People Deposits-Loan Deals </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Deposit
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="hover">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Borrow
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="hover">
            <a href="#">
                <i class="menu-icon fa fa-calendar"></i>
                <span class="menu-text"> Currencies </span>
            </a>
            <b class="arrow"></b>

        </li>

        <li class="hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-file-o"></i>
                <span class="menu-text"> Reports </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Dashboard
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="hover">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Calender View
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Custom Reports
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-cogs"></i>
                <span class="menu-text"> Notifications </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="hover">
                    <a href="profile.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Blank Page
                    </a>

                    <b class="arrow"></b>
                </li>

            </ul>
        </li>
    </ul><!-- /.nav-list -->

    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
    </script>
</div>
