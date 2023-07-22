<?php
/**
 * Template Name: themex Blog Right Sidebar 2column
 */

get_header();
get_template_part( 'includes/header' , 'page-title' ); ?>

			<!-- BLOG AREA START -->
			<div class="themex-blog-area themex-blog-archive">
				<div class="container">				
					<div class="row">
					
						<?php
							$page = ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );
							$paged = ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : $page );
							$wp_query = new WP_Query( array(
								'post_type' => 'post',
								'paged'     => $paged,
								'page'      => $paged,
							) );
						if ( $wp_query->have_posts() ) : ?>
													
							<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12 bgimgload">
								<div class="row blog-messonary">								
								<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
								
									global $post; ?>
									
									<?php get_template_part( 'template-parts/content' , 'list-column' ); ?>
									
								<?php endwhile; ?>								
								</div>
								
								<!-- START PAGINATION -->
								<div class="row">
									<div class="col-md-12">
										
										<?php themex_pagination();?>

									</div>
								</div>
								<!-- END START PAGINATION -->								
							</div>
						<?php endif;  ?>
						
						<?php get_sidebar( 'right' ); ?>
																					
					</div>
				</div>
			</div>
			<!-- END BLOG AREA START -->
<?php 
get_footer();