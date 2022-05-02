<?php

/*-----------------------------------------------------------------------------------*/
/* Enqueu scripts */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('viandante_enqueue_scripts')) {

	function viandante_enqueue_scripts() {

		wp_deregister_style( 'avventura-lite-style' );
		wp_deregister_style( 'avventura-lite-' . esc_attr(get_theme_mod('avventura_lite_skin', 'orange')) );

		wp_enqueue_style( 'avventura-lite-parent-style' , get_template_directory_uri() . '/style.css' ); 

		wp_enqueue_style(
			'viandante-' . esc_attr(get_theme_mod('avventura_lite_skin', 'orange')),
			get_stylesheet_directory_uri() . '/assets/skins/' . esc_attr(get_theme_mod('avventura_lite_skin', 'orange')) . '.css',
			array( 'viandante-style' ),
			'1.0.0'
		); 

		wp_enqueue_style( 'viandante-style' , get_stylesheet_directory_uri() . '/style.css' ); 

		$googleFontsArgs = array(
			'family' =>	str_replace('|', '%7C','Merriweather:300,300i,400,400i,700,700i,900,900i'),
			'subset' =>	'latin,latin-ext'
		);
		
		wp_deregister_style('google-fonts');
		wp_enqueue_style('google-fonts', add_query_arg ( $googleFontsArgs, "https://fonts.googleapis.com/css" ), array(), '1.0.0' );

	}
	
	add_action( 'wp_enqueue_scripts', 'viandante_enqueue_scripts', 999);

}

/*-----------------------------------------------------------------------------------*/
/* Replace hooks */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('viandante_replace_hooks')) {

	function viandante_replace_hooks() {
		
		remove_action('avventura_lite_top_sidebar', 'avventura_lite_top_sidebar_function');
		remove_action('avventura_lite_thumbnail', 'avventura_lite_thumbnail_function');
		remove_action('post_class', 'avventura_lite_post_class');
		remove_action('avventura_lite_before_content', 'avventura_lite_before_content_function' );
		remove_action('avventura_lite_slick_slider', 'avventura_lite_slick_slider_function');

		
	}
	
	add_action('init','viandante_replace_hooks');

}

