<?php

/**
 * WordPress settings API demo class
 *
 * @author Tareq Hasan
 */
if ( !class_exists('Twr_Settings_API_Class' ) ):
class Twr_Settings_API_Class {

    private $twr_settings_api;

    function __construct() {
        $this->twr_settings_api = new Twr_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
		add_action( 'admin_menu', array( $this, 'twr_admin_menu' ),20 );	
		add_action( 'wsa_form_top_twr_basics', array( $this, 'twr_show_button' ) );
		add_action( 'wsa_form_top_twr_advanced', array( $this, 'twr_text_tutorial' ) );
    }

    function admin_init() {

        /* set the settings */
        $this->twr_settings_api->set_sections( $this->twr_get_settings_sections() );
        $this->twr_settings_api->set_fields( $this->twr_get_settings_fields() );

        /* initialize settings */
        $this->twr_settings_api->admin_init();
    }


function twr_admin_menu(){
	add_submenu_page(
		'themes.php',
		esc_html__('themex Control','themex'),
		esc_html__('themex Element Control','themex'),
		'manage_options',
		'twr_page_slug',
		array($this,'trw_plugin_page'),
		7
	);	
	
}	
	


    function twr_get_settings_sections() {
        $sections = array(
            array(
                'id'    => 'twr_basics',
                'title' => __( 'Elementor Element', 'themex' )
            ),
            array(
                'id'    => 'twr_advanced',
                'title' => __( 'Video Tutorial', 'themex' )
            )
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function twr_get_settings_fields() {
        $settings_fields = array(
            'twr_basics' => array(
				array(
                    'name'  => 'witr_about',
                    'label' => __( ' About Us', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),			
                array(
                    'name'  => 'witr_accordion',
                    'label' => __( ' Accordion', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),
				array(
                    'name'  => 'witr_animate_text',
                    'label' => __( ' Animate Heading ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),
				array(
                    'name'  => 'witr_apps_button',
                    'label' => __( ' Apps Button ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),
				array(
                    'name'  => 'witr_animate_slider',
                    'label' => __( ' Animate Slider ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),
				array(
                    'name'  => 'witr_banner_slider',
                    'label' => __( ' Banner Slider ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_banner_slider2',
                    'label' => __( ' Banner Slider 2 ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_blog',
                    'label' => __( ' Post Blog ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_button',
                    'label' => __( ' Buttons ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_button_classic',
                    'label' => __( ' Classic Button ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_counter',
                    'label' => __( ' Counter ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),
				array(
                    'name'  => 'witr_contact',
                    'label' => __( ' Contact Form 7', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_conudowntime',
                    'label' => __( ' Countdown Time ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_carousel_image',
                    'label' => __( 'Image Carousel & Grid ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_carousel_imagetext',
                    'label' => __( ' Text & Image Carousel ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_call_to_action',
                    'label' => __( ' Call To Action ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_circle_progress',
                    'label' => __( ' Circle Progress ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_creative_tab',
                    'label' => __( ' Creative Tab ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_case',
                    'label' => __( ' Case Study ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_causes',
                    'label' => __( ' Causes Charity ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_custom_icons',
                    'label' => __( ' Custom Icons ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_event',
                    'label' => __( ' Post Event ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_feature',
                    'label' => __( ' Feature ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_feature2',
                    'label' => __( ' Feature2 ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_feature_carousel',
                    'label' => __( ' Feature Carousel ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_footer_widgets',
                    'label' => __( ' Footer Widget ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_image_comparison',
                    'label' => __( ' Image Comparison ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_list',
                    'label' => __( ' List ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_modal',
                    'label' => __( ' Modal ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),
                array(
                    'name'  => 'witr_marquee_notice',
                    'label' => __( ' Notice ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),
                array(
                    'name'  => 'witr_nivo_slider',
                    'label' => __( ' Nivo Custom Slider ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_portfolio',
                    'label' => __( ' Post Portfolio ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_port_slide',
                    'label' => __( 'Gallery Carousel ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_pricing',
                    'label' => __( ' Pricing Table ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_process',
                    'label' => __( ' Working Process ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_post_tab',
                    'label' => __( ' Post Tab ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_progress',
                    'label' => __( ' Progress Bar ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_post_team',
                    'label' => __( ' Post Team ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_post_testimonial',
                    'label' => __( ' Post Testimonial ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),											
                array(
                    'name'  => 'witr_section_title',
                    'label' => __( ' Title ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_social_icons',
                    'label' => __( ' Soical Icons ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_slick_slider2',
                    'label' => __( ' Slick Slider2 ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_static_tab',
                    'label' => __( ' Static Tab ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_slick_slider',
                    'label' => __( ' Slick Slider ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_swiper_slider',
                    'label' => __( ' Swiper Slider ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_social_feed',
                    'label' => __( ' Social Feed ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_service',
                    'label' => __( ' Service ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_service2',
                    'label' => __( ' Service 2 ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_post_service',
                    'label' => __( ' Post Service ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_single_image',
                    'label' => __( ' Image ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),	
				array(
                    'name'  => 'witr_image_gallery',
                    'label' => __( ' Image Gallery ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),	
				
                array(
                    'name'  => 'witr_screenshorts',
                    'label' => __( ' Carousel Screenshorts ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_shape',
                    'label' => __( ' Shape Box ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_show_detail',
                    'label' => __( ' Show Detail ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),								
                array(
                    'name'  => 'witr_text_widgets',
                    'label' => __( ' Text Widget ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_team',
                    'label' => __( ' Team ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_timeline',
                    'label' => __( ' Timeline ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),
                array(
                    'name'  => 'witr_vertical_timeline',
                    'label' => __( 'Vertical Timeline ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ), 				
                array(
                    'name'  => 'witr_testimonial',
                    'label' => __( ' Testimonial ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),								
                array(
                    'name'  => 'witr_video',
                    'label' => __( ' Video', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),
                array(
                    'name'  => 'witr_product',
                    'label' => __( ' Woo Products[Active Woo] ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),
				array(
                    'name'  => 'witr_flaticons',
                    'label' => __( ' flaticons icons', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'off',
					'class'=>'trw_table_tr',
                ),array(
                    'name'  => 'witr_icofont',
                    'label' => __( ' icofont icons', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),array(
                    'name'  => 'witr_themify',
                    'label' => __( ' themify icons', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'off',
					'class'=>'trw_table_tr',
                ),array(
                    'name'  => 'witr_aprova',
                    'label' => __( ' aprova icons ', 'themex' ),
                    'type'  => 'checkbox',
					'default'=>'off',
					'class'=>'trw_table_tr',
                ),
								
            ),
            'twr_advanced' => array(),
        );

        return $settings_fields;
    }

    function trw_plugin_page() {
        echo '<div class="wrap"> <div class="twr_plugin_pagr_inner">';
		 echo '<h2>'.esc_html__( 'themex helper widget settings','themex' ).'</h2>';
		$this->save_message();
        $this->twr_settings_api->show_navigation();
        $this->twr_settings_api->show_forms();

        echo '</div></div>';
    }

    /**
     * Get all the pages value
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }
    function save_message() {
        if( isset($_GET['settings-updated']) ) { ?>
            <div class="updated notice is-dismissible"> 
                <p><strong><?php esc_html_e('Successfully Saved Widget.', 'themex') ?></strong></p>
            </div>
            
            <?php
        }
    }	

    function twr_show_button(){
        ob_start();
        ?>
            <span class="trw_select_widgeta"><?php esc_html_e( 'Show/Hide All Widget', 'themex' );?></span>
        <?php
        echo ob_get_clean();
    }	
	
	 function twr_text_tutorial(){
        ob_start();
        ?>		
			<div class="twr_video_tutorial">
			
				<ul>
					<li><a  target="_blank" href="<?php echo esc_url('https://themexbd.com/themex/themexdoc/');?>"><?php esc_html_e( 'Documenation', 'themex' );?></a></li>
					<li><a  target="_blank" href="<?php echo esc_url('https://www.youtube.com/channel/UC3zxoWcSfymHUMTX1RvkJMQ/videos');?>"><?php esc_html_e( 'Video Tutorials', 'themex' );?></a></li>
					<li><a  target="_blank" href="<?php echo esc_url('https://www.templatemonster.com/authors/wpexpert/');?>"><?php esc_html_e( 'Theme Profile', 'themex' );?></a></li>		
				</ul>
			
			</div>
        <?php
        echo ob_get_clean();
    }	
	

}
endif;
new Twr_Settings_API_Class();