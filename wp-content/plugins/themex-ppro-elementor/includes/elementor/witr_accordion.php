<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Accordion extends Widget_Base {

    public function get_name() {
        return 'witr_ac_cl';
    }

    public function get_title() {
        return esc_html__( ' Accordion', 'themex' );
    }
	public function get_style_depends(){
		return ['waccod'];
	}
    public function get_icon() {
        return 'themex_icon eicon-accordion';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'accordion_content',
            [
                'label' => esc_html__( ' Accordion', 'themex' ),
            ]
        );
			 $repeater = new Repeater();
			 
                    $repeater->add_control(
                        'accordion_title',
                        [
                            'label'       => esc_html__( 'Title', 'themex' ),
                            'type'        => Controls_Manager::TEXT,
                            'default'     => esc_html__( 'Accordion Title' , 'themex' ),
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
                        ]
                    );
					 $repeater->add_control(
                        'witr_template_link',
                        [
                            'label'   => esc_html__( 'Select Conten Source', 'themex' ),
                            'type'    => Controls_Manager::SELECT,
                            'default' => 'custom',
                            'options' => [
                                'custom'    => esc_html__( 'Custom', 'themex' ),
                                "elementor" => esc_html__( 'Elementor Template', 'themex' ),
                            ],
                        ]
                    );
					 $repeater->add_control(
                        'accordion_content',
                        [
                            'label'      => esc_html__( 'Accordion Content', 'themex' ),
                            'type'       => Controls_Manager::WYSIWYG,
                            'default'    => esc_html__( 'Accordion Content', 'themex' ),
                            'condition' => [
                                'witr_template_link' =>'custom',
                            ],
                        ]
                    );
					 $repeater->add_control(
                        'template_id',
                        [
                            'label'       => esc_html__( 'Accordion Template', 'themex' ),
                            'type'        => Controls_Manager::SELECT,
                            'default'     => '0',
                            'options'     => twr_html_template_at(),
                            'condition'   => [
                                'witr_template_link' => "elementor"
                            ],
                        ]
                    );
					 $repeater->add_control(
                        'accordion_class',
                        [
                            'label'       => esc_html__( 'Select Open Item', 'themex' ),
							'description' => esc_html__( ' whice item you want to open, for this Add class "active show" above field,. ', 'themex' ),
                            'type'        => Controls_Manager::TEXT,
                            'default'     => esc_html__( ' ' , 'themex' ),
                        ]
                    );
							
			 

             /* Accordion One Repeater */
            $this->add_control(
                'txbd_accordion_list',
                [
                    'label' => esc_html__( 'Witr Accordion Items', 'themex' ),
                    'type' => Controls_Manager::REPEATER,
					'fields'  => $repeater->get_controls(),
                    'default' => [
                        [
                            'accordion_title'   => esc_html__('Accordion Title One','themex'),
                            'accordion_content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ad minim veniam, quis nostrud exercitation.','themex'),
                        ],
                        [
                            'accordion_title'   => esc_html__('Accordion Title Two','themex'),
                            'accordion_content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ad minim veniam, quis nostrud exercitation.','themex'),
                        ],
                        [
                            'accordion_title'   => esc_html__('Accordion Title Three','themex'),
                            'accordion_content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ad minim veniam, quis nostrud exercitation.','themex'),
                        ],
                    ],

                    'title_field' => '{{{ accordion_title }}}',
                ]
            );
            $this->add_control(
                'witr_accordion_uniq',
                [
                    'label' => esc_html__( 'Accourdion Unique Id', 'themex' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__( 'accordion', 'themex' ),
                    
                ]
            );			

        $this->end_controls_section();

		
		
		
	   /*===========================================================================================
										START TO STYLE
		=============================================================================================*/		
		
		
        
        /* Style tab section */
        $this->start_controls_section(
            'txbbd_button_style_section',
            [
                'label' => esc_html__( 'Witr Accordion Item', 'themex' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );								
			/* title_border */
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'accohrdfdg_border',
					'label' => esc_html__( 'Border', 'themex' ),
					'selector' => '{{WRAPPER}} .accordion_area .card-2',
				]
			);
			/* title_border_radius */
			$this->add_responsive_control(
				'accordion_tihtle_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'selectors' => [
						'{{WRAPPER}} .accordion_area .card-2' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
					],
				]
			);
			/* Icon background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_boxb_background',
					'label' => esc_html__( 'Icon Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .accordion_area .card-2',
				]
			);			
			/* box shadow color */	
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'witr_boxa_shadow',
					'label' => esc_html__( 'Box Shadow', 'themex' ),
					'selector' => '{{WRAPPER}} .accordion_area .card-2',
				]
			);		
            $this->add_control(
                'accordion_item_spacing',
                [
                    'label' => esc_html__( 'Witr Accordion Item Spacing', 'themex' ),
                    'type'  => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 150,
                        ],
                    ],
                    'default' => [
                        'size' => 15,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .accordion_area .card-2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        
        $this->start_controls_section(
            'themex_accordion_title_style',
            [
                'label'     => esc_html__( 'Witr Accordion Title', 'themex' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs('themex_accordion_title_style_tabs');

                
                $this->start_controls_tab(
                    'accordion_title_style_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', 'themex' ),
                    ]
                );
					/* witr_titlealign */
                    $this->add_responsive_control(
                        'witr_titlealign',
                        [
                            'label'   => esc_html__( 'Alignment', 'themex' ),
                            'type'    => Controls_Manager::CHOOSE,
                            'options' => [
                                'left'    => [
                                    'title' => esc_html__( 'Left', 'themex' ),
                                    'icon'  => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'themex' ),
                                    'icon'  => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'themex' ),
                                    'icon'  => 'fa fa-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .witr_ac_style'   => 'text-align: {{VALUE}};',
                            ],
                        ]
                    );
					/* witr_title color */
                    $this->add_control(
                        'accordion_title_color',
                        [
                            'label'     => esc_html__( 'Title Color', 'themex' ),
                            'type'      => Controls_Manager::COLOR,
							'global' => [
								'default' => Global_Colors::COLOR_PRIMARY,
							],							
                            'selectors' => [
                                '{{WRAPPER}}{{CURRENT_ITEM}} .witr_ac_style' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
					/* witr_typography */
                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'title_typography',
                            'label' => esc_html__( 'Typography', 'themex' ),
							'global' => [
								'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
							],
                            'selector' => '{{WRAPPER}} .witr_ac_style,{{WRAPPER}} .witr_ac_style::before',
                           
                        ]
                    );
					/* witr_background */
                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'background',
                            'label' => esc_html__( 'Background', 'themex' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .witr_ac_style',
                        ]
                    );
					/* accordion_title_padding */
                    $this->add_responsive_control(
                        'accordion_title_padding',
                        [
                            'label' => esc_html__( 'Title Padding', 'themex' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .witr_ac_style' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            
                        ]
                    );
					
					
					/* witr_heading_Color_Style */
                    $this->add_control(
                        'acco_heading_hover_color',
                        [
                            'label'     => esc_html__( 'Hover Color Style', 'themex' ),
                            'type'      => Controls_Manager::HEADING,
							'separator' => 'before',
                        ]
                    );
					
					/* witr_title_hover_color */
                    $this->add_control(
                        'accordion_title_hover_color',
                        [
                            'label'     => esc_html__( 'Title Hover Color', 'themex' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .witr_ac_style:hover' => 'color: {{VALUE}};',
                            ],
						
                        ]
                    );					
					
					/* witr_background_hover */
                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'background_hover',
                            'label' => esc_html__( 'Background Hover', 'themex' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .witr_ac_style:hover',
                        ]
                    );					
					
					/* title_border */
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'accordion_title_border',
                            'label' => esc_html__( 'Border', 'themex' ),
                            'selector' => '{{WRAPPER}} .witr_ac_style',
							'separator' => 'before',
                        ]
                    );
					/* title_border_radius */
                    $this->add_responsive_control(
                        'accordion_title_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'themex' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .witr_ac_style' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );
					/* title_box_shadow */
                    $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                            'name' => 'title_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themex' ),
                            'selector' => '{{WRAPPER}} .witr_ac_style',
                        ]
                    );



                $this->end_controls_tab(); 

              
                $this->start_controls_tab(
                    'accordion_title_style_active_tab',
                    [
                        'label' => esc_html__( 'Active', 'themex' ),
                    ]
                );
					/* Text Color */
                    $this->add_control(
                        'accordion_title_active_color',
                        [
                            'label'     => esc_html__( 'Text Color', 'themex' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .active .witr_ac_style' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
					/* activebackground */
                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'activebackground',
                            'label' => esc_html__( 'Background', 'themex' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .active .witr_ac_style',
                        ]
                    );
					
					/* Border */
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'accordion_title_active_border',
                            'label' => esc_html__( 'Border', 'themex' ),
                            'selector' => '{{WRAPPER}} .active .witr_ac_style',
                        ]
                    );
					/* Border Radius */
                    $this->add_responsive_control(
                        'accordion_title_active_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'themex' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .active .witr_ac_style' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );
					/* active_box_shadow */
                    $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                            'name' => 'title_active_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themex' ),
                            'selector' => '{{WRAPPER}} .active .witr_ac_style',
                            'separator' => 'before',
                        ]
                    );
					/* Background Transparent 
					$this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'activenonebackground',
                            'label' => esc_html__( 'Backgroundnone', 'themex' ),
                            'types' => [ 'classic', 'gradient' ],
							'description' => esc_html__( 'Active Transparent', 'themex' ),
                            'selector' => '{{WRAPPER}} .active .witr_ac_style',
                        ]
                    );*/					
					

                $this->end_controls_tab(); 

            $this->end_controls_tabs();
           
        $this->end_controls_section(); 


        
       
        $this->start_controls_section(
            'themex_accordion_icon_style',
            [
                'label'     => esc_html__( 'Witr Accordion Icon', 'themex' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );




			$this->add_control(
				'accordion_icon_color',
				[
					'label'     => esc_html__( 'Color', 'themex' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .witr_ac_card i' => 'color: {{VALUE}};',
					],
					'separator' => 'before',
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'accordion_icon_border',
					'label' => esc_html__( 'Border', 'themex' ),
					'selector' => '{{WRAPPER}} .witr_ac_card i',
				]
			);

			$this->add_responsive_control(
				'accordion_icon_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'selectors' => [
						'{{WRAPPER}} .witr_ac_card i' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'iconbackground',
					'label' => esc_html__( 'Background', 'themex' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .witr_ac_card i',
				]
			);
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'icon_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'themex' ),
					'selector' => '{{WRAPPER}} .witr_ac_card i',
				]
			);



			$this->add_responsive_control(
				'accordion_icon_width',
				[
					'label' => esc_html__( 'Icon Width', 'themex' ),
					'type'  => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .witr_ac_card i' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			
			$this->add_responsive_control(
				'accordion_icon_height',
				[
					'label' => esc_html__( 'Icon height', 'themex' ),
					'type'  => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .witr_ac_card i' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);
			
			
			$this->add_responsive_control(
				'accordion_icon_lineheight',
				[
					'label' => esc_html__( 'Icon Line Height', 'themex' ),
					'type'  => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .witr_ac_card i' => 'line-height: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .witr_ac_card i' => 'text-align: {{VALUE}}',
					],
				]
			);
	
			/* accordion_iconn_margin */
			$this->add_responsive_control(
				'accordion_iconn_margin',
				[
					'label' => esc_html__( 'Icon Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_ac_card i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					
				]
			);			
			
			
				
        $this->end_controls_section();
		/* controls_section end */


        /* Content style tab start */
        $this->start_controls_section(
            'themex_accordion_content_style',
            [
                'label' => esc_html__( 'Witr Accordion Content', 'themex' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


				/* Color */
            $this->add_control(
                'accordion_content_color',
                [
                    'label' => esc_html__( 'Color', 'themex' ),
                    'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_TEXT,
					],					
                    'selectors' => [
                        '{{WRAPPER}} .card-2 ul li,{{WRAPPER}} .card-2 p' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );
			/* Typography */
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_TEXT,
					],
                    'selector' => '{{WRAPPER}} .card-2 ul li,{{WRAPPER}} .card-2 p',
                ]
            );
			/* Background */
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'contentbackground',
                    'label' => esc_html__( 'Background', 'themex' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .card-2 p',
                ]
            );
            /* Border */
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'accordion_content_border',
                    'label' => esc_html__( 'Border', 'themex' ),
                    'selector' => '{{WRAPPER}} .card-2 p',
                ]
            );			
			/* Radius */
            $this->add_responsive_control(
                'accordion_content_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'themex' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .card-2 p' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );			
			/* Padding */
            $this->add_responsive_control(
                'accordion_content_padding',
                [
                    'label' => esc_html__( 'Padding', 'themex' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .card-2 ul li,{{WRAPPER}} .accordion_area .card-2 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
			/* Margin */
            $this->add_responsive_control(
                'accordion_content_margin',
                [
                    'label' => esc_html__( 'Margin', 'themex' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .card-2 ul li,{{WRAPPER}} .accordion_area .card-2 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );


			

        $this->end_controls_section(); 

    }

    protected function render( $instance = [] ) {

        $witrshowdata  = $this->get_settings_for_display();	
		$accordion_list     = $witrshowdata['txbd_accordion_list'];
		?>
		
		
		

                <div class="accordion_area">
                    <div class="faq-part">
                        <div id="<?php echo $witrshowdata['witr_accordion_uniq'];?>">
							<?php
							foreach ( $accordion_list as $witr_aitem ) {
								?>
								<div class="card card-2 <?php echo $witr_aitem['accordion_class'];?>">
									<div class="card-header witr_ac_card">
										<a href="#" class="card-link witr_ac_style" data-toggle="collapse" data-target="#collapse_<?php echo $witr_aitem['_id'];?>" aria-expanded="true">
											<!-- icon -->
											<?php if( ! empty($witr_aitem['witr_icon_item'])){?>
												<i class="<?php echo esc_attr( $witr_aitem['witr_icon_item']['value']);?>"></i>
											<?php } ?>										
										   <?php echo $witr_aitem['accordion_title'];?>
										</a>
									</div>
									<div id="collapse_<?php echo $witr_aitem['_id'];?>" class="collapse ac_s_padding <?php echo $witr_aitem['accordion_class'];?>" data-parent="#<?php echo $witrshowdata['witr_accordion_uniq']; ?>">
                                        <?php 
                                            if ( $witr_aitem['witr_template_link'] == 'custom' && !empty( $witr_aitem['accordion_content'] ) ) {	
                                                echo wp_kses_post( $witr_aitem['accordion_content'] );
                                            } elseif ( $witr_aitem['witr_template_link'] == "elementor" && !empty( $witr_aitem['template_id'] )) {
                                                echo Plugin::instance()->frontend->get_builder_content_for_display( $witr_aitem['template_id'] );
                                            }
                                        ?>										
									</div>
								</div> <!-- card -->	
							<?php } ?>
                        </div>
                    </div> <!-- faq part -->		
                </div> 

		<script type='text/javascript'>
			jQuery(function($){				
				$('#<?php echo $witrshowdata['witr_accordion_uniq'];?> .card').each(function () {
					var $this = $(this);
					$this.on('click', function (e) {
						var has = $this.hasClass('active');
						$('#<?php echo $witrshowdata['witr_accordion_uniq'];?> .card').removeClass('active show');
						if (has) {
							$this.removeClass('active show');
						} else {
							$this.addClass('active show');
						}
					});
				});
			});
		</script>					
		<?php		   
    }


}
