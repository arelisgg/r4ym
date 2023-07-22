<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package themex
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
 <?php
 if ( function_exists('wp_body_open') ) {
	wp_body_open();
}
 global $themex_opt;
 get_template_part('includes/twr_preloader'); 
/* body right position social icon */
 if (!empty($themex_opt['themex_header_display_social_hide']) && $themex_opt['themex_header_display_social_hide']==true): ?>
<div class="em_slider_social">
	<ul>
		<?php themex_menu_social_icon();?>
	</ul>
</div>
<?php endif; ?>

<!-- MAIN WRAPPER START -->
<div class="wrapper">
	
 <?php  
 $txbdm_toptsstas1 = get_post_meta( get_the_ID(),'_txbdm_toptsstas1', true );  
 $txbdm_box_menu = get_post_meta( get_the_ID(),'_txbdm_box_menu_style', true ); 
 $txbdm_box_menu2 = get_post_meta( get_the_ID(),'_txbdm_box_menu_style2', true ); 
 $txbdm_box_menu3 = get_post_meta( get_the_ID(),'_txbdm_box_menu_style3', true ); 
 ?>				
	<?php if (!empty($themex_opt['themex_header_display_none_hide']) && $themex_opt['themex_header_display_none_hide']==true): ?>	

	<div class="em40_header_area_main hdisplay_none">
	<?php else: ?>
		<div class="em40_header_area_main  <?php if(!empty($themex_opt['themex_header_posi_top']) && $themex_opt['themex_header_posi_top']==true){echo esc_attr('all_header_abs');}elseif($txbdm_toptsstas1==2){echo esc_attr('all_header_abs');}else{}; ?>   ">
	<?php endif; ?>






