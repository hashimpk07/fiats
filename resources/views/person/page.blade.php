@extends('layouts.fiats.user')
@section('content')

	<div class="container">
		<div class="show">

			<div class="col-md-12 col-sm-12 payment">
				<h3>Participant Details</h3>
			</div>

			<div class="container-fluid total-div">

				@include('person.session')

					@include('person.add')


			</div>

		</div>
	</div>


@endsection


