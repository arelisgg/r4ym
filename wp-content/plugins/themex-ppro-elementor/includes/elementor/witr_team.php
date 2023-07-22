<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Team extends Widget_Base {

public function get_name() {
return 'witr_section_team';
}

public function get_title() {
return esc_html__( ' Team', 'themex' );
}
public function get_style_depends() {
return ['wteam'];
}
public function get_icon() {
return 'themex_icon eicon-person';
}
public function get_categories() {
return [ 'witr_tname' ];
}

protected function register_controls() {


			

			/* === witr_team start === */
			$this->start_controls_section(
				'witr_field_display_team',
				[
					'label' => esc_html__( ' Team Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
			/* team style check  witr_style_team */
				$this->add_control(
					'witr_style_team',
					[
						'label' => esc_html__( 'Team style', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'description' => esc_html__( 'select your team style from here', 'themex' ),
						'options' => [
							'1' => esc_html__( 'Team style 1', 'themex' ),
							'2' => esc_html__( 'Team style 2', 'themex' ),
							'3' => esc_html__( 'Team style 3', 'themex' ),
							'4' => esc_html__( 'Team style 4', 'themex' ),
							'5' => esc_html__( 'Team style 5', 'themex' ),
							'6' => esc_html__( 'Team style 6', 'themex' ),
							'7' => esc_html__( 'Team style 7', 'themex' ),
							'8' => esc_html__( '3D/Flip Box style', 'themex' ),
							'9' => esc_html__( 'Team style 9', 'themex' ),
							'10' => esc_html__( 'Team style 10', 'themex' ),
							'11' => esc_html__( 'Team style 11', 'themex' ),
							'12' => esc_html__( 'Team style 12', 'themex' ),
							'13' => esc_html__( 'Team style 13', 'themex' ),
							'14' => esc_html__( 'Team style 14', 'themex' ),
							'15' => esc_html__( 'Team style 15', 'themex' ),
						],
						'default' => '1',
					]
				);
				
				/* witr_xyz */
				$this->add_control(
					'witr_xyz',
					[
						'label' => esc_html__( 'Flip Box', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'witr_team_flip_left',
						'options' => [
							'witr_team_flip_left' => esc_html__( 'Left', 'themex' ),
							'witr_team_flip_right' => esc_html__( 'Right', 'Down' ),
							'witr_team_flip_up' => esc_html__( 'Up', 'themex' ),
							'witr_team_flip_down' => esc_html__( 'Down', 'themex' ),
							'witr_team_flip_zoomin' => esc_html__( 'Zoom In', 'Down' ),
							'witr_team_flip_zoomout' => esc_html__( 'Zoom Out', 'Down' ),
						],
						'condition' => [
							'witr_style_team' =>['8'],
						],						
					]
				);				
				/*  box height */
				$this->add_responsive_control(
					'witr_box_height',
					[
						'label' => esc_html__( 'Box Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'separator'=>'before',
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 300,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_team_front_3d,{{WRAPPER}} .witr_team_back_3d' => 'height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'witr_style_team' =>['8'],
						],							
					]
				);				
				$this->add_control(
					'witr_more_heading',
					[
						'label' => esc_html__( 'Recommended Image Size= 270x300px', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator' => 'before',
						'condition' => [
							'witr_style_team' => ['1','2','4','8','11','12','13','14'],
						],
					]
				);
				$this->add_control(
					'witr_moretwo_heading',
					[
						'label' => esc_html__( 'Recommended Image Size= 270x385px', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator' => 'before',
						'condition' => [
							'witr_style_team' => ['3'],
						],
					]
				);
				$this->add_control(
					'witr_morethree_heading',
					[
						'label' => esc_html__( 'Recommended Image Size= 300x300px', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator' => 'before',
						'condition' => [
							'witr_style_team' => ['5','10','15'],
						],
					]
				);
				
				$this->add_control(
					'witr_morethree7_heading',
					[
						'label' => esc_html__( 'Recommended Image Size= 270x354px', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator' => 'before',
						'condition' => [
							'witr_style_team' => ['7'],
						],
					]
				);
				
				
				/* SHOW IMAGE witr_show_image witr_team_image */
				$this->add_control(
					'witr_show_image',
					[
						'label' => esc_html__( 'Show Team Image', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'yes',
					]
				);				
				/* witr_team_image */
				$this->add_control(
					'witr_team_image',
					[
						'label' => esc_html__( 'Choose Team Image', 'themex' ),
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
				/* witr_team_title */	
				$this->add_control(
					'witr_team_title',
					[
						'label' => esc_html__( 'Title', 'themex' ),
						'type' => Controls_Manager::TEXTAREA,
						'description' => esc_html__( 'Not use title, remove the text from field', 'themex' ),
						'default' => esc_html__( 'Nicolas Poran', 'themex' ),
						'placeholder' => esc_attr__( 'Type your team title here', 'themex' ),						
					]
				);
				/* witr_team_title_link */	
				$this->add_control(
					'witr_team_title_link',
					[
						'label' => esc_html__( 'Title Link', 'themex' ),
						'type' => Controls_Manager::URL,
						'description' =>esc_html__('Insert Title link here.','themex'),
						'placeholder' => esc_attr__( 'https://your-link.com', 'themex' ),
						'show_external' => true,
						
					]
				);				
				/* witr_team_subtitle */
				$this->add_control(
					'witr_team_subtitle',
					[
						'label' => esc_html__( 'Designation Text ', 'themex' ),
						'type' => Controls_Manager::TEXTAREA,
						'description' => esc_html__( 'Not use designation title, remove the text from field', 'themex' ),
						'default' => esc_html__( 'Founder', 'themex' ),
						'placeholder' => esc_attr__( 'Type your designation title here', 'themex' ),						
					]
				);
									
				/* team Content witr_content	*/
				$this->add_control(
					'witr_team_content',
					[
						'label' => esc_html__( 'Content', 'themex' ),
						'type' => Controls_Manager::TEXTAREA,
						'description' => esc_html__( 'Not use content text, remove the text from field', 'themex' ),
						'default' => esc_html__( 'Lorem ipsum dolor sit amen.', 'themex' ),
						'placeholder' => esc_attr__( 'Type your content here', 'themex' ),
						'condition' => [
							'witr_style_team' => ['2','3','5','8','9','12'],
						],						
					]
				);
					/* witr_top_icon_show */
					$this->add_control(
						'witr_top_icon_show',
						[
							'label' => esc_html__( 'Show Icon', 'themex' ),
							'type' => Controls_Manager::SWITCHER,
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'return_value' => 'yes',
							'default' => 'yes',
							'separator'=>'before',
							'condition' => [
								'witr_style_team' => ['1','10','11','15'],
								
							],							
						]
					);				
					/* witr_icon_item */					
					$this->add_control(
						'witr_icon_item1',
						[
							'label' => esc_html__( 'Icon', 'themex' ),
							'type' => Controls_Manager::ICONS,
							'description' => esc_html__( 'Change icon here, For this, click on the library field And Not use Icon,Click On The Hide Option', 'themex' ),
							'default' => [
								'value' => 'icofont-share',
							],
							'condition' => [
								'witr_style_team' => ['1','10','11','15'],
								'witr_top_icon_show' =>'yes',
							],							
						]
					);				
				/*  witr_icot1_link */	
				$this->add_control(
					'witr_icot1_link',
					[
						'label' => esc_html__( 'Set Social Link', 'themex' ),
						'type' => Controls_Manager::URL,
						'description' =>esc_html__('Insert list link here.','themex'),
						'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
						'show_external' => true,
						'default' => [
							'url' => '#',
						],
						'condition' => [
							'witr_style_team' => ['1','10','11','15'],
							'witr_top_icon_show' =>'yes',
						],
					]
				);				

	
			$this->end_controls_section();
			/* === end w_team ===  */			
			
			/*==== witr_icon start =====*/
			$this->start_controls_section(
				'witr_field_team_social',
				[
					'label' => esc_html__( 'witr socials options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
					'condition' => [
						'witr_style_team' => ['2','3','4','5','7','8','9','10','12','13','14','15'],
					],
				]
			);
					/* witr_icon_show */
					$this->add_control(
						'witr_icon_show',
						[
							'label' => esc_html__( 'Show Icon, Working Style 13', 'themex' ),
							'type' => Controls_Manager::SWITCHER,
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'return_value' => 'yes',
							'default' => 'yes',
							'separator'=>'before',							
						]
					);			

					$repeater = new Repeater();	
	
					/* witr_icon_item */				
					$repeater->add_control(
						'witr_icon_team',
						[
							'label' => esc_html__( 'Icon Item', 'themex' ),
							'type' => Controls_Manager::ICONS,
							'description' => esc_html__( 'Change icon here, For this, click on the library field', 'themex' ),
							'fa4compatibility' => 'icon',
							'default' => [
								'value' => 'icofont-check',
								'library' => 'fa-solid',
							],
											
						]
					);
					/*  witr_icons_link */	
					$repeater->add_control(
						'witr_icons_link',
						[
							'label' => esc_html__( 'Set Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert list link here.','themex'),
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => '#',
							],
						]
					);											
					/* witr_social_icons */
					$this->add_control(
						'witr_team_icons',
						[
							'label' => esc_html__( 'Social Icons Item', 'themex' ),
							'type' => Controls_Manager::REPEATER,
							'fields' => $repeater->get_controls(),							
							'default' => [
								[
									'witr_icon_team' => [
										'value' => 'icofont-facebook',
										'library' => 'fa-brands',
									],
								],
								[
									'witr_icon_team' => [
										'value' => 'icofont-twitter',
										'library' => 'fa-brands',
									],
								],
								[
									'witr_icon_team' => [
										'value' => 'icofont-tumblr',
										'library' => 'fa-brands',
									],
								],
								[
									'witr_icon_team' => [
										'value' => 'icofont-vimeo',
										'library' => 'fa-brands',
									],
								],
								
							],
							
							'title_field' => '<# var migrated = "undefined" !== typeof __fa4_migrated, social = ( "undefined" === typeof social ) ? false : social; #>{{{ elementor.helpers.getSocialNetworkNameFromIcon( witr_icon_team, social, true, migrated, true ) }}}',							
						]
					);

					
			
					
			$this->end_controls_section();
			/*==== end witr_team icon  =====*/


			
		

	   /*========================================================================================================================================================================
										START TO STYLE
		==================================================================================================================================================================*/
		
		
		
			/*=== start witr_single_team style ====*/
			$this->start_controls_section(
				'witr_single_team',
				[
					'label' => esc_html__( 'Single Team Option', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_style_team' => ['1','2','3','9','11','12','13','14'],
					],					
					
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
							'default' => esc_html__( 'Default', 'themex' ),
						],
						'default' => 'default',
						'selectors' => [
							'{{WRAPPER}} .team-part,{{WRAPPER}} .front_view' => 'border-style: {{VALUE}}',
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
							'{{WRAPPER}} .team-part,{{WRAPPER}} .front_view' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .team-part,{{WRAPPER}} .front_view' => 'border-color: {{VALUE}}',
						],
						'condition' => [
							'witr_border_btn_style' => ['solid','double','dotted','dashed','default'],
						],
					]
				);				
				/* single_border_radius */
				$this->add_control(
					'witr_single_border_radius',
					[
						'label' => esc_html__( ' Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .team-part,{{WRAPPER}} .front_view' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);	

				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_s_shadowsbox',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_team_s12,{{WRAPPER}} .front_view',
						'condition' => [
							'witr_style_team' => ['9','12','13','14'],
						],						
					]
				);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_sh_shadowsbox',
						'label' => esc_html__( 'Box Shadow Hover', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_team_s12:hover,{{WRAPPER}} .front_view:hover',
						'condition' => [
							'witr_style_team' => ['9','12','13','14'],
						],						
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
							'{{WRAPPER}} .all_color_team h5:hover,{{WRAPPER}} .all_color_team h5 a:hover' => 'color: {{VALUE}}',
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
				'label' => esc_html__( 'Designation Color Option', 'themex' ),
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
				/* Icon background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_span_background',
						'label' => esc_html__( 'Designation Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .all_color_team span',
						'condition' => [
							'witr_style_team' => ['11']
						],							
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
						'witr_style_team' => ['2','3','5','8','9'],
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
						'witr_style_team' => ['2','3','4','9','10','12','14','15'],
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
					'witr_ps_color',
					[
						'label' => esc_html__( 'Icon Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',					
						'selectors' => [
							'{{WRAPPER}} .all_team_s_color a,{{WRAPPER}} .witr_team_top ul li a,{{WRAPPER}} .team_top_icon ul li a' => 'color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .all_team_s_color a,{{WRAPPER}} .witr_team_top ul li a,{{WRAPPER}} .team_top_icon ul li a',
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
							'{{WRAPPER}} .all_team_s_color a,{{WRAPPER}} .witr_team_top ul li a,{{WRAPPER}} .team_top_icon ul li a' => 'font-size: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .all_team_s_color a,{{WRAPPER}} .witr_team_top ul li a,{{WRAPPER}} .team_top_icon ul li a' => 'width: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .all_team_s_color a,{{WRAPPER}} .witr_team_top ul li a,{{WRAPPER}} .team_top_icon ul li a' => 'height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .all_team_s_color a,{{WRAPPER}} .witr_team_top ul li a,{{WRAPPER}} .team_top_icon ul li a' => 'line-height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .all_team_s_color a,{{WRAPPER}} .witr_team_top ul li a,{{WRAPPER}} .team_top_icon ul li a' => 'text-align: {{VALUE}}',
						],
					]
				);
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_bordera_style',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .all_team_s_color a,{{WRAPPER}} .witr_team_top ul li a,{{WRAPPER}} .team_top_icon ul li a',
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
							'{{WRAPPER}} .all_team_s_color a,{{WRAPPER}} .witr_team_top ul li a,{{WRAPPER}} .team_top_icon ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);				
													
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .all_team_s_color a,{{WRAPPER}} .witr_team_top ul li a,{{WRAPPER}} .team_top_icon ul li a',
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
							'{{WRAPPER}} .all_team_s_color a,{{WRAPPER}} .witr_team_top ul li a,{{WRAPPER}} .team_top_icon ul li a' => 'mix-blend-mode: {{VALUE}}',
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
							'{{WRAPPER}} .all_team_s_color a,{{WRAPPER}} .witr_team_top ul li a,{{WRAPPER}} .team_top_icon ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .all_team_s_color a,{{WRAPPER}} .witr_team_top ul li a,{{WRAPPER}} .team_top_icon ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .all_team_s_color a:hover,{{WRAPPER}} .witr_team_top ul li a:hover,{{WRAPPER}} .team_top_icon ul li a:hover' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .all_team_s_color a:hover,{{WRAPPER}} .witr_team_top ul li a:hover,{{WRAPPER}} .team_top_icon ul li a:hover',
						]
					);
					/* border_hover_color */
					$this->add_control(
						'witr_border_hover_color',
						[
							'label' => esc_html__( 'Icon Border Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,							
							'selectors' => [
								'{{WRAPPER}} .all_team_s_color a:hover,{{WRAPPER}} .witr_team_top ul li a:hover,{{WRAPPER}} .team_top_icon ul li a:hover' => 'border-color: {{VALUE}}',
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
								'{{WRAPPER}} .all_team_s_color a:hover,{{WRAPPER}} .witr_team_top ul li a:hover,{{WRAPPER}} .team_top_icon ul li a:hover' => 'transform: rotate({{SIZE}}{{UNIT}});',
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
					'witr_style_team' => ['1','3','5','7','8','9','11','13'],
					'witr_top_icon_show' =>'yes',	
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
					/*====== HEADING Icon Color =======*/
					$this->add_control(
						'witr_heading_color2',
						[
							'label' => esc_html__( 'Icon Box BG  Color', 'techit' ),
							'type' => Controls_Manager::HEADING,
							'condition' => [
								'witr_style_team' => ['10'],
							],					
						]
					);					
					/* Box Icon background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_ibox_background',
							'label' => esc_html__( 'Box Icon Background', 'techit' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .witr_team_top',
							'condition' => [
								'witr_style_team' => ['10'],
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
			/* heading2 */
			$this->add_control(
				'witr_headib_color',
				[
					'label' => esc_html__( 'Icon Top Right Option Working Style 13', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'separator'=>'before',
					'condition' => [
						'witr_style_team' => ['13'],
					],					
				]
			);			
			/* witr_top */
			$this->add_responsive_control(
				'witrb_topt',
				[
					'label' => esc_html__( 'Icon Top', 'themex' ),
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
						'{{WRAPPER}} .con_TMS13_icon' => 'top: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_team' => ['13'],
					],					
				]
			);
			
			/* witr_left */
			$this->add_responsive_control(
				'witrb_rightl',
				[
					'label' => esc_html__( 'Icon Right', 'themex' ),
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
						'{{WRAPPER}} .con_TMS13_icon' => 'right: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_team' => ['13'],
					],					

				]
			);
						/* icon margin */
						$this->add_responsive_control(
							'witr_icon2_margin',
							[
								'label' => esc_html__( 'Icon Margin', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'separator'=>'before',
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


		/*=== start witr_box icon/text style  ====*/

		$this->start_controls_section(
			'witr_style_option_box',
			[
				'label' => esc_html__( 'Box Content/3D Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_team' => ['1','2','3','4','7','8','9','10','11','12','15'],
				],
			]
		);		 
		/*  witr_Icon/Text_background_heading */
		$this->add_control(
			'witr_hidden_ithemex',
			[
				'label' => esc_html__( 'Icon/Text Background Color', 'themex' ),
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
				'label' => esc_html__( 'Icon/Text Background Hover Color', 'themex' ),
				'type' => Controls_Manager::HEADING,
				'default' => 'heading',							
			]
		);
		/* hover Icon background */
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'witr_hover_icons',
				'label' => esc_html__( 'Icon Hover Background', 'themex' ),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .all_content_bg_color:hover,{{WRAPPER}} .all_icon_bg_color:hover',
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
		
		/*===== start  Background Overlay=====*/
		$this->start_controls_section(
			'section_background_overlay',
			[
				'label' => esc_html__( 'Background Overlay', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_team' => ['1','2','3','5','6','7','8','9','10','11','12'],
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
					'selector' => '{{WRAPPER}} .witr_team_section::before,{{WRAPPER}} .team-sec::before,{{WRAPPER}} .witr_team_sec_3::before,{{WRAPPER}} .team-back-wraper,{{WRAPPER}} .witr_single_team:after,{{WRAPPER}} .busi_singleTeam::before,{{WRAPPER}} .witr_team_thumb_3d::before,{{WRAPPER}} .witr_back_img:after,{{WRAPPER}} .witr_team_thumb4::before',
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
						'{{WRAPPER}} .witr_team_section::before,{{WRAPPER}} .team-sec::before,{{WRAPPER}} .witr_team_sec_3::before,{{WRAPPER}} .team-back-wraper,{{WRAPPER}} .witr_team_section img,{{WRAPPER}} .witr_single_team:after,{{WRAPPER}} .witr_single_team img,{{WRAPPER}} .busi_singleTeam::before,{{WRAPPER}} .busi_singleTeam img,{{WRAPPER}} .witr_team_front_3d,{{WRAPPER}} .witr_team_back_3d,{{WRAPPER}} .witr_back_img:after,{{WRAPPER}} .witr_back_img img,{{WRAPPER}} .front_view,{{WRAPPER}} .witr_team_thumb4::before,{{WRAPPER}} .witr_team_thumb4 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
			
			/*  heading */
			$this->add_responsive_control(
				'witr_heading7_color',
				[
					'label' => esc_html__( 'This Style 7 Work Only ', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'separator'=>'before',
					'condition' => [
						'witr_style_team' => ['7'],
					],					
				]
			);
			/*  Image height */
			$this->add_responsive_control(
				'witr_7_height',
				[
					'label' => esc_html__( 'Image Height', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'separator'=>'before',
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 1000,
						],
					],					
					'selectors' => [
						'{{WRAPPER}} .busi_singleTeam img' => 'height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_team' => ['7'],
					],					
				]
			);			
			/*  heading */
			$this->add_responsive_control(
				'witr_heading_color',
				[
					'label' => esc_html__( 'After/Before Color', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'condition' => [
						'witr_style_team' => ['7'],
					],					
				]
			);
			
			/* After/Before background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_ab_background',
					'label' => esc_html__( 'Single Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .busi_TMHover::before,{{WRAPPER}} .busi_TMHover::after',
					'condition' => [
						'witr_style_team' => ['7'],
					],					
				]
			);
			/*  Before width */
			$this->add_responsive_control(
				'witr_before_width',
				[
					'label' => esc_html__( 'Before width', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 500,
						],
					],					
					'selectors' => [
						'{{WRAPPER}} .busi_TMHover::before' => 'width: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_team' => ['7'],
					],					
				]
			);
			/*  Before height */
			$this->add_responsive_control(
				'witr_before_height',
				[
					'label' => esc_html__( 'Before Height', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 500,
						],
					],					
					'selectors' => [
						'{{WRAPPER}} .busi_TMHover::before' => 'height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_team' => ['7'],
					],					
				]
			);
			/* witr_top Before */
			$this->add_responsive_control(
				'witr_topt_before',
				[
					'label' => esc_html__( 'Before Top', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
						],
						'%' => [
							'min' => 0,
							'max' => 500,
						],
						'em' => [
							'min' => 0,
							'max' => 500,
						],
					],					
					'selectors' => [
						'{{WRAPPER}} .busi_TMHover::before' => 'top: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_team' => ['7'],
					],					
				]
			);
			/* witr_left Before */
			$this->add_responsive_control(
				'witr_leftl_before',
				[
					'label' => esc_html__( 'Before Left', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
						],
						'%' => [
							'min' => 0,
							'max' => 500,
						],
						'em' => [
							'min' => 0,
							'max' => 500,
						],
					],					
					'selectors' => [
						'{{WRAPPER}} .busi_TMHover::before' => 'left: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_team' => ['7'],
					],					
				]
			);

			/* witr_right before */
			$this->add_responsive_control(
				'witr_rightr_before',
				[
					'label' => esc_html__( 'Before Right', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
						],
						'%' => [
							'min' => 0,
							'max' => 500,
						],
						'em' => [
							'min' => 0,
							'max' => 500,
						],
					],					
					'selectors' => [
						'{{WRAPPER}} .busi_TMHover::before' => 'right: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_team' => ['7'],
					],					
				]
			);			
			/*  After width */
			$this->add_responsive_control(
				'witr_after_width',
				[
					'label' => esc_html__( 'After width', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'separator'=>'before',
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 500,
						],
					],					
					'selectors' => [
						'{{WRAPPER}} .busi_TMHover::after' => 'width: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_team' => ['7'],
					],					
				]
			);
			/*  After height */
			$this->add_responsive_control(
				'witr_after_height',
				[
					'label' => esc_html__( 'After Height', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 500,
						],
					],					
					'selectors' => [
						'{{WRAPPER}} .busi_TMHover::after' => 'height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_team' => ['7'],
					],					
				]
			);			

			/* witr_left After */
			$this->add_responsive_control(
				'witr_leftl_after',
				[
					'label' => esc_html__( 'After Left', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
						],
						'%' => [
							'min' => 0,
							'max' => 500,
						],
						'em' => [
							'min' => 0,
							'max' => 500,
						],
					],					
					'selectors' => [
						'{{WRAPPER}} .busi_TMHover::after' => 'left: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_team' => ['7'],
					],					
				]
			);

			/* witr_right After */
			$this->add_responsive_control(
				'witr_rightr_after',
				[
					'label' => esc_html__( 'After Right', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
						],
						'%' => [
							'min' => 0,
							'max' => 500,
						],
						'em' => [
							'min' => 0,
							'max' => 500,
						],
					],					
					'selectors' => [
						'{{WRAPPER}} .busi_TMHover::after' => 'right: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_team' => ['7'],
					],					
				]
			);					
			/* witr_bottom After */
			$this->add_responsive_control(
				'witr_bottomb_after',
				[
					'label' => esc_html__( 'After Bottom', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
						],
						'%' => [
							'min' => 0,
							'max' => 500,
						],
						'em' => [
							'min' => 0,
							'max' => 500,
						],
					],					
					'selectors' => [
						'{{WRAPPER}} .busi_TMHover::after' => 'bottom: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_team' => ['7'],
					],					
				]
			);			
	
		
		$this->end_controls_section();
		/*===== end background Overlay =====*/	
		
		
		/*===== start  all_text =====*/
		$this->start_controls_section(
			'section_all_text_color',
			[
				'label' => esc_html__( 'Top All Text Color', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_team' => ['9'],
				],
			]
		);		
		
			/* color */
			$this->add_control(
				'witr_text_color',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .witr_back_content h5,{{WRAPPER}} .witr_back_content span,{{WRAPPER}} .witr_back_content p' => 'color: {{VALUE}}',
					],
				]
			);		

		$this->end_controls_section();
		/*===== end all_text =====*/
		
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
		
		/*=== start witr_image style ====*/
		$this->start_controls_section(
			'witr_style_imagr_Option',
			[
				'label' => esc_html__( ' Images Radius option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_team' => ['9','12','13','14'],
				],				
			]
		);
				/*  image width */
				$this->add_responsive_control(
					'witr_imagew_width',
					[
						'label' => esc_html__( 'width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'separator'=>'before',
						'description' =>"Default width ex-200px from here",
						'range' => [
							'px' => [
								'min' => 25,
								'max' => 1920,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .front_view img' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  image height */
				$this->add_responsive_control(
					'witr_imageh_height',
					[
						'label' => esc_html__( 'Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'description' =>"Default Height ex-200px from here",
						'range' => [
							'px' => [
								'min' => 25,
								'max' => 1000,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .front_view img' => 'height: {{SIZE}}{{UNIT}};',
						],
					]			
				);
				/* border_radius */
				$this->add_control(
					'witr_imara_br',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'description' =>esc_html__('When Show Animation Set Not Work Border Radius, Default Border Radius ex-100px from here','themex'),
						'selectors' => [
							'{{WRAPPER}} .front_view img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
		
	$this->end_controls_section();
		/*=== end  witr_image style ====*/		


		/*=== start witr_inner_box style 3 ====*/
		$this->start_controls_section(
			'section_style_inner_box',
			[
				'label' => esc_html__( 'Image Border Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_team' => ['14'],
				],				
				
			]
		);
			/*=== start icon_tabs style ====*/
			$this->start_controls_tabs( 'img_colors' );		
				/*=== start inner_box hover style ====*/
				$this->start_controls_tab(
					'inner_box_colors_Normal',
						[
							'label' => esc_html__( 'Normal', 'themex' ),
						]
					);		
						
				/* witr border */
				$this->add_control(
					'witr_inner_border',
					[
						'label' => esc_html__( 'Border', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'selectors' => [
							'{{WRAPPER}} .team_s14_image::before,{{WRAPPER}} .team_s14_image::after' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]							
				);
				/* border_color */
				$this->add_control(
					'witr_inner_border_color',
					[
						'label' => esc_html__( 'Border Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .team_s14_image::before,{{WRAPPER}} .team_s14_image::after' => 'border-color: {{VALUE}}',
						],
					]
				);						

				$this->end_controls_tab();
				/*=== end inner_box normal style ====*/
			
				/*=== start inner_box hover style ====*/
				$this->start_controls_tab(
					'inner_box_colors_hover',
						[
							'label' => esc_html__( 'Hover', 'themex' ),
						]
					);
			
				/*  primary hover color */
				$this->add_control(
					'witr_innbox_hoverbord',
					[
						'label' => esc_html__( 'Border Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',
						'selectors' => [
							'{{WRAPPER}} .team_s14_image:hover::before,{{WRAPPER}} .team_s14_image:hover::after' => 'border-color: {{VALUE}}',
						],
					]
				);	
					
				$this->end_controls_tab();
				/*=== end inner_box hover style ====*/	
			$this->end_controls_tabs();
			/*=== end inner_box_tabs style ====*/
		$this->end_controls_section();
		/*=== end witr_inner_box style ====*/		


		/*=== start witr_inner_box style 3 ====*/
		$this->start_controls_section(
			'section_style_border_box',
			[
				'label' => esc_html__( 'Box Border Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_team' => ['13'],
				],				
				
			]
		);

			/* Border background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_border_background',
					'label' => esc_html__( ' Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .team_line_top,{{WRAPPER}} .team_line_bottom,{{WRAPPER}} .team_line_left,{{WRAPPER}} .team_line_right',
				]
			);



		$this->end_controls_section();
		/*=== end witr_inner_box style ====*/








		

    }/*==function end==*/

    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();		
		$txbd_image = ! empty($witrshowdata['witr_team_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witrshowdata, 'txbd_image_size', 'witr_team_image' ) : '';	
		
		
		switch ( $witrshowdata['witr_style_team'] ) {	
		case '15':
		?>

			<div class=" witr_team_15n all_color_team <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
				<?php if( ! empty($witrshowdata['witr_team_image']['url'])){?>
					<div class="witr_team_thumb15">
						<?php echo $txbd_image; ?>					
						<div class="team_top_icon all_team_icon_o_color">
							<ul>
								<li>					
									<?php if( ! empty($witrshowdata['witr_team_icons'])){
										foreach($witrshowdata['witr_team_icons'] as $witr_single_social){?>											
											<!-- icon -->
											<a href="<?php echo $witr_single_social['witr_icons_link']['url'];?>">
												<i class="<?php echo esc_attr( $witr_single_social['witr_icon_team']['value']);?>"></i>
											</a>		
										<?php } ?>
									<?php } ?>
								</li>
							</ul>	
						</div>
						<?php if($witrshowdata['witr_top_icon_show']=='yes'){?>
						<div class="team_bottom_icon all_team_s_color">					
							<a href="<?php echo $witrshowdata['witr_icot1_link'] ['url']; ?>">
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item1'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item1']['value']);?>"></i>
								<?php }?>
							</a>
						</div> 
						<?php }?>
					</div>
					<?php }?>
					<div class="witr_team_content15 all_content_bg_color">					
						<!-- title -->
						<?php if(isset($witrshowdata['witr_team_title']) && ! empty($witrshowdata['witr_team_title'])){?>
						<?php if($witrshowdata['witr_team_title_link'] ['url']){?> 
							<h5><a href="<?php echo $witrshowdata['witr_team_title_link'] ['url']; ?>"><?php echo $witrshowdata['witr_team_title']; ?></a></h5>
						<?php }else{ ?>
						<h5><?php echo $witrshowdata['witr_team_title']; ?> </h5>
						<?php }	?>
						<?php } ?>				
						<!-- subtitle -->
						<?php if(isset($witrshowdata['witr_team_subtitle']) && ! empty($witrshowdata['witr_team_subtitle'])){?>
							<span><?php echo $witrshowdata['witr_team_subtitle']; ?> </span>	
						<?php }?>					

					</div>						
						
						
			</div> 

		<?php
		break ;
		case '14':
		?>	

			<div class="cons_singleTeam all_color_team witr_team_s14 witr_team_s12 <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
				<div class="front_view">
					<?php if( ! empty($witrshowdata['witr_team_image']['url'])){?>
						<div class="team_s14_image">
							<?php echo $txbd_image; ?>
						</div>	
					<?php } ?>
					
					<div class="all_content_bg_color">
					<!-- title -->
					<?php if(isset($witrshowdata['witr_team_title']) && ! empty($witrshowdata['witr_team_title'])){?>
					<?php if($witrshowdata['witr_team_title_link'] ['url']){?> 
						<h5><a href="<?php echo $witrshowdata['witr_team_title_link'] ['url']; ?>"><?php echo $witrshowdata['witr_team_title']; ?></a></h5>
					<?php }else{ ?>
					<h5><?php echo $witrshowdata['witr_team_title']; ?> </h5>
					<?php }	?>
					<?php } ?>
						<!-- subtitle -->
						<?php if(isset($witrshowdata['witr_team_subtitle']) && ! empty($witrshowdata['witr_team_subtitle'])){?>
							<span><?php echo $witrshowdata['witr_team_subtitle']; ?></span>
						<?php }?>
						<div class="all_team_s_color con_TMS">
							<?php if( ! empty($witrshowdata['witr_team_icons'])){
								foreach($witrshowdata['witr_team_icons'] as $witr_single_social){?>											
									<!-- icon -->
									<a href="<?php echo $witr_single_social['witr_icons_link']['url'];?>">
										<i class="<?php echo esc_attr( $witr_single_social['witr_icon_team']['value']);?>"></i>									
									</a>		
								<?php } ?>
							<?php } ?>										
						</div>
					</div>
	
				</div>
			</div>

		<?php
		break ;
		case '13':
		?>	

			<div class="cons_singleTeam all_color_team witr_team_s13 witr_team_s12 <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
				<div class="front_view">
					<div class="witr_i_position">
						<!-- image -->
						<?php echo $txbd_image; ?>
						<?php if($witrshowdata['witr_icon_show']=='yes'){ ?>						
							<div class="all_team_icon_o_color con_TMS13_icon con_TMS">
								<?php if( ! empty($witrshowdata['witr_team_icons'])){
									foreach($witrshowdata['witr_team_icons'] as $witr_single_social){?>											
										<!-- icon -->
										<a href="<?php echo $witr_single_social['witr_icons_link']['url'];?>">
											<i class="<?php echo esc_attr( $witr_single_social['witr_icon_team']['value']);?>"></i>
										</a>		
									<?php } ?>
								<?php } ?>										
							</div>
						<?php } ?>
					</div>								
					
					<div class="all_content_bg_color">
					<!-- title -->
					<?php if(isset($witrshowdata['witr_team_title']) && ! empty($witrshowdata['witr_team_title'])){?>
					<?php if($witrshowdata['witr_team_title_link'] ['url']){?> 
						<h5><a href="<?php echo $witrshowdata['witr_team_title_link'] ['url']; ?>"><?php echo $witrshowdata['witr_team_title']; ?></a></h5>
					<?php }else{ ?>
					<h5><?php echo $witrshowdata['witr_team_title']; ?> </h5>
					<?php }	?>
					<?php } ?>
						<!-- subtitle -->
						<?php if(isset($witrshowdata['witr_team_subtitle']) && ! empty($witrshowdata['witr_team_subtitle'])){?>
							<span><?php echo $witrshowdata['witr_team_subtitle']; ?></span>
						<?php }?>

					</div>
				</div>
				<div class="team_line team_line_top"></div>				
				<div class="team_line team_line_bottom"></div>				
				<div class="team_line team_line_left"></div>				
				<div class="team_line team_line_right"></div>				
			</div>

		<?php
		break ;
		
		case '12':
		?>	

                        <div class="cons_singleTeam all_color_team witr_team_s12 <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
                            <div class="front_view">
								<!-- image -->
								<?php echo $txbd_image; ?>
								<div class="all_content_bg_color front_view_box">
								<!-- title -->
								<?php if(isset($witrshowdata['witr_team_title']) && ! empty($witrshowdata['witr_team_title'])){?>
								<?php if($witrshowdata['witr_team_title_link'] ['url']){?> 
									<h5><a href="<?php echo $witrshowdata['witr_team_title_link'] ['url']; ?>"><?php echo $witrshowdata['witr_team_title']; ?></a></h5>
								<?php }else{ ?>
								<h5><?php echo $witrshowdata['witr_team_title']; ?> </h5>
								<?php }	?>
								<?php } ?>
									<!-- subtitle -->
									<?php if(isset($witrshowdata['witr_team_subtitle']) && ! empty($witrshowdata['witr_team_subtitle'])){?>
										<span><?php echo $witrshowdata['witr_team_subtitle']; ?></span>
									<?php }?>
									<!-- content -->
									<?php if(isset($witrshowdata['witr_team_content']) && ! empty($witrshowdata['witr_team_content'])){?>
										<p><?php echo $witrshowdata['witr_team_content']; ?> </p>	
									<?php }?>
									<div class="all_team_s_color con_TMS">
										<?php if( ! empty($witrshowdata['witr_team_icons'])){
											foreach($witrshowdata['witr_team_icons'] as $witr_single_social){?>											
												<!-- icon -->
												<a href="<?php echo $witr_single_social['witr_icons_link']['url'];?>">
													<i class="<?php echo esc_attr( $witr_single_social['witr_icon_team']['value']);?>"></i>
												</a>		
											<?php } ?>
										<?php } ?>										
									</div>
								</div>
				
                            </div>
                        </div>

		<?php
		break ;
		
		
		case '11':
		?>
			<div class="team-part all_color_team witr_team_s11ar <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
				<div class="witr_team_section witr_team_s11a">
					<!-- image -->
					<?php echo $txbd_image; ?>
					<div class="team_overlay_icon all_team_icon_o_color">
						<a href="<?php echo $witrshowdata['witr_icot1_link']['url'];?>">
							<!-- icon -->
							<?php if( ! empty($witrshowdata['witr_icon_item1'])){?>
								<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item1']['value']);?>"></i>
							<?php }?>
						</a>
					</div>
					
					<!-- subtitle -->
					<?php if(isset($witrshowdata['witr_team_subtitle']) && ! empty($witrshowdata['witr_team_subtitle'])){?>
					<div class="witr_team_s11">
						<span><?php echo $witrshowdata['witr_team_subtitle']; ?> </span>	
					</div>	
					<?php }?>					
					
				</div> <!-- team sec -->
				<div class="witr_team_content witr_team_s11t all_content_bg_color text-center">
					<!-- title -->
					<?php if(isset($witrshowdata['witr_team_title']) && ! empty($witrshowdata['witr_team_title'])){?>
					<?php if($witrshowdata['witr_team_title_link'] ['url']){?> 
						<h5><a href="<?php echo $witrshowdata['witr_team_title_link'] ['url']; ?>"><?php echo $witrshowdata['witr_team_title']; ?></a></h5>
					<?php }else{ ?>
					<h5><?php echo $witrshowdata['witr_team_title']; ?> </h5>
					<?php }	?>
					<?php } ?>				
			
				</div> <!-- team conten -->
			</div>		

		<?php
		break ;
		case '10':
		?>

			<div class="witr_team_part witr_team_10n all_color_team <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
				<div class="witr_team_sec_4">
					<!-- image -->
					<div class="witr_team_thumb4">
						<?php echo $txbd_image; ?>					
						<div class="witr_team_top all_team_icon_o_color">
							<ul>
								<li>					
									<?php if( ! empty($witrshowdata['witr_team_icons'])){
										foreach($witrshowdata['witr_team_icons'] as $witr_single_social){?>											
											<!-- icon -->
											<a href="<?php echo $witr_single_social['witr_icons_link']['url'];?>">
												<i class="<?php echo esc_attr( $witr_single_social['witr_icon_team']['value']);?>"></i>
											</a>		
										<?php } ?>
									<?php } ?>
								</li>
							</ul>	
						</div>
						<?php if($witrshowdata['witr_top_icon_show']=='yes'){?>
						<div class="witr_bottom_icon all_team_s_color">					
							<a href="<?php echo $witrshowdata['witr_icot1_link'] ['url']; ?>">
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item1'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item1']['value']);?>"></i>
								<?php }?>								
							</a>
						</div> 
						<?php }?>						
						<div class="witr_team_content4 all_content_bg_color">					
							<!-- title -->
							<?php if(isset($witrshowdata['witr_team_title']) && ! empty($witrshowdata['witr_team_title'])){?>
							<?php if($witrshowdata['witr_team_title_link'] ['url']){?> 
								<h5><a href="<?php echo $witrshowdata['witr_team_title_link'] ['url']; ?>"><?php echo $witrshowdata['witr_team_title']; ?></a></h5>
							<?php }else{ ?>
							<h5><?php echo $witrshowdata['witr_team_title']; ?> </h5>
							<?php }	?>
							<?php } ?>				
							<!-- subtitle -->
							<?php if(isset($witrshowdata['witr_team_subtitle']) && ! empty($witrshowdata['witr_team_subtitle'])){?>
								<span><?php echo $witrshowdata['witr_team_subtitle']; ?> </span>	
							<?php }?>					

						</div>						
						
					</div>	

				</div> 
			</div> 

		<?php
		break ;
		
		case '9':
		?>	

                        <div class="cons_singleTeam all_color_team ">
                            <div class="front_view <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
								<!-- image -->
								<?php echo $txbd_image; ?>
								<div class="all_content_bg_color front_view_box ">
									<!-- title -->
									<?php if(isset($witrshowdata['witr_team_title']) && ! empty($witrshowdata['witr_team_title'])){?>
									<?php if($witrshowdata['witr_team_title_link'] ['url']){?> 
										<h5><a href="<?php echo $witrshowdata['witr_team_title_link'] ['url']; ?>"><?php echo $witrshowdata['witr_team_title']; ?></a></h5>
									<?php }else{ ?>
									<h5><?php echo $witrshowdata['witr_team_title']; ?> </h5>
									<?php }	?>
									<?php } ?>
									<!-- subtitle -->
									<?php if(isset($witrshowdata['witr_team_subtitle']) && ! empty($witrshowdata['witr_team_subtitle'])){?>
										<span><?php echo $witrshowdata['witr_team_subtitle']; ?></span>
									<?php }?>
									<!-- content -->
									<?php if(isset($witrshowdata['witr_team_content']) && ! empty($witrshowdata['witr_team_content'])){?>
										<p><?php echo $witrshowdata['witr_team_content']; ?> </p>	
									<?php }?>
									<div class="all_team_s_color con_TMS">
										<?php if( ! empty($witrshowdata['witr_team_icons'])){
											foreach($witrshowdata['witr_team_icons'] as $witr_single_social){?>											
												<!-- icon -->
												<a href="<?php echo $witr_single_social['witr_icons_link']['url'];?>">
													<i class="<?php echo esc_attr( $witr_single_social['witr_icon_team']['value']);?>"></i>
												</a>		
											<?php } ?>
										<?php } ?>										
									</div>
								</div>
				
                            </div>
                            <div class="back_view ">
								<div class="witr_back_img">
									<!-- image -->
									<?php echo $txbd_image; ?>
								
									<div class="witr_back_content">
										<!-- title -->
										<?php if(isset($witrshowdata['witr_team_title']) && ! empty($witrshowdata['witr_team_title'])){?>
										<?php if($witrshowdata['witr_team_title_link'] ['url']){?> 
											<h5><a href="<?php echo $witrshowdata['witr_team_title_link'] ['url']; ?>"><?php echo $witrshowdata['witr_team_title']; ?></a></h5>
										<?php }else{ ?>
										<h5><?php echo $witrshowdata['witr_team_title']; ?> </h5>
										<?php }	?>
										<?php } ?>
										<!-- subtitle -->
										<?php if(isset($witrshowdata['witr_team_subtitle']) && ! empty($witrshowdata['witr_team_subtitle'])){?>
											<span><?php echo $witrshowdata['witr_team_subtitle']; ?></span>
										<?php }?>
										<!-- content -->
										<?php if(isset($witrshowdata['witr_team_content']) && ! empty($witrshowdata['witr_team_content'])){?>
											<p><?php echo $witrshowdata['witr_team_content']; ?> </p>	
										<?php }?>
										<div class="all_team_icon_o_color con_TMS">
											<?php if( ! empty($witrshowdata['witr_team_icons'])){
												foreach($witrshowdata['witr_team_icons'] as $witr_single_social){?>											
													<!-- icon -->
													<a href="<?php echo $witr_single_social['witr_icons_link']['url'];?>">
														<i class="<?php echo esc_attr( $witr_single_social['witr_icon_team']['value']);?>"></i>
													</a>		
												<?php } ?>
											<?php } ?>										
										</div>
									</div>
								</div>
                            </div>
                        </div>

		

		<?php
		break ;
		
		case '8':
		?>		

			<div class="witr_team_cont_3d all_color_team <?php echo $witrshowdata['witr_xyz']; ?> <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
				<div class="witr_team_wrap_3d">
					<?php if( ! empty($witrshowdata['witr_team_image']['url'])){?>
					<div class="witr_team_front_3d">	
						<div class="witr_team_thumb_3d">
							<!-- image -->
							<?php echo $txbd_image; ?>		
						</div>	
					</div>
					<?php } ?>
					<div class="witr_team_back_3d">
						<div class="witr_content_waraper all_content_bg_color">
							<div class="witr_content_3d">
								<!-- title -->
								<?php if(isset($witrshowdata['witr_team_title']) && ! empty($witrshowdata['witr_team_title'])){?>
								<?php if($witrshowdata['witr_team_title_link'] ['url']){?> 
									<h5><a href="<?php echo $witrshowdata['witr_team_title_link'] ['url']; ?>"><?php echo $witrshowdata['witr_team_title']; ?></a></h5>
								<?php }else{ ?>
								<h5><?php echo $witrshowdata['witr_team_title']; ?> </h5>
								<?php }	?>
								<?php } ?>
								<!-- subtitle -->
								<?php if(isset($witrshowdata['witr_team_subtitle']) && ! empty($witrshowdata['witr_team_subtitle'])){?>
									<span><?php echo $witrshowdata['witr_team_subtitle']; ?></span>
								<?php }?>
								<!-- content -->
								<?php if(isset($witrshowdata['witr_team_content']) && ! empty($witrshowdata['witr_team_content'])){?>
									<p><?php echo $witrshowdata['witr_team_content']; ?> </p>	
								<?php }?>							
							</div>
							<div class="witr_socials_3d all_team_icon_o_color">
								<?php if( ! empty($witrshowdata['witr_team_icons'])){
									foreach($witrshowdata['witr_team_icons'] as $witr_single_social){?>											
										<!-- icon -->
										<a href="<?php echo $witr_single_social['witr_icons_link']['url'];?>">
											<i class="<?php echo esc_attr( $witr_single_social['witr_icon_team']['value']);?>"></i>
										</a>		
									<?php } ?>
								<?php } ?>										
							</div>						
						</div>
					</div>
				</div>
			</div>

 

		<?php
		break ;
		
		
		case '7':
		?>		

			<div class="busi_singleTeam all_color_team text-center <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
				<!-- image -->
				<?php echo $txbd_image; ?>			
				<div class="busi_TMHover all_content_bg_color">
					<div class="TM_center">
						<!-- title -->
						<?php if(isset($witrshowdata['witr_team_title']) && ! empty($witrshowdata['witr_team_title'])){?>
						<?php if($witrshowdata['witr_team_title_link'] ['url']){?> 
							<h5><a href="<?php echo $witrshowdata['witr_team_title_link'] ['url']; ?>"><?php echo $witrshowdata['witr_team_title']; ?></a></h5>
						<?php }else{ ?>
						<h5><?php echo $witrshowdata['witr_team_title']; ?> </h5>
						<?php }	?>
						<?php } ?>
						<!-- subtitle -->
						<?php if(isset($witrshowdata['witr_team_subtitle']) && ! empty($witrshowdata['witr_team_subtitle'])){?>
							<span><?php echo $witrshowdata['witr_team_subtitle']; ?></span>
						<?php }?>						
						<div class="busiTS all_team_icon_o_color">
							<?php if( ! empty($witrshowdata['witr_team_icons'])){
								foreach($witrshowdata['witr_team_icons'] as $witr_single_social){?>											
									<!-- icon -->
									<a href="<?php echo $witr_single_social['witr_icons_link']['url'];?>">
										<i class="<?php echo esc_attr( $witr_single_social['witr_icon_team']['value']);?>"></i>
									</a>		
								<?php } ?>
							<?php } ?>						
						</div>
					</div>
				</div>
			</div>
 

		<?php
		break ;
		
		case '6':
		?>		
			<div class="witr_team_area_c <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
				<!-- single blog -->
				<div class="all_color_team">
					<div class="witr_single_team">
						<!-- image -->
						<?php echo $txbd_image; ?>
						<div class="witr_team_content_car">
							<!-- subtitle -->
							<?php if(isset($witrshowdata['witr_team_subtitle']) && ! empty($witrshowdata['witr_team_subtitle'])){?>
								<span><?php echo $witrshowdata['witr_team_subtitle']; ?></span>
							<?php }?>									
							<!-- title -->
							<?php if(isset($witrshowdata['witr_team_title']) && ! empty($witrshowdata['witr_team_title'])){?>
							<?php if($witrshowdata['witr_team_title_link'] ['url']){?> 
								<h5><a href="<?php echo $witrshowdata['witr_team_title_link'] ['url']; ?>"><?php echo $witrshowdata['witr_team_title']; ?></a></h5>
							<?php }else{ ?>
							<h5><?php echo $witrshowdata['witr_team_title']; ?> </h5>
							<?php }	?>
							<?php } ?>									
						</div>
					</div>	
				</div>						
			</div>

		<?php
		break ;
				
		case '5':
		?>
		<div class="em-team all_color_team <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
			<div class="team-style-2">
				<div class="team-wrap">
				<?php if( ! empty($witrshowdata['witr_team_image']['url'])){?>
					<div class="team-front">
						<div class="em-content-image-inner">	
							<div class="em-content-image">
								<!-- image -->
								<?php echo $txbd_image; ?>		
							</div>		
						</div>
					</div>
					<?php } ?>
					<div class="team-back-wraper">
						<div class="team-back">
							<div class="em-content-waraper">
								<div class="em-content-title-inner">
									<div class="em-content-title">
										<!-- title -->
										<?php if(isset($witrshowdata['witr_team_title']) && ! empty($witrshowdata['witr_team_title'])){?>
										<?php if($witrshowdata['witr_team_title_link'] ['url']){?> 
											<h5><a href="<?php echo $witrshowdata['witr_team_title_link'] ['url']; ?>"><?php echo $witrshowdata['witr_team_title']; ?></a></h5>
										<?php }else{ ?>
										<h5><?php echo $witrshowdata['witr_team_title']; ?> </h5>
										<?php }	?>
										<?php } ?>					
									</div>
								</div>
								<div class="em-content-subtitle-inner">
									<div class="em-content-subtitle">
										<!-- subtitle -->
										<?php if(isset($witrshowdata['witr_team_subtitle']) && ! empty($witrshowdata['witr_team_subtitle'])){?>
											<span><?php echo $witrshowdata['witr_team_subtitle']; ?></span>
										<?php }?>				
											
									</div>
								</div>
								<div class="em-content-desc-inner">
									<div class="em-content-desc">
										<!-- content -->
										<?php if(isset($witrshowdata['witr_team_content']) && ! empty($witrshowdata['witr_team_content'])){?>
											<p><?php echo $witrshowdata['witr_team_content']; ?> </p>	
										<?php }?>
									</div>
								</div>							
								<div class="em-content-socials all_team_icon_o_color">
									<?php if( ! empty($witrshowdata['witr_team_icons'])){
										foreach($witrshowdata['witr_team_icons'] as $witr_single_social){?>											
											<!-- icon -->
											<a href="<?php echo $witr_single_social['witr_icons_link']['url'];?>">
												<i class="<?php echo esc_attr( $witr_single_social['witr_icon_team']['value']);?>"></i>
											</a>		
										<?php } ?>
									<?php } ?>									
								</div>						
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		break ;
		
		
		case '4':
		?>
			<div class="em-team all_color_team <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
				<div class="em-team-one">
				<?php if( ! empty($witrshowdata['witr_team_image']['url'])){?>
					<div class="em-team-content-image-inner">	
						<div class="em-team-content-image">
							<!-- image -->
							<?php echo $txbd_image; ?>		
						</div>	
					</div>
				<?php } ?>
				
				<div class="em-team-content-waraper all_content_bg_color">
					<div class="em-team-content-title-inner">
							<div class="em-content-title">
								<!-- title -->
								<?php if(isset($witrshowdata['witr_team_title']) && ! empty($witrshowdata['witr_team_title'])){?>
								<?php if($witrshowdata['witr_team_title_link'] ['url']){?> 
									<h5><a href="<?php echo $witrshowdata['witr_team_title_link'] ['url']; ?>"><?php echo $witrshowdata['witr_team_title']; ?></a></h5>
								<?php }else{ ?>
								<h5><?php echo $witrshowdata['witr_team_title']; ?> </h5>
								<?php }	?>
								<?php } ?>					
							
							</div>
					</div>
					<div class="em-team-content-subtitle-inner">
							<div class="em-content-subtitle">
								<!-- subtitle -->
								<?php if(isset($witrshowdata['witr_team_subtitle']) && ! empty($witrshowdata['witr_team_subtitle'])){?>
									<span><?php echo $witrshowdata['witr_team_subtitle']; ?></span>
								<?php }?>				
									
							</div>
					
					</div>
							<div class="em-team-content-socials-inner">
								<div class="em-team-content-socials all_team_s_color">			
								<?php if( ! empty($witrshowdata['witr_team_icons'])){
									foreach($witrshowdata['witr_team_icons'] as $witr_single_social){?>											
										<!-- icon -->
										<a href="<?php echo $witr_single_social['witr_icons_link']['url'];?>">
											<i class="<?php echo esc_attr( $witr_single_social['witr_icon_team']['value']);?>"></i>
										</a>		
									<?php } ?>
								<?php } ?>										
								</div>
							</div>							
					
					</div>
				</div>
				</div>
						
		<?php
		break ;		
		
		case '3':
		?>

			<div class="team-part all_color_team <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
				<div class="witr_team_sec_3">
						<!-- image -->
						<?php echo $txbd_image; ?>
					<div class="witr_team_content3 text-center all_team_icon_o_color">
						<!-- title -->
						<?php if(isset($witrshowdata['witr_team_title']) && ! empty($witrshowdata['witr_team_title'])){?>
						<?php if($witrshowdata['witr_team_title_link'] ['url']){?> 
							<h5><a href="<?php echo $witrshowdata['witr_team_title_link'] ['url']; ?>"><?php echo $witrshowdata['witr_team_title']; ?></a></h5>
						<?php }else{ ?>
						<h5><?php echo $witrshowdata['witr_team_title']; ?> </h5>
						<?php }	?>
						<?php } ?>				
						<!-- subtitle -->
						<?php if(isset($witrshowdata['witr_team_subtitle']) && ! empty($witrshowdata['witr_team_subtitle'])){?>
							<span><?php echo $witrshowdata['witr_team_subtitle']; ?> </span>	
						<?php }?>
						<!-- content -->
						<?php if(isset($witrshowdata['witr_team_content']) && ! empty($witrshowdata['witr_team_content'])){?>
							<p><?php echo $witrshowdata['witr_team_content']; ?> </p>	
						<?php }?>
						<ul class="witr_pots_team_s">
							<li>					
								<?php if( ! empty($witrshowdata['witr_team_icons'])){
									foreach($witrshowdata['witr_team_icons'] as $witr_single_social){?>											
										<!-- icon -->
										<a href="<?php echo $witr_single_social['witr_icons_link']['url'];?>">
											<i class="<?php echo esc_attr( $witr_single_social['witr_icon_team']['value']);?>"></i>
										</a>		
									<?php } ?>
								<?php } ?>
							</li>
						</ul>
					</div> <!-- team overlay -->
					<div class="team-social all_team_s_color all_icon_bg_color">
						<ul class="witr_pots_team_s">
							<li>					
								<?php if( ! empty($witrshowdata['witr_team_icons'])){
									foreach($witrshowdata['witr_team_icons'] as $witr_single_social){?>											
										<!-- icon -->
										<a href="<?php echo $witr_single_social['witr_icons_link']['url'];?>">
											<i class="<?php echo esc_attr( $witr_single_social['witr_icon_team']['value']);?>"></i>
										</a>		
									<?php } ?>
								<?php } ?>
							</li>
						</ul>
					</div> <!-- team social -->
				</div> <!-- team sec -->
			</div> <!-- team part -->

		<?php
		break ;

		case '2':
		?>
			<div class="team-part all_color_team <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
				<div class="team-sec">
						<!-- image -->
						<?php echo $txbd_image; ?>
					<div class="witr_team_content2 text-center">
						<!-- title -->
						<?php if(isset($witrshowdata['witr_team_title']) && ! empty($witrshowdata['witr_team_title'])){?>
						<?php if($witrshowdata['witr_team_title_link'] ['url']){?> 
							<h5><a href="<?php echo $witrshowdata['witr_team_title_link'] ['url']; ?>"><?php echo $witrshowdata['witr_team_title']; ?></a></h5>
						<?php }else{ ?>
						<h5><?php echo $witrshowdata['witr_team_title']; ?> </h5>
						<?php }	?>
						<?php } ?>				
						<!-- subtitle -->
						<?php if(isset($witrshowdata['witr_team_subtitle']) && ! empty($witrshowdata['witr_team_subtitle'])){?>
							<span><?php echo $witrshowdata['witr_team_subtitle']; ?> </span>	
						<?php }?>
						<!-- content -->
						<?php if(isset($witrshowdata['witr_team_content']) && ! empty($witrshowdata['witr_team_content'])){?>
							<p><?php echo $witrshowdata['witr_team_content']; ?> </p>	
						<?php }?>
						
					</div>
					<div class="team-social all_team_s_color team-over all_icon_bg_color">
						<ul class="witr_pots_team_s">
							<li>					
								<?php if( ! empty($witrshowdata['witr_team_icons'])){
									foreach($witrshowdata['witr_team_icons'] as $witr_single_social){?>											
										<!-- icon -->
										<a href="<?php echo $witr_single_social['witr_icons_link']['url'];?>">
											<i class="<?php echo esc_attr( $witr_single_social['witr_icon_team']['value']);?>"></i>
										</a>		
									<?php } ?>
								<?php } ?>
							</li>
						</ul>							
					</div>
				</div> <!-- team sec -->
			</div>		
		<?php
		break;
		
		default:
		?>
				
		
			<div class="team-part all_color_team <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
				<div class="witr_team_section">
					<!-- image -->
					<?php echo $txbd_image; ?>
					<?php if($witrshowdata['witr_top_icon_show']=='yes'){?>
						<div class="team_overlay_icon all_team_icon_o_color">
							<a href="<?php echo $witrshowdata['witr_icot1_link']['url'];?>">
							<!-- icon -->
							<?php if( ! empty($witrshowdata['witr_icon_item1'])){?>
								<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item1']['value']);?>"></i>
							<?php }?>
							</a>
						</div>
					<?php }?>
				</div> <!-- team sec -->
				<div class="witr_team_content all_content_bg_color text-center">
					<!-- title -->
					<?php if(isset($witrshowdata['witr_team_title']) && ! empty($witrshowdata['witr_team_title'])){?>
					<?php if($witrshowdata['witr_team_title_link'] ['url']){?> 
						<h5><a href="<?php echo $witrshowdata['witr_team_title_link'] ['url']; ?>"><?php echo $witrshowdata['witr_team_title']; ?></a></h5>
					<?php }else{ ?>
					<h5><?php echo $witrshowdata['witr_team_title']; ?> </h5>
					<?php }	?>
					<?php } ?>					
					<!-- subtitle -->
					<?php if(isset($witrshowdata['witr_team_subtitle']) && ! empty($witrshowdata['witr_team_subtitle'])){?>
						<span><?php echo $witrshowdata['witr_team_subtitle']; ?> </span>	
					<?php }?>				
				</div> <!-- team conten -->
			</div>		
		<?php
		break;
	
	
	
		} /* end switch */
		
		
		
    } /* == register_controls function end== */



}