			<!-- Blog Section -->
			<section class="witr_blog_area6">
				<div class="container">
					<div class="row">
						<?php while ($posts->have_posts()) : $posts->the_post(); ?>					
							<div class=" col-lg-<?php if( !empty( $witrshowdata['witr_column_grid'] ) ){echo $witrshowdata['witr_column_grid'];}?>  col-md-6 col-sm-12 <?php echo $witr_gutter_column; ?>">
								<div class="witr_singleBlog">
									<!-- image -->
									<?php if(has_post_thumbnail()){?>
									<div class="witr_sb6_thumb">
											<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('themex-blog-default2'); ?> </a>
										<div class="all_blog_color">	
											<div class="all_text_position">	
												<div class="witr_blog_con6">
													<!-- title -->
													<h2><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $witr_title_length, '' );?></a></h2>
													<!-- category -->
													<h5><?php the_category(',');?></h5>
													<!-- content -->
													<?php if(! empty( $witrshowdata['witr_show_content'] )){?>
														<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
													<?php } ?>						
												</div>
												<div class="witr_post_Author6">
													<!-- image -->
													<?php if( $witrshowdata['witr_pagination_meta'] == 'yes' ){
														echo get_avatar( get_the_author_meta('ID'), 60); 
													} ?>
													<a class="nameAuthor" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php esc_html_e('Posted by','themex')?> <?php the_author(); ?></a>
													<div class="witr_post_text">	
														<!--  post meta -->
															<?php
															foreach ( $witrshowdata['witr_post_meta'] as $element ) {						
														if( $element=="a"){?>
															<span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?> </a></span>
														<?php }?>
														<?php if( $element=="d"){?>
															<span><a href="#"><i class="icofont-clock-time"></i></a> <?php the_time(esc_html__('d M Y','themex')); ?></span>
														<?php }?>
														<?php if( $element=="c"){?>
															<span>
															<?php if ( comments_open() || get_comments_number() ) {?>
																<a href="<?php comments_link(); ?>"><i class="icofont-speech-comments"></i>
																	<?php comments_number( esc_html__('0','themex'), esc_html__('1 ','themex'), esc_html__('% ','themex') );?>
																</a>						
															<?php }else{?>
																<span><i class="icofont-comment"></i><?php echo esc_html__('Comments Off','themex'); ?></span>
																<span><i class="icofont-comment"></i><?php echo esc_html__('Comments Off','themex'); ?></span>
															<?php } ?>														
															
															
															</span>
														<?php }?>
																	
															<?php }	?>
													</div>
												</div>
											</div>
										</div>
										
										
									</div>
									<?php } ?>
									
									
								</div>
							</div>
						<?php endwhile; ?>	
						<?php wp_reset_query(); ?>						
					</div>
				</div>
			</section>
			<!-- Blog Section -->												
				