<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Banner_slider2 extends Widget_Base {

    public function get_name() {
        return 'witr_banner_slider_2';
    }
    
    public function get_title() {
        return esc_html__( ' Banner Slider 2', 'themex' );
    }
    public function get_style_depends() {
        return ['wbanner'];
    }	
    public function get_icon() {
        return 'themex_icon eicon-image';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {
		
		

			
			
			/* === witr_banner title start === */
			$this->start_controls_section(
				'witr_option_banner_title',
				[
					'label' => esc_html__( ' Banner Title Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
			
			/* banner slider style check  witr_style_banner */
				$this->add_control(
					'witr_style_banner',
					[
						'label' => esc_html__( 'Banner Slider Style', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'1' => esc_html__( 'slider style 1', 'themex' ),
							'2' => esc_html__( 'slider style 2', 'themex' ),
							'3' => esc_html__( 'slider style 3', 'themex' ),
							'4' => esc_html__( 'slider style 4', 'themex' ),
							'5' => esc_html__( 'slider style 5', 'themex' ),

						],
						'default' => '1',
					]
				);					
			
				/* main banner witr_banner_title1 */	
					$this->add_control(
						'witr_banner_title1',
						[
							'label' => esc_html__( 'Title Top', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use title top, remove the text from field,highlight text use ex-<span>text</span>', 'themex' ),
							'default' => esc_html__( 'Add Your banner title Here', 'themex' ),
							'placeholder' => esc_attr__( 'Type your banner title here', 'themex' ),						
						]
					);
				/*  witr_banner_title2 */	
					$this->add_control(
						'witr_banner_title2',
						[
							'label' => esc_html__( 'Title Middle', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use title middle, remove the text from field,highlight text use ex-<span>text</span>', 'themex' ),
							'default' => esc_html__( 'Add Your banner title Here', 'themex' ),
							'placeholder' => esc_attr__( 'Type your banner title here', 'themex' ),						
						]
					);
				/*  witr_banner_title3 */	
					$this->add_control(
						'witr_banner_title3',
						[
							'label' => esc_html__( 'Title Bottom', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use title bottom, remove the text from field,highlight text use ex-<span>text</span>', 'themex' ),
							'default' =>"",
							'placeholder' => esc_attr__( 'Type your banner title here', 'themex' ),						
						]
					);					
				/*  witr_pragraph */	
					$this->add_control(
						'witr_pragraph',
						[
							'label' => esc_html__( ' Content Text', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use content text, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.', 'themex' ),
							'placeholder' => esc_attr__( 'Type your content here', 'themex' ),
						]
					);				
				

			$this->end_controls_section();
			/* === end w_banner title === */
			
			/* === w_banner button start === */
			$this->start_controls_section(
				'witr_banner_button_option',
				[
					'label' => esc_html__( ' Banner Button Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
				/* witr_show_button witr_banner_button	*/
				$this->add_control(
					'witr_show_button',
					[
						'label' => esc_html__( 'Default Show button', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'yes',
					]
				);				
					$this->add_control(
						'witr_banner_button',
						[
							'label' => esc_html__( 'Button text', 'themex' ),
							'label_block' =>true,
							'type' => Controls_Manager::TEXT,							
							'default' => esc_html__( 'Contact Us', 'themex' ),
							'placeholder' => esc_attr__( 'Type your button text here', 'themex' ),
							'condition' => [
								'witr_show_button' => 'yes',
							],							
						]
					);
				/* main banner witr_button_link */	
					$this->add_control(
						'witr_button_link',
						[
							'label' => esc_html__( 'Button Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert button link. It hidden when field blank.','themex'),
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
				/* witr_show_button witr_vshow_button witr_video_button	*/
				$this->add_control(
					'witr_vshow_button',
					[
						'label' => esc_html__( 'Video Show button', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'no',
							'condition' => [
								'witr_style_banner' => ['2','4','7'],
							],														
					]
				);				
					$this->add_control(
						'witr_video_button',
						[
							'label' => esc_html__( 'Video Button Text', 'themex' ),
							'label_block' =>true,
							'type' => Controls_Manager::TEXT,
							'description' =>esc_html__('Insert button text. It hidden when field blank.','themex'),
							'default' => esc_html__( 'Watch Video', 'themex' ),
							'placeholder' => esc_attr__( 'Type your button text here', 'themex' ),
							'condition' => [
								'witr_vshow_button' => 'yes',
								'witr_style_banner' => ['2','4','7'],
							],							
						]
					);
				/* witr_show_button witr_yshow_button witr_yvideo_link	*/
				$this->add_control(
					'witr_yshow_button',
					[
						'label' => esc_html__( 'Show Youtube Link', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'no',
						'condition' => [
							'witr_vshow_button' => 'yes',
							'witr_style_banner' => ['2','4','7'],
						]						
					]
				);						
					$this->add_control(
						'witr_yvideo_link',
						[
							'label' => esc_html__( 'Youtube Video Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert button link. It hidden when field blank. link ex- https://youtu.be/BS4TUd7FJSg','themex'),
							'placeholder' => esc_attr__( 'https://youtu.be/BS4TUd7FJSg', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => 'https://youtu.be/BS4TUd7FJSg',
							],	
							'condition' => [
								'witr_yshow_button' => 'yes',
								'witr_style_banner' => ['2','4','7'],

							],							
						]
					);						
					/* main banner witr_vmshow_button witr_vmvideo_link */	
					$this->add_control(
						'witr_vmshow_button',
						[
							'label' => esc_html__( 'Show Vimo Link', 'themex' ),
							'type' => Controls_Manager::SWITCHER,
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'return_value' => 'yes',
							'default' => 'no',
							'condition' => [
								'witr_vshow_button' => 'yes',
								'witr_style_banner' => ['2','4','7'],
							]						
						]
					);						
					$this->add_control(
						'witr_vmvideo_link',
						[
							'label' => esc_html__( 'Vimo Video Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert button link. It hidden when field blank. link ex- https://vimeo.com/235215203','themex'),
							'placeholder' => esc_attr__( 'https://vimeo.com/235215203', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => 'https://vimeo.com/235215203',
							],	
							'condition' => [
								'witr_vmshow_button' => 'yes',
								'witr_style_banner' => ['2','4','7'],
							],							
						]
					);						
					
		
			$this->end_controls_section();
			/* === end witr_banner button ===  */
			
			/* === witr_banner social start ==== */
			$this->start_controls_section(
				'witr_field_banner_social',
				[
					'label' => esc_html__( 'Witr Banner Social Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
					'condition' => [
						'witr_style_banner' => ['3','4'],
					],					
				]
			);

				/* witr_show_social*/
				$this->add_control(
					'witr_social_show',
					[
						'label' => esc_html__( 'Video Show button', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'yes',														
					]
				);			
			
				/* main banner witr_banner_fb */	
					$this->add_control(
						'witr_banner_fb',
						[
							'label' => esc_html__( 'facebook Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'description' =>esc_html__('Insert link facebook. It hidden when field blank.','themex'),
							'show_external' => true,
							'default' => [
								'url' => '#',
							],
							'condition' => [
								'witr_social_show' => 'yes',
							],							
						]
					);				
				/* main banner witr_banner_tw */	
					$this->add_control(
						'witr_banner_tw',
						[
							'label' => esc_html__( 'twitter Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'description' =>esc_html__('Insert link twitter. It hidden when field blank.','themex'),
							'show_external' => true,
							'default' => [
								'url' => '#',
							],
							'condition' => [
								'witr_social_show' => 'yes',
							],							
						]
					);				
				/* main banner witr_banner_gp */	
					$this->add_control(
						'witr_banner_gp',
						[
							'label' => esc_html__( 'google-plus Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'description' =>esc_html__('Insert link google plus. It hidden when field blank.','themex'),
							'show_external' => true,
							'default' => [
								'url' => '',
							],
							'condition' => [
								'witr_social_show' => 'yes',
							],							
						]
					);				
				/* main banner witr_banner_lk */	
					$this->add_control(
						'witr_banner_lk',
						[
							'label' => esc_html__( 'linkedin-in Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'description' =>esc_html__('Insert link linkedin. It hidden when field blank.','themex'),
							'show_external' => true,
							'default' => [
								'url' => '',
							],
							'condition' => [
								'witr_social_show' => 'yes',
							],							
						]
					);				
				/* main banner witr_banner_pi */	
					$this->add_control(
						'witr_banner_pi',
						[
							'label' => esc_html__( 'pinterest-p Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'description' =>esc_html__('Insert link pinterest. It hidden when field blank.','themex'),
							'show_external' => true,
							'default' => [
								'url' => '',
							],
							'condition' => [
								'witr_social_show' => 'yes',
							],							
						]
					);				
				/* main banner witr_banner_in */	
					$this->add_control(
						'witr_banner_in',
						[
							'label' => esc_html__( 'instagram Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'description' =>esc_html__('Insert link instagram. It hidden when field blank.','themex'),
							'show_external' => true,
							'default' => [
								'url' => '',
							],
							'condition' => [
								'witr_social_show' => 'yes',
							],							
						]
					);				
				/* main banner witr_banner_us*/	
					$this->add_control(
						'witr_banner_us',
						[
							'label' => esc_html__( 'users Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'description' =>esc_html__('Insert link users. It hidden when field blank.','themex'),
							'show_external' => true,
							'default' => [
								'url' => '',
							],
							'condition' => [
								'witr_social_show' => 'yes',
							],							
						]
					);								
					/* main banner witr_banner_tu*/	
					$this->add_control(
						'witr_banner_tu',
						[
							'label' => esc_html__( 'tumblr Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'description' =>esc_html__('Insert link tumblr. It hidden when field blank.','themex'),
							'show_external' => true,
							'default' => [
								'url' => '#',
							],
							'condition' => [
								'witr_social_show' => 'yes',
							],							
						]
					);				
					/* main banner witr_banner_vi*/	
					$this->add_control(
						'witr_banner_vi',
						[
							'label' => esc_html__( 'vimeo Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'description' =>esc_html__('Insert link vimeo. It hidden when field blank.','themex'),
							'show_external' => true,
							'default' => [
								'url' => '#',
							],
							'condition' => [
								'witr_social_show' => 'yes',
							],							
						]
					);				
					/* main banner witr_banner_yt*/	
					$this->add_control(
						'witr_banner_yt',
						[
							'label' => esc_html__( 'Youtube Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'description' =>esc_html__('Insert link Youtube. It hidden when field blank.','themex'),
							'show_external' => true,
							'default' => [
								'url' => '',
							],
							'condition' => [
								'witr_social_show' => 'yes',
							],							
						]
					);				
					
			
			$this->end_controls_section();
			/* === end witr_banner socila === */		
		


			/* === witr_banner single Image start === */
			$this->start_controls_section(
				'witr_banner_image_option',
				[
					'label' => esc_html__( ' Banner Image Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
			/* show image witr_show_image witr_banner_image	*/
				$this->add_control(
					'witr_show_image',
					[
						'label' => esc_html__( 'Show Image', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'no',
					]
				);				
				$this->add_control(
					'witr_banner_image',
					[
						'label' => esc_html__( 'Choose Image', 'themex' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
						'condition' => [
							'witr_show_image' => 'yes',
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
						'condition' => [
							'witr_show_image' => 'yes',
						],						
					]
				);				
			
			$this->end_controls_section();
			/* === end witr_banner single Image === */
			
			
			
			/* === Witr Slider Height start === */
			$this->start_controls_section(
				'witr_sliders_height',
				[
					'label' => esc_html__( 'Witr Slider Height Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);			
			
				/*  Slider Heigh */
				$this->add_responsive_control(
					'witr_slider_height',
					[
						'label' => esc_html__( 'Slider Heigh', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px','%'],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 2000,
							],
							'%' => [
								'min' => 6,
								'max' => 500,
							],
							
							
							
						],
						'selectors' => [
							'{{WRAPPER}} .witr_banner_height' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);			
			
			$this->end_controls_section();
			/* ===  Witr Slider Height End === */			
			
			
			
			
			

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
						'{{WRAPPER}} .banner-content h1' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .banner-content h1:hover' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .banner-content h1',
				]
			);						
			/*  Title Width */
			$this->add_responsive_control(
				'witr_tt_width',
				[
					'label' => esc_html__( ' Width', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'unit' => '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],					
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
						'{{WRAPPER}} .banner-content h1' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);			
			/* margin */
			$this->add_responsive_control(
				'witr_sectionmargin',
				[
					'label' => esc_html__( ' Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .banner-content h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* padding */
			$this->add_responsive_control(
				'witr_sectionpadding',
				[
					'label' => esc_html__( ' Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .banner-content h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .banner-content h2' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .banner-content h2:hover' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .banner-content h2',
				]
			);
			/*  Title Width */
			$this->add_responsive_control(
				'witr_tm_width',
				[
					'label' => esc_html__( ' Width', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'unit' => '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],					
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
						'{{WRAPPER}} .banner-content h2' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .banner-content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .banner-content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .banner-content h3' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .banner-content h3:hover' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .banner-content h3',
				]
			);		
				
			/*  Title Width */
			$this->add_responsive_control(
				'witr_tb_width',
				[
					'label' => esc_html__( ' Width', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'unit' => '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],					
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
						'{{WRAPPER}} .banner-content h3' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .banner-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .banner-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  w_title style 3 ====*/
		
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
						'{{WRAPPER}} .banner-content h1 span,{{WRAPPER}} .banner-content h2 span,{{WRAPPER}} .banner-content h3 span' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .banner-content h1 span:hover,{{WRAPPER}} .banner-content h2 span:hover,{{WRAPPER}} .banner-content h3 span:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_htpy_color',
					'label' => esc_html__( 'Typography', 'themex' ),
					'selector' => '{{WRAPPER}} .banner-content h1 span,{{WRAPPER}} .banner-content h2 span,{{WRAPPER}} .banner-content h3 span',
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
						'{{WRAPPER}} .banner-content h1 span,{{WRAPPER}} .banner-content h2 span,{{WRAPPER}} .banner-content h3 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .banner-content h1 span,{{WRAPPER}} .banner-content h2 span,{{WRAPPER}} .banner-content h3 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  w_heighlight style ====*/		
		
		

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
						'separator'=>'before',
						'global' => [
							'default' => Global_Colors::COLOR_TEXT,
						],						
						'selectors' => [
							'{{WRAPPER}} .banner-content p' => 'color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .banner-content p',
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
						'{{WRAPPER}} .banner-content p' => 'width: {{SIZE}}{{UNIT}};',
					],
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
							'{{WRAPPER}} .banner-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .banner-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'label' => esc_html__( 'Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'global' => [
									'default' => Global_Colors::COLOR_ACCENT,
								],								
								'separator'=>'before',
								'selectors' => [
									'{{WRAPPER}} .butn,{{WRAPPER}} .banner-content button' => 'color: {{VALUE}}',
								],
							]
						);				
						/* Button background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_button_background',
								'label' => esc_html__( 'button Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .butn,{{WRAPPER}} .banner-content button',
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
								'selector' => '{{WRAPPER}} .butn,{{WRAPPER}} .banner-content button',
							]
						);	
						
					/* witr_border_style */
					$this->add_control(
						'witr_border_btn_style',
						[
							'label' => esc_html__( 'Border Style', 'themex' ),
							'type' => Controls_Manager::SELECT,
							'options' => [
								'none' => esc_html__( 'none', 'themex' ),
								'solid' => esc_html__( 'Solid', 'themex' ),
								'double' => esc_html__( 'Double', 'themex' ),
								'dotted' => esc_html__( 'Dotted', 'themex' ),
								'dashed' => esc_html__( 'Dashed', 'themex' ),
								'default' => esc_html__( 'Default', 'themex' ),
							],
							'default' => 'default',
							'selectors' => [
								'{{WRAPPER}} .butn,{{WRAPPER}} .banner-content button' => 'border-style: {{VALUE}}',
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
								'{{WRAPPER}} .butn,{{WRAPPER}} .banner-content button' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .butn,{{WRAPPER}} .banner-content button' => 'border-color: {{VALUE}}',
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
									'{{WRAPPER}} .butn,{{WRAPPER}} .banner-content button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .banner-content a,{{WRAPPER}} .banner-content button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .banner-content a,{{WRAPPER}} .banner-content button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/*  witr input headding */
						$this->add_control(
							'witr_hidden_input',
							[
								'label' => esc_html__( 'Input Color Option ', 'themex' ),
								'type' => Controls_Manager::HEADING,
								'separator'=>'before',
								'condition' => [
									'witr_style_banner' => ['5'],
								],
							]
						);
						/* color */
						$this->add_control(
							'witr_buttonh_color',
							[
								'label' => esc_html__( 'Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								'selectors' => [
									'{{WRAPPER}} .banner-content input,{{WRAPPER}} .banner-content input::-webkit-input-placeholder' => 'color: {{VALUE}}',
								],
								'condition' => [
									'witr_style_banner' => ['5'],
								],								
							]
						);

						/* moz-placeholder */
						$this->add_control(
							'witr_moz_color',
							[
								'label' => esc_html__( 'Moz Placeholder Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .banner-content input::-moz-placeholder' => 'color: {{VALUE}}',
								],
								'condition' => [
									'witr_style_banner' => ['5'],
								],								
							]
						);



						
						/* Button background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_buttonh_background',
								'label' => esc_html__( 'button Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .banner-content input',
								'condition' => [
									'witr_style_banner' => ['5'],
								],								
							]
						);
						/* typograohy color */			
						$this->add_group_control(
							Group_Control_Typography::get_type(),
							[
								'name' => 'witr_buttonh_typography',
								'label' => esc_html__( 'Typography', 'themex' ),
								'selector' => '{{WRAPPER}} .banner-content input,{{WRAPPER}} .banner-content input::-webkit-input-placeholder',
								'condition' => [
									'witr_style_banner' => ['5'],
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
								'none' => esc_html__( 'none', 'themex' ),
								'solid' => esc_html__( 'Solid', 'themex' ),
								'double' => esc_html__( 'Double', 'themex' ),
								'dotted' => esc_html__( 'Dotted', 'themex' ),
								'dashed' => esc_html__( 'Dashed', 'themex' ),
								'default' => esc_html__( 'Default', 'themex' ),
							],
							'default' => 'default',
							'selectors' => [
								'{{WRAPPER}} .banner-content input' => 'border-style: {{VALUE}}',
							],
							'condition' => [
								'witr_style_banner' => ['5'],
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
								'{{WRAPPER}} .banner-content input' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'condition' => [
								'witr_border_btnh_style' => ['solid','double','dotted','dashed','default'],
								'witr_style_banner' => ['5'],
							],
							
						]							
						
					);
					/* border_color */
					$this->add_control(
						'witr_border_btnh_color',
						[
							'label' => esc_html__( 'Border Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .banner-content input' => 'border-color: {{VALUE}}',
							],
							'condition' => [
								'witr_border_btnh_style' => ['solid','double','dotted','dashed','default'],
								'witr_style_banner' => ['5'],
							],
						]
					);						

						/* border_radius */
						$this->add_control(
							'witr_border_btnh_radius',
							[
								'label' => esc_html__( 'Border Radius', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .banner-content input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
								'condition' => [
									'witr_border_btnh_style' => ['solid','double','dotted','dashed','default'],
									'witr_style_banner' => ['5'],
								],								
							]
						);
						/*  input width */
						$this->add_responsive_control(
							'witr_input_width',
							[
								'label' => esc_html__( 'Input width', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ '%', 'px', 'em' ],
								'range' => [
									'%' => [
										'min' => 0,
										'max' => 100,
									],
									'px' => [
										'min' => 0,
										'max' => 500,
									],
								],								
								'default' => [
									'unit' => '%',
								],
								'tablet_default' => [
									'unit' => '%',
								],
								'mobile_default' => [
									'unit' => '%',
								],					

								'selectors' => [
									'{{WRAPPER}} .banner-content input' => 'width: {{SIZE}}{{UNIT}};',
								],
								'condition' => [
									'witr_style_banner' => ['5'],
								],								
							]
						);
						/*  input Heigh */
						$this->add_responsive_control(
							'witr_height_input',
							[
								'label' => esc_html__( 'Input Heigh', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => ['px', 'em' ],
								'range' => [
									'em' => [
										'min' => 0,
										'max' => 500,
									],
									'px' => [
										'min' => 0,
										'max' => 500,
									],
								],													
								'selectors' => [
									'{{WRAPPER}} .banner-content input' => 'height: {{SIZE}}{{UNIT}};',
								],
								'condition' => [
									'witr_style_banner' => ['5'],
								],								
							]
						);
						
						
						/* button margin */
						$this->add_responsive_control(
							'witr_buttonh_margin',
							[
								'label' => esc_html__( 'Margin', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .banner-content input' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
								'condition' => [
									'witr_style_banner' => ['5'],
								],								
							]
						);
						/* button padding */
						$this->add_responsive_control(
							'witr_buttonh_padding',
							[
								'label' => esc_html__( 'Padding', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .banner-content input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
								'condition' => [
									'witr_style_banner' => ['5'],
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
								'label' => esc_html__( 'Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								'selectors' => [
									'{{WRAPPER}} .butn:hover,{{WRAPPER}} .banner-content button:hover' => 'color: {{VALUE}}',
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
								'selector' => '{{WRAPPER}} .butn:hover,{{WRAPPER}} .banner-content button:hover',
							]
						);						
						/* border_hover_color */
						$this->add_control(
							'witr_borderh_btn_color',
							[
								'label' => esc_html__( 'Border Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,								
								'selectors' => [
									'{{WRAPPER}} .butn:hover,{{WRAPPER}} .banner-content button:hover' => 'border-color: {{VALUE}}',
								],
							]
						);													

					/*  witr Forground Hover headding */
					$this->add_control(
						'witr_hiddenaf_view',
						[
							'label' => esc_html__( 'Forground Hover Color ', 'themex' ),
							'type' => Controls_Manager::HEADING,
						]
					);						
						/* Forground Hover background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_button_ab_hover_background',
								'label' => esc_html__( 'Forground Hover', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .butn:hover::before',
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
					'label' => esc_html__( 'Icon Color Option', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,				
					'condition' => [
						'witr_style_banner' => ['2','4','7'],
						'witr_vshow_button' => 'yes',
						'witr_yshow_button' => 'yes',
					],					
				]
			);						
			/*=== start icon_tabs style ====*/
			$this->start_controls_tabs( 'icon_colors' );
			
				/*=== start icon_normal style ====*/
				$this->start_controls_tab(
					'icon_colors_normal',
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
							'{{WRAPPER}} .banner-content a i' => 'color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .banner-content a i',
					]
				);								
				/*  icon font size */
				$this->add_responsive_control(
					'witr_icon_size',
					[
						'label' => esc_html__( 'Icon Size', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', 'rem', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .banner-content a i' => 'font-size: {{SIZE}}{{UNIT}};',
						],
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
							'{{WRAPPER}} .banner-content a i' => 'width: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .banner-content a i' => 'height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .banner-content a i' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);

				/* witr_border_style */
				$this->add_control(
					'witr_border_style',
					[
						'label' => esc_html__( 'Border Style', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'none' => esc_html__( 'None', 'themex' ),
							'solid' => esc_html__( 'Solid', 'themex' ),
							'double' => esc_html__( 'Double', 'themex' ),
							'dotted' => esc_html__( 'Dotted', 'themex' ),
							'dashed' => esc_html__( 'Dashed', 'themex' ),
							'default' => esc_html__( 'Default', 'themex' ),
						],
						'default' => 'default',
						'selectors' => [
							'{{WRAPPER}} .banner-content a i' => 'border-style: {{VALUE}}',
						],
					]
				);		
				/* witr border */
				$this->add_control(
					'witr_border',
					[
						'label' => esc_html__( 'Border', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'selectors' => [
							'{{WRAPPER}} .banner-content a i' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						'condition' => [
							'witr_border_style' => ['solid','double','dotted','dashed','default'],
						],						
					]
				);
				/* border_color */
				$this->add_control(
					'witr_border_color',
					[
						'label' => esc_html__( 'Border Color', 'themex' ),
						'type' => Controls_Manager::COLOR,						
						'selectors' => [
							'{{WRAPPER}} .banner-content a i' => 'border-color: {{VALUE}}',
						],
						'condition' => [
							'witr_border_style' => ['solid','double','dotted','dashed','default'],
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
							'{{WRAPPER}} .banner-content a i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						'condition' => [
							'witr_border_style' => ['solid','double','dotted','dashed','default'],
						],						
					]
				);
					
				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .banner-content a i',
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
							'{{WRAPPER}} .banner-content a i' => 'mix-blend-mode: {{VALUE}}',
						],
					]
				);				
				/* icon margin */
				$this->add_responsive_control(
					'witr_icon_margin',
					[
						'label' => esc_html__( 'Icon Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .banner-content a i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* icon padding */
				$this->add_responsive_control(
					'witr_icon_padding',
					[
						'label' => esc_html__( 'Icon Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .banner-content a i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		

				$this->end_controls_tab();
				/*=== end icon normal style ====*/
				
				/*=== start Text style ====*/
				$this->start_controls_tab(
					'text_colors_normal',
					[
						'label' => esc_html__( 'Text', 'themex' ),
					]
				);				
			/* Video Btn Text color */
			$this->add_control(
				'witr_vbtnt_color',
				[
					'label' => esc_html__( 'Video Btn Text Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_ACCENT,
					],					
					'separator'=>'before',					
					'selectors' => [
						'{{WRAPPER}} .banner-content a.butn-2' => 'color: {{VALUE}}',
					],
				]
			);

			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_ttpy_color1',
					'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_ACCENT,
					],
					'selector' => '{{WRAPPER}} .banner-content a.butn-2',
				]
			);		
	
			/* vbtnt margin */
			$this->add_responsive_control(
				'witr_vbtnt_margin',
				[
					'label' => esc_html__( 'Video Btn Text Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .banner-content a.butn-2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* vbtnt padding */
			$this->add_responsive_control(
				'witr_vbtnt_padding',
				[
					'label' => esc_html__( 'Video Btn Text Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .banner-content a.butn-2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
				$this->end_controls_tab();
				/*=== end icon normal style ====*/
			
					/*=== start icon hover style ====*/
					$this->start_controls_tab(
						'icon_colors_hover',
						[
							'label' => esc_html__( 'Icon Hover', 'themex' ),
						]
					);
					/*  primary hover color */
					$this->add_control(
						'witr_hover_primary_color',
						[
							'label' => esc_html__( ' Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .banner-content a i:hover' => 'color: {{VALUE}}',
							],
						]
					);					
					/* hover Icon background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_hovet_icon',
							'label' => esc_html__( 'Icon Hover Background', 'themex' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .banner-content a i:hover',
						]
					);										
					/* Video Btn Text hover color */
					$this->add_control(
						'witr_vbtnt_hover_color',
						[
							'label' => esc_html__( 'Video Btn Text Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							'selectors' => [
								'{{WRAPPER}} .banner-content a.butn-2:hover' => 'color: {{VALUE}}',
							],
						]
					);					
					
					$this->end_controls_tab();
					/*=== end icon hover style ====*/
					
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/

		$this->end_controls_section();

		/*=== end witr_icon style ====*/


		
		
			/*=== start witr_icon2 style ====*/
			$this->start_controls_section(
				'section_style_icon2',
				[
					'label' => esc_html__( 'Icon2 Color Option', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,				
					'condition' => [
						'witr_style_banner' => ['3','4'],
						'witr_social_show' => 'yes',
					],				
				]
			);						
			/*=== start icon2_tabs style ====*/
			$this->start_controls_tabs( 'icon2_colors' );
			
				/*=== start icon2_normal style ====*/
				$this->start_controls_tab(
					'icon2_colors_normal',
					[
						'label' => esc_html__( 'Normal', 'themex' ),
					]
				);
				/* Icon2 Color */
				$this->add_control(
					'witr_icon2_color',
					[
						'label' => esc_html__( 'Icon2 Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .banner-content.content-4 ul li a i, {{WRAPPER}} .banner-content.content-3 ul li a i' => 'color: {{VALUE}}',
						],
						
					]
				);				
				/*  icon2 font size */
				$this->add_responsive_control(
					'witr_icon2_size',
					[
						'label' => esc_html__( 'Icon2 Size', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .banner-content.content-4 ul li a i, {{WRAPPER}} .banner-content.content-3 ul li a i' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);
				
				/*  icon2 width */
				$this->add_responsive_control(
					'witr_icon2_width',
					[
						'label' => esc_html__( 'width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .banner-content.content-4 ul li a i, {{WRAPPER}} .banner-content.content-3 ul li a i' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon2 height */
				$this->add_responsive_control(
					'witr_icon2_height',
					[
						'label' => esc_html__( 'Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .banner-content.content-4 ul li a i, {{WRAPPER}} .banner-content.content-3 ul li a i' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon2 line height */
				$this->add_responsive_control(
					'witr_icon2_line_height',
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
							'{{WRAPPER}} .banner-content.content-4 ul li a i, {{WRAPPER}} .banner-content.content-3 ul li a i' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);		

				/* witr_border_style */
				$this->add_control(
					'witr_icon2_border_style',
					[
						'label' => esc_html__( 'Border Style', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'default' => 'default',
						'options' => [
							'none' => esc_html__( 'none', 'themex' ),
							'solid' => esc_html__( 'Solid', 'themex' ),
							'double' => esc_html__( 'Double', 'themex' ),
							'dotted' => esc_html__( 'Dotted', 'themex' ),
							'dashed' => esc_html__( 'Dashed', 'themex' ),
							'default' => esc_html__( 'Default', 'themex' ),
						],
						
						'selectors' => [
							'{{WRAPPER}} .banner-content.content-4 ul li a i, {{WRAPPER}} .banner-content.content-3 ul li a i' => 'border-style: {{VALUE}}',
						],
					]
				);		
				/* witr border */
				$this->add_control(
					'witr_icon2_border',
					[
						'label' => esc_html__( 'Border', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'selectors' => [
							'{{WRAPPER}} .banner-content.content-4 ul li a i, {{WRAPPER}} .banner-content.content-3 ul li a i' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						'condition' => [
							'witr_icon2_border_style' => ['solid','double','dotted','dashed','default'],
						],
					]							
					
				);
				/* border_color */
				$this->add_control(
					'witr_icon2_border_color',
					[
						'label' => esc_html__( 'Border Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .banner-content.content-4 ul li a i, {{WRAPPER}} .banner-content.content-3 ul li a i' => 'border-color: {{VALUE}}',
						],
						'condition' => [
							'witr_icon2_border_style' => ['solid','double','dotted','dashed','default'],
						],
					]
				);				
				/* border_radius */
				$this->add_control(
					'witr_icon2_border_radius',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .banner-content.content-4 ul li a i, {{WRAPPER}} .banner-content.content-3 ul li a i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/*  witr_Icon2_background_heading */
				$this->add_control(
					'witr_hidden_icon3',
					[
						'label' => esc_html__( 'Icon2 background Color', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'default' => 'heading',							
					]
				);					
				/* Icon2 background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_icon2s_background',
						'label' => esc_html__( 'Icon2 Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .banner-content.content-4 ul li a i, {{WRAPPER}} .banner-content.content-3 ul li a i',
					]
				);				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_icon2_box_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .banner-content.content-4 ul li a i, {{WRAPPER}} .banner-content.content-3 ul li a i',
					]
				);				
				/* blend mode style color */				
				$this->add_control(
					'witr_icon2_blend_mode',
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
							'{{WRAPPER}} .banner-content.content-4 ul li a i, {{WRAPPER}} .banner-content.content-3 ul li a i' => 'mix-blend-mode: {{VALUE}}',
						],
						'separator' => 'none',
					]
				);				
				/* icon2 margin */
				$this->add_responsive_control(
					'witr_icon2_margin',
					[
						'label' => esc_html__( 'Icon2 Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .banner-content.content-4 ul li a i, {{WRAPPER}} .banner-content.content-3 ul li a i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* icon2 padding */
				$this->add_responsive_control(
					'witr_icon2_padding',
					[
						'label' => esc_html__( 'Icon2 Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .banner-content.content-4 ul li a i, {{WRAPPER}} .banner-content.content-3 ul li a i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		
				

				$this->end_controls_tab();
				/*=== end icon2 normal style ====*/
			
					/*=== start icon2 hover style ====*/
					$this->start_controls_tab(
						'icon2_colors_hover',
						[
							'label' => esc_html__( 'Icon2 Hover', 'themex' ),
						]
					);
					/*  primary hover color */
					$this->add_control(
						'witr_hover_icon2_color',
						[
							'label' => esc_html__( ' Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .banner-content.content-3 ul li a i:hover, {{WRAPPER}} .banner-content.content-4 ul li a i:hover' => 'color: {{VALUE}}',
							],
						]
					);
					/*  witr_Icon2_Hover_background_heading */
					$this->add_control(
						'witr_hidden_icon2',
						[
							'label' => esc_html__( 'Icon2 Hover background Color', 'themex' ),
							'type' => Controls_Manager::HEADING,
							'default' => 'heading',							
						]
					);					
					
					/* hovrt Icon2 Hover background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_hovet_icon2',
							'label' => esc_html__( 'Icon2 Hover Background', 'themex' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .banner-content.content-3 ul li a i:hover, {{WRAPPER}} .banner-content.content-4 ul li a i:hover',
						]
					);					
					/* border_color */
					$this->add_control(
						'witr_iconb2_border_color',
						[
							'label' => esc_html__( 'Border Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .banner-content.content-3 ul li a i:hover, {{WRAPPER}} .banner-content.content-4 ul li a i:hover' => 'border-color: {{VALUE}}',
							],
						]
					);					

					$this->end_controls_tab();
					/*=== end icon2 hover style ====*/
					
			$this->end_controls_tabs();
			/*=== end icon2_tabs style ====*/

		$this->end_controls_section();

		/*=== end witr_icon2 style ====*/		
		
		

		/*=== start witr_image style ====*/
		$this->start_controls_section(
			'witr_style_image_option',
			[
				'label' => esc_html__( 'Banner Images Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
			
		
				/*  image width */
				$this->add_responsive_control(
					'witr_image_width',
					[
						'label' => esc_html__( 'width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'separator'=>'before',
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'%' => [
								'min' => 0,
								'max' => 500,
							],
							'px' => [
								'min' => 0,
								'max' => 1920,
							],	
						],						
						'default' => [
							'unit' => '%',
						],
						'tablet_default' => [
							'unit' => '%',
						],
						'mobile_default' => [
							'unit' => '%',
						],					
						'selectors' => [
							'{{WRAPPER}} .witr_deshboard img' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  image max width */
				$this->add_responsive_control(
					'witr_image_maxwidth',
					[
						'label' => esc_html__( 'Max width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'%' => [
								'min' => 0,
								'max' => 500,
							],
							'px' => [
								'min' => 0,
								'max' => 1920,
							],	
						],						
						'default' => [
							'unit' => '%',
						],
						'tablet_default' => [
							'unit' => '%',
						],
						'mobile_default' => [
							'unit' => '%',
						],					

						'selectors' => [
							'{{WRAPPER}} .witr_deshboard img' => 'max-width: {{SIZE}}{{UNIT}};',
						],
					]
				);
					/*  Rotate */
					$this->add_responsive_control(
						'witr_rotate_img',
						[
							'label' => esc_html__( 'Image Rotate', 'themex' ),
							'type' => Controls_Manager::SLIDER,
							'size_units' => [ 'deg' ],
							'default' => [
								'size' => 0,
								'unit' => 'deg',
							],
							'tablet_default' => [
								'unit' => 'deg',
							],
							'mobile_default' => [
								'unit' => 'deg',
							],
							'selectors' => [
								'{{WRAPPER}} .single_img_ani img,{{WRAPPER}} .witr_deshboard img' => 'transform: rotate({{SIZE}}{{UNIT}});',
							],							
						]
					);				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_img_bb',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .single_img_ani img,{{WRAPPER}} .witr_deshboard img',
					]
				);				
				
						/* witr_top */
						$this->add_responsive_control(
							'witr_top',
							[
								'label' => esc_html__( 'Top', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 1000,
									],
									'%' => [
										'min' => -500,
										'max' => 1000,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .witr_deshboard' => 'top: {{SIZE}}{{UNIT}};',
								],
							]
						);
						
						/* witr_left */
						$this->add_responsive_control(
							'witr_left',
							[
								'label' => esc_html__( 'Left', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 500,
									],
									'%' => [
										'min' => -500,
										'max' => 500,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .witr_deshboard' => 'left: {{SIZE}}{{UNIT}};',
								],
							]
						);
		
						/* witr_right */
						$this->add_responsive_control(
							'witr_right',
							[
								'label' => esc_html__( 'Right', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 500,
									],
									'%' => [
										'min' => -500,
										'max' => 500,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .witr_deshboard' => 'right: {{SIZE}}{{UNIT}};',
								],
							]
						);					
						/* witr_bottom */
						$this->add_responsive_control(
							'witr_bottom',
							[
								'label' => esc_html__( 'Bottom', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 500,
									],
									'%' => [
										'min' => -500,
										'max' => 500,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .witr_deshboard' => 'bottom: {{SIZE}}{{UNIT}};',
								],
							]
						);
			/* image margin */
			$this->add_responsive_control(
				'witr_image_margin',
				[
					'label' => esc_html__( ' Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'separator'=>'before',
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_deshboard' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* image padding */
			$this->add_responsive_control(
				'witr_image_padding',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'separator'=>'before',
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_deshboard' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_image style ====*/		
		
		
		
		


    } /* function end*/

    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();
		$target_btn = ! empty($witrshowdata['witr_button_link']['is_external']) ? ' target="_blank"' : '';
		$nofollow_btn = ! empty($witrshowdata['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';
		$txbd_image = '';	
		if( !empty( $witrshowdata['witr_banner_image']['url'] ) ){
			$txbd_image = Group_Control_Image_Size::get_attachment_image_html( $witrshowdata, 'txbd_image_size', 'witr_banner_image' );
		}		
		
		switch ( $witrshowdata['witr_style_banner'] ) {
		case '5':
		?>
		<section class="banner_area witr_banner_height">
			<div class="banner_area_inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-12">
						<div class="banner-content">
							<!-- title 1 -->
							<?php if(isset($witrshowdata['witr_banner_title1']) && ! empty($witrshowdata['witr_banner_title1'])){?>
								<h1><?php echo $witrshowdata['witr_banner_title1']; ?> </h1>		
							<?php } ?>
							<!-- title 2 -->
							<?php if(isset($witrshowdata['witr_banner_title2']) && ! empty($witrshowdata['witr_banner_title2'])){?>
							<h2><?php echo $witrshowdata['witr_banner_title2']; ?> </h2>		
							<?php } ?>
							<!-- title 3 -->
							<?php if(isset($witrshowdata['witr_banner_title3']) && ! empty($witrshowdata['witr_banner_title3'])){?>
							<h3><?php echo $witrshowdata['witr_banner_title3']; ?> </h3>		
							<?php } ?>							
							<!-- pragraph -->
							<?php if(isset($witrshowdata['witr_pragraph']) && ! empty($witrshowdata['witr_pragraph'])){?>				
							<p><?php echo $witrshowdata['witr_pragraph']; ?></p>
							<?php }?>

                        <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
							<input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="<?php echo esc_attr_e( 'Categories', 'themex' ) ?>" title="<?php echo esc_attr_e( 'Search for:', 'themex' ) ?>" />
                            <button type="submit" ><?php esc_html_e('Search','themex');?></button>
                        </form>

						</div>
					</div>
					 <div class="col-lg-6">
						<!-- image -->
						<?php if(isset($witrshowdata['witr_banner_image']['url']) && ! empty($witrshowdata['witr_banner_image']['url'])){?>
							<div class="witr_deshboard text-right <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_img_ani <?php } ?>">
								<?php echo $txbd_image; ?>
							</div>
						<?php } ?>
					</div>
				</div> <!-- row -->
			</div> <!-- container -->
			</div>
		</section>		
		
		<?php
		break;

		case '4':
		?>
		<section class="banner_area witr_banner_height">
			<div class="banner_area_inner">
			<div class="container">
				<div class="row witr_float">
					<div class="col-lg-6 col-md-12">
						<div class="banner-content content-4">
							<!-- title 1 -->
							<?php if(isset($witrshowdata['witr_banner_title1']) && ! empty($witrshowdata['witr_banner_title1'])){?>
								<h1><?php echo $witrshowdata['witr_banner_title1']; ?> </h1>		
							<?php } ?>
							<!-- title 2 -->
							<?php if(isset($witrshowdata['witr_banner_title2']) && ! empty($witrshowdata['witr_banner_title2'])){?>
							<h2><?php echo $witrshowdata['witr_banner_title2']; ?> </h2>		
							<?php } ?>
							<!-- title 3 -->
							<?php if(isset($witrshowdata['witr_banner_title3']) && ! empty($witrshowdata['witr_banner_title3'])){?>
							<h3><?php echo $witrshowdata['witr_banner_title3']; ?> </h3>		
							<?php } ?>							
							<!-- pragraph -->
							<?php if(isset($witrshowdata['witr_pragraph']) && ! empty($witrshowdata['witr_pragraph'])){?>				
							<p><?php echo $witrshowdata['witr_pragraph']; ?></p>
							<?php }?>

							<!-- social -->
							<ul class="">
							<!-- button -->
							<?php if(isset($witrshowdata['witr_button_link']['url']) && ! empty($witrshowdata['witr_button_link']['url'])){?>
								<a  class="butn" href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_banner_button'];?></a>			
							<?php }?>


							<!-- video button -->
							<?php if($witrshowdata['witr_yshow_button']=='yes' or $witrshowdata['witr_vmshow_button']='yes'  ){?>
							
							<?php if(isset($witrshowdata['witr_yvideo_link']['url']) && ! empty($witrshowdata['witr_yvideo_link']['url'])){?>
								<a class="witr_btns2 butn-2 video-popup video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="<?php echo $witrshowdata['witr_yvideo_link'] ['url']; ?>"><i class="fa fa-play"></i>
								<?php echo $witrshowdata['witr_video_button']; ?>
								</a>
							<?php } ?>
		
							<?php if(isset($witrshowdata['witr_vmvideo_link']['url']) && ! empty($witrshowdata['witr_vmvideo_link']['url'])){?>
								<a class="witr_btns2 butn-2 video-popup video-vemo-icon venobox vbox-item" data-vbtype="vimeo" data-autoplay="true" href="<?php echo $witrshowdata['witr_vmvideo_link'] ['url']; ?>"><i class="fa fa-play"></i><?php echo $witrshowdata['witr_video_button']; ?></a>
							<?php } ?>	

							<?php } ?>							
							
								<?php if(isset($witrshowdata['witr_banner_fb']['url']) && ! empty($witrshowdata['witr_banner_fb']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_fb']['url'];?>"><i class="icofont-facebook"></i></a></li>
								<?php } ?>
								<?php if(isset($witrshowdata['witr_banner_tw']['url']) && ! empty($witrshowdata['witr_banner_tw']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_tw']['url'];?>"><i class="icofont-twitter"></i></a></li>
								<?php } ?>
								<?php if(isset($witrshowdata['witr_banner_gp']['url']) && ! empty($witrshowdata['witr_banner_gp']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_gp']['url'];?>"><i class="icofont-google-plus"></i></a></li>
								<?php } ?>
								<?php if(isset($witrshowdata['witr_banner_lk']['url']) && ! empty($witrshowdata['witr_banner_lk']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_lk']['url'];?>"><i class="fab fa-linkedin"></i></a></li>
								<?php } ?>
								<?php if(isset($witrshowdata['witr_banner_pi']['url']) && ! empty($witrshowdata['witr_banner_pi']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_pi']['url'];?>"><i class="icofont-pinterest"></i></a></li>
								<?php } ?>
								<?php if(isset($witrshowdata['witr_banner_in']['url']) && ! empty($witrshowdata['witr_banner_in']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_in']['url'];?>"><i class="icofont-instagram"></i></a></li>
								<?php } ?>
								<?php if(isset($witrshowdata['witr_banner_us']['url']) && ! empty($witrshowdata['witr_banner_us']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_us']['url'];?>"><i class="fab fa-users"></i></a></li>
								<?php } ?>
								<?php if(isset($witrshowdata['witr_banner_tu']['url']) && ! empty($witrshowdata['witr_banner_tu']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_tu']['url'];?>"><i class="icofont-tumblr"></i></a></li>
								<?php } ?>
								<?php if(isset($witrshowdata['witr_banner_vi']['url']) && ! empty($witrshowdata['witr_banner_vi']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_vi']['url'];?>"><i class="icofont-vimeo"></i></a></li>
								<?php } ?>
								<?php if(isset($witrshowdata['witr_banner_yt']['url']) && ! empty($witrshowdata['witr_banner_yt']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_yt']['url'];?>"><i class="fab fa-youtube"></i></a></li>
								<?php } ?>
							</ul>						
						
						
						

						</div> <!-- banner content -->
					</div>
					<div class="col-lg-6">
							<!-- image -->
							<?php if(isset($witrshowdata['witr_banner_image']['url']) && ! empty($witrshowdata['witr_banner_image']['url'])){?>
								<div class="witr_deshboard <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_img_ani <?php } ?>">
									<?php echo $txbd_image; ?>
								</div>
							<?php } ?>					

					</div>
				</div> <!-- row -->
			</div> <!-- container -->
			</div> 
		</section>		
		
		<?php
		
		break;
		case '3':
		?>
    <section class="banner_area bg_cover witr_banner_height">
        <div class="banner_area_inner">
        <div class="container">
            <div class="row witr_float">
                <div class="col-lg-6">
                    <div class="banner-content content-3">
							<!-- title 1 -->
							<?php if(isset($witrshowdata['witr_banner_title1']) && ! empty($witrshowdata['witr_banner_title1'])){?>
								<h1><?php echo $witrshowdata['witr_banner_title1']; ?> </h1>		
							<?php } ?>
							<!-- title 2 -->
							<?php if(isset($witrshowdata['witr_banner_title2']) && ! empty($witrshowdata['witr_banner_title2'])){?>
							<h2><?php echo $witrshowdata['witr_banner_title2']; ?> </h2>		
							<?php } ?>
							<!-- title 3 -->
							<?php if(isset($witrshowdata['witr_banner_title3']) && ! empty($witrshowdata['witr_banner_title3'])){?>
							<h3><?php echo $witrshowdata['witr_banner_title3']; ?> </h3>		
							<?php } ?>							
							<!-- pragraph -->
							<?php if(isset($witrshowdata['witr_pragraph']) && ! empty($witrshowdata['witr_pragraph'])){?>				
							<p><?php echo $witrshowdata['witr_pragraph']; ?></p>
							<?php }?>
                        <div class="social-link">
							<!-- button -->
							<?php if(isset($witrshowdata['witr_button_link']['url']) && ! empty($witrshowdata['witr_button_link']['url'])){?>
								<a class="butn " href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_banner_button'];?></a>			
							<?php }?>	

							
							

							<!-- social -->
							<ul class="">
								<?php if(isset($witrshowdata['witr_banner_fb']['url']) && ! empty($witrshowdata['witr_banner_fb']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_fb']['url'];?>"><i class="icofont-facebook"></i></a></li>
								<?php } ?>
								<?php if(isset($witrshowdata['witr_banner_tw']['url']) && ! empty($witrshowdata['witr_banner_tw']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_tw']['url'];?>"><i class="icofont-twitter"></i></a></li>
								<?php } ?>
								<?php if(isset($witrshowdata['witr_banner_gp']['url']) && ! empty($witrshowdata['witr_banner_gp']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_gp']['url'];?>"><i class="icofont-google-plus"></i></a></li>
								<?php } ?>
								<?php if(isset($witrshowdata['witr_banner_lk']['url']) && ! empty($witrshowdata['witr_banner_lk']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_lk']['url'];?>"><i class="fab fa-linkedin"></i></a></li>
								<?php } ?>
								<?php if(isset($witrshowdata['witr_banner_pi']['url']) && ! empty($witrshowdata['witr_banner_pi']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_pi']['url'];?>"><i class="icofont-pinterest"></i></a></li>
								<?php } ?>
								<?php if(isset($witrshowdata['witr_banner_in']['url']) && ! empty($witrshowdata['witr_banner_in']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_in']['url'];?>"><i class="icofont-instagram"></i></a></li>
								<?php } ?>
								<?php if(isset($witrshowdata['witr_banner_us']['url']) && ! empty($witrshowdata['witr_banner_us']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_us']['url'];?>"><i class="fab fa-users"></i></a></li>
								<?php } ?>
								<?php if(isset($witrshowdata['witr_banner_tu']['url']) && ! empty($witrshowdata['witr_banner_tu']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_tu']['url'];?>"><i class="icofont-tumblr"></i></a></li>
								<?php } ?>
								<?php if(isset($witrshowdata['witr_banner_vi']['url']) && ! empty($witrshowdata['witr_banner_vi']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_vi']['url'];?>"><i class="icofont-vimeo"></i></a></li>
								<?php } ?>
								<?php if(isset($witrshowdata['witr_banner_yt']['url']) && ! empty($witrshowdata['witr_banner_yt']['url'])){?>
									<li><a href="<?php echo $witrshowdata['witr_banner_yt']['url'];?>"><i class="fab fa-youtube"></i></a></li>
								<?php } ?>
							</ul>
                        </div> <!-- social link -->
                    </div> <!-- banner content -->
                </div>
                <div class="col-lg-6">
					<!-- image -->
					<?php if(isset($witrshowdata['witr_banner_image']['url']) && ! empty($witrshowdata['witr_banner_image']['url'])){?>
						<div class="witr_deshboard <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_img_ani <?php } ?>">
							<?php echo $txbd_image; ?>
						</div>
					<?php } ?>						
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        </div>
    </section>		
		
		<?php
		
		break;
		case '2':
		?>
		<section class="banner_area witr_banner_height">
			<div class="banner_area_inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-12">
						<div class="banner-content">
							<!-- title 1 -->
							<?php if(isset($witrshowdata['witr_banner_title1']) && ! empty($witrshowdata['witr_banner_title1'])){?>
								<h1><?php echo $witrshowdata['witr_banner_title1']; ?> </h1>		
							<?php } ?>
							<!-- title 2 -->
							<?php if(isset($witrshowdata['witr_banner_title2']) && ! empty($witrshowdata['witr_banner_title2'])){?>
							<h2><?php echo $witrshowdata['witr_banner_title2']; ?> </h2>		
							<?php } ?>
							<!-- title 3 -->
							<?php if(isset($witrshowdata['witr_banner_title3']) && ! empty($witrshowdata['witr_banner_title3'])){?>
							<h3><?php echo $witrshowdata['witr_banner_title3']; ?> </h3>		
							<?php } ?>							
							<!-- pragraph -->
							<?php if(isset($witrshowdata['witr_pragraph']) && ! empty($witrshowdata['witr_pragraph'])){?>				
							<p><?php echo $witrshowdata['witr_pragraph']; ?></p>
							<?php }?>

						<!-- button -->
						<?php if(isset($witrshowdata['witr_button_link']['url']) && ! empty($witrshowdata['witr_button_link']['url'])){?>
							<a  class="butn" href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_banner_button'];?></a>
						<?php }?>
						<!-- video button -->
						<?php if($witrshowdata['witr_yshow_button']=='yes' or $witrshowdata['witr_vmshow_button']='yes'  ){?>
						
						<?php if(isset($witrshowdata['witr_yvideo_link']['url']) && ! empty($witrshowdata['witr_yvideo_link']['url'])){?>
							<a class="witr_btns2 butn-2 video-popup video-vemo-icon venobox vbox-item" data-vbtype="vimeo" data-autoplay="true" href="<?php echo $witrshowdata['witr_yvideo_link'] ['url']; ?>"><i class="fa fa-play"></i>
							<?php echo $witrshowdata['witr_video_button']; ?>
							</a>
						<?php } ?>	
						<?php if(isset($witrshowdata['witr_vmvideo_link']['url']) && ! empty($witrshowdata['witr_vmvideo_link']['url'])){?>
							<a class="witr_btns2 butn-2 video-popup video-vemo-icon venobox vbox-item" data-vbtype="vimeo" data-autoplay="true" href="<?php echo $witrshowdata['witr_vmvideo_link'] ['url']; ?>"><i class="fa fa-play"></i><?php echo $witrshowdata['witr_video_button']; ?></a>
						<?php } ?>
						
						<?php } ?>

						</div> <!-- banner content -->
					</div>
					<div class="col-lg-6">
							<!-- image -->
							<?php if(isset($witrshowdata['witr_banner_image']['url']) && ! empty($witrshowdata['witr_banner_image']['url'])){?>
								<div class="witr_deshboard <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_img_ani <?php } ?>">
									<?php echo $txbd_image; ?>
								</div>
							<?php } ?>					

					</div>
				</div> <!-- row -->
			</div> <!-- container -->
			</div> 
		</section>
		
		<?php


		
		break;		
		default:
		?>
	
		
		<section class="banner_area bg_cover witr_banner_height">
			<div class="banner_area_inner">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="banner-content text-center">
							<!-- title 1 -->
							<?php if(isset($witrshowdata['witr_banner_title1']) && ! empty($witrshowdata['witr_banner_title1'])){?>
								<h1><?php echo $witrshowdata['witr_banner_title1']; ?> </h1>		
							<?php } ?>
							<!-- title 2 -->
							<?php if(isset($witrshowdata['witr_banner_title2']) && ! empty($witrshowdata['witr_banner_title2'])){?>
							<h2><?php echo $witrshowdata['witr_banner_title2']; ?> </h2>		
							<?php } ?>
							<!-- title 3 -->
							<?php if(isset($witrshowdata['witr_banner_title3']) && ! empty($witrshowdata['witr_banner_title3'])){?>
							<h3><?php echo $witrshowdata['witr_banner_title3']; ?> </h3>		
							<?php } ?>							
							<!-- pragraph -->
							<?php if(isset($witrshowdata['witr_pragraph']) && ! empty($witrshowdata['witr_pragraph'])){?>				
							<p><?php echo $witrshowdata['witr_pragraph']; ?></p>
							<?php }?>
							<!-- button -->
							<?php if(isset($witrshowdata['witr_button_link']['url']) && ! empty($witrshowdata['witr_button_link']['url'])){?>
								<a  class="butn" href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_banner_button'];?></a>			
							<?php }?>
							<!-- image -->
							<?php if(isset($witrshowdata['witr_banner_image']['url']) && ! empty($witrshowdata['witr_banner_image']['url'])){?>
								<div class="witr_deshboard <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_img_ani <?php } ?>">
									<?php echo $txbd_image; ?>
								</div>
							<?php } ?>
						</div> <!-- banner content -->
					</div>
				</div> <!-- row -->
			</div> <!-- container -->
			</div>
		</section>
		
		
		<?php		
		break;
		
		
	} /* switch end*/ 

	
    } /*end function */




}