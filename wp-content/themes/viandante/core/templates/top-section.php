<?php

/*-----------------------------------------------------------------------------------*/
/* Sticky post grid */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('viandante_top_section_function')) {

	function viandante_top_section_function( $page = false ) {

		if(
		
			(
				$page == 'archive' &&
				avventura_lite_setting('avventura_lite_view_category_title','on') == 'on'
			) ||
		
			(
				$page == 'search' &&
				avventura_lite_setting('avventura_lite_view_searched_item','on') == 'on'
			) 
		
		) :
			
	?>
		
            <section class="top-section-wrapper">
            
                <div id="top-section-inner" class="container">
                    
                    <div class="row">
                        
                        <div class="col-md-12">
                        
                            <?php 
    
                                if ( is_archive() ) : 
                            
                            ?>
                            
                                    <h1 class="archive-title"><?php echo avventura_lite_get_archive_title(); ?></h1>
                            
                            <?php 
                                
                                endif;
    
                                if ( is_search() ) : 
                            
                            ?>
                            
									<h1 class="search-result-title"><?php esc_html_e( 'You searched: ', 'viandante' ) ?><strong><?php echo get_search_query(); ?> </strong></h1>
                            
                            <?php 
                                
                                endif;
                            
                            ?>        
        
                        </div>        
        
                    </div>    
        
                </div>        
                        
            </section>

	<?php 
	
		endif;
	
	}

	add_action( 'viandante_top_section', 'viandante_top_section_function', 10, 1);

}

?>