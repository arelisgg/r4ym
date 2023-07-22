<?php
// theme fallback menu
if(!function_exists('themex_fallback_menu')){
	
	function themex_fallback_menu(){?>

		<ul class="main-menu clearfix">
			<li><a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>"><?php esc_html_e('Create Menu','themex'); ?></a></li>
		</ul>	
	<?php }			
}

// theme main menu
if(!function_exists('themex_main_menu')){
	
	function themex_main_menu(){
		wp_nav_menu(array(
			 'theme_location' =>'menu-1',
			 'container'      => false,
			 'menu_class' =>'sub-menu',
			 'fallback_cb' =>'themex_fallback_menu',									
		));
	}
}


// theme main menu
if(!function_exists('themex_one_page_menu')){
	
	function themex_one_page_menu(){
		wp_nav_menu(array(
			 'theme_location' =>'one-pages',
			 'container'      => false,
			 'menu_class' =>'sub-menu nav_scroll',
			 'fallback_cb' =>'themex_fallback_menu',									
		));
	}
}



// theme main menu
if(!function_exists('themex_mobile_menu')){
	
	function themex_mobile_menu(){
		wp_nav_menu(array(
			 'theme_location' =>'menu-3',
			 'container'      => false,
			 'menu_class' =>'main-menu clearfix',
			 'fallback_cb' =>'themex_fallback_menu',									
		));
	}
}

// theme logo 1 setting 
if(!function_exists('themex_main_logo')){				
	function themex_main_logo(){
	 global $themex_opt;
	 if(is_ssl()){
		if(! empty($themex_opt['themex_logo']['url']) ){ 
		  $themex_opt['themex_logo']['url'] = str_replace('http:', 'https:', $themex_opt['themex_logo']['url']);
		}
		if(! empty($themex_opt['themex_ts_logo']['url']) ){ 
		  $themex_opt['themex_ts_logo']['url'] = str_replace('http:', 'https:', $themex_opt['themex_ts_logo']['url']);
		 }
	 }
	 ?>

	  <?php if( isset($themex_opt['themex_logo']['url']) && ! empty($themex_opt['themex_logo']['url']) ){ ?>	  
		<div class="logo">
			<a class="main_sticky_main_l" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<img src="<?php echo esc_url($themex_opt['themex_logo']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>" />
			</a>
			<a class="main_sticky_l" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<img src="<?php echo esc_url($themex_opt['themex_ts_logo']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>" />
			</a>
		</div>	  
	  <?php  
	  } else { ?>
	  
			<div class="logo_area">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1><?php 
	  			$description = get_bloginfo( 'description', 'display' );
				$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>
			
			</div>	 					
	 
	<?php  }
	}
}


