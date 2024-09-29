<div id="pop_up" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					{{ @$caption }}
				</div>
			</div>

			<div class="modal-body table-responsive no-padding {{ VIEW }}">
				{!! @$view_form !!}
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>