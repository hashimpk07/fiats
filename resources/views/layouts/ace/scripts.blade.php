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
<?php echo Html::script( "public/assets/js/bootstrap.min.js" );?>


		<!-- Giftlist specific plugin scripts -->
<?php echo Html::script( 'public/assets/js/jquery.form.js' ); ?>
<?php echo Html::script( 'public/assets/js/qrd.js' ); ?>
<?php echo Html::script( 'public/assets/js/printThis.js' ); ?>


		<!-- ace scripts -->
<?php echo Html::script( "public/assets/js/ace-elements.min.js" );?>
<?php echo Html::script( "public/assets/js/ace.min.js" );?>
{{-- Common Scripts --}}
<?php echo Html::script( "public/assets/js/jquery-ui.custom.min.js" );?>
<?php echo Html::script( "public/assets/js/jquery-ui.min.js" );?>
<?php echo Html::script( "public/assets/js/jquery.ui.touch-punch.min.js" );?>
<?php echo Html::script( "public/assets/js/chosen.jquery.min.js" );?>
<?php echo Html::script( "public/assets/js/fuelux.spinner.min.js" );?>
<?php echo Html::script( "public/assets/js/bootstrap-datepicker.min.js" );?>
<?php echo Html::script( "public/assets/js/bootstrap-timepicker.min.js" );?>
<?php echo Html::script( "public/assets/js/moment.min.js" );?>
<?php echo Html::script( "public/assets/js/daterangepicker.min.js" );?>
<?php echo Html::script( "public/assets/js/bootstrap-datetimepicker.min.js" );?>
<?php echo Html::script( "public/assets/js/bootstrap-colorpicker.min.js" );?>
<?php echo Html::script( "public/assets/js/jquery.knob.min.js" );?>
<?php echo Html::script( "public/assets/js/jquery.autosize.min.js" );?>
<?php echo Html::script( "public/assets/js/jquery.inputlimiter.1.3.1.min.js" );?>
<?php echo Html::script( "public/assets/js/jquery.maskedinput.min.js" );?>
<?php echo Html::script( "public/assets/js/bootstrap-tag.min.js" );?>
<?php echo Html::script( "public/assets/js/autoNumeric.js" );?>

<?php echo Html::script( "public/assets/js/bootstrap-wysiwyg.min.js" );?>
<?php echo Html::script( "public/assets/js/jquery-ui.custom.min.js" );?>
<?php echo Html::script( "public/assets/js/markdown.min.js" );?>
<?php echo Html::script( "public/assets/js/bootstrap-markdown.min.js" );?>
<?php echo Html::script( "public/assets/js/jquery.hotkeys.min.js" );?>
<?php echo Html::script( "public/assets/js/bootbox.min.js" );?>

<?php echo Html::script( "public/assets/tinymce/js/tinymce/tinymce.min.js" );?>
<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script type="text/javascript">
	$.widget( "ui.dialog", $.extend( {}, $.ui.dialog.prototype, {
		_title: function ( title ) {
			var $title = this.options.title || '&nbsp;'
			if ( (
				     "title_html" in this.options
			     ) && this.options.title_html == true ) {
				title.html( $title );
			} else {
				title.text( $title );
			}
		}
	} ) );
</script>
{{-- Tables --}}
<?php echo Html::script( "public/assets/js/jquery.dataTables.min.js" );?>
<?php echo Html::script( "public/assets/js/jquery.dataTables.bootstrap.min.js" );?>
<?php echo Html::script( "public/assets/js/dataTables.tableTools.min.js" );?>
<?php echo Html::script( "public/assets/js/dataTables.colVis.min.js" );?>
{{-- Common Scripts End --}}

	<!-- Giftlist specific plugin scripts -->
<?php echo Html::script( "public/assets/js/jquery.bootstrap-duallistbox.min.js" );?>
<?php echo Html::script( "public/assets/js/jquery.raty.min.js" );?>
<?php echo Html::script( "public/assets/js/bootstrap-multiselect.min.js" );?>
<?php echo Html::script( "public/assets/js/select2.min.js" );?>
<?php echo Html::script( "public/assets/js/typeahead.jquery.min.js" );?>

	<!-- Add toggle button script -->
