<?php

function viandante_get_module_3($catID = false) {

	$html = '';
	$inner = '';

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 8,
	);

	if ( is_numeric($catID) ) :
		$args['cat'] = $catID;
	endif;

	$query = new WP_Query($args);

	if ( $query->have_posts() ) :

		while ( $query->have_posts() ) : $query->the_post();
		
		global $post;
	
		$excerpt = wp_trim_words( get_the_excerpt(), 10 , '...' );
	
		if ($query->current_post == 4) {
			
			$inner .= '</div>';
			$inner .= '<div class="news_right_col">';
		
		}
	
		if( 
			$query->current_post == 0 || 
			$query->current_post == 4  
		) {
	
			$inner .= viandante_get_hero_article($post->ID, true, true);
	
		} else {
						
			$inner .= viandante_get_small_article($post->ID);
	
		}
	
		endwhile;
		
	endif;
	wp_reset_postdata();

	$html .= '<div class="news_container layout-3">';

		$html .= '<h4>' . esc_html(get_cat_name($catID)) . '</h4>';

		$html .= '<div class="clear"></div>';
		
		$html .= '<div class="news_left_col">';

			$html .= $inner;

		$html .= '</div>';

		$html .= '<div class="clear"></div>';

	$html .= '</div>';
	
	return $html;

}

?>