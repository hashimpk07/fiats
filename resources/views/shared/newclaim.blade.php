<div class="subheading" style="margin-top: 30px; margin-left: 10px;">
    <h4>New Claim Confirmation</h4>
</div>

<form id="idNewClaim" action="<?php echo $url; ?>" >

    <div class="col-md-12 col-sm-12 col-xs-12">

        <div class="form-group">
            <label  style="margin-top: 10px;" class="col-sm-12 control-label no-padding-right" for="form-field-1">
                New Claim with amount <b>{{ $amount }}</b> will created.
            </label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="clearfix form-actions">
            <div class="col-md-offset-3 col-md-9 col-xs-12">
                <button class="btn btn-info mform_btn cgm-save" type="submit">
                    <i class="ace-icon fa fa-search bigger-110"></i>
                    Confirm
                </button>

            </div>
        </div>
    </div>

</form>


<script type="text/javascript">
    submitForm('idNewClaim', null, null, null, true, {
        "click"     : ".refreshHtmlTable",
        "hide_if_ok": '.cgm-addform-wrap'
    } ) ;
</script>