<!-- HEADER TOP AREA -->

 <?php  $txbdm_header_topa = get_post_meta( get_the_ID(),'_txbdm_header_topa', true );  ?>

	
	<?php if (!empty($themex_opt['themex_header_top_hide']) && $themex_opt['themex_header_top_hide']==true){ ?>	
 	
 	<!-- HEADER TOP AREA -->
		<div class="themex-header-top   <?php if(!empty($themex_opt['themex_box_layout']) && $themex_opt['themex_box_layout']=="htopt_boxi"){echo esc_attr('container');}else{ }?>">
					
			<div class="<?php if(!empty($themex_opt['themex_box_layout']) && $themex_opt['themex_box_layout']=="htopt_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
									
				<!-- STYLE 1 Right Side Icon = h_top_l1  -->
				 <?php if(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_l1"){?>			
					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-lg-8 col-xl-8 col-md-12 col-sm-12">
							<div class="top-address text-left">
								<?php themex_top_address_option();?>
							</div>
						</div>
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-lg-4 col-xl-4 col-md-12 col-sm-12 ">
							<div class="top-right-menu">
								<ul class="social-icons text-right text_m_center">
        							<div class="top-address">
        								<?php themex_top_opening_option();?>
        							</div>
									<?php themex_menu_social_icon();?>
									
								</ul>									 									 								 
							</div>
						</div>	
					</div>		
				<!-- STYLE 2 Welcome Style 1 = h_top_l2  -->	
				 <?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_l2"){?>							
					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-lg-6 col-md-8 ">
							<div class="top-address text-left">
								<?php themex_top_address_option();?>
							</div>
						</div>
						
						<!-- TOP MIDDLE -->
						<div class="col-xs-12 col-lg-3 col-md-4">
							<div class="top-welcome">
								<p class="text-center">	
									<?php themex_top_wellcome_option();?>
									</p>
							</div>
						</div>					
						
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-lg-3 col-md-12">
							<div class="top-right-menu">
									<ul class="social-icons text-right text_m_center">
										<?php themex_menu_social_icon();?>								
									</ul>									 									 								 
							</div>
						</div>	
					</div>
				<!-- STYLE 3 Left Side Icon = h_top_l3  -->		
				 <?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_l3"){?>					
					<div class="row top-both-p0">
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-lg-3 col-xl-3 col-md-3 col-sm-12 ">
							<div class="top-right-menu">
									<ul class="social-icons text-left text_m_center">
										<?php themex_menu_social_icon();?>								
									</ul>									 									 								 
							</div>
						</div>					
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-lg-7 col-xl-9 col-md-9 col-sm-12">
							<div class="top-address text-right">
								<?php themex_top_address_option();?>
							</div>
						</div>
					</div>
					<!-- STYLE 4 Welcome Style 2 = h_top_l4  -->	
				 <?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_l4"){?>								
					<div class="row top-both-p0">
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-lg-3 col-md-12">
							<div class="top-right-menu">
									<ul class="social-icons text-left text_m_center">
										<?php themex_menu_social_icon();?>							
									</ul>									 									 								 
							</div>
						</div>
						<!-- TOP MIDDLE -->
						<div class="col-xs-12 col-lg-3 col-md-4">
							<div class="top-welcome">
								<p class="text-center">	
									<?php themex_top_wellcome_option();?>
									</p>
							</div>
						</div>						
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-lg-6 col-md-8 ">
							<div class="top-address text-right">
								<?php themex_top_address_option();?>
							</div>
						</div>
					</div>					
				<!-- STYLE 5 Right Side Menu= h_top_l5  -->
				 <?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_l5"){?>			
					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-lg-8 col-md-12 col-sm-12">
							<div class="top-address text-left text_m_center">
								<?php themex_top_address_option();?>
							</div>
						</div>
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-lg-4 col-md-12 col-sm-12">
							<div class="top-right-menu">							 									 								 
								<?php themex_top_menu_option(); ?>
							</div>
						</div>	
					</div>					
				<!-- STYLE 6 Left Side Menu= h_top_l6  -->		
				 <?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_l6"){?>					
					<div class="row top-both-p0">
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-sm-12 col-lg-4 col-md-12">
							<div class="top-right-menu">									 									 								 
									<?php themex_top_menu_option(); ?>
							</div>
						</div>					
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-lg-8 col-md-12 col-sm-12">
							<div class="top-address text-right text_m_center">
								<?php themex_top_address_option();?>
							</div>
						</div>
					</div>			

				<!-- STYLE 7 Middle Social Icon & Right Login = h_top_l7  -->
				 <?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_l7"){?>			
					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-9 col-sm-12 col-lg-6">
							<div class="top-address text-left menu_17">
								<?php themex_top_address_option();?>
							</div>
						</div>
						
						<!-- TOP MIDDLE -->
						<div class="col-xs-12 col-md-3 col-sm-6 col-lg-3">
							<div class="top-right-menu ">
									<ul class="social-icons text-right menu_17 text_m_right ">
										<?php themex_menu_social_icon();?>							
									</ul>									 									 								 
							</div>
						</div>					
						
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-12 col-sm-6 col-lg-3">
							<div class="top-address em-login text-right text_m_center">
								<p>							
									<?php themex_login();?>
									
								</p>
							</div>
						</div>	
					</div>
				<!-- STYLE 8 Opening Hours Menu with login = h_top_l8  -->	
				 <?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_l8"){?>			
					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-5 col-xl-4 col-lg-5 col-sm-7">
							<div class="top-address text-left menu_18">
								<?php themex_top_opening_option();?>
							</div>
						</div>
						
						<!-- TOP MIDDLE -->
						<div class="col-xs-12  col-md-3 col-xl-4 col-lg-4 col-sm-5">
							<div class="top-right-menu ">
									<ul class="social-icons text-center menu_18 text_s_right ">
										<?php themex_menu_social_icon();?>								
									</ul>									 									 								 
							</div>
						</div>					
						
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-4 col-xl-4 col-lg-3 col-sm-12">
							<div class="top-address em-login text-right menu_18 ">
								<p>							
									<?php themex_login();?>
									
								</p>
							</div>

						</div>	
					</div>
				<!-- STYLE 9 Opening Hours with Search = h_top_l9  -->
				 <?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_l9"){?>			
					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-6 col-lg-6 col-sm-7">
							<div class="top-address text-left menu_18">
								<?php themex_top_opening_option();?>
							</div>
						</div>
						
						<!-- TOP MIDDLE -->
						<div class="col-xs-12  col-md-3  col-lg-3 col-sm-4">
							<div class="top-right-menu ">
									<ul class="social-icons text-left menu_19">
										<?php themex_menu_social_icon();?>								
									</ul>									 									 								 
							</div>
						</div>					
						
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-3  col-lg-3 col-sm-1 topsr  ossos">
							<?php themex_search_code();?>

						</div>	
					</div>
				<!-- STYLE 10 Left Address Right Search = h_top_20  -->	
				<?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_20"){?>			
					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-10 col-sm-9">
							<div class="top-address text-left">
								<?php themex_top_address_option();?>
							</div>
						</div>
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-2 col-sm-3 topsr ossos">
						
							<?php themex_search_code();?>
							
						</div>	
					</div>
				<!-- STYLE 11 Left Address Right Text = h_top_21  -->		
				<?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_21"){?>						
					<div class="row h_top_21">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-6 col-lg-6 col-sm-12">
							<div class="top-address text-left">
								<?php themex_top_address_option();?>
							</div>
						</div>
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-6 col-lg-6 col-sm-12 topsr ossos">
							<div class="top-welcome">
								<p class="text-right">	
									<?php themex_top_wellcome_option();?>
								</p>
							</div>						
							
						</div>	
					</div>	
				<?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_22"){?>
					<div class="row h_top_22">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-6 col-lg-6 col-sm-12 topsr ossos">
							<div class="top-welcomet">
								<p class="text-left">	
									<?php themex_top_wellcome_option();?>
								</p>
							</div>						
							
						</div>
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-6 col-lg-6 col-sm-12">
							<div class="top-address  text-right">
								<?php themex_top_address_option();?>
							</div>
						</div>						
						
					</div>	


				<?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_23"){?>					

					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-lg-8 col-md-12 col-sm-12">
							<div class="tx_top_together">
								<div class="top-address text_m_center">
									<?php themex_top_address_option();?>
								</div>
								<div class="top-right-menu">
									<ul class="social-icons">
										<?php themex_menu_social_icon();?>								
									</ul>									 									 								 
								</div>							
							</div>								
						</div>
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-lg-4 col-md-12 col-sm-12">
							<div class="top-right-menu">							 									 								 
								<?php themex_top_menu_option(); ?>
							</div>
						</div>	
					</div>		
				<?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_24"){?>
					<div class="row text-center">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
							<div class="top-address text_m_center">
								<?php themex_top_address_option();?>
							</div>								
						</div>	
					</div>				
				
				<?php } ?>
				

				
			</div>
		</div>
    <!-- END HEADER TOP AREA -->
 
 <?php }else{
  if($txbdm_header_topa==1){?> 

 	<!-- HEADER TOP AREA -->
		<div class="themex-header-top   <?php if( $txbdm_box_menu2==2 ){echo esc_attr('container');}else{ }?>">
					
			<div class="<?php if( $txbdm_box_menu2==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); } ?>">
									
				<!-- STYLE 1 Right Side Icon = h_top_l1  -->
				 <?php if(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_l1"){?>			
					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-lg-8 col-xl-8 col-md-12 col-sm-12">
							<div class="top-address text-left">
								<?php themex_top_address_option();?>
							</div>
						</div>
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-lg-4 col-xl-4 col-md-12 col-sm-12 ">
							<div class="top-right-menu">
								<ul class="social-icons text-right text_m_center">
        							<div class="top-address">
        								<?php themex_top_opening_option();?>
        							</div>
									<?php themex_menu_social_icon();?>								
								</ul>									 									 								 
							</div>
						</div>	
					</div>		
				<!-- STYLE 2 Welcome Style 1 = h_top_l2  -->	
				 <?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_l2"){?>							
					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-lg-6 col-md-8 ">
							<div class="top-address text-left">
								<?php themex_top_address_option();?>
							</div>
						</div>
						
						<!-- TOP MIDDLE -->
						<div class="col-xs-12 col-lg-3 col-md-4">
							<div class="top-welcome">
								<p class="text-center">	
									<?php themex_top_wellcome_option();?>
									</p>
							</div>
						</div>					
						
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-lg-3 col-md-12">
							<div class="top-right-menu">
									<ul class="social-icons text-right text_m_center">
										<?php themex_menu_social_icon();?>								
									</ul>									 									 								 
							</div>
						</div>	
					</div>
				<!-- STYLE 3 Left Side Icon = h_top_l3  -->		
				 <?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_l3"){?>					
					<div class="row top-both-p0">
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-lg-3 col-xl-3 col-md-3 col-sm-12 ">
							<div class="top-right-menu">
									<ul class="social-icons text-left text_m_center">
										<?php themex_menu_social_icon();?>							
									</ul>									 									 								 
							</div>
						</div>					
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-lg-7 col-xl-9 col-md-9 col-sm-12">
							<div class="top-address text-right">
								<?php themex_top_address_option();?>
							</div>
						</div>
					</div>
					<!-- STYLE 4 Welcome Style 2 = h_top_l4  -->	
				 <?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_l4"){?>								
					<div class="row top-both-p0">
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-lg-3 col-md-12">
							<div class="top-right-menu">
									<ul class="social-icons text-left text_m_center">
										<?php themex_menu_social_icon(); ?>								
									</ul>									 									 								 
							</div>
						</div>
						<!-- TOP MIDDLE -->
						<div class="col-xs-12 col-lg-3 col-md-4">
							<div class="top-welcome">
								<p class="text-center">	
									<?php themex_top_wellcome_option();?>
									</p>
							</div>
						</div>						
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-lg-6 col-md-8 ">
							<div class="top-address text-right">
								<?php themex_top_address_option();?>
							</div>
						</div>
					</div>					
				<!-- STYLE 5 Right Side Menu= h_top_l5  -->
				 <?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_l5"){?>			
					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-lg-8 col-md-12 col-sm-12">
							<div class="top-address text-left text_m_center">
								<?php themex_top_address_option();?>
							</div>
						</div>
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-lg-4 col-md-12 col-sm-12">
							<div class="top-right-menu">							 									 								 
								<?php themex_top_menu_option(); ?>
								
							</div>
						</div>	
					</div>					
				<!-- STYLE 6 Left Side Menu= h_top_l6  -->		
				 <?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_l6"){?>					
					<div class="row top-both-p0">
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-sm-12 col-lg-4 col-md-12">
							<div class="top-right-menu">									 									 								 
									<?php themex_topleft_menu();?>
							</div>
						</div>					
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-lg-8 col-md-12 col-sm-12">
							<div class="top-address text-right text_m_center">
								<?php themex_top_address_option();?>
							</div>
						</div>
					</div>			

				<!-- STYLE 7 Middle Social Icon & Right Login = h_top_l7  -->
				 <?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_l7"){?>			
					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-9 col-sm-12 col-lg-6">
							<div class="top-address text-left menu_17">
								<?php themex_top_address_option();?>
							</div>
						</div>
						
						<!-- TOP MIDDLE -->
						<div class="col-xs-12 col-md-3 col-sm-6 col-lg-3">
							<div class="top-right-menu ">
									<ul class="social-icons text-right menu_17 text_m_right ">
										<?php themex_menu_social_icon(); ?>									
									</ul>									 									 								 
							</div>
						</div>					
						
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-12 col-sm-6 col-lg-3">
							<div class="top-address em-login text-right text_m_center">
								<p>							
									<?php themex_login();?>
									
								</p>
							</div>
						</div>	
					</div>
				<!-- STYLE 8 Opening Hours Menu with login = h_top_l8  -->	
				 <?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_l8"){?>			
					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-5 col-xl-4 col-lg-5 col-sm-7">
							<div class="top-address text-left menu_18">
								<?php themex_top_opening_option();?>
							</div>
						</div>
						
						<!-- TOP MIDDLE -->
						<div class="col-xs-12  col-md-3 col-xl-4 col-lg-4 col-sm-5">
							<div class="top-right-menu ">
									<ul class="social-icons text-center menu_18 text_s_right ">
										<?php themex_menu_social_icon(); ?>								
									</ul>									 									 								 
							</div>
						</div>					
						
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-4 col-xl-4 col-lg-3 col-sm-12">
							<div class="top-address em-login text-right menu_18 ">
								<p>							
									<?php themex_login();?>
									
								</p>
							</div>

						</div>	
					</div>
				<!-- STYLE 9 Opening Hours with Search = h_top_l9  -->
				 <?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_l9"){?>			
					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-6 col-lg-6 col-sm-7">
							<div class="top-address text-left menu_18">
								<?php themex_top_opening_option();?>
							</div>
						</div>
						
						<!-- TOP MIDDLE -->
						<div class="col-xs-12  col-md-3  col-lg-3 col-sm-4">
							<div class="top-right-menu ">
									<ul class="social-icons text-left menu_19">
										<?php themex_menu_social_icon(); ?>									
									</ul>									 									 								 
							</div>
						</div>					
						
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-3  col-lg-3 col-sm-1 topsr  ossos">
							<?php themex_search_code();?>

						</div>	
					</div>
				<!-- STYLE 10 Left Address Right Search = h_top_20  -->	
				<?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_20"){?>			
					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-10 col-sm-9">
							<div class="top-address text-left">
								<?php themex_top_address_option();?>
							</div>
						</div>
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-2 col-sm-3 topsr ossos">
						
							<?php themex_search_code();?>
							
						</div>	
					</div>
				<!-- STYLE 11 Left Address Right Text = h_top_21  -->		
				<?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_21"){?>						
					<div class="row h_top_21">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-6 col-lg-6 col-sm-12">
							<div class="top-address text-left">
								<?php themex_top_address_option();?>
							</div>
						</div>
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-6 col-lg-6 col-sm-12 topsr ossos">
							<div class="top-welcome">
									<p class="text-right">	
									<?php themex_top_wellcome_option();?>
									</p>
							</div>						
							
						</div>	
					</div>	
				<?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_22"){?>
					<div class="row h_top_22">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-6 col-lg-6 col-sm-12 topsr ossos">
							<div class="top-welcomet">
								<p class="text-left">	
									<?php themex_top_wellcome_option();?>
								</p>
							</div>						
							
						</div>
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-6 col-lg-6 col-sm-12">
							<div class="top-address  text-right">
								<?php themex_top_address_option();?>
							</div>
						</div>						
						
					</div>					
				
				<?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_23"){?>
				

					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-lg-8 col-md-12 col-sm-12">
							<div class="tx_top_together">
							<div class="top-address text_m_center">
								<?php themex_top_address_option();?>
							</div>
							
							<div class="top-right-menu">
								<ul class="social-icons">
										<?php themex_menu_social_icon(); ?>								
								</ul>									 									 								 
							</div>							
							</div>							
	
						</div>
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-lg-4 col-md-12 col-sm-12">
							<div class="top-right-menu">							 									 								 
								<?php themex_top_menu_option(); ?>
							</div>
						</div>	
					</div>		

				<?php }elseif(!empty($themex_opt['twr_top_right_layout']) && $themex_opt['twr_top_right_layout']=="h_top_24"){?>
					<div class="row text-center">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
							<div class="top-address text_m_center">
								<?php themex_top_address_option();?>
							</div>								
						</div>	
					</div>					
				
				<?php } ?>
				

				
			</div>
		</div>
    <!-- END HEADER TOP AREA -->
 
 
 
 <?php }elseif($txbdm_header_topa==2){
	 
 }else{}
	
	
}?>





