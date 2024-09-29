<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Fiat Scriptura</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/fiats/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/fiats/bootstrap/bootstrap-theme.min.css') }}">

    <link href='{{ asset('http://fonts.googleapis.com/css?family=Kreon:300,400,700') }}' rel='stylesheet' type='text/css'>

    <link href='{{ asset('http://fonts.googleapis.com/css?family=Pacifico') }}' rel='stylesheet' type='text/css' >

    <link href="{{ asset('public/assets/fiats/bootstrap/ionicons.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/assets/fiats/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/fiats/css/responsiveslides.css') }}">

    <script src="public/assets/fiats/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->

    <?php echo Html::script( 'public/assets/js/jquery.form.js' ); ?>
    <?php echo Html::script( 'public/assets/js/qrd.js' ); ?>
    <?php echo Html::script( 'public/assets/fiats/js/responsiveslides.min.js' ); ?>

</head>

<body data-spy="scroll" data-target="#navbar" data-offset="200" >
    <div id="home" class="home-anchor-temp">Orange Down</div>
    
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div id="header">
    <div class="bg-overlay"></div>
    <div id="menu" class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <div class="logo">
            <img src="{{ asset('public/assets/fiats/images/fiatlogo.png') }}" usemap="#Map" class="fiat_img" border="0">
        </div>

        

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right" style="margin-right:10% !important;" >
                <?php if( @$NO_SLIDER ) { ?>
                <li class="first-nav" ><a href="{{ url('/#home') }}" >Home</a></li>
                <li class="second-nav" ><a href="{{ url('/#about') }}" >About Us</a></li>
                <li class="third-nav" ><a data-ignore="1" href="{{ url('/person') }}" >Registration</a></li>
                <li class="fourth-nav" ><a href="{{ url('/#contactus') }}" >Contact Us</a></li>
                <?php } else { ?>
                <li class="first-nav" ><a onclick="function() { window.location='{{ url('/#home') }}'; return false;}" href="#home">Home</a></li>
                <li class="second-nav" ><a onclick="function() { window.location='{{ url('/#about') }}'; return false;}" href="#about" >About Us</a></li>
                <li class="third-nav" ><a data-ignore="1" href="{{ url('person') }}">Registration</a></li>
                <li class="fourth-nav" ><a onclick="function() { window.location='{{ url('/#contactus') }}'; return false;}" href="#contactus">Contact Us</a></li>
                <?php } ?>
            </ul>
        </div><!--/.navbar-collapse -->
        
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                    <i class="ion-navicon"></i>
                </button>

            </div>
        </div><!-- navbar-header -->

    </div><!-- container -->

</div><!-- menu -->
<?php
if( ! @$NO_SLIDER ) {
?>
<div class="jcarousel-wrapper" style="width: 100%">
    <div class="jcarousel" style="width: 100%">
        <ul id="rslides" class="rslides" >
            <li><img src="{{ asset('public/assets/fiats/images/1.jpg') }}" width="100%" alt=""></li>
            <li><img src="{{ asset('public/assets/fiats/images/2.jpg') }}" width="100%" alt=""></li>
            <li><img src="{{ asset('public/assets/fiats/images/3.jpg') }}" width="100%" alt=""></li>
        </ul>
    </div>
</div>


<script type="text/javascript">

  $("#rslides").responsiveSlides({
  auto: true,             // Boolean: Animate automatically, true or false
  speed: 1000,            // Integer: Speed of the transition, in milliseconds
  timeout: 8000 });

</script>

<?php
}
?>

<style>
.rslides {
  position: relative;
  list-style: none;
  overflow: hidden;
  width: 100%;
  padding: 0;
  margin: 0;
  }

.rslides li {
  -webkit-backface-visibility: hidden;
  position: absolute;
  display: none;
  width: 100%;
  left: 0;
  top: 0;
  }

.rslides li:first-child {
  position: relative;
  display: block;
  float: left;
  }

.rslides img {
  display: block;
  height: auto;
  float: left;
  width: 100%;
  border: 0;
  }
</style>
<!-- /#header -->
