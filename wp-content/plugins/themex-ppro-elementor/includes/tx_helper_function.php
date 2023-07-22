<?php
/*
 * Plugisn Options value
 * return on/off
 */
if( !function_exists('twr_get_option') ){
    function twr_get_option( $option, $section, $default = '' ){
        $options = get_option( $section );
        if ( isset( $options[$option] ) ) {
            return $options[$option];
        }
        return $default;
    }
}
/*
 * Elementor Templates List
 * return array
 */

if( !function_exists('twr_html_template_at') ){
    function twr_html_template_at() {
        $templates = \Elementor\Plugin::instance()->templates_manager->get_source( 'local' )->get_items();
        $types = array();
        if ( empty( $templates ) ) {
            $themex_tmp_items = [ '0' => esc_html__( 'Do not Saved Templates.', 'themex' ) ];
        } else {
            $themex_tmp_items = [ '0' => esc_html__( 'Choose Template', 'themex' ) ];
            foreach ( $templates as $template ) {
                $themex_tmp_items[ $template['template_id'] ] = $template['title'] . ' (' . $template['type'] . ')';
            }
        }
        return $themex_tmp_items;
    }
}


/**
 * Category array
 */
function txw_cat_array($term = 'category') {
    $cats = get_terms( array(
        'taxonomy' => $term,
        'hide_empty' => true
    ));
    $cat_array = array();
    $cat_array['all'] = esc_html__( 'All', 'themex');
    if( is_array( $cats ) ) {
        foreach ($cats as $cat) {
            $cat_array[$cat->slug] = $cat->name;
        }
    }
    return $cat_array;
}
/* Product Title */

function twr_products_title() {

    $product = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'fields' => 'ids',
    );
    $product_post = get_posts($product);
    $product_array = array();
    $product_array[] = '';
    foreach ($product_post as $p_id) {
        $product_array[$p_id] = wp_trim_words( get_the_title( $p_id ), 5, '...');
    }
    return $product_array;

}

/* post Title */
function txw_get_post_title( $post_type ) {

    $trw_all_posts = array(
        'post_type' => $post_type,
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'fields' => 'ids',
    );
    $trw_all_posts = get_posts( $trw_all_posts );
    $post_array = array();
    $post_array[] = '';
    foreach ($trw_all_posts as $p_id) {
        $post_array[$p_id] = wp_trim_words( get_the_title( $p_id ), 5, '...');
    }
    return $post_array;

}



 function twr_plugin_main_editcss() {
		if ( is_rtl() ) {
			wp_register_style( 'style_plugin', TMAINV_EXTENSION_URI. 'assets/css/maincss/style.plugin.rtl.css' );
			wp_enqueue_style( 'style_plugin' );		
		}else{
			wp_register_style( 'style_plugin', TMAINV_EXTENSION_URI. 'assets/css/maincss/style.plugin.css' );
			wp_enqueue_style( 'style_plugin' );			
		}
		
	}
add_action('get_footer','twr_plugin_main_editcss');
