<?php $rowIndex = \Qudratom\Utilities\RecordNo::rowIndex() ?>
<tr id="idRow{{$rowIndex}}">
	<input type="hidden" name="txtRowId[{{$rowIndex}}]" value="{{@$fragment->frg_id}}"/>
	@if( $type == '1' )
		<td class="vendor">
			<select type="text" id="form-field-1"
			        placeholder="Vendor / Beneficiary Select Box" name="selVendor[{{$rowIndex}}]"
			        class="form-control vendorData" style="min-width: 100px;">
				{!! DEFAULT_SELECT_TEXT !!}
				@foreach( $vendorOptions as $key => $value )
					<option
						{{ ((@$fragment->vendor_id == $key) ? 'selected="selected' : '') }} value="{{ $key }}">{{ $value }}</option>
				@endforeach
			</select>
			<label class="alert-danger cgm-error txtInvoice" id="eVendor{{$rowIndex}}"></label>
		</td>
	@elseif( $type == '3' )
		<td class="people">
			<select class="form-control" id="selPerson" name="selPerson[{{$rowIndex}}]" style="min-width: 100px;">
				{!! DEFAULT_SELECT_TEXT !!}
				@foreach( $peopleOptions as $key => $value )
					<option
						{{ ((@$fragment->person_id == $key) ? 'selected="selected' : '') }} value="{{ $key }}">{{ $value }}</option>
				@endforeach
			</select>
			<label class="alert-danger cgm-error " id="ePerson{{$rowIndex}}"></label>
		</td>
	@endif

	<td>
		<input type="text" id="form-field-1"
		       placeholder="" name="txtInvoice[{{$rowIndex}}]" value="{{ @$fragment->invoice }}"
		       class="form-control"/>
		<label class="alert-danger cgm-error txtInvoice" id="eInvoice{{$rowIndex}}"></label>
	</td>

	<td>
		<input type="text" id="form-field-1" onchange="jQuery('.txtAmount').calculation().sumTo('#txtTotalAmount');"
		       placeholder="Amount" name="txtAmount[{{$rowIndex}}]" value="{{ @$fragment->amount }}"
		       class="form-control txtAmount"/>
		<label class="alert-danger cgm-error txtAmount" id="eAmount{{$rowIndex}}"></label>
	</td>
	<td>
        <textarea class="form-control"
                  id="form-field-8" name="txtDescription[{{$rowIndex}}]"
                  placeholder="Narration">{{ @$fragment->description }}</textarea>
	</td>
	<td>
		<input type="file" id="form-field-1"
		       placeholder="File" name="filInvoice[{{$rowIndex}}]" value="{{ @$fragment->file }}"
		       class="form-control cgm-no-view"/>
		<div class="cgm-no-add clear">
			@if( @$fragment->file )
				<a target="_blank"
				   href="{{ \Qudratom\Utilities\FileUpload::downloadUrl(@$fragment->file) }}">Download</a>
			@endif
		</div>


	</td>
	<td class="{{$disable_edit}} cgm-no-view">
		<button
			onclick="jQuery('#idRow{{$rowIndex}}').remove();jQuery('.txtAmount').calculation().sumTo('#txtTotalAmount');"
			type="button" id="update_remove-1" class="btn btn-sm btn-danger cgm-row-remove">
			<i class="ace-icon fa fa-times bigger-110"></i>
		</button>

	</td>
</tr>