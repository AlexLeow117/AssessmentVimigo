<?php
/**
 * Armonia Theme Customizer
 *
 * @package Armonia
 */
function armonia_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_control( 'header_image' )->section = 'armonia_header_style_section';
	$wp_customize->get_control( 'header_image' )->priority = 20;
	$wp_customize->get_section( 'title_tagline' )->panel = 'armonia_site_identity_panel';
	$wp_customize->get_section( 'title_tagline' )->title = esc_html__( 'Logo & Site Icon', 'armonia' );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'armonia_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'armonia_customize_partial_blogdescription',
			)
		);
	}
	require get_template_directory() . '/inc/customizer/custom-controls/repeater/repeater.php';
	require get_template_directory() . '/inc/customizer/custom-controls/toggle-control/toggle-control.php';
	require get_template_directory() . '/inc/customizer/custom-controls/range-slider/range-slider.php';
	require get_template_directory() . '/inc/customizer/custom-controls/radio-image/radio-image.php';
	require get_template_directory() . '/inc/customizer/custom-controls/section-heading/section-heading.php';
	require get_template_directory() . '/inc/customizer/custom-controls/blocks-repeater/blocks-repeater.php';
	require get_template_directory() . '/inc/customizer/custom-controls/control-group-control/control-group-control.php';
	require get_template_directory() . '/inc/customizer/custom-controls/typography/typography.php';
	require get_template_directory() . '/inc/customizer/custom-controls/redirect-control/redirect-control.php';
	require get_template_directory() . '/inc/customizer/custom-controls/tab-control/tab-control.php';
	require get_template_directory() . '/inc/customizer/custom-controls/spacing-control/spacing-control.php';
	require get_template_directory() . '/inc/customizer/custom-controls/radio-tab/radio-tab.php';

	// register control type
	$wp_customize->register_control_type( 'Armonia_WP_Radio_Image_Control' );
	$wp_customize->register_control_type( 'Armonia_WP_Control_Group_Control' );
	$wp_customize->register_control_type( 'Armonia_WP_Typography_Control' );
	$wp_customize->register_control_type( 'Armonia_WP_Spacing_Control' );
	$wp_customize->register_control_type( 'Armonia_WP_Radio_Tab_Control' );

	/**
	 * Register "Site Identity Options" panel
	 * 
	 */
	$wp_customize->add_panel( 'armonia_site_identity_panel', array(
		'title' => esc_html__( 'Site Identity', 'armonia' ),
		'priority' => 5
	));

	/**
	 * Register "Gloabl Options" panel
	 * 
	 */
	$wp_customize->add_panel( 'armonia_global_options_panel', array(
		'title' => esc_html__( 'Global Options', 'armonia' ),
		'priority' => 10
	));

	/**
	 * Register "Footer Options" panel
	 * 
	 */
	$wp_customize->add_panel( 'armonia_header_options_panel', array(
		'title' => esc_html__( 'Header Options', 'armonia' ),
		'priority' => 20
	));

	/**
	 * Register "Frontpage Sections" panel
	 * 
	 */
	$wp_customize->add_panel( 'armonia_frontpage_sections_panel', array(
		'title' => esc_html__( 'Frontpage Sections', 'armonia' ),
		'priority' => 30
	));

	/**
     * Frontpage Section Option
     * 
     */
    $wp_customize->add_setting( 'frontpage_sections_option', array(
		'default'           => true,
		'sanitize_callback' => 'armonia_sanitize_toggle_control',
	));

	$wp_customize->add_control( 
		new Armonia_WP_Toggle_Control( $wp_customize, 'frontpage_sections_option', array(
			'label'	      => esc_html__( 'Show frontpage sections', 'armonia' ),
			'description' => sprintf( esc_html__( 'Enabling this control will display all the frontpage sections theme provides hiding other home content. Disable this if you want default home template or if you are editing frontpage with Elementor. %1$1s Manage frontpage sections %2$2s click here %3$3s', 'armonia' ), '<br/><br/>', '<a href="' .esc_url( admin_url( 'customize.php?autofocus[panel]=armonia_frontpage_sections_panel' ) ). '">', '</a>' ),
			'section'     => 'static_front_page',
			'settings'    => 'frontpage_sections_option',
			'type'        => 'toggle',
			'priority'	  => 100
		))
	);

	/**
	 * Register "Innerpages Section" panel
	 * 
	 */
	$wp_customize->add_panel( 'armonia_innerpages_settings_panel', array(
		'title' => esc_html__( 'Innerpages', 'armonia' ),
		'priority' => 40
	));

	/**
	 * Register "Footer Options" panel
	 * 
	 */
	$wp_customize->add_panel( 'armonia_footer_options_panel', array(
		'title' => esc_html__( 'Footer Options', 'armonia' ),
		'priority' => 50
	));

	/**
	 * Theme Color
	 * 
	 */
	$wp_customize->add_setting( 'armonia_theme_color', array(
		'default' => '#f1cdc2',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( $wp_customize, 'armonia_theme_color', array(
			'label'      => esc_html__( 'Theme Color', 'armonia' ),
			'section'    => 'colors',
			'settings'   => 'armonia_theme_color'
		))
	);

	/**
	 * Theme Hover Color
	 * 
	 */
	$wp_customize->add_setting( 'armonia_theme_hover_color', array(
		'default' => '#d6876f',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( $wp_customize, 'armonia_theme_hover_color', array(
			'label'      => esc_html__( 'Theme Hover Color', 'armonia' ),
			'section'    => 'colors',
			'settings'   => 'armonia_theme_hover_color'
		))
	);
}
add_action( 'customize_register', 'armonia_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function armonia_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function armonia_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function armonia_customize_preview_js() {
	wp_enqueue_script( 'armonia-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), ARMONIA_VERSION, true );
}
add_action( 'customize_preview_init', 'armonia_customize_preview_js' );

// include files
require get_template_directory() . '/inc/customizer/sanitize.php';
require get_template_directory() . '/inc/customizer/sections/site-identity.php';
require get_template_directory() . '/inc/customizer/sections/global-options.php';
require get_template_directory() . '/inc/customizer/sections/header-options.php';
require get_template_directory() . '/inc/customizer/sections/frontpage-sections.php';
require get_template_directory() . '/inc/customizer/sections/footer-options.php';
require get_template_directory() . '/inc/customizer/sections/sidebar-layouts.php';
require get_template_directory() . '/inc/customizer/sections/innerpages.php';
require get_template_directory() . '/inc/admin/customizer-upsell/theme-upsell.php';

if ( ! function_exists( 'armonia_get_google_font_weight_html' ) ) :
    /**
     * get Google font weights html
     *
     * @since 1.0.0
     */
    function armonia_get_google_font_weight_html() {
		$google_fonts_file = get_template_directory() . '/assets/lib/googleFonts.json';
		$google_fonts = array();
		if ( file_exists( $google_fonts_file ) ) {
            $google_fonts   = json_decode( file_get_contents( $google_fonts_file ), true );
		}
		$font_family = isset( $_REQUEST['font_family'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['font_family'] ) ) : esc_html( 'DM Sans' );
		$font_weights = $google_fonts[$font_family]['variants']['normal'];

        $options_array = '';
        foreach ( $font_weights as $weight_key => $weight ) {
            $options_array .= '<option value="'.esc_attr( $weight_key ).'">'. esc_html( $weight_key ).'</option>';
        }
        echo wp_kses_post( $options_array );
        wp_die();
    }
endif;
add_action( "wp_ajax_armonia_get_google_font_weight_html", "armonia_get_google_font_weight_html" );