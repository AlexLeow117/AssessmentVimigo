<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Armonia
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function armonia_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	global $post;
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	$classes[] = esc_attr( 'header-layout--three' );
	$classes[] = esc_attr( 'read-more-layout--one' );

	// Manage sidebar layouts
	if( is_page() || is_404() ) {
		$page_sidebar_layout = get_theme_mod( 'page_sidebar_layout', 'right-sidebar' );
		$sidebar_layout = $page_sidebar_layout ? $page_sidebar_layout : 'no-sidebar';
	} else if( is_home() ) {
		$archive_sidebar_layout = get_theme_mod( 'archive_sidebar_layout', 'right-sidebar' );
		$sidebar_layout = $archive_sidebar_layout ? $archive_sidebar_layout : 'no-sidebar';	
	}
	else if( is_single() ) {
		$post_sidebar_layout = get_theme_mod( 'post_sidebar_layout', 'right-sidebar' );
		$sidebar_layout = $post_sidebar_layout ? $post_sidebar_layout : 'no-sidebar';
	} else if ( is_archive() || is_search() ) {
		$archive_sidebar_layout = get_theme_mod( 'archive_sidebar_layout', 'right-sidebar' );
		$sidebar_layout = $archive_sidebar_layout ? $archive_sidebar_layout : 'no-sidebar';
	}
	$classes[] = isset( $sidebar_layout ) ? esc_attr( $sidebar_layout ) : 'right-sidebar'; // sidebar class
	return $classes;
}
add_filter( 'body_class', 'armonia_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function armonia_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'armonia_pingback_header' );

//define constant
define( 'ARMONIA_INCLUDES_PATH', get_template_directory() . '/inc/' );

/**
 * Enqueue scripts and styles.
 */
function armonia_scripts() {
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/lib/fontawesome/css/all.min.css', array(), '5.15.3', 'all' );
	wp_enqueue_style( 'armonia-custom-style', get_template_directory_uri() . '/assets/css/style.css', array(), ARMONIA_VERSION, 'all' );
	wp_enqueue_style( 'armonia-custom-bootstrap', get_template_directory_uri() . '/assets/css/custom_bootstrap.css', array(), ARMONIA_VERSION, 'all' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/lib/slick/slick.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'armonia-additional-css', get_template_directory_uri() . '/assets/css/additional.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'armonia-typo-fonts', armonia_typo_fonts_url(), array(), null );
	wp_enqueue_style( 'armonia-fonts', armonia_fonts_url(), array(), null );
	wp_enqueue_style( 'armonia-style', get_stylesheet_uri(), array(), ARMONIA_VERSION );
	wp_style_add_data( 'armonia-style', 'rtl', 'replace' );
	// enqueue inline style
	ob_start();
		include get_template_directory() . '/inc/inline-styles.php';
	$armonia_theme_inline_sss = ob_get_clean();
	wp_add_inline_style( 'armonia-style', wp_strip_all_tags($armonia_theme_inline_sss) );

	wp_enqueue_script('jquery-masonry');
	$sticky_sidebars_option = get_theme_mod( 'sticky_sidebars_option', true );
	if( $sticky_sidebars_option ) wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/lib/sticky/theia-sticky-sidebar.js', array(), '1.7.0', true );
	$sticky_header_option = get_theme_mod( 'sticky_header_option', false );
	if( $sticky_header_option ) wp_enqueue_script( 'waypoint', get_template_directory_uri() . '/assets/lib/waypoint/jquery.waypoint.min.js', array(), '4.0.1', true );
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/lib/imagesloaded/imagesloaded.pkgd.min.js', array( 'jquery' ), '4.1.14', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/lib/slick/slick.min.js', array( 'jquery' ), '1.8.1', true );
	wp_enqueue_script( 'armonia-theme', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), ARMONIA_VERSION, true );
	wp_enqueue_script( 'armonia-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array( 'jquery' ), ARMONIA_VERSION, true );

	$scriptVars = array(
		'scrollToTop'	=> get_theme_mod( 'scroll_to_top_option', true ),
		'stickySidebar'	=> esc_html( $sticky_sidebars_option ),
		'stickyHeader' 	=> esc_html( $sticky_header_option )
	);
	wp_localize_script( 'armonia-theme', 'armoniaThemeObject', $scriptVars );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'armonia_scripts' );

/**
 * Register Google fonts.
 * @return string Google fonts URL for the theme.
 */
if ( ! function_exists( 'armonia_fonts_url' ) ) :
	function armonia_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'cyrillic,cyrillic-ext';
	
		if ( 'off' !== esc_html_x( 'on', 'DM Sans: on or off', 'armonia' ) ) {
			$fonts[] = 'DM Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap';
		}

		if ( 'off' !== esc_html_x( 'on', 'Montserrat: on or off', 'armonia' ) ) {
			$fonts[] = 'Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap';
		}
		
		if ( 'off' !== esc_html_x( 'on', 'Cormorant Garamond: on or off', 'armonia' ) ) {
			$fonts[] = 'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,500&display=swap';
		}
		
		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}
	
		return $fonts_url;
	}
endif;

