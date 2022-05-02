<?php
/**
 * Header Template - layout three
 * 
 * @package Armonia
 * @since 1.0.0
 */
?>
<header class="theme-default">
    <?php if( get_theme_mod( 'header_search_option', true ) ) { ?>
        <div id="search-box">
            <div class="container">
                <?php echo get_search_form(); ?>
            </div>
        </div>
    <?php } ?>
    <div class="container">
        <div class="header-wrapper">
            <div class="row menu_nav_content row-full">
                <nav id="site-navigation">
                <button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars"></i><span class="menu_txt"><?php esc_html_e('MENU','armonia') ?></button>
                <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                            )
                        );
                    ?>
                </nav>
            </div>

            <div class="row top_header_col">
                <div class="header-toggle-sidebar-wrap">
                    <?php if( get_theme_mod( 'header_sidebar_toggle_bar_option', true ) ) : ?>

                        <section class="armonial-side-wrapper header-sidebar-trigger">
                            <a href="javascript:void(0);" class="burger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </section>

                        <div class="header-sidebar-content">
                            <div class="header_sidebar-content-inner-wrap">
                                <div class="header-sidebar-trigger-close"><a href="javascript:void(0);"><i class="fas fa-times"></i></a></div>
                                <?php 
                                    if( is_active_sidebar( 'sidebar-header-toggle' ) ) {
                                            dynamic_sidebar( 'sidebar-header-toggle' );
                                    } else {
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
                                    }
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="logo_wrap">
                    <?php
                        the_custom_logo();
                            ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="has_dot"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php
                        $armonia_description = get_bloginfo( 'description', 'display' );
                        if ( $armonia_description || is_customize_preview() ) :
                            ?>
                            <p class="site-description"><?php echo wp_kses_post( $armonia_description ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                    <?php
                        endif;
                    ?>
                </div>

                <div class="header__icon-group">
                    <?php 
                        if( get_theme_mod( 'header_search_option', true ) ) {
                            echo '<a href="#" id="search"><i class="fas fa-search"></i></a>';
                        }

                        if( get_theme_mod( 'header_social_option', true ) ) :
                            $social_icons = get_theme_mod( 'social_icons', json_encode(array(
                                    array(
                                    'icon_value'  => 'fab fa-linkedin-in',
                                    'link'        => '#'
                                    ),
                                    array(
                                    'icon_value'  => 'fab fa-instagram',
                                    'link'        => '#'
                                    ),
                                    array(
                                    'icon_value'  => 'fab fa-twitter',
                                    'link'        => '#'
                                    ),
                                    array(
                                    'icon_value'  => 'fab fa-behance',
                                    'link'        => '#'
                                    )
                                ))
                            );
                            $social_icons_docoded = json_decode( $social_icons );
                    ?>
                            <div class="social">
                                <?php
                                    foreach( $social_icons_docoded as $social_icon ) {
                                        $icon_value = $social_icon->icon_value;
                                        $icon_link = $social_icon->link;
                                        echo '<a href="' .esc_url( $icon_link ). '"><i class="' .esc_attr( $icon_value ). '"></i></a>';
                                    }
                                ?>
                                <a id="mobile-menu-controller" href="#"><i class="fas fa-bars"></i></a>
                            </div>
                    <?php
                        endif;
                    ?>
                </div>
            </div>
    </div>
</header>