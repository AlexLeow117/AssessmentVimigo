<?php
/**
 * Radio tab control.
 *
 * @package Armonia
 * @since 1.3.0
 */
class Armonia_Upsell_Info_Control extends WP_Customize_Control {
    /**
     * The type of customize control being rendered.
     *
     * @since 1.1.0
     * @access public
     * @var    string
     */
    public $type = 'armonia-upsell-info';

    public function render_content() {
        ?>
        <label>
            <span class="dashicons dashicons-info"></span>
            <?php if ($this->label) { ?>
                <span>
                    <?php echo wp_kses_post($this->label); ?>
                </span>
            <?php } ?>
            <a href="<?php echo esc_url('https://blazethemes.com/theme/armonia-pro/'); ?>" target="_blank"> <strong><?php echo esc_html__( 'Upgrade to PRO', 'armonia' ); ?></strong></a>
        </label>
        <?php if ($this->description) { ?>
            <span class="description customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
            </span>
            <?php
        }

        $choices = $this->choices;
        if ($choices) {
            echo '<ul>';
            foreach ($choices as $choice) {
                echo '<li>' . esc_html($choice) . '</li>';
            }
            echo '</ul>';
        }
    ?>
        <a class="comparison-button button button-primary" href="<?php echo esc_url('https://blazethemes.com/theme/armonia-pro?section=themesingle_free_pro_wrap'); ?>" target="_blank"> <strong><?php echo esc_html__( 'Free vs PRO', 'armonia' ); ?></strong></a>
    <?php
    }
}
