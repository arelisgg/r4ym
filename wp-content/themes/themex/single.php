<?php
/**
 * Standard blog single page
 *
 */

get_header(); 

get_template_part( 'includes/header' , 'page-title' ); ?>
			
			<!-- BLOG AREA START -->
			<div class="themex-blog-area themex-blog-single em-single-page-comment single-blog-details">
				<div class="container">				
					<div class="row">	
						<?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
							<div class="col-md-8  col-sm-7 col-xs-12 blog-lr">
								<?php if (have_posts() ) : ?>														 
									
										<?php while ( have_posts() ) : the_post();
										
											global $post; ?>
											
											<?php get_template_part( 'template-parts/content' , 'single' ); ?>
											
										<?php endwhile; // while has_post(); ?>
							
								<?php endif; // if has_post() ?>

							</div>



							
						<?php get_sidebar( 'right' );
							
						}else{ ?>

							<div class="col-md-12  col-sm-12 col-xs-12 blog-lr">
								<?php if (have_posts() ) : ?>														 
									
										<?php while ( have_posts() ) : the_post();
										
											global $post; ?>
											
											<?php get_template_part( 'template-parts/content' , 'single' ); ?>
											
										<?php endwhile; // while has_post(); ?>
							
								<?php endif; // if has_post() ?>

							</div>						
							
						<?php } ?>
						
					</div>	
				</div>
			</div>
			<!-- END BLOG AREA START -->						
<?php
get_footer();