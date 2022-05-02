    <footer id="footer">
    
    	<?php
		
			get_sidebar('bottom');
			get_sidebar('footer');
		
		?>

        <div id="footer-copyright">

            <div class="container">
        
                 <div class="row copyright" >
                    
                    <div class="col-md-12" >
    
                        <p>
    
                            <?php 
                        
                                if ( avventura_lite_setting('avventura_lite_copyright_text')) :
                                            
                                    echo wp_filter_post_kses(avventura_lite_setting('avventura_lite_copyright_text'));
                                                
                                else:
                                            
                                    esc_html_e('Copyright ', 'viandante');
                                    echo esc_html(get_bloginfo('name'));
                                    echo esc_html( date_i18n( __( ' Y', 'viandante' )));
                                            
                                endif;
                                            
                            ?>
                
                            <a href="<?php echo esc_url('https://www.themeinprogress.com/'); ?>" target="_blank"><?php printf( esc_html__( ' | Theme by %s', 'viandante' ), 'ThemeinProgress' ); ?></a>
                            <a href="<?php echo esc_url('http://wordpress.org/'); ?>" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'viandante' ); ?>" rel="generator"><?php printf( esc_html__( ' | Proudly powered by %s', 'viandante' ), 'WordPress' ); ?></a>
    
                        </p>
    
                        <?php do_action( 'avventura_lite_socials' ); ?>
                        
                    </div>
                
                </div>
                
            </div>
            
        </div>
    
    </footer>

</div>

<?php 

	if ( !avventura_lite_setting('avventura_lite_view_back_to_top') || avventura_lite_setting('avventura_lite_view_back_to_top') == 'on' )
		echo '<div id="back-to-top"><span class="dashicons dashicons-arrow-up-alt"></span></div>';

	wp_footer(); 
	
?>   

</body>

</html>