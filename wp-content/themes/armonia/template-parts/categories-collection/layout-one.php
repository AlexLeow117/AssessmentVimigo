<?php
/**
 * Template parts - layout one "Categories Collection"
 */
$blockTitle = $args->blockTitle;
$postCategories = $args->categories;
$titleOption = $args->titleOption;
$countOption = $args->countOption;
?>
<div class="bmm-categories-collection-block bmm-block bmm-block-categories-collection--layout-one">
    <div class="container">
        <?php
            if( !empty( $blockTitle ) ) {
                ?>
                <div class="news-block__header">
                    <div class="header__controller__title">
                        <div class="center-line-title -large -mb-0">
                            <h5><?php esc_html( $blockTitle ); ?></h5>
                        </div>
                    </div>
                </div>
            <?php }
        ?>
        <div class="categories-wrap row">
            <?php
            if( $postCategories != '[]' ) {
                $postCategories = get_categories( array( 'slug' => explode( ",", $postCategories ) ) );
            } else {
                $postCategories = get_categories();
            }
                foreach( $postCategories as $singleCat ) :
                    $cat_name = $singleCat->name;
                    $cat_count = $singleCat->count;
                    $cat_slug = $singleCat->slug;
                    $singlecat_id = $singleCat->cat_ID;
                    $block_post = new WP_Query( 
                        array( 
                            'category_name'    => esc_html( $cat_slug ),
                            'posts_per_page' => 1,
                            'meta_query' => array(
                                array(
                                    'key' => '_thumbnail_id',
                                    'compare' => 'EXISTS'
                                ),
                            )
                        )
                    );
                    if( $block_post->have_posts() ) :
                        while( $block_post->have_posts() ) : $block_post->the_post();
                            $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'armonia-medium' );
                        endwhile;
                    endif;
            ?>      <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="post-card category-item cat-<?php echo esc_attr( $singlecat_id ); ?>">
                            <div class="category-thumb-wrap bmm-post-thumb">
                                <a href="<?php echo esc_url( get_term_link( $singlecat_id ) ); ?>" class="card__cover">
                                    <?php if( isset( $thumbnail_url ) && $thumbnail_url ) : ?>
                                        <img src="<?php echo esc_url( $thumbnail_url ); ?>">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="cat-meta bmm-post-title card__content">
                                <?php
                                    if( $titleOption ) {
                                        echo '<span class="category-name"><a href="' .esc_url( get_term_link( $singlecat_id ) ). '">' .esc_html( $cat_name ).'</a></span>';
                                    }

                                    if( $countOption ) {
                                        echo '<span class="category-count"> &nbsp; ' .absint( $cat_count ). ' </span>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
            <?php
                endforeach;
            ?>
        </div>
    </div>
</div>