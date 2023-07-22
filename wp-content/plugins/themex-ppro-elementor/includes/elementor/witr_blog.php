<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Blog extends Widget_Base {

    public function get_name() {
        return 'witr_blog_section';
    }
    
    public function get_title() {
        return esc_html__( ' Blog Post', 'themex' );
    }

    public function get_icon() {
        return 'themex_icon eicon-image';
    }
    public function get_style_depends() {
        return [ 'wblog', ];
    }	
	public function get_script_depends() {
        return [  ];
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'witr_blog_option',
            [
                'label' => esc_html__( 'Blog Options', 'themex' ),
            ]
        );
		
		
			/* blog style witr_style_blog */
			$this->add_control(
				'witr_style_blog',
				[
					'label' => esc_html__( 'Blog style', 'themex' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'1' => esc_html__( 'Blog style grid 1', 'themex' ),
						'2' => esc_html__( 'Blog style grid 2', 'themex' ),
						'3' => esc_html__( 'Blog style Carousel 3', 'themex' ),
						'4' => esc_html__( 'Blog style grid 4', 'themex' ),
						'5' => esc_html__( 'Blog style 5', 'themex' ),
						'6' => esc_html__( 'Blog style 6', 'themex' ),
						'7' => esc_html__( 'Blog style Carousel 7', 'themex' ),
						'8' => esc_html__( 'Blog style Carousel 8', 'themex' ),
						'9' => esc_html__( 'Blog style Carousel 9', 'themex' ),
						'10' => esc_html__( 'Blog style Carousel 10', 'themex' ),
						'11' => esc_html__( 'Blog style Carousel 11', 'themex' ),
						'12' => esc_html__( 'Blog style Carousel 12', 'themex' ),
						'13' => esc_html__( 'Blog style Carousel 13', 'themex' ),
						'14' => esc_html__( 'Blog style Carousel 14', 'themex' ),
						'15' => esc_html__( 'Blog style 15', 'themex' ),
						'16' => esc_html__( 'Blog style Carousel 16', 'themex' ),
					],
					'default' => '1',
				]
			);
			/* witr_apartment_title	*/
			$this->add_control(
				'witr_blog_showc',
				[
					'label' => esc_html__( ' Style 10,15 Number  2 Columns Must Be Set', 'themex' ),
					'type' => Controls_Manager::HEADING,						
				]
			);			

			
			/* blog iten show witr_post_per_page */
            $this->add_control(
                'witr_post_per_page',
                [
                    'label' => __( 'Show Number Of blog', 'themex' ),
                    'type' => Controls_Manager::NUMBER,				
                    'separator' => 'before',
                    'min' => 1,
                    'max' => 500,
                    'step' => 1,
                    'default' => 3,
                ]
            );
			$this->add_control(
				'witr_blog_slug', [
					'label' => __( 'Category Name', 'themex' ),
					'description' => __( 'Choose a category name to display.', 'themex' ),
					'separator' => 'before',
					'type' => Controls_Manager::SELECT,
					'options' => txw_cat_array('category'),
					'default' => 'all',		
				]
			);				
			/* blog show witr_adc_blog */
 			$this->add_control(
				'witr_adc_blog',
				[
					'label' => esc_html__( 'Blog ASC/DSC style', 'themex' ),
					'type' => Controls_Manager::SELECT,
                    'separator' => 'before',					
					'options' => [
						'DESC'	=> esc_html__( 'Descending', 'themex' ),
						'ASC'	=> esc_html__( 'Ascending', 'themex' )
					],
					'default' => 'DESC',
				]
			);
			/* witr_column_grid */
            $this->add_control(
                'witr_column_grid',
                [
                    'label' => esc_html__( 'Columns', 'themex' ),
                    'type' => Controls_Manager::SELECT,
					'description' =>"set your column from here",
                    'separator' => 'before',					
                    'default' => '4',
                    'options' => [
                        '12' => esc_html__( '1', 'themex' ),
                        '6' => esc_html__( '2', 'themex' ),
                        '4' => esc_html__( '3', 'themex' ),
                        '3' => esc_html__( '4', 'themex' ),
                        '2' => esc_html__( '6', 'themex' ),
                    ],
					'condition' => [
						'witr_style_blog' =>['1','2','4','5','6','15']
					]					
                ]
            );
			
			/* blog title witr_title_length */			
            $this->add_control(
                'witr_title_length',
                [
                    'label' => esc_html__( 'Title Length', 'themex' ),
                    'type' => Controls_Manager::NUMBER,
                    'separator' => 'before',					
                    'min' => 1,
                    'max' => 500,
                    'step' => 1,
                    'default' => 15,
                ]
            );
			/* witr_show_content */
			$this->add_control(
				'witr_show_content',
				[
					'label' => esc_html__( 'Show Content', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'yes',
					'separator'=>'before',							
				]
			);			
			/* witr_content_length */
            $this->add_control(
                'witr_content_length',
                [
                    'label' => esc_html__( 'Content Length', 'themex' ),
                    'type' => Controls_Manager::NUMBER,					
                    'min' => 1,
                    'max' => 1000,
                    'step' => 1,
                    'default' => 15,
					 'condition' => [
						'witr_show_content' => 'yes',
					 ]					
                ]
            );
			/* blog button witr_blog_button */			
            $this->add_control(
                'witr_blog_button',
                [
                    'label' => esc_html__( 'Button Text', 'themex' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'separator' => 'before',					
					'description' => esc_html__( 'Not use button, remove the text from field, When Use Icon Ex-Button Text <i class="icofont-arrow-right"></i>, Icon Link Type Icofont - https://icofont.com/icons or Themify Icon -https://themify.me/themify-icons or Fontawesome Icon - https://fontawesome.com/v4.7.0/icons/', 'themex' ),
					'placeholder' => esc_attr__( 'ex - Read More', 'themex' ),
                    'default' => 'Read More',
					'condition' => [
						'witr_style_blog' =>['1','2','3','4','5','7','8','9','10','11','12','13','14','15','16'],
					],
                ]
            );
			/* witr_cata_show */
			$this->add_control(
				'witr_buttoni_show',
				[
					'label' => esc_html__( 'Show Button Icon', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
                    'separator' => 'before',					
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'no',
					'condition' => [
						'witr_style_blog' =>['12'],
					],					
				]
			);			
			/* witr_cata_show */
			$this->add_control(
				'witr_cata_show',
				[
					'label' => esc_html__( 'Show Top Category', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
                    'separator' => 'before',					
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
						'witr_style_blog' =>['11','12','13','14','16'],
					],					
				]
			);			
			
			/* witr_post_meta  */	
			$this->add_control(
				'witr_post_meta',
				[
					'label' => esc_html__( 'Show Post Meta', 'themex' ),
					'type' => Controls_Manager::SELECT2,
					'separator' => 'before',
					'description' => esc_html__( 'Use The Meta, Set the from field', 'themex' ),
					'multiple' => true,
					'condition' => [
						'witr_style_blog' =>['1','2','5','6','7','9','10','11','12','13','14','15','16'],
						],
					'options' => [
						'a' => esc_html__( 'Author', 'themex' ),
						'aa' => esc_html__( 'Category', 'themex' ),						
						'd'  => esc_html__( 'Date', 'themex' ),						
						'c' => esc_html__( 'Comment', 'themex' ),
						
					],
					'default' => [ 'a', 'd' ],
				]
			);


			/* gutter  witr_gutter_column */
			$this->add_control(
				'witr_gutter_column',
				[
					'label' => esc_html__( 'Show Gutter', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
                    'separator' => 'before',					
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);	
			/* pagination  witr_pagination */
			$this->add_control(
				'witr_pagination_meta',
				[
					'label' => esc_html__( 'Show Meta 2', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
                    'separator' => 'before',					
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'no',
					'condition' => [
						'witr_style_blog' =>['5','6','13','14'],
					],					
				]
			);			
			/* pagination  witr_pagination */
			$this->add_control(
				'witr_pagination',
				[
					'label' => esc_html__( 'Show Pagination', 'themex' ),
					'type' => Controls_Manager::SWITCHER,
                    'separator' => 'before',					
					'label_on' => esc_html__( 'Show', 'themex' ),
					'label_off' => esc_html__( 'Hide', 'themex' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);
        $this->end_controls_section();

		/*=== end_controls_section ===*/
		
			/* witr_bslick_option */ 
			$this->start_controls_section(
				'witr_bslick_option',
				[
					'label' => esc_html__( 'witr Slick options', 'themex' ),
					'condition' => [
						'witr_style_blog' =>['3','7','8','9','10','11','12','13','14','16']
					],
				]
			);

						
				/* witr_slides_to_show */ 		
				$this->add_control(
					'witr_slides_to_show',
					[
						'label' => esc_html__( 'Slides to Show', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1,
						'max' => 100,
						'step' => 1,
						'default' => 3,						
					]
				);	
				/*  witr_c_slidestoScroll */			
				$this->add_control(
					'witr_c_slidestoScroll',
					[
						'label' => esc_html__( 'slidestoScroll', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1,
						'max' => 10,
						'step' => 1,
						'default' => 1,						
					]
				);
				/* image_infinite */
				$this->add_control(
					'witr_c_infinite',
					[
						'label' => esc_html__( 'Set Loop', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'true',
						'options' => [
							'true' => esc_html__( 'True', 'themex' ),
							'false' => esc_html__( 'False', 'themex' ),
						],						
					]
				);
				/* witr_c_autoplay */
				$this->add_control(
					'witr_c_autoplay',
					[
						'label' => esc_html__( 'Autoplay', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'true',
						'options' => [
							'true' => esc_html__( 'True', 'themex' ),
							'false' => esc_html__( 'False', 'themex' ),
						],						
					]
				);					
				/*  witr_c_autoplaySpeed */			
				$this->add_control(
					'witr_c_autoplaySpeed',
					[
						'label' => esc_html__( 'autoplaySpeed', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1000,
						'max' => 50000,
						'step' => 1000,
						'default' => 6000,						
					]
				);
				/*  witr_c_speed */			
				$this->add_control(
					'witr_c_speed',
					[
						'label' => esc_html__( 'speed', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 100,
						'max' => 2000,
						'step' => 100,
						'default' => 1000,						
					]
				);

				/* witr_c_arrows */
				$this->add_control(
					'witr_c_arrows',
					[
						'label' => esc_html__( 'arrows', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'true',
						'options' => [
							'true' => esc_html__( 'True', 'themex' ),
							'false' => esc_html__( 'False', 'themex' ),
						],						
					]
				);	
				/* witr_c_dots */
				$this->add_control(
					'witr_c_dots',
					[
						'label' => esc_html__( 'dots', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'false',
						'options' => [
							'true' => esc_html__( 'True', 'themex' ),
							'false' => esc_html__( 'False', 'themex' ),
						],						
					]
				);	
				/*  witr_c_res1 */			
				$this->add_control(
					'witr_c_res1',
					[
						'label' => esc_html__( 'Desktop', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1,
						'max' => 10,
						'step' => 1,
						'default' => 3,						
					]
				);					
				/*  witr_c_res2 */			
				$this->add_control(
					'witr_c_res2',
					[
						'label' => esc_html__( 'Tablet', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1,
						'max' => 8,
						'step' => 1,
						'default' => 2,						
					]
				);				
				/*  witr_c_res3 */			
				$this->add_control(
					'witr_c_res3',
					[
						'label' => esc_html__( 'Mobile', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1,
						'max' => 5,
						'step' => 1,
						'default' => 1,						
					]
				);								
				/* feature title witr_feature_title */	
					$this->add_control(
						'witr_unicid_c',
						[
							'label' => esc_html__( 'Use Unique ID', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Please use a unic ID here, ex- any text.', 'themex' ),
							'default' => 'idblog1',
							'placeholder' => esc_attr__( 'Type your ID here', 'themex' ),							
						]
					);				
				
	

        $this->end_controls_section();

		/*=== end_controls_section ===*/
		
		
/*===============================================================================================================================
															START TO STYLE
==============================================================================================================================*/
		
			/*=== start witr_single_blog style ====*/
			$this->start_controls_section(
				'witr_single_blog',
				[
					'label' => esc_html__( 'Single Blog Option', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,				
					'condition' => [
						'witr_style_blog' =>['1','2','4','5','6','9','10','11','12','13','14','15','16'],
					],					
				]
			);	
			/* witr_align */					
			$this->add_responsive_control(
				'witr_aligns',
				[
					'label' => esc_html__( 'Witr Alignment', 'themex' ),
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
						'{{WRAPPER}} .all_blog_color' => 'text-align: {{VALUE}}',
					],
				]
			);
			/*  image height */
			$this->add_responsive_control(
				'witr_image_height',
				[
					'label' => esc_html__( 'Image Height', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => 25,
							'max' => 1000,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .witr_sb6_thumb img ' => 'height: {{SIZE}}{{UNIT}};',
					],
				]			
			);			
				/* witr_single_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_single_border',
						'label' => esc_html__( 'Single Border', 'themex' ),
						'selector' => '{{WRAPPER}} .all_blog_color',
					]
				);			
				/* single_border_radius */
				$this->add_control(
					'witr_single_border_radius',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .all_blog_color' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* single blog background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_single_testi',
						'label' => esc_html__( ' Blog BG', 'themex' ),
						'types' => [ 'classic', 'gradient'],
						'selector' => '{{WRAPPER}} .all_blog_color,{{WRAPPER}} .busi_singleBlog',
					]
				);
				/* Single blog shadow  */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_single_tesr',
						'label' => esc_html__( 'Blog Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .all_blog_color,{{WRAPPER}} .busi_singleBlog',
					]
				);

				/* Blog Shadow Hover */				
				$this->add_control(
					'witr_box_blend_testhover',
					[
						'label' => esc_html__( 'Blog Shadow Hover', 'themex' ),
						'type' => Controls_Manager::HEADING,
					]
				);
				/* Single blog shadow  */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_single_tesrhover',
						'label' => esc_html__( 'blog Shadow Hover', 'themex' ),
						'selector' => '{{WRAPPER}} .blog-part:hover .all_blog_color,{{WRAPPER}} .busi_singleBlog:hover',
					]
				);
				/* single blog background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_singleh_blog',
						'label' => esc_html__( ' Blog BG', 'themex' ),
						'types' => [ 'classic', 'gradient'],
						'selector' => '{{WRAPPER}} .all_blog_color:hover,{{WRAPPER}} .busi_singleBlog:hover',
					]
				);				
				/* Box padding */
				$this->add_responsive_control(
					'witr_box_padding',
					[
						'label' => esc_html__( 'Text Box Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .witr_blog_con,{{WRAPPER}} .em-blog-content-area_adn,{{WRAPPER}} .wblog-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						'condition' => [
							'witr_style_blog' =>['1','2','5','9','11','12','13','16'],
						],						
					]
				);				
			
			$this->end_controls_section();
			/* === end witr_single_blog ===  */	

		
			/*=== start witr_single_blog style ====*/
			$this->start_controls_section(
				'witr_single_blog7',
				[
					'label' => esc_html__( 'Single Blog Option', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,				
					'condition' => [
						'witr_style_blog' =>['7','8'],
					],					
				]
			);	

				/* single blog background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_single_testi7',
						'label' => esc_html__( ' Blog BG', 'themex' ),
						'types' => [ 'classic', 'gradient'],
						'selector' => '{{WRAPPER}} .witr_ablog_content,{{WRAPPER}} .witr_blog_area8 .witr_sb6_thumb::after',
					]
				);
				/* Single blog shadow  */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_single_tesr7',
						'label' => esc_html__( 'Blog Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_ablog_content,{{WRAPPER}} .witr_blog_area8 .witr_singleBlog',
					]
				);
				
				
			/* witr_alltext_color */
			$this->add_control(
				'witr_alltext_color',
				[
					'label' => esc_html__( 'All Text Color', 'themex' ),
					'type' => Controls_Manager::COLOR,					
					'selectors' => [
						'{{WRAPPER}} .witr_blog_area8 .witr_blog_con6 p,{{WRAPPER}} .witr_blog_area8 .witr_blog_con6 h5 a,{{WRAPPER}} .witr_blog_area8 .witr_blog_con6 h2 a' => 'color: {{VALUE}}',
					],
				]
			);				
			/* witr_alltext_color_hover */
			$this->add_control(
				'witr_alltext_color_hover',
				[
					'label' => esc_html__( 'All Text Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,					
					'selectors' => [
						'{{WRAPPER}} .witr_singleBlog:hover .witr_blog_con6 p,{{WRAPPER}} .witr_singleBlog:hover .witr_blog_con6 h5 a,{{WRAPPER}} .witr_singleBlog:hover .witr_blog_con6 h2 a' => 'color: {{VALUE}}',
					],
				]
			);				
				

			$this->end_controls_section();
			/* === end witr_single_blog ===  */	

		
		/*=== Start Top Category style ====*/
		$this->start_controls_section(
			'witr_style_post_optiont',
			[
				'label' => esc_html__( 'Top Category Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_blog' =>['11','12','13','14','16'],
					'witr_cata_show' =>['yes'],
				],
			]
		);		 
			/*=== start icon_tabs style ====*/
			$this->start_controls_tabs( 'category' );
			
				/*=== start icon_normal style ====*/
				$this->start_controls_tab(
					'witr_icon_colorsc_normal',
					[
						'label' => esc_html__( 'Normal', 'themex' ),
					]
				);		
				
			/* meta text color */
			$this->add_control(
				'witr_mtc_color',
				[
					'label' => esc_html__( ' Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .witr_top_category span ul li a, {{WRAPPER}} .witr_post_Author a,{{WRAPPER}} .witr_post_Author6 > a' => 'color: {{VALUE}}',
					],					
				]
			);
			/* Background  */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_mc_background',
					'label' => esc_html__( ' Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .witr_top_category span ul li a',
				]
			);			
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_mttpy_color',
					'label' => esc_html__( 'Typography', 'themex' ),
					'separator'=>'before',
					'selector' => '{{WRAPPER}} .witr_top_category span ul li a',
				]
			);
			/* margin */
			$this->add_responsive_control(
				'witr_section_m',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_top_category span ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* padding */
			$this->add_responsive_control(
				'witr_secti_m',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_top_category span ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
				$this->end_controls_tab();
				/*=== end icon normal style ====*/
		
				/*=== start icon hover style ====*/
				$this->start_controls_tab(
					'witr_icon_colorsc_hover',
					[
						'label' => esc_html__( 'category Hover', 'themex' ),
					]
				);
					/* hover color */
					$this->add_control(
						'witr_mtc_hover_color',
						[
							'label' => esc_html__( ' Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,					
							'selectors' => [
								'{{WRAPPER}} .witr_top_category span ul li a:hover' => 'color: {{VALUE}}',
							],
						]
					);
					/* Background  */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_mch_background',
							'label' => esc_html__( ' Background', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .witr_top_category span ul li a:hover',
						]
					);					

					$this->end_controls_tab();
					/*=== end icon hover style ====*/					
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/

			
		 $this->end_controls_section();
		/*=== end  witr top Text style ====*/			
			
		
		/*=== Start Witr Icon/Meta Text style ====*/
		$this->start_controls_section(
			'witr_style_post_option',
			[
				'label' => esc_html__( 'Post Meta Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_blog' =>['1','2','5','6','7','9','10','11','12','13','14','15','16'],
				],
			]
		);		 
				/*  witr_icond_select */
				$this->add_control(
					'witr_icond_select',
					[
						'label' => esc_html__( 'Icon Display', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'description' =>"Set your Icon Display Select here",
						'separator' => 'before',					
						'default' => 'default',
						'options' => [
							'default' => esc_html__( 'Default', 'themex' ),
							'none' => esc_html__( 'None', 'themex' ),
							'block' => esc_html__( 'Block', 'themex' ),
							'inline-block' => esc_html__( 'Inline Block', 'themex' ),
						],
						'selectors' => [
							'{{WRAPPER}} .all_blog_color span i' => 'display: {{VALUE}}',
						],						
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
						'separator'=>'before',
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .all_blog_color span i,{{WRAPPER}} .witr_post_Author a i,{{WRAPPER}} .witr_post_Author6 a i' => 'color: {{VALUE}}',
						],
						'condition' => [
							'witr_icond_select' => ['default','block','inline-block'],
						],						
					]
				);
				/* Icon hover color */
				$this->add_control(
					'witr_icon_hover_color',
					[
						'label' => esc_html__( 'Icon Hover Color', 'themex' ),
						'type' => Controls_Manager::COLOR,						
						'selectors' => [
							'{{WRAPPER}} .all_blog_color span i:hover,{{WRAPPER}} .witr_post_Author a i:hover,{{WRAPPER}} .witr_post_Author6 a i:hover' => 'color: {{VALUE}}',
						],
						'condition' => [
							'witr_icond_select' => ['default','block','inline-block'],
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
								'min' => 1,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .all_blog_color span i,{{WRAPPER}} .witr_post_Author a i,{{WRAPPER}} .witr_post_Author6 a i' => 'font-size: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'witr_icond_select' => ['default','block','inline-block'],
						],						
					]
				);	

			/* margin */
			$this->add_responsive_control(
				'witr_post_margin',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_blog_color span i,{{WRAPPER}} .witr_post_Author a i,{{WRAPPER}} .witr_post_Author6 a i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'witr_icond_select' => ['default','block','inline-block'],
					],					
				]
			);				
			
			/* meta text color */
			$this->add_control(
				'witr_mt_color',
				[
					'label' => esc_html__( 'Meta Text Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_SECONDARY,
					],					
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .all_blog_color span, {{WRAPPER}} .all_blog_color span a, {{WRAPPER}} .witr_post_Author a,{{WRAPPER}} .witr_post_Author6 > a' => 'color: {{VALUE}}',
					],					
				]
			);
			/* Background  */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_m_background',
					'label' => esc_html__( ' Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .all_blog_color span, {{WRAPPER}} .all_blog_color span a,{{WRAPPER}} .witr_blog_meta_potion',
				]
			);			
			
			/* meta text color */
			$this->add_control(
				'witr_mthv_color',
				[
					'label' => esc_html__( 'Meta Text Color 2 for style 5,13,14', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',
					'condition' => [
						'witr_style_blog' =>['5','13','14']
					],	
					'selectors' => [
						'{{WRAPPER}} .witr_post_Author.stb5 .nameAuthor' => 'color: {{VALUE}}',
					],
				]
			);
			/* box shadow color */	
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'witr_meta_shadowsbox',
					'label' => esc_html__( 'Box Shadow for style 13', 'themex' ),
					'selector' => '{{WRAPPER}} .witr_blog_meta_potion',
					'condition' => [
						'witr_style_blog' =>['13']
					],					
				]
			);			
			/* hover color */
			$this->add_control(
				'witr_mt_hover_color',
				[
					'label' => esc_html__( 'Meta Text Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,					
					'selectors' => [
						'{{WRAPPER}} .all_blog_color span:hover,{{WRAPPER}} .all_blog_color span a:hover,{{WRAPPER}} .witr_post_Author a:hover,{{WRAPPER}} .witr_post_Author6 a:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_mttpyb_color',
					'label' => esc_html__( 'Typography', 'themex' ),
					'separator'=>'before',
					'selector' => '{{WRAPPER}} .all_blog_color span,{{WRAPPER}} .all_blog_color span a,{{WRAPPER}} .witr_post_Author a,{{WRAPPER}} .witr_post_Author6 a',
				]
			);
			/* margin */
			$this->add_responsive_control(
				'witr_section_mb',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_blog_color span,{{WRAPPER}} .all_blog_color span a,{{WRAPPER}} .witr_blog_meta_potion' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* padding */
			$this->add_responsive_control(
				'witr_secti_mb',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_blog_color span, {{WRAPPER}} .all_blog_color span a,{{WRAPPER}} .witr_blog_meta_potion' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);			
		 $this->end_controls_section();
		/*=== end  witr Icon/Meta Text style ====*/
		
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
						'{{WRAPPER}} .all_blog_color h5 > a,{{WRAPPER}} .all_blog_color h2 a' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .all_blog_color h5 > a:hover,{{WRAPPER}} .all_blog_color h2 a:hover' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .all_blog_color h5 > a,{{WRAPPER}} .all_blog_color h2 a',
				]
			);

			/* Title Background Heading */				
			$this->add_control(
				'witr_Title_bg',
				[
					'label' => esc_html__( 'Title Background', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'condition' => [
						'witr_style_blog' => ['3','4'],
					],
				]
			);
			/* Title Background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_title_back',
					'label' => esc_html__( ' Title Background', 'themex' ),
					'types' => [ 'classic', 'gradient'],
					'condition' => [
						'witr_style_blog' => ['3','4'],
					],					
					'selector' => '{{WRAPPER}} .all_blog_color h2',
				]
			);			
			/* Title Hover Background Heading */				
			$this->add_control(
				'witr_Title_hover_bg',
				[
					'label' => esc_html__( 'Title Hover Background', 'themex' ),
					'condition' => [
						'witr_style_blog' => ['3','4'],
					],					
					'type' => Controls_Manager::HEADING,
				]
			);
			
			/* Title Hover Background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_Title_hover_back',
					'label' => esc_html__( ' Title Hover Background', 'themex' ),
					'types' => [ 'classic', 'gradient'],
					'condition' => [
						'witr_style_blog' => ['3','4'],
					],					
					'selector' => '{{WRAPPER}} .single_blog_adn:hover.all_blog_color h2',
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
						'{{WRAPPER}} .all_blog_color h5 > a,{{WRAPPER}} .all_blog_color h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_blog_color h5 > a,{{WRAPPER}} .all_blog_color h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'condition' => [
					'witr_show_content' => 'yes',
				],				
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
						'{{WRAPPER}} .all_blog_color p' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .all_blog_color p',
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
						'{{WRAPPER}} .all_blog_color p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .all_blog_color p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr content style ====*/


			/*=== start witr_icon style ====*/
			$this->start_controls_section(
				'witr_blog_icon_option',
				[
					'label' => esc_html__( 'Icon Color Option', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_style_blog' => ['3','4'],
					],				
				]
			);
		
			/*=== start icon_tabs style ====*/
			$this->start_controls_tabs( 'icon_colors' );
			
				/*=== start icon_normal style ====*/
				$this->start_controls_tab(
					'witr_icon_color_blog',
					[
						'label' => esc_html__( 'Normal', 'themex' ),
					]
				);
				/* Icon Color */
				$this->add_control(
					'witr_primar_color',
					[
						'label' => esc_html__( 'Icon Color', 'themex' ),
						'type' => Controls_Manager::COLOR,						
						'selectors' => [
							'{{WRAPPER}} .blog_add_icon a' => 'color: {{VALUE}}',
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
							'{{WRAPPER}} .blog_add_icon a' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);
				
				/*  icon width */
				$this->add_responsive_control(
					'witr_icon_width',
					[
						'label' => esc_html__( 'width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .blog_add_icon a' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon height */
				$this->add_responsive_control(
					'witr_icon_height',
					[
						'label' => esc_html__( 'Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .blog_add_icon a' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon line height */
				$this->add_responsive_control(
					'witr_icon_line_height',
					[
						'label' => esc_html__( 'Line Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .blog_add_icon a' => 'line-height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .blog_add_icon a' => 'text-align: {{VALUE}}',
						],
					]
				);
				/* witr_border_style */
				$this->add_control(
					'witr_border_style',
					[
						'label' => esc_html__( 'Border Style', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'default' => 'default',
						'options' => [
							'none' => esc_html__( 'none', 'themex' ),
							'solid' => esc_html__( 'Solid', 'themex' ),
							'double' => esc_html__( 'Double', 'themex' ),
							'dotted' => esc_html__( 'Dotted', 'themex' ),
							'dashed' => esc_html__( 'Dashed', 'themex' ),
							'default' => esc_html__( 'Default', 'themex' ),
						],
						'selectors' => [
							'{{WRAPPER}} .blog_add_icon a' => 'border-style: {{VALUE}}',
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
							'{{WRAPPER}} .blog_add_icon a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						'condition' => [
							'witr_border_style' => ['solid','double','dotted','dashed','default'],
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
							'{{WRAPPER}} .blog_add_icon a' => 'border-color: {{VALUE}}',
						],
						'condition' => [
							'witr_border_style' => ['solid','double','dotted','dashed','default'],
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
							'{{WRAPPER}} .blog_add_icon a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'selector' => '{{WRAPPER}} .blog_add_icon a',
					]
				);									
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .blog_add_icon a',
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
							'{{WRAPPER}} .blog_add_icon a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .blog_add_icon a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .blog_add_icon a:hover' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .blog_add_icon a:hover',
						]
					);
					/* border_hover_color */
					$this->add_control(
						'witr_border_hover_color',
						[
							'label' => esc_html__( 'Icon Border Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							
							'selectors' => [
								'{{WRAPPER}} .sub-i.blog_add_icon a:hover' => 'border-color: {{VALUE}}',
							],
						]
					);
					$this->end_controls_tab();
					/*=== end icon hover style ====*/
					
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/

		$this->end_controls_section();

		/*=== end witr_icon style ====*/		
			
			/*=== start witr button style ====*/

			$this->start_controls_section(
				'witr_style_option_button',
				[
					'label' => esc_html__( 'Button Color Option', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_style_blog' =>['1','2','3','4','5','7','8','9','10','11','12','13','14','15','16'],
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
								'label' => esc_html__( 'Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								'global' => [
									'default' => Global_Colors::COLOR_ACCENT,
								],								
								'selectors' => [
									'{{WRAPPER}} .wblog-content > a,{{WRAPPER}} .learn_btn' => 'color: {{VALUE}}',
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
								'selector' => '{{WRAPPER}} .wblog-content > a,{{WRAPPER}} .learn_btn',
							]
						);	

						/* Button background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_button_background',
								'label' => esc_html__( 'button Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .wblog-content > a,{{WRAPPER}} .learn_btn',
							]
						);
						/* witr_border_style */
						$this->add_control(
							'witr_border_btn_style',
							[
								'label' => esc_html__( 'Border Style', 'themex' ),
								'type' => Controls_Manager::SELECT,
								'default' => 'default',
								'options' => [
									'none' => esc_html__( 'none', 'themex' ),
									'solid' => esc_html__( 'Solid', 'themex' ),
									'double' => esc_html__( 'Double', 'themex' ),
									'dotted' => esc_html__( 'Dotted', 'themex' ),
									'dashed' => esc_html__( 'Dashed', 'themex' ),
									'default' => esc_html__( 'Default', 'themex' ),
								],
								
								'selectors' => [
									'{{WRAPPER}} .wblog-content > a,{{WRAPPER}} .learn_btn' => 'border-style: {{VALUE}}',
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
									'{{WRAPPER}} .wblog-content > a,{{WRAPPER}} .learn_btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .wblog-content > a,{{WRAPPER}} .learn_btn' => 'border-color: {{VALUE}}',
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
									'{{WRAPPER}} .wblog-content > a,{{WRAPPER}} .learn_btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .wblog-content > a,{{WRAPPER}} .learn_btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .wblog-content > a,{{WRAPPER}} .learn_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);					
					
					
				/*  witr_ib_width */
				$this->add_responsive_control(
					'witr_ib_width',
					[
						'label' => esc_html__( 'width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'separator'=>'before',
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .wblog-content > a,{{WRAPPER}} .learn_btn' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  witr_ib_height */
				$this->add_responsive_control(
					'witr_ib_height',
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
							'{{WRAPPER}} .wblog-content > a,{{WRAPPER}} .learn_btn' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  witr_ib_line_height */
				$this->add_responsive_control(
					'witr_ib_line_height',
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
							'{{WRAPPER}} .wblog-content > a,{{WRAPPER}} .learn_btn' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/* witr_text_align */					
				$this->add_responsive_control(
					'witr_textib_align',
					[
						'label' => esc_html__( ' Align', 'themex' ),
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
							'{{WRAPPER}} .wblog-content > a,{{WRAPPER}} .learn_btn' => 'text-align: {{VALUE}}',
						],
					]
				);
				/* witr_boxib_shadow */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_boxib_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .wblog-content > a,{{WRAPPER}} .learn_btn',
					]
				);					
					
					
					
						/* Btn Icon color */
						$this->add_control(
							'witr_button_icon',
							[
								'label' => esc_html__( 'Btn Icon Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',								
								'selectors' => [
									'{{WRAPPER}} .learn_btn i' => 'color: {{VALUE}}',
								],								
							]
						);				
						/*  icon font size */
						$this->add_responsive_control(
							'witr_icon_bti_size',
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
									'{{WRAPPER}} .learn_btn i' => 'font-size: {{SIZE}}{{UNIT}};',
								],								
							]
						);
						/* Icon background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_icon_bti_background',
								'label' => esc_html__( 'Icon Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .learn_btn i',								
							]
						);				
						/*  icon width */
						$this->add_responsive_control(
							'witr_icon_bti_width',
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
									'{{WRAPPER}} .learn_btn i' => 'width: {{SIZE}}{{UNIT}};',
								],								
							]
						);
						/*  icon height */
						$this->add_responsive_control(
							'witr_icon_bti_height',
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
									'{{WRAPPER}} .learn_btn i' => 'height: {{SIZE}}{{UNIT}};',
								],								
							]
						);
						/*  icon line height */
						$this->add_responsive_control(
							'witr_icon_bti_line_height',
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
									'{{WRAPPER}} .learn_btn i' => 'line-height: {{SIZE}}{{UNIT}};',
								],								
							]
						);										
						/* button Icon margin */
						$this->add_responsive_control(
							'witr_btn_icon_margin',
							[
								'label' => esc_html__( 'Btn Icon Margin', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,								
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .learn_btn i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'label' => esc_html__( 'Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,							
								'selectors' => [
									'{{WRAPPER}} .wblog-content > a:hover,{{WRAPPER}} .learn_btn:hover' => 'color: {{VALUE}}',
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
								'selector' => '{{WRAPPER}} .wblog-content > a:hover,{{WRAPPER}} .learn_btn:hover',
							]
						);					
						/* border_hover_color */
						$this->add_control(
							'witr_borderh_btn_color',
							[
								'label' => esc_html__( 'Border Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,								
								'selectors' => [
									'{{WRAPPER}} .wblog-content > a:hover,{{WRAPPER}} .learn_btn:hover' => 'border-color: {{VALUE}}',
								],
							]
						);					
						/* Btn Icon:hover color */
						$this->add_control(
							'witr_button_hover_icon',
							[
								'label' => esc_html__( 'Btn Icon Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',								
								'selectors' => [
									'{{WRAPPER}} .learn_btn i:hover' => 'color: {{VALUE}}',
								],
							]
						);
						/* Icon background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_icon_btih_background',
								'label' => esc_html__( 'Icon Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .learn_btn:hover i',								
							]
						);						
						
						$this->end_controls_tab();
						/*=== end button hover style ====*/
						
				$this->end_controls_tabs();
				/*=== end button_tabs style ====*/			
			 
			 $this->end_controls_section();
			/*=== end  witr button style ====*/				
		
		/*===== start  Images Overlay Style =====*/
		$this->start_controls_section(
			'section_Images_overlay',
			[
				'label' => esc_html__( 'Images Overlay', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,

			]
		);

		
			/* Single Blog Images */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_icono_background',
					'label' => esc_html__( 'Single Images', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .blog-img a::before,{{WRAPPER}} .themex-blog-thumb_adn:before,{{WRAPPER}} .witr_sb_thumb::before,{{WRAPPER}} .witr_sb6_thumb::before',
				]
			);
			/* border_radius */
			$this->add_control(
				'witr_sing_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .blog-img,{{WRAPPER}} .blog-img a::before,{{WRAPPER}} .themex-blog-thumb_adn:before,{{WRAPPER}} .witr_sb_thumb::before,{{WRAPPER}} .witr_sb_thumb img,{{WRAPPER}} .witr_sb6_thumb::before,{{WRAPPER}} .witr_sb6_thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
		
		$this->end_controls_section();
		/*===== end Images Overlay =====*/		
		

			/*=== start witr Arrow style ====*/

			$this->start_controls_section(
				'witr_style_option_arrow',
				[
					'label' => esc_html__( 'Witr Arrow Options', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_c_arrows' => 'true',
						'witr_style_blog' =>['3','7','8','9','10','11','12','13','14','16']
					],					
				]
			);		 

		
				/*=== start Navigation_tabs style ====*/
				$this->start_controls_tabs( 'arrow_colors' );
				
					/*=== start Navigation_normal style ====*/
					$this->start_controls_tab(
						'witr_arrow_colors_normal',
						[
							'label' => esc_html__( 'Arrow', 'themex' ),
						]
					);
						/*  arrow width */
						$this->add_responsive_control(
							'witr_arrow_width',
							[
								'label' => esc_html__( 'width', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 500,
									],
									'%' => [
										'min' => 0,
										'max' => 500,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'width: {{SIZE}}{{UNIT}};',
								],
							]
						);
						/*  arrow height */
						$this->add_responsive_control(
							'witr_arrow_height',
							[
								'label' => esc_html__( 'Height', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 500,
									],
									'%' => [
										'min' => 0,
										'max' => 500,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'height: {{SIZE}}{{UNIT}};',
								],
							]
						);						
						/*  arrow Line height */
						$this->add_responsive_control(
							'witr_arrow_line_height',
							[
								'label' => esc_html__( 'Line Height', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 500,
									],
									'%' => [
										'min' => 0,
										'max' => 500,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'line-height: {{SIZE}}{{UNIT}};',
								],
							]
						);						
						/*  arrow Opacity */
						$this->add_responsive_control(
							'witr_arrow_opacity',
							[
								'label' => esc_html__( 'Arrow Opacity', 'themex' ),
								'type' => Controls_Manager::TEXT,
								'selectors' => [
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'opacity: {{SIZE}}{{UNIT}};',
								],
							]
						);					
						/*  Arrow font size */
						$this->add_responsive_control(
							'witr_arrow_size',
							[
								'label' => esc_html__( 'Arrow Size', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', 'em' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 500,
									],
									'em' => [
										'min' => 0,
										'max' => 500,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-prev:before,{{WRAPPER}} .slick-next:before' => 'font-size: {{SIZE}}{{UNIT}};',
								],
							]
						);					
						/* Arrow color */
						$this->add_control(
							'witr_arrow_color',
							[
								'label' => esc_html__( 'Arrow Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .slick-prev:before,{{WRAPPER}} .slick-next:before ' => 'color: {{VALUE}}',
								],
							]
						);				
	
						/* Arrow background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_arrow_background',
								'label' => esc_html__( 'Arrow Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next',
							]
						);
						/* Arrow Active color */
						$this->add_control(
							'witr__actv_arrow_color',
							[
								'label' => esc_html__( 'Arrow Active Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .slick-disabled.slick-prev:before,{{WRAPPER}} .slick-disabled.slick-next:before ' => 'color: {{VALUE}}',
								],
							]
						);	
						/*  witr_actv */
						$this->add_responsive_control(
							'witr_actv',
							[
								'label' => esc_html__( 'Active Background, Set Color And Click Arrow Button Than Show Active Color.', 'themex' ),
								'type' => Controls_Manager::HEADING,
							]
						);
						/* Arrow active background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_act_arrow_background',
								'label' => esc_html__( 'Arrow Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-prev.slick-disabled,{{WRAPPER}} .slick-next.slick-disabled,{{WRAPPER}} .slick-prev:focus,{{WRAPPER}} .slick-next:focus',
							]
						);		
						/* witr_arrowborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_arrowborder_style',
								'label' => esc_html__( 'Arrow Border', 'themex' ),
								'selector' => '{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next',
							]
						);
						/* border_radius */
						$this->add_control(
							'witr_border_arrow_radius',
							[
								'label' => esc_html__( 'Border Radius', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/* witr_top */
						$this->add_responsive_control(
							'witr_top',
							[
								'label' => esc_html__( 'Top', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 1000,
									],
									'%' => [
										'min' => -500,
										'max' => 1000,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'top: {{SIZE}}{{UNIT}};',
								],
							]
						);
						
						/* witr_left */
						$this->add_responsive_control(
							'witr_left',
							[
								'label' => esc_html__( 'Left', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 1500,
									],
									'%' => [
										'min' => -500,
										'max' => 500,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-prev' => 'left: {{SIZE}}{{UNIT}};',
								],
							]
						);
		
						/* witr_right */
						$this->add_responsive_control(
							'witr_right',
							[
								'label' => esc_html__( 'Right', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 1500,
									],
									'%' => [
										'min' => -500,
										'max' => 500,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .slick-next' => 'right: {{SIZE}}{{UNIT}};',
								],
							]
						);					
					

					$this->end_controls_tab();
					/*=== end Arrow normal style ====*/
				
						/*=== start Arrow hover style ====*/
						$this->start_controls_tab(
							'witr_arrow_colors_hover',
							[
								'label' => esc_html__( 'Arrow Hover', 'themex' ),
							]
						);
						/* Arrow_hover_color */
						$this->add_control(
							'witr_arrow_hover_color',
							[
								'label' => esc_html__( 'Arrow Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								
								'selectors' => [
									'{{WRAPPER}} .slick-prev:hover:before,{{WRAPPER}} .slick-next:hover:before' => 'color: {{VALUE}}',
								],
							]
						);					
							
						/* Arrow Hover background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_arrow_hover_background',
								'label' => esc_html__( 'Arrow Hover Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-prev:hover,{{WRAPPER}} .slick-next:hover',
							]
						);
						/* witr_hoverborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_hoverborder_style1',
								'label' => esc_html__( 'Arrow Hover Border', 'themex' ),
								'selector' => '{{WRAPPER}} .slick-prev:hover,{{WRAPPER}} .slick-next:hover',
							]
						);					
						
						
						$this->end_controls_tab();
						/*=== end Arrow hover style ====*/
						
				$this->end_controls_tabs();
				/*=== end Arrow tabs style ====*/


			 $this->end_controls_section();
			/*=== end  witr Arrow style ====*/
			


			/*=== start witr Dots style ====*/

			$this->start_controls_section(
				'witr_style_option_dots',
				[
					'label' => esc_html__( 'Witr Dots Options', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_c_dots' => 'true',
						'witr_style_blog' =>['3','7','8','9','10','11','12','13','14','16']
					],					
				]
			);
				/*=== start Dots_tabs style ====*/
				$this->start_controls_tabs( 'dots_colors' );

					/*=== start Navigation_normal style ====*/
					$this->start_controls_tab(
						'witr_dots_colors_normal',
						[
							'label' => esc_html__( 'Dots', 'themex' ),
						]
					);

						/*  Dots width */
						$this->add_responsive_control(
							'witr_dots_width',
							[
								'label' => esc_html__( 'width', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'separator'=>'before',
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 200,
									],
									'%' => [
										'min' => 0,
										'max' => 200,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots li button' => 'width: {{SIZE}}{{UNIT}};',
								],
							]
						);
						/*  Dots height */
						$this->add_responsive_control(
							'witr_dots_height',
							[
								'label' => esc_html__( 'Height', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 200,
									],
									'%' => [
										'min' => 0,
										'max' => 200,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots li button' => 'height: {{SIZE}}{{UNIT}};',
								],
							]
						);											
						/* Dots background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_dots_background',
								'label' => esc_html__( 'Dots Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-dots li button',
							]
						);		
						/* witr_dotsborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_dotsborder_style',
								'label' => esc_html__( 'Dots Border', 'themex' ),
								'selector' => '{{WRAPPER}} .slick-dots li button',
							]
						);
						/* border_radius */
						$this->add_control(
							'witr_border_dots_radius',
							[
								'label' => esc_html__( 'Border Radius', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .slick-dots li button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						
						/* Active Dots Background heading */
						$this->add_control(
							'witr_acdots_bg_had',
							[
								'label' => esc_html__( 'Active Dots Background', 'themex' ),
								'type' => Controls_Manager::HEADING,
							]
						);
							
						
						/* Active Dots background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_acdots_background',
								'label' => esc_html__( 'Active Dots Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-dots li.slick-active button ',
							]
						);						
						/* Active Dots height */
						$this->add_responsive_control(
							'witr_dotsac_height',
							[
								'label' => esc_html__( 'Active Height', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 200,
									],
									'%' => [
										'min' => 0,
										'max' => 200,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots li.slick-active button' => 'height: {{SIZE}}{{UNIT}};',
								],
							]
						);						

						/* witr_top */
						$this->add_responsive_control(
							'witr_topt_dots',
							[
								'label' => esc_html__( 'Top', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%', 'em' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 2000,
									],
									'%' => [
										'min' => -500,
										'max' => 2000,
									],
									'em' => [
										'min' => -500,
										'max' => 2000,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots' => 'top: {{SIZE}}{{UNIT}};',
								],
							]
						);
						
						/* witr_left */
						$this->add_responsive_control(
							'witr_leftl_dots',
							[
								'label' => esc_html__( 'Left', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%', 'em' ],
									'range' => [
									'px' => [
										'min' => -500,
										'max' => 2000,
									],
									'%' => [
										'min' => -500,
										'max' => 2000,
									],
									'em' => [
										'min' => -500,
										'max' => 2000,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots' => 'left: {{SIZE}}{{UNIT}};',
								],

							]
						);

						/* witr_right */
						$this->add_responsive_control(
							'witr_rightr_dots',
							[
								'label' => esc_html__( 'Right', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%', 'em' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 2000,
									],
									'%' => [
										'min' => -500,
										'max' => 2000,
									],
									'em' => [
										'min' => -500,
										'max' => 2000,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots' => 'right: {{SIZE}}{{UNIT}};',
								],
							]
						);					
						/* witr_bottom */
						$this->add_responsive_control(
							'witr_bottomb_dots',
							[
								'label' => esc_html__( 'Bottom', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%', 'em' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 2000,
									],
									'%' => [
										'min' => -500,
										'max' => 2000,
									],
									'em' => [
										'min' => -500,
										'max' => 2000,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',
								],					
							]
						);				
				
						
						
						/* dots margin */
						$this->add_responsive_control(
							'witr_dots_margin',
							[
								'label' => esc_html__( 'Margin', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'allowed_dimensions' => 'horizontal',
								'placeholder' => [
									'top' => 'auto',
									'right' => '',
									'bottom' => 'auto',
									'left' => '',
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots li button' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
								],
							]
						);					
					

					$this->end_controls_tab();
					/*=== end Dots normal style ====*/
				
						/*=== start Dots hover style ====*/
						$this->start_controls_tab(
							'witr_dots_colors_hover',
							[
								'label' => esc_html__( 'Dots Hover', 'themex' ),
							]
						);
							
						/* Dots Hover background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_dots_hover_background',
								'label' => esc_html__( 'Dots Hover Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-dots li button:hover',
							]
						);
						/* witr_hoverborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_hoverborder_style',
								'label' => esc_html__( 'Dots Hover Border', 'themex' ),
								'selector' => '{{WRAPPER}} .slick-dots li button:hover',
							]
						);					
						
						
						$this->end_controls_tab();
						/*=== end Dots hover style ====*/
						
				$this->end_controls_tabs();
				/*=== end Dots tabs style ====*/

			 $this->end_controls_section();
			/*=== end  witr Dots style ====*/		
		
		
		
		
		
		
		

    } /* function end */

    protected function render( $instance = [] ) {

        $witrshowdata = $this->get_settings_for_display();
		
		$infinite=$autoplay=$autoplayspeed=$speed=$slidestoShow=$slidestoscroll=$arrows=$dots=$res1=$res2=$res3=$unic_id="";

		if(! empty($witrshowdata['witr_slides_to_show'])){
			$slidestoShow=$witrshowdata['witr_slides_to_show'];
		}
		if(! empty($witrshowdata['witr_c_infinite'])){
			$infinite=$witrshowdata['witr_c_infinite'];
		}
		if(! empty($witrshowdata['witr_c_autoplay'])){
			$autoplay=$witrshowdata['witr_c_autoplay'];
		}
		if(! empty($witrshowdata['witr_c_autoplaySpeed'])){
			$autoplayspeed=$witrshowdata['witr_c_autoplaySpeed'];
		}
		if(! empty($witrshowdata['witr_c_speed'])){
			$speed=$witrshowdata['witr_c_speed'];
		}
		if(! empty($witrshowdata['witr_c_slidestoScroll'])){
			$slidestoscroll=$witrshowdata['witr_c_slidestoScroll'];
		}
		if(! empty($witrshowdata['witr_c_arrows'])){
			$arrows=$witrshowdata['witr_c_arrows'];
		}
		if(! empty($witrshowdata['witr_c_dots'])){
			$dots=$witrshowdata['witr_c_dots'];
		}
		if(! empty($witrshowdata['witr_c_res1'])){
			$res1=$witrshowdata['witr_c_res1'];
		}
		if(! empty($witrshowdata['witr_c_res2'])){
			$res2=$witrshowdata['witr_c_res2'];
		}
		if(! empty($witrshowdata['witr_c_res3'])){
			$res3=$witrshowdata['witr_c_res3'];
		}
		if(! empty($witrshowdata['witr_unicid_c'])){
			$unic_id=$witrshowdata['witr_unicid_c'];
		}		

        $witr_post_per_page       = ! empty( $witrshowdata['witr_post_per_page'] ) ? $witrshowdata['witr_post_per_page'] : 2;
        $witr_adc_blog    = ! empty( $witrshowdata['witr_adc_blog'] ) ? $witrshowdata['witr_adc_blog'] : 'DESC';
        $witr_title_length    = ! empty( $witrshowdata['witr_title_length'] ) ? $witrshowdata['witr_title_length'] : 5;
        $witr_content_length  = ! empty( $witrshowdata['witr_content_length'] ) ? $witrshowdata['witr_content_length'] : 20;      
        $witr_gutter_column  =  $witrshowdata['witr_gutter_column']=='yes'  ? 'witr_all_pd0' : 'witr_all_mb_30'; 
		
		$page = ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );
		$paged = ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : $page );	
	
		
						if($witrshowdata['witr_blog_slug'] =="all"){
                        $args = array(
                            'post_type'            => 'post',
                            'post_status'          => 'publish',
                            'ignore_sticky_posts'  => 1,
                            'posts_per_page'       => $witr_post_per_page,
                            'order'                => $witr_adc_blog,
							'paged'     => $paged,
							'page'      => $paged						
                        );							
						}else{
                        $args = array(
                            'post_type'            => 'post',
                            'post_status'          => 'publish',
                            'ignore_sticky_posts'  => 1,
                            'posts_per_page'       => $witr_post_per_page,
                            'order'                => $witr_adc_blog,
							'paged'     => $paged,
							'page'      => $paged,
							'tax_query' => array(
								array(
									'taxonomy' => 'category',
									'field'    => 'slug',
									'terms'    => !empty($witrshowdata['witr_blog_slug']) ? $witrshowdata['witr_blog_slug'] : '',
								)
							),							
                        );							
						}
                        
                        $posts = new \WP_Query($args);
		switch( $witrshowdata['witr_style_blog']){

		
		
			case '16':
			
				 include 'witr_blog/16.php';
				 include 'witr_blog/witrajs.php';		
			break;		
			case '15':
			include 'witr_blog/15.php';			
			break;
		
			case '14':
				 include 'witr_blog/14.php';
				 include 'witr_blog/witrajs.php';		
			break;			
			
			case '13':
				 include 'witr_blog/13.php';
				 include 'witr_blog/witrajs.php';		
			break;
		
			case '12':
				 include 'witr_blog/12.php';
				 include 'witr_blog/witrajs.php';		
			break;

			case '11':
				 include 'witr_blog/11.php';
				 include 'witr_blog/witrajs.php';		
			break;		
			case '10':
				 include 'witr_blog/10.php';
				 include 'witr_blog/witrajs.php';			
			break;
						
			case '9':
				 include 'witr_blog/9.php';
				 include 'witr_blog/witrajs.php';		
			break;
			
			
			case '8':
				 include 'witr_blog/8.php';
				 include 'witr_blog/witrajs.php';		
			break;			
			
			case '7':
				 include 'witr_blog/7.php';
				 include 'witr_blog/witrajs.php';		
			break;			
			case '6':
			include 'witr_blog/6.php';				
			break;
			
			case '5':
			include 'witr_blog/5.php';				
			break;
			
			
			case '4':
			include 'witr_blog/4.php';			
			break;
			
			case '3':
				 include 'witr_blog/3.php';
				 include 'witr_blog/witrajs.php';
			break;
			
			case '2':
				include 'witr_blog/2.php';			
			break;			
			default:
				include 'witr_blog/1.php';
			break;
			
		} // end switch				
			if( $witrshowdata['witr_pagination'] == 'yes' ){?>
			<!-- START PAGINATION -->
			<div class="row">
				<div class="col-md-12">
					<div class="paginations">
						
						<?php 
						
							 echo paginate_links( array(
								'prev_next' => true,
								'prev_text' => '<i class="icofont-arrow-left"></i>',
								'next_text' => '<i class="icofont-arrow-right"></i>',
								'type' => 'list',
								'current' => $paged,
								'total' => $posts->max_num_pages
							) );										
						
						?>
					</div>
				</div>
			</div>															
		
			
<?php 			
			
			
			}	
			
       
	} 




}