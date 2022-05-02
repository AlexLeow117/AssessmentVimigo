( function( api, $ ) {
	api.controlConstructor['armonia-spacing'] = api.Control.extend( {
		ready: function() {
			var control = this;
            control.container.on( 'click', '.trigger-link-control',
				function() {
                    $(this).toggleClass( "dashicons-admin-links dashicons-editor-unlink" )
                    $(this).parent().toggleClass( "linked" )
				}
			);
            control.container.on( 'change', '.linked .spacing-control-number-field input',
				function() {
                    var parentField = $(this)
                    $(this).parent().siblings().find( 'input' ).each(function() {
                        $(this).val( parentField.val() )
                        control.settings[$(this).data('field')].set( parentField.val() );
                    })
				}
			);
			control.container.on( 'change', '.spacing-control-number-field input',
				function() {
                    var fieldName = $(this).data( "field" )
					control.settings[fieldName].set( $( this ).val() );
				}
			);
        }
    });
} )( wp.customize, jQuery );