<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Post_Service extends Widget_Base {

    public function get_name() {
        return 'witr_service_section';
    }
    
    public function get_title() {
        return esc_html__( ' Post Service', 'themex' );
    }
    public function get_style_depends() {
        return ['wservice'];
    }
	public function get_script_depends() {
        return [  ];
    }	
    public function get_icon() {
        return 'themex_icon eicon-image';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {

		/*=== witr service options ====*/
        $this->start_controls_section(
            'witr_service_option',
            [
                'label' => esc_html__( 'Service Options', 'themex' ),
            ]
        );
		
		
			/* service style witr_style_service */
			$this->add_control(
				'witr_style_service',
				[
					'label' => esc_html__( 'service style', 'themex' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'1' => esc_html__( 'Icon Top Left Center Right', 'themex' ),
						'2' => esc_html__( 'Icon Right', 'themex' ),
						'3' => esc_html__( 'Icon Left', 'themex' ),
						'4' => esc_html__( 'All Text Hover With BG Image', 'themex' ),
						'5' => esc_html__( 'Top Icon and Shape', 'themex' ),
						'6' => esc_html__( '3D/flip Style', 'themex' ),
						'7' => esc_html__( 'style 7', 'themex' ),						
						'8' => esc_html__( 'style 8', 'themex' ),						
						'9' => esc_html__( 'style 9', 'themex' ),
						'10' => esc_html__( 'style 10', 'themex' ),						
						'11' => esc_html__( 'style 11', 'themex' ),						
						'12' => esc_html__( 'Image Set Must Be style 12', 'themex' ),						
					],
					'default' => '1',
				]
			);
			/*  witr_box_height */
			$this->add_responsive_control(
				'witr_box_height',
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
						'{{WRAPPER}} .witr_service_front_3d,{{WRAPPER}} .witr_service_back_3d' => 'height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_service' =>['6'],
					],					
				]
			);			
			/* Box Position */				
			$this->add_control(
				'witr_text_ltc',
				[
					'label' => esc_html__( 'Box Position', 'themex' ),
					'type' => Controls_Manager::CHOOSE,
					'default' => 'center',
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
						'witr_style_service' =>['1','4','6','7','8'],
					],							
				]
			);
				/* witr_xyz */
				$this->add_control(
					'witr_xyz',
					[
						'label' => esc_html__( 'Flip Box', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'witr_service_flip_left',
						'options' => [
							'witr_service_flip_left' => esc_html__( 'Left', 'themex' ),
							'witr_service_flip_right' => esc_html__( 'Right', 'Down' ),
							'witr_service_flip_up' => esc_html__( 'Up', 'themex' ),
							'witr_service_flip_down' => esc_html__( 'Down', 'themex' ),
							'witr_service_flip_zoomin' => esc_html__( 'Zoom In', 'Down' ),
							'witr_service_flip_zoomout' => esc_html__( 'Zoom Out', 'Down' ),
						],
						'condition' => [
							'witr_style_service' =>['6'],
						],						
					]
				);			
			/* service iten show witr_post_per_page */
            $this->add_control(
                'witr_post_per_page',
                [
                    'label' => __( 'Show Number Of service', 'themex' ),
                    'type' => Controls_Manager::NUMBER,				
                    'separator' => 'before',
                    'min' => 1,
                    'max' => 500,
                    'step' => 1,
                    'default' => 5,
                ]
            );
			/* service show witr_adc_service */
 			$this->add_control(
				'witr_adc_service',
				[
					'label' => esc_html__( 'service ASC/DSC style', 'themex' ),
					'type' => Controls_Manager::SELECT,
                    'separator' => 'before',					
					'options' => [
						'DESC'	=> esc_html__( 'Descending', 'themex' ),
						'ASC'	=> esc_html__( 'Ascending', 'themex' )
					],
					'default' => 'DESC',
				]
			);
			/* witr_show_image */
			$this->add_control(
				'witr_show_image',
				[
					'label' => esc_html__( 'Show Image', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'no',
					'separator'=>'before',							
				]
			);			
			/* witr_show_content */
			$this->add_control(
				'witr_show_content',
				[
					'label' => esc_html__( 'Show Content', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'yes',
					'separator'=>'before',							
				]
			);			
			/* witr_content_length */
            $this->add_control(
                'witr_content_length',
                [
                    'label' => esc_html__( 'Content Length', 'themex' ),
                    'type' => Controls_Manager::NUMBER,					
                    'min' => 1,
                    'max' => 1000,
                    'step' => 1,
                    'default' => 10,
					'condition' => [						
						'witr_show_content' => 'yes',
					],					
                ]
            );			
			/* witr_blog_button */			
            $this->add_control(
                'witr_service_button',
                [
                    'label' => esc_html__( 'Button Text', 'themex' ),
                    'type' => Controls_Manager::TEXT,
                    'separator' => 'before',					
					'description' => esc_html__( 'Not use button, remove the text from field', 'themex' ),
					'placeholder' => esc_attr__( 'ex - Read More', 'themex' ),
                    'default' => 'Read More',
                ]
            );
			
			/*  witr_service2_pluse	*/
			$this->add_control(
				'witr_service_pluse',
				[
					'label' => esc_html__( 'Button Icon Name', 'themex' ),
					'type' => Controls_Manager::TEXT,
					'description' => esc_html__( 'Type Icofont - https://icofont.com/icons or Themify Icon - https://themify.me/themify-icons or Fontawesome Icon - https://fontawesome.com/v4.7.0/icons/ name here', 'themex' ),
					'default' => esc_html__( 'icofont-plus', 'themex' ),
					'placeholder' => esc_attr__( 'Type your Button Icon Name here', 'themex' ),
					'condition' => [
						'witr_style_service' =>['11'],
					],							
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
				           

        $this->end_controls_section();
		/*=== witr service options end ====*/
		
		/*=== witr service options end ====*/		
        $this->start_controls_section(
            'witr_post_service_option',
            [
                'label' => esc_html__( 'Witr Slick Options', 'themex' ),
            ]
        );		
		
				/* witr_slides_to_show */ 		
				$this->add_control(
					'witr_slides_to_show',
					[
						'label' => esc_html__( 'Slides to Show', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',					
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
						'description' => esc_html__( 'Please use a unic ID here, ex- any text.', 'themex' ),
						'default' => 'idteam',
						'placeholder' => esc_attr__( 'Type your ID here', 'themex' ),							
					]
				);		
		
        $this->end_controls_section();
		/*=== witr service options end ====*/

		
	   /*===============================================================================================================================
																START TO STYLE
		=================================================================================================================================*/			

		/*=== start Single Box style ====*/
		$this->start_controls_section(
			'section_single_service',
			[
				'label' => esc_html__( 'Box Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]
		);
				$this->add_control(
					'shapeboxh',
					[
						'label' => esc_html__( 'Bar Background', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator' => 'before',
						'condition' => [
							'witr_style_service' => ['10'],
						],							
					]
				);				
				/* shape background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_boxba_background',
						'label' => esc_html__( ' Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_service_10::before',
						'condition' => [
							'witr_style_service' => ['10'],
						],							
					]
				);		
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_single_bb',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .all_color_service',
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
							'{{WRAPPER}} .all_color_service' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadowsbox',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .all_color_service',
					]
				);
				/* box background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_box_background',
						'label' => esc_html__( ' Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .all_color_service',							
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
							'{{WRAPPER}} .all_color_service' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				
				/* box padding */
				$this->add_responsive_control(
					'witr_box_paddingei',
					[
						'label' => esc_html__( ' Content Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .detail_SS,{{WRAPPER}} .wirt_detail_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						'condition' => [
							'witr_style_service' =>['8','11'],
						],							
					]
				);				

				/* HEADING  */
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
						'selector' => '{{WRAPPER}} .all_color_service:hover',
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
							'{{WRAPPER}} .all_color_service:hover' => 'border-color: {{VALUE}}',
						],
						
					]
				);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadowhbox',
						'label' => esc_html__( 'Hover Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .all_color_service:hover',
					]
				);					
				/* box background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_boxhover_background',
						'label' => esc_html__( ' Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .all_color_service:hover',							
					]
				);		

		$this->end_controls_section();
		/*=== start Single Box style ====*/			

		/*==================================
			start witr icon top style 
		====================================*/
		$this->start_controls_section(
			'witr_text_box_option',
			[
				'label' => esc_html__( 'Text Box Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_service' => ['12'],	
				],				
			]
		);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_tbox_shadowhbox',
						'label' => esc_html__( ' Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .wirt_text_boxi',
					]
				);					
				/* box background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_tboxhover_background',
						'label' => esc_html__( ' Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .wirt_text_boxi',							
					]
				);
				
			/* witr_top */
			$this->add_responsive_control(
				'witrb_leftt',
				[
					'label' => esc_html__( 'Left', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 500,
						],
						'%' => [
							'min' => -500,
							'max' => 500,
						],
						'em' => [
							'min' => -500,
							'max' => 500,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .wirt_text_boxi' => 'left: {{SIZE}}{{UNIT}};',
					],				
				]
			);
			
			/* witr_left */
			$this->add_responsive_control(
				'witrb_rightl',
				[
					'label' => esc_html__( ' Right', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 500,
						],
						'%' => [
							'min' => -500,
							'max' => 500,
						],
						'em' => [
							'min' => -500,
							'max' => 500,
						],
						
					],
					'selectors' => [
						'{{WRAPPER}} .wirt_text_boxi' => 'right: {{SIZE}}{{UNIT}};',
					],					

				]
			);				

			/* witr_left */
			$this->add_responsive_control(
				'witrb_bottom',
				[
					'label' => esc_html__( ' Bottom', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 500,
						],
						'%' => [
							'min' => -500,
							'max' => 500,
						],
						'em' => [
							'min' => -500,
							'max' => 500,
						],
						
					],
					'selectors' => [
						'{{WRAPPER}} .wirt_text_boxi' => 'bottom: {{SIZE}}{{UNIT}};',
					],					

				]
			);			
				
				/* icon padding */
				$this->add_responsive_control(
					'witr_tbox_padding',
					[
						'label' => esc_html__( ' Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .wirt_text_boxi' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);				

		$this->end_controls_section();
		/*=== start Single Box style ====*/
		
		/*=== start witr_icon style ====*/
		$this->start_controls_section(
			'section_style_icon',
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
				$this->add_control(
					'shapeititle',
					[
						'label' => esc_html__( 'Shape Background', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator' => 'before',
						'condition' => [
							'witr_style_service' => ['5','10'],
						],							
					]
				);				
				/* shape background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_ishape_background',
						'label' => esc_html__( 'Shape Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .SIBG_1::before,{{WRAPPER}} .witr_service_10::before',
						'condition' => [
							'witr_style_service' => ['5','10'],
						],							
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
							'{{WRAPPER}} .all_icon_color i' => 'color: {{VALUE}}',
						],
						
					]
				);
				
				/*  icon font size */
				$this->add_responsive_control(
					'witr_icon_size',
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
							'{{WRAPPER}} .all_icon_color i' => 'font-size: {{SIZE}}{{UNIT}};',
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
						'selector' => '{{WRAPPER}} .all_icon_color i',
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
							'{{WRAPPER}} .all_icon_color i' => 'width: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .all_icon_color i' => 'height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .all_icon_color i' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/* witr_text_align */					
				$this->add_responsive_control(
					'witr_text_align',
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
							'{{WRAPPER}} .all_icon_color i' => 'text-align: {{VALUE}}',
						],
					]
				);
				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_border',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .all_icon_color i',
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
							'{{WRAPPER}} .all_icon_color i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .all_icon_color i',
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
							'{{WRAPPER}} .all_icon_color i' => 'mix-blend-mode: {{VALUE}}',
						],
					]
				);				

					
				/*  Rotate */
				$this->add_responsive_control(
					'witr_rotate',
					[
						'label' => esc_html__( 'Rotate', 'themex' ),
						'type' => Controls_Manager::SLIDER,
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
							'{{WRAPPER}} .all_icon_color i' => 'transform: rotate({{SIZE}}{{UNIT}});',
						],
					]
				);

				/* witr_position_style */
				$this->add_responsive_control(
					'witr_position_style',
					[
						'label' => esc_html__( 'Icon Position', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'' => esc_html__( 'Default', 'themex' ),
							'absolute' => esc_html__( 'absolute', 'themex' ),
							'fixed' => esc_html__( 'fixed', 'themex' ),
							'inherit' => esc_html__( 'inherit', 'themex' ),
						],
						'selectors' => [
							'{{WRAPPER}} .all_icon_color i' => 'position: {{VALUE}};',
						],							
					]
				);
				/* witr_icon_top */
				$this->add_responsive_control(
					'witr_icon_top',
					[
						'label' => esc_html__( 'Icon Top', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => -100,
								'max' => 500,
							],
							'%' => [
								'min' => -100,
								'max' => 100,
							],		
						],
						'condition' => [
							'witr_position_style' => ["absolute","fixed"],
						],						
						'selectors' => [
							'{{WRAPPER}} .all_icon_color i' => 'top: {{SIZE}}{{UNIT}};',
						],
					]
				);
				
				/* witr_icon_left */
				$this->add_responsive_control(
					'witr_icon_left',
					[
						'label' => esc_html__( 'Icon Left', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => -100,
								'max' => 500,
							],
							'%' => [
								'min' => -100,
								'max' => 100,
							],	
						],
						'condition' => [
							'witr_position_style' => ["absolute","fixed"],
						],						
						'selectors' => [
							'{{WRAPPER}} .all_icon_color i' => 'left: {{SIZE}}{{UNIT}};',
						],
					]
				);

				/* icon margin */
				$this->add_responsive_control(
					'witr_icon_margin',
					[
						'label' => esc_html__( ' Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .all_icon_color i,{{WRAPPER}} .em-service2.sleft .em-service-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* icon padding */
				$this->add_responsive_control(
					'witr_icon_padding',
					[
						'label' => esc_html__( ' Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .all_icon_color i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				$this->add_control(
					'shapeihtitle',
					[
						'label' => esc_html__( 'Shape Hover Background', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator' => 'before',
						'condition' => [
							'witr_style_service' => ['5','10'],
						],						
					]
				);				
				/* shape background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_ihshape_background',
						'label' => esc_html__( 'Shape Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .singleSS:hover .SIBG_1::before,{{WRAPPER}} .witr_service_10:hover::before',
						'condition' => [
							'witr_style_service' => ['5','10'],
						],						
					]
				);					
					/*  primary hover color */
					$this->add_control(
						'witr_hover_primary_color',
						[
							'label' => esc_html__( 'Icon Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .all_color_service:hover i ' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .all_color_service:hover i',
						]
					);					
					/* witr_border_style */
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'witr_borderho',
							'label' => esc_html__( 'Border', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .all_color_service:hover i',
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
						'{{WRAPPER}} .all_icon_color img' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .all_icon_color img' => 'height: {{SIZE}}{{UNIT}};',
					],
				]			
			);
			/* witr_border_style */
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'witr_img_bb',
					'label' => esc_html__( 'Border', 'themex' ),
					'selector' => '{{WRAPPER}} .single_seivice_ani img,{{WRAPPER}} .all_icon_color img',
				]
			);			
			/* border_radius */
			$this->add_control(
				'witr_border_img_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'description' =>esc_html__('When Show Animation Set Not Work Border Radius','themex'),
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .all_icon_color img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_icon_color img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_icon_color img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_image style ====*/
		
		/*=== start witr_title style ====*/
		$this->start_controls_section(
			'witr_style_option_title',
			[
				'label' => esc_html__( 'Title Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			/* border_radius */
			$this->add_control(
				'witr_border_text_radius',
				[
					'label' => esc_html__( 'Title Box Border Radius', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .wirt_detail_texti' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_service' => ['11'],
					],					
				]
			);
				/* Icon background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_tex_background',
						'label' => esc_html__( '  Background', 'themex' ),
						'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .wirt_detail_texti',
						'condition' => [
							'witr_style_service' => ['11'],
						],						
					]
				);
				/* image padding */
				$this->add_responsive_control(
					'witr_tex_ha',
					[
						'label' => esc_html__( 'Background Hover', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'condition' => [
							'witr_style_service' => ['11'],
						],					
					]
				);				
				/* Icon background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_texh_background',
						'label' => esc_html__( '  Background', 'themex' ),
						'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .witr_service_11:hover .wirt_detail_texti',
						'condition' => [
							'witr_style_service' => ['11'],
						],						
					]
				);				
			/* image padding */
			$this->add_responsive_control(
				'witr_tex_padding',
				[
					'label' => esc_html__( 'Title Box Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .wirt_detail_texti' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_service' => ['11'],
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
						'{{WRAPPER}} .all_color_service h3,{{WRAPPER}} .all_color_service h3 a' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .all_color_service h3:hover,{{WRAPPER}} .all_color_service h3 a:hover' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .all_color_service h3,{{WRAPPER}} .all_color_service h3 a',
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
						'{{WRAPPER}} .all_color_service h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_color_service h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_title style ====*/

		/*=== start witr_title style ====*/
		$this->start_controls_section(
			'witr_style_option_title2',
			[
				'label' => esc_html__( 'Sub Title Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_service' =>['11','12'],
				],				
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
						'{{WRAPPER}} .all_color_service h2,{{WRAPPER}} .all_color_service h2 a' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .all_color_service h2:hover,{{WRAPPER}} .all_color_service h2 a:hover' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .all_color_service h2,{{WRAPPER}} .all_color_service h2 a',
				]
			);			
			/* title margin */
			$this->add_responsive_control(
				'witr_title_margin2',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_color_service h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* title padding */
			$this->add_responsive_control(
				'witr_title_padding2',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_color_service h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_title style ====*/
			
		/*=== start witr List content style ====*/		
		 $this->start_controls_section(
			'witr_option_list_content',
			[
				'label' => esc_html__( 'List Icon & Text Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_service' =>['10','11'],
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
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .service_list_op ul li i' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .service_list_op ul li i' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .service_list_op ul li i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .service_list_op ul li i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);		
		
		$this->end_controls_tab();
		/*=== end list normal style ====*/
	
			/*=== start icon hover style ====*/
			$this->start_controls_tab(
				'list_colors_hover',
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
						'separator'=>'before',
						'global' => [
							'default' => Global_Colors::COLOR_TEXT,
						],						
						'selectors' => [
							'{{WRAPPER}} .service_list_op ul li a,{{WRAPPER}} .service_list_op ul li p,{{WRAPPER}} .service_list_op ul li span,{{WRAPPER}} .service_list_op ul li' => 'color: {{VALUE}}',
						],
					]
				);
				/* list text color */
				$this->add_control(
					'witr_list_hover_color',
					[
						'label' => esc_html__( ' Text Hover', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .service_list_op ul li a:hover,{{WRAPPER}} .service_list_op ul li p:hover,{{WRAPPER}} .service_list_op ul li span:hover,{{WRAPPER}} .service_list_op ul li:hover' => 'color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .service_list_op ul li a,{{WRAPPER}} .service_list_op ul li p,{{WRAPPER}} .service_list_op ul li span,{{WRAPPER}} .service_list_op ul li',
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
							'{{WRAPPER}} .service_list_op ul li a,{{WRAPPER}} .service_list_op ul li p,{{WRAPPER}} .service_list_op ul li span,{{WRAPPER}} .service_list_op ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .service_list_op ul li a,{{WRAPPER}} .service_list_op ul li p,{{WRAPPER}} .service_list_op ul li span,{{WRAPPER}} .service_list_op ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);


				$this->end_controls_tab();
				/*=== end text hover style ====*/
				
		$this->end_controls_tabs();
		/*=== end text_tabs style ====*/

	$this->end_controls_section();

	/*=== end witr_list style ====*/
		
		/*=== start witr content style ====*/
		$this->start_controls_section(
			'witr_style_option_content',
			[
				'label' => esc_html__( 'Content Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_show_content' => 'yes',
				],				
			]
		);		 
			/* color */
			$this->add_control(
				'witr_content_color',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_TEXT,
					],					
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .all_color_service p ' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .all_color_service p',
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
						'{{WRAPPER}} .all_color_service p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_color_service p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'label' => esc_html__( 'Text Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'global' => [
								'default' => Global_Colors::COLOR_ACCENT,
							],							
							'separator'=>'before',
							'selectors' => [
								'{{WRAPPER}} .service-btn a,{{WRAPPER}} .witr_service_btn_3d a' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .service-btn a,{{WRAPPER}} .witr_service_btn_3d a',
						]
					);	
					/* Button background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_button_background',
							'label' => esc_html__( 'button Background', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .service-btn a,{{WRAPPER}} .witr_service_btn_3d a',
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
							],
							'default' => ' ',
							'selectors' => [
								'{{WRAPPER}} .service-btn a,{{WRAPPER}} .witr_service_btn_3d a' => 'border-style: {{VALUE}}',
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
								'{{WRAPPER}} .service-btn a,{{WRAPPER}} .witr_service_btn_3d a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'condition' => [
								'witr_border_btn_style' => ['solid','double','dotted','dashed'],
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
								'{{WRAPPER}} .service-btn a,{{WRAPPER}} .witr_service_btn_3d a' => 'border-color: {{VALUE}}',
							],
							'condition' => [
								'witr_border_btn_style' => ['solid','double','dotted','dashed'],
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
								'{{WRAPPER}} .service-btn a,{{WRAPPER}} .witr_service_btn_3d a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',								
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
								'{{WRAPPER}} .service-btn a,{{WRAPPER}} .witr_service_btn_3d a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .service-btn a,{{WRAPPER}} .witr_service_btn_3d a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .service-btn a:hover,{{WRAPPER}} .service-btn a:hover i,{{WRAPPER}} .witr_service_btn_3d a:hover' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .service-btn a:hover,{{WRAPPER}} .witr_service_btn_3d a:hover',
						]
					);
					/* witr_hoverborder_style */
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'witr_hoverborder_style',
							'label' => esc_html__( 'Button Hover Border', 'themex' ),
							'selector' => '{{WRAPPER}} .service-btn a:hover,{{WRAPPER}} .witr_service_btn_3d a:hover',
						]
					);					
					
					
					$this->end_controls_tab();
					/*=== end button hover style ====*/
			$this->end_controls_tabs();
			/*=== end button_tabs style ====*/			
		 $this->end_controls_section();
		/*=== end  witr button style ====*/		

		
		/*=== start witr_icon style ====*/
		$this->start_controls_section(
			'witr_style_span_option',
			[
				'label' => esc_html__( 'Button Icon Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_service' =>['11'],
				],				
			]
		);
		
			/*=== start icon_tabs style ====*/
			$this->start_controls_tabs( 'span_colors' );
				/*=== start icon_normal style ====*/
				$this->start_controls_tab(
					'witr_icon_colors_span',
					[
						'label' => esc_html__( 'Normal', 'themex' ),
					]
				);
				/* Icon Color */
				$this->add_control(
					'witr_span_color',
					[
						'label' => esc_html__( ' Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .all_color_service span' => 'color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .all_color_service span',
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
							'{{WRAPPER}} .all_color_service span' => 'font-size: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .all_color_service span' => 'width: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .all_color_service span' => 'height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .all_color_service span' => 'line-height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .all_color_service span' => 'text-align: {{VALUE}}',
						],
					]
				);				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_borde_span',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .all_color_service span',
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
							'{{WRAPPER}} .all_color_service span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow_span',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .all_color_service span',
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
							'{{WRAPPER}} .pluse_btn_slick' => 'transform: rotate({{SIZE}}{{UNIT}});',
						],
					]
				);				
				
				/* witr_position_style */
				$this->add_responsive_control(
					'witr_position_style_span',
					[
						'label' => esc_html__( 'Icon Position', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'' => esc_html__( 'Default', 'themex' ),
							'absolute' => esc_html__( 'absolute', 'themex' ),
							'fixed' => esc_html__( 'fixed', 'themex' ),
							'inherit' => esc_html__( 'inherit', 'themex' ),
						],
						'selectors' => [
							'{{WRAPPER}} .pluse_btn_slick' => 'position: {{VALUE}};',
						],							
					]
				);
				/* witr_icon_top */
				$this->add_responsive_control(
					'witr_icon_top_span',
					[
						'label' => esc_html__( 'Icon Top', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => -100,
								'max' => 500,
							],
							'%' => [
								'min' => -100,
								'max' => 100,
							],		
						],
						'condition' => [
							'witr_position_style_span' => ["absolute","fixed"],
						],						
						'selectors' => [
							'{{WRAPPER}} .pluse_btn_slick' => 'top: {{SIZE}}{{UNIT}};',
						],
					]
				);
				
				/* witr_icon_left */
				$this->add_responsive_control(
					'witr_icon_left_span',
					[
						'label' => esc_html__( 'Icon Left', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => -100,
								'max' => 500,
							],
							'%' => [
								'min' => -100,
								'max' => 100,
							],	
						],
						'condition' => [
							'witr_position_style_span' => ["absolute","fixed"],
						],						
						'selectors' => [
							'{{WRAPPER}} .pluse_btn_slick' => 'left: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .all_color_service span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .all_color_service span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		
				

				$this->end_controls_tab();
				/*=== end icon normal style ====*/
			
					/*=== start icon hover style ====*/
					$this->start_controls_tab(
						'witr_icon_span_hover',
						[
							'label' => esc_html__( 'Icon Hover', 'themex' ),
						]
					);
					/*  primary hover color */
					$this->add_control(
						'witr_hover_span_color',
						[
							'label' => esc_html__( ' Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .all_color_service span:hover' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .all_color_service span:hover',
						]
					);
					/* border_hover_color */
					$this->add_control(
						'witr_border_hover_color_span',
						[
							'label' => esc_html__( 'Border Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							
							'selectors' => [
								'{{WRAPPER}} .all_color_service span:hover' => 'border-color: {{VALUE}}',
							],
						]
					);					

					$this->end_controls_tab();
					/*=== end icon hover style ====*/
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/
		$this->end_controls_section();
		/*=== end witr_icon style ====*/		
		

		/*=== start witr all style ====*/
		$this->start_controls_section(
			'witr_style_all_content',
			[
				'label' => esc_html__( 'All Text Hover Color', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_service' =>['4','6'],
				],					
			]
		);		 
			/* color */
			$this->add_control(
				'witr_alltitle_color',
				[
					'label' => esc_html__( 'All Text Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',					
					'selectors' => [
						'{{WRAPPER}} .em-service:hover .em-service-icon i,{{WRAPPER}} .em-service:hover .em-service-title h3 a,{{WRAPPER}} .em-service:hover .em-service-title h3,{{WRAPPER}} .em-service:hover .em-service-desc p,{{WRAPPER}} .em-service:hover .service-btn > a,{{WRAPPER}} .all_color_service:hover .witr_service_icon_3d i,{{WRAPPER}} .all_color_service:hover .witr_service_content_3d h3 a,{{WRAPPER}} .all_color_service:hover .witr_service_content_3d h3,{{WRAPPER}} .all_color_service:hover .witr_service_content_3d p,{{WRAPPER}} .all_color_service:hover .witr_service_btn_3d a' => 'color: {{VALUE}}',
					],
				] 
			);
						/* border_color */
						$this->add_control(
							'witr_bordear_btn_color',
							[
								'label' => esc_html__( 'Button Border hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .all_color_service:hover .witr_service_btn_3d a' => 'border-color: {{VALUE}}',
								],
							]
						);			
			/* box shadow color */	
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'witr_sbox_shadow',
					'separator'=>'before',
					'label' => esc_html__( 'Box Shadow', 'themex' ),
					'selector' => '{{WRAPPER}} .em-service,{{WRAPPER}} .all_color_service',
				]
			);	
			/*  background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_backgrounda',
					'label' => esc_html__( 'Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .em-service:hover,{{WRAPPER}} .witr_service_front_3d',
				]
			);
				
			/* color */
			$this->add_control(
				'witr_before_heading',
				[
					'label' => esc_html__( 'Image Overlay Color', 'themex' ),
					'type' => Controls_Manager::HEADING,				
				]
			);				
				/*  background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_backgrounda_before',
						'label' => esc_html__( 'Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .em-service:hover::before,{{WRAPPER}} .witr_service_front_3d:before',
					]
				);
				/* Fontend border_radius */
				$this->add_control(
					'witr_borderf_radius',
					[
						'label' => esc_html__( 'Fontend Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .witr_service_front_3d,{{WRAPPER}} .witr_service_front_3d:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						'condition' => [
							'witr_style_service' =>['6'],
						],						
					]
				);				

	
/* =================================================== Bekend Option =================================================================== */
			/* heading2 */
			$this->add_control(
				'witr_heading3_color',
				[
					'label' => esc_html__( 'Box Bekend Option Bottom Look', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'separator'=>'before',
					'condition' => [
						'witr_style_service' =>['6'],
					],					
				]
			);
			/* heading2 */
			$this->add_control(
				'witr_alheadeing2_color',
				[
					'label' => esc_html__( 'Box BG color', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'default' =>'heading',
					'separator'=>'before',
					'condition' => [
						'witr_style_service' =>['6'],
					],					
				]
			);
			
			/* box background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_bbgh2_background',
					'label' => esc_html__( 'Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .witr_service_back_3d',
					'condition' => [
						'witr_style_service' =>['6'],
					],					
				]
			);			
			/* heading2 */
			$this->add_control(
				'witr_bvalheadeing2_color',
				[
					'label' => esc_html__( 'Box Overlay BG color', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'default' =>'heading',
					'separator'=>'before',
					'condition' => [
						'witr_style_service' =>['6'],
					],					
				]
			);			
			/* box background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_bvbgh2_background',
					'label' => esc_html__( 'Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .witr_service_back_3d:before',
					'condition' => [
						'witr_style_service' =>['6'],
					],					
				]
			);
				/* Fontend border_radius */
				$this->add_control(
					'witr_borderb_radius',
					[
						'label' => esc_html__( 'Bekend Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .witr_service_back_3d,{{WRAPPER}} .witr_service_back_3d:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						'condition' => [
							'witr_style_service' =>['6'],
						],						
					]
				);				


		 $this->end_controls_section();
		/*=== end  witr all text style ====*/
		

		/*=== start witr all style ====*/
		$this->start_controls_section(
			'witr_style_all_content9',
			[
				'label' => esc_html__( 'All Text Hover Color', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_service' =>['9'],
				],					
			]
		);		 
			/* color */
			$this->add_control(
				'witr_before_headings9',
				[
					'label' => esc_html__( 'Shape BG Color', 'themex' ),
					'type' => Controls_Manager::HEADING,				
				]
			);	
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_backgrounda9',
					'label' => esc_html__( 'Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .witr_sstyle_9::before',
				]
			);
				
				/* color */
				$this->add_control(
					'witr_before_heading9',
					[
						'label' => esc_html__( 'Shape Hover BG Color', 'themex' ),
						'type' => Controls_Manager::HEADING,				
					]
				);				
				/*  background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_backgrounda_before9',
						'label' => esc_html__( 'Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_sstyle_9:hover::before',
					]
				);
				
			/* color */
			$this->add_control(
				'witr_alltitle_color9',
				[
					'label' => esc_html__( 'Title and Content Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',					
					'selectors' => [
						'{{WRAPPER}} .witr_sstyle_9:hover h3,{{WRAPPER}} .witr_sstyle_9:hover p' => 'color: {{VALUE}}',
					],
				] 
			);
				/* color */
				$this->add_control(
					'witr_before_btns9',
					[
						'label' => esc_html__( 'Icon and button color', 'themex' ),
						'type' => Controls_Manager::HEADING,				
					]
				);
				/* color */
				$this->add_control(
					'witr_alltitle_uncolor9',
					[
						'label' => esc_html__( 'Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',					
						'selectors' => [
							'{{WRAPPER}} .em-service2.witr_sstyle_9:hover .em-service-icon i,{{WRAPPER}} .witr_sstyle_9:hover .service-btn > a' => 'color: {{VALUE}}',
						],
					] 
				);				
				/*  background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_backgrounda_btn9',
						'label' => esc_html__( 'Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .em-service2.witr_sstyle_9:hover .em-service-icon i,{{WRAPPER}} .witr_sstyle_9:hover .service-btn > a',
					]
				);			
			/* border_color */
			$this->add_control(
				'witr_bordear_btn_color9',
				[
					'label' => esc_html__( 'Button Border Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .em-service2.witr_sstyle_9:hover .em-service-icon i,{{WRAPPER}} .witr_sstyle_9:hover .service-btn > a' => 'border-color: {{VALUE}}',
					],
				]
			);			
			/* box shadow color */	
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'witr_sbox_shadow9',
					'separator'=>'before',
					'label' => esc_html__( 'Icon Box Shadow', 'themex' ),
					'selector' => '{{WRAPPER}} .em-service2.witr_sstyle_9:hover .em-service-icon i',
				]
			);					
				
				/* Fontend border_radius */
				$this->add_control(
					'witr_borderf_radius9',
					[
						'label' => esc_html__( 'Shape Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .witr_sstyle_9:hover::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						'condition' => [
							'witr_style_service' =>['9'],
						],						
					]
				);				
									
		
		
		
		 $this->end_controls_section();
		/*=== end  witr all text style ====*/

		/*=== start Text Box style ====*/
		$this->start_controls_section(
			'section_all_hover',
			[
				'label' => esc_html__( ' All Text Hover Color', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_service' =>['1','2','3','5','7','8','10','11','12'],
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
						'{{WRAPPER}} .all_color_service:hover h3,{{WRAPPER}} .all_color_service:hover h3 a,{{WRAPPER}} .all_color_service:hover h2,{{WRAPPER}} .all_color_service:hover p,{{WRAPPER}} .all_color_service:hover i,{{WRAPPER}} .all_color_service:hover .service_list_op a' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'color_hover_transition',
				[
					'label' => esc_html__( 'Transition Duration', 'elementor' ),
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
						'{{WRAPPER}} .all_color_service h3,{{WRAPPER}} .all_color_service h3 a,{{WRAPPER}} .all_color_service h2,{{WRAPPER}} .all_color_service p,{{WRAPPER}} .all_color_service i,{{WRAPPER}} .all_color_service .service_list_op a' => 'transition: {{SIZE}}s',
					],
				]
			);			
		
			$this->end_controls_section();
		/*=== start Single Box style ====*/		
		
		/*=== start Text Box style ====*/
		$this->start_controls_section(
			'section_text_box',
			[
				'label' => esc_html__( ' Text Box  Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_service' =>['1','2','3'],
				],				
			]
		);
			/* box text background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_boxt_background',
					'label' => esc_html__( 'Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .text_box',
					
				]
			);		
				/* border_radius */
				$this->add_control(
					'witr_box_tr',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .text_box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* HEADING  */
				$this->add_control(
					'witr_boxhh',
					[
						'label' => esc_html__( 'Background Hover', 'themex' ),
						'type' => Controls_Manager::HEADING,
					]
				);						
				/* box text h background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_boxth_background',
						'label' => esc_html__( 'Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .text_box:hover',
						
					]
				);				
				/* box padding */
				$this->add_responsive_control(
					'witr_box_tpadding',
					[
						'label' => esc_html__( ' Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .text_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);				

		

		$this->end_controls_section();
		/*=== start Single Box style ====*/				
		

			/*=== start witr Arrow style ====*/

			$this->start_controls_section(
				'witr_style_option_arrow',
				[
					'label' => esc_html__( 'Witr Arrow Options', 'themex' ),
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
        $witr_adc_service    = ! empty( $witrshowdata['witr_adc_service'] ) ? $witrshowdata['witr_adc_service'] : 'DESC';
        $witr_title_length    = ! empty( $witrshowdata['witr_title_length'] ) ? $witrshowdata['witr_title_length'] : 5;
        $witr_content_length  = ! empty( $witrshowdata['witr_content_length'] ) ? $witrshowdata['witr_content_length'] : 20;      
        $witr_gutter_column  =  $witrshowdata['witr_gutter_column']=='yes'  ? 'witr_all_pd0' : 'witr_all_mb_30'; 
		
		$page = ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );
		$paged = ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : $page );	
	
		
                        $args = array(
                            'post_type'            => 'em_service',
                            'post_status'          => 'publish',
                            'ignore_sticky_posts'  => 1,
                            'posts_per_page'       => $witr_post_per_page,
                            'order'                => $witr_adc_service,
							'paged'     => $paged,
							'page'      => $paged
                        );
					$the_query = new \WP_Query($args);
					
					

	
   
		switch( $witrshowdata['witr_style_service']){
			
			case '12':
			?>
				<div class="service_active">				
					<div class=" witr_carsv_<?php echo $unic_id;?>">				
						<?php while ($the_query->have_posts()) : $the_query->the_post(); 						
							$service_icon  = get_post_meta( get_the_ID(),'_txbdm_service_icon', true );
							$icon_text  = get_post_meta( get_the_ID(),'_txbdm_icon_text', true ); 
							$service_img_show  = get_post_meta( get_the_ID(),'_txbdm_service_icon_img', true ); 
							$service_i_image  = get_post_meta( get_the_ID(),'_txbdm_img_s', true ); 
							$show_list  = get_post_meta( get_the_ID(),'_txbdm_show_list', true ); 
							$list_text  = get_post_meta( get_the_ID(),'_txbdm_list_text', true ); 
							$subtitle  = get_post_meta( get_the_ID(),'_txbdm_subtitle', true ); 
						?>
						<div class="<?php echo $witr_gutter_column; ?> mb_70 col-md-12 col-xs-12 col-sm-12 col-lg-12" >
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>					
								<div class=" witr_service_12 all_color_service  text-<?php echo $witrshowdata['witr_text_ltc']; ?> <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
									<div class="service_top_image">
									<?php if($witrshowdata['witr_show_image']=='yes'){ ?>									
										<?php if(has_post_thumbnail()){?>
										<!-- image -->
										<?php the_post_thumbnail();?>
										<?php } ?>
									<?php } ?>										
									<div class=" wirt_text_boxi">
										<div class="wirt_sdetail_box">
											<div class="wirt_detail_title">
												<!-- Sub title -->
												<?php if($subtitle){?>
													<h2><?php echo esc_html($subtitle);?></h2>
												<?php };?>											
												<!-- title -->
												<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
				
											</div>
										
											<?php if($witrshowdata['witr_show_content']=='yes' ){ ?>
												<!-- content -->
												<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
											<?php } ?>	
											<!-- button -->
											<?php if(! empty( $witrshowdata['witr_service_button'] )){?>	
												<div class="service-btn witr_sbtn_s8">
													<a class="btnslick" href="<?php the_permalink(); ?>"><?php echo $witrshowdata['witr_service_button']; ?></a>
												</div>
											<?php } ?>
										</div>										
										
										
										<div class=" wirt_detailb_icon all_icon_color">
											<!-- icon img -->
											<?php if($service_img_show=='icon_img_show'): ?>
												<?php if( $service_i_image): ?>
													<img src="<?php echo $service_i_image;?>" alt="logo" />
												<?php endif;?>
											<?php endif;?>
											<!-- icon -->
											<?php if($service_icon=='c_icon_show'): ?>
												<i class="<?php echo esc_html( $icon_text);?>"></i>
											<?php endif; ?>			
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
			include('witr_service/witrsrvajs.php');			
			break;
			
			case '11':
			?>
				<div class="service_active">				
					<div class=" witr_carsv_<?php echo $unic_id;?>">				
						<?php while ($the_query->have_posts()) : $the_query->the_post(); 						
							$service_icon  = get_post_meta( get_the_ID(),'_txbdm_service_icon', true );
							$icon_text  = get_post_meta( get_the_ID(),'_txbdm_icon_text', true ); 
							$service_img_show  = get_post_meta( get_the_ID(),'_txbdm_service_icon_img', true ); 
							$service_i_image  = get_post_meta( get_the_ID(),'_txbdm_img_s', true ); 
							$show_list  = get_post_meta( get_the_ID(),'_txbdm_show_list', true ); 
							$list_text  = get_post_meta( get_the_ID(),'_txbdm_list_text', true ); 
							$subtitle  = get_post_meta( get_the_ID(),'_txbdm_subtitle', true );						
						?>
						<div class="<?php echo $witr_gutter_column; ?> col-md-12 col-xs-12 col-sm-12 col-lg-12" >
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>					
								<div class=" witr_service_11 all_color_service  text-<?php echo $witrshowdata['witr_text_ltc']; ?> <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
										<?php if($witrshowdata['witr_show_image']=='yes'){ ?>
											<div class="service_top_image">
												<?php if(has_post_thumbnail()){?>
													<!-- image -->
													<?php the_post_thumbnail();?>
												<?php } ?>	
											</div>
										<?php } ?>									
									<div class=" wirt_detail_texti">
										<div class=" wirt_detail_icon all_icon_color">
											<!-- icon img -->
											<?php if($service_img_show=='icon_img_show'): ?>
												<?php if( $service_i_image): ?>
													<img src="<?php echo $service_i_image;?>" alt="logo" />
												<?php endif;?>
											<?php endif;?>
											<!-- icon -->
											<?php if($service_icon=='c_icon_show'): ?>
												<i class="<?php echo esc_html( $icon_text);?>"></i>
											<?php endif; ?>			
										</div>
										<div class="wirt_detail_title">
											<!-- title -->
											<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
											<!-- Sub title -->
											<?php if($subtitle){?>
												<h2><?php echo esc_html($subtitle);?></h2>
											<?php };?>				
										</div>
									</div>
									<div class="wirt_detail_content">
										<?php if($witrshowdata['witr_show_content']=='yes' ){ ?>
											<!-- content -->
											<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
										<?php } ?>	
										<!--- list --->
										<?php if($show_list=='c_list_show'): ?>
										<div class="service_list_op">		
											<?php echo ($list_text);?>		
										</div>	
										<?php endif;?>
										<!-- button -->
										<?php if(! empty( $witrshowdata['witr_service_button'] )){?>	
											<div class="service-btn witr_sbtn_s8 witr_11_btn">
												<a class="btnslick" href="<?php the_permalink(); ?>"><?php echo $witrshowdata['witr_service_button']; ?></a>
												<!-- buton icon -->
												<?php if(isset($witrshowdata['witr_service_pluse']) && ! empty($witrshowdata['witr_service_pluse'])){?>
													<div class="pluse_btn_slick">
														<span class="<?php echo $witrshowdata['witr_service_pluse']; ?>"></span>
													</div>	
												<?php } ?>												
												
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
				include('witr_service/witrsrvajs.php');					
			break;			
			case '10':
			?>
				<div class="service_active">				
				<div class=" witr_carsv_<?php echo $unic_id;?>">				
					<?php while ($the_query->have_posts()) : $the_query->the_post(); 						
						$service_icon  = get_post_meta( get_the_ID(),'_txbdm_service_icon', true );
						$icon_text  = get_post_meta( get_the_ID(),'_txbdm_icon_text', true ); 
						$service_img_show  = get_post_meta( get_the_ID(),'_txbdm_service_icon_img', true ); 
						$service_i_image  = get_post_meta( get_the_ID(),'_txbdm_img_s', true );
						$show_list  = get_post_meta( get_the_ID(),'_txbdm_show_list', true ); 
						$list_text  = get_post_meta( get_the_ID(),'_txbdm_list_text', true );						
					?>
					<div class="<?php echo $witr_gutter_column; ?> col-md-12 col-xs-12 col-sm-12 col-lg-12" >
						<div id="post-<?php the_ID(); ?> <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>" <?php post_class(); ?>>
							<?php if($witrshowdata['witr_show_image']=='yes'){ ?>	
								<div class="service_top_image">
									<?php if(has_post_thumbnail()){?>
										<!-- image -->
										<?php the_post_thumbnail();?>
									<?php } ?>			
								</div>
							<?php } ?>						
							<div class="witr_service_10  all_color_service ">	
								<div class="serIcon SIBG_1  service_text all_icon_color">									
									<!-- icon img -->
									<?php if($service_img_show=='icon_img_show'): ?>
										<?php if( $service_i_image): ?>
											<img src="<?php echo $service_i_image;?>" alt="logo" />
										<?php endif;?>
									<?php endif;?>
									<!-- icon -->
									<?php if($service_icon=='c_icon_show'): ?>
										<i class="<?php echo esc_html( $icon_text);?>"></i>
									<?php endif; ?>			
								</div>
								<div class="detail_SS">
									<!-- title -->
									<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
									<?php if($witrshowdata['witr_show_content']=='yes' ){ ?>
									<!-- content -->
									<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
									<?php } ?>	
									<!--- list --->
									<?php if($show_list=='c_list_show'): ?>
									<div class="service_list_op">		
										<?php echo ($list_text);?>		
									</div>	
									<?php endif;?>
									<!-- button -->
									<?php if(! empty( $witrshowdata['witr_service_button'] )){?>	
										<div class="service-btn">
											<a class="read_clas" href="<?php the_permalink(); ?>"><?php echo $witrshowdata['witr_service_button']; ?></a>
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
				include('witr_service/witrsrvajs.php');					
			break;			
			case '9':
			?>
				<div class="service_active">				
				<div class=" witr_carsv_<?php echo $unic_id;?>">				
					<?php while ($the_query->have_posts()) : $the_query->the_post(); 						
						$service_icon  = get_post_meta( get_the_ID(),'_txbdm_service_icon', true );
						$icon_text  = get_post_meta( get_the_ID(),'_txbdm_icon_text', true ); 
						$service_img_show  = get_post_meta( get_the_ID(),'_txbdm_service_icon_img', true ); 
						$service_i_image  = get_post_meta( get_the_ID(),'_txbdm_img_s', true ); 
					?>
					<div class="<?php echo $witr_gutter_column; ?> col-md-12 col-xs-12 col-sm-12 col-lg-12" >
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>					
							<div class="em-service2 sleft all_color_service  <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
										<?php if($witrshowdata['witr_show_image']=='yes'){ ?>	
											<div class="service_top_image">
												<?php if(has_post_thumbnail()){?>
													<!-- image -->
													<?php the_post_thumbnail();?>
												<?php } ?>			
											</div>
										<?php } ?>
							<div class="em_service_content witr_sstyle_9">
									<div class="em_single_service_text">
										<div class="text_box ">
											<div class="service_top_text all_icon_color">
												<div class="em-service-icon">
													<!-- icon img -->
													<?php if($service_img_show=='icon_img_show'): ?>
														<?php if( $service_i_image): ?>
															<img src="<?php echo $service_i_image;?>" alt="logo" />
														<?php endif;?>
													<?php endif;?>
													<!-- icon -->
													<?php if($service_icon=='c_icon_show'): ?>
														<i class="<?php echo esc_html( $icon_text);?>"></i>
													<?php endif; ?>				
												</div>			
											</div>
											<div class="em-service-inner">
												<div class="em-service-title ">
													<!-- title -->
													<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
												</div>
												<?php if($witrshowdata['witr_show_content']=='yes' ){ ?>
												<div class="em-service-desc">
													<!-- content -->
													<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
												</div>
												<?php } ?>	
												<!-- button -->
												<?php if(! empty( $witrshowdata['witr_service_button'] )){?>	
													<div class="service-btn">
														<a class="read_clas" href="<?php the_permalink(); ?>"><?php echo $witrshowdata['witr_service_button']; ?> <i class="fas fa-arrow-right"></i></a>
													</div>
												<?php } ?>												
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
				</div>		
			<?php
				include('witr_service/witrsrvajs.php');					
			break;
			case '8':
			?>
				<div class="service_active">				
				<div class=" witr_carsv_<?php echo $unic_id;?>">				
					<?php while ($the_query->have_posts()) : $the_query->the_post(); 						
						$service_icon  = get_post_meta( get_the_ID(),'_txbdm_service_icon', true );
						$icon_text  = get_post_meta( get_the_ID(),'_txbdm_icon_text', true ); 
						$service_img_show  = get_post_meta( get_the_ID(),'_txbdm_service_icon_img', true ); 
						$service_i_image  = get_post_meta( get_the_ID(),'_txbdm_img_s', true ); 
					?>
					<div class="<?php echo $witr_gutter_column; ?> col-md-12 col-xs-12 col-sm-12 col-lg-12" >
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>					
							<div class="singleSS witr_service_8 all_color_service  text-<?php echo $witrshowdata['witr_text_ltc']; ?>">
								<div class="serIcon  service_text all_icon_color <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
									<?php if($witrshowdata['witr_show_image']=='yes'){ ?>	
										<div class="service_top_image">
											<?php if(has_post_thumbnail()){?>
												<!-- image -->
												<?php the_post_thumbnail();?>
											<?php } ?>			
										</div>
									<?php } ?>									
									<!-- icon img -->
									<?php if($service_img_show=='icon_img_show'): ?>
										<?php if( $service_i_image): ?>
											<img src="<?php echo $service_i_image;?>" alt="logo" />
										<?php endif;?>
									<?php endif;?>
									<!-- icon -->
									<?php if($service_icon=='c_icon_show'): ?>
										<i class="<?php echo esc_html( $icon_text);?>"></i>
									<?php endif; ?>			
								</div>
								<div class="detail_SS">
									<!-- title -->
									<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
									<?php if($witrshowdata['witr_show_content']=='yes' ){ ?>
									<!-- content -->
									<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
									<?php } ?>	
									<!-- button -->
									<?php if(! empty( $witrshowdata['witr_service_button'] )){?>	
										<div class="service-btn witr_sbtn_s8">
											<a class="read_clas" href="<?php the_permalink(); ?>"><?php echo $witrshowdata['witr_service_button']; ?> <i class="fas fa-arrow-right"></i></a>
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
				include('witr_service/witrsrvajs.php');					
			break;
			
			case '7':
			?>
				<div class="service_active">				
				<div class=" witr_carsv_<?php echo $unic_id;?>">				
					<?php while ($the_query->have_posts()) : $the_query->the_post(); 						
						$service_icon  = get_post_meta( get_the_ID(),'_txbdm_service_icon', true );
						$icon_text  = get_post_meta( get_the_ID(),'_txbdm_icon_text', true ); 
						$service_img_show  = get_post_meta( get_the_ID(),'_txbdm_service_icon_img', true ); 
						$service_i_image  = get_post_meta( get_the_ID(),'_txbdm_img_s', true ); 
					?>
					<div class="<?php echo $witr_gutter_column; ?> col-md-12 col-xs-12 col-sm-12 col-lg-12" >
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>					
							<div class="singleSS witr_service_7 all_color_service text-<?php echo $witrshowdata['witr_text_ltc']; ?>">
								<div class="serIcon  service_text all_icon_color <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
									<?php if($witrshowdata['witr_show_image']=='yes'){ ?>	
										<div class="service_top_image">
											<?php if(has_post_thumbnail()){?>
												<!-- image -->
												<?php the_post_thumbnail();?>
											<?php } ?>			
										</div>
									<?php } ?>								
									<!-- icon img -->
									<?php if($service_img_show=='icon_img_show'): ?>
										<?php if( $service_i_image): ?>
											<img src="<?php echo $service_i_image;?>" alt="logo" />
										<?php endif;?>
									<?php endif;?>
									<!-- icon -->
									<?php if($service_icon=='c_icon_show'): ?>
										<i class="<?php echo esc_html( $icon_text);?>"></i>
									<?php endif; ?>			
								</div>
								<div class="detail_SS">
									<!-- title -->
									<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
									<?php if($witrshowdata['witr_show_content']=='yes' ){ ?>
									<!-- content -->
									<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
									<?php } ?>	
									<!-- button -->
									<?php if(! empty( $witrshowdata['witr_service_button'] )){?>	
										<div class="service-btn">
											<a class="read_clas" href="<?php the_permalink(); ?>"><?php echo $witrshowdata['witr_service_button']; ?> </a>
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
				include('witr_service/witrsrvajs.php');					
			break;
			case '6':
			?>
				<div class="service_active post_service_6">				
				<div class=" witr_carsv_<?php echo $unic_id;?>">				
					<?php while ($the_query->have_posts()) : $the_query->the_post(); 						
						$service_icon  = get_post_meta( get_the_ID(),'_txbdm_service_icon', true );
						$icon_text  = get_post_meta( get_the_ID(),'_txbdm_icon_text', true ); 
						$service_img_show  = get_post_meta( get_the_ID(),'_txbdm_service_icon_img', true ); 
						$service_i_image  = get_post_meta( get_the_ID(),'_txbdm_img_s', true ); 
					?>
					<div class="<?php echo $witr_gutter_column; ?> col-md-12 col-xs-12 col-sm-12 col-lg-12" >
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>					
							<div class="witr_service_3d witr_service_con_3d <?php echo $witrshowdata['witr_xyz']; ?> <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
								<div class="witr_single_service_3d all_color_service text-<?php echo $witrshowdata['witr_text_ltc']; ?>">
									<!-- fontent -->
									<div class="witr_service_front_3d">
										<div class="witr_service_position">
											<?php if($witrshowdata['witr_show_image']=='yes'){ ?>	
												<div class="service_top_image">
													<?php if(has_post_thumbnail()){?>
														<!-- image -->
														<?php the_post_thumbnail();?>
													<?php } ?>			
												</div>
											<?php } ?>										
											<div class="witr_service_content_3d ">										
												<div class="witr_service_icon_3d all_icon_color">
													<!-- icon img -->
													<?php if($service_img_show=='icon_img_show'): ?>
														<?php if( $service_i_image): ?>
															<img src="<?php echo $service_i_image;?>" alt="logo" />
														<?php endif;?>
													<?php endif;?>
													<!-- icon -->
													<?php if($service_icon=='c_icon_show'): ?>
														<i class="<?php echo esc_html( $icon_text);?>"></i>
													<?php endif; ?>						
												</div>
												<!-- title -->
												<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
												<?php if($witrshowdata['witr_show_content']=='yes' ){ ?>
												<!-- content -->
												<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
												<?php } ?>	
											
												<!-- button -->
												<?php if(! empty( $witrshowdata['witr_service_button'] )){?>	
													<div class="witr_service_btn_3d">
														<a class="readMore" href="<?php the_permalink(); ?>"><?php echo $witrshowdata['witr_service_button']; ?> </a>
													</div>
												<?php } ?>
											</div>
										</div>
									</div>
									<!-- bekend -->
									<div class="witr_service_back_3d">
										<div class="witr_service_position">
											<?php if($witrshowdata['witr_show_image']=='yes'){ ?>	
												<div class="service_top_image">
													<?php if(has_post_thumbnail()){?>
														<!-- image -->
														<?php the_post_thumbnail();?>
													<?php } ?>			
												</div>
											<?php } ?>										
											<div class="witr_service_content_3d">											
												<div class="witr_service_icon_3d all_icon_color">
													<!-- icon img -->
													<?php if($service_img_show=='icon_img_show'): ?>
														<?php if( $service_i_image): ?>
															<img src="<?php echo $service_i_image;?>" alt="logo" />
														<?php endif;?>
													<?php endif;?>
													<!-- icon -->
													<?php if($service_icon=='c_icon_show'): ?>
														<i class="<?php echo esc_html( $icon_text);?>"></i>
													<?php endif; ?>						
												</div>
												<!-- title -->
												<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
												<?php if($witrshowdata['witr_show_content']=='yes' ){ ?>
												<!-- content -->
												<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>	
												<?php } ?>	
											
											
												<!-- button -->
												<?php if(! empty( $witrshowdata['witr_service_button'] )){?>	
													<div class="witr_service_btn_3d">
														<a class="read_clas" href="<?php the_permalink(); ?>"><?php echo $witrshowdata['witr_service_button']; ?> </a>
													</div>
												<?php } ?>														
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
				</div>		
			<?php
				include('witr_service/witrsrvajs.php');				
			break;
			case '5':
			?>

				<div class="service_active">				
				<div class=" witr_carsv_<?php echo $unic_id;?>">				
					<?php while ($the_query->have_posts()) : $the_query->the_post(); 						
						$service_icon  = get_post_meta( get_the_ID(),'_txbdm_service_icon', true );
						$icon_text  = get_post_meta( get_the_ID(),'_txbdm_icon_text', true ); 
						$service_img_show  = get_post_meta( get_the_ID(),'_txbdm_service_icon_img', true ); 
						$service_i_image  = get_post_meta( get_the_ID(),'_txbdm_img_s', true ); 
					?>
							
						<!-- single service -->
						
						<div class="<?php echo $witr_gutter_column; ?> col-md-12 col-xs-12 col-sm-12 col-lg-12" >
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="singleSS all_color_service <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">				
									<?php if($witrshowdata['witr_show_image']=='yes'){ ?>	
										<div class="service_top_image">
											<?php if(has_post_thumbnail()){?>
												<!-- image -->
												<?php the_post_thumbnail();?>
											<?php } ?>			
										</div>
									<?php } ?>									
									<div class="serIcon SIBG_1  service_text all_icon_color">
										<!-- icon img -->
										<?php if($service_img_show=='icon_img_show'): ?>
											<?php if( $service_i_image): ?>
												<img src="<?php echo $service_i_image;?>" alt="logo" />
											<?php endif;?>
										<?php endif;?>
										<!-- icon -->
										<?php if($service_icon=='c_icon_show'): ?>
											<i class="<?php echo esc_html( $icon_text);?>"></i>
										<?php endif; ?>				
									</div>			
									<div class="detail_SS">
										<!-- title -->
										<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
										<?php if($witrshowdata['witr_show_content']=='yes' ){ ?>
										<!-- content -->
										<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
										<?php } ?>	
										<!-- button -->
										<?php if(! empty( $witrshowdata['witr_service_button'] )){?>	
											<div class="service-btn">
												<a class="read_clas" href="<?php the_permalink(); ?>"><?php echo $witrshowdata['witr_service_button']; ?> </a>
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
				include('witr_service/witrsrvajs.php');				
			break;
			case '4':
			?>
				<div class="service_active">				
				<div class=" witr_carsv_<?php echo $unic_id;?>">				
					<?php while ($the_query->have_posts()) : $the_query->the_post(); 						
						$service_icon  = get_post_meta( get_the_ID(),'_txbdm_service_icon', true );
						$icon_text  = get_post_meta( get_the_ID(),'_txbdm_icon_text', true ); 
						$service_img_show  = get_post_meta( get_the_ID(),'_txbdm_service_icon_img', true ); 
						$service_i_image  = get_post_meta( get_the_ID(),'_txbdm_img_s', true ); 
					?>
							
						<!-- single service -->

							<div class="<?php echo $witr_gutter_column; ?> col-md-12 col-xs-12 col-sm-12 col-lg-12" >
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="em-service all_color_service text-<?php echo $witrshowdata['witr_text_ltc']; ?>">
									<div class="em_service_content <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
										<div class="em_single_service_text">
											<?php if($witrshowdata['witr_show_image']=='yes'){ ?>	
												<div class="service_top_image">
													<?php if(has_post_thumbnail()){?>
														<!-- image -->
														<?php the_post_thumbnail();?>
													<?php } ?>			
												</div>
											<?php } ?>
											<div class="text_box">
												<div class="service_top_text">
													<div class="em-service-icon all_icon_color">
														<!-- icon img -->
														<?php if($service_img_show=='icon_img_show'): ?>
															<?php if( $service_i_image): ?>
																<img src="<?php echo $service_i_image;?>" alt="logo" />
															<?php endif;?>
														<?php endif;?>
														<!-- icon -->
														<?php if($service_icon=='c_icon_show'): ?>
															<i class="<?php echo esc_html( $icon_text);?>"></i>
														<?php endif; ?>				
													</div>			
												</div>
												<div class="em-service-inner">
													<div class="em-service-title ">
														<!-- title -->
														<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>									
													</div>
													<!-- content -->
													<?php if($witrshowdata['witr_show_content']=='yes' ){ ?>
													<div class="em-service-desc">
														<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
													</div>
													<?php } ?>	
													<!-- button -->
													<?php if(! empty( $witrshowdata['witr_service_button'] )){?>	
														<div class="service-btn">
															<a class="read_clas" href="<?php the_permalink(); ?>"><?php echo $witrshowdata['witr_service_button']; ?> </a>
														</div>
													<?php } ?>																
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
				</div>
			<?php
				include('witr_service/witrsrvajs.php');				
			break;
			case '3':
			?>
				<div class="service_active">				
				<div class=" witr_carsv_<?php echo $unic_id;?>">				
					<?php while ($the_query->have_posts()) : $the_query->the_post(); 						
						$service_icon  = get_post_meta( get_the_ID(),'_txbdm_service_icon', true );
						$icon_text  = get_post_meta( get_the_ID(),'_txbdm_icon_text', true ); 
						$service_img_show  = get_post_meta( get_the_ID(),'_txbdm_service_icon_img', true ); 
						$service_i_image  = get_post_meta( get_the_ID(),'_txbdm_img_s', true ); 
					?>
							
						<!-- single service -->
							<div class="<?php echo $witr_gutter_column; ?> col-md-12 col-xs-12 col-sm-12 col-lg-12" >
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="all_color_service <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
									<div class="em-service2 sleft">
										<div class="em_service_content ">
											<div class="em_single_service_text">
												<?php if($witrshowdata['witr_show_image']=='yes'){ ?>	
													<div class="service_top_image">
														<?php if(has_post_thumbnail()){?>
															<!-- image -->
															<?php the_post_thumbnail();?>
														<?php } ?>			
													</div>
												<?php } ?>
												<div class="text_box witr_s_flex">
													<div class="service_top_text">
														<div class="em-service-icon all_icon_color">
															<!-- icon img -->
															<?php if($service_img_show=='icon_img_show'): ?>
																<?php if( $service_i_image): ?>
																	<img src="<?php echo $service_i_image;?>" alt="logo" />
																<?php endif;?>
															<?php endif;?>
															<!-- icon -->
															<?php if($service_icon=='c_icon_show'): ?>
																<i class="<?php echo esc_html( $icon_text);?>"></i>
															<?php endif; ?>				
														</div>			
													</div>
													<div class="em-service-inner">
														<div class="em-service-title ">
															<!-- title -->
															<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>									
														</div>
														<?php if($witrshowdata['witr_show_content']=='yes' ){ ?>
														<!-- content -->
														<div class="em-service-desc">
															<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
														</div>
														<?php } ?>	
														<!-- button -->
														<?php if(! empty( $witrshowdata['witr_service_button'] )){?>	
															<div class="service-btn">
																<a class="read_clas" href="<?php the_permalink(); ?>"><?php echo $witrshowdata['witr_service_button']; ?> </a>
															</div>
														<?php } ?>																	
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
				</div>
			<?php
				include('witr_service/witrsrvajs.php');				
			break;
			
			case '2':
        ?>
	
				<div class="service_active">				
				<div class=" witr_carsv_<?php echo $unic_id;?>">				
					<?php while ($the_query->have_posts()) : $the_query->the_post(); 						
						$service_icon  = get_post_meta( get_the_ID(),'_txbdm_service_icon', true );
						$icon_text  = get_post_meta( get_the_ID(),'_txbdm_icon_text', true ); 
						$service_img_show  = get_post_meta( get_the_ID(),'_txbdm_service_icon_img', true ); 
						$service_i_image  = get_post_meta( get_the_ID(),'_txbdm_img_s', true ); 
					?>
							
						<!-- single service -->
							<div class="<?php echo $witr_gutter_column; ?> col-md-12 col-xs-12 col-sm-12 col-lg-12" >
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="all_color_service <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
									<div class="em-service2 sright">
										<div class="em_service_content ">
											<div class="em_single_service_text">
												<?php if($witrshowdata['witr_show_image']=='yes'){ ?>	
													<div class="service_top_image">
														<?php if(has_post_thumbnail()){?>
															<!-- image -->
															<?php the_post_thumbnail();?>
														<?php } ?>			
													</div>
												<?php } ?>
												<div class="text_box witr_s_flex">
													<div class="service_top_text">
														<div class="em-service-icon all_icon_color">
															<!-- icon img -->
															<?php if($service_img_show=='icon_img_show'): ?>
																<?php if( $service_i_image): ?>
																	<img src="<?php echo $service_i_image;?>" alt="logo" />
																<?php endif;?>
															<?php endif;?>
															<!-- icon -->
															<?php if($service_icon=='c_icon_show'): ?>
																<i class="<?php echo esc_html( $icon_text);?>"></i>
															<?php endif; ?>				
														</div>			
													</div>
													<div class="em-service-inner">
														<div class="em-service-title ">
															<!-- title -->
															<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>									
														</div>
														
														<!-- content -->
														<?php if($witrshowdata['witr_show_content']=='yes' ){ ?>
														<div class="em-service-desc">
															<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
														</div>
														<?php } ?>	
														<!-- button -->
														<?php if(! empty( $witrshowdata['witr_service_button'] )){?>	
															<div class="service-btn">
																<a class="read_clas" href="<?php the_permalink(); ?>"><?php echo $witrshowdata['witr_service_button']; ?> </a>
															</div>
														<?php } ?>																	
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
				</div>
			<?php
				include('witr_service/witrsrvajs.php');				
			break;
			
			default:
        ?>

					
				<div class="service_active">
				<div class=" witr_carsv_<?php echo $unic_id;?>">
				
					<?php while ($the_query->have_posts()) : $the_query->the_post(); 						
						$service_icon  = get_post_meta( get_the_ID(),'_txbdm_service_icon', true );
						$icon_text  = get_post_meta( get_the_ID(),'_txbdm_icon_text', true ); 
						$service_img_show  = get_post_meta( get_the_ID(),'_txbdm_service_icon_img', true ); 
						$service_i_image  = get_post_meta( get_the_ID(),'_txbdm_img_s', true ); 
					?>
							
							<!-- single service -->
							<div class="<?php echo $witr_gutter_column; ?> col-md-12 col-xs-12 col-sm-12 col-lg-12" >
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="all_color_service text-<?php echo $witrshowdata['witr_text_ltc']; ?>" >
										<div class="service-item <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
											<?php if($witrshowdata['witr_show_image']=='yes'){ ?>	
												<div class="service_top_image">
													<?php if(has_post_thumbnail()){?>
														<!-- image -->
														<?php the_post_thumbnail();?>
													<?php } ?>			
												</div>
											<?php } ?>	
											<div class="text_box all_icon_color">
												<!-- icon img -->
												<?php if($service_img_show=='icon_img_show'): ?>
													<?php if( $service_i_image): ?>
														<img src="<?php echo $service_i_image;?>" alt="logo" />
													<?php endif;?>
												<?php endif;?>
												<!-- icon -->
												<?php if($service_icon=='c_icon_show'): ?>
													<i class="<?php echo esc_html( $icon_text);?>"></i>
												<?php endif; ?>
												<!-- title -->
												<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
												<?php if($witrshowdata['witr_show_content']=='yes' ){ ?>
												<!-- content -->
												<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
												<?php } ?>	
												<!-- button -->																							
												<?php if(! empty( $witrshowdata['witr_service_button'] )){?>	
													<div class="service-btn">
														<a class="read_clas" href="<?php the_permalink(); ?>"><?php echo $witrshowdata['witr_service_button']; ?> </a>
													</div>
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
				include('witr_service/witrsrvajs.php');	
			break;
			
		} 	
		
					


   
	} 


}