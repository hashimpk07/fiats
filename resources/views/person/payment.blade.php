<input type="hidden" id="txtId" name="txtAmount" value=" {{ number_format( $memberCount * $baseAmount, 2) }}" />
<div class="row">
    <div class="col-xs-6 col-sm-6 number">
        <h5>Payment Mode</h5>
    </div>
    <div class="col-xs-6 col-sm-6">
        <div class=" mob-search">
            <select name="selPaymentMode" id="selPaymentMode" style="width:65%" class="form-control" >
                {!! DEFAULT_SELECT_TEXT !!}
                <?php
                foreach( $paymentModeOptions AS $k => $m ) {
                    $sel = (($k == @$record->payment_mode_id) ? 'selected="selected"' : '');
                ?>
                <option {{ $sel }} value="{{ $k }}">{{ $m }}</option>
                <?php } ?>
            </select>
        </div>
        <label class="alert-danger cgm-error selPaymentMode" id="ePaymentMode"></label>
    </div>
</div>

<div class="row">
    <div class="col-xs-6 col-sm-6 number">
        <h5>Date</h5>
    </div>
    <div class="col-xs-6 col-sm-6">
        <div class=" mob-search">
            <input style="width: 65%" class="input-medium form-control date-picker" id="txtPaymentDate"  name="txtPaymentDate" value="{{ @$record->date }}"
                   data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy"   />
        </div>
        <label class="alert-danger cgm-error txtPaymentDate" id="ePaymentDate"></label>
    </div>
</div>


<div class="row">
    <div class="col-xs-6 col-sm-6 number">
        <h5>Reference No</h5>
    </div>
    <div class="col-xs-6 col-sm-6">
        <div class=" mob-search">
            <input style="width: 65%" type="text" id="txtRefNo" name="txtRefNo" class="form-control" placeholder="Reference No" value="{{ @$record->ref_no }}" />
        </div>
        <label class="alert-danger cgm-error txtRefNo" id="eRefNo"></label>
    </div>
</div>

<div class="row">
    <div class="col-xs-6 col-sm-6 number">
        <h5>Remarks</h5>
    </div>
    <div class="col-xs-6 col-sm-6">
        <div class=" mob-search">
            <textarea  class="form-control" placeholder="Remarks" name="txtRemarks" style="width:65%">{{ @$record->remarks }}</textarea>
            <label class="alert-danger cgm-error " id="eRemarks"></label>
        </div>
    </div>
</div>

