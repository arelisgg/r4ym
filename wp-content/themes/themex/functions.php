<?php
/**
 * themex functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package themex
 */


if ( ! function_exists( 'themex_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function themex_setup() {

	load_theme_textdomain( 'themex', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-formats', array( 'gallery', 'quote', 'video', 'audio' ) );
	add_image_size( 'themex-blog-default', 390, 320, true );
	add_image_size( 'themex-blog6-default', 390, 250, true );
	add_image_size( 'themex-blog-default2', 370, 430, true );
	add_image_size( 'themex-blog-default8', 370, 440, true );
	add_image_size( 'themex-event-default', 420, 350, true );
	add_image_size( 'themex-event-370-450', 370, 450, true );
	add_image_size( 'themex-blog-single', 900, 550, true );
	add_image_size( 'themex-event-single', 770, 450, true );
	add_image_size( 'themex-blog-both', 570, 350, true );
	add_image_size( 'themex-team', 450, 450, true );
	add_image_size( 'themex-testimonial', 106, 106, true );
	add_image_size( 'themex-single-portfolio', 1170, 600, true );
	add_image_size( 'themex-gallery-thumb', 560, 560, true );
	add_image_size( 'themex_recent_image', 70, 70, true );	
	add_theme_support('woocommerce');
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );						
	add_theme_support( 'post-thumbnails' );
	add_editor_style();
	add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );
	register_nav_menus( array(
		'menu-top' => esc_html__( 'Top Menu', 'themex' ),
		'menu-1' => esc_html__( 'Main Menu', 'themex' ),
		'one-pages' => esc_html__( 'One Page Menu', 'themex' ),		
		'menu-2' => esc_html__( 'Footer Menu', 'themex' ),
		'menu-3' => esc_html__( 'Mobile Menu', 'themex' ),
	) );
	
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'custom-background', apply_filters( 'themex_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'themex_setup' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
*visual composer 
*/

// load redux
if ( class_exists('ReduxFrameworkPlugin') ) {
	require get_template_directory(). '/includes/twr-option-framework.php';
}
require get_template_directory(). '/includes/twr-global-function.php';
require get_template_directory(). '/includes/twr-breadcrumb.php';
require get_template_directory(). '/includes/twr-tgm-activation.php';
require get_template_directory(). '/includes/twr-wooconfig.php';

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function themex_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'themex_content_width', 1140 );
}
add_action( 'after_setup_theme', 'themex_content_width', 0 );





