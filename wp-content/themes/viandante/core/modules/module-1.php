<?php

function viandante_get_module_1($catID = false) {

	$html = '';

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 5,
	);

	if ( is_numeric($catID) ) :
		$args['cat'] = $catID;
	endif;

	$query = new WP_Query($args);

	if ( $query->have_posts() ) :

		$innerLeft = '';
		$innerRight = '';
		
		while ( $query->have_posts() ) : $query->the_post();
			
			global $post;
			
			if( 0 == $query->current_post ) {
			
				$innerLeft .= viandante_get_main_article($post->ID, 'viandante_large_image', 'placeholder-423x370.jpg');
			
			} else {
				
				$innerRight .= viandante_get_small_article($post->ID);
			
			}
			
		endwhile;
				
	endif;
	wp_reset_postdata();

	$html .= '<div class="news_container layout-1">';

		$html .= '<h4>' . esc_html(get_cat_name($catID)) . '</h4>';

		$html .= '<div class="clear"></div>';
		
		$html .= '<div class="news_left_col">';

			$html .= $innerLeft;

		$html .= '</div>';

		$html .= '<div class="news_right_col">';

			$html .= $innerRight;

		$html .= '</div>';

		$html .= '<div class="clear"></div>';

	$html .= '</div>';
	
	return $html;

}

?>