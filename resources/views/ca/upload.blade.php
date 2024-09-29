<div id="idCashAdvanceUploadForm" class="{{$CGM_MODE or ''}}" >
	<?php echo Form::open(array( 'url' => $url, 'id' => 'idCashAdvanceUploadForm', 'class' => 'form-horizontal' ) );  ?>
	<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
				File Upload
			</label>


			<div class="col-sm-9">
				<input type="File"  name="txtFileUpload" id="txtFileUpload"
					   class="col-xs-10 col-sm-5 cgm-disabled-edit"   />
				<label class="alert-danger cgm-error txtFileUpload" id="eFileUpload"></label>
				<!--<span data-title="Choose" class="ace-file-container"><span data-title="No File ..." class="ace-file-name"><i class=" ace-icon fa fa-upload"></i></span></span>-->
			</div>
		</div>
	</div><!-- /.col -->

		<div class="col-md-12 cgm-no-view">
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9 col-xs-12">
					<button class="btn btn-info mform_btn cgm-save" type="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Ok
					</button>

					<button class="btn mform_btn cgm-cancel cgm-cancel" type="button" onclick="toggleAddForm('#idCashAdvanceUploadForm', false, '.cgm-add-button');">
						<i class="ace-icon fa fa-times bigger-110"></i>
						Cancel
					</button>
				</div>
			</div>
		</div>
		</form>
</div>
<script type="text/javascript">
	function doCashAdvanceValidation()
	{
		var a = {

			'#txtFileUpload' :{ func : 'required()' , errfield : '#eFileUpload', errmsg  : 'File Not  selected' },

		};

		if( validateForm(a, '' ) )
		{
			return true ;
		}
		return false ;
	}

	/* submitForm( formName, beforeFunctionm, afterFunction, targetId, autofill json response); */
	submitForm('idCashAdvanceUploadForm', doCashAdvanceValidation, function(data) { }, '', true, {
		"click" : ".refreshHtmlTable",
		"hide_if_ok" : '#idCashAdvanceUploadForm'
	} );


//	function SubmitForm() {
//		alert('inside submit form');
//		/* submitForm( formName, beforeFunctionm, afterFunction, targetId, autofill json response); */
//		submitForm('idCashAdvanceUploadForm', doCashAdvanceValidation, function(data) { }, '', true, {
//			"click" : ".refreshHtmlTable",
//			"hide_if_ok" : '#idCashAdvanceUploadForm'
//		} );
//	}



</script>