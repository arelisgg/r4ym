<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_cto_Actiono extends Widget_Base {

    public function get_name() {
        return 'witr_section_call_to_ac';
    }
    
    public function get_title() {
        return esc_html__( ' Call To Action', 'themex' );
    }
    public function get_style_depends() {
        return ['wcalltoac'];
    }	
    public function get_icon() {
        return 'themex_icon eicon-image-rollover';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

		protected function register_controls() {
			$this->start_controls_section(
				'witr_field_call_to_ac',
				[
					'label' => esc_html__( 'Call To Action Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
			
			
			/* === witr_style_call start === */
				$this->add_control(
					'witr_style_call',
					[
						'label' => esc_html__( 'Call To Action style', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator' => 'before',
						'options' => [
							'1' => esc_html__( 'Right Button Left Text', 'themex' ),
							'2' => esc_html__( 'Text Left Right Video', 'themex' ),
							'3' => esc_html__( 'Text Left Right Button', 'themex' ),
							'4' => esc_html__( 'Image Right', 'themex' ),
							'5' => esc_html__( 'Text Center', 'themex' ),
							'6' => esc_html__( 'Video Center', 'themex' ),
							'7' => esc_html__( ' Style 7', 'themex' ),
							'8' => esc_html__( 'Single Button Video Right', 'themex' ),
							'9' => esc_html__( 'Video Left', 'themex' ),
							'10' => esc_html__( 'Video Right Single Button', 'themex' ),
							'11' => esc_html__( 'Right image With Video', 'themex' ),
							'12' => esc_html__( 'Subscribe', 'themex' ),

						],
						'default' => '3',
					]
				);
				
					/* witr sub title */	
					$this->add_control(
						'witr_videos_sub',
						[
							'label' => esc_html__( ' Top Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'separator' => 'before',
							'default' => esc_html__( 'GET STARTED TODAY ?', 'themex' ),
							'placeholder' => esc_attr__( 'Type your Top sub title here', 'themex' ),							
							'description' => esc_html__( 'Not use Top Title, remove the text from field, highlight text use ex-<span>text</span>', 'themex' ),

						]
					);	
				
								
					/*  witr_middle_title */	
					$this->add_control(
						'witr_videos_title',
						[
							'label' => esc_html__( ' Middle Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'separator' => 'before',
							'default' => esc_html__( 'Add Your Title Here', 'themex' ),
							'placeholder' => esc_attr__( 'Type your Middle title here', 'themex' ),							
							'description' => esc_html__( 'Not use Middle title, remove the text from field, highlight text use ex-<span>text</span>', 'themex' ),

						]
					);			
										
					/*  witr_bottom_title */	
					$this->add_control(
						'witr_videos_title2',
						[
							'label' => esc_html__( 'Bottom Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'separator' => 'before',
							'placeholder' => esc_attr__( 'Type your Bottom title here', 'themex' ),							
							'description' => esc_html__( 'Not use Bottom title, remove the text from field, highlight text use ex-<span>text</span>', 'themex' ),
	
						]
					);
							
					/* witr content_text */	
					$this->add_control(
						'witr_videos_text',
						[
							'label' => esc_html__( 'Content Text', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'separator' => 'before',
							'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed h eiusmotempor incididunt ut labore et dolore magna aliqua', 'themex' ),
							'placeholder' => esc_attr__( 'Type your video text here', 'themex' ),							
							'description' => esc_html__( 'Not use text, remove the text from field, highlight text use ex-<span>text</span>', 'themex' ),
						]
					);
										
					/* witr_button witr_text_button witr_button_link witr_button_icon */
					$this->add_control(
						'witr_button',
						[
							'label' => esc_html__( 'Show Button', 'themex' ),
							'type' => Controls_Manager::SWITCHER,
							'separator' => 'before',
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'return_value' => 'yes',
							'default' => 'yes',
							'condition' => [
								'witr_style_call' =>['1','2','3','4','5','6','7','8','9','10','11'],
							],
						]
					);
					
				  /* witr_button_text	*/
					$this->add_control(
						'witr_text_button',
						[
							'label' => esc_html__( 'Button Text', 'themex' ),
							'label_block' =>true,
							'type' => Controls_Manager::TEXT,
							'description' =>esc_html__('Insert button text. It hidden when field blank.','themex'),							
							'default' => esc_html__( 'Sign Up', 'themex' ),
							'placeholder' => esc_attr__( 'Type your button text here', 'themex' ),
							'condition' => [
								'witr_button' =>'yes',
								'witr_style_call' =>['1','2','3','4','5','6','7','8','9','10','11'],
							],
						]
					);
					
					/*  witr_button_link */	
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
								'witr_button' => ['yes'],
								'witr_style_call' =>['1','2','3','4','5','6','7','8','9','10','11'],
								
							],							
	
						]
					);
				/* witr_show_icon witr_icon_item */
				$this->add_control(
					'witr_show_icon',
					[
						'label' => esc_html__( 'Show Icon', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'separator' => 'before',
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'no',
						'condition' => [
							'witr_button' => ['yes'],
							'witr_style_call' =>['1','2','3','4','5','6','7','8','9','10','11'],
							
						],							
					]
				);	
												
				$this->add_control(
					'witr_icon_item',
					[
						'label' => esc_html__( 'Icon', 'themex' ),
						'type' => Controls_Manager::ICONS,
						'separator' => 'before',
						'description' => esc_html__( 'chance the icon, click the library field', 'themex' ),						
						'fa4compatibility' => 'icon',
						'default' => [
							'value' => 'icofont-paper-plane',
							'library' => 'fa-solid',
						],
						'condition' => [
							'witr_show_icon' =>['yes'],
							'witr_button' => ['yes'],
							'witr_style_call' =>['1','2','3','4','5','6','7','8','9','10','11'],
						],
						
					]
				);					

					/* witr_button witr_text_button witr_button_link2 */
					$this->add_control(
						'witr_button2',
						[
							'label' => esc_html__( 'Show Button 2', 'themex' ),
							'type' => Controls_Manager::SWITCHER,
							'separator' => 'before',
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'return_value' => 'yes',
							'default' => 'yes',
							'condition' => [
								'witr_style_call' =>['2','4'],
							],
						]
					);
					
				  /* witr_button_text	*/
					$this->add_control(
						'witr_text_button2',
						[
							'label' => esc_html__( 'Button Text', 'themex' ),
							'label_block' =>true,
							'type' => Controls_Manager::TEXT,
							'description' =>esc_html__('Insert button text. It hidden when field blank.','themex'),							
							'default' => esc_html__( 'Download', 'themex' ),
							'placeholder' => esc_attr__( 'Type your button text here', 'themex' ),
							'condition' => [
								'witr_button2' => ['yes'],
								'witr_style_call' =>['2','4'],
							],
						]
					);
					
					/*  witr_button_link */	
					$this->add_control(
						'witr_button_link2',
						[
							'label' => esc_html__( 'Button Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert button link here.','themex'),
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'show_external' => true,
							'condition' => [
								'witr_button2' => ['yes'],
								'witr_style_call' =>['2','4'],
							],							
							'default' => [
								'url' => '#',
							],		
						]
					);	
				/* show icon witr_show_icon2 witr_icon_item */
				$this->add_control(
					'witr_show_icon2',
					[
						'label' => esc_html__( 'Show Button Icon 2', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'separator' => 'before',
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'yes',
						'condition' => [
							'witr_button2' => ['yes'],
							'witr_style_call' =>['2','4'],
							
						],							
					]
				);	
								
				
				$this->add_control(
					'witr_iconb_item2',
					[
						'label' => esc_html__( 'Icon', 'themex' ),
						'type' => Controls_Manager::ICONS,
						'separator' => 'before',
						'description' => esc_html__( 'chance the icon, click the library field', 'themex' ),						
						'fa4compatibility' => 'icon',
						'default' => [
							'value' => 'icofont-paper-plane',
							'library' => 'fa-solid',
						],
						'condition' => [
							'witr_show_icon2' =>['yes'],
							'witr_button2' => ['yes'],
							'witr_style_call' =>['2','4'],
						],
						
					]
				);					
			

						
				/* show video icon witr_show_icon witr_icon_item3 */
				$this->add_control(
					'witr_show_vicon',
					[
						'label' => esc_html__( 'Show Video Icon', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'separator' => 'before',
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'yes',	
						'condition' => [
							'witr_style_call' =>['2','6','8','9','10','11'],
						],						
					]
				);	
								
				
				$this->add_control(
					'witr_vicon_item',
					[
						'label' => esc_html__( 'Video Icon', 'themex' ),
						'type' => Controls_Manager::ICONS,
						'separator' => 'before',
						'description' => esc_html__( 'chance the icon, click the library field', 'themex' ),						
						'fa4compatibility' => 'icon',
						'default' => [
							'value' => 'icofont-ui-play',
							'library' => 'fa-solid',
						],
						'condition' => [
							'witr_show_vicon' =>'yes',
							'witr_style_call' =>['2','6','8','9','10','11'],
						],
						
					]
				);				
					/* witr_video_icon_text	*/			
					$this->add_control(
						'witr_video_title',
						[
							'label' => esc_html__( 'Video Title Text', 'themex' ),
							'label_block' =>true,
							'type' => Controls_Manager::TEXT,
							'description' =>esc_html__('Insert video button text. It hidden when field blank.','themex'),
							'default' => esc_html__( 'Watch Video', 'themex' ),
							'placeholder' => esc_attr__( 'Type your video button text here', 'themex' ),
							'condition' => [
								'witr_style_call' =>['2','6','8','9','10','11'],
								'witr_show_vicon' =>'yes',
							],							
						]
					);

						
				/* video_type */
				$this->add_control(
					'video_type',
					[
						'label' => esc_html__( 'Source', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator' => 'before',
						'default' => 'youtube',
						'options' => [
							'youtube' => esc_html__( 'YouTube', 'themex' ),
							'vimeo' => esc_html__( 'Vimeo', 'themex' ),
						],
						'condition' => [
							'witr_style_call' =>['2','6','8','9','10','11'],
							'witr_show_vicon' =>'yes',
						],						
					]
				);
				/* youtube_url */
				$this->add_control(
					'youtube_url',
					[
						'label' => esc_html__( 'Link', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'placeholder' => esc_html__( 'Enter your URL', 'themex' ),
						'default' => 'https://www.youtube.com/watch?v=XHOmBV4js_E',
						'label_block' => true,
						'condition' => [
							'witr_style_call' =>['2','6','8','9','10','11'],
							'witr_show_vicon' =>'yes',
							'video_type' => 'youtube',
						],						
					]
				);
				/* vimeo_url */
				$this->add_control(
					'vimeo_url',
					[
						'label' => esc_html__( 'Link', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'placeholder' => esc_html__( 'Enter your URL', 'themex' ),
						'default' => 'https://vimeo.com/235215203',
						'label_block' => true,
						'condition' => [
							'witr_style_call' =>['2','6','8','9','10','11'],
							'witr_show_vicon' =>'yes',
							'video_type' => 'vimeo',
						],						
					]
				);			
				/* SHOW IMAGE witr_show_image witr_image_image */
				$this->add_control(
					'witr_show_image',
					[
						'label' => esc_html__( 'Show Image', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'yes',
						'condition' => [
							'witr_style_call' =>['4','11']
						],
												
					]
				);	
				/* witr_image_image */
				$this->add_control(
					'witr_image_image',
					[
						'label' => esc_html__( 'Choose Single Image', 'themex' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
						'condition' => [
							'witr_show_image' => 'yes',
							'witr_style_call' =>['4','11']
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
							'witr_show_image' => 'yes',
							'witr_style_call' =>['4','11']
						]
					]
				);				
				
			/* witr_shortcode	*/
				$this->add_control(
					'witr_subs_shortcode',
					[
						'label' => esc_html__( 'Shortcode', 'themex' ),
						'type' => Controls_Manager::TEXTAREA,
						'default' => '',
						'description' => esc_html__( 'Not use shortcode, remove the shortcode from field', 'themex' ),
						'placeholder' => esc_attr__( 'Type your shortcode here', 'themex' ),
							'condition' => [
								'witr_style_call' => ['12'],
							],						
					]
				);				


		$this->end_controls_section();
		//end register control
		
		
		
		/*===========================================================================================
										START TO STYLE
		=============================================================================================*/	
		
			
		/*=== start witr_title style ====*/

		$this->start_controls_section(
			'witr_style_option',
			[
				'label' => esc_html__( 'Top Title Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
			/* color */
			$this->add_control(
				'witr_title_color',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',
					'global' => [
						'default' => Global_Colors::COLOR_SECONDARY,
					],					
					'selectors' => [
						'{{WRAPPER}} .all_cal_color h5' => 'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
				'witr_thover_color',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,					
					'selectors' => [
						'{{WRAPPER}} .all_cal_color h5:hover' => 'color: {{VALUE}}',
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
						'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
					],
					'selector' => '{{WRAPPER}} .all_cal_color h5',
				]
			);						
			/*  Title Width */
			$this->add_responsive_control(
				'witr_tt_width',
				[
					'label' => esc_html__( ' Width', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => 10,
							'max' => 200,
						],
						'%' => [
							'min' => 10,
							'max' => 200,
						],
						'em' => [
							'min' => 10,
							'max' => 200,
						],
						
					],
					'selectors' => [
						'{{WRAPPER}} .all_cal_color h5' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);			
			/* margin */
			$this->add_responsive_control(
				'witr_sectionmargin',
				[
					'label' => esc_html__( 'Tittle Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_cal_color h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* padding */
			$this->add_responsive_control(
				'witr_sectionpadding',
				[
					'label' => esc_html__( 'Tittle Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'separator'=>'before',
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_cal_color h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  w_title style ====*/
		

		/*=== start w_title style 2 ====*/

		$this->start_controls_section(
			'witr_style_option2',
			[
				'label' => esc_html__( 'Middle Title Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
			/* color */
			$this->add_control(
				'witr_title_color2',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_PRIMARY,
					],					
					'selectors' => [
						'{{WRAPPER}} .all_cal_color h2' => 'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
				'witr_thover_color2',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .all_cal_color h2:hover' => 'color: {{VALUE}}',
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
						'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
					],
					'selector' => '{{WRAPPER}} .all_cal_color h2',
				]
			);
			/*  Title Width */
			$this->add_responsive_control(
				'witr_tm_width',
				[
					'label' => esc_html__( ' Width', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => 10,
							'max' => 200,
						],
						'%' => [
							'min' => 10,
							'max' => 200,
						],
						'em' => [
							'min' => 10,
							'max' => 200,
						],
						
					],
					'selectors' => [
						'{{WRAPPER}} .all_cal_color h2' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);			
			/* margin */
			$this->add_responsive_control(
				'witr_sectionmargin2',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_cal_color h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* padding */
			$this->add_responsive_control(
				'witr_sectionpadding2',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_cal_color h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  w_title style 2 ====*/

		/*=== start w_title style 3 ====*/

		$this->start_controls_section(
			'witr_style_option3',
			[
				'label' => esc_html__( 'Bottom Title Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
			/* color */
			$this->add_control(
				'witr_title_color3',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_PRIMARY,
					],					
					'selectors' => [
						'{{WRAPPER}} .all_cal_color h3' => 'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
				'witr_thover_color3',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					
					'selectors' => [
						'{{WRAPPER}} .all_cal_color h3:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_ttpy_color3',
					'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
					],
					'selector' => '{{WRAPPER}} .all_cal_color h3',
				]
			);		
				
			/*  Title Width */
			$this->add_responsive_control(
				'witr_tb_width',
				[
					'label' => esc_html__( ' Width', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => 10,
							'max' => 200,
						],
						'%' => [
							'min' => 10,
							'max' => 200,
						],
						'em' => [
							'min' => 10,
							'max' => 200,
						],
						
					],
					'selectors' => [
						'{{WRAPPER}} .all_cal_color h3' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);			
			/* margin */
			$this->add_responsive_control(
				'witr_title_margin3',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_cal_color h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* padding */
			$this->add_responsive_control(
				'witr_title_padding3',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_cal_color h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  w_title style 3 ====*/


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
						'{{WRAPPER}} .all_cal_color p' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .all_cal_color p',
				]
			);			
			/*  content width */
			$this->add_responsive_control(
				'witr_content_width',
				[
					'label' => esc_html__( 'width', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'default' => [
						'unit' => '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],						
					'size_units' => [ '%', 'px', 'em' ],
					'range' => [
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .all_cal_color p' => 'width: {{SIZE}}{{UNIT}};',
					],						
				]
			);
		
			/* margin */
			$this->add_responsive_control(
				'content_margin',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_cal_color p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr content style ====*/		

		
		/*=== start witr_heighlight style ====*/

		$this->start_controls_section(
			'witr_style_optionh',
			[
				'label' => esc_html__( 'Heighlight Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
			/* color */
			$this->add_control(
				'witr_htitle_color',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_SECONDARY,
					],					
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .themex_content h5 span,{{WRAPPER}} .themex_content h2 span,{{WRAPPER}} .themex_content h3 span,{{WRAPPER}} .themex_content p span' => 'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
				'witr_hhover_color',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,					
					'selectors' => [
						'{{WRAPPER}} .themex_content h5 span:hover,{{WRAPPER}} .themex_content h2 span:hover,{{WRAPPER}} .themex_content h3 span:hover,{{WRAPPER}} .themex_content p span:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_htpy_color',
					'label' => esc_html__( 'Typography', 'themex' ),
					'selector' => '{{WRAPPER}} .themex_content h5 span,{{WRAPPER}} .themex_content h2 span,{{WRAPPER}} .themex_content h3 span,{{WRAPPER}} .themex_content p span',
				]
			);		
			
			/* margin */
			$this->add_responsive_control(
				'witr_heighlight_margin',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .themex_content h5 span,{{WRAPPER}} .themex_content h2 span,{{WRAPPER}} .themex_content h3 span,{{WRAPPER}} .themex_content p span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* padding */
			$this->add_responsive_control(
				'witr_heighlight_padding',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .themex_content h5 span,{{WRAPPER}} .themex_content h2 span,{{WRAPPER}} .themex_content h3 span,{{WRAPPER}} .themex_content p span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  w_heighlight style ====*/
		
		/*=== start witr button style ====*/
		$this->start_controls_section(
			'witr_style_option_button',
			[
				'label' => esc_html__( 'Button Color Style', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,				
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
				/*  witr_button_width */
				$this->add_responsive_control(
					'witr_button_width',
					[
						'label' => esc_html__( 'width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'default' => [
							'unit' => '%',
						],
						'tablet_default' => [
							'unit' => '%',
						],
						'mobile_default' => [
							'unit' => '%',
						],						
						'size_units' => [ '%', 'px', 'em' ],
						'range' => [
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'condition' => [
							'witr_style_call' =>['1','3','7'],
						],						
						'selectors' => [
							'{{WRAPPER}} .themex_button.no_margin' => 'width: {{SIZE}}{{UNIT}};',
						],						
					]
				);
				
				/* witr_text_align 					
				$this->add_responsive_control(
					'witr_button_align',
					[
						'label' => esc_html__( 'Text Align', 'themex' ),
						'type' => Controls_Manager::CHOOSE,
						'default' => '',
						'separator'=>'before',
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
							'{{WRAPPER}} .themex_button,{{WRAPPER}} .all_cal_color button' => 'text-align: {{VALUE}}',
						],
					]
				);	*/			
					/* color */
					$this->add_control(
						'witr_button_color',
						[
							'label' => esc_html__( 'Text Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'global' => [
								'default' => Global_Colors::COLOR_ACCENT,
							],							
							'selectors' => [
								'{{WRAPPER}} .all_cal_color a,{{WRAPPER}} .all_cal_color button' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .all_cal_color a,{{WRAPPER}} .all_cal_color button',
						]
					);	
					/* Button background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_button_background',
							'label' => esc_html__( 'button Background', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .all_cal_color a,{{WRAPPER}} .all_cal_color button',
						]
					);
					/* HEADING */
					$this->add_control(
						'witr_heading_color',
						[
							'label' => esc_html__( 'Button 2 background', 'themex' ),
							'type' => Controls_Manager::HEADING,
							'condition' => [
								'witr_button2' =>'yes',
								'witr_style_call' =>['2','4'],
							],							
						]
					);					
					/* Button 2 background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_button2_background',
							'label' => esc_html__( 'button Background', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} a.wbutton2,{{WRAPPER}} .all_cal_color button',
							'condition' => [
								'witr_button2' =>'yes',
								'witr_style_call' =>['2','4'],
							],							
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
							'default' => 'default',
							'selectors' => [
								'{{WRAPPER}} .all_cal_color a,{{WRAPPER}} .all_cal_color button' => 'border-style: {{VALUE}}',
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
								'{{WRAPPER}} .all_cal_color a,{{WRAPPER}} .all_cal_color button' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .all_cal_color a,{{WRAPPER}} .all_cal_color button' => 'border-color: {{VALUE}}',
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
								'{{WRAPPER}} .all_cal_color a,{{WRAPPER}} .all_cal_color button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',								
							],
							'condition' => [
								'witr_border_btn_style' => ['solid','double','dotted','dashed','default'],
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
								'{{WRAPPER}} .themex_button,{{WRAPPER}} .all_cal_color button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .all_cal_color a,{{WRAPPER}} .all_cal_color button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .all_cal_color a:hover,{{WRAPPER}} .all_cal_color button:hover' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .all_cal_color a:hover,{{WRAPPER}} .all_cal_color button:hover',
						]
					);
					/* HEADING */
					$this->add_control(
						'witr_headingh_color',
						[
							'label' => esc_html__( 'Button 2 background', 'themex' ),
							'type' => Controls_Manager::HEADING,
							'condition' => [
								'witr_button2' =>'yes',
								'witr_style_call' =>['2','4'],
							],							
						]
					);					
					/* Button 2 background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_buttonh2_background',
							'label' => esc_html__( 'button Background', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} a.wbutton2:hover,{{WRAPPER}} .all_cal_color button:hover',
							'condition' => [
								'witr_button2' =>'yes',
								'witr_style_call' =>['2','4'],
							],							
						]
					);					
					/* witr_border_style */
					$this->add_control(
						'witr_border_btnh_style',
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
							'default' => 'default',
							'selectors' => [
								'{{WRAPPER}} .all_cal_color a:hover,{{WRAPPER}} .all_cal_color button:hover' => 'border-style: {{VALUE}}',
							],
						]
					);		
					/* witr border */
					$this->add_control(
						'witr_bordeh_btn',
						[
							'label' => esc_html__( 'Border', 'themex' ),
							'type' => Controls_Manager::DIMENSIONS,
							'selectors' => [
								'{{WRAPPER}} .all_cal_color a:hover,{{WRAPPER}} .all_cal_color button:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'condition' => [
								'witr_border_btn_style' => ['solid','double','dotted','dashed','default'],
							],
						]							
						
					);
					/* border_color */
					$this->add_control(
						'witr_borderh_btn_color',
						[
							'label' => esc_html__( 'Border Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .all_cal_color a:hover,{{WRAPPER}} .all_cal_color button:hover' => 'border-color: {{VALUE}}',
							],
							'condition' => [
								'witr_border_btn_style' => ['solid','double','dotted','dashed','default'],
							],
						]
					);
					/* border_radius */
					$this->add_control(
						'witr_borderh_btn_radius',
						[
							'label' => esc_html__( 'Border Radius', 'themex' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%' ],
							'selectors' => [
								'{{WRAPPER}} .all_cal_color a:hover,{{WRAPPER}} .all_cal_color button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',								
							],
							'condition' => [
								'witr_border_btn_style' => ['solid','double','dotted','dashed','default'],
							],
						]
					);					
					
					$this->end_controls_tab();
					/*=== end button hover style ====*/
			$this->end_controls_tabs();
			/*=== end button_tabs style ====*/			
		 $this->end_controls_section();
		/*=== end  witr button style ====*/		


		
		/*=== start witr_icon style ====*/
		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => esc_html__( 'video Icon Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_show_vicon' =>'yes',
					'witr_style_call' =>['2','6','8','9','10','11'],
				],				
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
				/* Icon Color */
				$this->add_control(
					'witr_primary_color',
					[
						'label' => esc_html__( 'Icon Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .themex_video_inner i' => 'color: {{VALUE}}',
						],
						
					]
				);
				
				/*  icon font size */
				$this->add_responsive_control(
					'witr_icon_size',
					[
						'label' => esc_html__( 'Icon Size', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .themex_video_inner i' => 'font-size: {{SIZE}}{{UNIT}};',
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
						'selector' => '{{WRAPPER}} .themex_video_inner i',
					]
				);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadowv',
						'label' => esc_html__( 'Video Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .themex_video_inner a::before',
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
							'{{WRAPPER}} .themex_video_inner i' => 'width: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .themex_video_inner i' => 'height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .themex_video_inner i' => 'line-height: {{SIZE}}{{UNIT}};',
						],
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
							'{{WRAPPER}} .themex_video_inner i,{{WRAPPER}} .themex_video_inner a::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);				
				

				/* HEADING  */
				$this->add_control(
					'witr_head_icon',
					[
						'label' => esc_html__( ' Top,Left,Bottom,Right Option(use any Two Option)', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator'=>'before',
					]
				);
				
			/* witr_top */
			$this->add_responsive_control(
				'witr_topt',
				[
					'label' => esc_html__( 'Top', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 1000,
						],
						'%' => [
							'min' => -500,
							'max' => 1000,
						],
						'em' => [
							'min' => -500,
							'max' => 1000,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .themex_video_inner' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);
			
			/* witr_left */
			$this->add_responsive_control(
				'witr_leftl',
				[
					'label' => esc_html__( 'Left', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 1500,
						],
						'%' => [
							'min' => -500,
							'max' => 1500,
						],
						'em' => [
							'min' => -500,
							'max' => 1500,
						],
						
					],
					'selectors' => [
						'{{WRAPPER}} .themex_video_inner' => 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);

			/* witr_right */
			$this->add_responsive_control(
				'witr_rightr',
				[
					'label' => esc_html__( 'Right', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
						],
						'%' => [
							'min' => -1000,
							'max' => 1000,
						],
						'em' => [
							'min' => -1000,
							'max' => 1000,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .themex_video_inner' => 'right: {{SIZE}}{{UNIT}};',
					],
				]
			);					
			/* witr_bottom */
			$this->add_responsive_control(
				'witr_bottomb',
				[
					'label' => esc_html__( 'Bottom', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 1000,
						],
						'%' => [
							'min' => -500,
							'max' => 1000,
						],
						'em' => [
							'min' => -500,
							'max' => 1000,
						],
						
					],
					'selectors' => [
						'{{WRAPPER}} .themex_video_inner' => 'bottom: {{SIZE}}{{UNIT}};',
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
					/*  primary hover color */
					$this->add_control(
						'witr_hover_primary_color',
						[
							'label' => esc_html__( 'Icon Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							'selectors' => [
								'{{WRAPPER}} .themex_video_inner a:hover i' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .themex_video_inner a:hover i',
						]
					);					
					
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_boxiv_shadowv',
						'label' => esc_html__( 'Video Shadow Hover', 'themex' ),
						'selector' => '{{WRAPPER}} .themex_video_inner a:hover::before',
					]
				);
					$this->end_controls_tab();
					/*=== end icon hover style ====*/
					
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/

		$this->end_controls_section();

		/*=== end witr_icon style ====*/		
		
		
		
		
		/*=== start w_video_title style ====*/

		$this->start_controls_section(
			'witr_v_style_option2',
			[
				'label' => esc_html__( 'video Title Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_show_vicon' =>'yes',
					'witr_style_call' =>['2','6','8','9','10'],
				],				
			]
		);		 
			/* color */
			$this->add_control(
				'witr_vtitle_color2',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_PRIMARY,
					],					
					'selectors' => [
						'{{WRAPPER}} .themex_video_inner h4' => 'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
				'witr_vthover_color2',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .themex_video_inner h4:hover' => 'color: {{VALUE}}',
					],
				]
			);
			
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_vttpy_color2',
					'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
					],
					'selector' => '{{WRAPPER}} .themex_video_inner h4',
				]
			);
			/*  Title Width */
			$this->add_responsive_control(
				'witr_vtm_width',
				[
					'label' => esc_html__( ' Width', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => 10,
							'max' => 200,
						],
						'%' => [
							'min' => 10,
							'max' => 200,
						],
						'em' => [
							'min' => 10,
							'max' => 200,
						],
						
					],
					'selectors' => [
						'{{WRAPPER}} .themex_video_inner h4' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);			
			/* margin */
			$this->add_responsive_control(
				'witr_vsectionmargin2',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_cal_color h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* padding */
			$this->add_responsive_control(
				'witr_vsectionpadding2',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .themex_video_inner h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  w_title style 2 ====*/


		/*=== start witr_image style ====*/
		$this->start_controls_section(
			'witr_style_image_Option',
			[
				'label' => esc_html__( 'Single Images Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
				'witr_style_call' => ['4','11'],
				'witr_show_image' => 'yes',
				
				]
			]
		);		 
			
			
				/*  image width */
				$this->add_responsive_control(
					'witr_image_width',
					[
						'label' => esc_html__( 'width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'separator'=>'before',
						'range' => [
							'px' => [
								'min' => 25,
								'max' => 1920,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_col_image' => 'width: {{SIZE}}{{UNIT}};',
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
						'separator'=>'before',
						'range' => [
							'px' => [
								'min' => 25,
								'max' => 1000,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_col_image' => 'height: {{SIZE}}{{UNIT}};',
						],
					]			
				);
				/* background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'section_background',
						'label' => esc_html__( 'Background', 'themex' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => '{{WRAPPER}} .witr_col_image::before',						
					]
				);
				/* background_overlay */
				$this->add_control(
					'background_overlay_opacity',
					[
						'label' => esc_html__( 'Opacity', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'default' => [
							'size' => .5,
						],
						'range' => [
							'px' => [
								'max' => 1,
								'step' => 0.01,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_col_image::before' => 'opacity: {{SIZE}};',
						],

					]
				);

				/* image margin */
				$this->add_responsive_control(
					'witr_image_margin',
					[
						'label' => esc_html__( 'Image Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'separator'=>'before',
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .witr_col_image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* image padding */
				$this->add_responsive_control(
					'witr_image_padding',
					[
						'label' => esc_html__( 'Image Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'separator'=>'before',
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .witr_col_image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
		 
		 $this->end_controls_section();
		/*=== end  witr_image style ====*/	
 
		/*=== start witr Subscribe style ====*/
		$this->start_controls_section(
			'witr_style_subscribe _option',
			[
				'label' => esc_html__( 'Input Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_call' => ['12'],
				],				
			]
		);										
				/* Subscribe Color */
				$this->add_control(
					'witr_subscribe_color',
					[
						'label' => esc_html__( ' Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .all_cal_color input,{{WRAPPER}} .all_cal_color input::-webkit-input-placeholder' => 'color: {{VALUE}}',
						],					
					]
				);
				/* Chrome placeholder Color 
				$this->add_control(
					'witr_subplac_color',
					[
						'label' => esc_html__( 'Chrome Placeholder Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .all_cal_color input::-webkit-input-placeholder' => 'color: {{VALUE}}',
						],					
					]
				);*/
				
				/* Firefox placeholder Color */
				$this->add_control(
					'witr_subplacfi_color',
					[
						'label' => esc_html__( 'Firefox Placeholder Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .all_cal_color input::-moz-placeholder' => 'color: {{VALUE}}',
						],					
					]
				);
								
				/* typograohy color */			
				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'witr_subse_color',
						'label' => esc_html__( ' Typography', 'themex' ),
						'selector' => '{{WRAPPER}} .all_cal_color input,{{WRAPPER}} .all_cal_color input::-webkit-input-placeholder',
					]
				);
				/* Subscribe background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_subscribe_background',
						'label' => esc_html__( 'Subscribe Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .all_cal_color input',
					]
				);				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_bordersb_style',
						'label' => esc_html__( 'Subscribe Border', 'themex' ),
						'selector' => '{{WRAPPER}} .all_cal_color input',
					]
				);
				/* border_radius */
				$this->add_control(
					'witr_bordersb_radius',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .all_cal_color input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);				
				/*  subscribe width */
				$this->add_responsive_control(
					'witr_subscribe_width',
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
							'{{WRAPPER}} .all_cal_color input' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  subscribe height */
				$this->add_responsive_control(
					'witr_subscribe_height',
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
							'{{WRAPPER}} .all_cal_color input' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  subscribe line height */
				$this->add_responsive_control(
					'witr_subscribe_line_height',
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
							'{{WRAPPER}} .all_cal_color input' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);				
				
				
			
				/* subscribe margin */
				$this->add_responsive_control(
					'witr_subscribe_margin',
					[
						'label' => esc_html__( 'Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .mc4wp-form-fields' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* subscribe padding */
				$this->add_responsive_control(
					'witr_subscribe_padding',
					[
						'label' => esc_html__( 'Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .all_cal_color input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		
		 $this->end_controls_section();
		/*=== end  witr subscribe style ====*/		

	} // end control
			

		
	
	    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();
		$target_btn = ! empty($witrshowdata['witr_button_link']['is_external']) ? ' target="_blank"' : '';
		$nofollow_btn = ! empty($witrshowdata['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';
		$target_btnb = ! empty($witrshowdata['witr_button_link2']['is_external']) ? ' target="_blank"' : '';
		$nofollow_btnb = ! empty($witrshowdata['witr_button_link2']['nofollow']) ? ' rel="nofollow"' : '';				
        $witr_videotype  = ! empty( $witrshowdata['video_type'] ) ? $witrshowdata['video_type'] : 'youtube';  		
        $youtube_url  = ! empty( $witrshowdata['youtube_url'] ) ? $witrshowdata['youtube_url'] : ' ';  		
        $vimeo_url  = ! empty( $witrshowdata['vimeo_url'] ) ? $witrshowdata['vimeo_url'] : ' ';  		

		$txbd_image='';	
		if( !empty( $witrshowdata['witr_image_image']['url'] ) ){
			$txbd_image = Group_Control_Image_Size::get_attachment_image_html( $witrshowdata, 'txbd_image_size', 'witr_image_image' );
		}		
	

switch ( $witrshowdata['witr_style_call']){
	case '12':
	?>
			<div class="app_subscribe_widgets all_cal_color">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-12">
							<div class="themex_content text-left">
								<!-- top title -->
								<?php if(isset($witrshowdata['witr_videos_sub']) && ! empty($witrshowdata['witr_videos_sub'])){?>						
									<h5><?php echo $witrshowdata['witr_videos_sub']; ?></h5>	
								<?php } ?>	
								<!-- middle title -->
								<?php if(isset($witrshowdata['witr_videos_title']) && ! empty($witrshowdata['witr_videos_title'])){?>						
									<h2><?php echo $witrshowdata['witr_videos_title']; ?></h2>							
								<?php } ?>
								<!-- bottom title -->
								<?php if(isset($witrshowdata['witr_videos_title2']) && ! empty($witrshowdata['witr_videos_title2'])){?>			
									<h3><?php echo $witrshowdata['witr_videos_title2']; ?></h3>										
								<?php } ?>
								<!-- content -->
								<?php if(isset($witrshowdata['witr_videos_text']) && ! empty($witrshowdata['witr_videos_text'])){?>
									<p><?php echo $witrshowdata['witr_videos_text']; ?> </p>		
								<?php } ?>						
							</div>
						</div>
						<div class="col-lg-6 col-md-12">
							<?php if(isset($witrshowdata['witr_subs_shortcode']) && ! empty($witrshowdata['witr_subs_shortcode'])){
								$shortcodewon=$witrshowdata['witr_subs_shortcode'];
								  echo do_shortcode( $shortcodewon );
							 } ?>					
						</div>
					</div>
				</div>
			</div>		

	<?php		
	break;	
	case '11':
	?>
		<!-- themex call to action 11 -->
			<div class="row">
				<div class="col-lg-8 col-md-12 all_cal_color text-left">
					<div class="themex_content ">
						<!-- top title -->
						<?php if(isset($witrshowdata['witr_videos_sub']) && ! empty($witrshowdata['witr_videos_sub'])){?>						
							<h5><?php echo $witrshowdata['witr_videos_sub']; ?></h5>	
						<?php } ?>	
						<!-- middle title -->
						<?php if(isset($witrshowdata['witr_videos_title']) && ! empty($witrshowdata['witr_videos_title'])){?>						
							<h2><?php echo $witrshowdata['witr_videos_title']; ?></h2>							
						<?php } ?>
						<!-- bottom title -->
						<?php if(isset($witrshowdata['witr_videos_title2']) && ! empty($witrshowdata['witr_videos_title2'])){?>			
							<h3><?php echo $witrshowdata['witr_videos_title2']; ?></h3>										
						<?php } ?>
						<!-- content -->
						<?php if(isset($witrshowdata['witr_videos_text']) && ! empty($witrshowdata['witr_videos_text'])){?>
							<p><?php echo $witrshowdata['witr_videos_text']; ?> </p>		
						<?php } ?>						
					</div>
					<!-- button -->
					<?php if(isset($witrshowdata['witr_text_button']) && ! empty($witrshowdata['witr_text_button'])){?>	
						<div class="themex_button">						
							<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>> 							
								<?php echo $witrshowdata['witr_text_button'];?>
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
								<?php } ?>							
							</a>
						</div>
					<?php } ?>							
				</div>
					
				<div class="col-lg-4 col-md-12">	
					<?php if($witrshowdata['witr_show_vicon'] == 'yes'){?>
					<?php if($witrshowdata['witr_show_image'] == 'yes'){?>
						<div class="witr_11">
							<!-- image -->
							<?php if( ! empty($witrshowdata['witr_image_image']['url'])){?>
								<div class="witr_col_image">
									<?php echo $txbd_image; ?>
								</div>
							<?php } ?>						
							<div class="themex_video_inner themex_video11">
								<!-- icon -->
								<a class="video-popup video-vemo-icon venobox vbox-item" data-vbtype="<?php echo $witr_videotype; ?>" data-autoplay="true" href="<?php if( $witr_videotype=='youtube' ){echo $youtube_url;}elseif( $witr_videotype=='vimeo' ){echo $vimeo_url;}else{} ?>">	
									<!-- icon -->
									<i class="<?php echo esc_attr( $witrshowdata['witr_vicon_item']['value']);?>"></i>		
								</a>
								<!-- end icon -->	
							</div>
						</div>	
					<?php } ?>				
					<?php } ?>				
				</div>								
			</div>

	<?php		
	break;
	
	case '10':
	?>
		<!-- themex call to action 10 -->
			<div class="row">
				<div class="col-lg-8 col-md-12 all_cal_color text-left">
					<div class="themex_content ">
						<!-- top title -->
						<?php if(isset($witrshowdata['witr_videos_sub']) && ! empty($witrshowdata['witr_videos_sub'])){?>								
								<h5><?php echo $witrshowdata['witr_videos_sub']; ?></h5>																	
						<?php } ?>	
						<!-- middle title -->
						<?php if(isset($witrshowdata['witr_videos_title']) && ! empty($witrshowdata['witr_videos_title'])){?>								
								<h2><?php echo $witrshowdata['witr_videos_title']; ?></h2>																	
						<?php } ?>
						<!-- bottom title -->
						<?php if(isset($witrshowdata['witr_videos_title2']) && ! empty($witrshowdata['witr_videos_title2'])){?>								
								<h3><?php echo $witrshowdata['witr_videos_title2']; ?></h3>																	
						<?php } ?>
							<!-- content -->
						<?php if(isset($witrshowdata['witr_videos_text']) && ! empty($witrshowdata['witr_videos_text'])){?>
							<p><?php echo $witrshowdata['witr_videos_text']; ?> </p>		
						<?php } ?>						
					</div>
					<!-- button -->
					<?php if(isset($witrshowdata['witr_text_button']) && ! empty($witrshowdata['witr_text_button'])){?>	
						<div class="themex_button">						
							<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>> 							
								<?php echo $witrshowdata['witr_text_button'];?>
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
								<?php } ?>							
							</a>
						</div>
					<?php } ?>							
				</div>
					
				<div class="col-lg-4 col-md-12">	
					<?php if($witrshowdata['witr_show_vicon'] == 'yes'){?>`
						<div class="witr_9">
							<div class="themex_video_inner themex_video10">
								<!-- icon -->
								<a class="video-popup video-vemo-icon venobox vbox-item" data-vbtype="<?php echo $witr_videotype; ?>" data-autoplay="true" href="<?php if( $witr_videotype=='youtube' ){echo $youtube_url;}elseif( $witr_videotype=='vimeo' ){echo $vimeo_url;}else{} ?>">								
									<!-- icon -->
									<i class="<?php echo esc_attr( $witrshowdata['witr_vicon_item']['value']);?>"></i>																			
								</a>
								<!-- end icon -->	
								<!-- video text -->
								<?php if(isset($witrshowdata['witr_video_title']) && ! empty($witrshowdata['witr_video_title'])){?>								
									<h4><?php echo $witrshowdata['witr_video_title']; ?></h4>																	
								<?php } ?>	
							</div>
						</div>	
					<?php } ?>				
				</div>								
			</div>

	<?php		
	break;
	
	case '9':
	?>
			<!-- themex call to action 9 -->
			<div class="row">
				<div class="col-lg-4 col-md-12">
					<?php if($witrshowdata['witr_show_vicon'] == 'yes'){?>
						<div class="witr_9">
							<div class="themex_video_inner">
								<!-- icon -->
								<a class="video-popup video-vemo-icon venobox vbox-item" data-vbtype="<?php echo $witr_videotype; ?>" data-autoplay="true" href="<?php if( $witr_videotype=='youtube' ){echo $youtube_url;}elseif( $witr_videotype=='vimeo' ){echo $vimeo_url;}else{} ?>">								
									<!-- icon -->
									<i class="<?php echo esc_attr( $witrshowdata['witr_vicon_item']['value']);?>"></i>										
								</a>
								<!-- end icon -->	
								<!-- video text -->
								<?php if(isset($witrshowdata['witr_video_title']) && ! empty($witrshowdata['witr_video_title'])){?>								
									<h4><?php echo $witrshowdata['witr_video_title']; ?></h4>																	
								<?php } ?>	
							</div>
						</div>	
					<?php } ?>
				</div>
				<div class="col-lg-8 col-md-12 text-left">
					<div class="themex_content all_cal_color">
					<!-- top title -->
					<?php if(isset($witrshowdata['witr_videos_sub']) && ! empty($witrshowdata['witr_videos_sub'])){?>								
							<h5><?php echo $witrshowdata['witr_videos_sub']; ?></h5>																	
					<?php } ?>	
					<!-- middle title -->
					<?php if(isset($witrshowdata['witr_videos_title']) && ! empty($witrshowdata['witr_videos_title'])){?>								
							<h2><?php echo $witrshowdata['witr_videos_title']; ?></h2>																	
					<?php } ?>
					<!-- bottom title -->
					<?php if(isset($witrshowdata['witr_videos_title2']) && ! empty($witrshowdata['witr_videos_title2'])){?>								
							<h3><?php echo $witrshowdata['witr_videos_title2']; ?></h3>																	
					<?php } ?>
						<!-- content -->
					<?php if(isset($witrshowdata['witr_videos_text']) && ! empty($witrshowdata['witr_videos_text'])){?>
						<p><?php echo $witrshowdata['witr_videos_text']; ?> </p>		
					<?php } ?>						
					</div>				
					<!-- button -->
					<?php if(isset($witrshowdata['witr_text_button']) && ! empty($witrshowdata['witr_text_button'])){?>	
						<div class="themex_button all_cal_color">						
							<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>> 							
								<?php echo $witrshowdata['witr_text_button'];?>
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
								<?php } ?>							
							</a>
						</div>
					<?php } ?>	
				</div>	
			</div>		
	
	<?php	
	break;
	case '8';
	?>
	
		<!-- themex call to action 8 -->
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="themex_content all_cal_color text-left">
						<!-- top title -->
						<?php if(isset($witrshowdata['witr_videos_sub']) && ! empty($witrshowdata['witr_videos_sub'])){?>								
								<h5><?php echo $witrshowdata['witr_videos_sub']; ?></h5>																	
						<?php } ?>	
						<!-- middle title -->
						<?php if(isset($witrshowdata['witr_videos_title']) && ! empty($witrshowdata['witr_videos_title'])){?>								
								<h2><?php echo $witrshowdata['witr_videos_title']; ?></h2>																	
						<?php } ?>
						<!-- bottom title -->
						<?php if(isset($witrshowdata['witr_videos_title2']) && ! empty($witrshowdata['witr_videos_title2'])){?>								
								<h3><?php echo $witrshowdata['witr_videos_title2']; ?></h3>																	
						<?php } ?>
							<!-- content -->
						<?php if(isset($witrshowdata['witr_videos_text']) && ! empty($witrshowdata['witr_videos_text'])){?>
							<p><?php echo $witrshowdata['witr_videos_text']; ?> </p>		
						<?php } ?>						
	
						<!-- button -->
						<?php if(isset($witrshowdata['witr_text_button']) && ! empty($witrshowdata['witr_text_button'])){?>	
								<div class=" themex_button">						
									<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>> 							
										<?php echo $witrshowdata['witr_text_button'];?>
										<!-- icon -->
										<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
											<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
										<?php } ?>							
									</a>
								</div>
						<?php } ?>
					</div>					
				</div>
				<div class="col-lg-4 col-md-12">
					<?php if($witrshowdata['witr_show_vicon'] == 'yes'){?>
						<div class="witr_9">
							<div class="themex_video_inner">
								<!-- icon -->
								<a class="video-popup video-vemo-icon venobox vbox-item" data-vbtype="<?php echo $witr_videotype; ?>" data-autoplay="true" href="<?php if( $witr_videotype=='youtube' ){echo $youtube_url;}elseif( $witr_videotype=='vimeo' ){echo $vimeo_url;}else{} ?>">								
									<!-- icon -->
									<i class="<?php echo esc_attr( $witrshowdata['witr_vicon_item']['value']);?>"></i>								
								</a>
								<!-- end icon -->	
								<!-- video text -->
								<?php if(isset($witrshowdata['witr_video_title']) && ! empty($witrshowdata['witr_video_title'])){?>								
									<h4><?php echo $witrshowdata['witr_video_title']; ?></h4>																	
								<?php } ?>	
							</div>
						</div>	
					<?php } ?>
				</div>		
			</div>		
		
	<?php	
	break;
	case '7';
	?>
				
		<!-- themex call to action 7 -->
		<div class=" all_cal_color">
			<div class="cal_to_toggole">
					<div class="themex_content text-left">
						<!-- top title -->
						<?php if(isset($witrshowdata['witr_videos_sub']) && ! empty($witrshowdata['witr_videos_sub'])){?>								
								<h5><?php echo $witrshowdata['witr_videos_sub']; ?></h5>																	
						<?php } ?>	
						<!-- middle title -->
						<?php if(isset($witrshowdata['witr_videos_title']) && ! empty($witrshowdata['witr_videos_title'])){?>								
								<h2><?php echo $witrshowdata['witr_videos_title']; ?></h2>																	
						<?php } ?>
						<!-- bottom title -->
						<?php if(isset($witrshowdata['witr_videos_title2']) && ! empty($witrshowdata['witr_videos_title2'])){?>								
								<h3><?php echo $witrshowdata['witr_videos_title2']; ?></h3>																	
						<?php } ?>
							<!-- content -->
						<?php if(isset($witrshowdata['witr_videos_text']) && ! empty($witrshowdata['witr_videos_text'])){?>
							<p><?php echo $witrshowdata['witr_videos_text']; ?> </p>		
						<?php } ?>			
					</div>
				<?php if(isset($witrshowdata['witr_text_button']) && ! empty($witrshowdata['witr_text_button'])){?>	
					<div class="themex_button no_margin text-right">						
						<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>> 							
							<?php echo $witrshowdata['witr_text_button'];?>
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
								<?php } ?>							
						</a>
					</div>
				<?php } ?>			
			</div>
		</div>

	<?php
	break;
	case '6';
	?>
	
		<!-- themex call to action 6 -->

		<div class=" witr_6 text-center">
			<div class="row">
				<div class="col-lg-12 col-md-12">
						<div class="themex_content all_cal_color">			
							<!-- top title -->
							<?php if(isset($witrshowdata['witr_videos_sub']) && ! empty($witrshowdata['witr_videos_sub'])){?>								
									<h5><?php echo $witrshowdata['witr_videos_sub']; ?></h5>																	
							<?php } ?>	
							<!-- middle title -->
							<?php if(isset($witrshowdata['witr_videos_title']) && ! empty($witrshowdata['witr_videos_title'])){?>								
									<h2><?php echo $witrshowdata['witr_videos_title']; ?></h2>																	
							<?php } ?>
							<!-- bottom title -->
							<?php if(isset($witrshowdata['witr_videos_title2']) && ! empty($witrshowdata['witr_videos_title2'])){?>								
									<h3><?php echo $witrshowdata['witr_videos_title2']; ?></h3>																	
							<?php } ?>
								<!-- content -->
							<?php if(isset($witrshowdata['witr_videos_text']) && ! empty($witrshowdata['witr_videos_text'])){?>
								<p><?php echo $witrshowdata['witr_videos_text']; ?> </p>		
							<?php } ?>						
						</div>
					<?php if($witrshowdata['witr_show_vicon'] == 'yes'){?>
						<div class="witr_9">
							<div class="themex_video_inner">
								<!-- icon -->
								<a class="video-popup video-vemo-icon venobox vbox-item" data-vbtype="<?php echo $witr_videotype; ?>" data-autoplay="true" href="<?php if( $witr_videotype=='youtube' ){echo $youtube_url;}elseif( $witr_videotype=='vimeo' ){echo $vimeo_url;}else{} ?>">								
									<!-- icon -->
									<i class="<?php echo esc_attr( $witrshowdata['witr_vicon_item']['value']);?>"></i>											
								</a>
								<!-- end icon -->	
								<!-- video text -->
								<?php if(isset($witrshowdata['witr_video_title']) && ! empty($witrshowdata['witr_video_title'])){?>								
									<h4><?php echo $witrshowdata['witr_video_title']; ?></h4>																	
								<?php } ?>	
							</div>
						</div>	
					<?php } ?>
					<!-- button -->
					<?php if(isset($witrshowdata['witr_text_button']) && ! empty($witrshowdata['witr_text_button'])){?>	
							<div class="themex_button witr_b9 all_cal_color">						
								<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>> 							
									<?php echo $witrshowdata['witr_text_button'];?>
									<!-- icon -->
									<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
										<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
									<?php } ?>							
								</a>
							</div>
					<?php } ?>					
				</div>				
			</div>
		</div>
	
	<?php
	break;
	case '5';
	?>
			<!-- themex call to action 5 -->

		<div class=" witr_5 all_cal_color themex_cen text-center">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="themex_content">	
						<!-- top title -->
						<?php if(isset($witrshowdata['witr_videos_sub']) && ! empty($witrshowdata['witr_videos_sub'])){?>								
								<h5><?php echo $witrshowdata['witr_videos_sub']; ?></h5>																	
						<?php } ?>	
						<!-- middle title -->
						<?php if(isset($witrshowdata['witr_videos_title']) && ! empty($witrshowdata['witr_videos_title'])){?>								
								<h2><?php echo $witrshowdata['witr_videos_title']; ?></h2>																	
						<?php } ?>
						<!-- bottom title -->
						<?php if(isset($witrshowdata['witr_videos_title2']) && ! empty($witrshowdata['witr_videos_title2'])){?>								
								<h3><?php echo $witrshowdata['witr_videos_title2']; ?></h3>																	
						<?php } ?>
							<!-- content -->
						<?php if(isset($witrshowdata['witr_videos_text']) && ! empty($witrshowdata['witr_videos_text'])){?>
							<p><?php echo $witrshowdata['witr_videos_text']; ?> </p>		
						<?php } ?>
						<!-- button -->
						<?php if(isset($witrshowdata['witr_text_button']) && ! empty($witrshowdata['witr_text_button'])){?>	
							<div class="themex_button">						
								<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>> 							
									<?php echo $witrshowdata['witr_text_button'];?>
									<!-- icon -->
									<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
										<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
									<?php } ?>							
								</a>
							</div>
						<?php } ?>					
					</div>				
				</div>
			</div>
	    </div>


	<?php
	break;	
	case '4';
	?>
				<!-- themex call to action 4 -->

		<div class=" all_cal_color">
			<div class="row">
				<div class="col-lg-7 col-md-12 text-left">
					<div class="themex_content ">
						<!-- top title -->
						<?php if(isset($witrshowdata['witr_videos_sub']) && ! empty($witrshowdata['witr_videos_sub'])){?>								
								<h5><?php echo $witrshowdata['witr_videos_sub']; ?></h5>																	
						<?php } ?>	
						<!-- middle title -->
						<?php if(isset($witrshowdata['witr_videos_title']) && ! empty($witrshowdata['witr_videos_title'])){?>								
								<h2><?php echo $witrshowdata['witr_videos_title']; ?></h2>																	
						<?php } ?>
						<!-- bottom title -->
						<?php if(isset($witrshowdata['witr_videos_title2']) && ! empty($witrshowdata['witr_videos_title2'])){?>								
								<h3><?php echo $witrshowdata['witr_videos_title2']; ?></h3>																	
						<?php } ?>
							<!-- content -->
						<?php if(isset($witrshowdata['witr_videos_text']) && ! empty($witrshowdata['witr_videos_text'])){?>
							<p><?php echo $witrshowdata['witr_videos_text']; ?> </p>		
						<?php } ?>
					
					</div>		
					<div class="themex_button">					
					<!-- button -->
						<?php if(isset($witrshowdata['witr_text_button']) && ! empty($witrshowdata['witr_text_button'])){?>															
							<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>> 							
								<?php echo $witrshowdata['witr_text_button'];?>
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
								<?php } ?>							
							</a>	
						<?php } ?>	
												
						<?php if(isset($witrshowdata['witr_text_button2']) && ! empty($witrshowdata['witr_text_button2'])){?>								
							<a class="wbutton2" href="<?php echo $witrshowdata['witr_button_link2'] ['url'];?>"<?php echo $target_btnb,$nofollow_btnb?>> 					
								<?php echo $witrshowdata['witr_text_button2'];?>
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_iconb_item2'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_iconb_item2']['value']);?>"></i>
								<?php } ?>														
							</a>
						<?php } ?>
						
					</div>
				</div>
				<div class="col-lg-5 col-md-12">
					<!-- image -->
					<?php if( ! empty($witrshowdata['witr_image_image']['url'])){?>
						<div class="witr_col_image">
							<?php echo $txbd_image; ?>
						</div>
					<?php } ?>
				</div>
				
			</div>
		</div>

	
	<?php
	break;
	case '3';
	?>
			<!-- themex call to action 3 -->

		<div class=" all_cal_color">
			<div class="cal_to_toggole">
					<div class="themex_content col_content_width_100 text-left">
						<!-- top title -->
						<?php if(isset($witrshowdata['witr_videos_sub']) && ! empty($witrshowdata['witr_videos_sub'])){?>								
								<h5><?php echo $witrshowdata['witr_videos_sub']; ?></h5>																	
						<?php } ?>	
						<!-- middle title -->
						<?php if(isset($witrshowdata['witr_videos_title']) && ! empty($witrshowdata['witr_videos_title'])){?>								
								<h2><?php echo $witrshowdata['witr_videos_title']; ?></h2>																	
						<?php } ?>
						<!-- bottom title -->
						<?php if(isset($witrshowdata['witr_videos_title2']) && ! empty($witrshowdata['witr_videos_title2'])){?>								
								<h3><?php echo $witrshowdata['witr_videos_title2']; ?></h3>																	
						<?php } ?>
							<!-- content -->
						<?php if(isset($witrshowdata['witr_videos_text']) && ! empty($witrshowdata['witr_videos_text'])){?>
							<p><?php echo $witrshowdata['witr_videos_text']; ?> </p>		
						<?php } ?>	
					
					</div>
				<!-- button -->
					<?php if(isset($witrshowdata['witr_text_button']) && ! empty($witrshowdata['witr_text_button'])){?>	
						<div class="themex_button no_margin text-right">						
							<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>> 							
								<?php echo $witrshowdata['witr_text_button'];?>
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
								<?php } ?>															
							</a>
						</div>
					<?php } ?>			
			</div>
		</div>
	<?php
	break;	
	case '2';
	?>
		<!-- themex call to action 2 -->
			<div class="row">
				<div class="col-lg-8 col-md-12 all_cal_color text-left">
					<div class="themex_content">
						<!-- top title -->
						<?php if(isset($witrshowdata['witr_videos_sub']) && ! empty($witrshowdata['witr_videos_sub'])){?>								
								<h5><?php echo $witrshowdata['witr_videos_sub']; ?></h5>																	
						<?php } ?>	
						<!-- middle title -->
						<?php if(isset($witrshowdata['witr_videos_title']) && ! empty($witrshowdata['witr_videos_title'])){?>								
								<h2><?php echo $witrshowdata['witr_videos_title']; ?></h2>																	
						<?php } ?>
						<!-- bottom title -->
						<?php if(isset($witrshowdata['witr_videos_title2']) && ! empty($witrshowdata['witr_videos_title2'])){?>								
								<h3><?php echo $witrshowdata['witr_videos_title2']; ?></h3>																	
						<?php } ?>
							<!-- content -->
						<?php if(isset($witrshowdata['witr_videos_text']) && ! empty($witrshowdata['witr_videos_text'])){?>
							<p><?php echo $witrshowdata['witr_videos_text']; ?> </p>		
						<?php } ?>				
					</div>
					<div class="themex_button ">					
					<!-- button -->
						<?php if(isset($witrshowdata['witr_text_button']) && ! empty($witrshowdata['witr_text_button'])){?>															
							<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>> 							
								<?php echo $witrshowdata['witr_text_button'];?>
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
								<?php } ?>							
							</a>		
						<?php } ?>	

						<?php if(isset($witrshowdata['witr_text_button2']) && ! empty($witrshowdata['witr_text_button2'])){?>								
							<a class="wbutton2" href="<?php echo $witrshowdata['witr_button_link2'] ['url'];?>"<?php echo $target_btnb,$nofollow_btnb?>> 					
								<?php echo $witrshowdata['witr_text_button2'];?>
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_iconb_item2'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_iconb_item2']['value']);?>"></i>
								<?php } ?>						
							</a>
						<?php } ?>
					</div>
				</div>
				<div class="col-lg-4 col-md-12">
					<?php if($witrshowdata['witr_show_vicon'] == 'yes'){?>
						<div class="witr_9">
							<div class="themex_video_inner">
								<!-- icon -->
								<a class="video-popup video-vemo-icon venobox vbox-item" data-vbtype="<?php echo $witr_videotype; ?>" data-autoplay="true" href="<?php if( $witr_videotype=='youtube' ){echo $youtube_url;}elseif( $witr_videotype=='vimeo' ){echo $vimeo_url;}else{} ?>">								
									<!-- icon -->
									<i class="<?php echo esc_attr( $witrshowdata['witr_vicon_item']['value']);?>"></i>												
								</a>
								<!-- end icon -->	
								<!-- video text -->
								<?php if(isset($witrshowdata['witr_video_title']) && ! empty($witrshowdata['witr_video_title'])){?>								
									<h4><?php echo $witrshowdata['witr_video_title']; ?></h4>																	
								<?php } ?>	
							</div>
						</div>	
					<?php } ?>
				</div>				
			</div>

	
	<?php
	break;
	default:
	?>
		<!-- themex call to action 1 -->			
		<div class=" all_cal_color">
			<div class="cal_to_toggole">

					<!-- button -->
					<?php if(isset($witrshowdata['witr_text_button']) && ! empty($witrshowdata['witr_text_button'])){?>	
					<div class="themex_button no_margin text-left">				
							<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>> 							
								<?php echo $witrshowdata['witr_text_button'];?>
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
								<?php } ?>							
							</a>
					</div>
					<?php } ?>	

							
					<div class="themex_content col_content_width_100 text-right">
						<!-- top title -->
						<?php if(isset($witrshowdata['witr_videos_sub']) && ! empty($witrshowdata['witr_videos_sub'])){?>								
								<h5><?php echo $witrshowdata['witr_videos_sub']; ?></h5>																	
						<?php } ?>	
						<!-- middle title -->
						<?php if(isset($witrshowdata['witr_videos_title']) && ! empty($witrshowdata['witr_videos_title'])){?>								
								<h2><?php echo $witrshowdata['witr_videos_title']; ?></h2>																	
						<?php } ?>
						<!-- bottom title -->
						<?php if(isset($witrshowdata['witr_videos_title2']) && ! empty($witrshowdata['witr_videos_title2'])){?>								
								<h3><?php echo $witrshowdata['witr_videos_title2']; ?></h3>																	
						<?php } ?>
							<!-- content -->
						<?php if(isset($witrshowdata['witr_videos_text']) && ! empty($witrshowdata['witr_videos_text'])){?>
							<p><?php echo $witrshowdata['witr_videos_text']; ?> </p>		
						<?php } ?>
					</div>					
				
			</div>
		</div>
	<?php
	break;
}


    } /* function end */


}