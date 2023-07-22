<?php
/*
* Plugin Name: Themex Pro Addon For Themex Financial Theme
* Plugin URI: https://webitrangpur.com/
* Description: This plugin is mandatory for themex theme. you can created best website using the plugin.
* Version: 1.0.0
* Author: Md Azijul Islam
* Author URI: https://themexbd.com/
* Text Domain: themex
* Domain Path: /languages/
*/

// Secure it
if ( ! defined( 'ABSPATH' ) ) exit;

// define constants 
define( 'TMAINV_VERSION', '1.0.0' );
define( 'TMAINV_EXTENSION_DIR' , trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'TMAINV_EXTENSION_URI' , trailingslashit( plugin_dir_url( __FILE__ ) ) );
// Load plugin class files
require_once(TMAINV_EXTENSION_DIR. '/class_tm_plugin.php');





