<?php
/**
 * Created by PhpStorm.
 * User: Sajill
 * Date: 12/16/2015
 * Time: 1:03 PM
 */
?>
	<!-- basic scripts -->

<?php echo Html::script( "public/assets/js/jquery.1.11.1.min.js" ); ?>

	<!--[if !IE]> -->
<script type="text/javascript">
	window.jQuery || document.write( "<script src='assets/js/jquery.min.js'>" + "<" + "/script>" );
</script>

<!-- <![endif]-->

<!--[if IE]
<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
![endif]-->


<!-- page specific plugin scripts -->

<script type="text/javascript">
	if ( 'ontouchstart' in document.documentElement ) {
		document.write( "<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>" );
	}
</script>
{{-- Common Scripts --}}

<?php echo Html::script( "public/assets/js/jquery-ui.custom.min.js" );?>

{{-- Common Scripts End --}}

	<!-- Giftlist specific plugin scripts -->
	<!-- Giftlist specific plugin scripts -->
<?php echo Html::script( 'public/assets/js/jquery.form.js' ); ?>
<?php echo Html::script( 'public/assets/js/qrd.js' ); ?>
<?php //echo Html::script( 'public/assets/js/printThis.js' ); ?>
<script type="text/javascript" src="{{asset('public/assets/js/jquery-ui.js')}}"></script>

@yield("script")