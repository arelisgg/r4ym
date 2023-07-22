<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Swiper_Slider extends Widget_Base {

    public function get_name() {
        return 'witr_swiper_slider';
    }
    
    public function get_title() {
        return esc_html__( ' Swiper Slider', 'themex' );
    }
	public function get_style_depends() {
        return [ 'wsswifer','wbtn' ];
    }
    public function get_icon() {
        return 'themex_icon eicon-image';
    }
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {

			/* === witr_swiper title start === */
			$this->start_controls_section(
				'witr_option_swiper_title',
				[
					'label' => esc_html__( ' Swiper Slider Item', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
			
			$this->add_control(
				'witr_style_swiper',
				[
					'label' => esc_html__( 'Swiper style', 'themex' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'1' => esc_html__( 'Swiper cube style', 'themex' ),
						'2' => esc_html__( 'Swiper Fade,Flip Style', 'themex' ),
						'3' => esc_html__( 'Swiper Coverflow Style', 'themex' ),
						'4' => esc_html__( 'Swiper Thumbs Gallery Style', 'themex' ),
					],
					'default' => '2',
				]
			);
			/* Box Position */				
			$this->add_control(
				'witr_text_ltc',
				[
					'label' => esc_html__( 'Text Position', 'themex' ),
					'type' => Controls_Manager::CHOOSE,
					'default' => 'left',
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
			/*  Top content width */
			$this->add_responsive_control(
				'witr_content_width',
				[
					'label' => esc_html__( 'Container width', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'description' => esc_html__( 'When Container Full-Width Then Work to, Or When Container Boxed Field Value Blank To.default Width 63%', 'themex' ),
					'default' => [
						'unit' => '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],					
					'size_units' => ['%','px'],
					'range' => [
						'%' => [
							'min' => 0,
							'max' => 100,
						],
						'px' => [
							'min' => 0,
							'max' => 1920,
						],	
					],
					'selectors' => [
						'{{WRAPPER}} .witr_sw_text_area' => 'width: {{SIZE}}{{UNIT}};',
					],
					
				]
			);			
			
				/*  Slider Heigh */
				$this->add_responsive_control(
					'witr_slider_height',
					[
						'label' => esc_html__( 'Slider Heigh', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'description' => esc_html__( 'Default Slider Height 900px', 'themex' ),
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 100,
								'max' => 2000,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_swiper_height' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);

				/* Slider Opacity HEADING */
				$this->add_control(
					'witr_opaci_color',
					[
						'label' => esc_html__( 'Slider Opacity Color', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator'=>'before',
					]
				);				
				/* Slider Opacity background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_sopacity_background',
						'label' => esc_html__( 'Slider Opacity BG', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_swiper_height::before,{{WRAPPER}} .wittr_gallery_swiper::before',
					]
				);

			
			/* swiper slider style check  witr_style_swiper */
				

				$repeater = new Repeater();
				/* witr_show_image witr_feature_image */
					$repeater->add_control(
						'witr_show_topimage',
						[
							'label' => esc_html__( 'Show Top Image', 'themex' ),
							'type' => Controls_Manager::SWITCHER,
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'return_value' => 'yes',
							'default' => 'no',
							'separator'=>'before',							
						]
					);									
					$repeater->add_control(
						'witr_swpt_image',
						[
							'label' => esc_html__( 'Choose Image', 'themex' ),
							'type' => Controls_Manager::MEDIA,
							'condition' => [
								'witr_show_topimage' => 'yes',
							],							
						]
					);				
					/* txbd_top_image_size */
					$repeater->add_group_control(
						Group_Control_Image_Size::get_type(),
						[
							'name' => 'txbd_top_image_size',
							'default' => 'large',
							'separator' => 'none',
						]
					);					
					$repeater->add_control(
						'witr_bg_image',
						[
							'label' => esc_html__( 'Choose BG Image', 'themex' ),
							'type' => Controls_Manager::MEDIA,
							'separator'=>'before',							
							'default' => [
								'url' => Utils::get_placeholder_image_src(),
							],
						]
					);
					/* witr_phead_ */
					$repeater->add_control(
						'witr_phead_',
						[
							'label' => esc_html__( 'Use slider BG image and set size ', 'themex' ),
							'type' => Controls_Manager::HEADING,
							'separator' => 'before',
						]
					);

					/* witr_posimg_style */
					$repeater->add_responsive_control(
						'witr_posimg_style',
						[
							'label' => esc_html__( 'Position', 'themex' ),
							'type' => Controls_Manager::SELECT,
							'options' => [
								'' => esc_html__( 'Default', 'themex' ),
								'center center' => esc_html__( 'Center Center', 'themex' ),
								'center left' => esc_html__( 'Center Left', 'themex' ),
								'center right' => esc_html__( 'Center Right', 'themex' ),
								'top center' => esc_html__( 'Top Center', 'themex' ),
								'top left' => esc_html__( 'Top Left', 'themex' ),
								'top right' => esc_html__( 'Top Right', 'themex' ),
								'bottom center' => esc_html__( 'Bottom Center', 'themex' ),
								'bottom left' => esc_html__( 'Bottom Left', 'themex' ),
								'bottom right' => esc_html__( 'Bottom Right', 'themex' ),
							],							
							'selectors' => [
								'{{WRAPPER}} .witr_swiper_height' => 'background-position: {{VALUE}};',
							],							
						]
					);
					/* witr_attachment_style */
					$repeater->add_control(
						'witr_attachment_style',
						[
							'label' => esc_html__( 'Attachment', 'themex' ),
							'type' => Controls_Manager::SELECT,
							'options' => [
								'' => esc_html__( 'Default', 'themex' ),
								'scroll' => esc_html__( 'Scroll', 'themex' ),
								'fixed' => esc_html__( 'Fixed', 'themex' ),
							],
							'selectors' => [
								'{{WRAPPER}} .witr_swiper_height' => 'background-attachment: {{VALUE}};',
							],							
						]
					);
					/* witr_repeat_style */
					$repeater->add_responsive_control(
						'witr_repeat_style',
						[
							'label' => esc_html__( 'Repeat', 'themex' ),
							'type' => Controls_Manager::SELECT,
							'options' => [
								'' => esc_html__( 'Default', 'themex' ),
								'no-repeat' => esc_html__( 'no-Repeat', 'themex' ),
								'repeat' => esc_html__( 'Repeat', 'themex' ),
								'repeat-x' => esc_html__( 'Repeat-x', 'themex' ),
								'repeat-y' => esc_html__( 'Repeat-y', 'themex' ),
							],
							'selectors' => [
								'{{WRAPPER}} .witr_swiper_height' => 'background-repeat: {{VALUE}};',
							],							
						]
					);

					/* witr_size_style */
					$repeater->add_responsive_control(
						'witr_size_style',
						[
							'label' => esc_html__( 'Size', 'themex' ),
							'type' => Controls_Manager::SELECT,
							'options' => [
								'' => esc_html__( 'Default', 'themex' ),
								'auto' => esc_html__( 'Auto', 'themex' ),
								'cover' => esc_html__( 'Cover', 'themex' ),
								'contain' => esc_html__( 'Contain', 'themex' ),
							],
							'selectors' => [
								'{{WRAPPER}} .witr_swiper_height' => 'background-size: {{VALUE}};',
							],							
						]
					);					
				/* main swiper witr_swiper_title1 */	
					$repeater->add_control(
						'witr_swiper_title1',
						[
							'label' => esc_html__( 'Title Top', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'separator' => 'before',
							'description' => esc_html__( 'Not use title top, remove the text from field,highlight text use ex-<span>text</span>', 'themex' ),
							'default' => esc_html__( 'Add Your Top Title Here', 'themex' ),
							'placeholder' => esc_attr__( 'Type your swiper title here', 'themex' ),						
						]
					);				
				/* main swiper witr_swiper_title2 */	
					$repeater->add_control(
						'witr_swiper_title2',
						[
							'label' => esc_html__( 'Title Middle', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'separator' => 'before',
							'description' => esc_html__( 'Not use title middle, remove the text from field,highlight text use ex-<span>text</span>', 'themex' ),
							'default' => esc_html__( 'Add Your Middle Title Here', 'themex' ),
							'placeholder' => esc_attr__( 'Type your swiper title here', 'themex' ),						
						]
					);					
					/* witr_swiper_title3 */	
					$repeater->add_control(
						'witr_swiper_title3',
						[
							'label' => esc_html__( 'Title Bottom', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'separator' => 'before',
							'description' => esc_html__( 'Not use title bottom, remove the text from field,highlight text use ex-<span>text</span>', 'themex' ),
							'default' =>"",
							'placeholder' => esc_attr__( 'Type your swiper title here', 'themex' ),						
						]
					);
					/* witr_title_inner	*/
					$repeater->add_control(
						'witr_title_inner',
						[
							'label' => esc_html__( ' Inner Title ', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__( '', 'themex' ),
							'separator' => 'before',
							'description' => esc_html__( 'Not use title, remove the text from field,highlight text use ex-<span>text</span>', 'themex' ),
							'placeholder' => esc_attr__( 'Type your bottom title here', 'themex' ),
						]
					);					
					/* witr_pragraph */	
					$repeater->add_control(
						'witr_pragraph',
						[
							'label' => esc_html__( 'Slider Content Text', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'separator' => 'before',
							'description' => esc_html__( 'Not use content text, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.', 'themex' ),
							'placeholder' => esc_attr__( 'Type your content here', 'themex' ),
						]
					);

				/* witr_show_button witr_swiper_button	*/
				$repeater->add_control(
					'witr_show_button',
					[
						'label' => esc_html__( 'Default Show button', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'separator' => 'before',
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'yes',
					]
				);				
					$repeater->add_control(
						'witr_swiper_button',
						[
							'label' => esc_html__( 'Button text', 'themex' ),
							'label_block' =>true,
							'type' => Controls_Manager::TEXT,							
							'default' => esc_html__( 'Contact Us', 'themex' ),
							'placeholder' => esc_attr__( 'Type your button text here', 'themex' ),
							'condition' => [
								'witr_show_button' => 'yes',
							],							
						]
					);
				/* main swiper witr_button_link */	
					$repeater->add_control(
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
				/* witr_show_button witr_vshow_button witr_video_button	*/
				$repeater->add_control(
					'witr_vshow_button',
					[
						'label' => esc_html__( 'Show Video button', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'separator' => 'before',
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'no',														
					]
				);				
					$repeater->add_control(
						'witr_video_button',
						[
							'label' => esc_html__( 'Video Button Text', 'themex' ),
							'label_block' =>true,
							'type' => Controls_Manager::TEXT,
							'description' =>esc_html__('Insert button text And Icon Use <i class="icofont-ui-play"></i> Text Before,After. It hidden when field blank.','themex'),
							'default' => esc_html__( 'Watch Video', 'themex' ),
							'placeholder' => esc_attr__( 'Type your button text here', 'themex' ),
							'condition' => [
								'witr_vshow_button' => 'yes',
							],							
						]
					);
					$repeater->add_control(
						'witr_yvideo_linkhas',
						[
							'label' => esc_html__( 'Video Button Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert button link. It hidden when field blank','themex'),
							'placeholder' => esc_attr__( '# Insert Your Link', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => '',
							],	
							'condition' => [
								'witr_vshow_button' => 'yes',

							],							
						]
					);						
				/* witr_show_button witr_yshow_button witr_yvideo_link	*/
				$repeater->add_control(
					'witr_yshow_button',
					[
						'label' => esc_html__( 'Show Youtube Link', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'no',
						'condition' => [
							'witr_vshow_button' => 'yes',
						]						
					]
				);						
					$repeater->add_control(
						'witr_yvideo_link',
						[
							'label' => esc_html__( 'Youtube Video Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert button link. It hidden when field blank. link ex- https://youtu.be/BS4TUd7FJSg','themex'),
							'placeholder' => esc_attr__( 'https://youtu.be/BS4TUd7FJSg', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => 'https://youtu.be/BS4TUd7FJSg',
							],	
							'condition' => [
								'witr_yshow_button' => 'yes',

							],							
						]
					);						
					/* main swiper witr_vmshow_button witr_vmvideo_link */	
					$repeater->add_control(
						'witr_vmshow_button',
						[
							'label' => esc_html__( 'Show Vimo Link', 'themex' ),
							'type' => Controls_Manager::SWITCHER,
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'return_value' => 'yes',
							'default' => 'no',
							'condition' => [
								'witr_vshow_button' => 'yes',
							]						
						]
					);						
					$repeater->add_control(
						'witr_vmvideo_link',
						[
							'label' => esc_html__( 'Vimo Video Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert button link. It hidden when field blank. link ex- https://vimeo.com/235215203','themex'),
							'placeholder' => esc_attr__( 'https://vimeo.com/235215203', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => 'https://vimeo.com/235215203',
							],	
							'condition' => [
								'witr_vmshow_button' => 'yes',
							],							
						]
					);
					
				/*====== Show Button Circle Video ====*/
				$repeater->add_control(
					'witr_vshow_bvi',
					[
						'label' => esc_html__( ' Show Button Circle Video', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'separator' => 'before',
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'no',														
					]
				);				
					$repeater->add_control(
						'witr_text_bvi',
						[
							'label' => esc_html__( 'Video Text', 'themex' ),
							'label_block' =>true,
							'type' => Controls_Manager::TEXT,
							'separator' => 'before',
							'description' =>esc_html__('Insert Video text. It hidden when field blank.','themex'),
							'default' => esc_html__( 'Play Video', 'themex' ),
							'placeholder' => esc_attr__( 'Type your Video text here', 'themex' ),
							'condition' => [
								'witr_vshow_bvi' => 'yes',
							],							
						]
					);
				/*  witr_yshow_bvi witr_yvideo_link_bvi	*/
				$repeater->add_control(
					'witr_yshow_bvi',
					[
						'label' => esc_html__( 'Show Youtube Link', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'separator' => 'before',
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'no',
						'condition' => [
							'witr_vshow_bvi' => 'yes',
						]						
					]
				);						
					$repeater->add_control(
						'witr_yvideo_link_bvi',
						[
							'label' => esc_html__( 'Youtube Video Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert button link. It hidden when field blank. link ex- https://youtu.be/BS4TUd7FJSg','themex'),
							'placeholder' => esc_attr__( 'https://youtu.be/BS4TUd7FJSg', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => 'https://youtu.be/BS4TUd7FJSg',
							],	
							'condition' => [
								'witr_yshow_bvi' => 'yes',

							],							
						]
					);						
					/*  witr_vmshow_bvi witr_vmvideo_link_bvi */	
					$repeater->add_control(
						'witr_vmshow_bvi',
						[
							'label' => esc_html__( 'Show Vimo Link', 'themex' ),
							'type' => Controls_Manager::SWITCHER,
							'separator' => 'before',
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'return_value' => 'yes',
							'default' => 'no',
							'condition' => [
								'witr_vshow_bvi' => 'yes',
							]						
						]
					);						
					$repeater->add_control(
						'witr_vmvideo_link_bvi',
						[
							'label' => esc_html__( 'Vimo Video Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert button link. It hidden when field blank. link ex- https://vimeo.com/235215203','themex'),
							'placeholder' => esc_attr__( 'https://vimeo.com/235215203', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => 'https://vimeo.com/235215203',
							],	
							'condition' => [
								'witr_vmshow_bvi' => 'yes',
							],							
						]
					);					
					
					/* image */
					$repeater->add_control(
						'witr_sitem_image',
						[
							'label' => __( 'Choose single Image', 'themex' ),
							'type' => Controls_Manager::MEDIA,
							'separator' => 'before',
							'description' =>esc_html__('When Set text-align center then single Image delete now.','themex'),
						]
					);
					/* txbd_image_size */
					$repeater->add_group_control(
						Group_Control_Image_Size::get_type(),
						[
							'name' => 'txbd_image_size',
							'default' => 'large',
							'separator' => 'none',
						]
					);
				/* witr_show_button witr_vshow_button witr_video_button	*/
				$repeater->add_control(
					'witr_vshow_buttoni',
					[
						'label' => esc_html__( 'Show Video Left,Right,Center', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'separator'=>'before',
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'no',
						'description' =>esc_html__('Use Youtube or Vimeo video link','themex'),						
					]
				);				
				
					$repeater->add_control(
						'witr_yvideo_linki',
						[
							'label' => esc_html__( 'Youtube Video Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert button link. It hidden when field blank. link ex- https://youtu.be/BS4TUd7FJSg','themex'),
							'placeholder' => esc_attr__( 'https://youtu.be/BS4TUd7FJSg', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => 'https://youtu.be/BS4TUd7FJSg',
							],	
							'condition' => [
								'witr_vshow_buttoni' => 'yes',
							],							
						]
					);										
					$repeater->add_control(
						'witr_vmvideo_linki',
						[
							'label' => esc_html__( 'Vimeo Video Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert button link. It hidden when field blank. link ex- https://vimeo.com/235215203','themex'),
							'placeholder' => esc_attr__( 'https://vimeo.com/235215203', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => '',
							],	
							'condition' => [
								'witr_vshow_buttoni' => 'yes',
							],							
						]
					);

					
					$this->add_control(
						'wittr_slist',
						[
							'label' => esc_html__( 'SLIDER ITEM LIST', 'themex' ),
							'type' => Controls_Manager::REPEATER,
							'fields' => $repeater->get_controls(),
							'separator'=>'before',
							'default' => [
								[
									'witr_swiper_title1' => esc_html__( 'Add Your Top Title Here', 'themex' ),
									'witr_swiper_title2' => esc_html__( 'Add Your Middle Title Here', 'themex' ),
									'witr_pragraph' => esc_html__( 'Item content. Click the edit button to change this text.', 'themex' ),
								],
								[
									'witr_swiper_title1' => esc_html__( 'Add Your Top Title Here', 'themex' ),
									'witr_swiper_title2' => esc_html__( 'Add Your Middle Title Here', 'themex' ),
									'witr_pragraph' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore', 'themex' ),
								],
							],
							'title_field' => '{{{ witr_swiper_title1 }}}',
						]
					);					
				
				

				
				
				

			$this->end_controls_section();
			/* === end w_swiper title === */

			/* === witr_Carousel start === */
			$this->start_controls_section(
				'witr_field_display_image',
				[
					'label' => esc_html__( 'Swiper Additional Option', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
			
				/* witr_effect */
				$this->add_control(
					'witr_effect',
					[
						'label' => esc_html__( 'Effect', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'defult',
						'options' => [
							'defult' => esc_html__( 'Defult', 'themex' ),
							'fade' => esc_html__( 'Fade', 'themex' ),
							'flip' => esc_html__( 'Flip', 'themex' ),
						],
						'condition' => [
							'witr_style_swiper' =>['2'],
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
						'default' => 1,
						'condition' => [
							'witr_effect' => ['defult'],
							'witr_style_swiper' =>['2'],
						],						
					]
				);				
				/* witr_spacebetween */ 		
				$this->add_control(
					'witr_spacebetween',
					[
						'label' => esc_html__( 'Space Between', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'default' => 30,
						'condition' => [
							'witr_effect' => ['defult'],
							'witr_style_swiper' =>['2'],
						],						
					]
				);
				/* witr_slides_to_show */ 		
				$this->add_control(
					'witr_slides_to_show2',
					[
						'label' => esc_html__( 'Slides to Show', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1,
						'max' => 100,
						'step' => 1,
						'default' => 3,
						'condition' => [
							'witr_style_swiper' =>['3','4'],
						],						
					]
				);				
				/* witr_spacebetween */ 		
				$this->add_control(
					'witr_spacebetween2',
					[
						'label' => esc_html__( 'Space Between', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'default' => 20,
						'condition' => [
							'witr_style_swiper' =>['3','4'],
						],						
					]
				);
				/* witr_depth */ 		
				$this->add_control(
					'witr_depth',
					[
						'label' => esc_html__( 'Depth', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'default' => 100,
						'condition' => [
							'witr_style_swiper' =>['3'],
						],						
					]
				);
				/* witr_stretch */ 		
				$this->add_control(
					'witr_stretch',
					[
						'label' => esc_html__( 'Stretch', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'default' => 1,
						'px' => [
							'min' => 1,
							
						],
						'condition' => [
							'witr_style_swiper' =>['3'],
						],						
					]
				);
				
				/*  witr_delay */			
				$this->add_control(
					'witr_delay',
					[
						'label' => esc_html__( 'autoplaySpeed OR delay', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'description' => esc_html__( 'Type your autoplaySpeed Number here, ex-1000ms=1s.', 'themex' ),
						'default' => 8000,
					]
				);
				/*  witr_c_speed */			
				$this->add_control(
					'witr_c_speed',
					[
						'label' => esc_html__( 'Speed', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'description' => esc_html__( 'Type your Speed Number here, ex-1000ms=1s.', 'themex' ),
						'default' => 2000,
					]
				);
				/* witr_loop */
				$this->add_control(
					'witr_loop',
					[
						'label' => esc_html__( 'Loop', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'description' => esc_html__( 'When set any video, select false.', 'themex' ),
						'default' => 'false',
						'options' => [
							'true' => esc_html__( 'True', 'themex' ),
							'false' => esc_html__( 'False', 'themex' ),
						],
					]
				);
				/* witr_dir */
				$this->add_control(
					'witr_dir',
					[
						'label' => esc_html__( 'direction', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'ltr',
						'options' => [
							'ltr' => esc_html__( 'Left', 'themex' ),
							'rtl' => esc_html__( 'Right', 'themex' ),
						],
					]
				);
				
				/* witr_grabcursor */
				$this->add_control(
					'witr_grabcursor',
					[
						'label' => esc_html__( 'Grab Cursor', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'false',
						'options' => [
							'true' => esc_html__( 'True', 'themex' ),
							'false' => esc_html__( 'False', 'themex' ),
						],
					]
				);
				/* witr_direction */
				$this->add_control(
					'witr_direction',
					[
						'label' => esc_html__( 'Direction', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'horizontal',
						'options' => [
							'horizontal' => esc_html__( 'Horizontal', 'themex' ),
							// 'vertical' => esc_html__( 'Vertical', 'themex' ),
						],
					]
				);
				/* witr_freemode */
				$this->add_control(
					'witr_freemode',
					[
						'label' => esc_html__( 'Free Mode', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'false',
						'options' => [
							'true' => esc_html__( 'True', 'themex' ),
							'false' => esc_html__( 'False', 'themex' ),
						],
					]
				);					
				/* witr_mousewheel */
				$this->add_control(
					'witr_mousewheel',
					[
						'label' => esc_html__( 'Mouse Wheel', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'false',
						'options' => [
							'true' => esc_html__( 'True', 'themex' ),
							'false' => esc_html__( 'False', 'themex' ),
						],
					]
				);					
				/* witr_keyboard */
				$this->add_control(
					'witr_keyboard',
					[
						'label' => esc_html__( 'Keyboard', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'false',
						'options' => [
							'true' => esc_html__( 'True', 'themex' ),
							'false' => esc_html__( 'False', 'themex' ),
						],
					]
				);					
				/* witr_progressbar */
				$this->add_control(
					'witr_progressbar',
					[
						'label' => esc_html__( 'Progress Bar and Dots', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'false',
						'options' => [
							'type' => esc_html__( 'Progress Bar', 'themex' ),
							'false' => esc_html__( 'Dots', 'themex' ),
						],
					]
				);
				/* Button background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_bar_background',
						'label' => esc_html__( 'button Background', 'themex' ),
						'separator' => 'before',
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_swiper_area .swiper-pagination-progressbar .swiper-pagination-progressbar-fill',
						'condition' => [
							'witr_progressbar' =>['type'],
						],						
					]
				);				
				/*  box height */
				$this->add_responsive_control(
					'witr_bar_height',
					[
						'label' => esc_html__( 'Bar Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 1000,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_swiper_area .swiper-pagination-progressbar .swiper-pagination-progressbar-fill,{{WRAPPER}} .witr_swiper_area .swiper-container-horizontal>.swiper-pagination-progressbar' => 'height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'witr_progressbar' =>['type'],
						],							
					]
				);
				/*  witr_dot_heding */
				$this->add_responsive_control(
					'witr_dot_heding',
					[
						'label' => esc_html__( 'Look at the style options for dot color.', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator'=>'before',
						'condition' => [
							'witr_progressbar' =>['false'],
						],							
					]
				);				
				
				/* witr_scrollbar */
				$this->add_control(
					'witr_scrollbar',
					[
						'label' => esc_html__( 'Scroll Bar', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'scrollbar_false',
						'options' => [
							'swiper-scrollbar' => esc_html__( 'True', 'themex' ),
							'scrollbar_false' => esc_html__( 'False', 'themex' ),
						],
					]
				);
				/* Button background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_scrol_background',
						'label' => esc_html__( 'button Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_swiper_area .swiper-scrollbar-drag',
						'condition' => [
							'witr_scrollbar' =>['swiper-scrollbar'],
						],						
					]
				);				
				/*  box height */
				$this->add_responsive_control(
					'witr_scrol_height',
					[
						'label' => esc_html__( 'Bar Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 1000,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_swiper_area .swiper-scrollbar-drag,{{WRAPPER}} .witr_swiper_area .swiper-container-horizontal>.swiper-scrollbar' => 'height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'witr_scrollbar' =>['swiper-scrollbar'],
						],							
					]
				);				
				/* witr_arrow */
				$this->add_control(
					'witr_arrow',
					[
						'label' => esc_html__( 'Arrow', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'button',
						'options' => [
							'button' => esc_html__( 'True', 'themex' ),
							'buttonf' => esc_html__( 'False', 'themex' ),
						],
					]
				);					
	
				/* witr_c_res1 */
				$this->add_control(
					'witr_c_res1',
					[
						'label' => esc_html__( 'Desktop', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator' => 'before',
						'default' => 'd1',
						'options' => [
							'd1' => esc_html__( '1', 'themex' ),
							'd2' => esc_html__( '2', 'themex' ),
						],
						'condition' => [
							'witr_style_swiper' =>['2','3','4'],
						],						
					]
				);				
				/* witr_c_res2 */
				$this->add_control(
					'witr_c_res2',
					[
						'label' => esc_html__( 'Tablet', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator' => 'before',
						'default' => 't1',
						'options' => [
							't1' => esc_html__( '1', 'themex' ),
							't2' => esc_html__( '2', 'themex' ),
						],
						'condition' => [
							'witr_style_swiper' =>['2','3','4'],
						],						
					]
				);				
			/* witr_c_res3 */
			$this->add_control(
				'witr_c_res3',
				[
					'label' => esc_html__( 'Mobile', 'themex' ),
					'separator' => 'before',
					'type' => Controls_Manager::SELECT,
					'default' => 'm1',
					'options' => [
						'm1' => esc_html__( '1', 'themex' ),
					],
					'condition' => [
						'witr_style_swiper' =>['2','3','4'],
					],					
				]
			);
				
				/* witr_unicid_c */	
					$this->add_control(
						'witr_unicid_c',
						[
							'label' => esc_html__( 'Use Uniqe ID', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Please use a unic ID here, ex- wittr_1.', 'themex' ),
							'default' => 'id5',
							'placeholder' => esc_attr__( 'Type your ID here', 'themex' ),
							'condition' => [
								'witr_style_swiper' =>['1','2','3'],
							],							
						]
					);				
				
												
			
			$this->end_controls_section();
			/* === end witr_image ===  */
			
			/* === witr_swiper social start ==== */			
			$this->start_controls_section(
				'witr_field_swiper_social',
				[
					'label' => esc_html__( 'Witr Social Icon Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,					
				]
			);
		
				/* witr_show_Icon */
				$this->add_control(
					'witr_show_Icon',
					[
						'label' => esc_html__( 'Show Icon', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'no',
					]
				);
				
				/* witr_swiper_follow */	
					$this->add_control(
						'witr_swiper_follow',
						[
							'label' => esc_html__( 'Follow Media Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'separator' => 'before',
							'description' => esc_html__( 'Not use Follow Text, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Follow Us', 'themex' ),
							'placeholder' => esc_attr__( 'Type your Follow social media title here', 'themex' ),
							'condition' => [
								'witr_show_Icon' => 'yes',
							],							
						]
					);				
					/* witr_icon_1 */	
					$this->add_control(
						'witr_icon_1',
						[
							'label' => esc_html__( 'Icon Name', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Type Icofont Icon - https://icofont.com/icons or Themify Icon -https://themify.me/themify-icons or Fontawesome Icon - https://fontawesome.com/cheatsheet , Icon Name here,example - icofont-facebook , fa fa-facebook , ti-facebook ', 'themex' ),
							'default' => 'icofont-facebook',
							'placeholder' => esc_attr__( 'Type Icon Name', 'themex' ),
							'separator' => 'before',
							'condition' => [
								'witr_show_Icon' => 'yes',
							],
						]
					);				
					/* main swiper witr_swiper_fb */	
					$this->add_control(
						'witr_swiper_fb',
						[
							'label' => esc_html__( 'Icon Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'description' =>esc_html__('Insert Icon link. It hidden when field blank.','themex'),
							'show_external' => true,
							'default' => [
								'url' => '#',
							],							
							'condition' => [
								'witr_show_Icon' => 'yes',
							],												
						]
					);
					/* witr_icon_2 */	
					$this->add_control(
						'witr_icon_2',
						[
							'label' => esc_html__( 'Icon Name', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Type Icofont Icon or Themify Icon or Fontawesome Icon , Icon name here,example - icofont-facebook , fa fa-facebook , ti-facebook ', 'themex' ),
							'default' => 'icofont-twitter',
							'placeholder' => esc_attr__( 'Type Icon Name', 'themex' ),
							'separator' => 'before',
							'condition' => [
								'witr_show_Icon' => 'yes',
							],
						]
					);					
				/* main swiper witr_swiper_tw */	
					$this->add_control(
						'witr_swiper_tw',
						[
							'label' => esc_html__( 'Icon Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'description' =>esc_html__('Insert Icon link. It hidden when field blank.','themex'),
							'show_external' => true,
							'condition' => [
								'witr_show_Icon' => 'yes',
							],							
							'default' => [
								'url' => '#',
							],					
						]
					);
					/* witr_icon_3 */	
					$this->add_control(
						'witr_icon_3',
						[
							'label' => esc_html__( 'Icon Name', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Type Icofont Icon or Themify Icon or Fontawesome Icon , Icon name here,example - icofont-facebook , fa fa-facebook , ti-facebook ', 'themex' ),
							'default' => 'icofont-instagram',
							'placeholder' => esc_attr__( 'Type Icon Name', 'themex' ),
							'separator' => 'before',
							'condition' => [
								'witr_show_Icon' => 'yes',
							],
						]
					);					
					/* main swiper witr_swiper_gp */	
					$this->add_control(
						'witr_swiper_gp',
						[
							'label' => esc_html__( 'Icon Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'description' =>esc_html__('Insert Icon link. It hidden when field blank.','themex'),
							'show_external' => true,
							'condition' => [
								'witr_show_Icon' => 'yes',
							],
							'default' => [
								'url' => '',
							],					
						]
					);
					/* witr_icon_4 */	
					$this->add_control(
						'witr_icon_4',
						[
							'label' => esc_html__( 'Icon Name', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Type Icofont Icon or Themify Icon or Fontawesome Icon , Icon name here,example - icofont-facebook , fa fa-facebook , ti-facebook ', 'themex' ),
							'default' => 'icofont-dribble',
							'placeholder' => esc_attr__( 'Type Icon Name', 'themex' ),
							'separator' => 'before',
							'condition' => [
								'witr_show_Icon' => 'yes',
							],
						]
					);					
				/* main swiper witr_swiper_lk */	
					$this->add_control(
						'witr_swiper_lk',
						[
							'label' => esc_html__( 'Icon Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'description' =>esc_html__('Insert Icon link. It hidden when field blank.','themex'),
							'show_external' => true,
							'condition' => [
								'witr_show_Icon' => 'yes',
							],							
							'default' => [
								'url' => '',
							],					
						]
					);
					/* witr_icon_5 */	
					$this->add_control(
						'witr_icon_5',
						[
							'label' => esc_html__( 'Icon Name', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Type Icofont Icon or Themify Icon or Fontawesome Icon , Icon name here,example - icofont-facebook , fa fa-facebook , ti-facebook ', 'themex' ),
							'placeholder' => esc_attr__( 'Type Icon Name', 'themex' ),
							'separator' => 'before',
							'condition' => [
								'witr_show_Icon' => 'yes',
							],
						]
					);					
				/* main swiper witr_swiper_pi */	
					$this->add_control(
						'witr_swiper_pi',
						[
							'label' => esc_html__( 'Icon Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'description' =>esc_html__('Insert Icon link. It hidden when field blank.','themex'),
							'show_external' => true,
							'condition' => [
								'witr_show_Icon' => 'yes',
							],												
						]
					);
					/* witr_icon_6 */	
					$this->add_control(
						'witr_icon_6',
						[
							'label' => esc_html__( 'Icon Name', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Type Icofont Icon or Themify Icon or Fontawesome Icon , Icon name here,example - icofont-facebook , fa fa-facebook , ti-facebook ', 'themex' ),
							'placeholder' => esc_attr__( 'Type Icon Name', 'themex' ),
							'separator' => 'before',
							'condition' => [
								'witr_show_Icon' => 'yes',
							],
						]
					);					
				/* main swiper witr_swiper_in */	
					$this->add_control(
						'witr_swiper_in',
						[
							'label' => esc_html__( 'Icon Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'description' =>esc_html__('Insert Icon link. It hidden when field blank.','themex'),
							'show_external' => true,
							'condition' => [
								'witr_show_Icon' => 'yes',
							],												
						]
					);
					/* witr_icon_7 */	
					$this->add_control(
						'witr_icon_7',
						[
							'label' => esc_html__( 'Icon Name', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Type Icofont Icon or Themify Icon or Fontawesome Icon , Icon name here,example - icofont-facebook , fa fa-facebook , ti-facebook ', 'themex' ),
							'placeholder' => esc_attr__( 'Type Icon Name', 'themex' ),
							'separator' => 'before',
							'condition' => [
								'witr_show_Icon' => 'yes',
							],
						]
					);					
				/* main swiper witr_swiper_us*/	
					$this->add_control(
						'witr_swiper_us',
						[
							'label' => esc_html__( 'Icon Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'description' =>esc_html__('Insert Icon link. It hidden when field blank.','themex'),
							'show_external' => true,
							'condition' => [
								'witr_show_Icon' => 'yes',
							],												
						]
					);								

			$this->end_controls_section();
			/* === end witr_swiper socila === */		

			/* === Witr Slider Height start === */
			$this->start_controls_section(
				'witr_slidersani_height',
				[
					'label' => esc_html__( 'Witr Animation Image Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);

				/* witr_show_animate */
				$this->add_control(
					'witr_show_animate',
					[
						'label' => esc_html__( 'Show Animation Image', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'description' => esc_html__( 'When You Elementor Section Background Image Used, Then Animation Image Options Use.', 'themex' ),
						'return_value' => 'yes',
						'default' => 'no',
						'separator'=>'before',
						
					]
				);			
			
				$this->add_control(
					'witrani_bg_image',
					[
						'label' => esc_html__( 'Choose Animation Image', 'themex' ),
						'type' => Controls_Manager::MEDIA,
						'condition' => [
							'witr_show_animate' => 'yes',
						],						
					]
				);
				/* txbd_image_size */
				$this->add_group_control(
					Group_Control_Image_Size::get_type(),
					[
						'name' => 'txbd_amimat_image_size',
						'default' => 'large',
						'separator' => 'none',
						'condition' => [
							'witr_show_animate' => 'yes',
						]
					]
				);
				/*  witr_icond_select */
				$this->add_responsive_control(
					'witr_icond_select',
					[
						'label' => esc_html__( 'Image Display', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'description' =>"Set your Image Display Select here",
						'separator' => 'before',					
						'default' => 'default',
						'options' => [
							'default' => esc_html__( 'Default', 'themex' ),
							'none' => esc_html__( 'None', 'themex' ),
						],
						'selectors' => [
							'{{WRAPPER}} .wirt_ani_slick_image' => 'display: {{VALUE}}',
						],						
					]
				);
				/* witr_slides_to_show */ 		
				$this->add_control(
					'adt',
					[
						'label' => esc_html__( 'animation-duration', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1,
						'max' => 100,
						'step' => 1,
						'default' => 5,
						'condition' => [
							'witr_show_animate' => 'yes',
						],						
					]
				);				
				/* image_infinite */
				$this->add_control(
					'atf',
					[
						'label' => esc_html__( 'animation-timing-function', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'linear',
						'options' => [
							'ease' => esc_html__( 'ease', 'themex' ),
							'linear' => esc_html__( 'linear', 'themex' ),
							'ease-in' => esc_html__( 'ease-in', 'themex' ),
							'ease-out' => esc_html__( 'ease-out', 'themex' ),
							'ease-in-out' => esc_html__( 'ease-in-out', 'themex' ),
						],
						'condition' => [
							'witr_show_animate' => 'yes',
						],						
					]
				);
				/*  witr_c_slidestoScroll */			
				$this->add_control(
					'ad',
					[
						'label' => esc_html__( 'animation-delay', 'themex' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1,
						'max' => 50,
						'step' => 1,
						'default' => 1,
						'condition' => [
							'witr_show_animate' => 'yes',
						],						
					]
				);				
				/* witr_c_autoplay */
				$this->add_control(
					'aic',
					[
						'label' => esc_html__( 'animation-iteration-count', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'infinite',
						'options' => [
							'infinite' => esc_html__( 'infinite', 'themex' ),
							'1' => esc_html__( '1', 'themex' ),
							'2' => esc_html__( '2', 'themex' ),
							'3' => esc_html__( '3', 'themex' ),
							'4' => esc_html__( '4', 'themex' ),
							'5' => esc_html__( '5', 'themex' ),
							'6' => esc_html__( '6', 'themex' ),
						],
						'condition' => [
							'witr_show_animate' => 'yes',
						],						
					]
				);					
				/* witr_c_arrows */
				$this->add_control(
					'adi',
					[
						'label' => esc_html__( 'animation-direction', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'alternate',
						'options' => [
							'alternate' => esc_html__( 'alternate', 'themex' ),
							'alternate-reverse' => esc_html__( 'alternate-reverse', 'themex' ),
							'normal' => esc_html__( 'normal', 'themex' ),
							'reverse' => esc_html__( 'reverse', 'themex' ),
						],
						'condition' => [
							'witr_show_animate' => 'yes',
						],						
					]
				);	
				/* witr_c_arrows */
				$this->add_control(
					'aps',
					[
						'label' => esc_html__( 'animation-play-state', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'running',
						'options' => [
							'running' => esc_html__( 'running', 'themex' ),
							'paused' => esc_html__( 'paused', 'themex' ),
						],
						'condition' => [
							'witr_show_animate' => 'yes',
						],						
					]
				);	
				
				/* move */
				$this->add_control(
					'anall',
					[
						'label' => esc_html__( 'Animation-name', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'witr_movelr_box45',
						'options' => [
							'none' => esc_html__( 'None', 'themex' ),
							'witr_movelr_box45' => esc_html__( 'witr_movelr_box45', 'themex' ),
							'witr_movelr_box90' => esc_html__( 'witr_movelr_box90', 'themex' ),
							'witr_movelr_box180' => esc_html__( 'witr_movelr_box180', 'themex' ),
							'witr_movelr_box360' => esc_html__( 'witr_movelr_box360', 'themex' ),							
							'witr_movetb_box45' => esc_html__( 'witr_movetb_box45', 'themex' ),
							'witr_movetb_box90' => esc_html__( 'witr_movetb_box90', 'themex' ),
							'witr_movetb_box180' => esc_html__( 'witr_movetb_box180', 'themex' ),
							'witr_movetb_box360' => esc_html__( 'witr_movetb_box360', 'themex' ),							
							'witr_rotate_360' => esc_html__( 'witr_rotate_360', 'themex' ),
							'witr_rotate_180' => esc_html__( 'witr_rotate_180', 'themex' ),
							'witr_rotate_90' => esc_html__( 'witr_rotate_90', 'themex' ),
							'witr_rotate_45' => esc_html__( 'witr_rotate_45', 'themex' ),

						],
						'condition' => [
							'witr_show_animate' => 'yes',
						],						
					]
				);

				
			
			$this->end_controls_section();
			/* ===  Witr Slider Height End === */			
			
			
			
			
			

	   /* ==============================================================================================================
										START TO STYLE
		================================================================================================================ */

			
		/*=== start witr_title style ====*/

		$this->start_controls_section(
			'witr_style_option',
			[
				'label' => esc_html__( 'Top Title Color Option', 'themex' ),
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
						'default' => Global_Colors::COLOR_SECONDARY,
					],					
					'selectors' => [
						'{{WRAPPER}} .witr_swiper_content h1' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .witr_swiper_content h1:hover' => 'color: {{VALUE}}',
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
						'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
					],
					'selector' => '{{WRAPPER}} .witr_swiper_content h1',
				]
			);
			/* witr_border_sw_style */
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'witr_border_sw_style',
					'label' => esc_html__( ' Border', 'themex' ),
					'default' => 'no',							
					'selector' => '{{WRAPPER}} .witr_swiper_content h1',
				]
			);			
			/*  Top Tittle width */
			$this->add_responsive_control(
				'witr_top_width',
				[
					'label' => esc_html__( 'width', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'default' => [
						'unit' => '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],					
					'size_units' => [ '%', 'px', 'em' ],
					'range' => [
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .witr_swiper_content h1' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);			
			/* margin */
			$this->add_responsive_control(
				'witr_sectionmargin',
				[
					'label' => esc_html__( 'Tittle Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'allowed_dimensions' => 'vertical',
					'placeholder' => [
					'top' => '',
					'right' => 'auto',
					'bottom' => '',
					'left' => 'auto',
					],
					'selectors' => [
						'{{WRAPPER}} .witr_swiper_content h1' => 'margin-top: {{TOP}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
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
						'{{WRAPPER}} .witr_swiper_content h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  w_title top style ====*/
		

		/*=== start Middle top style  ====*/

		$this->start_controls_section(
			'witr_style_option2',
			[
				'label' => esc_html__( 'Middle Title Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
			/* color */
			$this->add_control(
				'witr_title_color2',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_PRIMARY,
					],					
					'selectors' => [
						'{{WRAPPER}} .witr_swiper_content h2' => 'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
				'witr_thover_color2',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .witr_swiper_content h2:hover' => 'color: {{VALUE}}',
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
						'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
					],
					'selector' => '{{WRAPPER}} .witr_swiper_content h2',
				]
			);
			/*  Middle Tittle width */
			$this->add_responsive_control(
				'witr_middle_width',
				[
					'label' => esc_html__( 'width', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'default' => [
						'unit' => '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],					
					'size_units' => [ '%', 'px', 'em' ],
					'range' => [
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .witr_swiper_content h2' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);			
			
			/* margin */
			$this->add_responsive_control(
				'witr_sectionmargin2',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'allowed_dimensions' => 'vertical',
					'placeholder' => [
					'top' => '',
					'right' => 'auto',
					'bottom' => '',
					'left' => 'auto',
					],
					'selectors' => [
						'{{WRAPPER}} .witr_swiper_content h2' => 'margin-top: {{TOP}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
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
						'{{WRAPPER}} .witr_swiper_content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  Middle title style  ====*/
		
	/*=== start Bottom Title style  ====*/

		$this->start_controls_section(
			'witr_style_option3',
			[
				'label' => esc_html__( 'Bottom Title Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
			/* color */
			$this->add_control(
				'witr_title_color3',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_PRIMARY,
					],					
					'selectors' => [
						'{{WRAPPER}} .witr_swiper_content h3' => 'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
				'witr_thover_color3',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .witr_swiper_content h2:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/*  Bottom Tittle width */
			$this->add_responsive_control(
				'witr_bottom_width',
				[
					'label' => esc_html__( 'width', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'default' => [
						'unit' => '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],					
					'size_units' => [ '%', 'px', 'em' ],
					'range' => [
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .witr_swiper_content h3' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);			
			
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_ttpy_color3',
					'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
					],
					'selector' => '{{WRAPPER}} .witr_swiper_content h3',
				]
			);									
			/* margin */
			$this->add_responsive_control(
				'witr_sectionmargin3',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'allowed_dimensions' => 'vertical',
					'placeholder' => [
					'top' => '',
					'right' => 'auto',
					'bottom' => '',
					'left' => 'auto',
					],
					'selectors' => [
						'{{WRAPPER}} .witr_swiper_content h3' => 'margin-top: {{TOP}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
					],
				]
			);
			/* padding */
			$this->add_responsive_control(
				'witr_sectionpadding3',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_swiper_content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  Bottom style  ====*/		
		
		/*=== start witr_heighlight style ====*/

		$this->start_controls_section(
			'witr_style_optionh',
			[
				'label' => esc_html__( 'Heighlight Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
			/* color */
			$this->add_control(
				'witr_htitle_color',
				[
					'label' => esc_html__( 'Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_SECONDARY,
					],					
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .witr_swiper_content h1 span, {{WRAPPER}} .witr_swiper_content h2 span, {{WRAPPER}} .witr_swiper_content h3 span' => 'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
				'witr_hhover_color',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,					
					'selectors' => [
						'{{WRAPPER}} .witr_swiper_content h1 span:hover, {{WRAPPER}} .witr_swiper_content h2 span:hover, {{WRAPPER}} .witr_swiper_content h3 span:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_htpy_color',
					'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
					],
					'selector' => '{{WRAPPER}} .witr_swiper_content h1 span, {{WRAPPER}} .witr_swiper_content h2 span, {{WRAPPER}} .witr_swiper_content h3 span',
				]
			);		
			
			/* margin */
			$this->add_responsive_control(
				'witr_heighlight_margin',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_swiper_content h1 span, {{WRAPPER}} .witr_swiper_content h2 span, {{WRAPPER}} .witr_swiper_content h3 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* padding */
			$this->add_responsive_control(
				'witr_heighlight_padding',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .witr_swiper_content h1 span, {{WRAPPER}} .witr_swiper_content h2 span, {{WRAPPER}} .witr_swiper_content h3 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  w_heighlight style ====*/	

		/*=== start Inner title style ====*/
		$this->start_controls_section(
			'witr_stylei_option',
			[
				'label' => esc_html__( 'Inner Title Color Option', 'themex' ),
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
						'{{WRAPPER}} .witr_swipers_title h4' => '-webkit-text-stroke-color: {{VALUE}}',
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
						'{{WRAPPER}} .witr_swipers_title h4' => '-webkit-text-fill-color: {{VALUE}}',
					],
				]
			);			

			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_ttpyi_color3',
					'label' => esc_html__( 'Typography', 'themex' ),
					'selector' => '{{WRAPPER}} .witr_swipers_title h4',
				]
			);		
			/*  inner Tittle width */
			$this->add_responsive_control(
				'witr_inner_width',
				[
					'label' => esc_html__( 'width', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ '%', 'px', 'em' ],					
					'default' => [
						'unit' => '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],					

					'range' => [
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .witr_swipers_title h4' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			/* text_opacity */
			$this->add_control(
				'text_opacity',
				[
					'label' => esc_html__( 'Text Opacity', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'default' => [
						'size' => .8,
					],
					'range' => [
						'px' => [
							'max' => 1,
							'step' => 0.01,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .witr_swipers_title h4' => 'opacity: {{SIZE}};',
					],
				]
			);			
			/* box shadow color */	
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'witr_Texti_shadow',
					'label' => esc_html__( 'Text Shadow', 'themex' ),
					'selector' => '{{WRAPPER}} .witr_swipers_title h4',
				]
			);			
			/* blend mode style color */				
			$this->add_control(
				'witr_it_blend_mode',
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
						'{{WRAPPER}} .witr_swipers_title h4' => 'mix-blend-mode: {{VALUE}}',
					],
				]
			);
			/* witr_top */
			$this->add_responsive_control(
				'witr_top2',
				[
					'label' => esc_html__( 'Top', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -300,
							'max' => 500,
						],
						'%' => [
							'min' => -300,
							'max' => 500,
						],
						
					],
					'selectors' => [
						'{{WRAPPER}} .witr_swipers_title' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);
			
			/* witr_left */
			$this->add_responsive_control(
				'witr_left2',
				[
					'label' => esc_html__( 'Left', 'themex' ),
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
						'{{WRAPPER}} .witr_swipers_title' => 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);
			
		 
		 $this->end_controls_section();
		/*=== end  Inner title style  ====*/

		

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
							'{{WRAPPER}} .witr_swiper_content p' => 'color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .witr_swiper_content p',
					]
				);		
				/*  content width */
				$this->add_responsive_control(
					'witr_contenth_width',
					[
						'label' => esc_html__( 'width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'default' => [
							'unit' => '%',
						],
						'tablet_default' => [
							'unit' => '%',
						],
						'mobile_default' => [
							'unit' => '%',
						],						
						'size_units' => [ '%', 'px', 'em' ],
						'range' => [
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_swiper_content p' => 'width: {{SIZE}}{{UNIT}};',
						],						
					]
				);
				/* content margin */
				$this->add_responsive_control(
					'witr_content_margin',
					[
						'label' => esc_html__( 'Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'allowed_dimensions' => 'vertical',
						'placeholder' => [
						'top' => '',
						'right' => 'auto',
						'bottom' => '',
						'left' => 'auto',
						],
						'selectors' => [
							'{{WRAPPER}} .witr_swiper_content p' => 'margin-top: {{TOP}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_swiper_content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .witr_swiper_content .witr_btn' => 'color: {{VALUE}}',
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
								'selector' => '{{WRAPPER}} .witr_swiper_content .witr_btn',
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
									'{{WRAPPER}} .witr_swiper_content .witr_btn' => 'border-style: {{VALUE}}',
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
									'{{WRAPPER}} .witr_swiper_content .witr_btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .witr_swiper_content .witr_btn' => 'border-color: {{VALUE}}',
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
									'{{WRAPPER}} .witr_swiper_content .witr_btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
								'condition' => [
									'witr_border_btn_style' => ['solid','double','dotted','dashed','default'],
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
								'selector' => '{{WRAPPER}} .witr_swiper_content .witr_btn',
							]
						);
						/* box shadow */	
						$this->add_group_control(
							Group_Control_Box_Shadow::get_type(),
							[
								'name' => 'witr_buttonw_shadow',
								'label' => esc_html__( 'Box Shadow', 'themex' ),
								'selector' => '{{WRAPPER}} .witr_swiper_content .witr_btn',
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
									'{{WRAPPER}} .witr_swiper_content .witr_btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
									'{{WRAPPER}} .witr_swiper_content .witr_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);					
					

					$this->end_controls_tab();
					/*=== end button normal style ====*/
				
						/*=== start button hover style ====*/
						$this->start_controls_tab(
							'witr_button_colors_hover',
							[
								'label' => esc_html__( 'Normal Hover', 'themex' ),
							]
						);

						/* hover_color */
						$this->add_control(
							'witr_button_hover_color',
							[
								'label' => esc_html__( 'Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								
								'selectors' => [
									'{{WRAPPER}} .witr_swiper_content .witr_btn:hover,{{WRAPPER}} .witr_swiper_content form button:hover,{{WRAPPER}} .witr_video_butns:hover' => 'color: {{VALUE}}',
								],
							]
						);
						/* border_hover_color */
						$this->add_control(
							'witr_borderh_btn_color',
							[
								'label' => esc_html__( 'Border Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,								
								'selectors' => [
									'{{WRAPPER}} .witr_swiper_content .witr_btn:hover,{{WRAPPER}} .witr_swiper_content form button:hover,{{WRAPPER}} .witr_video_butns:hover' => 'border-color: {{VALUE}}',
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
								'selector' => '{{WRAPPER}} .witr_swiper_content .witr_btn:hover',
							]
						);

						
						$this->end_controls_tab();
						/*=== end button hover style ====*/
						
						
					/*=== start witr_button_colors_active style ====*/
					$this->start_controls_tab(
						'witr_button_colors_active',
						[
							'label' => esc_html__( 'Border Button', 'themex' ),							
						]
					);						
						
						/* color */
						$this->add_control(
							'witr_button_act_color',
							[
								'label' => esc_html__( ' Text Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .witr_swiper_content .witr_btn.active' => 'color: {{VALUE}}',
								],
							]
						);					
						/* Button background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_button_act_background',
								'label' => esc_html__( ' Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .witr_swiper_content .witr_btn.active',
							]
						);
						/* box shadow */	
						$this->add_group_control(
							Group_Control_Box_Shadow::get_type(),
							[
								'name' => 'witr_buttonwa_shadow',
								'label' => esc_html__( 'Box Shadow', 'themex' ),
								'selector' => '{{WRAPPER}} .witr_swiper_content .witr_btn.active',
							]
						);						
						/* witr_border_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_border_act_style',
								'label' => esc_html__( 'Icon Border', 'themex' ),
								'default' => 'no',							
								'selector' => '{{WRAPPER}} .witr_swiper_content .witr_btn.active',
							]
						);						
						
						
					$this->end_controls_tab();
					/*=== end button active style ====*/

					/*=== start witr_button_colors_active style ====*/
					$this->start_controls_tab(
						'witr_button_colors_activeh',
						[
							'label' => esc_html__( 'Border Hover', 'themex' ),							
						]
					);

					/* color */
					$this->add_control(
						'witr_button_acth_color',
						[
							'label' => esc_html__( ' Text Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .witr_swiper_content .witr_btn.active:hover' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .witr_swiper_content .witr_btn.active:hover',
						]
					);					
						/* border_hover_color */
						$this->add_control(
							'witr_borderact_btn_color',
							[
								'label' => esc_html__( 'Border Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,							
								'selectors' => [
									'{{WRAPPER}} .witr_swiper_content .witr_btn.active:hover' => 'border-color: {{VALUE}}',
								],
							]
						);					

					$this->end_controls_tab();
					/*=== end button active Hover style ====*/						
						
				$this->end_controls_tabs();
				/*=== end button_tabs style ====*/			
			 
			 $this->end_controls_section();
			/*=== end  witr button style ====*/			
		

		/*=== start Button Circle Video style ====*/
		$this->start_controls_section(
			'section_style_icon_button',
			[
				'label' => esc_html__( 'Button Circle Video Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]
		);
		
			/*=== start icon_tabs style ====*/
			$this->start_controls_tabs( 'video_icon' );
			
				/*=== start icon_normal style ====*/
				$this->start_controls_tab(
					'witr_icon_colorb_normal',
					[
						'label' => esc_html__( 'Normal', 'themex' ),
					]
				);		
				/* Icon Color */
				$this->add_control(
					'witr_primaryb_color',
					[
						'label' => esc_html__( 'Icon Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .witr_video_btn i' => 'color: {{VALUE}}',
						],
						
					]
				);
				/* Icon background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_iconsb_background',
						'label' => esc_html__( 'Icon Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_video_btn i,{{WRAPPER}} .witr_video_btn i::after',
					]
				);				
				/*  icon font size */
				$this->add_responsive_control(
					'witr_icon_sizeb',
					[
						'label' => esc_html__( 'Icon Size', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', 'em' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_video_btn i' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);				
				/*  icon width */
				$this->add_responsive_control(
					'witr_iconb_width',
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
							'{{WRAPPER}} .witr_video_btn i' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon height */
				$this->add_responsive_control(
					'witr_iconb_height',
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
							'{{WRAPPER}} .witr_video_btn i' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon line height */
				$this->add_responsive_control(
					'witr_iconb_line_height',
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
							'{{WRAPPER}} .witr_video_btn i' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/* witr_text_align */					
				$this->add_responsive_control(
					'witr_textb_align',
					[
						'label' => esc_html__( 'Inner Icon Align', 'themex' ),
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
							'{{WRAPPER}} .witr_video_btn i' => 'text-align: {{VALUE}}',
						],
					]
				);
				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_borderbi',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_video_btn i',
					]
				);
				/* border_radius */
				$this->add_control(
					'witr_borderb_radius',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .witr_video_btn i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_boxb_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_video_btn i',
					]
				);														
				/*  Rotate */
				$this->add_responsive_control(
					'witr_rotateb',
					[
						'label' => esc_html__( 'Rotate', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'deg' ],
						'default' => [
							'unit' => 'deg',
						],
						'tablet_default' => [
							'unit' => 'deg',
						],
						'mobile_default' => [
							'unit' => 'deg',
						],
						'selectors' => [
							'{{WRAPPER}} .witr_video_btn i' => 'transform: rotate({{SIZE}}{{UNIT}});',
						],
					]
				);
				/* icon margin */
				$this->add_responsive_control(
					'witr_iconb_margin',
					[
						'label' => esc_html__( ' Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .witr_video_btn i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* icon padding */
				$this->add_responsive_control(
					'witr_iconb_padding',
					[
						'label' => esc_html__( ' Padding', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .witr_video_btn i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		
				

				$this->end_controls_tab();
				/*=== end icon normal style ====*/
		
				/*=== start icon hover style ====*/
				$this->start_controls_tab(
					'witr_icon_colorsb_hover',
					[
						'label' => esc_html__( 'Icons Hover', 'themex' ),
					]
				);					
					/*  primary hover color */
					$this->add_control(
						'witr_hover_primaryb_color',
						[
							'label' => esc_html__( 'Icon Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .witr_video_btn i:hover ' => 'color: {{VALUE}}',
							],
						]
					);
					/* hover Icon background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_hoverb_icon',
							'label' => esc_html__( 'Icon Hover Background', 'themex' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .witr_video_btn i:hover',
						]
					);					
					/* witr_border_style */
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'witr_borderhob',
							'label' => esc_html__( 'Border', 'themex' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .witr_video_btn i:hover',
						]
					);					
					$this->end_controls_tab();
					/*=== end icon hover style ====*/

					/*=== start icon hover style ====*/
					$this->start_controls_tab(
						'witr_icon_colorsb_text',
						[
							'label' => esc_html__( 'Text', 'themex' ),
						]
					);
					
						/* color */
						$this->add_control(
							'witr_titlev_color',
							[
								'label' => esc_html__( 'Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								
								'selectors' => [
									'{{WRAPPER}} .witr_video_btn' => 'color: {{VALUE}}',
								],
							]
						);
						/* hover color */
						$this->add_control(
							'witr_thoverv_color',
							[
								'label' => esc_html__( 'Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,					
								'selectors' => [
									'{{WRAPPER}} .witr_video_btn:hover' => 'color: {{VALUE}}',
								],
							]
						);
						/* typograohy color */			
						$this->add_group_control(
							Group_Control_Typography::get_type(),
							[
								'name' => 'witr_ttpyv_color',
								'label' => esc_html__( 'Typography', 'themex' ),
								'selector' => '{{WRAPPER}} .witr_video_btn',
							]
						);											

					$this->end_controls_tabs();
					/*=== end icon_tabs style ====*/
			
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/
		$this->end_controls_section();
		/*=== end witr_icon Button style ====*/		
		
			/*=== start witr_icon style ====*/
			$this->start_controls_section(
				'section_style_icon',
				[
					'label' => esc_html__( 'Social Icon Color Option', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_show_Icon' => 'yes'
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
					'witr_primary_color',
					[
						'label' => esc_html__( 'Icon Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .witr_swiper_content_icon a i' => 'color: {{VALUE}}',
						],
						
					]
				);
				/* Icon background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_icons_background',
						'label' => esc_html__( 'Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_swiper_content_icon a i',
					]
				);
				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .witr_swiper_content_icon a i',
					]
				);				
				/*  icon font size */
				$this->add_responsive_control(
					'witr_icon_size',
					[
						'label' => esc_html__( 'Icon Size', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', 'rem', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .witr_swiper_content_icon a i' => 'font-size: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_swiper_content_icon a i' => 'width: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_swiper_content_icon a i' => 'height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_swiper_content_icon a i' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);

				/* witr_border_style */
				$this->add_control(
					'witr_border_style',
					[
						'label' => esc_html__( 'Border Style', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'none' => esc_html__( 'None', 'themex' ),
							'solid' => esc_html__( 'Solid', 'themex' ),
							'double' => esc_html__( 'Double', 'themex' ),
							'dotted' => esc_html__( 'Dotted', 'themex' ),
							'dashed' => esc_html__( 'Dashed', 'themex' ),
							'default' => esc_html__( 'Default', 'themex' ),
						],
						'default' => 'default',
						'selectors' => [	
							'{{WRAPPER}} .witr_swiper_content_icon a i' => 'border-style: {{VALUE}}',
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
							'{{WRAPPER}} .witr_swiper_content_icon a i' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_swiper_content_icon a i' => 'border-color: {{VALUE}}',
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
							'{{WRAPPER}} .witr_swiper_content_icon a i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						'condition' => [
							'witr_border_style' => ['solid','double','dotted','dashed','default'],
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
							'{{WRAPPER}} .witr_swiper_content_icon a i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .witr_swiper_content_icon a i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* icon Box margin */
				$this->add_responsive_control(
					'witr_bicon_margin',
					[
						'label' => esc_html__( 'Icon Box Margin', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .witr_icon_section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'label' => esc_html__( 'Primary Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .witr_swiper_content_icon a i:hover' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .witr_swiper_content_icon a i:hover',
						]
					);	
					/* box shadow color */	
					$this->add_group_control(
						Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'witr_iconh_shadow',
							'label' => esc_html__( 'Box Shadow', 'themex' ),
							'selector' => '{{WRAPPER}} .witr_swiper_content_icon a i:hover',
						]
					);					
					/*  primary hover color */
					$this->add_control(
						'witr_hover_border_color',
						[
							'label' => esc_html__( 'Border Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .witr_swiper_content_icon a i:hover' => 'border-color: {{VALUE}}',
							],
						]
					);										
					$this->end_controls_tab();
					/*=== end icon hover style ====*/
					/*=== start icon hover style ====*/
					$this->start_controls_tab(
						'icon_colors_follow',
						[
							'label' => esc_html__( 'Text', 'themex' ),
						]
					);
						/* color */
						$this->add_control(
							'witr_follow_color',
							[
								'label' => esc_html__( 'Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								'global' => [
									'default' => Global_Colors::COLOR_SECONDARY,
								],					
								'selectors' => [
									'{{WRAPPER}} .witr_flow_text h5' => 'color: {{VALUE}}',
								],
							]
						);
						/*  background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_follow_background',
								'label' => esc_html__( 'Icon Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .witr_flow_text h5',
							]
						);			
						/* hover color */
						$this->add_control(
							'witr_followhover_color',
							[
								'label' => esc_html__( 'Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,					
								'selectors' => [
									'{{WRAPPER}} .witr_flow_text h5:hover' => 'color: {{VALUE}}',
								],
							]
						);
						
						/* typograohy color */			
						$this->add_group_control(
							Group_Control_Typography::get_type(),
							[
								'name' => 'witr_followtpy_color',
								'label' => esc_html__( 'Typography', 'themex' ),
								'global' => [
									'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
								],
								'selector' => '{{WRAPPER}} .witr_flow_text h5',
							]
						);
						/* witr_border_sw_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_border_follow_style',
								'label' => esc_html__( ' Border', 'themex' ),
								'default' => 'no',							
								'selector' => '{{WRAPPER}} .witr_flow_text h5',
							]
						);						
						/* margin */
						$this->add_responsive_control(
							'witr_follow_margin',
							[
								'label' => esc_html__( ' Margin', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .witr_flow_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/* padding */
						$this->add_responsive_control(
							'witr_follow_padding',
							[
								'label' => esc_html__( ' Padding', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .witr_flow_text h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);					
										
					$this->end_controls_tab();
					/*=== end icon hover style ====*/					
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/
		$this->end_controls_section();

		/*=== end witr_icon style ====*/
		


		
		/*=== start image option style ====*/
		$this->start_controls_section(
			'witr_style_s2image_option',
			[
				'label' => esc_html__( 'Left And Right Image Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,				
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
							'{{WRAPPER}} .em_slider_s2_image' => 'top: {{SIZE}}{{UNIT}};',
						],
					]
				);
				
				/* witr_left 
				$this->add_responsive_control(
					'witr_left',
					[
						'label' => esc_html__( 'Left', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => -500,
								'max' => 500,
							],
							'%' => [
								'min' => -500,
								'max' => 500,
							],
							
						],
						'selectors' => [
							'{{WRAPPER}} .em_slider_s2_image' => 'left: {{SIZE}}{{UNIT}};',
						],
					]
				);*/

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
								'max' => 500,
							],
							'%' => [
								'min' => -500,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .em_slider_s2_image' => 'right: {{SIZE}}{{UNIT}};',
						],
					]
				);					
				/* witr_bottom */
				$this->add_responsive_control(
					'witr_bottom',
					[
						'label' => esc_html__( 'Bottom', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => -500,
								'max' => 500,
							],
							'%' => [
								'min' => -500,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .em_slider_s2_image' => 'bottom: {{SIZE}}{{UNIT}};',
						],
					]
				);

				/*  image width */
				$this->add_responsive_control(
					'witr_image_width',
					[
						'label' => esc_html__( 'width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'separator'=>'before',
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'%' => [
								'min' => 0,
								'max' => 500,
							],
							'px' => [
								'min' => 0,
								'max' => 1920,
							],	
						],						
						'default' => [
							'unit' => '%',
						],
						'tablet_default' => [
							'unit' => '%',
						],
						'mobile_default' => [
							'unit' => '%',
						],					

						'selectors' => [
							'{{WRAPPER}} .em_slider_s2_image img' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  image max width */
				$this->add_responsive_control(
					'witr_image_maxwidth',
					[
						'label' => esc_html__( 'Max width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'%' => [
								'min' => 0,
								'max' => 500,
							],
							'px' => [
								'min' => 0,
								'max' => 1920,
							],	
						],						
						'default' => [
							'unit' => '%',
						],
						'tablet_default' => [
							'unit' => '%',
						],
						'mobile_default' => [
							'unit' => '%',
						],					

						'selectors' => [
							'{{WRAPPER}} .em_slider_s2_image img' => 'max-width: {{SIZE}}{{UNIT}};',
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
								'max' => 1500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .em_slider_s2_image img' => 'height: {{SIZE}}{{UNIT}};',
						],
					]			
				);						
						
		 
		 $this->end_controls_section();
		/*=== end  witr_image style ====*/	

		/*=== start witr_icon style ====*/
		$this->start_controls_section(
			'section_style_iconw',
			[
				'label' => esc_html__( 'Video Left,Right,Center Color Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]
		);
		
			/*=== start icon_tabs style ====*/
			$this->start_controls_tabs( 'icon_colorsw' );
			
				/*=== start icon_normal style ====*/
				$this->start_controls_tab(
					'witr_icon_colors_normal',
					[
						'label' => esc_html__( 'Normal', 'themex' ),
					]
				);
				/* Icon Color */
				$this->add_control(
					'witr_primary_colorw',
					[
						'label' => esc_html__( 'Icon Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'separator'=>'before',
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .tx_svd_icon i' => 'color: {{VALUE}}',
						],
						
					]
				);
				
				/*  icon font size */
				$this->add_responsive_control(
					'witr_icon_sizew',
					[
						'label' => esc_html__( 'Icon Size', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .tx_svd_icon' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);

				/* Icon background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_iconsw_background',
						'label' => esc_html__( 'Icon Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .tx_svd_icon',
					]
				);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_boxw_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .tx_svd_icon',
					]
				);				
				/*  icon width */
				$this->add_responsive_control(
					'witr_iconw_width',
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
							'{{WRAPPER}} .tx_svd_icon' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon height */
				$this->add_responsive_control(
					'witr_iconw_height',
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
							'{{WRAPPER}} .tx_svd_icon' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon line height */
				$this->add_responsive_control(
					'witr_iconw_line_height',
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
							'{{WRAPPER}} .tx_svd_icon' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/* border_radius */
				$this->add_control(
					'witr_borderw_radius',
					[
						'label' => esc_html__( 'Border Radius', 'themex' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .tx_svd_icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);				
				/* HEADING  */
				$this->add_control(
					'witr_headw_icon',
					[
						'label' => esc_html__( ' Top,Bottom,Right Option', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator'=>'before',
					]
				);
				
			/* witr_top */
			$this->add_responsive_control(
				'witr_toptw',
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
						'{{WRAPPER}} .text-left .slider_vd_icon' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);
			/* witr_right */
			$this->add_responsive_control(
				'witr_rightrw',
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
						'{{WRAPPER}} .text-left .slider_vd_icon' => 'right: {{SIZE}}{{UNIT}};',
					],
				]
			);					
			/* witr_bottom */
			$this->add_responsive_control(
				'witr_bottombw',
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
						'{{WRAPPER}} .text-left .slider_vd_icon' => 'bottom: {{SIZE}}{{UNIT}};',
					],
					
				]
			);			
			/* witr_left 
			$this->add_responsive_control(
				'witr_leftlw',
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
						'{{WRAPPER}} .text-left .slider_vd_icon' => 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);*/
				

				$this->end_controls_tab();
				/*=== end icon normal style ====*/
			
					/*=== start icon hover style ====*/
					$this->start_controls_tab(
						'witr_icon_colorsw_hover',
						[
							'label' => esc_html__( 'Icon Hover', 'themex' ),
						]
					);
					/*  primary hover color */
					$this->add_control(
						'witr_hover_primaryw_color',
						[
							'label' => esc_html__( 'Icon Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tx_svd_icon i:hover ' => 'color: {{VALUE}}',
							],
						]
					);
					/* hover Icon background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_hoverw_icon',
							'label' => esc_html__( 'Icon Hover Background', 'themex' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .tx_svd_icon:hover',
						]
					);					

					$this->end_controls_tab();
					/*=== end icon hover style ====*/
					
			$this->end_controls_tabs();
			/*=== end icon_tabs style ====*/

		$this->end_controls_section();

		/*=== end witr_icon style ====*/		
		
		
		
		
		/*=== start image option style ====*/

		$this->start_controls_section(
			'witr_style_s2imagea_option',
			[
				'label' => esc_html__( 'Animation Image Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_show_animate' => 'yes',
				],				
			]
		);		 
			/* witr_top */
			$this->add_responsive_control(
				'witr_topa',
				[
					'label' => esc_html__( 'Top', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
						],
						'%' => [
							'min' => -1000,
							'max' => 1000,
						],
						
					],
					'selectors' => [
						'{{WRAPPER}} .wirt_ani_swiper_image' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);
			
			/* witr_left */
			$this->add_responsive_control(
				'witr_lefta',
				[
					'label' => esc_html__( 'Left', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 2000,
						],
						'%' => [
							'min' => -500,
							'max' => 500,
						],
						
					],
					'selectors' => [
						'{{WRAPPER}} .wirt_ani_swiper_image' => 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);

			/* witr_right 
			$this->add_responsive_control(
				'witr_righta',
				[
					'label' => esc_html__( 'Right', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 500,
						],
						'%' => [
							'min' => -500,
							'max' => 500,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .wirt_ani_swiper_image' => 'right: {{SIZE}}{{UNIT}};',
					],
				]
			);					
			
			$this->add_responsive_control(
				'witr_bottoma',
				[
					'label' => esc_html__( 'Bottom', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 500,
						],
						'%' => [
							'min' => -500,
							'max' => 500,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .wirt_ani_swiper_image' => 'bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);*/

				/*  image width */
				$this->add_responsive_control(
					'witr_image_widtha',
					[
						'label' => esc_html__( 'width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'separator'=>'before',
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'%' => [
								'min' => 0,
								'max' => 500,
							],
							'px' => [
								'min' => 0,
								'max' => 1920,
							],	
						],						
						'default' => [
							'unit' => '%',
						],
						'tablet_default' => [
							'unit' => '%',
						],
						'mobile_default' => [
							'unit' => '%',
						],					

						'selectors' => [
							'{{WRAPPER}} .wirt_ani_swiper_image img' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  image max width */
				$this->add_responsive_control(
					'witr_image_maxwidtha',
					[
						'label' => esc_html__( 'Max width', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'%' => [
								'min' => 0,
								'max' => 500,
							],
							'px' => [
								'min' => 0,
								'max' => 1920,
							],	
						],						
						'default' => [
							'unit' => '%',
						],
						'tablet_default' => [
							'unit' => '%',
						],
						'mobile_default' => [
							'unit' => '%',
						],					

						'selectors' => [
							'{{WRAPPER}} .wirt_ani_swiper_image img' => 'max-width: {{SIZE}}{{UNIT}};',
						],
					]
				);				
				/*  image height */
				$this->add_responsive_control(
					'witr_image_heighta',
					[
						'label' => esc_html__( 'Height', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 25,
								'max' => 1500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .wirt_ani_swiper_image img' => 'height: {{SIZE}}{{UNIT}};',
						],
					]			
				);						
						
		 
		 $this->end_controls_section();
		/*=== end  witr_animation style ====*/		
		

			/*=== start witr Arrow style ====*/
			$this->start_controls_section(
				'witr_style_option_arrow',
				[
					'label' => esc_html__( 'Witr Arrow Options', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_arrow' => 'button',
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
						
					
						/*  Arrow font size */
						$this->add_responsive_control(
							'witr_arrow_size',
							[
								'label' => esc_html__( ' Size', 'themex' ),
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
									'{{WRAPPER}} .swiper-button-next:after,{{WRAPPER}} .swiper-button-prev:after' => 'font-size: {{SIZE}}{{UNIT}};',
								],
							]
						);					
						/* Arrow color */
						$this->add_control(
							'witr_arrow_color',
							[
								'label' => esc_html__( ' Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .swiper-button-prev,{{WRAPPER}} .swiper-button-next' => 'color: {{VALUE}}',
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
								'selector' => '{{WRAPPER}} .swiper-button-prev,{{WRAPPER}} .swiper-button-next',
							]
						);
						/* witr_arrow_padding */
						$this->add_responsive_control(
							'witr_arrow_padding',
							[
								'label' => esc_html__( 'Padding', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .swiper-button-prev,{{WRAPPER}} .swiper-button-next' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);						
						/* witr_arrowborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_arrowborder_style1',
								'label' => esc_html__( ' Border', 'themex' ),
								'selector' => '{{WRAPPER}} .swiper-button-prev,{{WRAPPER}} .swiper-button-next',
							]
						);
						/* border_radius */
						$this->add_control(
							'witr_border_arrow_radius1',
							[
								'label' => esc_html__( 'Border Radius', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .swiper-button-prev,{{WRAPPER}} .swiper-button-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/*  arrow Opacity */
						$this->add_responsive_control(
							'witr_arrow_opacity',
							[
								'label' => esc_html__( ' Opacity', 'themex' ),
								'type' => Controls_Manager::TEXT,
								'selectors' => [
									'{{WRAPPER}} .swiper-button-prev,{{WRAPPER}} .swiper-button-next' => 'opacity: {{SIZE}}{{UNIT}};',
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
							'witr_arrow_hover_color1',
							[
								'label' => esc_html__( 'Arrow Hover Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								'selectors' => [
									'{{WRAPPER}} .swiper-button-next:after,{{WRAPPER}} .swiper-button-prev:after' => 'color: {{VALUE}}',
								],
							]
						);					
							
						/* Arrow Hover background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_arrow_hover_background1',
								'label' => esc_html__( 'Arrow Hover Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .swiper-button-prev:hover,{{WRAPPER}} .swiper-button-next:hover',
							]
						);
						/* witr_hoverborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_hoverborder_style11',
								'label' => esc_html__( 'Arrow Hover Border', 'themex' ),
								'selector' => '{{WRAPPER}} .swiper-button-prev:hover,{{WRAPPER}} .swiper-button-next:hover',
							]
						);					
						/* witr_arrow_padding */
						$this->add_responsive_control(
							'witr_arrowh_padding',
							[
								'label' => esc_html__( 'Padding', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .swiper-button-prev:hover,{{WRAPPER}} .swiper-button-next:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
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
						'witr_progressbar' => 'false',
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
							'witr_dots_width1',
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
									'{{WRAPPER}} .witr_swiper_area .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};',
								],
							]
						);
						/*  Dots height */
						$this->add_responsive_control(
							'witr_dots_height1',
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
									'{{WRAPPER}} .witr_swiper_area .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
								],
							]
						);											
						/* Dots background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_dots_background1',
								'label' => esc_html__( 'Dots Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .witr_swiper_area .swiper-pagination-bullet',
							]
						);
						$this->add_control(
							'witr_opacity',
							[
								'label' => __( 'Opacity', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'range' => [
									'px' => [
										'max' => 1,
										'min' => 0.2,
										'step' => 0.01,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .witr_swiper_area .swiper-pagination-bullet' => 'opacity: {{SIZE}};',
								],
							]
						);						
						/* witr_dotsborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_dotsborder_style1',
								'label' => esc_html__( 'Dots Border', 'themex' ),
								'selector' => '{{WRAPPER}} .witr_swiper_area .swiper-pagination-bullet',
							]
						);
						/* border_radius */
						$this->add_control(
							'witr_border_dots_radius1',
							[
								'label' => esc_html__( 'Border Radius', 'themex' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .witr_swiper_area .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						
						/* witr_bottom_dots1 */
						$this->add_responsive_control(
							'witr_bottom_dots1',
							[
								'label' => esc_html__( 'Bottom', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 1000,
									],
									'%' => [
										'min' => 0,
										'max' => 1000,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .swiper-container-horizontal>.swiper-pagination-bullets' => 'bottom: {{SIZE}}{{UNIT}};',
								],
							]
						);
						/* dots margin */
						$this->add_responsive_control(
							'witr_dots_margin1',
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
									'{{WRAPPER}} .witr_swiper_area .swiper-pagination-bullet' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
								],
							]
						);					
					

					$this->end_controls_tab();
					/*=== end Dots normal style ====*/
				
						/*=== start Dots hover style ====*/
						$this->start_controls_tab(
							'witr_dots_colors_hover',
							[
								'label' => esc_html__( ' Hover', 'themex' ),
							]
						);
							
						/* Dots Hover background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_dots_hover_background1',
								'label' => esc_html__( 'Dots Hover Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .witr_swiper_area .swiper-pagination-bullet:hover',
							]
						);
						/* witr_hoverborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_hoverborder_style1',
								'label' => esc_html__( 'Dots Hover Border', 'themex' ),
								'selector' => '{{WRAPPER}} .witr_swiper_area .swiper-pagination-bullet:hover',
							]
						);					
						
						
						$this->end_controls_tab();
						/*=== end Dots hover style ====*/
						
						/*=== start Dots hover style ====*/
						$this->start_controls_tab(
							'witr_dots_active_hover',
							[
								'label' => esc_html__( 'Active', 'themex' ),
							]
						);

						/* Active Dots background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_acdots_background1',
								'label' => esc_html__( 'Active Dots Background', 'themex' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .witr_swiper_area .swiper-pagination-bullet-active ',
							]
						);						
						$this->add_control(
							'witr_opacity_ac',
							[
								'label' => __( 'Opacity', 'themex' ),
								'type' => Controls_Manager::SLIDER,
								'range' => [
									'px' => [
										'max' => 1,
										'min' => 0,
										'step' => 0.01,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .witr_swiper_area .swiper-pagination-bullet-active' => 'opacity: {{SIZE}};',
								],
							]
						);						
						
						$this->end_controls_tab();
						/*=== end Dots hover style ====*/						
				$this->end_controls_tabs();
				/*=== end Dots tabs style ====*/

			 $this->end_controls_section();
			/*=== end  witr Dots style ====*/		
	


    } /* function end*/

    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();
		if(! empty($witrshowdata['witr_slides_to_show'])){
			$slidestoShow=$witrshowdata['witr_slides_to_show'];
		}
		if(! empty($witrshowdata['witr_spacebetween'])){
			$spacebetween=$witrshowdata['witr_spacebetween'];
		}
		if(! empty($witrshowdata['witr_slides_to_show2'])){
			$slidestoShow2=$witrshowdata['witr_slides_to_show2'];
		}
		if(! empty($witrshowdata['witr_spacebetween2'])){
			$spacebetween2=$witrshowdata['witr_spacebetween2'];
		}
		
		if(! empty($witrshowdata['witr_grabcursor'])){
			$grabcursor=$witrshowdata['witr_grabcursor'];
		}
		if(! empty($witrshowdata['witr_effect'])){
			$effect=$witrshowdata['witr_effect'];
		}		
		if(! empty($witrshowdata['witr_direction'])){
			$direction=$witrshowdata['witr_direction'];
		}
		if(! empty($witrshowdata['witr_delay'])){
			$delay=$witrshowdata['witr_delay'];
		}		
		if(! empty($witrshowdata['witr_c_speed'])){
			$speed=$witrshowdata['witr_c_speed'];
		}
		if(! empty($witrshowdata['witr_freemode'])){
			$freemode=$witrshowdata['witr_freemode'];
		}
		if(! empty($witrshowdata['witr_mousewheel'])){
			$mousewheel=$witrshowdata['witr_mousewheel'];
		}
		if(! empty($witrshowdata['witr_keyboard'])){
			$keyboard=$witrshowdata['witr_keyboard'];
		}
		if(! empty($witrshowdata['witr_loop'])){
			$loop=$witrshowdata['witr_loop'];
		}
		if(! empty($witrshowdata['witr_progressbar'])){
			$progressbar=$witrshowdata['witr_progressbar'];
		}
		if(! empty($witrshowdata['witr_scrollbar'])){
			$scrollbar=$witrshowdata['witr_scrollbar'];
		}
		if(! empty($witrshowdata['witr_arrow'])){
			$arrow=$witrshowdata['witr_arrow'];
		}
		if(! empty($witrshowdata['witr_dir'])){
			$rtl=$witrshowdata['witr_dir'];
		}
		if(! empty($witrshowdata['witr_stretch'])){
			$stretch=$witrshowdata['witr_stretch'];
		}
		if(! empty($witrshowdata['witr_depth'])){
			$depth=$witrshowdata['witr_depth'];
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
		
		
		
		?>
		<?php
		
		switch ( $witrshowdata['witr_style_swiper'] ) {	
		
		case '4':
		?>
			<!-- Swiper -->
			<div class="witr_swiper_area ">
				<div class="swiper-container w_slider_4 gallery-top"dir="<?php echo $rtl;?>">
					<div class="swiper-wrapper" >
						<?php if( ! empty($witrshowdata['wittr_slist'])){
							foreach($witrshowdata['wittr_slist'] as $wittr_s_item){
							$target = ! empty($wittr_s_item['witr_button_link']['is_external']) ? ' target="_blank"' : '';
							$nofollow = ! empty($wittr_s_item['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';				
							$target_btn = ! empty($wittr_s_item['witr_yvideo_linkhas']['is_external']) ? ' target="_blank"' : '';
							$nofollow_btn = ! empty($wittr_s_item['witr_yvideo_linkhas']['nofollow']) ? ' rel="nofollow"' : '';
							$txbd_image = ! empty($wittr_s_item['witr_sitem_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $wittr_s_item, 'txbd_image_size', 'witr_sitem_image' ) : '';
							$txbd_top_image = ! empty($wittr_s_item['witr_swpt_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $wittr_s_item, 'txbd_top_image_size', 'witr_swpt_image' ) : '';
							$txbd_animate_image = ! empty($witrshowdata['witrani_bg_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witrshowdata, 'txbd_amimat_image_size', 'witrani_bg_image' ) : '';
							?>		
					    <div class="swiper-slide  witr_swiper_height" <?php if( ! empty($wittr_s_item['witr_bg_image']['url'])){?> style="background-image:url(<?php echo $wittr_s_item['witr_bg_image']['url'];?>);"<?php }?>>
							<!-- witr_show_animate -->
							<?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  	
								<div class="wirt_ani_slick_image wirt_ani_swiper_image" style="animation: <?php echo $witrshowdata['anall'];?>  <?php echo $witrshowdata['adt'];?>s  <?php echo $witrshowdata['atf'];?>  <?php echo $witrshowdata['ad'];?>s  <?php echo $witrshowdata['aic'];?>  <?php echo $witrshowdata['adi'];?>  <?php echo $witrshowdata['aps'];?>;">
									<div class="wirt_ani_slick_image_inner">
										<?php echo $txbd_animate_image; ?>
									</div>
								</div>
							<?php } ?>						
							<div class="witr_sw_text_area text-<?php echo $witrshowdata['witr_text_ltc']; ?>">
								<div class="witr_swiper_content ">
									<?php if($wittr_s_item['witr_show_topimage']=='yes' ){ if( ! empty($wittr_s_item['witr_swpt_image']['url'])){?>
										<div class="witr_swiper_topimg">
											<?php echo $txbd_top_image; ?>
										</div> 
									<?php } } ?>								
									<!-- title -->
									<?php if( ! empty($wittr_s_item['witr_swiper_title1'])){?>
										<h1><?php  echo $wittr_s_item['witr_swiper_title1'];?></h1>
									<?php } ?>
									<!-- title 2 -->
									<?php if( ! empty($wittr_s_item['witr_swiper_title2'])){?>
										<h2><?php  echo $wittr_s_item['witr_swiper_title2'];?></h2>
									<?php } ?>
									<!-- title 3 -->
									<?php if( ! empty($wittr_s_item['witr_swiper_title3'])){?>
										<h3><?php  echo $wittr_s_item['witr_swiper_title3'];?></h3>
									<?php } ?>
									<!-- content -->
									<?php if( ! empty($wittr_s_item['witr_pragraph'])){?>
										<p><?php  echo $wittr_s_item['witr_pragraph'];?></p>
									<?php } ?>
													
									<!-- inner title -->
									<?php if( ! empty($wittr_s_item['witr_title_inner'])){?>
										<div class="witr_swipers_title">
											<h4><?php echo $wittr_s_item['witr_title_inner']; ?></h4>
										</div>
									<?php } ?>

									<!-- btn gradient style -->
									<div class="slider_btn">
										<div class="witr_btn_style">
											<div class="witr_btn_sinner">
												<!-- button -->
												<?php if( ! empty($wittr_s_item['witr_button_link']['url'])){?>
													<a  class="witr_btn" href="<?php echo $wittr_s_item['witr_button_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $wittr_s_item['witr_swiper_button'];?></a>
												<?php }?>

												<!-- video button 2 -->
												<?php if($wittr_s_item['witr_vshow_button']=='yes' ){
													
													 if( ! empty($wittr_s_item['witr_yvideo_linkhas']['url'])){?>
														<a class="witr_btn active recpwit" href="<?php echo $wittr_s_item['witr_yvideo_linkhas'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>>
														<?php echo $wittr_s_item['witr_video_button']; ?>
														</a>
													<?php } 										

													if($wittr_s_item['witr_yshow_button']=='yes' or $wittr_s_item['witr_vmshow_button']='yes'  ){
												
														 if( ! empty($wittr_s_item['witr_yvideo_link']['url'])){?>
															<a class="witr_btn active recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="<?php echo $wittr_s_item['witr_yvideo_link'] ['url']; ?>"><i class="icofont-ui-play"></i>
															<?php echo $wittr_s_item['witr_video_button']; ?>
															</a>
														<?php } 

														if( ! empty($wittr_s_item['witr_vmvideo_link']['url'])){?>
															<a class="witr_btn active recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="vimeo" data-autoplay="true" href="<?php echo $wittr_s_item['witr_vmvideo_link'] ['url']; ?>"><i class="icofont-ui-play"></i><?php echo $wittr_s_item['witr_video_button']; ?></a>
														<?php } 
													} 
												} ?>

												<!-- Circle video button Style -->
												<?php if($wittr_s_item['witr_vshow_bvi']=='yes' ){
													if($wittr_s_item['witr_yshow_bvi']=='yes' or $wittr_s_item['witr_vmshow_bvi']='yes'  ){
												
														 if( ! empty($wittr_s_item['witr_yvideo_link_bvi']['url'])){?>
															<a class="witr_video_btn recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="<?php echo $wittr_s_item['witr_yvideo_link_bvi'] ['url']; ?>"><i class="icofont-ui-play"></i>
															<?php echo $wittr_s_item['witr_text_bvi']; ?>
															</a>
														<?php } 

														if( ! empty($wittr_s_item['witr_vmvideo_link_bvi']['url'])){?>
															<a class="witr_video_btn recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="vimeo" data-autoplay="true" href="<?php echo $wittr_s_item['witr_vmvideo_link_bvi'] ['url']; ?>"><i class="icofont-ui-play"></i><?php echo $wittr_s_item['witr_text_bvi']; ?></a>
														<?php } 
													} 
												} ?>												
											</div>
										</div>
									</div>
									<!-- social -->
									<?php if($witrshowdata['witr_show_Icon']=='yes'){?>	
									<div class="witr_icon_section display_flex">
										<?php if(! empty($witrshowdata['witr_swiper_follow'])){?>
											<div class="witr_flow_text">
												<h5><?php echo $witrshowdata['witr_swiper_follow']; ?></h5>
											</div>
										<?php } ?>			
										<div class="themex_slider_icon witr_swiper_content_icon">
										<ul>
											<?php if( ! empty($witrshowdata['witr_icon_1'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_fb']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_1']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_2'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_tw']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_2']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_3'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_gp']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_3']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_4'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_lk']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_4']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_5'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_pi']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_5']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_6'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_in']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_6']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_7'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_us']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_7']?>"></i></a></li>
											<?php } ?>
										</ul>
										</div>
									</div>
									<?php } ?>									
								</div>
									
								<!-- slider thumb image -->
								<?php if( ! empty($wittr_s_item['witr_sitem_image']['url'])){?>
								<div class="witr_slider_thumb em_slider_s2_image">
									<div class="witr_slider_thumb_inner">
										<?php echo $txbd_image; ?>
									</div>
								</div>
								<?php } ?>

								<!-- video icon -->
								<?php if($wittr_s_item['witr_vshow_buttoni']=='yes' ){?>
								<div class="slider_vd_icon">
									<div class="slider_vd_icon_inner">
										<!-- video button -->
										<?php if(isset($wittr_s_item['witr_yvideo_linki']['url']) && ! empty($wittr_s_item['witr_yvideo_linki']['url'])){?>
											<a class="tx_svd_icon recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="<?php echo $wittr_s_item['witr_yvideo_linki'] ['url']; ?>"><i class="icofont-ui-play"></i></a>
										<?php }elseif(isset($wittr_s_item['witr_vmvideo_linki']['url']) && ! empty($wittr_s_item['witr_vmvideo_linki']['url'])){?>
											<a class="tx_svd_icon recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="vimeo" data-autoplay="true" href="<?php echo $wittr_s_item['witr_vmvideo_linki'] ['url']; ?>"><i class="icofont-ui-play"></i></a>
											<?php }else{} ?>						
									</div>
								</div>
								<?php 	} ?>										
							</div>
						</div>
					  
						<?php } ?>
					<?php } ?>

					</div>
					<!-- Add Pagination -->
					<div class="swiper-scrollbar"></div>
					<div class="swiper-pagination"></div>
					<div class="swiper-<?php echo $arrow;?>-next "></div>
					<div class="swiper-<?php echo $arrow;?>-prev"></div>					
				</div>
				
				<div class="swiper-container gallery-thumbs "dir="<?php echo $rtl;?>">
					<div class="swiper-wrapper" >
						<?php if( ! empty($witrshowdata['wittr_slist'])){
							foreach($witrshowdata['wittr_slist'] as $wittr_s_item){?>		
					    <div class="swiper-slide wittr_gallery_swiper <?php echo $res1;?> <?php echo $res2;?> <?php echo $res3;?> " <?php if( ! empty($wittr_s_item['witr_bg_image']['url'])){?> style="background-image:url(<?php echo $wittr_s_item['witr_bg_image']['url'];?>);"<?php }?>>

						</div>
					  
						<?php } ?>
					<?php } ?>

					</div>
					
				</div>
				
							
				
			</div>		
		

			<script type='text/javascript'>
				jQuery(function($){

					var galleryThumbs = new Swiper('.gallery-thumbs', {
						
						<?php if(isset($witrshowdata['witr_slides_to_show2']) && ! empty($witrshowdata['witr_slides_to_show2'])){?>
							slidesPerView: <?php echo $slidestoShow2;?>,
						<?php } ?>
						<?php if(isset($witrshowdata['witr_spacebetween2']) && ! empty($witrshowdata['witr_spacebetween2'])){?>
							spaceBetween: <?php echo $spacebetween2;?>,
						<?php } ?>
					  loop: false,
					  <?php echo ( is_rtl() ) ? "rtl: true," : ''; ?>
					  freeMode: <?php echo $freemode;?>,
					  loopedSlides: 2, /*looped slides should be the same*/
					  watchSlidesVisibility: true,
					  watchSlidesProgress: true,
						grabCursor: <?php echo $grabcursor;?>,
						speed: <?php echo $speed;?>,
						direction: '<?php echo $direction;?>',
						mousewheel: <?php echo $mousewheel;?>,
						keyboard: <?php echo $keyboard;?>,
						autoplay: {
							delay: <?php echo $delay;?>,								  
							disableOnInteraction: false,
						},						
					});
					var galleryTop = new Swiper('.gallery-top ', {
					  loopedSlides: 2, /*looped slides should be the same*/
						grabCursor: <?php echo $grabcursor;?>,
						speed: <?php echo $speed;?>,
						direction: '<?php echo $direction;?>',

						freeMode: <?php echo $freemode;?>,
						mousewheel: <?php echo $mousewheel;?>,
						keyboard: <?php echo $keyboard;?>,
						loop: <?php echo $loop;?>,
						<?php echo ( is_rtl() ) ? "rtl: true," : ''; ?>
						autoplay: {
							delay: <?php echo $delay;?>,								  
							disableOnInteraction: false,
						},
						  pagination: {
							el: '.swiper-pagination',
							clickable: true,
							<?php echo $progressbar;?>: 'progressbar',
						  },
						  navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev',
						  },
						  scrollbar: {
							el: '.<?php echo $scrollbar;?>',
							hide: true,
						  },
					  thumbs: {
						swiper: galleryThumbs,
					  },
					});				
				
				


				});						
				
			</script>							
		<?php
		break;
		
		case '3':
		?>
			<!-- Swiper -->
			<div class="witr_swiper_area">

				<div class="swiper-container w_slider_3 witr_active_<?php echo $witrshowdata['witr_unicid_c'];?> "dir="<?php echo $rtl;?>">
					<div class="swiper-wrapper" >
						<?php if( ! empty($witrshowdata['wittr_slist'])){
							foreach($witrshowdata['wittr_slist'] as $wittr_s_item){
							$target = ! empty($wittr_s_item['witr_button_link']['is_external']) ? ' target="_blank"' : '';
							$nofollow = ! empty($wittr_s_item['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';				
							$target_btn = ! empty($wittr_s_item['witr_yvideo_linkhas']['is_external']) ? ' target="_blank"' : '';
							$nofollow_btn = ! empty($wittr_s_item['witr_yvideo_linkhas']['nofollow']) ? ' rel="nofollow"' : '';
							$txbd_image = ! empty($wittr_s_item['witr_sitem_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $wittr_s_item, 'txbd_image_size', 'witr_sitem_image' ) : '';
							$txbd_top_image = ! empty($wittr_s_item['witr_swpt_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $wittr_s_item, 'txbd_top_image_size', 'witr_swpt_image' ) : '';
							$txbd_animate_image = ! empty($witrshowdata['witrani_bg_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witrshowdata, 'txbd_amimat_image_size', 'witrani_bg_image' ) : '';							
							?>		
					    <div class="swiper-slide <?php echo $res1;?> <?php echo $res2;?> <?php echo $res3;?>  witr_swiper_height" <?php if( ! empty($wittr_s_item['witr_bg_image']['url'])){?> style="background-image:url(<?php echo $wittr_s_item['witr_bg_image']['url'];?>);"<?php }?>>
							<!-- witr_show_animate -->
							<?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  	
								<div class="wirt_ani_slick_image wirt_ani_swiper_image" style="animation: <?php echo $witrshowdata['anall'];?>  <?php echo $witrshowdata['adt'];?>s  <?php echo $witrshowdata['atf'];?>  <?php echo $witrshowdata['ad'];?>s  <?php echo $witrshowdata['aic'];?>  <?php echo $witrshowdata['adi'];?>  <?php echo $witrshowdata['aps'];?>;">
									<div class="wirt_ani_slick_image_inner">
										<?php echo $txbd_animate_image; ?>
									</div>
								</div>
							<?php } ?>
							<div class="witr_sw_text_area text-<?php echo $witrshowdata['witr_text_ltc']; ?>">
								<div class="witr_swiper_content ">
									<?php if($wittr_s_item['witr_show_topimage']=='yes' ){ if( ! empty($wittr_s_item['witr_swpt_image']['url'])){?>
										<div class="witr_swiper_topimg">
											<?php echo $txbd_top_image; ?>
										</div> 
									<?php } } ?>								
									<!-- title -->
									<?php if( ! empty($wittr_s_item['witr_swiper_title1'])){?>
										<h1><?php  echo $wittr_s_item['witr_swiper_title1'];?></h1>
									<?php } ?>
									<!-- title 2 -->
									<?php if( ! empty($wittr_s_item['witr_swiper_title2'])){?>
										<h2><?php  echo $wittr_s_item['witr_swiper_title2'];?></h2>
									<?php } ?>
									<!-- title 3 -->
									<?php if( ! empty($wittr_s_item['witr_swiper_title3'])){?>
										<h3><?php  echo $wittr_s_item['witr_swiper_title3'];?></h3>
									<?php } ?>
									<!-- content -->
									<?php if( ! empty($wittr_s_item['witr_pragraph'])){?>
										<p><?php  echo $wittr_s_item['witr_pragraph'];?></p>
									<?php } ?>
													
									<!-- inner title -->
									<?php if( ! empty($wittr_s_item['witr_title_inner'])){?>
										<div class="witr_swipers_title">
											<h4><?php echo $wittr_s_item['witr_title_inner']; ?></h4>
										</div>
									<?php } ?>

									<!-- btn gradient style -->
									<div class="slider_btn">
										<div class="witr_btn_style">
											<div class="witr_btn_sinner">
												<!-- button -->
												<?php if( ! empty($wittr_s_item['witr_button_link']['url'])){?>
													<a  class="witr_btn" href="<?php echo $wittr_s_item['witr_button_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $wittr_s_item['witr_swiper_button'];?></a>
												<?php }?>

												<!-- video button 2 -->
												<?php if($wittr_s_item['witr_vshow_button']=='yes' ){
													
													 if( ! empty($wittr_s_item['witr_yvideo_linkhas']['url'])){?>
														<a class="witr_btn active recpwit" href="<?php echo $wittr_s_item['witr_yvideo_linkhas'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>>
														<?php echo $wittr_s_item['witr_video_button']; ?>
														</a>
													<?php } 										

													if($wittr_s_item['witr_yshow_button']=='yes' or $wittr_s_item['witr_vmshow_button']='yes'  ){
												
														 if( ! empty($wittr_s_item['witr_yvideo_link']['url'])){?>
															<a class="witr_btn active recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="<?php echo $wittr_s_item['witr_yvideo_link'] ['url']; ?>"><i class="icofont-ui-play"></i>
															<?php echo $wittr_s_item['witr_video_button']; ?>
															</a>
														<?php } 

														if( ! empty($wittr_s_item['witr_vmvideo_link']['url'])){?>
															<a class="witr_btn active recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="vimeo" data-autoplay="true" href="<?php echo $wittr_s_item['witr_vmvideo_link'] ['url']; ?>"><i class="icofont-ui-play"></i><?php echo $wittr_s_item['witr_video_button']; ?></a>
														<?php } 
													} 
												} ?>

												<!-- Circle video button Style -->
												<?php if($wittr_s_item['witr_vshow_bvi']=='yes' ){
													if($wittr_s_item['witr_yshow_bvi']=='yes' or $wittr_s_item['witr_vmshow_bvi']='yes'  ){
												
														 if( ! empty($wittr_s_item['witr_yvideo_link_bvi']['url'])){?>
															<a class="witr_video_btn recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="<?php echo $wittr_s_item['witr_yvideo_link_bvi'] ['url']; ?>"><i class="icofont-ui-play"></i>
															<?php echo $wittr_s_item['witr_text_bvi']; ?>
															</a>
														<?php } 

														if( ! empty($wittr_s_item['witr_vmvideo_link_bvi']['url'])){?>
															<a class="witr_video_btn recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="vimeo" data-autoplay="true" href="<?php echo $wittr_s_item['witr_vmvideo_link_bvi'] ['url']; ?>"><i class="icofont-ui-play"></i><?php echo $wittr_s_item['witr_text_bvi']; ?></a>
														<?php } 
													} 
												} ?>												
											</div>
										</div>
									</div>
									<!-- social -->
									<!-- social -->
									<?php if($witrshowdata['witr_show_Icon']=='yes'){?>	
									<div class="witr_icon_section display_flex">
										<?php if(! empty($witrshowdata['witr_swiper_follow'])){?>
											<div class="witr_flow_text">
												<h5><?php echo $witrshowdata['witr_swiper_follow']; ?></h5>
											</div>
										<?php } ?>			
										<div class="themex_slider_icon witr_swiper_content_icon">
										<ul>
											<?php if( ! empty($witrshowdata['witr_icon_1'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_fb']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_1']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_2'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_tw']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_2']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_3'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_gp']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_3']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_4'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_lk']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_4']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_5'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_pi']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_5']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_6'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_in']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_6']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_7'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_us']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_7']?>"></i></a></li>
											<?php } ?>
										</ul>
										</div>
									</div>
									<?php } ?>									
								</div>
									
								<!-- slider thumb image -->
								<?php if( ! empty($wittr_s_item['witr_sitem_image']['url'])){?>
								<div class="witr_slider_thumb em_slider_s2_image">
									<div class="witr_slider_thumb_inner">
										<?php echo $txbd_image; ?>
									</div>
								</div>
								<?php } ?>

								<!-- video icon -->
								<?php if($wittr_s_item['witr_vshow_buttoni']=='yes' ){?>
								<div class="slider_vd_icon">
									<div class="slider_vd_icon_inner">
										<!-- video button -->
										<?php if(isset($wittr_s_item['witr_yvideo_linki']['url']) && ! empty($wittr_s_item['witr_yvideo_linki']['url'])){?>
											<a class="tx_svd_icon recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="<?php echo $wittr_s_item['witr_yvideo_linki'] ['url']; ?>"><i class="icofont-ui-play"></i></a>
										<?php }elseif(isset($wittr_s_item['witr_vmvideo_linki']['url']) && ! empty($wittr_s_item['witr_vmvideo_linki']['url'])){?>
											<a class="tx_svd_icon recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="vimeo" data-autoplay="true" href="<?php echo $wittr_s_item['witr_vmvideo_linki'] ['url']; ?>"><i class="icofont-ui-play"></i></a>
											<?php }else{} ?>						
									</div>
								</div>
								<?php 	} ?>										
							</div>
						</div>
					  
						<?php } ?>
					<?php } ?>

					</div>
					<!-- Add Pagination -->
					<div class="swiper-scrollbar"></div>
					<div class="swiper-pagination"></div>
					<div class="swiper-<?php echo $arrow;?>-next "></div>
					<div class="swiper-<?php echo $arrow;?>-prev"></div>					
				</div>
			</div>		
		

			<script type='text/javascript'>
				jQuery(function($){

					new Swiper('.witr_active_<?php echo $witrshowdata['witr_unicid_c'];?>', {
						  effect: 'coverflow',
						  centeredSlides: true,
						  coverflowEffect: {
							rotate: 50,
							stretch: <?php echo $stretch;?>,
							depth: <?php echo $depth;?>,
							modifier: 1,
							slideShadows: true,
						  },
						grabCursor: <?php echo $grabcursor;?>,
						speed: <?php echo $speed;?>,
						direction: '<?php echo $direction;?>',
						<?php if(isset($witrshowdata['witr_slides_to_show2']) && ! empty($witrshowdata['witr_slides_to_show2'])){?>
							slidesPerView: <?php echo $slidestoShow2;?>,
						<?php } ?>
						<?php if(isset($witrshowdata['witr_spacebetween2']) && ! empty($witrshowdata['witr_spacebetween2'])){?>
							spaceBetween: <?php echo $spacebetween2;?>,
						<?php } ?>
						freeMode: <?php echo $freemode;?>,
						mousewheel: <?php echo $mousewheel;?>,
						keyboard: <?php echo $keyboard;?>,
						loop: <?php echo $loop;?>,
						<?php echo ( is_rtl() ) ? "rtl: true," : ''; ?>
						autoplay: {
							delay: <?php echo $delay;?>,								  
							disableOnInteraction: false,
						},
						  pagination: {
							el: '.swiper-pagination',
							clickable: true,
							<?php echo $progressbar;?>: 'progressbar',
						  },
						  navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev',
						  },
						  scrollbar: {
							el: '.<?php echo $scrollbar;?>',
							hide: true,
						  },
 
						  
 
						  
					});

				});						
				
			</script>							
		<?php
		break;
		case '2':
		?>
			<!-- Swiper -->
			<div class="witr_swiper_area">
				<div class="swiper-container witr_active_<?php echo $witrshowdata['witr_unicid_c'];?> "dir="<?php echo $rtl;?>">
					<div class="swiper-wrapper" >
						<?php if( ! empty($witrshowdata['wittr_slist'])){
							foreach($witrshowdata['wittr_slist'] as $wittr_s_item){
							$target = ! empty($wittr_s_item['witr_button_link']['is_external']) ? ' target="_blank"' : '';
							$nofollow = ! empty($wittr_s_item['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';				
							$target_btn = ! empty($wittr_s_item['witr_yvideo_linkhas']['is_external']) ? ' target="_blank"' : '';
							$nofollow_btn = ! empty($wittr_s_item['witr_yvideo_linkhas']['nofollow']) ? ' rel="nofollow"' : '';
							$txbd_image = ! empty($wittr_s_item['witr_sitem_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $wittr_s_item, 'txbd_image_size', 'witr_sitem_image' ) : '';
							$txbd_top_image = ! empty($wittr_s_item['witr_swpt_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $wittr_s_item, 'txbd_top_image_size', 'witr_swpt_image' ) : '';
							$txbd_animate_image = ! empty($witrshowdata['witrani_bg_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witrshowdata, 'txbd_amimat_image_size', 'witrani_bg_image' ) : '';							
							?>		
					    <div class="swiper-slide <?php echo $res1;?> <?php echo $res2;?> <?php echo $res3;?> witr_swiper_height" <?php if( ! empty($wittr_s_item['witr_bg_image']['url'])){?> style="background-image:url(<?php echo $wittr_s_item['witr_bg_image']['url'];?>);"<?php }?>>
							<!-- witr_show_animate -->
							<?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  	
								<div class="wirt_ani_slick_image wirt_ani_swiper_image" style="animation: <?php echo $witrshowdata['anall'];?>  <?php echo $witrshowdata['adt'];?>s  <?php echo $witrshowdata['atf'];?>  <?php echo $witrshowdata['ad'];?>s  <?php echo $witrshowdata['aic'];?>  <?php echo $witrshowdata['adi'];?>  <?php echo $witrshowdata['aps'];?>;">
									<div class="wirt_ani_slick_image_inner">
										<?php echo $txbd_animate_image; ?>
									</div>
								</div>
							<?php } ?>						
						
							<div class="witr_sw_text_area text-<?php echo $witrshowdata['witr_text_ltc']; ?>">
								<div class="witr_swiper_content ">
									<?php if($wittr_s_item['witr_show_topimage']=='yes' ){ if( ! empty($wittr_s_item['witr_swpt_image']['url'])){?>
										<div class="witr_swiper_topimg">
											<?php echo $txbd_top_image; ?>
										</div> 
									<?php } } ?>								
									<!-- title -->
									<?php if( ! empty($wittr_s_item['witr_swiper_title1'])){?>
										<h1><?php  echo $wittr_s_item['witr_swiper_title1'];?></h1>
									<?php } ?>
									<!-- title 2 -->
									<?php if( ! empty($wittr_s_item['witr_swiper_title2'])){?>
										<h2><?php  echo $wittr_s_item['witr_swiper_title2'];?></h2>
									<?php } ?>
									<!-- title 3 -->
									<?php if( ! empty($wittr_s_item['witr_swiper_title3'])){?>
										<h3><?php  echo $wittr_s_item['witr_swiper_title3'];?></h3>
									<?php } ?>
									<!-- content -->
									<?php if( ! empty($wittr_s_item['witr_pragraph'])){?>
										<p><?php  echo $wittr_s_item['witr_pragraph'];?></p>
									<?php } ?>
													
									<!-- inner title -->
									<?php if( ! empty($wittr_s_item['witr_title_inner'])){?>
										<div class="witr_swipers_title">
											<h4><?php echo $wittr_s_item['witr_title_inner']; ?></h4>
										</div>
									<?php } ?>
									
									
									
									<!-- btn gradient style -->
									<div class="slider_btn">
										<div class="witr_btn_style">
											<div class="witr_btn_sinner">
												<!-- button -->
												<?php if( ! empty($wittr_s_item['witr_button_link']['url'])){?>
													<a  class="witr_btn" href="<?php echo $wittr_s_item['witr_button_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $wittr_s_item['witr_swiper_button'];?></a>
												<?php }?>

												<!-- video button 2 -->
												<?php if($wittr_s_item['witr_vshow_button']=='yes' ){
													
													 if( ! empty($wittr_s_item['witr_yvideo_linkhas']['url'])){?>
														<a class="witr_btn active recpwit" href="<?php echo $wittr_s_item['witr_yvideo_linkhas'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>>
														<?php echo $wittr_s_item['witr_video_button']; ?>
														</a>
													<?php } 										

													if($wittr_s_item['witr_yshow_button']=='yes' or $wittr_s_item['witr_vmshow_button']='yes'  ){
												
														 if( ! empty($wittr_s_item['witr_yvideo_link']['url'])){?>
															<a class="witr_btn active recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="<?php echo $wittr_s_item['witr_yvideo_link'] ['url']; ?>"><i class="icofont-ui-play"></i>
															<?php echo $wittr_s_item['witr_video_button']; ?>
															</a>
														<?php } 

														if( ! empty($wittr_s_item['witr_vmvideo_link']['url'])){?>
															<a class="witr_btn active recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="vimeo" data-autoplay="true" href="<?php echo $wittr_s_item['witr_vmvideo_link'] ['url']; ?>"><i class="icofont-ui-play"></i><?php echo $wittr_s_item['witr_video_button']; ?></a>
														<?php } 
													} 
												} ?>

												<!-- Circle video button Style -->
												<?php if($wittr_s_item['witr_vshow_bvi']=='yes' ){
													if($wittr_s_item['witr_yshow_bvi']=='yes' or $wittr_s_item['witr_vmshow_bvi']='yes'  ){
												
														 if( ! empty($wittr_s_item['witr_yvideo_link_bvi']['url'])){?>
															<a class="witr_video_btn recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="<?php echo $wittr_s_item['witr_yvideo_link_bvi'] ['url']; ?>"><i class="icofont-ui-play"></i>
															<?php echo $wittr_s_item['witr_text_bvi']; ?>
															</a>
														<?php } 

														if( ! empty($wittr_s_item['witr_vmvideo_link_bvi']['url'])){?>
															<a class="witr_video_btn recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="vimeo" data-autoplay="true" href="<?php echo $wittr_s_item['witr_vmvideo_link_bvi'] ['url']; ?>"><i class="icofont-ui-play"></i><?php echo $wittr_s_item['witr_text_bvi']; ?></a>
														<?php } 
													} 
												} ?>												
											</div>
										</div>
									</div>
									<!-- social -->
									<!-- social -->
									<?php if($witrshowdata['witr_show_Icon']=='yes'){?>	
									<div class="witr_icon_section display_flex">
										<?php if(! empty($witrshowdata['witr_swiper_follow'])){?>
											<div class="witr_flow_text">
												<h5><?php echo $witrshowdata['witr_swiper_follow']; ?></h5>
											</div>
										<?php } ?>									
										<div class="themex_slider_icon witr_swiper_content_icon">
										<ul>
											<?php if( ! empty($witrshowdata['witr_icon_1'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_fb']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_1']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_2'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_tw']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_2']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_3'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_gp']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_3']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_4'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_lk']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_4']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_5'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_pi']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_5']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_6'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_in']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_6']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_7'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_us']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_7']?>"></i></a></li>
											<?php } ?>
										</ul>
										</div>
									</div>
									<?php } ?>									
									
									
								</div>
									
								<!-- slider thumb image -->
								<?php if( ! empty($wittr_s_item['witr_sitem_image']['url'])){?>
								<div class="witr_slider_thumb em_slider_s2_image">
									<div class="witr_slider_thumb_inner">
										<?php echo $txbd_image; ?>
									</div>
								</div>
								<?php } ?>

					
								<!-- video icon -->
								<?php if($wittr_s_item['witr_vshow_buttoni']=='yes' ){?>
								<div class="slider_vd_icon">
									<div class="slider_vd_icon_inner">
										<!-- video button -->
											<?php if(isset($wittr_s_item['witr_yvideo_linki']['url']) && ! empty($wittr_s_item['witr_yvideo_linki']['url'])){?>
												<a class="tx_svd_icon recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="<?php echo $wittr_s_item['witr_yvideo_linki'] ['url']; ?>"><i class="icofont-ui-play"></i></a>
											<?php }elseif(isset($wittr_s_item['witr_vmvideo_linki']['url']) && ! empty($wittr_s_item['witr_vmvideo_linki']['url'])){?>
												<a class="tx_svd_icon recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="vimeo" data-autoplay="true" href="<?php echo $wittr_s_item['witr_vmvideo_linki'] ['url']; ?>"><i class="icofont-ui-play"></i></a>
												<?php }else{} ?>						
									</div>
								</div>
								<?php 	} ?>									
	
							</div>
							
						</div>
					  
						<?php } ?>
					<?php } ?>

					</div>
					<!-- Add Pagination -->
					<div class="swiper-scrollbar"></div>
					<div class="swiper-pagination"></div>
					<div class="swiper-<?php echo $arrow;?>-next "></div>
					<div class="swiper-<?php echo $arrow;?>-prev"></div>					
				</div>
			</div>		
		

			<script type='text/javascript'>
				jQuery(function($){

				   new Swiper('.witr_active_<?php echo $witrshowdata['witr_unicid_c'];?>', {
						effect: '<?php echo $effect;?>',
						grabCursor: <?php echo $grabcursor;?>,
						speed: <?php echo $speed;?>,
						direction: '<?php echo $direction;?>',
						<?php if(isset($witrshowdata['witr_slides_to_show']) && ! empty($witrshowdata['witr_slides_to_show'])){?>
							slidesPerView: <?php echo $slidestoShow;?>,
						<?php } ?>
						<?php if(isset($witrshowdata['witr_spacebetween']) && ! empty($witrshowdata['witr_spacebetween'])){?>
							spaceBetween: <?php echo $spacebetween;?>,
						<?php } ?>
						freeMode: <?php echo $freemode;?>,
						mousewheel: <?php echo $mousewheel;?>,
						keyboard: <?php echo $keyboard;?>,
						loop: <?php echo $loop;?>,
						<?php echo ( is_rtl() ) ? "rtl: true," : ''; ?>
						autoplay: {
							delay: <?php echo $delay;?>,								  
							disableOnInteraction: false,
						},
						  pagination: {
							el: '.swiper-pagination',
							clickable: true,
							<?php echo $progressbar;?>: 'progressbar',
						  },
						  navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev',
						  },
						  scrollbar: {
							el: '.<?php echo $scrollbar;?>',
							hide: true,
						  },					  
						  
 
						  
					});

				});						
				
			</script>							
		<?php
		break;
		
		default:
		?>
			 <!-- Swiper -->
			<div class="witr_swiper_area">
				<div class="swiper-container witr_active_<?php echo $witrshowdata['witr_unicid_c'];?>" dir="<?php echo $rtl;?>">
					<div class="swiper-wrapper" >
						<?php if( ! empty($witrshowdata['wittr_slist'])){
							foreach($witrshowdata['wittr_slist'] as $wittr_s_item){
							$target = ! empty($wittr_s_item['witr_button_link']['is_external']) ? ' target="_blank"' : '';
							$nofollow = ! empty($wittr_s_item['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';				
							$target_btn = ! empty($wittr_s_item['witr_yvideo_linkhas']['is_external']) ? ' target="_blank"' : '';
							$nofollow_btn = ! empty($wittr_s_item['witr_yvideo_linkhas']['nofollow']) ? ' rel="nofollow"' : '';
							$txbd_image = ! empty($wittr_s_item['witr_sitem_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $wittr_s_item, 'txbd_image_size', 'witr_sitem_image' ) : '';
							$txbd_top_image = ! empty($wittr_s_item['witr_swpt_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $wittr_s_item, 'txbd_top_image_size', 'witr_swpt_image' ) : '';
							$txbd_animate_image = ! empty($witrshowdata['witrani_bg_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witrshowdata, 'txbd_amimat_image_size', 'witrani_bg_image' ) : '';							
							?>		
					    <div class="swiper-slide witr_swiper_height" <?php if( ! empty($wittr_s_item['witr_bg_image']['url'])){?> style="background-image:url(<?php echo $wittr_s_item['witr_bg_image']['url'];?>);"<?php }?>>
							<!-- witr_show_animate -->
							<?php if($witrshowdata['witr_show_animate']=='yes'){ ?>  	
								<div class="wirt_ani_slick_image wirt_ani_swiper_image" style="animation: <?php echo $witrshowdata['anall'];?>  <?php echo $witrshowdata['adt'];?>s  <?php echo $witrshowdata['atf'];?>  <?php echo $witrshowdata['ad'];?>s  <?php echo $witrshowdata['aic'];?>  <?php echo $witrshowdata['adi'];?>  <?php echo $witrshowdata['aps'];?>;">
									<div class="wirt_ani_slick_image_inner">
										<?php echo $txbd_animate_image; ?>
									</div>
								</div>
							<?php } ?>						
							<div class="witr_sw_text_area text-<?php echo $witrshowdata['witr_text_ltc']; ?>">
								<div class="witr_swiper_content">
									<?php if($wittr_s_item['witr_show_topimage']=='yes' ){ if( ! empty($wittr_s_item['witr_swpt_image']['url'])){?>
										<div class="witr_swiper_topimg">
											<?php echo $txbd_top_image; ?>
										</div> 
									<?php } } ?>								
									<!-- title -->
									<?php if( ! empty($wittr_s_item['witr_swiper_title1'])){?>
										<h1><?php  echo $wittr_s_item['witr_swiper_title1'];?></h1>
									<?php } ?>
									<!-- title 2 -->
									<?php if( ! empty($wittr_s_item['witr_swiper_title2'])){?>
										<h2><?php  echo $wittr_s_item['witr_swiper_title2'];?></h2>
									<?php } ?>
									<!-- title 3 -->
									<?php if( ! empty($wittr_s_item['witr_swiper_title3'])){?>
										<h3><?php  echo $wittr_s_item['witr_swiper_title3'];?></h3>
									<?php } ?>
									<!-- content -->
									<?php if( ! empty($wittr_s_item['witr_pragraph'])){?>
										<p><?php  echo $wittr_s_item['witr_pragraph'];?></p>
									<?php } ?>
													
									<!-- inner title -->
									<?php if( ! empty($wittr_s_item['witr_title_inner'])){?>
										<div class="witr_swipers_title">
											<h4><?php echo $wittr_s_item['witr_title_inner']; ?></h4>
										</div>
									<?php } ?>
									
									
									
									<!-- btn gradient style -->
									<div class="slider_btn">
										<div class="witr_btn_style">
											<div class="witr_btn_sinner">
												<!-- button -->
												<?php if( ! empty($wittr_s_item['witr_button_link']['url'])){?>
													<a  class="witr_btn" href="<?php echo $wittr_s_item['witr_button_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $wittr_s_item['witr_swiper_button'];?></a>
												<?php }?>

												<!-- video button 2 -->
												<?php if($wittr_s_item['witr_vshow_button']=='yes' ){
													
													 if( ! empty($wittr_s_item['witr_yvideo_linkhas']['url'])){?>
														<a class="witr_btn active recpwit" href="<?php echo $wittr_s_item['witr_yvideo_linkhas'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>>
														<?php echo $wittr_s_item['witr_video_button']; ?>
														</a>
													<?php } 										

													if($wittr_s_item['witr_yshow_button']=='yes' or $wittr_s_item['witr_vmshow_button']='yes'  ){
												
														 if( ! empty($wittr_s_item['witr_yvideo_link']['url'])){?>
															<a class="witr_btn active recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="<?php echo $wittr_s_item['witr_yvideo_link'] ['url']; ?>"><i class="icofont-ui-play"></i>
															<?php echo $wittr_s_item['witr_video_button']; ?>
															</a>
														<?php } 

														if( ! empty($wittr_s_item['witr_vmvideo_link']['url'])){?>
															<a class="witr_btn active recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="vimeo" data-autoplay="true" href="<?php echo $wittr_s_item['witr_vmvideo_link'] ['url']; ?>"><i class="icofont-ui-play"></i><?php echo $wittr_s_item['witr_video_button']; ?></a>
														<?php } 
													} 
												} ?>

												<!-- Circle video button Style -->
												<?php if($wittr_s_item['witr_vshow_bvi']=='yes' ){
													if($wittr_s_item['witr_yshow_bvi']=='yes' or $wittr_s_item['witr_vmshow_bvi']='yes'  ){
												
														 if( ! empty($wittr_s_item['witr_yvideo_link_bvi']['url'])){?>
															<a class="witr_video_btn recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="<?php echo $wittr_s_item['witr_yvideo_link_bvi'] ['url']; ?>"><i class="icofont-ui-play"></i>
															<?php echo $wittr_s_item['witr_text_bvi']; ?>
															</a>
														<?php } 

														if( ! empty($wittr_s_item['witr_vmvideo_link_bvi']['url'])){?>
															<a class="witr_video_btn recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="vimeo" data-autoplay="true" href="<?php echo $wittr_s_item['witr_vmvideo_link_bvi'] ['url']; ?>"><i class="icofont-ui-play"></i><?php echo $wittr_s_item['witr_text_bvi']; ?></a>
														<?php } 
													} 
												} ?>

	
											</div>
										</div>
									</div>
									<!-- social -->
									<?php if($witrshowdata['witr_show_Icon']=='yes'){?>	
									<div class="witr_icon_section display_flex">
										<?php if(! empty($witrshowdata['witr_swiper_follow'])){?>
											<div class="witr_flow_text">
												<h5><?php echo $witrshowdata['witr_swiper_follow']; ?></h5>
											</div>
										<?php } ?>			
										<div class="themex_slider_icon witr_swiper_content_icon">
										<ul>
											<?php if( ! empty($witrshowdata['witr_icon_1'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_fb']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_1']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_2'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_tw']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_2']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_3'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_gp']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_3']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_4'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_lk']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_4']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_5'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_pi']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_5']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_6'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_in']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_6']?>"></i></a></li>
											<?php } if( ! empty($witrshowdata['witr_icon_7'])){?>
												<li><a href="<?php echo $witrshowdata['witr_swiper_us']['url'];?>"><i class="<?php echo $witrshowdata['witr_icon_7']?>"></i></a></li>
											<?php } ?>
										</ul>
										</div>
									</div>
									<?php } ?>									
									
									
								</div>
									
								<!-- slider thumb image -->
								<?php if( ! empty($wittr_s_item['witr_sitem_image']['url'])){?>
								<div class="witr_slider_thumb em_slider_s2_image">
									<div class="witr_slider_thumb_inner">
										<?php echo $txbd_image; ?>
									</div>
								</div>
								<?php } ?>

					
								<!-- video icon -->
								<?php if($wittr_s_item['witr_vshow_buttoni']=='yes' ){?>
								<div class="slider_vd_icon">
									<div class="slider_vd_icon_inner">
										<!-- video button -->
											<?php if(isset($wittr_s_item['witr_yvideo_linki']['url']) && ! empty($wittr_s_item['witr_yvideo_linki']['url'])){?>
												<a class="tx_svd_icon recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="<?php echo $wittr_s_item['witr_yvideo_linki'] ['url']; ?>"><i class="icofont-ui-play"></i></a>
											<?php }elseif(isset($wittr_s_item['witr_vmvideo_linki']['url']) && ! empty($wittr_s_item['witr_vmvideo_linki']['url'])){?>
												<a class="tx_svd_icon recpwit video-popup video-vemo-icon venobox vbox-item" data-vbtype="vimeo" data-autoplay="true" href="<?php echo $wittr_s_item['witr_vmvideo_linki'] ['url']; ?>"><i class="icofont-ui-play"></i></a>
												<?php }else{} ?>						
									</div>
								</div>
								<?php 	} ?>									
	
							</div>
							
						</div>
					  
						<?php } ?>
					<?php } ?>

					</div>
					<!-- Add Pagination -->
					<!-- Add Pagination -->
					<div class="swiper-scrollbar"></div>
					<div class="swiper-pagination"></div>
					<div class="swiper-<?php echo $arrow;?>-next "></div>
					<div class="swiper-<?php echo $arrow;?>-prev"></div>					
				</div>
			</div>		

					<script type='text/javascript'>
						jQuery(function($){

						   new Swiper('.witr_active_<?php echo $witrshowdata['witr_unicid_c'];?>', {
							   
							  effect: 'cube',
								cubeEffect: {
									shadow: false,
									slideShadows: true,
									shadowOffset: 20,
									shadowScale: 0.94,
								},						
								grabCursor: <?php echo $grabcursor;?>,
								speed: <?php echo $speed;?>,
								direction: '<?php echo $direction;?>',
								freeMode: <?php echo $freemode;?>,
								mousewheel: <?php echo $mousewheel;?>,
								keyboard: <?php echo $keyboard;?>,
								loop: <?php echo $loop;?>,
								<?php echo ( is_rtl() ) ? "rtl: true," : ''; ?>
								autoplay: {
									delay: <?php echo $delay;?>,								  
									disableOnInteraction: false,
								},
								  pagination: {
									el: '.swiper-pagination',
									clickable: true,
									<?php echo $progressbar;?>: 'progressbar',
								  },
								  navigation: {
									nextEl: '.swiper-button-next',
									prevEl: '.swiper-button-prev',
								  },
								  scrollbar: {
									el: '.<?php echo $scrollbar;?>',
									hide: true,
								  },							   
								  
							});

						});						
						
					</script>							
		<?php		
		break;
		
		
	} /*=== end switch ====*/	

	

       
	} 



}