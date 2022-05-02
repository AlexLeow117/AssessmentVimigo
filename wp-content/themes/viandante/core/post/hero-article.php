<?php

function viandante_get_hero_article($postID, $getData = false, $getSummary = false) {

	$excerpt = wp_trim_words(get_the_content($postID), 10 , '...' );

	$html = '';

	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($postID), 'large');
	
	$imgBackground = (isset($thumb[0])) ? $thumb[0] : get_stylesheet_directory_uri() . '/assets/images/placeholder-337x225.jpg';
	
	$html .= '<div class="main_article hero_article" style="background-image:url(' . esc_url($imgBackground) . ')">';
	
		$html .= '<a title="' . esc_attr(get_the_title($postID)) . '" class="hero-post-permalink" href="' . esc_url(get_permalink($postID)) . '"></a>';
			
		$html .= '<div class="article_details hero_article_details">';
	
			$html .= '<div class="hero_article_inner_details" style="display:block">';
		
				$html .= '<h3>' . esc_html(get_the_title($postID)) . '</h3>';
				
				if ($getData == true)
					$html .= '<div class="meta-info">' . esc_html(get_the_date(false,$postID)) . '</div>';
				
				if ($getSummary == true)
					$html .= '<p>' . esc_html($excerpt) . ' </p>';
				
			$html .= '</div>';
			
		$html .= '</div>';
	
	$html .= '</div>';
	
	return $html;

}
	
?>