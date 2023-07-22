<?php

add_action( 'cmb2_admin_init', 'twr_metabox' );
/*
**	Setting up custom fields for custom post types belongs to fantasic child theme for themex
*/ 

if ( !function_exists('twr_metabox') ) {
	function twr_metabox() {
		$prefix = '_txbdm_';

	//header metabox
	$page_heading_style = new_cmb2_box( array(
	'id'            => $prefix . 'em_header_style_option',
	'title'         => esc_html__( 'Header Style Option', 'themex' ),
	'object_types'  => array( 'page','em_service','em_portfolio','em_event','em_team','em_testimonial','em_tab','post' ), // Post type
	'priority'   => 'high',
	) );
	

	
		$page_heading_style->add_field( array(
			'name'    => esc_html__('Top Menu Style ','themex'),
			'id'      => $prefix . 'header_topa',
			'type'    => 'radio_inline',
			'desc'	  => 'this section work only this page, But it only work, when you are not Header Top On in the theme option menu area, then it will work.',
			'options' => array(
			'1' => esc_html__( 'Show Top Menu This Page', 'themex' ),
			'2'   => esc_html__( 'Hide Top Menu This Page', 'themex' ),
			),
			'default' =>'2',
		) );
	
		$page_heading_style->add_field( array(
			'name'    => esc_html__('Top Menu Style 2 ','themex'),
			'id'      => $prefix . 'toptsst',
			'type'    => 'radio_inline',
			'desc'	  => 'this section work only this page,  But it only work, when you are not Header Top style 2 On in the theme option menu area, then it will work.',
			'options' => array(
			'1' => esc_html__( 'Show Top Menu 2', 'themex' ),
			'2'   => esc_html__( 'Hide Top Menu 2', 'themex' ),
			),
			'default' =>'2',
		) );
	
		$page_heading_style->add_field( array(
			'name'    => esc_html__('Header Style','themex'),
			'id'      => $prefix . 'menu_header_style',
			'show_option_none' => true,
			'desc'   => esc_html__( 'Note: When you select  3,4,5,1-1,8,9,11,12,13,20,21,22,24 style menu, that time you need to set top bar menu, otherwise you can not find our real menu style. this section work only this page, when you are not select menu in the theme option menu area, then it will work.', 'themex' ), 			
			'type'    => 'select',
			'options' => array(
				'1' => esc_html__( '1 Header Default Menu', 'themex' ),													
				'2' => esc_html__( '2 Header Transparent Menu', 'themex' ),
				'3' => esc_html__( '3 Header Transparent With Sticky Menu', 'themex' ),		
				'4' => esc_html__( '4 Header One Page Menu', 'themex' ),
				'5' => esc_html__( '5 Header One Page Transparent Menu', 'themex' ),				
				'6' => esc_html__( '6 Header One Page Transparent With Sticky  Menu', 'themex' ),
				'7' => esc_html__( '1-1 Header Default with Sticky Menu', 'themex' ),							
				'8' => esc_html__( '8 Header Menu With Search', 'themex' ),
				'9' => esc_html__( '9 Header Menu With Social Icon and Button', 'themex' ),
				'10' => esc_html__( '10 Header Menu With Button', 'themex' ),
				'11' => esc_html__( '11 Header Menu With Button headroom Menu', 'themex' ),
				'12' => esc_html__( '12 Header Menu With Search and no Logo', 'themex' ),
				'13' => esc_html__( '13 Header Transparent Sticky No logo Menu', 'themex' ),					
				'14' => esc_html__( '14 Header One Page With Search Menu', 'themex' ),
				'15' => esc_html__( '15 Header Mini Shop Menu', 'themex' ),										
				'16' => esc_html__( '16 Header Hamburgers Menu', 'themex' ),										
				'17' => esc_html__( '17 Header Box Style Menu', 'themex' ),
				'18' => esc_html__( '18 No Logo,Search, Mini Shop Button', 'themex' ),				
				'19' => esc_html__( '19 Left Logo,Right Search and Mini Shop Button', 'themex' ),	
				'20' => esc_html__( '20 Left Logo,Right Search,Popup Menu,Button', 'themex' ),
				'21' => esc_html__( '21 No Logo,Right Search,Popup Menu,Button', 'themex' ),
				'22' => esc_html__( '22 left Logo,Center Menu,Search And Right Address', 'themex' ),
				'23' => esc_html__( '23 Header Popup Menu', 'themex' ),			
				'24' => esc_html__( '24 No Logo,One Page Menu,Button', 'themex' ),			
				'25' => esc_html__( '25 Header Menu Hide', 'themex' ),			
			),
			'default' =>'1',
		) );
		$page_heading_style->add_field( array(
			'name'    => esc_html__('Select Menu Position','themex'),
			'id'      => $prefix . 'toptsstas1',
			'show_option_none' => true,
			'desc'      => esc_html__('Select menu position. this section work only this page, when you are not select menu position in the theme option menu position area, then it will work.  ', 'themex'),	 			
			'type'    => 'select',
			'options' => array(
				'1' => esc_html__( 'Select absolute menu', 'themex' ),				
				'2' => esc_html__( 'All Header absolute ', 'themex' ),				
				'3' => esc_html__( 'Top 2 and Main Menu Header absolute', 'themex' ),
				'4' => esc_html__( 'Main Menu absolute', 'themex' ),		
			),
			'default' =>'1',
		) );		
		$page_heading_style->add_field( array(
			'name'    => esc_html__('Select Box Layout Top Menu','themex'),
			'id'      => $prefix . 'box_menu_style2',
			'show_option_none' => true,
			'desc'      => esc_html__('Select menu box style. this section work only this page, when you are not select menu in the theme option menu area, then it will work.', 'themex'),	 			
			'type'    => 'select',
			'options' => array(
				'1' => esc_html__( 'Box Layout', 'themex' ),				
				'2' => esc_html__( 'Box Inner Layout', 'themex' ),
				'3' => esc_html__( 'Full Width', 'themex' ),		
			),
			'default' =>'1',
		) );
		$page_heading_style->add_field( array(
			'name'    => esc_html__('Select Box Layout Menu Top 2','themex'),
			'id'      => $prefix . 'box_menu_style3',
			'show_option_none' => true,
			'desc'      => esc_html__('Select menu box style. this section work only this page, when you are not select menu in the theme option menu area, then it will work.', 'themex'),	 			
			'type'    => 'select',
			'options' => array(
				'1' => esc_html__( 'Box Layout', 'themex' ),				
				'2' => esc_html__( 'Box Inner Layout', 'themex' ),
				'3' => esc_html__( 'Full Width', 'themex' ),		
			),
			'default' =>'1',
		) );
		$page_heading_style->add_field( array(
			'name'    => esc_html__('Select Box Layout Main Menu','themex'),
			'id'      => $prefix . 'box_menu_style',
			'show_option_none' => true,
			'desc'      => esc_html__('Select menu box style. this section work only this page, when you are not select menu in the theme option menu area, then it will work.', 'themex'),	 			
			'type'    => 'select',
			'options' => array(
				'1' => esc_html__( 'Box Layout', 'themex' ),				
				'2' => esc_html__( 'Box Inner Layout', 'themex' ),
				'3' => esc_html__( 'Full Width', 'themex' ),		
			),
			'default' =>'1',
		) );
		
		$page_heading_style->add_field( array(
			'name'    => esc_html__('Logo And Menu Style','themex'),
			'id'      => $prefix . 'logo_menu_style',
			'show_option_none' => true,
			'desc'      => esc_html__('This option work only, when you select  - 1 and 1-1  style menu', 'themex'),	 			
			'type'    => 'select',
			'options' => array(
				'1' => esc_html__( '1 Logo Left', 'themex' ),				
				'2' => esc_html__( '2 Logo Right', 'themex' ),
				'3' => esc_html__( '3 Logo Top', 'themex' ),		
			),
			'default' =>'1',
		) );


				
		  //page metabox
		  $page_breadcrumb = new_cmb2_box( array(
		   'id'            => $prefix . 'pageid1',
		   'title'         => esc_html__( 'Breadcumb Option', 'themex' ),
		   'object_types'  => array( 'post','page','em_event','em_portfolio' ), // Post type
		   'priority'   => 'high',
		  ) );
		  
		  $page_breadcrumb->add_field( array(
		   'name'    => esc_html__('Page Title','themex'),
		   'id'      => $prefix . 'ptitle',
		   'type'    => 'radio_inline',
		   'options' => array(
			'ptitles' => esc_html__( 'Hide Title', 'themex' ),
			'ptitleh'   => esc_html__( 'Show Title', 'themex' ),
		   ),
		   'default' =>'ptitles',
		  ) );   
		  
		  
		$page_breadcrumb->add_field( array(
			'name'    => esc_html__('Breadcrumb','themex'),
			'id'      => $prefix . 'breadcrumbs',
			'type'    => 'radio_inline',
			'options' => array(
			'0' => esc_html__( 'Show breadcrumb', 'themex' ),
			'1'   => esc_html__( 'Hide breadcrumb', 'themex' ),
			),
			'default' =>0,
		) );
		$page_breadcrumb->add_field( array(
			'name'    => esc_html__('Breadcrumb Title','themex'),
			'id'      => $prefix . 'btitle',
			'type'    => 'radio_inline',
			'options' => array(
			'btitles' => esc_html__( 'Show Title', 'themex' ),
			'btitleh'   => esc_html__( 'Hide Title', 'themex' ),
			),
			'default' =>'btitles',
		) );    
		$page_breadcrumb->add_field(array(
			'name' => esc_html__( 'Page Breadcrumb Image', 'themex' ),
			'id'   => $prefix .'pageimagess',
			'desc'       => esc_html__( 'insert image here', 'themex' ),  
			'type' => 'file',
		) );  

		
		

		//page metabox
		$testimonial = new_cmb2_box( array(
			'id'            => $prefix . 'em_testimonial',
			'title'         => esc_html__( 'Testimonial Option', 'themex' ),
			'object_types'  => array( 'em_testimonial' ), // Post type
			'priority'   => 'high',
		) );
			$testimonial->add_field( array(
				'name'       => esc_html__( 'Degignation', 'themex' ),
				'desc'       => esc_html__( 'insert Degignation here', 'themex' ),
				'id'         => $prefix . 'testi_deg',
				'type'       => 'text',
			) );
			$testimonial->add_field( array(
				'name'    => esc_html__('Rating Style','themex'),
				'id'      => $prefix . 'em_rating',
				'show_option_none' => true,					
				'type'    => 'select',
				'options' => array(
					'0' => esc_html__( 'Select Rating', 'themex' ),
					'1' => esc_html__( 'Rating 1 Star', 'themex' ),
					'2' => esc_html__( 'Rating 2 Star', 'themex' ),
					'3' => esc_html__( 'Rating 3 Star', 'themex' ),
					'4' => esc_html__( 'Rating 4 Star', 'themex' ),
					'5' => esc_html__( 'Rating 5 Star', 'themex' ),
				),
				'default' =>5,
			) );
			$testimonial->add_field( array(
				'name'       => esc_html__( 'Review Text', 'themex' ),
				'desc'       => esc_html__( 'insert Review Text here', 'themex' ),
				'id'         => $prefix . 'review_text',
				'type'       => 'text',
				'default' =>'Execllent!!',
			) );			
			$testimonial->add_field(array(
				'name' => esc_html__( 'Review Screenshot Image', 'themex' ),
				'id'   => $prefix .'screenshot_img',
				'desc'       => esc_html__( 'insert screenshot image here, Recommenddt Image Size, Example:585*396, Working Style only 13', 'themex' ),  
				'type' => 'file',
			) );			
			$testimonial->add_field(array(
				'name' => esc_html__( 'Logo Image', 'themex' ),
				'id'   => $prefix .'testi_logo',
				'desc'       => esc_html__( 'insert logo image here, Recommenddt Image Size, Example:85*85, Working Style only 4,9,10,12,13', 'themex' ),  
				'type' => 'file',
			) );
/*			
			$testimonial->add_field( array(
				'name'       => esc_html__( 'Date Field', 'themex' ),
				'desc'       => esc_html__( 'insert date here ex- 16, November 2018', 'themex' ),
				'id'         => $prefix . 'em_tes_date',
				'type'       => 'text',
			) );					
			$testimonial->add_field( array(
				'name'       => esc_html__( 'Active Class', 'themex' ),
				'desc'       => esc_html__( 'insert class "tactive" here', 'themex' ),
				'id'         => $prefix . 'testi_active',
				'type'       => 'text',
			) );	
*/			
				
			//===================================
			//Team Metaboxes
			//===================================  				
		//em_team metabox
		$team = new_cmb2_box( array(
			'id'            => $prefix . 'em_team',
			'title'         => esc_html__( 'Team Option', 'themex' ),
			'object_types'  => array( 'em_team' ), // Post type
			'priority'   => 'high',
		) );

			$team->add_field( array(
				'name'       => esc_html__( 'Designation', 'themex' ),
				'desc'       => esc_html__( 'insert designation title here ex- Team Information hhere', 'themex' ),
				'id'         => $prefix . 'team_titles',
				'type'       => 'text',
				'default' =>'Funder',
			) );
			   $team->add_field( array(
				'name'       => esc_html__( ' List Text', 'themex' ),
				'desc'       => esc_html__( 'List Working Team Style 8. use list from here, must be use the stcructure ex <ul><li><a href="#"> <i class="icofont-phone"></i> 099 - 563 369 58</a></li><li><a href="#"><i class="icofont-envelope"></i>demo@example.com</a></li></ul> OR <ul><li> <i class="icofont-phone"></i> 099 - 563 369 58</li><li><i class="icofont-envelope"></i>demo@example.com</li></ul>', 'themex' ),
				'id'         => $prefix . 'listt_text',
				'type'       => 'textarea',
				'default' => '<ul><li> <i class="icofont-phone"></i> 099 - 563 369 58</li><li><i class="icofont-envelope"></i>demo@example.com</li></ul>',
			   ) );			

			// class single meta field every day time
				$teamgrop3 = $team->add_field( array(
				  'id'          => $prefix . 'teamgroup',
				  'type'        => 'group',
				  'description' => __( 'Add single Social', 'themex' ),
				  'options'     => array(
				   'group_title'   => __( 'Social Item {#}', 'themex' ), // {#} gets replaced by row number
				   'add_button'    => __( 'Add Item', 'themex' ),
				   'remove_button' => __( 'Remove Icon', 'themex' ),
				   'sortable'      => true, // beta
					),
				) );
				$team->add_group_field( $teamgrop3, array(
					'name'       => __( 'Social Icon Name', 'themex' ),
					'desc'       => esc_html__( 'Enter your Name ex-icofont=icofont-facebook, Themify=ti-star,Font-awesome=fa fa-bell.Suppot Font-awesome,icofont,Themify, icons.', 'themex' ),
					'id'         => $prefix . 'time_i',
					'type'       => 'text',
					'default' =>'icofont-facebook',
				) );
				$team->add_group_field( $teamgrop3, array(
					'name'       => __( 'Social Link', 'themex' ),
					'desc'       => __( 'Enter your Icon Link ex- www.example.com', 'themex' ),
					'id'         => $prefix . 'team_l',
					'type'       => 'text',
					'default' =>'#',
				) );
				
				$team->add_field( array(
					'name'       => esc_html__( 'Team Information Title', 'themex' ),
					'desc'       => esc_html__( 'insert designation title here ex- Team Information hhere', 'themex' ),
					'id'         => $prefix . 'team_Info',
					'default' => 'Team Information',
					'type'       => 'text',
				) );				
			   $team->add_field( array(
				'name'       => esc_html__( 'Single Team List Text', 'themex' ),
				'desc'       => esc_html__( 'List use from here, must be use the stcructure ex <ul><li><a href="#"> <i class="icofont-phone"></i> 099 - 563 369 58</a></li><li><a href="#"><i class="icofont-envelope"></i>demo@example.com</a></li><li><a href="#"> <i class="icofont-google-map"></i>themex Floor New World, UK.</a></li></ul> OR <ul><li><i class="icofont-phone"></i> 099 - 563 369 58</li><li><i class="icofont-envelope"></i>demo@example.com</li><li><i class="icofont-google-map"></i>themex Floor New World, UK.</li></ul>', 'themex' ),
				'id'         => $prefix . 'single_list',
				'type'       => 'textarea',
				'default' => '<ul><li><i class="icofont-phone"></i> 099 - 563 369 58</li><li><i class="icofont-envelope"></i>demo@example.com</li><li><i class="icofont-google-map"></i>themex Floor New World, UK.</li></ul>',
			   ) );
				//Button
				$team->add_field( array(
					'name'       => esc_html__( 'Button Text', 'themex' ),
					'desc'       => esc_html__( 'insert button text here', 'themex' ),
					'id'         => $prefix . 'team_btn',
					'default' => 'Contact Me At',
					'type'       => 'text',
				) );
				$team->add_field( array(
					'name'       => esc_html__( 'Button url', 'themex' ),
					'desc'       => esc_html__( 'insert button text url here', 'themex' ),
					'id'         => $prefix . 'team_btnutl',
					'default' => '#',
					'type'       => 'text_url',
				) );				
			//===================================
			//Portfolio Metaboxes
			//===================================  

			$portfolio = new_cmb2_box( array(
				'id'            => $prefix . 'portfolio',
				'title'         => esc_html__( 'Portfolio Option', 'themex' ),
				'object_types'  => array( 'em_portfolio', ), // Post type
				'priority'   => 'high',
			) );
			   $portfolio->add_field( array(
				'name'       => esc_html__( 'Project Information Title', 'themex' ),
				'desc'       => esc_html__( 'add your title here', 'themex' ),
				'id'         => $prefix . 'pftitle',
				'type'       => 'text',
				'default' => 'Project Information',
			   ) );
			 // class single meta field every day time
				$portgrop2 = $portfolio->add_field( array(
				  'id'          => $prefix . 'portgroup',
				  'type'        => 'group',
				  'description' => __( 'Add Feature List', 'themex' ),
				  'options'     => array(
				   'group_title'   => __( 'List Item {#}', 'themex' ), // {#} gets replaced by row number
				   'add_button'    => __( 'Add Item', 'themex' ),
				   'remove_button' => __( 'Remove Icon', 'themex' ),
				   'sortable'      => true, // beta
					),
				) );
				$portfolio->add_group_field( $portgrop2, array(
					'name'       => __( 'List Title', 'themex' ),
					'desc'       => __( 'add title here', 'themex' ),
					'id'         => $prefix . 'pttitle',
					'type'       => 'text',
					'default' => 'Name ',
				) );
				$portfolio->add_group_field( $portgrop2, array(
					'name'       => __( 'List Value', 'themex' ),
					'desc'       => esc_html__( 'insert Value', 'themex' ),
					'id'         => $prefix . 'ptvalue',
					'type'       => 'textarea',
					'default' => 'Example Theme Customize',
				) );




//===================================
//service  metabox
//===================================
		$service = new_cmb2_box( array(
			'id'            => $prefix . 'service',
			'title'         => esc_html__( 'service Option', 'themex' ),
			'object_types'  => array( 'em_service', ), // Post type
			'priority'   => 'high',
		) );
			  $service->add_field( array(
			   'name'    => esc_html__('Show/Hide Icon Image','themex'),			  
			   'id'      => $prefix . 'service_icon_img',
			   'type'    => 'radio_inline',
			   'options' => array(
				'icon_img_show' => esc_html__( 'Show', 'themex' ),
				'icon_img_hide'   => esc_html__( 'Hide', 'themex' ),
			   ),
			   'default' =>'icon_img_hide',
			  ) );	
				$service->add_field(array(
					'name' => esc_html__( 'Icon Image', 'themex' ),
					'id'   => $prefix .'img_s',
					'desc'       => esc_html__( 'insert icon image here', 'themex' ),  
					'type' => 'file',
				) );
				
				$service->add_field( array(
			   'name'    => esc_html__('Show/Hide Custom Icon','themex'),			  
			   'id'      => $prefix . 'service_icon',
			   'type'    => 'radio_inline',
			   'options' => array(
				'c_icon_show' => esc_html__( 'Show', 'themex' ),
				'c_icon_hide'   => esc_html__( 'Hide', 'themex' ),
			   ),
			   'default' =>'c_icon_show',
			  ) );	
			   $service->add_field( array(
				'name'       => esc_html__( 'Icon Name Here', 'themex' ),
				'desc'       => esc_html__( 'Enter your Name ex-icofont=icofont-addons, Themify=ti-star,Font-Awesome=fa fa-bell.Suppot Font-awesome,icofont,Themify, icons.', 'themex' ),
				'id'         => $prefix . 'icon_text',
				'type'       => 'text',
				'default' =>'icofont-addons',
			   ) );
			   
			   $service->add_field( array(
				'name'       => esc_html__( 'Sub Title', 'themex' ),
				'desc'       => esc_html__( 'Not use title, remove the text from field, Sub Title Working Style 11', 'themex' ),
				'id'         => $prefix . 'subtitle',
				'type'       => 'text',
				'default' =>'Sub title here',
			   ) );
			   
				$service->add_field( array(
			   'name'    => esc_html__('Show/Hide List','themex'),			  
			   'id'      => $prefix . 'show_list',
			   'type'    => 'radio_inline',
			   'options' => array(
				'c_list_show' => esc_html__( 'Show', 'themex' ),
				'c_list_hide'   => esc_html__( 'Hide', 'themex' ),
			   ),
			   'default' =>'c_list_show',
			  ) );			  
			  
			   $service->add_field( array(
				'name'       => esc_html__( ' List', 'themex' ),
				'desc'       => esc_html__( 'List Working Style 10,11. use list from here, must be use the stcructure ex <ul><li><a href="#">example list 1</a></li><li><a href="#">example list 2</a></li></ul> OR TEXT USE EX-<ul><li><p>Text List</p></li></ul> OR TEXT USE EX-<ul><li><span>Text List</span></li></ul> OR TEXT USE EX-<ul><li>Text List</li></ul> when icon use ex <ul><li><i class="icofont-check"></i></li><li><i class="icofont-check"></i></li></ul>', 'themex' ),
				'id'         => $prefix . 'list_text',
				'type'       => 'textarea',
				'default' => '<ul><li><i class="icofont-check"></i></li><li><i class="icofont-check"></i></li></ul><ul><li><a href="#">example list 1</a></li><li><a href="#">example list 2</a></li></ul>',
			   ) );				
				
			   $service->add_field( array(
				'name'       => esc_html__( 'Service Information Title', 'themex' ),
				'desc'       => esc_html__( 'add your title here', 'themex' ),
				'id'         => $prefix . 'infotitle',
				'type'       => 'text',
				'default' =>'Service Information',
			   ) );
			 // class single meta field every day time
				$service2 = $service->add_field( array(
				  'id'          => $prefix . 'portgroup',
				  'type'        => 'group',
				  'description' => __( 'Add Feature List', 'themex' ),
				  'options'     => array(
				   'group_title'   => __( 'List Item {#}', 'themex' ), // {#} gets replaced by row number
				   'add_button'    => __( 'Add Item', 'themex' ),
				   'remove_button' => __( 'Remove Icon', 'themex' ),
				   'sortable'      => true, // beta
					),
				) );
				$service->add_group_field( $service2, array(
					'name'       => __( 'List Title', 'themex' ),
					'desc'       => __( 'add title here', 'themex' ),
					'id'         => $prefix . 'pttitle',
					'type'       => 'text',
					'default' =>'Name:',
				) );
				$service->add_group_field( $service2, array(
					'name'       => __( 'List Text', 'themex' ),
					'desc'       => esc_html__( 'insert Your Text, Support- a,example:<a href="#">text here</a>', 'themex' ),
					'id'         => $prefix . 'ptvalue',
					'type'       => 'textarea',
					'default' =>'Business Plan',
				) );




			  
//===================================
//Pricing table metabox
//===================================
		$pricing = new_cmb2_box( array(
			'id'            => $prefix . 'pricing',
			'title'         => esc_html__( 'Price Option', 'themex' ),
			'object_types'  => array( 'em_pricing', ), // Post type
			'priority'   => 'high',
		) );
				$pricing->add_field( array(
					'name'       => esc_html__( 'Price Currency', 'themex' ),
					'desc'       => esc_html__( 'insert Currency here e.g $', 'themex' ),
					'id'         => $prefix . 'currency',
					'type'       => 'text',
				) );	
				$pricing->add_field( array(
					'name'       => esc_html__( 'Price Amount', 'themex' ),
					'desc'       => esc_html__( 'insert Amount here', 'themex' ),
					'id'         => $prefix . 'price_amount',
					'type'       => 'text',
				) );	
				$pricing->add_field( array(
					'name'       => esc_html__( 'Price Delay', 'themex' ),
					'desc'       => esc_html__( 'insert Year, Month, Week or Day here', 'themex' ),
					'id'         => $prefix . 'day',
					'type'       => 'text',
				) );						
				$pricing->add_field( array(
					'name'       => esc_html__( 'pricing content', 'themex' ),
					'desc'       => esc_html__( 'insert pricing Item', 'themex' ),
					'id'         => $prefix . 'pricing_item_loop',
					'type'       => 'text',
					'repeatable'      => true,
				) );
				$pricing->add_field( array(
					'name' => esc_html__( 'Button Text', 'themex' ),
					'desc' => esc_html__( 'Insert Text Here', 'themex' ),
					'id'   => $prefix . 'button_text',
					'type' => 'text',
				) );					
				$pricing->add_field( array(
					'name' => esc_html__( 'Button Link', 'themex' ),
					'desc' => esc_html__( 'Insert register Link', 'themex' ),
					'id'   => $prefix . 'button_link',
					'type' => 'text_url',
				) );
				$pricing->add_field( array(
					'name' => esc_html__( 'Active Class', 'themex' ),
					'desc' => esc_html__( 'Add Active Class here "active"', 'themex' ),
					'id'   => $prefix . 'active',
					'type' => 'text',
				) );

			//post tab metabox
			$emtab = new_cmb2_box( array(
				'id'            => $prefix . 'em_tab',
				'title'         => esc_html__( 'Tab Option', 'themex' ),
				'object_types'  => array( 'em_tab' ), // Post type
				'priority'   => 'high',
			) );

				$emtab->add_field( array(
					'name'       => esc_html__( 'Tab Menu Name', 'themex' ),
					'desc'       => esc_html__( 'insert tab menu here', 'themex' ),
					'id'         => $prefix . 'em_tab_menu',
					'type'       => 'text',
					'default' => 'Tab One',					
				) );					
									
				$emtab->add_field(array(
					'name' => esc_html__( 'Tab Menu Image', 'themex' ),
					'id'   => $prefix .'em_tab_image',
					'desc'       => esc_html__( 'insert image here', 'themex' ),  
					'type' => 'file',
				) );
				$emtab->add_field( array(
					'name'       => esc_html__( 'Button Text 1', 'themex' ),
					'desc'       => esc_html__( 'insert button text here', 'themex' ),
					'id'         => $prefix . 'em_tab_btn1',
					'type'       => 'text',
					'default' => 'Read More',
				) );
				$emtab->add_field( array(
					'name'       => esc_html__( 'Button url 1', 'themex' ),
					'desc'       => esc_html__( 'insert button text url here', 'themex' ),
					'id'         => $prefix . 'em_tab_btn1utl',
					'type'       => 'text_url',
					'default' => '#',
				) );			
				$emtab->add_field( array(
					'name'       => esc_html__( 'Button Text 2', 'themex' ),
					'desc'       => esc_html__( 'insert button text here', 'themex' ),
					'id'         => $prefix . 'em_tab_btn2',
					'type'       => 'text',
				) );
				$emtab->add_field( array(
					'name'       => esc_html__( 'Button url 2', 'themex' ),
					'desc'       => esc_html__( 'insert button text url here', 'themex' ),
					'id'         => $prefix . 'em_tab_btn2url',
					'type'       => 'text_url',
				) );
				$emtab->add_field( array(
					'name'       => esc_html__( 'Tab Menu Active', 'themex' ),
					'desc'       => esc_html__( 'must be set "active show" class into one post from all post, for active tab item', 'themex' ),
					'id'         => $prefix . 'em_tab_active',
					'type'       => 'text',
				) );	


		//em_event metabox
		$event = new_cmb2_box( array(
			'id'            => $prefix . 'em_event',
			'title'         => esc_html__( 'Event Option', 'themex' ),
			'object_types'  => array( 'em_event' ), // Post type
			'priority'   => 'high',
		) );
			$event->add_field( array(
				'name'       => esc_html__( 'Day', 'themex' ),
				'desc'       => esc_html__( 'insert time here ex- 28', 'themex' ),
				'id'         => $prefix . 'event_day',
				'type'       => 'text',
			) );
			$event->add_field( array(
				'name'       => esc_html__( 'Month', 'themex' ),
				'desc'       => esc_html__( 'insert time here ex- May', 'themex' ),
				'id'         => $prefix . 'event_month',
				'type'       => 'text',
			) );
			$event->add_field( array(
				'name'       => esc_html__( 'Year', 'themex' ),
				'desc'       => esc_html__( 'insert time here ex- 2020', 'themex' ),
				'id'         => $prefix  . 'event_year',
				'type'       => 'text',
			) );			
			$event->add_field( array(
				'name'       => esc_html__( 'Time', 'themex' ),
				'desc'       => esc_html__( 'insert time here ex- 10PM-12PM', 'themex' ),
				'id'         => $prefix . 'event_time',
				'type'       => 'text',
			) );					
			$event->add_field( array(
				'name'       => esc_html__( 'Address', 'themex' ),
				'desc'       => esc_html__( 'insert address here ex- Rangpur, Bangladesh', 'themex' ),
				'id'         => $prefix . 'event_address',
				'type'       => 'text',
			) );
			$event->add_field( array(
				'name'       => esc_html__( 'Title', 'themex' ),
				'desc'       => esc_html__( 'insert title here ex- Event Informationh', 'themex' ),
				'id'         => $prefix . 'event_titles',
				'type'       => 'text',
			) );			
				
			 // class single meta field every day time
				$eventgrop3 = $event->add_field( array(
				  'id'          => $prefix . 'eventgroup',
				  'type'        => 'group',
				  'description' => __( 'Add single address', 'themex' ),
				  'options'     => array(
				   'group_title'   => __( 'Address Item {#}', 'themex' ), // {#} gets replaced by row number
				   'add_button'    => __( 'Add Item', 'themex' ),
				   'remove_button' => __( 'Remove Icon', 'themex' ),
				   'sortable'      => true, // beta
					),
				) );
				$event->add_group_field( $eventgrop3, array(
					'name'       => __( 'Address key', 'themex' ),
					'desc'       => __( 'insert key', 'themex' ),
					'id'         => $prefix . 'etime1',
					'type'       => 'text',
				) );
				$event->add_group_field( $eventgrop3, array(
					'name'       => __( 'Address Value', 'themex' ),
					'desc'       => __( 'insert Value', 'themex' ),
					'id'         => $prefix . 'etime2',
					'type'       => 'text',
				) );
			
			$event->add_field( array(
				'name'       => esc_html__( 'Admin Title', 'themex' ),
				'desc'       => esc_html__( 'insert Degignation here, This Option Working Style 7', 'themex' ),
				'id'         => $prefix . 'admin_title',
				'type'       => 'text',
			) );
			$event->add_field( array(
				'name'       => esc_html__( 'Admin Degignation', 'themex' ),
				'desc'       => esc_html__( 'insert Degignation here, This Option Working Style 7', 'themex' ),
				'id'         => $prefix . 'admin_deg',
				'type'       => 'text',
			) );
			$event->add_field(array(
				'name' => esc_html__( 'Admin Image', 'themex' ),
				'id'   => $prefix .'admin_img',
				'desc'       => esc_html__( 'insert admin image here, This Option Working Style 7', 'themex' ),  
				'type' => 'file',
			) );			
			
			$event->add_field( array(
				'name'       => esc_html__( 'Google map', 'themex' ),
				'desc'       => esc_html__( 'insert your google map embed link', 'themex' ),
				'id'         => $prefix . 'map_event',
				'type'       => 'textarea_code',
			) );	
				
				
				
//slider table metabox
	$slider = new_cmb2_box( array(
		'id'            => $prefix . 'txbdm_slider',
		'title'         => esc_html__( 'Slider Option', 'themex' ),
		'object_types'  => array( 'em_slider', ), // Post type
		'priority'   => 'high',
	) );
	
	
			$slider->add_field( array(
				'name'       => esc_html__( 'Title', 'themex' ),
				'desc'       => esc_html__( 'insert title here. for highlight text use <span> ex-<span>Design</span>', 'themex' ),
				'id'         => $prefix . 'em_slide_title',
				'type'       => 'textarea_small',
			) );

			$slider->add_field( array(
				'name'    => esc_html__('Title Animate','themex'),
				'id'      => $prefix . 'em_aimate_title',
				'show_option_none' => true,					
				'type'    => 'select',
				'options' => array(
					'bounceIn' => esc_html__( 'bounceIn', 'themex' ),				
					'bounceInDown' => esc_html__( 'bounceInDown', 'themex' ),				
					'bounceInLeft' => esc_html__( 'bounceInLeft', 'themex' ),				
					'bounceInRight' => esc_html__( 'bounceInRight', 'themex' ),				
					'bounceInUp' => esc_html__( 'bounceInUp', 'themex' ),				
					'fadeIn' => esc_html__( 'fadeIn', 'themex' ),				
					'fadeInDown' => esc_html__( 'fadeInDown', 'themex' ),				
					'fadeInDownBig' => esc_html__( 'fadeInDownBig', 'themex' ),				
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'themex' ),				
					'fadeInLeftBig' => esc_html__( 'fadeInLeftBig', 'themex' ),				
					'fadeInRight' => esc_html__( 'fadeInRight', 'themex' ),				
					'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'themex' ),				
					'fadeInUp' => esc_html__( 'fadeInUp', 'themex' ),				
					'fadeInUpBig' => esc_html__( 'fadeInUpBig', 'themex' ),				
					'rotateIn' => esc_html__( 'rotateIn', 'themex' ),				
					'rotateInDownLeft' => esc_html__( 'rotateInDownLeft', 'themex' ),				
					'rotateInDownRight' => esc_html__( 'rotateInDownRight', 'themex' ),				
					'rotateInUpLeft' => esc_html__( 'rotateInUpLeft', 'themex' ),				
					'rotateInUpRight' => esc_html__( 'rotateInUpRight', 'themex' ),				
					'rollIn' => esc_html__( 'rollIn', 'themex' ),				
					'zoomIn' => esc_html__( 'zoomIn', 'themex' ),				
					'zoomInDown' => esc_html__( 'zoomInDown', 'themex' ),				
					'zoomInLeft' => esc_html__( 'zoomInLeft', 'themex' ),				
					'zoomInRight' => esc_html__( 'zoomInRight', 'themex' ),				
					'zoomInUp' => esc_html__( 'zoomInUp', 'themex' ),				
					'slideInDown' => esc_html__( 'slideInDown', 'themex' ),				
					'slideInLeft' => esc_html__( 'slideInLeft', 'themex' ),				
					'slideInRight' => esc_html__( 'slideInRight', 'themex' ),				
					'slideInUp' => esc_html__( 'slideInUp', 'themex' ),				
				),
				'default' =>'slideInRight',
			) );
			

			$slider->add_field( array(
				'name'    => esc_html__('Title Animate Duration','themex'),
				'id'      => $prefix . 'em_durations_title',
				'show_option_none' => false,					
				'type'    => 'select',
				'options' => array(
					'0.1' => esc_html__( 'point 1s', 'themex' ),							
					'0.2' => esc_html__( 'point 2s', 'themex' ),							
					'0.3' => esc_html__( 'point 3s', 'themex' ),							
					'0.4' => esc_html__( 'point 4s', 'themex' ),							
					'0.5' => esc_html__( 'point 5s', 'themex' ),							
					'0.6' => esc_html__( 'point 6s', 'themex' ),							
					'0.7' => esc_html__( 'point 7s', 'themex' ),							
					'0.8' => esc_html__( 'point 8s', 'themex' ),							
					'0.9' => esc_html__( 'point 9s', 'themex' ),							
					'1.2' => esc_html__( '1 point 2s', 'themex' ),							
					'1.3' => esc_html__( '1 point 3s', 'themex' ),							
					'1.4' => esc_html__( '1 point 4s', 'themex' ),							
					'1.5' => esc_html__( '1 point 5s', 'themex' ),							
					'1.8' => esc_html__( '1 point 8s', 'themex' ),							
					'2' => esc_html__( '2s', 'themex' ),							
					'2.2' => esc_html__( '2 point 2s', 'themex' ),							
					'2.3' => esc_html__( '2 point 5s', 'themex' ),							
					'3' => esc_html__( '3s', 'themex' ),							
				),
				'default' =>'2',
			) );
			$slider->add_field( array(
				'name'    => esc_html__('Title Animate Delay','themex'),
				'id'      => $prefix . 'em_dealy_title',
				'show_option_none' => false,					
				'type'    => 'select',
				'options' => array(
					'0' => esc_html__( 'point 0s', 'themex' ),							
					'0.1' => esc_html__( 'point 1s', 'themex' ),							
					'0.2' => esc_html__( 'point 2s', 'themex' ),							
					'0.3' => esc_html__( 'point 3s', 'themex' ),							
					'0.4' => esc_html__( 'point 4s', 'themex' ),							
					'0.5' => esc_html__( 'point 5s', 'themex' ),							
					'0.6' => esc_html__( 'point 6s', 'themex' ),							
					'0.7' => esc_html__( 'point 7s', 'themex' ),							
					'0.8' => esc_html__( 'point 8s', 'themex' ),							
					'0.9' => esc_html__( 'point 9s', 'themex' ),							
					'1.2' => esc_html__( '1 point 2s', 'themex' ),							
					'1.3' => esc_html__( '1 point 3s', 'themex' ),							
					'1.4' => esc_html__( '1 point 4s', 'themex' ),							
					'1.5' => esc_html__( '1 point 5s', 'themex' ),							
					'1.8' => esc_html__( '1 point 8s', 'themex' ),							
					'2' => esc_html__( '2s', 'themex' ),							
					'2.2' => esc_html__( '2 point 2s', 'themex' ),							
					'2.3' => esc_html__( '2 point 5s', 'themex' ),							
					'3' => esc_html__( '3s', 'themex' ),							
				),
				'default' =>'0',
			) );		

		
		
		
			
			$slider->add_field( array(
				'name'       => esc_html__( 'Sub Title', 'themex' ),
				'desc'       => esc_html__( 'insert sub-title here. for highlight text use <span> ex-<span>website</span>', 'themex' ),
				'id'         => $prefix . 'em_slide_subtitle',
				'type'       => 'textarea_small',
			) );
			$slider->add_field( array(
				'name'    => esc_html__('Sub Title Animate','themex'),
				'id'      => $prefix . 'em_aimate_subtitle',
				'show_option_none' => true,					
				'type'    => 'select',
				'options' => array(
					'bounceIn' => esc_html__( 'bounceIn', 'themex' ),				
					'bounceInDown' => esc_html__( 'bounceInDown', 'themex' ),				
					'bounceInLeft' => esc_html__( 'bounceInLeft', 'themex' ),				
					'bounceInRight' => esc_html__( 'bounceInRight', 'themex' ),				
					'bounceInUp' => esc_html__( 'bounceInUp', 'themex' ),				
					'fadeIn' => esc_html__( 'fadeIn', 'themex' ),				
					'fadeInDown' => esc_html__( 'fadeInDown', 'themex' ),				
					'fadeInDownBig' => esc_html__( 'fadeInDownBig', 'themex' ),				
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'themex' ),				
					'fadeInLeftBig' => esc_html__( 'fadeInLeftBig', 'themex' ),				
					'fadeInRight' => esc_html__( 'fadeInRight', 'themex' ),				
					'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'themex' ),				
					'fadeInUp' => esc_html__( 'fadeInUp', 'themex' ),				
					'fadeInUpBig' => esc_html__( 'fadeInUpBig', 'themex' ),				
					'rotateIn' => esc_html__( 'rotateIn', 'themex' ),				
					'rotateInDownLeft' => esc_html__( 'rotateInDownLeft', 'themex' ),				
					'rotateInDownRight' => esc_html__( 'rotateInDownRight', 'themex' ),				
					'rotateInUpLeft' => esc_html__( 'rotateInUpLeft', 'themex' ),				
					'rotateInUpRight' => esc_html__( 'rotateInUpRight', 'themex' ),				
					'rollIn' => esc_html__( 'rollIn', 'themex' ),				
					'zoomIn' => esc_html__( 'zoomIn', 'themex' ),				
					'zoomInDown' => esc_html__( 'zoomInDown', 'themex' ),				
					'zoomInLeft' => esc_html__( 'zoomInLeft', 'themex' ),				
					'zoomInRight' => esc_html__( 'zoomInRight', 'themex' ),				
					'zoomInUp' => esc_html__( 'zoomInUp', 'themex' ),				
					'slideInDown' => esc_html__( 'slideInDown', 'themex' ),				
					'slideInLeft' => esc_html__( 'slideInLeft', 'themex' ),				
					'slideInRight' => esc_html__( 'slideInRight', 'themex' ),				
					'slideInUp' => esc_html__( 'slideInUp', 'themex' ),				
				),
				'default' =>'slideInRight',
			) );
			

			$slider->add_field( array(
				'name'    => esc_html__('Sub Title Animate Duration','themex'),
				'id'      => $prefix . 'em_durations_subtitle',
				'show_option_none' => false,					
				'type'    => 'select',
				'options' => array(
					'0.1' => esc_html__( 'point 1s', 'themex' ),							
					'0.2' => esc_html__( 'point 2s', 'themex' ),							
					'0.3' => esc_html__( 'point 3s', 'themex' ),							
					'0.4' => esc_html__( 'point 4s', 'themex' ),							
					'0.5' => esc_html__( 'point 5s', 'themex' ),							
					'0.6' => esc_html__( 'point 6s', 'themex' ),							
					'0.7' => esc_html__( 'point 7s', 'themex' ),							
					'0.8' => esc_html__( 'point 8s', 'themex' ),							
					'0.9' => esc_html__( 'point 9s', 'themex' ),							
					'1.2' => esc_html__( '1 point 2s', 'themex' ),							
					'1.3' => esc_html__( '1 point 3s', 'themex' ),							
					'1.4' => esc_html__( '1 point 4s', 'themex' ),							
					'1.5' => esc_html__( '1 point 5s', 'themex' ),							
					'1.8' => esc_html__( '1 point 8s', 'themex' ),							
					'2' => esc_html__( '2s', 'themex' ),							
					'2.2' => esc_html__( '2 point 2s', 'themex' ),							
					'2.3' => esc_html__( '2 point 5s', 'themex' ),							
					'3' => esc_html__( '3s', 'themex' ),							
				),
				'default' =>'2',
			) );
			$slider->add_field( array(
				'name'    => esc_html__('Sub Title Animate Delay','themex'),
				'id'      => $prefix . 'em_dealy_subtitle',
				'show_option_none' => false,					
				'type'    => 'select',
				'options' => array(
					'0' => esc_html__( 'point 0s', 'themex' ),							
					'0.1' => esc_html__( 'point 1s', 'themex' ),							
					'0.2' => esc_html__( 'point 2s', 'themex' ),							
					'0.3' => esc_html__( 'point 3s', 'themex' ),							
					'0.4' => esc_html__( 'point 4s', 'themex' ),							
					'0.5' => esc_html__( 'point 5s', 'themex' ),							
					'0.6' => esc_html__( 'point 6s', 'themex' ),							
					'0.7' => esc_html__( 'point 7s', 'themex' ),							
					'0.8' => esc_html__( 'point 8s', 'themex' ),							
					'0.9' => esc_html__( 'point 9s', 'themex' ),							
					'1.2' => esc_html__( '1 point 2s', 'themex' ),							
					'1.3' => esc_html__( '1 point 3s', 'themex' ),							
					'1.4' => esc_html__( '1 point 4s', 'themex' ),							
					'1.5' => esc_html__( '1 point 5s', 'themex' ),							
					'1.8' => esc_html__( '1 point 8s', 'themex' ),							
					'2' => esc_html__( '2s', 'themex' ),							
					'2.2' => esc_html__( '2 point 2s', 'themex' ),							
					'2.3' => esc_html__( '2 point 5s', 'themex' ),							
					'3' => esc_html__( '3s', 'themex' ),							
				),
				'default' =>'0',
			) );


			
			$slider->add_field( array(
				'name'       => esc_html__( 'Content', 'themex' ),
				'desc'       => esc_html__( 'use insert content here', 'themex' ),				
				'id'         => $prefix . 'em_slide_textarea',
				'type'       => 'textarea',
			) );
			$slider->add_field( array(
				'name'    => esc_html__('Content Animate','themex'),
				'id'      => $prefix . 'em_aimate_content',
				'show_option_none' => true,					
				'type'    => 'select',
				'options' => array(
					'bounceIn' => esc_html__( 'bounceIn', 'themex' ),				
					'bounceInDown' => esc_html__( 'bounceInDown', 'themex' ),				
					'bounceInLeft' => esc_html__( 'bounceInLeft', 'themex' ),				
					'bounceInRight' => esc_html__( 'bounceInRight', 'themex' ),				
					'bounceInUp' => esc_html__( 'bounceInUp', 'themex' ),				
					'fadeIn' => esc_html__( 'fadeIn', 'themex' ),				
					'fadeInDown' => esc_html__( 'fadeInDown', 'themex' ),				
					'fadeInDownBig' => esc_html__( 'fadeInDownBig', 'themex' ),				
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'themex' ),				
					'fadeInLeftBig' => esc_html__( 'fadeInLeftBig', 'themex' ),				
					'fadeInRight' => esc_html__( 'fadeInRight', 'themex' ),				
					'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'themex' ),				
					'fadeInUp' => esc_html__( 'fadeInUp', 'themex' ),				
					'fadeInUpBig' => esc_html__( 'fadeInUpBig', 'themex' ),				
					'rotateIn' => esc_html__( 'rotateIn', 'themex' ),				
					'rotateInDownLeft' => esc_html__( 'rotateInDownLeft', 'themex' ),				
					'rotateInDownRight' => esc_html__( 'rotateInDownRight', 'themex' ),				
					'rotateInUpLeft' => esc_html__( 'rotateInUpLeft', 'themex' ),				
					'rotateInUpRight' => esc_html__( 'rotateInUpRight', 'themex' ),				
					'rollIn' => esc_html__( 'rollIn', 'themex' ),				
					'zoomIn' => esc_html__( 'zoomIn', 'themex' ),				
					'zoomInDown' => esc_html__( 'zoomInDown', 'themex' ),				
					'zoomInLeft' => esc_html__( 'zoomInLeft', 'themex' ),				
					'zoomInRight' => esc_html__( 'zoomInRight', 'themex' ),				
					'zoomInUp' => esc_html__( 'zoomInUp', 'themex' ),				
					'slideInDown' => esc_html__( 'slideInDown', 'themex' ),				
					'slideInLeft' => esc_html__( 'slideInLeft', 'themex' ),				
					'slideInRight' => esc_html__( 'slideInRight', 'themex' ),				
					'slideInUp' => esc_html__( 'slideInUp', 'themex' ),				
				),
				'default' =>'slideInRight',
			) );
			

			$slider->add_field( array(
				'name'    => esc_html__('Content Animate Duration','themex'),
				'id'      => $prefix . 'em_durations_content',
				'show_option_none' => false,					
				'type'    => 'select',
				'options' => array(
					'0.1' => esc_html__( 'point 1s', 'themex' ),							
					'0.2' => esc_html__( 'point 2s', 'themex' ),							
					'0.3' => esc_html__( 'point 3s', 'themex' ),							
					'0.4' => esc_html__( 'point 4s', 'themex' ),							
					'0.5' => esc_html__( 'point 5s', 'themex' ),							
					'0.6' => esc_html__( 'point 6s', 'themex' ),							
					'0.7' => esc_html__( 'point 7s', 'themex' ),							
					'0.8' => esc_html__( 'point 8s', 'themex' ),							
					'0.9' => esc_html__( 'point 9s', 'themex' ),							
					'1.2' => esc_html__( '1 point 2s', 'themex' ),							
					'1.3' => esc_html__( '1 point 3s', 'themex' ),							
					'1.4' => esc_html__( '1 point 4s', 'themex' ),							
					'1.5' => esc_html__( '1 point 5s', 'themex' ),							
					'1.8' => esc_html__( '1 point 8s', 'themex' ),							
					'2' => esc_html__( '2s', 'themex' ),							
					'2.2' => esc_html__( '2 point 2s', 'themex' ),							
					'2.3' => esc_html__( '2 point 5s', 'themex' ),							
					'3' => esc_html__( '3s', 'themex' ),							
				),
				'default' =>'3',
			) );
			$slider->add_field( array(
				'name'    => esc_html__('Content Animate Delay','themex'),
				'id'      => $prefix . 'em_dealy_content',
				'show_option_none' => false,					
				'type'    => 'select',
				'options' => array(
					'0' => esc_html__( 'point 0s', 'themex' ),							
					'0.1' => esc_html__( 'point 1s', 'themex' ),							
					'0.2' => esc_html__( 'point 2s', 'themex' ),							
					'0.3' => esc_html__( 'point 3s', 'themex' ),							
					'0.4' => esc_html__( 'point 4s', 'themex' ),							
					'0.5' => esc_html__( 'point 5s', 'themex' ),							
					'0.6' => esc_html__( 'point 6s', 'themex' ),							
					'0.7' => esc_html__( 'point 7s', 'themex' ),							
					'0.8' => esc_html__( 'point 8s', 'themex' ),							
					'0.9' => esc_html__( 'point 9s', 'themex' ),							
					'1.2' => esc_html__( '1 point 2s', 'themex' ),							
					'1.3' => esc_html__( '1 point 3s', 'themex' ),							
					'1.4' => esc_html__( '1 point 4s', 'themex' ),							
					'1.5' => esc_html__( '1 point 5s', 'themex' ),							
					'1.8' => esc_html__( '1 point 8s', 'themex' ),							
					'2' => esc_html__( '2s', 'themex' ),							
					'2.2' => esc_html__( '2 point 2s', 'themex' ),							
					'2.3' => esc_html__( '2 point 5s', 'themex' ),							
					'3' => esc_html__( '3s', 'themex' ),							
				),
				'default' =>'0',
			) );				
			
			$slider->add_field( array(
				'name'       => esc_html__( 'Button Text 1', 'themex' ),
				'desc'       => esc_html__( 'insert button text here', 'themex' ),
				'id'         => $prefix . 'em_slide_btn1',
				'type'       => 'text',
			) );
			$slider->add_field( array(
				'name'       => esc_html__( 'Button url 1', 'themex' ),
				'desc'       => esc_html__( 'insert button text url here', 'themex' ),
				'id'         => $prefix . 'em_slide_btn1utl',
				'type'       => 'text_url',
			) );			
			$slider->add_field( array(
				'name'       => esc_html__( 'Button Text 2', 'themex' ),
				'desc'       => esc_html__( 'insert button text here', 'themex' ),
				'id'         => $prefix . 'em_slide_btn2',
				'type'       => 'text',
			) );
			$slider->add_field( array(
				'name'       => esc_html__( 'Button url 2', 'themex' ),
				'desc'       => esc_html__( 'insert button text url here', 'themex' ),
				'id'         => $prefix . 'em_slide_btn2url',
				'type'       => 'text_url',
			) );
			$slider->add_field( array(
				'name'    => esc_html__('Button Animate','themex'),
				'id'      => $prefix . 'em_aimate_btn',
				'show_option_none' => true,					
				'type'    => 'select',
				'options' => array(
					'bounceIn' => esc_html__( 'bounceIn', 'themex' ),				
					'bounceInDown' => esc_html__( 'bounceInDown', 'themex' ),				
					'bounceInLeft' => esc_html__( 'bounceInLeft', 'themex' ),				
					'bounceInRight' => esc_html__( 'bounceInRight', 'themex' ),				
					'bounceInUp' => esc_html__( 'bounceInUp', 'themex' ),				
					'fadeIn' => esc_html__( 'fadeIn', 'themex' ),				
					'fadeInDown' => esc_html__( 'fadeInDown', 'themex' ),				
					'fadeInDownBig' => esc_html__( 'fadeInDownBig', 'themex' ),				
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'themex' ),				
					'fadeInLeftBig' => esc_html__( 'fadeInLeftBig', 'themex' ),				
					'fadeInRight' => esc_html__( 'fadeInRight', 'themex' ),				
					'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'themex' ),				
					'fadeInUp' => esc_html__( 'fadeInUp', 'themex' ),				
					'fadeInUpBig' => esc_html__( 'fadeInUpBig', 'themex' ),				
					'rotateIn' => esc_html__( 'rotateIn', 'themex' ),				
					'rotateInDownLeft' => esc_html__( 'rotateInDownLeft', 'themex' ),				
					'rotateInDownRight' => esc_html__( 'rotateInDownRight', 'themex' ),				
					'rotateInUpLeft' => esc_html__( 'rotateInUpLeft', 'themex' ),				
					'rotateInUpRight' => esc_html__( 'rotateInUpRight', 'themex' ),				
					'rollIn' => esc_html__( 'rollIn', 'themex' ),				
					'zoomIn' => esc_html__( 'zoomIn', 'themex' ),				
					'zoomInDown' => esc_html__( 'zoomInDown', 'themex' ),				
					'zoomInLeft' => esc_html__( 'zoomInLeft', 'themex' ),				
					'zoomInRight' => esc_html__( 'zoomInRight', 'themex' ),				
					'zoomInUp' => esc_html__( 'zoomInUp', 'themex' ),				
					'slideInDown' => esc_html__( 'slideInDown', 'themex' ),				
					'slideInLeft' => esc_html__( 'slideInLeft', 'themex' ),				
					'slideInRight' => esc_html__( 'slideInRight', 'themex' ),				
					'slideInUp' => esc_html__( 'slideInUp', 'themex' ),				
				),
				'default' =>'bounceInUp',
			) );
			

			$slider->add_field( array(
				'name'    => esc_html__('Button Animate Duration','themex'),
				'id'      => $prefix . 'em_durations_btn',
				'show_option_none' => false,					
				'type'    => 'select',
				'options' => array(
					'0.1' => esc_html__( 'point 1s', 'themex' ),							
					'0.2' => esc_html__( 'point 2s', 'themex' ),							
					'0.3' => esc_html__( 'point 3s', 'themex' ),							
					'0.4' => esc_html__( 'point 4s', 'themex' ),							
					'0.5' => esc_html__( 'point 5s', 'themex' ),							
					'0.6' => esc_html__( 'point 6s', 'themex' ),							
					'0.7' => esc_html__( 'point 7s', 'themex' ),							
					'0.8' => esc_html__( 'point 8s', 'themex' ),							
					'0.9' => esc_html__( 'point 9s', 'themex' ),							
					'1.2' => esc_html__( '1 point 2s', 'themex' ),							
					'1.3' => esc_html__( '1 point 3s', 'themex' ),							
					'1.4' => esc_html__( '1 point 4s', 'themex' ),							
					'1.5' => esc_html__( '1 point 5s', 'themex' ),							
					'1.8' => esc_html__( '1 point 8s', 'themex' ),							
					'2' => esc_html__( '2s', 'themex' ),							
					'2.2' => esc_html__( '2 point 2s', 'themex' ),							
					'2.3' => esc_html__( '2 point 5s', 'themex' ),							
					'3' => esc_html__( '3s', 'themex' ),							
				),
				'default' =>'3',
			) );
			$slider->add_field( array(
				'name'    => esc_html__('Button Animate Delay','themex'),
				'id'      => $prefix . 'em_dealy_btn',
				'show_option_none' => true,					
				'type'    => 'select',
				'options' => array(
					'0' => esc_html__( 'point 0s', 'themex' ),							
					'0.1' => esc_html__( 'point 1s', 'themex' ),							
					'0.2' => esc_html__( 'point 2s', 'themex' ),							
					'0.3' => esc_html__( 'point 3s', 'themex' ),							
					'0.4' => esc_html__( 'point 4s', 'themex' ),							
					'0.5' => esc_html__( 'point 5s', 'themex' ),							
					'0.6' => esc_html__( 'point 6s', 'themex' ),							
					'0.7' => esc_html__( 'point 7s', 'themex' ),							
					'0.8' => esc_html__( 'point 8s', 'themex' ),							
					'0.9' => esc_html__( 'point 9s', 'themex' ),							
					'1.2' => esc_html__( '1 point 2s', 'themex' ),							
					'1.3' => esc_html__( '1 point 3s', 'themex' ),							
					'1.4' => esc_html__( '1 point 4s', 'themex' ),							
					'1.5' => esc_html__( '1 point 5s', 'themex' ),							
					'1.8' => esc_html__( '1 point 8s', 'themex' ),							
					'2' => esc_html__( '2s', 'themex' ),							
					'2.2' => esc_html__( '2 point 2s', 'themex' ),							
					'2.3' => esc_html__( '2 point 5s', 'themex' ),							
					'3' => esc_html__( '3s', 'themex' ),							
				),
				'default' =>'1',
			) );				
			
			$slider->add_field(array(
				'name' => esc_html__( 'Slider Left & Right Image', 'themex' ),
				'id'   => $prefix .'slider_lr',
				'desc'       => esc_html__( 'insert image here', 'themex' ),  
				'type' => 'file',
			) );
			$slider->add_field( array(
				'name'       => esc_html__( 'Note:- Slider Left & Right Image only work on slider style 2', 'themex' ),
				'id'         => $prefix . 'title_imageh_line',
				'type'       => 'title',
			) );			
			$slider->add_field( array(
				'name'    => esc_html__('Text Alignment Style','themex'),
				'id'      => $prefix . 'em_slider_posi',
				'show_option_none' => true,					
				'type'    => 'select',
				'options' => array(
					'' => esc_html__( 'Select alignment', 'themex' ),
					'text-left' => esc_html__( 'Left Alignment', 'themex' ),
					'text-center' => esc_html__( 'Center Alignment', 'themex' ),
					'text-right' => esc_html__( 'Right Alignment', 'themex' ),
				),
				'default' =>'text-center',
			) );				
			$slider->add_field( array(
				'name'       => esc_html__( 'More Sliders Option, Please see slider widget area', 'themex' ),
				'id'         => $prefix . 'title_heading_line',
				'type'       => 'title',
			) );				
	
			
	}
}


