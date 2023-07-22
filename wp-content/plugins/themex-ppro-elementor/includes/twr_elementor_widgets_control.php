<?php

if ( ! defined( 'ABSPATH' ) ) exit; 
if ( !class_exists( 'Twr_Widgets_Control' ) ) {
class Twr_Widgets_Control{

    private static $instance = null;
    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct(){
        /* Register custom category  */
        add_action( 'elementor/elements/categories_registered', [ $this, 'twr_elementor_category' ] );
        /* widgets registered */
        add_action( 'elementor/widgets/register', [ $this, 'twr_widgets' ] );
    }

	/* Elementor Custom Category */
	public function twr_elementor_category ( $elements_manager ) {
		$elements_manager->add_category(
			'witr_tname',
			array(
				'title' => 'THEMEX PRO ADDONS ',
				'icon'  => 'fonts',
			)
		);
	}

	
	
	/* all elementor widget */
	public function twr_widgets() {
		
		
		
 /* call all class name */
 $twr_widget_manager = \Elementor\Plugin::instance()->widgets_manager;		
 /* call the elementor widget file */
 $witr_about = twr_get_option( 'witr_about', 'twr_basics', 'on' );
 $witr_accordion = twr_get_option( 'witr_accordion', 'twr_basics', 'on' );
 $witr_animate_text = twr_get_option( 'witr_animate_text', 'twr_basics', 'on' );
 $witr_apps_button = twr_get_option( 'witr_apps_button', 'twr_basics', 'on' );
 $witr_animate_slider = twr_get_option( 'witr_animate_slider', 'twr_basics', 'on' );
 $witr_banner_slider = twr_get_option( 'witr_banner_slider', 'twr_basics', 'on' );
 $witr_banner_slider2 = twr_get_option( 'witr_banner_slider2', 'twr_basics', 'on' );
 $witr_blog = twr_get_option( 'witr_blog', 'twr_basics', 'on' );
 $witr_button = twr_get_option( 'witr_button', 'twr_basics', 'on' );
 $witr_button_classic = twr_get_option( 'witr_button_classic', 'twr_basics', 'on' );
 $witr_counter = twr_get_option( 'witr_counter', 'twr_basics', 'on' );
 $witr_conudowntime = twr_get_option( 'witr_conudowntime', 'twr_basics', 'on' );
 $witr_carousel_image = twr_get_option( 'witr_carousel_image', 'twr_basics', 'on' );
 $witr_carousel_imagetext = twr_get_option( 'witr_carousel_imagetext', 'twr_basics', 'on' );
 $witr_call_to_action = twr_get_option( 'witr_call_to_action', 'twr_basics', 'on' );
 $witr_circle_progress = twr_get_option( 'witr_circle_progress', 'twr_basics', 'on' );
 $witr_creative_tab = twr_get_option( 'witr_creative_tab', 'twr_basics', 'on' );
 $witr_case = twr_get_option( 'witr_case', 'twr_basics', 'on' );
 $witr_causes = twr_get_option( 'witr_causes', 'twr_basics', 'on' );
 $witr_custom_icons = twr_get_option( 'witr_custom_icons', 'twr_basics', 'on' );
 $witr_event = twr_get_option( 'witr_event', 'twr_basics', 'on' );
 $witr_feature = twr_get_option( 'witr_feature', 'twr_basics', 'on' );
 $witr_feature2 = twr_get_option( 'witr_feature2', 'twr_basics', 'on' );
 $witr_feature_carousel = twr_get_option( 'witr_feature_carousel', 'twr_basics', 'on' );
 $witr_footer_widgets = twr_get_option( 'witr_footer_widgets', 'twr_basics', 'on' );
 $witr_image_comparison = twr_get_option( 'witr_image_comparison', 'twr_basics', 'on' );
 $witr_list = twr_get_option( 'witr_list', 'twr_basics', 'on' );
 $witr_modal = twr_get_option( 'witr_modal', 'twr_basics', 'on' );
 $witr_marquee_notice = twr_get_option( 'witr_marquee_notice', 'twr_basics', 'on' );
 $witr_nivo_slider = twr_get_option( 'witr_nivo_slider', 'twr_basics', 'on' );
 $witr_portfolio = twr_get_option( 'witr_portfolio', 'twr_basics', 'on' );
 $witr_port_slide = twr_get_option( 'witr_port_slide', 'twr_basics', 'on' );
 $witr_pricing = twr_get_option( 'witr_pricing', 'twr_basics', 'on' );
 $witr_process = twr_get_option( 'witr_process', 'twr_basics', 'on' );
 $witr_post_tab = twr_get_option( 'witr_post_tab', 'twr_basics', 'on' );
 $witr_progress = twr_get_option( 'witr_progress', 'twr_basics', 'on' );
 $witr_post_team = twr_get_option( 'witr_post_team', 'twr_basics', 'on' );
 $witr_post_testimonial = twr_get_option( 'witr_post_testimonial', 'twr_basics', 'on' );
 $witr_product = twr_get_option( 'witr_product', 'twr_basics', 'on' );
 $witr_section_title = twr_get_option( 'witr_section_title', 'twr_basics', 'on' );
 $witr_social_icons = twr_get_option( 'witr_social_icons', 'twr_basics', 'on' );
 $witr_slick_slider2 = twr_get_option( 'witr_slick_slider2', 'twr_basics', 'on' );
 $witr_static_tab = twr_get_option( 'witr_static_tab', 'twr_basics', 'on' );
 $witr_slick_slider = twr_get_option( 'witr_slick_slider', 'twr_basics', 'on' );
 $witr_swiper_slider = twr_get_option( 'witr_swiper_slider', 'twr_basics', 'on' );
 $witr_social_feed = twr_get_option( 'witr_social_feed', 'twr_basics', 'on' );
 $witr_service = twr_get_option( 'witr_service', 'twr_basics', 'on' );
 $witr_service2 = twr_get_option( 'witr_service2', 'twr_basics', 'on' );
 $witr_post_service = twr_get_option( 'witr_post_service', 'twr_basics', 'on' );
 $witr_single_image = twr_get_option( 'witr_single_image', 'twr_basics', 'on' );
 $witr_screenshorts = twr_get_option( 'witr_screenshorts', 'twr_basics', 'on' );
 $witr_shape = twr_get_option( 'witr_shape', 'twr_basics', 'on' );
 $witr_show_detail = twr_get_option( 'witr_show_detail', 'twr_basics', 'on' );
 $witr_text_widgets = twr_get_option( 'witr_text_widgets', 'twr_basics', 'on' );
 $witr_team = twr_get_option( 'witr_team', 'twr_basics', 'on' );
 $witr_timeline = twr_get_option( 'witr_timeline', 'twr_basics', 'on' );
 $witr_testimonial = twr_get_option( 'witr_testimonial', 'twr_basics', 'on' );
 $witr_video = twr_get_option( 'witr_video', 'twr_basics', 'on' );
 $witr_product = twr_get_option( 'witr_product', 'twr_basics', 'on' );
 $witr_contact = twr_get_option( 'witr_contact', 'twr_basics', 'on' );
 $witr_image_gallery = twr_get_option( 'witr_image_gallery', 'twr_basics', 'on' );
 $witr_event_schedule = twr_get_option( 'witr_event_schedule', 'twr_basics', 'on' );
 $witr_vertical_timeline = twr_get_option( 'witr_vertical_timeline', 'twr_basics', 'on' );
 


if ( $witr_section_title === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_section_title.php';
	$twr_widget_manager->register( new \Elementor\Mls_Section_Title() );
}
if ( $witr_slick_slider === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_slick_slider.php';
	$twr_widget_manager->register( new \Elementor\Mls_Slick_slider() );
}
if ( $witr_swiper_slider === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_swiper_slider.php';
	$twr_widget_manager->register( new \Elementor\Mls_Swiper_Slider() );
}
if ( $witr_slick_slider2 === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_slick_slider2.php';
	$twr_widget_manager->register( new \Elementor\Mls_Slick_slider2() );
}
if ( $witr_nivo_slider === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_nivo_slider.php';
	$twr_widget_manager->register( new \Elementor\Mls_Nivo_Slider() );
}
if ( $witr_banner_slider === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_banner_slider.php';
	$twr_widget_manager->register( new \Elementor\Mls_Banner_slider() );
}
if ( $witr_banner_slider2 === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_banner_slider2.php';
	$twr_widget_manager->register( new \Elementor\Mls_Banner_slider2() );
}
if ( $witr_button === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_button.php';
	$twr_widget_manager->register( new \Elementor\Mls_Button() );
}
if ( $witr_button_classic === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_button_classic.php';
	$twr_widget_manager->register( new \Elementor\Mls_Classic_Button() );
}
if ( $witr_apps_button === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_apps_button.php';
	$twr_widget_manager->register( new \Elementor\Mls_App_Button() );
}
if ( $witr_single_image === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_single_image.php';
	$twr_widget_manager->register( new \Elementor\Mls_S_image() );
}
if ( $witr_feature === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_feature.php';
	$twr_widget_manager->register( new \Elementor\Mls_Feature() );
}
if ( $witr_feature2 === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_feature2.php';
	$twr_widget_manager->register( new \Elementor\Mls_Feature2() );
}
if ( $witr_feature_carousel === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_feature_carousel.php';
	$twr_widget_manager->register( new \Elementor\Mls_Feature_Carousel() );
}
if ( $witr_service === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_service.php';
	$twr_widget_manager->register( new \Elementor\Mls_Service() );
}
if ( $witr_service2 === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_service2.php';
	$twr_widget_manager->register( new \Elementor\Mls_Service2() );
}
if ( $witr_post_service === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_post_service.php';
	$twr_widget_manager->register( new \Elementor\Mls_Post_Service() );
}
if ( $witr_about === 'on' ) {
     require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_about.php';
	$twr_widget_manager->register( new \Elementor\Mls_About() );
}
if ( $witr_carousel_image === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_carousel_image.php';
	$twr_widget_manager->register( new \Elementor\Mls_Carousel_image() );
}
if ( $witr_portfolio === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_portfolio.php';
	$twr_widget_manager->register( new \Elementor\Mls_Portfolio() );
}
if ( $witr_counter === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_counter.php';
	$twr_widget_manager->register( new \Elementor\Mls_Counter() );
}
if ( $witr_call_to_action === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_call_to_action.php';
	$twr_widget_manager->register( new \Elementor\Mls_cto_Actiono() );
}
if ( $witr_post_testimonial === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_post_testimonial.php';
	$twr_widget_manager->register( new \Elementor\Mls_Post_Testimonial() );
}
if ( $witr_testimonial === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_testimonial.php';
	$twr_widget_manager->register( new \Elementor\Mls_Testimonialr() );
}
if ( $witr_creative_tab === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_creative_tab.php';
	$twr_widget_manager->register( new \Elementor\Mls_Creative_Tab() );
}
if ( $witr_accordion === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_accordion.php';
	$twr_widget_manager->register( new \Elementor\Mls_Accordion() );
}
if ( $witr_team === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_team.php';
	$twr_widget_manager->register( new \Elementor\Mls_Team() );
}
if ( $witr_post_team === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_post_team.php';
	$twr_widget_manager->register( new \Elementor\Mls_Post_Team() );
}
if ( $witr_pricing === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_pricing.php';
	$twr_widget_manager->register( new \Elementor\Mls_Pricing() );
}
if ( $witr_video === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_video.php';
	$twr_widget_manager->register( new \Elementor\Mls_Video() );
}
if ( $witr_blog === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_blog.php';
	$twr_widget_manager->register( new \Elementor\Mls_Blog() );
}
if ( $witr_contact === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_contact.php';
	$twr_widget_manager->register( new \Elementor\Mls_Contact() );
} 
if ( $witr_animate_text === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_animate_text.php';
	$twr_widget_manager->register( new \Elementor\Mls_Animater_Heading() );
}	 	 
if ( $witr_animate_slider === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_animate_slider.php';
	$twr_widget_manager->register( new \Elementor\Mls_Animate_slider() );
}

if ( $witr_conudowntime === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_conudowntime.php';
	$twr_widget_manager->register( new \Elementor\Mls_Countdown() );
}
if ( $witr_carousel_imagetext === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_carousel_imagetext.php';
	$twr_widget_manager->register( new \Elementor\Mls_image_text() );
}
if ( $witr_circle_progress === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_circle_progress.php';
	$twr_widget_manager->register( new \Elementor\Mls_Cricle() );
}
if ( $witr_case === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_case.php';
	$twr_widget_manager->register( new \Elementor\Mls_Case() );
}
if ( $witr_causes === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_causes.php';
	$twr_widget_manager->register( new \Elementor\Mls_Causes() );
}
if ( $witr_custom_icons === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_custom_icons.php';
	$twr_widget_manager->register( new \Elementor\Mls_Custom_Icons() );
}
if ( $witr_event === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_event.php';
	$twr_widget_manager->register( new \Elementor\Mls_Event() );
}
if ( $witr_event_schedule === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_event_schedule.php';
	$twr_widget_manager->register( new \Elementor\Mls_schedule() );
}
if ( $witr_image_comparison === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_image_comparison.php';
	$twr_widget_manager->register( new \Elementor\Mls_Image_Comparison() );
}
if ( $witr_list === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_list.php';
	$twr_widget_manager->register( new \Elementor\Mls_list() );
}
if ( $witr_modal === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_modal.php';
	$twr_widget_manager->register( new \Elementor\Mls_Modal() );
}
if ( $witr_marquee_notice === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_marquee_notice.php';
	$twr_widget_manager->register( new \Elementor\Mls_Notice() );
}
if ( $witr_port_slide === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_port_slide.php';
	$twr_widget_manager->register( new \Elementor\Mls_Port_Carousel() );
}
if ( $witr_process === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_process.php';
	$twr_widget_manager->register( new \Elementor\Mls_Process() );
}
if ( $witr_post_tab === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_post_tab.php';
	$twr_widget_manager->register( new \Elementor\Mls_Posttab() );
}
if ( $witr_progress === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_progress.php';
	$twr_widget_manager->register( new \Elementor\Mls_progress() );
}
if ( $witr_social_icons === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_social_icons.php';
	$twr_widget_manager->register( new \Elementor\Mls_Social_Icons() );
}
if ( $witr_static_tab === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_static_tab.php';
	$twr_widget_manager->register( new \Elementor\Mls_Static_Tab() );
}
if ( $witr_social_feed === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_social_feed.php';
	$twr_widget_manager->register( new \Elementor\Mls_Social_Feed() );
}

if ( $witr_screenshorts === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_screenshorts.php';
	$twr_widget_manager->register( new \Elementor\Mls_Screenshort() );
}
if ( $witr_shape === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_shape.php';
	$twr_widget_manager->register( new \Elementor\Mls_Shape() );
}
if ( $witr_show_detail === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_show_detail.php';
	$twr_widget_manager->register( new \Elementor\Mls_Show_Detail() );
}
if ( $witr_text_widgets === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_text_widgets.php';
	$twr_widget_manager->register( new \Elementor\Mls_Text_widget() );
}
if ( $witr_timeline === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_timeline.php';
	$twr_widget_manager->register( new \Elementor\Mls_Timeline() );
}
if ( $witr_footer_widgets === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_footer_widgets.php';
	$twr_widget_manager->register( new \Elementor\Mls_Footer_widget() );
}
if ( $witr_image_gallery === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_image_gallery.php';
	$twr_widget_manager->register( new \Elementor\Mls_image_gallery() );
}
if ( $witr_vertical_timeline === 'on' ) {
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_vertical_timeline.php';
	$twr_widget_manager->register( new \Elementor\Mls_verticle_timeline() );
}


if( class_exists( 'WooCommerce' ) ) {
	if ( $witr_product === 'on' ) {
		require_once TMAINV_EXTENSION_DIR.'/includes/elementor/witr_product.php';
		$twr_widget_manager->register( new \Elementor\Mls_Woo_Product() );
	}
}

		

		
}	
	
		
	
	




  
}
Twr_Widgets_Control::instance();

}