/**
 *Register Fonts
*/
if(!function_exists('themex_fonts_url')){
	
	function themex_fonts_url(){
	 $fonts_url = '';
	 
	 /* Translators: If there are characters in your language that are not
	 * supported by Roboto, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	 $themex_font1 = _x( 'on', 'Epilogue font: on or off', 'themex' );
	 $themex_font2 = _x( 'on', 'Epilogue  font: on or off', 'themex' );
	 
	 if ( 'off' !== $themex_font1 ) {
	 $font_families = array();
	 }
	 
	 if ( 'off' !== $themex_font1 ) {
	 $font_families[] = 'Epilogue:100,200,300,400,500,600,700,800,900';
	 }
	 
	 if ( 'off' !== $themex_font2 ) {
	 $font_families[] = 'Epilogue:100,200,300,400,500,600,700,800,900';
	 }

	if ( $font_families ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		), 'https://fonts.googleapis.com/css' );
	}
	 
	 
	 
	 return esc_url_raw( $fonts_url ); 
	}
	
}


// load style
if(!function_exists('themex_styles')){

	function themex_styles(){
		global $themex_opt;	
		global $post;
		$txbdm_header_topa = get_post_meta( get_the_ID(),'_txbdm_header_topa', true );
		$toptsst = get_post_meta( get_the_ID(),'_txbdm_toptsst', true );
		$twr_menu_header_style = get_post_meta( get_the_ID(),'_txbdm_menu_header_style', true );
		
		if ( is_rtl() ) {
		wp_register_style( 'themex-fonts', themex_fonts_url(), array() );
		wp_register_style('venobox', get_template_directory_uri() .'/venobox/venobox.css');
		wp_register_style('slickcss', get_template_directory_uri() .'/assets/css/slick.min.css');
		wp_register_style('niceselect', get_template_directory_uri() .'/assets/css/niceselect.css');			
		wp_register_style('hamburger', get_template_directory_uri() .'/assets/css/hamburger.rtl.css');
		wp_register_style('meanmenu', get_template_directory_uri() .'/assets/css/meanmenu.rtl.css');
		wp_register_style('top_menu', get_template_directory_uri() .'/assets/css/top_menu.rtl.css');
		wp_register_style('top_middle', get_template_directory_uri() .'/assets/css/top_middle.rtl.css');
		wp_register_style('themex_main_style', get_template_directory_uri() .'/assets/css/main_style.rtl.css');
		wp_register_style('twr_theme_color', get_template_directory_uri() .'/assets/css/twr_theme_color.rtl.css');		
		wp_register_style( 'themex_style', get_stylesheet_uri() );	
		wp_register_style('themex_responsive', get_template_directory_uri() .'/assets/css/responsive.rtl.css');	

		wp_enqueue_style( 'themex-fonts' );
		wp_enqueue_style('bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.min.rtl.css');	
		 if ( !empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==16 || $twr_menu_header_style==16 ){
			wp_enqueue_style( 'hamburger' );
		 }					 
		wp_enqueue_style( 'venobox' );
		wp_enqueue_style( 'slickcss' );
		 if ( !empty($themex_opt['themex_header_top_hide']) && $themex_opt['themex_header_top_hide']==true || $txbdm_header_topa==1 ){
			wp_enqueue_style( 'top_menu' );
		 }	
		 if ( !empty($themex_opt['themex_header_top_two_hide']) && $themex_opt['themex_header_top_two_hide']==true || $toptsst==1 ){
			wp_enqueue_style( 'top_middle' );
		 }			
	
		
		/*
		 * Enqueueing JavaScript Files
		 */		
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-3.11.2.min.js', array(), '3.11.2', true );
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.5', true );
		wp_enqueue_script( 'meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.min.js', array('jquery'), '3.3.5', true );
		wp_register_script( 'headroom', get_template_directory_uri() . '/assets/js/headroom.js', array('jquery'), '3.3.5', true );
		wp_register_script( 'slick.min', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '3.3.5', true );
		wp_enqueue_script( 'theme-plugin', get_template_directory_uri() . '/assets/js/theme-pluginjs.js', array('jquery'), '3.2.4', true );		
		wp_enqueue_script( 'imagesloaded');
		wp_register_script( 'niceselect', get_template_directory_uri() . '/assets/js/niceselect.js', array('jquery'), '3.3.5', true );		
		wp_register_script( 'owlcarousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '3.3.5', true );		
		wp_enqueue_script( 'venobox', get_template_directory_uri() . '/venobox/venobox.min.js', array('jquery'), '3.2.4', true );
				
		
		wp_enqueue_script( 'slickjs' );
		if ( class_exists( 'WooCommerce' ) ) {
			wp_register_style('woo_theme', get_template_directory_uri() .'/assets/css/woo_theme.rtl.css');
			wp_enqueue_style( 'woo_theme' );
			
			if ( is_shop() || is_tax( 'product_cat' ) || is_singular( 'product' ) || is_tax( 'product_tag' ) || is_checkout() || is_account_page() || is_checkout() || is_checkout()) {
				wp_enqueue_style( 'woo_theme' );
			}
			if ( is_shop() || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) {
				wp_enqueue_style( 'niceselect' );
				wp_enqueue_script( 'niceselect' );
			}
		}			
		
		/* headroom menu js */
		 if ( !empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==11 || $twr_menu_header_style==11 ){
			wp_enqueue_script( 'headroom' );
		 }			
		/* main theme js */
		wp_enqueue_script( 'themex-themes', get_template_directory_uri() . '/assets/js/theme.rtl.js', array('jquery'), '3.2.4', true );
		
		wp_enqueue_style( 'meanmenu' );
		wp_enqueue_style( 'themex_main_style' );
		wp_enqueue_style( 'twr_theme_color' );		
		wp_enqueue_style( 'themex_style' );		
		wp_enqueue_style( 'themex_responsive' );

		
				 
		}else{		
			
		wp_register_style( 'themex-fonts', themex_fonts_url(), array() );			
		wp_register_style('venobox', get_template_directory_uri() .'/venobox/venobox.css');	
		wp_register_style('slickcss', get_template_directory_uri() .'/assets/css/slick.min.css');			
		wp_register_style('niceselect', get_template_directory_uri() .'/assets/css/niceselect.css');
		wp_register_style('hamburger', get_template_directory_uri() .'/assets/css/hamburger.css');
		wp_register_style('meanmenu', get_template_directory_uri() .'/assets/css/meanmenu.css');
		wp_register_style('top_menu', get_template_directory_uri() .'/assets/css/top_menu.min.css');
		wp_register_style('top_middle', get_template_directory_uri() .'/assets/css/top_middle.min.css');
		wp_register_style('themex_main_style', get_template_directory_uri() .'/assets/css/main_style.min.css');
		wp_register_style('twr_theme_color', get_template_directory_uri() .'/assets/css/twr_theme_color.min.css');		
		wp_register_style( 'themex_style', get_stylesheet_uri() );	
		wp_register_style('themex_responsive', get_template_directory_uri() .'/assets/css/responsive.min.css');	

		wp_enqueue_style( 'themex-fonts' );
		wp_enqueue_style('bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css');	
		 if ( !empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==16 || $twr_menu_header_style==16 ){
			wp_enqueue_style( 'hamburger' );
		 }					 
		wp_enqueue_style( 'venobox' );
		wp_enqueue_style( 'slickcss' );
		 if ( !empty($themex_opt['themex_header_top_hide']) && $themex_opt['themex_header_top_hide']==true || $txbdm_header_topa==1 ){
			wp_enqueue_style( 'top_menu' );
		 }	
		 if ( !empty($themex_opt['themex_header_top_two_hide']) && $themex_opt['themex_header_top_two_hide']==true || $toptsst==1 ){
			wp_enqueue_style( 'top_middle' );
		 }			
	
		
		/*
		 * Enqueueing JavaScript Files
		 */		
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-3.11.2.min.js', array(), '3.11.2', true );
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.5', true );
		wp_enqueue_script( 'meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.min.js', array('jquery'), '3.3.5', true );
		wp_register_script( 'headroom', get_template_directory_uri() . '/assets/js/headroom.js', array('jquery'), '3.3.5', true );
		wp_register_script( 'slick.min', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '3.3.5', true );
		wp_enqueue_script( 'theme-plugin', get_template_directory_uri() . '/assets/js/theme-pluginjs.js', array('jquery'), '3.2.4', true );		
		wp_enqueue_script( 'imagesloaded');
		wp_register_script( 'niceselect', get_template_directory_uri() . '/assets/js/niceselect.js', array('jquery'), '3.3.5', true );		
		wp_register_script( 'owlcarousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '3.3.5', true );		
		wp_enqueue_script( 'venobox', get_template_directory_uri() . '/venobox/venobox.min.js', array('jquery'), '3.2.4', true );
				
		
		wp_enqueue_script( 'slickjs' );
		if ( class_exists( 'WooCommerce' ) ) {
			wp_register_style('woo_theme', get_template_directory_uri() .'/assets/css/woo_theme.min.css');
			wp_enqueue_style( 'woo_theme' );
			
			if ( is_shop() || is_tax( 'product_cat' ) || is_singular( 'product' ) || is_tax( 'product_tag' ) || is_checkout() || is_account_page() || is_checkout() || is_checkout()) {
				wp_enqueue_style( 'woo_theme' );
			}
			if ( is_shop() || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) {
				wp_enqueue_style( 'niceselect' );
				wp_enqueue_script( 'niceselect' );
			}
		}			
		
		/* headroom menu js */
		 if ( !empty($themex_opt['twr_defaulth_menu_layout']) && $themex_opt['twr_defaulth_menu_layout']==11 || $twr_menu_header_style==11 ){
			wp_enqueue_script( 'headroom' );
		 }			
		/* main theme js */
		wp_enqueue_script( 'themex-themes', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), '3.2.4', true );
		
		wp_enqueue_style( 'meanmenu' );
		wp_enqueue_style( 'themex_main_style' );
		wp_enqueue_style( 'twr_theme_color' );		
		wp_enqueue_style( 'themex_style' );		
		wp_enqueue_style( 'themex_responsive' );
			 
				 
			 } /* rtl end */
			
						
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}		

	}
	
}

