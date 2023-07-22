<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Feature_Carousel extends Widget_Base {

    public function get_name() {
        return 'witr_section_cfeature';
    }
  
    public function get_title() {
        return esc_html__( ' Feature Carousel', 'themex' );
    }

    public function get_icon() {
        return 'themex_icon eicon-slides';
    }
    public function get_style_depends() {
        return [ 'wfeature' ];
    }	
	public function get_script_depends() {
        return [  ];
    }	
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {

			/* === w_case start === */
			$this->start_controls_section(
				'witr_field_display_case',
				[
					'label' => esc_html__( ' Carousel Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);	

			/* === witr_style_call start === */
				$this->add_control(
					'witr_style_feature',
					[
						'label' => esc_html__( 'Select Slides Style', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator' => 'before',
						'options' => [
							'1' => esc_html__( ' Feature Style 1', 'themex' ),
							'2' => esc_html__( ' Feature Style 2', 'themex' ),
							'3' => esc_html__( ' Feature Style 3', 'themex' ),
							'4' => esc_html__( ' Feature Style 3D', 'themex' ),
							'5' => esc_html__( ' Feature Style 5', 'themex' ),
							'6' => esc_html__( ' Feature Style 6', 'themex' ),
							'7' => esc_html__( ' Feature Style 7', 'themex' ),
							'8' => esc_html__( ' Feature Style 8', 'themex' ),
							'9' => esc_html__( ' Feature Style 9', 'themex' ),
							'10' => esc_html__( ' Feature Style 10', 'themex' ),
							'11' => esc_html__( ' Feature Style 11', 'themex' ),
						
						],
						'default' => '1',
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
							'condition' => [
								'witr_style_feature' => ['1','2','4','5','6','7','8','9','10','11'],
							],							
						]
					);
				/* witr_xyz */
				$this->add_control(
					'witr_xyz',
					[
						'label' => esc_html__( 'Flip Box', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'witr_feature_flip_left',
						'options' => [
							'witr_feature_flip_left' => esc_html__( 'Left', 'themex' ),
							'witr_feature_flip_right' => esc_html__( 'Right', 'Down' ),
							'witr_feature_flip_up' => esc_html__( 'Up', 'themex' ),
							'witr_feature_flip_down' => esc_html__( 'Down', 'themex' ),
							'witr_feature_flip_zoomin' => esc_html__( 'Zoom In', 'Down' ),
							'witr_feature_flip_zoomout' => esc_html__( 'Zoom Out', 'Down' ),
						],
						'condition' => [
							'witr_style_feature' =>['4'],
						],						
					]
				);					
					
					$repeater = new Repeater();	
					/* witr_show_icon witr_icon_item */
					$repeater->add_control(
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
					$repeater->add_control(
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
					$repeater->add_control(
						'witr_show_custom',
						[
							'label' => esc_html__( 'Show custom Icon', 'themex' ),
							'type' => Controls_Manager::SWITCHER,
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'return_value' => 'yes',
							'default' => 'no',
							'separator'=>'before',							
						]
					);
					/*  witr_feature_custom	*/
					$repeater->add_control(
						'witr_feature_custom',
						[
							'label' => esc_html__( 'Custom Icon Name', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Type Icofont - https://icofont.com/icons or Themify Icon -https://themify.me/themify-icons or Fontawesome Icon - https://fontawesome.com/cheatsheet name here', 'themex' ),
							'default' => esc_html__( 'icofont-adjust', 'themex' ),
							'placeholder' => esc_attr__( 'Type your Custom Icon Name here', 'themex' ),
							'condition' => [
								'witr_show_custom' => 'yes',
							],							
						]
					);					
					
					
				/* witr_show_image witr_feature_image */
					$repeater->add_control(
						'witr_show_image',
						[
							'label' => esc_html__( 'Show Icon Image', 'themex' ),
							'type' => Controls_Manager::SWITCHER,
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'return_value' => 'yes',
							'default' => 'no',
							'separator'=>'before',							
						]
					);
					/* witr_show_animate */
					$repeater->add_control(
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
				
					$repeater->add_control(
						'witr_feature_image',
						[
							'label' => esc_html__( 'Choose Image', 'themex' ),
							'type' => Controls_Manager::MEDIA,
							'condition' => [
								'witr_show_image' => 'yes',
							],							
						]
					);
				/* txbd_icon_image_size */
				$repeater->add_group_control(
					Group_Control_Image_Size::get_type(),
					[
						'name' => 'txbd_icon_image_size',
						'default' => 'large',
						'separator' => 'none',
						'condition' => [
							'witr_show_image' => 'yes',
						]
					]
				);					
					/* witr_feature_title */	
					$repeater->add_control(
						'witr_feature_title',
						[
							'label' => esc_html__( 'Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use title, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Enter Your Title', 'themex' ),
							'separator'=>'before',
							'placeholder' => esc_attr__( 'Type your  title here', 'themex' ),						
						]
					);
					/* witr_feature_title_link */	
					$repeater->add_control(
						'witr_feature_title_link',
						[
							'label' => esc_html__( 'Title Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert Title link here.','themex'),
							'placeholder' => esc_attr__( 'https://your_site.com', 'themex' ),
							'show_external' => true,
							'default' => [
								'url' => '#',
							],								
						]
					);
					/* witr_feature_title */	
					$repeater->add_control(
						'witr_feature_sub_title',
						[
							'label' => esc_html__( 'Sub Title', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'separator'=>'before',
							'description' => esc_html__( 'Not use Sub title, remove the text from field', 'themex' ),
							'placeholder' => esc_attr__( 'Type your Sub title here', 'themex' ),					
						]
					);					
					
					/* witr_feature_content	*/
					$repeater->add_control(
						'witr_feature_content',
						[
							'label' => esc_html__( ' Content', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use content text, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Qeual blame belongs to those who fail in their duty. ', 'themex' ),
							'separator'=>'before',
							'placeholder' => esc_attr__( 'Type your content here', 'themex' ),
						]
					);										

					/* witr_show_button */
					$repeater->add_control(
						'witr_show_button',
						[
							'label' => esc_html__( 'Show Button', 'themex' ),
							'type' => Controls_Manager::SWITCHER,
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'return_value' => 'yes',
							'default' => 'yes',
							'separator'=>'before',							
						]
					);
					
				/* witr_case_button	*/
					$repeater->add_control(
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
				/*  witr_button_link */	
					$repeater->add_control(
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

					/* witr_show_number */
					$repeater->add_control(
						'witr_show_number',
						[
							'label' => esc_html__( 'Show Number', 'themex' ),
							'type' => Controls_Manager::SWITCHER,
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'return_value' => 'yes',
							'default' => 'yes',
							'separator'=>'before',							
						]
					);					
				/* witr_feature_number */	
					$repeater->add_control(
						'witr_feature_number',
						[
							'label' => esc_html__( 'Number', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Not use number, remove the text from field,Number Working Style 1,6,8,10', 'themex' ),
							'default' => esc_html__( '01', 'themex' ),
							'placeholder' => esc_attr__( 'Type your number here', 'themex' ),
							'condition' => [
								'witr_show_number' => 'yes',
							],							
						]
					);					
					
				/* witr_show_image witr_feature_image */
					$repeater->add_control(
						'witr_show_bo_image',
						[
							'label' => esc_html__( 'Show Image Only Style 5,7,9,11', 'themex' ),
							'type' => Controls_Manager::SWITCHER,
							'label_on' => esc_html__( 'Show', 'themex' ),
							'label_off' => esc_html__( 'Hide', 'themex' ),
							'return_value' => 'yes',
							'default' => 'yes',
							'separator'=>'before',							
						]
					);									
					$repeater->add_control(
						'witr_feature_bo_image',
						[
							'label' => esc_html__( 'Choose Image', 'themex' ),
							'type' => Controls_Manager::MEDIA,
							'default' => [
								'url' => Utils::get_placeholder_image_src(),
							],
							'condition' => [
								'witr_show_bo_image' => 'yes',
							],							
						]
					);
					/* txbd_image_size */
					$repeater->add_group_control(
						Group_Control_Image_Size::get_type(),
						[
							'name' => 'txbd_image_size',
							'default' => 'large',
							'separator' => 'none',
							'condition' => [
								'witr_show_bo_image' => 'yes',
							]
						]
					);					
				/* witr_show_button*/
				$repeater->add_control(
					'witr_vshow_icon',
					[
						'label' => esc_html__( 'Show Video Show Style 11', 'themex' ),
						'type' => Controls_Manager::SWITCHER,
						'separator'=>'before',
						'label_on' => esc_html__( 'Show', 'themex' ),
						'label_off' => esc_html__( 'Hide', 'themex' ),
						'return_value' => 'yes',
						'default' => 'yes',
						'description' =>esc_html__('Use Youtube or Vimeo video link','themex'),
						'condition' => [
							'witr_show_bo_image' => 'yes',
						],						
					]
				);
				/*  witr_icon_video	*/
				$repeater->add_control(
					'witr_icon_video',
					[
						'label' => esc_html__( 'Video Icon Name', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'description' => esc_html__( 'Type Icofont - https://icofont.com/icons or Themify Icon -https://themify.me/themify-icons or Fontawesome Icon - https://fontawesome.com/cheatsheet name here', 'themex' ),
						'default' => esc_html__( 'icofont-ui-play', 'themex' ),
						'placeholder' => esc_attr__( 'Type your Custom Icon Name here', 'themex' ),
						'condition' => [
							'witr_vshow_icon' => 'yes',

						],						
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
								'witr_vshow_icon' => 'yes',

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
								'witr_vshow_icon' => 'yes',
							],							
						]
					);					
					/*  witr_iconcarf_bottom	*/
					$repeater->add_control(
						'witr_iconcarf_bottom',
						[
							'label' => esc_html__( 'Bottom Icon Show Style 11', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'separator'=>'before',
							'description' => esc_html__( 'Type Icofont - https://icofont.com/icons or Themify Icon -https://themify.me/themify-icons or Fontawesome Icon - https://fontawesome.com/cheatsheet name here', 'themex' ),
							'default' => esc_html__( 'fas fa-arrow-right', 'themex' ),
							'placeholder' => esc_attr__( 'Type your Custom Icon Name here', 'themex' ),						
						]
					);
					$repeater->add_control(
						'witr_iconcarfl_bottom',
						[
							'label' => esc_html__( 'Bottom Icon Link', 'themex' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert button link. It hidden when field blank. link ex- https:example.com/','themex'),
							'show_external' => true,
							'default' => [
								'url' => '#',
							],	
							
						]
					);					
				
				
					$repeater->add_control(
						'witr_feature_imgtext',
						[
							'label' => esc_html__( 'Choose Image, Style 7', 'themex' ),
							'type' => Controls_Manager::MEDIA,
							'separator'=>'before',
							'description' => esc_html__( 'Recommended Image Size width= 30x height=36px', 'themex' ),
						]
					);					
					/* witr_feature_title */	
					$repeater->add_control(
						'witr_imgtext_title',
						[
							'label' => esc_html__( 'Title, Style 7', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Not use title, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Internate', 'themex' ),
							'placeholder' => esc_attr__( 'Type your  title here', 'themex' ),							
						]
					);
					$repeater->add_control(
						'witr_feature_imgtext2',
						[
							'label' => esc_html__( 'Choose Image, Style 7', 'themex' ),
							'type' => Controls_Manager::MEDIA,
							'separator'=>'before',
							'description' => esc_html__( 'Recommended Image Size width= 30x height=36px', 'themex' ),							
						]
					);					
					/* witr_feature_title */	
					$repeater->add_control(
						'witr_imgtext_title2',
						[
							'label' => esc_html__( 'Title, Style 7', 'themex' ),
							'type' => Controls_Manager::TEXT,
							'description' => esc_html__( 'Not use title, remove the text from field', 'themex' ),
							'default' => esc_html__( 'Unlimited Data', 'themex' ),
							'placeholder' => esc_attr__( 'Type your  title here', 'themex' ),							
						]
					);

					
					/* witr_list_tslide */
					$this->add_control(
						'witr_list_cslide',
						[
							'label' => esc_html__( 'Repeater List', 'themex' ),
							'type' => Controls_Manager::REPEATER,
							'separator'=>'before',
							'fields' => $repeater->get_controls(),
							'default' => [
								[
									'witr_feature_title' => esc_html__( 'Add your Title', 'themex' ),
									'witr_feature_content' => esc_html__( 'Content Text Here', 'themex' ),
									
								],

							],
							'title_field' => '{{{ witr_feature_title }}}',
							'content_field' => '{{{ witr_feature_content }}}',
						]
					);					
		
					
			$this->end_controls_section();
			/* === end w_case ===  */


			/* === witr_Carousel start === */
			$this->start_controls_section(
				'witr_field_display_image',
				[
					'label' => esc_html__( 'Slick Options', 'themex' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
				
				/* witr_slides_to_show */ 		
				$this->add_control(
					'witr_slides_to_show',
					[
						'label' => esc_html__( 'Slides to Show', 'themex' ),
						'type' => Controls_Manager::TEXT,
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
						'label' => esc_html__( 'AutoplaySpeed', 'themex' ),
						'type' => Controls_Manager::TEXT,
						'separator' => 'before',
						'description' => esc_html__( 'Type your autoplaySpeed Number here, ex-1000ms=1s.', 'themex' ),
						'default' => 6000,
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
						'default' =>2,
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
				/* witr_unicid_c */	
					$this->add_control(
						'witr_unicid_c',
						[
							'label' => esc_html__( 'Use Uniqe ID', 'themex' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Please use a unic ID here, ex- wittr_1.', 'themex' ),
							'default' => 'idps',
							'placeholder' => esc_attr__( 'Type your ID here', 'themex' ),						
						]
					);				
				
												
			
			$this->end_controls_section();
			/* === end witr_image ===  */	

			
			
			
	   /*==================================================================================================================================================================
										START TO STYLE
		=============================================================================================*/			


		/*=== start single Feature style ====*/
		$this->start_controls_section(
			'witr_style_ss_option',
			[
				'label' => esc_html__( 'Single Box', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_feature' =>['1','2','3','5','6','7','8','9','10','11'],
				],
				
			]
		);		


				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_single_bb',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .all_feature_color',
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
							'{{WRAPPER}} .all_feature_color,{{WRAPPER}} .feature_inner_box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'selector' => '{{WRAPPER}} .witr_feature_12.sub-item,{{WRAPPER}} .feature_inner_box,{{WRAPPER}} .all_feature_color',							
					]
				);				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadowsbox',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .all_feature_color,{{WRAPPER}} .feature_inner_box',
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
							'{{WRAPPER}} .feature_inner_box,{{WRAPPER}} .witr_feature_12.sub-item,{{WRAPPER}} .all_feature_color' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .feature_inner_box,{{WRAPPER}} .witr_feature_12.sub-item,{{WRAPPER}} .all_feature_color' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_control(
					'witr_moref_heading',
					[
						'label' => esc_html__( 'Hover Option', 'themex' ),
						'type' => Controls_Manager::HEADING,
						'separator' => 'before',
					]
				);	
				/* box background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_boxho_background',
						'label' => esc_html__( ' Background', 'themex' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_feature_12.sub-item:hover,{{WRAPPER}} .feature_inner_box:hover,{{WRAPPER}} .all_feature_color:hover',							
					]
				);				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadowsboxh',
						'label' => esc_html__( 'Box Shadow Hover', 'themex' ),
						'selector' => '{{WRAPPER}} .all_feature_color:hover,{{WRAPPER}} .feature_inner_box:hover',
					]
				);
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_singleh_bb',
						'label' => esc_html__( 'Border Hover', 'themex' ),
						'selector' => '{{WRAPPER}} .all_feature_color:hover',
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
			/*  button witr_btn_button */	
				$this->add_control(
					'witr_Select_whi',
					[
						'label' => esc_html__( 'Select Icon Style', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'multiple' => true,
						'options' => [
							'same2' => esc_html__( 'Default', 'themex' ),
							'width_height_link_02'  => esc_html__( 'Background Custom', 'themex' ),						
						],
						'condition' => [
							'witr_style_feature' =>['1','7','8'],
						],						
					]
				);				
				/* Icon Color */
				$this->add_control(
					'witr_primary_color',
					[
						'label' => esc_html__( ' Color', 'themex' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .all_feature_color i,{{WRAPPER}} .all_topicon_color i' => 'color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .all_feature_color i,{{WRAPPER}} .all_topicon_color i',
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
							'{{WRAPPER}} .all_feature_color i,{{WRAPPER}} .all_topicon_color i' => 'font-size: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .all_feature_color i,{{WRAPPER}} .witr_cfeature9 .sub-item i::after,{{WRAPPER}} .all_topicon_color i' => 'width: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .all_feature_color i,{{WRAPPER}} .witr_cfeature9 .sub-item i::after,{{WRAPPER}} .all_topicon_color i' => 'height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .all_feature_color i,{{WRAPPER}} .all_topicon_color i' => 'line-height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .all_feature_color i,{{WRAPPER}} .all_topicon_color i' => 'text-align: {{VALUE}}',
						],
					]
				);				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_borderf',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .all_feature_color i,{{WRAPPER}} .all_topicon_color i',
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
							'{{WRAPPER}} .all_feature_color i,{{WRAPPER}} .all_topicon_color i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
					
				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow',
						'label' => esc_html__( 'Box Shadow', 'themex' ),
						'selector' => '{{WRAPPER}} .all_feature_color i,{{WRAPPER}} .all_topicon_color i',
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
							'{{WRAPPER}} .all_feature_color i,{{WRAPPER}} .all_topicon_color i' => 'mix-blend-mode: {{VALUE}}',
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
							'{{WRAPPER}} .all_feature_color i,{{WRAPPER}} .all_topicon_color i' => 'transform: rotate({{SIZE}}{{UNIT}});',
						],
					]
				);				
				/* witr_position_style */
				$this->add_responsive_control(
					'witr_position_style',
					[
						'label' => esc_html__( 'Icon Position', 'themex' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'' => esc_html__( 'Default', 'themex' ),
							'absolute' => esc_html__( 'absolute', 'themex' ),
							'fixed' => esc_html__( 'fixed', 'themex' ),
							'inherit' => esc_html__( 'inherit', 'themex' ),
						],
						'selectors' => [
							'{{WRAPPER}} .all_feature_color i,{{WRAPPER}} .feature_topicon_post ' => 'position: {{VALUE}};',
						],							
					]
				);
				/* witr_icon_top */
				$this->add_responsive_control(
					'witr_icon_top',
					[
						'label' => esc_html__( 'Icon Top', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => -100,
								'max' => 500,
							],
							'%' => [
								'min' => -100,
								'max' => 100,
							],		
						],
						'condition' => [
							'witr_position_style' => ["absolute","fixed"],
						],						
						'selectors' => [
							'{{WRAPPER}} .all_feature_color i,{{WRAPPER}} .feature_topicon_post' => 'top: {{SIZE}}{{UNIT}};',
						],
					]
				);
				
				/* witr_icon_left */
				$this->add_responsive_control(
					'witr_icon_left',
					[
						'label' => esc_html__( 'Icon Left', 'themex' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => -100,
								'max' => 500,
							],
							'%' => [
								'min' => -100,
								'max' => 100,
							],	
						],
						'condition' => [
							'witr_position_style' => ["absolute","fixed"],
						],						
						'selectors' => [
							'{{WRAPPER}} .all_feature_color i,{{WRAPPER}} .feature_topicon_post' => 'left: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .all_feature_color i,{{WRAPPER}} .all_topicon_color i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .all_feature_color i,{{WRAPPER}} .all_topicon_color i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .all_feature_color:hover i,{{WRAPPER}} .all_topicon_color i:hover' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .all_feature_color:hover i,{{WRAPPER}} .all_topicon_color i:hover',
						]
					);
					/* border_hover_color */
					$this->add_control(
						'witr_border_hover_color',
						[
							'label' => esc_html__( 'Border Hover Color', 'themex' ),
							'type' => Controls_Manager::COLOR,
							
							'selectors' => [
								'{{WRAPPER}} .all_feature_color:hover i,{{WRAPPER}} .all_topicon_color i:hover' => 'border-color: {{VALUE}}',
							],
						]
					);
					/* box shadow color */	
					$this->add_group_control(
						Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'witr_boxh_shadow',
							'label' => esc_html__( 'Box Shadow', 'themex' ),
							'selector' => '{{WRAPPER}} .all_feature_color i:hover,{{WRAPPER}} .all_topicon_color i:hover',
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
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_img_bb',
						'label' => esc_html__( 'Border', 'themex' ),
						'selector' => '{{WRAPPER}} .single_seivice_ani img,{{WRAPPER}} .all_feature_color img',
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


		/*=== start witr_title style ====*/
		$this->start_controls_section(
			'witr_style_option_title2',
			[
				'label' => esc_html__( 'Sub Title Color Option', 'themex' ),
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
						'default' => Global_Colors::COLOR_SECONDARY,
					],					
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .all_feature_color h2,{{WRAPPER}} .all_feature_color h2 a' => 'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
				'witr_title_hover_color2',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .all_feature_color h2:hover,{{WRAPPER}} .all_feature_color h2 a:hover' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .all_feature_color h2,{{WRAPPER}} .all_feature_color h2 a',
				]
			);			
			/* title margin */
			$this->add_responsive_control(
				'witr_title_margin2',
				[
					'label' => esc_html__( 'Margin', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_feature_color h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* title padding */
			$this->add_responsive_control(
				'witr_title_padding2',
				[
					'label' => esc_html__( 'Padding', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_feature_color h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .feature_btn a,{{WRAPPER}} .witr_feature_btn_3d a,{{WRAPPER}} .witr_feature_btn_f a' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .feature_btn a,{{WRAPPER}} .witr_feature_btn_3d a,{{WRAPPER}} .witr_feature_btn_f a',
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
							'selector' => '{{WRAPPER}} .feature_btn a,{{WRAPPER}} .witr_feature_btn_3d a,{{WRAPPER}} .witr_feature_btn_f a',
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
								'{{WRAPPER}} .feature_btn a,{{WRAPPER}} .witr_feature_btn_3d a,{{WRAPPER}} .witr_feature_btn_f a' => 'border-style: {{VALUE}}',
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
								'{{WRAPPER}} .feature_btn a,{{WRAPPER}} .witr_feature_btn_3d a,{{WRAPPER}} .witr_feature_btn_f a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .feature_btn a,{{WRAPPER}} .witr_feature_btn_3d a,{{WRAPPER}} .witr_feature_btn_f a' => 'border-color: {{VALUE}}',
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
								'{{WRAPPER}} .feature_btn a,{{WRAPPER}} .witr_feature_btn_3d a,{{WRAPPER}} .witr_feature_btn_f a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .feature_btn a,{{WRAPPER}} .witr_feature_btn_3d a,{{WRAPPER}} .witr_feature_btn_f a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .feature_btn a,{{WRAPPER}} .witr_feature_btn_3d a,{{WRAPPER}} .witr_feature_btn_f a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .feature_btn a:hover,{{WRAPPER}} .witr_feature_btn_3d a:hover,{{WRAPPER}} .witr_feature_btn_f a:hover' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .feature_btn a:hover,{{WRAPPER}} .witr_feature_btn_3d a:hover,{{WRAPPER}} .witr_feature_btn_f a:hover',
						]
					);
					/* witr_hoverborder_style */
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'witr_hoverborder_style',
							'label' => esc_html__( 'Button Hover Border', 'themex' ),
							'selector' => '{{WRAPPER}} .feature_btn a:hover,{{WRAPPER}} .witr_feature_btn_3d a:hover,{{WRAPPER}} .witr_feature_btn_f a:hover',
						]
					);
					
					
					
					$this->end_controls_tab();
					/*=== end button hover style ====*/
			$this->end_controls_tabs();
			/*=== end button_tabs style ====*/			
		 $this->end_controls_section();
		/*=== end  witr button style ====*/		

			
		/*=== start witr_Number style ====*/

		$this->start_controls_section(
			'witr_style_option_number',
			[
				'label' => esc_html__( 'Number Option', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_style_feature' => ['1','6','8','9','10'],
					],				
			]
		);	

		
			/* number Color */
			$this->add_control(
				'witr_number_color',
				[
					'label' => esc_html__( 'Number Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_SECONDARY,
					],					
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .all_feature_color span,{{WRAPPER}} .all_feature_color h2' => 'color: {{VALUE}}',
					],
					
				]
			);
			/* number background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_num_background',
					'label' => esc_html__( 'Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .all_feature_color .sub-item span',					
				]
			);
			/* Number border_color */
			$this->add_control(
				'witr_border_admin_color',
				[
					'label' => esc_html__( 'Number Background Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'description' => esc_html__( 'Working Style 8 Number Background Color Use, Not Use Top Option Background Type Color', 'themex' ),
					'selectors' => [
						'{{WRAPPER}} .witr_cfeature8 .sub-item span::before' => 'border-top-color: {{VALUE}};border-right-color: {{VALUE}};border-bottom-color: {{VALUE}}',
					],
					'condition' => [
						'witr_style_feature' => ['8'],
					],					
				]
			);
			/* number typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_number_typography',
					'label' => esc_html__( 'Typography', 'themex' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
					],
					'selector' => '{{WRAPPER}} .all_feature_color span,{{WRAPPER}} .all_feature_color h2',
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
							'min' => -100,
							'max' => 500,
						],
						'%' => [
							'min' => -100,
							'max' => 500,
						],
						'em' => [
							'min' => -100,
							'max' => 500,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .all_feature_color span,{{WRAPPER}} .all_feature_color h2' => 'top: {{SIZE}}{{UNIT}};',
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
							'min' => -100,
							'max' => 500,
						],
						'%' => [
							'min' => -100,
							'max' => 500,
						],
						'em' => [
							'min' => -100,
							'max' => 500,
						],
						
					],
					'selectors' => [
						'{{WRAPPER}} .all_feature_color span,{{WRAPPER}} .all_feature_color h2' => 'left: {{SIZE}}{{UNIT}};',
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
							'min' => -100,
							'max' => 500,
						],
						'%' => [
							'min' => -100,
							'max' => 500,
						],
						'em' => [
							'min' => -100,
							'max' => 500,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .all_feature_color span,{{WRAPPER}} .all_feature_color h2' => 'right: {{SIZE}}{{UNIT}};',
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
							'min' => -100,
							'max' => 500,
						],
						'%' => [
							'min' => -100,
							'max' => 500,
						],
						'em' => [
							'min' => -100,
							'max' => 500,
						],
						
					],
					'selectors' => [
						'{{WRAPPER}} .all_feature_color span,{{WRAPPER}} .all_feature_color h2' => 'bottom: {{SIZE}}{{UNIT}};',
					],					
				]
			);

			/* heading2 */
			$this->add_control(
				'witr_headib_color',
				[
					'label' => esc_html__( 'Bar Top, Left, Opacity Option Working Style 6', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'separator'=>'before',
					'condition' => [
						'witr_style_feature' => ['6'],
					],					
				]
			);
			/* witr_bar_opacity */
			$this->add_control(
				'witr_bar_opacity',
				[
					'label' => esc_html__( 'Bar Opacity', 'themex' ),
					'type' => Controls_Manager::TEXT,
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .witr_feature_13 .sub-item::before,{{WRAPPER}} .witr_feature_13 .sub-item::after' => 'opacity: {{VALUE}}',
					],					
					'condition' => [
						'witr_style_feature' => ['6'],
					],					
				]
			);			
			/* witr_top */
			$this->add_responsive_control(
				'witrb_topt',
				[
					'label' => esc_html__( 'Bar Top', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 500,
						],
						'%' => [
							'min' => -500,
							'max' => 500,
						],
						'em' => [
							'min' => -500,
							'max' => 500,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .witr_feature_13 .sub-item::before,{{WRAPPER}} .witr_feature_13 .sub-item::after' => 'top: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_feature' => ['6'],
					],					
				]
			);
			
			/* witr_left */
			$this->add_responsive_control(
				'witrb_leftl',
				[
					'label' => esc_html__( 'Bar Left', 'themex' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em' ],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 500,
						],
						'%' => [
							'min' => -500,
							'max' => 500,
						],
						'em' => [
							'min' => -500,
							'max' => 500,
						],
						
					],
					'selectors' => [
						'{{WRAPPER}} .witr_feature_13 .sub-item::before,{{WRAPPER}} .witr_feature_13 .sub-item::after' => 'left: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_feature' => ['6'],
					],					

				]
			);			
			
			/* heading2 */
			$this->add_control(
				'witr_headi_color',
				[
					'label' => esc_html__( 'Hover Color Option', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'separator'=>'before',					
				]
			);
			$this->add_control(
				'witr_number_hovercolor',
				[
					'label' => esc_html__( 'Number Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .all_feature_color:hover span,{{WRAPPER}} .all_feature_color:hover h2' => 'color: {{VALUE}}',
					],
					
				]
			);			
			/* number Hover background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_numh_background',
					'label' => esc_html__( 'Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .all_feature_color .sub-item:hover span,{{WRAPPER}} .witr_feature_13 .sub-item:hover::before',					
				]
			);
			/* Number border_color */
			$this->add_control(
				'witr_border_ana_color',
				[
					'label' => esc_html__( 'Number Background Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'description' => esc_html__( 'Working Style 8 Number Background Color Use, Not Use Top Option Background Type Color', 'themex' ),
					'selectors' => [
						'{{WRAPPER}} .witr_cfeature8 .sub-item span:hover::before' => 'border-top-color: {{VALUE}};border-right-color: {{VALUE}};border-bottom-color: {{VALUE}}',
					],
					'condition' => [
						'witr_style_feature' => ['8'],
					],					
				]
			);			
			
					
		 $this->end_controls_section();
		/*=== end  witr_Number style ====*/			
		

		/*=== start All Text style ====*/
		$this->start_controls_section(
			'witr_style_all_content',
			[
				'label' => esc_html__( 'All Text And BG Hover Color', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_feature' =>['3','4'],
				],					
			]
		);		 
			/* color */
			$this->add_control(
				'witr_alltitle_color',
				[
					'label' => esc_html__( 'All Text Color Hover', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .em-feature:hover .feature_button a,{{WRAPPER}} .em-feature:hover h2,{{WRAPPER}} .em-feature:hover h3,{{WRAPPER}} .em-feature:hover h3 a,{{WRAPPER}} .em-feature:hover .em-feature-desc,{{WRAPPER}} .em-feature:hover .em_feature-icon,{{WRAPPER}} .all_feature_color:hover .witr_feature_icon_3d i,{{WRAPPER}} .all_feature_color:hover .witr_feature_content_3d h3,{{WRAPPER}} .all_feature_color:hover .witr_feature_content_3d h3 a,{{WRAPPER}} .all_feature_color:hover .witr_feature_content_3d h2,{{WRAPPER}} .all_feature_color:hover .witr_feature_content_3d p,{{WRAPPER}} .all_feature_color:hover .witr_feature_btn_3d a,{{WRAPPER}} .all_feature_color:hover .witr_content_textf h3,{{WRAPPER}} .all_feature_color:hover .witr_content_textf h3 a,{{WRAPPER}} .all_feature_color:hover .witr_content_textf p' => 'color: {{VALUE}}',
					],
				]
			);
			/* border_color */
			$this->add_control(
				'witr_bordear_btn_color',
				[
					'label' => esc_html__( 'Button Border hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .all_feature_color:hover .witr_feature_btn_3d a,{{WRAPPER}} .em-feature:hover .feature_button a,{{WRAPPER}} .all_feature_color:hover .witr_feature_btn_f a' => 'border-color: {{VALUE}}',
					],
				]
			);			
			
			/* heading */
			$this->add_control(
				'witr_alheadeing_color',
				[
					'label' => esc_html__( 'Box BG color', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'default' =>'heading',
					'separator'=>'before',
				]
			);			
			/* box background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_bbgh_background',
					'label' => esc_html__( 'Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .feature_inner_box,{{WRAPPER}} .witr_feature_front_3d,{{WRAPPER}} .witr_slug_feature',
				]
			);			
			/* heading */
			$this->add_control(
				'witr_bvalheadeing_color',
				[
					'label' => esc_html__( 'Box Overlay BG color', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'default' =>'heading',
					'separator'=>'before',
				]
			);			
			/* box background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_bvbgh_background',
					'label' => esc_html__( 'Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .em-feature:hover .feature_inner_box::before,{{WRAPPER}} .witr_feature_front_3d:before,{{WRAPPER}} .witr_slug_front_contentf,{{WRAPPER}} .witr_feture_back_con_slugf',
				]
			);
			/* heading */
			$this->add_control(
				'witr_alheadi_color',
				[
					'label' => esc_html__( 'Icon BG Hover color, Style 3', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'default' =>'heading',
					'separator'=>'before',					
				]
			);			
			/* Icon background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_allicon_background',
					'label' => esc_html__( 'Icon Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .em-feature:hover .em_feature-icon i,{{WRAPPER}} .all_feature_color:hover .witr_feature_icon_3d i,{{WRAPPER}} .all_feature_color:hover .witr_feature_iconf i',					
				]
			);			
			
			/* Fontend border_radius */
			$this->add_control(
				'witr_borderf_radius',
				[
					'label' => esc_html__( 'Fontend Border Radius', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .witr_feature_front_3d,{{WRAPPER}} .witr_feature_front_3d:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_feature' =>['4'],
					],						
				]
			);			
/* =================================================== Bekent Option =================================================================== */
			/* heading2 */
			$this->add_control(
				'witr_heading3_color',
				[
					'label' => esc_html__( 'Box Bekent Option Bottom Look', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'separator'=>'before',
					'condition' => [
						'witr_style_feature' =>['4'],
					],					
				]
			);
			/* heading2 */
			$this->add_control(
				'witr_alheadeing2_color',
				[
					'label' => esc_html__( 'Box BG color', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'default' =>'heading',
					'separator'=>'before',
					'condition' => [
						'witr_style_feature' =>['4'],
					],					
				]
			);
			
			/* box background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_bbgh2_background',
					'label' => esc_html__( 'Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .witr_feature_back_3d',
					'condition' => [
						'witr_style_feature' =>['4'],
					],					
				]
			);			
			/* heading2 */
			$this->add_control(
				'witr_bvalheadeing2_color',
				[
					'label' => esc_html__( 'Box Overlay BG color', 'themex' ),
					'type' => Controls_Manager::HEADING,
					'default' =>'heading',
					'separator'=>'before',
					'condition' => [
						'witr_style_feature' =>['4'],
					],					
				]
			);			
			/* box background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_bvbgh2_background',
					'label' => esc_html__( 'Background', 'themex' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .witr_feature_back_3d:before',
					'condition' => [
						'witr_style_feature' =>['4'],
					],					
				]
			);

			/* Fontend border_radius */
			$this->add_control(
				'witr_borderb_radius',
				[
					'label' => esc_html__( 'Bekend Border Radius', 'themex' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .witr_feature_back_3d,{{WRAPPER}} .witr_feature_back_3d:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'witr_style_feature' =>['4'],
					],						
				]
			);			
							
		 
		 $this->end_controls_section();
		/*=== end  All Textt style ====*/
		
		/*=== start Text Box style ====*/
		$this->start_controls_section(
			'section_all_hover',
			[
				'label' => esc_html__( ' All Text Hover Color', 'themex' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_feature' =>['1','2','5','6','7','8','9','10','11'],
				],				
			]
		);
			/* witr_all_hover_color */
			$this->add_control(
				'witr_allt_hover_color',
				[
					'label' => esc_html__( 'Hover Color', 'themex' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .all_feature_color:hover h3,{{WRAPPER}} .all_feature_color:hover h3 a,{{WRAPPER}} .all_feature_color:hover h2,{{WRAPPER}} .all_feature_color:hover p,{{WRAPPER}} .all_feature_color:hover i,{{WRAPPER}} .all_feature_color:hover .service_list_op a' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .all_feature_color h3,{{WRAPPER}} .all_feature_color h3 a,{{WRAPPER}} .all_feature_color h2,{{WRAPPER}} .all_feature_color p,{{WRAPPER}} .all_feature_color i,{{WRAPPER}} .all_feature_color .service_list_op a' => 'transition: {{SIZE}}s',
					],
				]
			);			
			
		 $this->end_controls_section();
		/*=== end  All Textt style ====*/
		
			/*=== start witr Arrow style ====*/
			$this->start_controls_section(
				'witr_style_option_arrow',
				[
					'label' => esc_html__( ' Arrow Options', 'themex' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_c_arrows' => 'true',
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
										'min' => 0,
										'max' => 1000,
									],
									'%' => [
										'min' => 0,
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
										'max' => 1000,
									],
									'%' => [
										'min' => -500,
										'max' => 1000,
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
										'max' => 1000,
									],
									'%' => [
										'min' => -500,
										'max' => 1000,
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
						/* witr_hoverborder_style1 */
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
						/* border_color */
						$this->add_control(
							'witr_border_adot_color',
							[
								'label' => esc_html__( 'Active Border Color', 'themex' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .slick-dots li.slick-active button' => 'border-color: {{VALUE}}',
								],
							]
						);						
						/* Active Dots width */
						$this->add_responsive_control(
							'witr_dotsac_width',
							[
								'label' => esc_html__( 'Active Width', 'themex' ),
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
									'{{WRAPPER}} .slick-dots li.slick-active button' => 'width: {{SIZE}}{{UNIT}};',
								],
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
						/* witr_hoverborder_styled */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_hoverborder_styled',
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

        $witrshowdata   = $this->get_settings_for_display();
		
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


				 					

		
	switch ( $witrshowdata['witr_style_feature'] ) {				
							

			
		
	case '11':						
		?>
		<div class="witr_cfeature11 feature_active  <?php echo $witrshowdata['witr_Select_whi']; ?>">
			<div class=" witr_islidess_slick witrfba_<?php echo $unic_id;?>">
				<?php if( ! empty($witrshowdata['witr_list_cslide'])){					
					foreach($witrshowdata['witr_list_cslide'] as $witr_test_single){
					$target = ! empty($witr_test_single['witr_feature_title_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow = ! empty($witr_test_single['witr_feature_title_link']['nofollow']) ? ' rel="nofollow"' : '';
					$target_btn = ! empty($witr_test_single['witr_button_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow_btn = ! empty($witr_test_single['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';
					$txbd_image = ! empty($witr_test_single['witr_feature_bo_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witr_test_single, 'txbd_image_size', 'witr_feature_bo_image' ) : '';	
					$txbd_icon_image = ! empty($witr_test_single['witr_feature_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witr_test_single, 'txbd_icon_image_size', 'witr_feature_image' ) : '';					
					?>		
							
						<div class=" col-lg-12">	
							<div class="wcr_feature_11 <?php if($witr_test_single['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">								
								<!-- image -->
								<?php if($witr_test_single['witr_show_bo_image']=='yes'){?>
									<div class="feature_positions_thumb">
										<?php echo $txbd_image; ?>
										<!-- video item -->	
										<?php if($witr_test_single['witr_vshow_icon']=='yes' ){?>	
											<div class="feature_video_post">	
												<?php if(isset($witr_test_single['witr_yvideo_linki']['url']) && ! empty($witr_test_single['witr_yvideo_linki']['url'])){?>
												<a class="  video-popup video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="<?php echo $witr_test_single['witr_yvideo_linki'] ['url']; ?>">
													<!-- custom icon -->
													<?php if( ! empty($witr_test_single['witr_icon_video'])){?>					
														<span class="<?php echo $witr_test_single['witr_icon_video']; ?>"></span>
													<?php } ?>										
												</a>
												<?php }elseif( ! empty($witr_test_single['witr_vmvideo_linki']['url'])){?>
												<a class="  video-popup video-vemo-icon venobox vbox-item" data-vbtype="vimeo" data-autoplay="true" href="<?php echo $witr_test_single['witr_vmvideo_linki'] ['url']; ?>">
													<!-- custom icon -->
													<?php if( ! empty($witr_test_single['witr_icon_video'])){?>					
														<span class="<?php echo $witr_test_single['witr_icon_video']; ?>"></span>
													<?php } ?>
												</a>
												<?php }else{} ?>												
											</div> <!-- video item -->											
										<?php } ?>	
										
											<div class=" feature_topicon_post all_topicon_color">
												<!-- icon -->
												<?php if( ! empty($witr_test_single['witr_icon_item'])){?>
													<i class="<?php echo esc_attr( $witr_test_single['witr_icon_item']['value']);?>"></i>
												<?php } ?>											
												<!-- custom icon -->
												<?php if( ! empty($witr_test_single['witr_feature_custom'])){?>					
													<i class="<?php echo $witr_test_single['witr_feature_custom']; ?>"></i>
												<?php } ?>					
												<!-- image -->
												<?php echo $txbd_icon_image; ?>											
														
											</div>
									</div>
								<?php } ?>
								<div class="witr_sub_item_area">
									<div class="witr_sub_item  all_feature_color text-<?php echo $witrshowdata['witr_text_ltc']; ?>">
										<div class="feature_big_icon">
											<!-- custom icon -->
											<?php if( ! empty($witr_test_single['witr_feature_custom'])){?>					
												<span class="<?php echo $witr_test_single['witr_feature_custom']; ?>"></span>
											<?php } ?>					
											<!-- image -->
											<?php echo $txbd_icon_image; ?>									
										</div>								
										<!-- title -->
										<?php if( ! empty($witr_test_single['witr_feature_title'])){?>
										<?php if($witr_test_single['witr_feature_title_link'] ['url']){?> 
											<h3><a href="<?php echo $witr_test_single['witr_feature_title_link']['url'];?>"<?php echo $target,$nofollow?>><?php echo $witr_test_single['witr_feature_title']; ?></a></h3>
										<?php }else{ ?>
										<h3><?php echo $witr_test_single['witr_feature_title']; ?> </h3>
										<?php }	?>
										<?php } ?>
										<!-- Sub title -->
										<?php if( ! empty($witr_test_single['witr_feature_sub_title'])){?>
											<h2><?php echo $witr_test_single['witr_feature_sub_title']; ?> </h2>
										<?php } ?>									
										<!-- content -->
										<?php if( ! empty($witr_test_single['witr_feature_content'])){?>
											<p><?php echo $witr_test_single['witr_feature_content']; ?> </p>		
										<?php } ?>								
									
										<!-- button -->
										<?php if( ! empty($witr_test_single['witr_feature_button'])){?>
											<div class="feature_btn">
												<a href="<?php echo $witr_test_single['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witr_test_single['witr_feature_button']; ?></a>
											</div>
										<?php } ?>
									</div>
									<!-- button -->
									<?php if(isset($witr_test_single['witr_iconcarf_bottom']) && ! empty($witr_test_single['witr_iconcarf_bottom'])){?>
										<div class="car_feature_btn_icon">
											<a href="<?php echo $witr_test_single['witr_iconcarfl_bottom'] ['url']; ?>"><i class="<?php echo $witr_test_single['witr_iconcarf_bottom']; ?>"></i></a>
										</div>
									<?php } ?>									
								</div>
							</div> 
						</div> 						
					<?php } ?>						
				<?php } ?>							
			</div> 
			
		</div> 

		<?php
		
		break;		
	case '10':						
		?>
		<div class="witr_cfeature10 feature_active text-<?php echo $witrshowdata['witr_text_ltc']; ?> <?php echo $witrshowdata['witr_Select_whi']; ?>">
			<div class=" witr_islidess_slick witrfba_<?php echo $unic_id;?>">
				<?php if( ! empty($witrshowdata['witr_list_cslide'])){					
					foreach($witrshowdata['witr_list_cslide'] as $witr_test_single){
					$target = ! empty($witr_test_single['witr_feature_title_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow = ! empty($witr_test_single['witr_feature_title_link']['nofollow']) ? ' rel="nofollow"' : '';
					$target_btn = ! empty($witr_test_single['witr_button_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow_btn = ! empty($witr_test_single['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';	
					$txbd_icon_image = ! empty($witr_test_single['witr_feature_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witr_test_single, 'txbd_icon_image_size', 'witr_feature_image' ) : '';					
					?>	
							
						<div class=" col-lg-12">	
							<div class="wcr_feature_10 <?php if($witr_test_single['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
								<div class="sub-item  all_feature_color">														
									<!-- icon -->
									<?php if( ! empty($witr_test_single['witr_icon_item'])){?>
										<i class="<?php echo esc_attr( $witr_test_single['witr_icon_item']['value']);?>"></i>
									<?php } ?>
									<!-- custom icon -->
									<?php if( ! empty($witr_test_single['witr_feature_custom'])){?>					
										<i class="<?php echo $witr_test_single['witr_feature_custom']; ?>"></i>
									<?php } ?>					
									<!-- image -->
									<?php echo $txbd_icon_image; ?>	
									<!-- title -->
									<?php if( ! empty($witr_test_single['witr_feature_title'])){?>
									<?php if($witr_test_single['witr_feature_title_link'] ['url']){?> 
										<h3><a href="<?php echo $witr_test_single['witr_feature_title_link']['url'];?>"<?php echo $target,$nofollow?>><?php echo $witr_test_single['witr_feature_title']; ?></a></h3>
									<?php }else{ ?>
									<h3><?php echo $witr_test_single['witr_feature_title']; ?> </h3>
									<?php }	?>
									<?php } ?>
									<!-- Sub title -->
									<?php if( ! empty($witr_test_single['witr_feature_sub_title'])){?>
										<h2><?php echo $witr_test_single['witr_feature_sub_title']; ?> </h2>
									<?php } ?>									
									<!-- content -->
									<?php if( ! empty($witr_test_single['witr_feature_content'])){?>
										<p><?php echo $witr_test_single['witr_feature_content']; ?> </p>		
									<?php } ?>

									<!-- number -->
									<?php if( ! empty($witr_test_single['witr_feature_number'])){?>
										<span><?php echo $witr_test_single['witr_feature_number']; ?></span>
									<?php } ?>									
								</div>
								<!-- button -->
								<?php if( ! empty($witr_test_single['witr_feature_button'])){?>
									<div class="feature_btn">
										<a href="<?php echo $witr_test_single['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witr_test_single['witr_feature_button']; ?></a>
									</div>
								<?php } ?>								
							</div> 
						</div> 
						
						
					<?php } ?>
						
				<?php } ?>							
			</div> 
			
		</div> 

		<?php
		break;		
		case '9':						
		?>
		<div class="witr_cfeature9 feature_active text-<?php echo $witrshowdata['witr_text_ltc']; ?> <?php echo $witrshowdata['witr_Select_whi']; ?>">
			<div class=" witr_islidess_slick witrfba_<?php echo $unic_id;?>">
				<?php if( ! empty($witrshowdata['witr_list_cslide'])){	
					foreach($witrshowdata['witr_list_cslide'] as $witr_test_single){
					$target = ! empty($witr_test_single['witr_feature_title_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow = ! empty($witr_test_single['witr_feature_title_link']['nofollow']) ? ' rel="nofollow"' : '';
					$target_btn = ! empty($witr_test_single['witr_button_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow_btn = ! empty($witr_test_single['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';
					$txbd_image = ! empty($witr_test_single['witr_feature_bo_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witr_test_single, 'txbd_image_size', 'witr_feature_bo_image' ) : '';	
					$txbd_icon_image = ! empty($witr_test_single['witr_feature_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witr_test_single, 'txbd_icon_image_size', 'witr_feature_image' ) : '';					
					?>		
							
						<div class=" col-lg-12">	
							<div class="sub-border-2 all_feature_color <?php if($witr_test_single['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
								<div class="sub-item ">	
									<?php if($witr_test_single['witr_show_bo_image']=='yes'){?>
										<div class="feature_positions_thumb">
											<?php echo $txbd_image; ?>
										</div> 
									<?php } ?>
									 <div class="feature_carsor_icon"> 
										<?php if( ! empty($witr_test_single['witr_icon_item'])){?>
											<i class="<?php echo esc_attr( $witr_test_single['witr_icon_item']['value']);?>"></i>
										<?php }
										if( ! empty($witr_test_single['witr_feature_custom'])){?>					
											<i class="<?php echo $witr_test_single['witr_feature_custom']; ?>"></i>
										<?php }
										 echo $txbd_icon_image; ?>
									</div> 
									<?php if( ! empty($witr_test_single['witr_feature_sub_title'])){?>
										<h2><?php echo $witr_test_single['witr_feature_sub_title']; ?> </h2>
									<?php }								
									if( ! empty($witr_test_single['witr_feature_title'])){
									if($witr_test_single['witr_feature_title_link'] ['url']){?> 
										<h3><a href="<?php echo $witr_test_single['witr_feature_title_link']['url'];?>"<?php echo $target,$nofollow?>><?php echo $witr_test_single['witr_feature_title']; ?></a></h3>
									<?php }else{ ?>
									<h3><?php echo $witr_test_single['witr_feature_title']; ?> </h3>
									<?php } }  
									if( ! empty($witr_test_single['witr_feature_content'])){?>
										<p><?php echo $witr_test_single['witr_feature_content']; ?> </p>		
									<?php } 
									if( ! empty($witr_test_single['witr_feature_button'])){?>
										<div class="feature_btn">
											<a href="<?php echo $witr_test_single['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witr_test_single['witr_feature_button']; ?></a>
										</div>
									<?php } 
									if( ! empty($witr_test_single['witr_feature_number'])){?>
										<span><?php echo $witr_test_single['witr_feature_number']; ?></span>
									<?php } ?>									
								</div> 		   
							</div> 
						</div> 
					<?php } } ?>							
			</div> 
			
		</div> 	

		<?php
		break;
	case '8':						
		?>
		<div class="witr_cfeature8 feature_active text-<?php echo $witrshowdata['witr_text_ltc']; ?> <?php echo $witrshowdata['witr_Select_whi']; ?>">
			<div class=" witr_islidess_slick witrfba_<?php echo $unic_id;?>">
				<?php if( ! empty($witrshowdata['witr_list_cslide'])){	
					foreach($witrshowdata['witr_list_cslide'] as $witr_test_single){
					$target = ! empty($witr_test_single['witr_feature_title_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow = ! empty($witr_test_single['witr_feature_title_link']['nofollow']) ? ' rel="nofollow"' : '';
					$target_btn = ! empty($witr_test_single['witr_button_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow_btn = ! empty($witr_test_single['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';	
					$txbd_icon_image = ! empty($witr_test_single['witr_feature_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witr_test_single, 'txbd_icon_image_size', 'witr_feature_image' ) : '';					
					?>		
							
						<div class=" col-lg-12">	
							<div class=" all_feature_color <?php if($witr_test_single['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>"> 							
								<div class="sub-item ">														
									<!-- icon -->
									<?php if( ! empty($witr_test_single['witr_icon_item'])){?>
										<i class="<?php echo esc_attr( $witr_test_single['witr_icon_item']['value']);?>"></i>
									<?php } ?>
									<!-- custom icon -->
									<?php if( ! empty($witr_test_single['witr_feature_custom'])){?>					
										<i class="<?php echo $witr_test_single['witr_feature_custom']; ?>"></i>
									<?php } ?>					
									<!-- image -->
									<?php echo $txbd_icon_image; ?>
									<!-- number -->
									<?php if( ! empty($witr_test_single['witr_feature_number'])){?>
										<span><?php echo $witr_test_single['witr_feature_number']; ?></span>
									<?php } ?>									
									<!-- title -->
									<?php if( ! empty($witr_test_single['witr_feature_title'])){?>
									<?php if($witr_test_single['witr_feature_title_link'] ['url']){?> 
										<h3><a href="<?php echo $witr_test_single['witr_feature_title_link']['url'];?>"<?php echo $target,$nofollow?>><?php echo $witr_test_single['witr_feature_title']; ?></a></h3>
									<?php }else{ ?>
									<h3><?php echo $witr_test_single['witr_feature_title']; ?> </h3>
									<?php }	?>
									<?php } ?>
									<!-- Sub title -->
									<?php if( ! empty($witr_test_single['witr_feature_sub_title'])){?>
										<h2><?php echo $witr_test_single['witr_feature_sub_title']; ?> </h2>
									<?php } ?>									
									<!-- content -->
									<?php if( ! empty($witr_test_single['witr_feature_content'])){?>
										<p><?php echo $witr_test_single['witr_feature_content']; ?> </p>		
									<?php } ?>
									<!-- button -->
									<?php if( ! empty($witr_test_single['witr_feature_button'])){?>
										<div class="feature_btn">
											<a href="<?php echo $witr_test_single['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witr_test_single['witr_feature_button']; ?></a>
										</div>
									<?php } ?>
								</div> 		   
							</div> 
						</div> 
						
						
					<?php } ?>
						
				<?php } ?>							
			</div> 
			
		</div> 

		<?php
		break;		
		case '7':						
		?>
		<div class="witr_cfeature7 feature_active text-<?php echo $witrshowdata['witr_text_ltc']; ?> <?php echo $witrshowdata['witr_Select_whi']; ?>">
			<div class=" witrfba_<?php echo $unic_id;?>">
				<?php if( ! empty($witrshowdata['witr_list_cslide'])){	
					foreach($witrshowdata['witr_list_cslide'] as $witr_test_single){
					$target = ! empty($witr_test_single['witr_feature_title_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow = ! empty($witr_test_single['witr_feature_title_link']['nofollow']) ? ' rel="nofollow"' : '';
					$target_btn = ! empty($witr_test_single['witr_button_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow_btn = ! empty($witr_test_single['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';
					$txbd_image = ! empty($witr_test_single['witr_feature_bo_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witr_test_single, 'txbd_image_size', 'witr_feature_bo_image' ) : '';	
					$txbd_icon_image = ! empty($witr_test_single['witr_feature_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witr_test_single, 'txbd_icon_image_size', 'witr_feature_image' ) : '';					
					?>														
					<div class=" col-lg-12"> 	
						<div class=" all_feature_color ca_ferture_7 <?php if($witr_test_single['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
							<?php if($witr_test_single['witr_show_bo_image']=='yes'){?>
								<div class="car_feature_top_thumb">
									<?php echo $txbd_image; ?>
								</div> 
							<?php } ?>						
							<div class="sub-item ">					
								<!-- icon -->
								<?php if( ! empty($witr_test_single['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witr_test_single['witr_icon_item']['value']);?>"></i>
								<?php } ?>
								<!-- custom icon -->
								<?php if( ! empty($witr_test_single['witr_feature_custom'])){?>					
									<i class="<?php echo $witr_test_single['witr_feature_custom']; ?>"></i>
								<?php } ?>					
								<!-- image -->
								<?php echo $txbd_icon_image; ?>	
								<!-- title -->
								<?php if( ! empty($witr_test_single['witr_feature_title'])){?>
								<?php if($witr_test_single['witr_feature_title_link'] ['url']){?> 
									<h3><a href="<?php echo $witr_test_single['witr_feature_title_link']['url'];?>"<?php echo $target,$nofollow?>><?php echo $witr_test_single['witr_feature_title']; ?></a></h3>
								<?php }else{ ?>
								<h3><?php echo $witr_test_single['witr_feature_title']; ?> </h3>
								<?php }	?>
								<?php } ?>
								<!-- Sub title -->
								<?php if( ! empty($witr_test_single['witr_feature_sub_title'])){?>
									<h2><?php echo $witr_test_single['witr_feature_sub_title']; ?> </h2>
								<?php } ?>									
								<!-- content -->
								<?php if( ! empty($witr_test_single['witr_feature_content'])){?>
									<p><?php echo $witr_test_single['witr_feature_content']; ?> </p>		
								<?php } ?>
								<!-- button -->
								<?php if( ! empty($witr_test_single['witr_feature_button'])){?>
									<div class="feature_btn">
										<a href="<?php echo $witr_test_single['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witr_test_single['witr_feature_button']; ?></a>
									</div>
								<?php } ?>
								
								
								<div class="carsor_featutes_bottom">
									<div class="carsor_featutes_bottom_text">
										<?php if( ! empty($witr_test_single['witr_feature_imgtext']['url'])){?>
										<div class="carsor_featutes_bottom_img">
											<img src="<?php echo $witr_test_single['witr_feature_imgtext']['url'];?>" alt="" />										
										</div>
										<?php } ?>
										<?php if( ! empty($witr_test_single['witr_imgtext_title'])){?>
										<div class="carsor_featutes_bottom_title">
											<h4><?php echo $witr_test_single['witr_imgtext_title']; ?> </h4>								
										</div>
										<?php } ?>	
									</div>
									<div class="carsor_featutes_bottom_text">
										<?php if( ! empty($witr_test_single['witr_feature_imgtext2']['url'])){?>
										<div class="carsor_featutes_bottom_img">
											<img src="<?php echo $witr_test_single['witr_feature_imgtext2']['url'];?>" alt="" />										
										</div>
										<?php } ?>
										<?php if( ! empty($witr_test_single['witr_imgtext_title2'])){?>
										<div class="carsor_featutes_bottom_title">
											<h4><?php echo $witr_test_single['witr_imgtext_title2']; ?> </h4>								
										</div>
										<?php } ?>	
									</div>
								</div>
								
								
							</div> 		   
						</div>					
					</div>					
										
					<?php } ?>
						
				<?php } ?>
			</div>				
		</div> 


		<?php
		break;
	
		case '6':						
		?>
		<div class="witr_cfeature6 feature_active text-<?php echo $witrshowdata['witr_text_ltc']; ?>">
			<div class=" witrfba_<?php echo $unic_id;?>">
				<?php if( ! empty($witrshowdata['witr_list_cslide'])){	
					foreach($witrshowdata['witr_list_cslide'] as $witr_test_single){
					$target = ! empty($witr_test_single['witr_feature_title_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow = ! empty($witr_test_single['witr_feature_title_link']['nofollow']) ? ' rel="nofollow"' : '';
					$target_btn = ! empty($witr_test_single['witr_button_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow_btn = ! empty($witr_test_single['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';
					$txbd_icon_image = ! empty($witr_test_single['witr_feature_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witr_test_single, 'txbd_icon_image_size', 'witr_feature_image' ) : '';					
					?>														
					<div class=" col-lg-12"> 	
						<div class="witr_feature_13 sub-border-2 all_feature_color <?php if($witr_test_single['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">                 
							<div class="sub-item <?php echo $witr_test_single['witr_Select_whi']; ?>">
								<!-- number -->
								<?php if( ! empty($witr_test_single['witr_feature_number'])){?>
									<span><?php echo $witr_test_single['witr_feature_number']; ?></span>
								<?php } ?>					
								<!-- icon -->
								<?php if( ! empty($witr_test_single['witr_icon_item'])){?>
									<i class="<?php echo esc_attr( $witr_test_single['witr_icon_item']['value']);?>"></i>
								<?php } ?>
								<!-- custom icon -->
								<?php if( ! empty($witr_test_single['witr_feature_custom'])){?>					
									<i class="<?php echo $witr_test_single['witr_feature_custom']; ?>"></i>
								<?php } ?>					
								<!-- image -->
								<?php echo $txbd_icon_image; ?>	
								<!-- title -->
								<?php if( ! empty($witr_test_single['witr_feature_title'])){?>
								<?php if($witr_test_single['witr_feature_title_link'] ['url']){?> 
									<h3><a href="<?php echo $witr_test_single['witr_feature_title_link']['url'];?>"<?php echo $target,$nofollow?>><?php echo $witr_test_single['witr_feature_title']; ?></a></h3>
								<?php }else{ ?>
								<h3><?php echo $witr_test_single['witr_feature_title']; ?> </h3>
								<?php }	?>
								<?php } ?>
								<!-- Sub title -->
								<?php if( ! empty($witr_test_single['witr_feature_sub_title'])){?>
									<h2><?php echo $witr_test_single['witr_feature_sub_title']; ?> </h2>
								<?php } ?>
								
								<!-- content -->
								<?php if( ! empty($witr_test_single['witr_feature_content'])){?>
									<p><?php echo $witr_test_single['witr_feature_content']; ?> </p>		
								<?php } ?>
								<!-- button -->
								<?php if( ! empty($witr_test_single['witr_feature_button'])){?>
									<div class="feature_btn">
										<a href="<?php echo $witr_test_single['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witr_test_single['witr_feature_button']; ?></a>
									</div>
								<?php } ?>
							</div> <!-- sub item -->		   
						</div> <!-- sub border -->					
					</div>					
										
					<?php } ?>
						
				<?php } ?>
			</div>				
		</div> 

	

		<?php
		break;	
	
		case '5':						
		?>
		<div class="witr_cfeature5 feature_active text-<?php echo $witrshowdata['witr_text_ltc']; ?> ">
			<div class=" witrfba_<?php echo $unic_id;?>">
				<?php if( ! empty($witrshowdata['witr_list_cslide'])){	
					foreach($witrshowdata['witr_list_cslide'] as $witr_test_single){
					$target = ! empty($witr_test_single['witr_feature_title_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow = ! empty($witr_test_single['witr_feature_title_link']['nofollow']) ? ' rel="nofollow"' : '';
					$target_btn = ! empty($witr_test_single['witr_button_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow_btn = ! empty($witr_test_single['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';
					$txbd_image = ! empty($witr_test_single['witr_feature_bo_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witr_test_single, 'txbd_image_size', 'witr_feature_bo_image' ) : '';	
					$txbd_icon_image = ! empty($witr_test_single['witr_feature_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witr_test_single, 'txbd_icon_image_size', 'witr_feature_image' ) : '';					
					?>														
					<div class=" col-lg-12"> 	
						<div class="witr_feature_12 sub-item mrb20 all_feature_color <?php if($witr_test_single['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
							<!-- icon -->
							<?php if( ! empty($witr_test_single['witr_icon_item'])){?>
								<i class="<?php echo esc_attr( $witr_test_single['witr_icon_item']['value']);?>"></i>
							<?php } ?>
							<!-- custom icon -->
							<?php if( ! empty($witr_test_single['witr_feature_custom'])){?>					
								<i class="<?php echo $witr_test_single['witr_feature_custom']; ?>"></i>
							<?php } ?>
							<!-- image Icon-->
							<?php echo $txbd_icon_image; ?>					
							<!-- title -->
							<?php if( ! empty($witr_test_single['witr_feature_title'])){?>
							<?php if($witr_test_single['witr_feature_title_link'] ['url']){?> 
								<h3><a href="<?php echo $witr_test_single['witr_feature_title_link']['url'];?>"<?php echo $target,$nofollow?>><?php echo $witr_test_single['witr_feature_title']; ?></a></h3>
							<?php }else{ ?>
							<h3><?php echo $witr_test_single['witr_feature_title']; ?> </h3>
							<?php }	?>
							<?php } ?>
							<!-- Sub title -->
							<?php if( ! empty($witr_test_single['witr_feature_sub_title'])){?>
								<h2><?php echo $witr_test_single['witr_feature_sub_title']; ?> </h2>
							<?php } ?>							
							<!-- content -->
							<?php if( ! empty($witr_test_single['witr_feature_content'])){?>
								<p><?php echo $witr_test_single['witr_feature_content']; ?> </p>		
							<?php } ?>
							<!-- button -->
							<?php if( ! empty($witr_test_single['witr_feature_button'])){?>
								<div class="feature_btn">
									<a href="<?php echo $witr_test_single['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witr_test_single['witr_feature_button']; ?></a>
								</div>
							<?php } ?>	
							<!-- image -->
								<?php if($witr_test_single['witr_show_bo_image']=='yes'){?>
								<div class="witr_feature_bo_thumb">
									<?php echo $txbd_image; ?>
								</div>
							<?php } ?>
							
						</div> <!-- sub item -->					
					</div>					
										
					<?php } ?>
						
				<?php } ?>
			</div>				
		</div> 


		<?php
		break;		
		case '4':						
		?>
		<div class="witr_cfeature4 feature_active text-<?php echo $witrshowdata['witr_text_ltc']; ?> ">
			<div class=" witrfba_<?php echo $unic_id;?>">
				<?php if( ! empty($witrshowdata['witr_list_cslide'])){	
					foreach($witrshowdata['witr_list_cslide'] as $witr_test_single){
					$target = ! empty($witr_test_single['witr_feature_title_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow = ! empty($witr_test_single['witr_feature_title_link']['nofollow']) ? ' rel="nofollow"' : '';
					$target_btn = ! empty($witr_test_single['witr_button_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow_btn = ! empty($witr_test_single['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';
					$txbd_icon_image = ! empty($witr_test_single['witr_feature_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witr_test_single, 'txbd_icon_image_size', 'witr_feature_image' ) : '';					
					?>														
					<div class=" col-lg-12"> 	
						<div class="witr_feature_3d witr_feature_con_3d <?php echo $witrshowdata['witr_xyz']; ?> <?php if($witr_test_single['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
							<div class="witr_single_feature_3d all_feature_color">
								<!-- fontent -->
								<div class="witr_feature_front_3d">
									<div class="witr_feature_position">
										<div class="witr_feature_content_3d">
											<div class="witr_feature_icon_3d">
												<!-- icon -->
												<?php if( ! empty($witr_test_single['witr_icon_item'])){?>
													<i class="<?php echo esc_attr( $witr_test_single['witr_icon_item']['value']);?>"></i>
												<?php } ?>
												<!-- custom icon -->
												<?php if( ! empty($witr_test_single['witr_feature_custom'])){?>	
													<i class="<?php echo $witr_test_single['witr_feature_custom']; ?>"></i>
												<?php } ?>				
												<!-- image -->
												<?php echo $txbd_icon_image; ?>						
											</div>
											<!-- title -->
											<?php if( ! empty($witr_test_single['witr_feature_title'])){?>
											<?php if($witr_test_single['witr_feature_title_link'] ['url']){?> 
												<h3><a href="<?php echo $witr_test_single['witr_feature_title_link']['url'];?>"<?php echo $target,$nofollow?>><?php echo $witr_test_single['witr_feature_title']; ?></a></h3>
											<?php }else{ ?>
											<h3><?php echo $witr_test_single['witr_feature_title']; ?> </h3>
											<?php }	?>
											<?php } ?>
											<!-- Sub title -->
											<?php if( ! empty($witr_test_single['witr_feature_sub_title'])){?>
												<h2><?php echo $witr_test_single['witr_feature_sub_title']; ?> </h2>
											<?php } ?>											
											<!-- content -->
											<?php if( ! empty($witr_test_single['witr_feature_content'])){?>
												<p><?php echo $witr_test_single['witr_feature_content']; ?> </p>		
											<?php } ?>						
										</div>
										<!-- button -->
										<?php if( ! empty($witr_test_single['witr_feature_button'])){?>
											<div class="witr_feature_btn_3d">
											<a href="<?php echo $witr_test_single['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witr_test_single['witr_feature_button']; ?></a>
											</div>
										<?php } ?>	
									</div>
								</div>
								<!-- bekend -->
								<div class="witr_feature_back_3d">
									<div class="witr_feature_position">
										<div class="witr_feature_content_3d">
											<div class="witr_feature_icon_3d">
												<!-- icon -->
												<?php if( ! empty($witr_test_single['witr_icon_item'])){?>
													<i class="<?php echo esc_attr( $witr_test_single['witr_icon_item']['value']);?>"></i>
												<?php } ?>
												<!-- custom icon -->
												<?php if( ! empty($witr_test_single['witr_feature_custom'])){?>	
													<i class="<?php echo $witr_test_single['witr_feature_custom']; ?>"></i>
												<?php } ?>				
												<!-- image -->
												<?php echo $txbd_icon_image; ?>						
											</div>
											<!-- title -->
											<?php if( ! empty($witr_test_single['witr_feature_title'])){?>
											<?php if($witr_test_single['witr_feature_title_link'] ['url']){?> 
												<h3><a href="<?php echo $witr_test_single['witr_feature_title_link']['url'];?>"<?php echo $target,$nofollow?>><?php echo $witr_test_single['witr_feature_title']; ?></a></h3>
											<?php }else{ ?>
											<h3><?php echo $witr_test_single['witr_feature_title']; ?> </h3>
											<?php }	?>
											<?php } ?>
											<!-- Sub title -->
											<?php if( ! empty($witr_test_single['witr_feature_sub_title'])){?>
												<h2><?php echo $witr_test_single['witr_feature_sub_title']; ?> </h2>
											<?php } ?>											
											<!-- content -->
											<?php if( ! empty($witr_test_single['witr_feature_content'])){?>
												<p><?php echo $witr_test_single['witr_feature_content']; ?> </p>		
											<?php } ?>						
										</div>
										
										<!-- button -->
										<?php if( ! empty($witr_test_single['witr_feature_button'])){?>
											<div class="witr_feature_btn_3d">
											<a href="<?php echo $witr_test_single['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witr_test_single['witr_feature_button']; ?></a>
											</div>
										<?php } ?>					
										
									</div>
								</div>
							</div>
						</div>					
					</div>					
										
					<?php } ?>
						
				<?php } ?>
			</div>				
		</div> 

		
		<?php
		break;		
		
		case '3':						
		?>
		<div class="witr_cfeature3 feature_active">
			<div class=" witrfba_<?php echo $unic_id;?>">
				<?php if( ! empty($witrshowdata['witr_list_cslide'])){	
					foreach($witrshowdata['witr_list_cslide'] as $witr_test_single){
					$target = ! empty($witr_test_single['witr_feature_title_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow = ! empty($witr_test_single['witr_feature_title_link']['nofollow']) ? ' rel="nofollow"' : '';
					$target_btn = ! empty($witr_test_single['witr_button_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow_btn = ! empty($witr_test_single['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';
					$txbd_icon_image = ! empty($witr_test_single['witr_feature_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witr_test_single, 'txbd_icon_image_size', 'witr_feature_image' ) : '';					
					?>														
					<div class=" col-lg-12"> 	
						<div class="em-feature all_feature_color <?php if($witr_test_single['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
							<div class="feature_inner_box text-left">
								<div class="feature_inner">						
									<div class="em_feature-icon">
										<!-- icon -->
										<?php if( ! empty($witr_test_single['witr_icon_item'])){?>
											<i class="<?php echo esc_attr( $witr_test_single['witr_icon_item']['value']);?>"></i>
										<?php } ?>
										<!-- custom icon -->
										<?php if( ! empty($witr_test_single['witr_feature_custom'])){?>					
											<i class="<?php echo $witr_test_single['witr_feature_custom']; ?>"></i>
										<?php } ?>
										<!-- image -->
										<?php echo $txbd_icon_image; ?>							
									</div>
									<div class="em-feature-title">
										<!-- title -->
										<?php if( ! empty($witr_test_single['witr_feature_title'])){?>
										<?php if($witr_test_single['witr_feature_title_link'] ['url']){?> 
											<h3><a href="<?php echo $witr_test_single['witr_feature_title_link']['url'];?>"<?php echo $target,$nofollow?>><?php echo $witr_test_single['witr_feature_title']; ?></a></h3>
										<?php }else{ ?>
										<h3><?php echo $witr_test_single['witr_feature_title']; ?> </h3>
										<?php }	?>
										<?php } ?>
										<!-- Sub title -->
										<?php if( ! empty($witr_test_single['witr_feature_sub_title'])){?>
											<h2><?php echo $witr_test_single['witr_feature_sub_title']; ?> </h2>
										<?php } ?>										
									</div>
								</div>

								<div class="em_content_text">							
									<div class="em-feature-desc">
										<!-- content -->
										<?php if( ! empty($witr_test_single['witr_feature_content'])){?>
											<p><?php echo $witr_test_single['witr_feature_content']; ?> </p>		
										<?php } ?>
									</div>
								</div>
					
								
								<?php if( ! empty($witr_test_single['witr_feature_button'])){?>
									<div class="f-readmore">
										<div class="feature_button feature_btn">
											<a href="<?php echo $witr_test_single['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witr_test_single['witr_feature_button']; ?></a>
										</div>
									</div>
								<?php } ?>							
							</div>
						</div>					
					</div>					
										
					<?php } ?>
						
				<?php } ?>
			</div>				
		</div> 
	

		<?php
		break;		
		
		case '2':						
		?>
		<div class="witr_cfeature2 feature_active text-<?php echo $witrshowdata['witr_text_ltc']; ?> ">
			<div class=" witrfba_<?php echo $unic_id;?>">
				<?php if( ! empty($witrshowdata['witr_list_cslide'])){	
					foreach($witrshowdata['witr_list_cslide'] as $witr_test_single){
					$target = ! empty($witr_test_single['witr_feature_title_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow = ! empty($witr_test_single['witr_feature_title_link']['nofollow']) ? ' rel="nofollow"' : '';
					$target_btn = ! empty($witr_test_single['witr_button_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow_btn = ! empty($witr_test_single['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';
					$txbd_icon_image = ! empty($witr_test_single['witr_feature_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witr_test_single, 'txbd_icon_image_size', 'witr_feature_image' ) : '';					
					?>														
						
						<div class=" col-lg-12">              
							<div class="sub-border-3">
								<div class="sub-item sub-item-3 all_feature_color <?php if($witr_test_single['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">
									<!-- title -->
									<?php if( ! empty($witr_test_single['witr_feature_title'])){?>
									<?php if($witr_test_single['witr_feature_title_link'] ['url']){?> 
										<h3><a href="<?php echo $witr_test_single['witr_feature_title_link']['url'];?>"<?php echo $target,$nofollow?>><?php echo $witr_test_single['witr_feature_title']; ?></a></h3>
									<?php }else{ ?>
									<h3><?php echo $witr_test_single['witr_feature_title']; ?> </h3>
									<?php }	?>
									<?php } ?>
									<!-- Sub title -->
									<?php if( ! empty($witr_test_single['witr_feature_sub_title'])){?>
										<h2><?php echo $witr_test_single['witr_feature_sub_title']; ?> </h2>
									<?php } ?>									
									<!-- icon -->
									<?php if( ! empty($witr_test_single['witr_icon_item'])){?>
										<i class="<?php echo esc_attr( $witr_test_single['witr_icon_item']['value']);?>"></i>
									<?php } ?>
									<!-- custom icon -->
									<?php if( ! empty($witr_test_single['witr_feature_custom'])){?>					
										<i class="<?php echo $witr_test_single['witr_feature_custom']; ?>"></i>
									<?php } ?>					
									<!-- image -->
									<?php echo $txbd_icon_image; ?>			
									<!-- content -->
									<?php if( ! empty($witr_test_single['witr_feature_content'])){?>
										<p><?php echo $witr_test_single['witr_feature_content']; ?> </p>		
									<?php } ?>
									<!-- button -->
									<?php if( ! empty($witr_test_single['witr_feature_button'])){?>
										<div class="feature_btn">
											<a href="<?php echo $witr_test_single['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witr_test_single['witr_feature_button']; ?></a>
										</div>
									<?php } ?>				
								</div> <!-- sub item -->
							</div> <!-- sub border -->						
						</div>					
							
					<?php } ?>
						
				<?php } ?>							
			</div> 
			
		</div> 
	
		<?php
		break;
		
		default:
		?>			


		
		<div class="witr_cfeature1 feature_active text-<?php echo $witrshowdata['witr_text_ltc']; ?> <?php echo $witrshowdata['witr_Select_whi']; ?>">
			<div class=" witr_islidess_slick witrfba_<?php echo $unic_id;?>">
				<?php if( ! empty($witrshowdata['witr_list_cslide'])){	
					foreach($witrshowdata['witr_list_cslide'] as $witr_test_single){
					$target = ! empty($witr_test_single['witr_feature_title_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow = ! empty($witr_test_single['witr_feature_title_link']['nofollow']) ? ' rel="nofollow"' : '';
					$target_btn = ! empty($witr_test_single['witr_button_link']['is_external']) ? ' target="_blank"' : '';
					$nofollow_btn = ! empty($witr_test_single['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';
					$txbd_icon_image = ! empty($witr_test_single['witr_feature_image']['url']) ?  Group_Control_Image_Size::get_attachment_image_html( $witr_test_single, 'txbd_icon_image_size', 'witr_feature_image' ) : '';					
					?>				
						<div class=" col-lg-12">	
							<div class="sub-border-2 all_feature_color <?php if($witr_test_single['witr_show_animate']=='yes'){ ?>  single_seivice_ani <?php } ?>">                 
								<div class="sub-item ">
									<!-- number -->
									<?php if( ! empty($witr_test_single['witr_feature_number'])){?>
										<span><?php echo $witr_test_single['witr_feature_number']; ?></span>
									<?php } ?>					
									<!-- icon -->
									<?php if( ! empty($witr_test_single['witr_icon_item'])){?>
										<i class="<?php echo esc_attr( $witr_test_single['witr_icon_item']['value']);?>"></i>
									<?php } ?>
									<!-- custom icon -->
									<?php if( ! empty($witr_test_single['witr_feature_custom'])){?>					
										<i class="<?php echo $witr_test_single['witr_feature_custom']; ?>"></i>
									<?php } ?>					
									<!-- image -->
									<?php echo $txbd_icon_image; ?>	
									<!-- title -->
									<?php if( ! empty($witr_test_single['witr_feature_title'])){?>
									<?php if($witr_test_single['witr_feature_title_link'] ['url']){?> 
										<h3><a href="<?php echo $witr_test_single['witr_feature_title_link']['url'];?>"<?php echo $target,$nofollow?>><?php echo $witr_test_single['witr_feature_title']; ?></a></h3>
									<?php }else{ ?>
									<h3><?php echo $witr_test_single['witr_feature_title']; ?> </h3>
									<?php }	?>
									<?php } ?>
									<!-- Sub title -->
									<?php if( ! empty($witr_test_single['witr_feature_sub_title'])){?>
										<h2><?php echo $witr_test_single['witr_feature_sub_title']; ?> </h2>
									<?php } ?>									
									<!-- content -->
									<?php if( ! empty($witr_test_single['witr_feature_content'])){?>
										<p><?php echo $witr_test_single['witr_feature_content']; ?> </p>		
									<?php } ?>
									<!-- button -->
									<?php if( ! empty($witr_test_single['witr_feature_button'])){?>
										<div class="feature_btn">
											<a href="<?php echo $witr_test_single['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witr_test_single['witr_feature_button']; ?></a>
										</div>
									<?php } ?>
								</div> 		   
							</div> 
						</div> 
						
						
					<?php } ?>
						
				<?php } ?>							
			</div> 
			
		</div> 

	
	<?php	
		break;						
		
	}/* switch end */
	
			include('witr_feature/witrfajs.php');		


		

    } 
	

}