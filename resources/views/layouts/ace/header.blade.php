<?php
/**
* Created by PhpStorm.
* User: Sajill
* Date: 12/16/2015
* Time: 12:54 PM
*/
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>{{ Config::get('site.TITLE') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <?php echo Html::style("public/assets/css/bootstrap.min.css");?>
    <?php echo Html::style("public/assets/font-awesome/4.2.0/css/font-awesome.min.css");?>

    {{-- Common styles --}}
    <?php echo Html::style("public/assets/css/jquery-ui.custom.min.css");?>
    <?php echo Html::style("public/assets/css/chosen.min.css");?>
    <?php echo Html::style("public/assets/css/datepicker.min.css");?>
    <?php echo Html::style("public/assets/css/bootstrap-timepicker.min.css");?>
    <?php echo Html::style("public/assets/css/daterangepicker.min.css");?>
    <?php echo Html::style("public/assets/css/bootstrap-datetimepicker.min.css");?>
    <?php echo Html::style("public/assets/css/colorpicker.min.css");?>
    {{-- Common Styles End --}}

    <!-- Gift List page specific plugin styles -->
    <?php echo Html::style("public/assets/css/bootstrap-duallistbox.min.css");?>
    <?php echo Html::style("public/assets/css/bootstrap-multiselect.min.css");?>
    <?php echo Html::style("public/assets/css/select2.min.css");?>
    <!-- Gift List page specific plugin styles -->

    <!-- page specific plugin styles -->
    <?php echo Html::style("public/assets/css/login.css");?>
    <!-- text fonts -->
    <?php echo Html::style("public/assets/fonts/fonts.googleapis.com.css");?>

    <!-- motis styles -->
    <?php echo Html::style("public/assets/css/cgm.css");?>

    <!-- ace styles -->
    <?php echo Html::style("public/assets/css/ace.min.css", array('class'=>"ace-main-stylesheet", 'id'=>"main-ace-style"));?>

    <!--[if lte IE 9]
    <link rel="stylesheet" href="/laravel5/public/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    ![endif]-->

    <!--[if lte IE 9]
    <link rel="stylesheet" href="/laravel5/public/assets/css/ace-ie.min.css");?>
    ![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="/laravel5/public/assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]
    <script src="/laravel5/public/assets/js/html5shiv.min.js"></script>
    <script src="/laravel5/public/assets/js/respond.min.js"></script>
    ![endif]--><?php
    function onePassAdjacencyTree($array, $colMap = null )
    {


        $PARENT_ID	= 'parent_id' ;
        $NAME		= 'name' ;

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
            $thisref = &$refs[ $data[$ITEM_ID] ];

            $thisref[$PARENT_ID] = $data[$PARENT_ID];
            $thisref[$NAME] = $data[$NAME];

            if ($data[$PARENT_ID] == 0)
            {
                $list[ $data[$ITEM_ID] ] = &$thisref;
            }
            else
            {
                $refs[ $data[$PARENT_ID] ]['children'][ $data[$ITEM_ID] ] = &$thisref;
             }
        }
        return $list ;
    }
    ?>


</head>
