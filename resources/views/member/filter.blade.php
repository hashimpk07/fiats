    <tr id="searchFilterWrap">

        <td><input type="hidden" name="search" value="<?php echo \Illuminate\Support\Facades\Input::get('search') ; ?>" /> </td>
        <td></td>
        <td></td>
        <td>

            <div class="">
                <label>

                    <select onchange="submitThis();" class="search-field input-sm ui-select fiat_language" id="selSalution" name="selSalution">
                        {!! DEFAULT_ALL_TEXT !!}
                        <?php
                        foreach( $salutationOptions AS $k => $m ) {
                        $sel = (($k == \Illuminate\Support\Facades\Input::get('selSalution')) ? 'selected="selected"' : '');
                        ?>
                        <option {{ $sel }} value="{{ $k }}">{{ $m }}</option>
                        <?php
                        }
                        ?>
                    </select>
                    <label class="alert-danger cgm-error selSalution" id="eSalution"></label>
                </label>
            </div>
        </td>

        <td>

            <div class="">
                <label>

                    <select onchange="submitThis();" class="search-field input-sm  ui-select fiat_language" id="selGender" name="selGender" >
                        {!! DEFAULT_ALL_TEXT !!}
                        <?php
                        foreach( $genderOptions AS $k => $m ) {
                        $sel = (($k == \Illuminate\Support\Facades\Input::get('selGender') ) ? 'selected="selected"' : '');
                        ?>
                        <option {{ $sel }} value="{{ $k }}">{{ $m }}</option>
                        <?php
                        }
                        ?>
                    </select>
                    <label class="alert-danger cgm-error selGender" id="eGender"></label>
                </label>
            </div>

        </td>

        <td></td>



        <td>

            <div class="">
                <label>

                    <select onchange="submitThis();" class="search-field input-sm  ui-select fiat_language" id="selMaritalStatus" name="selMaritalStatus" >
                        {!! DEFAULT_ALL_TEXT !!}
                        <?php
                        foreach( $maritalStatusOptions AS $k => $m ) {
                        $sel = (($k == \Illuminate\Support\Facades\Input::get('selMaritalStatus')  ) ? 'selected="selected"' : '');
                        ?>
                        <option {{ $sel }} value="{{ $k }}">{{ $m }}</option>
                        <?php
                        }
                        ?>
                    </select>
                    <label class="alert-danger cgm-error selMaritalStatus" id="eMaritalStatus"></label>
                </label>
            </div>

        </td>
        <td>
            <div class="">
                <label>
                    <select onchange="submitThis();" class="search-field input-sm  ui-select fiat_language" id="selAgeGroup" name="selAgeGroup" >
                        {!! DEFAULT_ALL_TEXT !!}
                        <?php
                        foreach( \App\Models\Virtual\AgeGroups::collections() AS $k => $m ) {
                        $sel = (($k == \Illuminate\Support\Facades\Input::get('selAgeGroup')  ) ? 'selected="selected"' : '');

                        ?>
                        <option {{ $sel }} value="{{ $k }}">{{ $m }}</option>
                        <?php
                        }
                        ?>
                    </select>
                    <label class="alert-danger cgm-error selAgeGroup" id="eAgeGroup"></label>
                </label>
            </div>
        </td>

        <td>

            <div class="">
                <label>

                    <select onchange="submitThis();" class="search-field input-sm  ui-select fiat_language" id="selLanguage" name="selLanguage" >
                        {!! DEFAULT_ALL_TEXT !!}
                        <?php
                        foreach( $languageOptions AS $k => $m ) {
                        $sel = (($k == \Illuminate\Support\Facades\Input::get('selLanguage') ) ? 'selected="selected"' : '');
                        ?>
                        <option {{ $sel }} value="{{ $k }}">{{ $m }}</option>
                        <?php
                        }
                        ?>
                    </select>
                    <label class="alert-danger cgm-error selLanguage" id="eLanguage"></label>
                </label>
            </div>

        </td>

        <td>

            <div class="">
                <label>

                    <select onchange="submitThis();" class="search-field input-sm ui-select fiat_language" id="selTestament" name="selTestament" >
                        {!! DEFAULT_ALL_TEXT !!}
                        <?php
                        foreach( \App\Models\Virtual\Testaments::collections() AS $k => $m ) {
                        $sel = (($k == \Illuminate\Support\Facades\Input::get('selTestament') ) ? 'selected="selected"' : '');
                        ?>
                        <option {{ $sel }} value="{{ $k }}">{{ $m }}</option>
                        <?php
                        }
                        ?>
                    </select>
                    <label class="alert-danger cgm-error selTestament" id="eTestament"></label>
                </label>
            </div>

        </td>






        <td>

        <div class="">
            <label>

                <select onchange="submitThis();" class="search-field input-sm  ui-select fiat_language" id="selStatus" name="selStatus" >
                    {!! DEFAULT_ALL_TEXT !!}
                    <?php
                    foreach( \App\Models\Virtual\StatusTypes::collections() AS $k => $m ) {
                    $sel = (($k == \Illuminate\Support\Facades\Input::get('selStatus') ) ? 'selected="selected"' : '');
                    ?>
                    <option {{ $sel }} value="{{ $k }}">{{ $m }}</option>
                    <?php
                    }
                    ?>
                </select>
                <label class="alert-danger cgm-error selStatus" id="eStatus"></label>
            </label>
        </div>

        </td>

        <td></td>

        </tr>


