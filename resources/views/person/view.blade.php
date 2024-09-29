<div class="col-md-1"></div>
<div id="idPersonAddWrap" class="form-basic {{$CGM_MODE or ''}} show  col-md-10" style="float:left; padding: 10px" >
    <?php echo Form::open( array( 'url' => $url, 'id' => 'idPersonForm', 'class' => 'form-horizontal' ) );  ?>

    <?php if( @$record->id ) { ?>
        <input type="hidden" id="txtId" name="txtId" value="{{ @$record->id }}" />
    <?php } ?>

    <div class="form-title-row">
        <h3 style="text-align: center">Participant Details</h3>
    </div>

        <div class="form-row">

            <span>Reg No</span>
            <label>{{ @$record->reg_no }}
            </label>

        </div>

    <div class="form-row">

            <span>Mobile Number</span>
            <label>{{ @$record->mobile }}</label>

    </div>

    <div class="form-row">

            <span>Email Id</span>
            <label>{{ @$record->email }}
            </label>

    </div>

        <div class="form-row">

            <span>Name</span>
                <?php
                foreach( $salutationOptions AS $k => $m ) {
                if( $k === @$record->salutation_id ) {
                ?>
                <label> {{ $m }}
                <?php
                break ;
                        }
                }
                ?>
            </select>
                    &nbsp;{{ @$record->name }} </label>
            <label class="alert-danger cgm-error " id="eName"></label>

    </div>

        <div class="form-row">

            <?php if($record->gender=="M")
                $gende="Male";
                else if($record->gender=="F")
                  $gende="Female";
                else
                    $gende='Other';
               ?>

            <span>Gender</span>
            <label  id="radGender" name="radGender">{{ $gende }}</label>
            <label class="alert-danger cgm-error " id="radGender"></label>

    </div>

    <div class="form-row">

            <span>Religion</span>
            <label  id="txtMobile" name="txtMobile">{{ @$record->religion }} </label>
            <label class="alert-danger cgm-error " id="ePhone"></label>

    </div>

        <div class="form-row">
            <?php
            $date=date("d-m-Y", strtotime(@$record->dob)); ?>

            <span>Date Of Birth</span>
            <label  id="datepicker" name="txtDob">{{ $date }} </label>
            <label class="alert-danger cgm-error " id="ePhone"></label>

        </div>

    <!--<div class="form-row" style="display: none;">

            <span>Caste</span>
            <label  id="txtCaste" name="txtCaste">{{ @ $record->caste }} </label>
            <label class="alert-danger cgm-error " id="ePhone"></label>

    </div>-->


    <div class="form-row">

            <span>Marital status</span>

				<?php
					foreach( $maritalStatusOptions AS $k => $m ) {

                    if ( $k === @$record->marital_status) {
				?>
                <label>{{ $m }}</label>
				<?php
                    break ;
					}

                }
				?>

            <label class="alert-danger cgm-error " id="eMaritalStatus"></label>

    </div>

    <div class="form-row">

            <span>Occupation</span>
            <label  id="txtOccupation" name="txtOccupation" >{{ @$record->occupation }} </label>
            <label class="alert-danger cgm-error " id="ePhone"></label>

    </div>

    <div class="form-row">

            <span>Parish</span>
            <label  id="txtParish" name="txtParish" >{{ @$record->parish }} </label>
            <label class="alert-danger cgm-error " id="ePhone"></label>

    </div>

    <div class="form-row">

            <span>Diocese</span>
            <label  id="txtDiocese" name="txtDiocese" >{{ @$record->diocese }} </label>
            <label class="alert-danger cgm-error " id="ePhone"></label>

    </div>

        <div class="form-row">
            <?php if($record->testament=='N')
                $testament="New";
                else
                     $testament="Full";
                ?>

                <span>Testament</span>
                <label  id="fiat-testament" name="radTestament" >{{$testament }} </label>
                <label class="alert-danger cgm-error " id="radGender"></label>

        </div>

        <div class="form-row">

            <span>Language</span>
                <?php
                foreach( $languageOptions AS $k => $m )
                {

                    if($k === @$record->language_id)
                    {   ?>
                        <label>{{ $m }}</label>
                        <?php
                        break ;
                    }
                    else
                    {
                        if( @$record->language_id > 5 && $k == 5 )
                        {
                            ?>
                            <label>{{ $m ." (". @$language_name .")"  }}</label>
                            <?php
                            break ;
                        }
                    }
                }
                ?>
            <label class="alert-danger cgm-error " id="eLang"></label>



    <div class="form-row">

            <span>Address</span>
            <label  id="fiat-testament" name="radTestament" >{{ @$record->address }} </label>
            <label class="alert-danger cgm-error " id="radGender"></label>

    </div>

            <div class="form-row">

                <?php
                $date=  \Qudratom\Utilities\DateTime::clientDate( $record->ack_dt );
                    if( strlen($date) > 0 ) {
                $date = " (" . $date . ")" ;
                }
                ?>
                    <span>Status</span>
                    <label>{{ \App\Models\Virtual\StatusTypes::explain( $record->status ) . $date }}</label>
                    <label class="alert-danger cgm-error " id="eLang"></label>

            </div>

        <div class="form-row" style="text-align: center">
            <button class="fiat-buttons btn btn-primary cgm-cancel" type="button" onclick=" jQuery('#idMemberAddWrap').html(''); ">
                Close
            </button>
        </div>

        <?php echo Form::close(); ?>


</div>

<div class="col-md-1"></div>