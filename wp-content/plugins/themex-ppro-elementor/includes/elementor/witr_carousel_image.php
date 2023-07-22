<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Mls_Carousel_image extends Widget_Base {

    public function get_name() {
        return 'witr_section_carousel_image';
    }
    
    public function get_title() {
        return esc_html__( 'Image Carousel & Grid', 'themex' );
    }
    public function get_style_depends() {
        return ['wimagecl',];
    }		
    public function get_script_depends() {
        return [];
    }	
    public function get_icon() {
        return ' themex_icon eicon-slider-push';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

   protected function register_controls() {
		
			/* === witr_image start === */
			$this->start_controls_section(
				'witr_field_display_image',
				[
					'label' => esc_html__( ' Image Carousel & Grid Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
			
			/* === witr_style_call start === */
				$this->add_control(
					'witr_select_style',
					[
						'label' => esc_html__( 'Select Style', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator' => 'before',
						'options' => [
							'1' => esc_html__( ' Carousel Style', 'themex' ),
							'2' => esc_html__( ' Grid Style', 'themex' ),
						],
						'default' => '1',
					]
				);
					
				/* witr_grayscale_text */
				$this->add_control(
					'witr_grayscale_text',
					[
						'label' => esc_html__( 'Gray Scale', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'options' => [
							'witr_grayscale' => esc_html__( 'True', 'themex' ),
							'falseg ' => esc_html__( 'False', 'themex' ),
						],
					]
				);
				/* witr_grayscaleh_text */
				$this->add_control(
					'witr_grayscaleh_text',
					[
						'label' => esc_html__( 'Gray Scale Hover', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'options' => [
							'witr_grayscaleh' => esc_html__( 'True', 'themex' ),
							'false ' => esc_html__( 'False', 'themex' ),
						],
					]
				);				
			/*  witr_gutter_column */
			$this->add_control(
				'witr_gutter_column',
				[
					'label' => esc_html__( 'Show Gutter', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
                    'separator' => 'before',					
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'no',
					'condition' => [
						'witr_select_style' =>['1'],
					],					
				]
			);				
			
				$repeater = new Repeater();
				
				/* witr_image_carousel */
				$repeater->add_control(
					'witr_image_carousel',
					[
						'label' => esc_html__( 'Choose Image', 'themex' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],							
					]
				);
				/* witr_feature_title_link */	
				$repeater->add_control(
					'witr_image_link',
					[
						'label' => esc_html__( 'Your Link Here', 'themex' ),
						'type' => Controls_Manager::URL,
						'description' =>esc_html__('Insert Your link here, Not Use Link field is blank.','themex'),
						'placeholder' => esc_attr__( 'https://your-link.com', 'themex' ),
						'show_external' => true,						
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
					/* witr_list_tslide */
					$this->add_control(
						'witr_image_list',
						[
							'label' => esc_html__( 'Images List', 'themex' ),
							'type' => Controls_Manager::REPEATER,
							'separator'=>'before',
							'fields' => $repeater->get_controls(),							
						]
					);				
			$this->end_controls_section();
			/* === end witr_image ===  */

			/* === witr_field_column start === */
			$this->start_controls_section(
				'witr_field_column',
				[
					'label' => esc_html__( 'Set Column Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
					'condition' => [
						'witr_select_style' =>['2'],
					],						
				]
			);	
				/* === witr_col_lg start === */
				$this->add_control(
					'witr_col_lg',
					[
						'label' => esc_html__( ' Large devices', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator' => 'before',
						'description' => __( 'col-lg- (large devices - screen width equal to or greater than 992px)', 'themex' ),
						'options' => [
							'1' => esc_html__( ' col-lg-1', 'themex' ),
							'2' => esc_html__( ' col-lg-2', 'themex' ),
							'3' => esc_html__( ' col-lg-3', 'themex' ),
							'4' => esc_html__( ' col-lg-4', 'themex' ),
							'5' => esc_html__( ' col-lg-5', 'themex' ),
							'6' => esc_html__( ' col-lg-6', 'themex' ),
							'7' => esc_html__( ' col-lg-7', 'themex' ),
							'8' => esc_html__( ' col-lg-8', 'themex' ),
							'9' => esc_html__( ' col-lg-9', 'themex' ),
							'10' => esc_html__( ' col-lg-10', 'themex' ),
							'11' => esc_html__( ' col-lg-11', 'themex' ),
							'12' => esc_html__( ' col-lg-12', 'themex' ),
						
						],
						'default' => '4',
					]
				);
				/* === witr_col_lg start === */
				$this->add_control(
					'witr_col_md',
					[
						'label' => esc_html__( ' Medium devices', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator' => 'before',
						'description' => __( 'col-md- (medium devices - screen width equal to or greater than 768px)', 'themex' ),
						'options' => [
							'1' => esc_html__( ' col-md-1', 'themex' ),
							'2' => esc_html__( ' col-md-2', 'themex' ),
							'3' => esc_html__( ' col-md-3', 'themex' ),
							'4' => esc_html__( ' col-md-4', 'themex' ),
							'5' => esc_html__( ' col-md-5', 'themex' ),
							'6' => esc_html__( ' col-md-6', 'themex' ),
							'7' => esc_html__( ' col-md-7', 'themex' ),
							'8' => esc_html__( ' col-md-8', 'themex' ),
							'9' => esc_html__( ' col-md-9', 'themex' ),
							'10' => esc_html__( ' col-md-10', 'themex' ),
							'11' => esc_html__( ' col-md-11', 'themex' ),
							'12' => esc_html__( ' col-md-12', 'themex' ),
						
						],
						'default' => '6',
					]
				);


			$this->end_controls_section();
			/* === end witr_image ===  */			
					
			/* === witr_image start === */
			$this->start_controls_section(
				'witr_field_additional',
				[
					'label' => esc_html__( 'Additional Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
					'condition' => [
						'witr_select_style' =>['1'],
					],						
				]
			);
				/* witr_c_fade */
				$this->add_control(
					'witr_c_fade',
					[
						'label' => esc_html__( 'Set Fade', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'description' => esc_html__( 'NOTE: When Select Fade Slides to Show Must Be Set 1', 'themex' ),
						'default' => 'default',
						'options' => [
							'fade' => esc_html__( 'Fade', 'themex' ),
							'default' => esc_html__( 'default', 'themex' ),
						],
					]
				);			
				/* witr_slides_to_show */ 		
				$this->add_control(
					'witr_slides_to_show',
					[
						'label' => esc_html__( 'Slides to Show', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'description' =>esc_html__( 'Add Slide Mumber here, ex- 1', 'themex' ),
						'separator' => 'before',					
						'default' => 1,
					]
				);
				
				/*  witr_c_slidestoScroll */			
				$this->add_control(
					'witr_c_slidestoScroll',
					[
						'label' => esc_html__( 'slidestoScroll', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1,
						'max' => 10,
						'step' => 1,
						'default' => 1,
					]
				);
				/* image_infinite */
				$this->add_control(
					'witr_c_infinite',
					[
						'label' => esc_html__( 'Set Loop', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'true',
						'options' => [
							'true' => esc_html__( 'True', 'themex' ),
							'false' => esc_html__( 'False', 'themex' ),
						],
					]
				);				
				/* witr_c_autoplay */
				$this->add_control(
					'witr_c_autoplay',
					[
						'label' => esc_html__( 'Autoplay', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'true',
						'options' => [
							'true' => esc_html__( 'True', 'themex' ),
							'false' => esc_html__( 'False', 'themex' ),
						],
					]
				);					
				/*  witr_c_autoplaySpeed */			
				$this->add_control(
					'witr_c_autoplaySpeed',
					[
						'label' => esc_html__( 'AutoplaySpeed', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1000,
						'max' => 50000,
						'step' => 1000,
						'default' => 6000,
					]
				);
				/*  witr_c_speed */			
				$this->add_control(
					'witr_c_speed',
					[
						'label' => esc_html__( 'speed', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 100,
						'max' => 2000,
						'step' => 100,
						'default' => 1000,
					]
				);

				/* witr_c_arrows */
				$this->add_control(
					'witr_c_arrows',
					[
						'label' => esc_html__( 'arrows', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'true',
						'options' => [
							'true' => esc_html__( 'True', 'themex' ),
							'false' => esc_html__( 'False', 'themex' ),
						],
					]
				);	
				/* witr_c_dots */
				$this->add_control(
					'witr_c_dots',
					[
						'label' => esc_html__( 'dots', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'false',
						'options' => [
							'true' => esc_html__( 'True', 'themex' ),
							'false' => esc_html__( 'False', 'themex' ),
						],
					]
				);	
				/*  witr_c_res1 */			
				$this->add_control(
					'witr_c_res1',
					[
						'label' => esc_html__( 'Desktop', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1,
						'max' => 10,
						'step' => 1,
						'default' => 1,
					]
				);					
				/*  witr_c_res2 */			
				$this->add_control(
					'witr_c_res2',
					[
						'label' => esc_html__( 'Tablet', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1,
						'max' => 8,
						'step' => 1,
						'default' => 1,
					]
				);				
				/*  witr_c_res3 */			
				$this->add_control(
					'witr_c_res3',
					[
						'label' => esc_html__( 'Mobile', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1,
						'max' => 5,
						'step' => 1,
						'default' => 1,
					]
				);								
				/* witr_unicid_c */	
					$this->add_control(
						'witr_unicid_c',
						[
							'label' => esc_html__( 'Use Uniqe ID', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Please use a unic ID here, ex- wittr_1.', 'themex' ),
							'default' => 'id1',
							'placeholder' => esc_attr__( 'Type your ID here', 'themex' ),						
						]
					);				
				
												
			
			$this->end_controls_section();
			/* === end witr_image ===  */			
						
			
			
		
		
	   /*===========================================================================================
										START TO STYLE
		=============================================================================================*/		
		

/*=== start witr_image style ====*/
		$this->start_controls_section(
			'witr_style_image_Option',
			[
				'label' => esc_html__( 'Single Images Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
							'{{WRAPPER}} .slide_items img' => 'width: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .slide_items img' => 'height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .slide_items' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .slide_items' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
					
		 
		 $this->end_controls_section();
		/*=== end  witr_image style ====*/		
		
		
			/*=== start witr Arrow style ====*/

			$this->start_controls_section(
				'witr_style_option_arrow',
				[
					'label' => esc_html__( ' Arrow Options', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_c_arrows' => 'true',
						'witr_select_style' =>['1'],
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
					
						/*  arrow width */
						$this->add_responsive_control(
							'witr_arrow_width',
							[
								'label' => esc_html__( 'width', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 500,
									],
									'%' => [
										'min' => 0,
										'max' => 500,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'width: {{SIZE}}{{UNIT}};',
								],
							]
						);
						/*  arrow height */
						$this->add_responsive_control(
							'witr_arrow_height',
							[
								'label' => esc_html__( 'Height', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 500,
									],
									'%' => [
										'min' => 0,
										'max' => 500,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'height: {{SIZE}}{{UNIT}};',
								],
							]
						);						
						/*  arrow Line height */
						$this->add_responsive_control(
							'witr_arrow_line_height',
							[
								'label' => esc_html__( 'Line Height', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 500,
									],
									'%' => [
										'min' => 0,
										'max' => 500,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'line-height: {{SIZE}}{{UNIT}};',
								],
							]
						);						
						/*  arrow Opacity */
						$this->add_responsive_control(
							'witr_arrow_opacity',
							[
								'label' => esc_html__( 'Arrow Opacity', 'themex' ),
								'type' => Controls_Manager::TEXT,
								'selectors' => [
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'opacity: {{SIZE}}{{UNIT}};',
								],
							]
						);					
						/*  Arrow font size */
						$this->add_responsive_control(
							'witr_arrow_size',
							[
								'label' => esc_html__( 'Arrow Size', 'themex' ),
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
									'{{WRAPPER}} .slick-prev:before,{{WRAPPER}} .slick-next:before' => 'font-size: {{SIZE}}{{UNIT}};',
								],
							]
						);					
						/* Arrow color */
						$this->add_control(
							'witr_arrow_color',
							[
								'label' => esc_html__( 'Arrow Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .slick-prev:before,{{WRAPPER}} .slick-next:before ' => 'color: {{VALUE}}',
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
								'selector' => '{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next',
							]
						);
						/* Arrow Active color */
						$this->add_control(
							'witr__actv_arrow_color',
							[
								'label' => esc_html__( 'Arrow Active Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .slick-disabled.slick-prev:before,{{WRAPPER}} .slick-disabled.slick-next:before ' => 'color: {{VALUE}}',
								],
							]
						);	
						/*  witr_actv */
						$this->add_responsive_control(
							'witr_actv',
							[
								'label' => esc_html__( 'Active Background, Set Color And Click Arrow Button Than Show Active Color.', 'themex' ),
								'type' => Controls_Manager::HEADING,
							]
						);
						/* Arrow active background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_act_arrow_background',
								'label' => esc_html__( 'Arrow Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-prev.slick-disabled,{{WRAPPER}} .slick-next.slick-disabled,{{WRAPPER}} .slick-prev:focus,{{WRAPPER}} .slick-next:focus',
							]
						);		
						/* witr_arrowborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_arrowborder_style',
								'label' => esc_html__( 'Arrow Border', 'themex' ),
								'selector' => '{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next',
							]
						);
						/* border_radius */
						$this->add_control(
							'witr_border_arrow_radius',
							[
								'label' => esc_html__( 'Border Radius', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
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
										'min' => 0,
										'max' => 1000,
									],
									'%' => [
										'min' => 0,
										'max' => 1000,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'top: {{SIZE}}{{UNIT}};',
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
									'{{WRAPPER}} .slick-prev' => 'left: {{SIZE}}{{UNIT}};',
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
									'{{WRAPPER}} .slick-next' => 'right: {{SIZE}}{{UNIT}};',
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
							'witr_arrow_hover_color',
							[
								'label' => esc_html__( 'Arrow Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								
								'selectors' => [
									'{{WRAPPER}} .slick-prev:hover:before,{{WRAPPER}} .slick-next:hover:before' => 'color: {{VALUE}}',
								],
							]
						);					
							
						/* Arrow Hover background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_arrow_hover_background',
								'label' => esc_html__( 'Arrow Hover Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-prev:hover,{{WRAPPER}} .slick-next:hover',
							]
						);
						/* witr_hoverborder_style1 */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_hoverborder_style1',
								'label' => esc_html__( 'Arrow Hover Border', 'themex' ),
								'selector' => '{{WRAPPER}} .slick-prev:hover,{{WRAPPER}} .slick-next:hover',
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
					'label' => esc_html__( 'Witr Dots Options', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_c_dots' => 'true',
						'witr_select_style' =>['1'],
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
							'witr_dots_width',
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
									'{{WRAPPER}} .slick-dots li button' => 'width: {{SIZE}}{{UNIT}};',
								],
							]
						);
						/*  Dots height */
						$this->add_responsive_control(
							'witr_dots_height',
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
									'{{WRAPPER}} .slick-dots li button' => 'height: {{SIZE}}{{UNIT}};',
								],
							]
						);											
						/* Dots background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_dots_background',
								'label' => esc_html__( 'Dots Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-dots li button',
							]
						);		
						/* witr_dotsborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_dotsborder_style',
								'label' => esc_html__( 'Dots Border', 'themex' ),
								'selector' => '{{WRAPPER}} .slick-dots li button',
							]
						);
						/* border_radius */
						$this->add_control(
							'witr_border_dots_radius',
							[
								'label' => esc_html__( 'Border Radius', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .slick-dots li button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						
						/* Active Dots Background heading */
						$this->add_control(
							'witr_acdots_bg_had',
							[
								'label' => esc_html__( 'Active Dots Background', 'themex' ),
								'type' => Controls_Manager::HEADING,
							]
						);
							
						
						/* Active Dots background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_acdots_background',
								'label' => esc_html__( 'Active Dots Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-dots li.slick-active button ',
							]
						);						
						/* Active Dots height */
						$this->add_responsive_control(
							'witr_dotsac_height',
							[
								'label' => esc_html__( 'Active Height', 'themex' ),
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
									'{{WRAPPER}} .slick-dots li.slick-active button' => 'height: {{SIZE}}{{UNIT}};',
								],
							]
						);						
						/* witr_bottom */
						$this->add_responsive_control(
							'witr_bottomb_dots',
							[
								'label' => esc_html__( 'Bottom', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%', 'em' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 2000,
									],
									'%' => [
										'min' => -500,
										'max' => 2000,
									],
									'em' => [
										'min' => -500,
										'max' => 2000,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',
								],					
							]
						);
						/* witr_top */
						$this->add_responsive_control(
							'witr_topt_dots',
							[
								'label' => esc_html__( 'Top', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%', 'em' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 2000,
									],
									'%' => [
										'min' => -500,
										'max' => 2000,
									],
									'em' => [
										'min' => -500,
										'max' => 2000,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots' => 'top: {{SIZE}}{{UNIT}};',
								],
							]
						);
						
						/* witr_left */
						$this->add_responsive_control(
							'witr_leftl_dots',
							[
								'label' => esc_html__( 'Left', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%', 'em' ],
									'range' => [
									'px' => [
										'min' => -500,
										'max' => 2000,
									],
									'%' => [
										'min' => -500,
										'max' => 2000,
									],
									'em' => [
										'min' => -500,
										'max' => 2000,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots' => 'left: {{SIZE}}{{UNIT}};',
								],

							]
						);

						/* witr_right */
						$this->add_responsive_control(
							'witr_rightr_dots',
							[
								'label' => esc_html__( 'Right', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%', 'em' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 2000,
									],
									'%' => [
										'min' => -500,
										'max' => 2000,
									],
									'em' => [
										'min' => -500,
										'max' => 2000,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots' => 'right: {{SIZE}}{{UNIT}};',
								],
							]
						);					

						/* dots margin */
						$this->add_responsive_control(
							'witr_dots_margin',
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
									'{{WRAPPER}} .slick-dots li button' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
								],
							]
						);					
					

					$this->end_controls_tab();
					/*=== end Dots normal style ====*/
				
						/*=== start Dots hover style ====*/
						$this->start_controls_tab(
							'witr_dots_colors_hover',
							[
								'label' => esc_html__( 'Dots Hover', 'themex' ),
							]
						);
							
						/* Dots Hover background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_dots_hover_background',
								'label' => esc_html__( 'Dots Hover Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-dots li button:hover',
							]
						);
						/* witr_hoverborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_hoverborder_style',
								'label' => esc_html__( 'Dots Hover Border', 'themex' ),
								'selector' => '{{WRAPPER}} .slick-dots li button:hover',
							]
						);					
						
						
						$this->end_controls_tab();
						/*=== end Dots hover style ====*/
						
				$this->end_controls_tabs();
				/*=== end Dots tabs style ====*/

			 $this->end_controls_section();
			/*=== end  witr Dots style ====*/		
		
	
		/*===== start Image BG Overlay =====*/
		$this->start_controls_section(
			'section_background_overlay',
			[
				'label' => esc_html__( 'Image BG Overlay', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
								
			]
		);
					/* feature title */	
					$this->add_control(
						'witr_heding_op',
						[
							'label' => esc_html__( 'NOTE: Image Link Set Overlay Working. Image Link Not Set Overlay Not Working.', 'themex' ),
							'type' => Controls_Manager::HEADING,						
						]
					);
		
			/* image background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_icono_background',
					'label' => esc_html__( ' Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .slide_items a::before',
				]
			);				
		
		
		$this->end_controls_section();
		/*===== end Image BG Overlay =====*/
		
		



    } /* function end */

    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();

$infinite=$autoplay=$autoplayspeed=$speed=$slidestoShow=$slidestoscroll=$arrows=$dots=$res1=$res2=$res3=$unic_id="";
if(! empty($witrshowdata['witr_slides_to_show'])){
	$slidestoShow=$witrshowdata['witr_slides_to_show'];
}
if(! empty($witrshowdata['witr_c_infinite'])){
	$infinite=$witrshowdata['witr_c_infinite'];
}
if(! empty($witrshowdata['witr_c_autoplay'])){
	$autoplay=$witrshowdata['witr_c_autoplay'];
}
if(! empty($witrshowdata['witr_c_autoplaySpeed'])){
	$autoplayspeed=$witrshowdata['witr_c_autoplaySpeed'];
}
if(! empty($witrshowdata['witr_c_speed'])){
	$speed=$witrshowdata['witr_c_speed'];
}
if(! empty($witrshowdata['witr_c_slidestoScroll'])){
	$slidestoscroll=$witrshowdata['witr_c_slidestoScroll'];
}
if(! empty($witrshowdata['witr_c_fade'])){
	$fade=$witrshowdata['witr_c_fade'];
}

if(! empty($witrshowdata['witr_c_arrows'])){
	$arrows=$witrshowdata['witr_c_arrows'];
}
if(! empty($witrshowdata['witr_c_dots'])){
	$dots=$witrshowdata['witr_c_dots'];
}
if(! empty($witrshowdata['witr_c_res1'])){
	$res1=$witrshowdata['witr_c_res1'];
}
if(! empty($witrshowdata['witr_c_res2'])){
	$res2=$witrshowdata['witr_c_res2'];
}
if(! empty($witrshowdata['witr_c_res3'])){
	$res3=$witrshowdata['witr_c_res3'];
}
if(! empty($witrshowdata['witr_unicid_c'])){
	$unic_id=$witrshowdata['witr_unicid_c'];
}



	switch ( $witrshowdata['witr_select_style'] ) {
		case '2':						
		?>
				<!--======  START wittr_car_top_right ======-->
				<div class="carousel_imagess_area">
					<div class="row">
						<?php if( ! empty($witrshowdata['witr_image_list'])){	
							foreach($witrshowdata['witr_image_list'] as $witr_image){
							$target_img = ! empty($witr_image['witr_image_link']['is_external']) ? ' target="_blank"' : '';
							$nofollow_img = ! empty($witr_image['witr_image_link']['nofollow']) ? ' rel="nofollow"' : '';
							$txbd_image='';
							if( !empty( $witr_image['witr_image_carousel']['url'] ) ){
								$txbd_image = Group_Control_Image_Size::get_attachment_image_html( $witr_image, 'txbd_image_size', 'witr_image_carousel' );
							}							
							?>
							<div class="col-lg-<?php echo $witrshowdata['witr_col_lg'];?> col-md-<?php echo $witrshowdata['witr_col_md'];?>">
								<div class="grid_caur_image">
									<div class="slide_items <?php echo $witrshowdata['witr_grayscale_text'];?> <?php echo $witrshowdata['witr_grayscaleh_text'];?>">
									<!-- image -->
									<?php if( ! empty($witr_image['witr_image_carousel'])){
										if($witr_image['witr_image_link'] ['url']){?> 
											<a href="<?php echo $witr_image['witr_image_link'] ['url'];?>"<?php echo $target_img,$nofollow_img?>>
											<?php echo $txbd_image; ?></a>
										<?php }else{ 
										echo $txbd_image; 
										} } ?>									
									</div>
								</div>
							</div>
								
							<?php }  } ?>
					</div>										
				</div>		
		
		<?php
		break;
		
		default:
		?>		
			
				<!--======  START wittr_car_top_right ======-->
				<div class="carousel_imagess_area">
					<div class=" imagess_<?php echo $unic_id;?>">
						<?php if(isset($witrshowdata['witr_image_list']) && ! empty($witrshowdata['witr_image_list'])){	
							foreach($witrshowdata['witr_image_list'] as $witr_image){
							$target_img = ! empty($witr_image['witr_image_link']['is_external']) ? ' target="_blank"' : '';
							$nofollow_img = ! empty($witr_image['witr_image_link']['nofollow']) ? ' rel="nofollow"' : '';
							$txbd_image='';
							if( !empty( $witr_image['witr_image_carousel']['url'] ) ){
								$txbd_image = Group_Control_Image_Size::get_attachment_image_html( $witr_image, 'txbd_image_size', 'witr_image_carousel' );
							}							
							?>							
							<div class="col-lg-12 <?php if($witrshowdata['witr_gutter_column']=='yes'){ ?>  carousel_pdding0 <?php } ?>">
								<div class="slide_items <?php echo $witrshowdata['witr_grayscale_text'];?> <?php echo $witrshowdata['witr_grayscaleh_text'];?>">
								<!-- image -->
								<?php if( ! empty($witr_image['witr_image_carousel'])){
									if($witr_image['witr_image_link'] ['url']){?> 
										<a href="<?php echo $witr_image['witr_image_link'] ['url'];?>"<?php echo $target_img,$nofollow_img?>>
											<?php echo $txbd_image; ?></a>
										<?php }else{ 
										echo $txbd_image; 
										} } ?>									
								</div>
							</div>
								
							<?php } } ?>
					</div>						
									
				</div>
				<!--====== PART ENDS ======-->		
		<script type='text/javascript'>
			jQuery(function($){
				
				var witrbslick = $('.imagess_<?php echo esc_js($unic_id);?>');
				
				if(witrbslick.length > 0){

				witrbslick.slick({
					infinite: <?php echo esc_js($infinite);?>,
					autoplay: <?php echo esc_js($autoplay);?>,
					<?php echo esc_js($fade);?>: true,
					autoplaySpeed: <?php echo esc_js($autoplayspeed);?>,
					speed: <?php echo esc_js($speed);?>,					
					slidesToShow: <?php echo esc_js($slidestoShow);?>,
					slidesToScroll: <?php echo esc_js($slidestoscroll);?>,
					<?php echo ( is_rtl() ) ? "rtl: true," : ''; ?>
					arrows: <?php echo esc_js($arrows);?>,
					dots: <?php echo esc_js($dots);?>,
					responsive: [
						{
							breakpoint: 1200,
							settings: {
								slidesToShow: <?php echo esc_js($res1);?>,
								slidesToScroll: 1,
							}
					},
						{
							breakpoint: 992,
							settings: {
								slidesToShow: <?php echo esc_js($res2);?>,
								slidesToScroll: 1,
							}
					},
						{
							breakpoint: 767,
							settings: {
								slidesToShow: <?php echo esc_js($res3);?>,
								slidesToScroll: 1,
							}
					}
					]
				});
			}

			});
		</script>	

	<?php	
		break;						
		
	}/* switch end */			
			
			


    } /* function end */


}
