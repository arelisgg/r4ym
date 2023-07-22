<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Social_Icons extends Widget_Base {

    public function get_name() {
        return 'witr_section_social_icons';
    }
    
    public function get_title() {
        return esc_html__( 'Soical Icons', 'themex' );
    }
    public function get_style_depends() {
        return ['wscoilicons'];
    }
    public function get_icon() {
        return 'themex_icon eicon-social-icons';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {
		
			/* === witr_pricing start === */
			$this->start_controls_section(
				'witr_field_display_social_icons',
				[
					'label' => esc_html__( ' Social Icons Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);


					$repeater = new Repeater();	
	
					/* witr_icon_item */				
					$repeater->add_control(
						'witr_icon_item',
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
						'witr_social_icons',
						[
							'label' => esc_html__( 'Social Icons Item', 'themex' ),
							'type' => Controls_Manager::REPEATER,
							'fields' => $repeater->get_controls(),							
							'default' => [
								[
									'witr_icon_item' => [
										'value' => 'icofont-facebook',
										'library' => 'fa-brands',
									],
								],
								[
									'witr_icon_item' => [
										'value' => 'icofont-twitter',
										'library' => 'fa-brands',
									],
								],
								[
									'witr_icon_item' => [
										'value' => 'icofont-tumblr',
										'library' => 'fa-brands',
									],
								],
								[
									'witr_icon_item' => [
										'value' => 'icofont-vimeo',
										'library' => 'fa-brands',
									],
								],
								
							],
							
							'title_field' => '<# var migrated = "undefined" !== typeof __fa4_migrated, social = ( "undefined" === typeof social ) ? false : social; #>{{{ elementor.helpers.getSocialNetworkNameFromIcon( witr_icon_item, social, true, migrated, true ) }}}',							
						]
					);
					/* text_align */
					$this->add_responsive_control(
						'text_align',
						[
							'label' => esc_html__( 'Text Alignment', 'themex' ),
							'type' => Controls_Manager::CHOOSE,
							'options' => [
								'left'    => [
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
							],
							'default' => 'center',
							'selectors' => [
								'{{WRAPPER}} .witr_single_socials' => 'text-align: {{VALUE}};',
							],
						]
					);					

			$this->end_controls_section();
			/*=== end witr_text widget start ====*/
			
			
			
			
	   /*===========================================================================================
										START TO STYLE
		=============================================================================================*/				
			
			
		/*=== start witr_icon style ====*/
		$this->start_controls_section(
			'witr_style_icon_option',
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
						'global' => [
							'default' => Global_Colors::COLOR_SECONDARY,
						],						
						'selectors' => [
							'{{WRAPPER}} .witr_single_socials ul li a i' => 'color: {{VALUE}}',
						],					
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
							'{{WRAPPER}} .witr_single_socials ul li a i' => 'font-size: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_single_socials ul li a i' => 'width: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_single_socials ul li a i' => 'height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_single_socials ul li a i' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/* text_align_icon */
				$this->add_responsive_control(
					'text_align_icon',
					[
						'label' => esc_html__( 'Text Alignment', 'themex' ),
						'type' => Controls_Manager::CHOOSE,
						'options' => [
							'left'    => [
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
						],
						'default' => 'left',
						'selectors' => [
							'{{WRAPPER}} .witr_single_socials ul li a i' => 'text-align: {{VALUE}};',
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
						'selector' => '{{WRAPPER}} .witr_single_socials ul li a i',
					]
				);				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_border_style',
						'label' => esc_html__( 'Icon Border', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_single_socials ul li a i',
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
							'{{WRAPPER}} .witr_single_socials ul li a i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
					
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_single_socials ul li a i',
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
							'{{WRAPPER}} .witr_single_socials ul li a i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_single_socials ul li a i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'witr_hover_icon_color1',
						[
							'label' => esc_html__( 'Icon Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .witr_single_socials ul li a i:hover' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .witr_single_socials ul li a i:hover',
						]
					);
					/* border_hover_color */
					$this->add_control(
						'witr_border_hover_color',
						[
							'label' => esc_html__( 'Border Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							
							'selectors' => [
								'{{WRAPPER}} .witr_single_socials ul li a i:hover' => 'border-color: {{VALUE}}',
							],
						]
					);

					/*  Hover Rotate */
					$this->add_responsive_control(
						'witr_rotate_hover',
						[
							'label' => esc_html__( 'Rotate Hover', 'themex' ),
							'type' => Controls_Manager::SLIDER,
							'size_units' => [ 'deg' ],
							'default' => [
								'size' => 0,
								'unit' => 'deg',
							],
							'tablet_default' => [
							],
								'unit' => 'deg',
							'mobile_default' => [
								'unit' => 'deg',
							],
							'selectors' => [
								'{{WRAPPER}} .witr_single_socials ul li a i:hover' => 'transform: rotate({{SIZE}}{{UNIT}});',
							],
						]
					);					

					$this->end_controls_tab();
					/*=== end icon hover style ====*/
					
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/

		$this->end_controls_section();

		/*=== end witr_icon style ====*/



     } /* funcition end */

    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();

		
			?>					
				<!-- footer socials -->
				<div class="witr_single_socials">
					<ul>
						<li>					
							<?php if( ! empty($witrshowdata['witr_social_icons'])){
								foreach($witrshowdata['witr_social_icons'] as $social){
								$target = ! empty($social['witr_icons_link']['is_external']) ? ' target="_blank"' : '';
								$nofollow = ! empty($social['witr_icons_link']['nofollow']) ? ' rel="nofollow"' : '';
								?>
									<!-- icon -->
									<a href="<?php echo $social['witr_icons_link'] ['url'];?>"<?php echo $target,$nofollow?>>
									<!-- icon -->
									<?php if( ! empty($social['witr_icon_item'])){?>
										<i class="<?php echo esc_attr( $social['witr_icon_item']['value']);?>"></i>
									<?php } ?>																
									</a>		
								<?php } } ?>
						</li>
					</ul>	
				</div>							
			

				
			<?php 


    } /* funcition end */



}