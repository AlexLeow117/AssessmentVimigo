/**
 * Theme Info
 * 
 * @package Armonia
 * @since 1.2.0
 */
 jQuery(document).ready(function($) {
    var ajaxUrl = armoniaThemeInfoObject.ajaxUrl, _wpnonce = armoniaThemeInfoObject._wpnonce, container = $( ".armonia-review-notice" )
    if( container.length ) {
        container.on( "click", ".notice-actions .button", function(e) {
            e.preventDefault();
            var _this = $(this), redirect = _this.data("redirect")
            $.ajax({
                url: ajaxUrl,
                type: 'post',
                data: {
                    "action": "armonia_set_ajax_transient",
                    "_wpnonce": _wpnonce
                },
                success: function(res) {
                    var notice = JSON.parse(res);
                    if( notice.status ) {
                        container.fadeOut();
                    }
                },
                complete: function() {
                    if( redirect ) {
                        window.open( redirect, "_blank" )
                    }
                }
            })
        })
    }
 })