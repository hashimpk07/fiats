<div class="form-group ">
    <label class="col-sm-3 control-label no-padding-right"></label>
    <div class="col-sm-9">
        <input value="1" name="radMode"  class="radioCheck radioMode1" type="radio" value="" checked="checked" onclick="jQuery('.money-source-group-rad').hide();jQuery('.money-source-account').show();jQuery('#btnSaveClaim').show();jQuery('.no-claim').show();" > Account &nbsp; &nbsp; &nbsp;
        <input value="2" name="radMode"  class="radioCheck radioMode2" type="radio" value="" onclick="jQuery('.money-source-group-rad').hide();jQuery('.money-source-advance').show();jQuery('#btnSaveClaim').show();jQuery('.no-claim').show();" > Advance &nbsp; &nbsp; &nbsp;
        <input value="3" name="radMode"  class="radioCheck radioMode3" type="radio" value="" onclick="jQuery('.money-source-group-rad').hide();jQuery('.money-source-claim').show();jQuery('#btnSaveClaim').hide();jQuery('.no-claim').hide();" > Claim
        <label class="alert-danger cgm-error txtVoucher" id="eVoucher"></label>
    </div>
</div>

<div class="form-group money-source-group-rad money-source-account">
    <label class="col-sm-3 control-label no-padding-right" for="selAccount">
        Account </label>

    <div class="col-sm-9">
        <select name="selAccount" id="selAccount"
                onchange="postField('{{ action('AjaxController@getAccountCurrencyOptions') }}', '#selAccount', {}, null, null, function(data){ jQuery('#selCurrency').html(data) } );"
                class="col-xs-10 col-sm-5">
            {!! DEFAULT_SELECT_TEXT !!}
            @foreach( $accountOptions as $key => $value )
                <option
                        {{ ((@$record->cash_account_id == $key) ? 'selected="selected' : '') }} value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="cgm-master-link cgm-no-view"
             onclick="showMasterPopup(
                     '<?php echo action( 'CashAccountController@add' );?>',
                     '<?php echo action( 'AjaxController@options', 'account' );?>',
                     '#selAccount')">
            <span class="fa fa-plus"></span>
        </div>
        <label class="alert-danger cgm-error selAccount" id="eAccount"></label>
    </div>
</div>

<div class="form-group money-source-group-rad money-source-account">
    <label class="col-sm-3 control-label no-padding-right" for="selCurrency">
        Currency </label>

    <div class="col-sm-9">
        <select class="col-xs-10 col-sm-5" name="selCurrency" id="selCurrency">
            {!! DEFAULT_SELECT_TEXT !!}
            @foreach( $currencyOptions as $key => $value )
                <option
                        {{ ((@$record->currency_id == $key) ? 'selected="selected' : '') }} value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <label class="alert-danger cgm-error selCurrency" id="eCurrency"></label>
    </div>
</div>


<div class="form-group money-source-advance money-source-group-rad" style="display: none;">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
        Advance </label>

    <div class="col-sm-9">
        <select class="col-xs-10 col-sm-5" name="selAdvance" id="selAdvance">
            {!! DEFAULT_SELECT_TEXT !!}
            @foreach( $advanceOptions as $key => $value )
                <option
                        {{ ((@$record->advance_id  == $key) ? 'selected="selected' : '') }} value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <label class="alert-danger cgm-error selAdvance" id="eAdvance"></label>
    </div>
</div>

<div class="form-group money-source-claim money-source-group-rad" style="display: none;">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
        Claim </label>

    <div class="col-sm-9">
        <select class="col-xs-10 col-sm-5" name="selClaim" id="selClaim">
            {!! DEFAULT_SELECT_TEXT !!}
            @foreach( $claimOptions as $key => $value )
                <option {{ ((@$record->claim_id == $key) ? 'selected="selected' : '') }} value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <label class="alert-danger cgm-error selClaim" id="eClaim"></label>
    </div>
</div>

<script type="text/javascript">
    jQuery('.radioMode<?php echo intval(@$record->radio_mode);?>').click() ;
</script>