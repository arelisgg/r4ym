<?php
/**
 * Standard blog single page
 *
 */

get_header();		

get_template_part( 'includes/header' , 'page-title' ); ?>
			<!-- BLOG AREA START -->
			<div class="themex-blog-area themex-page-template ">
				<div class="container">				
					<div class="row">					
						
						<div class="col-md-12">
						
							<?php
							while ( have_posts() ) : the_post();
									global $post;
									 get_template_part( 'template-parts/content' , 'page' );
							 endwhile;
							 ?>							
											
						

								
						</div>

					</div>	
				</div>
			</div>
			<!-- END BLOG AREA START -->
						
<?php

get_footer();		
