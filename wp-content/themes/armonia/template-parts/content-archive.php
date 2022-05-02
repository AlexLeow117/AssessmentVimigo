<?php
/**
 * Template part for displaying posts - archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Armonia
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card -center' ); ?> <?php if( has_post_thumbnail() && get_post_format() === 'image' ) echo 'style="background: url( ' .esc_url( get_the_post_thumbnail_url() ). ' )"'; ?>>
	<?php armonia_get_thumb_html_by_post_format(); ?>
	<div class="card__content">
		<?php
			$post_categories = get_the_category();
			if( $post_categories ) {
				foreach( $post_categories as $post_cat ) :
					echo '<h5 class="card__content-category post-cat-' .esc_attr( ( $post_cat->term_id ) ). '"><a href="' .esc_url( get_category_link( $post_cat->term_id ) ). '">' .esc_html( $post_cat->name ). '</a></h5>';
				endforeach;
			}
		?>
		<?php
			the_title( '<a href="' . esc_url( get_permalink() ) . '" class="card__content-title" rel="bookmark">', '</a>' );
        ?>
		<div class="card__content-info">
			<?php
				armonia_posted_on();
			?>
			<div class="info__comment"><i class="far fa-comment"></i>
				<p><?php echo absint( get_comments_number() ); ?></p>
			</div>
		</div>
		<div class="entry-content">
			<?php
				$archive_content_type = get_theme_mod( 'archive_content_type', 'excerpt' );
				switch( $archive_content_type ) {
					case 'content' : the_content();
								break;
					default: the_excerpt();
							break;
				}
			?>
		</div><!-- .entry-content -->
		<div class="card__button">
			<a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more . . ', 'armonia' ); ?></a>
		</div>
	</div><!-- . -->
</article><!-- #post-<?php the_ID(); ?> -->
