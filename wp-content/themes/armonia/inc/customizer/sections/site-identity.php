<?php
/**
 * Site Identity Section
 * 
 */
if( !function_exists( 'armonia_customizer_site_identity_section' ) ) :
    /**
     * Register site identity settings
     * 
     */
    function armonia_customizer_site_identity_section( $wp_customize ) {
        /**
         * Site Title Section
         * 
         * panel - armonia_site_identity_panel
         */
        $wp_customize->add_section( 'armonia_site_title_section', array(
            'title' => esc_html__( 'Site Title & Tagline', 'armonia' ),
            'panel' => 'armonia_site_identity_panel',
            'priority'  => 30,
        ));
        $wp_customize->get_control( 'blogname' )->section = 'armonia_site_title_section';
        $wp_customize->get_control( 'display_header_text' )->section = 'armonia_site_title_section';
        $wp_customize->get_control( 'display_header_text' )->label = esc_html__( 'Display site title', 'armonia' );
        $wp_customize->get_control( 'blogdescription' )->section = 'armonia_site_title_section';

        /**
         * Blog Description Option
         * 
         */
        $wp_customize->add_setting( 'blogdescription_option', array(
            'default'        => true,
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control( 'blogdescription_option', array(
            'label'    => esc_html__( 'Display site description', 'armonia' ),
            'section'  => 'armonia_site_title_section',
            'type'     => 'checkbox',
            'priority' => 50
        ));

        /**
         * Site Title Heading
         * 
         */
        $wp_customize->add_setting( 'site_title_style_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Armonia_WP_Section_Heading_Control( $wp_customize, 'site_title_style_header', array(
                'label'	      => esc_html__( 'Style', 'armonia' ),
                'section'     => 'armonia_site_title_section',
                'settings'    => 'site_title_style_header',
                'type'        => 'section-heading',
                'priority'    => 50
            ))
        );

        $wp_customize->get_control( 'header_textcolor' )->section = 'armonia_site_title_section';
        $wp_customize->get_control( 'header_textcolor' )->priority = 60;
        $wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Site Title Color', 'armonia' );

        /**
         * Site Title Typography Heading
         * 
         */
        $wp_customize->add_setting( 'site_title_typo_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Armonia_WP_Section_Heading_Control( $wp_customize, 'site_title_typo_settings_header', array(
                'label'	      => esc_html__( 'Typography ', 'armonia' ),
                'section'     => 'armonia_site_title_section',
                'settings'    => 'site_title_typo_settings_header',
                'type'        => 'section-heading',
                'priority'    => 80
            ))
        );
        
        // Add the `header text` typography settings.
        $wp_customize->add_setting( 'site_title_font_family', array( 'default' => 'Cormorant Garamond',  'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_setting( 'site_title_font_weight', array( 'default' => '600',    'sanitize_callback' => 'absint' ) );
        $wp_customize->add_setting( 'site_title_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_key') );
        $wp_customize->add_setting( 'site_title_font_size',   array( 'default' => 80,     'sanitize_callback' => 'absint' ) );

        // Add the `<p>` typography control.
        $wp_customize->add_control(
            new Armonia_WP_Typography_Control( $wp_customize, 'site_title_typography',
                array(
                    'label' => __( 'Typography', 'armonia' ),
                    'section'     => 'armonia_site_title_section',
                    'initial'     => true,
                    'settings'    => array(
                        'family'      => 'site_title_font_family',
                        'weight'      => 'site_title_font_weight',
                        'style'       => 'site_title_font_style',
                        'size'        => 'site_title_font_size'
                    ),
                    'priority'  => 100
                )
            )
        );
    }
    add_action( 'customize_register', 'armonia_customizer_site_identity_section', 10 );
endif;