<?php

	get_header();

	get_sidebar('top');

	do_action('viandante_slick_slider');
		
	get_sidebar('header');

?>

<div class="container">

    <div class="row">

        <div class="col-md-8 blog_layout">

        	<?php

				do_action('viandante_post_blocks');
				
				echo '<h4 class="latest_posts"><span>' . esc_html__( 'Latest posts ', 'viandante' ) . '</span></h4>';

				if ( have_posts() ) :
				
					echo '<div id="content" class="row masonry">';

					while ( have_posts() ) : the_post(); 
				
				?>
	
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
							<?php do_action('avventura_lite_postformat'); ?>
							<div class="clear"></div>
							
						</div>
			
				<?php 
					
					endwhile;
				
					echo '</div>';
				
				else:  
                
			?>

					<div id="content" class="post-container not-found" >
                    
						<article class="post-article not-found">
    
							<h1><?php esc_html_e( 'There are no posts to show ', 'viandante' ) ?></h1>
							<p><?php esc_html_e( 'Sorry, there are no posts to show ','viandante' ) ?></p>
							
						</article>
                    
					</div>
	
			<?php 
                    
				endif;
                
			?> 

			<?php do_action( 'avventura_lite_pagination', 'archive'); ?>

        </div>

		<?php do_action( 'avventura_lite_side_sidebar'); ?>


    </div>

</div>

<?php

	get_footer();

?>
