@include('layouts.ace.header')

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
		/*border: 1px solid black !important;*/
		border: 0 none !important;
	}
	.borderline {
		border-bottom:1px solid silver !important;
	}

	.table-borderless tbody tr td, .table-borderless tbody tr th, .table-borderless thead tr th {
		border: none;
	}

	.no-margin {
		margin: 0 !important;
	}

	.pagination {
		display: none;
	}

	.margin-10-vertical {
		margin : 10px 0 10px 0 !important;
	}
	.mce-item-table, .mce-item-table td, .mce-item-table th, .mce-item-table caption {
		border: 1px dashed #bbb;
		padding: 8px;
	}
	.mce-item-table {
		border: 1px solid #aaa;
		border-collapse: separate;
		border-spacing: 0;
		width: 100%;
	}
	.mce-item-table tr:nth-child(2n) {
		background: #fafafa none repeat scroll 0 0;
	}
	.mce-item-table caption, .mce-item-table td, .mce-item-table th {
		font: inherit;
		padding: 15px 7px;
	}
	.mce-item-table th {
		background-position: 100% 100%;
		background-repeat: no-repeat;
		background-size: 2px 10px;
		color: #6e6e6e;
		font-weight: 400;
	}
	.mce-item-table th:last-child {
		background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
	}
	.mce-item-table table
	{
		min-width: 50%;;
	}
	.gutter
	{
		padding-left: 1cm;
	}

	@media print {
		table .action-column {
			display: none;
		}
	}

</style>

<body class="bg-white printpreview gutter">
<div class="container">
	<div class="row">
		<!--<div class="checkbox col-xs-4 center margin-10-vertical">
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
		</div>-->
		<div class="col-xs-4 center margin-10-vertical">
			<button type="button" class="btn" onclick="print_div('printable_div');">
				<i class="fa fa-print"></i>
				Print
			</button>
		</div>
	</div>
</div>
<div id="printable_div" class="container-fluid">
	<table id="header" class="table table-borderless col-xs-12 bordered no-margin">
		<tbody>
		<tr>
			<!--<td class="col-xs-5 middle">
				{!! HTML::image('public/assets/img/left.jpg', 'left', ['style' => 'width: 50%'] )  !!}
			</td>
			<td class="col-xs-5 middle">
				{!! HTML::image('public/assets/img/right.jpg', 'left', ['style' => 'width: 50%'] )  !!}
			</td>
		</tr>
		<tr>
			<td colspan="3" class="middle">{{  $caption }}</td>
		</tr>-->
		</tbody>
	</table>

	<div class="col-xs-12 bordered mce-item-table">
		{!! $tablehtml  !!}
	</div>

	<div id="footer" style="margin-bottom: 10px;" class="col-xs-12 borderline "></div>

	<div style=" margin: 10px; text-align: center"> - </div>
</div>
</body>

@include('layouts.ace.scripts')

</body>
</html>