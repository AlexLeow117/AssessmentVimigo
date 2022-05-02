<?php
/**
 * Contains theme hooks and functions
 * 
 * @package Armonia
 * @since 1.0.0
 */
if( !function_exists( 'armonia_scroll_to_top' ) ) :
    /**
     * Scroll to top fnc
     * 
     * @since 1.0.0
     */
    function armonia_scroll_to_top() {
        $scroll_to_top_option = get_theme_mod( 'scroll_to_top_option', true );
        if( !$scroll_to_top_option ) {
            return;
        }
        $scroll_to_top_align = get_theme_mod( 'scroll_to_top_align', 'align--left' );
    ?>
        <div id="armonia-scroll-to-top" class="<?php echo esc_attr( $scroll_to_top_align ); ?>" title="<?php esc_attr_e( 'Back to top', 'armonia' ) ?>">
            <span class="icon-holder"><i class="fas fa-chevron-up"></i></span>
        </div><!-- #armonia-scroll-to-top -->
    <?php
    }
    add_action( 'armonia_after_footer_hook', 'armonia_scroll_to_top' );
 endif;

 if( ! function_exists( 'armonia_single_author_box' ) ) :
    /**
     * Single author box
     * 
     */
    function armonia_single_author_box() {
        if( get_post_type() != 'post' ) return;

        if( get_theme_mod('single_post_author_box_option', true) ):
            ?>
            <div class="post-footer__author">
                <div class="author__avatar">
                    <?php echo wp_kses_post( get_avatar(get_the_author_meta('ID')) ); ?>
                </div>
                <div class="author__info">
                    <h5 class="author-name"><?php echo esc_html( get_the_author() ); ?></h5>
                    <?php if( get_the_author_meta('description') ) { ?>
                        <p class="author-desc"><?php echo wp_kses_post( get_the_author_meta('description') ); ?></p>
                    <?php } ?>
                </div>
            </div>
            <?php
        endif;

    }
 endif;
 add_action( 'armonia_single_after_content', 'armonia_single_author_box' );

 if( ! function_exists( 'armonia_single_related_posts' ) ) :
    /**
     * Single related posts
     * 
     */
    function armonia_single_related_posts() {
        $single_post_related_posts_option = get_theme_mod( 'single_post_related_posts_option', true );
        if( get_post_type() != 'post' ) return;
        if( ! $single_post_related_posts_option ) return;
        $single_post_related_posts_title = get_theme_mod( 'single_post_related_posts_title', esc_html__( 'Related Posts', 'armonia' ) );
  ?>
            <div class="single-related-posts-section">
                <?php
                    if( $single_post_related_posts_title ) {
                        echo '<div class="center-line-title -large -mb-2"><h5>' .esc_html( $single_post_related_posts_title ). '</h5></div>';
                    }
                    $related_posts_args = array(
                        'post__not_in'  => array( get_the_ID() )
                    );
                    $current_post_tags = get_the_tags(get_the_ID());
                    if( $current_post_tags ) :
                        foreach( $current_post_tags as $current_post_tag ) :
                            $query_tags[] =  $current_post_tag->term_id;
                        endforeach;
                        $related_posts_args['tag__in'] = $query_tags;
                    endif;
                    $related_posts = new WP_Query( $related_posts_args );
                    if( $related_posts->have_posts() ) :
                        echo '<div class="single-related-posts-wrap">';
                            while( $related_posts->have_posts() ) : $related_posts->the_post();
                        ?>
                                <article post-id="post-<?php the_ID(); ?>" class="bmm-post post-card">
                                    <div class="post-thumb-wrap">
                                        <?php
                                            if( has_post_thumbnail() ) {
                                            ?>
                                                <div class="bmm-post-thumb">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"/>
                                                    </a>
                                                </div>
                                        <?php } ?>
                                    </div>
                                    <div class="card__content">
                                        <?php
                                            $categories = get_the_category( get_the_ID() );
                                            if( $categories ) {
                                                echo '<div class="bmm-post-cats-wrap bmm-post-meta-item">';
                                                foreach( $categories as $category ) :
                                                    echo '<span class="bmm-post-cat bmm-cat-'.absint( $category->term_id ).'"><a href="'.esc_url( get_term_link( $category->term_id ) ).'">'.esc_html( $category->name ).'</a></span>';
                                                endforeach;
                                                echo '</div>';
                                            }
                                        ?>
                                        <div class="bmm-post-title">
                                            <a class="card__content-title" href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                        <?php
                            endwhile;
                        echo '</div>';
                    endif;
                ?>
            </div>
    <?php
    }
 endif;
 add_action( 'armonia_single_post_footer_hook', 'armonia_single_related_posts' );

 if ( ! function_exists( 'armonia_breadcrumb_trail' ) ) {
    /**
     * Breadcrumbs hook
     * 
     * @package Armonia
     * @since 1.0.0
     */
    function armonia_breadcrumb_trail() {
        //check customizer if breadcrumb is enabled
        if ( get_theme_mod ( 'breadcrumb_option', true ) != true ) return;

        if( !function_exists( 'breadcrumb_trail' ) ) return;
        $theme_args = array(
            'container'       => 'nav',
            'show_on_front'   => false,
            'network'         => false,
            'show_title'      => true,
            'show_browse'     => true,
            'labels' => array(
                'browse'              => esc_html__( 'Browse : ', 'armonia' ),
                'home'                => esc_html__( 'Home', 'armonia' ),
                'error_404'           => esc_html__( '404 Not Found', 'armonia' ),
                'search'              => esc_html__( 'Search results for: ', 'armonia' ) . ' %s'
            )
        );
        echo '<div class="container">';
          breadcrumb_trail( $theme_args );
        echo '</div>';
    }
    add_action( 'armonia_before_content_hook', 'armonia_breadcrumb_trail', 10 );
}


if( ! function_exists( 'armonia_pagination_fnc' ) ) :
    /**
     * Renders pagination
     * 
     */
    function armonia_pagination_fnc() {
        if( is_null( paginate_links() ) ) {
            return;
        }
        echo '<div class="pagination">' .wp_kses_post( paginate_links( array( 'prev_text' => '<i class="fas fa-chevron-left"></i>', 'next_text' => '<i class="fas fa-chevron-right"></i>', 'type' => 'list' ) ) ). '</div>';
    }
    add_action( 'armonia_pagination_link_hook', 'armonia_pagination_fnc' );
 endif;