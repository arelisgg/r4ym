			<!-- Blog Section -->
			<div class="witr_blog_area10 witr_blog_area15">
				<div class="blog_wrap">
				<div class="row">
					<?php while ($posts->have_posts()) : $posts->the_post();?>
					
						<div class="witr_nth_child col-lg-<?php if( !empty( $witrshowdata['witr_column_grid'] ) ){echo $witrshowdata['witr_column_grid'];}?>  col-md-6 col-sm-12 grid-item   <?php echo $witr_gutter_column; ?>">
							
								<div class="busi_singleBlog all_blog_color">
									<div class="row">
										<div class="col-lg-6 col-md-12">
											<!-- image -->
											<?php if(has_post_thumbnail()){?>
											<div class="witr_sb_thumb">
												<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('themex-blog-default'); ?> </a>
												<div class="witr_post_meta9">
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
															<span><a href="#"></a> <?php the_time(esc_html__('d M Y','themex')); ?></span>
														<?php }?>
														<?php if( $element=="c"){?>
															<span>
															<?php if ( comments_open() || get_comments_number() ) {?>
																<a href="<?php comments_link(); ?>"><i class="icofont-speech-comments"></i>
																	<?php comments_number( esc_html__('0','themex'), esc_html__('1 ','themex'), esc_html__('% ','themex') );?>
																</a>						
															<?php }else{?>
																<span><i class="icofont-speech-comments"></i> <?php echo esc_html__('Comments Off','themex'); ?></span>
															<?php } ?>														
															</span>
														<?php }?>	
													<?php }	?>
												
												</div>	
											</div>	
											<?php } ?>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="witr_blog_con bs5">
												<!-- title -->
												<h2><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $witr_title_length, '' );?></a></h2>
												<!-- content -->
												<?php if(! empty( $witrshowdata['witr_show_content'] )){?>
													<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
												<?php } ?>
											</div>
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
						
						<?php endwhile;
						 wp_reset_query(); wp_reset_postdata();
						?>
				</div>		
				</div>
			</div>
			<!-- Blog Section -->												

