<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_list extends Widget_Base {

    public function get_name() {
        return 'witr_section_list';
    }
    
    public function get_title() {
        return esc_html__( ' List', 'themex' );
    }
    public function get_style_depends() {
        return ['wlist'];
    }	
    public function get_icon() {
        return 'themex_icon eicon-bullet-list';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {
		
			
			

			/* === w_list start === */
			$this->start_controls_section(
				'witr_field_display_list',
				[
					'label' => esc_html__( 'List Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
			
					/* Box Position */			
					$this->add_control(
						'witr_text_ltc',
						[
							'label' => esc_html__( 'Box Position', 'themex' ),
							'type' => Controls_Manager::CHOOSE,
							'default' => 'left',
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
								'{{WRAPPER}} .all_list_color' => 'text-align: {{VALUE}}',
							],							
						]
					);	
							
					/* witr_list_title */	
					$this->add_control(
						'witr_list_title',
						[
							'label' => esc_html__( 'Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use text, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Type Your text Here', 'themex' ),
							'separator'=>'before',
							'placeholder' => esc_attr__( 'Type your list title here', 'themex' ),						
						]
					);
					/* witr_list_title_link */	
					$this->add_control(
						'witr_list_title_link',
						[
							'label' => esc_html__( 'Title Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert Title link here.','themex'),
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'show_external' => true,							
						]
					);

				$repeater = new Repeater();	

				/* witr_show_icon witr_icon_item */
				$repeater->add_control(
					'witr_list_showicon',
					[
						'label' => esc_html__( 'Show Icon', 'themex' ),
						'type' => Controls_Manager::SWITCHER,								
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'separator'=>'before',
						'return_value' => 'yes',
						'default' => 'yes',	
					]
				);			
				/* witr_icon_item */					
				$repeater->add_control(
					'witr_list_ficon',
					[
						'label' => esc_html__( 'Icon', 'themex' ),
						'type' => Controls_Manager::ICONS,
						'description' => esc_html__( 'Change icon here, For this, click on the library field And Not use Icon,Click On The Hide Option', 'themex' ),
						'fa4compatibility' => 'icon',
						'default' => [
							'value' => 'fas fa-angle-double-right',
							'library' => 'fa-solid',
						],
						'condition' => [
							'witr_list_showicon' => 'yes',
						],						
					]
				);
				$repeater->add_control(
					'witr_list_ftitle',
					[
						'label'   => esc_html__( 'List Text', 'themex' ),
						'type'    => Controls_Manager::TEXT,
						'default' => esc_html__( 'List Title One', 'themex' ),
					]
				);
					/* witr_list_link */	
					$repeater->add_control(
						'witr_list_link',
						[
							'label' => esc_html__( ' Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert Title link here.','themex'),
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'show_external' => true,							
						]
					);				
					/* witr_list_tslide */
					$this->add_control(
						'witr_list_lists',
						[
							'label' => esc_html__( 'Item List', 'themex' ),
							'type' => Controls_Manager::REPEATER,
							'fields' => $repeater->get_controls(),
							'default' => [
								[
									'witr_list_ftitle' => esc_html__( 'List Title One', 'themex' ),
								],
								[
									'witr_list_ftitle' => esc_html__( 'List Title One', 'themex' ),
								],
								[
									'witr_list_ftitle' => esc_html__( 'List Title One', 'themex' ),
								],
								
							],
							'title_field' => '{{{ witr_list_ftitle }}}',
						]
					);										
					/* witr_show_button */
					$this->add_control(
						'witr_show_button',
						[
							'label' => esc_html__( 'Show Button', 'themex' ),
							'type' => Controls_Manager::SWITCHER,
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'return_value' => 'yes',
							'default' => 'yes',
							'separator'=>'before',							
						]
					);
					
				/* witr_list_button	*/
					$this->add_control(
						'witr_list_button',
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
								'witr_show_button' => 'yes',
							],							
						]
					);						
		
		
					
			$this->end_controls_section();
			/* === end w_list ===  */

			
	   /*=============================================================================================================================
										START TO STYLE
		=============================================================================================*/			

		/*=== start single Feature style ====*/
		$this->start_controls_section(
			'witr_style_ss_option',
			[
				'label' => esc_html__( 'Single Box', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]
		);		
		
			/* box background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_box_background',
					'label' => esc_html__( 'box Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .all_list_color',
				]
			);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_boxl_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .all_list_color',
					]
				);			
			
				/* witr_border_style */
				$this->add_control(
					'witr_border_box_style',
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
							'{{WRAPPER}} .all_list_color' => 'border-style: {{VALUE}}',
						],
					]
				);		
				/* witr border */
				$this->add_control(
					'witr_borde_box',
					[
						'label' => esc_html__( 'Border', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'selectors' => [
							'{{WRAPPER}} .all_list_color' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						'condition' => [
							'witr_border_box_style' => ['solid','double','dotted','dashed','default'],
						],
					]							
					
				);
				/* border_color */
				$this->add_control(
					'witr_border_box_color',
					[
						'label' => esc_html__( 'Border Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						
						'selectors' => [
							'{{WRAPPER}} .all_list_color' => 'border-color: {{VALUE}}',
						],
						'condition' => [
							'witr_border_box_style' => ['solid','double','dotted','dashed','default'],
						],
					]
				);				
				/* border_radius */
				$this->add_control(
					'witr_borderc_radius',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .all_list_color' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);	
					
				/* Box margin */
				$this->add_responsive_control(
					'witr_box_margin',
					[
						'label' => esc_html__( ' Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .all_list_color' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* Box padding */
				$this->add_responsive_control(
					'witr_box_padding',
					[
						'label' => esc_html__( ' Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .all_list_color' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				
			$this->end_controls_section();
			/* === end single Feature ===  */		
		
		

		/*=== start witr_title style ====*/
		$this->start_controls_section(
			'witr_style_option_title',
			[
				'label' => esc_html__( 'Title Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

				/* witr_text_align */					
				$this->add_responsive_control(
					'witr_title_align',
					[
						'label' => esc_html__( 'Text Align', 'themex' ),
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
							'{{WRAPPER}} .all_list_color h3' => 'text-align: {{VALUE}}',
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
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .all_list_color h3 a,{{WRAPPER}} .all_list_color h3' => 'color: {{VALUE}}',
					],
				]
			);
				/* title background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_title_background',
						'label' => esc_html__( 'Icon Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .all_list_color h3 a,{{WRAPPER}} .all_list_color h3',
					]
				);			
			/* hover color */
			$this->add_control(
				'witr_title_hover_color',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .all_list_color h3 a:hover,{{WRAPPER}} .all_list_color h3:hover' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .all_list_color h3 a,{{WRAPPER}} .all_list_color h3',
				]
			);		
				/* border_radius */
				$this->add_control(
					'witr_title_radius',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .all_list_color h3 a,{{WRAPPER}} .all_list_color h3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
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
						'{{WRAPPER}} .all_list_color h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_list_color h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_title style ====*/
		
		
		/*=== start witr list style ====*/
		$this->start_controls_section(
			'witr_style_option_list',
			[
				'label' => esc_html__( ' List Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	
			/*=== start button_tabs style ====*/
			$this->start_controls_tabs( 'list_colors' );
			
				/*=== start button_normal style ====*/
				$this->start_controls_tab(
					'witr_list_colors_normal',
					[
						'label' => esc_html__( 'Normal', 'themex' ),
					]
				);
					/* color */
					$this->add_control(
						'witr_list_color',
						[
							'label' => esc_html__( 'Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'global' => [
								'default' => Global_Colors::COLOR_SECONDARY,
							],							
							'separator'=>'before',
							'selectors' => [
								'{{WRAPPER}} .all_list_color ul li a,{{WRAPPER}} .all_list_color ul li span' => 'color: {{VALUE}}',
							],
						]
					);
					/* list background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_list_background',
							'label' => esc_html__( 'list Background', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .all_list_color ul li a,{{WRAPPER}} .all_list_color ul li span',
						]
					);
					/* box shadow color */	
					$this->add_group_control(
						Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'witr_boxli_shadow',
							'label' => esc_html__( 'Box Shadow', 'themex' ),
							'selector' => '{{WRAPPER}} .all_list_color ul li a,{{WRAPPER}} .all_list_color ul li span',
						]
					);					
					/* typograohy color */			
					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'witr_list_typography',
							'label' => esc_html__( 'Typography', 'themex' ),
							'global' => [
								'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
							],
							'selector' => '{{WRAPPER}} .all_list_color ul li a,{{WRAPPER}} .all_list_color ul li span',
						]
					);		
						/* witr_border_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_borderl_style',
								'label' => esc_html__( 'Icon Border', 'themex' ),								
								'selector' => '{{WRAPPER}} .all_list_color ul li a,{{WRAPPER}} .all_list_color ul li span',
							]
						);
					
						/* border_radius */
						$this->add_control(
							'witr_borderl_radius',
							[
								'label' => esc_html__( 'Border Radius', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .all_list_color ul li a,{{WRAPPER}} .all_list_color ul li span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
								],
							]
						);			
					/* list margin */
					$this->add_responsive_control(
						'list_margin',
						[
							'label' => esc_html__( 'Margin', 'themex' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors' => [
								'{{WRAPPER}} .all_list_color ul li a,{{WRAPPER}} .all_list_color ul li span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					/* list padding */
					$this->add_responsive_control(
						'list_padding',
						[
							'label' => esc_html__( 'Padding', 'themex' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors' => [
								'{{WRAPPER}} .all_list_color ul li a,{{WRAPPER}} .all_list_color ul li span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
				
					
					
				$this->end_controls_tab();
				/*=== end List normal style ====*/
		
				/*=== start List hover style ====*/
				$this->start_controls_tab(
					'witr_list_colors_hover',
					[
						'label' => esc_html__( 'List Hover', 'themex' ),
					]
				);			
			
			
						/* Hover color */
						$this->add_control(
							'witr_listh_color',
							[
								'label' => esc_html__( 'Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .all_list_color ul li a:hover,{{WRAPPER}} .all_list_color ul li span:hover' => 'color: {{VALUE}}',
								],
							]
						);

						/* list background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_listha_background',
								'label' => esc_html__( 'list Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .all_list_color ul li a:hover,{{WRAPPER}} .all_list_color ul li span:hover',
							]
						);
					/* box shadow color */	
					$this->add_group_control(
						Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'witr_boxlih_shadow',
							'label' => esc_html__( 'Box Shadow', 'themex' ),
							'selector' => '{{WRAPPER}} .all_list_color ul li a:hover,{{WRAPPER}} .all_list_color ul li span:hover',
						]
					);						
						/* witr_border_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_borderlh_style',
								'label' => esc_html__( 'Icon Border', 'themex' ),								
								'selector' => '{{WRAPPER}} .all_list_color ul li a:hover,{{WRAPPER}} .all_list_color ul li span:hover',
							]
						);
					
						/* border_radius */
						$this->add_control(
							'witr_borderlh_radius',
							[
								'label' => esc_html__( 'Border Radius', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .all_list_color ul li a:hover,{{WRAPPER}} .all_list_color ul li span:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
								],
							]
						);
						

					$this->end_controls_tab();
					/*=== end List normal style ====*/	

				/*=== start icon_normal style ====*/
				$this->start_controls_tab(
					'witr_icon_colors_span',
					[
						'label' => esc_html__( 'Icon or Text', 'themex' ),
					]
				);
				/* witr_position_style */
				$this->add_responsive_control(
					'witr_position_icon',
					[
						'label' => esc_html__( 'Icon Position', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'' => esc_html__( 'Default', 'themex' ),
							'left' => esc_html__( 'Left', 'themex' ),
							'right' => esc_html__( 'Right', 'themex' ),
						],
						'selectors' => [
							'{{WRAPPER}} .all_list_color ul li a i,{{WRAPPER}} .all_list_color ul li span i' => 'float: {{VALUE}};',
						],							
					]
				);				
				/* Icon Color */
				$this->add_control(
					'witr_span_color',
					[
						'label' => esc_html__( ' Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .all_list_color ul li a i,{{WRAPPER}} .all_list_color ul li span i' => 'color: {{VALUE}}',
						],					
					]
				);
				
				/* Icon background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_span_background',
						'label' => esc_html__( 'Icon Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .all_list_color ul li a i,{{WRAPPER}} .all_list_color ul li span i',
					]
				);
				
				/*  icon font size */
				$this->add_responsive_control(
					'icon_size_span',
					[
						'label' => esc_html__( ' Size', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .all_list_color ul li a i,{{WRAPPER}} .all_list_color ul li span i' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);
				
				/*  icon width */
				$this->add_responsive_control(
					'witr_icon_width_span',
					[
						'label' => esc_html__( 'width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .all_list_color ul li a i,{{WRAPPER}} .all_list_color ul li span i' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon height */
				$this->add_responsive_control(
					'witr_icon_height_span',
					[
						'label' => esc_html__( 'Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .all_list_color ul li a i,{{WRAPPER}} .all_list_color ul li span i' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon line height */
				$this->add_responsive_control(
					'witr_icon_line_height_span',
					[
						'label' => esc_html__( 'Line Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .all_list_color ul li a i,{{WRAPPER}} .all_list_color ul li span i' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/* witr_text_align */					
				$this->add_responsive_control(
					'witr_text_align_span',
					[
						'label' => esc_html__( 'Text Align', 'themex' ),
						'type' => Controls_Manager::CHOOSE,
						'default' => 'center',
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
							'{{WRAPPER}} .all_list_color ul li a i,{{WRAPPER}} .all_list_color ul li span i' => 'text-align: {{VALUE}}',
						],
					]
				);				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_borde_span',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .all_list_color ul li a i,{{WRAPPER}} .all_list_color ul li span i',
					]
				);
				/* border_radius */
				$this->add_control(
					'witr_border_radius_span',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .all_list_color ul li a i,{{WRAPPER}} .all_list_color ul li span i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
					
				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow_span',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .all_list_color ul li a i,{{WRAPPER}} .all_list_color ul li span i',
					]
				);					
				/*  Rotate */
				$this->add_responsive_control(
					'witr_rotate_span',
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
							'{{WRAPPER}} .all_list_color ul li a i,{{WRAPPER}} .all_list_color ul li span i' => 'transform: rotate({{SIZE}}{{UNIT}});',
						],
					]
				);				
				
				/* icon margin */
				$this->add_responsive_control(
					'witr_icon_margin_span',
					[
						'label' => esc_html__( ' Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .all_list_color ul li a i,{{WRAPPER}} .all_list_color ul li span i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* icon padding */
				$this->add_responsive_control(
					'witr_icon_padding_span',
					[
						'label' => esc_html__( ' Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .all_list_color ul li a i,{{WRAPPER}} .all_list_color ul li span i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		
				

				$this->end_controls_tab();
				/*=== end icon normal style ====*/
			
					/*=== start icon hover style ====*/
					$this->start_controls_tab(
						'witr_icon_span_hover',
						[
							'label' => esc_html__( 'Icon or Text Hover', 'themex' ),
						]
					);
					/*  primary hover color */
					$this->add_control(
						'witr_hover_span_color',
						[
							'label' => esc_html__( ' Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .all_list_color ul li a i:hover,{{WRAPPER}} .all_list_color ul li span i:hover' => 'color: {{VALUE}}',
							],
						]
					);
					/* hover Icon background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_hover_icon_span',
							'label' => esc_html__( ' Hover Background', 'themex' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .all_list_color ul li a i:hover,{{WRAPPER}} .all_list_color ul li span i:hover',
						]
					);
					/* border_hover_color */
					$this->add_control(
						'witr_border_hover_color_span',
						[
							'label' => esc_html__( 'Border Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							
							'selectors' => [
								'{{WRAPPER}} .all_list_color ul li a i:hover,{{WRAPPER}} .all_list_color ul li span i:hover' => 'border-color: {{VALUE}}',
							],
						]
					);					

					$this->end_controls_tab();
				$this->end_controls_tabs();						
		 $this->end_controls_section();
		/*=== end  witr list style ====*/
		

		
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
								'{{WRAPPER}} .departmentList .discover_more' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .departmentList .discover_more',
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
							'selector' => '{{WRAPPER}} .departmentList .discover_more',
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
								'{{WRAPPER}} .departmentList .discover_more' => 'border-style: {{VALUE}}',
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
								'{{WRAPPER}} .departmentList .discover_more' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .departmentList .discover_more' => 'border-color: {{VALUE}}',
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
								'{{WRAPPER}} .departmentList .discover_more' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .departmentList .discover_more' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .departmentList .discover_more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .departmentList .discover_more:hover' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .departmentList .discover_more:hover',
						]
					);
					/* witr_hoverborder_style */
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'witr_hoverborder_style',
							'label' => esc_html__( 'Button Hover Border', 'themex' ),
							'selector' => '{{WRAPPER}} .departmentList .discover_more:hover',
						]
					);
					
					
					
					$this->end_controls_tab();
					/*=== end button hover style ====*/
			$this->end_controls_tabs();
			/*=== end button_tabs style ====*/			
		 $this->end_controls_section();
		/*=== end  witr button style ====*/		

			

    } /* function end */

	
	
	
    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();
		
		$target = ! empty($witrshowdata['witr_list_title_link']['is_external']) ? ' target="_blank"' : '';
		$nofollow = ! empty($witrshowdata['witr_list_title_link']['nofollow']) ? ' rel="nofollow"' : '';		
		$target_btn = ! empty($witrshowdata['witr_button_link']['is_external']) ? ' target="_blank"' : '';
		$nofollow_btn = ! empty($witrshowdata['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';

		?>
		
			<div class="departmentList all_list_color">
				<!-- title -->
				<?php if(! empty($witrshowdata['witr_list_title'])){
					if($witrshowdata['witr_list_title_link'] ['url']){?> 
						<h3><a href="<?php echo $witrshowdata['witr_list_title_link'] ['url'];?>"<?php echo $target,$nofollow?>>
						<?php echo $witrshowdata['witr_list_title']; ?></a></h3>
					<?php }else{ ?>
				<h3><?php echo $witrshowdata['witr_list_title']; ?> </h3>
				<?php } } ?>

					<ul>
					<?php if(! empty($witrshowdata['witr_list_lists'])){?>
						<?php foreach($witrshowdata['witr_list_lists'] as $witr_list){ 
						$target_list = ! empty($witr_list['witr_list_link']['is_external']) ? ' target="_blank"' : '';
						$nofollow_list = ! empty($witr_list['witr_list_link']['nofollow']) ? ' rel="nofollow"' : '';
						?>
							<li>
								<?php if($witr_list['witr_list_link'] ['url']){?> 
									<a href="<?php echo $witr_list['witr_list_link'] ['url'];?>"<?php echo $target_list,$nofollow_list?>>
										<?php if($witr_list['witr_list_showicon']=='yes'){ ?>
											<i class="<?php echo esc_attr( $witr_list['witr_list_ficon']['value']);?>"></i>
										<?php } 
										echo $witr_list['witr_list_ftitle']; ?></a>
								<?php }else{ ?>
								<span>
									<?php if($witr_list['witr_list_showicon']=='yes'){ ?>
										<i class="<?php echo esc_attr( $witr_list['witr_list_ficon']['value']);?>"></i>
									<?php } 
									echo $witr_list['witr_list_ftitle']; ?>
								</span>
							</li>
						<?php } } 
						} ?>					
					</ul>					
				<!-- button -->
				<?php if(! empty($witrshowdata['witr_list_button'])){?>
					<a class="discover_more" href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>>
					<?php echo $witrshowdata['witr_list_button']; ?></a>
				<?php } ?>				
			</div>		

		<?php		

    } 
	



}