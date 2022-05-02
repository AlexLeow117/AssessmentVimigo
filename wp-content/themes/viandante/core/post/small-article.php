<?php

function viandante_get_small_article($postID) {
	
	$html = '';

	$html .= '<div class="small_article">';
	
		$html .= '<div class="article_featured_img">';
			
			$html .= '<a class="standard-post-permalink" href="' . esc_url(get_permalink($postID)) . '">';

				if ( has_post_thumbnail($postID) ) {

					$html .= get_the_post_thumbnail($postID, 'viandante_small_image');

				} else {

					$thumbnailIMG = get_stylesheet_directory_uri() . '/assets/images/placeholder-120x100.jpg';
					$html .= '<img src="' . esc_url($thumbnailIMG) . '" alt="' . esc_attr(get_the_title($postID)) . '">';

				}

			$html .= '</a>';
		
		$html .= '</div>';
		
		$html .= '<div class="article_details">';
		
			$html .= '<a href="' . esc_url(get_permalink($postID)) . '">';
			
				$html .= '<h3>' . esc_html(get_the_title($postID)) . '</h3>';
			
			$html .= '</a>';
			
			$html .= '<div class="meta-info">' . esc_html(get_the_date(false,$postID)) . '</div>';
		
		$html .= '</div>';
		
		$html .= '<div class="clear"></div>';
	
	$html .= '</div>';
	
	return $html;

}
	
?>