<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; /* Exit if accessed directly */

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Text_widget extends Widget_Base {

    public function get_name() {
        return 'witr_section_t_widget';
    }
    
    public function get_title() {
        return esc_html__( ' Text Widget', 'themex' );
    }
	public function get_style_depends() {
        return [ 'wtextwidget' ];
    }
    public function get_icon() {
        return 'themex_icon eicon-text';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {
		
			/* === witr_pricing start === */
			$this->start_controls_section(
				'witr_field_display_text_widget',
				[
					'label' => esc_html__( ' Text Widget Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);						
			
				/* witr_text_align */					
				$this->add_responsive_control(
					'witr_text_align',
					[
						'label' => esc_html__( 'Box Position', 'themex' ),
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
							'{{WRAPPER}} .witr_text_widget' => 'text-align: {{VALUE}}',
						],
					]
				);
			/* top text widget witr_top_text widget	*/
				$this->add_control(
					'witr_top_text_widget',
					[
						'label' => esc_html__( 'Top Title Text', 'themex' ),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__( 'themex is Awesome !', 'themex' ),
						'separator' => 'before',
						'description' => esc_html__( 'Not use text Title, remove the text from field,highlight text use ex-<span>text</span>', 'themex' ),
						'placeholder' => esc_attr__( 'Type your top text title here', 'themex' ),						
					]
				);
				/* middle text widget witr_middle_text_widget	*/
				$this->add_control(
					'witr_middle_text_widget',
					[
						'label' => esc_html__( 'Middle Title Text', 'themex' ),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__( 'Free to Download for Everyone', 'themex' ),
						'separator' => 'before',
						'description' => esc_html__( 'Not use middle text Title, remove the text from field,highlight text use ex-<span>text</span>', 'themex' ),						
						'placeholder' => esc_attr__( 'Type your middle text Title here', 'themex' ),							
					]
				);
				/* bottom text widget witr_bottom_text widget	*/
				$this->add_control(
					'witr_bottom_text_widget',
					[
						'label' => esc_html__( 'bottom Title Text', 'themex' ),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__( '', 'themex' ),
						'separator' => 'before',
						'description' => esc_html__( 'Not use bottom text Title, remove the text from field,highlight text use ex-<span>text</span>', 'themex' ),
						'placeholder' => esc_attr__( 'Type your bottom text Title here', 'themex' ),
					]
				);
				
				/* text widget content witr_text widget_content */	
				$this->add_control(
					'witr_text_w_content',
					[
						'label' => '',
						'type' => Controls_Manager::WYSIWYG,
						'dynamic' => [
							'active' => true,
						],
						'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'themex' ),
						'separator' => 'before',
					]
				);				
				
					/* witr_show_repeater_list */
					$this->add_control(
						'witr_show_repeat_list',
						[
							'label' => esc_html__( 'Show Repeater', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),							
							'return_value' => 'yes',
							'default' => 'yes',							
						]
					);
					$repeater = new Repeater();	

					/* show icon witr_show_icon witr_icon_item */
					$repeater->add_control(
						'witr_show_icon',
						[
							'label' => esc_html__( 'Show Icon', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),							
							'return_value' => 'yes',
							'default' => 'yes',
							
						]
					);				
					$repeater->add_control(
						'witr_icon_item',
						[
							'label' => esc_html__( 'Icon', 'themex' ),
							'type' => Controls_Manager::ICONS,
							'description' => esc_html__( 'Change icon here, For this, click on the library field', 'themex' ),
							'fa4compatibility' => 'icon',
							'default' => [
								'value' => 'icofont-check',
								'library' => 'fa-solid',
							],
							'condition' => [
								'witr_show_icon' => 'yes',
							],							
						]
					);
						
					/* text widget Content witr_textr_content	*/
					$repeater->add_control(
						'witr_textr_content',
						[
							'label' => esc_html__( 'List', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use List text, remove the text from field', 'themex' ),
							'placeholder' => esc_attr__( 'Type your List Text here', 'themex' ),							
						]
					);
					/* witr_widget_list_link */	
					$repeater->add_control(
						'witr_widget_list_link',
						[
							'label' => esc_html__( 'List Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert List link here.','themex'),
							'placeholder' => esc_attr__( 'https://your-link.com', 'themex' ),
							'show_external' => true,
							
						]
					);					
					
					/* witr_list_text_widget */
					$this->add_control(
						'witr_list_text_widget',
						[
							'label' => esc_html__( 'Repeater List', 'themex' ),
							'type' => Controls_Manager::REPEATER,
							'fields' => $repeater->get_controls(),
							'condition' => [
								'witr_show_repeat_list' => 'yes',
							],							
							'default' => [
											[
												'witr_textr_content' => esc_html__( 'Mectetur adipisicing elit, sed do eiusmod tempor', 'themex' ),
											],
											[
												'witr_textr_content' => esc_html__( 'Adipisicing elit, sed do eiusmod empor', 'themex' ),
											],

							],
							'title_field' => '{{{ witr_textr_content }}}',
						]
					);				

			$this->end_controls_section();
			/*=== end witr_text widget start ====*/
			
			
			
	   /*=====================================================================================================================
										START TO STYLE
		====================================================================================================================*/
			

		/*=== start witr_title style ====*/

		$this->start_controls_section(
			'witr_style_option',
			[
				'label' => esc_html__( 'Top Title Color option', 'themex' ),
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
						'default' => Global_Colors::COLOR_SECONDARY,
					],					
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .witr_text_widget_inner h1' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .witr_text_widget_inner h1:hover' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .witr_text_widget_inner h1',
				]
			);
			/*  Top Tittle width */
			$this->add_responsive_control(
				'witr_top_width',
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
						'{{WRAPPER}} .witr_text_widget_inner h1' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);			
				
			/* title margin */
			$this->add_responsive_control(
				'witr_title_margin',
				[
					'label' => __( 'Title Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_text_widget_inner h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* title padding */
			$this->add_responsive_control(
				'witr_title_padding',
				[
					'label' => __( 'Title Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_text_widget_inner h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_title style ====*/
		

		/*=== start witr_title Middle/Bottom ====*/

		$this->start_controls_section(
			'witr_style_option2',
			[
				'label' => esc_html__( 'Middle/Bottom Text Color Option', 'themex' ),
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
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .witr_text_widget_inner h2' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .witr_text_widget_inner h2:hover' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .witr_text_widget_inner h2',
				]
			);
			/* m/b width */
			$this->add_responsive_control(
				'witr_mb_width',
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
						'{{WRAPPER}} .witr_text_widget_inner h2' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);			
			/* margin */
			$this->add_responsive_control(
				'witr_title margin2',
				[
					'label' => __( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_text_widget_inner h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* padding */
			$this->add_responsive_control(
				'witr_title padding2',
				[
					'label' => __( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_text_widget_inner h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_title Middle/Bottom ====*/


		
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
						'{{WRAPPER}} .witr_text_widget_inner h1 span, {{WRAPPER}} .witr_text_widget_inner h2 span' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .witr_text_widget_inner h1 span:hover, {{WRAPPER}} .witr_text_widget_inner h2 span:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_htpy_color',
					'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
					],
					'selector' => '{{WRAPPER}} .witr_text_widget_inner h1 span, {{WRAPPER}} .witr_text_widget_inner h2 span',
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
						'{{WRAPPER}} .witr_text_widget_inner h1 span, {{WRAPPER}} .witr_text_widget_inner h2 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .witr_text_widget_inner h1 span, {{WRAPPER}} .witr_text_widget_inner h2 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'witr_contents_color',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_TEXT,
					],					
					'selectors' => [
						'{{WRAPPER}} .witr_text_widget p' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_contents_typography',
					'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_TEXT,
					],
					'selector' => '{{WRAPPER}} .witr_text_widget p',
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
						'{{WRAPPER}} .witr_text_widget p' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);			
			/* content margin */
			$this->add_responsive_control(
				'witr_contents_margin',
				[
					'label' => esc_html__( ' Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_text_widget p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* content padding */
			$this->add_responsive_control(
				'witr_contents_padding',
				[
					'label' => esc_html__( ' Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_text_widget p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
		 
		 $this->end_controls_section();
		/*=== end  witr contents style ====*/		
		
		
		
		/*=== start witr List content style ====*/		
		 $this->start_controls_section(
			'witr_option_list_content',
			[
				'label' => esc_html__( 'List Icon/Text Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_show_repeat_list' => ['yes'],
				],				
			]		 
		 );
				/*=== start list_tabs style ====*/
				$this->start_controls_tabs( 'list_colors' );
				
					/*=== start list style ====*/
					$this->start_controls_tab(
						'witr_list_colors_normal',
						[
							'label' => esc_html__( 'Icon', 'themex' ),
						]
					);
		 
						/* Icon Color */
						$this->add_control(
							'witr_primary_color',
							[
								'label' => esc_html__( ' Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								'selectors' => [
									'{{WRAPPER}} .witr_widget_list i' => 'color: {{VALUE}}',
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
									'{{WRAPPER}} .witr_widget_list i' => 'font-size: {{SIZE}}{{UNIT}};',
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
									'{{WRAPPER}} span.witr_list_icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} span.witr_list_icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);		
					$this->end_controls_tab();
					/*=== end list normal style ====*/
				
						/*=== start list hover style ====*/
						$this->start_controls_tab(
							'witr_list_colors_text',
							[
								'label' => esc_html__( 'Text', 'themex' ),
							]
						);		
		

						/* list text color */
						$this->add_control(
							'witr_list_color',
							[
								'label' => esc_html__( ' Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								
								'selectors' => [
									'{{WRAPPER}} .witr_widget_list span' => 'color: {{VALUE}}',
								],
							]
						);
						/* typograohy color */			
						$this->add_group_control(
							Group_Control_Typography::get_type(),
							[
								'name' => 'witr_list_typography',
								'label' => esc_html__( 'Typography', 'themex' ),
								'global' => [
									'default' => Global_Typography::TYPOGRAPHY_TEXT,
								],
								'selector' => '{{WRAPPER}} span.witr_list_text',
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
									'{{WRAPPER}} span.witr_list_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} span.witr_list_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
					$this->end_controls_tab();
					/*=== end list normal style ====*/
						/*=== start list hover style ====*/
						$this->start_controls_tab(
							'witr_list_colors_htext',
							[
								'label' => esc_html__( 'Hover', 'themex' ),
							]
						);
						
						/* witr_list_hcolor */
						$this->add_control(
							'witr_list_hcolor',
							[
								'label' => esc_html__( ' Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								
								'selectors' => [
									'{{WRAPPER}} .witr_widget_list span:hover,{{WRAPPER}} .witr_widget_list li a:hover' => 'color: {{VALUE}}',
								],
							]
						);						
						
					$this->end_controls_tab();
					/*=== end list normal style ====*/						

		 $this->end_controls_section();
		/*=== end  witr repeater content style ====*/		
		

	

		
		
		

     } /* funcition end */

    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();
		
				
				?>
					<!-- text widget center -->
					<div class="witr_text_widget">
						<div class="witr_text_widget_inner">
							<!-- text widget top -->
							<?php if( ! empty($witrshowdata['witr_top_text_widget'])){?>
								<h1><?php echo $witrshowdata['witr_top_text_widget']; ?></h1>		
							<?php } ?>						
							<!-- text widget middle -->
							<?php if( ! empty($witrshowdata['witr_middle_text_widget'])){?>
								<h2><?php echo $witrshowdata['witr_middle_text_widget']; ?></h2>		
							<?php } ?>
							<!-- text widget bottom -->
							<?php if( ! empty($witrshowdata['witr_bottom_text_widget'])){?>
								<h2><?php echo $witrshowdata['witr_bottom_text_widget']; ?></h2>		
							<?php } ?>						
							<!-- content -->
							<?php if( ! empty($witrshowdata['witr_text_w_content'])){?>
								<p><?php echo $witrshowdata['witr_text_w_content']; ?></p>		
							<?php } ?>
							
							<!--- List content --->
							<div class="witr_widget_list">
								<ul>							
									<?php if( ! empty($witrshowdata['witr_list_text_widget'])){
										foreach($witrshowdata['witr_list_text_widget'] as $list_text){
										$target = ! empty($list_text['witr_widget_list_link']['is_external']) ? ' target="_blank"' : '';
										$nofollow = ! empty($list_text['witr_widget_list_link']['nofollow']) ? ' rel="nofollow"' : '';
										?>
											<?php if($list_text['witr_widget_list_link'] ['url']){?> 
												<li><a href="<?php echo $list_text['witr_widget_list_link'] ['url'];?>"<?php echo $target,$nofollow?>>
													<?php if( ! empty($list_text['witr_icon_item'])){?>
														<span class="witr_list_icon"><i class="<?php echo esc_attr( $list_text['witr_icon_item']['value']);?>"></i></span>
													<?php }	?>		
													<span class="witr_list_text"><?php echo $list_text['witr_textr_content']; ?></span>
												</a></li>									
											<?php }else{ ?>
												<li>
													<?php if( ! empty($list_text['witr_icon_item'])){?>
														<span class="witr_list_icon"><i class="<?php echo esc_attr( $list_text['witr_icon_item']['value']);?>"></i></span>
													<?php }	?>
													<span class="witr_list_text"><?php echo $list_text['witr_textr_content']; ?></span>
												</li>
											<?php }	?>									
	
										<?php } ?>		
									<?php } ?>
								</ul>
									
							</div>							
						</div>
					</div>

				<?php


    } /* funcition end */



}