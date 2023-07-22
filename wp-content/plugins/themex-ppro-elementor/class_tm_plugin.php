<?php
if ( ! defined( 'ABSPATH' ) ) {
exit;
}
final class Tm_Apro_For_Elementor {

/**
 * Minimum Elementor Version
 */
const MINIMUM_ELEMENTOR_VERSION = '3.2.5';

/**
 * Minimum PHP Version
 */
const MINIMUM_PHP_VERSION = '5.6';

private static $_instance = null;
public static function instance() {

	if ( is_null( self::$_instance ) ) {
		self::$_instance = new self();
	}
	return self::$_instance;

}

public function __construct() {

	add_action( 'init', [ $this, 'i18n' ] );
	add_action( 'plugins_loaded', [ $this, 'init' ] );

}


/* Localization */
public function i18n() {

	load_plugin_textdomain('themex', FALSE, dirname(plugin_basename(__FILE__)) . "/languages");	

}

public function init() {
	
	// Check if Elementor installed and activated
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', [ $this, 'twr_admin_notice_missing_main_plugin' ] );
		return;
	}
	// Check for required Elementor version
	if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
		add_action( 'admin_notices', [ $this, 'twr_admin_notice_minimum_elementor_version' ] );
		return;
	}
	// Check for required PHP version
	if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
		add_action( 'admin_notices', [ $this, 'twr_admin_notice_minimum_php_version' ] );
		return;
	}
	// ness file load 
	$this->twr_file_includes();
	// MAIN STYLE AND SCRIPT ADDED
	
	
}

	
	
	
	
/**
 * [is_plugins_active] Check Plugin installation status
 * @param  [string]  $themex_pl_link_path plugin location
 * @return boolean  True | False
 */
public function is_plugins_active( $themex_pl_link_path = NULL ){
	$themex_installed_plugins_all = get_plugins();
	return isset( $themex_installed_plugins_all[$themex_pl_link_path] );
}

/**
 * Admin notice
 *
 * Warning when the site doesn't have Elementor installed or activated.
 */
public function twr_admin_notice_missing_main_plugin() {

	if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

	$elementor = 'elementor/elementor.php';
	if( $this->is_plugins_active( $elementor ) ) {
		if( ! current_user_can( 'activate_plugins' ) ) { return; }

		$activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $elementor . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $elementor );

		$themex_message = '<strong>' . esc_html__( 'themex pro plugin not working, because First you need to activate the Elementor plugin.', 'themex' ) . '</strong>';
		$themex_message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $activation_url, esc_html__( 'Elementor Activate Now', 'themex' ) ) . '</p>';
	} else {
		if ( ! current_user_can( 'install_plugins' ) ) { return; }

		$install_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );

		$themex_message = '<strong>' . esc_html__( 'themex pro plugin not working, because you need to install first the Elementor plugin', 'themex' ) . '</strong>';

		$themex_message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $install_url, esc_html__( 'Elementor Install Now', 'themex' ) ) . '</p>';
	}
	echo '<div class="error"><strong>' . $themex_message . '</strong></div>';

}	

/**
 * Admin notice
 *
 * Warning when the site doesn't have a minimum required Elementor version.
 */
public function twr_admin_notice_minimum_elementor_version() {

	if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

	$themex_emessage = sprintf(
		/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
		esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'themex' ),
		'<strong>' . esc_html__( 'themex pro plugin', 'themex' ) . '</strong>',
		'<strong>' . esc_html__( 'Elementor', 'themex' ) . '</strong>',
		 self::MINIMUM_ELEMENTOR_VERSION
	);

	printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $themex_emessage );

}

/**
 * Admin notice
 *
 * Warning when the site doesn't have a minimum required PHP version.
 */
public function twr_admin_notice_minimum_php_version() {

	if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

	$themex_pmessage = sprintf(
		/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
		esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'themex' ),
		'<strong>' . esc_html__( 'themex helper plugin', 'themex' ) . '</strong>',
		'<strong>' . esc_html__( 'PHP', 'themex' ) . '</strong>',
		 self::MINIMUM_PHP_VERSION
	);

	printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $themex_pmessage );

}





public function twr_file_includes(){
	require_once TMAINV_EXTENSION_DIR.'/includes/twr_elementor_scripts.php';
	require_once TMAINV_EXTENSION_DIR.'/includes/twr_elementor_widgets_control.php';	
	require_once TMAINV_EXTENSION_DIR.'/includes/elementor/post-type.php';
	require_once(TMAINV_EXTENSION_DIR. '/includes/metabox/em-metabox.php');		
	 require_once(TMAINV_EXTENSION_DIR. '/includes/widgets/em_about.php');
	 require_once(TMAINV_EXTENSION_DIR. '/includes/widgets/em_recent_post.php');
	 require_once(TMAINV_EXTENSION_DIR. '/includes/widgets/em_footer_portfolio.php');
	 require_once(TMAINV_EXTENSION_DIR. '/includes/widgets/em_review_testi.php');
	 require_once(TMAINV_EXTENSION_DIR. '/includes/widgets/em_carousel_portfolio.php');
	 require_once(TMAINV_EXTENSION_DIR. '/includes/widgets/em-info-widget.php');		
	 require_once TMAINV_EXTENSION_DIR.'/includes/tx_helper_function.php';    
	require_once TMAINV_EXTENSION_DIR.'/includes/txicon.php';
	require_once TMAINV_EXTENSION_DIR.'/includes/admin/admin.php';
	require_once(TMAINV_EXTENSION_DIR. '/includes/demo/txbd-click-import.php');	

}	




} /* end class and star instance*/
Tm_Apro_For_Elementor::instance();