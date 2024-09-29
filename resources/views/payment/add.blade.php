<div id="idPaymentAddWrap" class="form-basic {{$CGM_MODE or ''}}">
	<!-- You only need this form and the form-basic.css -->
	<?php
		$amount = $memberCount * $baseAmount ;
	?>
	<?php echo Form::open( array( 'url' => $url, 'id' => 'idPaymentForm', 'class' => 'form-horizontal' ) );  ?>

	<div class="row" style="margin-left: 0; margin-right: 0;">
		<div class="container fiat-log ">
			<div class="col-md-12 col-sm-12 ">
				<div class="pay-background" style="padding: 10px;">
					<h3>Payment Details</h3>

					<div class="payment-box row">
						<div class="col-xs-6 number">
							<h5>Fees</h5>

						</div>
						<div class="col-xs-6  ">
							<div class=" mob-search">

								<label >{{ number_format( $baseAmount, 2) }}</label>
							</div>


						</div>

					</div>
					<div class="row">
						<div class="col-xs-6 number">
							<h5>Participant Count</h5>

						</div>
						<div class="col-xs-6">
							<div class=" mob-search">

								<label >{{ number_format( $memberCount ) }}</label>

							</div>


						</div>

					</div>
					<div class="row">
						<div class="col-xs-6 number">
							<h5>Total Amount</h5>

						</div>
						<div class="col-xs-6">
							<div class=" mob-search">

								<label>{{ number_format( $amount, 2) }}</label>
							</div>

						</div>
					</div>

                        	<?php if (Auth::check()) { ?>
								@include('person.payment')
                        	<?php } ?>

					<div class="row">
						<div class="col-md-12 make">
							<button class="btn btn-primary center-block" type="submit">Make Payment</button>
						</div>


					</div>
				</div>


			</div>
		</div>
	</div>


	<?php echo Form::close(); ?>

</div>

<div id="idGo" style="display: none;"></div>

<script type="text/javascript">
	function doPaymentValidation()
	{

		var a = {
			'#selPaymentMode': {func: 'required()', errfield: '#ePaymentMode', errmsg: 'Invalid Payment Mode'},
            '#txtPaymentDate': {func: 'required()', errfield: '#ePaymentDate', errmsg: 'Invalid Date'},
            '#txtRefNo': {func: 'required()', errfield: '#eRefNo', errmsg: 'Invalid Refferenece Number'},
		};

		if( validateForm(a, '' ) )
		{
			return true ;
		}
		return false ;
	}
	jQuery( ".date-picker" ).datepicker({
        minDate: "-28d",
        maxDate: new Date(),
        dateFormat: 'dd/mm/yy',


	});

	submitForm('idPaymentForm', doPaymentValidation, function(data) {
		jQuery('#idGo').html(data) ;
	}, '', true, {
		"click" : ".refreshHtmlTable",
		"hide_if_ok" : '#idPaymentForm'
	} );

</script>