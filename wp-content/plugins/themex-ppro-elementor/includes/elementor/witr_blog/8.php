			<!-- Blog Section -->
			<div class="witr_blog_area8">
					<div class="blog_wrap blogcar_<?php echo $unic_id;?>">
						<?php while ($posts->have_posts()) : $posts->the_post(); ?>					
							<div class="<?php echo $witr_gutter_column; ?>   col-md-12 col-xs-12 col-sm-12 " >
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="witr_singleBlog">
										<!-- image -->
										<?php if(has_post_thumbnail()){?>
										<div class="witr_sb6_thumb">
											<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('themex-blog-default8'); ?> </a>
											<div class="all_blog_color">	
												<div class="all_text_position">	
													<div class="witr_blog_con6 witr_blog_con8">
														<!-- title -->
														<h2><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $witr_title_length, '' );?></a></h2>
														<!-- title -->
														<h5><?php the_category(',');?></h5>
														<!-- content -->
														<?php if(! empty( $witrshowdata['witr_show_content'] )){?>
															<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
														<?php } ?>	
														<?php if(! empty( $witrshowdata['witr_blog_button'] )){?>
														<div class="em-blog-content-area_adn ">
															<div class="learn_more_adn">
															  <a class="learn_btn adnbtn2" href="<?php the_permalink(); ?>"><?php echo $witrshowdata['witr_blog_button']; ?> </a>
															</div>
														</div>	
														<?php } ?>														
													</div>

												</div>
											</div>	
										</div>
										<?php } ?>
									</div>
								</div>
								
								
							</div>
						<?php endwhile; ?>	
						<?php wp_reset_query(); ?>						
					</div>
			</div>
			<!-- Blog Section -->												
