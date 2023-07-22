
<?php
/**
 * Standard blog index page
 *
 * @package Layers
 * @since Layers 1.0.0
 */

get_header(); 
	themex_blog_breadcrumb();?>
				
			<!-- BLOG AREA START -->
			<div class="themex-blog-index blog-area themex-blog-area">				
				<div class="container">	
					<div class="row">
					
						<?php
						if ( have_posts() ) : ?>
													
							<div class="col-md-12 col-sm-12 col-xs-12 bgimgload">
								<div class="row blog-messonary">								
								<?php while (have_posts() ) : the_post();
								
									global $post; ?>
									
									<?php get_template_part( 'template-parts/content' , 'blog' ); ?>
									
								<?php endwhile; // while has_post(); ?>								
								</div>
								
								<!-- START PAGINATION -->
								<div class="row">
									<div class="col-md-12">
										
										<?php themex_pagination();?>

									</div>
								</div>
								<!-- END START PAGINATION -->								
							</div>
						<?php endif; // if has_post() ?>						

																					
					</div>
				</div>
			</div>
			<!-- END BLOG AREA START -->	
<?php
get_footer();







