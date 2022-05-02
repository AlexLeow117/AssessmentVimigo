<?php

/*-----------------------------------------------------------------------------------*/
/* Related posts */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('viandante_related_posts')) {

	function viandante_related_posts($content) {
		
		if ( avventura_lite_setting('viandante_enable_related_posts', 'on') == 'on' ) :

			global $post;
	
			$postID = $post->ID;
			
			$catsArray = array();
			$tagsArray = array();

			foreach (get_the_category($postID) as $cat) {
				$catsArray[] = $cat->term_id;
			}
	
			foreach (wp_get_post_tags($postID) as $tag) {
				$tagsArray[] = $tag->term_id;
			}
	
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 3,
				'post_status' => 'publish',
				'orderby' => 'date',
				'order' => 'desc',
				'fields' => 'ids',
				'exclude' => array($postID),
				'tax_query' => array(
					'relation' => 'OR',
					 array(
						'taxonomy' => 'category',
						'field' => 'term_id',
						'terms' => $catsArray,
						'operator' => 'IN'
					 ),
					 array(
						'taxonomy' => 'post_tag',
						'field' => 'term_id',
						'terms' => $tagsArray,
						'operator' => 'IN'
					 )
								 
				)
			);
	
			$relatedPosts = get_posts($args);
		
			if ( count($relatedPosts) <= 0 ) {
				
				return $content;
				
			} else {
	
				$relatedHTML = '<div class="related-posts">';
	
					$relatedHTML .= '<h3>';
					$relatedHTML .= esc_html__('You may also like','viandante');
					$relatedHTML .= '</h3>';
		
					foreach ( $relatedPosts as $related ) {
		
						$relatedHTML .= '<section>';
						$relatedHTML .= viandante_get_hero_article($related, false, false);
						$relatedHTML .= '</section>';
		
					}
	
				$relatedHTML .= '</div>';
	
				return $content . $relatedHTML;
	
			}

		else :

			return $content;

		endif;
		
	}

	add_filter('the_content', 'viandante_related_posts');

}

?>