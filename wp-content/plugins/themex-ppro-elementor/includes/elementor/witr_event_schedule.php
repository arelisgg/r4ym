<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_schedule extends Widget_Base {

    public function get_name() {
        return 'witr_section_schedule';
    }
    
    public function get_title() {
        return esc_html__( 'Event Schedule', 'themex' );
    }
	public function get_style_depends() {
        return [ 'wevschedule' ];
    }
    public function get_icon() {
        return 'themex_icon eicon-post-list';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {
		
			
			

			/* === w_schedule start === */
			$this->start_controls_section(
				'witr_field_display_schedule',
				[
					'label' => esc_html__( ' schedule Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);									
					/* witr_schedule_image */								
					$this->add_control(
						'witr_schedule_image',
						[
							'label' => esc_html__( 'Choose Image', 'themex' ),
							'type' => Controls_Manager::MEDIA,
							'default' => [
								'url' => Utils::get_placeholder_image_src(),
							],							
						]
					);
				/* Image_Size */
				$this->add_group_control(
					Group_Control_Image_Size::get_type(),
					[
						'name' => 'txbd_image_size',
						'default' => 'large',
						'separator' => 'none',
					]
				);					
					/*  witr_schedule_title */	
					$this->add_control(
						'witr_schedule_title',
						[
							'label' => esc_html__( 'Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use title, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Add title Here', 'themex' ),
							'separator'=>'before',
							'placeholder' => esc_attr__( 'Type your schedule title here', 'themex' ),						
						]
					);
					/* witr_schedule_title_link */	
					$this->add_control(
						'witr_schedule_title_link',
						[
							'label' => esc_html__( 'Title Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert Title link here.','themex'),
							'placeholder' => esc_attr__( 'https://your-link.com', 'themex' ),
							'show_external' => true,
							
						]
					);
				/* witr_show_icon witr_icon_item */
				$this->add_control(
					'witr_schedule_show',
					[
						'label' => esc_html__( 'Show List', 'themex' ),
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
					'witr_schedule_showicon',
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
					'witr_schedule_ficon',
					[
						'label' => esc_html__( 'Icon', 'themex' ),
						'type' => Controls_Manager::ICONS,
						'description' => esc_html__( 'Change icon here, For this, click on the library field And Not use Icon,Click On The Hide Option', 'themex' ),
						'fa4compatibility' => 'icon',
						'default' => [
							'value' => 'icofont-calendar',
							'library' => 'fa-solid',
						],
						'condition' => [
							'witr_schedule_showicon' => 'yes',
						],						
					]
				);
				$repeater->add_control(
					'witr_schedule_ftitle',
					[
						'label'   => esc_html__( 'List Title', 'themex' ),
						'type'    => Controls_Manager::TEXT,
					]
				);				
					/* witr_list_tslide */
					$this->add_control(
						'witr_schedule_lists',
						[
							'label' => esc_html__( ' List', 'themex' ),
							'type' => Controls_Manager::REPEATER,
							'condition' => [
								'witr_schedule_show' => 'yes',
							],							
							'fields' => $repeater->get_controls(),
							'default' => [
								[
									'witr_schedule_ftitle' => esc_html__( 'January 13, 2022', 'themex' ),
								],
								
							],
							'title_field' => '{{{ witr_schedule_ftitle }}}',
						]
					);
					
					/* witr_schedule_content	*/
					$this->add_control(
						'witr_schedule_content',
						[
							'label' => esc_html__( ' Content Text', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use content text, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Lorem ipsum dolor sit amet, ca adipisicing elit, sed do eiu', 'themex' ),
							'separator'=>'before',
							'placeholder' => esc_attr__( 'Type your content here', 'themex' ),
						]
					);

		
		
					
			$this->end_controls_section();
			/* === end w_schedule ===  */

			
	   /*========================================================================================================================================================================
										START TO STYLE
		==========================================================================================================================================================================*/	

		/*=== start single schedule style 7,12====*/
		$this->start_controls_section(
			'witr_style_ss_option',
			[
				'label' => esc_html__( 'Single Box', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]
		);		


				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_single_bb',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .all_schedule_color',
					]
				);
				/* border_radius */
				$this->add_control(
					'witr_single_br',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .all_schedule_color' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* box background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_box_background',
						'label' => esc_html__( ' Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_schedule_12.sub-item,{{WRAPPER}} .schedule_inner_box,{{WRAPPER}} .all_schedule_color',							
					]
				);				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadowsbox',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .all_schedule_color,{{WRAPPER}} .schedule_inner_box',
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
							'{{WRAPPER}} .schedule_inner_box,{{WRAPPER}} .witr_schedule_12.sub-item, {{WRAPPER}} .all_schedule_color' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .schedule_inner_box,{{WRAPPER}} .witr_schedule_12.sub-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		
			$this->end_controls_section();
			/* === end single schedule ===  */
			

		/*=== start witr_image style ====*/
		$this->start_controls_section(
			'witr_style_image_Option',
			[
				'label' => esc_html__( ' Images Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,				
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
						'{{WRAPPER}} .all_schedule_color img' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .all_schedule_color img' => 'height: {{SIZE}}{{UNIT}};',
					],
				]			
			);
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_img_bb',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .single_seivice_ani img,{{WRAPPER}} .all_schedule_color img',
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
						'{{WRAPPER}} .all_schedule_color img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_schedule_color img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_schedule_color img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_schedule_color h3,{{WRAPPER}} .all_schedule_color h3 a,{{WRAPPER}} .all_schedule_color h2' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .all_schedule_color h3:hover,{{WRAPPER}} .all_schedule_color h3 a:hover,{{WRAPPER}} .all_schedule_color h2:hover' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .all_schedule_color h3,{{WRAPPER}} .all_schedule_color h3 a,{{WRAPPER}} .all_schedule_color h2',
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
						'{{WRAPPER}} .all_schedule_color h3,{{WRAPPER}} .all_schedule_color h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_schedule_color h3,{{WRAPPER}} .all_schedule_color h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_title style ====*/		

		/*=== start witr list style ====*/
		$this->start_controls_section(
			'witr_style_option_list',
			[
				'label' => esc_html__( ' List Color Option', 'themex' ),
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
							'{{WRAPPER}} .txbd_event_schedule_list ul' => 'text-align: {{VALUE}}',
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
								'{{WRAPPER}} .txbd_event_schedule_list ul li' => 'color: {{VALUE}}',
							],
						]
					);
					/* list background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_list_background',
							'label' => esc_html__( ' Background', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .txbd_event_schedule_list ul li',
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
							'selector' => '{{WRAPPER}} .txbd_event_schedule_list ul li',
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
								'{{WRAPPER}} .txbd_event_schedule_list ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .txbd_event_schedule_list ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					
				$this->end_controls_tab();
				/*=== end list normal style ====*/					
			
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
								'{{WRAPPER}} .txbd_event_schedule_list ul li i' => 'color: {{VALUE}}',
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
								'{{WRAPPER}} .txbd_event_schedule_list ul li i' => 'font-size: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .txbd_event_schedule_list ul li i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
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
						'{{WRAPPER}} .all_schedule_color p' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .all_schedule_color p',
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
						'{{WRAPPER}} .all_schedule_color p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_schedule_color p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr content style ====*/
		
	
		
		
		
			

    } /* function end */

	
	
	
    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();	
		$target = ! empty($witrshowdata['witr_schedule_title_link']['is_external']) ? ' target="_blank"' : '';
		$nofollow = ! empty($witrshowdata['witr_schedule_title_link']['nofollow']) ? ' rel="nofollow"' : '';

		$txbd_image = '';	
		if( !empty( $witrshowdata['witr_schedule_image']['url'] ) ){
			$txbd_image = Group_Control_Image_Size::get_attachment_image_html( $witrshowdata, 'txbd_image_size', 'witr_schedule_image' );
		}		
		
		?>
        <div class=" event_schedule_area">                 
			<div class="row txbd_event_schedule all_schedule_color">
				<div class="col-lg-4 col-md-4">
					<?php if( ! empty($witrshowdata['witr_schedule_image']['url'])){?>
					<div class="txbd_event_schedule_thumb">
						<?php echo $txbd_image; ?>
					</div>
					<?php } ?>
				</div>
				<div class="col-lg-8 col-md-8">
					<div class="txbd_event_schedule_text">
						<?php if( ! empty($witrshowdata['witr_schedule_title'])){?>
						<?php if($witrshowdata['witr_schedule_title_link'] ['url']){?> 
							<h3><a href="<?php echo $witrshowdata['witr_schedule_title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_schedule_title']; ?></a></h3>
						<?php }else{ ?>
						<h3><?php echo $witrshowdata['witr_schedule_title']; ?> </h3>
						<?php }	?>
						<?php } 
						if($witrshowdata['witr_schedule_show']=='yes'){ ?>
							<!-- list -->
							<div class="txbd_event_schedule_list">
								<ul>
								<?php if(! empty($witrshowdata['witr_schedule_lists'])){	?>
									<?php foreach($witrshowdata['witr_schedule_lists'] as $witr_list){?>
										<li class=" themex-item-<?php echo $witr_list['_id']; ?>" >
											<?php if($witr_list['witr_schedule_showicon']=='yes'){ ?><i class="<?php echo esc_attr( $witr_list['witr_schedule_ficon']['value']);?>"></i><?php } echo $witr_list['witr_schedule_ftitle']; ?>
										</li>
									<?php } } ?>	
								</ul>	
							</div>
						<?php } ?>					
						<!-- content -->
						<?php if( ! empty($witrshowdata['witr_schedule_content'])){?>
							<p><?php echo $witrshowdata['witr_schedule_content']; ?> </p>		
						<?php } ?>
					</div>
				</div>					
			</div>	   

        </div>
					
		<?php 		
		

    } 
	

}