if( !function_exists( 'armonia_typo_fonts_url' ) ) :
	/**
	 * Filter and Enqueue typography fonts
	 * 
	 */
	function armonia_typo_fonts_url() {
		$site_title_font_family = get_theme_mod( 'site_title_font_family', 'DM Sans' );
		$site_title_font_weight = get_theme_mod( 'site_title_font_weight', '500' );
		$site_title_typo = $site_title_font_family.":".$site_title_font_weight;

		$header_menu_font_family = get_theme_mod( 'header_menu_font_family', 'DM Sans' );
		$header_menu_font_weight = get_theme_mod( 'header_menu_font_weight', '400' );
		$header_menu_typo = $header_menu_font_family.":".$header_menu_font_weight;

		$get_fonts = array( $site_title_typo, $header_menu_typo );
		$font_weight_array = array();

		foreach ( $get_fonts as $fonts ) {
			$each_font = explode( ':', $fonts );
			if ( ! isset ( $font_weight_array[$each_font[0]] ) ) {
				$font_weight_array[$each_font[0]][] = $each_font[1];
			} else {
				if ( ! in_array( $each_font[1], $font_weight_array[$each_font[0]] ) ) {
					$font_weight_array[$each_font[0]][] = $each_font[1];
				}
			}
		}
		$final_font_array = array();
		foreach ( $font_weight_array as $font => $font_weight ) {
			$each_font_string = $font.':'.implode( ',', $font_weight );
			$final_font_array[] = $each_font_string;
		}

		$final_font_string = implode( '|', $final_font_array );
		$google_fonts_url = '';
		$subsets   = 'cyrillic,cyrillic-ext';
		if ( $final_font_string ) {
			$query_args = array(
				'family' => urlencode( $final_font_string ),
				'subset' => urlencode( $subsets )
			);
			$google_fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}
		return $google_fonts_url;
	}
endif;

/**
 * Include files
 */
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/hooks/frontpage-sections.php';
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/hooks/hooks.php';
require get_template_directory() . '/inc/admin/class-theme-info.php';
if( ! class_exists( 'Breadcrumb_Trail' ) ) :
	require get_template_directory() . '/inc/class-breadcrumb.php';
endif;

if( ! function_exists( 'armonia_get_thumb_html_by_post_format' ) ) :
	/**
	 * Renders the html content of the current post - w.r.t current post format 
	 * 
	 * @package Armonia
	 * @since 1.0.0
	 * 
	 * @return html
	 */
	function armonia_get_thumb_html_by_post_format() {
		$format = get_post_format() ? : 'standard';
		if( $format === 'image' ) return;
		switch( $format ) :
			case 'video' :  // video post format
							if( has_block('core/video') || has_block('core/embed') ) :
								$blocksArray = parse_blocks( get_the_content() );
								foreach( $blocksArray as $singleBlock ) :
									if( 'core/video' === $singleBlock['blockName'] ) { echo wp_kses_post( apply_filters( 'the_content', render_block( $singleBlock ) ) ); break; }
								endforeach;
							else :
								?>
									<a class="card__cover" href="<?php the_permalink(); ?>">
										<?php if( has_post_thumbnail() ) : ?>
											<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"/>
										<?php endif; ?>
									</a>
								<?php
							endif;
						break;
			case 'quote' :  // quote post format
							if( has_block('core/quote') ) :
								echo '<div class="post-card-quote -border">';
								echo '<div class="qoute__icon"><i class="fas fa-quote-left"></i></div>';
								$blocksArray = parse_blocks( get_the_content() );
								foreach( $blocksArray as $singleBlock ) :
									if( 'core/quote' === $singleBlock['blockName'] ) { echo wp_kses_post( apply_filters( 'the_content', render_block( $singleBlock ) ) ); break; }
								endforeach;
								echo '</div>';
							else :
								?>
									<a class="card__cover" href="<?php the_permalink(); ?>">
										<?php if( has_post_thumbnail() ) : ?>
											<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"/>
										<?php endif; ?>
									</a>
								<?php
							endif;
						break;
			case 'gallery' :  // gallery post format
							if( has_block('core/gallery') ) :
								$blocksArray = parse_blocks( get_the_content() );
								foreach( $blocksArray as $singleBlock ) :
									if( 'core/gallery' === $singleBlock['blockName'] ) { echo wp_kses_post( apply_filters( 'the_content', render_block( $singleBlock ) ) ); break; }
								endforeach;
							else :
								?>
									<a class="card__cover" href="<?php the_permalink(); ?>">
										<?php if( has_post_thumbnail() ) : ?>
											<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"/>
										<?php endif; ?>
									</a>
								<?php
							endif;
						break;
			case 'audio' :  // audio post format
						?>
							<a class="card__cover" href="<?php the_permalink(); ?>">
								<?php if( has_post_thumbnail() ) : ?>
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"/>
                                <?php endif;
									if( has_block('core/audio') ) :
										$blocksArray = parse_blocks( get_the_content() );
										foreach( $blocksArray as $singleBlock ) :
											if( 'core/audio' === $singleBlock['blockName'] ) { echo wp_kses_post( apply_filters( 'the_content', render_block( $singleBlock ) ) ); break; }
										endforeach;
									endif;
								?>
							</a>
						<?php
						break;
			default : ?>
				<a class="card__cover" href="<?php the_permalink(); ?>">
					<?php if( has_post_thumbnail() ) : ?>
						<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"/>
					<?php endif; ?>
				</a>
			<?php
		endswitch;
	}
endif;