<?php
/**
 * Armonia Button Navigation settings
 * 
 * @since 1.2.0
 */

add_action( 'customize_register', 'armonia_upsell_section_register', 10 );
/**
 * Add settings for upsell links
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function armonia_upsell_section_register( $wp_customize ) {
	require get_template_directory() . '/inc/admin/customizer-upsell/upsell-section/upsell-button.php';
    require get_template_directory() . '/inc/admin/customizer-upsell/upsell-section/upsell-info.php';
    $wp_customize->register_section_type( 'Armonia_Upsell_Button' );
    /**
     * Add Upsell Button
     * 
     */
    $wp_customize->add_section(
		new Armonia_Upsell_Button( $wp_customize, 
            'upsell_button', [
                'button_text'   => esc_html__( 'View Premium', 'armonia' ),
                'button_url'    => esc_url( '//blazethemes.com/theme/armonia-pro/' ),
                'priority'      => 1
            ]
        )
	);
    
    /**
     * Add import redirect Button
     * 
     */
    $wp_customize->add_section(
        new Armonia_Upsell_Button( $wp_customize, 
            'demo_import_button', [
                'button_text'   => esc_html__( 'Go to Import', 'armonia' ),
                'button_url'    => esc_url( admin_url('themes.php?page=armonia-info.php') ),
                'title'         => esc_html__('Import Demo Data', 'armonia'),
                'priority'  => 1000,
            ]
        )
    );

    /**
     * Add documentation Button
     * 
     */
    $wp_customize->add_section(
        new Armonia_Upsell_Button( $wp_customize, 
            'documentation_button', [
                'button_text'   => esc_html__( 'Documentation', 'armonia' ),
                'button_url'    => esc_url( '//doc.blazethemes.com/armonia/' ),
                'priority'  => 1000,
            ]
        )
    );

    // Upgrade infos
    $wp_customize->add_setting( 'social_icons_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Armonia_Upsell_Info_Control($wp_customize, 'social_icons_upgrade_text', array(
        'section' => 'armonia_social_section',
        'label' => esc_html__('For more social icons settings,', 'armonia'),
        'choices' => array(
            esc_html__( 'Unlimited social icons options', 'armonia' ),
            esc_html__( 'Icons spacing options', 'armonia' ),
            esc_html__( 'Icon color and hover color', 'armonia' ),
            esc_html__( 'Icon background type and hover color', 'armonia' ),
            esc_html__( 'Icon border width, radius and color', 'armonia' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'breadcrumbs_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Armonia_Upsell_Info_Control($wp_customize, 'breadcrumbs_upgrade_text', array(
        'section' => 'armonia_global_breadcrumb_section',
        'label' => esc_html__('For more breadcrumbs settings,', 'armonia'),
        'choices' => array(
            esc_html__( 'Prefix title label field', 'armonia' ),
            esc_html__( 'Home title label field', 'armonia' ),
            esc_html__( 'Search page title label field', 'armonia' ),
            esc_html__( 'Error page title field', 'armonia' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'sidebar_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Armonia_Upsell_Info_Control($wp_customize, 'sidebar_upgrade_text', array(
        'section' => 'sidebars_section',
        'label' => esc_html__('For more sidebar options,', 'armonia'),
        'choices' => array(
            esc_html__( 'Sidebar options for search page', 'armonia' ),
            esc_html__( 'Sidebar options for error page', 'armonia' ),
            esc_html__( 'Sidebar options in post meta', 'armonia' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'header_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Armonia_Upsell_Info_Control($wp_customize, 'header_upgrade_text', array(
        'section' => 'armonia_header_style_section',
        'label' => esc_html__('For more header layouts,', 'armonia'),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'header_menu_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Armonia_Upsell_Info_Control($wp_customize, 'header_menu_upgrade_text', array(
        'section' => 'armonia_header_menu_option_section',
        'label' => esc_html__('For more menu settings,', 'armonia'),
        'choices' => array(
            esc_html__( 'Active menu color and background color', 'armonia' ),
            esc_html__( 'Sub menu color and background color', 'armonia' ),
            esc_html__( 'Menu border color and width', 'armonia' )
        ),
        'priority' => 150
    )));

    // Upgrade infos
    $wp_customize->add_setting( 'full_width_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Armonia_Upsell_Info_Control($wp_customize, 'full_width_upgrade_text', array(
        'section' => 'frontpage_top_full_width_section',
        'label' => esc_html__('For more advanced options,', 'armonia'),
        'choices' => array(
            esc_html__( 'Unlimited blocks - clone and add blocks', 'armonia' ),
            esc_html__( '3 or more layouts in each block', 'armonia' ),
            esc_html__( '25+ total layouts', 'armonia' ),
            esc_html__( 'Carousel/Slider options', 'armonia' ),
            esc_html__( 'Newsletter section', 'armonia' ),
            esc_html__( 'Show/hide options for post meta date, comments, author, tags, categories', 'armonia' ),
            esc_html__( 'Read more button show/hide option with text field', 'armonia' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'author_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Armonia_Upsell_Info_Control($wp_customize, 'author_upgrade_text', array(
        'section' => 'frontpage_about_author_section',
        'label' => esc_html__('For more advanced options,', 'armonia'),
        'choices' => array(
            esc_html__( 'Custom image fields for author', 'armonia' ),
            esc_html__( 'Background color field', 'armonia' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'posts_column_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Armonia_Upsell_Info_Control($wp_customize, 'posts_column_upgrade_text', array(
        'section' => 'footer_three_column_section',
        'label' => esc_html__('For more advanced options,', 'armonia'),
        'choices' => array(
            esc_html__( 'Column title text field', 'armonia' ),
            esc_html__( 'Background color and text color field', 'armonia' ),
            esc_html__( 'Width column options', 'armonia' ),
            esc_html__( 'Show on frontpage, innerpages or both select field', 'armonia' ),
            esc_html__( 'Padding top, right, bottom and left field for desktop and mobile', 'armonia' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'frontpage_middle_left_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new Armonia_Upsell_Info_Control($wp_customize, 'frontpage_middle_left_upgrade_text', array(
        'section' => 'frontpage_middle_left_content_section',
        'label' => esc_html__('For more advanced options,', 'armonia'),
        'choices' => array(
            esc_html__( 'Unlimited blocks - clone and add blocks', 'armonia' ),
            esc_html__( '3 or more layouts in each block', 'armonia' ),
            esc_html__( '25+ total layouts', 'armonia' ),
            esc_html__( 'Carousel/Slider options', 'armonia' ),
            esc_html__( 'Newsletter section', 'armonia' ),
            esc_html__( 'Show/hide options for post meta date, comments, author, tags, categories', 'armonia' ),
            esc_html__( 'Read more button show/hide option with text field', 'armonia' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'frontpage_middle_right_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new Armonia_Upsell_Info_Control($wp_customize, 'frontpage_middle_right_upgrade_text', array(
        'section' => 'frontpage_middle_right_content_section',
        'label' => esc_html__('For more advanced options,', 'armonia'),
        'choices' => array(
            esc_html__( 'Unlimited blocks - clone and add blocks', 'armonia' ),
            esc_html__( '3 or more layouts in each block', 'armonia' ),
            esc_html__( '25+ total layouts', 'armonia' ),
            esc_html__( 'Carousel/Slider options', 'armonia' ),
            esc_html__( 'Newsletter section', 'armonia' ),
            esc_html__( 'Show/hide options for post meta date, comments, author, tags, categories', 'armonia' ),
            esc_html__( 'Read more button show/hide option with text field', 'armonia' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'frontpage_bottom_full_width_woo_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new Armonia_Upsell_Info_Control($wp_customize, 'frontpage_bottom_full_width_woo_upgrade_text', array(
        'section' => 'frontpage_bottom_full_width_woocommerce_section',
        'label' => esc_html__('For more advanced options,', 'armonia'),
        'choices' => array(
            esc_html__( 'Unlimited blocks - clone and add blocks', 'armonia' ),
            esc_html__( '3 or more layouts in each block', 'armonia' ),
            esc_html__( '25+ total layouts', 'armonia' ),
            esc_html__( 'Carousel/Slider options', 'armonia' ),
            esc_html__( 'Newsletter section', 'armonia' ),
            esc_html__( 'Show/hide options for post meta date, comments, author, tags, categories', 'armonia' ),
            esc_html__( 'Read more button show/hide option with text field', 'armonia' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'frontpage_bottom_full_width_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new Armonia_Upsell_Info_Control($wp_customize, 'frontpage_bottom_full_width_upgrade_text', array(
        'section' => 'frontpage_bottom_full_width_section',
        'label' => esc_html__('For more advanced options,', 'armonia'),
        'choices' => array(
            esc_html__( 'Unlimited blocks - clone and add blocks', 'armonia' ),
            esc_html__( '3 or more layouts in each block', 'armonia' ),
            esc_html__( '25+ total layouts', 'armonia' ),
            esc_html__( 'Carousel/Slider options', 'armonia' ),
            esc_html__( 'Newsletter section', 'armonia' ),
            esc_html__( 'Show/hide options for post meta date, comments, author, tags, categories', 'armonia' ),
            esc_html__( 'Read more button show/hide option with text field', 'armonia' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'archive_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Armonia_Upsell_Info_Control($wp_customize, 'archive_upgrade_text', array(
        'section' => 'innerpages_archive_page_section',
        'label' => esc_html__('For more options,', 'armonia'),
        'choices' => array(
            esc_html__( 'Masonry post layout', 'armonia' ),
            esc_html__( 'Ajax pagination type', 'armonia' ),
            esc_html__( 'Content Length field', 'armonia' ),
            esc_html__( 'Show/hide options for post meta date, comments, author, tags, categories', 'armonia' ),
            esc_html__( 'Prefix for post meta date, comments, author', 'armonia' ),
            esc_html__( 'Read more button show/hide option with text field', 'armonia' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'single_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Armonia_Upsell_Info_Control($wp_customize, 'single_upgrade_text', array(
        'section' => 'innerpages_single_page_section',
        'label' => esc_html__('For more options,', 'armonia'),
        'choices' => array(
            esc_html__( 'Show/hide options for post meta date, comments, author, tags, categories', 'armonia' ),
            esc_html__( 'Prefix for post meta date, comments, author', 'armonia' ),
            esc_html__( 'Show/hide author box ', 'armonia' ),
            esc_html__( 'Related posts title and post count options', 'armonia' ),
            esc_html__( 'Related sort by tags or categories', 'armonia' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'footer_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Armonia_Upsell_Info_Control($wp_customize, 'footer_upgrade_text', array(
        'section' => 'armonia_footer_style_section',
        'label' => esc_html__('For more options,', 'armonia'),
        'choices' => array(
            esc_html__( 'Footer column layouts', 'armonia' ),
            esc_html__( 'Background Image field', 'armonia' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'bottom_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Armonia_Upsell_Info_Control($wp_customize, 'bottom_upgrade_text', array(
        'section' => 'armonia_bottom_footer_content_section',
        'label' => esc_html__('For more options,', 'armonia'),
        'choices' => array(
            esc_html__( 'Custom copyright WYSIWYG field', 'armonia' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'category_colors_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Armonia_Upsell_Info_Control($wp_customize, 'category_colors_upgrade_text', array(
        'section' => 'colors',
        'label' => esc_html__('For more options,', 'armonia'),
        'choices' => array(
            esc_html__( 'Category colors field', 'armonia' )
        ),
        'priority' => 150
    )));
}

/**
 * Enqueue theme upsell controls scripts
 * 
 */
function armonia_upsell_scripts() {
    wp_enqueue_style( 'armonia-upsell', get_template_directory_uri() . '/inc/admin/customizer-upsell/upsell-section/upsell.css', array(), '1.0.0', 'all' );
    wp_enqueue_script( 'armonia-upsell', get_template_directory_uri() . '/inc/admin/customizer-upsell/upsell-section/upsell.js', array(), '1.0.0', 'all' );
}
add_action( 'customize_controls_enqueue_scripts', 'armonia_upsell_scripts' );