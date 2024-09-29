<div class="vs-menu 
     <?php if( @$NO_SAVE_BUTTON ) { echo 'no-printing' ; } ?>" id="rollup" onclick="toggleMenu('<?php echo $SEARCH_CONTROLLER_PREFIX;?>')" style="float:left; margin: 0 5px ; cursor: pointer">
	<i style="margin-top: 5px;" class="menu-icon fa fa-2x fa-angle-down"></i>
</div>
<div class="  class-dynamic-<?php echo $SEARCH_CONTROLLER_PREFIX;?>">
<div class="vs-form cgm-column-select" style="position: absolute; display: none; background: white; color: black; border: 1px solid silver; z-index: 9">

	<input class="vs-checktitle" type="hidden" name="vs_table" value="<?php echo $vstable;?>"/>
	<?php
	$vsstored = \Qudratom\Utilities\Helper::vsColumns( $vstable );
	if ( ! is_array( $vsstored ) ) {
		$vsstored = [ ];
	}
	foreach ( $vscolumns as $k => $col ) {
		$checked = '';
		if ( in_array( $k, $vsstored ) ) {
			$checked = 'checked="checked"';
		}
		if( @$NO_SAVE_BUTTON ) {
			$checked = 'checked="checked"';
		}

		echo '<div class="vs-row" style="display: block; line-height: normal; padding: 2px 10px;">';
		echo '<input ' . $checked . ' name="vs_columns[]" value="' . $k . '" onclick="toggleCell(\'' . $SEARCH_CONTROLLER_PREFIX . '\')" data-nth="' . ( $k + 1 ) . '" class="vs-checkbox CGM-FORCE-ENABLED" type="checkbox" /><label>' . $col . '</label>';
		echo '</div>';
	}
        if( ! @$NO_SAVE_BUTTON ) 
        {
	?>
	<button id="add" class="btn btn-primary" onclick="saveColumns( '{{ action('AjaxController@saveColumns') }}', '<?php echo $SEARCH_CONTROLLER_PREFIX;?>');" type="button" style="width:100%;">
		Set as default
	</button>
        <?php
        }
        ?>
</div>
</div>
<style id="styleArea">
</style>

<div id="scriptArea">
	<script>
        <?php
        if( ! @$NO_SAVE_BUTTON ) 
        {
        ?>
		//Show hide columns {
			try {
				toggleCell('<?php echo $SEARCH_CONTROLLER_PREFIX;?>');
			}catch (e) {}

			document.addEventListener( 'onPageReady', function ( e ) {
				toggleCell('<?php echo $SEARCH_CONTROLLER_PREFIX;?>');
			} );
		// }
        <?php
        } 
        ?>
	</script>
</div>