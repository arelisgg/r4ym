<?php

if( ! defined( 'ABSPATH' ) ) exit(); 

class Tm_Admin_For_Elementor{

    public function __construct(){
        $this->twr_admin_setting();
    }

    /*
    *  Admin Setting file
    */
    public function twr_admin_setting() {
            require_once( 'class.settings-api.php' );
            require_once( 'twr_option.php' );
    }
	
   
}

new Tm_Admin_For_Elementor();