<?php 
/*
single details page

*/
 global $themex_opt;
?>							
		<div class="themex-single-blog-details">
			<?php if(has_post_thumbnail()){?>
				<div class="themex-single-blog--thumb">
					<?php the_post_thumbnail('themex-blog-single', array( 'class' => 'img-fluid')); ?>
				</div>									
			<?php } ?>
			<div class="themex-single-blog-details-inner">	
				<div class="themex-single-blog-title">
					<h2><?php the_title(); ?></h2>	
				</div>
				<!-- BLOG POST META  -->		
				<?php themex_blog_singlepost_meta();?>

				

				<div class="themex-single-blog-content">
					<div class="single-blog-content">
					<?php the_content();
					if ( '' != get_the_content() ) { ?>					
						<div class="page-list-single">						
							<?php 
							/**
							* Display In-Post Pagination
							*/
							wp_link_pages( array(
								'link_before'   => '<span>',
								'link_after'    => '</span>',
								'before'        => '<p class="inner-post-pagination"><span>' . esc_html__('Pages:', 'themex'),
								'after'     => '</p>'
							)); ?>					
												
						</div>
					<?php } ?>
					</div>
				</div>
			

				<?php if( 'post' == get_post_type() ) { ?>	
				
				
					<?php if (!empty($themex_opt['themex_blog_socialsharesh_hide']) && $themex_opt['themex_blog_socialsharesh_hide']==true){?>
						
						<div class="themex-blog-social">
							<div class="themex-single-icon">
								<?php
								if( function_exists('twr_sitepage_sharing') ){						
									twr_sitepage_sharing();
								}
								?>
							</div>
						</div>					
						
					<?php }else{
						
					}} ?> 	
			</div>
		</div>

	<?php comments_template();