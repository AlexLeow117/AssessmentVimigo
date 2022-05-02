<?php
/**
 * Gloabl Options Section
 * 
 */
if( !function_exists( 'armonia_customizer_global_options_section' ) ) :
    /**
     * Register global options settings
     * 
     */
    function armonia_customizer_global_options_section( $wp_customize ) {
      /**
       * Sticky header section
       * 
       * panel - armonia_global_options_panel
       */
      $wp_customize->add_section( 'armonia_global_sticky_header_section', array(
        'title' => esc_html__( 'Sticky Header', 'armonia' ),
        'panel' => 'armonia_global_options_panel',
        'priority'  => 5,
      ));

      /**
       * Sticky sidebar Option
       * 
       */
      $wp_customize->add_setting( 'sticky_header_option', array(
        'default'         => false,
        'sanitize_callback' => 'armonia_sanitize_toggle_control'
      ));

      $wp_customize->add_control( 
          new Armonia_WP_Toggle_Control( $wp_customize, 'sticky_header_option', array(
              'label'	      => esc_html__( 'Enable sticky header', 'armonia' ),
              'section'     => 'armonia_global_sticky_header_section',
              'settings'    => 'sticky_header_option',
              'type'        => 'toggle'
          ))
      );

      /**
       * Social Section
       * 
       * panel - armonia_global_options_panel
       */
      $wp_customize->add_section( 'armonia_social_section', array(
          'title' => esc_html__( 'Social', 'armonia' ),
          'panel' => 'armonia_global_options_panel',
          'priority'  => 10,
      ));

      /**
       * Global Social Setting Heading
       * 
       */
      $wp_customize->add_setting( 'global_social_settings_header', array(
        'sanitize_callback' => 'sanitize_text_field'
      ));
      
      $wp_customize->add_control( 
          new Armonia_WP_Section_Heading_Control( $wp_customize, 'global_social_settings_header', array(
              'label'	      => esc_html__( 'Social Setting', 'armonia' ),
              'section'     => 'armonia_social_section',
              'settings'    => 'global_social_settings_header',
              'type'        => 'section-heading',
          ))
      );

      /**
       * Social Icons Settings
       * 
       */
      $wp_customize->add_setting( 'social_icons', array(
          'sanitize_callback' => 'armonia_sanitize_repeater_control',
          'default' => json_encode(array(
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
      ));
      $wp_customize->add_control( 
        new Armonia_WP_Repeater_Control( $wp_customize, 'social_icons', array(
          'label'   => esc_html__( 'Social Icons', 'armonia' ),
          'section' => 'armonia_social_section',
          'customizer_repeater_icon_control'  => true,
          'customizer_repeater_link_control'  => true
        ))
      );
      
      /**
       * Global Container Section
       * 
       * panel - armonia_global_options_panel
       */
      $wp_customize->add_section( 'armonia_global_container_section', array(
        'title' => esc_html__( 'Container', 'armonia' ),
        'panel' => 'armonia_global_options_panel',
        'priority'  => 30
      ));

      /**
       * Scroll To Top Style Setting Heading
       * 
       */
      $wp_customize->add_setting( 'global_sttop_style_settings_header', array(
        'sanitize_callback' => 'sanitize_text_field'
      ));
      $wp_customize->add_control( 
          new Armonia_WP_Section_Heading_Control( $wp_customize, 'global_sttop_style_settings_header', array(
              'label'	      => esc_html__( 'Style ', 'armonia' ),
              'section'     => 'armonia_scroll_top_section',
              'settings'    => 'global_sttop_style_settings_header',
              'type'        => 'section-heading',
          ))
      );

      /**
       * Container Width Setting
       * 
       */
      $wp_customize->add_setting( 'armonia_global_container_width', array(
        'sanitize_callback' => 'armonia_sanitize_number_range',
        'default'           => 1300
      ));
      $wp_customize->add_control( 
          new Armonia_Range_Slider_Control( $wp_customize, 'armonia_global_container_width', array(
              'label'	      => esc_html__( 'Container width (px)', 'armonia' ),
              'section'     => 'armonia_global_container_section',
              'settings'    => 'armonia_global_container_width',
              'unit'        => 'px',
              'input_attrs' => array(
                'max'         => 1900,
                'min'         => 780,
                'step'        => 1
              )
          ))
      );

      /**
       * Sidebar Width Setting
       * 
       */
      $wp_customize->add_setting( 'armonia_global_container_sidebar_width', array(
        'sanitize_callback' => 'armonia_sanitize_number_range',
        'default'           => 25
      ));
      $wp_customize->add_control( 
          new Armonia_Range_Slider_Control( $wp_customize, 'armonia_global_container_sidebar_width', array(
              'label'	      => esc_html__( 'Sidebar width (%)', 'armonia' ),
              'section'     => 'armonia_global_container_section',
              'settings'    => 'armonia_global_container_sidebar_width',
              'unit'        => '%',
              'input_attrs' => array(
                'max'         => 50,
                'min'         => 20,
                'step'        => 1
              )
          ))
      );
      
      /**
       * Breadcrumb Section
       * 
       * panel - armonia_theme_panel
       */
      $wp_customize->add_section( 'armonia_global_breadcrumb_section', array(
        'title' => esc_html__( 'Breadcrumb', 'armonia' ),
        'panel' => 'armonia_global_options_panel',
        'priority'  => 50,
    ));
    
    /**
     * Breadcrumb Show Hide
     * 
     */
    $wp_customize->add_setting( 'breadcrumb_option', array(
      'default'         => true,
      'sanitize_callback' => 'armonia_sanitize_toggle_control',
    ));

    $wp_customize->add_control( 
        new Armonia_WP_Toggle_Control( $wp_customize, 'breadcrumb_option', array(
          'label'         => esc_html__( 'Show/Hide Breadcrumb', 'armonia' ),
          'section'     => 'armonia_global_breadcrumb_section',
          'settings'    => 'breadcrumb_option',
          'type'        => 'toggle'
      ))
    );
    
    /**
     * Sticky sidebar Section
     * 
     * panel - armonia_global_options_panel
     */
    $wp_customize->add_section( 'armonia_global_sticky_sidebar_section', array(
      'title' => esc_html__( 'Sticky Sidebar', 'armonia' ),
      'panel' => 'armonia_global_options_panel',
      'priority'  => 100,
    ));

    /**
     * Sticky sidebar Option
     * 
     */
    $wp_customize->add_setting( 'sticky_sidebars_option', array(
      'default'         => true,
      'sanitize_callback' => 'armonia_sanitize_toggle_control'
    ));

    $wp_customize->add_control( 
        new Armonia_WP_Toggle_Control( $wp_customize, 'sticky_sidebars_option', array(
            'label'	      => esc_html__( 'Enable sticky sidebars', 'armonia' ),
            'section'     => 'armonia_global_sticky_sidebar_section',
            'settings'    => 'sticky_sidebars_option',
            'type'        => 'toggle'
        ))
    );

    /**
     * Scroll To Top Section
     * 
     * panel - armonia_global_options_panel
     */
    $wp_customize->add_section( 'armonia_scroll_top_section', array(
      'title' => esc_html__( 'Scroll To Top', 'armonia' ),
      'panel' => 'armonia_global_options_panel',
      'priority'  => 100,
    ));

    /**
     * Scroll To Top Content Setting Heading
     * 
     */
    $wp_customize->add_setting( 'global_sttop_content_settings_header', array(
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( 
        new Armonia_WP_Section_Heading_Control( $wp_customize, 'global_sttop_content_settings_header', array(
            'label'	      => esc_html__( 'Content ', 'armonia' ),
            'section'     => 'armonia_scroll_top_section',
            'settings'    => 'global_sttop_content_settings_header',
            'type'        => 'section-heading',
        ))
    );

    /**
     * Scroll To Top Option
     * 
     */
    $wp_customize->add_setting( 'scroll_to_top_option', array(
      'default'         => true,
      'sanitize_callback' => 'armonia_sanitize_toggle_control'
    ));

    $wp_customize->add_control( 
        new Armonia_WP_Toggle_Control( $wp_customize, 'scroll_to_top_option', array(
            'label'	      => esc_html__( 'Show scroll to top', 'armonia' ),
            'section'     => 'armonia_scroll_top_section',
            'settings'    => 'scroll_to_top_option',
            'type'        => 'toggle'
        ))
    );

    /**
     * Scroll To Top Align
     * 
     */
    $wp_customize->add_setting( 'scroll_to_top_align',
      array(
        'default'           => 'align--left',
        'sanitize_callback' => 'sanitize_text_field',
      )
    );

    // Add the layout control.
    $wp_customize->add_control( new Armonia_WP_Radio_Tab_Control(
        $wp_customize,
        'scroll_to_top_align',
            array(
            'label'    => esc_html__( 'Button Align', 'armonia' ),
            'section'  => 'armonia_scroll_top_section',
            'choices'  => array(
                'align--left' => array(
                    'icon'  => esc_attr( 'fas fa-align-left' )
                ),
                'align--center' => array(
                    'icon'  => esc_attr( 'fas fa-align-center' )
                ),
                'align--right' => array(
                    'icon'  => esc_attr( 'fas fa-align-right' )
                )
            )
        )
    ));

    /**
     * Scroll To Top Style Setting Heading
     * 
     */
    $wp_customize->add_setting( 'global_sttop_style_settings_header', array(
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( 
        new Armonia_WP_Section_Heading_Control( $wp_customize, 'global_sttop_style_settings_header', array(
            'label'	      => esc_html__( 'Style ', 'armonia' ),
            'section'     => 'armonia_scroll_top_section',
            'settings'    => 'global_sttop_style_settings_header',
            'type'        => 'section-heading',
        ))
    );

    /**
     * Scroll To Top Padding Settings
     * 
     */
    $wp_customize->add_setting( 'scroll_to_top_padding_top', array( 'default' => 6, 'sanitize_callback' => 'armonia_sanitize_number_field' ) );
    $wp_customize->add_setting( 'scroll_to_top_padding_right', array( 'default' => 10, 'sanitize_callback' => 'armonia_sanitize_number_field' ) );
    $wp_customize->add_setting( 'scroll_to_top_padding_bottom', array( 'default' => 6, 'sanitize_callback' => 'armonia_sanitize_number_field' ) );
    $wp_customize->add_setting( 'scroll_to_top_padding_left', array( 'default' => 10, 'sanitize_callback' => 'armonia_sanitize_number_field' ) );
    $wp_customize->add_control( 
        new Armonia_WP_Spacing_Control( $wp_customize, 'scroll_to_top_padding_group', array(
            'label'     => esc_html__( 'Padding', 'armonia' ),
            'section'     => 'armonia_scroll_top_section',
            'settings'    => array(
                'top'   => 'scroll_to_top_padding_top',
                'right' => 'scroll_to_top_padding_right',
                'bottom' => 'scroll_to_top_padding_bottom',
                'left'  => 'scroll_to_top_padding_left'
            ),
            'priority'  => 90
        ))
    );

    /**
     * Scroll To Top Color Settings
     * 
     */
    $wp_customize->add_setting( 'scroll_to_top_color', array( 'default' => '#ffffff',  'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_setting( 'scroll_to_top_hover_color', array( 'default' => '#f0f0f0',  'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( 
      new Armonia_WP_Control_Group_Control( $wp_customize, 'scroll_to_top_color_group', array(
        'label'       => esc_html__( 'Icon Color', 'armonia' ),
        'descrition'  => esc_html__( 'Manage font color', 'armonia' ),
        'section'     => 'armonia_scroll_top_section',
        'settings'    => array(
          'color' => 'scroll_to_top_color',
          'hover_color' => 'scroll_to_top_hover_color'
        ),
        'priority'  => 90
      ))
    );

    /**
     * Scroll To Top Background Color Settings
     * 
     */
    $wp_customize->add_setting( 'scroll_to_top_bg_color', array( 'default' => '#000000',  'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_setting( 'scroll_to_top_hover_bg_color', array( 'default' => '#262626',  'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( 
      new Armonia_WP_Control_Group_Control( $wp_customize, 'scroll_to_top_bg_group', array(
        'label'       => esc_html__( 'Background', 'armonia' ),
        'descrition'  => esc_html__( 'Manage background', 'armonia' ),
        'section'     => 'armonia_scroll_top_section',
        'settings'    => array(
          'color' => 'scroll_to_top_bg_color',
          'hover_color' => 'scroll_to_top_hover_bg_color'
        ),
        'priority'  => 100
      ))
    );

    /**
     * Scroll To Top Border Settings
     * 
     */
    $wp_customize->add_setting( 'scroll_to_top_border', array( 'default' => 'show',  'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_setting( 'scroll_to_top_border_color', array( 'default' => '#ffffff',  'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( 
        new Armonia_WP_Control_Group_Control( $wp_customize, 'scroll_to_top_border_group', array(
        'label'       => esc_html__( 'Border', 'armonia' ),
        'section'     => 'armonia_scroll_top_section',
        'settings'    => array(
            'border'        => 'scroll_to_top_border',
            'color'         => 'scroll_to_top_border_color'
        ),
        'priority'  => 110
        ))
    );
  }
  add_action( 'customize_register', 'armonia_customizer_global_options_section', 10 );
endif;