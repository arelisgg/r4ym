<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; /* Exit if accessed directly */

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_verticle_timeline extends Widget_Base {

    public function get_name() {
        return 'witr_verticletimeline_widget';
    }
    
    public function get_title() {
        return esc_html__( 'Verticle Timeline', 'themex' );
    }
	public function get_style_depends() {
        return [ 'verticletimeline' ];
    }
    public function get_icon() {
        return 'themex_icon eicon-time-line';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }	
	
	

    protected function register_controls() {

        $this->start_controls_section(
            'timeline_layout',
            [
                'label' => __( 'Verticle Timeline', 'themex' ),
            ]
        );

			/* witr_style_timeline */
			$this->add_control(
				'witr_style_timeline',
				[
					'label' => esc_html__( 'Layout style', 'themex' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'1' => esc_html__( 'Layout style 1', 'themex' ),
						'2' => esc_html__( 'Layout Blank', 'themex' ),
					],
					'default' => '1',
				]
			);			
  
        $this->end_controls_section();

        /* verticle_timeline_text */
        $this->start_controls_section(
            'verticle_timeline_text',
            [
                'label' => esc_html__( 'Content', 'themex' ),
            ]
        );

            $repeater = new Repeater();
			/* witr_show_icon witr_icon_item */
			$repeater->add_control(
				'witr_show_icon',
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
				'witr_icon_item',
				[
					'label' => esc_html__( 'Icon', 'themex' ),
					'type' => Controls_Manager::ICONS,
					'description' => esc_html__( 'Change icon here, For this, click on the library field And Not use Icon,Click On The Hide Option', 'themex' ),
					'default' => [
						'value' => 'icofont-star',
					],
					'condition' => [
						'witr_show_icon' => 'yes',
					],							
				]
			);
			$repeater->add_control(
				'witr_show_icon_img',
				[
					'label' => esc_html__( 'Show Icon Image', 'themex' ),
					'type' => Controls_Manager::SWITCHER,								
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'separator'=>'before',
					'return_value' => 'yes',
					'default' => 'no',							
				]
			);					
					$repeater->add_control(
						'witr_icon_image',
						[
							'label' => esc_html__( 'Choose Image', 'themex' ),
							'type' => Controls_Manager::MEDIA,
							'condition' => [
								'witr_show_icon_img' => 'yes',
							],							
						]
					);
				/* txbd_icon_image_size */
				$repeater->add_group_control(
					Group_Control_Image_Size::get_type(),
					[
						'name' => 'txbd_icon_image_size',
						'default' => 'large',
						'separator' => 'none',
						'condition' => [
							'witr_show_icon_img' => 'yes',
						]
					]
				);			
			
			
			$repeater->add_control(
				'witr_show_date',
				[
					'label' => esc_html__( 'Show Date', 'themex' ),
					'type' => Controls_Manager::SWITCHER,								
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'separator'=>'before',
					'return_value' => 'yes',
					'default' => 'no',							
				]
			);			
            $repeater->add_control(
                'vtimeline_date',
                [
                    'label'   => esc_html__( 'Date', 'themex' ),
                    'type'    => Controls_Manager::TEXT,
					'default' => __( '13 Sep<br/>2022', 'themex' ),
					'condition' => [
						'witr_show_date' => 'yes',
					]					
                ]
            );
			$repeater->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_allrep_background',
					'label' => esc_html__( ' Background', 'themex' ),
					'separator'=>'before',
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .txbd_vtimeline_content{{CURRENT_ITEM}}',						
				]
			);
			$repeater->add_control(
				'witr_allrep_left_color',
				[
					'label' => esc_html__( 'Arrow Left Color', 'themex' ),
					'type' => Controls_Manager::COLOR,					
					'selectors' => [
						'{{WRAPPER}} .txbd_vtimeline_content{{CURRENT_ITEM}}::before' => 'border-left-color: {{VALUE}}',
					],
				]
			);
			$repeater->add_control(
				'witr_allrep_right_color',
				[
					'label' => esc_html__( 'Arrow Right Color', 'themex' ),
					'type' => Controls_Manager::COLOR,					
					'selectors' => [
						'{{WRAPPER}} .vertical-reverse .txbd_vtimeline_content{{CURRENT_ITEM}}::before' => 'border-right-color: {{VALUE}}',
					],
				]
			);			
            $repeater->add_control(
                'vtimeline_title',
                [
                    'label'   => esc_html__( 'Title', 'themex' ),
                    'type'    => Controls_Manager::TEXT,
					'default' => esc_html__( 'Enter Your Title', 'themex' ),
					'separator'=>'before',
                ]
            );
			$repeater->add_control(
				'witr_vtimeline_title_link',
				[
					'label' => esc_html__( 'Title Link', 'themex' ),
					'type' => Controls_Manager::URL,
					'description' =>esc_html__('Insert Title link here.','themex'),
					'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
					'show_external' => true,								
				]
			);			
			/* vtimeline_text	*/
			$repeater->add_control(
				'vtimeline_text',
				[
					'label' => esc_html__( ' Content', 'themex' ),
					'type' => Controls_Manager::TEXTAREA,
					'description' => esc_html__( 'Not use content text, remove the text from field', 'themex' ),
					'separator'=>'before',
					'default' => esc_html__( 'Apparently we had reached a great height in the atmosphere, for the sky was a dead black, and the stars had ceased to twinkle.', 'themex' ),
					'placeholder' => esc_attr__( 'Type your content here', 'themex' ),
				]
			);

            $repeater->add_control(
                'vtimeline_title_one',
                [
                    'label'   => esc_html__( 'Sub Title One', 'themex' ),
                    'type'    => Controls_Manager::TEXT,
					'default' => esc_html__( 'Diploma in Technology', 'themex' ),
					'separator'=>'before',
                ]
            );
			/* vtimeline_text	*/
			$repeater->add_control(
				'vtimeline_text_one',
				[
					'label' => esc_html__( 'Sub Content One', 'themex' ),
					'type' => Controls_Manager::TEXTAREA,
					'description' => esc_html__( 'Not use content text, remove the text from field', 'themex' ),
					'default' => esc_html__( 'Photographer-intern 2021–2022', 'themex' ),
					'placeholder' => esc_attr__( 'Type your content here', 'themex' ),
				]
			);
            $repeater->add_control(
                'vtimeline_title_two',
                [
                    'label'   => esc_html__( 'Sub Title Two', 'themex' ),
                    'type'    => Controls_Manager::TEXT,
					'default' => esc_html__( 'Professional Web Design', 'themex' ),
					'separator'=>'before',
                ]
            );
			/* vtimeline_text	*/
			$repeater->add_control(
				'vtimeline_text_two',
				[
					'label' => esc_html__( 'Sub Content Two', 'themex' ),
					'type' => Controls_Manager::TEXTAREA,
					'description' => esc_html__( 'Not use content text, remove the text from field', 'themex' ),
					'default' => esc_html__( 'Photographer-retoucher 2017–Present', 'themex' ),
					'placeholder' => esc_attr__( 'Type your content here', 'themex' ),
				]
			);
			
            $this->add_control(
                'txbd_vtimeline_list',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'fields'  => $repeater->get_controls(),
                    'default' => [
                        [
                            'vtimeline_date' => __( 'Sep<br/>2022', 'themex' ),
                            'vtimeline_title' => esc_html__( 'Enter Your Title', 'themex' ),
                            'vtimeline_text' => esc_html__( 'Apparently we had reached a great height in the atmosphere, for the sky was a dead black, and the stars had ceased to twinkle.', 'themex' ),
                        ],

                    ],
                    'title_field' => '{{{ vtimeline_title }}}',
                ]
            );

        $this->end_controls_section();
		
	   /*===========================================================================================
										START TO STYLE
		=============================================================================================*/			
				


		/*=== start single Feature style 7,12====*/
		$this->start_controls_section(
			'witr_style_ss_option',
			[
				'label' => esc_html__( 'Single Box', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]
		);		
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_single_bb',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .txbd_vtimeline_content',
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
							'{{WRAPPER}} .txbd_vtimeline_content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'selector' => '{{WRAPPER}} .txbd_vtimeline_content',						
					]
				);
				$this->add_control(
					'witr_border_left_color',
					[
						'label' => esc_html__( 'Arrow Left Color', 'themex' ),
						'type' => Controls_Manager::COLOR,					
						'selectors' => [
							'{{WRAPPER}} .txbd_vtimeline_content::before' => 'border-left-color: {{VALUE}}',
						],
					]
				);
				$this->add_control(
					'witr_border_right_color',
					[
						'label' => esc_html__( 'Arrow Right Color', 'themex' ),
						'type' => Controls_Manager::COLOR,					
						'selectors' => [
							'{{WRAPPER}} .vertical-reverse .txbd_vtimeline_content::before' => 'border-right-color: {{VALUE}}',
						],
					]
				);				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadowsbox',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .txbd_vtimeline_content',
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
							'{{WRAPPER}} .txbd_vtimeline_content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .txbd_vtimeline_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		
			$this->end_controls_section();
			/* === end single Feature ===  */





				
		/*=== start witr_title style ====*/
		$this->start_controls_section(
			'witr_style_option',
			[
				'label' => esc_html__( ' Title Color Option', 'themex' ),
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
						'{{WRAPPER}} .txbd_vtimeline_text h2,{{WRAPPER}} .txbd_vtimeline_text h2 a' => 'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
				'witr_thover_color',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,					
					'selectors' => [
						'{{WRAPPER}} .txbd_vtimeline_text h2:hover,{{WRAPPER}} .txbd_vtimeline_text h2 a:hover' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .txbd_vtimeline_text h2,{{WRAPPER}} .txbd_vtimeline_text h2 a',
				]
			);						
			/*  title background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_titlebg_iconc',
					'label' => esc_html__( ' Background', 'themex' ),
					'types' => [ 'classic', 'gradient'],
					'selector' => '{{WRAPPER}} .txbd_vtimeline_text h2,{{WRAPPER}} .txbd_vtimeline_text h2 a',
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
							'{{WRAPPER}} .txbd_vtimeline_text h2,{{WRAPPER}} .txbd_vtimeline_text h2 a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);			
			/* margin */
			$this->add_responsive_control(
				'witr_sectionmargin',
				[
					'label' => esc_html__( ' Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .txbd_vtimeline_text h2,{{WRAPPER}} .txbd_vtimeline_text h2 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* padding */
			$this->add_responsive_control(
				'witr_sectionpadding',
				[
					'label' => esc_html__( ' Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'separator'=>'before',
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .txbd_vtimeline_text h2,{{WRAPPER}} .txbd_vtimeline_text h2 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  w_title style ====*/	


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
					'global' => [
						'default' => Global_Colors::COLOR_TEXT,
					],					
					'separator'=>'before',					
					'selectors' => [
						'{{WRAPPER}} .txbd_vtimeline_text p' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .txbd_vtimeline_text p',
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
						'{{WRAPPER}} .txbd_vtimeline_text p' => 'width: {{SIZE}}{{UNIT}};',
					],
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
							'{{WRAPPER}} .txbd_vtimeline_text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		
			/* margin */
			$this->add_responsive_control(
				'content_padding',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .txbd_vtimeline_text p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr content style ====*/
		
		/*=== start Sub title style ====*/
		$this->start_controls_section(
			'witr_style_option2',
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
						'default' => Global_Colors::COLOR_PRIMARY,
					],					
					'selectors' => [
						'{{WRAPPER}} .txbd_vtimeline_text_one h3,{{WRAPPER}} .txbd_vtimeline_text_two h3' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .txbd_vtimeline_text_one h3,{{WRAPPER}} .txbd_vtimeline_text_two h3',
				]
			);			
			/* margin */
			$this->add_responsive_control(
				'witr_sectionmargin2',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .txbd_vtimeline_text_one h3,{{WRAPPER}} .txbd_vtimeline_text_two h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* padding */
			$this->add_responsive_control(
				'witr_sectionpadding2',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .txbd_vtimeline_text_one h3,{{WRAPPER}} .txbd_vtimeline_text_two h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  w_title style 2 ====*/		
		
		/*=== start witr_sub_content ====*/
		$this->start_controls_section(
			'witr_sub_content',
			[
				'label' => esc_html__( 'Sub Content Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
			/* color */
			$this->add_control(
				'witr_sub_content_color',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_TEXT,
					],					
					'separator'=>'before',					
					'selectors' => [
						'{{WRAPPER}} .txbd_vtimeline_text_one p,{{WRAPPER}} .txbd_vtimeline_text_two p' => 'color: {{VALUE}}',
					],
				]
			);

			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_sub_content_typography',
					'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_TEXT,
					],
					'selector' => '{{WRAPPER}} .txbd_vtimeline_text_one p,{{WRAPPER}} .txbd_vtimeline_text_two p',
				]
			);			

			/*  content width */
			$this->add_responsive_control(
				'witr_sub_content_width',
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
						'{{WRAPPER}} .txbd_vtimeline_text_one p,{{WRAPPER}} .txbd_vtimeline_text_two p' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
				/* content margin */
				$this->add_responsive_control(
					'witr_sub_content_margin',
					[
						'label' => esc_html__( 'Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .txbd_vtimeline_text_one p,{{WRAPPER}} .txbd_vtimeline_text_two p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		
			/* margin */
			$this->add_responsive_control(
				'sub_content_padding',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .txbd_vtimeline_text_one p,{{WRAPPER}} .txbd_vtimeline_text_two p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr content style ====*/


		
		/*=== start witr_icon style ====*/
		$this->start_controls_section(
			'witr_style_icon_option',
			[
				'label' => esc_html__( 'Icon/Image/Date/Bar Color Option', 'themex' ),
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
						'label' => esc_html__( ' Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_vtimeline_icon span' => 'color: {{VALUE}}',
						],					
					]
				);				
				/* Icon background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_icons_background',
						'label' => esc_html__( ' Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_vtimeline_icon span,{{WRAPPER}} .txbd_vtimeline_icon img',
					]
				);
				
				/*  icon font size */
				$this->add_responsive_control(
					'icon_size',
					[
						'label' => esc_html__( 'Icon Size', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_vtimeline_icon img' => 'font-size: {{SIZE}}{{UNIT}};',
						],						
					]
				);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_date_typography',
					'label' => esc_html__( 'Date Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
					],					
					'selector' => '{{WRAPPER}} .txbd_vtimeline_icon span',
				]
			);				
				/*  icon width */
				$this->add_responsive_control(
					'witr_icon_width',
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
							'{{WRAPPER}} .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_vtimeline_icon span,{{WRAPPER}} .txbd_vtimeline_icon img' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon height */
				$this->add_responsive_control(
					'witr_icon_height',
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
							'{{WRAPPER}} .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_vtimeline_icon span,{{WRAPPER}} .txbd_vtimeline_icon img' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon line height */
				$this->add_responsive_control(
					'witr_icon_line_height',
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
							'{{WRAPPER}} .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_vtimeline_icon span,{{WRAPPER}} .txbd_vtimeline_icon img' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/* witr_text_align */					
				$this->add_responsive_control(
					'witr_text_align',
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
							'{{WRAPPER}} .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_vtimeline_icon span,{{WRAPPER}} .txbd_vtimeline_icon img' => 'text-align: {{VALUE}}',
						],
					]
				);				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_borderf',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_vtimeline_icon span,{{WRAPPER}} .txbd_vtimeline_icon img',
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
							'{{WRAPPER}} .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_vtimeline_icon span,{{WRAPPER}} .txbd_vtimeline_icon img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
					
				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_vtimeline_icon span,{{WRAPPER}} .txbd_vtimeline_icon img',
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
							'{{WRAPPER}} .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_vtimeline_icon span,{{WRAPPER}} .txbd_vtimeline_icon img' => 'transform: rotate({{SIZE}}{{UNIT}});',
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
							'{{WRAPPER}} .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_vtimeline_icon span,{{WRAPPER}} .txbd_vtimeline_icon img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_vtimeline_icon span,{{WRAPPER}} .txbd_vtimeline_icon img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'label' => esc_html__( ' Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .txbd_single_vtimeline:hover .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_single_vtimeline:hover .txbd_vtimeline_icon span' => 'color: {{VALUE}}',
							],
						]
					);
					/* hover Icon background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_hover_icon',
							'label' => esc_html__( ' Background', 'themex' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .txbd_single_vtimeline:hover .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_single_vtimeline:hover .txbd_vtimeline_icon span,{{WRAPPER}} .txbd_single_vtimeline:hover::before,{{WRAPPER}} .txbd_single_vtimeline:hover .txbd_vtimeline_icon img',
						]
					);
					/* border_hover_color */
					$this->add_control(
						'witr_border_hover_color',
						[
							'label' => esc_html__( 'Border Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							
							'selectors' => [
								'{{WRAPPER}} .txbd_vtimeline_icon i:hover,{{WRAPPER}} .txbd_vtimeline_icon span:hover' => 'border-color: {{VALUE}}',
							],
						]
					);
    				$this->add_group_control(
    					Group_Control_Css_Filter::get_type(),
    					[
    						'name' => 'css_filters',
    						'selector' => '{{WRAPPER}} .txbd_vtimeline_icon img:hover',
    					]
    				);
					

					$this->end_controls_tab();
					/*=== end icon hover style ====*/

					/*=== start icon hover style ====*/
					$this->start_controls_tab(
						'witr_bar_colors_hover',
						[
							'label' => esc_html__( 'Bar ', 'themex' ),
						]
					);
					/*  witr_bar_height */
					$this->add_responsive_control(
						'witr_bar_height',
						[
							'label' => esc_html__( ' Height', 'themex' ),
							'type' => Controls_Manager::SLIDER,
							'separator'=>'before',
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .txbd_single_vtimeline::before' => 'width: {{SIZE}}{{UNIT}};',
							],
						]
					);
    					/* hover Icon background */
    					$this->add_group_control(
    						Group_Control_Background::get_type(),
    						[
    							'name' => 'witr_bar_icon',
    							'label' => esc_html__( ' Background', 'themex' ),
    							'types' => [ 'classic', 'gradient'],
    							'selector' => '{{WRAPPER}} .txbd_single_vtimeline::before',
    						]
    					);

					

					$this->end_controls_tab();
					/*=== end icon hover style ====*/

					
					
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/
		$this->end_controls_section();
		/*=== end witr_icon style ====*/


		/*=== start Text Box style ====*/
		$this->start_controls_section(
			'section_all_text',
			[
				'label' => esc_html__( ' All Text Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]
		);
			$this->start_controls_tabs( 'all_colors' );
				$this->start_controls_tab(
					'witr_all_colort',
					[
						'label' => esc_html__( 'Normal', 'themex' ),
					]
				);		
					/* witr_all_hover_color */
					$this->add_control(
						'witr_all_color',
						[
							'label' => esc_html__( ' Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							'selectors' => [
								'{{WRAPPER}} .txbd_vtimeline_text h2,{{WRAPPER}} .txbd_vtimeline_text h2 a,{{WRAPPER}} .txbd_vtimeline_text p,{{WRAPPER}} .txbd_vtimeline_text_one h3,{{WRAPPER}} .txbd_vtimeline_text_two h3,{{WRAPPER}} .txbd_vtimeline_text_one p,{{WRAPPER}} .txbd_vtimeline_text_two p,{{WRAPPER}} .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_vtimeline_icon span' => 'color: {{VALUE}}',
							],
						]
					);
					/* box background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_all_background',
							'label' => esc_html__( ' Background', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .txbd_vtimeline_content,{{WRAPPER}} .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_vtimeline_icon span',						
						]
					);
					$this->add_control(
						'witr_all_left_color',
						[
							'label' => esc_html__( 'Arrow Left Color', 'themex' ),
							'type' => Controls_Manager::COLOR,					
							'selectors' => [
								'{{WRAPPER}} .txbd_vtimeline_content::before' => 'border-left-color: {{VALUE}}',
							],
						]
					);
					$this->add_control(
						'witr_all_right_color',
						[
							'label' => esc_html__( 'Arrow Right Color', 'themex' ),
							'type' => Controls_Manager::COLOR,					
							'selectors' => [
								'{{WRAPPER}} .vertical-reverse .txbd_vtimeline_content::before' => 'border-right-color: {{VALUE}}',
							],
						]
					);					
	
				$this->end_controls_tab();
				/*=== end icon normal style ====*/
			
					/*=== start icon hover style ====*/
					$this->start_controls_tab(
						'witr_all_colors_hover',
						[
							'label' => esc_html__( ' Hover', 'themex' ),
						]
					);

					/* witr_all_hover_color */
					$this->add_control(
						'witr_all_hover_color',
						[
							'label' => esc_html__( ' Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							'selectors' => [
								'{{WRAPPER}} .txbd_single_vtimeline:hover .txbd_vtimeline_text h2,{{WRAPPER}} .txbd_single_vtimeline:hover .txbd_vtimeline_text h2 a,{{WRAPPER}} .txbd_single_vtimeline:hover .txbd_vtimeline_text p,{{WRAPPER}} .txbd_single_vtimeline:hover .txbd_vtimeline_text_one h3,{{WRAPPER}} .txbd_single_vtimeline:hover .txbd_vtimeline_text_two h3,{{WRAPPER}} .txbd_single_vtimeline:hover .txbd_vtimeline_text_one p,{{WRAPPER}} .txbd_single_vtimeline:hover .txbd_vtimeline_text_two p,{{WRAPPER}} .txbd_single_vtimeline:hover .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_single_vtimeline:hover .txbd_vtimeline_icon span' => 'color: {{VALUE}}',
							],
						]
					);
					
					/* box background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_allh_background',
							'label' => esc_html__( ' Background', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .txbd_single_vtimeline:hover .txbd_vtimeline_content,{{WRAPPER}} .txbd_single_vtimeline:hover .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_single_vtimeline:hover .txbd_vtimeline_icon span,{{WRAPPER}} .txbd_single_vtimeline:hover::before,{{WRAPPER}} .txbd_single_vtimeline:hover .txbd_vtimeline_icon img',						
						]
					);
					$this->add_control(
						'witr_allh_left_color',
						[
							'label' => esc_html__( 'Arrow Left Color', 'themex' ),
							'type' => Controls_Manager::COLOR,					
							'selectors' => [
								'{{WRAPPER}} .txbd_single_vtimeline:hover .txbd_vtimeline_content::before' => 'border-left-color: {{VALUE}}',
							],
						]
					);
					$this->add_control(
						'witr_allh_right_color',
						[
							'label' => esc_html__( 'Arrow Right Color', 'themex' ),
							'type' => Controls_Manager::COLOR,					
							'selectors' => [
								'{{WRAPPER}} .vertical-reverse.txbd_single_vtimeline:hover .txbd_vtimeline_content::before' => 'border-right-color: {{VALUE}}',
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
								'{{WRAPPER}} .txbd_vtimeline_text h2,{{WRAPPER}} .txbd_vtimeline_text h2 a,{{WRAPPER}} .txbd_vtimeline_text p,{{WRAPPER}} .txbd_vtimeline_text_one h3,{{WRAPPER}} .txbd_vtimeline_text_two h3,{{WRAPPER}} .txbd_vtimeline_text_one p,{{WRAPPER}} .txbd_vtimeline_text_two p,{{WRAPPER}} .txbd_vtimeline_content,{{WRAPPER}} .txbd_vtimeline_icon i,{{WRAPPER}} .txbd_vtimeline_icon span' => 'transition: {{SIZE}}s',
							],
						]
					);					

				$this->end_controls_tab();
				/*=== end icon normal style ====*/					
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/		
			$this->end_controls_section();
		/*=== start Single Box style ====*/	






		

    }

    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();
	
		switch ( $witrshowdata['witr_style_timeline'] ) {			
			case '2':						
			?>
		
			<?php
			break;
			
			default:
			?>			

				<div class="txbd_verctimeline_wrapper">
					<?php

					$itemi=0;

					if( ! empty($witrshowdata['txbd_vtimeline_list'])){	
					foreach($witrshowdata['txbd_vtimeline_list'] as $txbd_vtimeline){
						$itemi++;
					$target = ! empty($txbd_vtimeline['witr_vtimeline_title_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow = ! empty($txbd_vtimeline['witr_vtimeline_title_link']['nofollow']) ? ' rel="nofollow"' : '';
					$txbd_icon_image = ! empty($txbd_vtimeline['witr_icon_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $txbd_vtimeline, 'txbd_icon_image_size', 'witr_icon_image' ) : '';					
					?>				
					<?php if( $itemi%2 == 0 ){?>
					 
				    <div class="txbd_single_vtimeline vertical-reverse txbd_verticle_style_<?php echo $witrshowdata['witr_style_timeline']; ?>">
					    <div class="txbd_vtimeline_content_box">
							<div class=" txbd_vtimeline_icon">
								<!-- icon -->
								<?php if( ! empty($txbd_vtimeline['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $txbd_vtimeline['witr_icon_item']['value']);?>"></i>
								<?php } ?>
								<?php echo $txbd_icon_image; ?>	
									<?php if( ! empty($txbd_vtimeline['vtimeline_date'])){?>
										<span><?php echo $txbd_vtimeline['vtimeline_date']; ?></span>
									<?php } ?>															
							</div>						
							<div class="txbd_vtimeline_content elementor-repeater-item-<?php echo $txbd_vtimeline['_id']; ?>">
								<div class="txbd_vtimeline_text">
									<!-- title -->
									<?php if( ! empty($txbd_vtimeline['vtimeline_title'])){?>
									<?php if($txbd_vtimeline['witr_vtimeline_title_link'] ['url']){?> 
										<h2><a href="<?php echo $txbd_vtimeline['witr_vtimeline_title_link']['url'];?>"<?php echo $target,$nofollow?>><?php echo $txbd_vtimeline['vtimeline_title']; ?></a></h2>
									<?php }else{ ?>
									<h2><?php echo $txbd_vtimeline['vtimeline_title']; ?> </h2>
									<?php }	?>
									<?php } ?>								
									<?php if( ! empty($txbd_vtimeline['vtimeline_text'])){?>
										<p><?php echo $txbd_vtimeline['vtimeline_text']; ?> </p>		
									<?php } ?>
								</div>
								<div class="txbd_vtimeline_text_one">
									<?php if( ! empty($txbd_vtimeline['vtimeline_title_one'])){?>
										<h3><?php echo $txbd_vtimeline['vtimeline_title_one']; ?></h3>
									<?php } ?>
									<?php if( ! empty($txbd_vtimeline['vtimeline_text_one'])){?>
										<p><?php echo $txbd_vtimeline['vtimeline_text_one']; ?></p>
									<?php } ?>
								</div>
								<div class="txbd_vtimeline_text_two">
									<?php if( ! empty($txbd_vtimeline['vtimeline_title_two'])){?>
										<h3><?php echo $txbd_vtimeline['vtimeline_title_two']; ?></h3>
									<?php } ?>
									<?php if( ! empty($txbd_vtimeline['vtimeline_text_two'])){?>
										<p><?php echo $txbd_vtimeline['vtimeline_text_two']; ?></p>
									<?php } ?>								
								</div>
								
							</div>
					    </div>	
				    </div>
					 
					<?php }else{ ?>
				    <div class="txbd_single_vtimeline txbd_verticle_style_<?php echo $witrshowdata['witr_style_timeline']; ?>">
					    <div class="txbd_vtimeline_content_box">
							<div class=" txbd_vtimeline_icon">
								<!-- icon -->
								<?php if( ! empty($txbd_vtimeline['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $txbd_vtimeline['witr_icon_item']['value']);?>"></i>
								<?php } ?>
								<?php echo $txbd_icon_image; ?>
								<?php if( ! empty($txbd_vtimeline['vtimeline_date'])){?>
									<span><?php echo $txbd_vtimeline['vtimeline_date']; ?></span>
								<?php } ?>									
							</div>						
							<div class="txbd_vtimeline_content elementor-repeater-item-<?php echo $txbd_vtimeline['_id']; ?>">
								<div class="txbd_vtimeline_text">
									<!-- title -->
									<?php if( ! empty($txbd_vtimeline['vtimeline_title'])){?>
									<?php if($txbd_vtimeline['witr_vtimeline_title_link'] ['url']){?> 
										<h2><a href="<?php echo $txbd_vtimeline['witr_vtimeline_title_link']['url'];?>"<?php echo $target,$nofollow?>><?php echo $txbd_vtimeline['vtimeline_title']; ?></a></h2>
									<?php }else{ ?>
									<h2><?php echo $txbd_vtimeline['vtimeline_title']; ?> </h2>
									<?php }	?>
									<?php } ?>								
									<?php if( ! empty($txbd_vtimeline['vtimeline_text'])){?>
										<p><?php echo $txbd_vtimeline['vtimeline_text']; ?> </p>		
									<?php } ?>
								</div>
								<div class="txbd_vtimeline_text_one">
									<?php if( ! empty($txbd_vtimeline['vtimeline_title_one'])){?>
										<h3><?php echo $txbd_vtimeline['vtimeline_title_one']; ?></h3>
									<?php } ?>
									<?php if( ! empty($txbd_vtimeline['vtimeline_text_one'])){?>
										<p><?php echo $txbd_vtimeline['vtimeline_text_one']; ?></p>
									<?php } ?>
								</div>
								<div class="txbd_vtimeline_text_two">
									<?php if( ! empty($txbd_vtimeline['vtimeline_title_two'])){?>
										<h3><?php echo $txbd_vtimeline['vtimeline_title_two']; ?></h3>
									<?php } ?>
									<?php if( ! empty($txbd_vtimeline['vtimeline_text_two'])){?>
										<p><?php echo $txbd_vtimeline['vtimeline_text_two']; ?></p>
									<?php } ?>								
								</div>
								
							</div>
					    </div>	
				    </div>
					 
					<?php } } } ?>				   
				   
				   

				</div>
	
			<?php	
			break;						
			
		}/* switch end */
		
		
		

    }

}