<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Animater_Heading extends Widget_Base {

    public function get_name() {
        return 'witr_animate_text';
    }
    
    public function get_title() {
        return esc_html__( ' Animate Heading', 'themex' );
    }

    public function get_icon() {
        return 'themex_icon eicon-animated-headline';
    }
    public function get_style_depends() {
        return [ 'animateheadingcss' ];
    }	
	public function get_script_depends() {
        return [ 'animateheadingjs' ];
    }		
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {
		
		
			
			
			/* === witr_animate title start === */
			$this->start_controls_section(
				'witr_option_animate_title',
				[
					'label' => esc_html__( ' Animate Heading Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);					
				/* witr_text_align */					
				$this->add_responsive_control(
					'witr_text_align',
					[
						'label' => esc_html__( 'Box Position', 'themex' ),
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
							'{{WRAPPER}} .witr_animate_area' => 'text-align: {{VALUE}}',
						],
						'separator' => 'before',
					]
				);

			
				/* main animate witr_animate_title1 */	
					$this->add_control(
						'witr_animate_title1',
						[
							'label' => esc_html__( 'Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use title top, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Add Title', 'themex' ),
							'placeholder' => esc_attr__( 'Type your animate title here', 'themex' ),						
						]
					);
			/* main animate witr_animate_title2 */	
					$this->add_control(
						'witr_animate_title2',
						[
							'label' => esc_html__( 'Animate Text', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use animate text, remove the text from field, and it will work your preview page. use the this way. ex- <b class="is-visible"> Web Developer</b> <b>I\'m Web Developer</b> <b>I\'m Web Designer</b> <b>Lives in US</b>', 'themex' ),
							'default' => __( '<b class="is-visible"> Web Developer</b> <b>I\'m Web Developer</b> <b>I\'m Web Designer</b> <b>Lives in US</b> ' ),
							'placeholder' => esc_attr__( 'Type your animate text here', 'themex' ),						
						]
					);
			
					
		
			$this->end_controls_section();
			/* === end witr_animate button ===  */
			
					

					
			
			
			
			
			

	   /*===========================================================================================
										START TO STYLE
		=============================================================================================*/			
		

			
		/*=== start witr_title style ====*/

		$this->start_controls_section(
			'witr_style_option',
			[
				'label' => esc_html__( 'Title Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
			/* color */
			$this->add_control(
				'witr_title_mcolor',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_SECONDARY,
					],					
					'selectors' => [
						'{{WRAPPER}} .witr_animate_content h1' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .witr_animate_content h1',
				]
			);						
			
			/* margin */
			$this->add_responsive_control(
				'witr_sectionmargin',
				[
					'label' => esc_html__( 'Tittle Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_animate_content h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* padding */
			$this->add_responsive_control(
				'witr_sectionpadding',
				[
					'label' => esc_html__( 'Tittle Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'separator'=>'before',
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_animate_content h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  w_title style ====*/
		

		/*=== start w_title style 2 ====*/

		$this->start_controls_section(
			'witr_style_option2',
			[
				'label' => esc_html__( 'Animate Text Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
			/* color */
			$this->add_control(
				'witr_titleik_color',
				[
					'label' => esc_html__( 'Text Border Color', 'themex' ),
					'type' => Controls_Manager::COLOR,					
					'selectors' => [
						'{{WRAPPER}} .witr_animate_content h1 span' => '-webkit-text-stroke-color: {{VALUE}}',
					],
				]
			);
			/* color */
			$this->add_control(
				'witr_webkit_color',
				[
					'label' => esc_html__( 'Text Fill Color', 'themex' ),
					'type' => Controls_Manager::COLOR,					
					'selectors' => [
						'{{WRAPPER}} .witr_animate_content h1 span' => '-webkit-text-fill-color: {{VALUE}}',
					],
				]
			);			
			/* color */
			$this->add_control(
				'witr_titlbi_color',
				[
					'label' => esc_html__( 'Border', 'themex' ),
					'type' => Controls_Manager::TEXT,
					'description' => esc_html__( 'Must Be Use Ex-1', 'themex' ),
					'placeholder' => esc_attr__( '1', 'themex' ),					
					'selectors' => [
						'{{WRAPPER}} .witr_animate_content h1 span' => '-webkit-text-stroke-width: {{VALUE}}px',
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
					'selector' => '{{WRAPPER}} .witr_animate_content h1 span, {{WRAPPER}} .witr_animate_content h1 span b',
				]
			);	
			/* Button Forground */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_after_background',
					'label' => esc_html__( 'Bar Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .cd-headline.clip .cd-words-wrapper:after',
				]
			);					
			/* margin */
			$this->add_responsive_control(
				'witr_sectionmargin2',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_animate_content h1 span, {{WRAPPER}} .witr_animate_content h1 span b' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* padding */
			$this->add_responsive_control(
				'witr_sectionpadding2',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_animate_content h1 span, {{WRAPPER}} .witr_animate_content h1 span b' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  Middle/Bottom style  ====*/
		
		



    } /* function end*/

    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();


		?>

		<div class="witr_animate_area witr_animate_height">		
			<div class="witr_animate_content text-<?php if(isset($witrshowdata['witr_animate_title1']) && ! empty($witrshowdata['witr_animate_title1']))?>">
				<h1 class="cd-headline clip is-full-width">
					<?php if(isset($witrshowdata['witr_animate_title1']) && ! empty($witrshowdata['witr_animate_title1'])){?>
						<?php echo $witrshowdata['witr_animate_title1']; ?>
					<?php } ?>	
					<?php if(isset($witrshowdata['witr_animate_title2']) && ! empty($witrshowdata['witr_animate_title2'])){?>
						 <span class="cd-words-wrapper witr_ani_text">
							<?php echo $witrshowdata['witr_animate_title2']; ?>
						</span>		 	
					<?php } ?>	
				</h1>								
			</div> 	
		</div>

     	
		<?php		
	
	
    } /*end function */



}