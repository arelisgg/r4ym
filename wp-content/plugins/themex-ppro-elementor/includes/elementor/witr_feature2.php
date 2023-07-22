<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Feature2 extends Widget_Base {

    public function get_name() {
        return 'witr_section_feature2';
    }
    
    public function get_title() {
        return esc_html__( ' Feature2', 'themex' );
    }
	public function get_style_depends() {
        return [ 'wfeature' ];
    }
    public function get_icon() {
        return ' themex_icon eicon-featured-image';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {
		
			
			

			/* === w_feature start === */
			$this->start_controls_section(
				'witr_field_display_feature',
				[
					'label' => esc_html__( ' Feature Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
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
						]
					);
						
				/* witr_style_feature2 */
				$this->add_control(
					'witr_style_feature2',
					[
						'label' => esc_html__( 'Feature style', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'1' => esc_html__( 'Feature style 1', 'themex' ),
							'2' => esc_html__( 'Feature style 2', 'themex' ),
							'3' => esc_html__( 'Feature style 3', 'themex' ),
							'4' => esc_html__( 'Feature style 4', 'themex' ),
						],
						'default' => '1',
					]
				);					
					$this->add_control(
						'witr_feature2_image',
						[
							'label' => esc_html__( 'Choose Image', 'themex' ),
							'type' => Controls_Manager::MEDIA,
							'default' => [
								'url' => Utils::get_placeholder_image_src(),
							],
							'condition' => [
								'witr_style_feature2' =>['2','3','4'],
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
								'witr_style_feature2' =>['2','3','4'],
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
								'witr_style_feature2' =>['2','3','4'],
							],							
						]
					);					
					/* witr_feature_title */	
					$this->add_control(
						'witr_feature_title',
						[
							'label' => esc_html__( 'Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use title, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Add title Here', 'themex' ),
							'separator'=>'before',
							'placeholder' => esc_attr__( 'Type your feature title here', 'themex' ),						
						]
					);
					/* witr_feature_title_link */	
					$this->add_control(
						'witr_feature_title_link',
						[
							'label' => esc_html__( 'Title Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert Title link here.','themex'),
							'placeholder' => esc_attr__( 'https://your-link.com', 'themex' ),
							'show_external' => true,
							
						]
					);					
					/* witr_feature_content	*/
					$this->add_control(
						'witr_feature_content',
						[
							'label' => esc_html__( ' Content Text', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use content text, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Lorem ipsum dolor ame elit, sed do eiusmod tempor incididunt.', 'themex' ),
							'separator'=>'before',
							'placeholder' => esc_attr__( 'Type your content here', 'themex' ),
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
					'witr_feature_ficon',
					[
						'label' => esc_html__( 'Icon', 'themex' ),
						'type' => Controls_Manager::ICONS,
						'description' => esc_html__( 'Change icon here, For this, click on the library field And Not use Icon,Click On The Hide Option', 'themex' ),
						'fa4compatibility' => 'icon',
						'default' => [
							'value' => 'fas fa-angle-double-right',
							'library' => 'fa-solid',
						],						
					]
				);
				$repeater->add_control(
					'witr_feature_ftitle',
					[
						'label'   => esc_html__( 'List Title', 'themex' ),
						'type'    => Controls_Manager::TEXT,						
					]
				);				
					/* witr_list_tslide */
					$this->add_control(
						'witr_feature_lists',
						[
							'label' => esc_html__( 'Feature List', 'themex' ),
							'type' => Controls_Manager::REPEATER,
							'condition' => [
								'witr_style_feature2' =>['4'],
							],							
							'fields' => $repeater->get_controls(),
							'default' => [
								[
									'witr_feature_ftitle' => esc_html__( 'List Title One', 'themex' ),
								],
								[
									'witr_feature_ftitle' => esc_html__( 'List Title One', 'themex' ),
								],
								
							],
							'title_field' => '{{{ witr_feature_ftitle }}}',							
						]
					);					
					
					
					
				/* witr_icon_item */
					$this->add_control(
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
					$this->add_control(
						'witr_icon_item',
						[
							'label' => esc_html__( 'Icon', 'themex' ),
							'type' => Controls_Manager::ICONS,
							'description' => esc_html__( 'Change icon here, For this, click on the library field And Not use Icon,Click On The Hide Option', 'themex' ),
							'fa4compatibility' => 'icon',
							'default' => [
								'value' => 'icofont-star',
								'library' => 'fa-solid',
							],
							'condition' => [
								'witr_show_icon' => 'yes',
							],							
						]
					);


					/* witr_show_custom */
					$this->add_control(
						'witr_show_custom',
						[
							'label' => esc_html__( 'Show custom Icon', 'themex' ),
							'type' => Controls_Manager::SWITCHER,
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'return_value' => 'yes',
							'default' => 'no',
							'separator'=>'before',
							'condition' => [
								'witr_style_feature2' =>['1','3'],
							],							
						]
					);
					/*  witr_feature_custom	*/
					$this->add_control(
						'witr_feature_custom',
						[
							'label' => esc_html__( 'Custom Icon Name', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Type Icofont - https://icofont.com/icons or Themify Icon -https://themify.me/themify-icons or Fontawesome Icon - https://fontawesome.com/cheatsheet name here', 'themex' ),
							'default' => esc_html__( 'icofont-adjust', 'themex' ),
							'placeholder' => esc_attr__( 'Type your Custom Icon Name here', 'themex' ),
							'condition' => [
								'witr_show_custom' => 'yes',
								'witr_style_feature2' =>['1','3'],
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
							'condition' => [
								'witr_style_feature2' =>['1','3','4'],
							],							
						]
					);	
				
					$this->add_control(
						'witr_feature_image',
						[
							'label' => esc_html__( 'Choose Image', 'themex' ),
							'type' => Controls_Manager::MEDIA,
							'condition' => [
								'witr_show_image' => 'yes',
								'witr_style_feature2' =>['1','3','4'],
							],							
						]
					);					
					/* txbd_icon_image_size */
					$this->add_group_control(
						Group_Control_Image_Size::get_type(),
						[
							'name' => 'txbd_icon_image_size',
							'default' => 'large',
							'separator' => 'none',
							'condition' => [
								'witr_show_image' => 'yes',
								'witr_style_feature2' =>['1','3','4'],
							]
						]
					);
					/* witr_show_button */
					$this->add_control(
						'witr_show_button',
						[
							'label' => esc_html__( 'Show Button', 'themex' ),
							'type' => Controls_Manager::SWITCHER,
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'return_value' => 'yes',
							'default' => 'no',
							'separator'=>'before',							
						]
					);
					
				/* witr_feature_button	*/
					$this->add_control(
						'witr_feature_button',
						[
							'label' => esc_html__( 'Button text', 'themex' ),
							'label_block' =>true,
							'type' => Controls_Manager::TEXT,
							'description' =>esc_html__('Insert button text. It hidden when field blank.','themex'),							
							'default' => esc_html__( 'Read More', 'themex' ),
							'placeholder' => esc_attr__( 'Type your button text here', 'themex' ),
							'condition' => [						
								'witr_show_button' => 'yes',
							],							
						]
					);
				/* witr_button_link */	
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
								'witr_show_button' => 'yes',
							],							
						]
					);						
		
		
					
			$this->end_controls_section();
			/* === end w_feature ===  */

			
	   /*==========================================================================================================================================================================
										START TO STYLE
		=========================================================================================================================================================================*/

		/*=== start single Feature style ====*/
		$this->start_controls_section(
			'witr_style_ss_option',
			[
				'label' => esc_html__( 'Single Box', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_feature2' =>['1','2'],
				],				
			]
		);		
		
				/* box background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_box_background',
						'label' => esc_html__( 'box Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_feature2,{{WRAPPER}} .medi_featureDetail',
					]
				);
				/* Background_Hover */
				$this->add_control(
					'witr_borderc_bhov',
					[
						'label' => esc_html__( 'Background Hover', 'themex' ),
						'type' => Controls_Manager::HEADING,
					]
				);				
				/* box hover background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_boxho_background',
						'label' => esc_html__( 'box Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_feature2:hover,{{WRAPPER}} .medi_featureDetail:hover',
					]
				);
				
				/* border_radius */
				$this->add_control(
					'witr_borderc_radius',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .witr_feature2,{{WRAPPER}} .medi_featureDetail' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
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
							'{{WRAPPER}} .witr_feature2,{{WRAPPER}} .medi_featureDetail' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_feature2,{{WRAPPER}} .medi_featureDetail' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_single_box_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .medi_singleFeature',
					]
				);
				/* Background_Hover */
				$this->add_control(
					'witr_border_after',
					[
						'label' => esc_html__( 'After Background', 'themex' ),
						'type' => Controls_Manager::HEADING,
					]
				);				
				/* after background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_after_background',
						'label' => esc_html__( 'after Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .medi_singleFeature::after',
					]
				);
				
				/* Background_before */
				$this->add_control(
					'witr_border_before',
					[
						'label' => esc_html__( 'Before Background', 'themex' ),
						'type' => Controls_Manager::HEADING,
					]
				);				
				/* before background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_before_background',
						'label' => esc_html__( 'before Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .medi_singleFeature::before',
					]
				);
				/*  before after height */
				$this->add_responsive_control(
					'witr_afb_height',
					[
						'label' => esc_html__( 'Before After Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .medi_singleFeature::after,{{WRAPPER}} .medi_singleFeature::before' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);				
				
				
			$this->end_controls_section();
			/* === end single Feature ===  */		


		/*=== start single Feature style ====*/
		$this->start_controls_section(
			'witr_style_s3_option',
			[
				'label' => esc_html__( 'Single Box', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_feature2' =>['3'],
				],				
			]
		);		
		
				/* box background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_box3_background',
						'label' => esc_html__( 'box Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .twr_feature_three',
					]
				);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_single_box3_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .twr_feature_three',
					]
				);				
				/* Background_Hover */
				$this->add_control(
					'witr_borderc3_bhov',
					[
						'label' => esc_html__( 'Background Hover', 'themex' ),
						'type' => Controls_Manager::HEADING,
					]
				);				
				/* box hover background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_boxho3_background',
						'label' => esc_html__( 'box Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .twr_feature_three:hover',
					]
				);
				
				/* border_radius */
				$this->add_control(
					'witr_borderc3_radius',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .twr_feature_three' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				
				/* Box margin */
				$this->add_responsive_control(
					'witr_box3_margin',
					[
						'label' => esc_html__( ' Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .twr_feature_three_inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* Box padding */
				$this->add_responsive_control(
					'witr_box3_padding',
					[
						'label' => esc_html__( ' Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .twr_feature_three_inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);


				
				
			$this->end_controls_section();
			/* === end single Feature ===  */

			
		/*=== start witr_icon style ====*/
		$this->start_controls_section(
			'witr_style_icon_option',
			[
				'label' => esc_html__( 'Icon Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_feature2' =>['1','3','4'],
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
					'witr_primary_color',
					[
						'label' => esc_html__( ' Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .witr_fea2_icon_top i,{{WRAPPER}} .twr_feature_three_icon i,{{WRAPPER}} .main_icon_color i' => 'color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .witr_fea2_icon_top i,{{WRAPPER}} .twr_feature_three_icon i,{{WRAPPER}} .main_icon_color i',
					]
				);
				
				/*  icon font size */
				$this->add_responsive_control(
					'icon_size',
					[
						'label' => esc_html__( ' Size', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_fea2_icon_top i,{{WRAPPER}} .twr_feature_three_icon i,{{WRAPPER}} .main_icon_color i' => 'font-size: {{SIZE}}{{UNIT}};',
						],
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
							'{{WRAPPER}} .witr_fea2_icon_top i,{{WRAPPER}} .twr_feature_three_icon i,{{WRAPPER}} .main_icon_color i' => 'width: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_fea2_icon_top i,{{WRAPPER}} .twr_feature_three_icon i,{{WRAPPER}} .main_icon_color i' => 'height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_fea2_icon_top i,{{WRAPPER}} .twr_feature_three_icon i,{{WRAPPER}} .main_icon_color i' => 'line-height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_fea2_icon_top i,{{WRAPPER}} .twr_feature_three_icon i,{{WRAPPER}} .main_icon_color i' => 'text-align: {{VALUE}}',
						],
					]
				);				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_borderf',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_fea2_icon_top i,{{WRAPPER}} .twr_feature_three_icon i,{{WRAPPER}} .main_icon_color i',
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
							'{{WRAPPER}} .witr_fea2_icon_top i,{{WRAPPER}} .twr_feature_three_icon i,{{WRAPPER}} .main_icon_color i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
					
				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_fea2_icon_top i,{{WRAPPER}} .twr_feature_three_icon i,{{WRAPPER}} .main_icon_color i',
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
							'{{WRAPPER}} .witr_fea2_icon_top i,{{WRAPPER}} .twr_feature_three_icon i,{{WRAPPER}} .main_icon_color i' => 'mix-blend-mode: {{VALUE}}',
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
							'{{WRAPPER}} .witr_fea2_icon_top i,{{WRAPPER}} .twr_feature_three_icon i,{{WRAPPER}} .main_icon_color i' => 'transform: rotate({{SIZE}}{{UNIT}});',
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
							'{{WRAPPER}} .witr_fea2_icon_top i,{{WRAPPER}} .twr_feature_three_icon,{{WRAPPER}} .main_icon_color i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_fea2_icon_top i,{{WRAPPER}} .twr_feature_three_icon,{{WRAPPER}} .main_icon_color i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .witr_fea2_icon_top:hover i,{{WRAPPER}} .twr_feature_three_icon i:hover,{{WRAPPER}} .main_icon_color i:hover' => 'color: {{VALUE}}',
							],
						]
					);
					/* hover Icon background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_hover_icon',
							'label' => esc_html__( ' Hover Background', 'themex' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .witr_fea2_icon_top:hover i,{{WRAPPER}} .twr_feature_three_icon i:hover,{{WRAPPER}} .main_icon_color i:hover',
						]
					);
					/* border_hover_color */
					$this->add_control(
						'witr_border_hover_color',
						[
							'label' => esc_html__( 'Border Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							
							'selectors' => [
								'{{WRAPPER}} .witr_fea2_icon_top:hover i,{{WRAPPER}} .twr_feature_three_icon i:hover,{{WRAPPER}} .main_icon_color i:hover' => 'border-color: {{VALUE}}',
							],
						]
					);					

					$this->end_controls_tab();
					/*=== end icon hover style ====*/
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/
		$this->end_controls_section();
		/*=== end witr_icon style ====*/
		
		/*=== start witr_icon style ====*/
		$this->start_controls_section(
			'witr_style_icon2_option',
			[
				'label' => esc_html__( 'Icon2 Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_feature2' =>['1','3'],
				],				
			]
		);
				/* Icon Color */
				$this->add_control(
					'witr_primary_colorb',
					[
						'label' => esc_html__( ' Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .witr_feature2_icon i,{{WRAPPER}} .twr_fe_three_middle_icon i' => 'color: {{VALUE}}',
						],					
					]
				);			
				/*  icon font size */
				$this->add_responsive_control(
					'icon_sizeb',
					[
						'label' => esc_html__( ' Size', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_feature2_icon i,{{WRAPPER}} .twr_fe_three_middle_icon i' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/* opacity */
				$this->add_control(
					'opacity_icon',
					[
						'label' => esc_html__( 'Opacity', 'elementor' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'max' => 1,
								'min' => 0.10,
								'step' => 0.01,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .single_feature2:hover .witr_feature2_icon,{{WRAPPER}} .twr_fe_three_middle_icon i' => 'opacity: {{SIZE}};',
						],
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
						'{{WRAPPER}} .witr_feature2_icon,{{WRAPPER}} .twr_fe_three_middle_icon' => 'top: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .witr_feature2_icon,{{WRAPPER}} .twr_fe_three_middle_icon' => 'left: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .witr_feature2_icon,{{WRAPPER}} .twr_fe_three_middle_icon' => 'right: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .witr_feature2_icon,{{WRAPPER}} .twr_fe_three_middle_icon' => 'bottom: {{SIZE}}{{UNIT}};',
					],
					
				]
			);					
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
						'{{WRAPPER}} .all_feature_color img' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .all_feature_color img' => 'height: {{SIZE}}{{UNIT}};',
					],
				]			
			);
			/* border_radius */
			$this->add_control(
				'witr_border_img_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .all_feature_color img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_feature_color img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_feature_color img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_feature_color h3,{{WRAPPER}} .all_feature_color h3 a,{{WRAPPER}} .all_feature_color h2' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .all_feature_color h3:hover,{{WRAPPER}} .all_feature_color h3 a:hover,{{WRAPPER}} .all_feature_color h2:hover' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .all_feature_color h3,{{WRAPPER}} .all_feature_color h3 a,{{WRAPPER}} .all_feature_color h2',
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
						'{{WRAPPER}} .all_feature_color h3,{{WRAPPER}} .all_feature_color h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_feature_color h3,{{WRAPPER}} .all_feature_color h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_title style ====*/

		/*=== start witr list style ====*/
		$this->start_controls_section(
			'witr_style_option_list',
			[
				'label' => esc_html__( 'Feature List Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_feature2' =>['4'],
				],				
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
								'{{WRAPPER}} .feature_list_option ul li' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .feature_list_option ul li',
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
								'{{WRAPPER}} .feature_list_option ul li:nth-child(odd)' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .feature_list_option ul li:nth-child(odd)',
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
								'{{WRAPPER}} .feature_list_option ul li:nth-child(even)' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .feature_list_option ul li:nth-child(even)',
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
							'selector' => '{{WRAPPER}} .feature_list_option ul li',
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
								'{{WRAPPER}} .feature_list_option ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .feature_list_option ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					
				$this->end_controls_tab();					
			
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
								'{{WRAPPER}} .feature_list_option ul li:hover' => 'color: {{VALUE}}',
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
								'{{WRAPPER}} .feature_list_option ul li:nth-child(odd):hover' => 'color: {{VALUE}}',
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
								'{{WRAPPER}} .feature_list_option ul li:nth-child(even):hover' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .feature_list_option ul li:hover',
						]
					);
					

					$this->end_controls_tab();
					/*=== end list hover style ====*/
					
			$this->end_controls_tabs();
			/*=== end list_tabs style ====*/

		 $this->end_controls_section();
		/*=== end  witr list style ====*/		

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
						'{{WRAPPER}} .all_feature_color p' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .all_feature_color p',
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
						'{{WRAPPER}} .all_feature_color p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_feature_color p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .witr_btn_all_color' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .witr_btn_all_color',
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
							'selector' => '{{WRAPPER}} .witr_btn_all_color',
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
								'{{WRAPPER}} .witr_btn_all_color' => 'border-style: {{VALUE}}',
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
								'{{WRAPPER}} .witr_btn_all_color' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .witr_btn_all_color' => 'border-color: {{VALUE}}',
							],
							'condition' => [
								'witr_border_btn_style' => ['solid','double','dotted','dashed','default'],
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
								'{{WRAPPER}} .witr_btn_all_color' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'condition' => [
								'witr_border_btn_style' => ['solid','double','dotted','dashed','default'],
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
								'{{WRAPPER}} .witr_btn_all_color' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .witr_btn_all_color' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .witr_btn_all_color:hover' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .witr_btn_all_color:hover',
						]
					);
					/* witr_hoverborder_style */
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'witr_hoverborder_style',
							'label' => esc_html__( 'Button Hover Border', 'themex' ),
							'selector' => '{{WRAPPER}} .witr_btn_all_color:hover',
						]
					);
					
					
					
					$this->end_controls_tab();
					/*=== end button hover style ====*/
			$this->end_controls_tabs();
			/*=== end button_tabs style ====*/			
		 $this->end_controls_section();
		/*=== end  witr button style ====*/	


		/*=== start Overlay style ====*/
		$this->start_controls_section(
			'witr_style_image_overlay',
			[
				'label' => esc_html__( 'Image Overlay Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
			$this->start_controls_tabs( 'overly_colors' );
			
				$this->start_controls_tab(
					'witr_overly_bg_normal',
					[
						'label' => esc_html__( 'Normal', 'themex' ),
					]
				);
					/* Button Hover background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_img_background',
							'label' => esc_html__( 'Image Overlay BG', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .medi_featureThumb::after,{{WRAPPER}} .twr_feature_four_image::before',
						]
					);
					
					$this->end_controls_tab();	
					
					$this->start_controls_tab(
						'witr_overlyh_colors_hover',
						[
							'label' => esc_html__( ' Hover', 'themex' ),
						]
					);					
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_oho_background',
								'label' => esc_html__( ' Overlay BG', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .medi_featureThumb:hover::after,{{WRAPPER}} .twr_feature_four_image:hover::before',
							]
						);					
					
					$this->end_controls_tab();
			$this->end_controls_tabs();
		 $this->end_controls_section();
		/*=== end  Overlay style ====*/	
		
		/*=== start Text Box style ====*/
		$this->start_controls_section(
			'section_all_hover',
			[
				'label' => esc_html__( ' All Text Hover Color', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_feature2' =>['3','4'],
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
						'{{WRAPPER}} .all_feature_color:hover h3,{{WRAPPER}} .all_feature_color:hover h3 a,{{WRAPPER}} .all_feature_color:hover p,{{WRAPPER}} .all_feature_color:hover .twr_feature_three_icon i,{{WRAPPER}} .all_feature_color:hover a,{{WRAPPER}} .all_feature_color:hover .twr_feature_four_icon i,{{WRAPPER}} .all_feature_color:hover .feature_list_option ul li ' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .all_feature_color h3,{{WRAPPER}} .all_feature_color h3 a,{{WRAPPER}} .all_feature_color p,{{WRAPPER}} .all_feature_color .twr_feature_three_icon i,{{WRAPPER}} .all_feature_color a,{{WRAPPER}} .all_feature_color .twr_feature_four_icon i,{{WRAPPER}} .all_feature_color .feature_list_option ul li' => 'transition: {{SIZE}}s',
					],
				]
			);		
			$this->end_controls_section();
		/*=== start Single Box style ====*/	
		

    } /* function end */

	
	
	
    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();	
		$target = ! empty($witrshowdata['witr_feature_title_link']['is_external']) ? ' target="_blank"' : '';
		$nofollow = ! empty($witrshowdata['witr_feature_title_link']['nofollow']) ? ' rel="nofollow"' : '';
		$target_btn = ! empty($witrshowdata['witr_button_link']['is_external']) ? ' target="_blank"' : '';
		$nofollow_btn = ! empty($witrshowdata['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';
		
		$txbd_image = ! empty($witrshowdata['witr_feature2_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witrshowdata, 'txbd_image_size', 'witr_feature2_image' ) : '';	
		$txbd_icon_image = ! empty($witrshowdata['witr_feature_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witrshowdata, 'txbd_icon_image_size', 'witr_feature_image' ) : '';
		
		
	switch ( $witrshowdata['witr_style_feature2'] ) {
		case '4':
		?>		
			<div class="twr_feature_four all_feature_color text-<?php echo $witrshowdata['witr_text_ltc']; ?> <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">

			
				<div class="twr_feature_four_image">
					<!-- image -->
					<?php echo $txbd_image; ?>			
					<div class="twr_feature_four_inner">
						<div class="twr_feature_four_icon main_icon_color">
							<!-- icon -->
							<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
								<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
							<?php }
							if( ! empty($witrshowdata['witr_feature_custom'])){?>					
								<i class="<?php echo $witrshowdata['witr_feature_custom']; ?>"></i>
							<?php } 
							 echo $txbd_icon_image; ?>	
						</div>			
							<div class="twr_feature_three_text">					
								<!-- title -->
								<?php if( ! empty($witrshowdata['witr_feature_title'])){
									if($witrshowdata['witr_feature_title_link'] ['url']){?> 
									<h3><a href="<?php echo $witrshowdata['witr_feature_title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_feature_title']; ?></a></h3>
								<?php }else{ ?>
								<h3><?php echo $witrshowdata['witr_feature_title']; ?> </h3>
								<?php } } 
								if( ! empty($witrshowdata['witr_feature_content'])){?>
									<p><?php echo $witrshowdata['witr_feature_content']; ?> </p>		
								<?php } ?>
									<!-- list -->
									<div class="feature_list_option">
										<ul>
										<?php if(! empty($witrshowdata['witr_feature_lists'])){	?>
											<?php foreach($witrshowdata['witr_feature_lists'] as $witr_list){?>
												<li class=" feature-item-<?php echo $witr_list['_id']; ?>" >
													<?php if($witr_list['witr_price_showicon']=='yes'){ ?><span class="<?php echo esc_attr( $witr_list['witr_feature_ficon']['value']);?>"></span><?php } echo $witr_list['witr_feature_ftitle']; ?>
												</li>
											<?php } } ?>	
										</ul>	
									</div>
								<?php 						
								
								if( ! empty($witrshowdata['witr_feature_button'])){?>
									<a class="witr_btn_all_color" href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>>
										<?php echo $witrshowdata['witr_feature_button']; ?>
									</a>
								<?php } ?>
							</div>
					</div>

				</div>				
						
			</div>		
		<?php 
		break;		
		case '3':
		?>		
			<div class="twr_feature_three all_feature_color text-<?php echo $witrshowdata['witr_text_ltc']; ?> <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">

				<div class="twr_feature_three_inner">
					<div class="twr_feature_three_icon">
						<!-- icon -->
						<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
							<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
						<?php }
						if( ! empty($witrshowdata['witr_feature_custom'])){?>					
							<i class="<?php echo $witrshowdata['witr_feature_custom']; ?>"></i>
						<?php } 
						 echo $txbd_icon_image; ?>	
					</div>
					<div class="twr_feature_relative_text">
						<div class="twr_fe_three_middle_icon">
							<!-- icon -->
							<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
								<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
							<?php }
							if( ! empty($witrshowdata['witr_feature_custom'])){?>					
								<i class="<?php echo $witrshowdata['witr_feature_custom']; ?>"></i>
							<?php } 
							echo $txbd_icon_image; ?>	
						</div>					
						<div class="twr_feature_three_text">					
							<!-- title -->
							<?php if( ! empty($witrshowdata['witr_feature_title'])){
								if($witrshowdata['witr_feature_title_link'] ['url']){?> 
								<h3><a href="<?php echo $witrshowdata['witr_feature_title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_feature_title']; ?></a></h3>
							<?php }else{ ?>
							<h3><?php echo $witrshowdata['witr_feature_title']; ?> </h3>
							<?php } } 
							if( ! empty($witrshowdata['witr_feature_content'])){?>
								<p><?php echo $witrshowdata['witr_feature_content']; ?> </p>		
							<?php } 
							if( ! empty($witrshowdata['witr_feature_button'])){?>
								<a class="witr_btn_all_color" href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>>
									<?php echo $witrshowdata['witr_feature_button']; ?>
								</a>
							<?php } ?>

						</div>
					</div>
				</div>
				<div class="twr_feature_three_image">
					<!-- image -->
<?php echo $txbd_image; ?>
				</div>				
						
			</div>		
		<?php 
		break;		
		case '2':
		?>		
			<div class="medi_singleFeature all_feature_color text-<?php echo $witrshowdata['witr_text_ltc']; ?> <?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
				<div class="medi_featureThumb">
					<!-- image -->
					<?php echo $txbd_image; ?>
				</div>
				<div class="medi_featureDetail">
					<!-- title -->
					<?php if(isset($witrshowdata['witr_feature_title']) && ! empty($witrshowdata['witr_feature_title'])){?>
					<?php if($witrshowdata['witr_feature_title_link'] ['url']){?> 
						<h3><a href="<?php echo $witrshowdata['witr_feature_title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_feature_title']; ?></a></h3>
					<?php }else{ ?>
					<h3><?php echo $witrshowdata['witr_feature_title']; ?> </h3>
					<?php }	?>
					<?php } ?>
					<!-- content -->
					<?php if(isset($witrshowdata['witr_feature_content']) && ! empty($witrshowdata['witr_feature_content'])){?>
						<p><?php echo $witrshowdata['witr_feature_content']; ?> </p>		
					<?php } ?>
					<!-- button -->
					<?php if(isset($witrshowdata['witr_feature_button']) && ! empty($witrshowdata['witr_feature_button'])){?>
						<a class="witr_btn_all_color discover_more" href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_feature_button']; ?>
						<!-- icon -->
						<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
							<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
						<?php } ?>
						</a>
					<?php } ?>

				</div>
			</div>		
		<?php 
		break;
		
		default:
		?>
            <div class="all_feature_color single_feature2 text-<?php echo $witrshowdata['witr_text_ltc']; ?>">            
				<div class="witr_feature2">					
					<div class="witr_fea2_icon_top">
						<!-- icon -->
						<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
							<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
						<?php } ?>
						<!-- custom icon -->
						<?php if(isset($witrshowdata['witr_feature_custom']) && ! empty($witrshowdata['witr_feature_custom'])){?>					
							<i class="<?php echo $witrshowdata['witr_feature_custom']; ?>"></i>
						<?php } 
						echo $txbd_icon_image; ?>	
 					</div>
					<!-- title -->
					<?php if(isset($witrshowdata['witr_feature_title']) && ! empty($witrshowdata['witr_feature_title'])){?>
					<?php if($witrshowdata['witr_feature_title_link'] ['url']){?> 
						<h3><a href="<?php echo $witrshowdata['witr_feature_title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_feature_title']; ?></a></h3>
					<?php }else{ ?>
					<h3><?php echo $witrshowdata['witr_feature_title']; ?> </h3>
					<?php }	?>
					<?php } ?>					
					<!-- content -->
					<?php if(isset($witrshowdata['witr_feature_content']) && ! empty($witrshowdata['witr_feature_content'])){?>
						<p><?php echo $witrshowdata['witr_feature_content']; ?> </p>		
					<?php } ?>
					<!-- button -->
					<?php if(isset($witrshowdata['witr_feature_button']) && ! empty($witrshowdata['witr_feature_button'])){?>
						<div class="witr_feature_btn2">
							<a class="witr_btn_all_color" href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_feature_button']; ?></a>
						</div>
					<?php } ?>
					
					<div class="witr_feature2_icon">						
						<!-- icon -->
						<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
							<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
						<?php } ?>
						<!-- custom icon -->
						<?php if(isset($witrshowdata['witr_feature_custom']) && ! empty($witrshowdata['witr_feature_custom'])){?>					
							<i class="<?php echo $witrshowdata['witr_feature_custom']; ?>"></i>
						<?php }
						echo $txbd_icon_image; ?>					
					</div>					
				</div> 	   
            </div> 
		<?php

		
		break;
	
		
	} 	
		

    } 
	

}