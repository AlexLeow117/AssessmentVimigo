<?php
/**
 * Inner Pages settings
 * 
 * @package Armonia
 * @since 1.0.0
 */
add_action( 'customize_register', 'armonia_customize_innerpages_section_register', 10 );
/**
 * Add settings for innerpages in the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function armonia_customize_innerpages_section_register( $wp_customize ) {
    /**
     * Archive
     * 
     * panel - armonia_innerpages_settings_panel
     */
    $wp_customize->add_section( 'innerpages_archive_page_section', array(
        'title' => esc_html__( 'Archive', 'armonia' ),
        'panel' => 'armonia_innerpages_settings_panel',
        'priority'  => 10
    ));

    /**
     * Archive Posts Layout settings
     * 
     */
    $wp_customize->add_setting( 'archive_posts_layout',
        array(
            'default'           => 'grid-layout',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Add the layout control.
    $wp_customize->add_control( new Armonia_WP_Radio_Image_Control(
        $wp_customize,
        'archive_posts_layout',
        array(
            'label'     => esc_html__( 'Posts Layouts', 'armonia' ),
            'section'   => 'innerpages_archive_page_section',
            'choices'   => array(
                'list-layout' => array(
                    'label'   => esc_html__( 'List Layout', 'armonia' ),
                    'url'     => '%s/assets/images/customizer/list_mode.jpg'
                ),
                'grid-layout' => array(
                    'label'   => esc_html__( 'Grid Layout', 'armonia' ),
                    'url'     => '%s/assets/images/customizer/grid_mode.jpg'
                )
            )
        )
      )
    );

    /**
     * Archive general content settings
     * 
     */
    $wp_customize->add_setting( 'archive_general_content_setting_header', array(
        'sanitize_callback' => 'sanitize_text_field'
      ));

    $wp_customize->add_control( 
        new Armonia_WP_Section_Heading_Control( $wp_customize, 'archive_general_content_setting_header', array(
            'label'       => esc_html__( 'General Content', 'armonia' ),
            'section'     => 'innerpages_archive_page_section',
            'settings'    => 'archive_general_content_setting_header',
            'type'        => 'section-heading',
        ))
    );

    /**
     * Archive post content type
     * 
     */
    $wp_customize->add_setting( 'archive_content_type', array(
        'default' => 'excerpt',
        'sanitize_callback' => 'armonia_sanitize_select'
    ));
      
    $wp_customize->add_control( 'archive_content_type', array(
        'type'      => 'select',
        'section'   => 'innerpages_archive_page_section',
        'label'     => __( 'Post Content to display', 'armonia' ),
        'choices'   => array(
            'excerpt' => esc_html__( 'Excerpt', 'armonia' ),
            'content' => esc_html__( 'Content', 'armonia' )
        ),
    ));
    /*-------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     *  Single Page Section
     * 
     */
    $wp_customize->add_section( 'innerpages_single_page_section', array(
        'title' => esc_html__( 'Single', 'armonia' ),
        'panel' => 'armonia_innerpages_settings_panel',
        'priority'  => 20
    ));

    /**
     * Single Author Box settings
     * 
     */
    $wp_customize->add_setting( 'single_author_box_setting_header', array(
        'sanitize_callback' => 'sanitize_text_field'
      ));

    $wp_customize->add_control( 
        new Armonia_WP_Section_Heading_Control( $wp_customize, 'single_author_box_setting_header', array(
            'label'       => esc_html__( 'Author Box', 'armonia' ),
            'section'     => 'innerpages_single_page_section',
            'settings'    => 'single_author_box_setting_header',
            'type'        => 'section-heading',
        ))
    );

    /**
     * Single Author Box Option
     * 
     */
    $wp_customize->add_setting( 'single_post_author_box_option', array(
        'default'         => true,
        'sanitize_callback' => 'armonia_sanitize_toggle_control',
    ));
  
    $wp_customize->add_control( 
        new Armonia_WP_Toggle_Control( $wp_customize, 'single_post_author_box_option', array(
            'label'	      => esc_html__( 'Show/Hide author box', 'armonia' ),
            'section'     => 'innerpages_single_page_section',
            'settings'    => 'single_post_author_box_option',
            'type'        => 'toggle'
        ))
    );

    /**
     * Single Related Posts settings
     * 
     */
    $wp_customize->add_setting( 'single_related_posts_setting_header', array(
        'sanitize_callback' => 'sanitize_text_field'
      ));

    $wp_customize->add_control( 
        new Armonia_WP_Section_Heading_Control( $wp_customize, 'single_related_posts_setting_header', array(
            'label'       => esc_html__( 'Related Posts', 'armonia' ),
            'section'     => 'innerpages_single_page_section',
            'settings'    => 'single_related_posts_setting_header',
            'type'        => 'section-heading',
        ))
    );

    /**
     * Single Related Posts Section Option
     * 
     */
    $wp_customize->add_setting( 'single_post_related_posts_option', array(
        'default'         => true,
        'sanitize_callback' => 'armonia_sanitize_toggle_control',
    ));
  
    $wp_customize->add_control( 
        new Armonia_WP_Toggle_Control( $wp_customize, 'single_post_related_posts_option', array(
            'label'	      => esc_html__( 'Show/Hide related posts', 'armonia' ),
            'section'     => 'innerpages_single_page_section',
            'settings'    => 'single_post_related_posts_option',
            'type'        => 'toggle'
        ))
    );

    /**
     * Related Posts Section Title
     * 
     */
    $wp_customize->add_setting( 'single_post_related_posts_title', array(
        'default'   => esc_html__( 'Related Posts', 'armonia' ),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control( 'single_post_related_posts_title', array(
        'label'    => esc_html__( 'Related posts title', 'armonia' ),
        'section'  => 'innerpages_single_page_section',		
        'type'     => 'text'
    ));
}