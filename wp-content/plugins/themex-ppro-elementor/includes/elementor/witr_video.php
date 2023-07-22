<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Video extends Widget_Base {

    public function get_name() {
        return 'witr_section_video';
    }
    
    public function get_title() {
        return esc_html__( 'Video', 'themex' );
    }
	public function get_style_depends() {
        return [ 'wvideo' ];
    }
    public function get_icon() {
        return 'themex_icon eicon-youtube';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {
		
			
			

			/* === witr_video start === */
			$this->start_controls_section(
				'witr_field_display_video',
				[
					'label' => esc_html__( ' Video Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);		

			/* service style check  witr_style_video */
				$this->add_control(
					'witr_style_video',
					[
						'label' => esc_html__( 'Video style', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator' => 'before',
						'options' => [
							'1' => esc_html__( 'Video With Text Style ', 'themex' ),
							'2' => esc_html__( 'Video With Image Style', 'themex' ),
						],
						'default' => '1',
					]
				);
				/* video_type */
				$this->add_control(
					'video_type',
					[
						'label' => esc_html__( 'Source', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator' => 'before',
						'default' => 'youtube',
						'options' => [
							'youtube' => esc_html__( 'YouTube', 'themex' ),
							'vimeo' => esc_html__( 'Vimeo', 'themex' ),
						],
					]
				);
				/* youtube_url */
				$this->add_control(
					'youtube_url',
					[
						'label' => esc_html__( 'Link', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'placeholder' => esc_html__( 'Enter your URL', 'themex' ),
						'default' => 'https://youtu.be/BS4TUd7FJSg',
						'label_block' => true,
						'condition' => [
							'video_type' => 'youtube',
						],
					]
				);
				/* vimeo_url */
				$this->add_control(
					'vimeo_url',
					[
						'label' => esc_html__( 'Link', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'placeholder' => esc_html__( 'Enter your URL', 'themex' ),
						'default' => 'https://vimeo.com/235215203',
						'label_block' => true,
						'condition' => [
							'video_type' => 'vimeo',
						],
					]
				);		

				/* SHOW IMAGE witr_show_image witr_video_image */
				$this->add_control(
					'witr_show_image',
					[
						'label' => esc_html__( 'Show Image', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'separator' => 'before',
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'yes',
						'condition' => [
							'witr_style_video' => ['2'],
						
							]
					]
				);	
				/* witr_video_image */
				$this->add_control(
					'witr_video_image',
					[
						'label' => esc_html__( 'Choose Image', 'themex' ),
						'type' => Controls_Manager::MEDIA,
						'separator' => 'before',
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
						'condition' => [
							'witr_show_image' => 'yes',
							'witr_style_video' => ['2'],
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
							'witr_style_video' => ['2'],
						]
					]
				);
				/* witr_icon_item */				
				$this->add_control(
					'witr_icon_item',
					[
						'label' => esc_html__( 'Icon', 'themex' ),
						'type' => Controls_Manager::ICONS,
						'separator' => 'before',
						'description' => esc_html__( 'chance the icon, click the library field', 'themex' ),						
						'fa4compatibility' => 'icon',
						'default' => [
							'value' => 'icofont-ui-play',
							'library' => 'fa-solid',
						],							
					]
				);				
				/* witr_show_animate */
				$this->add_control(
					'witr_show_animate',
					[
						'label' => esc_html__( 'Show Animation ', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'no',
						'separator'=>'before',							
					]
				);
				/* witr_show_animate2 */
				$this->add_control(
					'witr_show_animate2',
					[
						'label' => esc_html__( 'Show Animation 2 ', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Hide', 'themex' ),
						'label_off' => esc_html__( 'Show', 'themex' ),
						'return_value' => 'yes',
						'default' => 'no',
						'separator'=>'before',							
					]
				);
				
				/* video title witr_videos_title */	
					$this->add_control(
						'witr_videos_title',
						[
							'label' => esc_html__( 'Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'separator' => 'before',
							'default' => esc_html__( 'Watch Video This Play', 'themex' ),
							'placeholder' => esc_attr__( 'Type your video title here', 'themex' ),							
							'description' => esc_html__( 'Not use title, remove the text from field', 'themex' ),
							/*'condition' => [
								'witr_style_video' => ['1'],
							],*/						
						]
					);				

				
			$this->end_controls_section();
			/* === end witr_video ===  */			
		


		
		
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
					'global' => [
						'default' => Global_Colors::COLOR_PRIMARY,
					],					
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .witr_all_color_v h3' => 'color: {{VALUE}}',
					],
				]
			);
			/* Hover color */
			$this->add_control(
				'witr_titleh_color',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .witr_all_color_v h3:hover' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .witr_all_color_v h3',
				]
			);		
			/*  Top Tittle width */
			$this->add_responsive_control(
				'witr_video_title_width',
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
						'{{WRAPPER}} .witr_videos_title_text' => 'width: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_video' => ['2'],
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
						'{{WRAPPER}} .witr_all_color_v h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .witr_all_color_v h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_title style ====*/	
		
		
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
				/* Icon Color */
				$this->add_control(
					'witr_primary_color',
					[
						'label' => esc_html__( 'Icon Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .witr_all_color_v i' => 'color: {{VALUE}}',
						],
						
					]
				);
				
				/*  icon font size */
				$this->add_responsive_control(
					'witr_icon_size',
					[
						'label' => esc_html__( 'Icon Size', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_all_color_v a' => 'font-size: {{SIZE}}{{UNIT}};',
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
						'selector' => '{{WRAPPER}} .witr_all_color_v a,{{WRAPPER}} .play-overlay a::before,{{WRAPPER}} .video-item a::before',
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
							'{{WRAPPER}} .witr_all_color_v a' => 'width: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_all_color_v a' => 'height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_all_color_v a' => 'line-height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_all_color_v a,{{WRAPPER}} .play-overlay a::before,{{WRAPPER}} .video-item a::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);				
				/* HEADING  */
				$this->add_control(
					'witr_head_icon',
					[
						'label' => esc_html__( ' Top,Left,Bottom,Right Option', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator'=>'before',
					]
				);
				
			/* witr_top */
			$this->add_responsive_control(
				'witr_topt',
				[
					'label' => esc_html__( 'Top', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 1000,
						],
						'%' => [
							'min' => -500,
							'max' => 1000,
						],
						'em' => [
							'min' => -500,
							'max' => 1000,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .play-overlay,{{WRAPPER}} .video-item a' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);
			
			/* witr_left */
			$this->add_responsive_control(
				'witr_leftl',
				[
					'label' => esc_html__( 'Left', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 1500,
						],
						'%' => [
							'min' => -500,
							'max' => 1500,
						],
						'em' => [
							'min' => -500,
							'max' => 1500,
						],
						
					],
					'selectors' => [
						'{{WRAPPER}} .play-overlay,{{WRAPPER}} .video-item a' => 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);
			/*  icon height */
			$this->add_responsive_control(
				'witr_zindex_height',
				[
					'label' => esc_html__( 'Z-Index', 'astute' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => -1,
							'max' => 9999,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .play-overlay' => 'z-index: {{SIZE}};',
					],
				]
			);
			/* witr_right */
			$this->add_responsive_control(
				'witr_rightr',
				[
					'label' => esc_html__( 'Right', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
						],
						'%' => [
							'min' => -1000,
							'max' => 1000,
						],
						'em' => [
							'min' => -1000,
							'max' => 1000,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .play-overlay,{{WRAPPER}} .video-item a' => 'right: {{SIZE}}{{UNIT}};',
					],
				]
			);					
			/* witr_bottom */
			$this->add_responsive_control(
				'witr_bottomb',
				[
					'label' => esc_html__( 'Bottom', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 1000,
						],
						'%' => [
							'min' => -500,
							'max' => 1000,
						],
						'em' => [
							'min' => -500,
							'max' => 1000,
						],
						
					],
					'selectors' => [
						'{{WRAPPER}} .play-overlay,{{WRAPPER}} .video-item a' => 'bottom: {{SIZE}}{{UNIT}};',
					],
					
				]
			);				
				
				/* HEADING Before */
				$this->add_control(
					'witr_heading_radius',
					[
						'label' => esc_html__( ' Before Color Option', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator'=>'before',

					]
				);

				/*  icon top */
				$this->add_responsive_control(
					'witr_icon_top_after',
					[
						'label' => esc_html__( 'Top', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => -500,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .play-overlay a::before,{{WRAPPER}} .video-item a::before' => 'top: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon left */
				$this->add_responsive_control(
					'witr_icon_left_after',
					[
						'label' => esc_html__( 'Left', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => -500,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .play-overlay a::before,{{WRAPPER}} .video-item a::before' => 'left: {{SIZE}}{{UNIT}};',
						],
					]
				);
				

				/* border_radius */
				$this->add_control(
					'witr_border_radius_after',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .play-overlay a::before,{{WRAPPER}} .video-item a::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'label' => esc_html__( 'Icon Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .witr_all_color_v i:hover ' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .witr_all_color_v i:hover',
						]
					);					
					
				/* HEADING before */
				$this->add_control(
					'witr_headingh_radius',
					[
						'label' => esc_html__( 'Heading Before Hover', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator'=>'before',
					]
				);

				/* Icon background before */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_icons_bac_after',
						'label' => esc_html__( 'Icon Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .video-item a:hover::before,{{WRAPPER}} .play-overlay a:hover::before',
					]
				);
					$this->end_controls_tab();
					/*=== end icon hover style ====*/
					
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/

		$this->end_controls_section();

		/*=== end witr_icon style ====*/		
		
				
		
		
		
		/*=== start witr_Video style ====*/
		$this->start_controls_section(
			'witr_style_image_option',
			[
				'label' => esc_html__( 'Video Overlay BG Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
							'{{WRAPPER}} .witr_all_color_v img' => 'width: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'witr_style_video' => ['2'],
						],						
					]
				);			
				/*  img height */
				$this->add_responsive_control(
					'witr_image_heighta',
					[
						'label' => esc_html__( 'Image Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 100,
								'max' => 1000,
							],
							'%' => [
								'min' => 100,
								'max' => 1000,
							],
							'em' => [
								'min' => 100,
								'max' => 1000,
							],
							
						],
						'selectors' => [
							'{{WRAPPER}} .witr_all_color_v img' => 'height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'witr_style_video' => ['2'],
						],						
					]
				);
			/* background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'section_background',
					'label' => esc_html__( 'Background', 'themex' ),
					'types' => [ 'classic', 'gradient','video' ],
					'selector' => '{{WRAPPER}} .witr_all_color_v, {{WRAPPER}} .witr_videobg_image::before',						
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
						'{{WRAPPER}} .witr_all_color_v,{{WRAPPER}} .witr_videobg_image::before,{{WRAPPER}} .witr_videobg_image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .witr_all_color_v' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .witr_all_color_v' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_image style ====*/			
		
		
		

    } /* function end */

    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();
		
        $witr_videotype  = ! empty( $witrshowdata['video_type'] ) ? $witrshowdata['video_type'] : 'youtube';  		
        $youtube_url  = ! empty( $witrshowdata['youtube_url'] ) ? $witrshowdata['youtube_url'] : ' ';  		
        $vimeo_url  = ! empty( $witrshowdata['vimeo_url'] ) ? $witrshowdata['vimeo_url'] : ' ';  		
		$txbd_image = ! empty($witrshowdata['witr_video_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witrshowdata, 'txbd_image_size', 'witr_video_image' ) : '';		
		
		
		
		
		switch($witrshowdata['witr_style_video'] ) {

		case '2':
		?>
		
			<div class="witr_play_vi witr_all_color_v">
				<!-- image -->
				<?php if( ! empty($witrshowdata['witr_video_image']['url'])){?>
					<div class="witr_videobg_image">
						<?php echo $txbd_image; ?>

						<div class="play-overlay <?php if($witrshowdata['witr_show_animate2']=='yes'){ ?>  witr_none_before <?php } ?>">
							<a class="<?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  tx_svd_icon <?php } ?> video-popup video-vemo-icon venobox vbox-item" data-vbtype="<?php echo $witr_videotype; ?>" data-autoplay="true" href="<?php if( $witr_videotype=='youtube' ){echo $youtube_url;}elseif( $witr_videotype=='vimeo' ){echo $vimeo_url;}else{} ?>">
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
								<?php } ?>
							</a>
						</div>

						<!-- title -->
						<?php if( ! empty($witrshowdata['witr_videos_title'])){?>
						<div class="witr_videos_title_text">
							<h3><?php echo $witrshowdata['witr_videos_title']; ?> </h3>	
						</div>	
						<?php } ?>	
					</div>
				<?php } ?>				
			</div> <!-- about play -->			

		<?php
		break;
		
		default:
		?>


        <div class="video-part">
			<div class="video-overlay witr_all_color_v">
				<div class="video-item <?php if($witrshowdata['witr_show_animate2']=='yes'){ ?>  witr_none_before <?php } ?>  text-center">
					<a class="<?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  tx_svd_icon <?php } ?> video-popup video-vemo-icon venobox vbox-item" data-vbtype="<?php echo $witr_videotype; ?>" data-autoplay="true" href="<?php if( $witr_videotype=='youtube' ){echo $youtube_url;}elseif( $witr_videotype=='vimeo' ){echo $vimeo_url;}else{} ?>">
						<!-- icon -->
						<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
							<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
						<?php } ?>
					</a>
					<!-- title -->
					<?php if( ! empty($witrshowdata['witr_videos_title'])){?>
						<h3><?php echo $witrshowdata['witr_videos_title']; ?> </h3>		
					<?php } ?>				
				</div> <!-- video item -->
			</div> <!-- video overlay -->
        </div> 

		
		<?php
		break;
			
			
			
		} /*switch end */
		
		

		

    } /* function end */



}
