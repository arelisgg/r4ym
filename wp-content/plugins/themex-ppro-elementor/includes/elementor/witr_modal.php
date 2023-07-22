<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Modal extends Widget_Base {

    public function get_name() {
        return 'witr_section_modal';
    }
  
    public function get_title() {
        return esc_html__( ' Modal', 'themex' );
    }
    public function get_style_depends() {
        return ['wmordal'];
    }	
    public function get_icon() {
        return 'themex_icon eicon-flip-box';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {

			/* === w_modal start === */
			$this->start_controls_section(
				'witr_field_display_modal',
				[
					'label' => esc_html__( ' Modal Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);	

					/* Box Position */				
					$this->add_control(
						'witr_text_ltc',
						[
							'label' => esc_html__( 'Box Position', 'themex' ),
							'type' => Controls_Manager::CHOOSE,
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
							'selectors' => [
								'{{WRAPPER}} .witr_modal_text' => 'text-align: {{VALUE}}',
							],							
						]
					);
					
					$repeater = new Repeater();						
					

					/* witr_show_custom witr_modal_custom */
					$repeater->add_control(
						'witr_show_custom',
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
					/* witr_icon_item */					
					$repeater->add_control(
						'witr_modal_custom',
						[
							'label' => esc_html__( 'Icon', 'themex' ),
							'type' => Controls_Manager::ICONS,
							'description' => esc_html__( 'Change icon here, For this, click on the library field And Not use Icon,Click On The Hide Option', 'themex' ),
							'default' => [
								'value' => 'icofont-plus',
							],
							'condition' => [
								'witr_show_custom' => 'yes',
							],							
						]
					);									
					/* show image witr_show_image witr_modal_image */
					$repeater->add_control(
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
					/* witr_modal_image */
					$repeater->add_control(
						'witr_modal_image',
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
					/* witr_show_menu witr_modal_menu_t */
					$repeater->add_control(
						'witr_show_menu',
						[
							'label' => esc_html__( 'Show Menu Title', 'themex' ),
							'type' => Controls_Manager::SWITCHER,
							'separator'=>'before',
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'return_value' => 'yes',
							'default' => 'no',								
						]
					);
					/* witr_modal_menu */	
					$repeater->add_control(
						'witr_modal_menu_t',
						[
							'label' => esc_html__( 'Menu Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use menu title, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Enter Your menu Title', 'themex' ),
							'separator'=>'before',
							'placeholder' => esc_attr__( 'Type your menu title here', 'themex' ),
							'condition' => [
								'witr_show_menu' => 'yes',
							],							
						]
					);										
					/* witr_modal_title */	
					$repeater->add_control(
						'witr_modal_title',
						[
							'label' => esc_html__('Modal Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use title, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Enter Your Title', 'themex' ),
							'separator'=>'before',
							'placeholder' => esc_attr__( 'Type your  title here', 'themex' ),						
						]
					);										
				/* witr_modal_lists */
				$repeater->add_control(
					'witr_modal_lists',
					[
						'label' => esc_html__( 'Modal List Items ', 'themex' ),
						'type' => Controls_Manager::TEXTAREA,
						'separator' => 'before',
						'description' => esc_html__( 'use list from here, must be use the stcructure ex- <ul><li><a href="#">example list 1</a></li><li><a href="#">example list 2</a></li><li><a href="#">example list 3</a></li></ul> OR <span>Phone: (+734) 697-2907</span> OR <p>Phone: (+734) 697-2907</p>, If Icon Use Example- <ul><li><a href="#"> <i class="icofont-arrow-right"></i> example list </a></li></ul> ', 'themex' ),
						'default' => '<ul><li><a href="#">example list 1</a></li><li><a href="#">example list 2</a></li><li><a href="#">example list 3</a></li></ul>',
						'placeholder' => esc_attr__( 'Type your List Item here', 'themex' ),						
					]
				);										

					/* witr_unicid_c */	
					$repeater->add_control(
						'witr_unicid_c',
						[
							'label' => esc_html__( 'Use Uniqe ID', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Please use a unic or different ID here, ex- wittr_1.', 'themex' ),
							'default' => 'different_id_use',
							'placeholder' => esc_attr__( 'Type your ID here', 'themex' ),						
						]
					);					
					/* witr_list_tslide */
					$this->add_control(
						'witr_list_cslide',
						[
							'label' => esc_html__( 'Repeater List', 'themex' ),
							'type' => Controls_Manager::REPEATER,
							'separator'=>'before',
							'fields' => $repeater->get_controls(),
							'default' => [
								[
									'witr_modal_title' => esc_html__( 'Add your Title', 'themex' ),
									
								],

							],
							'title_field' => '{{{ witr_modal_title }}}',
							'content_field' => '{{{ witr_modal_lists }}}',
						]
					);					
		
					
			$this->end_controls_section();
			/* === end w_modal ===  */



	   /*============================================================================================================================================================
										START TO STYLE
		=============================================================================================*/
			
			/* === w_modal start === */
			$this->start_controls_section(
				'witr_field_display_ntmodal',
				[
					'label' => esc_html__( 'witr Section Position Options', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);

				/*=== start icon_tabs style ====*/
				$this->start_controls_tabs( 'modal' );
				
					/*=== start 1 normal style ====*/
					$this->start_controls_tab(
						'witr_1_colors_normal',
						[
							'label' => esc_html__( '1', 'themex' ),
						]
					);
						/* witr_1_top */
						$this->add_responsive_control(
							'witr_1_top',
							[
								'label' => esc_html__( 'Section Top', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -1000,
										'max' => 1000,
									],
									'%' => [
										'min' => -1000,
										'max' => 1000,
									],		
								],						
								'selectors' => [
									'{{WRAPPER}} .witr_modal_box:nth-child(1)' => 'top: {{SIZE}}{{UNIT}};',
								],
							]
						);
				
						/* witr_1_left */
						$this->add_responsive_control(
							'witr_1_left',
							[
								'label' => esc_html__( 'Section Left', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -1000,
										'max' => 1000,
									],
									'%' => [
										'min' => -1000,
										'max' => 1000,
									],	
								],						
								'selectors' => [
									'{{WRAPPER}} .witr_modal_box:nth-child(1)' => 'left: {{SIZE}}{{UNIT}};',
								],
							]
						);				
					$this->end_controls_tab();
					/*=== end 1 normal style ====*/
			
					/*=== start 2 style ====*/
					$this->start_controls_tab(
						'witr_2_colors_hover',
						[
							'label' => esc_html__( '2', 'themex' ),
						]
					);
						/* witr_2_top */
						$this->add_responsive_control(
							'witr_2_top',
							[
								'label' => esc_html__( 'Section Top', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -1000,
										'max' => 1000,
									],
									'%' => [
										'min' => -1000,
										'max' => 1000,
									],		
								],						
								'selectors' => [
									'{{WRAPPER}} .witr_modal_box:nth-child(2)' => 'top: {{SIZE}}{{UNIT}};',
								],
							]
						);
				
						/* witr_2_left */
						$this->add_responsive_control(
							'witr_2_left',
							[
								'label' => esc_html__( 'Section Left', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -1000,
										'max' => 1000,
									],
									'%' => [
										'min' => -1000,
										'max' => 1000,
									],	
								],						
								'selectors' => [
									'{{WRAPPER}} .witr_modal_box:nth-child(2)' => 'left: {{SIZE}}{{UNIT}};',
								],
							]
						);					
					
					$this->end_controls_tab();
					/*=== end 2 normal style ====*/

					
					/*=== start 3 style ====*/
					$this->start_controls_tab(
						'witr_3_colors_hover',
						[
							'label' => esc_html__( '3', 'themex' ),
						]
					);
						/* witr_3_top */
						$this->add_responsive_control(
							'witr_3_top',
							[
								'label' => esc_html__( 'Section Top', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -1000,
										'max' => 1000,
									],
									'%' => [
										'min' => -1000,
										'max' => 1000,
									],		
								],						
								'selectors' => [
									'{{WRAPPER}} .witr_modal_box:nth-child(3)' => 'top: {{SIZE}}{{UNIT}};',
								],
							]
						);				
						/* witr_3_left */
						$this->add_responsive_control(
							'witr_3_left',
							[
								'label' => esc_html__( 'Section Left', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -1000,
										'max' => 1000,
									],
									'%' => [
										'min' => -1000,
										'max' => 1000,
									],	
								],						
								'selectors' => [
									'{{WRAPPER}} .witr_modal_box:nth-child(3)' => 'left: {{SIZE}}{{UNIT}};',
								],
							]
						);					
					
					$this->end_controls_tab();
					/*=== end 3 normal style ====*/

					/*=== start 4 style ====*/
					$this->start_controls_tab(
						'witr_4_colors_hover',
						[
							'label' => esc_html__( '4', 'themex' ),
						]
					);
						/* witr_4_top */
						$this->add_responsive_control(
							'witr_4_top',
							[
								'label' => esc_html__( 'Section Top', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -1000,
										'max' => 1000,
									],
									'%' => [
										'min' => -1000,
										'max' => 1000,
									],		
								],						
								'selectors' => [
									'{{WRAPPER}} .witr_modal_box:nth-child(4)' => 'top: {{SIZE}}{{UNIT}};',
								],
							]
						);				
						/* witr_4_left */
						$this->add_responsive_control(
							'witr_4_left',
							[
								'label' => esc_html__( 'Section Left', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -1000,
										'max' => 1000,
									],
									'%' => [
										'min' => -1000,
										'max' => 1000,
									],	
								],						
								'selectors' => [
									'{{WRAPPER}} .witr_modal_box:nth-child(4)' => 'left: {{SIZE}}{{UNIT}};',
								],
							]
						);					
					
					$this->end_controls_tab();
					/*=== end 4 normal style ====*/

					/*=== start 5 style ====*/
					$this->start_controls_tab(
						'witr_5_colors_hover',
						[
							'label' => esc_html__( '5', 'themex' ),
						]
					);
						/* witr_5_top */
						$this->add_responsive_control(
							'witr_5_top',
							[
								'label' => esc_html__( 'Section Top', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -1000,
										'max' => 1000,
									],
									'%' => [
										'min' => -1000,
										'max' => 1000,
									],		
								],						
								'selectors' => [
									'{{WRAPPER}} .witr_modal_box:nth-child(5)' => 'top: {{SIZE}}{{UNIT}};',
								],
							]
						);				
						/* witr_5_left */
						$this->add_responsive_control(
							'witr_5_left',
							[
								'label' => esc_html__( 'Section Left', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -1000,
										'max' => 1000,
									],
									'%' => [
										'min' => -1000,
										'max' => 1000,
									],	
								],						
								'selectors' => [
									'{{WRAPPER}} .witr_modal_box:nth-child(5)' => 'left: {{SIZE}}{{UNIT}};',
								],
							]
						);					
					
					$this->end_controls_tab();
					/*=== end 5 normal style ====*/

					/*=== start 6 style ====*/
					$this->start_controls_tab(
						'witr_6_colors_hover',
						[
							'label' => esc_html__( '6', 'themex' ),
						]
					);
						/* witr_6_top */
						$this->add_responsive_control(
							'witr_6_top',
							[
								'label' => esc_html__( 'Section Top', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -1000,
										'max' => 1000,
									],
									'%' => [
										'min' => -1000,
										'max' => 1000,
									],		
								],						
								'selectors' => [
									'{{WRAPPER}} .witr_modal_box:nth-child(6)' => 'top: {{SIZE}}{{UNIT}};',
								],
							]
						);				
						/* witr_6_left */
						$this->add_responsive_control(
							'witr_6_left',
							[
								'label' => esc_html__( 'Section Left', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -1000,
										'max' => 1000,
									],
									'%' => [
										'min' => -1000,
										'max' => 1000,
									],	
								],						
								'selectors' => [
									'{{WRAPPER}} .witr_modal_box:nth-child(6)' => 'left: {{SIZE}}{{UNIT}};',
								],
							]
						);					
					
					$this->end_controls_tab();
					/*=== end 6 normal style ====*/
					
					/*=== start 7 style ====*/
					$this->start_controls_tab(
						'witr_7_colors_hover',
						[
							'label' => esc_html__( '7', 'themex' ),
						]
					);
						/* witr_7_top */
						$this->add_responsive_control(
							'witr_7_top',
							[
								'label' => esc_html__( 'Section Top', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -1000,
										'max' => 1000,
									],
									'%' => [
										'min' => -1000,
										'max' => 1000,
									],		
								],						
								'selectors' => [
									'{{WRAPPER}} .witr_modal_box:nth-child(7)' => 'top: {{SIZE}}{{UNIT}};',
								],
							]
						);
				
						/* witr_7_left */
						$this->add_responsive_control(
							'witr_7_left',
							[
								'label' => esc_html__( 'Section Left', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -1000,
										'max' => 1000,
									],
									'%' => [
										'min' => -1000,
										'max' => 1000,
									],	
								],						
								'selectors' => [
									'{{WRAPPER}} .witr_modal_box:nth-child(7)' => 'left: {{SIZE}}{{UNIT}};',
								],
							]
						);					
					
					$this->end_controls_tab();
					/*=== end 7 normal style ====*/					
					

					$this->end_controls_tabs();
					/*=== end section normal style ====*/
					
				$this->end_controls_section();
				/* === end w_modal ===  */

		/*=== start Single Box style ====*/
		$this->start_controls_section(
			'section_single_modal',
			[
				'label' => esc_html__( 'Box Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]
		);
		
			/*  box width */
			$this->add_responsive_control(
				'witr_box_width',
				[
					'label' => esc_html__( 'Box width', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'separator'=>'before',
					'range' => [
						'px' => [
							'min' => 6,
							'max' => 1000,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .witr_modal_text' => 'width: {{SIZE}}{{UNIT}};',
					],							
				]
			);
			/* witr_po_left */
			$this->add_responsive_control(
				'witr_po_left',
				[
					'label' => esc_html__( 'Box Position', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
						],
						'%' => [
							'min' => -1000,
							'max' => 1000,
						],	
					],						
					'selectors' => [
						'{{WRAPPER}} .witr_modal_box .modal' => 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);			
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_single_bb',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_modal_text',
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
							'{{WRAPPER}} .witr_modal_text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadowsbox',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_modal_text',
					]
				);
				/* box background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_box_background',
						'label' => esc_html__( ' Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_modal_text',							
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
							'{{WRAPPER}} .witr_modal_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);	
				

				/* Hover Color Option  */
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
						'selector' => '{{WRAPPER}} .witr_modal_text:hover',
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
							'{{WRAPPER}} .witr_modal_text:hover' => 'border-color: {{VALUE}}',
						],
						
					]
				);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadowhbox',
						'label' => esc_html__( 'Hover Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_modal_text:hover',
					]
				);					
				/* box background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_boxhover_background',
						'label' => esc_html__( ' Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_modal_text:hover',							
					]
				);		

		$this->end_controls_section();
		/*=== start Single Box style ====*/	
		
		/*=== start witr icon custom style ====*/
		$this->start_controls_section(
			'witr_custom_icon_option',
			[
				'label' => esc_html__( ' Icon Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]
		);
		
			/*=== start icon_tabs style ====*/
			$this->start_controls_tabs( 'icon_colorsc' );
				/*=== start icon_normal style ====*/
				$this->start_controls_tab(
					'witr_icon_colorc_normal',
					[
						'label' => esc_html__( 'Normal', 'themex' ),
					]
				);				
								
				/* Icon Color */
				$this->add_control(
					'witr_primaryc_color',
					[
						'label' => esc_html__( ' Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',
						'selectors' => [
							'{{WRAPPER}} .all_modal_color i' => 'color: {{VALUE}}',
						],					
					]
				);
				/* Icon background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_iconc_background',
						'label' => esc_html__( ' Custom Icon Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .all_modal_color i',
					]
				);				
				/*  icon Size */
				$this->add_responsive_control(
					'iconc_sizec',
					[
						'label' => esc_html__( 'Size', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .all_modal_color i' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon width */
				$this->add_responsive_control(
					'witr_iconc_width',
					[
						'label' => esc_html__( 'width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .all_modal_color i' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon height */
				$this->add_responsive_control(
					'witr_iconc_height',
					[
						'label' => esc_html__( 'Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .all_modal_color i' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);				
				/*  icon line height */
				$this->add_responsive_control(
					'witr_iconc_line_height',
					[
						'label' => esc_html__( 'Line Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .all_modal_color i' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_borderc',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .all_modal_color i',
					]
				);				
				/* border_radius */
				$this->add_control(
					'witr_border_radiusc',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .all_modal_color i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_boxci_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .all_modal_color i',
					]
				);
				/* icon margin */
				$this->add_responsive_control(
					'witr_iconc_margin',
					[
						'label' => esc_html__( ' margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .all_modal_color i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		
				/* icon padding */
				$this->add_responsive_control(
					'witr_iconc_padding',
					[
						'label' => esc_html__( ' Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .all_modal_color i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		
				

				$this->end_controls_tab();
				/*=== end icon normal style ====*/
			
					/*=== start icon hover style ====*/
					$this->start_controls_tab(
						'witr_iconc_color_hover',
						[
							'label' => esc_html__( 'Icon Hover', 'themex' ),
						]
					);
					/*  primary hover color */
					$this->add_control(
						'witr_hover_primaryc_color',
						[
							'label' => esc_html__( ' Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .all_modal_color i:hover' => 'color: {{VALUE}}',
							],
						]
					);					

					/* border_hover_color */
					$this->add_control(
						'witr_border_hover_colorc',
						[
							'label' => esc_html__( 'Border Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							
							'selectors' => [
								'{{WRAPPER}} .all_modal_color i:hover' => 'border-color: {{VALUE}}',
							],
						]
					);					
					/* hover Icon background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_hover_iconc',
							'label' => esc_html__( ' Hover Background', 'themex' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .all_modal_color i:hover',
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
						'{{WRAPPER}} .all_modal_color img' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .all_modal_color img' => 'height: {{SIZE}}{{UNIT}};',
					],
				]			
			);
			/* border_radius */
			$this->add_control(
				'witr_border_img_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .all_modal_color img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_modal_color img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_modal_color img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_image style ====*/		
		
		/*=== start witr_menu style ====*/
		$this->start_controls_section(
			'witr_style_option_menu',
			[
				'label' => esc_html__( 'Menu Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
			/* color */
			$this->add_control(
				'witr_menu_color',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_PRIMARY,
					],					
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .all_modal_color h4' =>'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
				'witr_menu_hover_color',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .all_modal_color h4:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_menu_color',
					'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
					],
					'selector' => '{{WRAPPER}} .all_modal_color h4',
				]
			);			
			/* menu margin */
			$this->add_responsive_control(
				'witr_menu_margin',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_modal_color h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* menu padding */
			$this->add_responsive_control(
				'witr_menu_padding',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_modal_color h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_menu style ====*/

		/*=== start witr_title style ====*/
		$this->start_controls_section(
			'witr_style_option_title',
			[
				'label' => esc_html__( 'Title Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .all_modal_color h3' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .all_modal_color h3:hover' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .all_modal_color h3',
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
						'{{WRAPPER}} .all_modal_color h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_modal_color h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_title style ====*/
		
		
		
		/*=== start witr List content style ====*/		
		 $this->start_controls_section(
			'witr_option_list_content',
			[
				'label' => esc_html__( 'List Text Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]		 
		 );

			/* list text color */
			$this->add_control(
				'witr_list_color',
				[
					'label' => esc_html__( ' Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_SECONDARY,
					],					
					'separator'=>'before',					
					'selectors' => [
						'{{WRAPPER}} .all_modal_color ul li a,{{WRAPPER}} .all_modal_color span,{{WRAPPER}} .all_modal_color p' => 'color: {{VALUE}}',
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
						'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
					],
					'selector' => '{{WRAPPER}} .all_modal_color ul li a,{{WRAPPER}} .all_modal_color span,{{WRAPPER}} .all_modal_color p',
				]
			);			
		
		/* margin */
		$this->add_responsive_control(
			'witr_content_margin',
			[
				'label' => esc_html__( 'Margin', 'themex' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .all_modal_color ul li a,{{WRAPPER}} .all_modal_color span,{{WRAPPER}} .all_modal_color p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		/* padding */
		$this->add_responsive_control(
			'witr_content_padding',
			[
				'label' => esc_html__( 'Padding', 'themex' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .all_modal_color ul li a,{{WRAPPER}} .all_modal_color span,{{WRAPPER}} .all_modal_color p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		 $this->end_controls_section();
		/*=== end  witr repeater list style ====*/



		/*=== start witr all style ====*/
		$this->start_controls_section(
			'witr_style_all_content',
			[
				'label' => esc_html__( 'All Text And Hover Color', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,					
			]
		);		 
			/* color */
			$this->add_control(
				'witr_alltitle_color',
				[
					'label' => esc_html__( 'All Text Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',					
					'selectors' => [
						'{{WRAPPER}} .witr_modal_title h3,{{WRAPPER}} .witr_modal_list ul li a,{{WRAPPER}} .witr_modal_text .close,{{WRAPPER}} .witr_modal_list span,{{WRAPPER}} .witr_modal_list p' => 'color: {{VALUE}}',
					],
				] 
			);
				/*  background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_allmo_background',
						'label' => esc_html__( ' Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_modal_text',
					]
				);			
			
			/* color */
			$this->add_control(
				'witr_allmh_color',
				[
					'label' => esc_html__( 'All Text Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',					
					'selectors' => [
						'{{WRAPPER}} .witr_modal_text:hover .witr_modal_title h3,{{WRAPPER}} .witr_modal_text:hover .witr_modal_list ul li a,{{WRAPPER}} .witr_modal_text:hover .close,{{WRAPPER}} .witr_modal_text:hover .witr_modal_list span,{{WRAPPER}} .witr_modal_text:hover .witr_modal_list p' => 'color: {{VALUE}}',
					],
				] 
			);				
				/*  background hover */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_allmoh_background',
						'label' => esc_html__( ' Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_modal_text:hover',
					]
				);

			
			
				


		 $this->end_controls_section();
		/*=== end  witr all text style ====*/


			

    } /* function end */

	
	
	
    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();	



		?>			


		
	
				<?php if(isset($witrshowdata['witr_list_cslide']) && ! empty($witrshowdata['witr_list_cslide'])){	
					foreach($witrshowdata['witr_list_cslide'] as $witr_single_modal){?>	

							<div class="witr_modal_box all_modal_color">
								<div class="witr_modal_menu">
									<!-- icon -->
									<?php if(! empty($witr_single_modal['witr_modal_custom'])){?>					
										<i class="<?php echo esc_attr( $witr_single_modal['witr_modal_custom']['value']);?>" data-toggle="modal" data-target="#witr_modal_<?php echo $witr_single_modal['witr_unicid_c']?>"></i>
									<?php } ?>				
									<!-- image -->
									<?php if(isset($witr_single_modal['witr_modal_image']['url']) && ! empty($witr_single_modal['witr_modal_image']['url'])){?>
										<img src="<?php echo $witr_single_modal['witr_modal_image']['url'];?>"data-toggle="modal" data-target="#witr_modal_<?php echo $witr_single_modal['witr_unicid_c']?>" alt="" />
									<?php } ?>
									<!-- title_menu -->
									<?php if($witr_single_modal['witr_show_menu']=='yes'){?>
										<?php if(isset($witr_single_modal['witr_modal_menu_t']) && ! empty($witr_single_modal['witr_modal_menu_t'])){?>
											<h4 data-toggle="modal" data-target="#witr_modal_<?php echo $witr_single_modal['witr_unicid_c']?>"><?php echo $witr_single_modal['witr_modal_menu_t']; ?></h4>
										<?php }?>
									<?php }?>								
								</div>
								<!-- The Modal Body -->
								<div class="modal " id="witr_modal_<?php echo $witr_single_modal['witr_unicid_c']?>">
									<div class=" witr_modal_text">
										<div class="witr_modal_title">
											<div class="close" data-dismiss="modal">&times;</div>
												<!-- title -->
												<?php if(isset($witr_single_modal['witr_modal_title']) && ! empty($witr_single_modal['witr_modal_title'])){?>
													<h3><?php echo $witr_single_modal['witr_modal_title']; ?></h3>
												<?php }?>
										</div>
										
										<!-- list -->
										<?php if(isset($witr_single_modal['witr_modal_lists']) && ! empty($witr_single_modal['witr_modal_lists'])){?>
											<div class="witr_modal_list">
											<?php echo $witr_single_modal['witr_modal_lists']; ?>
											</div>
										<?php }?>										
									</div>
								</div>					
							</div>
						
					<?php } ?>
						
				<?php } ?>							
		

	<?php							
		
		
		

    } 
	

}