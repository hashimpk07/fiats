<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>FiatMission</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/fiats.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/form-search.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/form-basic.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">



</head>


<header>
	<img src="{{ asset('public/assets/data/fiats.jpg') }}" usemap="#Map" width="961" height="100" border="0" style="margin-bottom:-5px;margin-top:10px">
</header>

<body>

<div class="main-contentss">



	<form class="form-admin"   method="post" action="#">



		<div class="form-search">
			<input  type="search" name="search" placeholder="I am looking for..">
			<button type="submit">Search</button>
			<i class="fa fa-search"></i>
		</div>


		<div class="icondiv">
			<i class="fa fa-file-excel-o" aria-hidden="true"></i>
			<i class="fa fa-sticky-note-o" aria-hidden="true"></i>
			<i class="fa fa-print" aria-hidden="true"></i>
		</div>


	<table>
		<tr>
			<th>Sl#</th>
			<th>Name</th>
			<th>Mobile Number</th>
			<th>Date</th>
			<th>Email Id</th>
			<th>Language</th>
			<th>Age </th>
			<th>Parish</th>
			<th>Diocese</th>
			<th></th>
		</tr>

		<tr>
			<th>1</th>
			<td>st.joseph</td>
			<td>9876543210</td>
			<td>20-10-2016</td>
			<td>test@gmail.com</td>
			<td>Malayalam</td>
			<th>12 </th>
			<td>Trissur</td>
			<td>punkunnam</td>
			<th><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;<i class="fa fa-pencil" aria-hidden="true">&nbsp;</i><i class="fa fa-envelope" aria-hidden="true"></i></th>

		</tr>
		<tr>
			<th>2</th>
			<td>st.joseph</td>
			<td>9876543210</td>
			<td>20-10-2016</td>
			<td>test@gmail.com</td>
			<td>Malayalam</td>
			<th>12 </th>
			<td>Trissur</td>
			<td>punkunnam</td>
			<th><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;<i class="fa fa-pencil" aria-hidden="true">&nbsp;</i><i class="fa fa-envelope" aria-hidden="true"></i></th>
		</tr>
		<tr>
			<th>3</th>
			<td>st.joseph</td>
			<td>9876543210</td>
			<td>20-10-2016</td>
			<td>test@gmail.com</td>
			<td>Malayalam</td>
			<th>12 </th>
			<td>Trissur</td>
			<td>punkunnam</td>
			<th><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;<i class="fa fa-pencil" aria-hidden="true">&nbsp;</i><i class="fa fa-envelope" aria-hidden="true"></i></th>
		</tr>
	</table>


	</form>



</div>

</body>

</html>