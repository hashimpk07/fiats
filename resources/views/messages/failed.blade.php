@extends('layouts.fiats.user')

@section('content')

	<div class="main-content center-block" style="text-align: center	">

	<!-- You only need this form and the form-basic.css -->

	<div class="form-admin">

		<div class="form_thank_you">
			<h1>Sorry</h1>
			<h3>Transaction Failed</h3>
			<?php if( $ref_no ) { ?>
			<h6>Ref ID : <?php echo $ref_no;?></h6>
			<?php } ?>
			<input type="button" class="btn btn-primary button2" value="Retry" style="display: none;">
		</div>
		<div class="fiat-button3">
			<a href="{{ url() }}">
			<input type="button" class="btn btn-primary button" value="Back To Home">
			</a>
		</div>

	</div>

</div>

@endsection
