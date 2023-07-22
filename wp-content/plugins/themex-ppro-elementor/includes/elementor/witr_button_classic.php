<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Classic_Button extends Widget_Base {

    public function get_name() {
        return 'witr_section_btns';
    }
    
    public function get_title() {
        return esc_html__( 'Classic Button ', 'themex' );
    }
	public function get_style_depends() {
        return [ 'wbtn','wbtnclasic' ];
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
					'label' => esc_html__( 'Available Text & Alignment Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
			
					/* witr_align */					
					$this->add_responsive_control(
						'witr_align',
						[
							'label' => esc_html__( ' Alignment', 'themex' ),
							'type' => Controls_Manager::CHOOSE,
							'separator' => 'before',					
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
								'{{WRAPPER}} .witr_classic_button_area' => 'text-align: {{VALUE}}',
							],							
						]
					);
					/*  witr_show_av_area */
					$this->add_control(
						'witr_show_av_area',
						[
							'label' => esc_html__( 'Show Available Text', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'separator'=>'before',
							'return_value' => 'yes',
							'default' => 'yes',							
						]
					);
					/* witr_Available_button	*/		
					$this->add_control(
						'witr_banner_av',
						[
							'label' => esc_html__( 'Available Text', 'themex' ),
							'label_block' =>true,
							'type' => Controls_Manager::TEXT,
							'description' =>esc_html__('Insert text. It hidden when field blank.','themex'),							
							'default' => esc_html__( 'Available for:', 'themex' ),
							'placeholder' => esc_attr__( 'Type your text here', 'themex' ),
							'condition' => [
								'witr_show_av_area' => 'yes',
							],
						]
					);
				$this->end_controls_section();
				/* === end witr_button ===  */
					
				
				/* === witr_field_windo_button start === */
				$this->start_controls_section(
					'witr_field_windo_button',
					[
						'label' => esc_html__( 'Windows Buttons Options', 'themex' ),
						'tab' => Controls_Manager::TAB_CONTENT,
					]
				);					
					/* Windows Button text */
					$this->add_control(
						'witr_banner_button',
						[
							'label' => esc_html__( 'Windows Button text', 'themex' ),
							'label_block' =>true,
							'separator' => 'before',
							'type' => Controls_Manager::TEXT,
							'description' =>esc_html__('Insert button text. It hidden when field blank.','themex'),							
							'default' => esc_html__( 'Try For Free', 'themex' ),
							'placeholder' => esc_attr__( 'Type your button text here', 'themex' ),				
						]
					);
					/* Windows Button link */	
					$this->add_control(
						'witr_button_link',
						[
							'label' => esc_html__( 'Windows Button Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert button link here.','themex'),
							'placeholder' => esc_attr__( 'https://webitrangpur.com', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => '#',
							],						
						]
					);					
					/* Windows Button 2 text */					
					$this->add_control(
						'witr_banner_button2',
						[
							'label' => esc_html__( 'Windows Button 2 text', 'themex' ),
							'label_block' =>true,
							'separator' => 'before',
							'type' => Controls_Manager::TEXT,
							'description' =>esc_html__('Insert button text. It hidden when field blank.','themex'),							
							'default' => esc_html__( 'Windows Classic', 'themex' ),
							'placeholder' => esc_attr__( 'Type your button text here', 'themex' ),				
						]
					);
				/* Windows Button link 2 */	
					$this->add_control(
						'witr_button_link2',
						[
							'label' => esc_html__( 'Windows Button 2 Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert button link here.','themex'),
							'placeholder' => esc_attr__( 'https://webitrangpur.com', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => '#',
							],						
						]
					);
					/* witr_show_icon */
					$this->add_control(
						'witr_show_wd_icon',
						[
							'label' => esc_html__( 'Show Icon', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'separator'=>'before',
							'return_value' => 'yes',
							'default' => 'no',							
						]
					);
					/* witr_icon_wd_item */					
					$this->add_control(
						'witr_icon_wd_item',
						[
							'label' => esc_html__( 'Icon', 'themex' ),
							'type' => Controls_Manager::ICONS,
							'description' => esc_html__( 'Change icon here, For this, click on the library field And Not use Icon,Click On The Hide Option', 'meathat' ),
							'fa4compatibility' => 'icon',
							'default' => [
								'value' => 'fab fa-windows',
								'library' => 'fa-solid',
							],
							'condition' => [
								'witr_show_wd_icon' => 'yes',
							],							
						]
					);					
					
					/*  witr_show_w_icon */
					$this->add_control(
						'witr_show_w_icon',
						[
							'label' => esc_html__( 'Show Custom Icon', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'separator'=>'before',
							'return_value' => 'yes',
							'default' => 'yes',							
						]
					);					
					/* Windows Icon	*/
					$this->add_control(
						'witr_icon_item',
						[
							'label' => esc_html__( 'Windows Icon Name', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Type Icofont - https://icofont.com/icons Ex=icofont-brand-windows or Themify Icon -https://themify.me/themify-icons Ex=ti-user or Fontawesome Icon - https://fontawesome.com/cheatsheet Ex=fab fa-windows name here', 'themex' ),
							'default' => esc_html__( 'icofont-brand-windows', 'themex' ),
							'placeholder' => esc_attr__( 'Type your Icon name here', 'themex' ),
							'condition' => [
								'witr_show_w_icon' => 'yes',
							],
						]
					);
					/* witr_windows_image */
					$this->add_control(
						'witr_windows_image',
						[
							'label' => esc_html__( 'Choose Your Image', 'themex' ),
							'type' => Controls_Manager::MEDIA,
							'separator' => 'before',
							'description' => esc_html__( 'Recommended Image Size= 40px+40px', 'themex' ),													
						]
					);					
					/* txbd_image_size */
					$this->add_group_control(
						Group_Control_Image_Size::get_type(),
						[
							'name' => 'txbd_image_size',
							'default' => 'large',
							'separator' => 'none',
						]
					);					
					
			$this->end_controls_section();
			/* === end witr_button ===  */					
			/* witr_field_app_button */
				$this->start_controls_section(
					'witr_field_app_button',
					[
						'label' => esc_html__( 'Apple Buttons Options', 'themex' ),
						'tab' => Controls_Manager::TAB_CONTENT,
					]
				);					
					/* Apple Button text */
					$this->add_control(
						'witr_banner_button3',
						[
							'label' => esc_html__( 'Apple Button text', 'themex' ),
							'label_block' =>true,
							'separator' => 'before',
							'type' => Controls_Manager::TEXT,
							'description' =>esc_html__('Insert button text. It hidden when field blank.','themex'),							
							'default' => esc_html__( 'Try For Free', 'themex' ),
							'placeholder' => esc_attr__( 'Type your button text here', 'themex' ),				
						]
					);
					/* Apple Button link */	
					$this->add_control(
						'witr_button_link3',
						[
							'label' => esc_html__( 'Apple Button Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert button link here.','themex'),
							'placeholder' => esc_attr__( 'https://webitrangpur.com', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => '#',
							],						
						]
					);					
					/* Apple Button text 2 */
					$this->add_control(
						'witr_banner_button4',
						[
							'label' => esc_html__( 'Apple Button 2 text', 'themex' ),
							'label_block' =>true,
							'separator' => 'before',
							'type' => Controls_Manager::TEXT,
							'description' =>esc_html__('Insert button text. It hidden when field blank.','themex'),							
							'default' => esc_html__( 'Apple Classic', 'themex' ),
							'placeholder' => esc_attr__( 'Type your button text here', 'themex' ),				
						]
					);
					/*Apple Button link 2*/	
					$this->add_control(
						'witr_button_link4',
						[
							'label' => esc_html__( 'Apple Button 2 Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert button link here.','themex'),
							'placeholder' => esc_attr__( 'https://webitrangpur.com', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => '#',
							],						
						]
					);
					/* witr_show_icon */
					$this->add_control(
						'witr_show_ad_icon',
						[
							'label' => esc_html__( 'Show Icon', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'separator'=>'before',
							'return_value' => 'yes',
							'default' => 'no',							
						]
					);
					/* witr_icon_ad_item */					
					$this->add_control(
						'witr_icon_ad_item',
						[
							'label' => esc_html__( 'Icon', 'themex' ),
							'type' => Controls_Manager::ICONS,
							'description' => esc_html__( 'Change icon here, For this, click on the library field And Not use Icon,Click On The Hide Option', 'meathat' ),
							'fa4compatibility' => 'icon',
							'default' => [
								'value' => 'fab fa-apple',
								'library' => 'fa-solid',
							],
							'condition' => [
								'witr_show_ad_icon' => 'yes',
							],							
						]
					);
					/*  witr_show_a_icon */
					$this->add_control(
						'witr_show_a_icon',
						[
							'label' => esc_html__( 'Show Custom Icon', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'separator'=>'before',
							'return_value' => 'yes',
							'default' => 'yes',							
						]
					);					
					/* Apple Icon	*/
					$this->add_control(
						'witr_icon_item2',
						[
							'label' => esc_html__( 'Apple Icon Name', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Type Icofont - https://icofont.com/icons Ex=icofont-brand-apple or Themify Icon -https://themify.me/themify-icons Ex=ti-apple or Fontawesome Icon - https://fontawesome.com/cheatsheet Ex=fab fa-apple name here', 'themex' ),
							'default' => esc_html__( 'icofont-brand-apple', 'themex' ),
							'placeholder' => esc_attr__( 'Type your Icon name here', 'themex' ),
							'condition' => [
								'witr_show_a_icon' => 'yes',
							],							
						]
					);
					/* witr_apple_image */
					$this->add_control(
						'witr_apple_image',
						[
							'label' => esc_html__( 'Choose Your Image', 'themex' ),
							'separator' => 'before',
							'type' => Controls_Manager::MEDIA,
							'description' => esc_html__( 'Recommended Image Size= 40px+40px', 'themex' ),	
						]
					);
					/* txbd_image_size2 */
					$this->add_group_control(
						Group_Control_Image_Size::get_type(),
						[
							'name' => 'txbd_image_size2',
							'default' => 'large',
							'separator' => 'none',
						]
					);					

			$this->end_controls_section();
			/* === end witr_button ===  */			

			/* === witr_field_display_id start === */
			$this->start_controls_section(
				'witr_field_display_id',
				[
					'label' => esc_html__( ' Use Uniqe ID Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
					/* witr_unicid_btn_w */	
					$this->add_control(
						'witr_unicid_btn_w',
						[
							'label' => esc_html__( 'Use Uniqe ID', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Please must be use a unic ID here, ex- btn_w.', 'themex' ),
							'default' => 'btn_w',
							'placeholder' => esc_attr__( 'Type your ID here', 'themex' ),						
						]
					);
					/* witr_unicid_btn_w */	
					$this->add_control(
						'witr_unicid_btn_c',
						[
							'label' => esc_html__( 'Use Uniqe ID apple', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'separator'=>'before',
							'description' => esc_html__( 'Please must be use a unic ID here, ex- btn_c.', 'themex' ),
							'default' => 'btn_c',
							'placeholder' => esc_attr__( 'Type your ID here', 'themex' ),						
						]
					);
					/* witr_unicid_btn_w */	
					$this->add_control(
						'witr_unicid_tx_op',
						[
							'label' => esc_html__( 'Use Uniqe ID', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'separator'=>'before',
							'description' => esc_html__( 'Please must be use a unic ID here, ex- tx_op.', 'themex' ),
							'default' => 'tx_op',
							'placeholder' => esc_attr__( 'Type your ID here', 'themex' ),						
						]
					);
					/* witr_unicid_btn_w */	
					$this->add_control(
						'witr_unicid_tx_cl',
						[
							'label' => esc_html__( 'Use Uniqe ID apple', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'separator'=>'before',
							'description' => esc_html__( 'Please must be use a unic ID here, ex- tx_cl.', 'themex' ),
							'default' => 'tx_cl',
							'placeholder' => esc_attr__( 'Type your ID here', 'themex' ),						
						]
					);				
				$this->end_controls_section();
				/* === end witr_button ===  */			
			
			
			
			/*================================================================================ Color Style =======================================================================*/

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
									'{{WRAPPER}} .witr_bbtn' => 'color: {{VALUE}}',
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
								'selector' => '{{WRAPPER}} .witr_btn, {{WRAPPER}} .witr_bbtn',
							]
						);	
						/* Button background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_button_background',
								'label' => esc_html__( 'button Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => ' {{WRAPPER}} .witr_bbtn',
							]
						);
						/* witr_border_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_border_style',
								'label' => esc_html__( ' Border', 'themex' ),
								'default' => 'no',							
								'selector' => '{{WRAPPER}} .witr_bbtn',
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
									'{{WRAPPER}} .witr_btn, {{WRAPPER}} .witr_bbtn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
									'{{WRAPPER}} .witr_btn, {{WRAPPER}} .witr_bbtn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .witr_btn, {{WRAPPER}} .witr_bbtn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);					
					

					$this->end_controls_tab();
					/*=== end button normal style ====*/

						/*=== start button hover style ====*/
						$this->start_controls_tab(
							'witr_button_colors_hover',
							[
								'label' => esc_html__( ' Hover Button', 'themex' ),
							]
						);

						/* hover_color */
						$this->add_control(
							'witr_button_hover_color',
							[
								'label' => esc_html__( ' Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								'selectors' => [
									'{{WRAPPER}} .witr_bbtn:hover,{{WRAPPER}} .witr_btn:hover .a_active i,{{WRAPPER}} .witr_bbtn:hover .a_active i' => 'color: {{VALUE}}',
								],
							]
						);					
							
						/* Button Hover background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_button_hover_background',
								'label' => esc_html__( 'button  Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .witr_bbtn:hover',
							]
						);					
						/* border_hover_color */
						$this->add_control(
							'witr_borderh_btn_color',
							[
								'label' => esc_html__( 'Border Color', 'themex' ),
								'type' => Controls_Manager::COLOR,							
								'selectors' => [
									'{{WRAPPER}} .witr_bbtn:hover' => 'border-color: {{VALUE}}',
								],
							]
						);										
						
						$this->end_controls_tab();
						/*=== end button hover style ====*/

					
					/*=== start witr_button_colors_active style ====*/
					$this->start_controls_tab(
						'witr_button_colors_active',
						[
							'label' => esc_html__( 'Active Button', 'themex' ),
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
								' {{WRAPPER}} .witr_btn' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .witr_btn',
						]
					);					
					/* witr_border_style */
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'witr_border_act_style',
							'label' => esc_html__( 'Icon Border', 'themex' ),
							'default' => 'no',							
							'selector' => '{{WRAPPER}} .witr_btn',
						]
					);					
					
					$this->end_controls_tab();
					/*=== end button active style ====*/

					/*=== start witr_button_colors_active style ====*/
					$this->start_controls_tab(
						'witr_button_colors_activeh',
						[
							'label' => esc_html__( 'Active Hover', 'themex' ),
						]
					);

					/* color */
					$this->add_control(
						'witr_button_acth_color',
						[
							'label' => esc_html__( ' Text Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								' {{WRAPPER}} .witr_btn:hover' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .witr_btn:hover',
						]
					);					
						/* border_hover_color */
						$this->add_control(
							'witr_borderact_btn_color',
							[
								'label' => esc_html__( 'Border Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,							
								'selectors' => [
									'{{WRAPPER}} .witr_btn:hover' => 'border-color: {{VALUE}}',
								],
							]
						);					
					
					$this->end_controls_tab();
					/*=== end button active Hover style ====*/		
				$this->end_controls_tabs();
				/*=== end button_tabs style ====*/			
			 $this->end_controls_section();
			/*=== end  witr button style ====*/	

			
		/*=== start witr_title style ====*/
		$this->start_controls_section(
			'witr_style_option',
			[
				'label' => esc_html__( ' Text And Icon, Active Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			/* color */
			$this->add_control(
				'witr_iconac_color',
				[
					'label' => esc_html__( 'Icon Active Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .a_active i' => 'color: {{VALUE}}',
					],
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
						'{{WRAPPER}} .btn_sh_area p' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .btn_sh_area p:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_ttpy_color',
					'label' => esc_html__( 'Text Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
					],
					'selector' => '{{WRAPPER}} .btn_sh_area p',
				]
			);

			/*  font size  */
			$this->add_responsive_control(
				'icon_size',
				[
					'label' => esc_html__( 'Icon Size', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 300,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .btn_sh_area p span i' => 'font-size: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .btn_sh_area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .btn_sh_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  w_title style ====*/			
			
			
	
			
    } /*==function end==*/


	
    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display(); 
		$target_btn = ! empty($witrshowdata['witr_button_link']['is_external']) ? ' target="_blank"' : '';
		$nofollow_btn = ! empty($witrshowdata['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';
		$target_btnb = ! empty($witrshowdata['witr_button_link2']['is_external']) ? ' target="_blank"' : '';
		$nofollow_btnb = ! empty($witrshowdata['witr_button_link2']['nofollow']) ? ' rel="nofollow"' : '';
		$target_btnb3 = ! empty($witrshowdata['witr_button_link3']['is_external']) ? ' target="_blank"' : '';
		$nofollow_btn3 = ! empty($witrshowdata['witr_button_link3']['nofollow']) ? ' rel="nofollow"' : '';
		$target_btn4 = ! empty($witrshowdata['witr_button_link4']['is_external']) ? ' target="_blank"' : '';
		$nofollow_btn4 = ! empty($witrshowdata['witr_button_link4']['nofollow']) ? ' rel="nofollow"' : '';
		
		$btn_w=$btn_c=$tx_op=$tx_cl=$txbd_image=$txbd_image2="";

		if(! empty($witrshowdata['witr_unicid_btn_w'])){
			$btn_w=$witrshowdata['witr_unicid_btn_w'];
		}
		if(! empty($witrshowdata['witr_unicid_btn_c'])){
			$btn_c=$witrshowdata['witr_unicid_btn_c'];
		}
		if(! empty($witrshowdata['witr_unicid_tx_op'])){
			$tx_op=$witrshowdata['witr_unicid_tx_op'];
		}
		if(! empty($witrshowdata['witr_unicid_tx_cl'])){
			$tx_cl=$witrshowdata['witr_unicid_tx_cl'];
		}

	
		if( !empty( $witrshowdata['witr_windows_image']['url'] ) ){
			$txbd_image = Group_Control_Image_Size::get_attachment_image_html( $witrshowdata, 'txbd_image_size', 'witr_windows_image' );
		}
		if( !empty( $witrshowdata['witr_apple_image']['url'] ) ){
			$txbd_image2 = Group_Control_Image_Size::get_attachment_image_html( $witrshowdata, 'txbd_image_size2', 'witr_apple_image' );
		}		
		
?>
		<!-- area -->
		<div class="witr_classic_button_area">
			<!-- btn default style -->
			<div class="witr_btn_style mr <?php echo $tx_op;?>">
				<div class="witr_btn_sinner">	
					<?php if( ! empty($witrshowdata['witr_banner_button'])){?>
						<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?> class="witr_bbtn"><?php echo $witrshowdata['witr_banner_button']; ?>
							<span class="<?php echo $btn_w;?> ">
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_wd_item'])){?>	
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_wd_item']['value']);?>"></i>
								<?php } ?>							
								<!-- custom icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item'])){?>	
									<i class="<?php echo $witrshowdata['witr_icon_item']; ?>"></i>
								<?php } ?>								
								<!-- image -->
								<?php echo $txbd_image; ?>
								
							</span>
						</a>
					<?php } ?>							
					<?php if( ! empty($witrshowdata['witr_banner_button2'])){?>
						<a href="<?php echo $witrshowdata['witr_button_link2'] ['url'];?>"<?php echo $target_btnb,$nofollow_btnb?> class="witr_btn"><?php echo $witrshowdata['witr_banner_button2']; ?>
						</a>
					<?php } ?>							
				</div>						
			</div>
			<!-- btn default style -->
			<div class="witr_btn_style mr  btn_none <?php echo $tx_cl;?>">
				<div class="witr_btn_sinner">	
					<?php if( ! empty($witrshowdata['witr_banner_button3'])){?>
						<a href="<?php echo $witrshowdata['witr_button_link3'] ['url'];?>"<?php echo $target_btnb3,$nofollow_btn3?> class="witr_bbtn"><?php echo $witrshowdata['witr_banner_button3']; ?>
							<span class="<?php echo $btn_c;?>">
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_ad_item'])){?>	
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_ad_item']['value']);?>"></i>
								<?php } ?>
								<!-- custom icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item2'])){?>	
									<i class="<?php echo $witrshowdata['witr_icon_item2']; ?>"></i>
								<?php } ?>
								<!-- image -->
								<?php echo $txbd_image2; ?>								
							</span>									
						</a>
					<?php } ?>
					<?php if( ! empty($witrshowdata['witr_banner_button4'])){?>
						<a href="<?php echo $witrshowdata['witr_button_link4'] ['url'];?>"<?php echo $target_btn4,$nofollow_btn4?> class="witr_btn"><?php echo $witrshowdata['witr_banner_button4']; ?>
						</a>
					<?php } ?>							
				</div>						
			</div>
			
			<?php if($witrshowdata['witr_show_av_area']=='yes'){?>			
				<div class="btn_sh_area">
					<p>
						<?php if(isset($witrshowdata['witr_banner_av']) && ! empty($witrshowdata['witr_banner_av'])){?>
							<?php echo $witrshowdata['witr_banner_av']; ?>
						<?php } ?>						
						<span class="<?php echo $btn_w;?> ">
							<!-- icon -->
							<?php if( ! empty($witrshowdata['witr_icon_wd_item'])){?>	
								<i class="<?php echo esc_attr( $witrshowdata['witr_icon_wd_item']['value']);?>"></i>
							<?php } ?>					
							<!-- custom icon -->
							<?php if(isset($witrshowdata['witr_icon_item']) && ! empty($witrshowdata['witr_icon_item'])){?>	
								<i class="<?php echo $witrshowdata['witr_icon_item']; ?>"></i>
							<?php } ?>
							<!-- image -->
							<?php echo $txbd_image; ?>						
						</span>
						<span class="<?php echo $btn_c;?>">
							<!-- icon -->
							<?php if( ! empty($witrshowdata['witr_icon_ad_item'])){?>	
								<i class="<?php echo esc_attr( $witrshowdata['witr_icon_ad_item']['value']);?>"></i>
							<?php } ?>					
							<!-- custom icon -->
							<?php if(isset($witrshowdata['witr_icon_item2']) && ! empty($witrshowdata['witr_icon_item2'])){?>	
								<i class="<?php echo $witrshowdata['witr_icon_item2']; ?>"></i>
							<?php } ?>
							<!-- image -->
							<?php echo $txbd_image2; ?>						
						</span>					
					
					</p>
				</div>
			<?php } ?>	
		</div>
		<!-- end area -->
	
		
		
  

		<?php
		include('witr_classicb/witr_button.php');
    } /* function end */
	
	

}