<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Pricing extends Widget_Base {

    public function get_name() {
        return 'witr_section_pricing';
    }
    
    public function get_title() {
        return esc_html__( ' Pricing Table', 'themex' );
    }
	public function get_style_depends() {
		return ['wpricing'];
	}	

    public function get_icon() {
        return 'themex_icon eicon-price-table';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {
		
			
			

			/* === witr_pricing start === */
			$this->start_controls_section(
				'witr_field_display_pricing',
				[
					'label' => esc_html__( ' Layout And Alignd Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
			
			/* witr_style_pricing */
			$this->add_control(
				'witr_style_pricing',
				[
					'label' => esc_html__( 'Pricing Layout', 'themex' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'1' => esc_html__( 'Pricing style 1', 'themex' ),
						'2' => esc_html__( 'Pricing style 2', 'themex' ),
						'3' => esc_html__( 'Pricing style 3', 'themex' ),
						'4' => esc_html__( 'Pricing style 4', 'themex' ),
						'5' => esc_html__( 'Pricing style 5', 'themex' ),
						'6' => esc_html__( 'Pricing style 6', 'themex' ),
						'7' => esc_html__( 'Pricing style 7', 'themex' ),
					],
					'default' => '6',
				]
			);
				/* witr_text_align */					
				$this->add_responsive_control(
					'witr_text_alignd',
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
							'{{WRAPPER}} .pricing-part' => 'text-align: {{VALUE}}',
						],
					]
				);
			$this->end_controls_section();
			/* === end witr_pricing ===  */	
			
			/* ===  witr_field_iconimg === */
			$this->start_controls_section(
				'witr_field_iconimg',
				[
					'label' => esc_html__( ' Icon And Image', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);				
			/* witr_show_icon witr_icon_item */
				$this->add_control(
					'witr_show_icon',
					[
						'label' => esc_html__( 'Show Icon', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'separator' => 'before',							
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),							
						'return_value' => 'yes',
						'default' => 'yes',							
					]
				);				
				$this->add_control(
					'witr_icon_item',
					[
						'label' => esc_html__( 'Icon', 'themex' ),
						'type' => Controls_Manager::ICONS,
						'separator' => 'before',
						'description' => esc_html__( 'Change icon here, For this, click on the library field', 'themex' ),
						'fa4compatibility' => 'icon',
						'default' => [
							'value' => 'fas fa-paper-plane',
							'library' => 'fa-solid',
						],
						'condition' => [
							'witr_show_icon' => 'yes',
						],							
					]
				);

					
				/* witr_show_image witr_feature_image */
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
				
					$this->add_control(
						'witr_pricing_image',
						[
							'label' => esc_html__( 'Choose Image', 'themex' ),
							'type' => Controls_Manager::MEDIA,
							'default' => [
								'url' =>'',
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
							'condition' => [
								'witr_show_image' => 'yes',
							],							
						]
					);				
			$this->end_controls_section();
			/* === end witr_pricing ===  */	
			
			/* ===  witr_field_tcprice === */
			$this->start_controls_section(
				'witr_field_tcprice',
				[
					'label' => esc_html__( ' Title, Content, And, Price Option', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);				
				
				/* witr_pricing_title */	
				$this->add_control(
					'witr_pricing_title',
					[
						'label' => esc_html__( 'Title', 'themex' ),
						'type' => Controls_Manager::TEXTAREA,
						'separator' => 'before',
						'description' => esc_html__( 'Not use title top, remove the text from field', 'themex' ),
						'default' => esc_html__( 'Advance Plan', 'themex' ),
						'placeholder' => esc_attr__( 'Type your pricing title here', 'themex' ),						
					]
				);
				
				/* pricing subtitle witr_pricing_subtitle */
				$this->add_control(
					'witr_pricing_ribon',
					[
						'label' => esc_html__( 'Ribon Text ', 'themex' ),
						'type' => Controls_Manager::TEXTAREA,
						'separator' => 'before',
						'description' => esc_html__( 'Not use ribon, remove the text from field', 'themex' ),
						'default' => esc_html__( 'Popular', 'themex' ),
						'placeholder' => esc_attr__( 'Type your ribon here', 'themex' ),						
					]
				);	
				/* witr_pricing_content */
				$this->add_control(
					'witr_pricing_content',
					[
						'label' => esc_html__( 'Content Text ', 'themex' ),
						'type' => Controls_Manager::TEXTAREA,
						'separator' => 'before',
						'description' => esc_html__( 'use content in the box, workink style 1,5,4', 'themex' ),
						'default' => esc_html__( '', 'themex' ),
						'placeholder' => esc_attr__( 'Type your content here', 'themex' ),	
					]
				);
				/* witr_pricing_month */
				$this->add_control(
					'witr_pricing_offerp',
					[
						'label' => esc_html__( 'Offer Price', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'description' => esc_html__( 'Not use month , remove the text from field', 'themex' ),
						'default' => esc_html__( '', 'themex' ),
						'placeholder' => esc_attr__( 'Type your price here', 'themex' ),						
					]
				);				
				/* witr_pricing_currency */
				$this->add_control(
					'witr_pricing_currency',
					[
						'label' => esc_html__( 'Currency', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'description' => esc_html__( 'Not use Currency , remove the text from field', 'themex' ),
						'default' => esc_html__( '$', 'themex' ),
						'placeholder' => esc_attr__( 'Type your Currency here', 'themex' ),						
					]
				);
				
				/* pricing price witr_pricing_price */
				$this->add_control(
					'witr_pricing_price',
					[
						'label' => esc_html__( 'Price ', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'description' => esc_html__( 'Not use price, remove the text from field', 'themex' ),
						'default' => esc_html__( '31', 'themex' ),
						'placeholder' => esc_attr__( 'Type your price here', 'themex' ),						
					]
				);
				
				/* witr_pricing_month */
				$this->add_control(
					'witr_pricing_month',
					[
						'label' => esc_html__( 'Month/Year', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'description' => esc_html__( 'Not use Monthly , remove the text from field', 'themex' ),
						'default' => esc_html__( 'Monthly', 'themex' ),
						'placeholder' => esc_attr__( 'Type your Monthly here', 'themex' ),						
					]
				);	
				/* witr_pricing_month */
				$this->add_control(
					'witr_pricing_yearly',
					[
						'label' => esc_html__( 'Extra yearly option', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'description' => esc_html__( 'Not use month , remove the text from field', 'themex' ),
						'default' => esc_html__( '', 'themex' ),
						'placeholder' => esc_attr__( 'Type your text here', 'themex' ),						
					]
				);				
				
			$this->end_controls_section();
			/* === end witr_pricing ===  */	
			
			/* ===  witr_field_button === */
			$this->start_controls_section(
				'witr_field_list',
				[
					'label' => esc_html__( ' Feature List Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
				/* witr_show_icon witr_icon_item */
				$this->add_control(
					'witr_price_showlist',
					[
						'label' => esc_html__( 'Show Feature List', 'themex' ),
						'type' => Controls_Manager::SWITCHER,								
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'separator'=>'before',
						'return_value' => 'yes',
						'default' => 'yes',							
					]
				);
				$repeater = new Repeater();	

				/* witr_show_icon witr_icon_item */
				$repeater->add_control(
					'witr_price_showicon',
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
					'witr_pricing_ficon',
					[
						'label' => esc_html__( 'Icon', 'themex' ),
						'type' => Controls_Manager::ICONS,
						'description' => esc_html__( 'Change icon here, For this, click on the library field And Not use Icon,Click On The Hide Option', 'themex' ),
						'fa4compatibility' => 'icon',
						'default' => [
							'value' => 'fas fa-angle-double-right',
							'library' => 'fa-solid',
						],
						'condition' => [
							'witr_price_showicon' => 'yes',
						],						
					]
				);
				$repeater->add_control(
					'witr_pricing_ftitle',
					[
						'label'   => esc_html__( 'List Title', 'themex' ),
						'type'    => Controls_Manager::TEXT,
					]
				);
				$repeater->add_control(
					'witr_old_features',
					[
						'label'        => esc_html__( 'List Line Through', 'themex' ),
						'type'         => Controls_Manager::SWITCHER,
						'return_value' => 'yes',
					]
				);
				/* Icon Color */
				$repeater->add_control(
					'witr_linet_color',
					[
						'label' => esc_html__( 'Line Through Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .witri_texti_list ul li.off' => 'color: {{VALUE}}',
						],					
					]
				);				
					/* witr_list_tslide */
					$this->add_control(
						'witr_pricing_lists',
						[
							'label' => esc_html__( 'Feature List', 'themex' ),
							'type' => Controls_Manager::REPEATER,
						'condition' => [
							'witr_price_showlist' => 'yes',
						],
							'fields' => $repeater->get_controls(),
							'default' => [
								[
									'witr_pricing_ftitle' => esc_html__( 'List Title One', 'themex' ),
								],
								[
									'witr_pricing_ftitle' => esc_html__( 'List Title One', 'themex' ),
								],
								[
									'witr_pricing_ftitle' => esc_html__( 'List Title One', 'themex' ),
								],
								
							],
							'title_field' => '{{{ witr_pricing_ftitle }}}',
						]
					);
			$this->end_controls_section();
			/* === end witr_pricing ===  */	

				
			/* ===  witr_field_button === */
			$this->start_controls_section(
				'witr_field_button',
				[
					'label' => esc_html__( ' Button Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);	
				/* SHOW BUTTON witr_show_button witr_pricing_button witr_button_link	*/
				$this->add_control(
					'witr_show_button',
					[
						'label' => esc_html__( 'Show button', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'separator' => 'before',
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'yes',
					]
				);				
				$this->add_control(
					'witr_pricing_button',
					[
						'label' => esc_html__( 'Button Text', 'themex' ),
						'label_block' =>true,
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'default' => esc_html__( 'Subscribe Now', 'themex' ),
						'placeholder' => esc_attr__( 'Type your button text here', 'themex' ),
						'condition' => [
							'witr_show_button' => 'yes',
						],							
					]
				);
				/*  witr_button_link */	
				$this->add_control(
					'witr_button_link',
					[
						'label' => esc_html__( 'Button Link', 'themex' ),
						'type' => Controls_Manager::URL,
						'description' =>esc_html__('Insert button link. It hidden when field blank.','themex'),
						'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
						'show_external' => true,
						'default' => [
							'url' => '#',
						],	
						'condition' => [
							'witr_show_button' => 'yes',
						],							
					]
				);				
				$this->add_control(
					'witr_pricing_call',
					[
						'label' => esc_html__( ' Text', 'themex' ),
						'label_block' =>true,
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'placeholder' => esc_attr__( 'Type your text here', 'themex' ),							
					]
				);				
				
			$this->end_controls_section();
			/* === end witr_pricing ===  */
			
			/* ===  witr_field_button === */
			$this->start_controls_section(
				'witr_field_active',
				[
					'label' => esc_html__( ' Pricing Active Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);				

				/* SHOW Active	 witr_show_active */
				$this->add_control(
					'witr_show_active',
					[
						'label' => esc_html__( 'Set Active:', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'separator' => 'before',
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'description' => esc_html__( ' If you set yes, It will be set active.', 'themex' ),						
						'return_value' => 'yes',
						'default' => 'no',
					]
				);
				/* Active background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_active_background',
						'label' => esc_html__( ' Background', 'themex' ),
						'separator'=>'before',
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .active.pricing_area',
						'condition' => [
							'witr_show_active' => 'yes',
						],						
					]
				);
				/* witr_active_bgheadding  */
				$this->add_responsive_control(
					'witr_active_bgheadding',
					[
						'label' => esc_html__( 'Active Background Overly', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'condition' => [
							'witr_show_active' => 'yes',
						],						
					]
				);			
			/* witr_activeo_background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_activeo_background',
					'label' => esc_html__( ' Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .active.pricing_area::before',
					'condition' => [
						'witr_show_active' => 'yes',
					],					
				]
			);				
				/* witr_active_color */
				$this->add_control(
					'witr_active_color',
					[
						'label' => esc_html__( 'Active Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',
						'default' => '#fff',
						'selectors' => [
							'{{WRAPPER}} .witr_pricing_icon i,{{WRAPPER}} .all_pricing_color p,{{WRAPPER}} .all_pricing_color h5,{{WRAPPER}} .all_pricing_color h6,{{WRAPPER}} .all_pricing_color h4,{{WRAPPER}} .witri_texti_list ul li' => 'color: {{VALUE}}',
						],
						'condition' => [
							'witr_show_active' => 'yes',
						],						
					]
				);	
			
			$this->end_controls_section();
			/* === end witr_pricing ===  */			
			
			
			
	/*======================================================================================================================================
										START TO STYLE
	========================================================================================================================================*/			
		
		/*=== start witr_style_option_box style ====*/
		$this->start_controls_section(
			'witr_style_option_box',
			[
				'label' => esc_html__( 'Top Box Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_style_pricing' =>['6'],
					],				
			]
		);		
		
			/* Active background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_box6_background',
					'label' => esc_html__( ' Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .pricing_top_box',
				]
			);
			
				/* witr_box6_padding  */
				$this->add_responsive_control(
					'witr_box6_headding',
					[
						'label' => esc_html__( ' Background Overly', 'themex' ),
						'type' => Controls_Manager::HEADING,
					]
				);			
			/* Active background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_box6b_background',
					'label' => esc_html__( ' Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .pricing_top_box::before',
				]
			);			
				/* witr_box6_radius */
				$this->add_control(
					'witr_box6_radius',
					[
						'label' => esc_html__( 'Box Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .pricing_top_box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
							
			
		 $this->end_controls_section();
		/*=== end  witr_Active Box style ====*/
	
			/*=== start witr_single_pricing style ====*/
			$this->start_controls_section(
				'witr_single_pricing',
				[
					'label' => esc_html__( 'Single Pricing Option', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,				
					
				]
			);
				/* area background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_box_backgroundi',
						'label' => esc_html__( 'Box List area Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .pricing_area',
					]
				);			
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_bbox_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .pricing_area',
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
							'{{WRAPPER}} .pricing_area' => 'border-style: {{VALUE}}',
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
							'{{WRAPPER}} .pricing_area' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .pricing_area' => 'border-color: {{VALUE}}',
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
						'label' => esc_html__( 'Single Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .pricing_area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* border hover color */
				$this->add_control(
					'witr_border_hover_color',
					[
						'label' => esc_html__( 'Border Hover Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						
						'selectors' => [
							'{{WRAPPER}} .pricing_area:hover' => 'border-color: {{VALUE}}',
						],
					]
				);	
				
				/* witr_box_padding  */
				$this->add_responsive_control(
					'witr_box1_padding',
					[
						'label' => esc_html__( ' Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .pricing_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);	







				
			
			$this->end_controls_section();
			/* === end witr_single_pricing ===  */			
			
			
			/*=== start witr_icon style ====*/
			$this->start_controls_section(
				'section_style_icon',
				[
					'label' => esc_html__( 'Icon Color Option', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,				
					'condition' => [
						'witr_show_icon' => 'yes',
					],					
				]
			);						
			/*=== start icon_tabs style ====*/
			$this->start_controls_tabs( 'icon_colors' );
			
				/*=== start icon_normal style ====*/
				$this->start_controls_tab(
					'icon_colors_normal',
					[
						'label' => esc_html__( 'Normal', 'themex' ),
					]
					
				);
				/* Icon Color */
				$this->add_control(
					'witr_icon_color',
					[
						'label' => esc_html__( 'Icon Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .witr_pricing_icon i' => 'color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .witr_pricing_icon i',
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
								'min' => 0,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_pricing_icon i' => 'font-size: {{SIZE}}{{UNIT}};',
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
								'min' => 0,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_pricing_icon i' => 'width: {{SIZE}}{{UNIT}};',
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
								'min' => 0,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_pricing_icon i' => 'height: {{SIZE}}{{UNIT}};',
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
								'min' => 0,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_pricing_icon i' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);
		
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_border_style',
						'label' => esc_html__( 'Icon Border', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_pricing_icon i',
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
							'{{WRAPPER}} .witr_pricing_icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
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
							'{{WRAPPER}} .witr_pricing_icon i' => 'mix-blend-mode: {{VALUE}}',
						],
					]
				);				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_pricing_icon i',
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
							'{{WRAPPER}} .witr_pricing_icon i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_pricing_icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		
				

				$this->end_controls_tab();
				/*=== end icon normal style ====*/
			
					/*=== start icon hover style ====*/
					$this->start_controls_tab(
						'icon_colors_hover',
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
								'{{WRAPPER}} .witr_pricing_icon:hover i' => 'color: {{VALUE}}',
							],
						]
					);
					/* hover Icon background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_hovet_icon',
							'label' => esc_html__( 'Icon Hover Background', 'themex' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .witr_pricing_icon:hover i',
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
				'condition' => [
					'witr_show_image' => 'yes',
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
					'range' => [
						'px' => [
							'min' => 25,
							'max' => 1000,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color img' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .all_pricing_color img' => 'height: {{SIZE}}{{UNIT}};',
					],
				]			
			);
			
			/* witr_border_style */
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'witr_img_bb',
					'label' => esc_html__( 'Border', 'themex' ),
					'selector' => '{{WRAPPER}} .single_seivice_ani img,{{WRAPPER}} .all_pricing_color img',
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
						'{{WRAPPER}} .all_pricing_color img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_pricing_color img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_pricing_color img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_pricing_color h4' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .all_pricing_color h4:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_ttpy_colorp1',
					'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
					],
					'selector' => '{{WRAPPER}} .all_pricing_color h4',
				]
			);		
			/* title background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_title_background',
					'label' => esc_html__( 'Title Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .all_pricing_color h4',
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
						'{{WRAPPER}} .all_pricing_color h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_pricing' =>['1','2','3','4','5','6'],
					],										
				]
			);
			/* witr_title_bar_margin */
			$this->add_responsive_control(
				'witr_title_bar_margin',
				[
					'label' => esc_html__( 'Title Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .pricing_bar_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_pricing' =>['7'],
					],					
				]
			);
			/* title margin */
			$this->add_responsive_control(
				'witr_bar_heading',
				[
					'label' => esc_html__( 'Bar Color', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'condition' => [
						'witr_style_pricing' =>['7'],
					],										
				]
			);
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_bar_background',
					'label' => esc_html__( 'bar Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .pricing_bar_title::before',
					'condition' => [
						'witr_style_pricing' =>['7'],
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
						'{{WRAPPER}} .all_pricing_color h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'global' => [
						'default' => Global_Colors::COLOR_TEXT,
					],					
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color p' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .all_pricing_color p',
				]
			);		

			/* content margin */
			$this->add_responsive_control(
				'content_margin',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* content padding */
			$this->add_responsive_control(
				'content_padding',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr content style ====*/		
	

		/*=== start witr_price style ====*/
		$this->start_controls_section(
			'witr_style_option_price',
			[
				'label' => esc_html__( 'Price Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
			/* color */
			$this->add_control(
				'witr_price_color',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_SECONDARY,
					],						
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color h5' => 'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
				'witr_price_hover_color',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,					
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color h5:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_ttpy_colorp2',
					'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
					],
					'selector' => '{{WRAPPER}} .all_pricing_color h5',
				]
			);		
			/* pricing background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_pricinc_background',
					'label' => esc_html__( 'Price Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .all_pricing_color h5, {{WRAPPER}} .all_pricing_color .witr_p_middle_inner',
				]
			);
			/* border_radius */
			$this->add_control(
				'witr_border_pr_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .witr_p_middle_inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);				
			/* price margin */
			$this->add_responsive_control(
				'witr_price_margin',
				[
					'label' => esc_html__( 'Price Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* price padding */
			$this->add_responsive_control(
				'witr_price_padding',
				[
					'label' => esc_html__( 'Price Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
			/* hesding */
			$this->add_control(
				'witr_chh',
				[
					'label' => esc_html__( 'Currency/Month/Year', 'themex' ),
					'type' => Controls_Manager::HEADING,					
					'separator' => 'before',
				]
			);
			/* Currency/Month/Year color */
			$this->add_control(
				'witr_cmy_color',
				[
					'label' => esc_html__( ' Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_SECONDARY,
					],					
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color span' => 'color: {{VALUE}}',
					],
				]
			);
			
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_cmy_colorp2',
					'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
					],
					'selector' => '{{WRAPPER}} .all_pricing_color span',
				]
			);			
			/* margin */
			$this->add_responsive_control(
				'witr_cmy_margin',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);			
			
			
			/* Offer price color ======================= */
			/* hesding */
			$this->add_control(
				'witr_pycof',
				[
					'label' => esc_html__( 'Offer Price Color option', 'themex' ),
					'type' => Controls_Manager::HEADING,					
					'separator' => 'before',
				]
			);			
			$this->add_control(
				'witr_pycof_color',
				[
					'label' => esc_html__( ' Offer Price Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_SECONDARY,
					],					
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color h6' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'witr_pychof_color',
				[
					'label' => esc_html__( ' Offer Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,				
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color h6:hover' => 'color: {{VALUE}}',
					],
				]
			);
			
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_pycof_colorp2',
					'label' => esc_html__( 'Offer Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
					],
					'selector' => '{{WRAPPER}} .all_pricing_color h6',
				]
			);
			/* pricing background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_pycof_background',
					'label' => esc_html__( 'Offer Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .all_pricing_color h6',
				]
			);			
			/* price padding */
			$this->add_responsive_control(
				'witr_pycof_padding',
				[
					'label' => esc_html__( 'Offer Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);			
			/* margin */
			$this->add_responsive_control(
				'witr_pycof_margin',
				[
					'label' => esc_html__( 'Offer Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);				
						
			
			
			/* yearly color */
			/* hesding */
			$this->add_control(
				'witr_pyc',
				[
					'label' => esc_html__( 'Extra Yearly Color option', 'themex' ),
					'type' => Controls_Manager::HEADING,					
					'separator' => 'before',
				]
			);			
			$this->add_control(
				'witr_pyc_color',
				[
					'label' => esc_html__( ' Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_SECONDARY,
					],					
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color p' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'witr_pych_color',
				[
					'label' => esc_html__( ' Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,				
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color p:hover' => 'color: {{VALUE}}',
					],
				]
			);
			
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_pyc_colorp2',
					'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
					],
					'selector' => '{{WRAPPER}} .all_pricing_color p',
				]
			);
			/* pricing background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_pyc_background',
					'label' => esc_html__( 'Price Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .all_pricing_color p',
				]
			);			
			/* price padding */
			$this->add_responsive_control(
				'witr_pyc_padding',
				[
					'label' => esc_html__( 'Price Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);			
			/* margin */
			$this->add_responsive_control(
				'witr_pyc_margin',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);				
			

		 
		 $this->end_controls_section();
		/*=== end  witr_price style ====*/	


		/*=== start witr_ribon style ====*/
		$this->start_controls_section(
			'witr_style_option_ribon',
			[
				'label' => esc_html__( 'Ribon Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
			/* color */
			$this->add_control(
				'witr_ribon_color',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,					
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color strong,{{WRAPPER}} .witr_ribon_text h3' => 'color: {{VALUE}}',
					],
				]
			);
			/* ribon background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_ribon_background',
					'label' => esc_html__( 'Ribon Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .all_pricing_color strong,{{WRAPPER}} .witr_ribon_text h3',
				]
			);			
			/* hover color */
			$this->add_control(
				'witr_ribon_hover_color',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',					
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color strong:hover,{{WRAPPER}} .witr_ribon_text h3:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/* ribon hover background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_ribonh_background',
					'label' => esc_html__( 'Ribon Hover Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .all_pricing_color strong:hover,{{WRAPPER}} .witr_ribon_text h3:hover',
				]
			);			
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_ttpy_colorp9',
					'label' => esc_html__( 'Typography', 'themex' ),
					'selector' => '{{WRAPPER}} .all_pricing_color strong,{{WRAPPER}} .witr_ribon_text h3',
				]
			);						
			/* ribon margin */
			$this->add_responsive_control(
				'witr_ribon_margin',
				[
					'label' => esc_html__( 'Ribon Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color strong,{{WRAPPER}} .witr_ribon_text h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* ribon padding */
			$this->add_responsive_control(
				'witr_ribon_padding',
				[
					'label' => esc_html__( 'Ribon Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_pricing_color strong,{{WRAPPER}} .witr_ribon_text h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		 $this->end_controls_section();
		/*=== end  witr_ribon style ====*/		
		
		/*=== start witr list style ====*/
		$this->start_controls_section(
			'witr_style_option_list',
			[
				'label' => esc_html__( 'Feature List Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

			/*=== start list_tabs style ====*/
			$this->start_controls_tabs( 'list_colors' );
			
				/*=== start list_normal style ====*/
				$this->start_controls_tab(
					'witr_list_colors_normal',
					[
						'label' => esc_html__( 'Normal', 'themex' ),
					]
				);
				/* witr_text_align_list */					
				$this->add_responsive_control(
					'witr_text_align_list',
					[
						'label' => esc_html__( 'Text Align', 'themex' ),
						'type' => Controls_Manager::CHOOSE,
						'default' => '',
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
							'{{WRAPPER}} .pricing-part ul' => 'text-align: {{VALUE}}',
						],
					]
				);						
				
					/* color */
					$this->add_control(
						'witr_list_color',
						[
							'label' => esc_html__( 'Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'global' => [
								'default' => Global_Colors::COLOR_TEXT,
							],							
							'selectors' => [
								'{{WRAPPER}} .all_pricing_color ul li' => 'color: {{VALUE}}',
							],
						]
					);
					/* list background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_list_background',
							'label' => esc_html__( 'List Background', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .all_pricing_color ul li',
						]
					);					
					/* odd color */
					$this->add_control(
						'witr_odd_color',
						[
							'label' => esc_html__( 'Odd Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'global' => [
								'default' => Global_Colors::COLOR_TEXT,
							],							
							'selectors' => [
								'{{WRAPPER}} .all_pricing_color ul li:nth-child(odd)' => 'color: {{VALUE}}',
							],
						]
					);
					/* odd background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_odd_background',
							'label' => esc_html__( 'Odd Background', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .all_pricing_color ul li:nth-child(odd)',
						]
					);					
					/* even color */
					$this->add_control(
						'witr_even_color',
						[
							'label' => esc_html__( 'Even Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'global' => [
								'default' => Global_Colors::COLOR_TEXT,
							],							
							'selectors' => [
								'{{WRAPPER}} .all_pricing_color ul li:nth-child(even)' => 'color: {{VALUE}}',
							],
						]
					);

					/* even background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_even_background',
							'label' => esc_html__( 'Even Background', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .all_pricing_color ul li:nth-child(even)',
						]
					);					

					/* typograohy color */			
					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'witr_list_typography',
							'label' => esc_html__( 'Typography', 'themex' ),
							'global' => [
								'default' => Global_Typography::TYPOGRAPHY_TEXT,
							],
							'selector' => '{{WRAPPER}} .all_pricing_color ul li',
						]
					);		

					/* list margin */
					$this->add_responsive_control(
						'list_margin',
						[
							'label' => esc_html__( 'Margin', 'themex' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors' => [
								'{{WRAPPER}} .all_pricing_color ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					/* list padding */
					$this->add_responsive_control(
						'list_padding',
						[
							'label' => esc_html__( 'Padding', 'themex' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors' => [
								'{{WRAPPER}} .all_pricing_color ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					
				$this->end_controls_tab();
				/*=== end list normal style ====*/					
					
				/*=== start list_normal style ====*/
				$this->start_controls_tab(
					'witr_list_box_normal',
					[
						'label' => esc_html__( 'Box', 'themex' ),
					]
				);									
					/* area background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_active_backgroundi',
							'label' => esc_html__( 'Box List area Background', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .pricing-part ul',
						]
					);										
					/* border_radius */
					$this->add_control(
						'witr_lab_radius',
						[
							'label' => esc_html__( 'Border Radius', 'themex' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%' ],
							'selectors' => [
								'{{WRAPPER}} .pricing-part ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);				
					/* box shadow list */	
					$this->add_group_control(
						Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'witr_boxl_shadow',
							'label' => esc_html__( 'Box Shadow', 'themex' ),
							'selector' => '{{WRAPPER}} .pricing-part ul',
						]
					);
					/* witr_feature_margini*/
					$this->add_responsive_control(
						'witr_feature_margini',
						[
							'label' => esc_html__( ' margin', 'themex' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors' => [
								'{{WRAPPER}} .witri_texti_list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);					
					/* List Box padding */
					$this->add_responsive_control(
						'witr_ribon_paddingi',
						[
							'label' => esc_html__( ' Padding', 'themex' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors' => [
								'{{WRAPPER}} .pricing-part ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);					
					
					
				$this->end_controls_tab();
				/*=== end list normal style ====*/
			
					/*=== start list hover style ====*/
					$this->start_controls_tab(
						'witr_list_colors_hover',
						[
							'label' => esc_html__( 'List Hover', 'themex' ),
						]
					);
					
							
					/* hover color */
					$this->add_control(
						'witr_list_hover_color',
						[
							'label' => esc_html__( 'Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							'selectors' => [
								'{{WRAPPER}} .all_pricing_color ul li:hover' => 'color: {{VALUE}}',
							],
						]
					);					
					/* odd hover color */
					$this->add_control(
						'witr_odd_hover_color',
						[
							'label' => esc_html__( 'Odd Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,							
							'selectors' => [
								'{{WRAPPER}} .all_pricing_color ul li:nth-child(odd):hover' => 'color: {{VALUE}}',
							],
						]
					);
					/* even hover color */
					$this->add_control(
						'witr_even_hover_color',
						[
							'label' => esc_html__( 'Even Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,							
							'selectors' => [
								'{{WRAPPER}} .all_pricing_color ul li:nth-child(even):hover' => 'color: {{VALUE}}',
							],
						]
					);
					/* hover list background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_hover_list',
							'label' => esc_html__( 'List Hover Background', 'themex' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .all_pricing_color ul li:hover',
						]
					);
					

					$this->end_controls_tab();
					/*=== end list hover style ====*/
					/*=== start list style ====*/
					$this->start_controls_tab(
						'witr_icon_colors',
						[
							'label' => esc_html__( 'Icon', 'themex' ),
						]
					);					
					/* Icon Color */
					$this->add_control(
						'witr_listi_color',
						[
							'label' => esc_html__( ' Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							'selectors' => [
								'{{WRAPPER}} .witri_texti_list ul li i' => 'color: {{VALUE}}',
							],
							
						]
					);					
					/*  icon font size */
					$this->add_responsive_control(
						'witr_listi_size',
						[
							'label' => esc_html__( 'Font Size', 'themex' ),
							'type' => Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%', 'em' ],
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 500,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .witri_texti_list ul li i' => 'font-size: {{SIZE}}{{UNIT}};',
							],
						]
					);					
				/* icon margin */
				$this->add_responsive_control(
					'witr_listi_margin',
					[
						'label' => esc_html__( ' Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .witri_texti_list ul li i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);					
					
					
					$this->end_controls_tab();
					/*=== end list hover style ====*/					
					
					
					
			$this->end_controls_tabs();
			/*=== end list_tabs style ====*/

		 $this->end_controls_section();
		/*=== end  witr list style ====*/
		
		

			/*=== start witr button style ====*/
			$this->start_controls_section(
				'witr_style_option_button',
				[
					'label' => esc_html__( 'Button Color Option', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_show_button' => 'yes',
					],					
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
									'{{WRAPPER}} .witr_btnp_color a.btn' => 'color: {{VALUE}}',
								],
							]
						);				
						/* Button background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_button_background',
								'label' => esc_html__( 'button Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .witr_btnp_color a.btn',
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
								'selector' => '{{WRAPPER}} .witr_btnp_color a.btn',
							]
						);	

						/* witr_border_style */
						$this->add_control(
							'witr_border_btns_style',
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
									'{{WRAPPER}} .witr_btnp_color a.btn' => 'border-style: {{VALUE}}',
								],
							]
						);		
						/* witr border */
						$this->add_control(
							'witr_borde_btns',
							[
								'label' => esc_html__( 'Border', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'selectors' => [
									'{{WRAPPER}} .witr_btnp_color a.btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
								'condition' => [
									'witr_border_btns_style' => ['solid','double','dotted','dashed','default'],
								],
							]							
							
						);
						/* border_color */
						$this->add_control(
							'witr_border_btns_color',
							[
								'label' => esc_html__( 'Border Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								
								'selectors' => [
									'{{WRAPPER}} .witr_btnp_color a.btn' => 'border-color: {{VALUE}}',
								],
								'condition' => [
									'witr_border_btns_style' => ['solid','double','dotted','dashed','default'],
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
									'{{WRAPPER}} .witr_btnp_color a.btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .witr_btnp_color a.btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .witr_btnp_color a.btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);					
					/* hesding */
					$this->add_control(
						'witr_btn_boxh',
						[
							'label' => esc_html__( 'Button Box Option', 'themex' ),
							'type' => Controls_Manager::HEADING,					
							'separator' => 'before',
						]
					);
					/* Button background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_boxb_background',
							'label' => esc_html__( 'button Background', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .witr_btnp_color',
						]
					);
					/* hesding hover */
					$this->add_control(
						'witr_btnhover_boxh',
						[
							'label' => esc_html__( 'Button Box Hover', 'themex' ),
							'type' => Controls_Manager::HEADING,					
						]
					);
					/* Button background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_boxbho_background',
							'label' => esc_html__( 'button Background', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .pricing_area:hover .witr_btnp_color',
						]
					);

						/* witr_border_style */
						$this->add_control(
							'witr_borderc_box_style',
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
									'{{WRAPPER}} .witr_btnp_color' => 'border-style: {{VALUE}}',
								],
							]
						);		
						/* witr border */
						$this->add_control(
							'witr_bordecb_box',
							[
								'label' => esc_html__( 'Border', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'selectors' => [
									'{{WRAPPER}} .witr_btnp_color' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
								'condition' => [
									'witr_borderc_box_style' => ['solid','double','dotted','dashed','default'],
								],
							]							
							
						);
						/* border_color */
						$this->add_control(
							'witr_borderb_box_color',
							[
								'label' => esc_html__( 'Border Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								
								'selectors' => [
									'{{WRAPPER}} .witr_btnp_color' => 'border-color: {{VALUE}}',
								],
								'condition' => [
									'witr_borderc_box_style' => ['solid','double','dotted','dashed','default'],
								],
							]
						);
						/* border hover color */
						$this->add_control(
							'witr_borderh_box_color',
							[
								'label' => esc_html__( 'Border Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								
								'selectors' => [
									'{{WRAPPER}} .pricing_area:hover .witr_btnp_color' => 'border-color: {{VALUE}}',
								],
								'condition' => [
									'witr_borderc_box_style' => ['solid','double','dotted','dashed','default'],
								],
							]
						);
						
						/* border_radius */
						$this->add_control(
							'witr_border_rad_box',
							[
								'label' => esc_html__( 'Border Radius', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .witr_btnp_color' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',								
								],
								'condition' => [
									'witr_borderc_box_style' => ['solid','double','dotted','dashed','default'],
								],
							]
						);
					
					/* Box margin */
					$this->add_responsive_control(
						'witr_boxb_margin',
						[
							'label' => esc_html__( ' Margin', 'themex' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors' => [
								'{{WRAPPER}} .witr_btnp_color' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					/* padding */
					$this->add_responsive_control(
						'witr_boxb_padding',
						[
							'label' => esc_html__( ' Padding', 'themex' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors' => [
								'{{WRAPPER}} .witr_btnp_color' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .witr_btnp_color a.btn:hover' => 'color: {{VALUE}}',
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
								'selector' => '{{WRAPPER}} .witr_btnp_color a.btn:hover',
							]
						);
						/* witr_border_style */
						$this->add_control(
							'witr_hhbtns_style',
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
									'{{WRAPPER}} .witr_btnp_color a.btn:hover' => 'border-style: {{VALUE}}',
								],
							]
						);		
						/* witr border */
						$this->add_control(
							'witr_hhh_btns',
							[
								'label' => esc_html__( 'Border', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'selectors' => [
									'{{WRAPPER}} .witr_btnp_color a.btn:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
								'condition' => [
									'witr_border_btns_style' => ['solid','double','dotted','dashed','default'],
								],
							]							
							
						);
						/* border_color */
						$this->add_control(
							'witr_hh_btns_color',
							[
								'label' => esc_html__( 'Border Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								
								'selectors' => [
									'{{WRAPPER}} .witr_btnp_color a.btn:hover' => 'border-color: {{VALUE}}',
								],
								'condition' => [
									'witr_border_btns_style' => ['solid','double','dotted','dashed','default'],
								],
							]
						);						
						
						/* border_radius */
						$this->add_control(
							'witr_bordh_btn_radius',
							[
								'label' => esc_html__( 'Border Radius', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .witr_btnp_color a.btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);					
						
						
						$this->end_controls_tab();
						/*=== end button hover style ====*/
					/*=== start list hover style ====*/
					$this->start_controls_tab(
						'witr_text_colors_hover',
						[
							'label' => esc_html__( 'Text', 'themex' ),
						]
					);
					
						/* color */
						$this->add_control(
							'witr_call_color',
							[
								'label' => esc_html__( 'Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'global' => [
									'default' => Global_Colors::COLOR_PRIMARY,
								],					
								'separator'=>'before',
								'selectors' => [
									'{{WRAPPER}} .witr_btnp_call h2' => 'color: {{VALUE}}',
								],
							]
						);
						/* hover color */
						$this->add_control(
							'witr_call_hover_color',
							[
								'label' => esc_html__( 'Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,					
								'selectors' => [
									'{{WRAPPER}} .witr_btnp_call h2:hover' => 'color: {{VALUE}}',
								],
							]
						);
						/* typograohy color */			
						$this->add_group_control(
							Group_Control_Typography::get_type(),
							[
								'name' => 'witr_call_colorp1',
								'label' => esc_html__( 'Typography', 'themex' ),
								'global' => [
									'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
								],
								'selector' => '{{WRAPPER}} .witr_btnp_call h2',
							]
						);					
						/* content margin */
						$this->add_responsive_control(
							'call_margin',
							[
								'label' => esc_html__( 'Margin', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .witr_btnp_call h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/* content padding */
						$this->add_responsive_control(
							'call_padding',
							[
								'label' => esc_html__( 'Padding', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .witr_btnp_call h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
					

					$this->end_controls_tab();
					/*=== end list hover style ====*/						
						
						
				$this->end_controls_tabs();
				/*=== end button_tabs style ====*/			
			 
			 $this->end_controls_section();
			/*=== end  witr button style ====*/		
		
		 		
		
		

		
		

    } /*===function end ===*/

    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();
		$target_btn = ! empty($witrshowdata['witr_button_link']['is_external']) ? ' target="_blank"' : '';
		$nofollow_btn = ! empty($witrshowdata['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';		
		$txbd_image = ! empty($witrshowdata['witr_pricing_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witrshowdata, 'txbd_image_size', 'witr_pricing_image' ) : '';	
			
		switch ( $witrshowdata['witr_style_pricing'] ) {
			case'7':
			?>
				<div class="pricing_area all_pricing_color  <?php if( $witrshowdata['witr_show_active']=='yes' ){ echo "active"; }?>">
                    <div class="pricing-part pricing_style_7 <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
	
							<!-- icon -->
							<div class="witr_pricing_icon">
								<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
								<?php } ?>
							</div>				
							<!-- image -->
							<?php echo $txbd_image; ?>							
							<!-- ribon -->	
							<?php if( ! empty($witrshowdata['witr_pricing_ribon'])){?>
								<strong><?php echo $witrshowdata['witr_pricing_ribon']; ?> </strong>	
							<?php }?>							
							<!--  price content -->
							<?php if( ! empty($witrshowdata['witr_pricing_content'])){?>
							<div class="prt_content"><p><?php echo $witrshowdata['witr_pricing_content']; ?> </p></div>
							<?php }?>
							<!-- offer price -->
							<?php if( ! empty($witrshowdata['witr_pricing_offerp'])){?>
								<h6><?php echo $witrshowdata['witr_pricing_offerp']; ?> </h6>	
							<?php }?>
							<!-- price/currency/month -->
							<?php if( ! empty($witrshowdata['witr_pricing_price'])){?>
								<h5><span><?php echo $witrshowdata['witr_pricing_currency']; ?></span><?php echo $witrshowdata['witr_pricing_price']; ?> <span> <?php echo $witrshowdata['witr_pricing_month']; ?></span></h5>
							<?php }?>
							<!-- yearly -->
							<?php if( ! empty($witrshowdata['witr_pricing_yearly'])){?>
								<p><?php echo $witrshowdata['witr_pricing_yearly']; ?></p>	
							<?php }?>							
							<!-- title -->
							<?php if( ! empty($witrshowdata['witr_pricing_title'])){?>
								<div class="pricing_bar_title">
									<h4><?php echo $witrshowdata['witr_pricing_title']; ?> </h4>
								</div>
							<?php }?>							

							<?php if($witrshowdata['witr_price_showlist']=='yes'){ ?>
								<!-- list -->
								<div class="witri_texti_list">
									<ul>
									<?php if(! empty($witrshowdata['witr_pricing_lists'])){	?>
										<?php foreach($witrshowdata['witr_pricing_lists'] as $witr_pric_list){?>
											<li class="<?php if( $witr_pric_list['witr_old_features'] == 'yes' ){ echo 'off'; }?> themex-item-<?php echo $witr_pric_list['_id']; ?>" >
												<?php if($witr_pric_list['witr_price_showicon']=='yes'){ ?><i class="<?php echo esc_attr( $witr_pric_list['witr_pricing_ficon']['value']);?>"></i><?php } echo $witr_pric_list['witr_pricing_ftitle']; ?>
											</li>
										<?php } } ?>	
									</ul>	
								</div>
							<?php } ?>
							
						<!-- button -->
						<?php if( ! empty($witrshowdata['witr_button_link']['url'])){?>
						<div class="witr_btnp_color">
							<a  class="btn" href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_pricing_button'];?></a>
						</div>			
						<?php }?>
						<!-- call -->
						<?php if( ! empty($witrshowdata['witr_pricing_call'])){?>
						<div class="witr_btnp_call">
							<h2><?php echo $witrshowdata['witr_pricing_call']; ?> </h2>	
						</div> 	
						<?php }?>						
                    </div> <!-- pricing part -->
                </div>
			<?php
			break;			
			case'6':
			?>
				<div class="pricing_area all_pricing_color  <?php if( $witrshowdata['witr_show_active']=='yes' ){ echo "active"; }?>">
                    <div class="pricing-part pricing_style_6 <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
	
							<div class="pricing_top_box">
								<div class="pricing_topb_zindex">
									<div class="text-left">
										<!-- ribon -->	
										<?php if( ! empty($witrshowdata['witr_pricing_ribon'])){?>
											<strong><?php echo $witrshowdata['witr_pricing_ribon']; ?> </strong>	
										<?php }?>
										<!--  price content -->
										<?php if( ! empty($witrshowdata['witr_pricing_content'])){?>
										<div class="prt_content"><p><?php echo $witrshowdata['witr_pricing_content']; ?> </p></div>
										<?php }?>									
										<!-- title -->
										<?php if(isset($witrshowdata['witr_pricing_title']) && ! empty($witrshowdata['witr_pricing_title'])){?>
											<h4><?php echo $witrshowdata['witr_pricing_title']; ?> </h4>	
										<?php }?>

									</div>
									<div class="text-right top_by_bottom">
										<!-- offer price -->
										<?php if( ! empty($witrshowdata['witr_pricing_offerp'])){?>
											<h6><?php echo $witrshowdata['witr_pricing_offerp']; ?> </h6>	
										<?php }?>
										<!-- price/currency/month -->
										<?php if( ! empty($witrshowdata['witr_pricing_price'])){?>
											<h5><span><?php echo $witrshowdata['witr_pricing_currency']; ?></span><?php echo $witrshowdata['witr_pricing_price']; ?> <span> <?php echo $witrshowdata['witr_pricing_month']; ?></span></h5>
										<?php }?>
										<!-- yearly -->
										<?php if( ! empty($witrshowdata['witr_pricing_yearly'])){?>
											<p><?php echo $witrshowdata['witr_pricing_yearly']; ?></p>	
										<?php }?>
									</div>
								</div>
							</div>

							<!-- icon -->
							<div class="witr_pricing_icon text-left">
								<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
								<?php } ?>
								<!-- image -->
								<?php echo $txbd_image; ?>								
							</div>

							<?php if($witrshowdata['witr_price_showlist']=='yes'){ ?>
								<!-- list -->
								<div class="witri_texti_list">
									<ul>
									<?php if(! empty($witrshowdata['witr_pricing_lists'])){	?>
										<?php foreach($witrshowdata['witr_pricing_lists'] as $witr_pric_list){?>
											<li class="<?php if( $witr_pric_list['witr_old_features'] == 'yes' ){ echo 'off'; }?> themex-item-<?php echo $witr_pric_list['_id']; ?>" >
												<?php if($witr_pric_list['witr_price_showicon']=='yes'){ ?><i class="<?php echo esc_attr( $witr_pric_list['witr_pricing_ficon']['value']);?>"></i><?php } echo $witr_pric_list['witr_pricing_ftitle']; ?>
											</li>
										<?php } } ?>	
									</ul>	
								</div>
							<?php } ?>
							
						<!-- button -->
						<?php if( ! empty($witrshowdata['witr_button_link']['url'])){?>
						<div class="witr_btnp_color">
							<a  class="btn" href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_pricing_button'];?></a>
						</div>			
						<?php }?>
						<!-- call -->
						<?php if( ! empty($witrshowdata['witr_pricing_call'])){?>
						<div class="witr_btnp_call">
							<h2><?php echo $witrshowdata['witr_pricing_call']; ?> </h2>	
						</div> 	
						<?php }?>						
                    </div> <!-- pricing part -->
                </div> 
			<?php
			break;
			case'5':
			?>
				<div class="pricing_area all_pricing_color  <?php if( $witrshowdata['witr_show_active']=='yes' ){ echo "active"; }?>">
                    <div class="pricing-part pricing_style_5 <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
							
							<!-- ribon -->
							<div class="witr_ribon_text">							
								<?php if( ! empty($witrshowdata['witr_pricing_ribon'])){?>
									<h3><?php echo $witrshowdata['witr_pricing_ribon']; ?> </h3>	
								<?php }?>
							</div>
							<!-- icon -->
							<div class="witr_pricing_icon">
								<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
								<?php } ?>
							</div>				
							<!-- image -->
							<?php echo $txbd_image; ?>							
						
							<!-- title -->
							<?php if(isset($witrshowdata['witr_pricing_title']) && ! empty($witrshowdata['witr_pricing_title'])){?>
								<h4><?php echo $witrshowdata['witr_pricing_title']; ?> </h4>	
							<?php }?>
							<!--  price content -->
							<?php if( ! empty($witrshowdata['witr_pricing_content'])){?>
							<div class="prt_content"><p><?php echo $witrshowdata['witr_pricing_content']; ?> </p></div>
							<?php }?>
							<div class="price_offer_line">
								<!-- offer price -->
								<?php if( ! empty($witrshowdata['witr_pricing_offerp'])){?>
									<h6><?php echo $witrshowdata['witr_pricing_offerp']; ?> </h6>	
								<?php }?>
								<!-- price/currency/month -->
								<?php if( ! empty($witrshowdata['witr_pricing_price'])){?>
									<h5><sub><?php echo $witrshowdata['witr_pricing_currency']; ?></sub><?php echo $witrshowdata['witr_pricing_price']; ?> <span> <?php echo $witrshowdata['witr_pricing_month']; ?></span></h5>
								<?php }?>
							</div>
							<!-- yearly -->
							<?php if( ! empty($witrshowdata['witr_pricing_yearly'])){?>
								<p><?php echo $witrshowdata['witr_pricing_yearly']; ?></p>	
							<?php }?>							

							<?php if($witrshowdata['witr_price_showlist']=='yes'){ ?>
								<!-- list -->
								<div class="witri_texti_list">
									<ul>
									<?php if(! empty($witrshowdata['witr_pricing_lists'])){	?>
										<?php foreach($witrshowdata['witr_pricing_lists'] as $witr_pric_list){?>
											<li class="<?php if( $witr_pric_list['witr_old_features'] == 'yes' ){ echo 'off'; }?> themex-item-<?php echo $witr_pric_list['_id']; ?>" >
												<?php if($witr_pric_list['witr_price_showicon']=='yes'){ ?><i class="<?php echo esc_attr( $witr_pric_list['witr_pricing_ficon']['value']);?>"></i><?php } echo $witr_pric_list['witr_pricing_ftitle']; ?>
											</li>
										<?php } } ?>	
									</ul>	
								</div>
							<?php } ?>
							
						<!-- button -->
						<?php if( ! empty($witrshowdata['witr_button_link']['url'])){?>
						<div class="witr_btnp_color">
							<a  class="btn" href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_pricing_button'];?></a>
						</div>			
						<?php }?>
						<!-- call -->
						<?php if( ! empty($witrshowdata['witr_pricing_call'])){?>
						<div class="witr_btnp_call">
							<h2><?php echo $witrshowdata['witr_pricing_call']; ?> </h2>	
						</div> 	
						<?php }?>						
                    </div> <!-- pricing part -->
                </div> 
			<?php
			break;			
			case'4':
			?>
				<div class="pricing_area all_pricing_color pricing_style_4 <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
                    <div class="pricing-part   <?php if( $witrshowdata['witr_show_active']=='yes' ){ echo "active"; }?>  ">
							<div class="witr_pricing_icon">
							<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
								<?php } ?>							
							</div>							
							<!-- image -->
							<?php echo $txbd_image; ?>							
							<!-- ribon -->	
							<?php if( ! empty($witrshowdata['witr_pricing_ribon'])){?>
								<strong><?php echo $witrshowdata['witr_pricing_ribon']; ?> </strong>	
							<?php }?>	
							
							<!-- title -->
							<?php if(isset($witrshowdata['witr_pricing_title']) && ! empty($witrshowdata['witr_pricing_title'])){?>
								<h4><?php echo $witrshowdata['witr_pricing_title']; ?> </h4>	
							<?php }?>
							<!-- offer price -->
							<?php if( ! empty($witrshowdata['witr_pricing_offerp'])){?>
								<h6><?php echo $witrshowdata['witr_pricing_offerp']; ?> </h6>	
							<?php }?>							
							<!-- price/currency/month -->
							<?php if( ! empty($witrshowdata['witr_pricing_price'])){?>
								<div class="witr_p_middle">
									<div class="witr_p_middle_inner">
									<h5><span><?php echo $witrshowdata['witr_pricing_currency']; ?></span><?php echo $witrshowdata['witr_pricing_price']; ?> <span> <?php echo $witrshowdata['witr_pricing_month']; ?></span></h5>
									</div>
								</div>
							<?php }?>
							<!-- yearly -->
								<?php if( ! empty($witrshowdata['witr_pricing_yearly'])){?>
								<p><?php echo $witrshowdata['witr_pricing_yearly']; ?></p>	
								<?php }?>							
							<?php if($witrshowdata['witr_price_showlist']=='yes'){ ?>
								<!-- list -->
								<div class="witri_texti_list">
									<ul>
									<?php if(! empty($witrshowdata['witr_pricing_lists'])){	?>
										<?php foreach($witrshowdata['witr_pricing_lists'] as $witr_pric_list){?>
											<li class="<?php if( $witr_pric_list['witr_old_features'] == 'yes' ){ echo 'off'; }?> themex-item-<?php echo $witr_pric_list['_id']; ?>" >
												<?php if($witr_pric_list['witr_price_showicon']=='yes'){ ?><i class="<?php echo esc_attr( $witr_pric_list['witr_pricing_ficon']['value']);?>"></i><?php } echo $witr_pric_list['witr_pricing_ftitle']; ?>
											</li>
										<?php } } ?>	
									</ul>	
								</div>
							<?php } ?>
							
						<!-- button -->
						<?php if( ! empty($witrshowdata['witr_button_link']['url'])){?>
							<div class="witr_btnp_color">
								<a  class="btn" href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_pricing_button'];?></a>
							</div>			
						<?php }?>
						<!-- call -->
						<?php if( ! empty($witrshowdata['witr_pricing_call'])){?>
						<div class="witr_btnp_call">
							<h2><?php echo $witrshowdata['witr_pricing_call']; ?> </h2>	
						</div> 	
						<?php }?>						
                    </div> <!-- pricing part -->
                </div> 

			<?php
			break;
						
			case'3':
			?>
				<div class="pricing_area all_pricing_color  pricing_style_3  <?php if( $witrshowdata['witr_show_active']=='yes' ){ echo "active"; }?>">
                    <div class="pricing-part <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
							<!-- icon -->
							<div class="witr_pricing_icon">
								<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
								<?php } ?>
							</div>
				
							<!-- image -->
							<?php echo $txbd_image; ?>							
							<!-- ribon -->	
							<?php if( ! empty($witrshowdata['witr_pricing_ribon'])){?>
								<strong><?php echo $witrshowdata['witr_pricing_ribon']; ?> </strong>	
							<?php }?>						
							<!-- title -->
							<?php if(isset($witrshowdata['witr_pricing_title']) && ! empty($witrshowdata['witr_pricing_title'])){?>
								<h4><?php echo $witrshowdata['witr_pricing_title']; ?> </h4>	
							<?php }?>
							<!-- offer price -->
							<?php if( ! empty($witrshowdata['witr_pricing_offerp'])){?>
								<h6><?php echo $witrshowdata['witr_pricing_offerp']; ?> </h6>	
							<?php }?>							
							<!-- price/currency/month -->
							<?php if( ! empty($witrshowdata['witr_pricing_price'])){?>
								<h5><span><?php echo $witrshowdata['witr_pricing_currency']; ?></span><?php echo $witrshowdata['witr_pricing_price']; ?> <span> <?php echo $witrshowdata['witr_pricing_month']; ?></span></h5>	
							<?php }?>
							<!-- yearly -->
								<?php if( ! empty($witrshowdata['witr_pricing_yearly'])){?>
								<p><?php echo $witrshowdata['witr_pricing_yearly']; ?></p>	
								<?php }?>								
							<?php if($witrshowdata['witr_price_showlist']=='yes'){ ?>
								<!-- list -->
								<div class="witri_texti_list">
									<ul>
									<?php if(! empty($witrshowdata['witr_pricing_lists'])){	?>
										<?php foreach($witrshowdata['witr_pricing_lists'] as $witr_pric_list){?>
											<li class="<?php if( $witr_pric_list['witr_old_features'] == 'yes' ){ echo 'off'; }?> themex-item-<?php echo $witr_pric_list['_id']; ?>" >
												<?php if($witr_pric_list['witr_price_showicon']=='yes'){ ?><i class="<?php echo esc_attr( $witr_pric_list['witr_pricing_ficon']['value']);?>"></i><?php } echo $witr_pric_list['witr_pricing_ftitle']; ?>
											</li>
										<?php } } ?>	
									</ul>	
								</div>
							<?php } ?>	
						<!-- button -->
						<?php if( ! empty($witrshowdata['witr_button_link']['url'])){?>
						<div class="witr_btnp_color">
							<a  class="btn" href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_pricing_button'];?></a>
						</div>			
						<?php }?>
						<!-- call -->
						<?php if( ! empty($witrshowdata['witr_pricing_call'])){?>
						<div class="witr_btnp_call">
							<h2><?php echo $witrshowdata['witr_pricing_call']; ?> </h2>	
						</div> 	
						<?php }?>						
                    </div> <!-- pricing part -->
                </div> 

			<?php
			break;			
			case'2':
			?>
				<div class="pricing_area all_pricing_color pricing_style_2  <?php if( $witrshowdata['witr_show_active']=='yes' ){ echo "active"; }?>">
                    <div class="pricing-part <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
						<div class=" newsssss">
							<!-- icon -->
							<div class="witr_pricing_icon">
								<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
								<?php } ?>
							</div>
				
							<!-- image -->
							<?php echo $txbd_image; ?>							
							<!-- ribon -->	
							<?php if( ! empty($witrshowdata['witr_pricing_ribon'])){?>
								<strong><?php echo $witrshowdata['witr_pricing_ribon']; ?> </strong>	
							<?php }?>						
							<!-- title -->
							<?php if(isset($witrshowdata['witr_pricing_title']) && ! empty($witrshowdata['witr_pricing_title'])){?>
								<h4><?php echo $witrshowdata['witr_pricing_title']; ?> </h4>	
							<?php }?>
							<!-- offer price -->
							<?php if( ! empty($witrshowdata['witr_pricing_offerp'])){?>
								<h6><?php echo $witrshowdata['witr_pricing_offerp']; ?> </h6>	
							<?php }?>							
							<!-- price/currency/month -->
							<?php if( ! empty($witrshowdata['witr_pricing_price'])){?>
								<h5><span><?php echo $witrshowdata['witr_pricing_currency']; ?></span><?php echo $witrshowdata['witr_pricing_price']; ?> <span> <?php echo $witrshowdata['witr_pricing_month']; ?></span></h5>
							<?php }?>
							<!-- yearly -->
								<?php if( ! empty($witrshowdata['witr_pricing_yearly'])){?>
								<p><?php echo $witrshowdata['witr_pricing_yearly']; ?></p>	
								<?php }?>	
							<?php if($witrshowdata['witr_price_showlist']=='yes'){ ?>
								<!-- list -->
								<div class="witri_texti_list">
									<ul>
									<?php if(! empty($witrshowdata['witr_pricing_lists'])){	?>
										<?php foreach($witrshowdata['witr_pricing_lists'] as $witr_pric_list){?>
											<li class="<?php if( $witr_pric_list['witr_old_features'] == 'yes' ){ echo 'off'; }?> themex-item-<?php echo $witr_pric_list['_id']; ?>" >
												<?php if($witr_pric_list['witr_price_showicon']=='yes'){ ?><i class="<?php echo esc_attr( $witr_pric_list['witr_pricing_ficon']['value']);?>"></i><?php } echo $witr_pric_list['witr_pricing_ftitle']; ?>
											</li>
										<?php } } ?>	
									</ul>	
								</div>
							<?php } ?>
						</div><!-- color -->	
						<!-- button -->
						<?php if( ! empty($witrshowdata['witr_button_link']['url'])){?>
						<div class="witr_btnp_color">
							<a  class="btn" href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_pricing_button'];?></a>
						</div>			
						<?php }?>
						<!-- call -->
						<?php if( ! empty($witrshowdata['witr_pricing_call'])){?>
						<div class="witr_btnp_call">
							<h2><?php echo $witrshowdata['witr_pricing_call']; ?> </h2>	
						</div> 	
						<?php }?>						
                    </div> <!-- pricing part -->
                </div> 

			<?php
			break;
			
			default:
			?>


					
				<div class="pricing_area all_pricing_color  <?php if( $witrshowdata['witr_show_active']=='yes' ){ echo "active"; }?>">
                    <div class="pricing-part <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
	
							<!-- icon -->
							<div class="witr_pricing_icon">
								<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
								<?php } ?>
							</div>
				
							<!-- image -->
							<?php echo $txbd_image; ?>							
							<!-- ribon -->	
							<?php if( ! empty($witrshowdata['witr_pricing_ribon'])){?>
								<strong><?php echo $witrshowdata['witr_pricing_ribon']; ?> </strong>	
							<?php }?>						
							<!-- title -->
							<?php if(isset($witrshowdata['witr_pricing_title']) && ! empty($witrshowdata['witr_pricing_title'])){?>
								<h4><?php echo $witrshowdata['witr_pricing_title']; ?> </h4>	
							<?php }?>
							<!--  price content -->
							<?php if( ! empty($witrshowdata['witr_pricing_content'])){?>
							<div class="prt_content"><p><?php echo $witrshowdata['witr_pricing_content']; ?> </p></div>
							<?php }?>
							<!-- offer price -->
							<?php if( ! empty($witrshowdata['witr_pricing_offerp'])){?>
								<h6><?php echo $witrshowdata['witr_pricing_offerp']; ?> </h6>	
							<?php }?>
							<!-- price/currency/month -->
							<?php if( ! empty($witrshowdata['witr_pricing_price'])){?>
								<h5><span><?php echo $witrshowdata['witr_pricing_currency']; ?></span><?php echo $witrshowdata['witr_pricing_price']; ?> <span> <?php echo $witrshowdata['witr_pricing_month']; ?></span></h5>
							<?php }?>
							<!-- yearly -->
							<?php if( ! empty($witrshowdata['witr_pricing_yearly'])){?>
								<p><?php echo $witrshowdata['witr_pricing_yearly']; ?></p>	
							<?php }?>							

							<?php if($witrshowdata['witr_price_showlist']=='yes'){ ?>
								<!-- list -->
								<div class="witri_texti_list">
									<ul>
									<?php if(! empty($witrshowdata['witr_pricing_lists'])){	?>
										<?php foreach($witrshowdata['witr_pricing_lists'] as $witr_pric_list){?>
											<li class="<?php if( $witr_pric_list['witr_old_features'] == 'yes' ){ echo 'off'; }?> themex-item-<?php echo $witr_pric_list['_id']; ?>" >
												<?php if($witr_pric_list['witr_price_showicon']=='yes'){ ?><i class="<?php echo esc_attr( $witr_pric_list['witr_pricing_ficon']['value']);?>"></i><?php } echo $witr_pric_list['witr_pricing_ftitle']; ?>
											</li>
										<?php } } ?>	
									</ul>	
								</div>
							<?php } ?>
							
						<!-- button -->
						<?php if( ! empty($witrshowdata['witr_button_link']['url'])){?>
						<div class="witr_btnp_color">
							<a  class="btn" href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_pricing_button'];?></a>
						</div>			
						<?php }?>
						<!-- call -->
						<?php if( ! empty($witrshowdata['witr_pricing_call'])){?>
						<div class="witr_btnp_call">
							<h2><?php echo $witrshowdata['witr_pricing_call']; ?> </h2>	
						</div> 	
						<?php }?>						
                    </div> <!-- pricing part -->
                </div> 

			
			<?php
			break;
			
		} /* switch end */
		

	
	
	

    } /*===function end ===*/



}