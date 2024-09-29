<div id="idCashAdvanceAddForm" class="{{$CGM_MODE or ''}}" >
    <?php echo Form::open(array( 'url' => $url, 'id' => 'idCashAdvanceForm', 'class' => 'form-horizontal' ) );  ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="form-group cgm-no-add">
            <label class="col-sm-3 control-label no-padding-right"
                   for="form-field-1">
                Voucher ID </label>

            <div class="col-sm-9">
                <input type="text" id="form-field-1"
                       placeholder="Auto Generated"
                       class="col-xs-10 col-sm-5 cgm-disabled-edit" value="{{$record->voucher_id or '' }}"  />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right"
                   for="form-field-date">Date</label>
            <div class="col-sm-9">
                <div class="input-medium">
                    <div class="input-group col-xs-10 col-sm-5">
                        <input class="input-medium date-picker" id="txtDate" type="text" name="txtDate"
                               data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" value="{{ \Qudratom\Utilities\Something::valueByMode( \Qudratom\Utilities\DateTime::clientDate( Date('Y-m-d') ), \Qudratom\Utilities\DateTime::clientDate(@$record->dt), null, $CGM_MODE ) }}"  />
                                    <span class="input-group-addon">
                                        <i class="ace-icon fa fa-calendar"></i>
                                    </span>
                        <label class="alert-danger cgm-error txtDate" id="eDate"></label>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="selAccount">
                Account* </label>

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

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="selCurrency">
                Currency* </label>

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



        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                Beneficiary* </label>

            <div class="col-sm-9">
                <select class="col-xs-10 col-sm-5" name="selBeneficiary" id="selBeneficiary" >
                    {!! DEFAULT_SELECT_TEXT !!}
                    @foreach( $peopleOptions as $key => $value )
                        <option {{ ((@$record->beneficiary_id == $key) ? 'selected="selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                <label class="alert-danger cgm-error selBeneficiary" id="eBeneficiary"></label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                C/O </label>

            <div class="col-sm-9">
                <select class="col-xs-10 col-sm-5" name="selCareOf" id="selCareOf" >
                    {!! DEFAULT_SELECT_TEXT !!}
                    @foreach( $careOfOptions as $key => $value )
                        <option {{ ((@$record->careof_id == $key) ? 'selected="selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                <label class="alert-danger cgm-error selCareOf" id="eCareOf"></label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right"
                   for="form-field-1">
                Purpose
            </label>

            <div class="col-sm-9">
                    <textarea
                            placeholder="Purpose" name="txtPurpose"
                            class="col-xs-10 col-sm-5">{{$record->purpose or '' }}</textarea>
                <label class="alert-danger cgm-error txtPurpose" id="ePurpose" ></label>
            </div>
        </div>
        <!--    <div class="form-group cgm-no-view">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Balance</label>
                <div class="col-sm-9">
                    <input type="text" id="txtBalance" readonly="readonly" placeholder="Balance" class="col-xs-10 col-sm-5" name="txtBalance" value=100 />

                </div>
            </div>-->

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right"
                   for="form-field-1">
                Amount*
            </label>

            <div class="col-sm-9">
                <input type="text" id="txtAmount"
                       placeholder="Amount" name="txtAmount" value="{{$record->amount or '' }}"
                       class="col-xs-10 col-sm-5 text-currency" />
                <label class="alert-danger cgm-error txtAmount" id="eAmount" ></label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right"
                   for="form-field-1">
                Narration
            </label>

            <div class="col-sm-9">
                <textarea class="col-xs-10 col-sm-5" placeholder="Narration" name="txtRemarks">{{$record->remarks or '' }}</textarea>
                <label class="alert-danger cgm-error txtAmount" id="eRemarks" ></label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                Receiver*
            </label>

            <div class="col-sm-9">
                <select class="col-xs-10 col-sm-5" name="selReceiver" id="selReceiver" >
                    {!! DEFAULT_SELECT_TEXT !!}
                    @foreach( $peopleOptions as $key => $value )
                        <option {{ ((@$record->receiver_id == $key) ? 'selected="selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                <div class="cgm-master-link cgm-no-view"
                     onclick="showMasterPopup(
                             '<?php echo action( 'PeopleController@add' );?>',
                             '<?php echo action( 'AjaxController@options', 'people' );?>',
                             '#selReceiver')"><span class="fa fa-plus"></span></div>
                <label class="alert-danger cgm-error selReceiver" id="eReceiver"></label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                Relationship </label>

            <div class="col-sm-9">
                <select class="col-xs-10 col-sm-5" name="selRelation" id="selRelation" >
                    {!! DEFAULT_SELECT_TEXT !!}
                    @foreach( $relationOptions as $key => $value )
                        <option {{ ((@$record->receiver_relation_id == $key) ? 'selected="selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                <label class="alert-danger cgm-error selRelation" id="eRelation"></label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                Accountant* </label>

            <div class="col-sm-9">
                <select class="col-xs-10 col-sm-5" name="selAccountant" id="selAccountant" >
                    {!! DEFAULT_SELECT_TEXT !!}
                    @foreach( $accountantOptions as $key => $value )
                        <option {{ ((@$record->accountant_id == $key) ? 'selected="selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                <label class="alert-danger cgm-error selAccountant" id="eAccountant"></label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                Approved By*
            </label>

            <div class="col-sm-9">
                <select class="col-xs-10 col-sm-5" name="selApproved" id="selApproved" >
                    {!! DEFAULT_SELECT_TEXT !!}
                    @foreach( $approvableOptions as $key => $value )
                        <option {{ ((@$record->approved_id == $key) ? 'selected="selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                <label class="alert-danger cgm-error selApproved" id="eApproved"></label>
            </div>
        </div>
        <div class="form-group cgm-no-add">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                Prepared By
            </label>

            <div class="col-sm-9">
                <input type="text" value="{{ @$record->prepared_name }}" readonly="readonly" class="col-xs-10 col-sm-5" />
            </div>
        </div>


        @if( @$record->attachment_file )
            <div class="form-group cgm-no-add cgm-no-edit">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                    File
                </label>

                <div class="col-sm-9 file_container">
                    <div class="clear col-xs-10 col-sm-5">
                        <a target="_blank" href="{{ \Qudratom\Utilities\FileUpload::downloadUrl(@$record->attachment_file) }}" >
                            <img class="cgm-thumb" src="{{ \Qudratom\Utilities\FileUpload::downloadUrl(@$record->attachment_file) }}" width="80" height="80" />
                        </a>

                    </div>
                </div>
            </div>
        @endif




    </div><!-- /.col -->
    <div class="col-md-12 cgm-no-view">
        <div class="clearfix form-actions">
            <div class="col-md-offset-3 col-md-9 col-xs-12">
                <button class="btn btn-info mform_btn cgm-save" type="submit">
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    Submit
                </button>

                <button class="btn mform_btn cgm-cancel cgm-cancel" type="button" onclick="toggleAddForm('#idCashAdvanceAddForm', false, '.cgm-add-button');">
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
            '#txtDate' :{ func : 'required()' , errfield : '#eDate', errmsg  : 'Invalid date' },
            '#selAccount' :{ func : 'notvalue("")' , errfield : '#eAccount', errmsg  : 'Account not selected' },
            '#selCurrency' :{ func : 'notvalue("")' , errfield : '#eCurrency', errmsg  : 'Currency not selected' },
            '#txtAmount' :{ func : 'currency(1)' , errfield : '#eAmount', errmsg  : 'Invalid amount' },
            '#txtAmount@1' :{ func : 'lteq( parseFloat(jQuery("#txtBalance").val()) )' , errfield : '#eAmount', errmsg  : 'Must be less than balance' },
            '#selBeneficiary' :{ func : 'notvalue("")' , errfield : '#eBeneficiary', errmsg  : 'Beneficiary not selected' },
            '#selAccountant' :{ func : 'notvalue("")' , errfield : '#eAccountant', errmsg  : 'Accoutant not selected' },
            '#selApproved' :{ func : 'notvalue("")' , errfield : '#eApproved', errmsg  : 'Accoutant not selected' },
            '#selReceiver' :{ func : 'notvalue("")' , errfield : '#eReceiver', errmsg  : 'Receiver not selected' }
        };

        if( validateForm(a, '' ) )
        {
            return true ;
        }
        return false ;
    }

    /* submitForm( formName, beforeFunctionm, afterFunction, targetId, autofill json response); */
    submitForm('idCashAdvanceForm', doCashAdvanceValidation, function(data) { }, '', true, {
        "click" : ".refreshHtmlTable",
        "hide_if_ok" : '#idCashAdvanceForm'
    } );

    function onClaimChange(index) {

        if( jQuery('#selClaim').val() == "" )
        {
            if( index == 1 ) {
                jQuery('#selCurrency').val("");
                jQuery('#selAccount').val("");
            }
            jQuery('#selCurrency, #selAccount').attr('data-event', "1") ;
        }
        else {
            jQuery('#selCurrency, #selAccount').attr('data-event', "0") ;
        }
        if( index > 1 ) {
            if( jQuery('#selCurrency, #selAccount').attr('data-event') == "1" ) {
                postForm('<?php echo action('CashAdvanceController@onQueryBalance') ;?>', 'idCashAdvanceForm');
            }
        }
        else {
            postForm('<?php echo action('CashAdvanceController@onQueryBalance') ;?>', 'idCashAdvanceForm');
        }
    }
    <?php
        if( $CGM_MODE == VIEW ) {
        ?>
            activateView() ;
    <?php
    }
    ?>
</script>