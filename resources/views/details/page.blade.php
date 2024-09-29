
@section('content')

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

	<link rel="stylesheet" href="http://apps.bdimg.com/libs/fontawesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://www.jquery-az.com/jquery/css/editable-select.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://www.jquery-az.com/jquery/js/jquery-editable-select.js"></script>










	<select class="ui-select">
		<option value="jQuery">jQuery</option>
		<option value="HTML">HTML</option>
		<option value="CSS">CSS</option>
		<option value="Bootstrap">Bootstrap</option>
	</select>




	<script>
		$(function(){
			$('select').editableSelect();
		});
	</script>



@endsection




