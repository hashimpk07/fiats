@extends('layouts.fiats.admin')

@section('content')

	<div id="idMemberAddWrap">
	</div>
	<div style="clear:both;"></div>
<div class="form-admin row"   >

	<div class="col-sm-1"></div>
	<div class="col-md-5 col-xs-5 fiat-report" >
		<a href="{{ url('person') }}"><button type="button" class="btn btn-primary " >New Registration</button></a><br>
	</div>


	@include ('shared.table-options', [ 'SEARCH_CONTROLLER_PREFIX' => "Member" ])

	<div style="clear: both"></div>

	<div class="col-md-1"></div>
	<div class="table-box col-sm-10">
		<div class="box-header">
			@include ('shared.search', [ 'SEARCH_CONTROLLER_PREFIX' => "Member" ])
		</div>

		<a class="green" href="javascript:;"
		   onclick="actionForm('{{ action('MemberController@filter') }}', {}, 'idMemberAddWrap' )" >
		</a>

		<!-- div.dataTables_borderWrap -->
		<div id="idMemberTabularWrap" class="box-body table-responsive no-padding">
			{!! $tablehtml !!}
		</div>
	</div>
	<div class="col-md-1"></div>

</div>

@endsection