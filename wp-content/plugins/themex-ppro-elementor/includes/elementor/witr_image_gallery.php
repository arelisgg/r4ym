<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_image_gallery extends Widget_Base {

    public function get_name() {
        return 'witr_image_section';
    }
    
    public function get_title() {
        return esc_html__( ' Image Gallery', 'themex' );
    }

    public function get_icon() {
        return 'themex_icon eicon-gallery-grid';
    }
    public function get_style_depends() {
        return [ 'wimagegallery' ];
    }	
	public function get_script_depends() {
        return [ ' ' ];
    }	
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {
		
		/* === witr_controls_section start === */
        $this->start_controls_section(
            'witr_image_option',
            [
                'label' => esc_html__( 'Image Gallery Options', 'themex' ),
				'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
		
		
			/*  witr_style_image */
			$this->add_control(
				'witr_style_image',
				[
					'label' => esc_html__( 'Gallery Style', 'themex' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'1' => esc_html__( 'Bottom Gallery Thumbs', 'themex' ),
						'2' => esc_html__( 'Top Gallery Thumbs', 'themex' ),
						'3' => esc_html__( 'Left Gallery Thumbs', 'themex' ),
						'4' => esc_html__( 'Right Gallery Thumbs', 'themex' ),
					],
					'default' => '1',
				]
			);
			/* witr_unicid_top */	
			$this->add_control(
				'witr_unicid_top',
				[
					'label' => esc_html__( 'Gallery Uniqe ID', 'themex' ),
					'type' => Controls_Manager::TEXT,
					'separator' => 'before',
					'description' => esc_html__( 'If you same page multiple image gallery used must be unique id use.., ex- gallery.', 'themex' ),
					'default' => 'gallery',
					'placeholder' => esc_attr__( 'Type your ID here', 'themex' ),							
				]
			);
			/* witr_unicid_smale */	
			$this->add_control(
				'witr_unicid_smale',
				[
					'label' => esc_html__( 'Thumbs Uniqe ID', 'themex' ),
					'type' => Controls_Manager::TEXT,
					'description' => esc_html__( 'If you same page multiple image gallery used must be unique id use., ex- thumbs.', 'themex' ),
					'default' => 'thumbs',
					'placeholder' => esc_attr__( 'Type your ID here', 'themex' ),							
				]
			);
			
			$repeater = new Repeater();	
				/* show image witr_imager_image */	
				$repeater->add_control(
					'witr_imager_image',
					[
						'label' => esc_html__( 'Choose Image', 'themex' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],							
					]
				);
				/* txbd_image_size */
				$repeater->add_group_control(
					Group_Control_Image_Size::get_type(),
					[
						'name' => 'txbd_image_size',
						'default' => 'large',
						'separator' => 'none',
					]
				);					
				/* witr_imager_title */	
					$repeater->add_control(
						'witr_imager_title',
						[
							'label' => esc_html__( 'Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'separator'=>'before',
							'description' => esc_html__( ' use the title text from field', 'themex' ),
							'placeholder' => esc_attr__( 'Type your image title here', 'themex' ),						
						]
					);
				/* witr_title_link */	
				$repeater->add_control(
					'witr_title_link',
					[
						'label' => esc_html__( 'Title Link', 'themex' ),
						'type' => Controls_Manager::URL,
						'description' =>esc_html__('Insert Title link here.','themex'),
						'placeholder' => esc_attr__( 'https://your-link.com', 'themex' ),
						'show_external' => true,
						
					]
				);							
					/* witr_list_imager */
					$this->add_control(
						'witr_list_imager',
						[
							'label' => esc_html__( 'Gallery Image List', 'themex' ),
							'type' => Controls_Manager::REPEATER,
							'separator'=>'before',
							'fields' => $repeater->get_controls(),

							
						]
					);			
        $this->end_controls_section();
		/* === witr_controls_section end === */			

			
			/* === witr_Carousel start === */
			$this->start_controls_section(
				'witr_field_display_image',
				[
					'label' => esc_html__( ' Additional Option', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);

				/* witr_slides_to_show */ 		
				$this->add_control(
					'witr_slides_to_show',
					[
						'label' => esc_html__( 'Slides to Show', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1,
						'max' => 100,
						'step' => 1,
						'default' => 3,
						'condition' => [
							'witr_style_image' => ['1','2'],
						],						
					]
				);				
				/* witr_spacebetween */ 		
				$this->add_control(
					'witr_spacebetween',
					[
						'label' => esc_html__( 'Space Between', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'default' => 10,						
					]
				);				
				/*  witr_delay */			
				$this->add_control(
					'witr_delay',
					[
						'label' => esc_html__( 'AutoplaySpeed OR delay', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'description' => esc_html__( 'Type your autoplaySpeed Number here, ex-1000ms=1s.', 'themex' ),
						'default' => 6000,
					]
				);
				/*  witr_c_speed */			
				$this->add_control(
					'witr_c_speed',
					[
						'label' => esc_html__( 'Speed', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'description' => esc_html__( 'Type your Speed Number here, ex-1000ms=1s.', 'themex' ),
						'default' => 2000,
					]
				);
				/* witr_loop */
				$this->add_control(
					'witr_loop',
					[
						'label' => esc_html__( 'Loop', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'description' => esc_html__( 'When set any video, select false.', 'themex' ),
						'default' => 'true',
						'options' => [
							'true' => esc_html__( 'True', 'themex' ),
							'false' => esc_html__( 'False', 'themex' ),
						],
					]
				);
				/* witr_dir */
				$this->add_control(
					'witr_dir',
					[
						'label' => esc_html__( 'direction', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'ltr',
						'options' => [
							'ltr' => esc_html__( 'Left', 'themex' ),
							'rtl' => esc_html__( 'Right', 'themex' ),
						],
					]
				);				
				/* witr_grabcursor */
				$this->add_control(
					'witr_grabcursor',
					[
						'label' => esc_html__( 'Grab Cursor', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'false',
						'options' => [
							'true' => esc_html__( 'True', 'themex' ),
							'false' => esc_html__( 'False', 'themex' ),
						],
					]
				);
				/* witr_freemode */
				$this->add_control(
					'witr_freemode',
					[
						'label' => esc_html__( 'Free Mode', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'false',
						'options' => [
							'true' => esc_html__( 'True', 'themex' ),
							'false' => esc_html__( 'False', 'themex' ),
						],
					]
				);					
				/* witr_mousewheel */
				$this->add_control(
					'witr_mousewheel',
					[
						'label' => esc_html__( 'Mouse Wheel', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'false',
						'options' => [
							'true' => esc_html__( 'True', 'themex' ),
							'false' => esc_html__( 'False', 'themex' ),
						],
					]
				);					
				/* witr_keyboard */
				$this->add_control(
					'witr_keyboard',
					[
						'label' => esc_html__( 'Keyboard', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'false',
						'options' => [
							'true' => esc_html__( 'True', 'themex' ),
							'false' => esc_html__( 'False', 'themex' ),
						],
					]
				);					
				/* witr_progressbar */
				$this->add_control(
					'witr_progressbar',
					[
						'label' => esc_html__( 'Progress Bar and Dots', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'false',
						'options' => [
							'type' => esc_html__( 'Progress Bar', 'themex' ),
							'false' => esc_html__( 'Dots', 'themex' ),
						],
					]
				);
				/* Button background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_bar_background',
						'label' => esc_html__( 'button Background', 'themex' ),
						'separator' => 'before',
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .gallery_image_area .swiper-pagination-progressbar .swiper-pagination-progressbar-fill',
						'condition' => [
							'witr_progressbar' =>['type'],
						],						
					]
				);				
				/*  box height */
				$this->add_responsive_control(
					'witr_bar_height',
					[
						'label' => esc_html__( 'Bar Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 1000,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .gallery_image_area .swiper-pagination-progressbar .swiper-pagination-progressbar-fill,{{WRAPPER}} .gallery_image_area .swiper-container-horizontal>.swiper-pagination-progressbar' => 'height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'witr_progressbar' =>['type'],
						],							
					]
				);
				/*  witr_dot_heding */
				$this->add_responsive_control(
					'witr_dot_heding',
					[
						'label' => esc_html__( 'Look at the style options for dot color.', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator'=>'before',
						'condition' => [
							'witr_progressbar' =>['false'],
						],							
					]
				);				
				
				/* witr_scrollbar */
				$this->add_control(
					'witr_scrollbar',
					[
						'label' => esc_html__( 'Scroll Bar', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'scrollbar_false',
						'options' => [
							'swiper-scrollbar' => esc_html__( 'True', 'themex' ),
							'scrollbar_false' => esc_html__( 'False', 'themex' ),
						],
					]
				);
				/* Button background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_scrol_background',
						'label' => esc_html__( 'button Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .gallery_image_area .swiper-scrollbar-drag',
						'condition' => [
							'witr_scrollbar' =>['swiper-scrollbar'],
						],						
					]
				);				
				/*  box height */
				$this->add_responsive_control(
					'witr_scrol_height',
					[
						'label' => esc_html__( 'Bar Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 1000,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .gallery_image_area .swiper-scrollbar-drag,{{WRAPPER}} .gallery_image_area .swiper-container-horizontal>.swiper-scrollbar' => 'height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'witr_scrollbar' =>['swiper-scrollbar'],
						],							
					]
				);				
				/* witr_arrow */
				$this->add_control(
					'witr_arrow',
					[
						'label' => esc_html__( 'Arrow', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'buttonf',
						'options' => [
							'button' => esc_html__( 'True', 'themex' ),
							'buttonf' => esc_html__( 'False', 'themex' ),
						],
					]
				);									

				
												
			
			$this->end_controls_section();
			/* === end witr_image ===  */
		
		
		
		
	   /*===========================================================================================
										START TO STYLE
		=============================================================================================*/		
		
				
		
		/*=== start witr_image style ====*/
		$this->start_controls_section(
			'witr_style_image_option',
			[
				'label' => esc_html__( 'Images option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
				/* background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'image_background',
						'label' => esc_html__( 'Background', 'themex' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => '{{WRAPPER}} .witr_down_gallery::before,{{WRAPPER}} .single_gallery_thumb::before ',						
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
							'{{WRAPPER}} .witr_down_gallery::before,{{WRAPPER}} .single_gallery_thumb::before' => 'opacity: {{SIZE}};',
						],

					]
				);		
			
						/*  witr_gallery_height */
						$this->add_responsive_control(
							'witr_gallery_height',
							[
								'label' => esc_html__( 'Gallery Height', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'separator' => 'before',
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 15000,
									],
									'%' => [
										'min' => 0,
										'max' => 200,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .size_gallery_height' => 'height: {{SIZE}}{{UNIT}};',
								],
								'condition' => [
									'witr_style_image' => ['3','4'],
								],								
							]
						);			
						/* witr_gallery_top */
						$this->add_responsive_control(
							'witr_gallery_top',
							[
								'label' => esc_html__( 'Gallery Top', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'separator' => 'before',
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 500,
									],
									'%' => [
										'min' => 0,
										'max' => 100,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .size_gallery_height' => 'top: {{SIZE}}{{UNIT}};',
								],
								'condition' => [
									'witr_style_image' => ['3','4'],
								],								
							]
						);			
						/* witr_gallery_left */
						$this->add_responsive_control(
							'witr_gallery_left',
							[
								'label' => esc_html__( 'Gallery Left', 'themex' ),
								'description' => esc_html__( 'Recommended Left Size 60px', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'separator' => 'before',
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 500,
									],
									'%' => [
										'min' => -100,
										'max' => 100,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .gallery_left .size_gallery_height' => 'left: {{SIZE}}{{UNIT}};',
								],
								'condition' => [
									'witr_style_image' => ['3'],
								],								
							]
						);			
						/* witr_gallery_right */
						$this->add_responsive_control(
							'witr_gallery_right',
							[
								'label' => esc_html__( 'Gallery Right', 'themex' ),
								'description' => esc_html__( 'Recommended Right Size 60px', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'separator' => 'before',
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 500,
									],
									'%' => [
										'min' => -100,
										'max' => 100,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .gallery_right .size_gallery_height' => 'right: {{SIZE}}{{UNIT}};',
								],
								'condition' => [
									'witr_style_image' => ['4'],
								],								
							]
						);			
			
		 
		 $this->end_controls_section();
		/*=== end  witr_image style ====*/			
		
		/*=== start witr_title style ====*/

		$this->start_controls_section(
			'witr_style_option',
			[
				'label' => esc_html__( ' Title Color option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

				/*=== start Navigation_tabs style ====*/
				$this->start_controls_tabs( 'title_colors' );
				
					/*=== start Navigation_normal style ====*/
					$this->start_controls_tab(
						'witr_title_colors_normal',
						[
							'label' => esc_html__( 'Normal', 'themex' ),
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
									'default' => Global_Colors::COLOR_PRIMARY,
								],					
								'selectors' => [
									'{{WRAPPER}} .witr_gallery_title h2,{{WRAPPER}} .witr_gallery_title h2 a' => 'color: {{VALUE}}',
								],
							]
						);
						/*  background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_title_background',
								'label' => esc_html__( ' Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .witr_gallery_title h2,{{WRAPPER}} .witr_gallery_title h2 a',
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
								'selector' => '{{WRAPPER}} .witr_gallery_title h2,{{WRAPPER}} .witr_gallery_title h2 a',
							]
						);		
							
						/* title margin */
						$this->add_responsive_control(
							'witr_title_margin',
							[
								'label' => esc_html__( ' Margin', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .witr_gallery_title h2,{{WRAPPER}} .witr_gallery_title h2 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/* title padding */
						$this->add_responsive_control(
							'witr_title_padding',
							[
								'label' => esc_html__( ' Padding', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .witr_gallery_title h2,{{WRAPPER}} .witr_gallery_title h2 a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/* witr_title_bottom */
						$this->add_responsive_control(
							'witr_title_bottom',
							[
								'label' => esc_html__( ' Bottom', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'separator' => 'before',
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 500,
										'max' => 1000,
									],
									'%' => [
										'min' => 0,
										'max' => 100,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .witr_gallery_title' => 'bottom: {{SIZE}}{{UNIT}};',
								],								
							]
						);						
						$this->end_controls_tab();
						/*=== end Arrow normal style ====*/
		
				/*=== start witr_title_colors_hover style ====*/
				$this->start_controls_tab(
					'witr_title_colors_hover',
					[
						'label' => esc_html__( ' Hover', 'themex' ),
					]
				);			
					/* hover color */
					$this->add_control(
						'witr_title_hover_color',
						[
							'label' => esc_html__( 'Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,					
							'selectors' => [
								'{{WRAPPER}} .witr_gallery_title h2:hover,{{WRAPPER}} .witr_gallery_title h2 a:hover' => 'color: {{VALUE}}',
							],
						]
					);			
						/*  background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_titleh_background',
								'label' => esc_html__( ' Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .witr_gallery_title h2:hover,{{WRAPPER}} .witr_gallery_title h2 a:hover',
							]
						);			
			
			
				$this->end_controls_tab();
			$this->end_controls_tabs();	
		 
		 $this->end_controls_section();
		/*=== end  witr_title style ====*/		
		

		

			/*=== start witr Arrow style ====*/
			$this->start_controls_section(
				'witr_style_option_arrow',
				[
					'label' => esc_html__( ' Arrow Options', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_arrow' => 'button',
					],					
				]
			);		 

		
				/*=== start Navigation_tabs style ====*/
				$this->start_controls_tabs( 'arrow_colors' );
				
					/*=== start Navigation_normal style ====*/
					$this->start_controls_tab(
						'witr_arrow_colors_normal',
						[
							'label' => esc_html__( 'Arrow', 'themex' ),
						]
					);
						
					
						/*  Arrow font size */
						$this->add_responsive_control(
							'witr_arrow_size',
							[
								'label' => esc_html__( ' Size', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', 'em' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 500,
									],
									'em' => [
										'min' => 0,
										'max' => 500,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .swiper-button-next:after,{{WRAPPER}} .swiper-button-prev:after' => 'font-size: {{SIZE}}{{UNIT}};',
								],
							]
						);					
						/* Arrow color */
						$this->add_control(
							'witr_arrow_color',
							[
								'label' => esc_html__( ' Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .swiper-button-prev,{{WRAPPER}} .swiper-button-next' => 'color: {{VALUE}}',
								],
							]
						);				
	
						/* Arrow background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_arrow_background',
								'label' => esc_html__( 'Arrow Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .swiper-button-prev,{{WRAPPER}} .swiper-button-next',
							]
						);
						/* witr_arrow_padding */
						$this->add_responsive_control(
							'witr_arrow_padding',
							[
								'label' => esc_html__( 'Padding', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .swiper-button-prev,{{WRAPPER}} .swiper-button-next' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);						
						/* witr_arrowborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_arrowborder_style1',
								'label' => esc_html__( ' Border', 'themex' ),
								'selector' => '{{WRAPPER}} .swiper-button-prev,{{WRAPPER}} .swiper-button-next',
							]
						);
						/* border_radius */
						$this->add_control(
							'witr_border_arrow_radius1',
							[
								'label' => esc_html__( 'Border Radius', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .swiper-button-prev,{{WRAPPER}} .swiper-button-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/*  arrow Opacity */
						$this->add_responsive_control(
							'witr_arrow_opacity',
							[
								'label' => esc_html__( ' Opacity', 'themex' ),
								'type' => Controls_Manager::TEXT,
								'selectors' => [
									'{{WRAPPER}} .swiper-button-prev,{{WRAPPER}} .swiper-button-next' => 'opacity: {{SIZE}}{{UNIT}};',
								],
							]
						);					
					

					$this->end_controls_tab();
					/*=== end Arrow normal style ====*/
				
						/*=== start Arrow hover style ====*/
						$this->start_controls_tab(
							'witr_arrow_colors_hover',
							[
								'label' => esc_html__( 'Arrow Hover', 'themex' ),
							]
						);
						/* Arrow_hover_color */
						$this->add_control(
							'witr_arrow_hover_color1',
							[
								'label' => esc_html__( 'Arrow Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								'selectors' => [
									'{{WRAPPER}} .swiper-button-next:after,{{WRAPPER}} .swiper-button-prev:after' => 'color: {{VALUE}}',
								],
							]
						);					
							
						/* Arrow Hover background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_arrow_hover_background1',
								'label' => esc_html__( 'Arrow Hover Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .swiper-button-prev:hover,{{WRAPPER}} .swiper-button-next:hover',
							]
						);
						/* witr_hoverborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_hoverborder_style11',
								'label' => esc_html__( 'Arrow Hover Border', 'themex' ),
								'selector' => '{{WRAPPER}} .swiper-button-prev:hover,{{WRAPPER}} .swiper-button-next:hover',
							]
						);					
						/* witr_arrow_padding */
						$this->add_responsive_control(
							'witr_arrowh_padding',
							[
								'label' => esc_html__( 'Padding', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .swiper-button-prev:hover,{{WRAPPER}} .swiper-button-next:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);						
						
						$this->end_controls_tab();
						/*=== end Arrow hover style ====*/
						
				$this->end_controls_tabs();
				/*=== end Arrow tabs style ====*/


			 $this->end_controls_section();
			/*=== end  witr Arrow style ====*/
			


			/*=== start witr Dots style ====*/

			$this->start_controls_section(
				'witr_style_option_dots',
				[
					'label' => esc_html__( ' Dots Options', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_progressbar' => 'false',
					],					
				]
			);
				/*=== start Dots_tabs style ====*/
				$this->start_controls_tabs( 'dots_colors' );

					/*=== start Navigation_normal style ====*/
					$this->start_controls_tab(
						'witr_dots_colors_normal',
						[
							'label' => esc_html__( 'Dots', 'themex' ),
						]
					);

						/*  Dots width */
						$this->add_responsive_control(
							'witr_dots_width1',
							[
								'label' => esc_html__( 'width', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'separator'=>'before',
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 200,
									],
									'%' => [
										'min' => 0,
										'max' => 200,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .gallery_image_area .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};',
								],
							]
						);
						/*  Dots height */
						$this->add_responsive_control(
							'witr_dots_height1',
							[
								'label' => esc_html__( 'Height', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 200,
									],
									'%' => [
										'min' => 0,
										'max' => 200,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .gallery_image_area .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
								],
							]
						);											
						/* Dots background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_dots_background1',
								'label' => esc_html__( 'Dots Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .gallery_image_area .swiper-pagination-bullet',
							]
						);
						$this->add_control(
							'witr_opacity',
							[
								'label' => __( 'Opacity', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'range' => [
									'px' => [
										'max' => 1,
										'min' => 0.2,
										'step' => 0.01,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .gallery_image_area .swiper-pagination-bullet' => 'opacity: {{SIZE}};',
								],
							]
						);						
						/* witr_dotsborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_dotsborder_style1',
								'label' => esc_html__( 'Dots Border', 'themex' ),
								'selector' => '{{WRAPPER}} .gallery_image_area .swiper-pagination-bullet',
							]
						);
						/* border_radius */
						$this->add_control(
							'witr_border_dots_radius1',
							[
								'label' => esc_html__( 'Border Radius', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .gallery_image_area .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						
						/* witr_bottom_dots1 */
						$this->add_responsive_control(
							'witr_bottom_dots1',
							[
								'label' => esc_html__( 'Bottom', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 1000,
									],
									'%' => [
										'min' => 0,
										'max' => 1000,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .swiper-container-horizontal>.swiper-pagination-bullets' => 'bottom: {{SIZE}}{{UNIT}};',
								],
							]
						);
						/* dots margin */
						$this->add_responsive_control(
							'witr_dots_margin1',
							[
								'label' => esc_html__( 'Margin', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'allowed_dimensions' => 'horizontal',
								'placeholder' => [
									'top' => 'auto',
									'right' => '',
									'bottom' => 'auto',
									'left' => '',
								],
								'selectors' => [
									'{{WRAPPER}} .gallery_image_area .swiper-pagination-bullet' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
								],
							]
						);					
					

					$this->end_controls_tab();
					/*=== end Dots normal style ====*/
				
						/*=== start Dots hover style ====*/
						$this->start_controls_tab(
							'witr_dots_colors_hover',
							[
								'label' => esc_html__( ' Hover', 'themex' ),
							]
						);
							
						/* Dots Hover background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_dots_hover_background1',
								'label' => esc_html__( 'Dots Hover Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .gallery_image_area .swiper-pagination-bullet:hover',
							]
						);
						/* witr_hoverborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_hoverborder_style1',
								'label' => esc_html__( 'Dots Hover Border', 'themex' ),
								'selector' => '{{WRAPPER}} .gallery_image_area .swiper-pagination-bullet:hover',
							]
						);					
						
						
						$this->end_controls_tab();
						/*=== end Dots hover style ====*/
						
						/*=== start Dots hover style ====*/
						$this->start_controls_tab(
							'witr_dots_active_hover',
							[
								'label' => esc_html__( 'Active', 'themex' ),
							]
						);

						/* Active Dots background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_acdots_background1',
								'label' => esc_html__( 'Active Dots Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .gallery_image_area .swiper-pagination-bullet-active ',
							]
						);						
						$this->add_control(
							'witr_opacity_ac',
							[
								'label' => __( 'Opacity', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'range' => [
									'px' => [
										'max' => 1,
										'min' => 0,
										'step' => 0.01,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .gallery_image_area .swiper-pagination-bullet-active' => 'opacity: {{SIZE}};',
								],
							]
						);						
						
						$this->end_controls_tab();
						/*=== end Dots hover style ====*/						
				$this->end_controls_tabs();
				/*=== end Dots tabs style ====*/

			 $this->end_controls_section();
			/*=== end  witr Dots style ====*/		
		
		
		
		
		
		
		
		

    } /* function end */

    protected function render( $instance = [] ) {

        $witrshowdata = $this->get_settings_for_display();

		if(! empty($witrshowdata['witr_slides_to_show'])){
			$slidestoShow=$witrshowdata['witr_slides_to_show'];
		}
		if(! empty($witrshowdata['witr_spacebetween'])){
			$spacebetween=$witrshowdata['witr_spacebetween'];
		}
		
		if(! empty($witrshowdata['witr_grabcursor'])){
			$grabcursor=$witrshowdata['witr_grabcursor'];
		}		
		if(! empty($witrshowdata['witr_delay'])){
			$delay=$witrshowdata['witr_delay'];
		}		
		if(! empty($witrshowdata['witr_c_speed'])){
			$speed=$witrshowdata['witr_c_speed'];
		}
		if(! empty($witrshowdata['witr_freemode'])){
			$freemode=$witrshowdata['witr_freemode'];
		}
		if(! empty($witrshowdata['witr_mousewheel'])){
			$mousewheel=$witrshowdata['witr_mousewheel'];
		}
		if(! empty($witrshowdata['witr_keyboard'])){
			$keyboard=$witrshowdata['witr_keyboard'];
		}
		if(! empty($witrshowdata['witr_loop'])){
			$loop=$witrshowdata['witr_loop'];
		}
		if(! empty($witrshowdata['witr_progressbar'])){
			$progressbar=$witrshowdata['witr_progressbar'];
		}
		if(! empty($witrshowdata['witr_scrollbar'])){
			$scrollbar=$witrshowdata['witr_scrollbar'];
		}
		if(! empty($witrshowdata['witr_arrow'])){
			$arrow=$witrshowdata['witr_arrow'];
		}
		if(! empty($witrshowdata['witr_dir'])){
			$rtl=$witrshowdata['witr_dir'];
		}
		if(! empty($witrshowdata['witr_unicid_top'])){
			$unic_id_top=$witrshowdata['witr_unicid_top'];	
		}
		if(! empty($witrshowdata['witr_unicid_smale'])){
			$unic_id_smale=$witrshowdata['witr_unicid_smale'];	
		}
		

		switch( $witrshowdata['witr_style_image']){
			case '4':
			?>			
			<!-- gallery_right -->
			<div class="gallery_image_area gallery_right">
				<div class="row ">
					<div class="col-lg-10 ">
						<div class="swiper-container gallery_top_<?php echo $unic_id_top;?>"dir="<?php echo $rtl;?>">
							<div class="swiper-wrapper" >
							<?php if( ! empty($witrshowdata['witr_list_imager'])){
								foreach($witrshowdata['witr_list_imager'] as $imaget_gallery){
								$target = ! empty($imaget_gallery['witr_title_link']['is_external']) ? ' target="_blank"' : '';
								$nofollow = ! empty($imaget_gallery['witr_title_link']['nofollow']) ? ' rel="nofollow"' : '';
								$txbd_image = ! empty($imaget_gallery['witr_imager_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $imaget_gallery, 'txbd_image_size', 'witr_imager_image' ) : '';								
								?>
									<div class="swiper-slide  ">
										<div class="single_gallery_thumb ">	
											<?php echo $txbd_image;
											if( ! empty($imaget_gallery['witr_imager_title'])){?>
												<div class="witr_gallery_title">
													<?php if($imaget_gallery['witr_title_link'] ['url']){?> 
														<h2><a href="<?php echo $imaget_gallery['witr_title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $imaget_gallery['witr_imager_title']; ?></a></h2>
													<?php }else{ ?>
													<h2><?php echo $imaget_gallery['witr_imager_title']; ?> </h2>
													<?php }	?>										
												</div>	
											<?php } ?>																								 
										</div>
									</div>
								<?php } } ?>					
							</div>
							<!-- Add Pagination -->
							<div class="swiper-scrollbar"></div>
							<div class="swiper-pagination"></div>
							<div class="swiper-<?php echo $arrow;?>-next "></div>
							<div class="swiper-<?php echo $arrow;?>-prev"></div>					
						</div>
					</div>				
					<div class="col-lg-2 ">
						<div class="swiper-container size_gallery_height twr_gallery_thumbs_<?php echo $unic_id_smale;?> "dir="<?php echo $rtl;?>">
							<div class="swiper-wrapper" >
								<?php if( ! empty($witrshowdata['witr_list_imager'])){
									foreach($witrshowdata['witr_list_imager'] as $imaget_gallery){
									$txbd_image = ! empty($imaget_gallery['witr_imager_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $imaget_gallery, 'txbd_image_size', 'witr_imager_image' ) : '';	
									?>									
										<div class="swiper-slide witr_down_gallery margin_top_0">
											<?php echo $txbd_image; ?>	
										</div>
									<?php } ?>
								<?php } ?>
							</div>					
						</div>			
					</div>			

				</div>
			</div>

			<script type='text/javascript'>
				jQuery(function($){

					var galleryThumbs = new Swiper('.twr_gallery_thumbs_<?php echo $unic_id_smale;?>', {

						<?php if( ! empty($witrshowdata['witr_spacebetween'])){?>
							spaceBetween: <?php echo $spacebetween;?>,
						<?php } ?>
					  loop: false,
					  <?php echo ( is_rtl() ) ? "rtl: true," : ''; ?>
					  freeMode: <?php echo $freemode;?>,
					  loopedSlides: 2, /*looped slides should be the same*/
					  watchSlidesVisibility: true,
					  watchSlidesProgress: true,
						grabCursor: <?php echo $grabcursor;?>,
						speed: <?php echo $speed;?>,
						direction: 'vertical',
						mousewheel: <?php echo $mousewheel;?>,
						keyboard: <?php echo $keyboard;?>,
						autoplay: {
							delay: <?php echo $delay;?>,								  
							disableOnInteraction: false,
						},						
					});
					var galleryTop = new Swiper('.gallery_top_<?php echo $unic_id_top;?> ', {
					  loopedSlides: 2, /*looped slides should be the same*/
						grabCursor: <?php echo $grabcursor;?>,
						speed: <?php echo $speed;?>,
						freeMode: <?php echo $freemode;?>,
						mousewheel: <?php echo $mousewheel;?>,
						keyboard: <?php echo $keyboard;?>,
						loop: <?php echo $loop;?>,
						<?php echo ( is_rtl() ) ? "rtl: true," : ''; ?>
						autoplay: {
							delay: <?php echo $delay;?>,								  
							disableOnInteraction: false,
						},
						  pagination: {
							el: '.swiper-pagination',
							clickable: true,
							<?php echo $progressbar;?>: 'progressbar',
						  },
						  navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev',
						  },
						  scrollbar: {
							el: '.<?php echo $scrollbar;?>',
							hide: true,
						  },
					  thumbs: {
						swiper: galleryThumbs,
					  },
					});				

				});						
				
			</script>			
			
			<?php			
				
			break;
			
			case '3':
			?>			
			<!-- gallery_left -->
			<div class="gallery_image_area gallery_left">
				<div class="row ">
					<div class="col-xl-2 col-lg-2 col-md-2 col-2">
						<div class="swiper-container size_gallery_height twr_gallery_thumbs_<?php echo $unic_id_smale;?> "dir="<?php echo $rtl;?>">
							<div class="swiper-wrapper" >
								<?php if( ! empty($witrshowdata['witr_list_imager'])){
									foreach($witrshowdata['witr_list_imager'] as $imaget_gallery){
									$txbd_image = ! empty($imaget_gallery['witr_imager_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $imaget_gallery, 'txbd_image_size', 'witr_imager_image' ) : '';	
										?>								
										<div class="swiper-slide witr_down_gallery margin_top_0">
											<?php echo $txbd_image; ?>	
										</div>
									<?php } ?>
								<?php } ?>
							</div>					
						</div>			
					</div>			
					<div class="col-xl-10 col-lg-10 col-md-10 col-10">
						<div class="swiper-container gallery_top_<?php echo $unic_id_top;?>"dir="<?php echo $rtl;?>">
							<div class="swiper-wrapper" >
							<?php if( ! empty($witrshowdata['witr_list_imager'])){
								foreach($witrshowdata['witr_list_imager'] as $imaget_gallery){
								$target = ! empty($imaget_gallery['witr_title_link']['is_external']) ? ' target="_blank"' : '';
								$nofollow = ! empty($imaget_gallery['witr_title_link']['nofollow']) ? ' rel="nofollow"' : '';
								$txbd_image = ! empty($imaget_gallery['witr_imager_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $imaget_gallery, 'txbd_image_size', 'witr_imager_image' ) : '';
								?>								
									<div class="swiper-slide  ">
										<div class="single_gallery_thumb ">	
											<?php echo $txbd_image;
											if( ! empty($imaget_gallery['witr_imager_title'])){?>
												<div class="witr_gallery_title">
													<?php if($imaget_gallery['witr_title_link'] ['url']){?> 
														<h2><a href="<?php echo $imaget_gallery['witr_title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $imaget_gallery['witr_imager_title']; ?></a></h2>
													<?php }else{ ?>
													<h2><?php echo $imaget_gallery['witr_imager_title']; ?> </h2>
													<?php }	?>										
												</div>	
											<?php } ?>																								 
										</div>
									</div>
								<?php } } ?>					


							</div>
							<!-- Add Pagination -->
							<div class="swiper-scrollbar"></div>
							<div class="swiper-pagination"></div>
							<div class="swiper-<?php echo $arrow;?>-next "></div>
							<div class="swiper-<?php echo $arrow;?>-prev"></div>					
						</div>
					</div>
				</div>
			</div>

			<script type='text/javascript'>
				jQuery(function($){

					var galleryThumbs = new Swiper('.twr_gallery_thumbs_<?php echo $unic_id_smale;?>', {

						<?php if( ! empty($witrshowdata['witr_spacebetween'])){?>
							spaceBetween: <?php echo $spacebetween;?>,
						<?php } ?>
					  loop: false,
					  <?php echo ( is_rtl() ) ? "rtl: true," : ''; ?>
					  freeMode: <?php echo $freemode;?>,
					  loopedSlides: 2, /*looped slides should be the same*/
					  watchSlidesVisibility: true,
					  watchSlidesProgress: true,
						grabCursor: <?php echo $grabcursor;?>,
						speed: <?php echo $speed;?>,
						direction: 'vertical',
						mousewheel: <?php echo $mousewheel;?>,
						keyboard: <?php echo $keyboard;?>,
						autoplay: {
							delay: <?php echo $delay;?>,								  
							disableOnInteraction: false,
						},						
					});
					var galleryTop = new Swiper('.gallery_top_<?php echo $unic_id_top;?> ', {
					  loopedSlides: 2, /*looped slides should be the same*/
						grabCursor: <?php echo $grabcursor;?>,
						speed: <?php echo $speed;?>,
						freeMode: <?php echo $freemode;?>,
						mousewheel: <?php echo $mousewheel;?>,
						keyboard: <?php echo $keyboard;?>,
						loop: <?php echo $loop;?>,
						<?php echo ( is_rtl() ) ? "rtl: true," : ''; ?>
						autoplay: {
							delay: <?php echo $delay;?>,								  
							disableOnInteraction: false,
						},
						  pagination: {
							el: '.swiper-pagination',
							clickable: true,
							<?php echo $progressbar;?>: 'progressbar',
						  },
						  navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev',
						  },
						  scrollbar: {
							el: '.<?php echo $scrollbar;?>',
							hide: true,
						  },
					  thumbs: {
						swiper: galleryThumbs,
					  },
					});				

				});						
				
			</script>			
			
			<?php			
				
			break;
			
			case '2':
			?>			
			<!-- gallery_top -->
			<div class="gallery_image_area ">
				<div class="swiper-container twr_gallery_height margin_top_0 twr_gallery_thumbs_<?php echo $unic_id_smale;?> "dir="<?php echo $rtl;?>">
					<div class="swiper-wrapper" >
						<?php if( ! empty($witrshowdata['witr_list_imager'])){
							foreach($witrshowdata['witr_list_imager'] as $imaget_gallery){
							$txbd_image = ! empty($imaget_gallery['witr_imager_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $imaget_gallery, 'txbd_image_size', 'witr_imager_image' ) : '';	
								?>								
								<div class="swiper-slide witr_down_gallery ">
									<?php echo $txbd_image; ?>	
								</div>
							<?php } ?>
						<?php } ?>

					</div>					
				</div>			
			
				<div class="swiper-container gallery_top_<?php echo $unic_id_top;?>"dir="<?php echo $rtl;?>">
					<div class="swiper-wrapper" >
					<?php if(isset($witrshowdata['witr_list_imager']) && ! empty($witrshowdata['witr_list_imager'])){
						foreach($witrshowdata['witr_list_imager'] as $imaget_gallery){
						$target = ! empty($imaget_gallery['witr_title_link']['is_external']) ? ' target="_blank"' : '';
						$nofollow = ! empty($imaget_gallery['witr_title_link']['nofollow']) ? ' rel="nofollow"' : '';
						$txbd_image = ! empty($imaget_gallery['witr_imager_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $imaget_gallery, 'txbd_image_size', 'witr_imager_image' ) : '';
						?>						
							<div class="swiper-slide  ">
								<div class="single_gallery_thumb ">	
									<?php echo $txbd_image; 
									if( ! empty($imaget_gallery['witr_imager_title'])){?>
										<div class="witr_gallery_title">
											<?php if($imaget_gallery['witr_title_link'] ['url']){?> 
												<h2><a href="<?php echo $imaget_gallery['witr_title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $imaget_gallery['witr_imager_title']; ?></a></h2>
											<?php }else{ ?>
											<h2><?php echo $imaget_gallery['witr_imager_title']; ?> </h2>
											<?php }	?>										
										</div>	
									<?php } ?>																								 
								</div>
							</div>
						<?php } } ?>					


					</div>
					<!-- Add Pagination -->
					<div class="swiper-scrollbar"></div>
					<div class="swiper-pagination"></div>
					<div class="swiper-<?php echo $arrow;?>-next "></div>
					<div class="swiper-<?php echo $arrow;?>-prev"></div>					
				</div>
				

			</div>

			<script type='text/javascript'>
				jQuery(function($){

					var galleryThumbs = new Swiper('.twr_gallery_thumbs_<?php echo $unic_id_smale;?>', {
						
						<?php if(! empty($witrshowdata['witr_slides_to_show'])){?>
							slidesPerView: <?php echo $slidestoShow;?>,
						<?php } ?>
						<?php if( ! empty($witrshowdata['witr_spacebetween'])){?>
							spaceBetween: <?php echo $spacebetween;?>,
						<?php } ?>
					  loop: false,
					  <?php echo ( is_rtl() ) ? "rtl: true," : ''; ?>
					  freeMode: <?php echo $freemode;?>,
					  loopedSlides: 2, /*looped slides should be the same*/
					  watchSlidesVisibility: true,
					  watchSlidesProgress: true,
						grabCursor: <?php echo $grabcursor;?>,
						speed: <?php echo $speed;?>,
						direction: 'horizontal',
						mousewheel: <?php echo $mousewheel;?>,
						keyboard: <?php echo $keyboard;?>,
						autoplay: {
							delay: <?php echo $delay;?>,								  
							disableOnInteraction: false,
						},						
					});
					var galleryTop = new Swiper('.gallery_top_<?php echo $unic_id_top;?> ', {
					  loopedSlides: 2, /*looped slides should be the same*/
						grabCursor: <?php echo $grabcursor;?>,
						speed: <?php echo $speed;?>,
						freeMode: <?php echo $freemode;?>,
						mousewheel: <?php echo $mousewheel;?>,
						keyboard: <?php echo $keyboard;?>,
						loop: <?php echo $loop;?>,
						<?php echo ( is_rtl() ) ? "rtl: true," : ''; ?>
						autoplay: {
							delay: <?php echo $delay;?>,								  
							disableOnInteraction: false,
						},
						  pagination: {
							el: '.swiper-pagination',
							clickable: true,
							<?php echo $progressbar;?>: 'progressbar',
						  },
						  navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev',
						  },
						  scrollbar: {
							el: '.<?php echo $scrollbar;?>',
							hide: true,
						  },
					  thumbs: {
						swiper: galleryThumbs,
					  },
					});				

				});						
				
			</script>			
			
			<?php							
			break;
			
			default:
        ?>

			<!-- gallery_bottom -->
			<div class="gallery_image_area ">
				<div class="swiper-container gallery_top_<?php echo $unic_id_top;?>"dir="<?php echo $rtl;?>">
					<div class="swiper-wrapper" >
					<?php if( ! empty($witrshowdata['witr_list_imager'])){
						foreach($witrshowdata['witr_list_imager'] as $imaget_gallery){
						$target = ! empty($imaget_gallery['witr_title_link']['is_external']) ? ' target="_blank"' : '';
						$nofollow = ! empty($imaget_gallery['witr_title_link']['nofollow']) ? ' rel="nofollow"' : '';
						$txbd_image = ! empty($imaget_gallery['witr_imager_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $imaget_gallery, 'txbd_image_size', 'witr_imager_image' ) : '';
						?>						
							<div class="swiper-slide  ">
								<div class="single_gallery_thumb ">	
									<?php echo $txbd_image;
									if( ! empty($imaget_gallery['witr_imager_title'])){?>
										<div class="witr_gallery_title">
											<?php if($imaget_gallery['witr_title_link'] ['url']){?> 
												<h2><a href="<?php echo $imaget_gallery['witr_title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $imaget_gallery['witr_imager_title']; ?></a></h2>
											<?php }else{ ?>
											<h2><?php echo $imaget_gallery['witr_imager_title']; ?> </h2>
											<?php }	?>										
										</div>	
									<?php } ?>																								 
								</div>
							</div>
						<?php } } ?>					


					</div>
					<!-- Add Pagination -->
					<div class="swiper-scrollbar"></div>
					<div class="swiper-pagination"></div>
					<div class="swiper-<?php echo $arrow;?>-next "></div>
					<div class="swiper-<?php echo $arrow;?>-prev"></div>					
				</div>
				
				<div class="swiper-container twr_gallery_height twr_gallery_thumbs_<?php echo $unic_id_smale;?> "dir="<?php echo $rtl;?>">
					<div class="swiper-wrapper" >
						<?php if(isset($witrshowdata['witr_list_imager']) && ! empty($witrshowdata['witr_list_imager'])){
							foreach($witrshowdata['witr_list_imager'] as $imaget_gallery){
							$txbd_image = ! empty($imaget_gallery['witr_imager_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $imaget_gallery, 'txbd_image_size', 'witr_imager_image' ) : '';	
								?>								
								<div class="swiper-slide witr_down_gallery">
									<?php echo $txbd_image; ?>	
								</div>
							<?php } ?>
						<?php } ?>

					</div>					
				</div>
			</div>

			<script type='text/javascript'>
				jQuery(function($){

					var galleryThumbs = new Swiper('.twr_gallery_thumbs_<?php echo $unic_id_smale;?>', {
						
						<?php if(! empty($witrshowdata['witr_slides_to_show'])){?>
							slidesPerView: <?php echo $slidestoShow;?>,
						<?php } ?>
						<?php if( ! empty($witrshowdata['witr_spacebetween'])){?>
							spaceBetween: <?php echo $spacebetween;?>,
						<?php } ?>
					  loop: false,
					  <?php echo ( is_rtl() ) ? "rtl: true," : ''; ?>
					  freeMode: <?php echo $freemode;?>,
					  loopedSlides: 2, /*looped slides should be the same*/
					  watchSlidesVisibility: true,
					  watchSlidesProgress: true,
						grabCursor: <?php echo $grabcursor;?>,
						speed: <?php echo $speed;?>,
						direction: 'horizontal',
						mousewheel: <?php echo $mousewheel;?>,
						keyboard: <?php echo $keyboard;?>,
						autoplay: {
							delay: <?php echo $delay;?>,								  
							disableOnInteraction: false,
						},						
					});
					var galleryTop = new Swiper('.gallery_top_<?php echo $unic_id_top;?> ', {
					  loopedSlides: 2, /*looped slides should be the same*/
						grabCursor: <?php echo $grabcursor;?>,
						speed: <?php echo $speed;?>,
						freeMode: <?php echo $freemode;?>,
						mousewheel: <?php echo $mousewheel;?>,
						keyboard: <?php echo $keyboard;?>,
						loop: <?php echo $loop;?>,
						<?php echo ( is_rtl() ) ? "rtl: true," : ''; ?>
						autoplay: {
							delay: <?php echo $delay;?>,								  
							disableOnInteraction: false,
						},
						  pagination: {
							el: '.swiper-pagination',
							clickable: true,
							<?php echo $progressbar;?>: 'progressbar',
						  },
						  navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev',
						  },
						  scrollbar: {
							el: '.<?php echo $scrollbar;?>',
							hide: true,
						  },
					  thumbs: {
						swiper: galleryThumbs,
					  },
					});				

				});						
				
			</script>			
        <?php

			break;
			
		} /*=== end switch ====*/	

       
	} /* end function*/





}