<?php
/**
 * Frontpage sections hooks
 * 
 */
if( ! function_exists( 'armonia_top_full_width_sec' )  ) :
    /**
     * Top Full Width Section
     * 
     */
    function armonia_top_full_width_sec() {
        $frontpage_top_full_width_blocks = get_theme_mod( 'frontpage_top_full_width_blocks', json_encode(array(
                    array(
                        'name'      => 'banner-slider',
                        'option'    => true,
                        'category'  => '',
                        'count'     => 6,
                        'dateOption' => true,
                        'commentOption' => true
                    )
                )
            )
        );
        if( ! $frontpage_top_full_width_blocks ) {
            return;
        }
        $decoded_blocks = json_decode( $frontpage_top_full_width_blocks );
        if( ! in_array( true, array_column( $decoded_blocks, 'option' ) ) ) {
            return;
        }
        echo '<section id="armonia-top-full-width-section" class="armonia-frontpage-section">';
            foreach( $decoded_blocks as $block ) :
                $option = $block->option;
                if( $option ) {
                    $block_name = $block->name;
                    if( isset( $block->layout ) ) {
                        $layout = $block->layout;
                    } else {
                        $layout = 'one';
                        if( $block_name === "banner-slider" ) $layout = 'four';
                    }
                    get_template_part( 'template-parts/' .$block_name. '/layout', $layout, $block );
                }
            endforeach;
        echo '</section><!-- #armonia-top-full-width-section -->';
    }
endif;


if( !function_exists( 'armonia_top_about_author__sec' ) ) :
    /**
     * About Author Section
     * 
     */
    function armonia_top_about_author__sec() {
        $about_author_section_option = get_theme_mod( 'about_author_section_option', true );
        if( ! $about_author_section_option ) {
            return;
        }
        $frontpage_about_author_title = get_theme_mod( 'frontpage_about_author_title', esc_html__( 'Talking about me. I am a blogger.', 'armonia' ) );
        $frontpage_about_author_desc = get_theme_mod( 'frontpage_about_author_desc' );
        $frontpage_about_author_signature_image = get_theme_mod( 'frontpage_about_author_signature_image', esc_url( get_template_directory_uri() . '/assets/images/signature.png' ) );
        $frontpage_about_author_image = get_theme_mod( 'frontpage_about_author_image', esc_url( get_template_directory_uri() . '/assets/images/author.jpg' ) );
    ?>
        <section id="armonia-about-author-section" class="armonia-frontpage-section">
            <div class="author-content">
                <?php
                    if( !empty( $frontpage_about_author_title ) )
                        echo '<h2 class="author-title">' .esc_html( $frontpage_about_author_title ). '</h2>';

                    if( !empty( $frontpage_about_author_desc ) )
                        echo '<p class="author-desc">' .wp_kses_post( $frontpage_about_author_desc ). '</p>';
                ?>
            </div>
            <figure class="author-image-wrap" id="imgstack">
                <?php
                    if( !empty( $frontpage_about_author_image ) )
                        echo '<div class="author_img_wrap">';
                        echo '<img class="author-image" src="' .esc_url( $frontpage_about_author_image ). '">';
                        echo '</div>';

                    if( !empty( $frontpage_about_author_signature_image ) )
                        echo '<img class="author-signature" src="' .esc_url( $frontpage_about_author_signature_image ). '">';
                ?>
            </figure>
        </section>
    <?php
    }
endif;

if( ! function_exists( 'armonia_middle_left_content_sec' )  ) :
    /**
     * Middle Left Content Section
     * 
     */
    function armonia_middle_left_content_sec() {
        $frontpage_middle_left_content_blocks = get_theme_mod( 'frontpage_middle_left_content_blocks', json_encode(array(
                    array(
                        'name'      => 'posts-grid',
                        'option'    => true,
                        'blockTitle'=> esc_html__( 'Latest posts', 'armonia' ),
                        'category'  => '',
                        'count'     => 4,
                        'excerptOption'=> true,
                        'dateOption' => true,
                        'commentOption' => true,
                        'buttonOption'  => true,
                        'layout'    => 'seven'
                    ),
                    array(
                        'name'      => 'categories-collection',
                        'option'    => false,
                        'blockTitle'=> esc_html__( 'Categories Collection', 'armonia' ),
                        'categories'  => '[]',
                        'count'     => 4,
                        'countOption'   => true,
                        'titleOption'   => true
                    )
                )
            )
        );
        if( ! $frontpage_middle_left_content_blocks ) {
            return;
        }
        $decoded_blocks = json_decode( $frontpage_middle_left_content_blocks );
        if( ! in_array( true, array_column( $decoded_blocks, 'option' ) ) ) {
            return;
        }
        echo '<section id="armonia-middle-left-content-section" class="armonia-frontpage-section">';
            echo '<div class="row">';
                echo '<div class="primary-section col-md-8">';
                    foreach( $decoded_blocks as $block ) :
                        $option = $block->option;
                        if( $option ) {
                            $block_name = $block->name;
                            if( isset( $block->layout ) ) {
                                $layout = $block->layout;
                            } else {
                                $layout = 'one';
                                if( $block_name === "banner-slider" ) $layout = 'four';
                            }
                            get_template_part( 'template-parts/' .$block_name. '/layout', $layout, $block );
                        }
                    endforeach;
                echo '</div><!-- .primary-section -->';

                echo '<div class="secondary-section col-md-4">';
                    if( is_active_sidebar( 'frontpage-middle-right-sidebar' ) ) :
                        dynamic_sidebar( 'frontpage-middle-right-sidebar' );
                    else :
                        the_widget( 'WP_Widget_Recent_Posts' );
                    ?>
                        <div class="widget widget_categories">
                            <h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'armonia' ); ?></h2>
                            <ul>
                                <?php
                                    wp_list_categories(
                                        array(
                                            'orderby'    => 'count',
                                            'order'      => 'DESC',
                                            'title_li'   => '',
                                            'number'     => 6,
                                        )
                                    );
                                ?>
                            </ul>
                        </div><!-- .widget -->
                        
                    <?php
                    endif;
                echo '</div>';
            echo '</row>'; // row end
        echo '</section><!-- #armonia-middle-left-content-section -->';
    }