add_action( 'wp_enqueue_scripts', 'themex_styles' );



/**
 * themex widget js
 */
 if(!function_exists('themex_media_scripts')){
	 
	function themex_media_scripts() {
		wp_enqueue_media();
		wp_enqueue_script('themex-uploader', get_template_directory_uri() .'/assets/js/twr_uploader.js', false, '', true );
	}
 }
add_action('admin_enqueue_scripts', 'themex_media_scripts');



/* Content word count */
if(!function_exists('themex_read_more')){
		
	function themex_read_more($limit){
		$content = explode(' ', get_the_content());
		$count   = array_slice($content, 0 , $limit);
		echo implode (' ', $count);
	}
}

/*  Title word count */
if(!function_exists('the_title')){
	
	function the_title($limit){
		$title = explode(' ' , get_the_title());
		$titles = array_slice($title , 0, $limit);
		echo implode(' ', $titles);
	}
	
}


/**
 * Register widget area.
 */
if(!function_exists('themex_widgets_init')){
	
	function themex_widgets_init() {
				
		register_sidebar( array(
			'name'          => esc_html__( 'Blog Left Sidebar', 'themex' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'themex' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Blog Right Sidebar', 'themex' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'themex' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Page Left Sidebar', 'themex' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add widgets here.', 'themex' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Page Right Sidebar', 'themex' ),
			'id'            => 'sidebar-4',
			'description'   => esc_html__( 'Add widgets here.', 'themex' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'themex' ),
			'id'            => 'sidebar_shop',
			'description'   => esc_html__( 'Add widgets here.', 'themex' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Popup Main Menu Sidebar', 'themex' ),
			'id'            => 'sidebar-pop-mainmenu',
			'description'   => esc_html__( 'Add Widgets Here, Only Working Menu Style 23 Number.', 'themex' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );		
		register_sidebar( array(
			'name'          => esc_html__( 'Popup Menu Sidebar', 'themex' ),
			'id'            => 'sidebar-pop',
			'description'   => esc_html__( 'Add widgets here.', 'themex' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );


		
		/**
		 * Register Footer Sidebars
		 */
			register_sidebar( array(
				'id'		=> 'twr-footer-1',
				'name'		=> esc_html__( 'Footer widget 1', 'themex' ),
				'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<h2 class="widget-title">',
				'after_title'	=> '</h2>',
			) );
			register_sidebar( array(
				'id'		=> 'twr-footer-2',
				'name'		=> esc_html__( 'Footer widget 2', 'themex' ),
				'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<h2 class="widget-title">',
				'after_title'	=> '</h2>',
			) );
			register_sidebar( array(
				'id'		=> 'twr-footer-3',
				'name'		=> esc_html__( 'Footer widget 3', 'themex' ),
				'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<h2 class="widget-title">',
				'after_title'	=> '</h2>',
			) );
			register_sidebar( array(
				'id'		=> 'twr-footer-4',
				'name'		=> esc_html__( 'Footer widget 4', 'themex' ),
				'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<h2 class="widget-title">',
				'after_title'	=> '</h2>',
			) );			

		
	}
		
}
add_action( 'widgets_init', 'themex_widgets_init' );
	
