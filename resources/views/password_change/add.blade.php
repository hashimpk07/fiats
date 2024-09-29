<section class="bible">
	<div class="container fiat-log ">
		<div class="col-md-12 col-sm-12 ">
			<div class="bible-background ">

				<div id="idPasswordChangeAddWrap" class="form-basic {{$CGM_MODE or ''}}">
					<?php echo Form::open( array( 'url' => $url, 'id' => 'idPasswordChangeForm', 'class' => 'form-horizontal' ) );  ?>

				<h3>Change Password </h3>

				<div class="date-datepicker">

					<div class="col-xs-6 col-md-6">
						<h5>Old Password </h5>

					</div>
					<div class="col-xs-6 col-md-6">
						<div class="input-group date-serach-x ">

							<input class="form-control" type="password" id="txtOldPassword" name="txtOldPassword" placeholder="Old Password " />
							<label class="alert-danger cgm-error " id="eOldPassword"></label>
						</div>

					</div>
				</div>

				<div class="date-datepicker">

					<div class="col-xs-6 col-md-6">
						<h5>New Password </h5>

					</div>
					<div class="col-xs-6 col-md-6">
						<div class="input-group date-serach-x ">

							<input class="form-control" type="password" id="txtNewPassword" name="txtNewPassword" placeholder="New Password "   />
							<label class="alert-danger cgm-error " id="eNewPassword"></label>
						</div>

					</div>
				</div>

				<div class="date-datepicker">

					<div class="col-xs-6 col-md-6">
						<h5>Retype Password </h5>

					</div>
					<div class="col-xs-6 col-md-6">
						<div class="input-group date-serach-x ">

							<input class="form-control" type="password" id="txtConfirmPassword" name="txtConfirmPassword" placeholder="Confirm Password"   />
							<label class="alert-danger cgm-error " id="eConfirmPassword"></label>
						</div>

					</div>
				</div>

				<div class="bible-button" style="text-align: center">

					<button type="submit" name="btnVerify" value="next" class="btn btn-primary ">Save</button>
					<button type="reset" class="btn btn-primary center" onclick="ToggleForm();" >Reset</button>

				</div>


			</div>


		</div>

	</div>
</section>


<script type="text/javascript">
	function doPasswordChangeValidation()
	{
		var a = {
			'#txtOldPassword' :{ func : 'required()' , errfield : '#eOldPassword', errmsg  : 'Old Password' },
			'#txtNewPassword' :{ func : 'required()' , errfield : '#eNewPassword', errmsg  : 'new Password' },
			'#txtConfirmPassword@1' :{ func : 'required()' , errfield : '#eConfirmPassword', errmsg  : 'Re password' },
			'#txtConfirmPassword@2' :{ func : 'matchfield("txtNewPassword")' , errfield : '#eConfirmPassword', errmsg  : ' Password does not match' }
		};

		if( validateForm(a, '' ) )
		{
			return true ;
		}
		return false ;
	}

	submitForm('idPasswordChangeForm', doPasswordChangeValidation, function(data) { }, '', true, {
		"click" : ".refreshHtmlTable",
		"hide_if_ok" : '#idPasswordChangeForm'
	} );

</script>