<?php
/**
 * List Template Part - Layout One
 * 
 * @package Armonia
 * @since 1.0.0
 */
$blockTitle = $args->blockTitle;
$postCategory = $args->category;
$postCount = $args->count;
$excerptOption = $args->excerptOption;
$dateOption = $args->dateOption;
$commentOption = $args->commentOption;
$buttonOption = $args->buttonOption;
?>
<div class="list-layout-one">
    <div class="news-block__content__slide container" data-slick-index="1" aria-hidden="true" tabindex="-1">
        <?php if( $blockTitle ): ?>
            <div class="header__controller__title">
                <div class="center-line-title -large -mb-1">
                <h5><?php echo esc_html( $blockTitle ); ?></h5>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <?php
                $list_post_args = array(
                    'post_type'     => 'post',
                    'posts_per_page' => esc_attr( $postCount ),
                    'post_status'   => 'publish'
                );
                if( !empty( $postCategory ) ) {
                    $list_post_args['category_name'] = $postCategory;
                }
                $list_post_query = new WP_Query( $list_post_args );
                if( ! $list_post_query->have_posts() ) {
                    esc_html_e( 'No posts found', 'armonia' );
                }
                while( $list_post_query->have_posts() ) : $list_post_query->the_post();
                    $singlepost_id = get_the_ID();
                    $blockCategories = get_the_category( $singlepost_id );
                    $tags = get_the_tags( $singlepost_id );
                    $format = get_post_format() ? : 'standard';
                ?>
                    <div class="col-12 col-md-6">
                        <div class="post-card -theme--blue -small -horizontal <?php echo esc_html( 'format-' . $format ); ?>" <?php if( has_post_thumbnail() && $format === 'image' ) echo 'style="background: url( ' .esc_url( get_the_post_thumbnail_url() ). ' )"'; ?>>
                            <?php armonia_get_thumb_html_by_post_format(); ?>
                            <div class="card__content">
                                <?php
                                if( $blockCategories ) {
                                    foreach( $blockCategories as $category ) :
                                ?>
                                        <h5 class="card__content-category post-cat-<?php echo esc_attr( ( $category->term_id ) ); ?>"><a href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></h5>
                                <?php
                                    endforeach;
                                }
                                ?>
                                <a class="card__content-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <div class="card__content-info">
                                    <?php if( $dateOption ) { ?>
                                            <div class="info__time"><i class="far fa-clock"></i>
                                                <p>Clock  Wed 02, 2019</p>
                                            </div>
                                    <?php }
                                        if( $commentOption ) {
                                    ?>
                                            <div class="info__comment">
                                                <i class="far fa-comment"></i>
                                                <p><?php echo absint( get_comments_number( $singlepost_id ) ); ?></p>
                                            </div>
                                    <?php } ?>
                                </div>
                                <?php if( $excerptOption ) { ?>
                                    <div class="card__content-description">
                                        <?php the_excerpt(); ?>
                                    </div>
                                <?php }

                                    if( $buttonOption ) {
                                ?>
                                        <div class="card__button"><a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Posts List', 'armonia' ); ?></a></div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
            ?>
        </div>
    </div>
</div>