<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('viandante_thumbnail_function')) {

	function viandante_thumbnail_function($id, $icon = 'on') {

		global $post;
		
		if ( '' != get_the_post_thumbnail() ) { 
			
	?>
			
			<div class="pin-container">
					
				<?php 
						
					the_post_thumbnail($id);

				?>
                    
			</div>
			
	<?php
	
		}
	
	}

	add_action( 'avventura_lite_thumbnail', 'viandante_thumbnail_function', 10, 2 );

}

?>