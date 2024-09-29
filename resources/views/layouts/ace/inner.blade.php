<?php
	/**
	 * Created by PhpStorm.
	 * User: Sajill
	 * Date: 12/16/2015
	 * Time: 12:52 PM
	 */
?>

@include('layouts.ace.header')

<body class="no-skin">

<div id="idSuccessFailureMsgWrap">
	<div id="idSuccessMsg"></div>
	<div id="idFailureMsg"></div>
</div>




<div class="main-container" id="main-container">

	<script type="text/javascript">
		try {
			ace.settings.check( 'main-container', 'fixed' )
		} catch ( e ) {
		}
	</script>

	@include('layouts.ace.sidebar')

	<div class="main-content">
		<div class="main-content-inner">


			@yield("content")

		</div>
	</div><!-- /.main-content -->

	@include('layouts.ace.footer')

	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
</div><!-- /.main-container -->

@include('layouts.ace.scripts')
</body>
</html>
