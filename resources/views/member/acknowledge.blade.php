<section class="bible">
	<div id="idMemberAddForm" class="form-basic {{$CGM_MODE or ''}}">
		<?php echo Form::open( array( 'url' => $url, 'id' => 'idMemberForm', 'class' => 'form-horizontal' ) );  ?>

		<div class="container fiat-log ">
		<div class="col-md-12 col-sm-12 ">
			<div class="bible-background ">
				<h3>Bible Reception Acknowledgement</h3>


				<div class="date-datepicker">

					<div class="col-sm-6 col-md-6">
						<h5>Date</h5>

					</div>
					<div class="col-sm-6 col-md-6">
						<div class="input-group date-serach ">

							<?php
							if($record->ack_dt=='0000-00-00'){
								$date=  \Qudratom\Utilities\DateTime::clientDate( Date('Y-m-d'));
							}
							else
							{
							$date= \Qudratom\Utilities\DateTime::clientDate(@$record->ack_dt);
							}
							?>
							<input style="float:none;" class="input-medium date-picker form-control" id="txtDate" value="{{ $date }}"  type="text" name="txtDate"
								   data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy"   />
								<span  class="input-group-addon" id=" datepicker"> <i class="fa fa fa-calendar"
																					 style="font-size: 15px"></i> </span>


						</div>
						<label class="alert-danger cgm-error " id="eDate"></label>

					</div>
				</div>
				<div class="date-remarks">

					<div class="col-sm-6 col-md-6">
						<h5>Remarks</h5>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="date-text">
							<textarea class="form-control" placeholder="Remark" id="txtRemarks" name="txtRemarks">{{@$record->ack_remarks }}</textarea>
						</div>
						<label class="alert-danger cgm-error " id="eRemarks"></label>

					</div>
				</div>
				<div class="bible-button" style="text-align: center">
					<button  type="submit" name="btnNext" value="Ok" class="btn btn-primary center fiat-buttons" >
						Acknowledge
					</button>
					<button class="btn btn-primary center fiat-buttons cgm-cancel" type="button" onclick=" jQuery('#idMemberAddWrap').html(''); ">
						Cancel
					</button>
				</div>

			</div>
		</div>

	</div>

			<?php echo Form::close(); ?>

	</div>
</section>







<script>
	$( function() {
		$( ".datepicker" ).datepicker();

	} );

	function doMemberValidation() {

		var a = {
			 '#txtDate': {func: 'required()', errfield: '#eDate', errmsg: 'Invalid Date'},
			 '#txtRemarks': {func: 'required()', errfield: '#eRemarks', errmsg: 'Please type remarks'},
		};

		if ( validateForm( a, '' ) ) {
			return true;
		}
		return false;
	}

	/* submitForm( formName, beforeFunctionm, afterFunction, targetId, autofill json response); */
	submitForm( 'idMemberForm', doMemberValidation, function ( data ) {
	}, '', true, {
		"click"     : ".refreshHtmlTable",
		"hide_if_ok": '#idMemberForm'
	} );
	<?php
		if( $CGM_MODE == VIEW ) {
		?>
			activateView();
	<?php
	}
	?>

    jQuery( ".date-picker" ).datepicker({changeMonth: true,
		changeYear: true,
				dateFormat: 'dd-mm-yy'});
</script>