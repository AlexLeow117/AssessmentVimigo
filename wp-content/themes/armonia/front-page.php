<?php
/**
 * Renders frontpage sections for the theme
 * 
 * @package Armonia
 * @since 1.0.0
 * 
 */
get_header();
$frontpage_sections_option = get_theme_mod( 'frontpage_sections_option', true );
if ( $frontpage_sections_option ) {
    /**
     * hook - armonia_frontpage_section_hook
     * 
     * @hooked - 
     * 
     */
    if( has_action( 'armonia_frontpage_section_hook' ) ) {
        do_action( 'armonia_frontpage_section_hook' );
    }
} else {
    if ('posts' == get_option('show_on_front')) {
        include( get_home_template() );
    } else {
        include( get_page_template() );
    }
}

get_footer();