<script type="text/javascript">

	function print_div( div ) {
		$( "#" + div ).printThis( {
			                          debug         : false,
			                          importCSS     : true,
			                          importStyle   : true,
			                          printContainer: true,
//			                              loadCSS       : "path/to/my.css",
			                          pageTitle     : "",
			                          removeInline  : false,
			                          printDelay    : null,
			                          header        : null,
			                          formValues    : true
		                          } );
	}

	function hideHeader() {
		if ( $( "#hide_header" ).is( ":checked" ) ) {
			$( "#header" ).hide();
		} else {
			$( "#header" ).show();
		}
	}

	function hideFooter() {
		if ( $( "#hide_footer" ).is( ":checked" ) ) {
			$( "#footer" ).hide();
		} else {
			$( "#footer" ).show();
		}
	}

	function ToggleForm() {
		if ( $( "#forms" ).css( 'display' ) == 'none' ) {
			$( "#err" ).hide();
			$( "#forms" ).show();
			$( "#add" ).hide();
			$( "#show" ).hide();
			$( "#action" ).html( "Add" );
		} else {
			$( "#forms" ).hide();
			$( "#add" ).show();
		}
	}
	function toggleAddForm( elementForm, show, elementInvert ) {

		if ( show ) {
			$( elementForm ).show();
			if ( typeof elementInvert != 'undefined' ) {
				jQuery( elementInvert ).hide();
			}
		} else {
			$( elementForm ).hide();
			if ( typeof elementInvert != 'undefined' ) {
				jQuery( elementInvert ).show();
			}
		}
	}
	<!-- Add toggle button script closing -->
	jQuery( function ( $ ) {
		$( '.modal.aside' ).ace_aside();

		$( '#aside-inside-modal' ).addClass( 'aside' ).ace_aside( {container: '#my-modal > .modal-dialog'} );

		$( document ).one( 'ajaxloadstart.page', function ( e ) {
			//in ajax mode, remove before leaving page
			$( '.modal.aside' ).remove();
			$( window ).off( '.aside' )
		} );


		//And for the first simple table, which doesn't have TableTools or dataTables
		//select/deselect all rows according to table header checkbox
		var active_class = 'active';
		$( '#simple-table > thead > tr > th input[type=checkbox]' ).eq( 0 ).on( 'click', function () {
			var th_checked = this.checked;//checkbox inside "TH" table header

			$( this ).closest( 'table' ).find( 'tbody > tr' ).each( function () {
				var row = this;
				if ( th_checked ) {
					$( row ).addClass( active_class ).find( 'input[type=checkbox]' ).eq( 0 ).prop( 'checked', true );
				} else {
					$( row ).removeClass( active_class ).find( 'input[type=checkbox]' ).eq( 0 ).prop( 'checked', false );
				}
			} );
		} );

		//select/deselect a row when the checkbox is checked/unchecked
		$( '#simple-table' ).on( 'click', 'td input[type=checkbox]', function () {
			var $row = $( this ).closest( 'tr' );
			if ( this.checked ) {
				$row.addClass( active_class );
			} else {
				$row.removeClass( active_class );
			}
		} );


		/********************************/
		//add tooltip for small view action buttons in dropdown menu
		$( '[data-rel="tooltip"]' ).tooltip( {placement: tooltip_placement} );

		//tooltip placement on right or left
		function tooltip_placement( context, source ) {
			var $source = $( source );
			var $parent = $source.closest( 'table' )
			var off1    = $parent.offset();
			var w1      = $parent.width();

			var off2 = $source.offset();
			//var w2 = $source.width();

			if ( parseInt( off2.left ) < parseInt( off1.left ) + parseInt( w1 / 2 ) ) {
				return 'right';
			}
			return 'left';
		}

		//		Forms
		$( '#id-disable-check' ).on( 'click', function () {
			var inp = $( '#form-input-readonly' ).get( 0 );
			if ( inp.hasAttribute( 'disabled' ) ) {
				inp.setAttribute( 'readonly', 'true' );
				inp.removeAttribute( 'disabled' );
				inp.value = "This text field is readonly!";
			}
			else {
				inp.setAttribute( 'disabled', 'disabled' );
				inp.removeAttribute( 'readonly' );
				inp.value = "This text field is disabled!";
			}
		} );


		if ( ! ace.vars['touch'] ) {
			$( '.chosen-select' ).chosen( {allow_single_deselect: true} );
			//resize the chosen on window resize


			//resize chosen on sidebar collapse/expand
			$( document ).on( 'settings.ace.chosen', function ( e, event_name, event_val ) {
				if ( event_name != 'sidebar_collapsed' ) {
					return;
				}
				$( '.chosen-select' ).each( function () {
					var $this = $( this );
					$this.next().css( {'width': $this.parent().width()} );
				} )
			} );


			$( '#chosen-multiple-style .btn' ).on( 'click', function ( e ) {
				var target = $( this ).find( 'input[type=radio]' );
				var which  = parseInt( target.val() );
				if ( which == 2 ) {
					$( '#form-field-select-4' ).addClass( 'tag-input-style' );
				} else {
					$( '#form-field-select-4' ).removeClass( 'tag-input-style' );
				}
			} );
		}


		$( '[data-rel=tooltip]' ).tooltip( {container: 'body'} );
		$( '[data-rel=popover]' ).popover( {container: 'body'} );

		$( 'textarea[class*=autosize]' ).autosize( {append: "\n"} );
		$( 'textarea.limited' ).inputlimiter( {
			                                      remText  : '%n character%s remaining...',
			                                      limitText: 'max allowed : %n.'
		                                      } );

		$.mask.definitions['~'] = '[+-]';
		$( '.input-mask-date' ).mask( '99/99/9999' );
		$( '.input-mask-phone' ).mask( '(999) 999-9999' );
		$( '.input-mask-eyescript' ).mask( '~9.99 ~9.99 999' );
		$( ".input-mask-product" ).mask( "a*-999-a999", {
			placeholder: " ", completed: function () {
				alert( "You typed the following: " + this.val() );
			}
		} );


		$( "#input-size-slider" ).css( 'width', '200px' ).slider( {
			                                                          value: 1,
			                                                          range: "min",
			                                                          min  : 1,
			                                                          max  : 8,
			                                                          step : 1,
			                                                          slide: function ( event, ui ) {
				                                                          var sizing = [
					                                                          '',
					                                                          'input-sm',
					                                                          'input-lg',
					                                                          'input-mini',
					                                                          'input-small',
					                                                          'input-medium',
					                                                          'input-large',
					                                                          'input-xlarge',
					                                                          'input-xxlarge'
				                                                          ];
				                                                          var val    = parseInt( ui.value );
				                                                          $( '#form-field-4' ).attr( 'class', sizing[val] ).val( '.' + sizing[val] );
			                                                          }
		                                                          } );

		$( "#input-span-slider" ).slider( {
			                                  value: 1,
			                                  range: "min",
			                                  min  : 1,
			                                  max  : 12,
			                                  step : 1,
			                                  slide: function ( event, ui ) {
				                                  var val = parseInt( ui.value );
				                                  $( '#form-field-5' ).attr( 'class', 'col-xs-' + val ).val( '.col-xs-' + val );
			                                  }
		                                  } );


		//"jQuery UI Slider"
		//range slider tooltip example
		$( "#slider-range" ).css( 'height', '200px' ).slider( {
			                                                      orientation: "vertical",
			                                                      range      : true,
			                                                      min        : 0,
			                                                      max        : 100,
			                                                      values     : [17, 67],
			                                                      slide      : function ( event, ui ) {
				                                                      var val = ui.values[$( ui.handle ).index() - 1] + "";

				                                                      if ( ! ui.handle.firstChild ) {
					                                                      $( "<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>" )
						                                                      .prependTo( ui.handle );
				                                                      }
				                                                      $( ui.handle.firstChild ).show().children().eq( 1 ).text( val );
			                                                      }
		                                                      } ).find( 'span.ui-slider-handle' ).on( 'blur', function () {
			$( this.firstChild ).hide();
		} );


		$( "#slider-range-max" ).slider( {
			                                 range: "max",
			                                 min  : 1,
			                                 max  : 10,
			                                 value: 2
		                                 } );

		$( "#slider-eq > span" ).css( {width: '90%', 'float': 'left', margin: '15px'} ).each( function () {
			// read initial values from markup and remove that
			var value = parseInt( $( this ).text(), 10 );
			$( this ).empty().slider( {
				                          value  : value,
				                          range  : "min",
				                          animate: true

			                          } );
		} );

		$( "#slider-eq > span.ui-slider-purple" ).slider( 'disable' );//disable third item


		$( '#id-input-file-1 , #id-input-file-2 , .input-file' ).ace_file_input( {
			                                                                         no_file   : 'No File ...',
			                                                                         btn_choose: 'Choose',
			                                                                         btn_change: 'Change',
			                                                                         droppable : false,
			                                                                         onchange  : null,
			                                                                         thumbnail : false //| true | large
			                                                                         //whitelist:'gif|png|jpg|jpeg'
			                                                                         //blacklist:'exe|php'
			                                                                         //onchange:''
			                                                                         //
		                                                                         } );
		//pre-show a file name, for example a previously selected file
		//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])


		$( '#id-input-file-3' ).ace_file_input( {
			                                        style        : 'well',
			                                        btn_choose   : 'Drop files here or click to choose',
			                                        btn_change   : null,
			                                        no_icon      : 'ace-icon fa fa-cloud-upload',
			                                        droppable    : true,
			                                        thumbnail    : 'small'//large | fit
			                                        //,icon_remove:null//set null, to hide remove/reset button
			                                        /**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
			                                        /**,before_remove : function() {
						return true;
					}*/
			                                        ,
			                                        preview_error: function ( filename, error_code ) {
				                                        //name of the file that failed
				                                        //error_code values
				                                        //1 = 'FILE_LOAD_FAILED',
				                                        //2 = 'IMAGE_LOAD_FAILED',
				                                        //3 = 'THUMBNAIL_FAILED'
				                                        //alert(error_code);
			                                        }

		                                        } ).on( 'change', function () {
			//console.log($(this).data('ace_input_files'));
			//console.log($(this).data('ace_input_method'));
		} );


		//$('#id-input-file-3')
		//.ace_file_input('show_file_list', [
		//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
		//{type: 'file', name: 'hello.txt'}
		//]);


		//dynamically change allowed formats by changing allowExt && allowMime function
		$( '#id-file-format' ).removeAttr( 'checked' ).on( 'change', function () {
			var whitelist_ext, whitelist_mime;
			var btn_choose
			var no_icon
			if ( this.checked ) {
				btn_choose = "Drop images here or click to choose";
				no_icon    = "ace-icon fa fa-picture-o";

				whitelist_ext  = ["jpeg", "jpg", "png", "gif", "bmp"];
				whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
			}
			else {
				btn_choose = "Drop files here or click to choose";
				no_icon    = "ace-icon fa fa-cloud-upload";

				whitelist_ext  = null;//all extensions are acceptable
				whitelist_mime = null;//all mimes are acceptable
			}
			var file_input = $( '#id-input-file-3' );
			file_input
				.ace_file_input( 'update_settings',
				                 {
					                 'btn_choose': btn_choose,
					                 'no_icon'   : no_icon,
					                 'allowExt'  : whitelist_ext,
					                 'allowMime' : whitelist_mime
				                 } )
			file_input.ace_file_input( 'reset_input' );

			file_input
				.off( 'file.error.ace' )
				.on( 'file.error.ace', function ( e, info ) {
					//console.log(info.file_count);//number of selected files
					//console.log(info.invalid_count);//number of invalid files
					//console.log(info.error_list);//a list of errors in the following format

					//info.error_count['ext']
					//info.error_count['mime']
					//info.error_count['size']

					//info.error_list['ext']  = [list of file names with invalid extension]
					//info.error_list['mime'] = [list of file names with invalid mimetype]
					//info.error_list['size'] = [list of file names with invalid size]


					/**
					 if( !info.dropped ) {
							//perhapse reset file field if files have been selected, and there are invalid files among them
							//when files are dropped, only valid files will be added to our file array
							e.preventDefault();//it will rest input
						}
					 */


					//if files have been selected (not dropped), you can choose to reset input
					//because browser keeps all selected files anyway and this cannot be changed
					//we can only reset file field to become empty again
					//on any case you still should check files with your server side script
					//because any arbitrary file can be uploaded by member and it's not safe to rely on browser-side measures
				} );

		} );

		$( '#spinner1' ).ace_spinner( {
			                              value         : 0,
			                              min           : 0,
			                              max           : 200,
			                              step          : 10,
			                              btn_up_class  : 'btn-info',
			                              btn_down_class: 'btn-info'
		                              } )
		                .closest( '.ace-spinner' )
		                .on( 'changed.fu.spinbox', function () {
			                //alert($('#spinner1').val())
		                } );
		$( '#spinner2' ).ace_spinner( {
			                              value        : 0,
			                              min          : 0,
			                              max          : 10000,
			                              step         : 100,
			                              touch_spinner: true,
			                              icon_up      : 'ace-icon fa fa-caret-up bigger-110',
			                              icon_down    : 'ace-icon fa fa-caret-down bigger-110'
		                              } );
		$( '#spinner3' ).ace_spinner( {
			                              value         : 0,
			                              min           : - 100,
			                              max           : 100,
			                              step          : 10,
			                              on_sides      : true,
			                              icon_up       : 'ace-icon fa fa-plus bigger-110',
			                              icon_down     : 'ace-icon fa fa-minus bigger-110',
			                              btn_up_class  : 'btn-success',
			                              btn_down_class: 'btn-danger'
		                              } );
		$( '#spinner4' ).ace_spinner( {
			                              value         : 0,
			                              min           : - 100,
			                              max           : 100,
			                              step          : 10,
			                              on_sides      : true,
			                              icon_up       : 'ace-icon fa fa-plus',
			                              icon_down     : 'ace-icon fa fa-minus',
			                              btn_up_class  : 'btn-purple',
			                              btn_down_class: 'btn-purple'
		                              } );

		//$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
		//or
		//$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
		//$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0


		//datepicker plugin
		//link
		$( '.date-picker' ).datepicker( {
			                                autoclose     : true,
			                                todayHighlight: true,
			                                format        : "dd-mm-yyyy"
		                                } )
		                   //show datepicker when clicking on the icon
		                   .next().on( ace.click_event, function () {
			$( this ).prev().focus();
		} );

		//{ ---- on each data arrival..
		document.addEventListener( 'onDataReady', function ( e ) {
			$( '.date-picker' ).datepicker( {
				                                autoclose     : true,
				                                todayHighlight: true,
				                                format        : "dd-mm-yyyy"
			                                } ).next().on( ace.click_event, function () {
				$( this ).prev().focus();
			} );

			autoNumeric();
		} );
		//} ------

		//or change it into a date range picker
		$( '.input-daterange' ).datepicker( {autoclose: true} );


		//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
		$( 'input[name=date-range-picker]' ).daterangepicker( {
			                                                      'applyClass' : 'btn-sm btn-success',
			                                                      'cancelClass': 'btn-sm btn-default',
			                                                      locale       : {
				                                                      applyLabel : 'Apply',
				                                                      cancelLabel: 'Cancel',
			                                                      }
		                                                      } )
		                                    .prev().on( ace.click_event, function () {
			$( this ).next().focus();
		} );


		$( '#timepicker1' ).timepicker( {
			                                minuteStep  : 1,
			                                showSeconds : true,
			                                showMeridian: false
		                                } ).next().on( ace.click_event, function () {
			$( this ).prev().focus();
		} );

		$( '#date-timepicker1' ).datetimepicker().next().on( ace.click_event, function () {
			$( this ).prev().focus();
		} );


		$( '#colorpicker1' ).colorpicker();

		$( '#simple-colorpicker-1' ).ace_colorpicker();
		//$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
		//$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
		//var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
		//picker.pick('red', true);//insert the color if it doesn't exist


		$( ".knob" ).knob();


		var tag_input = $( '#form-field-tags' );
		try {
			tag_input.tag(
				{
					placeholder: tag_input.attr( 'placeholder' ),
					//enable typeahead by specifying the source array
					source     : ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
					/**
					 //or fetch data from database, fetch those that match "query"
					 source: function(query, process) {
						  $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
						  .done(function(result_items){
							process(result_items);
						  });
						}
					 */
				}
			)

			//programmatically add a new
			var $tag_obj = $( '#form-field-tags' ).data( 'tag' );
			$tag_obj.add( 'Programmatically Added' );
		}
		catch ( e ) {
			//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
			tag_input.after( '<textarea id="' + tag_input.attr( 'id' ) + '" name="' + tag_input.attr( 'name' ) + '" rows="3">' + tag_input.val() + '</textarea>' ).remove();
			//$('#form-field-tags').autosize({append: "\n"});
		}


		/////////
		$( '#modal-form input[type=file]' ).ace_file_input( {
			                                                    style     : 'well',
			                                                    btn_choose: 'Drop files here or click to choose',
			                                                    btn_change: null,
			                                                    no_icon   : 'ace-icon fa fa-cloud-upload',
			                                                    droppable : true,
			                                                    thumbnail : 'large'
		                                                    } )

		//chosen plugin inside a modal will have a zero width because the select element is originally hidden
		//and its width cannot be determined.
		//so we set the width after modal is show
		$( '#modal-form' ).on( 'shown.bs.modal', function () {
			if ( ! ace.vars['touch'] ) {
				$( this ).find( '.chosen-container' ).each( function () {
					$( this ).find( 'a:first-child' ).css( 'width', '210px' );
					$( this ).find( '.chosen-drop' ).css( 'width', '210px' );
					$( this ).find( '.chosen-search input' ).css( 'width', '200px' );
				} );
			}
		} )
		/**
		 //or you can activate the chosen plugin after modal is shown
		 //this way select element becomes visible with dimensions and chosen works as expected
		 $('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
		 */

		$( document ).one( 'ajaxloadstart.page', function ( e ) {
			$( 'textarea[class*=autosize]' ).trigger( 'autosize.destroy' );
			$( '.limiterBox,.autosizejs' ).remove();
			$( '.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu' ).remove();
		} );

	} );

	//////////////////
	$( '.multiselect' ).multiselect( {
		                                 enableFiltering: true,
		                                 buttonClass    : 'btn btn-white btn-primary',
		                                 templates      : {
			                                 button        : '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"></button>',
			                                 ul            : '<ul class="multiselect-container dropdown-menu"></ul>',
			                                 filter        : '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input class="form-control multiselect-search" type="text"></div></li>',
			                                 filterClearBtn: '<span class="input-group-btn"><button class="btn btn-default btn-white btn-grey multiselect-clear-filter" type="button"><i class="fa fa-times-circle red2"></i></button></span>',
			                                 li            : '<li><a href="javascript:void(0);"><label></label></a></li>',
			                                 divider       : '<li class="multiselect-item divider"></li>',
			                                 liGroup       : '<li class="multiselect-item group"><label class="multiselect-group"></label></li>'
		                                 }
	                                 } );


	//TableTools settings
	TableTools.classes.container = "btn-group btn-overlap";
	TableTools.classes.print = {
		"body"   : "DTTT_Print",
		"info"   : "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
		"message": "tableTools-print-navbar"
	}

	//initiate TableTools extension

	if ( typeof oTable1 != 'undefined' ) {
		var tableTools_obj = new $.fn.dataTable.TableTools( oTable1, {
			"sSwfPath": "assets/swf/copy_csv_xls_pdf.swf",

			"sRowSelector"   : "td:not(:last-child)",
			"sRowSelect"     : "multi",
			"fnRowSelected"  : function ( row ) {
				//check checkbox when row is selected
				try {
					$( row ).find( 'input[type=checkbox]' ).get( 0 ).checked = true
				}
				catch ( e ) {
				}
			},
			"fnRowDeselected": function ( row ) {
				//uncheck checkbox
				try {
					$( row ).find( 'input[type=checkbox]' ).get( 0 ).checked = false
				}
				catch ( e ) {
				}
			},

			"sSelectedClass": "success",
			"aButtons"      : [
				{
					"sExtends"    : "copy",
					"sToolTip"    : "Copy to clipboard",
					"sButtonClass": "btn btn-white btn-primary btn-bold",
					"sButtonText" : "<i class='fa fa-copy bigger-110 pink'></i>",
					"fnComplete"  : function () {
						this.fnInfo( '<h3 class="no-margin-top smaller">Table copied</h3>\
                                        <p>Copied ' + (
							             oTable1.fnSettings().fnRecordsTotal()
						             ) + ' row(s) to the clipboard.</p>',
						             1500
						);
					}
				},

				{
					"sExtends"    : "csv",
					"sToolTip"    : "Export to CSV",
					"sButtonClass": "btn btn-white btn-primary  btn-bold",
					"sButtonText" : "<i class='fa fa-file-excel-o bigger-110 green'></i>"
				},

				{
					"sExtends"    : "pdf",
					"sToolTip"    : "Export to PDF",
					"sButtonClass": "btn btn-white btn-primary  btn-bold",
					"sButtonText" : "<i class='fa fa-file-pdf-o bigger-110 red'></i>"
				},

				{
					"sExtends"    : "print",
					"sToolTip"    : "Print view",
					"sButtonClass": "btn btn-white btn-primary  btn-bold",
					"sButtonText" : "<i class='fa fa-print bigger-110 grey'></i>",

					"sMessage": "<div class='navbar navbar-default'><div class='navbar-header pull-left'><a class='navbar-brand' href='#'><small>Optional Navbar &amp; Text</small></a></div></div>",

					"sInfo": "<h3 class='no-margin-top'>Print view</h3>\
                                          <p>Please use your browser's print function to\
                                          print this table.\
                                          <br />Press <b>escape</b> when finished.</p>",
				}
			]
		} );
		//we put a container before our table and append TableTools element to it
		$( tableTools_obj.fnContainer() ).appendTo( $( '.tableTools-container' ) );

		//also add tooltips to table tools buttons
		//addding tooltips directly to "A" buttons results in buttons disappearing (weired! don't know why!)
		//so we add tooltips to the "DIV" child after it becomes inserted
		//flash objects inside table tools buttons are inserted with some delay (100ms) (for some reason)
		setTimeout( function () {
			$( tableTools_obj.fnContainer() ).find( 'a.DTTT_button' ).each( function () {
				var div = $( this ).find( '> div' );
				if ( div.length > 0 ) {
					div.tooltip( {container: 'body'} );
				} else {
					$( this ).tooltip( {container: 'body'} );
				}
			} );
		}, 200 );


		//ColVis extension
		var colvis = new $.fn.dataTable.ColVis( oTable1, {
			"buttonText": "<i class='fa fa-search'></i>",
			"aiExclude" : [0, 6],
			"bShowAll"  : true,
			//"bRestore": true,
			"sAlign"    : "right",
			"fnLabel"   : function ( i, title, th ) {
				return $( th ).text();//remove icons, etc
			}

		} );

		//style it
		$( colvis.button() ).addClass( 'btn-group' ).find( 'button' ).addClass( 'btn btn-white btn-info btn-bold' )

		//and append it to our table tools btn-group, also add tooltip
		$( colvis.button() )
			.prependTo( '.tableTools-container .btn-group' )
			.attr( 'title', 'Show/hide columns' ).tooltip( {container: 'body'} );

		//and make the list, buttons and checkboxed Ace-like
		$( colvis.dom.collection )
			.addClass( 'dropdown-menu dropdown-light dropdown-caret dropdown-caret-right' )
			.find( 'li' ).wrapInner( '<a href="javascript:void(0)" />' ) //'A' tag is required for better styling
			.find( 'input[type=checkbox]' ).addClass( 'ace' ).next().addClass( 'lbl padding-8' );

	}
	/////////////////////////////////
	//table checkboxes
	$( 'th input[type=checkbox], td input[type=checkbox]' ).prop( 'checked', false );

	//select/deselect all rows according to table header checkbox
	$( '#dynamic-table > thead > tr > th input[type=checkbox]' ).eq( 0 ).on( 'click', function () {
		var th_checked = this.checked;//checkbox inside "TH" table header

		$( this ).closest( 'table' ).find( 'tbody > tr' ).each( function () {
			var row = this;
			if ( th_checked ) {
				tableTools_obj.fnSelect( row );
			} else {
				tableTools_obj.fnDeselect( row );
			}
		} );
	} );

	//select/deselect a row when the checkbox is checked/unchecked
	$( '#dynamic-table' ).on( 'click', 'td input[type=checkbox]', function () {
		var row = $( this ).closest( 'tr' ).get( 0 );
		if ( ! this.checked ) {
			tableTools_obj.fnSelect( row );
		} else {
			tableTools_obj.fnDeselect( $( this ).closest( 'tr' ).get( 0 ) );
		}
	} );


	$( document ).on( 'click', '#dynamic-table .dropdown-toggle', function ( e ) {
		e.stopImmediatePropagation();
		e.stopPropagation();
		e.preventDefault();
	} );


</script>


@yield("script")