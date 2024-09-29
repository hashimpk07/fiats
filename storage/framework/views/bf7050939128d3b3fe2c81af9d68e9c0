<div class="form-search">

	<div class="box-header">
		<h3 class="box-title"></h3>
		<form id="idSearchForm" action="<?php echo action( $SEARCH_CONTROLLER_PREFIX . 'Controller@listtable' );?>" style="float: right" >
			<div id="idSearchExtraArea"></div>

			<div class="box-tools" >
				<div class="input-group" style="width: 150px;">
					<input type="text" name="search" class="form-control input-sm pull-right" placeholder="Search">
					<div class="input-group-btn">
						<button onclick="bringToSearch()" type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</div>
		</form>
	</div><!-- /.box-header -->

</div>

<script type="text/javascript">

	function bringToSearch() {
		jQuery('#idSearchExtraArea').html('') ;
		jQuery('.search-field').not(':submit').clone().hide().attr('isacopy','y').appendTo('#idSearchExtraArea') ;
	}
	function doSearchValidation() {
		bringToSearch() ;
		return true;
	}

	submitForm( 'idSearchForm', doSearchValidation, null, 'id<?php echo $SEARCH_CONTROLLER_PREFIX; ?>TabularWrap', true, {} );
</script>