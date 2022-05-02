<?php

/*-----------------------------------------------------------------------------------*/
/* Sticky post grid */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('viandante_post_blocks_function')) {

	function viandante_post_blocks_function() {

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		if(1 == $paged) {

			if ( avventura_lite_setting('viandante_postblock_1_layout', 'module-1') <> 'disable' ) {
	
				echo call_user_func(
					'viandante_get_' . str_replace('-', '_', avventura_lite_setting('viandante_postblock_1_layout', 'module-1')),
					avventura_lite_setting('viandante_postblock_1_category', 1)
				);
	
			}
					
			if ( avventura_lite_setting('viandante_postblock_2_layout', 'disable') <> 'disable' ) {
	
				echo call_user_func(
					'viandante_get_' . str_replace('-', '_', avventura_lite_setting('viandante_postblock_2_layout')),
					avventura_lite_setting('viandante_postblock_2_category', 1)
				);
	
			}
				
			if ( avventura_lite_setting('viandante_postblock_3_layout', 'disable') <> 'disable' ) {
	
				echo call_user_func(
					'viandante_get_' . str_replace('-', '_', avventura_lite_setting('viandante_postblock_3_layout')),
					avventura_lite_setting('viandante_postblock_3_category', 1)
				);
	
			}
				
			if ( avventura_lite_setting('viandante_postblock_4_layout', 'disable') <> 'disable' ) {
	
				echo call_user_func(
					'viandante_get_' . str_replace('-', '_', avventura_lite_setting('viandante_postblock_4_layout')),
					avventura_lite_setting('viandante_postblock_4_category', 1)
				);
	
			}
				
		}
		
	}

	add_action( 'viandante_post_blocks', 'viandante_post_blocks_function' );

}

?>