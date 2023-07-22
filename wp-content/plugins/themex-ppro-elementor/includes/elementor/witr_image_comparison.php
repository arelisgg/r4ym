<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Image_Comparison extends Widget_Base {

    public function get_name() {
        return 'witr_image_comp';
    }
    
    public function get_title() {
        return esc_html__( ' Image Comparison', 'themex' );
    }

    public function get_icon() {
        return 'themex_icon eicon-image-before-after';
    }
	public function get_style_depends() {
        return [ 'wimagecom' ];
    }
	public function get_script_depends() {
        return [ 'beersliderjs' ];
    }	
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'witr_image_comparison_content',
            [
                'label' => esc_html__( 'Image Comparison', 'themex' ),
            ]
        );

            $this->add_control(
                'witr_before_image',
                [
                    'label' => esc_html__( 'Before Image', 'themex' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'witr_before_image_size',
                    'default' => 'large',
                    'separator' => 'none',
                ]
            );

            $this->add_control(
                'witr_after_image',
                [
                    'label' => esc_html__( 'After Image', 'themex' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'witr_after_image_size',
                    'default' => 'large',
                    'separator' => 'none',
                ]
            );
            
			
            $this->add_control(
                'witr_before_title',
                [
                    'label' => esc_html__( 'Before Title', 'themex' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder'=>esc_html__('Before','themex'),
                ]
            );

            $this->add_control(
                'witr_after_title',
                [
                    'label' => esc_html__( 'After Title', 'themex' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder'=>esc_html__('After','themex'),
                ]
            );

            $this->add_control(
                'witr_start_amount',
                [
                    'label' => esc_html__( 'Before Start Amount', 'themex' ),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 50,
                ]
            );

            $this->add_control(
                'witr_imagecomparison_laben_pos',
                [
                    'label' => esc_html__( 'Label Position', 'themex' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'top',
                    'options' => [
                        'top'      => esc_html__( 'Top', 'themex' ),
                        'center'   => esc_html__( 'Center', 'themex' ),
                        'bottom'   => esc_html__( 'Bottom', 'themex' ),
                    ],
                ]
            );
			/* witr_unicid_c */	
			$this->add_control(
				'witr_unicid_c',
				[
					'label' => esc_html__( 'Use Uniqe ID', 'themex' ),
					'type' => Controls_Manager::TEXTAREA,
					'description' => esc_html__( 'Please use a unic ID here, ex- witr_1. Not use 0', 'themex' ),
					'default' => 'witrbr_1',
					'placeholder' => esc_attr__( 'Type your ID here', 'themex' ),						
				]
			);				
			
			
			
        $this->end_controls_section();


        // Style before tab section
        $this->start_controls_section(
            'witr_before_label_style_section',
            [
                'label' => esc_html__( 'Before Title', 'themex' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'before_title!'=>'',
                ],
            ]
        );

            $this->add_control(
                'witr_before_title_color',
                [
                    'label'     => esc_html__( 'Color', 'themex' ),
                    'type'      => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_PRIMARY,
					],					
                    'selectors' => [
                        '{{WRAPPER}} .beer-slider[data-beer-label]::after' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'witr_before_title_typography',
                    'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
					],
                    'selector' => '{{WRAPPER}} .beer-slider[data-beer-label]::after',
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'witr_before_title_border',
                    'label' => esc_html__( 'Border', 'themex' ),
                    'selector' => '{{WRAPPER}} .beer-slider[data-beer-label]::after',
                ]
            );

            $this->add_responsive_control(
                'witr_before_title_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'themex' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .beer-slider[data-beer-label]::after' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                    'separator' => 'after',
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'before_background',
                    'label' => esc_html__( 'Background', 'themex' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .beer-slider[data-beer-label]::after',
                ]
            );

            $this->add_responsive_control(
                'witr_before_title_padding',
                [
                    'label' => esc_html__( 'Padding', 'themex' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .beer-slider[data-beer-label]::after' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            
        $this->end_controls_section();

        // Style after tab section
        $this->start_controls_section(
            'witr_after_label_style_section',
            [
                'label' => esc_html__( 'After Title', 'themex' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'after_title!'=>'',
                ],
            ]
        );

            $this->add_control(
                'witr_after_title_color',
                [
                    'label'     => esc_html__( 'Color', 'themex' ),
                    'type'      => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_PRIMARY,
					],					
                    'selectors' => [
                        '{{WRAPPER}} .beer-reveal[data-beer-label]::after' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'witr_after_title_typography',
                    'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
					],
                    'selector' => '{{WRAPPER}} .beer-reveal[data-beer-label]::after',
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'witr_after_title_border',
                    'label' => esc_html__( 'Border', 'themex' ),
                    'selector' => '{{WRAPPER}} .beer-reveal[data-beer-label]::after',
                ]
            );

            $this->add_responsive_control(
                'witr_after_title_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'themex' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .beer-reveal[data-beer-label]::after' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                    'separator' => 'after',
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'witr_after_background',
                    'label' => esc_html__( 'Background', 'themex' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .beer-reveal[data-beer-label]::after',
                ]
            );

            $this->add_responsive_control(
                'witr_after_title_padding',
                [
                    'label' => esc_html__( 'Padding', 'themex' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .beer-reveal[data-beer-label]::after' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            
        $this->end_controls_section();


        // Style handler tab section
        $this->start_controls_section(
            'witr_handler_style_section',
            [
                'label' => esc_html__( 'Handler', 'themex' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'witr_handler_color',
                [
                    'label'     => esc_html__( 'Color', 'themex' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .beer-handle' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'witr_handler_border',
                    'label' => esc_html__( 'Border', 'themex' ),
                    'selector' => '{{WRAPPER}} .beer-handle',
                ]
            );

            $this->add_responsive_control(
                'witr_handler_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'themex' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .beer-handle' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                    'separator' => 'after',
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'witr_handler_background',
                    'label' => esc_html__( 'Background', 'themex' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .beer-handle',
                ]
            );

            $this->add_control(
                'witr_handler_width',
                [
                    'label' => esc_html__( 'Width', 'themex' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 47,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .beer-handle' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'witr_handler_height',
                [
                    'label' => esc_html__( 'Height', 'themex' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 47,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .beer-handle' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();


        // Style Image After tab section
        $this->start_controls_section(
            'witr_image_after_style_section',
            [
                'label' => esc_html__( 'Image After', 'themex' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		
		
            $this->add_control(
                'afhandler_color',
                [
                    'label'     => esc_html__( 'Color', 'themex' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .beer-reveal[data-beer-label]:after, {{WRAPPER}} .beer-slider[data-beer-label]:after' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );		
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'witr_image_after_background',
                    'label' => esc_html__( 'Background', 'themex' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .beer-reveal[data-beer-label]:after, {{WRAPPER}} .beer-slider[data-beer-label]:after',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'witr_image_after_border',
                    'label' => esc_html__( 'Border', 'themex' ),
                    'selector' => '{{WRAPPER}} .beer-reveal',
                ]
            );

        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {
        $witrshowdata  = $this->get_settings_for_display();
		$witr_start_total=$unic_id="";
        $this->add_render_attribute( 'witr_image_comparison', 'class', 'witr-img-pos witr-label-pos-'.$witrshowdata['witr_imagecomparison_laben_pos'] );

        // Before Image Attribute
        $this->add_render_attribute( 'witr_before_attr', 'class', 'beer-slider' );
        $this->add_render_attribute( 'witr_before_attr', 'id', 'beer_'.$witrshowdata['witr_unicid_c'] );
        $this->add_render_attribute( 'witr_before_attr', 'data-start', $witrshowdata['witr_start_amount'] );
        if( !empty( $witrshowdata['witr_before_title'] ) ){
            $this->add_render_attribute( 'witr_before_attr', 'data-beer-label', $witrshowdata['witr_before_title'] );
        }

        // After Image Attribute
        $this->add_render_attribute( 'witr_after_attr', 'class', 'beer-reveal' );
        if( !empty( $witrshowdata['witr_after_title'] ) ){
            $this->add_render_attribute( 'witr_after_attr', 'data-beer-label', $witrshowdata['witr_after_title'] );
        }
		
		if(! empty($witrshowdata['witr_start_amount'])){
			$witr_start_total=$witrshowdata['witr_start_amount'];
		}
		if(! empty($witrshowdata['witr_unicid_c'])){
			$unic_id=$witrshowdata['witr_unicid_c'];
		}
        ?>
           
			<div <?php echo $this->get_render_attribute_string( 'witr_image_comparison' ); ?> >

                <div <?php echo $this->get_render_attribute_string( 'witr_before_attr' ); ?> >
                    <?php
                        echo Group_Control_Image_Size::get_attachment_image_html( $witrshowdata, 'witr_before_image_size', 'witr_before_image' );
                    ?>
                    <div <?php echo $this->get_render_attribute_string( 'witr_after_attr' ); ?> >
                        <?php
                            echo Group_Control_Image_Size::get_attachment_image_html( $witrshowdata, 'witr_after_image_size', 'witr_after_image' );
                        ?>
                    </div>
                </div>

            </div>
			
		<script type='text/javascript'>
			jQuery(function($){
					new BeerSlider( document.getElementById( "beer_<?php echo $unic_id;?>" ), { start: <?php echo $witr_start_total;?> } );	
			});
		</script>	
        <?php

    }

}