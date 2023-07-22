<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Button extends Widget_Base {

    public function get_name() {
        return 'witr_section_button';
    }
    
    public function get_title() {
        return esc_html__( ' Buttons', 'themex' );
    }
	public function get_style_depends() {
        return [ 'wbtn' ];
    }
    public function get_icon() {
        return 'themex_icon eicon-button';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

  
    protected function register_controls() {
		
			
			

			/* === w_button start === */
			$this->start_controls_section(
				'witr_field_display_button',
				[
					'label' => esc_html__( ' Buttons Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
			
			
			
					/*  witr_button_select */
					$this->add_control(
						'witr_button_select',
						[
							'label' => esc_html__( 'Button Select', 'themex' ),
							'type' => Controls_Manager::SELECT,
							'description' =>"Set your Button Select here",
							'separator' => 'before',					
							'default' => '1',
							'options' => [
								'1' => esc_html__( 'Default Button', 'themex' ),
								'2' => esc_html__( 'Gradient Button', 'themex' ),
								'3' => esc_html__( 'Only Video Icon', 'themex' ),
								'4' => esc_html__( 'Video Button With Text', 'themex' ),
							],
						]
					);
					/*  witr_button_select */
					$this->add_control(
						'witr_hidden_view',
						[
							'label' => __( 'Only Video Icon Style Is All Video Icon 1-4', 'themex' ),
							'type' => Controls_Manager::HEADING,
							'default' => 'heading',
							'condition' => [
								'witr_button_select' => ["3"],
							],							
						]
					);
				/*  button witr_btn_button */	
				$this->add_control(
					'witr_btn_button',
					[
						'label' => esc_html__( 'Select For Show Button', 'themex' ),
						'type' => Controls_Manager::SELECT2,
						'multiple' => true,
						'options' => [
							'b1' => esc_html__( 'Default Button 1', 'themex' ),
							'b2'  => esc_html__( 'Default Border Button 2', 'themex' ),
							'b3' => esc_html__( 'Default Video Button 3', 'themex' ),
							'b4'  => esc_html__( 'Default Border Video Button 4', 'themex' ),						
						],
						'default' => ['b1','b2'],
						'condition' => [
							'witr_button_select' => ["1","2","3"],
						],						
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
						'{{WRAPPER}} .witr_btn_sinner' => 'text-align: {{VALUE}}',
					],
				]
			);
				/* witr_show_button witr_banner_button	*/
		
					$this->add_control(
						'witr_banner_button',
						[
							'label' => esc_html__( 'BG Button text', 'themex' ),
							'label_block' =>true,
							'type' => Controls_Manager::TEXT,
							'description' =>esc_html__('Insert button text. It hidden when field blank.','themex'),							
							'default' => esc_html__( 'Explor features', 'themex' ),
							'placeholder' => esc_attr__( 'Type your button text here', 'themex' ),
							'condition' => [
								'witr_button_select' => ["1","2","4"],
							],							
						]
					);
				/* main banner witr_button_link */	
					$this->add_control(
						'witr_button_link',
						[
							'label' => esc_html__( 'Button Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert button link here.','themex'),
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => '#',
							],	
							'condition' => [
								'witr_button_select' => ["1","2","4"],
							],							
						]
					);
					

						$this->add_control(
						'witr_banner_buttonb',
						[
							'label' => esc_html__( 'Border Button text', 'themex' ),
							'label_block' =>true,
							'type' => Controls_Manager::TEXT,
							'description' =>esc_html__('Insert button text. It hidden when field blank.','themex'),							
							'default' => esc_html__( 'Our Contact', 'themex' ),
							'placeholder' => esc_attr__( 'Type your button text here', 'themex' ),
							'condition' => [
								'witr_button_select' => ["1","2"],
							],							
						]
					);
				/* main banner witr_button_link */	
					$this->add_control(
						'witr_button_linkb',
						[
							'label' => esc_html__( 'Border Button Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert button link here.','themex'),
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => '#',
							],	
							'condition' => [
								'witr_button_select' => ["1","2"],
							],							
						]
					);
					/* witr_icon_item */
					$this->add_control(
						'witr_show_icon',
						[
							'label' => esc_html__( 'Show Icon For Button', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'separator'=>'before',
							'return_value' => 'yes',
							'default' => 'no',
							'condition' => [
								'witr_button_select' => ['1','2','4'],
							],							
						]
					);
					/*  witr_service2_pluse	*/
					$this->add_control(
						'witr_icon_item',
						[
							'label' => esc_html__( 'Button Icon Name', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Type Icofont - https://icofont.com/icons or Themify Icon - https://themify.me/themify-icons or Fontawesome Icon - https://fontawesome.com/v4.7.0/icons/ name here', 'themex' ),
							'default' => esc_html__( 'icofont-arrow-right', 'themex' ),
							'placeholder' => esc_attr__( 'Type your Button Icon Name here', 'themex' ),
							'condition' => [
								'witr_button_select' => ['1','2','4'],
								'witr_show_icon' => 'yes',
							],							
						]
					);										
					/* witr_icon_item */
					$this->add_control(
						'witr_show_icon2',
						[
							'label' => esc_html__( 'Show Icon For Video Button', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'separator'=>'before',
							'return_value' => 'yes',
							'default' => 'yes',
							'condition' => [
								'witr_button_select' => ['1','2','3','4'],
							],							
						]
					);
					/* witr_icon_item2 */
					$this->add_control(
						'witr_icon_item2',
						[
							'label' => esc_html__( 'Button Icon Name', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Type Icofont - https://icofont.com/icons or Themify Icon - https://themify.me/themify-icons or Fontawesome Icon - https://fontawesome.com/v4.7.0/icons/ name here', 'themex' ),
							'default' => esc_html__( 'icofont-ui-play', 'themex' ),
							'placeholder' => esc_attr__( 'Type your Button Icon Name here', 'themex' ),
							'condition' => [
								'witr_show_icon2' => 'yes',
								'witr_button_select' => ['1','2','3','4'],
							],							
						]
					);					
						
				/* witr_show_button witr_vshow_button witr_video_button	*/			
					$this->add_control(
						'witr_video_button',
						[
							'label' => esc_html__( 'Video BG Button Text', 'themex' ),
							'label_block' =>true,
							'type' => Controls_Manager::TEXT,
							'description' =>esc_html__('Insert button text. It hidden when field blank.','themex'),
							'default' => esc_html__( 'Watch Video', 'themex' ),
							'placeholder' => esc_attr__( 'Type your button text here', 'themex' ),
							'separator'=>'before',
							'condition' => [
								'witr_button_select' => ["1","2"],
							],							
						]
					);
					
					/*  witr_button_select 1 */
					$this->add_control(
						'witr_slectv_button',
						[
							'label' => esc_html__('Select Video Lnik', 'themex' ),
							'type' => Controls_Manager::SELECT,
							'description' =>esc_html__('select link here','themex'),
							'separator' => 'before',
							'label_block' =>true,							
							'default' => 'youtube',
							'options' => [
								' ' => esc_html__( 'Select Video Link', 'themex' ),
								'youtube' => esc_html__( 'Youtube Video Link', 'themex' ),
								'vimeo' => esc_html__( 'Vimeo Vimeo Link', 'themex' ),
							],
							'condition' => [
								'witr_button_select' => ["1","2","3","4"],
							],									
						]
					);


					
				/* witr_show_button  witr_yvideo_link	*/					
					$this->add_control(
						'witr_yvideo_link',
						[
							'label' => esc_html__( 'Youtube Video Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Enter the Youtube URL. For example: https://youtu.be/BS4TUd7FJSg','themex'),
							'placeholder' => esc_attr__( 'https://youtu.be/BS4TUd7FJSg', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => 'https://youtu.be/BS4TUd7FJSg',
							],	
							'condition' => [
								'witr_slectv_button' => ["youtube"],
								'witr_button_select' => ["1","2","3","4"],
							],							
						]
					);						
					/* main banner witr_vmvideo_link */						
					$this->add_control(
						'witr_vmvideo_link',
						[
							'label' => esc_html__( 'Vimeo Video Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Enter the Vimeo URL. For example: https://vimeo.com/487097600','themex'),
							'placeholder' => esc_attr__( 'https://vimeo.com/487097600', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => 'https://vimeo.com/487097600',
							],	
							'condition' => [
								'witr_slectv_button' => ["vimeo"],
								'witr_button_select' => ["1","2","3","4"],
							],							
						]
					);


					/* Youtube & Vimeo Link 2	*/					
					$this->add_control(
						'witr_video_headding',
						[
							'label' => esc_html__( 'Video Border Button Text', 'themex' ),
							'type' => Controls_Manager::HEADING,
							'separator'=>'before',
							'condition' => [
								'witr_button_select' => ["1","2"],
							],							
						]
					);					
					
					/* Youtube & Vimeo Link 2	*/					
					$this->add_control(
						'witr_video_border',
						[
							'label' => esc_html__( 'Video Border Button Text Here', 'themex' ),
							'label_block' =>true,
							'type' => Controls_Manager::TEXT,
							'description' =>esc_html__('Insert button text. It hidden when field blank.','themex'),
							'default' => esc_html__( 'Play Video', 'themex' ),
							'placeholder' => esc_attr__( 'Type your Video Border button text here', 'themex' ),
							'separator'=>'before',
							'condition' => [
								'witr_button_select' => ["1","2"],
							],							
						]
					);
					
					/*  witr_slectv_border */
					$this->add_control(
						'witr_slectv_border',
						[
							'label' => esc_html__('Select Video Lnik', 'themex' ),
							'type' => Controls_Manager::SELECT,
							'description' =>esc_html__('select link here','themex'),
							'separator' => 'before',
							'label_block' =>true,							
							'default' => 'youtube',
							'options' => [
								' ' => esc_html__( 'Select Video Link', 'themex' ),
								'youtube' => esc_html__( 'Youtube Video Link', 'themex' ),
								'vimeo' => esc_html__( 'Vimeo Vimeo Link', 'themex' ),
							],
							'condition' => [
								'witr_button_select' => ["1","2"],
							],									
						]
					);


					
				/* witr_yvideo_linkb	*/					
					$this->add_control(
						'witr_yvideo_linkb',
						[
							'label' => esc_html__( 'Youtube Video Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Enter the Youtube URL. For example: https://youtu.be/BS4TUd7FJSg','themex'),
							'placeholder' => esc_attr__( 'https://youtu.be/BS4TUd7FJSg', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => 'https://youtu.be/BS4TUd7FJSg',
							],	
							'condition' => [
								'witr_slectv_border' => ["youtube"],
								'witr_button_select' => ["1","2"],
							],							
						]
					);						
					/* witr_vmvideo_link2 */						
					$this->add_control(
						'witr_vmvideo_link2',
						[
							'label' => esc_html__( 'Vimeo Video Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Enter the Vimeo URL. For example: https://vimeo.com/487097600','themex'),
							'placeholder' => esc_attr__( 'https://vimeo.com/487097600', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => 'https://vimeo.com/487097600',
							],	
							'condition' => [
								'witr_slectv_border' => ["vimeo"],
								'witr_button_select' => ["1","2"],
							],							
						]
					);					
					
					$this->add_control(
						'witr_video_rtext',
						[
							'label' => esc_html__( 'Video Right Text', 'themex' ),
							'label_block' =>true,
							'type' => Controls_Manager::TEXT,
							'description' =>esc_html__('Insert text. It hidden when field blank.','themex'),
							'default' => esc_html__( 'How It Solution', 'themex' ),
							'placeholder' => esc_attr__( 'Type your text here', 'themex' ),
							'condition' => [
								'witr_button_select' => ["4"],
							],							
						]
					);

					$this->add_control(
						'witr_video_rtext2',
						[
							'label' => esc_html__( 'Video Right Text', 'themex' ),
							'label_block' =>true,
							'type' => Controls_Manager::TEXT,
							'description' =>esc_html__('Insert  text. It hidden when field blank.','themex'),
							'default' => esc_html__( 'Watch Video', 'themex' ),
							'placeholder' => esc_attr__( 'Type your text here', 'themex' ),
							'condition' => [
								'witr_button_select' => ["4"],
							],							
						]
					);
					
		
			$this->end_controls_section();
			/* === end witr_button ===  */			

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
							'label' => esc_html__( 'Normal Button', 'themex' ),
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
									'{{WRAPPER}} .witr_btn, {{WRAPPER}} .witr_gbtn, {{WRAPPER}} .witr_vbtn, {{WRAPPER}} .witr_vhgbtn, {{WRAPPER}} .witr_vbbgbtn, {{WRAPPER}} .witr_vdbbgbtn' => 'color: {{VALUE}}',
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
								'selector' => '{{WRAPPER}} .witr_btn_sinner a, {{WRAPPER}} witr_btn, {{WRAPPER}} .witr_bbtn, {{WRAPPER}} .witr_gbtn, {{WRAPPER}} .witr_gbbtn, {{WRAPPER}} .witr_vbtn, {{WRAPPER}} .witr_vhgbtn, {{WRAPPER}} .witr_vbbgbtn, {{WRAPPER}} .witr_vdbbgbtn',
							]
						);	

						/* Button background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_button_background',
								'label' => esc_html__( 'button Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .witr_btn, {{WRAPPER}} .witr_gbtn::after, {{WRAPPER}} .witr_vbtn, {{WRAPPER}} .witr_vhgbtn::before, {{WRAPPER}} .witr_vbbgbtn_inner:after, {{WRAPPER}} .witr_vbbgbtn::after, {{WRAPPER}} .witr_vdbbgbtn_inner:before, {{WRAPPER}} .witr_vdbbgbtn::before, {{WRAPPER}} .witr_gbtn',
							]
						);
						
					/*  witr_button_headding */
					$this->add_control(
						'witr_hiddenaf_view',
						[
							'label' => esc_html__( 'Forground ', 'themex' ),
							'type' => Controls_Manager::HEADING,
							'separator'=>'before',
							'default' => 'no',
								'condition' => [
								'witr_button_select' => ["3"],
								],							
						]
					);						
					/* Button Forground */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_buttonbe_background',
								'label' => esc_html__( 'button Background', 'themex' ),
								'types' => ['classic','gradient'],
								'default' => 'no',
								'selector' => '{{WRAPPER}} .witr_vhgbtn::after, {{WRAPPER}} .witr_vbbgbtn_inner:before, {{WRAPPER}} .witr_vbbgbtn::before, {{WRAPPER}} .witr_vdbbgbtn_inner:after',
								'condition' => [
								'witr_button_select' => ["3"],
								],
							]
						);						
						
						/*  icon width */
						$this->add_responsive_control(
							'witr_vicon_width',
							[
								'label' => esc_html__( 'width', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'range' => [
									'px' => [
										'min' => 6,
										'max' => 500,
									],
								],
								'condition' => [
									'witr_button_select' => ["3","4"],
								],								
								'selectors' => [
									'{{WRAPPER}} .witr_vbtn,{{WRAPPER}} .witr_vdbbgbtn' => 'width: {{SIZE}}{{UNIT}};',
								],
							]
						);
						/*  icon height */
						$this->add_responsive_control(
							'witr_vicon_height',
							[
								'label' => esc_html__( 'Height', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'range' => [
									'px' => [
										'min' => 6,
										'max' => 500,
									],
								],
								'condition' => [
									'witr_button_select' => ["3","4"],
								],								
								'selectors' => [
									'{{WRAPPER}} .witr_vbtn,{{WRAPPER}} .witr_vdbbgbtn' => 'height: {{SIZE}}{{UNIT}};',
								],
							]
						);						
						/*  icon line height */
						$this->add_responsive_control(
							'witr_vbt_line_height',
							[
								'label' => esc_html__( 'Line Height', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'range' => [
									'px' => [
										'min' => 6,
										'max' => 500,
									],
								],
								'condition' => [
									'witr_button_select' => ["3","4"],
								],								
								'selectors' => [
									'{{WRAPPER}} .witr_vbtn,{{WRAPPER}} .witr_vdbbgbtn' => 'line-height: {{SIZE}}{{UNIT}};',
								],
							]
						);							
						/* witr_border_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_border_style',
								'label' => esc_html__( 'Icon Border', 'themex' ),
								'default' => 'no',
								'condition' => [
									'witr_button_select' => ["1","3","4"],
								],								
								'selector' => '{{WRAPPER}} .witr_btn, {{WRAPPER}} .witr_gbtn, {{WRAPPER}} .witr_gbtn, {{WRAPPER}} .witr_vbtn,{{WRAPPER}} .witr_vdbbgbtn',
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
									'{{WRAPPER}} .witr_btn, {{WRAPPER}} .witr_bbtn, {{WRAPPER}} .witr_gbtn, {{WRAPPER}} .witr_gbtn::before, {{WRAPPER}} .witr_gbbtn::before, {{WRAPPER}} .witr_gbbtn::after, {{WRAPPER}} .witr_vbtn,.witr_vbbtn, {{WRAPPER}} .witr_vgbtn, {{WRAPPER}} .witr_vhgbtn::before, {{WRAPPER}} .witr_vhgbtn::after, {{WRAPPER}} .witr_vbgbtn::before, {{WRAPPER}} .witr_vbgbtn::after, {{WRAPPER}} .witr_vbbgbtn_inner:before, {{WRAPPER}} .witr_vbbgbtn_inner:after, {{WRAPPER}} .witr_vbbgbtn::before, {{WRAPPER}} .witr_vbbgbtn::after, {{WRAPPER}} .witr_vdbbgbtn_inner:before, {{WRAPPER}} .witr_vdbbgbtn_inner:after, {{WRAPPER}} .witr_vdbbgbtn::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
									'{{WRAPPER}} .witr_btn, {{WRAPPER}} .witr_bbtn, {{WRAPPER}} .witr_gbtn, {{WRAPPER}} .witr_gbbtn, {{WRAPPER}} .witr_vbtn, {{WRAPPER}} .witr_vhgbtn, {{WRAPPER}} .witr_vbbgbtn, {{WRAPPER}} .witr_vdbbgbtn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .witr_btn, {{WRAPPER}} .witr_bbtn, {{WRAPPER}} .witr_gbtn, {{WRAPPER}} .witr_gbbtn, {{WRAPPER}} .witr_vbtn, {{WRAPPER}} .witr_vhgbtn, {{WRAPPER}} .witr_vbbgbtn, {{WRAPPER}} .witr_vdbbgbtn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .witr_btn:hover, {{WRAPPER}} .witr_gbtn:hover, {{WRAPPER}} .witr_vbtn:hover, {{WRAPPER}} .witr_vhgbtn:hover, {{WRAPPER}} .witr_vbbgbtn:hover, {{WRAPPER}} .witr_vdbbgbtn:hover' => 'color: {{VALUE}}',
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
								'selector' => '{{WRAPPER}} .witr_btn:hover, {{WRAPPER}} .witr_bbtn:hover, {{WRAPPER}} .witr_gbtn:hover::before, {{WRAPPER}} .witr_vbtn:hover, {{WRAPPER}} .witr_vhgbtn:hover::before, {{WRAPPER}} .witr_vbbgbtn_inner:hover:after, {{WRAPPER}} .witr_vbbgbtn:hover::after, {{WRAPPER}} .witr_vdbbgbtn_inner:hover:before, {{WRAPPER}} .witr_vdbbgbtn:hover::before',
							]
						);					
						/* border_hover_color */
						$this->add_control(
							'witr_borderh_btn_color',
							[
								'label' => esc_html__( 'Border Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'condition' => [
									'witr_button_select' => ["1","3","4"],
								],								
								'selectors' => [
									'{{WRAPPER}} .witr_bbtn:hover,{{WRAPPER}} .witr_btn:hover,{{WRAPPER}} .witr_gbtn:hover,{{WRAPPER}} .witr_vbtn:hover,{{WRAPPER}} .witr_vdbbgbtn:hover' => 'border-color: {{VALUE}}',
								],
							]
						);
					/*  witr_button_Forground */
					$this->add_control(
						'witr_hiddenh_view',
						[
							'label' => esc_html__( 'Forground Hover', 'themex' ),
							'type' => Controls_Manager::HEADING,
							'separator'=>'before',
							'default' => 'no',
							'condition' => [
								'witr_button_select' => ["3"],
							],	
						]
					);						
						/* Button Forground */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_after_background',
								'label' => esc_html__( 'button Background', 'themex' ),
								'types' => ['classic','gradient'],
								'default' => 'no',
								'condition' => [
									'witr_button_select' => ["3"],
								],
								'selector' => '{{WRAPPER}} .witr_vhgbtn:hover::after, {{WRAPPER}} .witr_vbbgbtn_inner:hover:before, {{WRAPPER}} .witr_vbbgbtn:hover::before, {{WRAPPER}} .witr_vdbbgbtn_inner:hover:after',
							]
						);						
						
						$this->end_controls_tab();
						/*=== end button hover style ====*/
						
					/*=== start witr_button_colors_active style ====*/
					$this->start_controls_tab(
						'witr_button_colors_active',
						[
							'label' => esc_html__( 'Border Button', 'themex' ),
							'condition' => [
								'witr_button_select' => ["1","2"],
							],							
						]
					);						
						
						/* color */
						$this->add_control(
							'witr_button_act_color',
							[
								'label' => esc_html__( ' Text Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'global' => [
									'default' => Global_Colors::COLOR_ACCENT,
								],								
								'selectors' => [
									'{{WRAPPER}} .witr_bbtn,{{WRAPPER}} .witr_gbbtn' => 'color: {{VALUE}}',
								],
							]
						);					
						/* Button background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_button_act_background',
								'label' => esc_html__( 'button Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .witr_bbtn,{{WRAPPER}} .witr_gbbtn::before,{{WRAPPER}} .witr_gbbtn',
							]
						);					
						/* witr_border_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_border_act_style',
								'label' => esc_html__( 'Icon Border', 'themex' ),
								'default' => 'no',							
								'selector' => '{{WRAPPER}} .witr_bbtn,{{WRAPPER}} .witr_gbbtn',
							]
						);						
						
						
					$this->end_controls_tab();
					/*=== end button active style ====*/

					/*=== start witr_button_colors_active style ====*/
					$this->start_controls_tab(
						'witr_button_colors_activeh',
						[
							'label' => esc_html__( 'Border Hover', 'themex' ),
							'condition' => [
								'witr_button_select' => ["1","2"],
							],							
						]
					);

					/* color */
					$this->add_control(
						'witr_button_acth_color',
						[
							'label' => esc_html__( ' Text Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .witr_bbtn:hover,{{WRAPPER}} .witr_gbbtn:hover' => 'color: {{VALUE}}',
							],
						]
					);					
					/* Button background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_button_acth_background',
							'label' => esc_html__( 'button Background', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .witr_bbtn:hover,{{WRAPPER}} .witr_gbbtn:hover, {{WRAPPER}} .witr_gbbtn:hover::after,{{WRAPPER}} .witr_gbbtn:hover::before',
						]
					);					
						/* border_hover_color */
						$this->add_control(
							'witr_borderact_btn_color',
							[
								'label' => esc_html__( 'Border Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,							
								'selectors' => [
									'{{WRAPPER}} .witr_bbtn:hover,{{WRAPPER}} .witr_gbbtn:hover' => 'border-color: {{VALUE}}',
								],
							]
						);					

					$this->end_controls_tab();
					/*=== end button active Hover style ====*/					
						
				$this->end_controls_tabs();
				/*=== end button_tabs style ====*/			
			 
			 $this->end_controls_section();
			/*=== end  witr button style ====*/	

			
		
		/*=== start witr_icon style ====*/
		$this->start_controls_section(
			'witr_style_span_option',
			[
				'label' => esc_html__( ' Button Icon Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_button_select' => ['1','2','4'],
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
							'{{WRAPPER}} .pluse_btn_icon span' => 'color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .pluse_btn_icon span',
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
							'{{WRAPPER}} .pluse_btn_icon span' => 'font-size: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .pluse_btn_icon span' => 'width: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .pluse_btn_icon span' => 'height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .pluse_btn_icon span' => 'line-height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .pluse_btn_icon span' => 'text-align: {{VALUE}}',
						],
					]
				);				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_borde_span',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .pluse_btn_icon span',
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
							'{{WRAPPER}} .pluse_btn_icon span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
					
				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow_span',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .pluse_btn_icon span',
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
							'{{WRAPPER}} .pluse_btn_icon' => 'transform: rotate({{SIZE}}{{UNIT}});',
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
							'{{WRAPPER}} .pluse_btn_icon span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .pluse_btn_icon span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .pluse_btn_icon span:hover' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .pluse_btn_icon span:hover',
						]
					);
					/* border_hover_color */
					$this->add_control(
						'witr_border_hover_color_span',
						[
							'label' => esc_html__( 'Border Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							
							'selectors' => [
								'{{WRAPPER}} .pluse_btn_icon span:hover' => 'border-color: {{VALUE}}',
							],
						]
					);					

					$this->end_controls_tab();
					/*=== end icon hover style ====*/
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/
		$this->end_controls_section();
		/*=== end witr_icon style ====*/			
			
			
			
			
			
		/*=== start witr_title style ====*/

		$this->start_controls_section(
			'witr_style_option_title',
			[
				'label' => esc_html__( 'Text Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_button_select' => ["4"],
				],				
			]
		);		 
			/* color */
			$this->add_control(
				'witr_title_color',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} span.witr_v_text1' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} span.witr_v_text1:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_ttpy_color',
					'label' => esc_html__( 'Typography', 'themex' ),
					'selector' => '{{WRAPPER}} span.witr_v_text1',
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
						'{{WRAPPER}} span.witr_v_text1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} span.witr_v_text1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_title style ====*/
	
		/*=== start witr_title style 2 ====*/

		$this->start_controls_section(
			'witr_style_option_title2',
			[
				'label' => esc_html__( 'Title Color option2', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_button_select' => ["4"],
				],				
			]
		);		 
			/* color */
			$this->add_control(
				'witr_title_color2',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} span.witr_v_text2' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} span.witr_v_text2:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_ttpy_color2',
					'label' => esc_html__( 'Typography', 'themex' ),
					'selector' => '{{WRAPPER}} span.witr_v_text2',
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
						'{{WRAPPER}} span.witr_v_text2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} span.witr_v_text2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_title style 2 ====*/			
			
    } /*==function end==*/


	
    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();
		$target_btn = ! empty($witrshowdata['witr_button_link']['is_external']) ? ' target="_blank"' : '';
		$nofollow_btn = ! empty($witrshowdata['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';
		$target_btnb = ! empty($witrshowdata['witr_button_linkb']['is_external']) ? ' target="_blank"' : '';
		$nofollow_btnb = ! empty($witrshowdata['witr_button_linkb']['nofollow']) ? ' rel="nofollow"' : '';
		
	$youtvimeo=$youtvimeo2=$youtvimeo3=$youtvimeo4="";
 if( $witrshowdata['witr_slectv_button']=="youtube"){
	 $youtvimeo= $witrshowdata['witr_yvideo_link'] ['url'];
 }elseif($witrshowdata['witr_slectv_button']=="vimeo"){
	  $youtvimeo= $witrshowdata['witr_vmvideo_link'] ['url'];
 }else{
	 
 }; 
 if( $witrshowdata['witr_slectv_border']=="youtube"){
	 $youtvimeo2= $witrshowdata['witr_yvideo_linkb'] ['url'];
 }elseif($witrshowdata['witr_slectv_border']=="vimeo"){
	  $youtvimeo2= $witrshowdata['witr_vmvideo_link2'] ['url'];
 }else{
	 
 }; 



?>
<!-- area -->
			<div class="witr_button_area">

								<!--  post meta -->


				<?php if($witrshowdata['witr_button_select']=='1'){?>
					<!-- btn default style -->
					<div class="witr_btn_style mr">
						<div class="witr_btn_sinner">	
						
							<?php foreach ( $witrshowdata['witr_btn_button'] as $element ) { 					
								if( $element=="b1"){?>
									<?php if(isset($witrshowdata['witr_banner_button']) && ! empty($witrshowdata['witr_banner_button'])){?>
										<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?> class="witr_btn"><?php echo $witrshowdata['witr_banner_button']; ?>
											<!-- icon -->
											<?php if($witrshowdata['witr_show_icon']=='yes'){?>
												<?php if(isset($witrshowdata['witr_icon_item']) && ! empty($witrshowdata['witr_icon_item'])){?>
													<div class="pluse_btn_icon">
														<span class="<?php echo $witrshowdata['witr_icon_item']; ?>"></span>
													</div>	
												<?php } ?>											
											<?php } ?>											
										</a>
									<?php } ?>										
								<?php }?>								
								<?php if( $element=="b2"){?>
									<?php if(isset($witrshowdata['witr_banner_buttonb']) && ! empty($witrshowdata['witr_banner_buttonb'])){?>
										<a href="<?php echo $witrshowdata['witr_button_linkb'] ['url'];?>"<?php echo $target_btnb,$nofollow_btnb?> class="witr_bbtn"><?php echo $witrshowdata['witr_banner_buttonb']; ?>
											<!-- icon -->
											<?php if($witrshowdata['witr_show_icon']=='yes'){?>
												<?php if(isset($witrshowdata['witr_icon_item']) && ! empty($witrshowdata['witr_icon_item'])){?>
													<div class="pluse_btn_icon">
														<span class="<?php echo $witrshowdata['witr_icon_item']; ?>"></span>
													</div>	
												<?php } ?>											
											<?php } ?>										
										</a>
									<?php } ?>											
								<?php }?>
								<?php if( $element=="b3"){?>
									<?php if(isset($witrshowdata['witr_video_button']) && ! empty($witrshowdata['witr_video_button'])){?>
										<a class="witr_btn video-vemo-icon venobox vbox-item" data-vbtype="<?php echo $witrshowdata['witr_slectv_button']; ?>" data-autoplay="true" href="<?php echo $youtvimeo; ?>" tabindex="-1">	
											<!-- icon 2 -->
											<?php if($witrshowdata['witr_show_icon2']=='yes'){?>
												<?php if(isset($witrshowdata['witr_icon_item2']) && ! empty($witrshowdata['witr_icon_item2'])){?>
													<div class="pluse_btn_icon">
														<span class="<?php echo $witrshowdata['witr_icon_item2']; ?>"></span>
													</div>	
												<?php } ?>											
											<?php } ?>
											 <?php echo $witrshowdata['witr_video_button']; ?>
											</a>
									<?php } ?>										
								<?php }?>
								<?php if( $element=="b4"){?>
									<?php if(isset($witrshowdata['witr_video_border']) && ! empty($witrshowdata['witr_video_border'])){?>
										<a class="witr_bbtn video-vemo-icon venobox vbox-item" data-vbtype="<?php echo $witrshowdata['witr_slectv_button']; ?>" data-autoplay="true" href="<?php echo $youtvimeo2; ?>" tabindex="-1">
											<!-- icon 2 -->
											<?php if($witrshowdata['witr_show_icon2']=='yes'){?>
												<?php if(isset($witrshowdata['witr_icon_item2']) && ! empty($witrshowdata['witr_icon_item2'])){?>
													<div class="pluse_btn_icon">
														<span class="<?php echo $witrshowdata['witr_icon_item2']; ?>"></span>
													</div>	
												<?php } ?>											
											<?php } ?>										
											<?php echo $witrshowdata['witr_video_border']; ?>
											
										</a>
									<?php } ?>												
								<?php }?>
					
							<?php } // end foreach ?>								
						
						</div>						
					</div>
				<?php }elseif($witrshowdata['witr_button_select']=='2'){?>
					<!-- btn gradient style -->
					<div class="witr_btn_style mr">
						<div class="witr_btn_sinner">
							<?php foreach ( $witrshowdata['witr_btn_button'] as $element ) { 					
								if( $element=="b1"){?>
									<?php if(isset($witrshowdata['witr_banner_button']) && ! empty($witrshowdata['witr_banner_button'])){?>
										<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?> class="witr_gbtn"><?php echo $witrshowdata['witr_banner_button']; ?>
											<!-- icon -->
											<?php if($witrshowdata['witr_show_icon']=='yes'){?>
												<?php if(isset($witrshowdata['witr_icon_item']) && ! empty($witrshowdata['witr_icon_item'])){?>
													<div class="pluse_btn_icon">
														<span class="<?php echo $witrshowdata['witr_icon_item']; ?>"></span>
													</div>	
												<?php } ?>											
											<?php } ?>										
										</a>
									<?php } ?>										
								<?php }?>
								<?php if( $element=="b2"){?>
									<?php if(isset($witrshowdata['witr_banner_buttonb']) && ! empty($witrshowdata['witr_banner_buttonb'])){?>
										<a href="<?php echo $witrshowdata['witr_button_linkb'] ['url'];?>"<?php echo $target_btnb,$nofollow_btnb?> class="witr_gbbtn"><?php echo $witrshowdata['witr_banner_buttonb']; ?>
											<!-- icon -->
											<?php if($witrshowdata['witr_show_icon']=='yes'){?>
												<?php if(isset($witrshowdata['witr_icon_item']) && ! empty($witrshowdata['witr_icon_item'])){?>
													<div class="pluse_btn_icon">
														<span class="<?php echo $witrshowdata['witr_icon_item']; ?>"></span>
													</div>	
												<?php } ?>											
											<?php } ?>										
										</a>
									<?php } ?>									
								<?php }?>
								<?php if( $element=="b3"){?>
									<?php if(isset($witrshowdata['witr_video_button']) && ! empty($witrshowdata['witr_video_button'])){?>
										<a class="witr_gbtn video-vemo-icon venobox vbox-item" data-vbtype="<?php echo $witrshowdata['witr_slectv_button']; ?>" data-autoplay="true" href="<?php echo $youtvimeo; ?>" tabindex="-1">
											<!-- icon 2 -->
											<?php if($witrshowdata['witr_show_icon2']=='yes'){?>
												<?php if(isset($witrshowdata['witr_icon_item2']) && ! empty($witrshowdata['witr_icon_item2'])){?>
													<div class="pluse_btn_icon">
														<span class="<?php echo $witrshowdata['witr_icon_item2']; ?>"></span>
													</div>	
												<?php } ?>											
											<?php } ?>
											<?php echo $witrshowdata['witr_video_button']; ?>
										</a>
									<?php } ?>								
								<?php }?>
								<?php if( $element=="b4"){?>
									<?php if(isset($witrshowdata['witr_video_border']) && ! empty($witrshowdata['witr_video_border'])){?>
										<a class="witr_gbbtn video-vemo-icon venobox vbox-item" data-vbtype="<?php echo $witrshowdata['witr_slectv_button']; ?>" data-autoplay="true" href="<?php echo $youtvimeo2; ?>" tabindex="-1">
											<!-- icon 2 -->
											<?php if($witrshowdata['witr_show_icon2']=='yes'){?>
												<?php if(isset($witrshowdata['witr_icon_item2']) && ! empty($witrshowdata['witr_icon_item2'])){?>
													<div class="pluse_btn_icon">
														<span class="<?php echo $witrshowdata['witr_icon_item2']; ?>"></span>
													</div>	
												<?php } ?>											
											<?php } ?>
											<?php echo $witrshowdata['witr_video_border']; ?>
										</a>
									<?php } ?>								
								<?php }?>
					
							<?php } //end foreach ?>																
						</div>
					</div>			
				
				<?php } elseif($witrshowdata['witr_button_select']=='3'){?>
				<!-- btn video default style -->
				<div class="witr_btn_vstyled">
					<?php foreach ( $witrshowdata['witr_btn_button'] as $element ) { 
					
						if( $element=="b1"){?>	
							<div class="witr_btn_vstyle">
								<a class="witr_vbtn video-vemo-icon venobox vbox-item" data-vbtype="<?php echo $witrshowdata['witr_slectv_button']; ?>" data-autoplay="true" href="<?php echo $youtvimeo; ?>">
									<!-- icon 2 -->
									<?php if($witrshowdata['witr_show_icon2']=='yes'){?>
										<?php if(isset($witrshowdata['witr_icon_item2']) && ! empty($witrshowdata['witr_icon_item2'])){?>
											<div class="pluse_btn_icon">
												<span class="<?php echo $witrshowdata['witr_icon_item2']; ?>"></span>
											</div>	
										<?php } ?>											
									<?php } ?> 
								</a>								
							</div>	
						<?php } ?>		
						<!-- btn video hover gradient border style -->
						<?php if( $element=="b2"){?>
							<div class="witr_btn_vstyle">
								<a class="witr_vhgbtn video-vemo-icon venobox vbox-item" data-vbtype="<?php echo $witrshowdata['witr_slectv_button']; ?>" data-autoplay="true" href="<?php echo $youtvimeo; ?>">
									<!-- icon 2 -->
									<?php if($witrshowdata['witr_show_icon2']=='yes'){?>
										<?php if(isset($witrshowdata['witr_icon_item2']) && ! empty($witrshowdata['witr_icon_item2'])){?>
											<div class="pluse_btn_icon">
												<span class="<?php echo $witrshowdata['witr_icon_item2']; ?>"></span>
											</div>	
										<?php } ?>											
									<?php } ?>
								</a>
							</div>																		
						<?php }?>													
						<!-- btn video dubble border gradient style -->
						<?php if( $element=="b3"){?>
							<div class="witr_vbbgbtn_inner">
								<a class="witr_vbbgbtn video-vemo-icon venobox vbox-item" data-vbtype="<?php echo $witrshowdata['witr_slectv_button']; ?>" data-autoplay="true" href="<?php echo $youtvimeo; ?>">
									<!-- icon 2 -->
									<?php if($witrshowdata['witr_show_icon2']=='yes'){?>
										<?php if(isset($witrshowdata['witr_icon_item2']) && ! empty($witrshowdata['witr_icon_item2'])){?>
											<div class="pluse_btn_icon">
												<span class="<?php echo $witrshowdata['witr_icon_item2']; ?>"></span>
											</div>	
										<?php } ?>											
									<?php } ?>
								</a>
							</div>																							
						<?php }?>																		
						<!-- btn video dubble border background gradient style -->
						<?php if( $element=="b4"){?>
							<div class="witr_vdbbgbtn_inner">
								<a class="witr_vdbbgbtn video-vemo-icon venobox vbox-item" data-vbtype="<?php echo $witrshowdata['witr_slectv_button']; ?>" data-autoplay="true" href="<?php echo $youtvimeo; ?>">
									<!-- icon 2 -->
									<?php if($witrshowdata['witr_show_icon2']=='yes'){?>
										<?php if(isset($witrshowdata['witr_icon_item2']) && ! empty($witrshowdata['witr_icon_item2'])){?>
											<div class="pluse_btn_icon">
												<span class="<?php echo $witrshowdata['witr_icon_item2']; ?>"></span>
											</div>	
										<?php } ?>											
									<?php } ?>
								</a>
							</div>												
						<?php }?>							

					<?php } //end foreach ?>					
				</div>										

							

				<?php } elseif($witrshowdata['witr_button_select']=='4'){?>
					<!-- btn video text style -->
					<div class="wirr_video_button">
					
				
						<div class="witr_btn_vistyle mr">
						<div class="witr_btn_sinner f_left">					
							<?php if(isset($witrshowdata['witr_banner_button']) && ! empty($witrshowdata['witr_banner_button'])){?>
								<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?> class="witr_btn vtbtnsty4">
									<?php echo $witrshowdata['witr_banner_button']; ?>
									<!-- icon -->
									<?php if($witrshowdata['witr_show_icon']=='yes'){?>
										<?php if(isset($witrshowdata['witr_icon_item']) && ! empty($witrshowdata['witr_icon_item'])){?>
											<div class="pluse_btn_icon">
												<span class="<?php echo $witrshowdata['witr_icon_item']; ?>"></span>
											</div>	
										<?php } ?>											
									<?php } ?>								
								</a>
							<?php } ?>								
						</div>							
							<div class="witr_btn_vstyle f_left">
								<a class="witr_vbtn  video-vemo-icon venobox vbox-item" data-vbtype="<?php echo $witrshowdata['witr_slectv_button']; ?>" data-autoplay="true" href="<?php echo $youtvimeo; ?>">
									<!-- icon 2 -->
									<?php if($witrshowdata['witr_show_icon2']=='yes'){?>
										<?php if(isset($witrshowdata['witr_icon_item2']) && ! empty($witrshowdata['witr_icon_item2'])){?>
											<div class="pluse_btn_icon">
												<span class="<?php echo $witrshowdata['witr_icon_item2']; ?>"></span>
											</div>	
										<?php } ?>											
									<?php } ?>
								</a>
							</div>
							
							<div class="witr_vider_text">
								<div class="witr_vider_text_inner">
								
									<span class="inners">
									<?php if(isset($witrshowdata['witr_video_rtext']) && ! empty($witrshowdata['witr_video_rtext'])){?>
										<span class="witr_v_text1"><?php echo $witrshowdata['witr_video_rtext']; ?></span>
									<?php } ?>
									<?php if(isset($witrshowdata['witr_video_rtext2']) && ! empty($witrshowdata['witr_video_rtext2'])){?>
										<span class="witr_v_text2"><?php echo $witrshowdata['witr_video_rtext2']; ?></span>
									<?php } ?>
									</span>									
								
								</div>
							</div>
												
						</div>
					</div>				
				<?php }
				
				else{}?>		
			



			</div>
<!-- end area -->
  

<?php

    } 
	
	

}