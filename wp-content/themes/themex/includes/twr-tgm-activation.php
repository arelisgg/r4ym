<?php
/**
* TGM Plugin activation
 */
require_once get_template_directory() .'/includes/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'themex_register_plugin_require' );

function themex_register_plugin_require() {

	$plugins = array(

		  array(
		   'name'               => esc_html__( 'Themex Pro Addon For themex Theme', 'themex' ),
		   'slug'               => 'themex-ppro-elementor', 
		   'source'             => esc_url('https://themexbd.com/themex/financial/wp-content/plugins/themex-ppro-elementor.zip'), 
		   'required'           => true, 
		   'force_activation'   => false, 
		   'force_deactivation' => false, 
		  ),
		array(
			'name'               => esc_html__( 'Contact form 7', 'themex' ),
			'slug'               => 'contact-form-7',
			'required'           => true, 			
		),
		array(
			'name'               => esc_html__( 'Cmb2', 'themex' ),
			'slug'               => 'cmb2',
			'required'           => true, 			
		),
		array(
			'name'               => esc_html__( 'Redux-framework', 'themex' ),
			'slug'               => 'redux-framework',
			'required'           => true, 			
		),
		array(
			'name'               => esc_html__( 'Elementor', 'themex' ),
			'slug'               => 'elementor',
			'required'           => true, 			
		),		
		array(
			'name'               => esc_html__( 'One Click Demo Import', 'themex' ),
			'slug'               => 'one-click-demo-import',
			'required'           => false, 			
		),		

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}
