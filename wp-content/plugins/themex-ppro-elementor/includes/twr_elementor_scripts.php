<?php

if ( ! defined( 'ABSPATH' ) ) exit; 
if ( !class_exists( 'Twr_Elementor_Scripts' ) ) {
class Twr_Elementor_Scripts{

    private static $instance = null;
    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct(){
		
	add_action( 'admin_enqueue_scripts', [ $this, 'twr_media_scripts' ] );	
	/* Register Widget Scripts */
	add_action( 'elementor/frontend/after_register_scripts', [ $this, 'twr_after_register_scripts' ] );
	add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'twr_after_register_scripts' ] );
	add_action( 'wp_enqueue_scripts', [ $this, 'twr_add_css' ] );		
	add_action( 'wp_enqueue_scripts', [ $this, 'twr_add_js' ] );
	/* Register Elementor Editor Style */
	add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'twr_elementor_after_editor_style' ] );
	add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'twr_elementor_before_editor_styles' ] );
	add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'twr_after_enqueue_styles' ] );	
	
    }

	public function twr_after_enqueue_styles() {
		/* jquery plugin css */
		wp_register_style( 'themify-icons', TMAINV_EXTENSION_URI. 'assets/css/themify-icons.css' );
		wp_enqueue_style( 'themify-icons' );
		wp_enqueue_style( 'swipercss', TMAINV_EXTENSION_URI. 'assets/css/jqueryplugincss/txbd-swiper-bundle.min.css' );		
		wp_enqueue_style( 'animatecss', TMAINV_EXTENSION_URI. 'assets/css/jqueryplugincss/animate.css' );		
		wp_register_style( 'slickcss', TMAINV_EXTENSION_URI. 'assets/css/jqueryplugincss/slick.min.css' );
		wp_register_style( 'animateheadingcss', TMAINV_EXTENSION_URI. 'assets/css/jqueryplugincss/animate_text.css' );
		/* theme css part */
		
		if ( is_rtl() ) {
		/* unminify style 
		wp_register_style( 'wabout', TMAINV_EXTENSION_URI. 'assets/css/maincss/wabout.css' );
		wp_register_style( 'waccod', TMAINV_EXTENSION_URI. 'assets/css/maincss/waccod.css' );
		wp_register_style( 'wbanner', TMAINV_EXTENSION_URI. 'assets/css/maincss/wbanner.css' );
		wp_register_style( 'wbanner2', TMAINV_EXTENSION_URI. 'assets/css/maincss/wbanner2.css' );
		wp_register_style( 'wblog', TMAINV_EXTENSION_URI. 'assets/css/maincss/wblog.css' );
		wp_register_style( 'wbtn', TMAINV_EXTENSION_URI. 'assets/css/maincss/wbtn.css' );
		wp_register_style( 'wbtnapp', TMAINV_EXTENSION_URI. 'assets/css/maincss/wbtnapp.css' );
		wp_register_style( 'wbtnclasic', TMAINV_EXTENSION_URI. 'assets/css/maincss/wbtnclasic.css' );
		wp_register_style( 'wcalltoac', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcalltoac.css' );
		wp_register_style( 'wcontact', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcontact.css' );
		wp_register_style( 'wcountdown', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcountdown.css' );
		wp_register_style( 'wcounter', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcounter.css' );
		wp_register_style( 'wcircle', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcircle.css' );
		wp_register_style( 'wcase', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcase.css' );
		wp_register_style( 'wcaouses', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcouses.css' );
		wp_register_style( 'wcreativetab', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcreativetab.css' );
		wp_register_style( 'wcustomicon', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcustomicon.css' );
		wp_register_style( 'wevent', TMAINV_EXTENSION_URI. 'assets/css/maincss/wevent.css' );
		wp_register_style( 'wevschedule', TMAINV_EXTENSION_URI. 'assets/css/maincss/wevschedule.css' );
		wp_register_style( 'wfeature', TMAINV_EXTENSION_URI. 'assets/css/maincss/wfeature.css' );
		wp_register_style( 'wfeature2', TMAINV_EXTENSION_URI. 'assets/css/maincss/wfeature2.css' );
		wp_register_style( 'wfeaturecl', TMAINV_EXTENSION_URI. 'assets/css/maincss/wfeaturecl.css' );
		wp_register_style( 'wfoterwidget', TMAINV_EXTENSION_URI. 'assets/css/maincss/wfoterwidget.css' );
		wp_register_style( 'wimagecom', TMAINV_EXTENSION_URI. 'assets/css/maincss/wimagecom.css' );
		wp_register_style( 'wimagecl', TMAINV_EXTENSION_URI. 'assets/css/maincss/wimagecl.css' );
		wp_register_style( 'wimagegallery', TMAINV_EXTENSION_URI. 'assets/css/maincss/wimagegallery.css' );
		wp_register_style( 'wimagetextcl', TMAINV_EXTENSION_URI. 'assets/css/maincss/wimagetextcl.css' );
		wp_register_style( 'wlist', TMAINV_EXTENSION_URI. 'assets/css/maincss/wlist.css' );
		wp_register_style( 'wmordal', TMAINV_EXTENSION_URI. 'assets/css/maincss/wmordal.css' );
		wp_register_style( 'wnivo', TMAINV_EXTENSION_URI. 'assets/css/maincss/wnivo.css' );
		wp_register_style( 'wnotice', TMAINV_EXTENSION_URI. 'assets/css/maincss/wnotice.css' );
		wp_register_style( 'wportfolio', TMAINV_EXTENSION_URI. 'assets/css/maincss/wportfolio.css' );
		wp_register_style( 'wportfoliocl', TMAINV_EXTENSION_URI. 'assets/css/maincss/wportfoliocl.css' );
		wp_register_style( 'wpricing', TMAINV_EXTENSION_URI. 'assets/css/maincss/wpricing.css' );
		wp_register_style( 'wprocess', TMAINV_EXTENSION_URI. 'assets/css/maincss/wprocess.css' );
		wp_register_style( 'wprogress', TMAINV_EXTENSION_URI. 'assets/css/maincss/wprogress.css' );
		wp_register_style( 'wscoilicons', TMAINV_EXTENSION_URI. 'assets/css/maincss/wscoilicons.css' );
		wp_register_style( 'wscreencl', TMAINV_EXTENSION_URI. 'assets/css/maincss/wscreencl.css' );
		wp_register_style( 'wservice', TMAINV_EXTENSION_URI. 'assets/css/maincss/wservice.css' );
		wp_register_style( 'wservice2', TMAINV_EXTENSION_URI. 'assets/css/maincss/wservice2.css' );
		wp_register_style( 'wservicepost', TMAINV_EXTENSION_URI. 'assets/css/maincss/wservicepost.css' );
		wp_register_style( 'wshape', TMAINV_EXTENSION_URI. 'assets/css/maincss/wshape.css' );
		wp_register_style( 'wshowdtails', TMAINV_EXTENSION_URI. 'assets/css/maincss/wshowdtails.css' );
		wp_register_style( 'wsimage', TMAINV_EXTENSION_URI. 'assets/css/maincss/wsimage.css' );
		wp_register_style( 'wsocialfeed', TMAINV_EXTENSION_URI. 'assets/css/maincss/wsocialfeed.css' );
		wp_register_style( 'wsslick', TMAINV_EXTENSION_URI. 'assets/css/maincss/wsslick.css' );
		wp_register_style( 'wsslick2', TMAINV_EXTENSION_URI. 'assets/css/maincss/wsslick2.css' );
		wp_register_style( 'wsswifer', TMAINV_EXTENSION_URI. 'assets/css/maincss/wsswifer.css' );
		wp_register_style( 'wstab', TMAINV_EXTENSION_URI. 'assets/css/maincss/wstab.css' );
		wp_register_style( 'wtabpost', TMAINV_EXTENSION_URI. 'assets/css/maincss/wtabpost.css' );
		wp_register_style( 'wteam', TMAINV_EXTENSION_URI. 'assets/css/maincss/wteam.css' );
		wp_register_style( 'wteampost', TMAINV_EXTENSION_URI. 'assets/css/maincss/wteampost.css' );
		wp_register_style( 'wtestimonia', TMAINV_EXTENSION_URI. 'assets/css/maincss/wtestimonia.css' );
		wp_register_style( 'wtestimonialpost', TMAINV_EXTENSION_URI. 'assets/css/maincss/wtestimonialpost.css' );
		wp_register_style( 'wtextwidget', TMAINV_EXTENSION_URI. 'assets/css/maincss/wtextwidget.css' );
		wp_register_style( 'wtimeline', TMAINV_EXTENSION_URI. 'assets/css/maincss/wtimeline.css' );
		wp_register_style( 'verticletimeline', TMAINV_EXTENSION_URI. 'assets/css/maincss/verticletimeline.css' );
		wp_register_style( 'wtitle', TMAINV_EXTENSION_URI. 'assets/css/maincss/wtitle.css' );
		wp_register_style( 'wvideo', TMAINV_EXTENSION_URI. 'assets/css/maincss/wvideo.css' );
		wp_register_style( 'wwooproduct', TMAINV_EXTENSION_URI. 'assets/css/maincss/wwooproduct.css' );
		wp_enqueue_style( 'style_plugin', TMAINV_EXTENSION_URI. 'assets/css/maincss/style.plugin.css' );		
		wp_enqueue_style( 'allcolor', TMAINV_EXTENSION_URI. 'assets/css/maincss/all_color.css' );
		*/
		
		/* RTL style */
		wp_register_style( 'wabout', TMAINV_EXTENSION_URI. 'assets/css/maincss/wabout.rtl.css' );
		wp_register_style( 'waccod', TMAINV_EXTENSION_URI. 'assets/css/maincss/waccod.rtl.css' );
		wp_register_style( 'wblog', TMAINV_EXTENSION_URI. 'assets/css/maincss/wblog.rtl.css' );
		wp_register_style( 'wbtn', TMAINV_EXTENSION_URI. 'assets/css/maincss/wbtn.rtl.css' );
		wp_enqueue_style( 'wbtn' );
		wp_register_style( 'wbtnapp', TMAINV_EXTENSION_URI. 'assets/css/maincss/wbtnapp.rtl.css' );
		wp_register_style( 'wbtnclasic', TMAINV_EXTENSION_URI. 'assets/css/maincss/wbtnclasic.rtl.css' );
		wp_register_style( 'wcalltoac', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcalltoac.rtl.css' );
		wp_register_style( 'wcontact', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcontact.rtl.css' );
		wp_register_style( 'wcountdown', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcountdown.rtl.css' );
		wp_register_style( 'wcounter', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcounter.rtl.css' );
		wp_register_style( 'wcircle', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcircle.rtl.css' );
		wp_register_style( 'wcase', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcase.rtl.css' );
		wp_register_style( 'wcaouses', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcouses.rtl.css' );
		wp_register_style( 'wcreativetab', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcreativetab.rtl.css' );
		wp_register_style( 'wcustomicon', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcustomicon.rtl.css' );
		wp_register_style( 'wevent', TMAINV_EXTENSION_URI. 'assets/css/maincss/wevent.rtl.css' );
		wp_register_style( 'wevschedule', TMAINV_EXTENSION_URI. 'assets/css/maincss/wevschedule.rtl.css' );
		wp_register_style( 'wfeature', TMAINV_EXTENSION_URI. 'assets/css/maincss/wfeature.rtl.css' );
		wp_register_style( 'wfeature2', TMAINV_EXTENSION_URI. 'assets/css/maincss/wfeature2.rtl.css' );
		wp_register_style( 'wfeaturecl', TMAINV_EXTENSION_URI. 'assets/css/maincss/wfeaturecl.rtl.css' );
		wp_register_style( 'wfoterwidget', TMAINV_EXTENSION_URI. 'assets/css/maincss/wfoterwidget.rtl.css' );
		wp_register_style( 'wimagecom', TMAINV_EXTENSION_URI. 'assets/css/maincss/wimagecom.rtl.css' );
		wp_register_style( 'wimagecl', TMAINV_EXTENSION_URI. 'assets/css/maincss/wimagecl.rtl.css' );
		wp_register_style( 'wimagegallery', TMAINV_EXTENSION_URI. 'assets/css/maincss/wimagegallery.rtl.css' );
		wp_register_style( 'wimagetextcl', TMAINV_EXTENSION_URI. 'assets/css/maincss/wimagetextcl.rtl.css' );
		wp_register_style( 'wlist', TMAINV_EXTENSION_URI. 'assets/css/maincss/wlist.rtl.css' );
		wp_register_style( 'wmordal', TMAINV_EXTENSION_URI. 'assets/css/maincss/wmordal.rtl.css' );
		wp_register_style( 'wnivo', TMAINV_EXTENSION_URI. 'assets/css/maincss/wnivo.rtl.css' );
		wp_enqueue_style( 'wnivo' );
		wp_register_style( 'wnotice', TMAINV_EXTENSION_URI. 'assets/css/maincss/wnotice.rtl.css' );
		wp_register_style( 'wportfolio', TMAINV_EXTENSION_URI. 'assets/css/maincss/wportfolio.rtl.css' );
		wp_register_style( 'wportfoliocl', TMAINV_EXTENSION_URI. 'assets/css/maincss/wportfoliocl.rtl.css' );
		wp_register_style( 'wpricing', TMAINV_EXTENSION_URI. 'assets/css/maincss/wpricing.rtl.css' );
		wp_register_style( 'wprocess', TMAINV_EXTENSION_URI. 'assets/css/maincss/wprocess.rtl.css' );
		wp_register_style( 'wprogress', TMAINV_EXTENSION_URI. 'assets/css/maincss/wprogress.rtl.css' );
		wp_register_style( 'wscoilicons', TMAINV_EXTENSION_URI. 'assets/css/maincss/wscoilicons.rtl.css' );
		wp_register_style( 'wscreencl', TMAINV_EXTENSION_URI. 'assets/css/maincss/wscreencl.rtl.css' );
		wp_register_style( 'wservice', TMAINV_EXTENSION_URI. 'assets/css/maincss/wservice.rtl.css' );
		wp_register_style( 'wservice2', TMAINV_EXTENSION_URI. 'assets/css/maincss/wservice2.rtl.css' );
		wp_register_style( 'wservicepost', TMAINV_EXTENSION_URI. 'assets/css/maincss/wservicepost.rtl.css' );
		wp_register_style( 'wshape', TMAINV_EXTENSION_URI. 'assets/css/maincss/wshape.rtl.css' );
		wp_register_style( 'wshowdtails', TMAINV_EXTENSION_URI. 'assets/css/maincss/wshowdtails.rtl.css' );
		wp_register_style( 'wsimage', TMAINV_EXTENSION_URI. 'assets/css/maincss/wsimage.rtl.css' );
		wp_register_style( 'wsocialfeed', TMAINV_EXTENSION_URI. 'assets/css/maincss/wsocialfeed.rtl.css' );
		wp_register_style( 'wstab', TMAINV_EXTENSION_URI. 'assets/css/maincss/wstab.rtl.css' );
		wp_register_style( 'wtabpost', TMAINV_EXTENSION_URI. 'assets/css/maincss/wtabpost.rtl.css' );
		wp_register_style( 'wteam', TMAINV_EXTENSION_URI. 'assets/css/maincss/wteam.rtl.css' );
		wp_register_style( 'wteampost', TMAINV_EXTENSION_URI. 'assets/css/maincss/wteampost.rtl.css' );
		wp_register_style( 'wtestimonia', TMAINV_EXTENSION_URI. 'assets/css/maincss/wtestimonia.rtl.css' );
		wp_register_style( 'wtestimonialpost', TMAINV_EXTENSION_URI. 'assets/css/maincss/wtestimonialpost.rtl.css' );
		wp_register_style( 'wtextwidget', TMAINV_EXTENSION_URI. 'assets/css/maincss/wtextwidget.rtl.css' );
		wp_register_style( 'wtimeline', TMAINV_EXTENSION_URI. 'assets/css/maincss/wtimeline.rtl.css' );
		wp_register_style( 'verticletimeline', TMAINV_EXTENSION_URI. 'assets/css/maincss/verticletimeline.rtl.css' );
		wp_register_style( 'wtitle', TMAINV_EXTENSION_URI. 'assets/css/maincss/wtitle.rtl.css' );
		wp_register_style( 'wvideo', TMAINV_EXTENSION_URI. 'assets/css/maincss/wvideo.rtl.css' );
		wp_register_style( 'wwooproduct', TMAINV_EXTENSION_URI. 'assets/css/maincss/wwooproduct.rtl.css' );	
		wp_register_style( 'wbanner', TMAINV_EXTENSION_URI. 'assets/css/maincss/wbanner.rtl.css' );
		wp_enqueue_style( 'wbanner' );
		wp_register_style( 'wbanner2', TMAINV_EXTENSION_URI. 'assets/css/maincss/wbanner2.rtl.css' );
		wp_enqueue_style( 'wbanner2' );		
		wp_register_style( 'wsslick', TMAINV_EXTENSION_URI. 'assets/css/maincss/wsslick.rtl.css' );
		wp_enqueue_style( 'wsslick' );
		wp_register_style( 'wsslick2', TMAINV_EXTENSION_URI. 'assets/css/maincss/wsslick2.rtl.css' );
		wp_enqueue_style( 'wsslick2' );
		wp_register_style( 'wsswifer', TMAINV_EXTENSION_URI. 'assets/css/maincss/wsswifer.rtl.css' );
		wp_enqueue_style( 'wsswifer' );		
		wp_enqueue_style( 'allcolor', TMAINV_EXTENSION_URI. 'assets/css/maincss/all_color.rtl.css' );		
		
		
		
		
		}else{
			
		/* Minify style */
		wp_register_style( 'wabout', TMAINV_EXTENSION_URI. 'assets/css/maincss/wabout.min.css' );
		wp_register_style( 'waccod', TMAINV_EXTENSION_URI. 'assets/css/maincss/waccod.min.css' );
		wp_register_style( 'wblog', TMAINV_EXTENSION_URI. 'assets/css/maincss/wblog.min.css' );
		wp_register_style( 'wbtn', TMAINV_EXTENSION_URI. 'assets/css/maincss/wbtn.min.css' );
		wp_enqueue_style( 'wbtn' );
		wp_register_style( 'wbtnapp', TMAINV_EXTENSION_URI. 'assets/css/maincss/wbtnapp.min.css' );
		wp_register_style( 'wbtnclasic', TMAINV_EXTENSION_URI. 'assets/css/maincss/wbtnclasic.min.css' );
		wp_register_style( 'wcalltoac', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcalltoac.min.css' );
		wp_register_style( 'wcontact', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcontact.min.css' );
		wp_register_style( 'wcountdown', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcountdown.min.css' );
		wp_register_style( 'wcounter', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcounter.min.css' );
		wp_register_style( 'wcircle', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcircle.min.css' );
		wp_register_style( 'wcase', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcase.min.css' );
		wp_register_style( 'wcaouses', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcouses.min.css' );
		wp_register_style( 'wcreativetab', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcreativetab.min.css' );
		wp_register_style( 'wcustomicon', TMAINV_EXTENSION_URI. 'assets/css/maincss/wcustomicon.min.css' );
		wp_register_style( 'wevent', TMAINV_EXTENSION_URI. 'assets/css/maincss/wevent.min.css' );
		wp_register_style( 'wevschedule', TMAINV_EXTENSION_URI. 'assets/css/maincss/wevschedule.min.css' );
		wp_register_style( 'wfeature', TMAINV_EXTENSION_URI. 'assets/css/maincss/wfeature.min.css' );
		wp_register_style( 'wfeature2', TMAINV_EXTENSION_URI. 'assets/css/maincss/wfeature2.min.css' );
		wp_register_style( 'wfeaturecl', TMAINV_EXTENSION_URI. 'assets/css/maincss/wfeaturecl.min.css' );
		wp_register_style( 'wfoterwidget', TMAINV_EXTENSION_URI. 'assets/css/maincss/wfoterwidget.min.css' );
		wp_register_style( 'wimagecom', TMAINV_EXTENSION_URI. 'assets/css/maincss/wimagecom.min.css' );
		wp_register_style( 'wimagecl', TMAINV_EXTENSION_URI. 'assets/css/maincss/wimagecl.min.css' );
		wp_register_style( 'wimagegallery', TMAINV_EXTENSION_URI. 'assets/css/maincss/wimagegallery.min.css' );
		wp_register_style( 'wimagetextcl', TMAINV_EXTENSION_URI. 'assets/css/maincss/wimagetextcl.min.css' );
		wp_register_style( 'wlist', TMAINV_EXTENSION_URI. 'assets/css/maincss/wlist.min.css' );
		wp_register_style( 'wmordal', TMAINV_EXTENSION_URI. 'assets/css/maincss/wmordal.min.css' );
		wp_register_style( 'wnivo', TMAINV_EXTENSION_URI. 'assets/css/maincss/wnivo.min.css' );
		wp_enqueue_style( 'wnivo' );
		wp_register_style( 'wnotice', TMAINV_EXTENSION_URI. 'assets/css/maincss/wnotice.min.css' );
		wp_register_style( 'wportfolio', TMAINV_EXTENSION_URI. 'assets/css/maincss/wportfolio.min.css' );
		wp_register_style( 'wportfoliocl', TMAINV_EXTENSION_URI. 'assets/css/maincss/wportfoliocl.min.css' );
		wp_register_style( 'wpricing', TMAINV_EXTENSION_URI. 'assets/css/maincss/wpricing.min.css' );
		wp_register_style( 'wprocess', TMAINV_EXTENSION_URI. 'assets/css/maincss/wprocess.min.css' );
		wp_register_style( 'wprogress', TMAINV_EXTENSION_URI. 'assets/css/maincss/wprogress.min.css' );
		wp_register_style( 'wscoilicons', TMAINV_EXTENSION_URI. 'assets/css/maincss/wscoilicons.min.css' );
		wp_register_style( 'wscreencl', TMAINV_EXTENSION_URI. 'assets/css/maincss/wscreencl.min.css' );
		wp_register_style( 'wservice', TMAINV_EXTENSION_URI. 'assets/css/maincss/wservice.min.css' );
		wp_register_style( 'wservice2', TMAINV_EXTENSION_URI. 'assets/css/maincss/wservice2.min.css' );
		wp_register_style( 'wservicepost', TMAINV_EXTENSION_URI. 'assets/css/maincss/wservicepost.min.css' );
		wp_register_style( 'wshape', TMAINV_EXTENSION_URI. 'assets/css/maincss/wshape.min.css' );
		wp_register_style( 'wshowdtails', TMAINV_EXTENSION_URI. 'assets/css/maincss/wshowdtails.min.css' );
		wp_register_style( 'wsimage', TMAINV_EXTENSION_URI. 'assets/css/maincss/wsimage.min.css' );
		wp_register_style( 'wsocialfeed', TMAINV_EXTENSION_URI. 'assets/css/maincss/wsocialfeed.min.css' );
		wp_register_style( 'wstab', TMAINV_EXTENSION_URI. 'assets/css/maincss/wstab.min.css' );
		wp_register_style( 'wtabpost', TMAINV_EXTENSION_URI. 'assets/css/maincss/wtabpost.min.css' );
		wp_register_style( 'wteam', TMAINV_EXTENSION_URI. 'assets/css/maincss/wteam.min.css' );
		wp_register_style( 'wteampost', TMAINV_EXTENSION_URI. 'assets/css/maincss/wteampost.min.css' );
		wp_register_style( 'wtestimonia', TMAINV_EXTENSION_URI. 'assets/css/maincss/wtestimonia.min.css' );
		wp_register_style( 'wtestimonialpost', TMAINV_EXTENSION_URI. 'assets/css/maincss/wtestimonialpost.min.css' );
		wp_register_style( 'wtextwidget', TMAINV_EXTENSION_URI. 'assets/css/maincss/wtextwidget.min.css' );
		wp_register_style( 'wtimeline', TMAINV_EXTENSION_URI. 'assets/css/maincss/wtimeline.min.css' );
		wp_register_style( 'verticletimeline', TMAINV_EXTENSION_URI. 'assets/css/maincss/verticletimeline.min.css' );
		wp_register_style( 'wvideo', TMAINV_EXTENSION_URI. 'assets/css/maincss/wvideo.min.css' );
		wp_register_style( 'wwooproduct', TMAINV_EXTENSION_URI. 'assets/css/maincss/wwooproduct.min.css' );		
		wp_register_style( 'wbanner', TMAINV_EXTENSION_URI. 'assets/css/maincss/wbanner.min.css' );
		wp_enqueue_style( 'wbanner' );
		wp_register_style( 'wbanner2', TMAINV_EXTENSION_URI. 'assets/css/maincss/wbanner2.min.css' );
		wp_enqueue_style( 'wbanner2' );
		wp_register_style( 'wtitle', TMAINV_EXTENSION_URI. 'assets/css/maincss/wtitle.min.css' );
		wp_register_style( 'wsslick', TMAINV_EXTENSION_URI. 'assets/css/maincss/wsslick.min.css' );
		wp_enqueue_style( 'wsslick' );
		wp_register_style( 'wsslick2', TMAINV_EXTENSION_URI. 'assets/css/maincss/wsslick2.min.css' );
		wp_enqueue_style( 'wsslick2' );
		wp_register_style( 'wsswifer', TMAINV_EXTENSION_URI. 'assets/css/maincss/wsswifer.min.css' );
		wp_enqueue_style( 'wsswifer' );
		wp_enqueue_style( 'allcolor', TMAINV_EXTENSION_URI. 'assets/css/maincss/all_color.min.css' );			
			
		}/* end rtl */
	
	
	
	
	
		
	}

	public function twr_after_register_scripts() {
		/*if ( !is_admin() ) {
			wp_deregister_script( 'jquery' );
			wp_register_script( 'jquery', TMAINV_EXTENSION_URI. 'assets/js/vendor/jquery-3.6.0.min.js', false, '3.6.0' );
			wp_enqueue_script( 'jquery' );
		   
		}	*/		
		wp_enqueue_script( 'direction', TMAINV_EXTENSION_URI. 'assets/js/direction.js', 'jquery', TMAINV_VERSION, true );
		wp_register_script( 'nivojs', TMAINV_EXTENSION_URI. 'assets/js/nivo.js', 'jquery', TMAINV_VERSION, true );
		wp_register_script( 'counterupjs', TMAINV_EXTENSION_URI. 'assets/js/jquery.counterup.js', 'jquery', TMAINV_VERSION, true );
		wp_register_script( 'waypointjs', TMAINV_EXTENSION_URI. 'assets/js/waypoint.min.js', 'jquery', TMAINV_VERSION, true );
		wp_register_script( 'countdownjs', TMAINV_EXTENSION_URI. 'assets/js/countdown.js', 'jquery', TMAINV_VERSION, true );
		wp_register_script( 'circlejs', TMAINV_EXTENSION_URI. 'assets/js/circle.js', 'jquery', TMAINV_VERSION, true );
		wp_register_script( 'beersliderjs', TMAINV_EXTENSION_URI. 'assets/js/BeerSlider.js', 'jquery', TMAINV_VERSION, true );
		wp_register_script( 'animateheadingjs', TMAINV_EXTENSION_URI. 'assets/js/animateheading.js', 'jquery', TMAINV_VERSION, true );
		wp_register_script( 'slickjs', TMAINV_EXTENSION_URI. 'assets/js/slick.min.js', 'jquery', TMAINV_VERSION, true );
		wp_enqueue_script( 'scrollup', TMAINV_EXTENSION_URI. 'assets/js/scrollup.js', 'jquery', TMAINV_VERSION, true );
		wp_enqueue_script( 'wowjs', TMAINV_EXTENSION_URI. 'assets/js/wow.js', 'jquery', TMAINV_VERSION, true );
		wp_enqueue_script( 'swiperjs', TMAINV_EXTENSION_URI. 'assets/js/txbd-swiper-bundle.min.js', 'jquery', TMAINV_VERSION, true );
		
         /*   if ( defined( 'ELEMENTOR_VERSION') ) {
                if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {

                }
            }		
		*/
		wp_enqueue_script( 'main-themejs', TMAINV_EXTENSION_URI. 'assets/js/main.theme.js', 'jquery', TMAINV_VERSION, true );
		
		if( class_exists( 'WooCommerce' ) ) {			
			wp_enqueue_script( 'woo-themejs', TMAINV_EXTENSION_URI. 'assets/js/woo.theme.js', 'jquery', TMAINV_VERSION, true );		
		}			

		
		
	}

	public function twr_add_css(){			
		wp_enqueue_style( 'icofont', TMAINV_EXTENSION_URI. 'assets/css/icofont.min.css' );														
	}
	public function twr_add_js(){}		 
	public function twr_media_scripts(){}
	
	/**
	 * [twr_editor_style]
	 * @return [void] Load Editor Scripts
	 */
	public function twr_elementor_after_editor_style() {
		if ( is_rtl() ){
		wp_enqueue_style('twrtx-elementor-editor-rtl', TMAINV_EXTENSION_URI . 'assets/css/admin/twrtx-elementor-editor.css' );			
		}else{
		wp_enqueue_style('twrtx-elementor-editor', TMAINV_EXTENSION_URI . 'assets/css/admin/twrtx-elementor-editor.css' );			
		}		

		
	}
	public function twr_elementor_before_editor_styles() {
		wp_register_style( 'themify-icons', TMAINV_EXTENSION_URI. 'assets/css/themify-icons.css' );
		wp_enqueue_style( 'themify-icons' );
	}


  
}
Twr_Elementor_Scripts::instance();

}