<!-- HEADER TOP 2 creative AREA -->

 <?php  $toptsst = get_post_meta( get_the_ID(),'_txbdm_toptsst', true );    ?>
 <div class="tx_top2_relative">
<div class="<?php if(!empty($themex_opt['themex_header_posi_top2']) && $themex_opt['themex_header_posi_top2']==true){echo esc_attr('all_header_abs');}elseif($txbdm_toptsstas1==3){echo esc_attr('all_header_abs');}else{};?>">
 <?php


 if (!empty($themex_opt['themex_header_top_two_hide']) && $themex_opt['themex_header_top_two_hide']==true){ ?>	
	
	
<?php if(!empty($themex_opt['twr_top_two_layout']) && $themex_opt['twr_top_two_layout']=="h_top_2"){?>		

			<div class="themex_header_top_two top_cr_style1 top_crt_style  <?php if(!empty($themex_opt['themex_box_layouttwo']) && $themex_opt['themex_box_layouttwo']=="htopt_boxi"){echo esc_attr('container');}else{ }?>">
				<div class="<?php if(!empty($themex_opt['themex_box_layouttwo']) && $themex_opt['themex_box_layouttwo']=="htopt_full"){echo esc_attr('containerss-fluid');}else{ echo esc_attr('container'); }?>">
					<div class="row">
						<!-- CREATIVE HEADER LOGO -->
						<div class="col-xl-4 col-lg-12 col-sm-12 d_md_none col-md-6">
							<div class="theme_cr_logo">						
							<?php themex_main_logo(); ?>
							</div>
						</div>			
						<div class="col-xl-3 col-lg-4 col-sm-12  col-md-6">
								<?php themex_top_craddress1_option();?>
						</div>			
						<div class="col-xl-3 col-lg-4 col-sm-12  col-md-6">
							<?php themex_top_craddress2_option();?>
						</div>			
						<div class="col-xl-2 col-lg-4 col-sm-12  col-md-12">
								<?php themex_top_craddress_button();?>

						</div>								
					</div>
				</div>
			</div>


<?php }elseif(!empty($themex_opt['twr_top_two_layout']) && $themex_opt['twr_top_two_layout']=="h_top_3"){?>			
	
	<div class="themex_header_top_two top_cr_style2 top_crt_style  <?php if(!empty($themex_opt['themex_box_layouttwo']) && $themex_opt['themex_box_layouttwo']=="htopt_boxi"){echo esc_attr('container');}else{ }?>">
		<div class="<?php if(!empty($themex_opt['themex_box_layouttwo']) && $themex_opt['themex_box_layouttwo']=="htopt_full"){echo esc_attr('containerss-fluid');}else{ echo esc_attr('container'); }?>">
					<div class="row">
						<!-- CREATIVE HEADER LOGO -->
						<div class="col-xl-4 col-lg-12 col-sm-12 d_md_none col-md-6">
							<div class="theme_cr_logo">						
							<?php themex_main_logo(); ?>
							</div>
						</div>			
						<div class="col-xl-3 col-lg-4 col-sm-12  col-md-6">
							<?php themex_top_craddress1_option();?>
						</div>			
						<div class="col-xl-3 col-lg-4 col-sm-12  col-md-6">
								<?php themex_top_craddress2_option();?>
						</div>			
						<div class="col-xl-2 col-lg-4 col-sm-12  col-md-12">
							<div class="top_crl_menu">							 									 								 
								<?php themex_top_crmenu_option();?>
							</div>
						</div>								
					</div>
				</div>
			</div>


<?php }elseif(!empty($themex_opt['twr_top_two_layout']) && $themex_opt['twr_top_two_layout']=="h_top_4"){?>
		
		<div class="themex_header_top_two top_cr_style3 top_crt_style  <?php if(!empty($themex_opt['themex_box_layouttwo']) && $themex_opt['themex_box_layouttwo']=="htopt_boxi"){echo esc_attr('container');}else{ }?>">
		<div class="<?php if(!empty($themex_opt['themex_box_layouttwo']) && $themex_opt['themex_box_layouttwo']=="htopt_full"){echo esc_attr('containerss-fluid');}else{ echo esc_attr('container'); }?>">
					<div class="row">
						<!-- CREATIVE HEADER LOGO -->
						<div class="col-xl-3 col-lg-3 col-sm-12 d_md_none col-md-4">
							<div class="theme_cr_logo">						
							<?php themex_main_logo(); ?>
							</div>
						</div>			
						<div class="col-xl-3 col-lg-3 col-sm-12  col-md-4">
								<?php themex_top_craddress1_option();?>
						</div>			
						<div class="col-xl-3 col-lg-3 col-sm-12  col-md-4">
								<?php themex_top_craddress2_option();?>
						</div>			
						<div class="col-xl-3 col-lg-3 col-sm-12  col-md-4">
							<div class="top_crmenu_icon">
								<ul class="top_crmenu_i_list text-right text_m_center">
										<?php themex_menu_social_icon(); ?>									
								</ul>									 									 								 
							</div>
						</div>								
					</div>
				</div>
			</div>

<?php }elseif(!empty($themex_opt['twr_top_two_layout']) && $themex_opt['twr_top_two_layout']=="h_top_5"){?>
	
	<div class="themex_header_top_two top_cr_style4 top_crt_style  <?php if(!empty($themex_opt['themex_box_layouttwo']) && $themex_opt['themex_box_layouttwo']=="htopt_boxi"){echo esc_attr('container');}else{ }?>">
		<div class="<?php if(!empty($themex_opt['themex_box_layouttwo']) && $themex_opt['themex_box_layouttwo']=="htopt_full"){echo esc_attr('containerss-fluid');}else{ echo esc_attr('container'); }?>">
					<div class="row">
						<div class=" col-lg-12 d_md_none d_main_none d_lg_none">
							<div class="theme_cr_logo text-center">						
							<?php themex_main_logo(); ?>
							</div>
						</div>						
						<div class="col-xl-4 col-lg-3 col-sm-12  col-md-5">
							<div class="top_crmenu_icon">
								<ul class="top_crmenu_i_list text-left">
										<?php themex_menu_social_icon(); ?>									
								</ul>									 									 								 
							</div>
						</div>		
						<div class="col-xl-3 col-lg-3 col-sm-12 d_md_none d_lg_none col-md-6">
							<div class="theme_cr_logo text-center">						
							<?php themex_main_logo(); ?>
							</div>
						</div>						
						<div class="col-xl-5 col-lg-6 col-sm-12  col-md-7">
							<div class="top-address cr_top_addess">
								<?php themex_top_craddress3_option();?>
							</div>
						</div>								
					</div>
				</div>
			</div>

<?php }elseif(!empty($themex_opt['twr_top_two_layout']) && $themex_opt['twr_top_two_layout']=="h_top_6"){?>
		
		<div class="themex_header_top_two top_cr_style5 top_crt_style  <?php if(!empty($themex_opt['themex_box_layouttwo']) && $themex_opt['themex_box_layouttwo']=="htopt_boxi"){echo esc_attr('container');}else{ }?>">
		<div class="<?php if(!empty($themex_opt['themex_box_layouttwo']) && $themex_opt['themex_box_layouttwo']=="htopt_full"){echo esc_attr('containerss-fluid');}else{ echo esc_attr('container'); }?>">
					<div class="row">
						<!-- CREATIVE HEADER LOGO -->
						<div class="col-xl-3 col-lg-12 col-sm-12 d_md_none col-md-6">
							<div class="theme_cr_logo">						
							<?php themex_main_logo(); ?>
							</div>
						</div>			
						<div class="col-xl-3 col-lg-4 col-sm-12  col-md-4">
								<?php themex_top_craddress1_option();?>
						</div>			
						<div class="col-xl-3 col-lg-4 col-sm-12  col-md-4">
								<?php themex_top_craddress2_option();?>
						</div>			
						<div class="col-xl-3 col-lg-4 col-sm-12  col-md-4">
								<?php themex_top_craddress4_option();?>
						</div>								
					</div>
				</div>
			</div>


<?php }elseif(!empty($themex_opt['twr_top_two_layout']) && $themex_opt['twr_top_two_layout']=="h_top_7"){?>			
	
	<!-- CREATIVE HEADER STYLE -->
	<div class="top_crt_style top_cr_style6 <?php if(!empty($themex_opt['themex_box_layouttwo']) && $themex_opt['themex_box_layouttwo']=="htopt_boxi"){echo esc_attr('container');}else{ }?>">
		<div class="<?php if(!empty($themex_opt['themex_box_layouttwo']) && $themex_opt['themex_box_layouttwo']=="htopt_full"){echo esc_attr('containerss-fluid');}else{ echo esc_attr('container'); }?>">
			<div class="row">
				<!-- CREATIVE HEADER LOGO -->
				<div class="col-md-3 col-xl-2 col-lg-12 col-sm-12 d_md_none col-xs-12">
					<div class="creative_header_logo">
						<div class="creative_logo_thumb">
							<?php themex_main_logo(); ?>
						</div>
					</div>
				</div>
				<!-- CREATIVE HEADER ADDRESS -->
				<div class="col-md-12 col-xl-8 col-lg-9  col-xs-12">
					<div class="row creative_header_address">
							<div class="col-lg-4  col-md-4 col-sm-12 col-xs-12">
								<?php themex_top_craddress1_option();?>
							</div>
							<div class="col-lg-4  col-md-4 col-sm-12 col-xs-12">
								<?php themex_top_craddress2_option();?>
							</div>
							<div class="col-lg-4  col-md-4 col-sm-12 col-xs-12">
								<?php themex_top_craddress4_option();?>
							</div>
							
					
					</div>
				</div>
				
				<!-- CREATIVE HEADER BUTTON -->
				<div class="col-md-12 col-xl-2 col-lg-3  col-xs-12">
						<?php themex_top_craddress2_button();?>				
				</div>
			</div>
		</div>

	</div>

<?php }elseif(!empty($themex_opt['twr_top_two_layout']) && $themex_opt['twr_top_two_layout']=="h_top_8"){?>
			<!-- woo custom creative menu menu -- -->
			<div class="themex_header_top_two top_cr_style1 top_crt_style  <?php if(!empty($themex_opt['themex_box_layouttwo']) && $themex_opt['themex_box_layouttwo']=="htopt_boxi"){echo esc_attr('container');}else{ }?>">
				<div class="<?php if(!empty($themex_opt['themex_box_layouttwo']) && $themex_opt['themex_box_layouttwo']=="htopt_full"){echo esc_attr('containerss-fluid');}else{ echo esc_attr('container'); }?>">
					<div class="row">
						<!-- CREATIVE HEADER LOGO -->
						<div class="col-xl-4 col-lg-12 col-sm-12 d_md_none col-md-6">
							<div class="theme_cr_logo">						
							<?php themex_main_logo(); ?>
							</div>
						</div>			
						<div class="col-xl-3 col-lg-4 col-sm-12  col-md-5">
								<?php themex_top_craddress1_option();?>
						</div>			
						<div class="col-xl-3 col-lg-4 col-sm-12  col-md-5">
								<?php themex_top_craddress2_option();?>
						</div>			
						<div class="col-xl-2 col-lg-4 col-sm-12  col-md-2">
						<?php if( class_exists( 'WooCommerce' ) ) { themex_mini_shop_output(); } ?>						
						</div>								
					</div>
				</div>
			</div>
			
<?php }elseif(!empty($themex_opt['twr_top_two_layout']) && $themex_opt['twr_top_two_layout']=="h_top_9"){?>
	
	<div class="themex_header_top_two top_cr_style4 top_crt_style  <?php if(!empty($themex_opt['themex_box_layouttwo']) && $themex_opt['themex_box_layouttwo']=="htopt_boxi"){echo esc_attr('container');}else{ }?>">
		<div class="<?php if(!empty($themex_opt['themex_box_layouttwo']) && $themex_opt['themex_box_layouttwo']=="htopt_full"){echo esc_attr('containerss-fluid');}else{ echo esc_attr('container'); }?>">
					<div class="row">
						<div class=" col-lg-12 d_md_none d_main_none d_lg_none">
							<div class="theme_cr_logo text-center">						
							<?php themex_main_logo(); ?>
							</div>
						</div>						
						<div class="col-xl-4 col-lg-4 col-sm-12 col-md-5 tx_top_together">
							<div class="top_crmenu_icon">
								<ul class="top_crmenu_i_list text-left">
										<?php themex_menu_social_icon(); ?>									
								</ul>									 									 								 
							</div>
							<div class="top_crl_menu margin_l30">							 									 								 
								<?php themex_top_crmenu_option();?>
							</div>							
						</div>		
						<div class="col-xl-3 col-lg-3 col-sm-12 d_md_none d_lg_none col-md-6">
							<div class="theme_cr_logo text-center">						
							<?php themex_main_logo(); ?>
							</div>
						</div>						
						<div class="col-xl-5 col-lg-5 col-sm-12  col-md-7">
							<div class="top-address cr_top_addess">
								<?php themex_top_craddress3_option();?>
							</div>
						</div>								
					</div>
				</div>
			</div>			
					
	<!-- end  custom creative menu menu -- -->
	
<?php } ?>

<?php }else{
	 
 if($toptsst==1){?> 
 
	
<?php if(!empty($themex_opt['twr_top_two_layout']) && $themex_opt['twr_top_two_layout']=="h_top_2"){?>		

			<div class="themex_header_top_two top_cr_style1 top_crt_style  <?php if( $txbdm_box_menu3==2 ){echo esc_attr('container');}else{ }?>">
				<div class="<?php if( $txbdm_box_menu3==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); } ?>">
					<div class="row">
						<!-- CREATIVE HEADER LOGO -->
						<div class="col-xl-4 col-lg-12 col-sm-12 d_md_none col-md-6">
							<div class="theme_cr_logo">						
							<?php themex_main_logo(); ?>
							</div>
						</div>			
						<div class="col-xl-3 col-lg-4 col-sm-12  col-md-6">
								<?php themex_top_craddress1_option();?>
						</div>			
						<div class="col-xl-3 col-lg-4 col-sm-12  col-md-6">
								<?php themex_top_craddress2_option();?>
						</div>			
						<div class="col-xl-2 col-lg-4 col-sm-12  col-md-12">
							<?php themex_top_craddress_button();?>						

						</div>								
					</div>
				</div>
			</div>


<?php }elseif(!empty($themex_opt['twr_top_two_layout']) && $themex_opt['twr_top_two_layout']=="h_top_3"){?>			
	
	<div class="themex_header_top_two top_cr_style2 top_crt_style  <?php if( $txbdm_box_menu3==2 ){echo esc_attr('container');}else{ }?>">
		<div class="<?php if( $txbdm_box_menu3==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); } ?>">
					<div class="row">
						<!-- CREATIVE HEADER LOGO -->
						<div class="col-xl-4 col-lg-12 col-sm-12 d_md_none col-md-6">
							<div class="theme_cr_logo">						
							<?php themex_main_logo(); ?>
							</div>
						</div>			
						<div class="col-xl-3 col-lg-4 col-sm-12  col-md-6">
								<?php themex_top_craddress1_option();?>
						</div>			
						<div class="col-xl-3 col-lg-4 col-sm-12  col-md-6">
								<?php themex_top_craddress2_option();?>
						</div>			
						<div class="col-xl-2 col-lg-4 col-sm-12  col-md-12">
							<div class="top_crl_menu">							 									 								 
								<?php themex_top_crmenu_option();?>
							</div>
						</div>								
					</div>
				</div>
			</div>


<?php }elseif(!empty($themex_opt['twr_top_two_layout']) && $themex_opt['twr_top_two_layout']=="h_top_4"){?>
		
		<div class="themex_header_top_two top_cr_style3 top_crt_style  <?php if( $txbdm_box_menu3==2 ){echo esc_attr('container');}else{ }?>">
		<div class="<?php if( $txbdm_box_menu3==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); } ?>">
					<div class="row">
						<!-- CREATIVE HEADER LOGO -->
						<div class="col-xl-3 col-lg-3 col-sm-12 d_md_none col-md-4">
							<div class="theme_cr_logo">						
							<?php themex_main_logo(); ?>
							</div>
						</div>			
						<div class="col-xl-3 col-lg-3 col-sm-12  col-md-4">
								<?php themex_top_craddress1_option();?>
						</div>			
						<div class="col-xl-3 col-lg-3 col-sm-12  col-md-4">
								<?php themex_top_craddress2_option();?>
						</div>			
						<div class="col-xl-3 col-lg-3 col-sm-12  col-md-4">
							<div class="top_crmenu_icon">
								<ul class="top_crmenu_i_list text-right text_m_center">
										<?php themex_menu_social_icon(); ?>									
								</ul>									 									 								 
							</div>
						</div>								
					</div>
				</div>
			</div>

<?php }elseif(!empty($themex_opt['twr_top_two_layout']) && $themex_opt['twr_top_two_layout']=="h_top_5"){?>
	
	<div class="themex_header_top_two top_cr_style4 top_crt_style    <?php if( $txbdm_box_menu3==2 ){echo esc_attr('container');}else{ }?>">
		<div class="<?php if( $txbdm_box_menu3==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); } ?>">
					<div class="row">
						<div class=" col-lg-12 d_md_none d_main_none d_lg_block">
							<div class="theme_cr_logo text-center">						
							<?php themex_main_logo(); ?>
							</div>
						</div>						
						<div class="col-xl-4 col-lg-3 col-sm-12  col-md-5">
							<div class="top_crmenu_icon">
								<ul class="top_crmenu_i_list text-left text_m_center">
										<?php themex_menu_social_icon(); ?>									
								</ul>									 									 								 
							</div>
						</div>		
						<div class="col-xl-3 col-lg-3 col-sm-12 d_md_none d_lg_none col-md-6">
							<div class="theme_cr_logo text-center">						
							<?php themex_main_logo(); ?>
							</div>
						</div>						
						<div class="col-xl-5 col-lg-6 col-sm-12  col-md-7">
							<div class="top-address cr_top_addess">
								<?php themex_top_craddress3_option();?>
							</div>
						</div>								
					</div>
				</div>
			</div>

<?php }elseif(!empty($themex_opt['twr_top_two_layout']) && $themex_opt['twr_top_two_layout']=="h_top_6"){?>
		
		<div class="themex_header_top_two top_cr_style5 top_crt_style    <?php if( $txbdm_box_menu3==2 ){echo esc_attr('container');}else{ }?>">
		<div class="<?php if( $txbdm_box_menu3==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); } ?>">
					<div class="row">
						<!-- CREATIVE HEADER LOGO -->
						<div class="col-xl-3 col-lg-12 col-sm-12 d_md_none col-md-6">
							<div class="theme_cr_logo">						
							<?php themex_main_logo(); ?>
							</div>
						</div>			
						<div class="col-xl-3 col-lg-4 col-sm-12  col-md-4">
								<?php themex_top_craddress1_option();?>
						</div>			
						<div class="col-xl-3 col-lg-4 col-sm-12  col-md-4">
								<?php themex_top_craddress1_option();?>
						</div>			
						<div class="col-xl-3 col-lg-4 col-sm-12  col-md-4">
								<?php themex_top_craddress4_option();?>
						</div>								
					</div>
				</div>
			</div>


<?php }elseif(!empty($themex_opt['twr_top_two_layout']) && $themex_opt['twr_top_two_layout']=="h_top_7"){?>			
	
	<!-- CREATIVE HEADER STYLE -->
	<div class="top_crt_style top_cr_style6   <?php if( $txbdm_box_menu3==2 ){echo esc_attr('container');}else{ }?>">
		<div class="<?php if( $txbdm_box_menu3==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); } ?>">
			<div class="row">
				<!-- CREATIVE HEADER LOGO -->
				<div class="col-md-3 col-xl-2 col-lg-12 col-sm-12 d_md_none col-xs-12">
					<div class="creative_header_logo">
						<div class="creative_logo_thumb">
							<?php themex_main_logo(); ?>
						</div>
					</div>
				</div>
				<!-- CREATIVE HEADER ADDRESS -->
				<div class="col-md-12 col-xl-8 col-lg-9  col-xs-12">
					<div class="row creative_header_address">
							<div class="col-lg-4  col-md-4 col-sm-12 col-xs-12">
								<?php themex_top_craddress1_option();?>
							</div>
							<div class="col-lg-4  col-md-4 col-sm-12 col-xs-12">
								<?php themex_top_craddress2_option();?>
							</div>
							<div class="col-lg-4  col-md-4 col-sm-12 col-xs-12">
								<?php themex_top_craddress4_option();?>
							</div>
							
					
					</div>
				</div>
				
				<!-- CREATIVE HEADER BUTTON -->
				<div class="col-md-12 col-xl-2 col-lg-3  col-xs-12">
					<?php themex_top_craddress2_button();?>				
				</div>
			</div>
		</div>

	</div>

<?php }elseif(!empty($themex_opt['twr_top_two_layout']) && $themex_opt['twr_top_two_layout']=="h_top_8"){?>
			<!--  woo custom creative menu menu -- -->
	
			<div class="themex_header_top_two top_cr_style1 top_crt_style    <?php if( $txbdm_box_menu3==2 ){echo esc_attr('container');}else{ }?>">
				<div class="<?php if( $txbdm_box_menu3==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); } ?>">
					<div class="row">
						<!-- CREATIVE HEADER LOGO -->
						<div class="col-xl-4 col-lg-12 col-sm-12 d_md_none col-md-6">
							<div class="theme_cr_logo">						
							<?php themex_main_logo(); ?>
							</div>
						</div>			
						<div class="col-xl-3 col-lg-4 col-sm-12  col-md-5">
								<?php themex_top_craddress1_option();?>
						</div>			
						<div class="col-xl-3 col-lg-4 col-sm-12  col-md-5">
							<?php themex_top_craddress2_option();?>
						</div>			
						<div class="col-xl-2 col-lg-4 col-sm-12  col-md-2">
							<?php if( class_exists( 'WooCommerce' ) ) { themex_mini_shop_output(); } ?>					
						</div>								
					</div>
				</div>
			</div>
			
			
	<?php }elseif(!empty($themex_opt['twr_top_two_layout']) && $themex_opt['twr_top_two_layout']=="h_top_9"){?>
			<!--  woo custom creative menu menu -- -->
	
			<div class="themex_header_top_two top_cr_style1 top_crt_style    <?php if( $txbdm_box_menu3==2 ){echo esc_attr('container');}else{ }?>">
				<div class="<?php if( $txbdm_box_menu3==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); } ?>">			
					<div class="row">
						<div class=" col-lg-12 d_md_none d_main_none d_lg_none">
							<div class="theme_cr_logo text-center">						
							<?php themex_main_logo(); ?>
							</div>
						</div>						
						<div class="col-xl-4 col-lg-4 col-sm-12 col-md-5 tx_top_together">
							<div class="top_crmenu_icon">
								<ul class="top_crmenu_i_list text-left">
									<?php themex_menu_social_icon();?>							
								</ul>									 									 								 
							</div>
							<div class="top_crl_menu margin_l30">							 									 								 
								<?php themex_top_crmenu_option();?>
							</div>							
						</div>		
						<div class="col-xl-3 col-lg-3 col-sm-12 d_md_none d_lg_none col-md-6">
							<div class="theme_cr_logo text-center">						
							<?php themex_main_logo(); ?>
							</div>
						</div>						
						<div class="col-xl-5 col-lg-5 col-sm-12  col-md-7">
							<div class="top-address cr_top_addess">
								<?php themex_top_craddress3_option();?>
							</div>
						</div>								
					</div>			
				</div>
			</div>			
			
			
			
	<!-- end  custom creative menu menu -- -->
	
	


<?php }}elseif($toptsst==2){ 
	
 }else{}  
	 
}?>	











 
 

