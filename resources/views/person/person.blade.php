<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>FiatMission</title>


	<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/fiats.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/form-basic.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('public/assets/css/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('public/assets/css/editable-select.css') }}">


	<script type="text/javascript" src="{{asset('public/assets/js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/assets/js/jquery-ui.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/assets/js/jquery-editable-select.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/assets/js/jquery-1.12.4.js')}}"></script>






</head>
<script>
	$( function() {

		$( "#datepicker" ).datepicker();
		$('#ssssss').editableSelect();


	} );
</script>



<header>
	<img src="{{ asset('public/assets/data/fiats.jpg') }}" usemap="#Map" width="961" height="100" border="0" style="margin-bottom:-5px;margin-top:10px">
</header>

<body>



<div class="main-content">

	<!-- You only need this form and the form-basic.css -->



</div>

</body>

</html>