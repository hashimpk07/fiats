@extends("layouts.fiats.login")

@section("content")

<?php echo Form::open(array('action' => 'LoginController@onSubmit', 'id' => 'idLoginForm' ) ); ?>
	<fieldset class="fiat-align">

		<span class="block input-icon input-icon-right" style="width: 100%; margin: 5px 0">
			<label class="alert-warning clear" id="idFailureMsg"></label>
			<label class="alert-info clear" id="idSuccessMsg"></label>
		</span>

		<label>
			<span class="block input-icon input-icon-right">
				<input type="text" class="span12" placeholder="Username" name="username" />
				<i class="icon-user"></i>
			</span>
		</label>

		<label class="fiat-align">
			<span class="block input-icon input-icon-right">
				<input type="password" class="span12" placeholder="Password" name="password" />
				<i class="icon-lock"></i>
			</span>
		</label>

		<div class="space"></div>

		<div class="clearfix">
			<label class="inline">

			</label>

			<button type="submit" class="width-35 btn btn-small btn-primary">
				<i class="icon-key"></i>
				Login
			</button>
		</div>

		<div class="space-4"></div>
	</fieldset>

<?php echo Form::close(); ?>

@stop

<script type="text/javascript">
	function doLoginValidation()
	{
		return true ;
	}

	document.addEventListener('onPageReady', function (e) {
		/* submitForm( formName, beforeFunctionm, afterFunction, targetId, autofill json response); */
		submitForm('idLoginForm', doLoginValidation, function (data) {
		}, '', true, {});
	}) ;


</script>