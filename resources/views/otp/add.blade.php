<div id="idOtpAddWrap" class="form-basic {{$CGM_MODE or ''}}">
	<?php echo Form::open( array( 'url' => $url, 'id' => 'idOtpForm', 'class' => 'form-horizontal' ) );  ?>

		<!--<div class="form-title-row">
			<h1>Registration</h1>
		</div>

		<div class="form-row" id="mobile">
			<label>
				<span>Mobile Number</span>
				<input type="text" id="txtMobile" name="txtMobile" placeholder="Mobile Number"  />
				<label class="alert-danger cgm-error " id="eMobile"></label>
			</label>
		</div>

		<div class="form-row">

				<button id="idGetOtpButton" class="btn btn-info mform_btn auto-margin" type="submit" name="btnGetOtp" value="getotp" >
					Proceed
				</button>

		</div>

		<br/>
		<br/>
		<br/>
		<div class="form-row otp-form" style="display: none;" >
			<label>
				<span>OTP</span>
				<input type="text" id="txtOtp" name="txtOtp" placeholder="One-Time Password" />
				<label class="alert-danger cgm-error " id="eOtp"></label>
			</label>
		</div>

		<div class="form-row otp-form" style="display: none" >
			<button class="btn btn-info mform_btn auto-margin" type="submit" name="btnVerify" value="next" id="submit">
				Verify
			</button>
		</div>--->



				<div class="col-md-12 col-sm-12 ">
					<div class="mob-background2 ">
						<h3>Registration</h3>

						<div class="box">
							<div class="col-md-4 col-sm-4 fiat-mobile">
								<h5>Mobile Number</h5>

							</div>
							<div class="col-md-4 col-sm-4 ">
								<div class="input-group mob-search">
									<span class="input-group-addon" id="basic-addon1"> <i class="fa fa-mobile"></i> </span>
									<input type="text" class="form-control"  id="txtMobile" name="txtMobile" placeholder="Mobile Number"
										   aria-describedby="basic-addon1" maxlength="10">
								</div>
								<label class="alert-danger cgm-error " id="eMobile"></label>

							</div>
							<div class="col-md-4 reg-btn">
								<button id="idGetOtpButton" class=" btn btn-primary" type="submit" name="btnGetOtp" value="getotp" >
									Proceed
								</button>

							</div>
						</div>
						<div class="box otp-form" style="display: none;">
							<div class="col-md-4 col-sm-4 fiat-mobile">
								<h5>OTP</h5>

							</div>
							<div class="col-md-4 col-sm-4">
								<div class="input-group mob-search">
									<span class="input-group-addon" id="basic-addon1"> <i class="fa fa-unlock-alt"></i> </span>
									<input type="text" class="form-control"  id="txtOtp" name="txtOtp" placeholder="One-Time Password"
										   aria-describedby="basic-addon1">
								</div>
								<label class="alert-danger cgm-error " id="eOtp"></label>

							</div>
							<div class="col-md-4 col-sm-4 reg-btn otp-form" style="display: none" >
								<button class="btn btn-primary" type="submit" name="btnVerify" value="next" id="submit">
									Verify
								</button>
							</div>

						</div>
					</div>
				</div>


	<?php echo Form::close(); ?>

</div>
<script type="text/javascript">
	function doOtpValidation()
	{
		var a = {
			'#txtMobile': {func: 'required()', errfield: '#eMobile', errmsg: 'Invalid Mobile'},
//			'#txtOtp': {func: 'required()', errfield: '#eOtp', errmsg: 'Invalid OTP'},
		};

		if( validateForm(a, '' ) )
		{
			return true ;
		}
		return false ;
	}

	submitForm('idOtpForm', doOtpValidation, function(data) {

		if( data.show_otp )
		{
			$("#txtMobile").attr("readonly", true);
			$('#txtMobile').css('background-color' , '#039692');
			jQuery('.otp-form').show() ;
			jQuery('#idGetOtpButton').html('Resend Otp') ;
		}
		else if( data.add_person )
		{
			var addForm = decodeUri(data.add_person) ;
			alert(addForm) ;
			jQuery('#idOtpAddWrap').html( addForm ) ;
		}

	}, '', true, {} );

	$("input").keypress(function(e) {
        if ($('.otp-form').css('display') == 'none') {
            if (e.keyCode == 13) {
                $('#idGetOtpButton').click();
                return false;
            }
        }
        else {
            if (e.keyCode == 13) {
                $('#submit').click();
				return false;
			}
		}

        return true;
    });





</script>