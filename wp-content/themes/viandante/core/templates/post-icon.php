<?php 

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! function_exists( 'viandante_post_icon' ) ) {

	function viandante_post_icon() {
	
		$icons = array (
			
			"video" => "dashicons-format-video" , 
			"gallery" => "dashicons-format-gallery" , 
			"audio" => "dashicons-format-audio" , 
			"chat" => "dashicons-format-chat", 
			"status" => "dashicons-format-status", 
			"image" => "dashicons-format-image", 
			"quote" => "dashicons-format-quote" , 
			"link" => "dashicons-format-links", 
			"aside" => "dashicons-format-aside"
			
		);
	
		if (get_post_format()) { 
			
			$icon = '<i class="dashicons ' . esc_attr($icons[get_post_format()]) . '"></i> '. esc_html(ucfirst(get_post_format())); 
		
		} else {
			
			$icon = '<i class="dashicons dashicons-edit"></i> ' . esc_html__('Standard','viandante'); 
		
		}
		
		return $icon;
		
	}

}

?>