// theme logo 2 setting 
if(!function_exists('themex_onepage_logo')){				
	function themex_onepage_logo(){
	 global $themex_opt;
	 if(is_ssl()){
		if(! empty($themex_opt['themex_onepage_logo']['url']) ){ 
		  $themex_opt['themex_onepage_logo']['url'] = str_replace('http:', 'https:', $themex_opt['themex_onepage_logo']['url']);
		}
		if(! empty($themex_opt['themex_ts_logo']['url']) ){ 
		  $themex_opt['themex_ts_logo']['url'] = str_replace('http:', 'https:', $themex_opt['themex_ts_logo']['url']);
		 }
	 }	  

	 ?>

	  <?php if( isset($themex_opt['themex_onepage_logo']['url']) ){ ?>
	  
		<div class="logo">
			<a class="main_sticky_main_l"  href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<img src="<?php echo esc_url($themex_opt['themex_onepage_logo']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>" />
			</a>
			<a class="main_sticky_l" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<img src="<?php echo esc_url($themex_opt['themex_ts_logo']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>" />
			</a>			
		</div>	  

	  <?php
		}
	}
}
// theme logo 3 setting 
if(!function_exists('themex_ts_logo')){				
	function themex_ts_logo(){
	 global $themex_opt;
	 if(is_ssl()){
		if(! empty($themex_opt['themex_ts_logo']['url']) ){ 
		  $themex_opt['themex_ts_logo']['url'] = str_replace('http:', 'https:', $themex_opt['themex_ts_logo']['url']);
		 }
	 }		 
	 
	 ?>
		<?php if( isset($themex_opt['themex_ts_logo']['url']) && ! empty($themex_opt['themex_ts_logo']['url']) ){ ?>
	  
		<div class="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<img src="<?php echo esc_url($themex_opt['themex_ts_logo']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>" />
			</a>		
		</div>	  

	  <?php
		}
	}
}
// theme logo 4 for mobile 
if(!function_exists('themex_mobile_top_logo')){				
	function themex_mobile_top_logo(){
	 global $themex_opt;
	 if(is_ssl()){
		if(! empty($themex_opt['themex_mobile_top_logo']['url']) ){ 
		  $themex_opt['themex_mobile_top_logo']['url'] = str_replace('http:', 'https:', $themex_opt['themex_mobile_top_logo']['url']);
		 }
	 }	 
	 ?>

	  <?php if( isset($themex_opt['themex_mobile_top_logo']['url']) ){ ?>
		<div class="mobile_menu_logo text-center">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<img src="<?php echo esc_url($themex_opt['themex_mobile_top_logo']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>" />
			</a>		
		</div>
	  <?php
		}else{?>
			<div class="mobile_menu_logo text-center">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			</div>			
		
		<?php }
	}
}



/* menu top login option */
if(!function_exists('themex_login')){
	function themex_login(){
		if (is_user_logged_in()) {?>
		
				<a title="Logout" href="<?php echo esc_url(wp_logout_url(get_permalink()));?>"><i class="icofont-logout"></i> <?php esc_html_e('Logout','themex');?></a>
			
			<?php }else{?>
			
				<a title="Login"  href="<?php echo esc_url(wp_login_url( get_permalink() ));?>"><i class="icofont-login"></i> <?php esc_html_e('Login','themex');?></a>
				<a title="Register" href="<?php echo esc_url(wp_registration_url(get_permalink()));?>"><i class="icofont-key"></i> <?php esc_html_e('Register','themex');?></a>

		<?php }		

	}
}
// theme logo 2 setting 
if(!function_exists('twr_loding_logo')){				
	function twr_loding_logo(){
	 global $themex_opt;
	 if(is_ssl()){
		if(! empty($themex_opt['pre_preloader_image']['url']) ){ 
		  $themex_opt['pre_preloader_image']['url'] = str_replace('http:', 'https:', $themex_opt['pre_preloader_image']['url']);
		}
	 }	  

	 ?>

	  <?php if( isset($themex_opt['pre_preloader_image']['url']) ){ ?>
	  
		<div class="loding_logo">
				<img src="<?php echo esc_url($themex_opt['pre_preloader_image']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>" />			
		</div>	  

	  <?php
		}
	}
}
/*  main menu button */
if(!function_exists('themex_menu_button')){
	function themex_menu_button(){
		global $themex_opt;
		 if (!empty($themex_opt['themex_header_button'])){ ?>
			<div class="donate-btn-header">
				<a class="dtbtn" href="<?php if (!empty($themex_opt['themex_header_button_url'])){echo esc_url($themex_opt['themex_header_button_url']);}?>">
					<?php echo themex_kses_post($themex_opt['themex_header_button']);?>	
				</a>	
			</div>	
		<?php }	

	}
}
/* search menu option */
if(!function_exists('themex_search_code')){
	function themex_search_code(){
		?>
			<div class="em-quearys-top msin-menu-search">
				<div class="em-top-quearys-area">
				   <div class="em-header-quearys">
						<div class="em-quearys-menu">
							<i class="icofont-search-2 t-quearys"></i>
							
						</div>
					</div>
					<!--SEARCH FORM-->
					<div class="em-quearys-inner">
						<div class="em-quearys-form">
							<form class="top-form-control" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
									<input type="text" placeholder="<?php echo esc_attr_e( 'Type Your Keyword', 'themex' ) ?>" name="s" value="<?php the_search_query(); ?>" />
								<button class="top-quearys-style" type="submit">
									<i class="icofont-long-arrow-right"></i>
								</button>
							</form>

							<div class="em-header-quearys-close text-center mrt10">
								<div class="em-quearys-menu">
									<i class="icofont-close-line  t-close em-s-hidden"></i>
								</div>
							</div>											
						</div>
					</div>														
				</div>
			</div>				
	<?php
	}
}
/* menu social icons option */
if(!function_exists('themex_menu_social_icon')){
	function themex_menu_social_icon(){
		global $themex_opt;
		foreach($themex_opt['themex_social_icons'] as $key=>$value ) { 
		if($value != ''){						
			 echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" ><i class="icofont-'.esc_attr($key).'"></i></a></li>';
		}}
	
	}
}
/* top menu social icons option */
if(!function_exists('themex_topmenu_social_icon')){
	function themex_topmenu_social_icon(){
		global $themex_opt;
		foreach($themex_opt['themex_social_icons'] as $key=>$value ) { 
		if($value != ''){						
			 echo '<a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" ><i class="icofont-'.esc_attr($key).'"></i></a>';
		}}
	
	}
}
/* site page social icons option */
if(!function_exists('twr_sitepage_sharing')){
	function twr_sitepage_sharing(){
		global $themex_opt;
		foreach($themex_opt['themex_social_icons'] as $key=>$value ) { 
		if($value != ''){						
			 echo '<a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" ><i class="icofont-'.esc_attr($key).'"></i></a>';
		}}
	
	}
}


/* top menu address option */
if(!function_exists('themex_top_address_option')){
	function themex_top_address_option(){
	global $themex_opt;
?>
	<p>							
	<?php if (!empty($themex_opt['themex_header_top_road'])): ?>
	<span>
	<?php echo themex_kses_post($themex_opt['themex_header_top_i1']);
	echo themex_kses_post($themex_opt['themex_header_top_road']); ?></span>
	<?php endif; 
	if (!empty($themex_opt['themex_header_top_mobile'])): ?>
	<a href="<?php esc_attr_e('tel:','themex')?><?php echo esc_html($themex_opt['themex_header_top_mobile']); ?>">
	<?php echo themex_kses_post($themex_opt['themex_header_top_i2']);
	echo themex_kses_post($themex_opt['themex_header_top_mobile']); ?>
	</a>
	<?php endif; 
	if (!empty($themex_opt['themex_header_top_email'])): ?>
	<a href="<?php esc_attr_e('mailto:','themex')?><?php echo esc_html($themex_opt['themex_header_top_email']); ?>">
	<?php echo themex_kses_post($themex_opt['themex_header_top_i3']);
	echo themex_kses_post($themex_opt['themex_header_top_email']); ?>
	</a>
	<?php endif; ?>	
	</p>
<?php		

	
	}
}
/* top menu address wellcome option */
if(!function_exists('themex_top_wellcome_option')){
	function themex_top_wellcome_option(){
	global $themex_opt;
	 if (!empty($themex_opt['themex_header_top_wellcome'])): ?>		
		<span>
			<?php echo themex_kses_post($themex_opt['themex_header_top_i4']);
			echo themex_kses_post($themex_opt['themex_header_top_wellcome']);
		?>	</span>	
	<?php endif; 
	
	}
}
/* top menu address open time option */
if(!function_exists('themex_top_opening_option')){
	function themex_top_opening_option(){
	global $themex_opt;
	?>
	<p>
		<?php if (!empty($themex_opt['themex_header_top_opening'])): ?>
			<span>
			<?php echo wp_kses($themex_opt['themex_header_top_i5'], array(
				'i' => array(
					'class' =>array()
				),
			));?>										
			<?php echo esc_html($themex_opt['themex_header_top_opening']); ?></span>										
		<?php endif; ?>	
		
	</p>
	<?php 

	
	}
}
/* top menu */
if(!function_exists('themex_top_menu_option')){
	function themex_top_menu_option(){
		if ( has_nav_menu( 'menu-top' ) ) {
			wp_nav_menu( array(
			'theme_location' => 'menu-top',
			'menu_class' => 'social-icons text-right text_m_center',
			'fallback_cb' => false,
			'container' => '',
			) );
		}
	}
}/* top menu left */
if(!function_exists('themex_topleft_menu')){
	function themex_topleft_menu(){
		if ( has_nav_menu( 'menu-top' ) ) {
			wp_nav_menu( array(
			'theme_location' => 'menu-top',
			'menu_class' => 'social-icons text-left text_m_center',
			'fallback_cb' => false,
			'container' => '',
			) );
		}
	}
}
/* top 2 creative menu */
if(!function_exists('themex_top_crmenu_option')){
	function themex_top_crmenu_option(){
		if ( has_nav_menu( 'menu-top' ) ) {
			wp_nav_menu( array(
			'theme_location' => 'menu-top',
			'menu_class' => 'top_crmenu_l text-right text_m_center',
			'fallback_cb' => false,
			'container' => '',
			) );
		}
	}
}
/* top 2 creative address 1 */
if(!function_exists('themex_top_craddress1_option')){
	function themex_top_craddress1_option(){
	global $themex_opt;		
	?>
	<div class="single_header_address">
		<div class="creative_header_icon">
			<?php echo themex_kses_post($themex_opt['themex_header_top_ci1']);?>
		</div>
		<div class="creative_header_address_text">
		
		<?php if (!empty($themex_opt['themex_header_top_roadtwot'])): ?>										
					<h3><?php echo themex_kses_post($themex_opt['themex_header_top_roadtwot']); ?></h3>
		<?php endif; ?>		

		<?php if (!empty($themex_opt['themex_header_top_roadtwo'])): ?>										
					<p><?php echo themex_kses_post($themex_opt['themex_header_top_roadtwo']); ?></p>
		<?php endif; ?>											
		</div>
	</div>	
	<?php 
	}
}
/* top 2 creative address 2 */
if(!function_exists('themex_top_craddress2_option')){
	function themex_top_craddress2_option(){
	global $themex_opt;		
	?>
	<div class="single_header_address">
		<div class="creative_header_icon">
			<?php echo themex_kses_post($themex_opt['themex_header_top_ci2']);?>
		</div>
		<div class="creative_header_address_text">
		<?php if (!empty($themex_opt['themex_header_top_emailtwot'])): ?>										
					<h3><?php echo themex_kses_post($themex_opt['themex_header_top_emailtwot']); ?></h3>
		<?php endif; ?>	
			<?php if (!empty($themex_opt['themex_header_top_emailtwo'])): ?>
			<p><a href="<?php esc_attr_e('mailto:','themex')?><?php echo esc_html($themex_opt['themex_header_top_emailtwo']); ?>"><?php echo themex_kses_post($themex_opt['themex_header_top_emailtwo']); ?></a></p>
		<?php endif; ?>																					
		</div>
	</div>	
	<?php 
	}
}
/* top 2 creative menu address 3 */
if(!function_exists('themex_top_craddress3_option')){
	
	function themex_top_craddress3_option(){
	global $themex_opt;		
	?>
	<p class="text-right">							
		<?php if (!empty($themex_opt['themex_header_top_roadtwo'])): ?>
			<span>
			<?php echo themex_kses_post($themex_opt['themex_header_top_ci1']);?>
			<?php echo themex_kses_post($themex_opt['themex_header_top_roadtwo']); ?></span>
		<?php endif; ?>	
		<?php if (!empty($themex_opt['themex_header_top_mobiletwo'])): ?>
			<a href="<?php esc_attr_e('mailto:','themex')?><?php echo esc_html($themex_opt['themex_header_top_mobiletwo']); ?>">
			<?php echo themex_kses_post($themex_opt['themex_header_top_ci3']);?>										
			<?php echo themex_kses_post($themex_opt['themex_header_top_mobiletwo']); ?></a>
		<?php endif; ?>										
		<?php if (!empty($themex_opt['themex_header_top_emailtwo'])): ?>
			<a href="<?php esc_attr_e('tel:','themex')?><?php echo esc_html($themex_opt['themex_header_top_emailtwo']); ?>">
			<?php echo themex_kses_post($themex_opt['themex_header_top_ci2']);?>										
			<?php echo themex_kses_post($themex_opt['themex_header_top_emailtwo']); ?></a>
		<?php endif; ?>	
	</p>	
	<?php 
	}
}
/* top 2 creative menu address 4 */
if(!function_exists('themex_top_craddress4_option')){
	function themex_top_craddress4_option(){
	global $themex_opt;		
	?>
	<div class="single_header_address ctrp">
		<div class="creative_header_icon">										
			<?php echo themex_kses_post($themex_opt['themex_header_top_ci3']);?>
		</div>
		<div class="creative_header_address_text">
		<?php if (!empty($themex_opt['themex_header_top_mobiletwot'])): ?>										
					<h3><?php echo themex_kses_post($themex_opt['themex_header_top_mobiletwot']); ?></h3>
		<?php endif; ?>	
		<?php if (!empty($themex_opt['themex_header_top_mobiletwo'])): ?>
			<p><a href="<?php esc_attr_e('tel:','themex')?><?php echo esc_html($themex_opt['themex_header_top_mobiletwo']); ?>"><?php echo themex_kses_post($themex_opt['themex_header_top_mobiletwo']); ?></a></p>
		<?php endif; ?>										
			
		</div>
	</div>
	<?php 
	}
}
/* top 2 creative menu button */
if(!function_exists('themex_top_craddress_button')){
	function themex_top_craddress_button(){
	global $themex_opt;		
	 if (!empty($themex_opt['themex_header_buttonc1'])): ?>
		<div class="tx_menuc_btn text_m_center">
			<a class="top-btn-color tx_mc_btn" href="<?php if (!empty($themex_opt['themex_header_button_urlc1'])){echo esc_url($themex_opt['themex_header_button_urlc1']);}?>">
				<?php echo themex_kses_post($themex_opt['themex_header_buttonc1']);?>										
			</a>	
		</div>	
	<?php endif; 
	}
}
/* top 2 creative menu button */
if(!function_exists('themex_top_craddress2_button')){
	function themex_top_craddress2_button(){
	global $themex_opt;			
	 if (!empty($themex_opt['themex_header_buttonc1'])): ?>
		<div class="creative_header_button">
			<a class="top-btn-color dtbtn" href="<?php if (!empty($themex_opt['themex_header_button_urlc1'])){echo esc_url($themex_opt['themex_header_button_urlc1']);}?>">
				<?php echo themex_kses_post($themex_opt['themex_header_buttonc1']);?>									
			
			</a>	
		</div>	
	<?php endif;
	}
}
if(!function_exists('themex_right_side_menu')){
	function themex_right_side_menu(){
		global $themex_opt;	
		?>

		   <div class="right_popupmenu_area">
			   <div class="right_side_icon">
					<div class="right_sideber_menu">
						<i class="icofont-navigation-menu openclass"></i>
					</div>
				</div>
				<!--SEARCH FORM-->
				<div class="right_sideber_menu_inner">
					<div class="right_sideber_content">
						<div class="blog-left-side widget">
							<?php if ( is_active_sidebar( 'sidebar-pop' ) ) {
								dynamic_sidebar( 'sidebar-pop' );
							}?>
						</div>					
						<div class="right_side_icon right_close_class">
							<div class="right_sideber_menu">
								<i class="icofont-close-line-squared closeclass"></i>
							</div>
						</div>											
					</div>
				</div>													
			</div>													
						
	<?php
	}
}
/* main menu code */
if(!function_exists('themex_left_side_menu')){
	function themex_left_side_menu(){
		global $themex_opt;	
		?>
		   <div class="right_popupmenu_area">
			   <div class="right_side_menu_icon">
					<div class="right_sideber_menu">
						<i class="icofont-navigation-menu openclass"></i>
					</div>
				</div>
				<!--SEARCH FORM-->
				<div class="right_sideber_menu_inner">
					<div class="right_sideber_content">
						<div class="blog-left-side">
							<?php themex_main_logo(); ?>
							<?php dynamic_sidebar( 'sidebar-pop' );?>
						</div>					
						<div class="right_side_icon right_close_class">
							<div class="right_sideber_menu">
								<i class="icofont-close-line-squared closeclass"></i>
							</div>
						</div>											
					</div>
				</div>													
			</div>													
						
	<?php
	}
}




/* Blog post meta */
if(!function_exists('themex_blog_post_meta')){
function themex_blog_post_meta(){
	global $themex_opt;	
	 if (!empty($themex_opt['themex_blog_post_meta']) && $themex_opt['themex_blog_post_meta']==true){
		
	}else{?>
	<div class="themex-blog-meta">

		<div class="themex-blog-meta-left">
		
			<span><i class="icofont-calendar"></i><?php echo get_the_time(get_option('date_format')); ?></span>
		
		<?php if ( comments_open() || get_comments_number() ) {?>
			<a href="<?php comments_link(); ?>"><i class="icofont-comment"></i>
				<?php comments_number( esc_html__('0 Comments','themex'), esc_html__('1 Comment','themex'), esc_html__('% Comments','themex') );?>
			</a>						
		<?php }else{?>
			<span><i class="icofont-comment"></i> <?php echo esc_html__('Comments Off','themex'); ?></span>
		<?php } ?>						
		
		</div>
	</div>	
	<?php } 
	}
}


/* Blog single post meta */
if(!function_exists('themex_blog_singlepost_meta')){
function themex_blog_singlepost_meta(){
	global $themex_opt;	
	 if (!empty($themex_opt['themex_blog_post_meta']) && $themex_opt['themex_blog_post_meta']==true){
		
	}else{
		if( 'post' == get_post_type() ) { ?>				
				<div class="themex-blog-meta">
				
					<div class="themex-blog-meta-left">
						
						<span><i class="icofont-calendar"></i><?php echo get_the_time(get_option('date_format')); ?></span>
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><i class="icofont-user-alt-3"></i> <?php the_author(); ?></a>
						<?php if ( comments_open() || get_comments_number() ) {?>
							<a href="<?php comments_link(); ?>"><i class="icofont-comment"></i>
								<?php comments_number( esc_html__('0 Comments','themex'), esc_html__('1 Comment','themex'), esc_html__('% Comments','themex') );?>
							</a>						
						<?php }else{?>
							<span><i class="icofont-comment"></i> <?php echo esc_html__('Comments Off','themex'); ?></span>
						<?php } ?>							
					</div>
				</div>
		<?php } // if post ?>
	<?php } 
	}
}



/* Blog single post meta */
if(!function_exists('themex_blog_btn')){
	function themex_blog_btn(){
		global $themex_opt;	
		 if (!empty($themex_opt['themex_blog_btn_text'])){
			?>
			<div class="readmore"><a href="<?php the_permalink(); ?>"><?php echo $themex_opt['themex_blog_btn_text'];?></a></div>
			<?php 
		}
	}
}







/* themex comment form */
add_filter('comment_form_default_fields','themex_comments_form');
if(!function_exists('themex_comments_form')){
    function themex_comments_form($default){
			$default['author'] = '<div  class="comment_forms from-area"><div  class="comment_forms_inner">
			
			<div class="comment_field">
			<div class="row">
				<div class="col-md-6 form-group">
					<input id="name" class="form-control" name="author" type="text" placeholder="Your Name*"/>
				</div>';

			$default['email'] = '
				<div class="col-md-6 form-group">				
					<input id="email" class="form-control"  name="email" type="text" placeholder="Email Address*"/>
				</div> 
			</div>';	

			$default['phone'] = '
				<div class="row">
					<div class="col-md-6 form-group">				
						<input id="phone" class="form-control"  name="phone" type="text" placeholder="Phone Number"/>
					</div> 
				';			
			$default['title'] = '
				<div class="col-md-6 form-group">
					<input id="title" class="form-control" name="url" type="text" placeholder="Your Website"/>
				</div>   
				</div>   
			</div>  ';	
			$default['url']='';
			$default['message'] ='<div class="comment_field"><div class="textarea-field"><textarea name="comment" id="comment" cols="30" rows="10" class="form-control" placeholder="Write your comment*..."></textarea></div></div>   </div></div>';																		

 
        return $default;
    }
}
add_filter('comment_form_defaults','themex_form_default');

 if(!function_exists('themex_form_default')){
    function themex_form_default($default_info){
        if(!is_user_logged_in()){
            $default_info['comment_field'] = '';
        }else{
            $default_info['comment_field'] = '<div  class="comment_forms"><div  class="comment_forms_inner"> <div class="comment_field"><div class="textarea-field"><textarea name="comment" id="comment" class="form-control" cols="30" rows="10" placeholder="Write your comment..."></textarea></div></div> </div></div>';
        }
         
        $default_info['submit_button'] = '<button class="comment_themex_btn button" type="submit">'.esc_html__('Post Comment','themex').'</button>';
        $default_info['submit_field'] = '%1$s %2$s';
        $default_info['comment_notes_before'] = ' ';
        $default_info['title_reply'] = esc_html__('leave a comment ','themex');
        $default_info['title_reply_before'] = '<div class="commment_title"><h3> ';
        $default_info['title_reply_after'] = '</h3></div> ';
 
        return $default_info;
    }
 
 }
	
	
//themex comment show
if(! function_exists('themex_comment')){
	function themex_comment($comment,$arg, $depth){
		$GLOBALS ['comment'] = $comment;
		?>

		<!-- connent reply -->		
		<div class="post_comment">
			<div class="comment_inner">
				<div class="post_replay">
					<div class="post_replay_content">											
						<div class="post_replay_inner" id="comment-<?php comment_ID(); ?>">
							<div class="post_reply_thumb">
								 <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"> <?php echo get_avatar($comment,80); ?></a>
							</div>
							<div class="post_reply">
								<div class="st"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_comment_author(); ?></a></div>
								<div class="reply_date">
									<span class="span_left"><?php echo get_comment_date(get_option('date_format')); ?></span>
									<?php 
										comment_reply_link(
											array_merge($arg,array(
												'reply_text' => '<span class="span_right">'. esc_html__('REPLY','themex').'</span>',
												'depth'    => $depth,
												'max_depth' => $arg['max_depth']
											))
									); ?>   
									
								</div>
								<p><?php comment_text(); ?></p>
								<div class="edit_comment"><?php edit_comment_link(esc_html__('(Edit)' , 'themex' ),'<small class="ecome">','</small>') ?></div>
							</div>
							
						</div>
					</div>																
				</div>
			</div>
		</div>		
	
		<?php
	}
}



/**
 * Add color styling from theme
 */
 
 if( !function_exists( 'themex_inline_styles' ) ) {
function themex_inline_styles() {
	 global $themex_opt;
	 $lheight=$logoheight=$lwidth=$logoweight=$linheight=$lmtop=$mobile_image=$mobile_image_sec=$themex_br_from=$themex_br_to=$themex_br_overly=$menu_bt_from=$menu_bt_to=$menu_bt_bg=$menu_bth_from=$menu_bth_to=$menu_bth_bg=$footer_wc_from=$footer_wc_to=$footer_wc_bg=$menu_top_from=$menu_top_to=$menu_top_bg='';
	
		if (!empty($themex_opt['themex_logo_height'])){
			$lheight=$themex_opt['themex_logo_height'];
			$logoheight="height:{$lheight}";
		}
		if (!empty($themex_opt['themex_logo_widget'])){
			$lwidth=$themex_opt['themex_logo_widget'];
			$logoweight="width:{$lwidth}";
		}
		if (!empty($themex_opt['themex_line_height'])){
			$linheight=$themex_opt['themex_line_height'];
			$lmtop="margin-top:{$linheight}";
		}
		if (!empty($themex_opt['themex_mobile_image_logo'])){
			$mobile_image=$themex_opt['themex_mobile_image_logo'];
			$mobile_image_sec="content:{$mobile_image}";
		}
		/* Top Menu Background  Gradient */
		if (!empty($themex_opt['top_menu_gr'])){
		$menu_top_from=$themex_opt['top_menu_gr']['from'] ;
		$menu_top_to=$themex_opt['top_menu_gr']['to'] ;
		$menu_top_bg="background: linear-gradient(-45deg, {$menu_top_from}, {$menu_top_to});";
		}		
		/* Button Background  Gradient */
		if (!empty($themex_opt['button_bg_gr'])){
		$menu_bt_from=$themex_opt['button_bg_gr']['from'] ;
		$menu_bt_to=$themex_opt['button_bg_gr']['to'] ;
		$menu_bt_bg="background: linear-gradient(-45deg, {$menu_bt_from}, {$menu_bt_to});";
		}
		/* Button Hover Background Gradient */
		if (!empty($themex_opt['button_bgh_gr'])){
		$menu_bth_from=$themex_opt['button_bgh_gr']['from'] ;
		$menu_bth_to=$themex_opt['button_bgh_gr']['to'] ;
		$menu_bth_bg="background: linear-gradient(-45deg, {$menu_bth_from}, {$menu_bth_to});";
		}
		/* Widget and Cppyright Background Gradient */
		if (!empty($themex_opt['footer_wcs_gr'])){
		$footer_wc_from=$themex_opt['footer_wcs_gr']['from'] ;
		$footer_wc_to=$themex_opt['footer_wcs_gr']['to'] ;
		$footer_wc_bg="background: linear-gradient(-45deg, {$footer_wc_from}, {$footer_wc_to});";
		}		
		
		/* Breadcumb Background Overlay Gradient */
		if (!empty($themex_opt['themex_breadcumb_overlay_gr'])){
		$themex_br_from=$themex_opt['themex_breadcumb_overlay_gr']['from'] ;
		$themex_br_to=$themex_opt['themex_breadcumb_overlay_gr']['to'] ;
		$themex_br_overly="background: linear-gradient(-45deg, {$themex_br_from}, {$themex_br_to});";
		}		
			 
		wp_enqueue_style(
			'themex-breadcrumb',
			get_template_directory_uri() . '/assets/css/em-breadcrumb.css'
		);			
        $inlinewp_css = "
					.themex-header-top{
						{$menu_top_bg}						
					}		
					.logo img {
						{$logoheight};
						{$logoweight};
					}
					.logo a{
						{$lmtop}
					}
					.mean-container .mean-bar::before{
						{$mobile_image_sec}						
					}
					.breadcumb-area::before, .breadcumb-blog-area::before{
						{$themex_br_overly}						
					}
					a.dtbtn,.creative_header_button .dtbtn,.em-quearys-menu i,.mini_shop_content a span.count{
						{$menu_bt_bg}						
					}
					a.dtbtn:hover,.creative_header_button .dtbtn:hover,.em-quearys-menu i:hover,.mini_shop_content a span.count:hover{
						{$menu_bth_bg}						
					}
					.witrfm_area.witrfm_area{
						{$footer_wc_bg}						
					}					
               ";				
				
        wp_add_inline_style( 'themex-breadcrumb', $inlinewp_css );
	}
}
add_action( 'wp_enqueue_scripts', 'themex_inline_styles',200 );


/**
* Print pagination
*
* @param    array           $args           Arguments for this function, including 'query', 'range'
* @param    string         $wrapper        Type of html wrapper
* @param    string         $wrapper_class  Class of HTML wrapper
* @echo     string                          Post Meta HTML
*/
if( !function_exists( 'themex_pagination' ) ) {
	function themex_pagination( $args = NULL , $wrapper = 'div', $wrapper_class = 'paginations' ) {

		// Set up some globals
		global $wp_query, $paged;

		// Get the current page
		if( empty($paged ) ) $paged = ( get_query_var('page') ? get_query_var('page') : 1 );

		// Set a large number for the 'base' argument
		$big = 99999;

		// Get the correct post query
		if( !isset( $args[ 'query' ] ) ){
			$use_query = $wp_query;
		} else {
			$use_query = $args[ 'query' ];
		} ?>

		<<?php echo esc_html($wrapper); ?> class="<?php echo esc_html($wrapper_class); ?>">
			<?php echo paginate_links( array(
				'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
				'prev_next' => true,
				'mid_size' => ( isset( $args[ 'range' ] ) ? $args[ 'range' ] : 5 ) ,
				'prev_text' => '<i class="icofont-arrow-left"></i>',
				'next_text' => '<i class="icofont-arrow-right"></i>',				
				'type' => 'list',
				'current' => $paged,
				'total' => $use_query->max_num_pages
			) ); ?>
		</<?php echo esc_html($wrapper); ?>>
	<?php }
} // themex_pagination


if( !function_exists( 'themex_slider_o' ) ) {
 function themex_slider_o( $file_list_meta_key, $img_size = 'full' ) {

  // Get the list of files
  $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

  // Loop through them and output an image
  foreach ( (array) $files as $attachment_id => $attachment_url ) {
			echo '<div class="gitem">';
			echo wp_get_attachment_image( $attachment_id, $img_size );
			echo '</div>';
		}
	}
}



/*Disables the block editor from managing widgets in the Gutenberg plugin.*/
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false', 100 );
/* Disables the block editor from managing widgets.*/
add_filter( 'use_widgets_block_editor', '__return_false' );


/**
 * @param string  $content   Text content to filter.
 * @return string Filtered content containing only the allowed HTML.
 * */
if( ! function_exists( 'themex_kses_post' ) ) {
    function themex_kses_post($content) {
        $allowed_tag = array(
            'strong' => [],
            'br' => [],
            'p' => [
                'class' => [],
                'style' => [],
            ],
            'i' => [
                'class' => [],
                'style' => [],
            ],
            'ul' => [
                'class' => [],
                'style' => [],
            ],
            'li' => [
                'class' => [],
                'style' => [],
            ],
            'span' => [
                'class' => [],
                'style' => [],
            ],
            'a' => [
                'href' => [],
                'class' => []
            ],
            'div' => [
                'class' => [],
                'style' => [],
            ],
            'h1' => [
                'class' => [],
                'style' => []
            ],
            'h2' => [
                'class' => [],
                'style' => []
            ],
            'h3' => [
                'class' => [],
                'style' => []
            ],
            'h4' => [
                'class' => [],
                'style' => []
            ],
            'h5' => [
                'class' => [],
                'style' => []
            ],
            'h6' => [
                'class' => [],
                'style' => []
            ],
            'img' => [
                'class' => [],
                'style' => [],
                'height' => [],
                'width' => [],
                'src' => [],
                'srcset' => [],
                'alt' => [],
            ],

        );
        return wp_kses($content, $allowed_tag);
    }
}

