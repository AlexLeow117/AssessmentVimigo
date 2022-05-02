<?php

/*-----------------------------------------------------------------------------------*/
/* Sticky post grid */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('viandante_featured_posts_function')) {

	function viandante_featured_posts_function($catID = false) {
		
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 4,
		);
							
		if ( is_archive() ) :

			$taxonomyType = get_queried_object();

			if ( 
				is_category() ||
				is_tag() ||
				is_tax('post_format')
			) {
								
				$args['tax_query'] = array(
									
					array(
						'taxonomy' => $taxonomyType->taxonomy,
						'field' => 'term_id',
						'terms' => $taxonomyType->term_id,
						'operator' => 'IN'
					),
											 
				);
	
			} elseif (is_author()) {

				$args['author__in'] = $taxonomyType->ID;
	
			}

		endif;
		
		$query = new WP_Query($args); 

		if ( 
			$query->have_posts() &&
			(
				is_home() ||
				is_front_page() ||
				viandante_is_featured_posts_on_archive() == true
			) &&
			strstr(avventura_lite_setting('viandante_featured_posts','layout-1'), 'layout' ) == true &&
			get_query_var('paged') <= 1
		) :


	?>

            <section class="featured-posts-wrapper">
            
                <div id="featured-posts-inner" class="container">
                    
                    <div class="row">
                        
                        <div class="col-md-12">

                            <div class="featured-posts-container <?php echo esc_attr(avventura_lite_setting('viandante_featured_posts','layout-1'));?>">
                
                                <?php
                                
                                    while ( $query->have_posts() ) : $query->the_post(); 
                            
                                        global $post;
                                        
										$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
										$featuredPostsStyle = (isset($thumb[0])) ? 'style="background-image: url(' . esc_url($thumb[0]) . ')"' : '';

                                ?>

                                		<div class="featured-post featured-post-<?php echo $query->current_post?>" <?php echo $featuredPostsStyle;?> >

                                            <a title="<?php echo esc_attr(get_the_title());?>" class="featured-post-permalink" href="<?php echo esc_url(get_permalink($post->ID)); ?>" ></a>
                                            
                                            <h2 class="title"><?php echo esc_html(get_the_title()); ?></h2>
                                                        
                                            <?php 
                                                            
                                                $categories = get_the_category();
                                                            
                                                if ( !empty( $categories ) ) {
                                                                
                                                echo '<div class="featured-post-categories">';
                        
                                                foreach ( $categories as $category ) {
                                                    echo '<div class="featured-post-category">' . esc_html($category->name) . '</div>';
                                                }
                                                                
                                                echo '</div>';
                        
                                                }
                        
                                            ?>
                                    
                                        </div>
                                
                                <?php
                    
                                    endwhile; 
                                    
                                ?>
                
                                <div class="clear"></div>
                    
                            </div>

                        </div>        
        
                    </div>    
        
                </div>        
                        
            </section>

	<?php
		
		endif;
		wp_reset_postdata();
    
	}

	add_action( 'viandante_featured_posts', 'viandante_featured_posts_function', 10, 1);

}

?>