<?php
/**
 * Standard blog single page
 *
 */

get_header(); 
get_template_part( 'includes/header' , 'page-title' ); ?>
			
			<!-- BLOG AREA START -->
			<div class="themex-blog-area themex-blog-single single-blog-details">
				<div class="container">				
					<div class="row ">


						<?php if( have_posts() ) : ?>

							<?php while( have_posts() ) : the_post();
								$teamgroup  = get_post_meta( get_the_ID(),'_txbdm_teamgroup', true );
								$team_titles  = get_post_meta( get_the_ID(),'_txbdm_team_titles', true );
								$team_Info  = get_post_meta( get_the_ID(),'_txbdm_team_Info', true );
								$single_list  = get_post_meta( get_the_ID(),'_txbdm_single_list', true );
								$team_btn  = get_post_meta( get_the_ID(),'_txbdm_team_btn', true );
								$team_btnutl  = get_post_meta( get_the_ID(),'_txbdm_team_btnutl', true );
							?>					
									
								<div class="col-lg-5  col-md-6  col-sm-12 col-xs-12">
									<div class="team_single_pic">
										<?php the_post_thumbnail();?>
									</div>
										
									<div class="witr_single_team_s">
											<?php 
											if( $teamgroup ){
												foreach ( (array) $teamgroup as $time_social => $time_social_value ){
												$team_i = $team_l ='';
												if ( isset( $time_social_value['_txbdm_time_i'] ) ) {
													$team_i =  $time_social_value['_txbdm_time_i'];	
												}	
												if ( isset( $time_social_value['_txbdm_team_l'] ) ) {
													$team_l =  $time_social_value['_txbdm_team_l'];	
												}?>											
												<a href="<?php echo esc_url( $team_l );?>"><i class="<?php echo esc_html( $team_i );?>"></i></a>
											<?php }} ?>																										
									</div>
									
								</div>
								<div class="col-lg-7  col-md-6  col-sm-12 col-xs-12">
									<div class="team_single_content text-left">
										<?php if($team_Info){?>
											<h3><?php echo esc_html($team_Info);?></h3>
										<?php };?>
										<div class="team_single_title">
											<h2><?php the_title();?></h2>
											<!-- sub title -->
											<?php if($team_titles){ ?>
												<h1><?php echo $team_titles; ?> </h1>	
											<?php }?>
										</div>
										<div class="team_single_content_text">
											<?php the_content(); ?>
										</div>
										<!--- list --->
										<?php if($single_list){ ?>
										<div class="single_team_list">		
											<?php echo $single_list;?>		
										</div>
										<?php }?>
										
										<?php if($team_btnutl){?> 
											<div class="team_single_btn">
												<a class="" href="<?php echo esc_url( $team_btnutl );?>"><?php echo $team_btn;?></a>
											</div>
										<?php }?>
									</div>										
								</div>
					

						<?php endwhile;?>
					<?php endif; ?>
									
					</div>	
				</div>
			</div>
			<!-- END BLOG AREA START -->						
<?php
get_footer();