/**
 * Hjandles widgets scripts
 * 
 * @package Armonia
 * @since 1.0.0
 */
jQuery(document).ready( function($) {
    function armonia_widgets_handler() {
        // multicheckbox field
        $( ".armonia-multicheckbox-field" ).on( "click, change", ".multicheckbox-content input", function() {
            var _this = $(this), parent = _this.parents( ".armonia-multicheckbox-field" ), currentVal, currentFieldVal = parent.find( ".widefat" ).val();
            currentFieldVal = JSON.parse( currentFieldVal )
            currentVal = _this.val();
            if( _this.is(":checked") ) {
                if( currentFieldVal != 'null' ) {
                    currentFieldVal.push(currentVal)
                }
            } else {
                if( currentFieldVal != 'null' ) {
                    currentFieldVal.splice( $.inArray( currentVal, currentFieldVal ), 1 );
                }
            }
            parent.find( ".widefat" ).val(JSON.stringify(currentFieldVal))
        })

        // checkbox field
        $( ".armonia-checkbox-field" ).on( "click, change", "input", function() {
            var _this = $(this)
            if( _this.is(":checked") ) {
                _this.val( "1" )
            } else {
                _this.val( "0" )
            }
        })

        // upload field
        $( ".armonia-upload-field" ).on( "click", ".upload-trigger", function(event) {
            event.preventDefault();
            if ( frame ) {
                frame.open();
                return;
            }
            var _this = $(this), frame = wp.media({
                title: 'Select or Upload Author Image',
                button: {
                    text: 'Add Author Image'
                },
                multiple: false
            });
            frame.open();
            frame.on( 'select', function() {
                var attachment = frame.state().get('selection').first().toJSON();
                _this.toggleClass( "selected not-selected" );
                _this.next().toggleClass( "selected not-selected" );
                _this.next().find("img").attr( "src", attachment.url ).toggleClass( "nothasImage" );
                _this.siblings(".widefat").val( attachment.url ).trigger("change");
            })
        })
        // remove image
        $( ".armonia-upload-field" ).on( "click", ".upload-buttons .remove-image", function(event) {
            event.preventDefault();
            var _this = $(this);
            _this.prev().attr( "src", "" ).toggleClass( "nothasImage" );
            _this.parent().toggleClass( "selected not-selected" ).prev().toggleClass( "selected not-selected" );
            _this.parent().next().val( "" ).trigger("change");
        })
    }
    armonia_widgets_handler();
    
    // run on widgets added and updated
    $( document ).on( 'load widget-added widget-updated', function() {
        armonia_widgets_handler();
    });
})