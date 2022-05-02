<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Armonia
 */
$singlePost_categories = get_the_category( get_the_ID() );
$singlePost_tags = get_the_tags( get_the_ID() );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-standard__banner single_layout_one">
		<?php armonia_post_thumbnail( 'post-standard__banner__image' ); ?>
		<div class="post-standard__banner__content">
			<div class="post-card -center">
				<div class="card__content">
					<?php
						if( $singlePost_categories ) :
							foreach( $singlePost_categories as $singlePost_category ) :
								?>
									<h5 class="card__content-category"><a href="<?php echo esc_url( get_term_link( $singlePost_category->term_id ) ); ?>"><?php echo esc_html( $singlePost_category->name ); ?></a></h5>
							<?php
								endforeach;
						endif;
					?>
					<?php the_title( '<h1 class="card__content-title">', '</h1>' ); ?>
					<div class="card__content-info">
						<?php armonia_posted_on(); ?>
						<div class="info__comment"><i class="far fa-comment"></i>
							<p><?php echo absint( get_comments_number() ); ?></p>
						</div>
					</div><!-- .card__content-info -->
				</div><!-- .card__content -->
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-md-10 mx-auto">
			<?php
				echo '<div class="post-standard__content">';
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'armonia' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);
				echo '</div>';
			?>
				<div class="post-footer">
					<div class="post-footer__tags center">
						<div class="tags-group">
							<?php
								if( $singlePost_tags ) :
									foreach( $singlePost_tags as $singlePost_tag ) : ?>
										<a href="<?php echo esc_url( get_term_link( $singlePost_tag->term_id ) ); ?>" class="tag-btn"><?php echo esc_html( $singlePost_tag->name ); ?></a>
							<?php
									endforeach;
								endif;
							?>
						</div>
					</div>
				<?php
					/**
					 * hook - armonia_single_after_content
					 * 
					 */
					if( is_single() ) :
						do_action( 'armonia_single_after_content' );
					endif;
			?>
				</div>
			<?php
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'armonia' ),
						'after'  => '</div>',
					)
				);
			?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->