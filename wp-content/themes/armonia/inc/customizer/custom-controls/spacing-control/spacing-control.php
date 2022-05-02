<?php
/**
 * Spacing Control
 * 
 * @package Armonia
 * @since 1.0.0
 */
if( class_exists( 'WP_Customize_Control' ) ) :
    class Armonia_WP_Spacing_Control extends \WP_Customize_Control {
        /**
         * Control type
         * 
         */
        public $type = 'armonia-spacing';
        
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
                    'top'         => esc_html__( 'Top', 'armonia' ),
                    'right'   => esc_html__( 'Right', 'armonia' ),
                    'bottom'   => esc_html__( 'Bottom', 'armonia' ),
                    'left'            => esc_html__( 'Left', 'armonia' )
                )
            );
        }

        /**
         * Enqueue scripts/styles.
         *
         * @since 3.4.0
         */
        public function enqueue() {
            wp_enqueue_style( 'armonia-customizer-spacing-control', get_template_directory_uri() . '/inc/customizer/custom-controls/spacing-control/spacing-control.css', array(), ARMONIA_VERSION, 'all' );
            wp_enqueue_script( 'armonia-customizer-spacing-control', get_template_directory_uri() . '/inc/customizer/custom-controls/spacing-control/spacing-control.js', array( 'jquery' ), ARMONIA_VERSION, true );
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
                    'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
                );
            }
            $this->json['linkTitle'] = esc_html__(  'Link fields', 'armonia' );
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
                </div>
            <# } #>

            <# if ( data.description ) { #>
                <span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>
            <ul class="control-wrap">
                <# if ( data.top ) { #>
                    <li class="spacing-control-field spacing-control-number-field">
                        <# if ( data.top.label ) { #>
                            <span class="customize-control-inner-title">{{ data.top.label }}</span>
                        <# } #>
                        <input type="number" {{{ data.top.link }}} value="{{ data.top.value }}" min="0" class="armonia-spacing-single-field" data-field="top"/>
                    </li>
                <# } #>
                <# if ( data.right ) { #>
                    <li class="spacing-control-field spacing-control-number-field">
                        <# if ( data.right.label ) { #>
                            <span class="customize-control-inner-title">{{ data.right.label }}</span>
                        <# } #>
                        <input type="number" {{{ data.right.link }}} value="{{ data.right.value }}" min="0" class="armonia-spacing-single-field" data-field="right"/>
                    </li>
                <# } #>
                <# if ( data.bottom ) { #>
                    <li class="spacing-control-field spacing-control-number-field">
                        <# if ( data.bottom.label ) { #>
                            <span class="customize-control-inner-title">{{ data.bottom.label }}</span>
                        <# } #>
                        <input type="number" {{{ data.bottom.link }}} value="{{ data.bottom.value }}" min="0" class="armonia-spacing-single-field" data-field="bottom"/>
                    </li>
                <# } #>
                <# if ( data.left ) { #>
                    <li class="spacing-control-field spacing-control-number-field">
                        <# if ( data.left.label ) { #>
                            <span class="customize-control-inner-title">{{ data.left.label }}</span>
                        <# } #>
                        <input type="number" {{{ data.left.link }}} value="{{ data.left.value }}" min="0" class="armonia-spacing-single-field" data-field="left"/>
                    </li>
                <# } #>
                <span class="dashicons dashicons-editor-unlink trigger-link-control" title="{{data.linkTitle}}"></span>
            </ul>
            <?php
        }
    }
endif;