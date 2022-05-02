<?php
/**
 * Footer Options Section
 * 
 */
if( !function_exists( 'armonia_customizer_footer_options_section' ) ) :
    /**
     * Register footer options settings
     * 
     */
    function armonia_customizer_footer_options_section( $wp_customize ) {
        /**
         * Content Section
         * 
         * panel - armonia_footer_options_panel
         */
        $wp_customize->add_section( 'armonia_footer_content_section', array(
            'title' => esc_html__( 'Content', 'armonia' ),
            'panel' => 'armonia_footer_options_panel',
            'priority'  => 10,
        ));
        
        /**
         * General Social Setting Heading
         * 
         */
        $wp_customize->add_setting( 'footer_general_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Armonia_WP_Section_Heading_Control( $wp_customize, 'footer_general_settings_header', array(
                'label'	      => esc_html__( 'General Setting', 'armonia' ),
                'section'     => 'armonia_footer_content_section',
                'settings'    => 'footer_general_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Footer Option
         * 
         */
        $wp_customize->add_setting( 'footer_option', array(
            'default'         => true,
            'sanitize_callback' => 'armonia_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Armonia_WP_Toggle_Control( $wp_customize, 'footer_option', array(
                'label'	      => esc_html__( 'Enable footer section', 'armonia' ),
                'section'     => 'armonia_footer_content_section',
                'settings'    => 'footer_option',
                'type'        => 'toggle',
            ))
        );

        /**
         * Footer Widgets Redirect  Heading
         * 
         */
        $wp_customize->add_setting( 'footer_widgets_redirect_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Armonia_WP_Section_Heading_Control( $wp_customize, 'footer_widgets_redirect_settings_header', array(
                'label'	      => esc_html__( 'Footer Widgets', 'armonia' ),
                'section'     => 'armonia_footer_content_section',
                'settings'    => 'footer_widgets_redirect_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Redirect widgets link
         * 
         */
        $wp_customize->add_setting( 'footer_widgets_redirects', array(
            'sanitize_callback' => 'armonia_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Armonia_WP_Redirect_Control( $wp_customize, 'footer_widgets_redirects', array(
                'label'	      => esc_html__( 'Widgets', 'armonia' ),
                'section'     => 'armonia_footer_content_section',
                'settings'    => 'footer_widgets_redirects',
                'choices'     => array(
                    'footer-column-one' => array(
                        'type'  => 'section',
                        'id'    => 'sidebar-widgets-footer-column',
                        'label' => esc_html__( 'Manage footer widget one', 'armonia' )
                    ),
                    'footer-column-two' => array(
                        'type'  => 'section',
                        'id'    => 'sidebar-widgets-footer-column-2',
                        'label' => esc_html__( 'Manage footer widget two', 'armonia' )
                    ),
                    'footer-column-three' => array(
                        'type'  => 'section',
                        'id'    => 'sidebar-widgets-footer-column-3',
                        'label' => esc_html__( 'Manage footer widget three', 'armonia' )
                    ),
                    'footer-column-four' => array(
                        'type'  => 'section',
                        'id'    => 'sidebar-widgets-footer-column-4',
                        'label' => esc_html__( 'Manage footer widget four', 'armonia' )
                    )
                )
            ))
        );

        /**
         * Style Section
         * 
         * panel - armonia_theme_panel
         */
        $wp_customize->add_section( 'armonia_footer_style_section', array(
            'title' => esc_html__( 'Style', 'armonia' ),
            'panel' => 'armonia_footer_options_panel',
            'priority'  => 20,
        ));

        /**
         * Footer Layouts Heading
         * 
         */
        $wp_customize->add_setting( 'footer_layout_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Armonia_WP_Section_Heading_Control( $wp_customize, 'footer_layout_settings_header', array(
                'label'	      => esc_html__( 'Footer Layouts', 'armonia' ),
                'section'     => 'armonia_footer_style_section',
                'settings'    => 'footer_layout_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Footer Section width
         * 
         */
        $wp_customize->add_setting( 'footer_section_width', array(
            'default' => 'boxed-width',
            'sanitize_callback' => 'armonia_sanitize_select'
        ));
        
        $wp_customize->add_control( 'footer_section_width', array(
            'label' => esc_html__( 'Footer Width', 'armonia' ),
            'type' => 'select',
            'section' => 'armonia_footer_style_section',
            'choices' => array(
                'full-width' => __( 'Full Width', 'armonia' ),
                'boxed-width' => __( 'Boxed Width', 'armonia' )
            ),
        ));
        
        /**
         * Footer Style Heading
         * 
         */
        $wp_customize->add_setting( 'footer_style_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
    

        $wp_customize->add_control( 
            new Armonia_WP_Section_Heading_Control( $wp_customize, 'footer_style_settings_header', array(
                'label'	      => esc_html__( 'Style Setting', 'armonia' ),
                'section'     => 'armonia_footer_style_section',
                'settings'    => 'footer_style_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Footer Color Settings
         * 
         */
        $wp_customize->add_setting( 'footer_color', array( 'default' => '#ffffff',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_setting( 'footer_hover_color', array( 'default' => '#ffffff',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_control( 
            new Armonia_WP_Control_Group_Control( $wp_customize, 'footer_color_group', array(
                'label'       => esc_html__( 'Color', 'armonia' ),
                'section'     => 'armonia_footer_style_section',
                'settings'    => array(
                    'color' => 'footer_color',
                    'hover_color' => 'footer_hover_color'
                )
            ))
        );

        /**
         * Footer Background Settings
         * 
         */
        $wp_customize->add_setting( 'footer_bg_color', array( 'default' => '#000000',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_control( 
            new Armonia_WP_Control_Group_Control( $wp_customize, 'footer_bg_group', array(
                'label'       => esc_html__( 'Background', 'armonia' ),
                'descrition'  => esc_html__( 'Manage background', 'armonia' ),
                'section'     => 'armonia_footer_style_section',
                'settings'    => array(
                    'color' => 'footer_bg_color'
                )
            ))
        );

        /**
         * Bottom Footer Section
         * 
         * panel - armonia_footer_options_panel
         */
        $wp_customize->add_section( 'armonia_bottom_footer_content_section', array(
            'title' => esc_html__( 'Bottom Footer', 'armonia' ),
            'panel' => 'armonia_footer_options_panel',
            'priority'  => 50,
        ));

        /**
         * General Bottom Footer Setting Heading
         * 
         */
        $wp_customize->add_setting( 'bottom_footer_general_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Armonia_WP_Section_Heading_Control( $wp_customize, 'bottom_footer_general_settings_header', array(
                'label'	      => esc_html__( 'Content Setting', 'armonia' ),
                'section'     => 'armonia_bottom_footer_content_section',
                'settings'    => 'bottom_footer_general_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Bottom Footer Option
         * 
         */
        $wp_customize->add_setting( 'bottom_footer_option', array(
            'default'         => true,
            'sanitize_callback' => 'armonia_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Armonia_WP_Toggle_Control( $wp_customize, 'bottom_footer_option', array(
                'label'	      => esc_html__( 'Enable bottom footer', 'armonia' ),
                'section'     => 'armonia_bottom_footer_content_section',
                'settings'    => 'bottom_footer_option',
                'type'        => 'toggle',
            ))
        );

        /**
         * Style Bottom Footer Setting Heading
         * 
         */
        $wp_customize->add_setting( 'bottom_footer_style_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Armonia_WP_Section_Heading_Control( $wp_customize, 'bottom_footer_style_settings_header', array(
                'label'	      => esc_html__( 'Style Setting', 'armonia' ),
                'section'     => 'armonia_bottom_footer_content_section',
                'settings'    => 'bottom_footer_style_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Footer Color Settings
         * 
         */
        $wp_customize->add_setting( 'bottom_footer_color', array( 'default' => '#ffffff',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_setting( 'bottom_footer_hover_color', array( 'default' => '#111111',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_control( 
            new Armonia_WP_Control_Group_Control( $wp_customize, 'bottom_footer_color_group', array(
                'label'       => esc_html__( 'Color', 'armonia' ),
                'section'     => 'armonia_bottom_footer_content_section',
                'settings'    => array(
                    'color' => 'bottom_footer_color',
                    'hover_color' => 'bottom_footer_hover_color'
                )
            ))
        );

        /**
         * Footer Background Settings
         * 
         */
        $wp_customize->add_setting( 'bottom_footer_bg_color', array( 'default' => '#f0f0f0',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_control( 
            new Armonia_WP_Control_Group_Control( $wp_customize, 'bottom_footer_bg_group', array(
                'label'       => esc_html__( 'Background', 'armonia' ),
                'section'     => 'armonia_bottom_footer_content_section',
                'settings'    => array(
                    'color' => 'bottom_footer_bg_color'
                )
            ))
        );
    }
    add_action( 'customize_register', 'armonia_customizer_footer_options_section', 10 );
endif;