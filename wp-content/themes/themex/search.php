<?php
/**
 * The template for displaying post archives
 *
 */

get_header();
get_template_part( 'includes/header' , 'page-title' ); ?>

<!-- SEARCH AREA START -->
	<div class="themex-blog-area themex-blog-page themex-search-page">
		<div class="container">		
			<div class="row">
			
				<div class="col-md-8 col-sm-6 col-xs-12 bgimgload">
						<?php if( have_posts() ) : ?>
						
							<div class="row blog-messonary">

								<?php while( have_posts() ) : the_post(); ?>
								
									<?php get_template_part( 'template-parts/content' , 'search' ); ?>
									
								<?php endwhile; // while has_post(); ?>

								
							</div>
							
							<!-- START PAGINATION -->
							<div class="row">
								<div class="col-md-12">
									
									<?php themex_pagination();?>

								</div>
							</div>
							<!-- END START PAGINATION -->	
							
						<?php else : ?>
							<!-- NOT FOUND SEARCH  -->
							<div class="col-md-12">
								<div class="search-error">
									<h3><?php esc_html_e( 'No Any Posts Found', 'themex' ); ?></h3>
									<p><?php esc_html_e( 'There are no posts which match your query, please try a different search term.', 'themex' ); ?></p>
									<?php echo get_search_form(); ?>
								</div>
							</div>
							
						<?php endif; // if has_post() ?>
						
				</div>						
					
				<?php get_sidebar( 'right' ); ?>
				
			</div><!-- /row -->
		</div>
	</div>
</div>
<?php get_footer();