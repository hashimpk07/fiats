<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if( isset($LAYOUT_LOGIN) )
        <link rel="stylesheet" href="{{ asset('public/assets/fiats/css/log.style.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('public/assets/fiats/css/style.css') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('public/assets/fiats/bootstrap/css/bootstrap.min.css') }}">
    <!--log in-->
    <link rel='stylesheet prefetch'
          href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <!--end-->

    <!--date picker-->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <?php echo Html::script( 'public/assets/js/jquery.form.js' ); ?>
    <?php echo Html::script( 'public/assets/js/qrd.js' ); ?>
    <?php echo Html::script( 'public/assets/fiats/js/jquery.newsTicker.min.js' ); ?>

    <script>
        $(document).ready(function () {
            $("#datepicker").datepicker();
        });
    </script>
    <!--end-->
</head>
<body>

<div class="row" style="margin-left: 0; margin-right: 0;">
    <div class="head">
        <div class="col-md-12">
            <br>
            <div id="idSuccessFailureMsgWrap">
                <div id="idSuccessMsg"></div>
                <div id="idFailureMsg"></div>
            </div>
            <div class="logo ">
                <img src="{{ asset('public/assets/fiats/images/fiatlogo.png') }}">
            </div>
            @if( isset($LAYOUT_WELCOME) )
                @include('layouts.fiats._welcome')
            @elseif ( isset($LAYOUT_LOGIN) )
            @else
                <div style="min-height: 60px;"></div>
            @endif
        </div>
    </div>
</div>

<hr class="line">
