			<div class=" blog_style_adn_2 witr_blog_3">				
				<div class="blog_wrap blogcar_<?php echo $unic_id;?>">
				
					<?php while ($posts->have_posts()) : $posts->the_post(); 											

					?>
						<!-- single blog -->
						<div class="<?php echo $witr_gutter_column; ?>   col-md-12 col-xs-12 col-sm-12 " >
							<div class="single_blog_adn all_blog_color">

								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="themex-single-blog_adn ">					
										
										<!-- BLOG THUMB -->
										<?php if(has_post_thumbnail()){?>
										<div class="blog_adn_thumb_inner">
											<div class="themex-blog-thumb_adn ">
												<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('themex-blog-default'); ?> </a>
												<div class="blog_add_icon">
													<a href="<?php the_permalink(); ?>"><i class="icofont-link"></i></a>
												</div>
											</div>
											<!-- BLOG TITLE -->
											<div class="blog-page-title_adn2 ">
												<h2><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $witr_title_length, '' );?></a></h2>			
											</div>
										</div>
										<?php } ?>
										
										<div class="em-blog-content-area_adn ">
											<!-- content -->
											<?php if(! empty( $witrshowdata['witr_show_content'] )){?>
												<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
											<?php } ?>										
											<?php if(! empty( $witrshowdata['witr_blog_button'] )){?>
												<div class="learn_more_adn">
												  <a class="learn_btn adnbtn2" href="<?php the_permalink(); ?>"><?php echo $witrshowdata['witr_blog_button']; ?> </a>
												</div>
											<?php } ?>
										</div>			
									</div>
								</div> <!--  END SINGLE BLOG -->	
							</div>
						</div>
					<?php endwhile; ?>	
					<?php wp_reset_query(); ?>

					
				</div>
			</div>														