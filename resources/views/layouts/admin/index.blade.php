<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ Config::get('site.TITLE') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/fiats.css') }}" >

    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/editable-select.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/form-search.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/form-basic.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

        <link rel="icon" type="image/png" href="{{ asset('public/assets/data/favicon.png') }}" />
    @include('layouts.admin.scripts')

    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/fiats.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/form-basic.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('public/assets/css/jquery-ui.css') }}">

    <script type="text/javascript" src="{{asset('public/assets/js/jquery-ui.js')}}"></script>


    <link rel="icon" type="image/png" href="{{ asset('public/assets/data/favicon.png') }}" />


</head>

<header>
    <div class="fiat-header">
        <img src="{{ asset('public/assets/data/fiats.jpg') }}" usemap="#Map" class="fiat_img" border="0">
        <div id="idSuccessFailureMsgWrap">
            <div id="idSuccessMsg"></div>
            <div id="idFailureMsg"></div>
        </div>


    <?php if( \Illuminate\Support\Facades\Auth::check() ) { ?>

            <div class="fiat-header2">
                <a href="{{ url('person') }}">
                    <span class="log_admin">New Registration</span>
                </a>
                | &nbsp;
                <a href="{{ url('member') }}">
                    <span class="log_admin">Participants</span>
                </a>
                | &nbsp;
                <a href="{{ url('password_change') }}">
                    <span class="log_admin">Change Password</span>
                </a>

                <a class="top-icons" href="{{ action('LoginController@logout') }}" title="Logout">
                    <i class="ace-icon fa fa-power-off "></i>

                </a>
            </div>

        <?php } ?>

    </div>
</header>

<body>

<div class="main-contentss">

    @yield("content")

</div>


</body>

</html>