<div class="mobile_logo_area hidden-md hidden-lg">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php themex_mobile_top_logo(); ?>
			</div>
		</div>
	</div>

</div>

<!-- HEADER MAIN MENU AREA -->

  <?php  $twr_menu_header_style = get_post_meta( get_the_ID(),'_txbdm_menu_header_style', true ); ?>
  <?php  $twr_logo_menu_style = get_post_meta( get_the_ID(),'_txbdm_logo_menu_style', true ); ?>

  
 <div class="tx_relative_m">
<div class="<?php if(!empty($themex_opt['themex_header_posi_top3']) && $themex_opt['themex_header_posi_top3']==true){echo esc_attr('all_header_abs');}elseif($txbdm_toptsstas1==4){echo esc_attr('all_header_abs');}else{};?>">  
<div class="mainmenu_width_tx  <?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenul_boxi"){echo esc_attr('container');}elseif($txbdm_box_menu==2){echo esc_attr('container');}else{};?>">
	 <!-- Header Default Menu = 1 redux  -->
   <?php if(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==1 ){?>
 	<div class="themex-main-menu hidden-xs hidden-sm witr_h_h1">
		<div class="themex_nav_area">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
			
				 <?php if(!empty($themex_opt['themex_main_menu_layout']) && $themex_opt['themex_main_menu_layout']=="m_menu_1"){?>			
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-lg-9  col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
				 <?php }elseif(!empty($themex_opt['themex_main_menu_layout']) && $themex_opt['themex_main_menu_layout']=="m_menu_2"){?>		
				
				<div class="row logo-right">				
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">
							<?php themex_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
				</div><!-- END ROW -->		
				<?php }elseif(!empty($themex_opt['themex_main_menu_layout']) && $themex_opt['themex_main_menu_layout']=="m_menu_3"){?>	
				<div class="row logo-top">					
					<!-- LOGO -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->						
					<!-- MAIN MENU -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<nav class="themex_menu">
							<?php themex_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->							
				<?php }else{?>
					
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->						
					
				<?php } ?>
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	


	 <!-- Header Transparent Menu = 2 redux  -->
   <?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==2 ){?>
   
 	<div class="themex-main-menu hidden-xs hidden-sm transprent-menu heading_style_4 witr_h_h2">
		<div class="trp_nav_area">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
				
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_ts_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>
							
							<?php if (!empty($themex_opt['themex_header_button'])): ?>
								<div class="donate-btn-header">
									<a class="dtbtn" href="<?php if (!empty($themex_opt['themex_header_button_url'])){echo esc_url($themex_opt['themex_header_button_url']);}?>">
										<?php echo wp_kses($themex_opt['themex_header_button'], array(
											'i' => array(
												'class' =>array()
											),
										));?>	
									</a>	
								</div>	
							<?php endif; ?>								
							
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	

	<!-- Header Transparent With Sticky Menu  = 3 redux  -->
   <?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==3 ){?>
 
 	<div class="themex-main-menu one_page menu4 hidden-xs hidden-sm transprent-menu heading_style_5  witr_h_h3">
		<div class="themex_nav_area scroll_fixed bdbar">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_ts_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>
							
							<?php if (!empty($themex_opt['themex_header_button'])): ?>
								<div class="donate-btn-header">
									<a class="dtbtn" href="<?php if (!empty($themex_opt['themex_header_button_url'])){echo esc_url($themex_opt['themex_header_button_url']);}?>">
										<?php echo wp_kses($themex_opt['themex_header_button'], array(
											'i' => array(
												'class' =>array()
											),
										));?>	
									</a>	
								</div>	
							<?php endif; ?>								
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	



   <!-- Header One Page Menu = 4 redux  -->
  <?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==4 ){?>
  
 	<div class="themex-main-menu one_page hidden-xs hidden-sm  witr_h_h4">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
				
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_onepage_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_one_page_menu(); ?>
							<!-- menu button -->
							<?php themex_menu_button();?>								
							
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
	
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
	
	 <!-- Header One Page Transparent Menu  = 5 redux  -->
    <?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==5 ){?>
 
 	<div class="themex-main-menu hidden-xs hidden-sm one_page transprent-menu heading_style_3  witr_h_h5">
		<div class="trp_nav_area">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
			
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_ts_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_one_page_menu(); ?>
							<!-- menu button -->
								<?php themex_menu_button();?>								
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	


			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
	
	
	<!-- Header One Page Transparent With Sticky  Menu  = 6 redux  -->
    <?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==6 ){?> 
	
 	<div class="themex-main-menu one_page menu4 hidden-xs hidden-sm transprent-menu heading_style_2  witr_h_h6">
		<div class="themex_nav_area scroll_fixed bdbar">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
					
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_ts_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_one_page_menu(); ?>
							<!-- menu button -->
								<?php themex_menu_button();?>								
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	

				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	


	<!-- Header Default with Sticky Menu = 7 redux  -->
    <?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==7 ){?>  

 	<div class="themex-main-menu one_page hidden-xs hidden-sm  witr_h_h7">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
				 <?php if(!empty($themex_opt['themex_main_menu_layout']) && $themex_opt['themex_main_menu_layout']=="m_menu_1"){?>	
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>							
							<!-- menu button -->
								<?php themex_menu_button();?>								
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
				<?php }elseif(!empty($themex_opt['themex_main_menu_layout']) && $themex_opt['themex_main_menu_layout']=="m_menu_2"){?>
				<div class="row logo-right">				

					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>
								<!-- menu button -->
								<?php themex_menu_button();?>								
						</nav>				
					</div>
					<!-- END MAIN MENU -->
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->					
					
				</div> <!-- END ROW -->					
				<?php }elseif(!empty($themex_opt['themex_main_menu_layout']) && $themex_opt['themex_main_menu_layout']=="m_menu_3"){?>
				<div class="row logo-top">				
					<!-- LOGO -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>
							<!-- menu button -->
								<?php themex_menu_button();?>								
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
				<?php }else{?>	
				
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>
							
							<!-- menu button -->
								<?php themex_menu_button();?>								
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->					
				
				<?php } ?>	

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
				

	<!-- Header Menu With Search = 8 redux  -->
    <?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==8 ){?>  

 	<div class="themex-main-menu one_page hidden-xs hidden-sm  witr_h_h8">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
					
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu nologo_menu13 main-search-menu">						
							<?php themex_main_menu(); ?>
							<?php themex_search_code(); ?>																			
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
			
			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	

	
	<!-- Header Menu With Social Icon = 9 redux  -->
    <?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==9 ){?>  

 	<div class="themex-main-menu one_page hidden-xs hidden-sm  witr_h_h9">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
						
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>
								<div class="footer-social-icon htop-menu-s">					
									<?php themex_topmenu_social_icon();?>
								</div>
								<!-- menu button -->
								<?php themex_menu_button();?>											
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->						
					
		
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	

	
	<!-- Header Menu With Button = 10 redux  -->
    <?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==10 ){?>  

 	<div class="themex-main-menu one_page hidden-xs hidden-sm  witr_h_h10">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>
							<!-- menu button -->
								<?php themex_menu_button();?>		
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->						
					
				
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	

	
	<!-- Header Menu With Button headroom Menu = 11 redux  -->
    <?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==11 ){?>  

 	<div class="themex-main-menu hidden-xs hidden-sm one_page header--fixed headrooma  witr_h_h11">
		<div class="themex_nav_area">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
					
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_onepage_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_one_page_menu(); ?>
							<!-- menu button -->
								<?php themex_menu_button();?>	
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->						
					
		
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>		
	
	
	<!-- Header Menu With Search and no Logo = 12 redux  -->
    <?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==12 ){?>  

 	<div class="themex-main-menu one_page hidden-xs hidden-sm  witr_h_h12">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
	
				<div class="row no-logo-sr">				
					<!-- MAIN MENU -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<nav class="themex_menu creative_header_menu">						
							<?php themex_main_menu(); ?>
							<div class="tx_bs_together">
								<div class="creative_search_icon">
									<?php themex_search_code(); ?>
								</div>
								<!-- menu button -->
								<?php themex_menu_button();?>	
							</div>			
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->						

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
	
	
	<!-- Header Transparent Sticky No logo Menu  = 13 redux  -->
   <?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==13 ){?>
 
 	<div class="themex-main-menu one_page menu4 hidden-xs hidden-sm transprent-menu heading_style_5  witr_h_h13">
		<div class="themex_nav_area scroll_fixed bdbar">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
		
				<div class="row no-logo-sr">				
					<!-- MAIN MENU -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<nav class="themex_menu nologo_menu13">						
							<?php themex_main_menu(); ?>
								<div class="tx_bs_together">
									<div class="creative_search_icon">
										<?php themex_search_code(); ?>
									</div>
									<!-- menu button -->
								<?php themex_menu_button();?>	
								</div>								
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	

	
	<!--Header One Page With Search Menu = 14 redux  -->
 	<?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==14 ){?>
 
 	<div class="themex-main-menu one_page hidden-xs hidden-sm  witr_h_h14">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
					
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_one_page_menu(); ?>
							<?php themex_search_code(); ?>	
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->						


			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	


	<!-- header mini shop menu  = 15 redux  -->
 	<?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==15 ){?>
 
 	<div class="themex-main-menu hidden-xs hidden-sm  witr_h_h15">
		<div class="themex_nav_area">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-2 col-sm-2 col-xs-2">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-10 col-sm-10 col-xs-10 tx_menu_together">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>
						</nav>				
						<!-- END MAIN MENU -->
						<!-- Woo Icon cart -->
						<?php if( class_exists( 'WooCommerce' ) ) { themex_mini_shop_output(); } ?>
						<!-- menu button -->
						<?php themex_menu_button();?>	

						
					</div>
					</div><!-- END ROW -->		
				</div> 	<!-- END CONTAINER -->			
					
			</div> 	
		</div>  <!-- END AREA -->				
	
	<!-- 16 Header Hamburgers Menu = 16 redux -->
    <?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==16 ){?>	

 	<div class="themex-main-menu hidden-xs hidden-sm transprent-menu heading_style_4  witr_h_h16">
		<div class="trp_nav_area">		
		
		
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
		
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_ts_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 hmer col-xs-8">
					
						<button class="hamburger hamburger--slider" type="button">
						  <span class="hamburger-box">
							<span class="hamburger-inner"></span>
						  </span>
						</button>					
					
					
						<nav class="themex_menu dvrm">						
							<?php themex_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	

				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
		

		<!-- Header Box style menu   = 17 redux  -->	
	<?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==17 ){?>
   
 	<div class="themex-main-menu hidden-xs hidden-sm transprent-menu heading_style_17 witr_h_h2">
		<div class="trp_nav_area hmenu_box_style container">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
				
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_main_menu();?>
						</nav>	
						<?php themex_menu_button();?>		
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
	

	<!-- 18 No Logo,Search, Mini Shop Button = 18 redux  -->
 	<?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==18 ){?>
 
 	<div class="themex-main-menu hidden-xs hidden-sm one_page witr_h_h18">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
				<div class="row align_item_center">				
						
						<!-- MAIN MENU -->
						<div class="col-md-8 col-sm-8 col-xs-8">
							<nav class="themex_menu">						
								<?php themex_main_menu(); ?>
							</nav>				
						</div>
						<!-- END MAIN MENU -->
						<div class="col-md-4 col-sm-4">
							<div class=" tx_mmenu_together">						
								<div class="main-search-menu">						
									<?php themex_search_code(); ?>																			
								</div>
								<!-- Woo Icon cart -->
								<?php if( class_exists( 'WooCommerce' ) ) { themex_mini_shop_output(); } ?>
								<!-- menu button -->
								<?php themex_menu_button();?>										
							</div>	
						</div>
				</div><!-- END ROW -->		
			</div> 	<!-- END CONTAINER -->			
					
		</div> 	
	</div>  <!-- END AREA -->	
	
	<!-- 9 Left Logo,Right Search, Mini Shop Button  = 19 redux  -->
 	<?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==19 ){?>
 
 	<div class="themex-main-menu hidden-xs hidden-sm one_page witr_h_h19">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
				<div class="row logo-left">								
					<!-- LOGO -->
					<div class="col-md-2 col-sm-2 col-xs-2">
						<?php themex_main_logo(); ?>
					</div>						
						<!-- MAIN MENU -->
						<div class="col-md-10 col-sm-10 col-xs-10 tx_menu_together">
							<nav class="themex_menu">						
								<?php themex_main_menu(); ?>
							</nav>				
					

							<div class=" tx_mmenu_together">						
								<div class="main-search-menu">						
									<?php themex_search_code(); ?>																			
								</div>
								<!-- Woo Icon cart -->
								<?php if( class_exists( 'WooCommerce' ) ) { themex_mini_shop_output(); } ?>										
							</div>				

						</div>
				</div><!-- END ROW -->		
			</div> 	<!-- END CONTAINER -->			
					
		</div> 	
	</div>  <!-- END AREA -->	

	<!-- 20 Left Logo,Right Search,Popup Menu,Button = 20 redux  -->
    <?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==20 ){?>  

 	<div class="themex-main-menu one_page hidden-xs hidden-sm witr_search_wh  witr_h_h20">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
					
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<div class="tx_mmenu_together">
							<nav class="themex_menu nologo_menu13">						
								<?php themex_main_menu(); ?>																										
							</nav>
							<div class="main-search-menu">						
								<?php themex_search_code(); ?>																			
							</div>
							<?php if ( is_active_sidebar( 'sidebar-pop' ) ) { ?>
								<div class="menu_popup_option">
									<?php themex_right_side_menu(); ?>
								</div>
							<?php  }?>
							<!-- menu button -->
								<?php themex_menu_button();?>	
						
						</div>
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
			
			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>
	
	
	<!-- 21 No Logo,Right Search,Popup Menu,Button = 21 redux  -->
    <?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==21 ){?>  

 	<div class="themex-main-menu one_page hidden-xs hidden-sm witr_search_wh sb_popup  witr_h_h21">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
					
				<div class="row">				
					
					<!-- MAIN MENU -->
					<div class="col-md-12">
						<div class="tx_mmenu_together">
							<nav class="themex_menu nologo_menu13">						
								<?php themex_main_menu(); ?>																										
							</nav>
							
							<div class="search_popup_button">						
								<div class="main-search-menu">						
									<?php themex_search_code(); ?>																			
								</div>
								<?php if ( is_active_sidebar( 'sidebar-pop' ) ) { ?>
									<div class="menu_popup_option">
										<?php themex_right_side_menu(); ?>
									</div>
								<?php  }?>
								
								<!-- menu button -->
								<?php themex_menu_button();?>		
						
							</div>
						</div>
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
			
			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
	
	<!-- 22 left Logo,Center Menu,Search And Right Address = 22 redux  -->
    <?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==22 ){?>  

 	<div class="themex-main-menu one_page hidden-xs hidden-sm  witr_h_h22">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<div class="number_align">
							<nav class="themex_menu menu_search">						
								<?php themex_main_menu(); ?>
								<?php themex_search_code(); ?>
							</nav>							
							<div class="main_menu_address_a">										
								<div class="main_menu_header_icon">										
									<?php echo wp_kses($themex_opt['main_menu_icon'], array(
										'i' => array(
											'class' =>array()
										),
									));?>
								</div>						
								<div class="main_menu_header_address_text">						
								<?php if (!empty($themex_opt['main_menu_top_title'])): ?>										
										<h3><?php echo esc_html($themex_opt['main_menu_top_title']); ?></h3>
								<?php endif; ?>	
								<?php if (!empty($themex_opt['main_menu_number'])): ?>
									<h4><a href="<?php esc_attr_e('tel:','themex')?><?php echo esc_html($themex_opt['main_menu_number']); ?>"><?php echo esc_html($themex_opt['main_menu_number']); ?></a></h4>
								<?php endif; ?>										
									
								</div>						
							</div>						
						</div>						
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->						

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
	

 	<!-- witr_h_h23 main_menu_pop_area = 22 metabox -->	
	<?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==23 ){?>
	<div class="main_menu_pop_area witr_h_h23">		
		<?php themex_left_side_menu(); ?>																		
	</div>
		
	<!-- witr_h_h24 = 24 redux  -->
    <?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==24 ){?>  
 	<div class="themex-main-menu one_page hidden-xs hidden-sm sb_popup witr_h_h24">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">								
				<div class="row">									
					<!-- MAIN MENU -->
					<div class="col-lg-12">
						<nav class="themex_menu tx_mmenu_together">						
							<?php themex_one_page_menu(); ?>
							<!-- menu button -->
							<?php themex_menu_button();?>									
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>		

	
	<!-- Header Menu Hide  = 25 redux  -->	
	<?php }elseif(!empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==25 ){?>

	

	<!-- ================ END REDUX ================ -->


	
	<!-- METABOX MENU START ============================================================================================================================= -->
 <?php }else{ ?>
 
 

	 <!-- Header Default Menu = 1 metabox -->
   <?php if($twr_menu_header_style==1){?>
 	<div class="themex-main-menu hidden-xs hidden-sm witr_h_h1">
		<div class="themex_nav_area">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
			
				 <?php if(!empty($themex_opt['themex_main_menu_layout']) && $themex_opt['themex_main_menu_layout']=="m_menu_1"){?>			
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-lg-9  col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
				 <?php }elseif(!empty($themex_opt['themex_main_menu_layout']) && $themex_opt['themex_main_menu_layout']=="m_menu_2"){?>		
				
				<div class="row logo-right">				
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">
							<?php themex_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
				</div><!-- END ROW -->		
				<?php }elseif(!empty($themex_opt['themex_main_menu_layout']) && $themex_opt['themex_main_menu_layout']=="m_menu_3"){?>	
				<div class="row logo-top">					
					<!-- LOGO -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->						
					<!-- MAIN MENU -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<nav class="themex_menu">
							<?php themex_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->							
				<?php }else{?>
					
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->						
					
				<?php } ?>
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	


	
	 <!-- Header Transparent Menu = 2 metabox -->
   <?php }elseif($twr_menu_header_style==2){?>
   
   
 	<div class="themex-main-menu hidden-xs hidden-sm transprent-menu heading_style_4 witr_h_h2">
		<div class="trp_nav_area">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
			
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_ts_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>
							<!-- menu button -->
								<?php themex_menu_button();?>										
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	

	
	<!-- Header Transparent With Sticky Menu  = 3 metabox -->
	
   <?php }elseif($twr_menu_header_style==3){?>
 
 	<div class="themex-main-menu one_page menu4 hidden-xs hidden-sm transprent-menu heading_style_5  witr_h_h3">
		<div class="themex_nav_area scroll_fixed bdbar">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			

				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_ts_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>
							<!-- menu button -->
								<?php themex_menu_button();?>									
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	

				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	



   <!-- Header One Page Menu = 4 metabox -->
  <?php }elseif($twr_menu_header_style==4){?>
  
 	<div class="themex-main-menu one_page hidden-xs hidden-sm  witr_h_h4">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
								
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_onepage_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_one_page_menu(); ?>
							<!-- menu button -->
								<?php themex_menu_button();?>									
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
		
	 <!-- Header One Page Transparent Menu  = 5 -->
    <?php }elseif($twr_menu_header_style==5){?>
 
 	<div class="themex-main-menu hidden-xs hidden-sm one_page transprent-menu heading_style_3  witr_h_h5">
		<div class="trp_nav_area">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">

				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_ts_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_one_page_menu(); ?>
							<!-- menu button -->
								<?php themex_menu_button();?>									
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	

				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
	

	
	<!-- Header One Page Transparent With Sticky  Menu  = 6 metabox -->
    <?php }elseif($twr_menu_header_style==6){?>  
	
 	<div class="themex-main-menu one_page menu4 hidden-xs hidden-sm transprent-menu heading_style_2  witr_h_h6">
		<div class="themex_nav_area scroll_fixed bdbar">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
				
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_ts_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_one_page_menu(); ?>
							<!-- menu button -->
								<?php themex_menu_button();?>									
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	


	<!-- Header Default with Sticky Menu = 7 metabox -->
    <?php }elseif($twr_menu_header_style==7){?>  

 	<div class="themex-main-menu one_page hidden-xs hidden-sm  witr_h_h7">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
			
				 <?php if($twr_logo_menu_style==1){?>			
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>
							<!-- menu button -->
								<?php themex_menu_button();?>									
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
				 <?php }elseif($twr_logo_menu_style==2){?>	
				
				<div class="row logo-right">				
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">
							<?php themex_main_menu(); ?>
							<!-- menu button -->
								<?php themex_menu_button();?>										
						</nav>				
					</div>
					<!-- END MAIN MENU -->
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
				</div><!-- END ROW -->		
				 <?php }elseif($twr_logo_menu_style==3){?>		
				<div class="row logo-top">					
					<!-- LOGO -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->						
					<!-- MAIN MENU -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<nav class="themex_menu">
							<?php themex_main_menu(); ?>
							<!-- menu button -->
								<?php themex_menu_button();?>									
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->							
				<?php }else{?>
					
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>
							<!-- menu button -->
								<?php themex_menu_button();?>									
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->						
					
				<?php } ?>
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
				
				
	<!-- Header Menu With Search = 8 metabox -->
    <?php }elseif($twr_menu_header_style==8){?>  

 	<div class="themex-main-menu one_page hidden-xs hidden-sm  witr_h_h8">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
					
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu nologo_menu13 main-search-menu">						
							<?php themex_main_menu(); ?>
							<?php themex_search_code(); ?>																			
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	


	<!-- Header Menu With Social Icon = 9 metabox -->
    <?php }elseif($twr_menu_header_style==9){?>  

 	<div class="themex-main-menu one_page hidden-xs hidden-sm  witr_h_h9">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
						
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-2 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-10 col-sm-9 col-xs-8">
						<nav class="themex_menu main-search-menu">						
							<?php themex_main_menu(); ?>
							
								<div class="footer-social-icon htop-menu-s">					
									<?php themex_topmenu_social_icon();?>
								</div>
								<!-- menu button -->
								<?php themex_menu_button();?>										
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	

				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	


	<!-- Header Menu With Button = 10 metabox -->
    <?php }elseif($twr_menu_header_style==10){?>  

 	<div class="themex-main-menu one_page hidden-xs hidden-sm  witr_h_h10">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
						
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu main-search-menu">						
							<?php themex_main_menu(); ?>

							<!-- menu button -->
								<?php themex_menu_button();?>	
									
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	

	
	<!-- Header Menu With Button headroom Menu = 11 metabox -->
    <?php }elseif($twr_menu_header_style==11){?>  

 	<div class="themex-main-menu hidden-xs hidden-sm one_page header--fixed headrooma  witr_h_h11">
		<div class="themex_nav_area">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
			
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_onepage_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu main-search-menu">						
							<?php themex_one_page_menu(); ?>

							<!-- menu button -->
								<?php themex_menu_button();?>	
									
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>		
	
	
	<!-- Header Menu With Search and no Logo = 12 metabox -->
    <?php }elseif($twr_menu_header_style==12){?>  


 	<div class="themex-main-menu one_page hidden-xs hidden-sm  witr_h_h12">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
	
				<div class="row no-logo-sr">				
					<!-- MAIN MENU -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<nav class="themex_menu creative_header_menu">						
							<?php themex_main_menu(); ?>
							<div class="tx_bs_together">
								<div class="creative_search_icon">
									<?php themex_search_code(); ?>
								</div>
								<!-- menu button -->
								<?php themex_menu_button();?>	
							</div>	
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->						

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
	

	
	<!-- Header Transparent Sticky No logo Menu  = 13 metabox -->
   <?php }elseif($twr_menu_header_style==13){?>
 
 	<div class="themex-main-menu one_page menu4 hidden-xs hidden-sm transprent-menu heading_style_5  witr_h_h13">
		<div class="themex_nav_area scroll_fixed bdbar">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
		
				<div class="row no-logo-sr">				
					<!-- MAIN MENU -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<nav class="themex_menu nologo_menu13">						
							<?php themex_main_menu(); ?>
							<div class="tx_bs_together">
								<div class="creative_search_icon">
									<?php themex_search_code(); ?>
								</div>
								<!-- menu button -->
								<?php themex_menu_button();?>	
							</div>							
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	


	<!--Header One Page With Search Menu = 14 metabox -->
 	<?php }elseif($twr_menu_header_style==14){?>
 
 	<div class="themex-main-menu one_page hidden-xs hidden-sm  witr_h_h14">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
			
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu main-search-menu">						
							<?php themex_one_page_menu(); ?>
							<?php themex_search_code(); ?>																			
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	


	<!-- header mini shop menu  = 15 metabox -->
 	<?php }elseif($twr_menu_header_style==15){?>
 
 	<div class="themex-main-menu hidden-xs hidden-sm  witr_h_h15">
		<div class="themex_nav_area">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-2 col-sm-2 col-xs-2">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-10 col-sm-10 col-xs-10 tx_menu_together">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>
						</nav>				
						<!-- END MAIN MENU -->
						<!-- Woo Icon cart -->
						<?php if( class_exists( 'WooCommerce' ) ) { themex_mini_shop_output(); } ?>
						<!-- menu button -->
						<?php themex_menu_button();?>	

						
					</div>
					<!-- END MAIN MENU -->

					</div>
				</div> <!-- END ROW -->						
					
			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
	
	<!-- 16 Header Hamburgers Menu =16 metabox -->
    <?php }elseif($twr_menu_header_style==16){?> 	


 	<div class="themex-main-menu hidden-xs hidden-sm transprent-menu heading_style_4  witr_h_h16">
		<div class="trp_nav_area">		
		
		
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
					
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_ts_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 hmer col-xs-8">
					
						<button class="hamburger hamburger--slider" type="button">
						  <span class="hamburger-box">
							<span class="hamburger-inner"></span>
						  </span>
						</button>					
					
					
						<nav class="themex_menu dvrm">						
							<?php themex_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	


			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	

		
	<!-- 17 Header Box Style Menu  = 17 metabox -->	
	<?php }elseif($twr_menu_header_style==17){?>

 	<div class="themex-main-menu hidden-xs hidden-sm transprent-menu heading_style_17 witr_h_h2">
		<div class="trp_nav_area hmenu_box_style container">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
			
				
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>
							
							<!-- menu button -->
								<?php themex_menu_button();?>								
							
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
				

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	

	<!-- 18 No Logo,Search, Mini Shop Button = 18 metabox -->
 	<?php }elseif($twr_menu_header_style==18){?>
 
 	<div class="themex-main-menu hidden-xs hidden-sm one_page witr_h_h18">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">	
				<div class="row align_item_center">				
						
						<!-- MAIN MENU -->
						<div class="col-md-8 col-sm-8 col-xs-8">
							<nav class="themex_menu">						
								<?php themex_main_menu(); ?>
							</nav>				
						</div>
						<!-- END MAIN MENU -->
						<div class="col-md-4 col-sm-4">
							<div class=" tx_mmenu_together">						
								<div class="main-search-menu">						
									<?php themex_search_code(); ?>																			
								</div>
								<!-- Woo Icon cart -->
								<?php if( class_exists( 'WooCommerce' ) ) { themex_mini_shop_output(); } ?>
								<!-- menu button -->
								<?php themex_menu_button();?>										
							</div>	
						</div>
				</div><!-- END ROW -->
			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	

	<!-- 19 Left Logo,Right Search and Mini Shop Button  = 19 metabox -->
 	<?php }elseif($twr_menu_header_style==19){?>
 
 	<div class="themex-main-menu hidden-xs hidden-sm one_page witr_h_h19">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
				<div class="row logo-left">								
					<!-- LOGO -->
					<div class="col-md-2 col-sm-2 col-xs-2">
						<?php themex_main_logo(); ?>
					</div>						
						<!-- MAIN MENU -->
						<div class="col-md-10 col-sm-10 col-xs-10 tx_menu_together">
							<nav class="themex_menu">						
								<?php themex_main_menu(); ?>
							</nav>				
					

							<div class=" tx_mmenu_together">						
								<div class="main-search-menu">						
									<?php themex_search_code(); ?>																			
								</div>
								<!-- Woo Icon cart -->
								<?php if( class_exists( 'WooCommerce' ) ) { themex_mini_shop_output(); } ?>										
							</div>				

						</div>
				</div><!-- END ROW -->	
			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>

	<!-- Left Logo,Right Search,Popup Menu,Button  = 20 metobox -->
 	<?php }elseif($twr_menu_header_style==20){?>
 	<div class="themex-main-menu one_page hidden-xs hidden-sm witr_search_wh  witr_h_h20">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
					
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<div class="tx_mmenu_together">
							<nav class="themex_menu nologo_menu13">						
								<?php themex_main_menu(); ?>																										
							</nav>
							<div class="main-search-menu">						
								<?php themex_search_code(); ?>																			
							</div>
							<?php if ( is_active_sidebar( 'sidebar-pop' ) ) { ?>
								<div class="menu_popup_option">
									<?php themex_right_side_menu(); ?>
								</div>
							<?php  }?>
						
							<!-- menu button -->
								<?php themex_menu_button();?>	
						
						</div>
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
			
			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>

 	<!-- 21 No Logo,Right Search,Popup Menu,Button  = 21 metabox -->	
	<?php }elseif($twr_menu_header_style==21){?>
 	<div class="themex-main-menu one_page hidden-xs hidden-sm witr_search_wh sb_popup  witr_h_h21">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
					
				<div class="row">									
					<!-- MAIN MENU -->
					<div class="col-md-12">
						<div class="tx_mmenu_together">
							<nav class="themex_menu nologo_menu13">						
								<?php themex_main_menu(); ?>																										
							</nav>							
							<div class="search_popup_button">						
								<div class="main-search-menu">						
									<?php themex_search_code(); ?>																			
								</div>
								
								<?php if ( is_active_sidebar( 'sidebar-pop' ) ) { ?>
									<div class="menu_popup_option">
										<?php themex_right_side_menu(); ?>
									</div>
								<?php  }?>
							
								<!-- menu button -->
								<?php themex_menu_button();?>	
						
							</div>
						</div>
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
			
			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
 	<!-- 22 left Logo,Center Menu,Search And Right Address  = 22 metabox -->	
	<?php }elseif($twr_menu_header_style==22){?>
 	<div class="themex-main-menu one_page hidden-xs hidden-sm witr_search_wh sb_popup  witr_h_h22">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
					
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<div class="number_align">
							<nav class="themex_menu menu_search">						
								<?php themex_main_menu(); ?>
								<?php themex_search_code(); ?>
							</nav>							
							<div class="main_menu_address_a">										
								<div class="main_menu_header_icon">										
									<?php echo wp_kses($themex_opt['main_menu_icon'], array(
										'i' => array(
											'class' =>array()
										),
									));?>
								</div>						
								<div class="main_menu_header_address_text">						
								<?php if (!empty($themex_opt['main_menu_top_title'])): ?>										
										<h3><?php echo esc_html($themex_opt['main_menu_top_title']); ?></h3>
								<?php endif; ?>	
								<?php if (!empty($themex_opt['main_menu_number'])): ?>
									<h4><a href="<?php esc_attr_e('tel:','themex')?><?php echo esc_html($themex_opt['main_menu_number']); ?>"><?php echo esc_html($themex_opt['main_menu_number']); ?></a></h4>
								<?php endif; ?>										
									
								</div>						
							</div>						
						</div>						
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->						

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	

 	<!-- witr_h_h23 -->	
	<?php }elseif($twr_menu_header_style==23){?>
	<div class="main_menu_pop_area witr_h_h23">		
		<?php themex_left_side_menu(); ?>																		
	</div> 
	
	<!-- witr_h_h24 -->			
	<?php }elseif($twr_menu_header_style==24){?>
 	<div class="themex-main-menu one_page hidden-xs hidden-sm sb_popup witr_h_h24">
		<div class="themex_nav_area scroll_fixed">
			<div class="<?php if( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">								
				<div class="row">									
					<!-- MAIN MENU -->
					<div class="col-lg-12">
						<nav class="themex_menu tx_mmenu_together">						
							<?php themex_one_page_menu(); ?>
							<!-- menu button -->
							<?php themex_menu_button();?>									
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	
			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>
		
 	<!-- Header Menu Hide  = 25 metabox -->	
	<?php }elseif($twr_menu_header_style==25){?>

	
	

 <?php }else{ ?>

   <!-- HEADER DEFAULT MANU AREA = 00 default -->
 	<div class="themex-main-menu hidden-xs hidden-sm">
		<div class="themex_nav_area">
			<div class="<?php if(!empty($themex_opt['themex_main_box_layout']) && $themex_opt['themex_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}elseif( $txbdm_box_menu==3 ){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
	
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php themex_main_logo(); ?>
					</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="themex_menu">						
							<?php themex_main_menu(); ?>
						</nav>				
					</div>
					<!-- END MAIN MENU -->
				</div> <!-- END ROW -->	

			</div> <!-- END CONTAINER -->	
		</div>  <!-- END AREA -->				
	</div>	
	<!-- END HEADER MENU AREA -->


	
   <?php } ?>
   

   

   <?php } ?>	
 
</div> <!-- absulate div -->
</div> <!-- relative div -->



</div> <!-- top 2 absulate div -->
</div> <!--  top 2 relative div  extra -->



</div> <!--  div extra -->
             
	<!-- MOBILE MENU AREA -->
	<div class="home-2 mbm hidden-md hidden-lg  header_area main-menu-area">
		<div class="menu_area mobile-menu ">
			<nav>
				<?php themex_mobile_menu(); ?>
			</nav>
		</div>					
	</div>			
	<!-- END MOBILE MENU AREA  -->
	
</div>	
