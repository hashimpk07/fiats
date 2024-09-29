@if( count($records) < 1 )
	<tr class="cgm-norecords">
		<td colspan="100%">{!! DEFAULT_NO_RECORD_MESSAGE !!}</td>
	</tr>
	<?php return; ?>
@endif
@foreach ($records as $record )
	<tr>
		<td>{{ $records->recordno->getNext() }}</td>
		<td>{{ $record->id }}</td>
		<td>{{  \Qudratom\Utilities\DateTime::clientDate($record->dt) }}</td>
		<td>{{ $record->account_name }}</td>
		<td>{{ $record->currency_code }}</td>
		<td>{{ \Qudratom\Utilities\Helper::numberFormat($record->amount) }}</td>
		<td>{{ $record->beneficiary_name }}</td>
		<td>{{ $record->total_return}}</td>

		<td class="hidden-480">
			<span class="label label-sm label-success">{{ (($record->status == 'C') ? 'Confirmed' : 'Draft') }}</span>
		</td>


		<td class="action-column">
			<div class="action-buttons">
				<a class="blue" href="javascript:;"
				   onclick="actionForm('{{ action('CashAdvanceController@view', [$record->id] ) }}', {}, 'idCashAdvanceAddWrap' )">
					<i class="ace-icon fa fa-search-plus bigger-130" title="View"></i>
				</a>
				<?php if( $record->status == 'C' ) { ?>
				<a class="blue" href="{{ action('CashAdvanceReturnController@return', [$record->id] ) }}">
					<i class="ace-icon fa fa-reply bigger-130"></i>
				</a>
				<a class="blue" href="javascript:void(0);" >
					<i class="ace-icon fa fa-upload bigger-130"
					   onclick="showMasterPopup(
						   '<?php echo action( 'CashAdvanceController@upload', [ $record->id ] );?>','','')"
					   title="Upload File"></i>

				</a>
				<a id="print_{{ $record->id }}" class="blue" target="_blank"
				   href="{{ action('CashAdvanceController@printout', [$record->id] ) }}">
					<i class="ace-icon fa fa-print bigger-130" title="Print"></i>
				</a>
				<?php } ?>

				<?php if( $record->status == 'D' ) { ?>
				<a class="blue" href="#"
				   onclick="actionForm('{{ action('CashAdvanceController@conform', [$record->id] ) }}', {}, 'idCashAdvanceAddWrap',null, onAjaxResult )">
					<i class="ace-icon fa fa-check-circle-o bigger-130" title="Confirm"></i>
				</a>
				<a class="green" href="javascript:;"
				   onclick="actionForm('{{ action('CashAdvanceController@edit', [$record->id] ) }}', {}, 'idCashAdvanceAddWrap' )">
					<i class="ace-icon fa fa-pencil bigger-130" title="Edit"></i>
				</a>
				<a class="red" href="javascript:;"
				   onclick="actionFlag('{{ action('CashAdvanceController@delete', [$record->id] ) }}', {}, 'Delete this item?','idCashAdvanceReturnTabularWrap',null, onAjaxResult )">
					<i class="ace-icon fa fa-trash-o bigger-130" title="Delete"></i>
				</a>

				<?php } ?>
			</div>

		</td>
	</tr>
@endforeach