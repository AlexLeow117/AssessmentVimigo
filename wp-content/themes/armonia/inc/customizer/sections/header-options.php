<?php
/**
 * Header Options Section
 * 
 */
if( !function_exists( 'armonia_customizer_header_options_section' ) ) :
    /**
     * Register header options settings
     * 
     */
    function armonia_customizer_header_options_section( $wp_customize ) {
        /**
         * Content Section
         * 
         * panel - armonia_header_options_panel
         */
        $wp_customize->add_section( 'armonia_header_content_section', array(
            'title' => esc_html__( 'Content', 'armonia' ),
            'panel' => 'armonia_header_options_panel',
            'priority'  => 10,
        ));

        /**
         * Header Search Setting Heading
         * 
         */
        $wp_customize->add_setting( 'header_search_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Armonia_WP_Section_Heading_Control( $wp_customize, 'header_search_settings_header', array(
                'label'	      => esc_html__( 'Search Bar', 'armonia' ),
                'section'     => 'armonia_header_content_section',
                'settings'    => 'header_search_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Search Option
         * 
         */
        $wp_customize->add_setting( 'header_search_option', array(
            'default'         => true,
            'sanitize_callback' => 'armonia_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Armonia_WP_Toggle_Control( $wp_customize, 'header_search_option', array(
                'label'	      => esc_html__( 'Show search bar', 'armonia' ),
                'section'     => 'armonia_header_content_section',
                'settings'    => 'header_search_option',
                'type'        => 'toggle',
            ))
        );

        /**
         * Header Search Toggle Font Settings
         * 
         */
        $wp_customize->add_setting( 'header_search_toggle_color', array( 'default' => '#000000',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_setting( 'header_search_toggle_hover_color', array( 'default' => '#000000',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_control( 
            new Armonia_WP_Control_Group_Control( $wp_customize, 'header_search_toggle_color_group', array(
            'label'       => esc_html__( 'Search Icon Color', 'armonia' ),
            'section'     => 'armonia_header_content_section',
            'settings'    => array(
                'color'         => 'header_search_toggle_color',
                'hover_color'   => 'header_search_toggle_hover_color'
            )
            ))
        );

        /**
         * Header sidebar toggle bar setting heading
         * 
         */
        $wp_customize->add_setting( 'header_sidebar_toggle_bar_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Armonia_WP_Section_Heading_Control( $wp_customize, 'header_sidebar_toggle_bar_settings_header', array(
                'label'	      => esc_html__( 'Sidebar toggle', 'armonia' ),
                'section'     => 'armonia_header_content_section',
                'settings'    => 'header_sidebar_toggle_bar_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Header Sidebar Toggle Bar Option
         * 
         */
        $wp_customize->add_setting( 'header_sidebar_toggle_bar_option', array(
            'default'         => true,
            'sanitize_callback' => 'armonia_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Armonia_WP_Toggle_Control( $wp_customize, 'header_sidebar_toggle_bar_option', array(
                'label'	      => esc_html__( 'Show sidebar toggle bar', 'armonia' ),
                'section'     => 'armonia_header_content_section',
                'settings'    => 'header_sidebar_toggle_bar_option',
                'type'        => 'toggle',
            ))
        );

        /**
         * Header Sidebar Toggle Font Settings
         * 
         */
        $wp_customize->add_setting( 'header_sidebar_toggle_color', array( 'default' => '#e49c86',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_setting( 'header_sidebar_toggle_hover_color', array( 'default' => '#e49c86',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_control( 
            new Armonia_WP_Control_Group_Control( $wp_customize, 'header_sidebar_toggle_color_group', array(
            'label'       => esc_html__( 'Sidebar Toggle Color', 'armonia' ),
            'section'     => 'armonia_header_content_section',
            'settings'    => array(
                'color'         => 'header_sidebar_toggle_color',
                'hover_color'   => 'header_sidebar_toggle_hover_color'
            )
            ))
        );

        /**
         * Header social setting heading
         * 
         */
        $wp_customize->add_setting( 'header_social_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Armonia_WP_Section_Heading_Control( $wp_customize, 'header_social_settings_header', array(
                'label'	      => esc_html__( 'Social icons', 'armonia' ),
                'section'     => 'armonia_header_content_section',
                'settings'    => 'header_social_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Header Social Icons Option
         * 
         */
        $wp_customize->add_setting( 'header_social_option', array(
            'default'         => true,
            'sanitize_callback' => 'armonia_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Armonia_WP_Toggle_Control( $wp_customize, 'header_social_option', array(
                'label'	      => esc_html__( 'Show social icons', 'armonia' ),
                'section'     => 'armonia_header_content_section',
                'settings'    => 'header_social_option',
                'type'        => 'toggle',
            ))
        );

        /**
         * Redirect widgets link
         * 
         */
        $wp_customize->add_setting( 'header_social_icons_redirects', array(
            'sanitize_callback' => 'armonia_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Armonia_WP_Redirect_Control( $wp_customize, 'header_social_icons_redirects', array(
                'section'     => 'armonia_header_content_section',
                'settings'    => 'header_social_icons_redirects',
                'choices'     => array(
                    'footer-column-one' => array(
                        'type'  => 'section',
                        'id'    => 'armonia_social_section',
                        'label' => esc_html__( 'Manage social icons', 'armonia' )
                    )
                )
            ))
        );

        /**
         * Style Section
         * 
         * panel - armonia_theme_panel
         */
        $wp_customize->add_section( 'armonia_header_style_section', array(
            'title' => esc_html__( 'Style', 'armonia' ),
            'panel' => 'armonia_header_options_panel',
            'priority'  => 20,
        ));

        /**
         * Header Style Heading
         * 
         */
        $wp_customize->add_setting( 'header_style_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
    

        $wp_customize->add_control( 
            new Armonia_WP_Section_Heading_Control( $wp_customize, 'header_style_settings_header', array(
                'label'	      => esc_html__( 'Style Setting', 'armonia' ),
                'priority' => 10,
                'section'     => 'armonia_header_style_section',
                'settings'    => 'header_style_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Header bottom box shadow
         * 
         */
        $wp_customize->add_setting( 'header_bottom_box_shadow', array(
            'default' => 'show',
            'sanitize_callback' => 'armonia_sanitize_select'
        ));
        
        $wp_customize->add_control( 'header_bottom_box_shadow', array(
            'type'      => 'select',
            'section'   => 'armonia_header_style_section',
            'label'     => __( 'Bottom box shadow', 'armonia' ),
            'choices'   => array(
                'show' => esc_html__( 'Show', 'armonia' ),
                'hide' => esc_html__( 'Hide', 'armonia' )
            ),
        ));

        /**
         * Header Background Settings
         * 
         */
        $wp_customize->add_setting( 'header_bg_color', array( 'default' => '#ffffff',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_control( 
            new Armonia_WP_Control_Group_Control( $wp_customize, 'header_bg_group', array(
            'label'       => esc_html__( 'Background', 'armonia' ),
            'descrition'  => esc_html__( 'Manage background', 'armonia' ),
            'section'     => 'armonia_header_style_section',
            'settings'    => array(
                'color' => 'header_bg_color'
            )
            ))
        );

        /**
         * Menu Options Section
         * 
         * panel - armonia_header_options_panel
         */
        $wp_customize->add_section( 'armonia_header_menu_option_section', array(
            'title' => esc_html__( 'Menu Options', 'armonia' ),
            'panel' => 'armonia_header_options_panel',
            'priority'  => 30,
        ));

        /**
         * Header menu hover effect
         * 
         */
        $wp_customize->add_setting( 'header_menu_hover_effect', array(
            'default' => 'none',
            'sanitize_callback' => 'armonia_sanitize_select'
        ));
        
        $wp_customize->add_control( 'header_menu_hover_effect', array(
            'type'      => 'select',
            'section'   => 'armonia_header_menu_option_section',
            'label'     => __( 'Menu hover effect', 'armonia' ),
            'choices'   => array(
                'default' => esc_html__( 'Default', 'armonia' ),
                'none' => esc_html__( 'None', 'armonia' )
            ),
        ));

        /**
         * Header Menu Responsive Tab
         * 
         */
        $wp_customize->add_setting( 'header_menu_responsive_tabs_settings_header', array(
            'default'           => 'desktop',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Armonia_WP_Tab_Control( $wp_customize, 'header_menu_responsive_tabs_settings_header', array(
                'section'     => 'armonia_header_menu_option_section',
                'settings'    => 'header_menu_responsive_tabs_settings_header',
                'choices'   => array(
                    array(
                        'label' => esc_html__( 'Desktop', 'armonia' ),
                        'controls_hide' => array(
                            'responsive_header_menu_toggle_button_colors_settings_header',
                            'header_menu_mobile_toggle_button_color',
                            'header_menu_mobile_toggle_button_background_color'
                        ),
                        'controls' => array(
                            'header_menu_colors_settings_header',
                            'header_menu_background_color_group',
                            'header_menu_font_color_group',
                            'header_sub_menu_colors_settings_header',
                            'header_active_menu_colors_settings_header',
                            'header_menu_border_settings_header',
                            'header_menu_border_top_group',
                            'header_menu_border_bottom_group',
                            'header_menu_typo_settings_header',
                            'header_menu_typography'
                        )
                    ),
                    array(
                        'label' => esc_html__( 'Mobile', 'armonia' ),
                        'controls' => array(
                            'responsive_header_menu_toggle_button_colors_settings_header',
                            'header_menu_mobile_toggle_button_color',
                            'header_menu_mobile_toggle_button_background_color'
                        ),
                        'controls_hide' => array(
                            'header_menu_colors_settings_header',
                            'header_menu_background_color_group',
                            'header_menu_font_color_group',
                            'header_sub_menu_colors_settings_header',
                            'header_active_menu_colors_settings_header',
                            'header_menu_border_settings_header',
                            'header_menu_border_top_group',
                            'header_menu_border_bottom_group',
                            'header_menu_typo_settings_header',
                            'header_menu_typography'
                        )
                    )
                ),
                'priority'    => 30
            ))
        );

        /**
         * Responsive Header Menu Toggle Button Colors Heading
         * 
         */
        $wp_customize->add_setting( 'responsive_header_menu_toggle_button_colors_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Armonia_WP_Section_Heading_Control( $wp_customize, 'responsive_header_menu_toggle_button_colors_settings_header', array(
                'label'	      => esc_html__( 'Toggle Button Colors', 'armonia' ),
                'section'     => 'armonia_header_menu_option_section',
                'settings'    => 'responsive_header_menu_toggle_button_colors_settings_header',
                'type'        => 'section-heading',
                'active_callback'   => function() { return false; },
                'priority'    => 35
            ))
        );

        /**
         * Toggle Button Color
         * 
         */
        $wp_customize->add_setting( 'header_menu_mobile_toggle_button_color', array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
    
        $wp_customize->add_control( 
            new WP_Customize_Color_Control( $wp_customize, 'header_menu_mobile_toggle_button_color', array(
                'label'      => esc_html__( 'Color', 'armonia' ),
                'section'    => 'armonia_header_menu_option_section',
                'settings'   => 'header_menu_mobile_toggle_button_color',
                'active_callback'   => function() { return false; },
                'priority'    => 35
            ))
        );

        /**
         * Button Background color
         * 
         */
        $wp_customize->add_setting( 'header_menu_mobile_toggle_button_background_color', array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
    
        $wp_customize->add_control( 
            new WP_Customize_Color_Control( $wp_customize, 'header_menu_mobile_toggle_button_background_color', array(
                'label'      => esc_html__( 'Background Color', 'armonia' ),
                'section'    => 'armonia_header_menu_option_section',
                'settings'   => 'header_menu_mobile_toggle_button_background_color',
                'active_callback'   => function() { return false; },
                'priority'    => 35
            ))
        );

        /**
         * Header Menu Colors Heading
         * 
         */
        $wp_customize->add_setting( 'header_menu_colors_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Armonia_WP_Section_Heading_Control( $wp_customize, 'header_menu_colors_settings_header', array(
                'label'	      => esc_html__( 'Colors', 'armonia' ),
                'section'     => 'armonia_header_menu_option_section',
                'settings'    => 'header_menu_colors_settings_header',
                'type'        => 'section-heading',
                'priority'    => 35
            ))
        );

        /**
         * Header Menu Background Settings
         * 
         */
        $wp_customize->add_setting( 'header_menu_background_type', array( 'default' => 'transparent',  'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_setting( 'header_menu_background_color', array( 'default' => '#ffffff',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_setting( 'header_menu_background_hover_color', array( 'default' => '#e49c86',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_control( 
            new Armonia_WP_Control_Group_Control( $wp_customize, 'header_menu_background_color_group', array(
            'label'       => esc_html__( 'Background Color', 'armonia' ),
            'section'     => 'armonia_header_menu_option_section',
            'settings'    => array(
                'background_type'=> 'header_menu_background_type',
                'color'         => 'header_menu_background_color',
                'hover_color'   => 'header_menu_background_hover_color'
            ),
            'priority'  => 40
            ))
        );

        /**
         * Header Menu Font Settings
         * 
         */
        $wp_customize->add_setting( 'header_menu_font_color', array( 'default' => '#000000',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_setting( 'header_menu_font_hover_color', array( 'default' => '#e49c86',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_control( 
            new Armonia_WP_Control_Group_Control( $wp_customize, 'header_menu_font_color_group', array(
            'label'       => esc_html__( 'Font Color', 'armonia' ),
            'section'     => 'armonia_header_menu_option_section',
            'settings'    => array(
                'color'         => 'header_menu_font_color',
                'hover_color'   => 'header_menu_font_hover_color'
            ),
            'priority'  => 40
            ))
        );

        /**
         * Header Menu Borders Heading
         * 
         */
        $wp_customize->add_setting( 'header_menu_border_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Armonia_WP_Section_Heading_Control( $wp_customize, 'header_menu_border_settings_header', array(
                'label'	      => esc_html__( 'Borders', 'armonia' ),
                'section'     => 'armonia_header_menu_option_section',
                'settings'    => 'header_menu_border_settings_header',
                'type'        => 'section-heading',
                'priority'    => 45
            ))
        );

        /**
         * Header Menu Border Top Settings
         * 
         */
        $wp_customize->add_setting( 'header_menu_border_top', array( 'default' => 'hide',  'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( 
            new Armonia_WP_Control_Group_Control( $wp_customize, 'header_menu_border_top_group', array(
            'label'       => esc_html__( 'Border Top', 'armonia' ),
            'section'     => 'armonia_header_menu_option_section',
            'settings'    => array(
                'border'        => 'header_menu_border_top'
            ),
            'priority'  => 45
            ))
        );

        /**
         * Header Menu Border Bottom Settings
         * 
         */
        $wp_customize->add_setting( 'header_menu_border_bottom', array( 'default' => 'show',  'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( 
            new Armonia_WP_Control_Group_Control( $wp_customize, 'header_menu_border_bottom_group', array(
            'label'       => esc_html__( 'Border Bottom', 'armonia' ),
            'section'     => 'armonia_header_menu_option_section',
            'settings'    => array(
                'border'        => 'header_menu_border_bottom'
            ),
            'priority'  => 45
            ))
        );
        
        /**
         * Header Menu Typography Heading
         * 
         */
        $wp_customize->add_setting( 'header_menu_typo_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Armonia_WP_Section_Heading_Control( $wp_customize, 'header_menu_typo_settings_header', array(
                'label'	      => esc_html__( 'Typography ', 'armonia' ),
                'section'     => 'armonia_header_menu_option_section',
                'settings'    => 'header_menu_typo_settings_header',
                'type'        => 'section-heading',
                'priority'    => 110
            ))
        );

        // Add the `header text` typography settings.
        $wp_customize->add_setting( 'header_menu_font_family', array( 'default' => 'Montserrat',  'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_setting( 'header_menu_font_weight', array( 'default' => '700',    'sanitize_callback' => 'absint' ) );
        $wp_customize->add_setting( 'header_menu_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_key') );
        $wp_customize->add_setting( 'header_menu_font_size',   array( 'default' => '15',     'sanitize_callback' => 'absint' ) );

        // Add the `menu` typography control.
        $wp_customize->add_control(
            new Armonia_WP_Typography_Control( $wp_customize, 'header_menu_typography',
                array(
                    'label' => __( 'Typography', 'armonia' ),
                    'section'     => 'armonia_header_menu_option_section',
                    'initial'     => true,
                    'settings'    => array(
                        'family'      => 'header_menu_font_family',
                        'weight'      => 'header_menu_font_weight',
                        'style'       => 'header_menu_font_style',
                        'size'        => 'header_menu_font_size'
                    ),
                    'priority'  => 120
                )
            )
        );
    }
    add_action( 'customize_register', 'armonia_customizer_header_options_section', 10 );
endif;