/*-----------------------------------------------------------------------------------*/
/* Exclude sticky posts on home */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('viandante_is_featured_posts_on_archive')) {

	function viandante_is_featured_posts_on_archive() {
		
		if (
			is_author() ||
			is_category() ||
			is_tag() ||
			is_tax('post_format')
		) :
		
			return true;
			
		else :

			return false;

		endif;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Exclude sticky posts on home */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('viandante_exclude_featured_posts_on_home')) {

	function viandante_exclude_featured_posts_on_home($query) {
		
		if ( 
			$query->is_archive() &&
			$query->is_main_query() &&
			viandante_is_featured_posts_on_archive() == true &&
			strstr(avventura_lite_setting('viandante_featured_posts','layout-1'), 'layout' ) == true
		){ 
			$query->set( 'offset', 4 );
		}
			
		return $query;

	}
	
	add_action('pre_get_posts', 'viandante_exclude_featured_posts_on_home', 99999);

}

/*-----------------------------------------------------------------------------------*/
/* Exclude sticky posts on home */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('viandante_get_categories')) {

	function viandante_get_categories() {

		$args = array(
			'taxonomy' => 'category',
			'hide_empty' => true,
		);

		foreach ( get_terms($args) as $cat) {
			$return[$cat->term_id] = $cat->name;
		}
		
		return $return;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Customize register */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('viandante_customize_register')) {

	function viandante_customize_register( $wp_customize ) {

		$wp_customize->remove_control( 'avventura_lite_header_layout');
		$wp_customize->remove_control( 'avventura_lite_home');
		$wp_customize->remove_control( 'avventura_lite_category_layout');
		$wp_customize->remove_control( 'avventura_lite_search_layout');
		$wp_customize->remove_control( 'avventura_lite_homepage_slideshow_position');
		$wp_customize->remove_control( 'avventura_lite_slideshow_overlay');

		$wp_customize->add_setting( 'viandante_logo_text_color', array(
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		));

		$wp_customize->add_control( 'viandante_logo_text_color' , array(
			'type' => 'color',
			'section' => 'colors',
			'label' => esc_html__('Logo text color','viandante'),
			'description' => esc_html__('Choose your custom color for the logo.','viandante'),
		));
		
		$wp_customize->add_setting( 'viandante_featured_posts', array(
			'default' => 'layout-1',
			'sanitize_callback' => 'viandante_select_sanitize',
		));

		$wp_customize->add_control( 'viandante_featured_posts' , array(
			'priority' => 9,
			'type' => 'select',
			'section' => 'layouts_section',
			'label' => esc_html__('Feaured post grid','viandante'),
			'description' => esc_html__('To enable the feaured post grid on archive and search pages, please select one of available layouts.','viandante'),
			'choices'  => array (
			   'disable' => esc_html__( 'Disable','viandante'),
			   'layout-1' => esc_html__( 'Layout 1','viandante'),
			   'layout-2' => esc_html__( 'Layout 2','viandante'),
			   'layout-3' => esc_html__( 'Layout 3','viandante'),
			   'layout-4' => esc_html__( 'Layout 4','viandante'),
			),
		));
		
		$wp_customize->add_panel( 'viandante_postblock_panel', array(
			'title' => esc_html__( 'Viandante Post Blocks', 'viandante' ),
			'description' => esc_html__( 'Viandante Post Block', 'viandante' ),
			'priority' => 13,
		));
		
		$wp_customize->add_section('viandante_postblock_1', array(
			'title' => esc_html__( 'Viandante postBlock 1', 'viandante' ),
			'panel' => 'viandante_postblock_panel',
		));
	
		$wp_customize->add_setting( 'viandante_postblock_1_category', array(
			'default' => 1,
			'sanitize_callback' => 'viandante_select_sanitize',

		));

		$wp_customize->add_control( 'viandante_postblock_1_category' , array(
			'type' => 'select',
			'section' => 'viandante_postblock_1',
			'label' => esc_html__('Category','viandante'),
			'description' => esc_html__('Please select the category of this postblock.','viandante'),
			'choices'  => viandante_get_categories(),
		));
		
		$wp_customize->add_setting( 'viandante_postblock_1_layout', array(
			'default' => 'module-1',
			'sanitize_callback' => 'viandante_select_sanitize',

		));

		$wp_customize->add_control( 'viandante_postblock_1_layout' , array(
			'type' => 'select',
			'section' => 'viandante_postblock_1',
			'label' => esc_html__('Layout','viandante'),
			'description' => esc_html__('Please select the layout of this postblock.','viandante'),
			'choices'  => array (
			   'disable' => esc_html__( 'Disable','viandante'),
			   'module-1' => esc_html__( 'Module 1','viandante'),
			   'module-2' => esc_html__( 'Module 2','viandante'),
			   'module-3' => esc_html__( 'Module 3','viandante'),
			   'module-4' => esc_html__( 'Module 4','viandante'),
			),
		));

		$wp_customize->add_section('viandante_postblock_2', array(
			'title' => esc_html__( 'Viandante postBlock 2', 'viandante' ),
			'panel' => 'viandante_postblock_panel',
		));
	
		$wp_customize->add_setting( 'viandante_postblock_2_category', array(
			'default' => 1,
			'sanitize_callback' => 'viandante_select_sanitize',

		));

		$wp_customize->add_control( 'viandante_postblock_2_category' , array(
			'type' => 'select',
			'section' => 'viandante_postblock_2',
			'label' => esc_html__('Category','viandante'),
			'description' => esc_html__('Please select the category of this postblock.','viandante'),
			'choices'  => viandante_get_categories(),
		));
		
		$wp_customize->add_setting( 'viandante_postblock_2_layout', array(
			'default' => 'disable',
			'sanitize_callback' => 'viandante_select_sanitize',

		));

		$wp_customize->add_control( 'viandante_postblock_2_layout' , array(
			'type' => 'select',
			'section' => 'viandante_postblock_2',
			'label' => esc_html__('Layout','viandante'),
			'description' => esc_html__('Please select the layout of this postblock.','viandante'),
			'choices'  => array (
			   'disable' => esc_html__( 'Disable','viandante'),
			   'module-1' => esc_html__( 'Module 1','viandante'),
			   'module-2' => esc_html__( 'Module 2','viandante'),
			   'module-3' => esc_html__( 'Module 3','viandante'),
			   'module-4' => esc_html__( 'Module 4','viandante'),
			),
		));

		$wp_customize->add_section('viandante_postblock_3', array(
			'title' => esc_html__( 'Viandante postBlock 3', 'viandante' ),
			'panel' => 'viandante_postblock_panel',
		));
	
		$wp_customize->add_setting( 'viandante_postblock_3_category', array(
			'default' => 1,
			'sanitize_callback' => 'viandante_select_sanitize',

		));

		$wp_customize->add_control( 'viandante_postblock_3_category' , array(
			'type' => 'select',
			'section' => 'viandante_postblock_3',
			'label' => esc_html__('Category','viandante'),
			'description' => esc_html__('Please select the category of this postblock.','viandante'),
			'choices'  => viandante_get_categories(),
		));
		
		$wp_customize->add_setting( 'viandante_postblock_3_layout', array(
			'default' => 'disable',
			'sanitize_callback' => 'viandante_select_sanitize',

		));

		$wp_customize->add_control( 'viandante_postblock_3_layout' , array(
			'type' => 'select',
			'section' => 'viandante_postblock_3',
			'label' => esc_html__('Layout','viandante'),
			'description' => esc_html__('Please select the layout of this postblock.','viandante'),
			'choices'  => array (
			   'disable' => esc_html__( 'Disable','viandante'),
			   'module-1' => esc_html__( 'Module 1','viandante'),
			   'module-2' => esc_html__( 'Module 2','viandante'),
			   'module-3' => esc_html__( 'Module 3','viandante'),
			   'module-4' => esc_html__( 'Module 4','viandante'),
			),
		));

		$wp_customize->add_section('viandante_postblock_4', array(
			'title' => esc_html__( 'Viandante postBlock 4', 'viandante' ),
			'panel' => 'viandante_postblock_panel',
		));
	
		$wp_customize->add_setting( 'viandante_postblock_4_category', array(
			'default' => 1,
			'sanitize_callback' => 'viandante_select_sanitize',

		));

		$wp_customize->add_control( 'viandante_postblock_4_category' , array(
			'type' => 'select',
			'section' => 'viandante_postblock_4',
			'label' => esc_html__('Category','viandante'),
			'description' => esc_html__('Please select the category of this postblock.','viandante'),
			'choices'  => viandante_get_categories(),
		));
		
		$wp_customize->add_setting( 'viandante_postblock_4_layout', array(
			'default' => 'disable',
			'sanitize_callback' => 'viandante_select_sanitize',

		));

		$wp_customize->add_control( 'viandante_postblock_4_layout' , array(
			'type' => 'select',
			'section' => 'viandante_postblock_4',
			'label' => esc_html__('Layout','viandante'),
			'description' => esc_html__('Please select the layout of this postblock.','viandante'),
			'choices'  => array (
			   'disable' => esc_html__( 'Disable','viandante'),
			   'module-1' => esc_html__( 'Module 1','viandante'),
			   'module-2' => esc_html__( 'Module 2','viandante'),
			   'module-3' => esc_html__( 'Module 3','viandante'),
			   'module-4' => esc_html__( 'Module 4','viandante'),
			),
		));

		$wp_customize->add_setting( 'viandante_enable_related_posts', array(
			'default' => 'on',
			'sanitize_callback' => 'viandante_select_sanitize',

		));

		$wp_customize->add_control( 'viandante_enable_related_posts' , array(
			'type' => 'select',
			'section' => 'settings_section',
			'label' => esc_html__('Related posts','viandante'),
			'description' => esc_html__('Do you want to display the related posts at the end of each article?','viandante'),
			'choices'  => array (
			   'off' => esc_html__( 'No','viandante'),
			   'on' => esc_html__( 'Yes','viandante'),
			),
		));
		
		function viandante_select_sanitize ($value, $setting) {
		
			global $wp_customize;
					
			$control = $wp_customize->get_control( $setting->id );
				 
			if ( array_key_exists( $value, $control->choices ) ) {
					
				return $value;
					
			} else {
					
				return $setting->default;
					
			}
			
		}
		
	}
	
	add_action( 'customize_register', 'viandante_customize_register', 11 );

}

/*-----------------------------------------------------------------------------------*/
/* Theme setup */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('viandante_theme_setup')) {

	function viandante_theme_setup() {

		load_child_theme_textdomain( 'viandante', get_stylesheet_directory() . '/languages' );
		
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/functions/function-style.php' );

		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/post/main-article.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/post/small-article.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/post/hero-article.php' );

		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/modules/module-1.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/modules/module-2.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/modules/module-3.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/modules/module-4.php' );

		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/templates/post-icon.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/templates/before-content.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/templates/slick-slider.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/templates/featured-posts.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/templates/media.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/templates/post-blocks.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/templates/related-posts.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/templates/top-section.php' );

		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/sidebars/top-sidebar.php' );

		remove_theme_support( 'custom-logo');

		$defaults = array( 'header-text' => array( 'site-title', 'site-description' ));
		
		add_theme_support( 'custom-logo', $defaults );
		
		register_default_headers( array(
			'default-image' => array(
				'url'           => get_stylesheet_directory_uri() . '/assets/images/header/header.jpg',
				'thumbnail_url' => get_stylesheet_directory_uri() . '/assets/images/header/resized-header.jpg',
				'description'   => esc_html__( 'Default image', 'viandante' )
			),
		));

		add_theme_support( 'custom-header', array( 
			'width'         => 1170,
			'height'        => 260,
			'default-image' => get_stylesheet_directory_uri() . '/assets/images/header/header.jpg',
			'header-text' 	=> false
		));

		add_image_size( 'viandante_small_image', 120, 100, TRUE ); 
		add_image_size( 'viandante_medium_image', 337, 225, TRUE ); 
		add_image_size( 'viandante_large_image', 423, 370, TRUE ); 

		if ( !get_theme_mod('avventura_lite_logo_font_size') )
			set_theme_mod( 'avventura_lite_logo_font_size', '60px' );

		if ( !get_theme_mod('avventura_lite_logo_description_top_margin') )
			set_theme_mod( 'avventura_lite_logo_description_top_margin', '25px' );

	}

	add_action( 'after_setup_theme', 'viandante_theme_setup', 999);

}

/*-----------------------------------------------------------------------------------*/
/* Post class */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('viandante_post_class')) {

	function viandante_post_class($classes) {

		if ( !avventura_lite_is_single() ) {

			if ( 
				is_home() ||
				is_archive() ||
				is_search() 
			
			) {

				$classes[] = 'post-container masonry-item col-md-6';

			}

		} else if ( avventura_lite_is_single() && avventura_lite_is_woocommerce_active('is_cart') ) {

			$classes[] = 'post-container col-md-12 woocommerce_cart_page';

		} else if ( avventura_lite_is_single() && !avventura_lite_is_woocommerce_active('is_product') ) {

			$classes[] = 'post-container col-md-12';

		} else if ( is_page() ) {

			$classes[] = 'full';

		}

		return $classes;

	}

	add_filter('post_class', 'viandante_post_class');

}

?>