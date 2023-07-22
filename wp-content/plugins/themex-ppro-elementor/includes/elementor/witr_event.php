<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Event extends Widget_Base {

    public function get_name() {
        return 'witr_event_section';
    }
    
    public function get_title() {
        return esc_html__( ' Post Event', 'themex' );
    }
	public function get_style_depends() {
        return [ 'wevent' ];
    }
    public function get_script_depends() {
        return [];
    }		
    public function get_icon() {
        return 'themex_icon eicon-image';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'witr_event_option',
            [
                'label' => esc_html__( 'Event Options', 'themex' ),
            ]
        );
		
		
			/* event style witr_style_event */
			$this->add_control(
				'witr_style_event',
				[
					'label' => esc_html__( 'Event style', 'themex' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'1' => esc_html__( 'Event style 1', 'themex' ),
						'2' => esc_html__( 'Event Carousel style 2', 'themex' ),
						'3' => esc_html__( 'Event Carousel style 3', 'themex' ),
						'4' => esc_html__( 'Event style 4', 'themex' ),
						'5' => esc_html__( 'Event style 5', 'themex' ),						
						'6' => esc_html__( 'Event Carousel style 6', 'themex' ),						
						'7' => esc_html__( 'Event style 7', 'themex' ),						
						'8' => esc_html__( 'Event Carousel style 8', 'themex' ),						
					],
					'default' => '1',
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
							'condition' => [
								'witr_style_event' =>['1','2','3','4','6','7','8'],
							],							
						]
					);
			
			/* event iten show witr_post_per_page */
            $this->add_control(
                'witr_post_per_page',
                [
                    'label' => __( 'Show Number Of Posts Event', 'themex' ),
                    'type' => Controls_Manager::NUMBER,				
                    'separator' => 'before',
                    'min' => 1,
                    'max' => 500,
                    'step' => 1,
                    'default' => 3,
                ]
            );
			/* event show witr_adc_event */
 			$this->add_control(
				'witr_adc_event',
				[
					'label' => esc_html__( 'Event ASC/DSC style', 'themex' ),
					'type' => Controls_Manager::SELECT,
                    'separator' => 'before',					
					'options' => [
						'DESC'	=> esc_html__( 'Descending', 'themex' ),
						'ASC'	=> esc_html__( 'Ascending', 'themex' )
					],
					'default' => 'DESC',
				]
			);
			/* event column witr_column_grid */
            $this->add_control(
                'witr_column_grid',
                [
                    'label' => esc_html__( 'Columns', 'themex' ),
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
					'condition' => [
						'witr_style_event' =>['1','4'],
					],					
                ]
            );
			
			/* event title witr_title_length */			
            $this->add_control(
                'witr_title_length',
                [
                    'label' => esc_html__( 'Title Length', 'themex' ),
                    'type' => Controls_Manager::NUMBER,
                    'separator' => 'before',					
                    'min' => 1,
                    'max' => 500,
                    'step' => 1,
                    'default' => 15,
                ]
            );
			/* witr_show_content */
			$this->add_control(
				'witr_show_content',
				[
					'label' => esc_html__( 'Show Content', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'separator' => 'before',
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'no',					
				]
			);			
			/* event content witr_content_length */
            $this->add_control(
                'witr_content_length',
                [
                    'label' => esc_html__( 'Content Length', 'themex' ),
                    'type' => Controls_Manager::NUMBER,
                    'separator' => 'before',					
                    'min' => 1,
                    'max' => 1000,
                    'step' => 1,
                    'default' => 15,
					'condition' => [
						'witr_show_content' =>'yes',
					],					
                ]
            );
			
			/* witr_show_time */
			$this->add_control(
				'witr_show_time',
				[
					'label' => esc_html__( 'Show Date', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'separator' => 'before',
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
						'witr_style_event' =>['1','2','3','6','7','8'],
					],					
				]
			);
			/* witr_show_address */
			$this->add_control(
				'witr_show_address',
				[
					'label' => esc_html__( 'Show Address', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'separator' => 'before',
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
						'witr_style_event' =>['1','2','3','6','7','8'],
					],					
				]
			);			
			/* witr_show_year */
			$this->add_control(
				'witr_show_year',
				[
					'label' => esc_html__( 'Show Year', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'separator' => 'before',
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'yes',					
				]
			);			
			

			/* witr_event_button */			
            $this->add_control(
                'witr_event_button',
                [
                    'label' => esc_html__( 'Button Text', 'themex' ),
                    'type' => Controls_Manager::TEXT,
                    'separator' => 'before',					
					'description' => esc_html__( 'Not use button, remove the text from field', 'themex' ),
					'placeholder' => esc_attr__( 'ex - Read More', 'themex' ),
                    'default' => 'Read More',
					'condition' => [
						'witr_style_event' =>['1','3','5','7','8'],
					],
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
					'condition' => [
						'witr_style_event' =>['1'],
					],					
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
					'default' => 'no',
				]
			);	           

        $this->end_controls_section();

		/*=== end_controls_section ===*/

			/* === witr_Carousel start === */
			$this->start_controls_section(
				'witr_field_display_image',
				[
					'label' => esc_html__( 'Slick Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
					'condition' => [
						'witr_style_event' =>['2','3','6','8'],
					],					
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
						'label' => esc_html__( 'autoplaySpeed', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'description' => esc_html__( 'Type your autoplaySpeed Number here, ex-1000ms=1s.', 'themex' ),
						'default' => 3000,
					]
				);
				/*  witr_c_speed */			
				$this->add_control(
					'witr_c_speed',
					[
						'label' => esc_html__( 'speed', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'description' => esc_html__( 'Type your Speed Number here, ex-1000ms=1s.', 'themex' ),
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
						'default' => 'true',
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
						'default' => 3,
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
						'default' =>2,
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
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Please use a unic ID here, ex- wittr_1.', 'themex' ),
							'default' => 'idevent1',
							'placeholder' => esc_attr__( 'Type your ID here', 'themex' ),						
						]
					);				
				
												
			
			$this->end_controls_section();
			/* === end witr_image ===  */		
		
	   /*===========================================================================================
										START TO STYLE
		=============================================================================================*/		
		

			/*=== start witr_single_event style ====*/
			$this->start_controls_section(
				'witr_single_event',
				[
					'label' => esc_html__( 'Single Event Option', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,				
					'condition' => [
						'witr_style_event' =>['1','2','3','5','7','8'],
					],					
				]
			);	
						/* witr_border_box_style */
						$this->add_control(
							'witr_border_box_style',
							[
								'label' => esc_html__( 'Border Style', 'themex' ),
								'type' => Controls_Manager::SELECT,
								'separator'=>'before',
								'options' => [
									'default' => esc_html__( 'Default', 'themex' ),
									'none' => esc_html__( 'None', 'themex' ),
									'solid' => esc_html__( 'Solid', 'themex' ),
									'double' => esc_html__( 'Double', 'themex' ),
									'dotted' => esc_html__( 'Dotted', 'themex' ),
									'dashed' => esc_html__( 'Dashed', 'themex' ),
								],
								'default' => 'default',
								'selectors' => [
									'{{WRAPPER}} .em-event-content-area_adn,{{WRAPPER}} .witr_event_style_5.themex-single-event_adn' => 'border-style: {{VALUE}}',
								],
							]
						);		
						/* witr_borde_box */
						$this->add_control(
							'witr_borde_box',
							[
								'label' => esc_html__( 'Border', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'selectors' => [
									'{{WRAPPER}} .em-event-content-area_adn,{{WRAPPER}} .witr_event_style_5.themex-single-event_adn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
								'condition' => [
									'witr_border_box_style' => ['solid','double','dotted','dashed','default'],
								],								
							]
						);
						/* witr_border_box_color */
						$this->add_control(
							'witr_border_box_color',
							[
								'label' => esc_html__( 'Border Color', 'themex' ),
								'type' => Controls_Manager::COLOR,								
								'selectors' => [
									'{{WRAPPER}} .em-event-content-area_adn,{{WRAPPER}} .witr_event_style_5.themex-single-event_adn' => 'border-color: {{VALUE}}',
								],
								'condition' => [
									'witr_border_box_style' => ['solid','double','dotted','dashed','default'],
								],								
							]
						);			
				/* single_border_radius */
				$this->add_control(
					'witr_single_border_radius',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .em-event-content-area_adn,{{WRAPPER}} .witr_event_style_5.themex-single-event_adn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* single event background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_single_testi',
						'label' => esc_html__( ' Event BG', 'themex' ),
						'types' => [ 'classic', 'gradient'],
						'selector' => '{{WRAPPER}} .themex-single-event_adn,{{WRAPPER}} .witr_event_style_5.themex-single-event_adn',
					]
				);

				/* Single event shadow  */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_single_tesr',
						'label' => esc_html__( 'Event Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .themex-single-event_adn,{{WRAPPER}} .witr_event_style_5.themex-single-event_adn',
					]
				);
				/* Event Shadow Hover */				
				$this->add_control(
					'witr_box_blend_testhover',
					[
						'label' => esc_html__( 'Event Shadow Hover', 'themex' ),
						'type' => Controls_Manager::HEADING,
					]
				);
				/* Single event shadow  */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_single_tesrhover',
						'label' => esc_html__( 'event Shadow Hover', 'themex' ),
						'selector' => '{{WRAPPER}} .themex-single-event_adn:hover,{{WRAPPER}} .witr_event_style_5.themex-single-event_adn:hover',
					]
				);
				/* witr_box_margin */
				$this->add_responsive_control(
					'witr_box_margin',
					[
						'label' => esc_html__( ' Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .em-event-content-area_adn,{{WRAPPER}} .witr_event_style_5.themex-single-event_adn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* witr_box_padding */
				$this->add_responsive_control(
					'witr_box_padding',
					[
						'label' => esc_html__( ' Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .em-event-content-area_adn,{{WRAPPER}} .witr_event_style_5.themex-single-event_adn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				
			
			$this->end_controls_section();
			/* === end witr_single_event ===  */		
		

		/*=== Start Witr Day-Month-Year style ====*/
		$this->start_controls_section(
			'witr_style_dmy_option',
			[
				'label' => esc_html__( 'Day, Month, Year Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_event' =>['1','2','3','4','6'],
				],				
			]
		);		 
		
				/*  Color */
				$this->add_control(
					'witr_dmy_color',
					[
						'label' => esc_html__( ' Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'global' => [
							'default' => Global_Colors::COLOR_PRIMARY,
						],						
						'separator'=>'before',
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .event_date span,{{WRAPPER}} .event_date_5 span,{{WRAPPER}} .themex_event_date span' => 'color: {{VALUE}}',
						],
						
					]
				);
				/*  Background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_dmy_back',
						'label' => esc_html__( '  Background', 'themex' ),
						'types' => [ 'classic', 'gradient'],					
						'selector' => '{{WRAPPER}} .event_date,{{WRAPPER}} .event_date_5,{{WRAPPER}} .themex_event_date',
					]
				);				
				/* typograohy color */			
				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'witr_dmyt_color',
						'label' => esc_html__( 'Typography', 'themex' ),
						'global' => [
							'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
						],
						'selector' => '{{WRAPPER}} .event_date,{{WRAPPER}} .event_date_5,{{WRAPPER}} .themex_event_date',
					]
				);
				/*   line height */
				$this->add_responsive_control(
					'witr_dmy_line_height',
					[
						'label' => esc_html__( 'Line Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .event_date span,{{WRAPPER}} .event_date_5 span,{{WRAPPER}} .themex_event_date span' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);				

				/*   Display */
				$this->add_responsive_control(
					'witr_dmy_dis_height',
					[
						'label' => esc_html__( 'Display', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'description' => esc_html__( ' Use Field,  Ex:: display: inline-block;', 'themex' ),
						'placeholder' => esc_attr__( 'display: inline-block;', 'themex' ),						
						'selectors' => [
							'{{WRAPPER}} .event_date span,{{WRAPPER}} .event_date_5 span,{{WRAPPER}} .themex_event_date span' => 'display: {{SIZE}}{{UNIT}};',
						],
					]
				);				
				/* border_radius */
				$this->add_control(
					'witr_border_dmy_radius',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .event_date,{{WRAPPER}} .event_date_5,{{WRAPPER}} .themex_event_date' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/*  Rotate */
				$this->add_responsive_control(
					'witr_rotate_mdy',
					[
						'label' => esc_html__( 'Rotate', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', 'em' ],
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
							'{{WRAPPER}} .event_date,{{WRAPPER}} .event_date_5,{{WRAPPER}} .themex_event_date' => 'transform: rotate({{SIZE}}{{UNIT}});',
						],
					]
				);
				/*  Day-Month-Year */
				$this->add_responsive_control(
					'witr_dmy_opacity',
					[
						'label' => esc_html__( 'Day, Month, Year Opacity', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'selectors' => [
							'{{WRAPPER}} .event_date,{{WRAPPER}} .event_date_5,{{WRAPPER}} .themex_event_date' => 'opacity: {{SIZE}}{{UNIT}};',
						],
					]
				);				
			/* witr_top */
			$this->add_responsive_control(
				'witr_mtop2',
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
						'{{WRAPPER}} .event_date,{{WRAPPER}} .event_date_5,{{WRAPPER}} .themex_event_date' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);
			
			/* witr_left */
			$this->add_responsive_control(
				'witr_mleft2',
				[
					'label' => esc_html__( 'Left', 'themex' ),
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
						'{{WRAPPER}} .event_date,{{WRAPPER}} .event_date_5,{{WRAPPER}} .themex_event_date' => 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);				
			/*  margin */
			$this->add_responsive_control(
				'witr_dmy_margin',
				[
					'label' => esc_html__( ' Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .event_date,{{WRAPPER}} .event_date_5,{{WRAPPER}} .themex_event_date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* title padding */
			$this->add_responsive_control(
				'witr_dmy_padding',
				[
					'label' => esc_html__( ' Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .event_date,{{WRAPPER}} .event_date_5,{{WRAPPER}} .themex_event_date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);				
		 
		 $this->end_controls_section();
		/*=== end  witr Day-Month-Year style ====*/
		
		/*=== Start Witr Icon/Meta Text style ====*/
		$this->start_controls_section(
			'witr_style_post_option',
			[
				'label' => esc_html__( 'Address Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
							'{{WRAPPER}} .event_all_color span i' => 'color: {{VALUE}}',
						],
						
					]
				);
				/* Icon hover color */
				$this->add_control(
					'witr_icon_hover_color',
					[
						'label' => esc_html__( 'Icon Hover Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',
						
						'selectors' => [
							'{{WRAPPER}} .event_all_color span i:hover' => 'color: {{VALUE}}',
						],
					]
				);								
				/*  icon font size */
				$this->add_responsive_control(
					'witr_icon_size',
					[
						'label' => esc_html__( 'Icon Size', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'separator'=>'before',
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .event_all_color span i' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);		
			
			/* meta text color */
			$this->add_control(
				'witr_mt_color',
				[
					'label' => esc_html__( 'Meta Text Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',
					
					'selectors' => [
						'{{WRAPPER}} .event_all_color span' => 'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
				'witr_mt_hover_color',
				[
					'label' => esc_html__( 'Meta Text Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',
					
					'selectors' => [
						'{{WRAPPER}} .event_all_color span:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_mttpy_color',
					'label' => esc_html__( 'Typography', 'themex' ),
					'selector' => '{{WRAPPER}} .event_all_color span',
				]
			);			
				
		 
		 $this->end_controls_section();
		/*=== end  witr Icon/Meta Text style ====*/

		/*=== Start Witr filter style ====*/
		$this->start_controls_section(
			'witr_style_filter_option',
			[
				'label' => esc_html__( ' Category Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_event' =>['1'],
				],				
			]
		);		 		
				/* filter Color */
				$this->add_control(
					'witr_filter_color',
					[
						'label' => esc_html__( ' Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .all_event_category span' => 'color: {{VALUE}}',
						],
						
					]
				);
				/* typograohy color */			
				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'witr_filter_ttpy_color',
						'label' => esc_html__( 'Typography', 'themex' ),																
						'selector' => '{{WRAPPER}} .all_event_category span',
					]
				);						
				/* Filter background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_filth_background',
						'label' => esc_html__( ' Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .all_event_category span',
					]
				);				

			
				/* filter margin */
				$this->add_responsive_control(
					'witr_filter_margin',
					[
						'label' => esc_html__( ' Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .all_event_category span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* Filter padding */
				$this->add_responsive_control(
					'witr_filter_padding',
					[
						'label' => esc_html__( ' Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .all_event_category span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);				

				
					
		 $this->end_controls_section();
		/*=== end  witr Filter Text style ====*/
		
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
						'default' => Global_Colors::COLOR_PRIMARY,
					],					
					'selectors' => [
						'{{WRAPPER}} .event_all_color h2 a' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .event_all_color h2 a:hover' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .event_all_color h2 a',
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
						'{{WRAPPER}} .event_all_color h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .event_all_color h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_title style ====*/	
		
			/*=== start witr_icon style ====*/
			$this->start_controls_section(
				'witr_event_icon_option',
				[
					'label' => esc_html__( 'Top Icon Color Option', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_style_event' =>['1','2','3','4'],
					],					
				]
			);
		
			/*=== start icon_tabs style ====*/
			$this->start_controls_tabs( 'icon_colors' );
			
				/*=== start icon_normal style ====*/
				$this->start_controls_tab(
					'witr_icon_color_event',
					[
						'label' => esc_html__( 'Normal', 'themex' ),
					]
				);
				/* Icon Color */
				$this->add_control(
					'witr_primar_color',
					[
						'label' => esc_html__( 'Icon Color', 'themex' ),
						'type' => Controls_Manager::COLOR,						
						'selectors' => [
							'{{WRAPPER}} .witr_icon_adn a' => 'color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .witr_icon_adn a',
					]
				);				
				/*  icon font size */
				$this->add_responsive_control(
					'icon_size',
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
							'{{WRAPPER}} .witr_icon_adn a' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);
				
				/*  icon width */
				$this->add_responsive_control(
					'witr_icon_width',
					[
						'label' => esc_html__( 'width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_icon_adn a' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon height */
				$this->add_responsive_control(
					'witr_icon_height',
					[
						'label' => esc_html__( 'Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_icon_adn a' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon line height */
				$this->add_responsive_control(
					'witr_icon_line_height',
					[
						'label' => esc_html__( 'Line Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_icon_adn a' => 'line-height: {{SIZE}}{{UNIT}};',
						],
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
						'themex_class' => 'themex-star-rating%s--align-',
						'selectors' => [
							'{{WRAPPER}} .witr_icon_adn a' => 'text-align: {{VALUE}}',
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
							'none' => esc_html__( 'none', 'themex' ),
							'solid' => esc_html__( 'Solid', 'themex' ),
							'double' => esc_html__( 'Double', 'themex' ),
							'dotted' => esc_html__( 'Dotted', 'themex' ),
							'dashed' => esc_html__( 'Dashed', 'themex' ),
						],
						'default' => ' ',
						'selectors' => [
							'{{WRAPPER}} .witr_icon_adn a' => 'border-style: {{VALUE}}',
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
							'{{WRAPPER}} .witr_icon_adn a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_icon_adn a' => 'border-color: {{VALUE}}',
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
							'{{WRAPPER}} .witr_icon_adn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);									
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_icon_adn a',
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
							'{{WRAPPER}} .witr_icon_adn a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_icon_adn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'label' => esc_html__( 'Icon Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .witr_icon_adn a:hover' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .witr_icon_adn a:hover',
						]
					);
					/* border_hover_color */
					$this->add_control(
						'witr_border_hover_color',
						[
							'label' => esc_html__( 'Icon Border Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							
							'selectors' => [
								'{{WRAPPER}} witr_icon_adn a:hover' => 'border-color: {{VALUE}}',
							],
						]
					);
					$this->end_controls_tab();
					/*=== end icon hover style ====*/
					
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/

		$this->end_controls_section();

		/*=== end witr_icon style ====*/		

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
						'{{WRAPPER}} .event_all_color p' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .event_all_color p',
				]
			);		

			/* content margin */
			$this->add_responsive_control(
				'content_margin',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'separator'=>'before',
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .event_all_color p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* content padding */
			$this->add_responsive_control(
				'content_padding',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'separator'=>'before',
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .event_all_color p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'witr_style_event' =>['1','3','5','7','8'],
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
								'separator'=>'before',
								'global' => [
									'default' => Global_Colors::COLOR_ACCENT,
								],								
								'selectors' => [
									'{{WRAPPER}} .btn_all_color a' => 'color: {{VALUE}}',
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
								'selector' => '{{WRAPPER}} .btn_all_color a',
							]
						);	

						/* Button background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_button_background',
								'label' => esc_html__( 'button Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .btn_all_color a',
							]
						);
						/* witr_border_btn_style */
						$this->add_control(
							'witr_border_btn_style',
							[
								'label' => esc_html__( 'Border Style', 'themex' ),
								'type' => Controls_Manager::SELECT,
								'separator'=>'before',
								'options' => [
									'default' => esc_html__( 'Default', 'themex' ),
									'none' => esc_html__( 'none', 'themex' ),
									'solid' => esc_html__( 'Solid', 'themex' ),
									'double' => esc_html__( 'Double', 'themex' ),
									'dotted' => esc_html__( 'Dotted', 'themex' ),
									'dashed' => esc_html__( 'Dashed', 'themex' ),
								],
								'default' => ' default',
								'selectors' => [
									'{{WRAPPER}} .btn_all_color a' => 'border-style: {{VALUE}}',
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
									'{{WRAPPER}} .btn_all_color a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .btn_all_color a' => 'border-color: {{VALUE}}',
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
									'{{WRAPPER}} .btn_all_color a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .btn_all_color a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .btn_all_color a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .btn_all_color a:hover' => 'color: {{VALUE}}',
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
								'selector' => '{{WRAPPER}} .btn_all_color a:hover',
							]
						);					
						/* border_hover_color */
						$this->add_control(
							'witr_borderh_btn_color',
							[
								'label' => esc_html__( 'Border Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,								
								'selectors' => [
									'{{WRAPPER}} .btn_all_color a:hover' => 'border-color: {{VALUE}}',
								],
							]
						);					
						
						
						$this->end_controls_tab();
						/*=== end button hover style ====*/						
				$this->end_controls_tabs();
				/*=== end button_tabs style ====*/						 
			 $this->end_controls_section();
			/*=== end  witr button style ====*/					


			
			/*=== start witr admin style ====*/

			$this->start_controls_section(
				'witr_style_option_admin',
				[
					'label' => esc_html__( 'Admin Box Color Option', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_style_event' =>['7','8'],
					],					
				]
			);		 
		
				/*=== start admin_tabs style ====*/
				$this->start_controls_tabs( 'admin_colors' );
				
					/*=== start admin_normal style ====*/
					$this->start_controls_tab(
						'witr_admin_colors_normal',
						[
							'label' => esc_html__( 'Title', 'themex' ),
						]
					);
						/* color */
						$this->add_control(
							'witr_titlea_color',
							[
								'label' => esc_html__( 'Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								'global' => [
									'default' => Global_Colors::COLOR_PRIMARY,
								],								
								'selectors' => [
									'{{WRAPPER}} .event_all_color h1' => 'color: {{VALUE}}',
								],
							]
						);
						/* hover color */
						$this->add_control(
							'witr_thovera_color',
							[
								'label' => esc_html__( 'Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,					
								'selectors' => [
									'{{WRAPPER}} .event_all_color h1:hover' => 'color: {{VALUE}}',
								],
							]
						);
						/* typograohy color */			
						$this->add_group_control(
							Group_Control_Typography::get_type(),
							[
								'name' => 'witr_ttpya_color',
								'label' => esc_html__( 'Typography', 'themex' ),
								'global' => [
									'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
								],
								'selector' => '{{WRAPPER}} .event_all_color h1',
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
									'{{WRAPPER}} .event_all_color h1' => 'width: {{SIZE}}{{UNIT}};',
								],
							]
						);
						/*  title background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_titlebg_iconc',
								'label' => esc_html__( ' Background', 'themex' ),
								'types' => [ 'classic', 'gradient'],
								'selector' => '{{WRAPPER}} .event_all_color h1',
							]
						);
							/* border_radius */
							$this->add_control(
								'witr_title_br',
								[
									'label' => esc_html__( 'Border Radius', 'themex' ),
									'type' => Controls_Manager::DIMENSIONS,
									'size_units' => [ 'px', '%' ],
									'selectors' => [
										'{{WRAPPER}} .event_all_color h1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .event_all_color h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .event_all_color h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);					
					

					$this->end_controls_tab();
					/*=== end admin normal style ====*/
				
						/*=== start admin hover style ====*/
						$this->start_controls_tab(
							'witr_admin_colors_hover',
							[
								'label' => esc_html__( 'Degignation', 'themex' ),
							]
						);
							/* color */
							$this->add_control(
								'witr_contenta_color',
								[
									'label' => esc_html__( 'Color', 'themex' ),
									'type' => Controls_Manager::COLOR,
									'global' => [
										'default' => Global_Colors::COLOR_SECONDARY,
									],					
									'separator'=>'before',									
									'selectors' => [
										'{{WRAPPER}} .event_all_color p' => 'color: {{VALUE}}',
									],
								]
							);

							/* typograohy color */			
							$this->add_group_control(
								Group_Control_Typography::get_type(),
								[
									'name' => 'witr_contenta_typography',
									'label' => esc_html__( 'Typography', 'themex' ),
									'global' => [
										'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
									],
									'selector' => '{{WRAPPER}} .event_all_color p',
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
										'{{WRAPPER}} .event_all_color p' => 'width: {{SIZE}}{{UNIT}};',
									],
								]
							);
						
							/* margin */
							$this->add_responsive_control(
								'contenta_padding',
								[
									'label' => esc_html__( 'Padding', 'themex' ),
									'type' => Controls_Manager::DIMENSIONS,
									'size_units' => [ 'px', '%', 'em' ],
									'selectors' => [
										'{{WRAPPER}} .event_all_color p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									],
								]
							);
						
						
						$this->end_controls_tab();
						/*=== end admin hover style ====*/
						
					/*=== start  style ====*/
					$this->start_controls_tab(
						'witr_admin_colors_active',
						[
							'label' => esc_html__( 'Box Bg ', 'themex' ),							
						]
					);						
						
						/* border_color */
						$this->add_control(
							'witr_border_admin_color',
							[
								'label' => esc_html__( 'Border Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .event_admin_area::before' => 'border-top-color: {{VALUE}}',
								],
							]
						);						
						
						
					$this->end_controls_tab();
					/*=== end admin active style ====*/		
				$this->end_controls_tabs();
				/*=== end admin_tabs style ====*/			
			 
			 $this->end_controls_section();
			/*=== end  witr admin style ====*/	

			
		/*===== start  Background Overlay Style =====*/
		$this->start_controls_section(
			'section_background_overlay',
			[
				'label' => esc_html__( 'Background Overlay', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,

			]
		);

		
			/* Single Event background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_icono_background',
					'label' => esc_html__( ' Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .event-img::before,{{WRAPPER}} .themex-event-thumb_adn:before',
				]
			);
			/* border_radius */
			$this->add_control(
				'witr_sing_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .themex-event-thumb_adn,{{WRAPPER}} .themex-event-thumb_adn:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
		
		$this->end_controls_section();
		/*===== end background Overlay =====*/		
		

			/*=== start witr Arrow style ====*/
			$this->start_controls_section(
				'witr_style_option_arrow',
				[
					'label' => esc_html__( 'Witr Arrow Options', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_c_arrows' => 'true',
						'witr_style_event' =>['2','3','6','8'],
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
							'witr_arrow_size1',
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
							'witr_arrow_color1',
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
								'name' => 'witr_arrowborder_style1',
								'label' => esc_html__( 'Arrow Border', 'themex' ),
								'selector' => '{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next',
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
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);

						$this->add_control(
							'witr_a_tb',
							[
								'label' => esc_html__( 'Select one time 2 style ex- top & left, If you need', 'themex' ),
								'type' => Controls_Manager::HEADING,
								'separator' => 'before',
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
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'top: {{SIZE}}{{UNIT}};',
								],
							]
						);
						
						/* witr_left */
						$this->add_responsive_control(
							'witr_left1',
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
							'witr_right1',
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
							'witr_arrow_hover_color1',
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
								'name' => 'witr_arrow_hover_background1',
								'label' => esc_html__( 'Arrow Hover Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-prev:hover,{{WRAPPER}} .slick-next:hover',
							]
						);
						/* witr_hoverborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_hoverborder_style11',
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
						'witr_style_event' =>['2','3','6','8'],
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
									'{{WRAPPER}} .slick-dots li button' => 'width: {{SIZE}}{{UNIT}};',
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
									'{{WRAPPER}} .slick-dots li button' => 'height: {{SIZE}}{{UNIT}};',
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
								'selector' => '{{WRAPPER}} .slick-dots li button',
							]
						);		
						/* witr_dotsborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_dotsborder_style1',
								'label' => esc_html__( 'Dots Border', 'themex' ),
								'selector' => '{{WRAPPER}} .slick-dots li button',
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
									'{{WRAPPER}} .slick-dots li button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						
						/* Active Dots Background heading */
						$this->add_control(
							'witr_acdots_bg_had1',
							[
								'label' => esc_html__( 'Active Dots Background', 'themex' ),
								'type' => Controls_Manager::HEADING,
							]
						);
							
						
						/* Active Dots background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_acdots_background1',
								'label' => esc_html__( 'Active Dots Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-dots li.slick-active button ',
							]
						);
						$this->add_control(
							'witr_d_tb',
							[
								'label' => esc_html__( 'Select one time 2 style ex- top & left, If you need', 'themex' ),
								'type' => Controls_Manager::HEADING,
								'separator' => 'before',
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
									'{{WRAPPER}} .slick-dots' => 'top: {{SIZE}}{{UNIT}};',
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
								'name' => 'witr_dots_hover_background1',
								'label' => esc_html__( 'Dots Hover Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-dots li button:hover',
							]
						);
						/* witr_hoverborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_hoverborder_style1',
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
		
		

    } /* function end */

    protected function render( $instance = [] ) {

        $witrshowdata = $this->get_settings_for_display();
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
        $witr_post_per_page       = ! empty( $witrshowdata['witr_post_per_page'] ) ? $witrshowdata['witr_post_per_page'] : 2;
        $witr_adc_event    = ! empty( $witrshowdata['witr_adc_event'] ) ? $witrshowdata['witr_adc_event'] : 'DESC';
        $witr_title_length    = ! empty( $witrshowdata['witr_title_length'] ) ? $witrshowdata['witr_title_length'] : 5;
        $witr_content_length  = ! empty( $witrshowdata['witr_content_length'] ) ? $witrshowdata['witr_content_length'] : 20;      
        $witr_gutter_column  =  $witrshowdata['witr_gutter_column']=='yes'  ? 'witr_all_pd0' : 'witr_all_mb_30'; 
		
		$page = ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );
		$paged = ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : $page );	
	
		
                        $args = array(
                            'post_type'            => 'em_event',
                            'post_status'          => 'publish',
                            'ignore_sticky_posts'  => 1,
                            'posts_per_page'       => $witr_post_per_page,
                            'order'                => $witr_adc_event,
							'paged'     => $paged,
							'page'      => $paged
                        );
                        
                        $posts = new \WP_Query($args);
		switch( $witrshowdata['witr_style_event']){

			case '8':
			?>
			<div class="event_active event_style_adn_3 witr_3e event_all_color text-<?php echo $witrshowdata['witr_text_ltc']; ?>">				
				<div class=" eventw_<?php echo $unic_id;?>">
				
					<?php while ($posts->have_posts()) : $posts->the_post(); 											

					?>
						<!-- single event -->
							<div class="col-lg-12 col-md-12 col-sm-12">
									<?php $event_time  = get_post_meta( get_the_ID(),'_txbdm_event_time', true ); 
									$event_address  = get_post_meta( get_the_ID(),'_txbdm_event_address', true ); 
									$event_day  = get_post_meta( get_the_ID(),'_txbdm_event_day', true ); 
									$event_month  = get_post_meta( get_the_ID(),'_txbdm_event_month', true );
									$event_year  = get_post_meta( get_the_ID(),'_txbdm_event_year', true );
									$admin_title  = get_post_meta( get_the_ID(),'_txbdm_admin_title', true );
									$admin_deg  = get_post_meta( get_the_ID(),'_txbdm_admin_deg', true );
									$admin_img  = get_post_meta( get_the_ID(),'_txbdm_admin_img', true );
									?>
									<div class="row themex-single-event_adn witr_event_style_5 witr_event_style_7 witr_event_style_8">
									<div class="event_display_flex">
										<div class="witr_image_event">
											<!-- BLOG THUMB -->
											<?php if(has_post_thumbnail()){?>
												<div class="themex-event-thumb_adn">
													<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('themex-event-default'); ?></a>
													
													<!-- event_admin_area -->
													<?php if( $admin_title || $admin_deg || $admin_img){?>
														<div class="event_admin_area">
															<div class="single_admin">
																<?php if($admin_title){?>
																	<h1><?php echo $admin_title;?></h1>
																<?php }?>
																<?php if($admin_deg){?>
																	<p><?php echo $admin_deg;?></p>
																<?php }?>
																<?php if($admin_img){?>
																	<img src="<?php echo $admin_img;?>" alt="logo" />
																 <?php }?>
															</div>
														</div>
													<?php }?>
												</div>									
											<?php } ?>											
										</div>
										<div class="wite_event_box">
											<!-- BLOG TITLE -->
											<div class="event-page-title_adn ">
												<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
												<?php if( $event_address || $event_time){?>
													<div class="themex-event-meta-left_adn span_text">
														<?php if($witrshowdata['witr_show_time']=='yes'){?>
															<?php if($event_time){?>
																<span><i class="icofont-ui-clock"></i><?php if($event_time){ echo esc_html($event_time);}?></span>
															<?php }?>
														<?php }?>
														<?php if($witrshowdata['witr_show_address']=='yes'){?>
															<?php if($event_address){?>
																<span><i class="icofont-google-map"></i><?php if($event_address){ echo esc_html($event_address);}?></span>
															<?php }?>
														<?php }?>
														<?php if($witrshowdata['witr_show_year']=='yes'){?>
														
															<?php if($event_day || $event_month ||$event_year){?>
																<span><i class="icofont-calendar"></i><?php if($event_day){ echo esc_html($event_day);}?> <?php if($event_month){ echo esc_html($event_month);}?> <?php if($event_year){ echo esc_html($event_year);}?></span>
															<?php } ?>
													
														<?php } ?>														
													</div>
												<?php } ?>												
											</div>
											<!-- content -->
											<?php if(! empty( $witrshowdata['witr_show_content'] )){?>
											<div class="witr_content_event">
												<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
											</div>	
											<?php } ?>
											<!-- btn -->
											<?php if(isset($witrshowdata['witr_event_button']) && ! empty($witrshowdata['witr_event_button'])){?>
												<div class="witr_event_btn btn_all_color">
													<a href="<?php the_permalink();?>"><?php echo $witrshowdata['witr_event_button']; ?> </a>	
												</div>	
											<?php } ?>											
										</div>											
									</div>
									</div>

							</div>
					<?php endwhile; ?>	
					<?php wp_reset_query(); ?>

					
				</div>
			</div>
		
			<?php
			include('witr_even/witrevajs.php');
			
			break;		
			case '7':
			?>
			<div class="event_active event_style_adn_3 witr_3e event_all_color text-<?php echo $witrshowdata['witr_text_ltc']; ?>">				
				
				<div class="event_wrap">
					<?php while ($posts->have_posts()) : $posts->the_post(); 											

					?>
						<!-- single event -->
							<div class="col-lg-12 col-md-12 col-sm-12  <?php echo $witr_gutter_column; ?>">
									<?php $event_time  = get_post_meta( get_the_ID(),'_txbdm_event_time', true ); 
									$event_address  = get_post_meta( get_the_ID(),'_txbdm_event_address', true ); 
									$event_day  = get_post_meta( get_the_ID(),'_txbdm_event_day', true ); 
									$event_month  = get_post_meta( get_the_ID(),'_txbdm_event_month', true );
									$event_year  = get_post_meta( get_the_ID(),'_txbdm_event_year', true );
									$admin_title  = get_post_meta( get_the_ID(),'_txbdm_admin_title', true );
									$admin_deg  = get_post_meta( get_the_ID(),'_txbdm_admin_deg', true );
									$admin_img  = get_post_meta( get_the_ID(),'_txbdm_admin_img', true );
									?>
									<div class="row themex-single-event_adn witr_event_style_5 witr_event_style_7 align_item_center">
										<div class="col-lg-5 col-md-6">
											<!-- BLOG THUMB -->
											<?php if(has_post_thumbnail()){?>
												<div class="themex-event-thumb_adn">
													<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('themex-event-default'); ?></a>
													
													<!-- event_admin_area -->
													<?php if( $admin_title || $admin_deg || $admin_img){?>
														<div class="event_admin_area">
															<div class="single_admin">
																<?php if($admin_title){?>
																	<h1><?php echo $admin_title;?></h1>
																<?php }?>
																<?php if($admin_deg){?>
																	<p><?php echo $admin_deg;?></p>
																<?php }?>
																<?php if($admin_img){?>
																	<img src="<?php echo $admin_img;?>" alt="logo" />
																 <?php }?>
															</div>
														</div>
													<?php }?>
												</div>									
											<?php } ?>											
										</div>
										<div class="col-lg-4 col-md-6">
											<!-- BLOG TITLE -->
											<div class="event-page-title_adn ">
												<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
												<?php if( $event_address || $event_time){?>
													<div class="themex-event-meta-left_adn span_text">
													<?php if($witrshowdata['witr_show_time']=='yes'){?>
														<?php if($event_time){?>
															<span><i class="icofont-ui-clock"></i><?php if($event_time){ echo esc_html($event_time);}?></span>
														<?php }?>
													<?php }?>
													<?php if($witrshowdata['witr_show_address']=='yes'){?>
														<?php if($event_address){?>
															<span><i class="icofont-google-map"></i><?php if($event_address){ echo esc_html($event_address);}?></span>
														<?php }?>
													<?php }?>
														
													</div>
												<?php } ?>												
											</div>
											<!-- content -->
											<?php if(! empty( $witrshowdata['witr_show_content'] )){?>
											<div class="witr_content_event">
												<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
											</div>	
											<?php } ?>											
										</div>	
										<div class="col-lg-3 col-md-12">
											<div class="witr_event_d">
												<!-- Goal -->
												<?php if(isset($witrshowdata['witr_event_button']) && ! empty($witrshowdata['witr_event_button'])){?>
													<div class="witr_event_btn btn_all_color style7_btn">
														<a href="<?php the_permalink();?>"><?php echo $witrshowdata['witr_event_button']; ?> 
													
														<?php if($witrshowdata['witr_show_year']=='yes'){?>
														<div class="event_date_5 style7_day">
														<?php if($event_day || $event_month ||$event_year){?>
															<span><?php if($event_day){ echo esc_html($event_day);}?> <?php if($event_month){ echo esc_html($event_month);}?> <?php if($event_year){ echo esc_html($event_year);}?></span>

														<?php } ?>
														</div>
														<?php } ?>
													</a>	
													</div>	
												<?php } ?>												
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
			
			case '6':
			?>
                <div class=" event_active event_all_color text-<?php echo $witrshowdata['witr_text_ltc']; ?>">	
					<div class="witr_event_6 eventw_<?php echo $unic_id;?>">
						<?php
							while($posts->have_posts()):$posts->the_post();
						?>
							<div class="col-lg-12 col-md-6 col-sm-12  <?php echo $witr_gutter_column; ?>">
								<?php $event_time  = get_post_meta( get_the_ID(),'_txbdm_event_time', true ); 
								$event_address  = get_post_meta( get_the_ID(),'_txbdm_event_address', true ); 
								$event_day  = get_post_meta( get_the_ID(),'_txbdm_event_day', true ); 
								$event_month  = get_post_meta( get_the_ID(),'_txbdm_event_month', true ); 
								$event_year  = get_post_meta( get_the_ID(),'_txbdm_event_year', true );

								?>
								<div class="themex-single-event_adns">					
									<!-- BLOG THUMB -->
									<?php if(has_post_thumbnail()){?>
										<div class="themex-event-thumb_adn">
											<?php the_post_thumbnail('themex-event-370-450'); ?>												
											<div class="themex_event_abs">
												<?php if($event_day || $event_month || $event_year){?>
													<div class="themex_event_date">
														<span><?php if($event_day){ echo esc_html($event_day);}?></span>
														<span><?php if($event_month){ echo esc_html($event_month);}?></span>
														<?php if($witrshowdata['witr_show_year']=='yes'){?>
															<span><?php if($event_year){ echo esc_html($event_year);}?></span>
														<?php } ?>	
													</div>
												<?php } ?>	
												<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
												<?php if($event_time || $event_address){?>
													<div class="themex-event-meta-left_adn">
														<?php if($witrshowdata['witr_show_time']=='yes'){?>
															<?php if($event_time){?>
																<span><i class="icofont-ui-clock"></i><?php if($event_time){ echo esc_html($event_time);}?></span>
															<?php }?>
														<?php }?>
														<?php if($witrshowdata['witr_show_address']=='yes'){?>
															<?php if($event_address){?>
																<span><i class="icofont-google-map"></i><?php if($event_address){ echo esc_html($event_address);}?></span>
															<?php }?>
														<?php }?>
													</div>
												<?php } ?>
												<!-- content -->
												<?php if(! empty( $witrshowdata['witr_show_content'] )){?>
												<div class="witr_content_event">
													<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
												</div>	
												<?php } ?>												
											</div>

											
										</div>									
									<?php } ?>
								</div>
							</div>
							<?php endwhile; ?>	
							<?php wp_reset_query(); ?>
					</div>
                </div>
			<?php
			include('witr_even/witrevajs.php');			
			break;			
			case '5':
			?>
			<div class="event_active event_style_adn_3 witr_3e event_all_color text-<?php echo $witrshowdata['witr_text_ltc']; ?>">				
				<div class="event_wrap">
				
					<?php while ($posts->have_posts()) : $posts->the_post(); 											

					?>
						<!-- single event -->
							<div class="col-lg-12 col-md-12 col-sm-12  <?php echo $witr_gutter_column; ?>">
									<?php $event_time  = get_post_meta( get_the_ID(),'_txbdm_event_time', true ); 
									$event_address  = get_post_meta( get_the_ID(),'_txbdm_event_address', true ); 
									$event_day  = get_post_meta( get_the_ID(),'_txbdm_event_day', true ); 
									$event_month  = get_post_meta( get_the_ID(),'_txbdm_event_month', true );
									$event_year  = get_post_meta( get_the_ID(),'_txbdm_event_year', true );
									?>
									<div class="row themex-single-event_adn witr_event_style_5 align_item_center">
										<div class="col-lg-3 col-md-6">
											<!-- BLOG THUMB -->
											<?php if(has_post_thumbnail()){?>
												<div class="themex-event-thumb_adn">
													<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('themex-event-default'); ?></a>
												</div>									
											<?php } ?>											
										</div>
										<div class="col-lg-4 col-md-6">
											<!-- BLOG TITLE -->
											<div class="event-page-title_adn ">
												<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
												<?php if( $event_address ){?>
													<div class="themex-event-meta-left_adn">
														<span><i class="icofont-google-map"></i><?php if($event_address){ echo esc_html($event_address);}?></span>
													</div>
												<?php } ?>
											</div>
											<!-- content -->
											<?php if(! empty( $witrshowdata['witr_show_content'] )){?>
											<div class="witr_content_event">
												<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
											</div>	
											<?php } ?>											
										</div>	
										<div class="col-lg-3 col-md-6">
											<div class="witr_event_d">
												<?php if($event_day || $event_month || $event_year){?>
													<div class="event_date_5">
														<span><i class="icofont-calendar"></i><?php if($event_day){ echo esc_html($event_day);}?></span>
														<span><?php if($event_month){ echo esc_html($event_month);}?></span>
														<?php if($witrshowdata['witr_show_year']=='yes'){?>
															<span><?php if($event_year){ echo esc_html($event_year);}?></span>
														<?php } ?>
													</div>
												<?php } ?>
																								

												<?php if($event_time){?>
													<div class="themex-event-meta-left_adn">
														<span><i class="icofont-ui-clock"></i><?php if($event_time){ echo esc_html($event_time);}?></span>
													</div>
												<?php } ?>											
											</div>
										</div>
										<div class="col-lg-2 col-md-6">
											<!-- Goal -->
											<?php if(isset($witrshowdata['witr_event_button']) && ! empty($witrshowdata['witr_event_button'])){?>
												<div class="witr_event_btn btn_all_color">
													<a href="<?php the_permalink();?>"><?php echo $witrshowdata['witr_event_button']; ?> </a>
												</div>												
											<?php } ?>												
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
               <div class=" bgimgload event_all_color text-<?php echo $witrshowdata['witr_text_ltc']; ?>">	
					<div class="row event-messonary">
						<?php
							while($posts->have_posts()):$posts->the_post();
						?>
							<div class="col-lg-<?php if( !empty( $witrshowdata['witr_column_grid'] ) ){echo $witrshowdata['witr_column_grid'];}?>  col-md-6 col-sm-8 mrbe20  <?php echo $witr_gutter_column; ?>">
								<?php $event_time  = get_post_meta( get_the_ID(),'_txbdm_event_time', true ); 
								$event_address  = get_post_meta( get_the_ID(),'_txbdm_event_address', true ); 
								$event_day  = get_post_meta( get_the_ID(),'_txbdm_event_day', true ); 
								$event_month  = get_post_meta( get_the_ID(),'_txbdm_event_month', true ); 
								$event_year  = get_post_meta( get_the_ID(),'_txbdm_event_year', true );

								?>
								<div class="themex-single-event_adns">					
									<!-- BLOG THUMB -->
									<?php if(has_post_thumbnail()){?>
										<div class="themex-event-thumb_adn">
											<?php the_post_thumbnail('themex-event-default'); ?>												
										<div class="witr_category"><div class="tevbt"><?php esc_html_e('Event','themex');?></div></div>
											<div class="themex_event_abs">
												<?php if($event_day || $event_month || $event_year){?>
													<div class="themex_event_date">
														<span><?php if($event_day){ echo esc_html($event_day);}?></span>
														<span><?php if($event_month){ echo esc_html($event_month);}?></span>
														<?php if($witrshowdata['witr_show_year']=='yes'){?>
															<span><?php if($event_year){ echo esc_html($event_year);}?></span>
														<?php } ?>
													</div>
												<?php } ?>	
												<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
												<!-- content -->
												<?php if(! empty( $witrshowdata['witr_show_content'] )){?>
												<div class="witr_content_event">
													<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
												</div>	
												<?php } ?>												
											</div>
											
										</div>									
									<?php } ?>
								</div>
							</div>
						<?php endwhile;
						 wp_reset_query(); wp_reset_postdata();
						?>
					</div>
                </div>		
			
			<?php			
			break;			
			case '3':
			?>
			<div class="event_active event_style_adn_3 witr_3e margin_top0 event_all_color text-<?php echo $witrshowdata['witr_text_ltc']; ?>">				
				<div class="event_wrap event_carousel eventw_<?php echo $unic_id;?>">
				
					<?php while ($posts->have_posts()) : $posts->the_post(); 											

					?>
						<!-- single event -->
							<div class="col-lg-12 col-md-6 col-sm-12  <?php echo $witr_gutter_column; ?>">
									<?php $event_time  = get_post_meta( get_the_ID(),'_txbdm_event_time', true ); 
									$event_address  = get_post_meta( get_the_ID(),'_txbdm_event_address', true ); 
									$event_day  = get_post_meta( get_the_ID(),'_txbdm_event_day', true ); 
									$event_month  = get_post_meta( get_the_ID(),'_txbdm_event_month', true );
									$event_year  = get_post_meta( get_the_ID(),'_txbdm_event_year', true );
									?>
									<div class="themex-single-event_adn">					

									<!-- BLOG THUMB -->
									<?php if(has_post_thumbnail()){?>
										<div class="themex-event-thumb_adn">
											<?php the_post_thumbnail('themex-event-default'); ?>
											<div class="witr_icon_adn"><a href="<?php the_permalink(); ?>"> <i class="icofont-link"></i></a></div>
											<?php if($event_day || $event_month || $event_year){?>
												<div class="event_date">
													<span><?php if($event_day){ echo esc_html($event_day);}?></span>
													<span><?php if($event_month){ echo esc_html($event_month);}?></span>
													<?php if($witrshowdata['witr_show_year']=='yes'){?>
														<span><?php if($event_year){ echo esc_html($event_year);}?></span>
													<?php } ?>
												</div>
											<?php } ?>	
										</div>									
								
									<?php } ?>
									
									<div class="em-event-content-area_adn ">										
										<!-- BLOG TITLE -->
										<div class="event-page-title_adn ">
											<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											<?php if($event_time || $event_address){?>
												<div class="themex-event-meta-left_adn">
													<?php if($witrshowdata['witr_show_time']=='yes'){?>
														<?php if($event_time){?>
															<span><i class="icofont-ui-clock"></i><?php if($event_time){ echo esc_html($event_time);}?></span>
														<?php }?>
													<?php }?>
													<?php if($witrshowdata['witr_show_address']=='yes'){?>
														<?php if($event_address){?>
															<span><i class="icofont-google-map"></i><?php if($event_address){ echo esc_html($event_address);}?></span>
														<?php }?>
													<?php }?>
												</div>
											<?php } ?>
											<!-- content -->
											<?php if(! empty( $witrshowdata['witr_show_content'] )){?>
											<div class="witr_content_event">
												<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
											</div>	
											<?php } ?>
										</div>
										<!-- Goal -->
										<?php if(isset($witrshowdata['witr_event_button']) && ! empty($witrshowdata['witr_event_button'])){?>
											<div class="witr_event_btn btn_all_color">
												<a href="<?php the_permalink();?>"><?php echo $witrshowdata['witr_event_button']; ?> </a>
											</div>												
										<?php } ?>											

									</div>										

									</div>
						
							</div>
					<?php endwhile; ?>	
					<?php wp_reset_query(); ?>

					
				</div>
			</div>									
			
			<?php	
			include('witr_even/witrevajs.php');			
			break;
			case '2':
			?>
				<div class="event_active witr_2e event_all_color text-<?php echo $witrshowdata['witr_text_ltc']; ?>">
					<div class="eventw_<?php echo $unic_id;?>">
						<?php


							while($posts->have_posts()):$posts->the_post();
						?>

							<div class="col-lg-12 col-md-6 col-sm-12  <?php echo $witr_gutter_column; ?>">
								<?php
								$event_time  = get_post_meta( get_the_ID(),'_txbdm_event_time', true ); 
								$event_address  = get_post_meta( get_the_ID(),'_txbdm_event_address', true ); 
								$event_day  = get_post_meta( get_the_ID(),'_txbdm_event_day', true ); 
								$event_month  = get_post_meta( get_the_ID(),'_txbdm_event_month', true );
								$event_year  = get_post_meta( get_the_ID(),'_txbdm_event_year', true );
								?>
								<div class="themex-single-event_adn">					
									<!-- BLOG THUMB -->
									<?php if(has_post_thumbnail()){?>
										<div class="themex-event-thumb_adn">
											<?php the_post_thumbnail('themex-event-default'); ?>
											<div class="witr_icon_adn"><a href="<?php the_permalink(); ?>"> <i class="icofont-link"></i></a></div>
											<?php if($event_day || $event_month || $event_year){?>
												<div class="event_date">
													<span><?php if($event_day){ echo esc_html($event_day);}?></span>
													<span><?php if($event_month){ echo esc_html($event_month);}?></span>
													<?php if($witrshowdata['witr_show_year']=='yes'){?>
														<span><?php if($event_year){ echo esc_html($event_year);}?></span>
													<?php } ?>
												</div>
											<?php } ?>	
										</div>									
								
									<?php } ?>
									
									<div class="em-event-content-area_adn ">										
										<!-- BLOG TITLE -->
										<div class="event-page-title_adn ">
											<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											<?php if($event_time || $event_address){?>
												<div class="themex-event-meta-left_adn">
													<?php if($witrshowdata['witr_show_time']=='yes'){?>
														<?php if($event_time){?>
															<span><i class="icofont-ui-clock"></i><?php if($event_time){ echo esc_html($event_time);}?></span>
														<?php }?>
													<?php }?>
													<?php if($witrshowdata['witr_show_address']=='yes'){?>
														<?php if($event_address){?>
															<span><i class="icofont-google-map"></i><?php if($event_address){ echo esc_html($event_address);}?></span>
														<?php }?>
													<?php }?>
												</div>
											<?php } ?>
											<!-- content -->
											<?php if(! empty( $witrshowdata['witr_show_content'] )){?>
											<div class="witr_content_event">
												<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
											</div>	
											<?php } ?>
										</div>																						
									</div>
								</div>
							</div>

						<?php endwhile;
						 wp_reset_query(); wp_reset_postdata();
						?>
					</div>
                </div>		
			<?php
			include('witr_even/witrevajs.php');			
			
			break;			
			default:
        ?>
               <div class=" bgimgload event_all_color text-<?php echo $witrshowdata['witr_text_ltc']; ?>">	
					<div class="row event-messonary">
						<?php


							while($posts->have_posts()):$posts->the_post();
						?>

							<div class="col-lg-<?php if( !empty( $witrshowdata['witr_column_grid'] ) ){echo $witrshowdata['witr_column_grid'];}?>  col-md-6 col-sm-8  <?php echo $witr_gutter_column; ?>">
								<?php
								$event_time  = get_post_meta( get_the_ID(),'_txbdm_event_time', true ); 
								$event_address  = get_post_meta( get_the_ID(),'_txbdm_event_address', true ); 
								$event_day  = get_post_meta( get_the_ID(),'_txbdm_event_day', true ); 
								$event_month  = get_post_meta( get_the_ID(),'_txbdm_event_month', true );
								$event_year  = get_post_meta( get_the_ID(),'_txbdm_event_year', true );
								?>
								<div class="themex-single-event_adn">					
									<!-- BLOG THUMB -->
									<?php if(has_post_thumbnail()){?>
										<div class="themex-event-thumb_adn">
											<?php the_post_thumbnail('themex-event-default'); ?>
											<div class="witr_icon_adn"><a href="<?php the_permalink(); ?>"> <i class="icofont-link"></i></a></div>	
										</div>									
								
									<?php } ?>
									
									<div class="em-event-content-area_adn ">
            							<?php $terms = get_the_terms(get_the_ID(), 'em_event_cat'); 
            							if ( $terms ) { ?>
											<div class="witr_event_category all_event_category">	
												<?php foreach ( $terms as $term ) {	
													echo '<span>';
														echo $term->name;
													echo '</span>';
												} ?>
											</div>
										<?php } ?>									    										
										<!-- BLOG TITLE -->
										<div class="event-page-title_adn ">
											<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											<?php if($event_time || $event_address){?>
												<div class="themex-event-meta-left_adn">
													<?php if($event_day || $event_month || $event_year){?>
														<?php if($witrshowdata['witr_show_year']=='yes'){?>
															<span><i class="icofont-calendar"></i><?php if($event_day){ echo esc_html($event_day);}?>
															<?php if($event_month){ echo esc_html($event_month);}?>
															<?php if($event_year){ echo esc_html($event_year);}?>
															</span>
														<?php } ?>
													<?php } ?>
													<?php if($witrshowdata['witr_show_address']=='yes'){?>
														<?php if($event_address){?>
															<span><i class="icofont-google-map"></i><?php if($event_address){ echo esc_html($event_address);}?></span>
														<?php }?>
													<?php }?>													
													<?php if($witrshowdata['witr_show_time']=='yes'){?>
														<?php if($event_time){?>
															<span><i class="icofont-ui-clock"></i><?php if($event_time){ echo esc_html($event_time);}?></span>
														<?php }?>
													<?php }?>

													
												</div>
											<?php } ?>
										</div>
											<!-- content -->
											<?php if(! empty( $witrshowdata['witr_show_content'] )){?>
											<div class="witr_content_event">
												<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
											</div>	
											<?php } ?>
											<!-- Button -->
											<?php if(isset($witrshowdata['witr_event_button']) && ! empty($witrshowdata['witr_event_button'])){?>
												<div class="witr_event_btn btn_all_color">
													<a href="<?php the_permalink();?>"><?php echo $witrshowdata['witr_event_button']; ?> </a>
												</div>												
											<?php } ?>
											
									</div>
								</div>
							</div>

						<?php endwhile;
						 wp_reset_query(); wp_reset_postdata();
						?>
					</div>
                </div>
        <?php

			break;
			
		} // end switch				
			if( $witrshowdata['witr_pagination'] == 'yes' ){?>
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
								'total' => $posts->max_num_pages
							) );										
						
						?>
					</div>
				</div>
			</div>															
			<?php }
			

			
			
       
	} 




}