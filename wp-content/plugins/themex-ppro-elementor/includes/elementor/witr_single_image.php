<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_S_image extends Widget_Base {

    public function get_name() {
        return 'witr_section_s_image';
    }
    
    public function get_title() {
        return esc_html__( ' Image', 'themex' );
    }
    public function get_style_depends() {
        return ['wsimage'];
    }
    public function get_icon() {
        return 'themex_icon eicon-image';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {
		
			
			

			/* === witr_image start === */
			$this->start_controls_section(
				'witr_field_display_s_image',
				[
					'label' => esc_html__( ' Image Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
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
						'{{WRAPPER}} .single_image_area' => 'text-align: {{VALUE}}',
					],						
				]
			);			
				/* SHOW IMAGE witr_show_image witr_image_image */
				$this->add_control(
					'witr_show_image',
					[
						'label' => esc_html__( 'Show Image', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'yes',
					]
				);	
				/* witr_image_image */
				$this->add_control(
					'witr_image_image',
					[
						'label' => esc_html__( 'Choose Image', 'themex' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
						'condition' => [
							'witr_show_image' => 'yes',
						],							
					]
				);
				/* txbd_image_size */
				$this->add_group_control(
					Group_Control_Image_Size::get_type(),
					[
						'name' => 'txbd_image_size',
						'default' => 'large',
						'separator' => 'none',
						'condition' => [
							'witr_show_image' => 'yes',
						]
					]
				);				
				/* witr_show_bar */
				$this->add_control(
					'witr_show_bar',
					[
						'label' => esc_html__( 'Show Bar Animation', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'no',
						'separator'=>'before',
						'condition' => [
							'witr_show_image' => 'yes',
						],						
					]
				);	
				
				/*  witr_weight_height */
				$this->add_responsive_control(
					'witr_weight_height',
					[
						'label' => esc_html__( 'Bar Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'separator'=>'before',
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .image_line_top,{{WRAPPER}} .image_line_bottom' => 'height: {{SIZE}}{{UNIT}};',
							'{{WRAPPER}} .image_line_left,{{WRAPPER}} .image_line_right' => 'width: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'witr_show_bar' => 'yes',
						],							
					]
				);
				/* witr_show_animate */
				$this->add_control(
					'witr_show_animate',
					[
						'label' => esc_html__( 'Show Animation', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'no',
						'separator'=>'before',							
					]
				);				
				/* witr_show_animate */
				$this->add_control(
					'witr_show_animate2',
					[
						'label' => esc_html__( 'Show Animation 2', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'no',
						'separator'=>'before',							
					]
				);
				
			/* top title witr_top_title	*/
				$this->add_control(
					'witr_top_title',
					[
						'label' => esc_html__( 'Title', 'themex' ),
						'type' => Controls_Manager::TEXTAREA,
						'default' =>'',
						'separator' => 'before',
						'description' => esc_html__( 'Not use title, remove the text from field', 'themex' ),
						'placeholder' => esc_attr__( 'Type your title here', 'themex' ),						
					]
				);
				/* title_link */	
				$this->add_control(
					'title_link',
					[
						'label' => esc_html__( 'Title Link', 'themex' ),
						'type' => Controls_Manager::URL,
						'description' =>esc_html__('Insert Title link here.','themex'),
						'placeholder' => esc_attr__( 'https://your-link.com', 'themex' ),
						'show_external' => true,
						
					]
				);				
				/* witr_middle_title	*/
				$this->add_control(
					'witr_middle_title',
					[
						'label' => esc_html__( 'Content', 'themex' ),
						'type' => Controls_Manager::TEXTAREA,
						'default' =>'',
						'separator' => 'before',
						'description' => esc_html__( 'Not use title, remove the text from field', 'themex' ),						
						'placeholder' => esc_attr__( 'Type your content here', 'themex' ),							
					]
				);				
				
												
			
			$this->end_controls_section();
			/* === end witr_image ===  */			
			
			
		
		
	   /*===========================================================================================
										START TO STYLE
		=============================================================================================*/		
		
		

		/*=== start witr_image style ====*/
		$this->start_controls_section(
			'witr_style_image_Option',
			[
				'label' => esc_html__( ' Images option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
			/*=== start icon_tabs style ====*/
			$this->start_controls_tabs( 'image_colors' );
			
				/*=== start icon_normal style ====*/
				$this->start_controls_tab(
					'witr_image_normal',
					[
						'label' => esc_html__( 'Normal', 'themex' ),
					]
				);			
				$this->add_group_control(
					Group_Control_Css_Filter::get_type(),
					[
						'name' => 'css_filters',
						'selector' => '{{WRAPPER}} .single_image img',
					]
				);
				$this->add_control(
					'entrance_animation',
					[
						'label' => esc_html__( ' Animation', 'themex' ),
						'type' => Controls_Manager::ANIMATION,
						'description' => esc_html__( 'Not working editor page, animation working editor page', 'themex' ),
						'prefix_class' => 'animated ',
					]
				);
				
				/*  image width */
				$this->add_responsive_control(
					'witr_image_width',
					[
						'label' => esc_html__( 'width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'separator'=>'before',						
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
								'max' => 1920,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .single_image img' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  image Max width */
				$this->add_responsive_control(
					'witr_image_maxwidth',
					[
						'label' => esc_html__( 'Max width', 'themex' ),
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
								'max' => 1920,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .single_image img' => 'max-width: {{SIZE}}{{UNIT}};',
						],
					]
				);				
						
						/* witr_left */
						$this->add_responsive_control(
							'witr_left',
							[
								'label' => esc_html__( 'Left', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'description' => esc_html__( 'When Image Left then Left use.', 'themex' ),
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
									'{{WRAPPER}} .single_image' => 'left: {{SIZE}}{{UNIT}};',
								],
							]
						);
		
						/* witr_right */
						$this->add_responsive_control(
							'witr_right',
							[
								'label' => esc_html__( 'Right', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'description' => esc_html__( 'When Image Right then Right use.', 'themex' ),
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 500,
									],
									'%' => [
										'min' => -100,
										'max' => 500,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .single_image' => 'right: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .single_image img' => 'height: {{SIZE}}{{UNIT}};',
						],
					]			
				);
				/* background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'section_background',
						'label' => esc_html__( 'Background', 'themex' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => '{{WRAPPER}} .single_image::before',						
					]
				);
				/* background_overlay */
				$this->add_control(
					'background_overlay_opacity',
					[
						'label' => esc_html__( 'Opacity', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'default' => [
							'size' => .5,
						],
						'range' => [
							'px' => [
								'max' => 1,
								'step' => 0.01,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .single_image::before' => 'opacity: {{SIZE}};',
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
								'{{WRAPPER}} .single_image img' => 'transform: rotate({{SIZE}}{{UNIT}});',
							],							
						]
					);				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_img_bb',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .single_image img',
					]
				);
					/* border_radius */
					$this->add_control(
						'witr_single_br',
						[
							'label' => esc_html__( 'Border Radius', 'themex' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%' ],
							'description' =>esc_html__('When Show Animation 2 Set Not Work Border Radius','themex'),
							'selectors' => [
								'{{WRAPPER}} .single_image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .single_image img',
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
								'{{WRAPPER}} .single_image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .single_image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
				$this->end_controls_tab();
				/*=== end image normal style ====*/
		
				/*=== start image hover style ====*/
				$this->start_controls_tab(
					'witr_image_colors_hover',
					[
						'label' => esc_html__( ' Hover', 'webitrangpur' ),
					]
				);
				
					$this->add_group_control(
						Group_Control_Css_Filter::get_type(),
						[
							'name' => 'css_filtershover',
							'selector' => '{{WRAPPER}} .single_image:hover img',
						]
					);				
					/* witr_hover_animation */
					$this->add_control(
						'witr_hover_animation',
						[
							'label' => esc_html__( ' Animation', 'themex' ),
							'type' => Controls_Manager::HOVER_ANIMATION,
							'prefix_class' => 'elementor-animation-',
						]
					);
					$this->add_control(
						'bicon_transition',
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
								'{{WRAPPER}} .single_image img' => 'transition: {{SIZE}}s',
							],
						]
					);
				/* border_radius */
					$this->add_control(
						'witr_single_bhover',
						[
							'label' => esc_html__( 'Border Radius', 'themex' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%' ],
							'selectors' => [
								'{{WRAPPER}} .single_image:hover img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					/*  Rotate */
					$this->add_responsive_control(
						'witr_rotate_img_hover',
						[
							'label' => esc_html__( ' Rotate', 'themex' ),
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
								'{{WRAPPER}} .single_image:hover img' => 'transform: rotate({{SIZE}}{{UNIT}});',
							],							
						]
					);
					

				$this->end_controls_tab();
				/*=== end image normal style ====*/				
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
			/* color */
			$this->add_control(
				'witr_title_color',
				[
					'label' => esc_html__( ' Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',
					'global' => [
						'default' => Global_Colors::COLOR_PRIMARY,
					],					
					'selectors' => [
						'{{WRAPPER}} .witr_tx_ovei_title h2,{{WRAPPER}} .witr_tx_ovei_title h2 a' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .witr_tx_ovei_title h2:hover,{{WRAPPER}} .witr_tx_ovei_title h2 a:hover' => 'color: {{VALUE}}',
					],
				]
			);			
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_ttpy_color',
					'label' => esc_html__( ' Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
					],
					'selector' => '{{WRAPPER}} .witr_tx_ovei_title h2,{{WRAPPER}} .witr_tx_ovei_title h2 a',
				]
			);
			/* box background hover */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_title_bgcolor',
					'label' => esc_html__( ' Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .witr_tx_ovei_title',
				]
			);
			/*  Top content width */
			$this->add_responsive_control(
				'witr_box_width',
				[
					'label' => esc_html__( 'Box width', 'themex' ),
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
					'size_units' => ['%','px'],
					'range' => [
						'%' => [
							'min' => 0,
							'max' => 100,
						],
						'px' => [
							'min' => 0,
							'max' => 1920,
						],	
					],
					'selectors' => [
						'{{WRAPPER}} .witr_tx_ovei_title' => 'width: {{SIZE}}{{UNIT}};',
					],
					
				]
			);
			/* border_radius */
			$this->add_control(
				'witr_box_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .witr_tx_ovei_title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .witr_tx_ovei_title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .witr_tx_ovei_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'witr_title_colorpi',
				[
					'label' => esc_html__( ' Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',
					'global' => [
						'default' => Global_Colors::COLOR_TEXT,
					],					
					'selectors' => [
						'{{WRAPPER}} .witr_tx_ovei_title p' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_ttpy_colorpi',
					'label' => esc_html__( ' Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_TEXT,
					],
					'selector' => '{{WRAPPER}} .witr_tx_ovei_title p',
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
						'{{WRAPPER}} .witr_tx_ovei_title p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .witr_tx_ovei_title p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr content style ====*/		
		

    } /* function end */

    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();
		$target = ! empty($witrshowdata['title_link']['is_external']) ? ' target="_blank"' : '';
		$nofollow = ! empty($witrshowdata['title_link']['nofollow']) ? ' rel="nofollow"' : '';
		$txbd_image = ! empty($witrshowdata['witr_image_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witrshowdata, 'txbd_image_size', 'witr_image_image' ) : '';		
		
		?>	
		<div class="single_image_area">
			<div class="single_image single_line_option <?php if($witrshowdata['witr_show_animate2']=='yes'){ ?>  single_img_ani <?php } ?> <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  witr_not_ani <?php } ?>">
				<!-- image -->
				<?php echo $txbd_image; ?>		
				<?php if(($witrshowdata['witr_top_title']) || ($witrshowdata['witr_middle_title'])){?>
					<div class="witr_tx_ovei_title">
						<!-- title -->
						<?php if( ! empty($witrshowdata['witr_top_title'])){?>
						<?php if($witrshowdata['title_link'] ['url']){?> 
							<h2><a href="<?php echo $witrshowdata['title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_top_title']; ?></a></h2>
						<?php }else{ ?>
						<h2><?php echo $witrshowdata['witr_top_title']; ?> </h2>
						<?php }	?>
						<?php } ?>
						
						<!-- title content -->
						<?php if( ! empty($witrshowdata['witr_middle_title'])){?>
							<p><?php echo $witrshowdata['witr_middle_title']; ?></p>		
						<?php } ?>											
					</div>
				<?php } ?>
				<?php if($witrshowdata['witr_show_bar']=='yes'){ ?>				
					<div class="single_image_line image_line_top"></div>				
					<div class="single_image_line image_line_bottom"></div>				
					<div class="single_image_line image_line_left"></div>				
					<div class="single_image_line image_line_right"></div>
				<?php } ?>
			</div>
		</div>
			
			
		
			
		<?php	
		
		
		


    } /* function end */



}