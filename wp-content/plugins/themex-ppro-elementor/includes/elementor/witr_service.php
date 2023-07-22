<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Service extends Widget_Base {

    public function get_name() {
        return 'witr_section_service';
    }
    
    public function get_title() {
        return esc_html__( ' Service', 'themex' );
    }
    public function get_style_depends() {
        return ['wservice'];
    }
    public function get_icon() {
        return 'themex_icon eicon-featured-image';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {
		
			
			

			/* === w_service start === */
			$this->start_controls_section(
				'witr_field_display_service',
				[
					'label' => esc_html__( 'Service options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
			
			/* service style check  witr_style_service */
			$this->add_control(
				'witr_style_service',
				[
					'label' => esc_html__( 'Service style', 'themex' ),
					'type' => Controls_Manager::SELECT,
					'default' => '1',					
					'options' => [
						'1' => esc_html__( 'Icon Top Left Center Right', 'themex' ),
						'2' => esc_html__( 'Icon Right', 'themex' ),
						'3' => esc_html__( 'Icon Left', 'themex' ),
						'4' => esc_html__( 'All Text Hover With BG Image', 'themex' ),
						'5' => esc_html__( 'Top Icon and Shape', 'themex' ),
						'6' => esc_html__( '3D/Flip Box Style', 'themex' ),
						'7' => esc_html__( 'style 7', 'themex' ),						
						'8' => esc_html__( 'style 8', 'themex' ),						
						'9' => esc_html__( 'style 9', 'themex' ),						
						'10' => esc_html__( 'style 10', 'themex' ),						
						'11' => esc_html__( 'style 11', 'themex' ),						
						'12' => esc_html__( '12 Top Image Must Be Show', 'themex' ),						
						'13' => esc_html__( 'style 13', 'themex' ),						
					],
				]
			);
				/*  witr_box_height12 */
				$this->add_responsive_control(
					'witr_box_height12',
					[
						'label' => esc_html__( 'Box Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'separator'=>'before',
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 3000,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_service_s_12.service-item' => 'height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'witr_style_service' =>['12'],
						],							
					]
				);			
			/* Box Position */				
			$this->add_control(
				'witr_text_ltc',
				[
					'label' => esc_html__( 'Box Position', 'themex' ),
					'type' => Controls_Manager::CHOOSE,
					'default' => 'center',
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'themex' ),
							'icon' => 'eicon-h-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'themex' ),
							'icon' => 'eicon-v-align-top',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'themex' ),
							'icon' => 'eicon-h-align-right',
						],
					],
					'separator'=>'before',
					'condition' => [
						'witr_style_service' =>['1','4','6','7','8','12'],
					],							
				]
			);
				/* witr_xyz */
				$this->add_control(
					'witr_xyz',
					[
						'label' => esc_html__( 'Flip Box', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'witr_service_flip_left',
						'options' => [
							'witr_service_flip_left' => esc_html__( 'Left', 'themex' ),
							'witr_service_flip_right' => esc_html__( 'Right', 'Down' ),
							'witr_service_flip_up' => esc_html__( 'Up', 'themex' ),
							'witr_service_flip_down' => esc_html__( 'Down', 'themex' ),
							'witr_service_flip_zoomin' => esc_html__( 'Zoom In', 'Down' ),
							'witr_service_flip_zoomout' => esc_html__( 'Zoom Out', 'Down' ),
						],
						'condition' => [
							'witr_style_service' =>['6'],
						],						
					]
				);			
					/*  box height */
					$this->add_responsive_control(
						'witr_box_height',
						[
							'label' => esc_html__( 'Box Height', 'themex' ),
							'type' => Controls_Manager::SLIDER,
							'separator'=>'before',
							'range' => [
								'px' => [
									'min' => 6,
									'max' => 1000,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .witr_service_front_3d,{{WRAPPER}} .witr_service_back_3d' => 'height: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'witr_style_service' =>['6'],
							],							
						]
					);
			/* witr_showtop_image */
			$this->add_control(
				'witr_showtop_image',
				[
					'label' => esc_html__( 'Show Top Image', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'separator'=>'before',
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'no',
					'condition' => [
						'witr_style_service' =>['1','2','3','9','12','13'],
					],					
				]
			);	
			/* witr_service_image */
			$this->add_control(
				'witr_top_image',
				[
					'label' => esc_html__( 'Choose Image', 'themex' ),
					'type' => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
					'condition' => [
						'witr_showtop_image' => 'yes',
						'witr_style_service' =>['1','2','3','9','12','13'],
					],							
				]
			);
				/* txbd_image_size */
				$this->add_group_control(
					Group_Control_Image_Size::get_type(),
					[
						'name' => 'txbd_image_size',
						'default' => 'large',
						'separator' => 'none',
						'condition' => [
							'witr_showtop_image' => 'yes',
							'witr_style_service' =>['1','2','3','9','12','13'],
						]
					]
				);			
			/* witr_show_animate */
			$this->add_control(
				'witr_show_animate',
				[
					'label' => esc_html__( 'Show Image Animation ', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'no',
					'separator'=>'before',							
				]
			);			
			/* witr_service_title */	
			$this->add_control(
				'witr_service_title',
				[
					'label' => esc_html__( 'Title', 'themex' ),
					'type' => Controls_Manager::TEXTAREA,
					'separator'=>'before',
					'description' => esc_html__( 'Not use title, remove the text from field', 'themex' ),
					'default' => esc_html__( 'Add title Here', 'themex' ),
					'placeholder' => esc_attr__( 'Type your service title here', 'themex' ),						
				]
			);
					/* title_link */	
					$this->add_control(
						'title_link',
						[
							'label' => esc_html__( 'Title Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert Title link here.','themex'),
							'placeholder' => esc_attr__( 'https://your-link.com', 'themex' ),
							'show_external' => true,
							
						]
					);			
			/* witr_service_title */	
			$this->add_control(
				'witr_service_sub_title',
				[
					'label' => esc_html__( 'Small Title', 'themex' ),
					'type' => Controls_Manager::TEXTAREA,
					'separator'=>'before',
					'description' => esc_html__( 'Not use Sub title, remove the text from field', 'themex' ),
					'default' => esc_html__( 'Add title Here', 'themex' ),
					'placeholder' => esc_attr__( 'Type your service title here', 'themex' ),
					'condition' => [
						'witr_style_service' => ['11','12'],
					],					
				]
			);			
			/* witr_service_content	*/
			$this->add_control(
				'witr_service_content',
				[
					'label' => esc_html__( 'Content Text', 'themex' ),
					'type' => Controls_Manager::TEXTAREA,
					'separator'=>'before',
					'description' => esc_html__( 'Not use content text, remove the text from field', 'themex' ),
					'default' => esc_html__( 'Lorem ipsum dolor sit met, connected adipiscing elit, sed.', 'themex' ),
					'placeholder' => esc_attr__( 'Type your content here', 'themex' ),
				]
			);			
			
			/* witr_show_list */
			$this->add_control(
				'witr_show_repeat_list',
				[
					'label' => esc_html__( 'Show list', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'separator'=>'before',
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),							
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
						'witr_style_service' => ['10','11'],
					],					
				]
			);			
			/* witr_service2_list */
			$this->add_control(
				'witr_service_list',
				[
					'label' => esc_html__( 'service List Items ', 'themex' ),
					'type' => Controls_Manager::TEXTAREA,
					'separator' => 'before',
					'description' => esc_html__( 'use list from here, must be use the stcructure ex <ul><li><a href="#">example list 1</a></li><li><a href="#">example list 2</a></li></ul> OR TEXT USE EX-<ul><li><p>Text List</p></li></ul> OR TEXT USE EX-<ul><li><span>Text List</span></li></ul> OR TEXT USE EX-<ul><li>Text List</li></ul> when icon use ex <ul><li><i class="icofont-tick-mark"></i></li><li><i class="icofont-tick-mark"></i></li></ul> ', 'themex' ),
					'default' => '<ul><li><i class="icofont-tick-mark"></i></li><li><i class="icofont-tick-mark"></i></li></ul><ul><li><a href="#">example list 1</a></li><li><a href="#">example list 2</a></li></ul>',
					'placeholder' => esc_attr__( 'Type your List Item here', 'themex' ),
					'condition' => [
						'witr_style_service' => ['10','11'],
						'witr_show_repeat_list' => 'yes',
					],						
				]
			);			
			
			/* witr_show_icon witr_icon_item */
			$this->add_control(
				'witr_show_icon',
				[
					'label' => esc_html__( 'Show Icon', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'separator'=>'before',
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),							
					'return_value' => 'yes',
					'default' => 'yes',							
				]
			);				
			$this->add_control(
				'witr_icon_item',
				[
					'label' => esc_html__( 'Icon', 'themex' ),
					'type' => Controls_Manager::ICONS,
					'description' => esc_html__( 'Change icon here, For this, click on the library field And Not use Icon,Click On The Hide Option', 'themex' ),
					'fa4compatibility' => 'icon',
					'default' => [
						'value' => 'icofont-star',
						'library' => 'fa-solid',
					],
					'condition' => [
						'witr_show_icon' => 'yes',
					],							
				]
			);					
	
			/* witr_show_custom witr_service_custom */
			$this->add_control(
				'witr_show_custom',
				[
					'label' => esc_html__( 'Show custom Icon', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'separator'=>'before',
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'no',							
				]
			);
			/* Custom Icon	*/
			$this->add_control(
				'witr_service_custom',
				[
					'label' => esc_html__( 'Custom Icon Name', 'themex' ),
					'type' => Controls_Manager::TEXT,
					'description' => esc_html__( 'Type Icofont - https://icofont.com/icons Ex=icofont-adjust or Themify Icon -https://themify.me/themify-icons Ex=ti-user or Fontawesome Icon - https://fontawesome.com/cheatsheet Ex=icofont-star name here', 'themex' ),
					'default' => esc_html__( 'icofont-adjust', 'themex' ),
					'placeholder' => esc_attr__( 'Type your Icon name here', 'themex' ),
					'condition' => [
						'witr_show_custom' => 'yes',
					],							
				]
			);				
			/* show image witr_show_image witr_service_image */
			$this->add_control(
				'witr_show_image',
				[
					'label' => esc_html__( 'Show Image', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'separator'=>'before',
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'no',								
				]
			);	
			/* witr_service_image */
			$this->add_control(
				'witr_service_image',
				[
					'label' => esc_html__( 'Choose Icon Image', 'themex' ),
					'type' => Controls_Manager::MEDIA,
					'default' => [
						'url' =>'',
					],
					'condition' => [
						'witr_show_image' => 'yes',
					],							
				]
			);
				/* txbd_icon_image_size */
				$this->add_group_control(
					Group_Control_Image_Size::get_type(),
					[
						'name' => 'txbd_icon_image_size',
						'default' => 'large',
						'separator' => 'none',
						'condition' => [
							'witr_show_image' => 'yes',
						]
					]
				);	
			
			/* witr_show_button */
			$this->add_control(
				'witr_show_button',
				[
					'label' => esc_html__( 'Show Button', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'separator'=>'before',
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'yes',								
				]
			);			
			/* witr_service_button	*/
			$this->add_control(
				'witr_service_button',
				[
					'label' => esc_html__( 'Button text', 'themex' ),
					'label_block' =>true,
					'type' => Controls_Manager::TEXT,
					'description' =>esc_html__('Insert button text. It hidden when field blank.','themex'),		
					'default' => esc_html__( 'Read More', 'themex' ),
					'placeholder' => esc_attr__( 'Type your button text here', 'themex' ),
					'condition' => [
						'witr_show_button' => 'yes',
					],							
				]
			);
			/* witr_button_link */	
			$this->add_control(
				'witr_button_link',
				[
					'label' => esc_html__( 'Button Link', 'themex' ),
					'type' => Controls_Manager::URL,
					'description' =>esc_html__('Insert button link here.','themex'),
					'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
					'show_external' => true,
					'default' => [
						'url' => '#',
					],
					'condition' => [
						'witr_show_button' => 'yes',
					],							
				]
			);
			/* witr_show_icon_b */
			$this->add_control(
				'witr_show_icon_b',
				[
					'label' => esc_html__( 'Show Button Icon', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'separator'=>'before',
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),							
					'return_value' => 'yes',
					'default' => 'no',
					'condition' => [
						'witr_show_button' => 'yes',
					],					
				]
			);
			/* Custom Icon	*/
			$this->add_control(
				'witr_custom_icon_b',
				[
					'label' => esc_html__( 'Button Icon Name', 'themex' ),
					'type' => Controls_Manager::TEXT,
					'description' => esc_html__( 'Type Icofont - https://icofont.com/icons or Themify Icon -https://themify.me/themify-icons name here', 'themex' ),
					'default' => esc_html__( 'ti-arrow-right', 'themex' ),
					'placeholder' => esc_attr__( 'Type your Icon name here', 'themex' ),
					'condition' => [
						'witr_show_button' => 'yes',
						'witr_show_icon_b' => 'yes',
					],							
				]
			);

			
			/* witr_show_icon witr_icon_item */
			$this->add_control(
				'witr_show_icon9',
				[
					'label' => esc_html__( 'Show Icon', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'separator'=>'before',
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),							
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
						'witr_style_service' =>['9'],
					],						
				]
			);				
			$this->add_control(
				'witr_icon_item9',
				[
					'label' => esc_html__( 'Icon', 'themex' ),
					'type' => Controls_Manager::ICONS,
					'description' => esc_html__( 'Change icon here, For this, click on the library field And Not use Icon,Click On The Hide Option', 'themex' ),
					'fa4compatibility' => 'icon',
					'default' => [
						'value' => 'fas fa-long-arrow-alt-right',
						'library' => 'fa-solid',
					],
					'condition' => [
						'witr_show_icon9' => 'yes',
						'witr_style_service' =>['9'],
					],							
				]
			);	

/* =================================================== Bekent Option =================================================================== */
			/* witr_service_heading2 */	
			$this->add_control(
				'witr_service_heading2',
				[
					'label' => esc_html__( 'Bekent Option Bottom Look', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'separator'=>'before',
					'condition' => [
						'witr_style_service' =>['6'],
					],					
				]
			);			
			
			/* witr_service_title2 */	
			$this->add_control(
				'witr_service_title2',
				[
					'label' => esc_html__( 'Title', 'themex' ),
					'type' => Controls_Manager::TEXTAREA,
					'separator'=>'before',
					'description' => esc_html__( 'Not use title, remove the text from field', 'themex' ),
					'default' => esc_html__( 'Add title Here2', 'themex' ),
					'placeholder' => esc_attr__( 'Type your service title here', 'themex' ),
					'condition' => [
						'witr_style_service' =>['6'],
					],					
				]
			);
			/* title_link2 */	
			$this->add_control(
				'title_link2',
				[
					'label' => esc_html__( 'Title Link', 'themex' ),
					'type' => Controls_Manager::URL,
					'description' =>esc_html__('Insert Title link here.','themex'),
					'placeholder' => esc_attr__( 'https://your-link.com', 'themex' ),
					'show_external' => true,
					'condition' => [
						'witr_style_service' =>['6'],
					],					
				]
			);			
			/* witr_service_content2	*/
			$this->add_control(
				'witr_service_content2',
				[
					'label' => esc_html__( 'Content Text', 'themex' ),
					'type' => Controls_Manager::TEXTAREA,
					'separator'=>'before',
					'description' => esc_html__( 'Not use content text, remove the text from field', 'themex' ),
					'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt consectetuer adipiscing .', 'themex' ),
					'placeholder' => esc_attr__( 'Type your content here', 'themex' ),
					'condition' => [
						'witr_style_service' =>['6'],
					],					
				]
			);
			/* witr_show_icon witr_icon_item */
			$this->add_control(
				'witr_show_icon2',
				[
					'label' => esc_html__( 'Show Icon', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'separator'=>'before',
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),							
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
						'witr_style_service' =>['6'],
					],					
				]
			);				
			$this->add_control(
				'witr_icon_item2',
				[
					'label' => esc_html__( 'Icon', 'themex' ),
					'type' => Controls_Manager::ICONS,
					'description' => esc_html__( 'Change icon here, For this, click on the library field And Not use Icon,Click On The Hide Option', 'themex' ),
					'fa4compatibility' => 'icon',
					'default' => [
						'value' => 'icofont-twitter',
						'library' => 'fa-solid',
					],
					'condition' => [
						'witr_show_icon2' => 'yes',
						'witr_style_service' =>['6'],
					],							
				]
			);					
	
			/* witr_show_custom2 witr_service_custom2 */
			$this->add_control(
				'witr_show_custom2',
				[
					'label' => esc_html__( 'Show custom Icon', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'separator'=>'before',
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'no',
					'condition' => [
						'witr_style_service' =>['6'],
					],					
				]
			);
			/* Custom Icon2	*/
			$this->add_control(
				'witr_service_custom2',
				[
					'label' => esc_html__( 'Custom Icon Name', 'themex' ),
					'type' => Controls_Manager::TEXT,
					'description' => esc_html__( 'Type Icofont - https://icofont.com/icons or Themify Icon -https://themify.me/themify-icons name here', 'themex' ),
					'default' => esc_html__( 'icofont-adjust', 'themex' ),
					'placeholder' => esc_attr__( 'Type your Icon name here', 'themex' ),
					'condition' => [
						'witr_show_custom2' => 'yes',
						'witr_style_service' =>['6'],
					],							
				]
			);				
			/* show image witr_show_image witr_service_image2 */
			$this->add_control(
				'witr_show_image2',
				[
					'label' => esc_html__( 'Show Image', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'separator'=>'before',
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'no',
					'condition' => [
						'witr_style_service' =>['6'],
					],					
				]
			);	
			/* witr_service_image */
			$this->add_control(
				'witr_service_image2',
				[
					'label' => esc_html__( 'Choose Image', 'themex' ),
					'type' => Controls_Manager::MEDIA,
					'default' => [
						'url' =>'',
					],
					'condition' => [
						'witr_show_image2' => 'yes',
						'witr_style_service' =>['6'],
					],							
				]
			);
			
			/* witr_show_button */
			$this->add_control(
				'witr_show_button2',
				[
					'label' => esc_html__( 'Show Button', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'separator'=>'before',
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
						'witr_style_service' =>['6'],
					],					
				]
			);			
			/* witr_service_button	*/
			$this->add_control(
				'witr_service_button2',
				[
					'label' => esc_html__( 'Button text', 'themex' ),
					'label_block' =>true,
					'type' => Controls_Manager::TEXT,
					'description' =>esc_html__('Insert button text. It hidden when field blank.','themex'),		
					'default' => esc_html__( 'See More', 'themex' ),
					'placeholder' => esc_attr__( 'Type your button text here', 'themex' ),
					'condition' => [
						'witr_show_button2' => 'yes',
						'witr_style_service' =>['6'],
					],							
				]
			);
			/* witr_button_link2 */	
			$this->add_control(
				'witr_button_link2',
				[
					'label' => esc_html__( 'Button Link', 'themex' ),
					'type' => Controls_Manager::URL,
					'description' =>esc_html__('Insert button link here.','themex'),
					'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
					'show_external' => true,
					'default' => [
						'url' => '#',
					],
					'condition' => [
						'witr_show_button2' => 'yes',
						'witr_style_service' =>['6'],
					],							
				]
			);


		$this->end_controls_section();
		/* === end witr_service ===  */	
		
		
	   /*===============================================================================================================================
																START TO STYLE
		=================================================================================================================================*/			

		/*=== start Single Box style ====*/
		$this->start_controls_section(
			'section_single_service',
			[
				'label' => esc_html__( 'Box Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]
		);
				$this->add_control(
					'shapeboxh',
					[
						'label' => esc_html__( 'Bar Background', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator' => 'before',
						'condition' => [
							'witr_style_service' => ['10'],
						],							
					]
				);				
				/* shape background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_boxba_background',
						'label' => esc_html__( ' Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_service_10::before',
						'condition' => [
							'witr_style_service' => ['10'],
						],							
					]
				);		
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_single_bb',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .all_color_service',
					]
				);
				/* border_radius */
				$this->add_control(
					'witr_single_br',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .all_color_service,{{WRAPPER}} .em_service_text_box::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadowsbox',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .all_color_service,{{WRAPPER}} .service_top_image::after',
					]
				);
				/* box background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_box_background',
						'label' => esc_html__( ' Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .all_color_service,{{WRAPPER}} .service_top_image::after',							
					]
				);				
				/* box padding */
				$this->add_responsive_control(
					'witr_box_padding',
					[
						'label' => esc_html__( ' Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .all_color_service' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* box margin */
				$this->add_responsive_control(
					'witr_box_margin',
					[
						'label' => esc_html__( ' Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .all_color_service' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				
				/* box padding */
				$this->add_responsive_control(
					'witr_box_paddingei',
					[
						'label' => esc_html__( ' Content Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .detail_SS,{{WRAPPER}} .wirt_detail_content,{{WRAPPER}} .em_service_text_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						'condition' => [
							'witr_style_service' =>['8','11','13'],
						],							
					]
				);				

				/* HEADING  */
				$this->add_control(
					'witr_bor_headd_color',
					[
						'label' => esc_html__( ' Hover option', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator'=>'before',
					]
				);				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_single_bh',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .all_color_service:hover',
					]
				);		
				/* Border Hover Color */
				$this->add_control(
					'witr_bor_h_color',
					[
						'label' => esc_html__( 'Border Hover Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .all_color_service:hover' => 'border-color: {{VALUE}}',
						],
						
					]
				);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadowhbox',
						'label' => esc_html__( 'Hover Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .all_color_service:hover',
					]
				);					
				/* box background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_boxhover_background',
						'label' => esc_html__( ' Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .all_color_service:hover',							
					]
				);		

		$this->end_controls_section();
		/*=== start Single Box style ====*/			
			
		/*=== start witr_icon style ====*/
		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => esc_html__( 'Icon Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]
		);
		
			/*=== start icon_tabs style ====*/
			$this->start_controls_tabs( 'icon_colors' );
			
				/*=== start icon_normal style ====*/
				$this->start_controls_tab(
					'witr_icon_colors_normal',
					[
						'label' => esc_html__( 'Normal', 'themex' ),
					]
				);
			/*  button witr_btn_button */	
				$this->add_control(
					'witr_Select_whi',
					[
						'label' => esc_html__( 'Select Icon Style', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'multiple' => true,
						'options' => [
							'same2' => esc_html__( 'Default', 'themex' ),
							'width_height_link_0'  => esc_html__( 'Background Custom', 'themex' ),						
						],
						'condition' => [
							'witr_style_service' => ['1','2','3','9','12'],
						],						
					]
				);				
				
				$this->add_control(
					'shapeititle',
					[
						'label' => esc_html__( 'Shape Background', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator' => 'before',
						'condition' => [
							'witr_style_service' => ['5'],
						],							
					]
				);				
				/* shape background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_ishape_background',
						'label' => esc_html__( 'Shape Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .SIBG_1::before,{{WRAPPER}} .witr_service_10::before',
						'condition' => [
							'witr_style_service' => ['5'],
						],							
					]
				);
				/*  witr_icond_select */
				$this->add_responsive_control(
					'witr_icond_select',
					[
						'label' => esc_html__( 'Icon Position', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'description' =>"Set your Icon Position Select here",
						'separator' => 'before',
						'default' => 'default',
						'options' => [
							'default' => esc_html__( 'Default', 'themex' ),
							'none' => esc_html__( 'None', 'themex' ),
							'left' => esc_html__( 'Left', 'themex' ),
							'right' => esc_html__( 'Right', 'themex' ),
						],
						'condition' => [
							'witr_style_service' => ['2','3'],
						],						
						'selectors' => [
							'{{WRAPPER}} .em-service2.sleft .em-service-icon,{{WRAPPER}} .em-service2.sright .em-service-icon' => 'float: {{VALUE}}',
						],						
					]
				);				
				/* Icon Color */
				$this->add_control(
					'witr_primary_color',
					[
						'label' => esc_html__( 'Icon Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .all_icon_color i' => 'color: {{VALUE}}',
						],
						
					]
				);
				
				/*  icon font size */
				$this->add_responsive_control(
					'witr_icon_size',
					[
						'label' => esc_html__( 'Icon Size', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .all_icon_color i' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/* Icon background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_icons_background',
						'label' => esc_html__( 'Icon Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .all_icon_color i,{{WRAPPER}} .service_icon_box::before',
					]
				);				
				/*  icon width */
				$this->add_responsive_control(
					'witr_icon_width',
					[
						'label' => esc_html__( 'width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .all_icon_color i' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon height */
				$this->add_responsive_control(
					'witr_icon_height',
					[
						'label' => esc_html__( 'Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .all_icon_color i' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon line height */
				$this->add_responsive_control(
					'witr_icon_line_height',
					[
						'label' => esc_html__( 'Line Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .all_icon_color i' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/* witr_text_align */					
				$this->add_responsive_control(
					'witr_text_align',
					[
						'label' => esc_html__( 'Inner Icon Align', 'themex' ),
						'type' => Controls_Manager::CHOOSE,					
						'options' => [
							'left' => [
								'title' => esc_html__( 'Left', 'themex' ),
								'icon' => 'eicon-text-align-left',
							],
							'center' => [
								'title' => esc_html__( 'Center', 'themex' ),
								'icon' => 'eicon-text-align-center',
							],
							'right' => [
								'title' => esc_html__( 'Right', 'themex' ),
								'icon' => 'eicon-text-align-right',
							],
							'justify' => [
								'title' => esc_html__( 'Justified', 'themex' ),
								'icon' => 'eicon-text-align-justify',
							],
						],
						'prefix_class' => 'themex-star-rating%s--align-',
						'selectors' => [
							'{{WRAPPER}} .all_icon_color i' => 'text-align: {{VALUE}}',
						],
					]
				);
				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_border',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .all_icon_color i',
					]
				);
				/* border_radius */
				$this->add_control(
					'witr_border_radius',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .all_icon_color i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .all_icon_color i',
					]
				);					
				/* blend mode style color */				
				$this->add_control(
					'witr_icon_blend_mode',
					[
						'label' => esc_html__( 'Blend Mode', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'' => esc_html__( 'Normal', 'themex' ),
							'multiply' => 'Multiply',
							'screen' => 'Screen',
							'overlay' => 'Overlay',
							'darken' => 'Darken',
							'lighten' => 'Lighten',
							'color-dodge' => 'Color Dodge',
							'saturation' => 'Saturation',
							'color' => 'Color',
							'difference' => 'Difference',
							'exclusion' => 'Exclusion',
							'hue' => 'Hue',
							'luminosity' => 'Luminosity',
						],
						'selectors' => [
							'{{WRAPPER}} .all_icon_color i' => 'mix-blend-mode: {{VALUE}}',
						],
					]
				);				

					
				/*  Rotate */
				$this->add_responsive_control(
					'witr_rotate',
					[
						'label' => esc_html__( 'Rotate', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'deg' ],
						'default' => [
							'size' => '',
							'unit' => 'deg',
						],
						'tablet_default' => [
							'unit' => 'deg',
						],
						'mobile_default' => [
							'unit' => 'deg',
						],
						'selectors' => [
							'{{WRAPPER}} .all_icon_color i' => 'transform: rotate({{SIZE}}{{UNIT}});',
						],
					]
				);

				/* witr_position_style */
				$this->add_responsive_control(
					'witr_position_style',
					[
						'label' => esc_html__( 'Icon Position', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'' => esc_html__( 'Default', 'themex' ),
							'absolute' => esc_html__( 'absolute', 'themex' ),
							'fixed' => esc_html__( 'fixed', 'themex' ),
							'inherit' => esc_html__( 'inherit', 'themex' ),
						],
						'selectors' => [
							'{{WRAPPER}} .all_icon_color i' => 'position: {{VALUE}};',
						],							
					]
				);
				/* witr_icon_top */
				$this->add_responsive_control(
					'witr_icon_top',
					[
						'label' => esc_html__( 'Icon Top', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => -100,
								'max' => 500,
							],
							'%' => [
								'min' => -100,
								'max' => 100,
							],		
						],
						'condition' => [
							'witr_position_style' => ["absolute","fixed"],
						],						
						'selectors' => [
							'{{WRAPPER}} .all_icon_color i' => 'top: {{SIZE}}{{UNIT}};',
						],
					]
				);
				
				/* witr_icon_left */
				$this->add_responsive_control(
					'witr_icon_left',
					[
						'label' => esc_html__( 'Icon Left', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => -100,
								'max' => 500,
							],
							'%' => [
								'min' => -100,
								'max' => 100,
							],	
						],
						'condition' => [
							'witr_position_style' => ["absolute","fixed"],
						],						
						'selectors' => [
							'{{WRAPPER}} .all_icon_color i' => 'left: {{SIZE}}{{UNIT}};',
						],
					]
				);

				/* icon margin */
				$this->add_responsive_control(
					'witr_icon_margin',
					[
						'label' => esc_html__( ' Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .all_icon_color i,{{WRAPPER}} .em-service2.sleft .em-service-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* icon padding */
				$this->add_responsive_control(
					'witr_icon_padding',
					[
						'label' => esc_html__( ' Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .all_icon_color i,{{WRAPPER}} .service_icon_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		
				

				$this->end_controls_tab();
				/*=== end icon normal style ====*/
		
				/*=== start icon hover style ====*/
				$this->start_controls_tab(
					'witr_icon_colors_hover',
					[
						'label' => esc_html__( 'Icon Hover', 'themex' ),
					]
				);
				$this->add_control(
					'shapeihtitle',
					[
						'label' => esc_html__( 'Shape Hover Background', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator' => 'before',
						'condition' => [
							'witr_style_service' => ['5','10'],
						],						
					]
				);				
				/* shape background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_ihshape_background',
						'label' => esc_html__( 'Shape Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .singleSS:hover .SIBG_1::before,{{WRAPPER}} .witr_service_10:hover::before',
						'condition' => [
							'witr_style_service' => ['5','10'],
						],						
					]
				);					
					/*  primary hover color */
					$this->add_control(
						'witr_hover_primary_color',
						[
							'label' => esc_html__( 'Icon Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .all_color_service:hover i ' => 'color: {{VALUE}}',
							],
						]
					);
					/* hover Icon background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_hover_icon',
							'label' => esc_html__( 'Icon Hover Background', 'themex' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .all_color_service:hover i,{{WRAPPER}} .poly_text_box:hover .service_icon_box::before',
						]
					);					
					/* witr_border_style */
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'witr_borderho',
							'label' => esc_html__( 'Border', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .all_color_service:hover i',
						]
					);					
					$this->end_controls_tab();
					/*=== end icon hover style ====*/					
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/
		$this->end_controls_section();
		/*=== end witr_icon style ====*/		

		/*=== start witr_image style ====*/
		$this->start_controls_section(
			'witr_style_image_Option',
			[
				'label' => esc_html__( ' Images Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_show_image' => 'yes',
				],				
			]
		);		 
			
			/*  image width */
			$this->add_responsive_control(
				'witr_image_width',
				[
					'label' => esc_html__( 'width', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => 25,
							'max' => 1000,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .all_icon_color img' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			/*  image height */
			$this->add_responsive_control(
				'witr_image_height',
				[
					'label' => esc_html__( 'Height', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => 25,
							'max' => 1000,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .all_icon_color img' => 'height: {{SIZE}}{{UNIT}};',
					],
				]			
			);
			/* witr_border_style */
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'witr_img_bb',
					'label' => esc_html__( 'Border', 'themex' ),
					'selector' => '{{WRAPPER}} .single_seivice_ani img,{{WRAPPER}} .all_icon_color img',
				]
			);			
			/* border_radius */
			$this->add_control(
				'witr_border_img_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'description' =>esc_html__('When Show Animation Set Not Work Border Radius','themex'),
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .all_icon_color img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* image margin */
			$this->add_responsive_control(
				'witr_image_margin',
				[
					'label' => esc_html__( ' Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_icon_color img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* image padding */
			$this->add_responsive_control(
				'witr_image_padding',
				[
					'label' => esc_html__( ' Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_icon_color img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_image style ====*/
		
		/*=== start witr_title style ====*/
		$this->start_controls_section(
			'witr_style_option_title',
			[
				'label' => esc_html__( 'Title Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			/* border_radius */
			$this->add_control(
				'witr_border_text_radius',
				[
					'label' => esc_html__( 'Title Box Border Radius', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .wirt_detail_texti' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_service' => ['11'],
					],					
				]
			);
				/* Icon background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_tex_background',
						'label' => esc_html__( '  Background', 'themex' ),
						'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .wirt_detail_texti',
						'condition' => [
							'witr_style_service' => ['11'],
						],						
					]
				);			
			/* image padding */
			$this->add_responsive_control(
				'witr_tex_padding',
				[
					'label' => esc_html__( 'Title Box Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .wirt_detail_texti' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_service' => ['11'],
					],					
				]
			);		
			/* color */
			$this->add_control(
				'witr_title_color',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_PRIMARY,
					],					
					'selectors' => [
						'{{WRAPPER}} .all_color_service h3,{{WRAPPER}} .all_color_service h3 a' => 'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
				'witr_title_hover_color',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .all_color_service h3:hover,{{WRAPPER}} .all_color_service h3 a:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_ttpy_color',
					'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
					],
					'selector' => '{{WRAPPER}} .all_color_service h3,{{WRAPPER}} .all_color_service h3 a',
				]
			);			
			/* title margin */
			$this->add_responsive_control(
				'witr_title_margin',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_color_service h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* title padding */
			$this->add_responsive_control(
				'witr_title_padding',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_color_service h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_title style ====*/

		/*=== start witr_title style ====*/
		$this->start_controls_section(
			'witr_style_option_title2',
			[
				'label' => esc_html__( 'Small Title Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_service' =>['11','12'],
				],				
			]
		);		 
			/* color */
			$this->add_control(
				'witr_title_color2',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_SECONDARY,
					],					
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .all_color_service h2,{{WRAPPER}} .all_color_service h2 a' => 'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
				'witr_title_hover_color2',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .all_color_service h2:hover,{{WRAPPER}} .all_color_service h2 a:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_ttpy_color2',
					'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
					],
					'selector' => '{{WRAPPER}} .all_color_service h2,{{WRAPPER}} .all_color_service h2 a',
				]
			);			
			/* title margin */
			$this->add_responsive_control(
				'witr_title_margin2',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_color_service h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* title padding */
			$this->add_responsive_control(
				'witr_title_padding2',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_color_service h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_title style ====*/
			
		/*=== start witr List content style ====*/		
		 $this->start_controls_section(
			'witr_option_list_content',
			[
				'label' => esc_html__( 'List Icon & Text Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_show_repeat_list' => ['yes'],
					'witr_style_service' =>['10','11'],
				],				
			]		 
		 );
		 
		/*=== start list_tabs style ====*/
		$this->start_controls_tabs( 'list_colors' );
		
			/*=== start icon_normal style ====*/
			$this->start_controls_tab(
				'iconl_colors_normal',
				[
					'label' => esc_html__( 'icon', 'themex' ),
				]
			);		 

		/* Icon Color */
		$this->add_control(
			'witr_iconl_color',
			[
				'label' => esc_html__( 'Icon', 'themex' ),
				'type' => Controls_Manager::COLOR,
				'separator'=>'before',
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .service_list_op ul li i' => 'color: {{VALUE}}',
				],
			]
		);
		/*  list icon font size */
		$this->add_responsive_control(
			'witr_icon size',
			[
				'label' => esc_html__( ' Size', 'themex' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'rem', 'em' ],
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .service_list_op ul li i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		/* Icon margin */
		$this->add_responsive_control(
			'witr_contenti_margin',
			[
				'label' => esc_html__( ' Margin', 'themex' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .service_list_op ul li i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		/* Icon padding */
		$this->add_responsive_control(
			'witr_contenti_padding',
			[
				'label' => esc_html__( ' Padding', 'themex' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .service_list_op ul li i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);		
		
		$this->end_controls_tab();
		/*=== end list normal style ====*/
	
			/*=== start icon hover style ====*/
			$this->start_controls_tab(
				'list_colors_hover',
				[
					'label' => esc_html__( 'text ', 'themex' ),
				]
			);		

				/* list text color */
				$this->add_control(
					'witr_list_color',
					[
						'label' => esc_html__( ' Text', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',
						'global' => [
							'default' => Global_Colors::COLOR_TEXT,
						],						
						'selectors' => [
							'{{WRAPPER}} .service_list_op ul li a,{{WRAPPER}} .service_list_op ul li p,{{WRAPPER}} .service_list_op ul li span,{{WRAPPER}} .service_list_op ul li' => 'color: {{VALUE}}',
						],
					]
				);
				/* list text color */
				$this->add_control(
					'witr_list_hover_color',
					[
						'label' => esc_html__( ' Text Hover', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .service_list_op ul li a:hover,{{WRAPPER}} .service_list_op ul li p:hover,{{WRAPPER}} .service_list_op ul li span:hover,{{WRAPPER}} .service_list_op ul li:hover' => 'color: {{VALUE}}',
						],
					]
				);
				
				/* typograohy color */			
				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'witr_list_color',
						'label' => esc_html__( 'Typography', 'themex' ),
						'global' => [
							'default' => Global_Typography::TYPOGRAPHY_TEXT,
						],
						'selector' => '{{WRAPPER}} .service_list_op ul li a,{{WRAPPER}} .service_list_op ul li p,{{WRAPPER}} .service_list_op ul li span,{{WRAPPER}} .service_list_op ul li',
					]
				);						
				
				/* margin */
				$this->add_responsive_control(
					'witr_list_margin',
					[
						'label' => esc_html__( 'Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .service_list_op ul li a,{{WRAPPER}} .service_list_op ul li p,{{WRAPPER}} .service_list_op ul li span,{{WRAPPER}} .service_list_op ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* padding */
				$this->add_responsive_control(
					'witr_list_padding',
					[
						'label' => esc_html__( 'Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .service_list_op ul li a,{{WRAPPER}} .service_list_op ul li p,{{WRAPPER}} .service_list_op ul li span,{{WRAPPER}} .service_list_op ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);


				$this->end_controls_tab();
				/*=== end text hover style ====*/
				
		$this->end_controls_tabs();
		/*=== end text_tabs style ====*/

	$this->end_controls_section();

	/*=== end witr_list style ====*/
		
		/*=== start witr content style ====*/
		$this->start_controls_section(
			'witr_style_option_content',
			[
				'label' => esc_html__( 'Content Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
			/* color */
			$this->add_control(
				'witr_content_color',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_TEXT,
					],					
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .all_color_service p ' => 'color: {{VALUE}}',
					],
				]
			);

			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_content_typography',
					'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_TEXT,
					],
					'selector' => '{{WRAPPER}} .all_color_service p',
				]
			);		

			/* content margin */
			$this->add_responsive_control(
				'witr_content_margin',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_color_service p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* content padding */
			$this->add_responsive_control(
				'witr_content_padding',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_color_service p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr content style ====*/			
		

		/*=== start witr button style ====*/
		$this->start_controls_section(
			'witr_style_option_button',
			[
				'label' => esc_html__( 'Button Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_show_button' => 'yes',
				],				
			]
		);		 

			/*=== start button_tabs style ====*/
			$this->start_controls_tabs( 'button_colors' );
				/*=== start button_normal style ====*/
				$this->start_controls_tab(
					'witr_button_colors_normal',
					[
						'label' => esc_html__( 'Normal', 'themex' ),
					]
				);
					/* color */
					$this->add_control(
						'witr_button_color',
						[
							'label' => esc_html__( 'Text Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'global' => [
								'default' => Global_Colors::COLOR_ACCENT,
							],							
							'separator'=>'before',
							'selectors' => [
								'{{WRAPPER}} .service-btn a,{{WRAPPER}} .witr_service_btn_3d a' => 'color: {{VALUE}}',
							],
						]
					);				

					/* typograohy color */			
					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'witr_button_typography',
							'label' => esc_html__( 'Typography', 'themex' ),
							'global' => [
								'default' => Global_Typography::TYPOGRAPHY_ACCENT,
							],
							'selector' => '{{WRAPPER}} .service-btn a,{{WRAPPER}} .witr_service_btn_3d a',
						]
					);	
					/* Button background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_button_background',
							'label' => esc_html__( 'button Background', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .service-btn a,{{WRAPPER}} .witr_service_btn_3d a',
						]
					);
					/* witr_border_style */
					$this->add_control(
						'witr_border_btn_style',
						[
							'label' => esc_html__( 'Border Style', 'themex' ),
							'type' => Controls_Manager::SELECT,
							'options' => [
								'default' => esc_html__( 'Default', 'themex' ),
								'none' => esc_html__( 'none', 'themex' ),
								'solid' => esc_html__( 'Solid', 'themex' ),
								'double' => esc_html__( 'Double', 'themex' ),
								'dotted' => esc_html__( 'Dotted', 'themex' ),
								'dashed' => esc_html__( 'Dashed', 'themex' ),
							],
							'selectors' => [
								'{{WRAPPER}} .service-btn a,{{WRAPPER}} .witr_service_btn_3d a' => 'border-style: {{VALUE}}',
							],
						]
					);		
					/* witr border */
					$this->add_control(
						'witr_borde_btn',
						[
							'label' => esc_html__( 'Border', 'themex' ),
							'type' => Controls_Manager::DIMENSIONS,
							'selectors' => [
								'{{WRAPPER}} .service-btn a,{{WRAPPER}} .witr_service_btn_3d a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'condition' => [
								'witr_border_btn_style' => ['solid','double','dotted','dashed','default'],
							],
						]							
						
					);
					/* border_color */
					$this->add_control(
						'witr_border_btn_color',
						[
							'label' => esc_html__( 'Border Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .service-btn a,{{WRAPPER}} .witr_service_btn_3d a' => 'border-color: {{VALUE}}',
							],
							'condition' => [
								'witr_border_btn_style' => ['solid','double','dotted','dashed','default'],
							],
						]
					);
					/* border_radius */
					$this->add_control(
						'witr_border_btn_radius',
						[
							'label' => esc_html__( 'Border Radius', 'themex' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%' ],
							'selectors' => [
								'{{WRAPPER}} .service-btn a,{{WRAPPER}} .witr_service_btn_3d a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',								
							],
						]
					);					
						
					/* button margin */
					$this->add_responsive_control(
						'witr_button_margin',
						[
							'label' => esc_html__( 'Margin', 'themex' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors' => [
								'{{WRAPPER}} .service-btn a,{{WRAPPER}} .witr_service_btn_3d a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					/* button padding */
					$this->add_responsive_control(
						'witr_button_padding',
						[
							'label' => esc_html__( 'Padding', 'themex' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors' => [
								'{{WRAPPER}} .service-btn a,{{WRAPPER}} .witr_service_btn_3d a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);					
				/*  witr_ib_width */
				$this->add_responsive_control(
					'witr_ib_width',
					[
						'label' => esc_html__( 'width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'separator'=>'before',
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .service-btn a' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  witr_ib_height */
				$this->add_responsive_control(
					'witr_ib_height',
					[
						'label' => esc_html__( 'Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .service-btn a' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  witr_ib_line_height */
				$this->add_responsive_control(
					'witr_ib_line_height',
					[
						'label' => esc_html__( 'Line Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .service-btn a' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/* witr_text_align */					
				$this->add_responsive_control(
					'witr_textib_align',
					[
						'label' => esc_html__( ' Align', 'themex' ),
						'type' => Controls_Manager::CHOOSE,					
						'options' => [
							'left' => [
								'title' => esc_html__( 'Left', 'themex' ),
								'icon' => 'eicon-text-align-left',
							],
							'center' => [
								'title' => esc_html__( 'Center', 'themex' ),
								'icon' => 'eicon-text-align-center',
							],
							'right' => [
								'title' => esc_html__( 'Right', 'themex' ),
								'icon' => 'eicon-text-align-right',
							],
							'justify' => [
								'title' => esc_html__( 'Justified', 'themex' ),
								'icon' => 'eicon-text-align-justify',
							],
						],
						'prefix_class' => 'themex-star-rating%s--align-',
						'selectors' => [
							'{{WRAPPER}} .service-btn a' => 'text-align: {{VALUE}}',
						],
					]
				);
				/* witr_boxib_shadow */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_boxib_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .service-btn a',
					]
				);				
						/* witr_top_ib */
						$this->add_responsive_control(
							'witr_top_ib',
							[
								'label' => esc_html__( 'Top', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -100,
										'max' => 500,
									],
									'%' => [
										'min' => -100,
										'max' => 500,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .service-btn' => 'top: {{SIZE}}{{UNIT}};',
								],
							]
						);				
			/* bicon_text_opacity */
			$this->add_control(
				'bicon_text_opacity',
				[
					'label' => esc_html__( 'Button Icon Opacity', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'max' => 1,
							'step' => 0.01,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .service-btn' => 'opacity: {{SIZE}};',
					],
				]
			);
			/* biconh_text_opacity */
			$this->add_control(
				'biconh_text_opacity',
				[
					'label' => esc_html__( 'Button Icon Hover Opacity', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'max' => 1,
							'step' => 0.01,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .all_color_service:hover .service-btn' => 'opacity: {{SIZE}};',
					],
				]
			);
			$this->add_control(
				'bicon_transition',
				[
					'label' => esc_html__( 'Transition Duration', 'elementor' ),
					'type' => Controls_Manager::SLIDER,
					'default' => [
						'size' => 0.5,
					],
					'range' => [
						'px' => [
							'max' => 3,
							'step' => 0.1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .service-btn' => 'transition: {{SIZE}}s',
					],
				]
			);				
				
				

				$this->end_controls_tab();
				/*=== end button normal style ====*/
			
				/*=== start button hover style ====*/
				$this->start_controls_tab(
					'witr_button_colors_hover',
					[
						'label' => esc_html__( 'Button Hover', 'themex' ),
					]
				);

					/* hover_color */
					$this->add_control(
						'witr_button_hover_color',
						[
							'label' => esc_html__( 'Text Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							
							'selectors' => [
								'{{WRAPPER}} .service-btn a:hover,{{WRAPPER}} .service-btn a:hover i,{{WRAPPER}} .witr_service_btn_3d a:hover' => 'color: {{VALUE}}',
							],
						]
					);					
						
					/* Button Hover background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_button_hover_background',
							'label' => esc_html__( 'button Hover Background', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .service-btn a:hover,{{WRAPPER}} .witr_service_btn_3d a:hover',
						]
					);
					/* witr_hoverborder_style */
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'witr_hoverborder_style',
							'label' => esc_html__( 'Button Hover Border', 'themex' ),
							'selector' => '{{WRAPPER}} .service-btn a:hover,{{WRAPPER}} .witr_service_btn_3d a:hover',
						]
					);					
					
					
					$this->end_controls_tab();
					/*=== end button hover style ====*/
			$this->end_controls_tabs();
			/*=== end button_tabs style ====*/			
		 $this->end_controls_section();
		/*=== end  witr button style ====*/		

			
		/*=== start witr_icon_Button style ====*/
		$this->start_controls_section(
			'section_style_icon_button',
			[
				'label' => esc_html__( 'Button Icon Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_show_icon_b' => 'yes',
				],				
			]
		);
		
			/*=== start icon_tabs style ====*/
			$this->start_controls_tabs( 'button_icon' );
			
				/*=== start icon_normal style ====*/
				$this->start_controls_tab(
					'witr_icon_colorb_normal',
					[
						'label' => esc_html__( 'Normal', 'themex' ),
					]
				);		
				/* Icon Color */
				$this->add_control(
					'witr_primaryb_color',
					[
						'label' => esc_html__( 'Icon Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .all_color_service a span' => 'color: {{VALUE}}',
						],
						
					]
				);
				
				/*  icon font size */
				$this->add_responsive_control(
					'witr_icon_sizeb',
					[
						'label' => esc_html__( 'Icon Size', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', 'em' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .all_color_service a span' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/* Icon background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_iconsb_background',
						'label' => esc_html__( 'Icon Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .all_color_service a span',
					]
				);				
				/*  icon width */
				$this->add_responsive_control(
					'witr_iconb_width',
					[
						'label' => esc_html__( 'width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .all_color_service a span' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon height */
				$this->add_responsive_control(
					'witr_iconb_height',
					[
						'label' => esc_html__( 'Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .all_color_service a span' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon line height */
				$this->add_responsive_control(
					'witr_iconb_line_height',
					[
						'label' => esc_html__( 'Line Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .all_color_service a span' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/* witr_text_align */					
				$this->add_responsive_control(
					'witr_textb_align',
					[
						'label' => esc_html__( 'Inner Icon Align', 'themex' ),
						'type' => Controls_Manager::CHOOSE,					
						'options' => [
							'left' => [
								'title' => esc_html__( 'Left', 'themex' ),
								'icon' => 'eicon-text-align-left',
							],
							'center' => [
								'title' => esc_html__( 'Center', 'themex' ),
								'icon' => 'eicon-text-align-center',
							],
							'right' => [
								'title' => esc_html__( 'Right', 'themex' ),
								'icon' => 'eicon-text-align-right',
							],
							'justify' => [
								'title' => esc_html__( 'Justified', 'themex' ),
								'icon' => 'eicon-text-align-justify',
							],
						],
						'prefix_class' => 'themex-star-rating%s--align-',
						'selectors' => [
							'{{WRAPPER}} .all_color_service a span' => 'text-align: {{VALUE}}',
						],
					]
				);
				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_borderb',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .all_color_service a span',
					]
				);
				/* border_radius */
				$this->add_control(
					'witr_borderbs_radius',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .all_color_service a span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_boxb_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .all_color_service a span',
					]
				);														
				/*  Rotate */
				$this->add_responsive_control(
					'witr_rotateb',
					[
						'label' => esc_html__( 'Rotate', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'deg' ],
						'default' => [
							'unit' => 'deg',
						],
						'tablet_default' => [
							'unit' => 'deg',
						],
						'mobile_default' => [
							'unit' => 'deg',
						],
						'selectors' => [
							'{{WRAPPER}} .all_color_service a span' => 'transform: rotate({{SIZE}}{{UNIT}});',
						],
					]
				);
				/* icon margin */
				$this->add_responsive_control(
					'witr_iconb_margin',
					[
						'label' => esc_html__( ' Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .all_color_service a span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* icon padding */
				$this->add_responsive_control(
					'witr_iconb_padding',
					[
						'label' => esc_html__( ' Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .all_color_service a span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		
				

				$this->end_controls_tab();
				/*=== end icon normal style ====*/
		
				/*=== start icon hover style ====*/
				$this->start_controls_tab(
					'witr_icon_colorsb_hover',
					[
						'label' => esc_html__( 'Icon Hover', 'themex' ),
					]
				);					
					/*  primary hover color */
					$this->add_control(
						'witr_hover_primaryb_color',
						[
							'label' => esc_html__( 'Icon Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .all_color_service a:hover span ' => 'color: {{VALUE}}',
							],
						]
					);
					/* hover Icon background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_hoverb_icon',
							'label' => esc_html__( 'Icon Hover Background', 'themex' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .all_color_service a:hover span',
						]
					);					
					/* witr_border_style */
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'witr_borderhob',
							'label' => esc_html__( 'Border', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .all_color_service a:hover span',
						]
					);					
					$this->end_controls_tab();
					/*=== end icon hover style ====*/					
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/
		$this->end_controls_section();
		/*=== end witr_icon Button style ====*/		

		/*=== start witr all style ====*/
		$this->start_controls_section(
			'witr_style_all_content',
			[
				'label' => esc_html__( 'All Text Hover Color', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_service' =>['4','6'],
				],					
			]
		);		 
			/* color */
			$this->add_control(
				'witr_alltitle_color',
				[
					'label' => esc_html__( 'All Text Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',					
					'selectors' => [
						'{{WRAPPER}} .em-service:hover .em-service-icon i,{{WRAPPER}} .em-service:hover .em-service-title h3 a,{{WRAPPER}} .em-service:hover .em-service-title h3,{{WRAPPER}} .em-service:hover .em-service-desc p,{{WRAPPER}} .em-service:hover .service-btn > a,{{WRAPPER}} .all_color_service:hover .witr_service_icon_3d i,{{WRAPPER}} .all_color_service:hover .witr_service_content_3d h3 a,{{WRAPPER}} .all_color_service:hover .witr_service_content_3d h3,{{WRAPPER}} .all_color_service:hover .witr_service_content_3d p,{{WRAPPER}} .all_color_service:hover .witr_service_btn_3d a' => 'color: {{VALUE}}',
					],
				] 
			);
						/* border_color */
						$this->add_control(
							'witr_bordear_btn_color',
							[
								'label' => esc_html__( 'Button Border hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .all_color_service:hover .witr_service_btn_3d a' => 'border-color: {{VALUE}}',
								],
							]
						);			
			/* box shadow color */	
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'witr_sbox_shadow',
					'separator'=>'before',
					'label' => esc_html__( 'Box Shadow', 'themex' ),
					'selector' => '{{WRAPPER}} .em-service,{{WRAPPER}} .all_color_service',
				]
			);	
			/*  background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_backgrounda',
					'label' => esc_html__( 'Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .em-service:hover,{{WRAPPER}} .witr_service_front_3d',
				]
			);
				
			/* color */
			$this->add_control(
				'witr_before_heading',
				[
					'label' => esc_html__( 'Image Overlay Color', 'themex' ),
					'type' => Controls_Manager::HEADING,				
				]
			);				
				/*  background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_backgrounda_before',
						'label' => esc_html__( 'Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .em-service:hover::before,{{WRAPPER}} .witr_service_front_3d:before',
					]
				);
				/* Fontend border_radius */
				$this->add_control(
					'witr_borderf_radius',
					[
						'label' => esc_html__( 'Fontend Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .witr_service_front_3d,{{WRAPPER}} .witr_service_front_3d:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						'condition' => [
							'witr_style_service' =>['6'],
						],						
					]
				);				

	
/* =================================================== Bekend Option =================================================================== */
			/* heading2 */
			$this->add_control(
				'witr_heading3_color',
				[
					'label' => esc_html__( 'Box Bekend Option Bottom Look', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'separator'=>'before',
					'condition' => [
						'witr_style_service' =>['6'],
					],					
				]
			);
			/* heading2 */
			$this->add_control(
				'witr_alheadeing2_color',
				[
					'label' => esc_html__( 'Box BG color', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'default' =>'heading',
					'separator'=>'before',
					'condition' => [
						'witr_style_service' =>['6'],
					],					
				]
			);
			
			/* box background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_bbgh2_background',
					'label' => esc_html__( 'Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .witr_service_back_3d',
					'condition' => [
						'witr_style_service' =>['6'],
					],					
				]
			);			
			/* heading2 */
			$this->add_control(
				'witr_bvalheadeing2_color',
				[
					'label' => esc_html__( 'Box Overlay BG color', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'default' =>'heading',
					'separator'=>'before',
					'condition' => [
						'witr_style_service' =>['6'],
					],					
				]
			);			
			/* box background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_bvbgh2_background',
					'label' => esc_html__( 'Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .witr_service_back_3d:before',
					'condition' => [
						'witr_style_service' =>['6'],
					],					
				]
			);
				/* Fontend border_radius */
				$this->add_control(
					'witr_borderb_radius',
					[
						'label' => esc_html__( 'Bekend Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .witr_service_back_3d,{{WRAPPER}} .witr_service_back_3d:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						'condition' => [
							'witr_style_service' =>['6'],
						],						
					]
				);				


		 $this->end_controls_section();
		/*=== end  witr all text style ====*/
		

		/*=== start witr all style ====*/
		$this->start_controls_section(
			'witr_style_all_content9',
			[
				'label' => esc_html__( 'All Text Hover Color', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_service' =>['9'],
				],					
			]
		);		 
			/* color */
			$this->add_control(
				'witr_before_headings9',
				[
					'label' => esc_html__( 'Shape BG Color', 'themex' ),
					'type' => Controls_Manager::HEADING,				
				]
			);	
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_backgrounda9',
					'label' => esc_html__( 'Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .witr_sstyle_9::before',
				]
			);
				
				/* color */
				$this->add_control(
					'witr_before_heading9',
					[
						'label' => esc_html__( 'Shape Hover BG Color', 'themex' ),
						'type' => Controls_Manager::HEADING,				
					]
				);				
				/*  background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_backgrounda_before9',
						'label' => esc_html__( 'Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_sstyle_9:hover::before',
					]
				);
				
			/* color */
			$this->add_control(
				'witr_alltitle_color9',
				[
					'label' => esc_html__( 'Title and Content Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',					
					'selectors' => [
						'{{WRAPPER}} .witr_sstyle_9:hover h3,{{WRAPPER}} .witr_sstyle_9:hover p' => 'color: {{VALUE}}',
					],
				] 
			);
				/* color */
				$this->add_control(
					'witr_before_btns9',
					[
						'label' => esc_html__( 'Icon and button color', 'themex' ),
						'type' => Controls_Manager::HEADING,				
					]
				);
				/* color */
				$this->add_control(
					'witr_alltitle_uncolor9',
					[
						'label' => esc_html__( 'Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',					
						'selectors' => [
							'{{WRAPPER}} .em-service2.witr_sstyle_9:hover .em-service-icon i,{{WRAPPER}} .witr_sstyle_9:hover .service-btn > a' => 'color: {{VALUE}}',
						],
					] 
				);				
				/*  background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_backgrounda_btn9',
						'label' => esc_html__( 'Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .em-service2.witr_sstyle_9:hover .em-service-icon i,{{WRAPPER}} .witr_sstyle_9:hover .service-btn > a',
					]
				);			
			/* border_color */
			$this->add_control(
				'witr_bordear_btn_color9',
				[
					'label' => esc_html__( 'Button Border Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .em-service2.witr_sstyle_9:hover .em-service-icon i,{{WRAPPER}} .witr_sstyle_9:hover .service-btn > a' => 'border-color: {{VALUE}}',
					],
				]
			);			
			/* box shadow color */	
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'witr_sbox_shadow9',
					'separator'=>'before',
					'label' => esc_html__( 'Icon Box Shadow', 'themex' ),
					'selector' => '{{WRAPPER}} .em-service2.witr_sstyle_9:hover .em-service-icon i',
				]
			);					
				
				/* Fontend border_radius */
				$this->add_control(
					'witr_borderf_radius9',
					[
						'label' => esc_html__( 'Shape Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .witr_sstyle_9:hover::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						'condition' => [
							'witr_style_service' =>['9'],
						],						
					]
				);				
									
		
		
		
		 $this->end_controls_section();
		/*=== end  witr all text style ====*/

		/*=== start Text Box style ====*/
		$this->start_controls_section(
			'section_text_box',
			[
				'label' => esc_html__( ' Text Box  Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_service' =>['1','2','3','13'],
					'witr_showtop_image' => 'yes',
				],				
			]
		);
			/* box text background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_boxt_background',
					'label' => esc_html__( 'Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .text_box',
					
				]
			);		
				/* border_radius */
				$this->add_control(
					'witr_box_tr',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .text_box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* HEADING  */
				$this->add_control(
					'witr_boxhh',
					[
						'label' => esc_html__( 'Background Hover', 'themex' ),
						'type' => Controls_Manager::HEADING,
					]
				);						
				/* box text h background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_boxth_background',
						'label' => esc_html__( 'Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .text_box:hover',
						
					]
				);				
				/* box padding */
				$this->add_responsive_control(
					'witr_box_tpadding',
					[
						'label' => esc_html__( ' Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .text_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);				

		

		$this->end_controls_section();
		/*=== start Single Box style ====*/			
			
		/*=== start Text Box style ====*/
		$this->start_controls_section(
			'section_all_hover',
			[
				'label' => esc_html__( ' All Text Hover Color', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_service' =>['1','2','3','5','7','8','10','11','12','13'],
				],				
			]
		);
			/* witr_all_hover_color */
			$this->add_control(
				'witr_all_hover_color',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .all_color_service:hover h3,{{WRAPPER}} .all_color_service:hover h3 a,{{WRAPPER}} .all_color_service:hover h2,{{WRAPPER}} .all_color_service:hover p,{{WRAPPER}} .all_color_service:hover i,{{WRAPPER}} .all_color_service:hover .service_list_op a' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'color_hover_transition',
				[
					'label' => esc_html__( 'Transition Duration', 'elementor' ),
					'type' => Controls_Manager::SLIDER,
					'default' => [
						'size' => 0.5,
					],
					'range' => [
						'px' => [
							'max' => 3,
							'step' => 0.1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .all_color_service h3,{{WRAPPER}} .all_color_service h3 a,{{WRAPPER}} .all_color_service h2,{{WRAPPER}} .all_color_service p,{{WRAPPER}} .all_color_service i,{{WRAPPER}} .all_color_service .service_list_op a' => 'transition: {{SIZE}}s',
					],
				]
			);			
		
			$this->end_controls_section();
		/*=== start Single Box style ====*/				
			
			
    } /*==function end==*/

	
	
	
    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();
		$target = ! empty($witrshowdata['title_link']['is_external']) ? ' target="_blank"' : '';
		$nofollow = ! empty($witrshowdata['title_link']['nofollow']) ? ' rel="nofollow"' : '';		
		$target_btn = ! empty($witrshowdata['witr_button_link']['is_external']) ? ' target="_blank"' : '';
		$nofollow_btn = ! empty($witrshowdata['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';
		
		$txbd_image = ! empty($witrshowdata['witr_top_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witrshowdata, 'txbd_image_size', 'witr_top_image' ) : '';	
		$txbd_icon_image = ! empty($witrshowdata['witr_service_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witrshowdata, 'txbd_icon_image_size', 'witr_service_image' ) : '';		
		
	switch ( $witrshowdata['witr_style_service'] ) {
		case '13':
		?>
	
		
			<div class=" service13">
				<div class="em_service_content ">
					<div class="em_single_service_text <?php echo $witrshowdata['witr_Select_whi']; ?> <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
						<div class="service_top_image">
							<!-- image -->
							<?php echo $txbd_image; ?>			
						</div>
						<div class="poly_text_box all_color_service">
							<div class="service_icon_box all_icon_color">
								<div class="em-service-icon">
									<!-- icon -->
									<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
										<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
									<?php } ?>					
									<!-- custom icon -->
									<?php if( ! empty($witrshowdata['witr_service_custom'])){?>	
										<i class="<?php echo $witrshowdata['witr_service_custom']; ?>"></i>
									<?php } ?>
									<!-- image -->
									<?php echo $txbd_icon_image; ?>				
								</div>			
							</div>
							<div class="em_service_text_box">
								<div class="em-service-title">
									<!-- title -->
									<?php if( ! empty($witrshowdata['witr_service_title'])){?>
									<?php if($witrshowdata['title_link'] ['url']){?> 
										<h3><a href="<?php echo $witrshowdata['title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_service_title']; ?></a></h3>
									<?php }else{ ?>
									<h3><?php echo $witrshowdata['witr_service_title']; ?> </h3>
									<?php }	?>
									<?php } ?>
									<!-- content -->
								</div>						
								<div class="em-service-desc">
									<?php if( ! empty($witrshowdata['witr_service_content'])){?>
										<p><?php echo $witrshowdata['witr_service_content']; ?> </p>		
									<?php } ?>
								</div>
								<!-- button -->
								<?php if( ! empty($witrshowdata['witr_service_button'])){?>
									<div class="service-btn">
										<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_service_button']; ?>
											<?php if($witrshowdata['witr_show_icon_b']=='yes'){ ?> 
												<!-- custom icon -->
												<?php if(isset($witrshowdata['witr_custom_icon_b']) && ! empty($witrshowdata['witr_custom_icon_b'])){?>	
													<span class="<?php echo $witrshowdata['witr_custom_icon_b']; ?>"></span>
												<?php } ?>
											<?php }?>										
										</a>
									</div>
								<?php } ?>				
							</div>
						</div>
					</div>
				</div>
			</div>			

				
		<?php 
		break;		
		case '12':
		?>
		
			<div class="service-item witr_service_s_12  <?php echo $witrshowdata['witr_Select_whi']; ?> text-<?php echo $witrshowdata['witr_text_ltc']; ?>  <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
				<div class="service_top_image">
					<!-- image -->
					<?php echo $txbd_image; ?>			
				</div>
				<div class="text_box all_icon_color all_color_service">
						<!-- icon -->
						<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
							<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
						<?php } ?>
						<!-- custom icon -->
						<?php if( ! empty($witrshowdata['witr_service_custom'])){?>	
							<i class="<?php echo $witrshowdata['witr_service_custom']; ?>"></i>
						<?php } ?>				
						<!-- image -->
						<?php echo $txbd_icon_image; ?>

						<!-- Sub title -->
						<?php if(isset($witrshowdata['witr_service_sub_title']) && ! empty($witrshowdata['witr_service_sub_title'])){?>
							<h2><?php echo $witrshowdata['witr_service_sub_title']; ?> </h2>
						<?php } ?>					
						<!-- title -->
						<?php if( ! empty($witrshowdata['witr_service_title'])){?>
						<?php if($witrshowdata['title_link'] ['url']){?> 
							<h3><a href="<?php echo $witrshowdata['title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_service_title']; ?></a></h3>
						<?php }else{ ?>
						<h3><?php echo $witrshowdata['witr_service_title']; ?> </h3>
						<?php }	?>
						<?php } ?>
						<!-- content -->
						<?php if( ! empty($witrshowdata['witr_service_content'])){?>
							<p><?php echo $witrshowdata['witr_service_content']; ?> </p>		
						<?php } ?>
						<!-- button -->
						<?php if( ! empty($witrshowdata['witr_service_button'])){?>
							<div class="service-btn">
							<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_service_button']; ?>
								<?php if($witrshowdata['witr_show_icon_b']=='yes'){ ?> 
									<!-- custom icon -->
									<?php if(isset($witrshowdata['witr_custom_icon_b']) && ! empty($witrshowdata['witr_custom_icon_b'])){?>	
										<span class="<?php echo $witrshowdata['witr_custom_icon_b']; ?>"></span>
									<?php } ?>
								<?php }?>	
							</a>
							</div>
						<?php } ?>	
				</div> <!-- text_box -->							
			</div> <!-- service item -->							
 		<?php 
		
		break;		
		
		case '11':
		?>
		
		<div class=" witr_service_11 all_color_service  text-<?php echo $witrshowdata['witr_text_ltc']; ?> <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
			<div class=" wirt_detail_texti">
				<div class=" wirt_detail_icon all_icon_color">
					<!-- icon -->
					<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
						<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
					<?php } ?>
					<!-- custom icon -->
					<?php if( ! empty($witrshowdata['witr_service_custom'])){?>					
						<i class="<?php echo $witrshowdata['witr_service_custom']; ?>"></i>
					<?php } ?>				
					<!-- image -->
					<?php echo $txbd_icon_image; ?>			
				</div>
				<div class="wirt_detail_title">
					<!-- title -->
					<?php if( ! empty($witrshowdata['witr_service_title'])){?>
					<?php if($witrshowdata['title_link'] ['url']){?> 
						<h3><a href="<?php echo $witrshowdata['title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_service_title']; ?></a></h3>
					<?php }else{ ?>
						<h3><?php echo $witrshowdata['witr_service_title']; ?> </h3>
					<?php }	?>
					<?php } ?>
					<!-- Sub title -->
					<?php if(isset($witrshowdata['witr_service_sub_title']) && ! empty($witrshowdata['witr_service_sub_title'])){?>
						<h2><?php echo $witrshowdata['witr_service_sub_title']; ?> </h2>
					<?php } ?>				
				</div>
			</div>
			<div class="wirt_detail_content">
				<!-- content -->
				<?php if( ! empty($witrshowdata['witr_service_content'])){?>
					<p><?php echo $witrshowdata['witr_service_content']; ?> </p>		
				<?php } ?>
				<!--- list content --->
				<?php if($witrshowdata['witr_show_repeat_list']=='yes'){?>
				<div class="service_list_op">
					<!-- list -->
					<?php if(isset($witrshowdata['witr_service_list']) && ! empty($witrshowdata['witr_service_list'])){?>
						<?php echo $witrshowdata['witr_service_list']; ?>
					<?php }?>
				</div>	
				<?php } ?>				
				<!-- button -->
				<?php if( ! empty($witrshowdata['witr_service_button'])){?>
					<div class="service-btn witr_sbtn_s8">
					<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_service_button']; ?>
						<?php if($witrshowdata['witr_show_icon_b']=='yes'){ ?> 
							<!-- custom icon -->
							<?php if(isset($witrshowdata['witr_custom_icon_b']) && ! empty($witrshowdata['witr_custom_icon_b'])){?>	
								<i class="<?php echo $witrshowdata['witr_custom_icon_b']; ?>"></i>
							<?php } ?>
						<?php }?>
					</a>
					</div>
				<?php } ?>
			</div>
		</div>

		<?php 
		break;
		
		case '10':
		?>
		
		<div class="witr_service_10  all_color_service <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
			<div class="serIcon  service_text all_icon_color">
					<!-- icon -->
					<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
						<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
					<?php } ?>
				<!-- custom icon -->
				<?php if( ! empty($witrshowdata['witr_service_custom'])){?>					
					<i class="<?php echo $witrshowdata['witr_service_custom']; ?>"></i>
				<?php } ?>				
				<!-- image -->
				<?php echo $txbd_icon_image; ?>			
			</div>
			<div class="detail_SS">
				<!-- title -->
				<?php if( ! empty($witrshowdata['witr_service_title'])){?>
				<?php if($witrshowdata['title_link'] ['url']){?> 
					<h3><a href="<?php echo $witrshowdata['title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_service_title']; ?></a></h3>
				<?php }else{ ?>
				<h3><?php echo $witrshowdata['witr_service_title']; ?> </h3>
				<?php }	?>
				<?php } ?>
				<!-- content -->
				<?php if( ! empty($witrshowdata['witr_service_content'])){?>
					<p><?php echo $witrshowdata['witr_service_content']; ?> </p>		
				<?php } ?>
				<!--- list content --->
				<?php if($witrshowdata['witr_show_repeat_list']=='yes'){?>
				<div class="service_list_op">
					<!-- list -->
					<?php if(isset($witrshowdata['witr_service_list']) && ! empty($witrshowdata['witr_service_list'])){?>
						<?php echo $witrshowdata['witr_service_list']; ?>
					<?php }?>
				</div>	
				<?php } ?>				
				<!-- button -->
				<?php if( ! empty($witrshowdata['witr_service_button'])){?>
					<div class="service-btn">
						<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_service_button']; ?>
							<?php if($witrshowdata['witr_show_icon_b']=='yes'){ ?> 
								<!-- custom icon -->
								<?php if(isset($witrshowdata['witr_custom_icon_b']) && ! empty($witrshowdata['witr_custom_icon_b'])){?>	
									<span class="<?php echo $witrshowdata['witr_custom_icon_b']; ?>"></span>
								<?php } ?>
							<?php }?>					
						</a>
					</div>
				<?php } ?>
			</div>
		</div>			


		<?php 
		break;
		
		
		case '9':
		?>
		
			<div class="em-service2 sleft all_color_service witr_sstyle_9">
				<div class="em_service_content ">
					<div class="em_single_service_text <?php echo $witrshowdata['witr_Select_whi']; ?> <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
						<div class="service_top_image">
							<!-- image -->
							<?php echo $txbd_image; ?>			
						</div>
						<div class="text_box ">
							<div class="service_top_text all_icon_color">
								<div class="em-service-icon">
									<!-- icon -->
									<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
										<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
									<?php } ?>				
									<!-- custom icon -->
									<?php if( ! empty($witrshowdata['witr_service_custom'])){?>	
										<i class="<?php echo $witrshowdata['witr_service_custom']; ?>"></i>
									<?php } ?>
									<!-- image -->
									<?php echo $txbd_icon_image; ?>				
								</div>			
							</div>
							<div class="em-service-inner">
								<div class="em-service-title ">
									<!-- title -->
									<?php if( ! empty($witrshowdata['witr_service_title'])){?>
									<?php if($witrshowdata['title_link'] ['url']){?> 
										<h3><a href="<?php echo $witrshowdata['title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_service_title']; ?></a></h3>
									<?php }else{ ?>
									<h3><?php echo $witrshowdata['witr_service_title']; ?> </h3>
									<?php }	?>
									<?php } ?>
									<!-- content -->
								</div>						
								<div class="em-service-desc">
									<?php if( ! empty($witrshowdata['witr_service_content'])){?>
										<p><?php echo $witrshowdata['witr_service_content']; ?> </p>		
									<?php } ?>
								</div>
								<!-- button -->
								<?php if( ! empty($witrshowdata['witr_service_button'])){?>
									<div class="service-btn">
									<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_service_button']; ?>
										<?php if($witrshowdata['witr_show_icon_b']=='yes'){ ?> 
											<!-- custom icon -->
											<?php if(isset($witrshowdata['witr_custom_icon_b']) && ! empty($witrshowdata['witr_custom_icon_b'])){?>	
												<span class="<?php echo $witrshowdata['witr_custom_icon_b']; ?>"></span>
											<?php } ?>
										<?php }?>													
									
									</a>
									</div>
								<?php } ?>				
							</div>
						</div>
					</div>
				</div>
			</div>			


		<?php 
		break;
		
		
		case '8':
		?>
		<div class="singleSS witr_service_8 all_color_service  text-<?php echo $witrshowdata['witr_text_ltc']; ?> <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
			<div class="serIcon  service_text all_icon_color">
					<!-- icon -->
					<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
						<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
					<?php } ?>
				<!-- custom icon -->
				<?php if( ! empty($witrshowdata['witr_service_custom'])){?>					
					<i class="<?php echo $witrshowdata['witr_service_custom']; ?>"></i>
				<?php } ?>				
				<!-- image -->
				<?php echo $txbd_icon_image; ?>			
			</div>
			<div class="detail_SS">
				<!-- title -->
				<?php if( ! empty($witrshowdata['witr_service_title'])){?>
				<?php if($witrshowdata['title_link'] ['url']){?> 
					<h3><a href="<?php echo $witrshowdata['title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_service_title']; ?></a></h3>
				<?php }else{ ?>
				<h3><?php echo $witrshowdata['witr_service_title']; ?> </h3>
				<?php }	?>
				<?php } ?>
				<!-- content -->
				<?php if( ! empty($witrshowdata['witr_service_content'])){?>
					<p><?php echo $witrshowdata['witr_service_content']; ?> </p>		
				<?php } ?>				
				<!-- button -->
				<?php if( ! empty($witrshowdata['witr_service_button'])){?>
					<div class="service-btn witr_sbtn_s8">
					<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_service_button']; ?> 
						<?php if($witrshowdata['witr_show_icon_b']=='yes'){ ?> 
							<!-- custom icon -->
							<?php if(isset($witrshowdata['witr_custom_icon_b']) && ! empty($witrshowdata['witr_custom_icon_b'])){?>	
								<i class="<?php echo $witrshowdata['witr_custom_icon_b']; ?>"></i>
							<?php } ?>
						<?php }?>
					</a>
					</div>
				<?php } ?>
			</div>
		</div>
				

		<?php 
		break;	
		case '7':
		?>
		<div class="singleSS witr_service_7 all_color_service text-<?php echo $witrshowdata['witr_text_ltc']; ?> <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
			<div class="serIcon  service_text all_icon_color">
					<!-- icon -->
					<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
						<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
					<?php } ?>
				<!-- custom icon -->
				<?php if( ! empty($witrshowdata['witr_service_custom'])){?>					
					<i class="<?php echo $witrshowdata['witr_service_custom']; ?>"></i>
				<?php } ?>				
				<!-- image -->
				<?php echo $txbd_icon_image; ?>			
			</div>
			<div class="detail_SS">
				<!-- title -->
				<?php if( ! empty($witrshowdata['witr_service_title'])){?>
				<?php if($witrshowdata['title_link'] ['url']){?> 
					<h3><a href="<?php echo $witrshowdata['title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_service_title']; ?></a></h3>
				<?php }else{ ?>
				<h3><?php echo $witrshowdata['witr_service_title']; ?> </h3>
				<?php }	?>
				<?php } ?>
				<!-- content -->
				<?php if( ! empty($witrshowdata['witr_service_content'])){?>
					<p><?php echo $witrshowdata['witr_service_content']; ?> </p>		
				<?php } ?>				
				<!-- button -->
				<?php if( ! empty($witrshowdata['witr_service_button'])){?>
					<div class="service-btn">
						<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_service_button']; ?>
							<?php if($witrshowdata['witr_show_icon_b']=='yes'){ ?> 
								<!-- custom icon -->
								<?php if(isset($witrshowdata['witr_custom_icon_b']) && ! empty($witrshowdata['witr_custom_icon_b'])){?>	
									<span class="<?php echo $witrshowdata['witr_custom_icon_b']; ?>"></span>
								<?php } ?>
							<?php }?>					
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
				

		<?php 
		break;		
		case '6':
		?>

		<div class="witr_service_3d witr_service_con_3d <?php echo $witrshowdata['witr_xyz']; ?>">
			<div class="witr_single_service_3d all_color_service text-<?php echo $witrshowdata['witr_text_ltc']; ?> <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
				<!-- fontent -->
				<div class="witr_service_front_3d">
					<div class="witr_service_position">
						<div class="witr_service_content_3d ">
							<div class="witr_service_icon_3d all_icon_color">
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
								<?php } ?>
								<!-- custom icon -->
								<?php if( ! empty($witrshowdata['witr_service_custom'])){?>	
									<i class="<?php echo $witrshowdata['witr_service_custom']; ?>"></i>
								<?php } ?>				
								<!-- image -->
								<?php echo $txbd_icon_image; ?>						
							</div>
							<!-- title -->
							<?php if( ! empty($witrshowdata['witr_service_title'])){?>
							<?php if($witrshowdata['title_link'] ['url']){?> 
								<h3><a href="<?php echo $witrshowdata['title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_service_title']; ?></a></h3>
							<?php }else{ ?>
							<h3><?php echo $witrshowdata['witr_service_title']; ?> </h3>
							<?php }	?>
							<?php } ?>
							<!-- content -->
							<?php if( ! empty($witrshowdata['witr_service_content'])){?>
								<p><?php echo $witrshowdata['witr_service_content']; ?> </p>		
							<?php } ?>						
						</div>
						<!-- button -->
						<?php if( ! empty($witrshowdata['witr_service_button'])){?>
							<div class="witr_service_btn_3d">
							<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_service_button']; ?>
								<?php if($witrshowdata['witr_show_icon_b']=='yes'){ ?> 
									<!-- custom icon -->
									<?php if(isset($witrshowdata['witr_custom_icon_b']) && ! empty($witrshowdata['witr_custom_icon_b'])){?>	
										<span class="<?php echo $witrshowdata['witr_custom_icon_b']; ?>"></span>
									<?php } ?>
								<?php }?>							
							</a>
							</div>
						<?php } ?>	
					</div>
				</div>
				<!-- bekend -->
				<div class="witr_service_back_3d">
					<div class="witr_service_position ">
						<div class="witr_service_content_3d">
							<div class="witr_service_icon_3d all_icon_color">
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item2'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item2']['value']);?>"></i>
								<?php } ?>
								<!-- custom icon -->
								<?php if( ! empty($witrshowdata['witr_service_custom2'])){?>	
									<i class="<?php echo $witrshowdata['witr_service_custom2']; ?>"></i>
								<?php } ?>				
								<!-- image -->
								<?php if( ! empty($witrshowdata['witr_service_image2']['url'])){?>
									<img src="<?php echo $witrshowdata['witr_service_image2']['url'];?>" alt="" />
								<?php } ?>													
							</div>
							<!-- title -->
							<?php if(isset($witrshowdata['witr_service_title2']) && ! empty($witrshowdata['witr_service_title2'])){?>
							<?php if($witrshowdata['title_link2'] ['url']){?> 
								<h3><a href="<?php echo $witrshowdata['title_link2'] ['url']; ?>"><?php echo $witrshowdata['witr_service_title2']; ?></a></h3>
							<?php }else{ ?>
							<h3><?php echo $witrshowdata['witr_service_title2']; ?> </h3>
							<?php }	?>
							<?php } ?>
							<!-- content -->
							<?php if(isset($witrshowdata['witr_service_content2']) && ! empty($witrshowdata['witr_service_content2'])){?>
								<p><?php echo $witrshowdata['witr_service_content2']; ?> </p>		
							<?php } ?>						
						</div>
						
						<!-- button -->
						<?php if(isset($witrshowdata['witr_service_button2']) && ! empty($witrshowdata['witr_service_button2'])){?>
							<div class="witr_service_btn_3d">
							<a href="<?php echo $witrshowdata['witr_button_link2'] ['url']; ?>"><?php echo $witrshowdata['witr_service_button2']; ?></a>
							</div>
						<?php } ?>					
						
					</div>
				</div>
			</div>
		</div>
				

		<?php 
		break;
		
		case '5':
		?>
		

		<div class="singleSS all_color_service <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
			<div class="serIcon SIBG_1  service_text all_icon_color">
					<!-- icon -->
					<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
						<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
					<?php } ?>
				<!-- custom icon -->
				<?php if( ! empty($witrshowdata['witr_service_custom'])){?>					
					<i class="<?php echo $witrshowdata['witr_service_custom']; ?>"></i>
				<?php } ?>				
				<!-- image -->
				<?php echo $txbd_icon_image; ?>			
			</div>
			<div class="detail_SS">
				<!-- title -->
				<?php if( ! empty($witrshowdata['witr_service_title'])){?>
				<?php if($witrshowdata['title_link'] ['url']){?> 
					<h3><a href="<?php echo $witrshowdata['title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_service_title']; ?></a></h3>
				<?php }else{ ?>
				<h3><?php echo $witrshowdata['witr_service_title']; ?> </h3>
				<?php }	?>
				<?php } ?>
				<!-- content -->
				<?php if( ! empty($witrshowdata['witr_service_content'])){?>
					<p><?php echo $witrshowdata['witr_service_content']; ?> </p>		
				<?php } ?>				
				<!-- button -->
				<?php if( ! empty($witrshowdata['witr_service_button'])){?>
					<div class="service-btn">
					<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_service_button']; ?>
						<?php if($witrshowdata['witr_show_icon_b']=='yes'){ ?> 
							<!-- custom icon -->
							<?php if(isset($witrshowdata['witr_custom_icon_b']) && ! empty($witrshowdata['witr_custom_icon_b'])){?>	
								<span class="<?php echo $witrshowdata['witr_custom_icon_b']; ?>"></span>
							<?php } ?>
						<?php }?>					
					</a>
					</div>
				<?php } ?>
			</div>
		</div>
				

		<?php 
		break;
		
		
		case '4':
		?>
		
		<div class="em-service all_color_service text-<?php echo $witrshowdata['witr_text_ltc']; ?>">				
			<div class="em_service_content">
				<div class="em_single_service_text <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
					<div class="service_top_text">
						<div class="em-service-icon all_icon_color">
							<!-- icon -->
							<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
								<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
							<?php } ?>
							<!-- custom icon -->
							<?php if( ! empty($witrshowdata['witr_service_custom'])){?>	
								<i class="<?php echo $witrshowdata['witr_service_custom']; ?>"></i>
							<?php } ?>							
							<!-- image -->
							<?php echo $txbd_icon_image; ?>
						</div>	
						<div class="em-service-title">
							<!-- title -->
							<?php if( ! empty($witrshowdata['witr_service_title'])){?>
							<?php if($witrshowdata['title_link'] ['url']){?> 
								<h3><a href="<?php echo $witrshowdata['title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_service_title']; ?></a></h3>
							<?php }else{ ?>
							<h3><?php echo $witrshowdata['witr_service_title']; ?> </h3>
							<?php }	?>
							<?php } ?>
							
						</div>	
					</div>
					<div class="em-service-inner">				
						<div class="em-service-desc">
							<!-- content -->
							<?php if( ! empty($witrshowdata['witr_service_content'])){?>
								<p><?php echo $witrshowdata['witr_service_content']; ?> </p>		
							<?php } ?>
						</div>							
					</div>
					<!-- button -->
					<?php if( ! empty($witrshowdata['witr_service_button'])){?>
						<div class="service-btn">
						<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_service_button']; ?>
							<?php if($witrshowdata['witr_show_icon_b']=='yes'){ ?> 
								<!-- custom icon -->
								<?php if(isset($witrshowdata['witr_custom_icon_b']) && ! empty($witrshowdata['witr_custom_icon_b'])){?>	
									<span class="<?php echo $witrshowdata['witr_custom_icon_b']; ?>"></span>
								<?php } ?>
							<?php }?>						
						</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>	

		<?php 
		break;
				
		case '3':
		?>
	
		
			<div class="em-service2 sleft all_color_service">
				<div class="em_service_content ">
					<div class="em_single_service_text <?php echo $witrshowdata['witr_Select_whi']; ?> <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
						<div class="service_top_image">
							<!-- image -->
							<?php echo $txbd_image; ?>			
						</div>
						<div class="text_box witr_s_flex">
							<div class="service_top_text all_icon_color">
								<div class="em-service-icon">
									<!-- icon -->
									<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
										<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
									<?php } ?>					
									<!-- custom icon -->
									<?php if( ! empty($witrshowdata['witr_service_custom'])){?>	
										<i class="<?php echo $witrshowdata['witr_service_custom']; ?>"></i>
									<?php } ?>
									<!-- image -->
									<?php echo $txbd_icon_image; ?>				
								</div>			
							</div>
							<div class="em-service-inner">
								<div class="em-service-title">
									<!-- title -->
									<?php if( ! empty($witrshowdata['witr_service_title'])){?>
									<?php if($witrshowdata['title_link'] ['url']){?> 
										<h3><a href="<?php echo $witrshowdata['title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_service_title']; ?></a></h3>
									<?php }else{ ?>
									<h3><?php echo $witrshowdata['witr_service_title']; ?> </h3>
									<?php }	?>
									<?php } ?>
									<!-- content -->
								</div>						
								<div class="em-service-desc">
									<?php if( ! empty($witrshowdata['witr_service_content'])){?>
										<p><?php echo $witrshowdata['witr_service_content']; ?> </p>		
									<?php } ?>
								</div>
								<!-- button -->
								<?php if( ! empty($witrshowdata['witr_service_button'])){?>
									<div class="service-btn">
										<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_service_button']; ?>
											<?php if($witrshowdata['witr_show_icon_b']=='yes'){ ?> 
												<!-- custom icon -->
												<?php if(isset($witrshowdata['witr_custom_icon_b']) && ! empty($witrshowdata['witr_custom_icon_b'])){?>	
													<span class="<?php echo $witrshowdata['witr_custom_icon_b']; ?>"></span>
												<?php } ?>
											<?php }?>										
										</a>
									</div>
								<?php } ?>				
							</div>
						</div>
					</div>
				</div>
			</div>			

				
		<?php 
		break;		
		case '2':
		?>
			<div class="em-service2 sright all_color_service">
				<div class="em_service_content ">
					<div class="em_single_service_text <?php echo $witrshowdata['witr_Select_whi']; ?> <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
						<div class="service_top_image">
							<!-- image -->
							<?php echo $txbd_image; ?>			
						</div>
						<div class="text_box witr_s_flex">
							<div class="service_top_text">
								<div class="em-service-icon all_icon_color">
									<!-- icon -->
									<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
										<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
									<?php } ?>				
									<!-- custom icon -->
									<?php if( ! empty($witrshowdata['witr_service_custom'])){?>	
										<i class="<?php echo $witrshowdata['witr_service_custom']; ?>"></i>
									<?php } ?>				
									<!-- image -->
									<?php echo $txbd_icon_image; ?>				
								</div>			
							</div>
							<div class="em-service-inner">
								<div class="em-service-title ">
									<!-- title -->
									<?php if( ! empty($witrshowdata['witr_service_title'])){?>
									<?php if($witrshowdata['title_link'] ['url']){?> 
										<h3><a href="<?php echo $witrshowdata['title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_service_title']; ?></a></h3>
									<?php }else{ ?>
									<h3><?php echo $witrshowdata['witr_service_title']; ?> </h3>
									<?php }	?>
									<?php } ?>
									
								</div>
								<!-- content -->
								<div class="em-service-desc">
									<?php if( ! empty($witrshowdata['witr_service_content'])){?>
										<p><?php echo $witrshowdata['witr_service_content']; ?> </p>		
									<?php } ?>
								</div>
								<!-- button -->
								<?php if( ! empty($witrshowdata['witr_service_button'])){?>
									<div class="service-btn">
									<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_service_button']; ?>
										<?php if($witrshowdata['witr_show_icon_b']=='yes'){ ?> 
											<!-- custom icon -->
											<?php if(isset($witrshowdata['witr_custom_icon_b']) && ! empty($witrshowdata['witr_custom_icon_b'])){?>	
												<span class="<?php echo $witrshowdata['witr_custom_icon_b']; ?>"></span>
											<?php } ?>
										<?php }?>									
									</a>
									</div>
								<?php } ?>			
							</div>
						</div>
					</div>
				</div>
			</div>					
		<?php 
		break;								
		default:
		?>
		
			<div class="service-item all_color_service <?php echo $witrshowdata['witr_Select_whi']; ?> text-<?php echo $witrshowdata['witr_text_ltc']; ?>  <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
				<div class="service_top_image">
					<!-- image -->
					<?php echo $txbd_image; ?>			
				</div>
				<div class="text_box all_icon_color">
					<!-- icon -->
					<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
						<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
					<?php } ?>
					<!-- custom icon -->
					<?php if( ! empty($witrshowdata['witr_service_custom'])){?>	
						<i class="<?php echo $witrshowdata['witr_service_custom']; ?>"></i>
					<?php } ?>				
					<!-- image -->
					<?php echo $txbd_icon_image; ?>	
					<!-- title -->
					<?php if( ! empty($witrshowdata['witr_service_title'])){?>
					<?php if($witrshowdata['title_link'] ['url']){?> 
						<h3><a href="<?php echo $witrshowdata['title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_service_title']; ?></a></h3>
					<?php }else{ ?>
					<h3><?php echo $witrshowdata['witr_service_title']; ?> </h3>
					<?php }	?>
					<?php } ?>
					<!-- content -->
					<?php if( ! empty($witrshowdata['witr_service_content'])){?>
						<p><?php echo $witrshowdata['witr_service_content']; ?> </p>		
					<?php } ?>
					<!-- button -->
					<?php if( ! empty($witrshowdata['witr_service_button'])){?>
						<div class="service-btn">
						<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_service_button']; ?>
							<?php if($witrshowdata['witr_show_icon_b']=='yes'){ ?> 
								<!-- custom icon -->
								<?php if(isset($witrshowdata['witr_custom_icon_b']) && ! empty($witrshowdata['witr_custom_icon_b'])){?>	
									<span class="<?php echo $witrshowdata['witr_custom_icon_b']; ?>"></span>
								<?php } ?>
							<?php }?>	
						</a>
						</div>
					<?php } ?>				
				</div> <!-- text_box -->							
			</div> <!-- service item -->							
 		<?php 
		
		break;
		
	}
	

	
	
	


    } /* function end */
	


}