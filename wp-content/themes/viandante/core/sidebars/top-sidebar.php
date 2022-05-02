<?php

/*-----------------------------------------------------------------------------------*/
/* Top sidebar */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('viandante_top_sidebar_function')) {

	function viandante_top_sidebar_function() {

		$isWidget = is_active_sidebar('avventura-lite-top-widget-area') ? TRUE : FALSE;

		if ( $isWidget ) : 
	
	?>
			
			<div id="top_sidebar" class="sidebar-area">
			
				<?php 
							
					if ( $isWidget == TRUE )
						dynamic_sidebar('avventura-lite-top-widget-area');
                    	
				?>
                			
			</div>
				
	<?php 
	
		endif;
		
	}

	add_action( 'avventura_lite_top_sidebar', 'viandante_top_sidebar_function' );

}

?>