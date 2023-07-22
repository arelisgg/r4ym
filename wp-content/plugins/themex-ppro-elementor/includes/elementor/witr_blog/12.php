			<!-- Blog Section -->
			<div class="witr_blog_area12">
				<div class="blog_wrap blogcar_<?php echo $unic_id;?>">
					<?php while ($posts->have_posts()) : $posts->the_post(); ?>					
						<div class="<?php echo $witr_gutter_column; ?>   col-md-12 col-xs-12 col-sm-12 " >
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="busi_singleBlog">
									<!-- image -->
									<?php if(has_post_thumbnail()){?>
									<div class="witr_sb_thumb">
										<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('themex-blog-default'); ?> </a>

										<?php if($witrshowdata['witr_cata_show']=='yes'){?>
											<div class="witr_top_category">
												<!-- category -->
												<span> <?php the_category('');?></span>
											</div>
										<?php } ?>	
									</div>	
									<?php } ?>
									<div class="all_blog_color">	
										<div class="witr_blog_con bs5">
											<!--  post meta -->
											<?php
												foreach ( $witrshowdata['witr_post_meta'] as $element ) {						
													if( $element=="aa"){?>
														<span><i class="icofont-tags"></i> <?php the_category(', ');?></span>
													<?php }?>
													<?php if( $element=="a"){?>
														<span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><i class="icofont-user-alt-3"></i> <?php the_author(); ?> </a></span>
													<?php }?>
													<?php if( $element=="d"){?>
														<span><a href="#"><i class="icofont-ui-clock"></i></a> <?php the_time(esc_html__('d M Y','themex')); ?></span>
													<?php }?>
													<?php if( $element=="c"){?>
														<span>
														<?php if ( comments_open() || get_comments_number() ) {?>
															<a href="<?php comments_link(); ?>"><i class="icofont-speech-comments"></i>
																<?php comments_number( esc_html__('0','themex'), esc_html__('1 ','themex'), esc_html__('% ','themex') );?>
															</a>						
														<?php }else{?>
															<span><i class="icofont-speech-comments"></i> <?php echo esc_html__('Comments Off','themex'); ?></span>
															<span><i class="icofont-speech-comments"></i> <?php echo esc_html__('Comments Off','themex'); ?></span>
														<?php } ?>														
														
														
														</span>
													<?php }?>
														
												<?php }	?>									
											<!-- title -->
											<h2><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $witr_title_length, '' );?></a></h2>
											<!-- content -->
											<?php if(! empty( $witrshowdata['witr_show_content'] )){?>
												<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
											<?php } ?>

											<?php if(! empty( $witrshowdata['witr_blog_button'] )){?>
												<div class="learn_more_adn">
													<a class="learn_btn adnbtn2" href="<?php the_permalink(); ?>"><?php echo $witrshowdata['witr_blog_button']; ?></a>
												</div>
											<?php } ?>
											
											<?php if(! empty( $witrshowdata['witr_buttoni_show'] )){?>
												<div class="wbutton_right_icon">
													<a href="<?php the_permalink(); ?>"><i class="ti-arrow-right"></i></a>
												</div>
											<?php } ?>											
											
										
											
										</div>
									</div>
									
								</div>
							</div>
						</div>
					<?php endwhile; ?>	
					<?php wp_reset_query(); ?>						
				</div>
			</div>
			<!-- Blog Section -->												
