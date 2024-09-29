<?php
/**
 * Created by PhpStorm.
 * User: Sajill
 * Date: 12/16/2015
 * Time: 12:52 PM
 */
?>

@include('layouts.ace.header')


        <!--inline styles related to this page-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/></head>

<body class="login-layout">
<div class="main-container container-fluid">
    <div class="main-content">
        <div class="row-fluid">
            <div class="span12">
                <div class="login-container">
                    <div class="row-fluid">
                        <div class="center">
                            <h1>
                                <span class="white">{{  Config::get('site.TITLE') }}</span>
                            </h1>

                        </div>
                    </div>

                    <div class="space-6"></div>

                    <div class="row-fluid">
                        <div class="position-relative">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header blue lighter bigger fiat-align">
                                            Please Enter Your Information
                                        </h4>



                                        @yield("content")

                                    </div><!--/widget-main-->

                                    <div class="toolbar clearfix">

                                    </div>
                                </div><!--/widget-body-->
                            </div><!--/login-box-->

                            <div id="forgot-box" class="forgot-box widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header red lighter bigger">
                                            <i class="icon-key"></i>
                                            Retrieve Password
                                        </h4>

                                        <div class="space-6"></div>
                                        <p>
                                            Enter your email and to receive instructions
                                        </p>

                                        <fiedset >
                                            <label>
															<span class="block input-icon input-icon-right">
																<input type="email" class="span12" placeholder="Email"/>
																<i class="icon-envelope"></i>
															</span>
                                            </label>

                                            <div class="clearfix">
                                                <button onclick="return false;"
                                                        class="width-35 pull-right btn btn-small btn-danger">
                                                    <i class="icon-lightbulb"></i>
                                                    Send Me!
                                                </button>
                                            </div>
                                        </fiedset>
                                    </div><!--/widget-main-->

                                    <div class="toolbar center">
                                        <a href="#" onclick="show_box('login-box'); return false;"
                                           class="back-to-login-link">
                                            Back to login
                                            <i class="icon-arrow-right"></i>
                                        </a>
                                    </div>
                                </div><!--/widget-body-->
                            </div><!--/forgot-box-->

                            <div id="signup-box" class="signup-box widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header green lighter bigger">
                                            <i class="icon-group blue"></i>
                                            New User Registration
                                        </h4>

                                        <div class="space-6"></div>
                                        <p> Enter your details to begin: </p>

                                        <fieldset>
                                            <label>
															<span class="block input-icon input-icon-right">
																<input type="email" class="span12" placeholder="Email"/>
																<i class="icon-envelope"></i>
															</span>
                                            </label>

                                            <label>
															<span class="block input-icon input-icon-right">
																<input type="text" class="span12"
                                                                       placeholder="Username"/>
																<i class="icon-user"></i>
															</span>
                                            </label>

                                            <label>
															<span class="block input-icon input-icon-right">
																<input type="password" class="span12"
                                                                       placeholder="Password"/>
																<i class="icon-lock"></i>
															</span>
                                            </label>

                                            <label>
															<span class="block input-icon input-icon-right">
																<input type="password" class="span12"
                                                                       placeholder="Repeat password"/>
																<i class="icon-retweet"></i>
															</span>
                                            </label>

                                            <label>
                                                <input type="checkbox"/>
															<span class="lbl">
																I accept the
																<a href="#">User Agreement</a>
															</span>
                                            </label>

                                            <div class="space-24"></div>

                                            <div class="clearfix">
                                                <button type="reset" class="width-30 pull-left btn btn-small">
                                                    <i class="icon-refresh"></i>
                                                    Reset
                                                </button>

                                                <button onclick="return false;"
                                                        class="width-65 pull-right btn btn-small btn-success">
                                                    Register
                                                    <i class="icon-arrow-right icon-on-right"></i>
                                                </button>
                                            </div>
                                        </fieldset>

                                    </div>

                                    <div class="toolbar center">
                                        <a href="#" onclick="show_box('login-box'); return false;"
                                           class="back-to-login-link">
                                            <i class="icon-arrow-left"></i>
                                            Back to login
                                        </a>
                                    </div>
                                </div><!--/widget-body-->
                            </div><!--/signup-box-->
                        </div><!--/position-relative-->
                    </div>
                </div>
            </div><!--/.span-->
        </div><!--/.row-fluid-->
    </div>
</div><!--/.main-container-->


@include('layouts.ace.scripts')

</body>
</html>