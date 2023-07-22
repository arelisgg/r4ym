<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; /* Exit if accessed directly */

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Timeline extends Widget_Base {

    public function get_name() {
        return 'witr_section_timeline';
    }
    
    public function get_title() {
        return esc_html__( 'Timeline', 'themex' );
    }
	public function get_style_depends() {
        return [ 'wtimeline' ];
    }
    public function get_icon() {
        return 'themex_icon eicon-t-letter';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {
		
			
			

			/* === start witr timeline 1 === */
			$this->start_controls_section(
				'witr_field_display_timeline',
				[
					'label' => esc_html__( 'Timeline Options 1', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
				/* witr_timeline_title */	
					$this->add_control(
						'witr_timeline_title',
						[
							'label' => esc_html__( 'Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use title, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Add title Here', 'themex' ),
							'placeholder' => esc_attr__( 'Type your timeline title here', 'themex' ),						
						]
					);
					/* witr_timeline_content */
					$this->add_control(
						'witr_timeline_content',
						[
							'label' => esc_html__( 'timeline Content Text', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use content text, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Lorem ipsum dolor sit amet, ca adipisicing sed do eiusmod tempor incididunt utn labore et dolore magna .', 'themex' ),
							'placeholder' => esc_attr__( 'Type your content here', 'themex' ),
						]
					);
				/* witr_show_icon witr_icon_item */
					$this->add_control(
						'witr_show_icon',
						[
							'label' => esc_html__( 'Show Icon', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
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
							'description' => esc_html__( 'Change icon here, For this, click on the library field', 'themex' ),
							'fa4compatibility' => 'icon',
							'default' => [
								'value' => 'fas fa-cloud',
								'library' => 'fa-solid',
							],
							'condition' => [
								'witr_show_icon' => 'yes',
							],							
						]
					);	
					
					/* witr_number_switcher witr_timeline_number */
					$this->add_control(
						'witr_show_number',
						[
							'label' => esc_html__( 'Show Number', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),							
							'return_value' => 'yes',
							'default' => 'yes',							
						]
					);						
					$this->add_control(
						'witr_timeline_number',
						[
							'label' => esc_html__( 'Number', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Not use number, remove the text from field', 'themex' ),
							'default' => esc_html__( '01', 'themex' ),
							'placeholder' => esc_attr__( 'Type your number here', 'themex' ),
							'condition' => [
								'witr_show_number' => 'yes',
							],							
						]

					);


			$this->end_controls_section();
			/* === end witr timeline 1 ===  */
			

			/* === start witr timeline 2 === */
			$this->start_controls_section(
				'witr_field_display_timeline2',
				[
					'label' => esc_html__( 'Timeline Options 3', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
				/* witr_timeline_title */	
					$this->add_control(
						'witr_timeline_title2',
						[
							'label' => esc_html__( 'Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use title, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Add title Here3', 'themex' ),
							'placeholder' => esc_attr__( 'Type your timeline title here', 'themex' ),						
						]
					);
					/* witr_timeline_content */
					$this->add_control(
						'witr_timeline_content2',
						[
							'label' => esc_html__( 'timeline Content Text', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use content text, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Lorem ipsum dolor sit amet, ca adipisicing sed do eiusmod tempor incididunt utn labore et dolore magna .', 'themex' ),
							'placeholder' => esc_attr__( 'Type your content here', 'themex' ),
						]
					);
					/* witr_show_icon witr_icon_item */
					$this->add_control(
						'witr_show_icon2',
						[
							'label' => esc_html__( 'Show Icon', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),							
							'return_value' => 'yes',
							'default' => 'yes',							
						]
					);				
					$this->add_control(
						'witr_icon_item2',
						[
							'label' => esc_html__( 'Icon', 'themex' ),
							'type' => Controls_Manager::ICONS,
							'description' => esc_html__( 'Change icon here, For this, click on the library field', 'themex' ),
							'fa4compatibility' => 'icon',
							'default' => [
								'value' => 'fas fa-cloud',
								'library' => 'fa-solid',
							],
							'condition' => [
								'witr_show_icon2' => 'yes',
							],							
						]
					);	
					
					/* witr_number_switcher witr_timeline_number */
					$this->add_control(
						'witr_show_number2',
						[
							'label' => esc_html__( 'Show Number', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),							
							'return_value' => 'yes',
							'default' => 'yes',							
						]
					);						
					$this->add_control(
						'witr_timeline_number2',
						[
							'label' => esc_html__( 'Number', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Not use number, remove the text from field', 'themex' ),
							'default' => esc_html__( '02', 'themex' ),
							'placeholder' => esc_attr__( 'Type your number here', 'themex' ),
							'condition' => [
								'witr_show_number2' => 'yes',
							],							
						]

					);


			$this->end_controls_section();
			/* === end witr timeline 2 ===  */
			

			/* === start witr timeline 3 === */
			$this->start_controls_section(
				'witr_field_display_timeline3',
				[
					'label' => esc_html__( 'Timeline Options 5', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
				/* witr_timeline_title */	
					$this->add_control(
						'witr_timeline_title3',
						[
							'label' => esc_html__( 'Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use title, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Add title Here5', 'themex' ),
							'placeholder' => esc_attr__( 'Type your timeline title here', 'themex' ),						
						]
					);
					/* witr_timeline_content */
					$this->add_control(
						'witr_timeline_content3',
						[
							'label' => esc_html__( 'timeline Content Text', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use content text, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Lorem ipsum dolor sit amet, ca adipisicing sed do eiusmod tempor incididunt utn labore et dolore magna .', 'themex' ),
							'placeholder' => esc_attr__( 'Type your content here', 'themex' ),
						]
					);
				/* witr_show_icon witr_icon_item */
					$this->add_control(
						'witr_show_icon3',
						[
							'label' => esc_html__( 'Show Icon', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),							
							'return_value' => 'yes',
							'default' => 'yes',							
						]
					);				
					$this->add_control(
						'witr_icon_item3',
						[
							'label' => esc_html__( 'Icon', 'themex' ),
							'type' => Controls_Manager::ICONS,
							'description' => esc_html__( 'Change icon here, For this, click on the library field', 'themex' ),
							'fa4compatibility' => 'icon',
							'default' => [
								'value' => 'fas fa-cloud',
								'library' => 'fa-solid',
							],
							'condition' => [
								'witr_show_icon3' => 'yes',
							],							
						]
					);	
					
					/* witr_number_switcher witr_timeline_number */
					$this->add_control(
						'witr_show_number3',
						[
							'label' => esc_html__( 'Show Number', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),							
							'return_value' => 'yes',
							'default' => 'yes',							
						]
					);						
					$this->add_control(
						'witr_timeline_number3',
						[
							'label' => esc_html__( 'Number', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Not use number, remove the text from field', 'themex' ),
							'default' => esc_html__( '03', 'themex' ),
							'placeholder' => esc_attr__( 'Type your number here', 'themex' ),
							'condition' => [
								'witr_show_number3' => 'yes',
							],							
						]

					);


			$this->end_controls_section();
			/* === end witr timeline 3 ===  */
			

			/* === start witr timeline 4 === */
			$this->start_controls_section(
				'witr_field_display_timeline4',
				[
					'label' => esc_html__( 'Timeline Options 2', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
				/* witr_timeline_title */	
					$this->add_control(
						'witr_timeline_title4',
						[
							'label' => esc_html__( 'Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use title, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Add title Here2', 'themex' ),
							'placeholder' => esc_attr__( 'Type your timeline title here', 'themex' ),						
						]
					);
					/* witr_timeline_content */
					$this->add_control(
						'witr_timeline_content4',
						[
							'label' => esc_html__( 'timeline Content Text', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use content text, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Lorem ipsum dolor sit amet, ca adipisicing sed do eiusmod tempor incididunt utn labore et dolore magna .', 'themex' ),
							'placeholder' => esc_attr__( 'Type your content here', 'themex' ),
						]
					);
				/* witr_show_icon witr_icon_item */
					$this->add_control(
						'witr_show_icon4',
						[
							'label' => esc_html__( 'Show Icon', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),							
							'return_value' => 'yes',
							'default' => 'yes',							
						]
					);				
					$this->add_control(
						'witr_icon_item4',
						[
							'label' => esc_html__( 'Icon', 'themex' ),
							'type' => Controls_Manager::ICONS,
							'description' => esc_html__( 'Change icon here, For this, click on the library field', 'themex' ),
							'fa4compatibility' => 'icon',
							'default' => [
								'value' => 'fas fa-cloud',
								'library' => 'fa-solid',
							],
							'condition' => [
								'witr_show_icon4' => 'yes',
							],							
						]
					);	
					
					/* witr_number_switcher witr_timeline_number */
					$this->add_control(
						'witr_show_number4',
						[
							'label' => esc_html__( 'Show Number', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),							
							'return_value' => 'yes',
							'default' => 'yes',							
						]
					);						
					$this->add_control(
						'witr_timeline_number4',
						[
							'label' => esc_html__( 'Number', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Not use number, remove the text from field', 'themex' ),
							'default' => esc_html__( '04', 'themex' ),
							'placeholder' => esc_attr__( 'Type your number here', 'themex' ),
							'condition' => [
								'witr_show_number4' => 'yes',
							],							
						]

					);


			$this->end_controls_section();
			/* === end witr timeline 4 ===  */
			

			/* === start witr timeline 5 === */
			$this->start_controls_section(
				'witr_field_display_timeline5',
				[
					'label' => esc_html__( 'Timeline Options 4', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
				/* witr_timeline_title */	
					$this->add_control(
						'witr_timeline_title5',
						[
							'label' => esc_html__( 'Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use title, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Add title Here4', 'themex' ),
							'placeholder' => esc_attr__( 'Type your timeline title here', 'themex' ),						
						]
					);
					/* witr_timeline_content */
					$this->add_control(
						'witr_timeline_content5',
						[
							'label' => esc_html__( 'timeline Content Text', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use content text, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Lorem ipsum dolor sit amet, ca adipisicing sed do eiusmod tempor incididunt utn labore et dolore magna .', 'themex' ),
							'placeholder' => esc_attr__( 'Type your content here', 'themex' ),
						]
					);
				/* witr_show_icon witr_icon_item */
					$this->add_control(
						'witr_show_icon5',
						[
							'label' => esc_html__( 'Show Icon', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),							
							'return_value' => 'yes',
							'default' => 'yes',							
						]
					);				
					$this->add_control(
						'witr_icon_item5',
						[
							'label' => esc_html__( 'Icon', 'themex' ),
							'type' => Controls_Manager::ICONS,
							'description' => esc_html__( 'Change icon here, For this, click on the library field', 'themex' ),
							'fa4compatibility' => 'icon',
							'default' => [
								'value' => 'fas fa-cloud',
								'library' => 'fa-solid',
							],
							'condition' => [
								'witr_show_icon5' => 'yes',
							],							
						]
					);	
					
					/* witr_number_switcher witr_timeline_number */
					$this->add_control(
						'witr_show_number5',
						[
							'label' => esc_html__( 'Show Number', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),							
							'return_value' => 'yes',
							'default' => 'yes',							
						]
					);						
					$this->add_control(
						'witr_timeline_number5',
						[
							'label' => esc_html__( 'Number', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Not use number, remove the text from field', 'themex' ),
							'default' => esc_html__( '05', 'themex' ),
							'placeholder' => esc_attr__( 'Type your number here', 'themex' ),
							'condition' => [
								'witr_show_number5' => 'yes',
							],							
						]

					);


			$this->end_controls_section();
			/* === end witr timeline 5 ===  */
			

			/* === start witr timeline 6 === */
			$this->start_controls_section(
				'witr_field_display_timeline6',
				[
					'label' => esc_html__( 'Timeline Options 6', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
				/* witr_timeline_title */	
					$this->add_control(
						'witr_timeline_title6',
						[
							'label' => esc_html__( 'Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use title, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Add title Here6', 'themex' ),
							'placeholder' => esc_attr__( 'Type your timeline title here', 'themex' ),						
						]
					);
					/* witr_timeline_content */
					$this->add_control(
						'witr_timeline_content6',
						[
							'label' => esc_html__( 'timeline Content Text', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use content text, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Lorem ipsum dolor sit amet, ca adipisicing sed do eiusmod tempor incididunt utn labore et dolore magna .', 'themex' ),
							'placeholder' => esc_attr__( 'Type your content here', 'themex' ),
						]
					);
				/* witr_show_icon witr_icon_item */
					$this->add_control(
						'witr_show_icon6',
						[
							'label' => esc_html__( 'Show Icon', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),							
							'return_value' => 'yes',
							'default' => 'yes',							
						]
					);				
					$this->add_control(
						'witr_icon_item6',
						[
							'label' => esc_html__( 'Icon', 'themex' ),
							'type' => Controls_Manager::ICONS,
							'description' => esc_html__( 'Change icon here, For this, click on the library field', 'themex' ),
							'fa4compatibility' => 'icon',
							'default' => [
								'value' => 'fas fa-cloud',
								'library' => 'fa-solid',
							],
							'condition' => [
								'witr_show_icon6' => 'yes',
							],							
						]
					);	
					
					/* witr_number_switcher witr_timeline_number */
					$this->add_control(
						'witr_show_number6',
						[
							'label' => esc_html__( 'Show Number', 'themex' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),							
							'return_value' => 'yes',
							'default' => 'yes',							
						]
					);						
					$this->add_control(
						'witr_timeline_number6',
						[
							'label' => esc_html__( 'Number', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Not use number, remove the text from field', 'themex' ),
							'default' => esc_html__( '06', 'themex' ),
							'placeholder' => esc_attr__( 'Type your number here', 'themex' ),
							'condition' => [
								'witr_show_number6' => 'yes',
							],							
						]

					);


			$this->end_controls_section();
			/* === end witr timeline 6 ===  */
			
			
			
			
			

			
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
					'separator'=>'before',
					'global' => [
						'default' => Global_Colors::COLOR_PRIMARY,
					],					
					'selectors' => [
						'{{WRAPPER}} .witr_timeline_item h2' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .witr_timeline_item h2',
				]
			);		
			/* title padding */
			$this->add_responsive_control(
				'witr_title_padding',
				[
					'label' => __( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'separator'=>'before',
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_timeline_item h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'separator'=>'before',
					'global' => [
						'default' => Global_Colors::COLOR_TEXT,
					],					
					'selectors' => [
						'{{WRAPPER}} .witr_timeline_item p' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .witr_timeline_item p',
				]
			);		
			/* content padding */
			$this->add_responsive_control(
				'witr_content_padding',
				[
					'label' => __( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'separator'=>'before',
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_timeline_item p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr content style ====*/		
		
		
		

		/*=== start witr_Number style ====*/

		$this->start_controls_section(
			'witr_style_option_number',
			[
				'label' => esc_html__( 'Number Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_show_number' => 'yes',
				],				
			]
		);	

		
			/* number Color */
			$this->add_control(
				'witr_number_color',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .witr_number_item' => 'color: {{VALUE}}',
					],
					
				]
			);
				/* number background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_number_background',
						'label' => esc_html__( 'Icon Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_hd_sicon_inner,{{WRAPPER}} .witr_dslborder,{{WRAPPER}} .witr_hd_timeline_inner::before,{{WRAPPER}} .middle_border_divider',
					]
				);			
				/*  number font size */
				$this->add_responsive_control(
					'number_size',
					[
						'label' => esc_html__( 'Size', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_number_item' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);
				
				/*  Number width */
				$this->add_responsive_control(
					'witr_number_width',
					[
						'label' => esc_html__( 'width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_hd_sicon_inner' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  Number height */
				$this->add_responsive_control(
					'witr_number_height',
					[
						'label' => esc_html__( ' Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_hd_sicon_inner' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/* witr_border_style */
				$this->add_control(
					'witr_number_border_style',
					[
						'label' => esc_html__( 'Border Style', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'default' => 'none',
						'options' => [
							'none' => esc_html__( 'none', 'themex' ),
							'solid' => esc_html__( 'Solid', 'themex' ),
							'double' => esc_html__( 'Double', 'themex' ),
							'dotted' => esc_html__( 'Dotted', 'themex' ),
							'dashed' => esc_html__( 'Dashed', 'themex' ),
						],
						
						'selectors' => [
							'{{WRAPPER}} .witr_hd_sicon_inner' => 'border-style: {{VALUE}}',
						],
					]
				);		
				/* witr border */
				
				$this->add_control(
					'witr_number_border',
					[
						'label' => esc_html__( 'Border', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'selectors' => [
							'{{WRAPPER}} .witr_hd_sicon_inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* border_color */
				$this->add_control(
					'witr_number_border_color',
					[
						'label' => esc_html__( 'Border Color', 'themex' ),
						'type' => Controls_Manager::COLOR,						
						'selectors' => [
							'{{WRAPPER}} .witr_hd_sicon_inner' => 'border-color: {{VALUE}}',
						],
					]
				);
				/* border_radius */
				$this->add_control(
					'witr_number_border_radius',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .witr_hd_sicon_inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
					
				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_numberbox_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_hd_sicon_inner',
					]
				);

				/* blend mode style color */				
				$this->add_control(
					'witr_number_blend_mode',
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
							'{{WRAPPER}} .witr_hd_sicon_inner' => 'mix-blend-mode: {{VALUE}}',
						],
						'separator' => 'none',
					]
				);

				/* Number margin */
				$this->add_responsive_control(
					'witr_number_margin',
					[
						'label' => esc_html__( 'Number Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .witr_number_item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);				
				/* Number margin */
				$this->add_responsive_control(
					'witr_numbernb_margin',
					[
						'label' => esc_html__( 'Box Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .witr_hd_sicon_inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				

		 $this->end_controls_section();
		/*=== end  witr_Number style ====*/		
		
		
		
		/*=== start witr_icon style ====*/
		$this->start_controls_section(
			'witr_style_icon_option',
			[
				'label' => esc_html__( 'Icon Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_show_icon' => 'yes',
				],				
			]
		);
				/* Icon Color */
				$this->add_control(
					'witr_primary_color',
					[
						'label' => esc_html__( 'Icon Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .witr_hd_sicon_inner' => 'color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .witr_hd_sicon_inner,{{WRAPPER}} .witr_dslborder,{{WRAPPER}} .witr_hd_timeline_inner::before,{{WRAPPER}} .middle_border_divider',
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
								'min' => 0,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_hd_sicon_inner' => 'font-size: {{SIZE}}{{UNIT}};',
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
								'min' => 0,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_hd_sicon_inner' => 'width: {{SIZE}}{{UNIT}};',
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
								'min' => 0,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_hd_sicon_inner' => 'height: {{SIZE}}{{UNIT}};',
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
								'min' => 0,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_hd_sicon_inner' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/* witr_border_style */
				$this->add_control(
					'witr_border_style',
					[
						'label' => esc_html__( 'Border Style', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'default' => 'none',
						'options' => [
							'none' => esc_html__( 'none', 'themex' ),
							'solid' => esc_html__( 'Solid', 'themex' ),
							'double' => esc_html__( 'Double', 'themex' ),
							'dotted' => esc_html__( 'Dotted', 'themex' ),
							'dashed' => esc_html__( 'Dashed', 'themex' ),
						],
						
						'selectors' => [
							'{{WRAPPER}} .witr_hd_sicon_inner' => 'border-style: {{VALUE}}',
						],
					]
				);		
				/* witr border */
				
				$this->add_control(
					'witr_border',
					[
						'label' => esc_html__( 'Border', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'selectors' => [
							'{{WRAPPER}} .witr_hd_sicon_inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* border_color */
				$this->add_control(
					'witr_border_color',
					[
						'label' => esc_html__( 'Border Color', 'themex' ),
						'type' => Controls_Manager::COLOR,						
						'selectors' => [
							'{{WRAPPER}} .witr_hd_sicon_inner' => 'border-color: {{VALUE}}',
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
							'{{WRAPPER}} .witr_hd_sicon_inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
					
				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_hd_sicon_inner',
					]
				);

				/* blend mode style color */				
				$this->add_control(
					'witr_icon_blend_mode',
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
							'{{WRAPPER}} .witr_hd_sicon_inner' => 'mix-blend-mode: {{VALUE}}',
						],
						'separator' => 'none',
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
							'{{WRAPPER}} .witr_hd_sicon_inner' => 'transform: rotate({{SIZE}}{{UNIT}});',
						],
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
							'{{WRAPPER}} .witr_hd_sicon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		
		$this->end_controls_section();

		/*=== end witr_icon style ====*/



		/*=== start witr content style ====*/

		$this->start_controls_section(
			'witr_style_all_btn',
			[
				'label' => esc_html__( 'All Button Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_timeline' =>['8'],
				],					
			]
		);		 
			/* color */
			$this->add_control(
				'witr_btntc_color',
				[
					'label' => esc_html__( 'Text Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_ACCENT,
					],					
					'separator'=>'before',					
					'selectors' => [
						'{{WRAPPER}} .timeline_button a' => 'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
					'witr_btnthc_color',
					[
						'label' => esc_html__( 'Text Hover Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',					
						'selectors' => [
							'{{WRAPPER}} .timeline_button a:hover' => 'color: {{VALUE}}',
						],
					]
				);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_btncttpy_color',
					'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_ACCENT,
					],
					'selector' => '{{WRAPPER}} .timeline_button a',
				]
			);			
			/* title margin */
			$this->add_responsive_control(
				'witr_btnc_margin',
				[
					'label' => __( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'separator'=>'before',
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .timeline_button a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* title padding */
			$this->add_responsive_control(
				'witr_btnc_padding',
				[
					'label' => __( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'separator'=>'before',
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .timeline_button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);				
			
		 
		 $this->end_controls_section();
		/*=== end  witr buttton style ====*/		
		
		/*=== start witr All Text Hovert style ====*/

		$this->start_controls_section(
			'witr_style_all_content',
			[
				'label' => esc_html__( 'All Text Hover Color', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,					
			]
		);		 
			/* color */
			$this->add_control(
				'witr_alltitle_color',
				[
					'label' => esc_html__( 'Title Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .witr_hd_timeline_inner:hover .witr_timeline_item h2' => 'color: {{VALUE}}',
					],
				]
			);
			/* heading */
			$this->add_control(
				'witr_alheadi_color',
				[
					'label' => esc_html__( 'Background Hover color', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'default' =>'heading',
				]
			);				
			/* Icon background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_allicon_background',
					'label' => esc_html__( 'Icon Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .witr_hd_timeline_inner:hover .witr_hd_sicon_inner,{{WRAPPER}} .witr_hd_timeline_inner:hover::before,{{WRAPPER}} .witr_hd_timeline_inner:hover .witr_dslborder',
					


				]
			);							
		 
		 $this->end_controls_section();
		/*=== end  witr content style ====*/



			

    } /* function end */

	
	
	
    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();	
	

?>

<!-- witr timeline area -->
<div class="witr_timeline_area">
		<div class="row">
			<!-- timeline single item -->
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="witr_hd_timeline_contant mrl15 witr_sicon_top">
					<div class="witr_hd_timeline_inner">
						<div class="witr_dslborder"></div>
						<div class="witr_timeline_item">
							<!-- title -->
							<?php if(isset($witrshowdata['witr_timeline_title']) && ! empty($witrshowdata['witr_timeline_title'])){?>
								<h2><?php echo $witrshowdata['witr_timeline_title']; ?> </h2>		
							<?php } ?>
							<!-- content -->
							<?php if(isset($witrshowdata['witr_timeline_content']) && ! empty($witrshowdata['witr_timeline_content'])){?>
								<p><?php echo $witrshowdata['witr_timeline_content']; ?> </p>		
							<?php } ?>							
						</div>
						<div class="witr_hd_sicon">
							<div class="witr_number_item">
								<!-- number -->
								<?php if(isset($witrshowdata['witr_timeline_number']) && ! empty($witrshowdata['witr_timeline_number'])){?>
									<span><?php echo $witrshowdata['witr_timeline_number']; ?></span>
								<?php } ?>
							</div>
							<div class="witr_hd_sicon_inner">
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
								<?php } ?>															
							</div>
						</div>
					</div>	
				</div>			
			</div>
			<!-- timeline single item 2 -->
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="witr_hd_timeline_contant  witr_sicon_top mrl65">
					<div class="witr_hd_timeline_inner">
						<div class="witr_dslborder"></div>
						<div class="witr_timeline_item">
							<!-- title -->
							<?php if(isset($witrshowdata['witr_timeline_title2']) && ! empty($witrshowdata['witr_timeline_title2'])){?>
								<h2><?php echo $witrshowdata['witr_timeline_title2']; ?> </h2>		
							<?php } ?>
							<!-- content -->
							<?php if(isset($witrshowdata['witr_timeline_content2']) && ! empty($witrshowdata['witr_timeline_content2'])){?>
								<p><?php echo $witrshowdata['witr_timeline_content2']; ?> </p>		
							<?php } ?>							
						</div>
						<div class="witr_hd_sicon">
							<div class="witr_number_item">
								<!-- number -->
								<?php if(isset($witrshowdata['witr_timeline_number2']) && ! empty($witrshowdata['witr_timeline_number2'])){?>
									<span><?php echo $witrshowdata['witr_timeline_number2']; ?></span>
								<?php } ?>
							</div>
							<div class="witr_hd_sicon_inner">
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item2'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item2']['value']);?>"></i>
								<?php } ?>
							</div>
						</div>
					</div>	
				</div>			
			</div>
			<!-- timeline single item 3 -->
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="witr_hd_timeline_contant mrl110 witr_sicon_top">
					<div class="witr_hd_timeline_inner">
						<div class="witr_dslborder"></div>
						<div class="witr_timeline_item">
							<!-- title -->
							<?php if(isset($witrshowdata['witr_timeline_title3']) && ! empty($witrshowdata['witr_timeline_title3'])){?>
								<h2><?php echo $witrshowdata['witr_timeline_title3']; ?> </h2>		
							<?php } ?>
							<!-- content -->
							<?php if(isset($witrshowdata['witr_timeline_content3']) && ! empty($witrshowdata['witr_timeline_content3'])){?>
								<p><?php echo $witrshowdata['witr_timeline_content3']; ?> </p>		
							<?php } ?>							
						</div>
						<div class="witr_hd_sicon">
							<div class="witr_number_item">
								<!-- number -->
								<?php if(isset($witrshowdata['witr_timeline_number3']) && ! empty($witrshowdata['witr_timeline_number3'])){?>
									<span><?php echo $witrshowdata['witr_timeline_number3']; ?></span>
								<?php } ?>
							</div>
							<div class="witr_hd_sicon_inner">
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item3'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item3']['value']);?>"></i>
								<?php } ?>
							</div>
						</div>
					</div>	
				</div>			
			</div>
			<!-- end timeline single item -->
		</div>
		<!-- bar line -->
		<div class="row"><div class="col-lg-12 col-md-12"><div class="middle_border_divider"></div></div></div>
		<!-- timeline bottom -->	
		<div class="row">
			<!-- timeline single item 4 -->
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="witr_hd_timeline_contant mrr95  witr_sicon_bottom mrr90">
					<div class="witr_hd_timeline_inner">
						<div class="witr_dslborder"></div>
						<div class="witr_timeline_item">
							<!-- title -->
							<?php if(isset($witrshowdata['witr_timeline_title4']) && ! empty($witrshowdata['witr_timeline_title4'])){?>
								<h2><?php echo $witrshowdata['witr_timeline_title4']; ?> </h2>		
							<?php } ?>
							<!-- content -->
							<?php if(isset($witrshowdata['witr_timeline_content4']) && ! empty($witrshowdata['witr_timeline_content4'])){?>
								<p><?php echo $witrshowdata['witr_timeline_content4']; ?> </p>		
							<?php } ?>							
						</div>
						<div class="witr_hd_sicon">
							<div class="witr_number_item">
								<!-- number -->
								<?php if(isset($witrshowdata['witr_timeline_number4']) && ! empty($witrshowdata['witr_timeline_number4'])){?>
									<span><?php echo $witrshowdata['witr_timeline_number4']; ?></span>
								<?php } ?>
							</div>
							<div class="witr_hd_sicon_inner">
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item4'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item4']['value']);?>"></i>
								<?php } ?>
							</div>
						</div>
					</div>	
				</div>			
			</div>
			<!-- timeline single item 5 -->
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="witr_hd_timeline_contant  witr_sicon_bottom mrr50">
					<div class="witr_hd_timeline_inner">
						<div class="witr_dslborder"></div>
						<div class="witr_timeline_item">
							<!-- title -->
							<?php if(isset($witrshowdata['witr_timeline_title5']) && ! empty($witrshowdata['witr_timeline_title5'])){?>
								<h2><?php echo $witrshowdata['witr_timeline_title5']; ?> </h2>		
							<?php } ?>
							<!-- content -->
							<?php if(isset($witrshowdata['witr_timeline_content5']) && ! empty($witrshowdata['witr_timeline_content5'])){?>
								<p><?php echo $witrshowdata['witr_timeline_content5']; ?> </p>		
							<?php } ?>							
						</div>
						<div class="witr_hd_sicon">
							<div class="witr_number_item">
								<!-- number -->
								<?php if(isset($witrshowdata['witr_timeline_number5']) && ! empty($witrshowdata['witr_timeline_number5'])){?>
									<span><?php echo $witrshowdata['witr_timeline_number5']; ?></span>
								<?php } ?>
							</div>
							<div class="witr_hd_sicon_inner">
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item5'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item5']['value']);?>"></i>
								<?php } ?>
							</div>
						</div>
					</div>	
				</div>			
			</div>
			<!-- timeline single item 6 -->
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="witr_hd_timeline_contant  witr_sicon_bottom mrr15">
					<div class="witr_hd_timeline_inner">
						<div class="witr_dslborder"></div>
						<div class="witr_timeline_item">
							<!-- title -->
							<?php if(isset($witrshowdata['witr_timeline_title6']) && ! empty($witrshowdata['witr_timeline_title6'])){?>
								<h2><?php echo $witrshowdata['witr_timeline_title6']; ?> </h2>		
							<?php } ?>
							<!-- content -->
							<?php if(isset($witrshowdata['witr_timeline_content6']) && ! empty($witrshowdata['witr_timeline_content6'])){?>
								<p><?php echo $witrshowdata['witr_timeline_content6']; ?> </p>		
							<?php } ?>							
						</div>
						<div class="witr_hd_sicon">
							<div class="witr_number_item">
								<!-- number -->
								<?php if(isset($witrshowdata['witr_timeline_number6']) && ! empty($witrshowdata['witr_timeline_number6'])){?>
									<span><?php echo $witrshowdata['witr_timeline_number6']; ?></span>
								<?php } ?>
							</div>
							<div class="witr_hd_sicon_inner">
								<!-- icon -->
								<?php if( ! empty($witrshowdata['witr_icon_item6'])){?>
									<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item6']['value']);?>"></i>	
								<?php } ?>								
							</div>
						</div>
					</div>	
				</div>			
			</div>
			<!-- end timeline single item -->
		</div>
	
	
</div>
<!-- end area -->


	<?php	
		

    } /* function end */
	


}