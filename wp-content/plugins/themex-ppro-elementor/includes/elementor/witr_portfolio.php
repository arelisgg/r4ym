<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Portfolio extends Widget_Base {

    public function get_name() {
        return 'witr_portfolio_section';
    }
    
    public function get_title() {
        return esc_html__( ' Post Portfolio', 'themex' );
    }

    public function get_icon() {
        return 'themex_icon eicon-gallery-grid';
    }
    public function get_style_depends() {
        return ['wportfolio'];
    }		
    public function get_script_depends() {
        return ['imagesloaded'];
    }	
    public function get_categories() {
        return [ 'witr_tname' ];
    }

	public function get_keywords() {
		return [ 'icon' ];
	}
    protected function register_controls() {

		/*=== witr portfolio options ====*/
        $this->start_controls_section(
            'witr_portfolio_option',
            [
                'label' => esc_html__( 'Portfolio Options', 'themex' ),
            ]
        );
		
		
			/* portfolio style witr_style_portfolio */
			$this->add_control(
				'witr_style_portfolio',
				[
					'label' => esc_html__( 'Portfolio style', 'themex' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'1' => esc_html__( 'Portfolio style 1', 'themex' ),
						'2' => esc_html__( 'Portfolio style 2', 'themex' ),
						'3' => esc_html__( 'Portfolio style 3', 'themex' ),
						'4' => esc_html__( 'Portfolio style 4', 'themex' ),
						'5' => esc_html__( 'Portfolio style 5', 'themex' ),
					],
					'default' => '3',
				]
			);
			
			/* === witr_preview start === */
			$this->add_control(
				'witr_preview',
				[
					'label' => esc_html__( 'Please you can see the preview page filter work.', 'themex' ),
					'type' => Controls_Manager::HEADING,						
				]
			);
			
			/* portfolio iten show witr_post_per_page */
            $this->add_control(
                'witr_post_per_page',
                [
                    'label' => __( 'Show Number Of portfolio', 'themex' ),
                    'type' => Controls_Manager::NUMBER,				
                    'separator' => 'before',
                    'min' => 1,
                    'max' => 500,
                    'step' => 1,
                    'default' => 3,
                ]
            );
			/* portfolio show witr_adc_portfolio */
 			$this->add_control(
				'witr_adc_portfolio',
				[
					'label' => esc_html__( 'Portfolio ASC/DSC style', 'themex' ),
					'type' => Controls_Manager::SELECT,
                    'separator' => 'before',					
					'options' => [
						'DESC'	=> esc_html__( 'Descending', 'themex' ),
						'ASC'	=> esc_html__( 'Ascending', 'themex' )
					],
					'default' => 'DESC',
				]
			);
			/* portfolio column witr_column_grid */
            $this->add_control(
                'witr_column_grid',
                [
                    'label' => esc_html__( 'Set Columns', 'themex' ),
                    'type' => Controls_Manager::SELECT,
					'description' =>"set your column from here",
                    'separator' => 'before',					
                    'default' => '4',
                    'options' => [
                        '12' => esc_html__( '1', 'themex' ),
                        '6' => esc_html__( '2', 'themex' ),
                        '4' => esc_html__( '3', 'themex' ),
                        '3' => esc_html__( '4', 'themex' ),
                        '2' => esc_html__( '6', 'themex' ),
                    ],
                ]
            );
		
			/* portfolio button witr_portfolio_button */			
            $this->add_control(
                'witr_portfolio_button',
                [
                    'label' => esc_html__( 'Filter Text', 'themex' ),
                    'type' => Controls_Manager::TEXT,
                    'separator' => 'before',					
					'description' => esc_html__( 'change all work to your own text', 'themex' ),
					'placeholder' => esc_attr__( 'ex - All Work', 'themex' ),
                    'default' => esc_html__( 'All Work', 'themex' ),
                ]
            );	
			$this->add_control(
				'witr_iicon',
				[
					'label' => esc_html__( 'Show Image Icon', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
                    'separator' => 'before',					
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);
			$this->add_control(
				'witr_licon',
				[
					'label' => esc_html__( 'Show Link Icon', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
                    'separator' => 'before',					
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);
			$this->add_control(
				'witr_yicon',
				[
					'label' => esc_html__( 'Show Youtube Icon', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
                    'separator' => 'before',					
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);
				/* youtube_url */
				$this->add_control(
					'witr_yicon_link',
					[
						'label' => esc_html__( 'Link', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'placeholder' => esc_html__( 'Enter your URL', 'themex' ),
						'default' => 'https://youtu.be/BS4TUd7FJSg',
						'label_block' => true,
						'condition' => [
							'witr_yicon' => 'yes',
						],
					]
				);									
			$this->add_control(
				'witr_vicon',
				[
					'label' => esc_html__( 'Show Vimeo Icon', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
                    'separator' => 'before',					
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);	
				/* vimeo_url */
				$this->add_control(
					'witr_vicon_link',
					[
						'label' => esc_html__( 'Link', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'placeholder' => esc_html__( 'Enter your URL', 'themex' ),
						'default' => 'https://vimeo.com/235215203',
						'label_block' => true,
						'condition' => [
							'witr_vicon' => 'yes',
						],
					]
				);					
			$this->add_control(
				'witr_cttext',
				[
					'label' => esc_html__( 'Show Category', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
                    'separator' => 'before',					
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);
			

			
			/* gutter  witr_gutter_column */
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
				]
			);
			/* gutter  witr_gutter_column */
			$this->add_control(
				'witr_filder_show',
				[
					'label' => esc_html__( 'Show Filter Menu', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
                    'separator' => 'before',					
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);
			
			/* pagination  witr_pagination */
			$this->add_control(
				'witr_pagination',
				[
					'label' => esc_html__( 'Show Pagination', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
                    'separator' => 'before',					
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);	           

        $this->end_controls_section();
		/*=== witr portfolio options end ====*/

		
		
	   /*===========================================================================================
										START TO STYLE
		=============================================================================================*/		
		
		








		

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
					'separator'=>'before',				
					'selectors' => [
						'{{WRAPPER}} .prot_content h3 a' => 'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
				'witr_title_hover_color',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',
					
					'selectors' => [
						'{{WRAPPER}} .prot_content h3 a:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_ttpy_color',
					'label' => esc_html__( 'Typography', 'themex' ),
					
					'selector' => '{{WRAPPER}} .prot_content h3 a',
				]
			);						
			/* title margin */
			$this->add_responsive_control(
				'witr_title_margin',
				[
					'label' => __( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'separator'=>'before',
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .prot_content h3 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* title padding */
			$this->add_responsive_control(
				'witr_title_padding',
				[
					'label' => __( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'separator'=>'before',
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .prot_content h3 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_title style ====*/


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
					
					'selectors' => [
						'{{WRAPPER}} .pstyle_1 .porttitle_inner p span' => 'color: {{VALUE}}',
					],
				]
			);

			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_content_typography',
					'label' => esc_html__( 'Typography', 'themex' ),
					
					'selector' => '{{WRAPPER}} .prot_content p span',
				]
			);		

			/* content margin */
			$this->add_responsive_control(
				'witr_content_margin',
				[
					'label' => __( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'separator'=>'before',
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .prot_content p span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* content padding */
			$this->add_responsive_control(
				'witr_content_padding',
				[
					'label' => __( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'separator'=>'before',
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .prot_content p span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr content style ====*/
		
		
		/*=== start witr_icon style ====*/
		$this->start_controls_section(
			'witr_style_icon_option',
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
				/* Icon Color */
				$this->add_control(
					'witr_primary_color',
					[
						'label' => esc_html__( 'Icon Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',
						
						'selectors' => [
							'{{WRAPPER}} .picon a' => 'color: {{VALUE}}',
						],						
					]
				);
				
				/*  icon font size */
				$this->add_responsive_control(
					'icon_size',
					[
						'label' => esc_html__( 'Icon Size', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', 'em' ],
						'separator'=>'before',
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .picon a' => 'font-size: {{SIZE}}{{UNIT}};',
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
						'separator'=>'before',
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .picon a' => 'width: {{SIZE}}{{UNIT}};',
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
						'separator'=>'before',
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .picon a' => 'height: {{SIZE}}{{UNIT}};',
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
						'separator'=>'before',
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .picon a' => 'line-height: {{SIZE}}{{UNIT}};',
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
						'selector' => '{{WRAPPER}} .picon a',
					]
				);				
				/* witr_text_align */					
				$this->add_responsive_control(
					'witr_text_align',
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
							'{{WRAPPER}} .picon a' => 'text-align: {{VALUE}}',
						],
					]
				);
				

				/* witr_border_style */
				$this->add_control(
					'witr_border_style',
					[
						'label' => esc_html__( 'Border Style', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'options' => [
							'none' => esc_html__( 'none', 'themex' ),
							'solid' => esc_html__( 'Solid', 'themex' ),
							'double' => esc_html__( 'Double', 'themex' ),
							'dotted' => esc_html__( 'Dotted', 'themex' ),
							'dashed' => esc_html__( 'Dashed', 'themex' ),
						],
						'default' => ' ',
						'selectors' => [
							'{{WRAPPER}} .picon a' => 'border-style: {{VALUE}}',
						],
					]
				);		
				/* witr border */
				
				$this->add_control(
					'witr_border',
					[
						'label' => esc_html__( 'Border', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'separator'=>'before',
						'selectors' => [
							'{{WRAPPER}} .picon a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* border_color */
				$this->add_control(
					'witr_border_color',
					[
						'label' => esc_html__( 'Border Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',
						
						'selectors' => [
							'{{WRAPPER}} .picon a' => 'border-color: {{VALUE}}',
						],
					]
				);
				/* border_radius */
				$this->add_control(
					'witr_border_radius',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'separator'=>'before',
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .picon a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
					
				/* blend mode style color */				
				$this->add_control(
					'witr_icon_blend_mode',
					[
						'label' => esc_html__( 'Blend Mode', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
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
							'{{WRAPPER}} .picon a' => 'mix-blend-mode: {{VALUE}}',
						],
						'separator' => 'none',
					]
				);				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .picon a',
					]
				);

				/*  Rotate */
				$this->add_responsive_control(
					'witr_rotate',
					[
						'label' => esc_html__( 'Rotate', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'separator'=>'before',
						'separator'=>'before',
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
							'{{WRAPPER}} .picon a' => 'transform: rotate({{SIZE}}{{UNIT}});',
						],
					]
				);				
				
				/* icon margin */
				$this->add_responsive_control(
					'witr_icon_margin',
					[
						'label' => esc_html__( 'Icon Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'separator'=>'before',
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .picon a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* icon padding */
				$this->add_responsive_control(
					'witr_icon_padding',
					[
						'label' => esc_html__( 'Icon Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'separator'=>'before',
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .picon a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					/*  icon hover color */
					$this->add_control(
						'witr_hover_primary_color',
						[
							'label' => esc_html__( 'Icon Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .picon a:hover' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .picon a:hover',
						]
					);
					
					/* border_hover_color */
					$this->add_control(
						'witr_hover_border_color',
						[
							'label' => esc_html__( 'Border Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							
							'selectors' => [
								'{{WRAPPER}} .picon a:hover' => 'border-color: {{VALUE}}',
							],
						]
					);					

					$this->end_controls_tab();					
			$this->end_controls_tabs();
		$this->end_controls_section();

		/*=== end witr_icon style ====*/


		
		

		/*=== Start Witr filter style ====*/

		$this->start_controls_section(
			'witr_style_filter_option',
			[
				'label' => esc_html__( ' Filter Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
				/*=== start button_tabs style ====*/
				$this->start_controls_tabs( 'filter_colors' );
				
					/*=== start button_normal style ====*/
					$this->start_controls_tab(
						'witr_filter_colors_tab',
						[
							'label' => esc_html__( 'Filter', 'themex' ),
						]
					);		
		
					/* witr_align */					
					$this->add_responsive_control(
						'witr_align',
						[
							'label' => __( ' Alignment Filter', 'themex' ),
							'type' => Controls_Manager::CHOOSE,
							'separator'=>'before',
							'default' => 'center',
							'options' => [
								'left' => [
									'title' => __( 'Left', 'themex' ),
									'icon' => 'eicon-text-align-left',
								],
								'center' => [
									'title' => __( 'Center', 'themex' ),
									'icon' => 'eicon-text-align-center',
								],
								'right' => [
									'title' => __( 'Right', 'themex' ),
									'icon' => 'eicon-text-align-right',
								],
								'justify' => [
									'title' => __( 'Justified', 'themex' ),
									'icon' => 'eicon-text-align-justify',
								],
							],
							'prefix_class' => 'wittr_pfilter_menu%s--align-',
							'selectors' => [
								'{{WRAPPER}} .portfolio_nav' => 'text-align: {{VALUE}}',
							],
						]
					);		
						/* filter Color */
						$this->add_control(
							'witr_filter_color',
							[
								'label' => esc_html__( 'Filter Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .portfolio_nav ul li' => 'color: {{VALUE}}',
								],
								
							]
						);
						/* Filter background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_filth_background',
								'label' => esc_html__( 'Filter Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .portfolio_nav ul li',
							]
						);				
						/* typograohy color */			
						$this->add_group_control(
							Group_Control_Typography::get_type(),
							[
								'name' => 'witr_filter_ttpy_color',
								'label' => esc_html__( 'Typography', 'themex' ),
								
								
								'selector' => '{{WRAPPER}} .portfolio_nav ul li',
							]
						);
					
						/* witr_border_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_filter_border',
								'label' => esc_html__( 'Border', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .portfolio_nav ul li',
							]
						);				
						/* border_radius */
						$this->add_control(
							'witr_border_radius1',
							[
								'label' => esc_html__( 'Filter Border Radius', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .portfolio_nav ul li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/* filter margin */
						$this->add_responsive_control(
							'witr_filter_margin',
							[
								'label' => esc_html__( 'Filter Margin', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .portfolio_nav ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/* Filter padding */
						$this->add_responsive_control(
							'witr_filter_padding',
							[
								'label' => esc_html__( 'Filter Padding', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .portfolio_nav ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);				
				
					$this->end_controls_tab();
					/*=== end filter normal style ====*/
				
					/*=== start filter hover style ====*/
					$this->start_controls_tab(
						'witr_filter_tab_hover',
						[
							'label' => esc_html__( ' Hover', 'themex' ),
						]
					);				
			
						/* filter hover color */
						$this->add_control(
							'witr_filter_hover_color',
							[
								'label' => esc_html__( 'Filter Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								'selectors' => [
									'{{WRAPPER}} .portfolio_nav ul li:hover' => 'color: {{VALUE}}',
								],
							]
						);			
						/* Filter background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_filter_background',
								'label' => esc_html__( 'Filter Background Hover', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .portfolio_nav ul li:hover',
							]
						);
						
					$this->end_controls_tab();
					/*=== end filter hover style ====*/
						
					/*=== start active style ====*/
					$this->start_controls_tab(
						'witr_filter_colors_active',
						[
							'label' => esc_html__( 'Active', 'themex' ),							
						]
					);				
						/* filter active color */
						$this->add_control(
							'witr_filter_active_color',
							[
								'label' => esc_html__( 'Filter Active Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								'selectors' => [
									'{{WRAPPER}} .portfolio_nav ul li.current_menu_item' => 'color: {{VALUE}}',
								],
							]
						);			
						
						/* Active border_color */
						$this->add_control(
							'witr_active_border_color',
							[
								'label' => esc_html__( 'Active Border Color', 'themex' ),
								'type' => Controls_Manager::COLOR,						
								'selectors' => [
									'{{WRAPPER}} .portfolio_nav ul li.current_menu_item' => 'border-color: {{VALUE}}',
								],
							]
						);				
						/* border_radius */
						$this->add_control(
							'witr_borders_radius',
							[
								'label' => esc_html__( 'Active Border Radius', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .portfolio_nav ul li.current_menu_item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/* Active Filter background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_active_filter_background',
								'label' => esc_html__( 'Active Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .portfolio_nav ul li.current_menu_item',
							]
						);				

				
				
					$this->end_controls_tab();
				$this->end_controls_tabs();					
		 $this->end_controls_section();
		/*=== end  witr Filter Text style ====*/		


		/*=== witr_background_option  ====*/
		$this->start_controls_section(
			'witr_background_option',
			[
				'label' => esc_html__( 'Background Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	


				/* heading */
				$this->add_control(
					'witr_imagehover',
					[
						'label' => esc_html__( 'Image Overlay BG', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator'=>'before',
					]
				);		
		
		
				/* single portfolio background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_port_background',
						'label' => esc_html__( 'Portfolio Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .prot_content',
					]
				);			

				/* heading */
				$this->add_control(
					'witr_titlehover',
					[
						'label' => esc_html__( 'Title Overlay BG', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator'=>'before',
						'condition' => [
							'witr_style_portfolio' => ["4"],
						],
					]
				);				
				/* single portfolio background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_titleh_background',
						'label' => esc_html__( 'Title Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .prot_content_inner',
						'condition' => [
							'witr_style_portfolio' => ["4"],
						],						
					]
				);			
						
        $this->end_controls_section();
		/*=== witr_background_option ====*/				
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
    } /* function end */

    protected function render( $instance = [] ) {

        $witrshowdata = $this->get_settings_for_display();

        $witr_post_per_page       = ! empty( $witrshowdata['witr_post_per_page'] ) ? $witrshowdata['witr_post_per_page'] : 2;
        $witr_adc_portfolio    = ! empty( $witrshowdata['witr_adc_portfolio'] ) ? $witrshowdata['witr_adc_portfolio'] : 'DESC';
        $witr_title_length    = ! empty( $witrshowdata['witr_title_length'] ) ? $witrshowdata['witr_title_length'] : 5;
        $witr_content_length  = ! empty( $witrshowdata['witr_content_length'] ) ? $witrshowdata['witr_content_length'] : 20;      
        $witr_gutter_column  =  $witrshowdata['witr_gutter_column']=='yes'  ? 'witr_all_pd0' : 'witr_all_mb_30'; 
		$pyoutube=$witrshowdata['witr_yicon_link'];
		$pvimeo=$witrshowdata['witr_vicon_link'];
		$page = ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );
		$paged = ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : $page );	
	
		
                        $args = array(
                            'post_type'            => 'em_portfolio',
                            'post_status'          => 'publish',
                            'ignore_sticky_posts'  => 1,
                            'posts_per_page'       => $witr_post_per_page,
                            'order'                => $witr_adc_portfolio,
							'paged'     => $paged,
							'page'      => $paged
                        );
					$the_query = new \WP_Query($args);
					
					

		if($witrshowdata['witr_filder_show']=='yes'){?>				
		<div class="clearfix row kicuakta">
			<div class="col-md-12">
				<div class="portfolio_nav  wittr_pfilter_menu">
					<ul id="filter" class="filter_menu ">
						<li class="current_menu_item" data-filter="*" ><?php if( !empty( $witrshowdata['witr_portfolio_button'] ) ){echo $witrshowdata['witr_portfolio_button'];}?></li>
					<?php 	
					$witr_categories = get_terms('em_portfolio_cat');
						foreach ( $witr_categories as $single_category ) {
							if($single_category !=''){?>
								<li   data-filter=".<?php echo esc_attr( $single_category->slug );?>"><?php echo esc_html( $single_category->name );?></li>
						<?php }}?>
					</ul>
				</div>
			</div>				
		</div>			
		<?php }
   
		switch( $witrshowdata['witr_style_portfolio']){
			case '5':
			?>
			<div class="pstyle2">				
				<div class="row" id="em_load" >		
					<?php while ($the_query->have_posts()) : $the_query->the_post(); 					
						$terms = get_the_terms(get_the_ID(), 'em_portfolio_cat');?>
						<!-- single portfolio -->
					<div class="col-lg-<?php if( !empty( $witrshowdata['witr_column_grid'] ) ){echo $witrshowdata['witr_column_grid'];}?>  eportfolio_item col-md-6 col-xs-12 col-sm-12 <?php foreach( $terms as $single_slug){echo $single_slug->slug. ' ';}?>   <?php echo $witr_gutter_column; ?>" >
						<div class="single_protfolio">
							<div class="prot_thumb">								
								<?php the_post_thumbnail('themex-gallery-thumb');?>								
								<div class="prot_content">
									<div class="prot_content_inner">									
										<div class="picon">
											<?php if($witrshowdata['witr_iicon']=='yes'){?> 
											<a class="portfolio-icon venobox" data-gall="myGallery" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' );?>"><i class="icofont-image"></i></a>
											<?php }
											if($witrshowdata['witr_licon']=='yes'){?> 
											<a href="<?php the_permalink(); ?>"><i class="icofont-link"></i></a>
											<?php }
											
											if($witrshowdata['witr_yicon']=='yes'){?> 
											<a class="video-vemo-icon venobox" data-vbtype="youtube" data-autoplay="true" data-gall="gall-video" href="<?php echo esc_url($pyoutube ); ?>">
											<i class="icofont-youtube-play"></i></a>
											<?php }
											if($witrshowdata['witr_vicon']=='yes'){?> 
											<a class="video-vemo-icon venobox" data-vbtype="vimeo" data-autoplay="true" data-gall="gall-video" href="<?php echo esc_url($pvimeo ); ?>"><i class="icofont-vimeo"></i>
											</a>
											<?php } ?>
										</div>
										<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
										
										<?php if($witrshowdata['witr_cttext']=='yes'){
											if( $terms ){
												echo "<p>";
												foreach( $terms as $single_slugs ){?>
												<span class="category-item-p">
												   <?php echo $single_slugs->name ;?>
												</span>																			
												<?php }
											echo "</p>"; 
											}}?>								
									</div>
								</div>	
							</div>				
						</div>
					</div>
					<?php endwhile; ?>	
					<?php wp_reset_query(); ?>
				</div>
			</div>					

			<?php			
			break;
			case '4':
			?>
			<div class=" pstyle2 pstyle3">		
				<div class="row" id="em_load" >	
					<?php while ($the_query->have_posts()) : $the_query->the_post(); 
						$terms = get_the_terms(get_the_ID(), 'em_portfolio_cat');?>
						<!-- single portfolio -->
						<div class="col-lg-<?php if( !empty( $witrshowdata['witr_column_grid'] ) ){echo $witrshowdata['witr_column_grid'];}?>  eportfolio_item col-md-6 col-xs-12 col-sm-12 <?php foreach( $terms as $single_slug){echo $single_slug->slug. ' ';}?>   <?php echo $witr_gutter_column; ?>" >
							<div class="single_protfolio">
								<div class="prot_thumb">
									<?php the_post_thumbnail();?>
									<div class="prot_content">
										<div class="prot_content_inner">										
											<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
										<?php if($witrshowdata['witr_cttext']=='yes'){
											if( $terms ){
												echo "<p>";
												foreach( $terms as $single_slugs ){?>
												<span class="category-item-p">
												   <?php echo $single_slugs->name ;?>
												</span>																			
												<?php }
											echo "</p>"; 
											}}?>			
										</div>
									</div>
									<div class="em_plus_port">									
										<div class="picon">
											<?php if($witrshowdata['witr_iicon']=='yes'){?> 
											<a class="portfolio-icon venobox" data-gall="myGallery" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' );?>"><i class="icofont-image"></i></a>
											<?php }
											if($witrshowdata['witr_licon']=='yes'){?> 
											<a href="<?php the_permalink(); ?>"><i class="icofont-link"></i></a>
											<?php }
											if($witrshowdata['witr_yicon']=='yes'){?> 
											<a class="video-vemo-icon venobox" data-vbtype="youtube" data-autoplay="true" data-gall="gall-video" href="<?php echo esc_url($pyoutube ); ?>">
											<i class="icofont-youtube-play"></i></a>
											<?php }
											if($witrshowdata['witr_vicon']=='yes'){?> 
											<a class="video-vemo-icon venobox" data-vbtype="vimeo" data-autoplay="true" data-gall="gall-video" href="<?php echo esc_url($pvimeo ); ?>"><i class="icofont-vimeo"></i>
											</a>
											<?php } ?>
										</div>
									</div>
								</div>				
							</div>
						</div>
					<?php endwhile; ?>	
					<?php wp_reset_query(); ?>
				</div>
			</div>					
			<?php			
			break;
			case '3':
			?>
			<div class="pstyle_1 pstyle4">		
				<div class="row" id="em_load" >		
					<?php while ($the_query->have_posts()) : $the_query->the_post(); 														
						$terms = get_the_terms(get_the_ID(), 'em_portfolio_cat'); ?>
						<!-- single portfolio -->
					<div class="col-lg-<?php if( !empty( $witrshowdata['witr_column_grid'] ) ){echo $witrshowdata['witr_column_grid'];}?>  eportfolio_item col-md-6 col-xs-12 col-sm-12 <?php foreach( $terms as $single_slug){echo $single_slug->slug. ' ';}?>   <?php echo $witr_gutter_column; ?>" >
							<div class="single_protfolio">
								<div class="prot_thumb">
									<?php the_post_thumbnail('themex-gallery-thumb');?>
									<div class="prot_content">
										<div class="prot_content_inner">										
										<div class="picon">
											<?php if($witrshowdata['witr_iicon']=='yes'){?> 
											<a class="portfolio-icon venobox" data-gall="myGallery" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' );?>"><i class="icofont-image"></i></a>
											<?php }
											if($witrshowdata['witr_licon']=='yes'){?> 
											<a href="<?php the_permalink(); ?>"><i class="icofont-link"></i></a>
											<?php }
											if($witrshowdata['witr_yicon']=='yes'){?> 
											<a class="video-vemo-icon venobox" data-vbtype="youtube" data-autoplay="true" data-gall="gall-video" href="<?php echo esc_url($pyoutube ); ?>">
											<i class="icofont-youtube-play"></i></a>
											<?php }
											if($witrshowdata['witr_vicon']=='yes'){?> 
											<a class="video-vemo-icon venobox" data-vbtype="vimeo" data-autoplay="true" data-gall="gall-video" href="<?php echo esc_url($pvimeo ); ?>"><i class="icofont-vimeo"></i>
											</a>
											<?php } ?>
										</div>
										</div>
									</div>										
								</div>	
								<div class="pprotfolio4 positi_3">
									<div class="porttitle_inner4">												
										<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>										
										<?php if($witrshowdata['witr_cttext']=='yes'){
											if( $terms ){
												echo "<p>";
												foreach( $terms as $single_slugs ){?>
												<span class="category-item-p">
												   <?php echo $single_slugs->name ;?>
												</span>																			
												<?php }
											echo "</p>"; 
											}}?>												
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>	
					<?php wp_reset_query(); ?>
				</div>
			</div>					
			<?php			
			break;			
			case '2':
			?>
			<div class="pstyle_1 pstyle4">		
				<div class="row" id="em_load" >					
					<?php while ($the_query->have_posts()) : $the_query->the_post(); 					
						$terms = get_the_terms(get_the_ID(), 'em_portfolio_cat');
					?>
					<!-- single portfolio -->
					<div class="col-lg-<?php if( !empty( $witrshowdata['witr_column_grid'] ) ){echo $witrshowdata['witr_column_grid'];}?>  eportfolio_item col-md-6 col-xs-12 col-sm-12 <?php foreach( $terms as $single_slug){echo $single_slug->slug. ' ';}?>   <?php echo $witr_gutter_column; ?>" >
						<div class="single_protfolio">
							<div class="prot_thumb">
								<?php the_post_thumbnail();?>
								<div class="prot_content">
									<div class="prot_content_inner">									
										<div class="picon">
											<?php if($witrshowdata['witr_iicon']=='yes'){?> 
											<a class="portfolio-icon venobox" data-gall="myGallery" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' );?>"><i class="icofont-image"></i></a>
											<?php }
											if($witrshowdata['witr_licon']=='yes'){?> 
											<a href="<?php the_permalink(); ?>"><i class="icofont-link"></i></a>
											<?php }
											if($witrshowdata['witr_yicon']=='yes'){?> 
											<a class="video-vemo-icon venobox" data-vbtype="youtube" data-autoplay="true" data-gall="gall-video" href="<?php echo esc_url($pyoutube ); ?>">
											<i class="icofont-youtube-play"></i></a>
											<?php }
											if($witrshowdata['witr_vicon']=='yes'){?> 
											<a class="video-vemo-icon venobox" data-vbtype="vimeo" data-autoplay="true" data-gall="gall-video" href="<?php echo esc_url($pvimeo ); ?>"><i class="icofont-vimeo"></i>
											</a>
											<?php } ?>
										</div>					
									</div>
								</div>										
							</div>	
							<div class="pprotfolio4">
								<div class="porttitle_inner4">												
									<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
										<?php if($witrshowdata['witr_cttext']=='yes'){
											if( $terms ){
												echo "<p>";
												foreach( $terms as $single_slugs ){?>
												<span class="category-item-p">
												   <?php echo $single_slugs->name ;?>
												</span>																			
												<?php }
											echo "</p>"; 
											}}?>																					
								</div>
							</div>								
						</div>
					</div>
					<?php endwhile; ?>	
					<?php wp_reset_query(); ?>
				</div>
			</div>					

			<?php				
			break;			
			default:
        ?>				
				<div class="pstyle_1 em_port_container">					
				<div class="row" id="em_load" >				
					<?php while ($the_query->have_posts()) : $the_query->the_post(); 						
						$terms = get_the_terms(get_the_ID(), 'em_portfolio_cat');?>
					
						<!-- single portfolio -->
						<div class="col-lg-<?php if( !empty( $witrshowdata['witr_column_grid'] ) ){echo $witrshowdata['witr_column_grid'];}?>  eportfolio_item col-md-6 col-xs-12 col-sm-12 <?php foreach( $terms as $single_slug){echo $single_slug->slug. ' ';}?>   <?php echo $witr_gutter_column; ?>" >
							<div class="single_protfolio">
								<div class="prot_thumb">
									<?php the_post_thumbnail();?>
									<div class="prot_content em_port_content ">
										<div class="prot_content_inner">
										<div class="picon">
											<?php if($witrshowdata['witr_iicon']=='yes'){?> 
											<a class="portfolio-icon venobox" data-gall="myGallery" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' );?>"><i class="icofont-image"></i></a>
											<?php }
											if($witrshowdata['witr_licon']=='yes'){?> 
											<a href="<?php the_permalink(); ?>"><i class="icofont-link"></i></a>
											<?php }
											if($witrshowdata['witr_yicon']=='yes'){?> 
											<a class="video-vemo-icon venobox" data-vbtype="youtube" data-autoplay="true" data-gall="gall-video" href="<?php echo esc_url($pyoutube ); ?>">
											<i class="icofont-youtube-play"></i></a>
											<?php }
											if($witrshowdata['witr_vicon']=='yes'){?> 
											<a class="video-vemo-icon venobox" data-vbtype="vimeo" data-autoplay="true" data-gall="gall-video" href="<?php echo esc_url($pvimeo ); ?>"><i class="icofont-vimeo"></i>
											</a>
											<?php } ?>
										</div>
											<div class="porttitle_inner">				
												<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
											<?php if($witrshowdata['witr_cttext']=='yes'){
											if( $terms ){
												echo "<p>";
												foreach( $terms as $single_slugs ){?>
												<span class="category-item-p">
												   <?php echo $single_slugs->name ;?>
												</span>																			
												<?php }
											echo "</p>"; 
											}}?>
											</div>
										</div>									
									</div>		
								</div>																								
							</div>
						</div>
						
					<?php endwhile; ?>	
					<?php wp_reset_query(); ?>
				</div>
			</div>		

        <?php

	 		break;
			
		}  /* end switch */	
		
		
			if( $witrshowdata['witr_pagination']== 'yes' ){?>
			<!-- START PAGINATION -->
			<div class="row">
				<div class="col-md-12">
					<div class="paginations">
						
						<?php 
						
							 echo paginate_links( array(
								'prev_next' => true,
								'prev_text' => '<i class="icofont-arrow-left"></i>',
								'next_text' => '<i class="icofont-arrow-right"></i>',
								'type' => 'list',
								'current' => $paged,
								'total' => $the_query->max_num_pages
							) );										
						
						?>
					</div>
				</div>
			</div>
			<?php }	


       
	} 




}