endif;

if( ! function_exists( 'armonia_middle_right_content_sec' )  ) :
    /**
     * Middle Right Content Section
     * 
     */
    function armonia_middle_right_content_sec() {
        $frontpage_middle_right_content_blocks = get_theme_mod( 'frontpage_middle_right_content_blocks', json_encode(array(
                    array(
                        'name'      => 'posts-list',
                        'option'    => false,
                        'blockTitle'=> esc_html__( 'Posts List', 'armonia' ),
                        'category'  => '',
                        'count'     => 4,
                        'excerptOption'=> true,
                        'dateOption' => true,
                        'commentOption' => true,
                        'buttonOption'  => false
                    ),
                    array(
                        'name'      => 'categories-collection',
                        'option'    => false,
                        'blockTitle'=> esc_html__( 'Categories Collection', 'armonia' ),
                        'categories'  => '[]',
                        'count'     => 4,
                        'countOption'   => true,
                        'titleOption'   => true
                    )
                )
            )
        );
        if( ! $frontpage_middle_right_content_blocks ) {
            return;
        }
        $decoded_blocks = json_decode( $frontpage_middle_right_content_blocks );
        if( ! in_array( true, array_column( $decoded_blocks, 'option' ) ) ) {
            return;
        }
        echo '<section id="armonia-middle-right-content-section" class="armonia-frontpage-section">';
            echo '<div class="row">';
                echo '<div class="primary-section col-md-8">';
                    foreach( $decoded_blocks as $block ) :
                        $option = $block->option;
                        if( $option ) {
                            $block_name = $block->name;
                            $layout = 'one';
                            if( $block_name === "banner-slider" ) $layout = 'four';
                            if( $block_name === "posts-grid" ) $layout = 'seven';
                            get_template_part( 'template-parts/' .$block_name. '/layout', $layout, $block );
                        }
                    endforeach;
                echo '</div>';

                echo '<div class="secondary-section col-md-4 order-md-first">';
                    if( is_active_sidebar( 'frontpage-middle-left-sidebar' ) ) :
                        dynamic_sidebar( 'frontpage-middle-left-sidebar' );
                    else :
                        the_widget( 'WP_Widget_Recent_Posts' );
                    ?>
                        <div class="widget widget_categories">
                            <h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'armonia' ); ?></h2>
                            <ul>
                                <?php
                                    wp_list_categories(
                                        array(
                                            'orderby'    => 'count',
                                            'order'      => 'DESC',
                                            'title_li'   => '',
                                            'number'     => 6,
                                        )
                                    );
                                ?>
                            </ul>
                        </div><!-- .widget -->
                    <?php
                    endif;
                echo '</div>';
            echo '</div>';
        echo '</section><!-- #armonia-middle-right-content-section -->';
    }
endif;

if( ! function_exists( 'armonia_bottom_full_width_sec' )  ) :
    /**
     * Bottom Full Width Section
     * 
     */
    function armonia_bottom_full_width_sec() {
        $frontpage_bottom_full_width_blocks = get_theme_mod( 'frontpage_bottom_full_width_blocks', json_encode(array(
                    array(
                        'name'      => 'posts-list',
                        'option'    => true,
                        'blockTitle'=> esc_html__( 'You may have missed', 'armonia' ),
                        'category'  => '',
                        'count'     => 4,
                        'excerptOption'=> true,
                        'dateOption' => true,
                        'commentOption' => true,
                        'buttonOption'  => false
                    ),
                    array(
                        'name'      => 'posts-grid',
                        'option'    => false,
                        'blockTitle'=> esc_html__( 'Posts Grid', 'armonia' ),
                        'category'  => '',
                        'count'     => 4,
                        'excerptOption'=> true,
                        'dateOption' => true,
                        'commentOption' => true,
                        'buttonOption'  => true,
                        'layout'    => 'one'
                    )
                )
            )
        );
        if( ! $frontpage_bottom_full_width_blocks ) {
            return;
        }
        $decoded_blocks = json_decode( $frontpage_bottom_full_width_blocks );
        if( ! in_array( true, array_column( $decoded_blocks, 'option' ) ) ) {
            return;
        }
        echo '<section id="armonia-bottom-full-width-section" class="armonia-frontpage-section">';
            foreach( $decoded_blocks as $block ) :
                $option = $block->option;
                if( $option ) {
                    $block_name = $block->name;
                    if( isset( $block->layout ) ) {
                        $layout = $block->layout;
                    } else {
                        $layout = 'one';
                        if( $block_name === "banner-slider" ) $layout = 'four';
                    }
                    get_template_part( 'template-parts/' .$block_name. '/layout', $layout, $block );
                }
            endforeach;
        echo '</section><!-- #armonia-bottom-full-width-section -->';
    }
