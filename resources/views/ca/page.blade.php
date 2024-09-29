<?php
/**
 * Created by PhpStorm.
 * User: Sajill
 * Date: 12/16/2015
 * Time: 3:01 PM
 */
?>
@extends("layouts.ace.inner")

@section("class_cashisu" , "open active")
@section("class_cadv" , "active")

@section("bread")
	<li class="active"><a href="#">Cash</a></li>
	<li class="active"><a href="#">Cash Issue</a></li>
	<li class="active">Advance</li>
@stop

@section("content")

	<div class="page-content">

		<div class="page-header">
			<h1>
				Advance Payment
			</h1>
		</div><!-- /.page-header -->
		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->

				<!-- Add Button --------------------->
				<div>
					<button type="button"
					        onclick="actionForm('<?php echo action( 'CashAdvanceController@add' ); ?>', {}, 'idCashAdvanceAddWrap' )"
					        id="add" class="btn btn-primary cgm-add-button">
						<i class="ace-icon glyphicon glyphicon-plus bigger-110"></i>
						Add
					</button>
				</div>
				<!-- Add Button closing---------------->
				<!-- Form Container Starts ------------>
				<!-- Add Button closing---------------->
				<div id="idCashAdvanceAddWrap">
					{{-- include add here dynamically --}}
				</div>
				<!-- Form Container Closing -->
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">

				<div class="clearfix">
					<div class="pull-right tableTools-container"></div>
				</div>
				<div class="table-header">
					Listing
					@include ('shared.search', [ 'SEARCH_CONTROLLER_PREFIX' => "CashAdvance" ])
				</div>

				<!-- div.dataTables_borderWrap -->
				<div id="idCashAdvanceTabularWrap">
					{!! $tablehtml !!}
				</div>
				<!-- div.dataTables_borderWrap -->
				<div>

				</div>
			</div>
		</div>
	</div>
	<!--------------------- PAGE CONTAINER CLOSING HERE ------------------------------>
	<!-- inline scripts related to this page -->

@stop
@section("script")
	<script type="text/javascript">


		function ShowLoginDetails() {
			if ( $( "#chkEnableUser" ).is( ":checked" ) ) {
				$( "#dv_enuser" ).show();
			} else {
				$( "#dv_enuser" ).hide();
			}
		}

		$( document ).ready( function () {
			<?php
			$id = '';
			if( isset($_GET['id']) ) {
				$id = $_GET['id'];
				?>

			actionForm( '{{ action('CashAdvanceController@view', [$id] ) }}', {}, 'idCashAdvanceAddWrap' )

			<?php
			}
			?>
		} );


	</script>
@stop