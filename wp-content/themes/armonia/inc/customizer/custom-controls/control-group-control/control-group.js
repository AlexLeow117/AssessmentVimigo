( function( api, $ ) {
	api.controlConstructor['armonia-control-group'] = api.Control.extend( {
		ready: function() {
			var control = this;
			control.container.on( 'change', '.control-group-number-field input',
				function() {
					control.settings['border_width'].set( jQuery( this ).val() );
				}
			);
			control.container.on( 'change', '.control-group-border-radius-field input',
				function() {
					control.settings['border_radius'].set( jQuery( this ).val() );
				}
			);
			control.container.on( 'change', '.control-group-select-field select',
				function() {
					var selectFieldName = $(this).data( "field" )
					control.settings[selectFieldName].set( jQuery( this ).val() );
				}
			);
            // trigger popup
            control.container.on( 'click', '.popup-trigger', function() {
                $(this).toggleClass('dashicons-no-alt dashicons-edit open');
                control.container.find('.content-wrap').toggle('slow');
            })
            control.container.find( '.control-group-color-field .armonia-control-group-single-field').wpColorPicker({
				change: function(event, ui) {
					var fieldName = $(this).data( "field" )
					control.settings[fieldName].set( ui.color.toString() );
				},
				clear: function(event, ui) {
					var fieldName = $(this).data( "field" )
					control.settings[fieldName].set( '' );
				}
			});
        }
    });
} )( wp.customize, jQuery );