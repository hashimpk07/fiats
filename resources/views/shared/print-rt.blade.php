<div class="clsPrintRt" id="idPrintRt">{{ @$record->letter }}</div>

<div class="no-printing">
<input type="button" id="idAddNotes" value="Add Notes" onclick="addNotes()" />
<input type="button" style="display: none" id="idSaveNotes" value="Save Notes" onclick="saveNotes()" />
</div>
<br/>
<script type="text/javascript">

    function addNotes()
    {

        addTiny() ;
        jQuery('#idSaveNotes').show() ;
        jQuery('#idAddNotes').hide() ;
    }
    function saveNotes()
    {
        tinymce.remove( '.clsPrintRt' ) ;
        jQuery('#idSaveNotes').hide() ;
        jQuery('#idAddNotes').show() ;
    }
    function removeTiny()
    {
        tinymce.remove( '.clsPrintRt' );
    }
    function addTiny()
    {
        removeTiny();

        tinymce.init( {
            selector   : '.clsPrintRt',
            height     : 200,
            plugins    : [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar    : 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            content_css: '//www.tinymce.com/css/codepen.min.css'
        } );
        tinymce.EditorManager.execCommand( 'mceAddEditor', true, "#idPrintRt" );
    }
    document.addEventListener('onPageReady', function (e) {



    }) ;


</script>