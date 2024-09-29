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
				<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
					<thead>
					<tr>
						@if( isset($heads) )
							@foreach( $heads as $head )
								<th>{{ $head }}</th>
							@endforeach
						@endif
					</tr>
					</thead>

					<tbody>
					@if( isset($details) )
						@foreach( $details as $fragment )
							<?php $disable_edit = ''; ?>
							@include('shared.fragment-invoice')
						@endforeach
					@endif
					@if( isset($fragments) )
						@foreach( $fragments as $fragment )
							<?php $disable_edit = 'cgm-disabled-edit'; ?>
							@include('cash_gift_lists.fragment-cashGift')
						@endforeach
					@endif
					</tbody>
				</table>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>