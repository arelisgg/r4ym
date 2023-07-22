<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Posttab extends Widget_Base {

    public function get_name() {
        return 'witr_tab_section';
    }
    
    public function get_title() {
        return esc_html__( 'Tab Post ', 'themex' );
    }
    public function get_style_depends() {
        return [ 'wtabpost' ];
    }
    public function get_icon() {
        return 'themex_icon eicon-tabs';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'witr_tab_option',
            [
                'label' => esc_html__( 'Tab Options', 'themex' ),
            ]
        );
		
		
			/* tab style witr_style_tab */
			$this->add_control(
				'witr_style_tab',
				[
					'label' => esc_html__( 'Tab style', 'themex' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'1' => esc_html__( 'Tab style 1', 'themex' ),
						'2' => esc_html__( 'Tab style 2', 'themex' ),
						'3' => esc_html__( 'Tab style 3', 'themex' ),
					],
					'default' => '1',
				]
			);
			
			/* witr_align */					
			$this->add_responsive_control(
				'witr_align',
				[
					'label' => __( 'Witr Alignment', 'themex' ),
					'type' => Controls_Manager::CHOOSE,
					'separator' => 'before',					
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
					'prefix_class' => 'themex-star-rating%s--align-',
					'selectors' => [
						'{{WRAPPER}}' => 'text-align: {{VALUE}}',
					],
					'condition' => [
						'witr_style_tab' =>['3'],
					],					
				]
			);
			
			/* tab iten show witr_post_per_page */
            $this->add_control(
                'witr_post_per_page',
                [
                    'label' => __( 'Show Number Of tab', 'themex' ),
                    'type' => Controls_Manager::NUMBER,				
                    'separator' => 'before',
                    'min' => 1,
                    'max' => 500,
                    'step' => 1,
                    'default' => 3,
                ]
            );
			/* tab show witr_adc_tab */
 			$this->add_control(
				'witr_adc_tab',
				[
					'label' => esc_html__( 'Tab ASC/DSC style', 'themex' ),
					'type' => Controls_Manager::SELECT,
                    'separator' => 'before',					
					'options' => [
						'DESC'	=> esc_html__( 'Descending', 'themex' ),
						'ASC'	=> esc_html__( 'Ascending', 'themex' )
					],
					'default' => 'DESC',
				]
			);

			
			/* tab title witr_title_length */			
            $this->add_control(
                'witr_title_length',
                [
                    'label' => esc_html__( 'Title Length', 'themex' ),
                    'type' => Controls_Manager::NUMBER,
                    'separator' => 'before',					
                    'min' => 1,
                    'max' => 500,
                    'step' => 1,
                    'default' => 20,
                ]
            );           
	           

        $this->end_controls_section();

		/*=== end_controls_section ===*/
		
		
		
	   /*===========================================================================================
										START TO STYLE
		=============================================================================================*/		

		/*=== Start Witr TAB MEMU style ====*/

		$this->start_controls_section(
			'witr_style_post_option',
			[
				'label' => esc_html__( 'Tab Menu Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
		
				/* menu Color */
				$this->add_control(
					'witr_tab_primary_color',
					[
						'label' => esc_html__( 'Tab Menu Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .tab_item ul li a' => 'color: {{VALUE}}',
						],
						
					]
				);
				/* menu hover color */
				$this->add_control(
					'witr_menu_hover_color',
					[
						'label' => esc_html__( 'Tab Menu Hover Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'global' => [
							'default' => Global_Colors::COLOR_PRIMARY,
						],						
						'selectors' => [
							'{{WRAPPER}} .tab_item ul li a:hover' => 'color: {{VALUE}}',
						],
					]
				);								
				/*  menu font size */
				$this->add_responsive_control(
					'witr_menu_size',
					[
						'label' => esc_html__( 'Tab Menu Size', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .tab_item ul li a' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/* typograohy color */			
				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'witr_menu_ttpy_color',
						'label' => esc_html__( 'Typography', 'themex' ),
						'global' => [
							'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
						],
						'selector' => '{{WRAPPER}} .tab_item ul li a',
					]
				);

				/* menu margin */
				$this->add_responsive_control(
					'witr_menu_margin',
					[
						'label' => esc_html__( 'Menu Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .tab_item ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* menu padding */
				$this->add_responsive_control(
					'witr_menu_padding',
					[
						'label' => esc_html__( 'Menu Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .tab_item ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				
				/* active color */
				$this->add_control(
					'witr_menu_active_color',
					[
						'label' => esc_html__( 'Tab Menu Active Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',						
						'selectors' => [
							'{{WRAPPER}} .tab_item .nav-pills li .nav-link.active' => 'color: {{VALUE}}',
						],
					]
				);
				
				/* witr_active_border_style */
				$this->add_control(
					'witr_active_border_style',
					[
						'label' => esc_html__( 'Active Border Style', 'themex' ),
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
							'{{WRAPPER}} .tab_item .nav-pills li .nav-link.active' => 'border-style: {{VALUE}}',
						],
					]
				);
				/* witr active border */
				$this->add_control(
					'witr_border',
					[
						'label' => esc_html__( 'Active Border', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'selectors' => [
							'{{WRAPPER}} .tab_item .nav-pills li .nav-link.active' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);				
				/* active border color */
				$this->add_control(
					'witr_border_active_color',
					[
						'label' => esc_html__( 'Tab Menu Border Active Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .tab_item .nav-pills li .nav-link.active' => 'border-color: {{VALUE}}',
						],
					]
				);
				
				/* active background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'activbackground',
						'label' => esc_html__( 'Active Background', 'themex' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => '{{WRAPPER}} .tab_item .nav-pills li .nav-link.active',
					]
				);			
				
		 
		 $this->end_controls_section();
		/*=== end  witr Menu Text style ====*/
		
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
						'{{WRAPPER}} .tab_area .tab_content h3' => 'color: {{VALUE}}',
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
					'global' => [
						'default' => Global_Colors::COLOR_TEXT,
					],					
					'selectors' => [
						'{{WRAPPER}} .tab_area .tab_content h3:hover' => 'color: {{VALUE}}',
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
						'default' => Global_Typography::TYPOGRAPHY_TEXT,
					],
					'selector' => '{{WRAPPER}} .tab_area .tab_content h3',
				]
			);						
			/* title margin */
			$this->add_responsive_control(
				'witr_title_margin',
				[
					'label' => esc_html__( 'Title Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'separator'=>'before',
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tab_area .tab_content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* title padding */
			$this->add_responsive_control(
				'witr_title_padding',
				[
					'label' => esc_html__( 'Title Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'separator'=>'before',
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tab_area .tab_content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'global' => [
						'default' => Global_Colors::COLOR_TEXT,
					],					
					'selectors' => [
						'{{WRAPPER}} .tab_area .tab_content p' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .tab_area .tab_content p',
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
						'{{WRAPPER}} .tab_area .tab_content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .tab_area .tab_content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .tab_area .tab_content a' => 'color: {{VALUE}}',
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
								'selector' => '{{WRAPPER}} .tab_area .tab_content a',
							]
						);	

						/* Button background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_button_background',
								'label' => esc_html__( 'button Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .tab_area .tab_content a',
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
									'{{WRAPPER}} .tab_area .tab_content a' => 'border-style: {{VALUE}}',
								],
							]
						);		
						/* witr border */
						
						$this->add_control(
							'witr_borde_btn',
							[
								'label' => esc_html__( 'Border', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'separator'=>'before',
								'selectors' => [
									'{{WRAPPER}} .tab_area .tab_content a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/* border_color */
						$this->add_control(
							'witr_border_btn_color',
							[
								'label' => esc_html__( 'Border Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								
								'selectors' => [
									'{{WRAPPER}} .tab_area .tab_content a' => 'border-color: {{VALUE}}',
								],
							]
						);
						/* border_radius */
						$this->add_control(
							'witr_border_btn_radius',
							[
								'label' => esc_html__( 'Border Radius', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'separator'=>'before',
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .tab_area .tab_content a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);				
						/* button margin */
						$this->add_responsive_control(
							'witr_button_margin',
							[
								'label' => esc_html__( 'Margin', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'separator'=>'before',
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .tab_area .tab_content a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/* button padding */
						$this->add_responsive_control(
							'witr_button_padding',
							[
								'label' => esc_html__( 'Padding', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'separator'=>'before',
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .tab_area .tab_content a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .tab_area .tab_content a:hover' => 'color: {{VALUE}}',
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
								'description' =>esc_html__('Insert link twitter. It hidden when field blank.','themex'),
								'selector' => '{{WRAPPER}} .tab_area .tab_content a:hover',
							]
						);					
						/* border_hover_color */
						$this->add_control(
							'witr_borderh_btn_color',
							[
								'label' => esc_html__( 'Border Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								
								'selectors' => [
									'{{WRAPPER}} .tab_area .tab_content a:hover' => 'border-color: {{VALUE}}',
								],
							]
						);					
						
						
						$this->end_controls_tab();
						/*=== end button hover style ====*/
						
				$this->end_controls_tabs();
				/*=== end button_tabs style ====*/			
			 
			 $this->end_controls_section();
			/*=== end  witr button style ====*/			
		
		

		/*=== start witr_image style ====*/
		$this->start_controls_section(
			'witr_style_image_option',
			[
				'label' => esc_html__( 'Tab Images option', 'themex' ),
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
								'min' => 6,
								'max' => 1920,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .tab_area .em_post_tab_thumb img' => 'width: {{SIZE}}{{UNIT}};',
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
								'min' => 6,
								'max' => 1000,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .tab_area .em_post_tab_thumb img' => 'height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .tab_area .em_post_tab_thumb img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .tab_area .em_post_tab_thumb img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_image style ====*/			
		
		

    } /* function end */

    protected function render( $instance = [] ) {

        $witrshowdata = $this->get_settings_for_display();

        $witr_post_per_page       = ! empty( $witrshowdata['witr_post_per_page'] ) ? $witrshowdata['witr_post_per_page'] : 2;
        $witr_adc_tab    = ! empty( $witrshowdata['witr_adc_tab'] ) ? $witrshowdata['witr_adc_tab'] : 'DESC';
        $witr_title_length    = ! empty( $witrshowdata['witr_title_length'] ) ? $witrshowdata['witr_title_length'] : 5;
        $witr_content_length  = ! empty( $witrshowdata['witr_content_length'] ) ? $witrshowdata['witr_content_length'] : 20;      
		

		
                        $args = array(
                            'post_type'            => 'em_tab',
                            'post_status'          => 'publish',
                            'ignore_sticky_posts'  => 1,
                            'posts_per_page'       => $witr_post_per_page,
                            'order'                => $witr_adc_tab,
                        );
                        
                        $posts = new \WP_Query($args);
		switch( $witrshowdata['witr_style_tab']){
			case '3':
			?>
            <div class="tab_area">
				<div class="tab_item">
					<ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
						<?php while ($posts->have_posts()) : $posts->the_post(); 		 	
						  $em_tab_menu  = get_post_meta( get_the_ID(),'_txbdm_em_tab_menu', true );
						  $em_tab_active  = get_post_meta( get_the_ID(),'_txbdm_em_tab_active', true );
						  $em_tab_image  = get_post_meta( get_the_ID(),'_txbdm_em_tab_image', true );
						  ?>	
						  <li class="nav-item">
							<a class="nav-link <?php if($em_tab_active){ echo $em_tab_active;?>"  <?php }?>"   <?php if($em_tab_image){?> style="background-image:url(<?php echo $em_tab_image; ?>);"  <?php } ?>    data-toggle="pill" href="#pills-<?php echo get_the_ID(); ?>" role="tab"  aria-selected="true"><?php if($em_tab_menu){echo $em_tab_menu;}?></a>
						</li>
						<?php endwhile; ?> <?php wp_reset_query(); ?>
					</ul>
					<div class="tab-content" id="pills-tabContent">
				 
					
						  <?php while ($posts->have_posts()) : $posts->the_post(); 		 ?>	
						  
							<?php 
							$em_tab_active  = get_post_meta( get_the_ID(),'_txbdm_em_tab_active', true );
							$em_tab_btn1  = get_post_meta( get_the_ID(),'_txbdm_em_tab_btn1', true );
							$em_tab_btn1utl  = get_post_meta( get_the_ID(),'_txbdm_em_tab_btn1utl', true );
							$em_tab_btn2  = get_post_meta( get_the_ID(),'_txbdm_em_tab_btn2', true );
							$em_tab_btn2url  = get_post_meta( get_the_ID(),'_txbdm_em_tab_btn2url', true );
							?>
							
							<div class="tab-pane fade <?php if($em_tab_active){echo $em_tab_active;}?>" id="pills-<?php echo get_the_ID(); ?>" role="tabpanel" >
								<div class="row">

									<div class="col-md-12">												  
										<div class="tab_content">
																		
											<h3><?php echo wp_trim_words( get_the_title(), $witr_title_length, '' );?></h3>
										
											<?php the_content(); ?>
											
											<?php if($em_tab_btn1utl){ ?>
												<a class="btn" href="<?php echo $em_tab_btn1utl; ?> "><?php  echo $em_tab_btn1;?></a>
											<?php	}?>
											<?php if($em_tab_btn2url){ ?>
												<a class="btn" href="<?php echo $em_tab_btn2url; ?> "><?php  echo $em_tab_btn2;?></a>
											<?php	}?>
																								
										</div>									
									</div>
									
								</div>
							</div>
						
								<?php endwhile; ?><?php wp_reset_query(); ?>
					</div><!-- tab content -->									
												
				</div> <!-- digital item -->
			</div> <!-- digital item -->
			
			<?php			
			break;
			case '2':
			?>
			
			<div class="tab_area">
				<div class="tab_item text-center">
					<ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
						<?php while ($posts->have_posts()) : $posts->the_post(); 		 	
						  $em_tab_menu  = get_post_meta( get_the_ID(),'_txbdm_em_tab_menu', true );
						  $em_tab_active  = get_post_meta( get_the_ID(),'_txbdm_em_tab_active', true );
						  $em_tab_image  = get_post_meta( get_the_ID(),'_txbdm_em_tab_image', true );
						  ?>	
						  <li class="nav-item">
							<a class="nav-link <?php if($em_tab_active){ echo $em_tab_active;?>"  <?php }?>"   <?php if($em_tab_image){?> style="background-image:url(<?php echo $em_tab_image; ?>);"  <?php } ?>    data-toggle="pill" href="#pills-<?php echo get_the_ID(); ?>" role="tab"  aria-selected="true"><?php if($em_tab_menu){echo $em_tab_menu;}?></a>
						</li>
						<?php endwhile; ?> <?php wp_reset_query(); ?>
					</ul>
					<div class="tab-content" id="pills-tabContent">
				 
					
						  <?php while ($posts->have_posts()) : $posts->the_post(); 		 ?>	
						  
							<?php 
							$em_tab_active  = get_post_meta( get_the_ID(),'_txbdm_em_tab_active', true );
							$em_tab_btn1  = get_post_meta( get_the_ID(),'_txbdm_em_tab_btn1', true );
							$em_tab_btn1utl  = get_post_meta( get_the_ID(),'_txbdm_em_tab_btn1utl', true );
							$em_tab_btn2  = get_post_meta( get_the_ID(),'_txbdm_em_tab_btn2', true );
							$em_tab_btn2url  = get_post_meta( get_the_ID(),'_txbdm_em_tab_btn2url', true );
							?>
							
							<div class="tab-pane fade <?php if($em_tab_active){echo $em_tab_active;}?>" id="pills-<?php echo get_the_ID(); ?>" role="tabpanel" >
								<div class="row">
									<!-- image -->
									<?php if(has_post_thumbnail()){?> 
										

									<div class="col-lg-6 offset-lg-1 col-md-7">												  
										 <div class="tab_content text-left">
										 
											
												<h3><?php echo wp_trim_words( get_the_title(), $witr_title_length, '' );?></h3>
											
												<?php the_content(); ?>
												
											
											
											<?php if($em_tab_btn1utl){ ?>
												<a class="btn" href="<?php echo $em_tab_btn1utl; ?> "><?php  echo $em_tab_btn1;?></a>
											<?php	}?>
											<?php if($em_tab_btn2url){ ?>
												<a class="btn" href="<?php echo $em_tab_btn2url; ?> "><?php  echo $em_tab_btn2;?></a>
											<?php	}?>
																								
										</div>									
									</div>
									<!-- image -->
									<div class="col-lg-4 offset-lg-1 col-md-4 d-none d-sm-none d-md-block">
										<div class="em_post_tab_thumb">
											<?php the_post_thumbnail();?>
										</div>
									</div>									
									
									
									<?php }else{?>										
										<div class="col-md-12">	
											 <div class="tab_content text-left">
												<h3><?php echo wp_trim_words( get_the_title(), $witr_title_length, '' );?></h3>
												<?php the_content(); ?>	
												
												<?php if($em_tab_btn1utl){ ?>
													<a class="btn" href="<?php echo $em_tab_btn1utl; ?> "><?php  echo $em_tab_btn1;?></a>
												<?php	}?>
												<?php if($em_tab_btn2url){ ?>
													<a class="btn" href="<?php echo $em_tab_btn2url; ?> "><?php  echo $em_tab_btn2;?></a>
												<?php	}?>														
											</div>
										</div>
									<?php } ?>	
									

								</div>
							</div>
						
								<?php endwhile; ?><?php wp_reset_query(); ?>
						</div><!-- tab content -->									
												
				</div> <!-- digital item -->
			</div> <!-- digital item -->
			
			<?php				
			break;			
			default:
        ?>
		
		
		
		
		
		
		
		
			<div class="tab_area">
				<div class="tab_item text-center">
					<ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
						<?php while ($posts->have_posts()) : $posts->the_post(); 		 	
						  $em_tab_menu  = get_post_meta( get_the_ID(),'_txbdm_em_tab_menu', true );
						  $em_tab_active  = get_post_meta( get_the_ID(),'_txbdm_em_tab_active', true );
						  $em_tab_image  = get_post_meta( get_the_ID(),'_txbdm_em_tab_image', true );
						  ?>	
						  <li class="nav-item">
							<a class="nav-link <?php if($em_tab_active){ echo $em_tab_active; }?>"   <?php if($em_tab_image){?> style="background-image:url(<?php echo $em_tab_image; ?>);"  <?php } ?>    data-toggle="pill" href="#pills-<?php echo get_the_ID(); ?>" role="tab"  aria-selected="true"><?php if($em_tab_menu){echo $em_tab_menu;}?></a>
						</li>
						<?php endwhile; ?> <?php wp_reset_query(); ?>
					</ul>
					<div class="tab-content tab_text_box" id="pills-tabContent">
				 
							
						  <?php while ($posts->have_posts()) : $posts->the_post(); 		 
						  
							$em_tab_active  = get_post_meta( get_the_ID(),'_txbdm_em_tab_active', true );
							$em_tab_btn1  = get_post_meta( get_the_ID(),'_txbdm_em_tab_btn1', true );
							$em_tab_btn1utl  = get_post_meta( get_the_ID(),'_txbdm_em_tab_btn1utl', true );
							$em_tab_btn2  = get_post_meta( get_the_ID(),'_txbdm_em_tab_btn2', true );
							$em_tab_btn2url  = get_post_meta( get_the_ID(),'_txbdm_em_tab_btn2url', true );
							?>
							
							<div class="tab-pane fade <?php if($em_tab_active){echo $em_tab_active;}?>" id="pills-<?php echo get_the_ID(); ?>" role="tabpanel">
							 <div class="row">
								<!-- image -->
								<?php if(has_post_thumbnail()){?> 
									<div class="col-lg-5  col-md-5 d-none d-sm-none d-md-block">
										<div class="em_post_tab_thumb">
											<?php the_post_thumbnail();?>
										</div>
									</div>
								
								
								<div class="col-lg-7  col-md-7">												  
									 <div class="tab_content text-left">

											<h3><?php echo wp_trim_words( get_the_title(), $witr_title_length, '' );?></h3>
										
											<?php the_content(); ?>

										<?php if($em_tab_btn1utl){ ?>
											<a class="btn" href="<?php echo $em_tab_btn1utl; ?> "><?php  echo $em_tab_btn1;?></a>
										<?php	}?>
										<?php if($em_tab_btn2url){ ?>
											<a class="btn" href="<?php echo $em_tab_btn2url; ?> "><?php  echo $em_tab_btn2;?></a>
										<?php	}?>
																							
									</div>									
								</div>
								<?php }else{?>										
									<div class="col-md-12">	
										 <div class="tab_content text-left">
											<h3><?php echo wp_trim_words( get_the_title(), $witr_title_length, '' );?></h3>
											<?php the_content(); ?>	
											
											<?php if($em_tab_btn1utl){ ?>
												<a class="btn" href="<?php echo $em_tab_btn1utl; ?> "><?php  echo $em_tab_btn1;?></a>
											<?php	}?>
											<?php if($em_tab_btn2url){ ?>
												<a class="btn" href="<?php echo $em_tab_btn2url; ?> "><?php  echo $em_tab_btn2;?></a>
											<?php	}?>														
										</div>
									</div>
								<?php } ?>	
							</div>
							</div>
						
								<?php endwhile; ?><?php wp_reset_query(); ?>
						</div><!-- tab content -->									
												
				</div> <!-- digital item -->
			</div> <!-- digital item -->
              		
		
		
			
		
		
        <?php

			break;
			
		} 				
       
	} 





}