endif;

if( ! function_exists( 'armonia_bottom_full_width_woocommerce_sec' )  ) :
    /**
     * Bottom Full Width Woocommerce Section
     * 
     */
    function armonia_bottom_full_width_woocommerce_sec() {
        if( ! class_exists( 'WooCommerce' ) ) return;
        $frontpage_bottom_full_width_woocommerce_blocks = get_theme_mod( 'frontpage_bottom_full_width_woocommerce_blocks', json_encode(array(
                    array(
                        'name'      => 'woo-products',
                        'option'    => true,
                        'blockTitle'=> esc_html__( 'Latest Products', 'armonia' ),
                        'productType' => 'latest',
                        'categories'  => '[]',
                        'count'     => 4
                    )
                )
            )
        );
        if( ! $frontpage_bottom_full_width_woocommerce_blocks ) {
            return;
        }
        $decoded_blocks = json_decode( $frontpage_bottom_full_width_woocommerce_blocks );
        if( ! in_array( true, array_column( $decoded_blocks, 'option' ) ) ) {
            return;
        }
        echo '<section id="armonia-bottom-full-width-woocommerce-section" class="armonia-frontpage-section">';
            foreach( $decoded_blocks as $block ) :
                $option = $block->option;
                if( $option ) {
                    $block_name = $block->name;
                    if( isset( $block->layout ) ) {
                        $layout = $block->layout;
                    } else {
                        $layout = 'one';
                        if( $block_name === "banner-slider" ) $layout = 'four';
                    }
                    get_template_part( 'template-parts/' .$block_name. '/layout', $layout, $block );
                }
            endforeach;
        echo '</section><!-- #armonia-bottom-full-width-woocommerce-section -->';
    }
endif;

add_action( 'armonia_frontpage_section_hook', 'armonia_top_full_width_sec', 10 );
add_action( 'armonia_frontpage_section_hook', 'armonia_top_about_author__sec', 10 );
add_action( 'armonia_frontpage_section_hook', 'armonia_middle_left_content_sec', 20 );
add_action( 'armonia_frontpage_section_hook', 'armonia_middle_right_content_sec', 30 );
add_action( 'armonia_frontpage_section_hook', 'armonia_bottom_full_width_woocommerce_sec', 40 );
add_action( 'armonia_frontpage_section_hook', 'armonia_bottom_full_width_sec', 50 );

if( ! function_exists( 'armonia_footer_three_column_sec' ) ) :
    /**
     * Footer three column section fnc
     * 
     */
    function armonia_footer_three_column_sec() {
        if( ! is_front_page() ) {
            return;
        }
        $footer_three_column_blocks = get_theme_mod(  'footer_three_column_blocks', json_encode(array(
                    array(
                        'label'=> esc_html__( 'Column One', 'armonia' ),
                        'name'      => 'posts-column',
                        'category'  => '',
                        'dateOption' => true,
                        'layout'    => 'one'
                    ),
                    array(
                        'label'=> esc_html__( 'Column Two', 'armonia' ),
                        'name'      => 'posts-column',
                        'category'  => '',
                        'dateOption' => true,
                        'layout'    => 'two'
                    ),
                    array(
                        'label'=> esc_html__( 'Column Three', 'armonia' ),
                        'name'      => 'posts-column',
                        'category'  => '',
                        'dateOption' => true,
                        'layout'    => 'three'
                    )
                )
            )
        );
        if( ! $footer_three_column_blocks ) {
            return;
        }
        echo '<section id="armonia-footer-three-column-section">';
            echo '<div class="container">';
                echo '<div class="row">';
                    $decoded_blocks = json_decode( $footer_three_column_blocks );
                    foreach( $decoded_blocks as $block ) :
                        $block_name = $block->name;
                        $layout = $block->layout;
                        get_template_part( 'template-parts/' .$block_name. '/layout', esc_html( $layout ), $block );
                    endforeach;
                echo '</div>';
            echo '</div>';
        echo '</section><!-- #armonia-footer-three-column-section -->';
    }
endif;
add_action( 'armonia_before_footer_hook', 'armonia_footer_three_column_sec', 40 );