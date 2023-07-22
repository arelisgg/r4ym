<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Post_Team extends Widget_Base {

    public function get_name() {
        return 'witr_post_team_section';
    }
    
    public function get_title() {
        return esc_html__( ' Post Team', 'themex' );
    }

    public function get_icon() {
        return 'themex_icon eicon-person';
    }
    public function get_style_depends() {
        return [ 'wteam' ];
    }	
	public function get_script_depends() {
        return [  ];
    }	
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'witr_post_team_option',
            [
                'label' => esc_html__( '  Team Options', 'themex' ),
            ]
        );
		
		
			/* post_team style witr_style_post_team */
			$this->add_control(
				'witr_style_post_team',
				[
					'label' => esc_html__( 'Post Team style', 'themex' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'1' => esc_html__( 'Team Carousel style 1', 'themex' ),
						'2' => esc_html__( 'Team style 2', 'themex' ),
						'3' => esc_html__( 'Team style 3', 'themex' ),
						'4' => esc_html__( 'Team style 4', 'themex' ),
						'5' => esc_html__( 'Team style 5', 'themex' ),
						'6' => esc_html__( 'Team Carousel style 6', 'themex' ),
						'7' => esc_html__( 'Team Carousel style 7', 'themex' ),
						'8' => esc_html__( 'Team Carousel style 8', 'themex' ),
						'9' => esc_html__( 'Team Carousel style 9', 'themex' ),
						'10' => esc_html__( 'Team Carousel style 10', 'themex' ),
						'11' => esc_html__( 'Team Carousel style 11', 'themex' ),
					],
					'default' => '1',
				]
			);
			

			
			/* post_team iten show witr_post_per_page */
            $this->add_control(
                'witr_post_per_page',
                [
                    'label' => esc_html__( 'Show Number Of post_team', 'themex' ),
                    'type' => Controls_Manager::NUMBER,				
                    'separator' => 'before',
                    'min' => 1,
                    'max' => 500,
                    'step' => 1,
                    'default' => 3,
                ]
            );
			/* post_team show witr_adc_post_team */
 			$this->add_control(
				'witr_adc_post_team',
				[
					'label' => esc_html__( 'Post_Team ASC/DSC style', 'themex' ),
					'type' => Controls_Manager::SELECT,
                    'separator' => 'before',					
					'options' => [
						'DESC'	=> esc_html__( 'Descending', 'themex' ),
						'ASC'	=> esc_html__( 'Ascending', 'themex' )
					],
					'default' => 'DESC',
				]
			);
			/* post_team column witr_column_grid */
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
						'witr_style_post_team' =>['2','3','4','5']
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
			
		/*===== Witr Slick Options ====*/
        $this->start_controls_section(
            'witr_slick_team_option',
            [
                'label' => esc_html__( 'Witr Slick Options', 'themex' ),
				'condition' => [
					'witr_style_post_team' =>['1','6','7','8','9','10','11']
				],				
            ]
        );
		
				/* witr_slides_to_show */ 		
				$this->add_control(
					'witr_slides_to_show',
					[
						'label' => esc_html__( 'Slides to Show', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',					
						'default' => 4,						
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
						'max' => 5000,
						'step' => 100,
						'default' => 2000,						
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
						'default' => 4,						
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
						'default' => 2,						
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
						'label' => esc_html__( 'Use Unic ID', 'themex' ),
						'type' => Controls_Manager::TEXTAREA,
						'separator' => 'before',
						'description' => esc_html__( 'Please use a unic ID here, ex- any text.', 'themex' ),
						'default' => 'idteam',
						'placeholder' => esc_attr__( 'Type your ID here', 'themex' ),							
					]
				);				
				

        $this->end_controls_section();

		/*=== end_controls_section ===*/
		

	   /*===========================================================================================
										START TO STYLE
		=============================================================================================*/
		
		
			/*=== start witr_single_team style ====*/
			$this->start_controls_section(
				'witr_single_team',
				[
					'label' => esc_html__( 'Single Team Option', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					// 'condition' => [
						// 'witr_style_post_team' => ['1','2','3'],
					// ],					
					
				]
			);	

				/* witr_single_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_single_border',
						'label' => esc_html__( 'Single Border', 'themex' ),
						'selector' => '{{WRAPPER}} .all_color_team',
					]
				);			
				/* single_border_radius */
				$this->add_control(
					'witr_single_border_radius',
					[
						'label' => esc_html__( 'Single Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .all_color_team' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* box background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_box_background',
						'label' => esc_html__( ' Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .all_color_team',							
					]
				);				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadowsbox',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .all_color_team',
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
							'{{WRAPPER}} .all_color_team' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .all_color_team' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_control(
					'witr_moref_heading',
					[
						'label' => esc_html__( 'Hover Option', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator' => 'before',
					]
				);				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadowsboxh',
						'label' => esc_html__( 'Box Shadow Hover', 'themex' ),
						'selector' => '{{WRAPPER}} .all_color_team:hover',
					]
				);
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_singleh_bb',
						'label' => esc_html__( 'Border Hover', 'themex' ),
						'selector' => '{{WRAPPER}} .all_color_team:hover',
					]
				);

				
			
			$this->end_controls_section();
			/* === end witr_single_team ===  */		
		
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
							'{{WRAPPER}} .all_color_team h5,{{WRAPPER}} .all_color_team h5 a' => 'color: {{VALUE}}',
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
							'{{WRAPPER}} .all_color_team h5 a:hover,{{WRAPPER}} .all_color_team h5 a:hover' => 'color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .all_color_team h5,{{WRAPPER}} .all_color_team h5 a',
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
							'{{WRAPPER}} .all_color_team h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .all_color_team h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
			 
			 $this->end_controls_section();
			/*=== end  witr_title style ====*/


		/*=== start witr_sub_title style ====*/
		$this->start_controls_section(
			'witr_style_option_title2',
			[
				'label' => esc_html__( 'Sub Title Color Option', 'themex' ),
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
						'default' => Global_Colors::COLOR_SECONDARY,
					],					
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .all_color_team span' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .all_color_team span:hover' => 'color: {{VALUE}}',
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
						'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
					],
					'selector' => '{{WRAPPER}} .all_color_team span',
				]
			);						
			
			/* margin */
			$this->add_responsive_control(
				'witr_title margin2',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_color_team span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* padding */
			$this->add_responsive_control(
				'witr_title padding2',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_color_team span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_sub_title style ====*/			
			
			
			

			/*=== start witr content style ====*/

			$this->start_controls_section(
				'witr_style_option_content',
				[
					'label' => esc_html__( 'Content Color Option', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_style_post_team' => ['2','3','5'],
					]					
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
							'{{WRAPPER}} .all_color_team p' => 'color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .all_color_team p',
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
							'{{WRAPPER}} .all_color_team p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .all_color_team p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'condition' => [
						'witr_style_post_team' => ['2','3','4'],
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
						'selectors' => [
							'{{WRAPPER}} .all_team_s_color a' => 'color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .all_team_s_color a',
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
							'{{WRAPPER}} .all_team_s_color a' => 'font-size: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .all_team_s_color a' => 'width: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .all_team_s_color a' => 'height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .all_team_s_color a' => 'line-height: {{SIZE}}{{UNIT}};',
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
						'prefix_class' => 'themex-star-rating%s--align-',
						'selectors' => [
							'{{WRAPPER}} .all_team_s_color a' => 'text-align: {{VALUE}}',
						],
					]
				);
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_bordera_style',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .all_team_s_color a',
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
							'{{WRAPPER}} .all_team_s_color a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);				
													
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .all_team_s_color a',
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
							'{{WRAPPER}} .all_team_s_color a' => 'mix-blend-mode: {{VALUE}}',
						],
						'separator' => 'none',
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
							'{{WRAPPER}} .all_team_s_color a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .all_team_s_color a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .all_team_s_color a:hover' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .all_team_s_color a:hover',
						]
					);
					/* border_hover_color */
					$this->add_control(
						'witr_border_hover_color',
						[
							'label' => esc_html__( 'Icon Border Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,							
							'selectors' => [
								'{{WRAPPER}} .all_team_s_color a:hover' => 'border-color: {{VALUE}}',
							],
						]
					);
					/*  Hover Rotate */
					$this->add_responsive_control(
						'witr_rotat_hover',
						[
							'label' => esc_html__( 'Rotate Hover', 'themex' ),
							'type' => Controls_Manager::SLIDER,
							'size_units' => [ 'deg' ],
							'default' => [
								'size' => '',
								'unit' => 'deg',
							],
							'tablet_default' => [
							],
								'unit' => 'deg',
							'mobile_default' => [
								'unit' => 'deg',
							],
							'selectors' => [
								'{{WRAPPER}} .all_team_s_color a:hover' => 'transform: rotate({{SIZE}}{{UNIT}});',
							],
						]
					);					
					
					
					
					$this->end_controls_tab();
					/*=== end icon hover style ====*/
					
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/

		$this->end_controls_section();

		/*=== end witr_icon style ====*/

			
		/*==================================
			start witr icon top style 
		====================================*/
		$this->start_controls_section(
			'witr_style_icon2_option',
			[
				'label' => esc_html__( 'Icon Top Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_post_team' => ['1','3','5','7','8','9','10','11'],
				],				
			]
		);
			/*=== start icon_tabs style ====*/
			$this->start_controls_tabs( 'icon_colorst' );
			
				/*=== start icon_normal style ====*/
				$this->start_controls_tab(
					'witr_icon_top_normal',
					[
						'label' => esc_html__( 'Normal', 'themex' ),
					]
				);			
					/* Icon Color */
					$this->add_control(
						'witr_primary_color2',
						[
							'label' => esc_html__( 'Icon Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							
							'selectors' => [
								'{{WRAPPER}} .all_team_icon_o_color a' => 'color: {{VALUE}}',
							],					
						]
					);
					/* Icon background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_icon2_background',
							'label' => esc_html__( 'Icon Background', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .all_team_icon_o_color a',
						]
					);				
					/*  icon font size */
					$this->add_responsive_control(
						'icon2_size',
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
								'{{WRAPPER}} .all_team_icon_o_color a' => 'font-size: {{SIZE}}{{UNIT}};',
							],
						]
					);
					
					/*  icon width */
					$this->add_responsive_control(
						'witr_icon2_width',
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
								'{{WRAPPER}} .all_team_icon_o_color a' => 'width: {{SIZE}}{{UNIT}};',
							],
						]
					);
					/*  icon height */
					$this->add_responsive_control(
						'witr_icon2_height',
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
								'{{WRAPPER}} .all_team_icon_o_color a' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);
					/*  icon line height */
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
								'{{WRAPPER}} .all_team_icon_o_color a' => 'line-height: {{SIZE}}{{UNIT}};',
							],
						]
					);
					/* witr_text_align */					
					$this->add_responsive_control(
						'witr_textt_align',
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
								'{{WRAPPER}} .all_team_icon_o_color a' => 'text-align: {{VALUE}}',
							],
						]
					);
					/* witr_border_style */
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'witr_border2_style',
							'label' => esc_html__( 'Border', 'themex' ),
							'selector' => '{{WRAPPER}} .all_team_icon_o_color a',
						]
					);
					/* border_radius */
					$this->add_control(
						'witr_border2_radius',
						[
							'label' => esc_html__( 'Border Radius', 'themex' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%' ],
							'selectors' => [
								'{{WRAPPER}} .all_team_icon_o_color a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);												

						/* icon margin */
						$this->add_responsive_control(
							'witr_icon2_margin',
							[
								'label' => esc_html__( 'Icon Margin', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .all_team_icon_o_color a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/* icon padding */
						$this->add_responsive_control(
							'witr_icon2_padding',
							[
								'label' => esc_html__( 'Icon Padding', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .all_team_icon_o_color a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);


					$this->end_controls_tab();
					/*=== end icon normal style ====*/
				
					/*=== start icon hover style ====*/
					$this->start_controls_tab(
						'witr_icon_top_hover',
						[
							'label' => esc_html__( 'Icon Hover', 'themex' ),
						]
					);
				
						/* Icon2 hover Color */
						$this->add_control(
							'witr_primary_hover_color2',
							[
								'label' => esc_html__( 'Icon Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								
								'selectors' => [
									'{{WRAPPER}} .all_team_icon_o_color a:hover' => 'color: {{VALUE}}',
								],					
							]
						);				
						/* hover Icon2 background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_hover_icon2',
								'label' => esc_html__( 'Top Icon Hover BG', 'themex' ),
								'types' => [ 'classic', 'gradient'],
								'selector' => '{{WRAPPER}} .all_team_icon_o_color a:hover',
							]
						);				
						/* witr_border_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_bordh_style',
								'label' => esc_html__( 'Border', 'themex' ),
								'selector' => '{{WRAPPER}} .all_team_icon_o_color a:hover',
							]
						);
						/*  Hover Rotate */
						$this->add_responsive_control(
							'witr_rotatet_hover',
							[
								'label' => esc_html__( 'Rotate Hover', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'deg' ],
								'default' => [
									'size' => '',
									'unit' => 'deg',
								],
								'tablet_default' => [
								],
									'unit' => 'deg',
								'mobile_default' => [
									'unit' => 'deg',
								],
								'selectors' => [
									'{{WRAPPER}} .all_team_icon_o_color a:hover' => 'transform: rotate({{SIZE}}{{UNIT}});',
								],
							]
						);				
		
				

					$this->end_controls_tab();
					/*=== end icon hover style ====*/
					
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/
		$this->end_controls_section();
		/*=== end witr_icon top style ====*/

		
		/*=== start witr List content style ====*/		
		 $this->start_controls_section(
			'witr_option_list_content',
			[
				'label' => esc_html__( 'List Icon & Text Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_post_team' =>['8']
				],				
			]		 
		 );
		 
		/*=== start list_tabs style ====*/
		$this->start_controls_tabs( 'list_colors' );		
			/*=== start icon_normal style ====*/
			$this->start_controls_tab(
				'iconl_colors_normal',
				[
					'label' => esc_html__( 'icon', 'themex' ),
				]
			);		 

		/* Icon Color */
		$this->add_control(
			'witr_iconl_color',
			[
				'label' => esc_html__( 'Icon', 'themex' ),
				'type' => Controls_Manager::COLOR,
				'separator'=>'before',
				'selectors' => [
					'{{WRAPPER}} .team_list_op ul li i,{{WRAPPER}} .team_list_op ul li a i' => 'color: {{VALUE}}',
				],
			]
		);
		/*  list icon font size */
		$this->add_responsive_control(
			'witr_iconl_size',
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
					'{{WRAPPER}} .team_list_op ul li i,{{WRAPPER}} .team_list_op ul li a i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		/* Icon margin */
		$this->add_responsive_control(
			'witr_contentl_margin',
			[
				'label' => esc_html__( ' Margin', 'themex' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .team_list_op ul li i,{{WRAPPER}} .team_list_op ul li a i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		/* Icon padding */
		$this->add_responsive_control(
			'witr_contentl_padding',
			[
				'label' => esc_html__( ' Padding', 'themex' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .team_list_op ul li i,{{WRAPPER}} .team_list_op ul li a i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);		
		
		$this->end_controls_tab();
		/*=== end list normal style ====*/
	
			/*=== start icon hover style ====*/
			$this->start_controls_tab(
				'list_colorl_hover',
				[
					'label' => esc_html__( 'text ', 'themex' ),
				]
			);		
				/* list text color */
				$this->add_control(
					'witr_list_color',
					[
						'label' => esc_html__( ' Text', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'global' => [
							'default' => Global_Colors::COLOR_TEXT,
						],						
						'selectors' => [
							'{{WRAPPER}} .team_list_op ul li,{{WRAPPER}} .team_list_op ul li a' => 'color: {{VALUE}}',
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
							'default' => Global_Typography::TYPOGRAPHY_TEXT,
						],
						'selector' => '{{WRAPPER}} .team_list_op ul li,{{WRAPPER}} .team_list_op ul li a',
					]
				);			
				
				/* margin */
				$this->add_responsive_control(
					'witr_list_margin',
					[
						'label' => esc_html__( 'Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .team_list_op ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* padding */
				$this->add_responsive_control(
					'witr_list_padding',
					[
						'label' => esc_html__( 'Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .team_list_op ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);


				$this->end_controls_tab();
				/*=== end text hover style ====*/
				
		$this->end_controls_tabs();
		/*=== end text_tabs style ====*/		
		 $this->end_controls_section();
		/*=== end  witr button style ====*/	
			
		/*=== start witr_box icon/text style  ====*/
		$this->start_controls_section(
			'witr_style_option_box',
			[
				'label' => esc_html__( 'Box Content/3D Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_post_team' => ['1','2','3','4','7','8','9','10','11'],
				],
			]
		);		 
		/*  witr_Icon/Text_background_heading */
		$this->add_control(
			'witr_hidden_ithemex',
			[
				'label' => esc_html__( 'Background Color', 'themex' ),
				'type' => Controls_Manager::HEADING,
				'default' => 'heading',							
			]
		);
		/* Icon background */
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'witr_icons_backgrounds',
				'label' => esc_html__( 'Icon Background', 'themex' ),
				'types' => ['classic','gradient'],
				'selector' => '{{WRAPPER}} .all_content_bg_color,{{WRAPPER}} .all_icon_bg_color',
			]
		);		
		/*  witr_Icon/Text_hover_background_heading */
		$this->add_control(
			'witr_hidden_ithemexh',
			[
				'label' => esc_html__( 'Background Hover Color', 'themex' ),
				'type' => Controls_Manager::HEADING,
				'default' => 'heading',							
			]
		);
		/* hover Icon background */
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'witr_hover_icons',
				'label' => esc_html__( ' Hover Background', 'themex' ),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .all_color_team:hover .all_content_bg_color,{{WRAPPER}} .all_icon_bg_color:hover',
			]
		);

			/* box shadow color */	
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'witr_texts_shadow2',
					'label' => esc_html__( 'Box Shadow', 'themex' ),
					'selector' => '{{WRAPPER}} .all_content_bg_color,{{WRAPPER}} .all_icon_bg_color',
				]
			);
			/* blend mode style color */				
			$this->add_control(
				'witr_box_blend_mode2',
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
						'{{WRAPPER}} .all_content_bg_color,{{WRAPPER}} .all_icon_bg_color' => 'mix-blend-mode: {{VALUE}}',
					],
					'separator' => 'none',
				]
			);
			/*  witr_Icon/Text_shadow_heading */
			$this->add_control(
				'witr_hidden_ithemexsh',
				[
					'label' => esc_html__( 'Box Shadow Hover Color', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'default' => 'heading',							
				]
			);			
			/* box shadow color */	
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'witr_texts_shadosw2',
					'label' => esc_html__( 'Box Shadow Hover', 'themex' ),
					'selector' => '{{WRAPPER}} .all_color_team:hover .all_content_bg_color,{{WRAPPER}} .all_icon_bg_color:hover',
				]
			);			
			/* margin */
			$this->add_responsive_control(
				'witr_ititle margin2',
				[
					'label' => __( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_content_bg_color,{{WRAPPER}} .all_icon_bg_color' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* padding */
			$this->add_responsive_control(
				'witr_ititle padding2',
				[
					'label' => __( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_content_bg_color,{{WRAPPER}} .all_icon_bg_color' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_box style  ====*/
		
		/*=== start Text Box style ====*/
		$this->start_controls_section(
			'section_all_hover',
			[
				'label' => esc_html__( ' All Text Hover Color', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_post_team' =>['11'],
				],				
			]
		);
			/* witr_all_hover_color */
			$this->add_control(
				'witr_all_hover_color',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .team-part:hover h5,{{WRAPPER}} .team-part:hover h5 a,{{WRAPPER}} .team-part:hover p,{{WRAPPER}} .team-part:hover span ' => 'color: {{VALUE}}',
					],
				]
			);
		
			$this->add_control(
				'color_hover_transition',
				[
					'label' => esc_html__( 'Transition Duration', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'default' => [
						'size' => 0.5,
					],
					'range' => [
						'px' => [
							'max' => 3,
							'step' => 0.1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .team-part h5,{{WRAPPER}} .team-part h5 a,{{WRAPPER}} .team-part p,{{WRAPPER}} .team-part span' => 'transition: {{SIZE}}s',
					],
				]
			);		
			$this->end_controls_section();
		/*=== start Single Box style ====*/		
		
		/*===== start  Background Overlay=====*/
		$this->start_controls_section(
			'section_background_overlay',
			[
				'label' => esc_html__( 'Background Overlay', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_post_team' => ['1','2','3','5','6','7','8','9','10','11'],
				],				

			]
		);

			/* image background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_icono_background',
					'label' => esc_html__( 'Single Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .witr_team_section::before,{{WRAPPER}} .team-sec::before,{{WRAPPER}} .witr_team_sec_3::before,{{WRAPPER}} .team-back-wraper,{{WRAPPER}} .witr_single_team:after',
				]
			);				

			/* border_radius */
			$this->add_control(
				'witr_rrborder_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .witr_team_section::before,{{WRAPPER}} .team-sec::before,{{WRAPPER}} .witr_team_sec_3::before,{{WRAPPER}} .team-back-wraper,{{WRAPPER}} .witr_team_section img,{{WRAPPER}} .witr_single_team:after,{{WRAPPER}} .witr_single_team img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);		
		
		$this->end_controls_section();
		/*===== end background Overlay =====*/		

		/*=== start witr_image style ====*/
		$this->start_controls_section(
			'witr_style_image_Option',
			[
				'label' => esc_html__( 'Animate Images option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_show_animate' => 'yes',
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
							'{{WRAPPER}} .single_seivice_ani img' => 'width: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .single_seivice_ani img' => 'height: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .single_seivice_ani img' => 'transform: rotate({{SIZE}}{{UNIT}});',
							],							
						]
					);				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_img_bb',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .single_seivice_ani img',
					]
				);
				/* border_radius */
				$this->add_control(
					'witr_single_br',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'description' =>esc_html__('When Show Animation Set Not Work Border Radius','themex'),
						'selectors' => [
							'{{WRAPPER}} .single_seivice_ani img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

		 
		 $this->end_controls_section();
		/*=== end  witr_image style ====*/

		

			/*=== start witr Arrow style ====*/

			$this->start_controls_section(
				'witr_style_option_arrow',
				[
					'label' => esc_html__( 'Witr Arrow Options', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_c_arrows' => 'true',
						'witr_style_post_team' =>['1','6','7','8','9','10','11']
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
										'max' => 1500,
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
										'max' => 1500,
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
						'witr_style_post_team' =>['1','6','7','8','9','10','11']
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
        $witr_adc_post_team    = ! empty( $witrshowdata['witr_adc_post_team'] ) ? $witrshowdata['witr_adc_post_team'] : 'DESC';     
        $witr_gutter_column  =  $witrshowdata['witr_gutter_column']=='yes'  ? 'witr_all_pd0' : 'witr_all_mb_30'; 
		
		$page = ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );
		$paged = ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : $page );	
	
		
                        $args = array(
                            'post_type'            => 'em_team',
                            'post_status'          => 'publish',
                            'ignore_sticky_posts'  => 1,
                            'posts_per_page'       => $witr_post_per_page,
                            'order'                => $witr_adc_post_team,
							'paged'     => $paged,
							'page'      => $paged
                        );
                        
                        $posts = new \WP_Query($args);
		switch( $witrshowdata['witr_style_post_team']){
			
			case '11':
			?>
			
			<div class="witr_team_area_c post_team10_area post_team11_area">
				<div class="row postteam_<?php echo $unic_id;?>">
					<?php while ($posts->have_posts()) : $posts->the_post(); 
					$team_titles  = get_post_meta( get_the_ID(),'_txbdm_team_titles', true );
					$teamgroup  = get_post_meta( get_the_ID(),'_txbdm_teamgroup', true ); 				
					?>
						
							<!-- single blog -->
							<div class="<?php echo $witr_gutter_column; ?>   col-md-12 col-xs-12 col-sm-12 col-lg-12" >
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="team-part all_color_team <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
										<div class="witr_team_section">
											<!-- image -->
											<?php if(has_post_thumbnail()){?>
												<?php the_post_thumbnail();?>
											<?php } ?>
											<div class="team_o_icons all_team_icon_o_color">
												<ul class="witr_pots_team_s">
													<?php 
													if( $teamgroup ){
														foreach ( (array) $teamgroup as $time_social => $time_social_value ){
														$team_i = $team_l ='';
														if ( isset( $time_social_value['_txbdm_time_i'] ) ) {
															$team_i =  $time_social_value['_txbdm_time_i'];	
														}	
														if ( isset( $time_social_value['_txbdm_team_l'] ) ) {
															$team_l =  $time_social_value['_txbdm_team_l'];	
														}?>											
														<li>
															<a href="<?php echo esc_url( $team_l );?>"><i class="<?php echo esc_html( $team_i );?>"></i></a>			
														</li>												
													<?php }} ?>												
												</ul>															
											</div>
											<div class="witr_team_content post_team_p11 all_content_bg_color text-center">
												<!-- title -->
												<h5><a href="<?php the_permalink();?>"><?php the_title(); ?> </a></h5>
												<!-- sub title -->
												<?php if($team_titles){ ?>
													<span><?php echo $team_titles; ?> </span>	
												<?php }?>	
											</div>											
										</div> <!-- team sec -->

									</div>								
								</div>
							</div>						

					<?php endwhile; ?>	
					<?php wp_reset_query(); ?>			
				</div>							
			</div>

			
			<?php
			include('witr_pteam/witr_pteam.php');				
			break;			
			case '10':
			?>
			
			<div class="witr_team_area_c post_team10_area">
				<div class="row postteam_<?php echo $unic_id;?>">
					<?php while ($posts->have_posts()) : $posts->the_post(); 
					$team_titles  = get_post_meta( get_the_ID(),'_txbdm_team_titles', true );
					$teamgroup  = get_post_meta( get_the_ID(),'_txbdm_teamgroup', true ); 				
					?>
						
							<!-- single blog -->
							<div class="<?php echo $witr_gutter_column; ?>   col-md-12 col-xs-12 col-sm-12 col-lg-12" >
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="team-part all_color_team <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
										<div class="witr_team_section">
											<!-- image -->
											<?php if(has_post_thumbnail()){?>
												<?php the_post_thumbnail();?>
											<?php } ?>
											<div class="team_o_icons all_team_icon_o_color">
												<ul class="witr_pots_team_s">
													<?php 
													if( $teamgroup ){
														foreach ( (array) $teamgroup as $time_social => $time_social_value ){
														$team_i = $team_l ='';
														if ( isset( $time_social_value['_txbdm_time_i'] ) ) {
															$team_i =  $time_social_value['_txbdm_time_i'];	
														}	
														if ( isset( $time_social_value['_txbdm_team_l'] ) ) {
															$team_l =  $time_social_value['_txbdm_team_l'];	
														}?>											
														<li>
															<a href="<?php echo esc_url( $team_l );?>"><i class="<?php echo esc_html( $team_i );?>"></i></a>			
														</li>												
													<?php }} ?>												
												</ul>															
											</div>											
										</div> <!-- team sec -->
										<div class="witr_team_content all_content_bg_color text-center">
											<!-- title -->
											<h5><a href="<?php the_permalink();?>"><?php the_title(); ?> </a></h5>
											<!-- sub title -->
											<?php if($team_titles){ ?>
												<span><?php echo $team_titles; ?> </span>	
											<?php }?>	
										</div>
									</div>								
								</div>
							</div>						

					<?php endwhile; ?>	
					<?php wp_reset_query(); ?>			
				</div>							
			</div>

			
			<?php
			include('witr_pteam/witr_pteam.php');				
			break;			
			case '9':
			?>
			
			<div class="witr_team_area_c cteam_9">
				<div class="row postteam_<?php echo $unic_id;?>">
					<?php while ($posts->have_posts()) : $posts->the_post(); 
					$team_titles  = get_post_meta( get_the_ID(),'_txbdm_team_titles', true );
					$teamgroup  = get_post_meta( get_the_ID(),'_txbdm_teamgroup', true );
					$listt_text  = get_post_meta( get_the_ID(),'_txbdm_listt_text', true );					
					?>
						
							<!-- single blog -->
							<div class="<?php echo $witr_gutter_column; ?>   col-md-12 col-xs-12 col-sm-12 col-lg-12" >
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class=" all_color_team <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
										<div class="witr_team_section">
											<?php if(has_post_thumbnail()){?>
											<!-- image -->
											<?php the_post_thumbnail();?>
											<?php } ?>
											
											
										</div> <!-- team sec -->
										
										<div class="post_team_content">
											<div class="post_team_icon_9 all_team_icon_o_color">
												<ul class="witr_pots_team_s">
													<?php 
													if( $teamgroup ){
														foreach ( (array) $teamgroup as $time_social => $time_social_value ){
														$team_i = $team_l ='';
														if ( isset( $time_social_value['_txbdm_time_i'] ) ) {
															$team_i =  $time_social_value['_txbdm_time_i'];	
														}	
														if ( isset( $time_social_value['_txbdm_team_l'] ) ) {
															$team_l =  $time_social_value['_txbdm_team_l'];	
														}?>											
														<li>
															<a href="<?php echo esc_url( $team_l );?>"><i class="<?php echo esc_html( $team_i );?>"></i></a>			
														</li>												
													<?php }} ?>												
												</ul>															
											</div>
											<div class="post_team_content9 all_content_bg_color">	
												<!-- title -->
												<h5><a href="<?php the_permalink();?>"><?php the_title(); ?> </a></h5>
												<!-- sub title -->
												<?php if($team_titles){ ?>
													<span><?php echo $team_titles; ?> </span>	
												<?php }?>											
											
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
			include('witr_pteam/witr_pteam.php');				
			break;
			
			case '8':
			?>
			
			<div class="witr_team_area_c pteam_8">
				<div class="row postteam_<?php echo $unic_id;?>">
					<?php while ($posts->have_posts()) : $posts->the_post(); 
					$team_titles  = get_post_meta( get_the_ID(),'_txbdm_team_titles', true );
					$teamgroup  = get_post_meta( get_the_ID(),'_txbdm_teamgroup', true );
					$listt_text  = get_post_meta( get_the_ID(),'_txbdm_listt_text', true );					
					?>
						
							<!-- single blog -->
							<div class="<?php echo $witr_gutter_column; ?>   col-md-12 col-xs-12 col-sm-12 col-lg-12" >
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class=" all_color_team <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
										<div class="witr_team_section">
											<?php if(has_post_thumbnail()){?>
											<!-- image -->
											<?php the_post_thumbnail();?>
											<?php } ?>
											<div class="post_team_icon_8 all_team_icon_o_color">
												<ul class="witr_pots_team_s">
													<?php 
													if( $teamgroup ){
														foreach ( (array) $teamgroup as $time_social => $time_social_value ){
														$team_i = $team_l ='';
														if ( isset( $time_social_value['_txbdm_time_i'] ) ) {
															$team_i =  $time_social_value['_txbdm_time_i'];	
														}	
														if ( isset( $time_social_value['_txbdm_team_l'] ) ) {
															$team_l =  $time_social_value['_txbdm_team_l'];	
														}?>											
														<li>
															<a href="<?php echo esc_url( $team_l );?>"><i class="<?php echo esc_html( $team_i );?>"></i></a>			
														</li>												
													<?php }} ?>												
												</ul>															
											</div>											
											
										</div> <!-- team sec -->
										<div class="post_team_content all_content_bg_color">
											<!-- title -->
											<h5><a href="<?php the_permalink();?>"><?php the_title(); ?> </a></h5>
											<!-- sub title -->
											<?php if($team_titles){ ?>
												<span><?php echo $team_titles; ?> </span>	
											<?php }?>
											<!--- list --->
											<?php if($listt_text){ ?>
											<div class="team_list_op">		
												<?php echo $listt_text;?>		
											</div>
											<?php }?>
											
											
										</div>
			
									</div>								
								</div>
							</div>						

					<?php endwhile; ?>	
					<?php wp_reset_query(); ?>			
				</div>							
			</div>

			
			<?php
			include('witr_pteam/witr_pteam.php');			
			break;
		
			case '7':
			?>
			
			<div class="witr_team_area_c witr_tps7">
				<div class="row postteam_<?php echo $unic_id;?>">
					<?php while ($posts->have_posts()) : $posts->the_post(); 
					$team_titles  = get_post_meta( get_the_ID(),'_txbdm_team_titles', true );
					$teamgroup  = get_post_meta( get_the_ID(),'_txbdm_teamgroup', true ); 				
					?>
						
							<!-- single blog -->
							<div class="<?php echo $witr_gutter_column; ?>   col-md-12 col-xs-12 col-sm-12 col-lg-12" >
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="team-part all_color_team <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
										<div class="witr_team_section">
											<?php if(has_post_thumbnail()){?>
											<!-- image -->
											<?php the_post_thumbnail();?>
											<?php } ?>
										</div> <!-- team sec -->
										<div class="witr_team_content all_content_bg_color text-center">
											<!-- title -->
											<h5><a href="<?php the_permalink();?>"><?php the_title(); ?> </a></h5>
											<!-- sub title -->
											<?php if($team_titles){ ?>
												<span><?php echo $team_titles; ?> </span>	
											<?php }?>

											
											<div class="team_o_icons all_team_icon_o_color">
												<ul class="witr_pots_team_s">
													<?php 
													if( $teamgroup ){
														foreach ( (array) $teamgroup as $time_social => $time_social_value ){
														$team_i = $team_l ='';
														if ( isset( $time_social_value['_txbdm_time_i'] ) ) {
															$team_i =  $time_social_value['_txbdm_time_i'];	
														}	
														if ( isset( $time_social_value['_txbdm_team_l'] ) ) {
															$team_l =  $time_social_value['_txbdm_team_l'];	
														}?>											
														<li>
															<a href="<?php echo esc_url( $team_l );?>"><i class="<?php echo esc_html( $team_i );?>"></i></a>			
														</li>												
													<?php }} ?>												
												</ul>															
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
			include('witr_pteam/witr_pteam.php');
			break;				
			case '6':
			?>			
			<div class="witr_team_area_c">
				<div class="row postteam_<?php echo $unic_id;?>">
					<?php while ($posts->have_posts()) : $posts->the_post(); 
					$team_titles  = get_post_meta( get_the_ID(),'_txbdm_team_titles', true );
					$teamgroup  = get_post_meta( get_the_ID(),'_txbdm_teamgroup', true ); 				
					?>
					
						<!-- single blog -->
						<div class="<?php echo $witr_gutter_column; ?>   col-md-12 col-xs-12 col-sm-12 col-lg-12" >
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>			
								
									<div class="team-sec all_color_team <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
										<div class="witr_single_team">
											<?php if(has_post_thumbnail()){?>
											<!-- image -->
												<?php the_post_thumbnail();?>
											<?php } ?>
											<div class="witr_team_content_car">
												<!-- sub title -->	
												<?php if($team_titles){ ?>
													<span><?php echo $team_titles; ?> </span>
												<?php }?>									
												
												<h5><a href="<?php the_permalink();?>"><?php the_title(); ?> </a></h5>
											</div>
										</div>	

									</div> <!-- team sec -->
								
							</div>
							
							
							
						</div>
					<?php endwhile; ?>	
					<?php wp_reset_query(); ?>			
				</div>							
			</div>


			
			<?php
			include('witr_pteam/witr_pteam.php');		
			break;			
			case '5':
			?>
			<div class="row">
				<?php while ($posts->have_posts()) : $posts->the_post();
					$team_titles  = get_post_meta( get_the_ID(),'_txbdm_team_titles', true );
					$teamgroup  = get_post_meta( get_the_ID(),'_txbdm_teamgroup', true );

				?>
					<!-- single blog -->
					<div class="<?php echo $witr_gutter_column; ?>   col-md-6 col-xs-12 col-sm-12 col-lg-<?php if( !empty( $witrshowdata['witr_column_grid'] ) ){echo $witrshowdata['witr_column_grid'];}?>" >
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>			
							<div class="em-team all_color_team <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
								<div class="team-style-2">
									<div class="team-wrap ">
										<div class="team-front">
											<div class="em-content-image-inner">
											<?php if(has_post_thumbnail()){?>
												<div class="em-content-image">
												<!-- image -->
												<?php the_post_thumbnail();?>
												</div>
											<?php } ?>	
											</div>
										</div>
										<div class="team-back-wraper">
											<div class="team-back">
												<div class="em-content-waraper">
													<div class="em-content-title-inner">
														<div class="em-content-title">
															<!-- title -->
															<h5><a href="<?php the_permalink();?>"><?php the_title(); ?> </a></h5>					
														</div>
													</div>
													<div class="em-content-subtitle-inner">
														<div class="em-content-subtitle">
															<!-- subtitle -->
															<?php if($team_titles){ ?>
																<span><?php echo $team_titles; ?> </span>	
															<?php }?>					
														</div>
													</div>
													<div class="em-content-desc-inner">
														<div class="em-content-desc">
															<!-- content -->
															<p><?php echo wp_trim_words( get_the_content(), 12, ' ' ); ?></p>
														</div>
													</div>							
													<div class="em-content-socials all_team_icon_o_color">
														<?php 
														if( $teamgroup ){
															foreach ( (array) $teamgroup as $time_social => $time_social_value ){
															$team_i = $team_l ='';
															if ( isset( $time_social_value['_txbdm_time_i'] ) ) {
																$team_i =  $time_social_value['_txbdm_time_i'];	
															}	
															if ( isset( $time_social_value['_txbdm_team_l'] ) ) {
																$team_l =  $time_social_value['_txbdm_team_l'];	
															}?>											
																<a href="<?php echo esc_url( $team_l );?>"><i class="<?php echo esc_html( $team_i );?>"></i></a>	
														<?php }} ?>								
													</div>						
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>	
				<?php wp_reset_query(); ?>			
			</div>
			<?php
			break ;
			case '4':
			?>
			<div class="row">
				<?php while ($posts->have_posts()) : $posts->the_post();
					$team_titles  = get_post_meta( get_the_ID(),'_txbdm_team_titles', true );
					$teamgroup  = get_post_meta( get_the_ID(),'_txbdm_teamgroup', true );
				?>
					<!-- single blog -->
					<div class="<?php echo $witr_gutter_column; ?>   col-md-6 col-xs-12 col-sm-12 col-lg-<?php if( !empty( $witrshowdata['witr_column_grid'] ) ){echo $witrshowdata['witr_column_grid'];}?>" >
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>			
							<div class="em-team all_color_team <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
								<div class="em-team-one">	
									<div class="em-team-content-image-inner">
										<?php if(has_post_thumbnail()){?>
										<div class="em-team-content-image">
											<!-- image -->
											<?php the_post_thumbnail();?>
										</div>
										<?php } ?>
									</div>							
									<div class="em-team-content-waraper all_content_bg_color">
										<div class="em-team-content-title-inner">
											<div class="em-content-title">
												<!-- title -->
												<h5><a href="<?php the_permalink();?>"><?php the_title(); ?> </a> </h5>					
											</div>
										</div>
										<div class="em-team-content-subtitle-inner">
											<div class="em-content-subtitle">
												<!-- subtitle -->
												<?php if($team_titles){ ?>
													<span><?php echo $team_titles; ?> </span>	
												<?php }?>					
											</div>
										</div>
																				
										<div class="em-team-content-socials-inner">
											<div class="em-team-content-socials all_team_s_color">			
												<?php 
												if( $teamgroup ){
													foreach ( (array) $teamgroup as $time_social => $time_social_value ){
													$team_i = $team_l ='';
													if ( isset( $time_social_value['_txbdm_time_i'] ) ) {
														$team_i =  $time_social_value['_txbdm_time_i'];	
													}	
													if ( isset( $time_social_value['_txbdm_team_l'] ) ) {
														$team_l =  $time_social_value['_txbdm_team_l'];	
													}?>											
														<a href="<?php echo esc_url( $team_l );?>"><i class="<?php echo esc_html( $team_i );?>"></i></a>	
												<?php }} ?>																		
											</div>
										</div>							
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>	
				<?php wp_reset_query(); ?>			
			</div>							
			<?php
			break ;						
			case '3':
			?>
			<div class="row">
				<?php while ($posts->have_posts()) : $posts->the_post(); 
				$team_titles  = get_post_meta( get_the_ID(),'_txbdm_team_titles', true );
				$teamgroup  = get_post_meta( get_the_ID(),'_txbdm_teamgroup', true ); 				
				?>
					<!-- single blog -->
					<div class="<?php echo $witr_gutter_column; ?>   col-md-6 col-xs-12 col-sm-12 col-lg-<?php if( !empty( $witrshowdata['witr_column_grid'] ) ){echo $witrshowdata['witr_column_grid'];}?>" >
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>			
							<div class="team-part all_color_team <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
								<div class="witr_team_sec_3 ">
									<?php if(has_post_thumbnail()){?>
									<!-- image -->
									<?php the_post_thumbnail();?>
									<?php } ?>
									<div class="witr_team_content3 text-center all_team_icon_o_color">
										<!-- title -->
										<h5><a href="<?php the_permalink();?>"><?php the_title(); ?> </a></h5>
										<!-- sub title -->	
										<?php if($team_titles){ ?>
											<span><?php echo $team_titles; ?> </span>	
										<?php }?>
										<!-- content -->	
										<p><?php echo wp_trim_words( get_the_content(), 12, ' ' ); ?></p>	
										<ul class="witr_pots_team_s">
											<?php 
											if( $teamgroup ){
												foreach ( (array) $teamgroup as $time_social => $time_social_value ){
												$team_i = $team_l ='';
												if ( isset( $time_social_value['_txbdm_time_i'] ) ) {
													$team_i =  $time_social_value['_txbdm_time_i'];	
												}	
												if ( isset( $time_social_value['_txbdm_team_l'] ) ) {
													$team_l =  $time_social_value['_txbdm_team_l'];	
												}?>											
												<li>
													<a href="<?php echo esc_url( $team_l );?>"><i class="<?php echo esc_html( $team_i );?>"></i></a>			
												</li>												
											<?php }} ?>												
										</ul>
									</div> 
									<div class="team-social all_team_s_color all_icon_bg_color">
										<ul class="witr_pots_team_s">
											<?php 
											if( $teamgroup ){
												foreach ( (array) $teamgroup as $time_social => $time_social_value ){
												$team_i = $team_l ='';
												if ( isset( $time_social_value['_txbdm_time_i'] ) ) {
													$team_i =  $time_social_value['_txbdm_time_i'];	
												}	
												if ( isset( $time_social_value['_txbdm_team_l'] ) ) {
													$team_l =  $time_social_value['_txbdm_team_l'];	
												}?>											
												<li>
													<a href="<?php echo esc_url( $team_l );?>"><i class="<?php echo esc_html( $team_i );?>"></i></a>			
												</li>												
											<?php }} ?>												
										</ul>	
									</div> <!-- team social -->
								</div> <!-- team sec -->
							</div> <!-- team part -->
						</div>
					</div>
				<?php endwhile; ?>	
				<?php wp_reset_query(); ?>			
			</div>			
								
			<?php			
			break;
			case '2':
			?>			
			<div class="row">
				<?php while ($posts->have_posts()) : $posts->the_post(); 
				$team_titles  = get_post_meta( get_the_ID(),'_txbdm_team_titles', true );
				$teamgroup  = get_post_meta( get_the_ID(),'_txbdm_teamgroup', true ); 				
				?>
				
					<!-- single blog -->
					<div class="<?php echo $witr_gutter_column; ?>   col-md-6 col-xs-12 col-sm-12 col-lg-<?php if( !empty( $witrshowdata['witr_column_grid'] ) ){echo $witrshowdata['witr_column_grid'];}?>" >
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>			
							<div class="team-part all_color_team <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
								<div class="team-sec ">
									<?php if(has_post_thumbnail()){?>
									<!-- image -->
									<?php the_post_thumbnail();?>
									<?php } ?>
									<div class="witr_team_content2 text-center">
										<!-- title -->
										<h5><a href="<?php the_permalink();?>"><?php the_title(); ?> </a> </h5>
										<!-- sub title -->	
										<?php if($team_titles){ ?>
											<span><?php echo $team_titles; ?> </span>	
										<?php }?>
										<!-- content -->	
										<p><?php echo wp_trim_words( get_the_content(), 12, ' ' ); ?></p>	
									</div>
									<div class="team-social all_team_s_color team-over all_icon_bg_color">
										<ul class="witr_pots_team_s">
											<?php 
											if( $teamgroup ){
												foreach ( (array) $teamgroup as $time_social => $time_social_value ){
												$team_i = $team_l ='';
												if ( isset( $time_social_value['_txbdm_time_i'] ) ) {
													$team_i =  $time_social_value['_txbdm_time_i'];	
												}	
												if ( isset( $time_social_value['_txbdm_team_l'] ) ) {
													$team_l =  $time_social_value['_txbdm_team_l'];	
												}?>											
												<li>
													<a href="<?php echo esc_url( $team_l );?>"><i class="<?php echo esc_html( $team_i );?>"></i></a>			
												</li>												
											<?php }} ?>												
										</ul>								
									</div>
								</div> <!-- team sec -->
							</div>
						</div>
					</div>
				<?php endwhile; ?>	
				<?php wp_reset_query(); ?>			
			
			</div>						
			<?php				
			break;			
			default:
			?>
			
			<div class="witr_team_area_c">
				<div class="row postteam_<?php echo $unic_id;?>">
					<?php while ($posts->have_posts()) : $posts->the_post(); 
					$team_titles  = get_post_meta( get_the_ID(),'_txbdm_team_titles', true );
					$teamgroup  = get_post_meta( get_the_ID(),'_txbdm_teamgroup', true ); 				
					?>
						
							<!-- single blog -->
							<div class="<?php echo $witr_gutter_column; ?>   col-md-12 col-xs-12 col-sm-12 col-lg-12" >
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="team-part all_color_team <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
										<div class="witr_team_section">
											<?php if(has_post_thumbnail()){?>
											<!-- image -->
											<?php the_post_thumbnail();?>
											<?php } ?>
											<div class="team_o_icon all_team_icon_o_color">
												<ul class="witr_pots_team_s">
													<?php 
													if( $teamgroup ){
														foreach ( (array) $teamgroup as $time_social => $time_social_value ){
														$team_i = $team_l ='';
														if ( isset( $time_social_value['_txbdm_time_i'] ) ) {
															$team_i =  $time_social_value['_txbdm_time_i'];	
														}	
														if ( isset( $time_social_value['_txbdm_team_l'] ) ) {
															$team_l =  $time_social_value['_txbdm_team_l'];	
														}?>											
														<li>
															<a href="<?php echo esc_url( $team_l );?>"><i class="<?php echo esc_html( $team_i );?>"></i></a>			
														</li>												
													<?php }} ?>												
												</ul>															
											</div>
										</div> <!-- team sec -->
										<div class="witr_team_content all_content_bg_color text-center">
											<!-- title -->
											<h5><a href="<?php the_permalink();?>"><?php the_title(); ?> </a></h5>
											<!-- sub title -->
											<?php if($team_titles){ ?>
												<span><?php echo $team_titles; ?> </span>	
											<?php }?>
											
											
										</div>
			
									</div>								
								</div>
							</div>						

					<?php endwhile; ?>	
					<?php wp_reset_query(); ?>			
				</div>							
			</div>

			
			<?php
			include('witr_pteam/witr_pteam.php');
			break;			
		} /* end switch		*/		
			if( $witrshowdata['witr_pagination'] == 'yes' ){?>
			<!-- START PAGINATION -->
			<div class="row">
				<div class="col-md-12">
					<div class="paginations">
						
						<?php 
						
							 echo paginate_links( array(
								'prev_next' => true,
								'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
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