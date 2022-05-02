<?php
/**
 * Post Column Template Part - Layout Two
 * 
 * @package Armonia
 * @since 1.0.0
 */
$postCategory = $args->category;
$dateOption = $args->dateOption;
?>
<div class="col-12 col-md-6 col-lg-4">
    <div class="footer-col -feature-post">
        <?php if( $postCategory ) {
            $category_query = get_category_by_slug( $postCategory );
            ?>
            <div class="center-line-title">
                <h5><?php echo esc_html( $category_query->name ); ?></h5>
            </div>
        <?php }

                $posts_column_post_args = array(
                    'post_type'     => 'post',
                    'posts_per_page' => 3,
                    'post_status'   => 'publish'
                );
                if( !empty( $postCategory ) ) {
                    $posts_column_post_args['category_name'] = $postCategory;
                }
                $posts_column_post_query = new WP_Query( $posts_column_post_args );
                if( ! $posts_column_post_query->have_posts() ) {
                    esc_html_e( 'No posts found', 'armonia' );
                }
                    while( $posts_column_post_query->have_posts() ) : $posts_column_post_query->the_post();
                        $singlepost_id = get_the_ID();
                        $blockCategories = get_the_category( $singlepost_id );
                ?>
                        <div class="post-card-category trending-post">
                            <a class="trending-post_image card__category" href="<?php the_permalink(); ?>" class="card__cover">
                                <?php if( has_post_thumbnail() ) : ?>
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"/>
                                <?php endif; ?>
                            </a>
                            <div class="trending-post_content">
                                <?php
                                    if( $blockCategories ) {
                                        foreach( $blockCategories as $category ) :
                                    ?>
                                            <h5 class="post-cat-<?php echo esc_attr( ( $category->term_id ) ); ?>"><a href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></h5>
                                    <?php
                                        endforeach;
                                    }
                                    ?>
                                    <a href="<?php the_permalink(); ?>" class="card__content-title"><?php the_title(); ?></a>
                                <?php
                                    if( $dateOption ) { ?>
                                        <div class="info__time"><i class="far fa-clock"></i>
                                            <p><?php echo get_the_date(); ?></p>
                                        </div>
                                <?php 
                                    }
                                ?>
                            </div>
                        </div>
            <?php
                endwhile;
            ?>
    </div>
</div>