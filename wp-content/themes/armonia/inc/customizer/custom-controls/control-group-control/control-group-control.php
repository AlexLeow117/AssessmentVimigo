<?php
/**
 * Control Group Control
 * 
 * @package Armonia
 * @since 1.0.0
 */
if( class_exists( 'WP_Customize_Control' ) ) :
    class Armonia_WP_Control_Group_Control extends \WP_Customize_Control {
        /**
         * Control type
         * 
         */
        public $type = 'armonia-control-group';
        
        /**
         * Array 
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $l10n = array();
        
        /**
         * Set up our control.
         *
         * @since  1.0.0
         * @access public
         * @param  object  $manager
         * @param  string  $id
         * @param  array   $args
         * @return void
         */
        public function __construct( $manager, $id, $args = array() ) {
            // Let the parent class do its thing.
            parent::__construct( $manager, $id, $args );
            // Make sure we have labels.
            $this->l10n = wp_parse_args(
                $this->l10n,
                array(
                    'color'         => esc_html__( 'Color', 'armonia' ),
                    'hover_color'   => esc_html__( 'Hover Color', 'armonia' ),
                    'secondary_color'   => esc_html__( 'Secondary Color', 'armonia' ),
                    'border'            => esc_html__( 'Border', 'armonia' ),
                    'border_width'      => esc_html__( 'Border Width (px)', 'armonia' ),
                    'border_radius'     => esc_html__( 'Border Radius (%)', 'armonia' ),
                    'background_type'   => esc_html__( 'Background Type', 'armonia' )
                )
            );
        }

        /**
         * Enqueue scripts/styles.
         *
         * @since 3.4.0
         */
        public function enqueue() {
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_style( 'armonia-customizer-control-group-control', get_template_directory_uri() . '/inc/customizer/custom-controls/control-group-control/control-group.css', array(), ARMONIA_VERSION, 'all' );
            wp_enqueue_script( 'armonia-customizer-control-group-control', get_template_directory_uri() . '/inc/customizer/custom-controls/control-group-control/control-group.js', array( 'jquery' ), ARMONIA_VERSION, true );
        }

        /**
         * Add custom parameters to pass to the JS via JSON.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function to_json() {
            parent::to_json();
            // Loop through each of the settings and set up the data for it.
            foreach ( $this->settings as $setting_key => $setting_id ) {
                $this->json[ $setting_key ] = array(
                    'link'  => $this->get_link( $setting_key ),
                    'value' => $this->value( $setting_key ),
                    'defaultValue' => $setting_id->default,
                    'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
                );
            }
        }

        /**
         * Underscore JS template to handle the control's output.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function content_template() {
    ?>
            <# if ( data.label ) { #>
                <div class="heading-wrap">
                    <span class="customize-control-title">{{ data.label }}</span>
                    <span class="popup-trigger dashicons dashicons-edit"></span>
                </div>
            <# } #>

            <# if ( data.description ) { #>
                <span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>
            <ul class="content-wrap">
                <# if ( data.background_type ) { #>
                    <li class="control-group-field control-group-select-field">
                        <# if ( data.background_type.label ) { #>
                            <span class="customize-control-title">{{ data.background_type.label }}</span>
                        <# } #>
                        <select {{{ data.background_type.link }}} class="armonia-control-group-single-field" data-field="background_type">
                            <option <# if( data.background_type.value === 'hide' ) 'selected' #> value="transparent">Transparent</option>
                            <option <# if( data.background_type.value === 'hide' ) 'selected' #> value="solid">Solid</option>
                        </select>
                    </li>
                <# } #>
                <# if ( data.border ) { #>
                    <li class="control-group-field control-group-select-field">
                        <# if ( data.border.label ) { #>
                            <span class="customize-control-title">{{ data.border.label }}</span>
                        <# } #>
                        <select {{{ data.border.link }}} class="armonia-control-group-single-field" data-field="border">
                            <option <# if( data.border.value === 'show' ) 'selected' #> value="show">Show</option>
                            <option <# if( data.border.value === 'hide' ) 'selected' #> value="hide">Hide</option>
                        </select>
                    </li>
                <# } #>
                <# if ( data.color ) { #>
                    <li class="control-group-field control-group-color-field">
                        <# if ( data.color.label ) { #>
                            <span class="customize-control-title">{{ data.color.label }}</span>
                        <# } #>
                        <input type="text" {{{ data.color.link }}} value="{{ data.color.value }}" class="armonia-control-group-single-field" data-default-color="{{ data.color.defaultValue }}" data-field="color"/>
                    </li>
                <# } #>
                <# if ( data.hover_color ) { #>
                    <li class="control-group-field control-group-color-field">
                        <# if ( data.hover_color.label ) { #>
                            <span class="customize-control-title">{{ data.hover_color.label }}</span>
                        <# } #>
                        <input type="text" {{{ data.hover_color.link }}} value="{{ data.hover_color.value }}" class="armonia-control-group-single-field" data-default-color="{{ data.hover_color.defaultValue }}" data-field="hover_color"/>
                    </li>
                <# } #>
                <# if ( data.secondary_color ) { #>
                    <li class="control-group-field control-group-color-field">
                        <# if ( data.secondary_color.label ) { #>
                            <span class="customize-control-title">{{ data.secondary_color.label }}</span>
                        <# } #>
                        <input type="text" {{{ data.secondary_color.link }}} value="{{ data.secondary_color.value }}" class="armonia-control-group-single-field" data-default-color="{{ data.secondary_color.defaultValue }}" data-field="secondary_color"/>
                    </li>
                <# } #>
                <# if ( data.border_width ) { #>
                    <li class="control-group-field control-group-number-field">
                        <# if ( data.border_width.label ) { #>
                            <span class="customize-control-title">{{ data.border_width.label }}</span>
                        <# } #>
                        <input type="number" {{{ data.border_width.link }}} value="{{ data.border_width.value }}" min="1" max="10" class="armonia-control-group-single-field" data-field="border_width"/>
                    </li>
                <# } #>
                <# if ( data.border_radius ) { #>
                    <li class="control-group-field control-group-border-radius-field">
                        <# if ( data.border_radius.label ) { #>
                            <span class="customize-control-title">{{ data.border_radius.label }}</span>
                        <# } #>
                        <input type="number" {{{ data.border_radius.link }}} value="{{ data.border_radius.value }}" min="0" max="100" class="armonia-control-group-single-field" data-field="border_radius"/>
                    </li>
                <# } #>
            </ul>
            <?php
        }
    }
endif;