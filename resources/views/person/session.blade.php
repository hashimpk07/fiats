<?php
        $hideArrow = '' ;
        if( count($sessions) <= 2 ) {
            $hideArrow = 'display:none;' ;
        }
?>
<div class="col-md-2"  style="text-align: center; padding: 0;">
    <div class="col-md-12 center-block" style="padding:0; {{ $hideArrow }}">
        <a id="idSessionListPrev" href="javascript:void(0);"><p><img src="{{ asset('public/assets/fiats/images/arow-up.png')}}"></p></a>
    </div>

    <ul style="padding: 0;" class="session-row col-md-12  set1 form-admin" id="idSessionList">

        <?php

        if( isset($sessions) ) {
            foreach( $sessions as $rec ) {

            ?>

            <li style="display: block; overflow: hidden;" class="real btn btn-default fiat-tag2" onclick="highlightTag(this) ; actionForm('{{ action( 'PersonController@edit', [@$rec->id] ) }}', {}, 'idPersonAddWrap' )"  ><?php echo ((@$rec->name) ? @$rec->name : 'Unamed') ; ?></li>

            <?php
            }
        }
        ?>
            <li style="display: block; overflow: hidden;" class="unreal btn btn-default fiat-tag2" onclick="highlightTag(this) ; actionForm('{{ action( 'PersonController@edit', [@$rec->id] ) }}', {}, 'idPersonAddWrap' )"  >HIDEN</li>
        <?php /*<p class="fiat-tag" onclick="highlightTag(null) ; actionForm('{{ action( 'PersonController@add' ) }}', {}, 'idPersonAddWrap' )"  > + New Participant </p> */ ?>
    </ul>

    <div class="col-md-12" style="{{ $hideArrow }}" >
        <a id="idSessionListNext" href="javascript:void(0);"><p> <img src="{{ asset('public/assets/fiats/images/arow-down.png')}}" ></p></a>
    </div>

    <script type="text/javascript">
        function highlightTag(obj) {
            jQuery('.fiat-tag2').removeClass('highlighted') ;
            if( obj !== null ) {
                jQuery(obj).addClass('highlighted');
            }
        }

        var nt_example1 = $('#idSessionList').newsTicker({
            row_height: 42,
            max_rows: 2,
            duration: 0,
            autostart : 0,
            prevButton: $('#idSessionListPrev'),
            nextButton: $('#idSessionListNext')
        });

    </script>
</div>