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

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


</head>

<header>
	<img src="{{ asset('public/assets/data/fiats.jpg') }}" usemap="#Map" width="961" height="100" border="0" style="margin-bottom:-5px;margin-top:10px">
</header>

<body>



<div class="main-content">

	<!-- You only need this form and the form-basic.css -->

	<form class="form-basic" method="post" action="#">

		<div class="form-title-row">
			<h1>Registration</h1>
		</div>

		<div class="form-row">
			<label>
				<span>Mobile Number</span>
				<input type="text" id="txtPhone" name="txtPhone" placeholder="Mobile Number"  pattern="\d{3}[\-]\d{3}[\-]\d{4}"  onclick = "Validate()" required/>
				<label class="alert-danger cgm-error " id="ePhone"></label>
			</label>
		</div>

		<div class="form-row" id="verify">
			<button  type="button" id="mobileNumberSnd" onclick=" return  mobileNoValidation();">
				<i class="ace-icon fa fa-check bigger-110"></i>
				Next
			</button>
		</div>

		<div id="verified" style="display: none">
			<div class="form-row">
				<label>
					<span>OTP</span>
						<input type="text" id="txtOtp" name="txtOtp" placeholder="One-Time Password" />
					<label class="alert-danger cgm-error " id="eOtp"></label>
				</label>
			</div>

			<div class="form-row">
				<button  type="submit" >
					<i class="ace-icon fa fa-check bigger-110"></i>
					Next
				</button>
			</div>
		</div>



	</form>

</div>

</body>
<script>
	function mobileNoValidation()
	{
		var mobile=parseInt(document.getElementById('txtPhone').value );
		var pattern = /^\d{10}$/;
		if (pattern.test(mobile)) {
			$("#verify").hide();
			$("#verified").show();

			alert("true");

		}
		else{
			$("#verify").show();
			$("#verified").hide();

			alert("false");
		}

	}
</script>
</html>
