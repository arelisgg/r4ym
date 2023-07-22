<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Nivo_Slider extends Widget_Base {

    public function get_name() {
        return 'witr_nslider_section';
    }
    
    public function get_title() {
        return esc_html__( ' Nivo Custom Slider', 'themex' );
    }

    public function get_icon() {
        return 'themex_icon eicon-image';
    }
    public function get_style_depends() {
        return [ 'wnivo' ];
    }	
	public function get_script_depends() {
        return [ 'nivojs' ];
    }	
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'witr_nslider_option',
            [
                'label' => esc_html__( ' Nivo Slider Options', 'themex' ),
            ]
        );
			/* nivo style witr_style_nivo */
			$this->add_control(
				'witr_style_nivo',
				[
					'label' => esc_html__( 'Slider style', 'themex' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'1' => esc_html__( 'Slider style 1', 'themex' ),
						'2' => esc_html__( 'Slider style 2', 'themex' ),
						'3' => esc_html__( 'Slider style 3', 'themex' ),
					],
					'default' => '1',
				]
			);
										
			/* nslider iten show witr_post_per_page */
            $this->add_control(
                'witr_post_per_page',
                [
                    'label' => __( 'Show Number Of nslider', 'themex' ),
                    'type' => Controls_Manager::NUMBER,				
                    'min' => 1,
                    'max' => 500,
                    'step' => 1,
                    'default' => 3,
                ]
            );			
			/* witr_top_title */	
			$this->add_control(
				'show_slide_title',
				[
					'label' => esc_html__( 'Top Title', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'separator' => 'before',
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'yes',
										
				]
			);
			/* witr_sub_title */	
			$this->add_control(
				'show_slide_subtitle',
				[
					'label' => esc_html__( 'sub Title', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'yes',					
				]
			);

					
			/* nslider show witr_adc_nslider */
 			$this->add_control(
				'witr_adc_nslider',
				[
					'label' => esc_html__( 'Slider ASC/DSC style', 'themex' ),
					'type' => Controls_Manager::SELECT,
                    'separator' => 'before',					
					'options' => [
						'DESC'	=> esc_html__( 'Descending', 'themex' ),
						'ASC'	=> esc_html__( 'Ascending', 'themex' )
					],
					'default' => 'DESC',
				]
			);



				/* witr_c_autoplay */
				$this->add_control(
					'witr_c_autoplay',
					[
						'label' => esc_html__( 'animSpeed', 'themex' ),
						'type' => Controls_Manager::NUMBER,				
						'min' => 500,
						'max' => 10000,
						'step' => 100,
						'default' => 1000,						
					]
				);					
				/*  witr_c_autoplaySpeed */			
				$this->add_control(
					'witr_c_autoplaySpeed',
					[
						'label' => esc_html__( 'autoplaySpeed', 'themex' ),
						'type' => Controls_Manager::TEXT,					
						'min' => 1000,
						'max' => 300000,
						'step' => 1000,
						'default' => 6000,						
					]
				);
				/* witr_c_arrows */
				$this->add_control(
					'witr_c_arrows',
					[
						'label' => esc_html__( 'arrows', 'themex' ),
						'type' => Controls_Manager::SELECT,
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
						'default' => 'true',
						'options' => [
							'true' => esc_html__( 'True', 'themex' ),
							'false' => esc_html__( 'False', 'themex' ),
						],						
					]
				);	
							
				/* feature title witr_feature_title */	
					$this->add_control(
						'witr_unicid_c',
						[
							'label' => esc_html__( 'Use Unic ID', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Please use a unic ID here, ex- any text.', 'themex' ),
							'default' => 'id2',
							'placeholder' => esc_attr__( 'Type your ID here', 'themex' ),							
						]
					);				
	

        $this->end_controls_section();
		/*=== end_controls_section ===*/

			
			/* === w_banner button start === */
			$this->start_controls_section(
				'witr_nivo_button_option',
				[
					'label' => esc_html__( 'Witr Video Button Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
					'condition' => [
						'witr_style_nivo' => ['3'],
					],					
				]
			);
	

				/*  witr_yshow_button witr_yvideo_link	*/
				$this->add_control(
					'witr_yshow_button',
					[
						'label' => esc_html__( 'Show Youtube Link', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'yes',						
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

							],							
						]
					);						
					/*  witr_vmshow_button witr_vmvideo_link */	
					$this->add_control(
						'witr_vmshow_button',
						[
							'label' => esc_html__( 'Show Vimo Link', 'themex' ),
							'type' => Controls_Manager::SWITCHER,
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'return_value' => 'yes',
							'default' => 'no',						
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
							],							
						]
					);						
					
		
			$this->end_controls_section();
			/* === end witr_banner button ===  */
		
		
	   /*===========================================================================================
										START TO STYLE
		=============================================================================================*/		
		
		/*===== start  Background Overlay Style =====*/
		$this->start_controls_section(
			'section_background_overlay',
			[
				'label' => esc_html__( 'Image Background Overlay', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,

			]
		);

		
			/* Icon background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_icono_background',
					'label' => esc_html__( 'Single Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .nivo-caption',
				]
			);
		
		$this->end_controls_section();
		/*===== end background Overlay =====*/		
		
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
					'global' => [
						'default' => Global_Colors::COLOR_SECONDARY,
					],					
					'selectors' => [
						'{{WRAPPER}} .em-slider-title' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .em-slider-title',
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
						'{{WRAPPER}} .em-slider-title' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);			
			/* title margin */
			$this->add_responsive_control(
				'witr_title_margin',
				[
					'label' => esc_html__( 'Title Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .em-slider-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* title padding */
			$this->add_responsive_control(
				'witr_title_padding',
				[
					'label' => esc_html__( 'Title Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .em-slider-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_title style ====*/	
		/*=== start witr subtitle style ====*/

		$this->start_controls_section(
			'witr_style_subtitle',
			[
				'label' => esc_html__( 'Sub Title Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
			/* color */
			$this->add_control(
				'witr_stitle_color',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_PRIMARY,
					],					
					'separator'=>'before',					
					'selectors' => [
						'{{WRAPPER}} .em-slider-sub-title' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_sttpy_color',
					'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
					],
					'selector' => '{{WRAPPER}} .em-slider-sub-title',
				]
			);

			/*  Sub Tittle width */
			$this->add_responsive_control(
				'witr_sub_width',
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
						'{{WRAPPER}} .em-slider-sub-title' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);			
			/* title margin */
			$this->add_responsive_control(
				'witr_stitle_margin',
				[
					'label' => esc_html__( 'Title Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .em-slider-sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* title padding */
			$this->add_responsive_control(
				'witr_stitle_padding',
				[
					'label' => esc_html__( 'Title Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .em-slider-sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_title style ====*/			

		/*=== Start Witr highlight Text style ====*/

		$this->start_controls_section(
			'witr_style_post_option',
			[
				'label' => esc_html__( 'Highlight  Text Color', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
		
				/* Icon Color */
				$this->add_control(
					'witr_prima_color',
					[
						'label' => esc_html__( 'Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .em-slider-sub-title span,{{WRAPPER}} .em-slider-title span' => 'color: {{VALUE}}',
						],
						
					]
				);							
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_mttpy_color',
					'label' => esc_html__( 'Typography', 'themex' ),
					'selector' => '{{WRAPPER}} .em-slider-sub-title span,{{WRAPPER}} .em-slider-title span',
				]
			);			
				
		 
		 $this->end_controls_section();
		/*=== end  witr highlight Text style ====*/

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
						'{{WRAPPER}} .em-slider-descript' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .em-slider-descript',
				]
			);		
				/*  content width */
				$this->add_responsive_control(
					'witr_contenth_width',
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
							'{{WRAPPER}} .em-slider-descript' => 'width: {{SIZE}}{{UNIT}};',
						],						
					]
				);
			/* content margin */
			$this->add_responsive_control(
				'content_margin',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .em-slider-descript' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* content padding */
			$this->add_responsive_control(
				'content_padding',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .em-slider-descript' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'separator'=>'before',
								'global' => [
									'default' => Global_Colors::COLOR_ACCENT,
								],								
								'selectors' => [
									'{{WRAPPER}} .em-active-button,{{WRAPPER}} .nivo-control.active,{{WRAPPER}} .nivo-controlNav a,{{WRAPPER}} .nivo-directionNav a:hover' => 'color: {{VALUE}}',
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
								'selector' => '{{WRAPPER}} .em-active-button',
							]
						);	

						/* Button background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_button_background',
								'label' => esc_html__( 'button Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .em-active-button,{{WRAPPER}} .nivo-control.active,{{WRAPPER}} .nivo-directionNav a:hover,{{WRAPPER}} .nivo-controlNav a:hover',
							]
						);
						/* witr_border_style */
						$this->add_control(
							'witr_border_btn_style',
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
									'{{WRAPPER}} .em-active-button' => 'border-style: {{VALUE}}',
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
									'{{WRAPPER}} .em-active-button' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .em-active-button,{{WRAPPER}} .nivo-directionNav a:hover' => 'border-color: {{VALUE}}',
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
									'{{WRAPPER}} .em-active-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .em-active-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .em-active-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'selectors' => [
									'{{WRAPPER}} a.em-active-button:hover' => 'color: {{VALUE}}',
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
								'selector' => '{{WRAPPER}} a.em-active-button:hover',
							]
						);					
						/* border_hover_color */
						$this->add_control(
							'witr_borderh_btn_color',
							[
								'label' => esc_html__( 'Border Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,								
								'selectors' => [
									'{{WRAPPER}} a.em-active-button:hover' => 'border-color: {{VALUE}}',
								],
							]
						);					
						
						
						$this->end_controls_tab();
						/*=== end button hover style ====*/
						
				$this->end_controls_tabs();
				/*=== end button_tabs style ====*/			
			 
			 $this->end_controls_section();
			/*=== end  witr button style ====*/			
		
		
				/*=== start witr button style ====*/

				$this->start_controls_section(
					'witr_style_option_sbutton',
					[
						'label' => esc_html__( 'Button 2 Color Option', 'themex' ),
						'tab' => Controls_Manager::TAB_STYLE,					
					]
				);			
				/*=== start button_tabs style ====*/
				$this->start_controls_tabs( 'button_scolors' );
				
					/*=== start button_normal style ====*/
					$this->start_controls_tab(
						'witr_button_scolors_normal',
						[
							'label' => esc_html__( 'Normal', 'themex' ),
						]
					);
						/* color */
						$this->add_control(
							'witr_button_scolor',
							[
								'label' => esc_html__( 'Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								'global' => [
									'default' => Global_Colors::COLOR_ACCENT,
								],								
								'selectors' => [
									'{{WRAPPER}} .withput-active,{{WRAPPER}} .nivo-directionNav a' => 'color: {{VALUE}}',
								],
							]
						);				

						/* typograohy color */			
						$this->add_group_control(
							Group_Control_Typography::get_type(),
							[
								'name' => 'witr_button_stypography',
								'label' => esc_html__( 'Typography', 'themex' ),
								'global' => [
									'default' => Global_Typography::TYPOGRAPHY_ACCENT,
								],
								'selector' => '{{WRAPPER}} .withput-active',
							]
						);	

						/* Button background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_button_sbackground',
								'label' => esc_html__( 'button Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .withput-active,{{WRAPPER}} .nivo-directionNav a,{{WRAPPER}} .nivo-controlNav a',
							]
						);
						/* witr_border_style */
						$this->add_control(
							'witr_border_btn_sstyle',
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
									'{{WRAPPER}} .withput-active,{{WRAPPER}} .nivo-directionNav a' => 'border-style: {{VALUE}}',
								],
							]
						);		
						/* witr border */
						
						$this->add_control(
							'witr_borde_sbtn',
							[
								'label' => esc_html__( 'Border', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'selectors' => [
									'{{WRAPPER}} .withput-active,{{WRAPPER}} .nivo-directionNav a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/* border_color */
						$this->add_control(
							'witr_border_btn_scolor',
							[
								'label' => esc_html__( 'Border Color', 'themex' ),
								'type' => Controls_Manager::COLOR,								
								'selectors' => [
									'{{WRAPPER}} .withput-active,{{WRAPPER}} .nivo-directionNav a' => 'border-color: {{VALUE}}',
								],
							]
						);
						/* border_radius */
						$this->add_control(
							'witr_border_btn_sradius',
							[
								'label' => esc_html__( 'Border Radius', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .withput-active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);				
						/* button margin */
						$this->add_responsive_control(
							'witr_button_smargin',
							[
								'label' => esc_html__( 'Margin', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .withput-active' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/* button padding */
						$this->add_responsive_control(
							'witr_button_spadding',
							[
								'label' => esc_html__( 'Padding', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .withput-active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);					
					

					$this->end_controls_tab();
					/*=== end button normal style ====*/
				
						/*=== start button hover style ====*/
						$this->start_controls_tab(
							'witr_button_colors_shover',
							[
								'label' => esc_html__( 'Button Hover', 'themex' ),
							]
						);

						/* hover_color */
						$this->add_control(
							'witr_button_sshover_color',
							[
								'label' => esc_html__( 'Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,							
								'selectors' => [
									'{{WRAPPER}} a.withput-active:hover' => 'color: {{VALUE}}',
								],
							]
						);					
							
						/* Button Hover background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_button_shover_background',
								'label' => esc_html__( 'button Hover Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} a.withput-active:hover',
							]
						);					
						/* border_hover_color */
						$this->add_control(
							'witr_borderh_sbtn_color',
							[
								'label' => esc_html__( 'Border Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,								
								'selectors' => [
									'{{WRAPPER}} a.withput-active:hover' => 'border-color: {{VALUE}}',
								],
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
			'section_style_icon_buttonn',
			[
				'label' => esc_html__( 'Button Icon Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_nivo' => ['3'],
				],				
			]
		);
		
			/*=== start icon_tabs style ====*/
			$this->start_controls_tabs( 'button_iconn' );
			
				/*=== start icon_normal style ====*/
				$this->start_controls_tab(
					'witr_icon_colorbn_normal',
					[
						'label' => esc_html__( 'Normal', 'themex' ),
					]
				);		
				/* Icon Color */
				$this->add_control(
					'witr_primarybn_color',
					[
						'label' => esc_html__( 'Icon Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .em-button-button-area a span' => 'color: {{VALUE}}',
						],
						
					]
				);
				
				/*  icon font size */
				$this->add_responsive_control(
					'witr_icon_sizebn',
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
							'{{WRAPPER}} .em-button-button-area a span' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/* Icon background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_iconsbn_background',
						'label' => esc_html__( 'Icon Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .em-button-button-area a span',
					]
				);				
				/*  icon width */
				$this->add_responsive_control(
					'witr_iconbn_width',
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
							'{{WRAPPER}} .em-button-button-area a span' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon height */
				$this->add_responsive_control(
					'witr_iconbn_height',
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
							'{{WRAPPER}} .em-button-button-area a span' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon line height */
				$this->add_responsive_control(
					'witr_iconbn_line_height',
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
							'{{WRAPPER}} .em-button-button-area a span' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/* witr_text_align */					
				$this->add_responsive_control(
					'witr_textbn_align',
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
							'{{WRAPPER}} .em-button-button-area a span' => 'text-align: {{VALUE}}',
						],
					]
				);
				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_borderbn',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .em-button-button-area a span',
					]
				);
				/* border_radius */
				$this->add_control(
					'witr_borderbn_radius',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .em-button-button-area a span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_boxbn_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .em-button-button-area a span',
					]
				);														
				/*  Rotate */
				$this->add_responsive_control(
					'witr_rotatebn',
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
							'{{WRAPPER}} .em-button-button-area a span' => 'transform: rotate({{SIZE}}{{UNIT}});',
						],
					]
				);
				/* icon margin */
				$this->add_responsive_control(
					'witr_iconbn_margin',
					[
						'label' => esc_html__( ' Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .em-button-button-area a span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* icon padding */
				$this->add_responsive_control(
					'witr_iconbn_padding',
					[
						'label' => esc_html__( ' Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .em-button-button-area a span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		
				

				$this->end_controls_tab();
				/*=== end icon normal style ====*/
		
				/*=== start icon hover style ====*/
				$this->start_controls_tab(
					'witr_icon_colorsbn_hover',
					[
						'label' => esc_html__( 'Icon Hover', 'themex' ),
					]
				);					
					/*  primary hover color */
					$this->add_control(
						'witr_hover_primarybn_color',
						[
							'label' => esc_html__( 'Icon Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .em-button-button-area a:hover span ' => 'color: {{VALUE}}',
							],
						]
					);
					/* hover Icon background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_hoverbn_icon',
							'label' => esc_html__( 'Icon Hover Background', 'themex' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .em-button-button-area a:hover span',
						]
					);					
					/* witr_border_style */
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'witr_borderhobn',
							'label' => esc_html__( 'Border', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .em-button-button-area a:hover span',
						]
					);					
					$this->end_controls_tab();
					/*=== end icon hover style ====*/					
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/
		$this->end_controls_section();
		/*=== end witr_icon Button style ====*/		
			
			
		/*=== start witr_icon_Button style ====*/
		$this->start_controls_section(
			'section_style_icon_button',
			[
				'label' => esc_html__( 'Button Video Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_nivo' => ['3'],
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
							'{{WRAPPER}} .witr_nivideo_btns i,{{WRAPPER}} .witr_nivideo_btns i::after' => 'color: {{VALUE}}',
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
							'{{WRAPPER}} .witr_nivideo_btns i' => 'font-size: {{SIZE}}{{UNIT}};',
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
						'selector' => '{{WRAPPER}} .witr_nivideo_btns i',
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
							'{{WRAPPER}} .witr_nivideo_btns i' => 'width: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_nivideo_btns i' => 'height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_nivideo_btns i' => 'line-height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_nivideo_btns i' => 'text-align: {{VALUE}}',
						],
					]
				);
				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_borderb',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_nivideo_btns i',
					]
				);
				/* border_radius */
				$this->add_control(
					'witr_borderb_radius',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .witr_nivideo_btns i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_boxb_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_nivideo_btns i',
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
							'{{WRAPPER}} .witr_nivideo_btns i' => 'transform: rotate({{SIZE}}{{UNIT}});',
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
							'{{WRAPPER}} .witr_nivideo_btns i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_nivideo_btns i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .witr_nivideo_btns i:hover ' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .witr_nivideo_btns i:hover',
						]
					);					
					/* witr_border_style */
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'witr_borderhob',
							'label' => esc_html__( 'Border', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .witr_nivideo_btns i:hover',
						]
					);					
					$this->end_controls_tab();
					/*=== end icon hover style ====*/					
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/
		$this->end_controls_section();
		/*=== end witr_icon Button style ====*/				
			
			
			
			
			
			
		/*=== start witr_title style ====*/

		$this->start_controls_section(
			'witr_style_s2image_option',
			[
				'label' => esc_html__( 'Image Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
									'{{WRAPPER}} .em_slider_s2_image' => 'top: {{SIZE}}{{UNIT}};',
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
									'{{WRAPPER}} .em_slider_s2_image' => 'left: {{SIZE}}{{UNIT}};',
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
									'{{WRAPPER}} .em_slider_s2_image' => 'right: {{SIZE}}{{UNIT}};',
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
									'{{WRAPPER}} .em_slider_s2_image' => 'bottom: {{SIZE}}{{UNIT}};',
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
						'separator'=>'before',
						'range' => [
							'px' => [
								'min' => 25,
								'max' => 1920,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .em_slider_s2_image img' => 'width: {{SIZE}}{{UNIT}};',
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
								'max' => 1500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .em_slider_s2_image img' => 'height: {{SIZE}}{{UNIT}};',
						],
					]			
				);						
						
		 
		 $this->end_controls_section();
		/*=== end  witr_title style ====*/	




			/*=== start witr Arrow style ====*/
			$this->start_controls_section(
				'witr_style_option_arrow',
				[
					'label' => esc_html__( ' Arrow Options', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_c_arrows' => 'true',
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
									'{{WRAPPER}} .em-nivo-slider-wrapper .nivo-directionNav a' => 'width: {{SIZE}}{{UNIT}};',
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
									'{{WRAPPER}} .em-nivo-slider-wrapper .nivo-directionNav a' => 'height: {{SIZE}}{{UNIT}};',
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
									'{{WRAPPER}} .em-nivo-slider-wrapper .nivo-directionNav a' => 'line-height: {{SIZE}}{{UNIT}};',
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
									'{{WRAPPER}} .em-nivo-slider-wrapper .nivo-directionNav a' => 'font-size: {{SIZE}}{{UNIT}};',
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
									'{{WRAPPER}} .em-nivo-slider-wrapper .nivo-directionNav a ' => 'color: {{VALUE}}',
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
								'selector' => '{{WRAPPER}} .em-nivo-slider-wrapper .nivo-directionNav a',
							]
						);
						
						/* witr_arrowborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_arrowborder_style1',
								'label' => esc_html__( 'Arrow Border', 'themex' ),
								'selector' => '{{WRAPPER}} .em-nivo-slider-wrapper .nivo-directionNav a',
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
									'{{WRAPPER}} .em-nivo-slider-wrapper .nivo-directionNav a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/* witr_top */
						$this->add_responsive_control(
							'witr_top1',
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
									'{{WRAPPER}} .em-nivo-slider-wrapper .nivo-directionNav a' => 'top: {{SIZE}}{{UNIT}};',
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
									'{{WRAPPER}} .em-nivo-slider-wrapper .nivo-directionNav a:hover' => 'color: {{VALUE}}',
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
								'selector' => '{{WRAPPER}} .em-nivo-slider-wrapper .nivo-directionNav a:hover',
							]
						);
						/* witr_hoverborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_hoverborder_style11',
								'label' => esc_html__( 'Arrow Hover Border', 'themex' ),
								'selector' => '{{WRAPPER}} .em-nivo-slider-wrapper .nivo-directionNav a:hover',
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
						'witr_c_dots' => 'true',
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
						/*  Dots font size */
						$this->add_responsive_control(
							'witr_dots_size',
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
									'{{WRAPPER}} .em-nivo-slider-wrapper .nivo-controlNav a' => 'font-size: {{SIZE}}{{UNIT}};',
								],
							]
						);					
						/* Dots color */
						$this->add_control(
							'witr_dots_color',
							[
								'label' => esc_html__( ' Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .em-nivo-slider-wrapper .nivo-controlNav a' => 'color: {{VALUE}}',
								],
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
									'{{WRAPPER}} .em-nivo-slider-wrapper .nivo-controlNav a' => 'width: {{SIZE}}{{UNIT}};',
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
									'{{WRAPPER}} .em-nivo-slider-wrapper .nivo-controlNav a' => 'height: {{SIZE}}{{UNIT}};',
								],
							]
						);
						/*  dots Line height */
						$this->add_responsive_control(
							'witr_dots_line_height',
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
									'{{WRAPPER}} .em-nivo-slider-wrapper .nivo-controlNav a' => 'line-height: {{SIZE}}{{UNIT}};',
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
								'selector' => '{{WRAPPER}} .em-nivo-slider-wrapper .nivo-controlNav a',
							]
						);		
						/* witr_dotsborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_dotsborder_style1',
								'label' => esc_html__( 'Dots Border', 'themex' ),
								'selector' => '{{WRAPPER}} .em-nivo-slider-wrapper .nivo-controlNav a',
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
									'{{WRAPPER}} .em-nivo-slider-wrapper .nivo-controlNav a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						
						
						/* witr_top */
						$this->add_responsive_control(
							'witr_top_dots1',
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
									'{{WRAPPER}} .em-nivo-slider-wrapper .nivo-controlNav' => 'top: {{SIZE}}{{UNIT}};',
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
									'{{WRAPPER}} .em-nivo-slider-wrapper .nivo-controlNav a' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
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
						/* Dots hover color */
						$this->add_control(
							'witr_dots_h_color',
							[
								'label' => esc_html__( ' Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .em-nivo-slider-wrapper .nivo-controlNav a:hover' => 'color: {{VALUE}}',
								],
							]
						);							
						/* Dots Hover background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_dots_hover_background1',
								'label' => esc_html__( 'Dots Hover Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .em-nivo-slider-wrapper .nivo-controlNav a:hover',
							]
						);
						/* witr_hoverborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_hoverborder_style1',
								'label' => esc_html__( 'Dots Hover Border', 'themex' ),
								'selector' => '{{WRAPPER}} .em-nivo-slider-wrapper .nivo-controlNav a:hover',
							]
						);					
						
						
						$this->end_controls_tab();
						/*=== end Dots hover style ====*/
						
						/*=== start Dots hover style ====*/
						$this->start_controls_tab(
							'witr_dots_colors_active',
							[
								'label' => esc_html__( ' Active', 'themex' ),
							]
						);

						/* Dots active color */
						$this->add_control(
							'witr_dots_a_color',
							[
								'label' => esc_html__( ' Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .em-nivo-slider-wrapper .nivo-controlNav a.active' => 'color: {{VALUE}}',
								],
							]
						);
							
						
						/* Active Dots background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_acdots_background1',
								'label' => esc_html__( 'Active Dots Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .em-nivo-slider-wrapper .nivo-controlNav a.active ',
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
		$autoplay=$autoplayspeed=$arrows=$dots=$unic_id="";


if(! empty($witrshowdata['witr_c_autoplay'])){
	$autoplay=$witrshowdata['witr_c_autoplay'];
}
if(! empty($witrshowdata['witr_c_autoplaySpeed'])){
	$autoplayspeed=$witrshowdata['witr_c_autoplaySpeed'];
}

if(! empty($witrshowdata['witr_c_arrows'])){
	$arrows=$witrshowdata['witr_c_arrows'];
}
if(! empty($witrshowdata['witr_c_dots'])){
	$dots=$witrshowdata['witr_c_dots'];
}
if(! empty($witrshowdata['witr_unicid_c'])){
	$unic_id=$witrshowdata['witr_unicid_c'];
}
		
		

        $witrshowdata = $this->get_settings_for_display();

        $witr_post_per_page       = ! empty( $witrshowdata['witr_post_per_page'] ) ? $witrshowdata['witr_post_per_page'] : 2;
        $witr_adc_nslider    = ! empty( $witrshowdata['witr_adc_nslider'] ) ? $witrshowdata['witr_adc_nslider'] : 'DESC';
		
                        $args = array(
                            'post_type'            => 'em_slider',
                            'post_status'          => 'publish',
                            'ignore_sticky_posts'  => 1,
                            'posts_per_page'       => $witr_post_per_page,
                            'order'                => $witr_adc_nslider,
                        );
                        
                        $posts = new \WP_Query($args);

		switch( $witrshowdata['witr_style_nivo']){
			case '3':			
			?>
			
    <!-- SLIDER  AREA -->
    <div class="main-slider-area">
        <div class="container-fluid pdlr0">
            <div class="row">
				<div class="col-lg-12">
					<div class="em-nivo-slider-wrapper">			
					   <div id="mainSlider_<?php echo $unic_id;?>" class="nivoSlider em-slider-image">				
							<?php while ( $posts->have_posts() ) {
								$posts->the_post(); ?>									
								<?php $em_slider_caption = '#htmlcaption1_'.get_the_ID(); ?>								
									  <?php if(has_post_thumbnail() ) { ?>										  
									<?php the_post_thumbnail('em-thumb',array('title' => ''.$em_slider_caption.'')); ?>
								<?php } ?>	
							<?php } ?>
					   </div>			

						<?php while ( $posts->have_posts() ) {
									$posts->the_post();


									$em_slide_title  = get_post_meta( get_the_ID(),'_txbdm_em_slide_title', true );
									$em_slide_subtitle  = get_post_meta( get_the_ID(),'_txbdm_em_slide_subtitle', true );
									$em_slide_textarea  = get_post_meta( get_the_ID(),'_txbdm_em_slide_textarea', true );
									$em_slide_btn1  = get_post_meta( get_the_ID(),'_txbdm_em_slide_btn1', true );
									$em_slide_btn1utl  = get_post_meta( get_the_ID(),'_txbdm_em_slide_btn1utl', true );
									$em_slide_btn2  = get_post_meta( get_the_ID(),'_txbdm_em_slide_btn2', true );
									$em_slide_btn2url  = get_post_meta( get_the_ID(),'_txbdm_em_slide_btn2url', true );								
									$em_slider_posi  = get_post_meta( get_the_ID(),'_txbdm_em_slider_posi', true );
									
									
									$em_aimate_title  = get_post_meta( get_the_ID(),'_txbdm_em_aimate_title', true );
									$em_durations_title  = get_post_meta( get_the_ID(),'_txbdm_em_durations_title', true );
									$em_dealy_title  = get_post_meta( get_the_ID(),'_txbdm_em_dealy_title', true );
									
									$em_aimate_subtitle  = get_post_meta( get_the_ID(),'_txbdm_em_aimate_subtitle', true );
									$em_durations_subtitle  = get_post_meta( get_the_ID(),'_txbdm_em_durations_subtitle', true );
									$em_dealy_subtitle  = get_post_meta( get_the_ID(),'_txbdm_em_dealy_subtitle', true );
									
									$show_list  = get_post_meta( get_the_ID(),'_txbdm_show_list', true ); 
									$list_text  = get_post_meta( get_the_ID(),'_txbdm_list_text', true );

									$em_aimate_content  = get_post_meta( get_the_ID(),'_txbdm_em_aimate_content', true );
									$em_durations_content  = get_post_meta( get_the_ID(),'_txbdm_em_durations_content', true );
									$em_dealy_content  = get_post_meta( get_the_ID(),'_txbdm_em_dealy_content', true );

									$em_aimate_btn  = get_post_meta( get_the_ID(),'_txbdm_em_aimate_btn', true );
									$em_durations_btn  = get_post_meta( get_the_ID(),'_txbdm_em_durations_btn', true );
									$em_dealy_btn  = get_post_meta( get_the_ID(),'_txbdm_em_dealy_btn', true );

									?>				   
							<!-- em_slider style-1 start -->
							<div id="htmlcaption1_<?php the_ID(); ?>" class="nivo-html-caption em-slider-content-nivo">
								<div class="em_slider_inner container  <?php if($em_slider_posi){echo $em_slider_posi;}?>">
										<?php if(isset($witrshowdata['show_slide_title']) && ! empty($witrshowdata['show_slide_title'])){?>
											<?php if($em_slide_title){?> 
												<div class="wow <?php if($em_aimate_title){ echo $em_aimate_title;} ?>" data-wow-duration="<?php if($em_durations_title){ echo $em_durations_title;} ?>s" data-wow-delay="<?php if($em_dealy_title){ echo $em_dealy_title;} ?>s">
													<h2 class="em-slider-title"><?php echo $em_slide_title;?></h2>
												</div>
												
											<?php } ?>								
										<?php } ?>								
									
										<?php if(isset($witrshowdata['show_slide_subtitle']) && ! empty($witrshowdata['show_slide_subtitle'])){?>
											<?php if($em_slide_subtitle){?> 
											<div class="wow <?php if($em_aimate_subtitle){ echo $em_aimate_subtitle;} ?>" data-wow-duration="<?php if($em_durations_subtitle){ echo $em_durations_subtitle;} ?>s" data-wow-delay="<?php if($em_dealy_subtitle){ echo $em_dealy_subtitle;} ?>s">
											
													<h1 class="em-slider-sub-title"><?php echo $em_slide_subtitle;?> 
													</h1>
													
												</div>			
													
											<?php } ?>								
										<?php } ?>	
										
										<?php if($em_slide_textarea){?> 
											<div class="wow <?php if($em_aimate_content){ echo $em_aimate_content;} ?>" data-wow-duration="<?php if($em_durations_content){ echo $em_durations_content;} ?>s" data-wow-delay="<?php if($em_dealy_content){ echo $em_dealy_content;} ?>s">
												<p  class="em-slider-descript"><?php echo $em_slide_textarea;?></p>
											</div>
										<?php } ?>								
																
										<div class="em-slider-button wow  <?php if($em_aimate_btn){ echo $em_aimate_btn;} ?>  em-button-button-area" data-wow-duration="<?php if($em_durations_btn){ echo $em_durations_btn;} ?>s" data-wow-delay="<?php if($em_dealy_btn){ echo $em_dealy_btn;} ?>s">
										
											<?php if($em_slide_btn1utl){?> 
												<a class="em-active-button" href="<?php echo esc_url( $em_slide_btn1utl );?>"><?php echo esc_html( $em_slide_btn1 );?>
													<span class="fas fa-long-arrow-alt-right"></span>												
												</a>
											<?php }?>
											<?php if($em_slide_btn2url){?> 
												<a class="withput-active" href="<?php echo esc_url( $em_slide_btn2url );?>"><?php echo esc_html( $em_slide_btn2 );?>
													<span class="fas fa-long-arrow-alt-right"></span>
												</a>
											<?php }?>
											<!-- video button -->
											<?php if($witrshowdata['witr_yshow_button']=='yes' or $witrshowdata['witr_vmshow_button']='yes'  ){?>
											
											<?php if(isset($witrshowdata['witr_yvideo_link']['url']) && ! empty($witrshowdata['witr_yvideo_link']['url'])){?>
												<a class="witr_nivideo_btns video-popup video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="<?php echo $witrshowdata['witr_yvideo_link'] ['url']; ?>"><i class="fa fa-play"></i>
												</a>
											<?php } ?>	
											<?php if(isset($witrshowdata['witr_vmvideo_link']['url']) && ! empty($witrshowdata['witr_vmvideo_link']['url'])){?>
												<a class="witr_nivideo_btns video-popup video-vemo-icon venobox vbox-item" data-vbtype="vimeo" data-autoplay="true" href="<?php echo $witrshowdata['witr_vmvideo_link'] ['url']; ?>"><i class="icofont-vimeo"></i></a>
											<?php } ?>	

											<?php } ?>											
									</div>
								</div>
							</div>
							<!-- em_slider style-1 end -->
						<?php } ?>			
				   </div>
				</div>
            </div>
        </div>
    </div>			
			
		<script type='text/javascript'>
			jQuery(function($){				
				var tnivoslider= $('#mainSlider_<?php echo esc_js($unic_id);?>');
				if( tnivoslider.length ){					
					tnivoslider.nivoSlider({
						directionNav: <?php echo esc_js($arrows);?>,
						animSpeed: <?php echo esc_js($autoplay);?>,
						slices: 18,
						pauseTime: <?php echo esc_js($autoplayspeed);?>,
						<?php echo ( is_rtl() ) ? "rtl: true," : ''; ?>
						pauseOnHover: false,
						controlNav: <?php echo esc_js($dots);?>,
						prevText: '<i class="fas fa-long-arrow-alt-left nivo-prev-icon"></i>',
						nextText: '<i class="fas fa-long-arrow-alt-right nivo-next-icon"></i>'					
					});					
				}	
			});
		</script>		
			
			
			<?php
			
			break;	
			
			case '2':			
			?>
    <!-- SLIDER  AREA -->
    <div class="main-slider-area">
		<div class="container-fluid pdlr0">
            <div class="row">
				<div class="col-lg-12">
					<div class="em-nivo-slider-wrapper">			
					   <div id="mainSlider_<?php echo $unic_id;?>" class="nivoSlider em-slider-image">				
							<?php while ( $posts->have_posts() ) {
								$posts->the_post(); ?>									
								<?php $em_slider_caption = '#htmlcaption1_'.get_the_ID(); ?>								
									  <?php if(has_post_thumbnail() ) { ?>										  
									<?php the_post_thumbnail('em-thumb',array('title' => ''.$em_slider_caption.'')); ?>
								<?php } ?>	
							<?php } ?>
					   </div>			
						<?php while ( $posts->have_posts() ) {
									$posts->the_post();


									$em_slide_title  = get_post_meta( get_the_ID(),'_txbdm_em_slide_title', true );
									$em_slide_subtitle  = get_post_meta( get_the_ID(),'_txbdm_em_slide_subtitle', true );
									$em_slide_textarea  = get_post_meta( get_the_ID(),'_txbdm_em_slide_textarea', true );
									$em_slide_btn1  = get_post_meta( get_the_ID(),'_txbdm_em_slide_btn1', true );
									$em_slide_btn1utl  = get_post_meta( get_the_ID(),'_txbdm_em_slide_btn1utl', true );
									$em_slide_btn2  = get_post_meta( get_the_ID(),'_txbdm_em_slide_btn2', true );
									$em_slide_btn2url  = get_post_meta( get_the_ID(),'_txbdm_em_slide_btn2url', true );								
									$em_slider_posi  = get_post_meta( get_the_ID(),'_txbdm_em_slider_posi', true );
									
									
									$em_aimate_title  = get_post_meta( get_the_ID(),'_txbdm_em_aimate_title', true );
									$em_durations_title  = get_post_meta( get_the_ID(),'_txbdm_em_durations_title', true );
									$em_dealy_title  = get_post_meta( get_the_ID(),'_txbdm_em_dealy_title', true );
									
									$em_aimate_subtitle  = get_post_meta( get_the_ID(),'_txbdm_em_aimate_subtitle', true );
									$em_durations_subtitle  = get_post_meta( get_the_ID(),'_txbdm_em_durations_subtitle', true );
									$em_dealy_subtitle  = get_post_meta( get_the_ID(),'_txbdm_em_dealy_subtitle', true );

									$em_aimate_content  = get_post_meta( get_the_ID(),'_txbdm_em_aimate_content', true );
									$em_durations_content  = get_post_meta( get_the_ID(),'_txbdm_em_durations_content', true );
									$em_dealy_content  = get_post_meta( get_the_ID(),'_txbdm_em_dealy_content', true );

									$em_aimate_btn  = get_post_meta( get_the_ID(),'_txbdm_em_aimate_btn', true );
									$em_durations_btn  = get_post_meta( get_the_ID(),'_txbdm_em_durations_btn', true );
									$em_dealy_btn  = get_post_meta( get_the_ID(),'_txbdm_em_dealy_btn', true );
									$slider_lr_image  = get_post_meta( get_the_ID(),'_txbdm_slider_lr', true );





									?>				   
							<!-- em_slider style-1 start -->
							<div id="htmlcaption1_<?php the_ID(); ?>" class="nivo-html-caption em-slider-content-nivo">
								<div class="em_slider_inner container  <?php if($em_slider_posi){echo $em_slider_posi;}?>">
								 <?php if($em_slider_posi=='text-left'){?>
								 <!-- left image -->
								<div class="row">
									<div class="col-md-12 col-lg-7">
										<div class="em_slider_s2_content">
											<?php if(isset($witrshowdata['show_slide_title']) && ! empty($witrshowdata['show_slide_title'])){?>							
												<?php if($em_slide_title){?> 
												
													<div class="wow <?php if($em_aimate_title){ echo $em_aimate_title;} ?>" data-wow-duration="<?php if($em_durations_title){ echo $em_durations_title;} ?>s" data-wow-delay="<?php if($em_dealy_title){ echo $em_dealy_title;} ?>s">
													
														<h2 class="em-slider-title"><?php echo $em_slide_title;?></h2>
													
													</div>
													
												<?php } ?>								
											<?php } ?>
												<?php if(isset($witrshowdata['show_slide_subtitle']) && ! empty($witrshowdata['show_slide_subtitle'])){?>
												
												<?php if($em_slide_subtitle){?> 
												<div class="wow <?php if($em_aimate_subtitle){ echo $em_aimate_subtitle;} ?>" data-wow-duration="<?php if($em_durations_subtitle){ echo $em_durations_subtitle;} ?>s" data-wow-delay="<?php if($em_dealy_subtitle){ echo $em_dealy_subtitle;} ?>s">
												
														<h1 class="em-slider-sub-title"><?php echo $em_slide_subtitle;?> 
														</h1>
														
												</div>			
														
												<?php } ?>								
												<?php } ?>								

										
												<?php if($em_slide_textarea){?> 
													
													<div class="wow <?php if($em_aimate_content){ echo $em_aimate_content;} ?>" data-wow-duration="<?php if($em_durations_content){ echo $em_durations_content;} ?>s" data-wow-delay="<?php if($em_dealy_content){ echo $em_dealy_content;} ?>s">
														<p  class="em-slider-descript em_sc_100"><?php echo esc_html($em_slide_textarea);?></p>
													</div>
												
												<?php } ?>								
																		
												<div class="em-slider-button wow  <?php if($em_aimate_btn){ echo $em_aimate_btn;} ?>  em-button-button-area" data-wow-duration="<?php if($em_durations_btn){ echo $em_durations_btn;} ?>s" data-wow-delay="<?php if($em_dealy_btn){ echo $em_dealy_btn;} ?>s">
												
													<?php if($em_slide_btn1utl){?> 
														<a class="em-active-button" href="<?php echo esc_url( $em_slide_btn1utl );?>"><?php echo esc_html( $em_slide_btn1 );?></a>
													<?php }?>
													<?php if($em_slide_btn2url){?> 
														<a class="withput-active" href="<?php echo esc_url( $em_slide_btn2url );?>"><?php echo esc_html( $em_slide_btn2 );?></a>
													<?php }?>								

												</div>							
										</div>
									</div>
								<div class="col-md-12 col-lg-5 d_md_none">
									<div class="em_slider_s2_image">
										<div class="em_slider_s2_image_inner wow zoomIn" data-wow-duration="2s" data-wow-delay=".3s">
											<?php if($slider_lr_image){?>
												<img src="<?php echo $slider_lr_image;?>" alt="image" />
											<?php }?>
										</div>
									</div>
								</div>

								</div><!-- row end -->
								

								
								 <!-- right image -->
								<?php }elseif($em_slider_posi=='text-right'){?> 
								 
								<div class="row">
								
								
								<div class="col-md-12 col-lg-5 d_md_none">
									<div class="em_slider_s2_image">
										<div class="em_slider_s2_image_inner wow zoomIn" data-wow-duration="2s" data-wow-delay=".3s">
											<?php if($slider_lr_image){?>
												<img src="<?php echo $slider_lr_image;?>" alt="image" />
											<?php }?>
										</div>
									</div>
								</div>
								
								<div class="col-md-12 col-lg-7">
								<div class="em_slider_s2_content">
								<?php if(isset($witrshowdata['show_slide_title']) && ! empty($witrshowdata['show_slide_title'])){?>								
										<?php if($em_slide_title){?> 
										
											<div class="wow <?php if($em_aimate_title){ echo $em_aimate_title;} ?>" data-wow-duration="<?php if($em_durations_title){ echo $em_durations_title;} ?>s" data-wow-delay="<?php if($em_dealy_title){ echo $em_dealy_title;} ?>s">
											
												<h2 class="em-slider-title"><?php echo $em_slide_title;?></h2>
											
											</div>
											
										<?php } ?>								
										<?php } ?>								
								
										<?php if(isset($witrshowdata['show_slide_subtitle']) && ! empty($witrshowdata['show_slide_subtitle'])){?>
										
										<?php if($em_slide_subtitle){?> 
										<div class="wow <?php if($em_aimate_subtitle){ echo $em_aimate_subtitle;} ?>" data-wow-duration="<?php if($em_durations_subtitle){ echo $em_durations_subtitle;} ?>s" data-wow-delay="<?php if($em_dealy_subtitle){ echo $em_dealy_subtitle;} ?>s">
										
												<h1 class="em-slider-sub-title"><?php echo $em_slide_subtitle;?> 
												</h1>
												
										</div>			
												
										<?php } ?>								
										<?php } ?>								

								
										<?php if($em_slide_textarea){?> 
											
											<div class="wow <?php if($em_aimate_content){ echo $em_aimate_content;} ?>" data-wow-duration="<?php if($em_durations_content){ echo $em_durations_content;} ?>s" data-wow-delay="<?php if($em_dealy_content){ echo $em_dealy_content;} ?>s">
											
												<p  class="em-slider-descript em_sc_100"><?php echo esc_html($em_slide_textarea);?></p>
											
											</div>
										
										<?php } ?>								
																
										<div class="em-slider-button wow  <?php if($em_aimate_btn){ echo $em_aimate_btn;} ?>  em-button-button-area" data-wow-duration="<?php if($em_durations_btn){ echo $em_durations_btn;} ?>s" data-wow-delay="<?php if($em_dealy_btn){ echo $em_dealy_btn;} ?>s">
										
											<?php if($em_slide_btn1utl){?> 
												<a class="em-active-button" href="<?php echo esc_url( $em_slide_btn1utl );?>"><?php echo esc_html( $em_slide_btn1 );?></a>
											<?php }?>
											<?php if($em_slide_btn2url){?> 
												<a class="withput-active" href="<?php echo esc_url( $em_slide_btn2url );?>"><?php echo esc_html( $em_slide_btn2 );?></a>
											<?php }?>								

										</div>							
								</div>
								</div>

								</div><!-- row end -->
								

								  <!-- default image -->
								 <?php }else{?>
								<div class="row">
								
								<div class="col-md-12">
									<div class="em_slider_s2_content">
									<?php if(isset($witrshowdata['show_slide_title']) && ! empty($witrshowdata['show_slide_title'])){?>							
										<?php if($em_slide_title){?> 
										
											<div class="wow <?php if($em_aimate_title){ echo $em_aimate_title;} ?>" data-wow-duration="<?php if($em_durations_title){ echo $em_durations_title;} ?>s" data-wow-delay="<?php if($em_dealy_title){ echo $em_dealy_title;} ?>s">
											
												<h2 class="em-slider-title"><?php echo $em_slide_title;?></h2>
											
											</div>
											
										<?php } ?>								
										<?php } ?>								
								
									<?php if(isset($witrshowdata['show_slide_subtitle']) && ! empty($witrshowdata['show_slide_subtitle'])){?>
										<?php if($em_slide_subtitle){?> 
										<div class="wow <?php if($em_aimate_subtitle){ echo $em_aimate_subtitle;} ?>" data-wow-duration="<?php if($em_durations_subtitle){ echo $em_durations_subtitle;} ?>s" data-wow-delay="<?php if($em_dealy_subtitle){ echo $em_dealy_subtitle;} ?>s">
										
												<h1 class="em-slider-sub-title"><?php echo $em_slide_subtitle;?> 
												</h1>
												
										</div>			
												
										<?php } ?>								
										<?php } ?>								

								
										<?php if($em_slide_textarea){?> 
											
											<div class="wow <?php if($em_aimate_content){ echo $em_aimate_content;} ?>" data-wow-duration="<?php if($em_durations_content){ echo $em_durations_content;} ?>s" data-wow-delay="<?php if($em_dealy_content){ echo $em_dealy_content;} ?>s">
											
												<p  class="em-slider-descript em_sc_100"><?php echo $em_slide_textarea;?></p>
											
											</div>
										
										<?php } ?>								
																	
										<div class="em-slider-button wow  <?php if($em_aimate_btn){ echo $em_aimate_btn;} ?>  em-button-button-area" data-wow-duration="<?php if($em_durations_btn){ echo $em_durations_btn;} ?>s" data-wow-delay="<?php if($em_dealy_btn){ echo $em_dealy_btn;} ?>s">
										
											<?php if($em_slide_btn1utl){?> 
												<a class="em-active-button" href="<?php echo esc_url( $em_slide_btn1utl );?>"><?php echo esc_html( $em_slide_btn1 );?></a>
											<?php }?>
											<?php if($em_slide_btn2url){?> 
												<a class="withput-active" href="<?php echo esc_url( $em_slide_btn2url );?>"><?php echo esc_html( $em_slide_btn2 );?></a>
											<?php }?>								

										</div>							
									</div>
								</div>

								</div><!-- row end -->
								
									 
								 <?php } ?>
								 

							</div>
							
							
							
						</div>
							<!-- em_slider style-1 end -->
						<?php } ?>			
				   </div>
			   </div>
            </div>
        </div>
    </div>			
			

		<script type='text/javascript'>
			jQuery(function($){				
				var tnivoslider= $('#mainSlider_<?php echo esc_js($unic_id);?>');
				if( tnivoslider.length ){					
					tnivoslider.nivoSlider({
						directionNav: <?php echo esc_js($arrows);?>,
						animSpeed: <?php echo esc_js($autoplay);?>,
						slices: 18,
						pauseTime: <?php echo esc_js($autoplayspeed);?>,
						<?php echo ( is_rtl() ) ? "rtl: true," : ''; ?>
						pauseOnHover: false,
						controlNav: <?php echo esc_js($dots);?>,
						prevText: '<i class="fas fa-long-arrow-alt-left nivo-prev-icon"></i>',
						nextText: '<i class="fas fa-long-arrow-alt-right nivo-next-icon"></i>'					
					});					
				}	
			});
		</script>
			
			<?php
			
			break;			
			default:
			
			?>
    <!-- SLIDER  AREA -->
    <div class="main-slider-area">
        <div class="container-fluid pdlr0">
            <div class="row">
				<div class="col-lg-12">
					<div class="em-nivo-slider-wrapper">			
					   <div id="mainSlider_<?php echo $unic_id;?>" class="nivoSlider em-slider-image">				
							<?php while ( $posts->have_posts() ) {
								$posts->the_post(); ?>									
								<?php $em_slider_caption = '#htmlcaption1_'.get_the_ID(); ?>								
									  <?php if(has_post_thumbnail() ) { ?>										  
									<?php the_post_thumbnail('em-thumb',array('title' => ''.$em_slider_caption.'')); ?>
								<?php } ?>	
							<?php } ?>
					   </div>			

						<?php while ( $posts->have_posts() ) {
									$posts->the_post();


									$em_slide_title  = get_post_meta( get_the_ID(),'_txbdm_em_slide_title', true );
									$em_slide_subtitle  = get_post_meta( get_the_ID(),'_txbdm_em_slide_subtitle', true );
									$em_slide_textarea  = get_post_meta( get_the_ID(),'_txbdm_em_slide_textarea', true );
									$em_slide_btn1  = get_post_meta( get_the_ID(),'_txbdm_em_slide_btn1', true );
									$em_slide_btn1utl  = get_post_meta( get_the_ID(),'_txbdm_em_slide_btn1utl', true );
									$em_slide_btn2  = get_post_meta( get_the_ID(),'_txbdm_em_slide_btn2', true );
									$em_slide_btn2url  = get_post_meta( get_the_ID(),'_txbdm_em_slide_btn2url', true );								
									$em_slider_posi  = get_post_meta( get_the_ID(),'_txbdm_em_slider_posi', true );
									
									
									$em_aimate_title  = get_post_meta( get_the_ID(),'_txbdm_em_aimate_title', true );
									$em_durations_title  = get_post_meta( get_the_ID(),'_txbdm_em_durations_title', true );
									$em_dealy_title  = get_post_meta( get_the_ID(),'_txbdm_em_dealy_title', true );
									
									$em_aimate_subtitle  = get_post_meta( get_the_ID(),'_txbdm_em_aimate_subtitle', true );
									$em_durations_subtitle  = get_post_meta( get_the_ID(),'_txbdm_em_durations_subtitle', true );
									$em_dealy_subtitle  = get_post_meta( get_the_ID(),'_txbdm_em_dealy_subtitle', true );

									$em_aimate_content  = get_post_meta( get_the_ID(),'_txbdm_em_aimate_content', true );
									$em_durations_content  = get_post_meta( get_the_ID(),'_txbdm_em_durations_content', true );
									$em_dealy_content  = get_post_meta( get_the_ID(),'_txbdm_em_dealy_content', true );

									$em_aimate_btn  = get_post_meta( get_the_ID(),'_txbdm_em_aimate_btn', true );
									$em_durations_btn  = get_post_meta( get_the_ID(),'_txbdm_em_durations_btn', true );
									$em_dealy_btn  = get_post_meta( get_the_ID(),'_txbdm_em_dealy_btn', true );

									?>				   
							<!-- em_slider style-1 start -->
							<div id="htmlcaption1_<?php the_ID(); ?>" class="nivo-html-caption em-slider-content-nivo">
								<div class="em_slider_inner container  <?php if($em_slider_posi){echo $em_slider_posi;}?>">
										<?php if(isset($witrshowdata['show_slide_title']) && ! empty($witrshowdata['show_slide_title'])){?>
											<?php if($em_slide_title){?> 
												<div class="wow <?php if($em_aimate_title){ echo $em_aimate_title;} ?>" data-wow-duration="<?php if($em_durations_title){ echo $em_durations_title;} ?>s" data-wow-delay="<?php if($em_dealy_title){ echo $em_dealy_title;} ?>s">
													<h2 class="em-slider-title"><?php echo $em_slide_title;?></h2>
												</div>
												
											<?php } ?>								
										<?php } ?>								
									
										<?php if(isset($witrshowdata['show_slide_subtitle']) && ! empty($witrshowdata['show_slide_subtitle'])){?>
											<?php if($em_slide_subtitle){?> 
											<div class="wow <?php if($em_aimate_subtitle){ echo $em_aimate_subtitle;} ?>" data-wow-duration="<?php if($em_durations_subtitle){ echo $em_durations_subtitle;} ?>s" data-wow-delay="<?php if($em_dealy_subtitle){ echo $em_dealy_subtitle;} ?>s">
											
													<h1 class="em-slider-sub-title"><?php echo $em_slide_subtitle;?> 
													</h1>
													
												</div>			
													
											<?php } ?>								
										<?php } ?>	
										
										<?php if($em_slide_textarea){?> 
											<div class="wow <?php if($em_aimate_content){ echo $em_aimate_content;} ?>" data-wow-duration="<?php if($em_durations_content){ echo $em_durations_content;} ?>s" data-wow-delay="<?php if($em_dealy_content){ echo $em_dealy_content;} ?>s">
												<p  class="em-slider-descript"><?php echo $em_slide_textarea;?></p>
											</div>
										<?php } ?>								
																
										<div class="em-slider-button wow  <?php if($em_aimate_btn){ echo $em_aimate_btn;} ?>  em-button-button-area" data-wow-duration="<?php if($em_durations_btn){ echo $em_durations_btn;} ?>s" data-wow-delay="<?php if($em_dealy_btn){ echo $em_dealy_btn;} ?>s">
										
											<?php if($em_slide_btn1utl){?> 
												<a class="em-active-button" href="<?php echo esc_url( $em_slide_btn1utl );?>"><?php echo esc_html( $em_slide_btn1 );?></a>
											<?php }?>
											<?php if($em_slide_btn2url){?> 
												<a class="withput-active" href="<?php echo esc_url( $em_slide_btn2url );?>"><?php echo esc_html( $em_slide_btn2 );?></a>
											<?php }?>								
									</div>
								</div>
							</div>
							<!-- em_slider style-1 end -->
						<?php } ?>			
				   </div>
				</div>
            </div>
        </div>
    </div>			
			

		<script type='text/javascript'>
			jQuery(function($){				
				var tnivoslider= $('#mainSlider_<?php echo esc_js($unic_id);?>');
				if( tnivoslider.length ){					
					tnivoslider.nivoSlider({
						directionNav: <?php echo esc_js($arrows);?>,
						animSpeed: <?php echo esc_js($autoplay);?>,
						slices: 18,
						pauseTime: <?php echo esc_js($autoplayspeed);?>,
						<?php echo ( is_rtl() ) ? "rtl: true," : ''; ?>
						pauseOnHover: false,
						controlNav: <?php echo esc_js($dots);?>,
						prevText: '<i class="fas fa-long-arrow-alt-left nivo-prev-icon"></i>',
						nextText: '<i class="fas fa-long-arrow-alt-right nivo-next-icon"></i>'					
					});					
				}	
			});
		</script>
			
			<?php
			
			break;
			
		}  /* end switch */
		

	
       
	} /* end function */
	





}