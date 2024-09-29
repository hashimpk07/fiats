<?php
/**
 * Created by PhpStorm.
 * User: Sajill
 * Date: 12/16/2015
 * Time: 1:02 PM
 */
?>
<div class="footer">

    @include('layouts.ace.popup')

    <div class="footer-inner">
        <div class="footer-content">
            <span class="bigger-120">
                <span class="blue bolder">{{ Config::get('site.TITLE')  }}</span>
                &copy; {{ Date('Y') }}
            </span>
            &nbsp; &nbsp;
        </div>
    </div>
</div>
