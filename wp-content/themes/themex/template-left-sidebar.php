<?php
/**
 * Template Name: themex Blog Left Sidebar
 */

get_header();
get_template_part( 'includes/header' , 'page-title' ); ?>

			<!-- BLOG AREA START -->
			<div class="themex-blog-area themex-blog-archive">
				<div class="container">				
					<div class="row">
					
						<?php get_sidebar( 'left' ); ?>					
					
						<?php
							$page = ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );
							$paged = ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : $page );
							$wp_query = new WP_Query( array(
								'post_type' => 'post',
								'paged'     => $paged,
								'page'      => $paged,
							) );
						if ( $wp_query->have_posts() ) : ?>
													
							<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
								<div class="row">								
								<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
								
									global $post;
									get_template_part( 'template-parts/content' , 'list' );
									endwhile;  ?>								
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
																					

					</div>
				</div>
			</div>
			<!-- END BLOG AREA START -->

<?php 
get_footer();