<?php
/**
 * Slider Template Part - Layout One
 * 
 * @package Armonia
 * @since 1.0.0
 */
$postCategory = $args->category;
$postCount = $args->count;
$dateOption = $args->dateOption;
$commentOption = $args->commentOption;
?>
<div class="container-max no-gutter">
    <div class="blog-ocean__slider layout-four">
        <?php
            $banner_slider_posts = new WP_Query( array(
                'category_name'     => esc_html( $postCategory ),
                'posts_per_page'    => esc_html( $postCount )      
            ));
            if( $banner_slider_posts->have_posts() ) :
                while( $banner_slider_posts->have_posts() ) : $banner_slider_posts->the_post();
                $blockCategories = get_the_category();
            ?>
                    <div class="blog-ocean__slider__item">
                        <div class="slider-item__image">
                            <?php if( has_post_thumbnail() ) : ?>
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"/>
                            <?php endif; ?>
                        </div>
                        <div class="slider-item__content">
                            <div class="post-card -center -theme--blue">
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
                                                    <p><?php echo get_the_date(); ?></p>
                                                </div>
                                        <?php }
                                        
                                            if( $commentOption ) {
                                        ?>
                                                <div class="info__comment"><i class="far fa-comment"></i>
                                                    <p><?php echo absint( get_comments_number() ); ?></p>
                                                </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
                endwhile;
            endif;
        ?>
    </div>
</div>