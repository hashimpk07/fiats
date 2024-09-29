<table id="print_table" class="table table-bordered no-margin">
	<tbody>
	<tr>
		<td class="col-xs-3">Beneficiary Name</td>
		<td class="col-xs-6">
			@foreach( $peopleOptions as $key => $value )
				{{ ((@$record->beneficiary_id == $key) ? $value : '') }}
				{{--<option value="{{ $key }}">{{ $value }}</option>--}}
			@endforeach
		</td>
		<td class="col-xs-3">اسم المستلم</td>
	</tr>
	<tr>
		<td class="col-xs-3">Beneficiary Mobile No.</td>
		<td class="col-xs-6">
		</td>
		<td class="col-xs-3">البيانات الشخصية</td>
	</tr>
	<tr>
		<td class="col-xs-3">Expense Type </td>
		<td class="col-xs-6">
		</td>
		<td class="col-xs-3">رقم الهاتف</td>
	</tr>
	<tr>
		<td class="col-xs-3">Amount</td>
		<td class="col-xs-6">
			{{ $record->amount }}
		</td>
		<td class="col-xs-3">المبلغ المستلم</td>
	</tr>
	<tr>
		<td class="col-xs-3">By Word</td>
		<td class="col-xs-6">
			{{ \Qudratom\Utilities\Helper::convert_number_to_words($record->amount,$record->currency_id) }}
		</td>
		<td class="col-xs-3">المبلغ بالحروف</td>
	</tr>
	<tr>
		<td class="col-xs-3">Ordered By</td>
		<td class="col-xs-6">
			HH.Sheikh Hamdan Bin Mohamed Bin Rashed Al Maktoum ℅ Saeed Jaber Abdulla Al Harbi
		</td>
		<td class="col-xs-3">عن طريق</td>
	</tr>
	<tr>
		<td class="col-xs-3">C/o</td>
		<td class="col-xs-6">
			@foreach( $careOfOptions as $key => $value )
				{{ ((@$record->careof_id == $key) ? $value : '') }}
			@endforeach
		</td>
		<td class="col-xs-3">&nbsp;</td>
	</tr>
	<tr>
		<td class="col-xs-3">Narration</td>
		<td class="col-xs-6">
			{{ $record->remarks }}
		</td>
		<td class="col-xs-3">التفاصيل</td>
	</tr>
	</tbody>
</table>