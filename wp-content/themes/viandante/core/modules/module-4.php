<?php

function viandante_get_module_4($catID = false) {

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
			
			$inner .= ($query->current_post % 2 <> 0) ? '<div class="news_right_col">' : '<div class="news_left_col">';
			$inner .= viandante_get_hero_article($post->ID, true, true);
			$inner .= '</div>';
	
		endwhile;
	
	endif;
	wp_reset_postdata();

	$html .= '<div class="news_container layout-3">';
	
		$html .= '<h4>' . esc_html(get_cat_name($catID)) . '</h4>';

		$html .= '<div class="clear"></div>';
		
		$html .= $inner;

		$html .= '<div class="clear"></div>';

	$html .= '</div>';
	
	return $html;

}

?>