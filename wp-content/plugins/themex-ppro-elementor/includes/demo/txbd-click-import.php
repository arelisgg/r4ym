<?php
 if ( ! function_exists( 'twr_import_files' ) ) :
function twr_import_files() {
    return array(
        array(
            'import_file_name'             => 'Theme - themex',
            'local_import_file'            => TMAINV_EXTENSION_DIR . '/includes/demo/themex.xml',
            'local_import_widget_file'     => TMAINV_EXTENSION_DIR . '/includes/demo/themex-widgets.wie',
            'local_import_customizer_file' => TMAINV_EXTENSION_DIR . '/includes/demo/themex-export.dat',
            'local_import_redux'           => array (
                array(
                    'file_path'   => TMAINV_EXTENSION_DIR . '/includes/demo/themex_opt.json',
                    'option_name' => 'themex_opt',
                ),
            ),			
            'import_notice'                => esc_html__( 'Please Click The Demo Import Button and Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'themex' ),
        ),


		);
}
add_filter( 'pt-ocdi/import_files', 'twr_import_files' );
endif;


if ( ! function_exists( 'twr_after_import' ) ) :
function twr_after_import( $selected_import ) {
 
        //Set Menu
        $tx_top_menu = get_term_by('name', 'Top Menu', 'nav_menu');
        $tx_main_menu = get_term_by('name', 'Main Menu', 'nav_menu');
        $tx_onepage_menu = get_term_by('name', 'One Page Menu', 'nav_menu');
        $tx_footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu');
        $tx_mobile_menu = get_term_by( 'name', 'Mobile Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
			'menu-top' =>  $tx_top_menu->term_id,
			'menu-1' =>  $tx_main_menu->term_id,
			'one-pages' =>  $tx_onepage_menu->term_id,
			'menu-2' =>  $tx_footer_menu->term_id,			  
			'menu-3' =>  $tx_main_menu->term_id,			  
			  
             ) 
        );
  // Disable Elementor's Default Colors and Default Fonts
    update_option( 'elementor_disable_color_schemes', 'yes' );
    update_option( 'elementor_disable_typography_schemes', 'yes' );
    update_option( 'elementor_global_image_lightbox', '' );

		//front page		
		$front_page_id = get_page_by_title( 'Home' );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );	
     
}
add_action( 'pt-ocdi/after_import', 'twr_after_import' );
endif;