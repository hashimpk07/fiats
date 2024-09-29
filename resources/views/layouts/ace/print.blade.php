<?php
/**
 * Created by PhpStorm.
 * User: Sajill
 * Date: 12/16/2015
 * Time: 12:52 PM
 */
?>

@include('layouts.ace.header')

<body class="no-skin" id="printpreview" >

<div class="main-container" id="main-container">

    <div class="main-content">
        <div class="main-content-inner">

            <div class="header">
                SH HMRM’S Private office -  HUZBA, Nad al Sheba
            </div>

            @yield("content")

            <div class="footer-area">
                <hr/>
                SH HMRM’S Private office -  HUZBA, Nad al Sheba
            </div>
        </div>
    </div><!-- /.main-content -->

</div><!-- /.main-container -->

</body>
</html>
