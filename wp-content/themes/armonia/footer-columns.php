<?php
/**
 * Footer section
 * 
 * @package Armonia
 * @since 1.0.0
 */
?>
    <div class="footer-widget col-md-3">
        <?php is_active_sidebar( 'footer-column' ) ? dynamic_sidebar( 'footer-column' ) : ''; ?>
    </div>
    <div class="footer-widget col-md-3">
        <?php is_active_sidebar( 'footer-column-2' ) ? dynamic_sidebar( 'footer-column-2' ) : ''; ?>
    </div>
    <div class="footer-widget col-md-3">
        <?php is_active_sidebar( 'footer-column-3' ) ? dynamic_sidebar( 'footer-column-3' ) : ''; ?>
    </div>
    <div class="footer-widget col-md-3">
        <?php is_active_sidebar( 'footer-column-4' ) ? dynamic_sidebar( 'footer-column-4' ) : ''; ?>
    </div>