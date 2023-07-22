<?php
/**
 * Standard blog single page
 *
 */

get_header(); 

get_template_part( 'includes/header' , 'page-title' ); ?>
			
			<!-- BLOG AREA START -->
			<div class="themex-blog-area themex-event-singlea themex-blog-single em-single-page-comment single-blog-details">
				<div class="container">				
					<div class="row">
						<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
						<div class="row">
								<?php if (have_posts() ) : ?>														 
								<?php while ( have_posts() ) : the_post(); ?>					
							<div class="col-md-12  col-sm-12 col-xs-12 blog-lr">
								<?php 
								$event_time  = get_post_meta( get_the_ID(),'_txbdm_event_time', true ); 
								$event_address  = get_post_meta( get_the_ID(),'_txbdm_event_address', true ); 
								$map_event  = get_post_meta( get_the_ID(),'_txbdm_map_event', true ); 
								?>

								

								<div class="themex-single-blog-details">
									<?php if(has_post_thumbnail()){?>
										<div class="themex-single-blog--thumb">
											<?php the_post_thumbnail('themex-event-single'); ?>
										</div>									
									<?php } ?>
									
									<div class="single_event_content">
										<div class="themex-single-blog-title">
											<h2><?php the_title(); ?></h2>	
										</div>
												
										<?php if($event_time || $event_address){?>
											<div class="themex-event-meta-left_adn esi">
												<span><i class="icofont-ui-clock"></i><?php if($event_time){ echo esc_html($event_time);}?></span>
												<span><i class="icofont-google-map"></i><?php if($event_address){ echo esc_html($event_address);}?></span>
											</div>
										<?php } ?>
										
										<?php 
										
										if ( '' != get_the_content() ) { ?>
										<div class="themex-single-blog-content">
											<div class="single-blog-content">
												<?php the_content(); ?>
											</div>
										</div>
										<?php } ?>
									</div>
								</div>
								<?php if( $map_event ){?>
								
									<div class="google-map-event">
									
									<iframe src="<?php echo esc_url( $map_event ); ?>"  allowfullscreen></iframe>

									</div>
								<?php } ?>


							</div>
							<div class="col-md-12">
								<div class="event-description">
								
									<?php $event_titles  = get_post_meta( get_the_ID(),'_txbdm_event_titles', true ); ?>
									<?php if($event_titles){?>  
									<div class="event-dsc-title">
										<h2><?php echo esc_html($event_titles);?></h2>
									</div>

									<?php }?>

									<div class="event-dsc-info">
										<ul>
											
											<?php 
											$eventgroup  = get_post_meta( get_the_ID(),'_txbdm_eventgroup', true ); 
											
											if( $eventgroup ){?>
												<?php
												foreach ( (array) $eventgroup as $daygropd => $daygropss ){
												$day1 = $day2 ='';
												if ( isset( $daygropss['_txbdm_etime1'] ) ) {
													$day1 =  $daygropss['_txbdm_etime1'];	
												}	
												if ( isset( $daygropss['_txbdm_etime2'] ) ) {
													$day2 =  $daygropss['_txbdm_etime2'];	
												}?>
												

												<li>
													<span class="eleft"><?php echo esc_html( $day1 );?></span>
													<span  class="eright"><?php echo esc_html( $day2 );?></span>
												</li>



												
											<?php }} ?>										
											
										</ul>
										
									</div>
								</div>
							
							</div>
							
										<?php endwhile; // while has_post(); ?>
							
								<?php endif; // if has_post() ?>							
						
						</div>
						
						</div>						




						<?php get_sidebar( 'right' );?>

					</div>	
				</div>
			</div>
			<!-- END BLOG AREA START -->

		<div class="related-projects-area">
			<div class="container">
			<div class="row">
			
				<div class="col-md-12">
					<h2 class="related-projects-title text-left"><?php esc_html_e('RELATED EVENTS', 'themex') ?></h2>
				</div>
			
				<?php 
				$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3,'post_type' => 'em_event', 'post__not_in' => array($post->ID) ) );
				if( $related ) foreach( $related as $post ) { setup_postdata($post); ?>
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">

						<?php $event_time  = get_post_meta( get_the_ID(),'_txbdm_event_time', true ); 
						$event_address  = get_post_meta( get_the_ID(),'_txbdm_event_address', true ); 
						$event_day  = get_post_meta( get_the_ID(),'_txbdm_event_day', true ); 
						$event_month  = get_post_meta( get_the_ID(),'_txbdm_event_month', true );  ?>
									<div class="themex-single-event_adn">					
										<!-- BLOG THUMB -->
										<?php if(has_post_thumbnail()){?>
											<div class="themex-event-thumb_adn">
												<?php the_post_thumbnail('themex-event-default'); ?>
												
											<?php if($event_day || $event_month){?>
												<div class="event_date">
													<span><?php if($event_day){ echo esc_html($event_day);}?></span>
													<span><?php if($event_month){ echo esc_html($event_month);}?></span>
												</div>
											<?php } ?>	
											</div>									
									
										<?php } ?>
										
										<div class="em-event-content-area_adn ">										
											<!-- BLOG TITLE -->
											<div class="event-page-title_adn ">
												<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
												<?php if($event_time || $event_address){?>
													<div class="themex-event-meta-left_adn">
														<span><i class="icofont-ui-clock"></i><?php if($event_time){ echo esc_html($event_time);}?></span>
														<span><i class="icofont-google-map"></i><?php if($event_address){ echo esc_html($event_address);}?></span>
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
			
<?php
get_footer();