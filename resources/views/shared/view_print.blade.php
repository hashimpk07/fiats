@include('layouts.ace.header')
@include('layouts.ace.scripts')

<style>
	.action-column {
		display : none;
	}

	.bg-white {
		background-color : #FFF;
	}

	.middle {
		vertical-align : middle !important;
		text-align     : center !important;
	}

	.bordered {
		border : 1px solid black !important;
	}

	.table-borderless tbody tr td, .table-borderless tbody tr th, .table-borderless thead tr th {
		border : none;
	}

	/*.table-bordered tbody tr td, .table-bordered tbody tr th, .table-bordered thead tr th {
		border : 1px solid black !important;
	}*/

	.table-striped > tbody > tr:nth-child(odd) {
		background-color : #FFFFFF !important;
	}

	th {
		background-color : #FFFFFF !important;
	}

	.no-margin {
		margin : 0 !important;
	}

	.no-padding {
		padding : 0 !important;
	}

	.pagination {
		display : none;
	}

	#print_table td:nth-child(odd) {
		background-color : #D6E3BC !important;
	}

	.padded {
		padding : 5px;
	}

	#footer > div > div {
		text-align : center;
	}

	.margin-10-vertical {
		margin : 10px 0 10px 0 !important;
	}

	@media print and (-webkit-min-device-pixel-ratio : 0) {
		#print_table td:nth-child(odd) {
			background-color : #D6E3BC !important;
		}

		.table-striped > tbody > tr:nth-child(odd) {
			background-color : #FFFFFF !important;
		}

		th {
			background-color : #FFFFFF !important;
		}
	}
</style>

<body class="bg-white printpreview">
<div class="container">
	<div class="row">
		<div class="checkbox col-xs-4 center margin-10-vertical">
			<label>
				<input type="checkbox" onclick="hideHeader();" class="ace ace-switch ace-switch-6" value="hide_header"
				       id="hide_header">
				<span class="lbl">&emsp;Hide Header</span>
			</label>
		</div>
		<div class="checkbox col-xs-4 center margin-10-vertical">
			<label>
				<input type="checkbox" onclick="hideFooter();" class="ace ace-switch ace-switch-6" value="hide_footer"
				       id="hide_footer">
				<span class="lbl">&emsp;Hide Footer</span>
			</label>
		</div>
		<div class="col-xs-4 center margin-10-vertical">
			<button type="button" class="btn" onclick="print_div('printable_div');">
				<i class="fa fa-print"></i>
				Print
			</button>
		</div>
	</div>
</div>
<div id="printable_div" class="container-fluid no-padding">
	<table id="header" class="table table-borderless col-xs-12 bordered no-margin">
		<tbody>
		<tr>
			<td class="col-xs-5 middle">
				{!! HTML::image('public/assets/img/left.jpg', 'left', ['style' => 'width: 50%'] )  !!}
			</td>
			<td class="col-xs-5 middle">
				{!! HTML::image('public/assets/img/right.jpg', 'left', ['style' => 'width: 50%'] )  !!}
			</td>
		</tr>
		<tr>
			<td colspan="3" class="middle">{{ $caption }}</td>
		</tr>
		</tbody>
	</table>
	<div class="col-xs-12 bordered padded">
		{!! $print_content !!}
	</div>
	<div id="footer" class="col-xs-12 bordered padded">
		<div class="col-xs-4">
			<div class="col-xs-12">معتمد الصرف</div>
			<div class="col-xs-12">Approved By</div>
			<div class="col-xs-12">
				@foreach( $accountantOptions as $key => $value )
					{{ ((@$record->approved_id == $key) ? $value : '') }}
				@endforeach
			</div>
			<div class="col-xs-12">&nbsp;</div>
		</div>
		<div class="col-xs-4">
			<div class="col-xs-12">المحاسب</div>
			<div class="col-xs-12">Accountant</div>
			<div class="col-xs-12">
				@foreach( $accountantOptions as $key => $value )
					{{ ((@$record->accountant_id == $key) ? $value : '') }}
				@endforeach
			</div>
			<div class="col-xs-12">&nbsp;</div>
		</div>
		<div class="col-xs-4">
			<div class="col-xs-12">توقيع المستلم</div>
			<div class="col-xs-12">Received By</div>
			<div class="col-xs-12">
				@foreach( $peopleOptions as $key => $value )
					{{ ((@$record->approved_id == $key) ? $value : '') }}
				@endforeach
			</div>
			<div class="col-xs-12">&nbsp;</div>
		</div>
	</div>
</div>
</body>

<script type="text/javascript">
	jQuery( function ( $ ) {
		@foreach($call_functions as $call_function)
		{{ $call_function }}
		@endforeach
	} );
</script>

</body>
</html>