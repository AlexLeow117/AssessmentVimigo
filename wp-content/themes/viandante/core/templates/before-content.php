<?php 

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('viandante_before_content_function')) {

	function viandante_before_content_function( $type = "post" ) {
		
		if ( ! avventura_lite_is_single() ) {

			do_action('avventura_lite_get_title', 'blog' ); 

		} else {

			if ( !avventura_lite_is_woocommerce_active('is_cart') ) :
	
				if ( avventura_lite_is_single() && !is_page_template() ) :
							 
					do_action('avventura_lite_get_title', 'single');
							
				else :
					
					do_action('avventura_lite_get_title', 'blog'); 
							 
				endif;
	
			endif;

		}

		if ( $type == "post" ) :
			
			echo '<div class="entry-date">';


			echo '<span class="entry-date-o"><i class="fa fa-clock-o" aria-hidden="true"></i>' . esc_html(get_the_date()) . '</span>'; 
			echo '<span class="entry-date-o"><i class="fa fa-archive" aria-hidden="true"></i>' . get_the_category_list( ', ' , '', FALSE ) . '</span>';
			echo '<span class="entry-date-o"><i class="fa fa-user-circle-o" aria-hidden="true"></i>' . get_the_author_posts_link() . '</span>';
			
			if ( avventura_lite_setting('avventura_lite_post_icon','on') == 'on' )
				echo '<span class="entry-date-o">' . viandante_post_icon() . '</span>';

			echo '</div>';
		
		endif;

	} 
	
	add_action( 'avventura_lite_before_content', 'viandante_before_content_function' );

}

?>