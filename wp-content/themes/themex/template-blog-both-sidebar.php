<?php
/**
 * Template Name: themex Blog Both Sidebar
 */

get_header();
get_template_part( 'includes/header' , 'page-title' ); ?>

			<!-- BLOG AREA START -->
			<div class="themex-blog-area themex-blog-archive witr_blog_both">
				<div class="container">				
					<div class="row">
					
						<?php if ( is_active_sidebar( 'sidebar-1' ) ) {?>
							<div class="col-lg-3 col-md-6  col-sm-12 col-xs-12  sidebar-right content-widget">
								<div class="blog-left-side widget">								
									<?php dynamic_sidebar( 'sidebar-1' ); ?>
								</div>
							</div>		
						<?php } 
						
							$page = ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );
							$paged = ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : $page );
							$wp_query = new WP_Query( array(
								'post_type' => 'post',
								'paged'     => $paged,
								'page'      => $paged,
							) );
						if ( $wp_query->have_posts() ) : ?>
													
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="row">								
								<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
								
									global $post; 
									get_template_part( 'template-parts/content' , 'list' ); 
									endwhile; ?>								
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

						<?php if ( is_active_sidebar( 'sidebar-2' ) ) {?>
							<div class="col-lg-3 col-md-6  col-sm-12 col-xs-12  sidebar-right content-widget">
								<div class="blog-left-side widget">								
									<?php dynamic_sidebar( 'sidebar-2' ); ?>
								</div>
							</div>		
						<?php } ?>																				

					</div>
				</div>
			</div>
			<!-- END BLOG AREA START -->

<?php 
get_footer();