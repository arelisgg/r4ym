<?php
/**
 * Content wrappers
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/wrapper-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$template = wc_get_theme_slug_for_templates();

if (is_shop() || is_tax( 'product_cat') || is_tax( 'product_tag' )) {
    echo '<section class="shop_grid_area sec_padding ">';
}
elseif (is_singular( 'product')) {
    echo '<section class="product_details_area sec_padding">';
}

echo '<div class="container">';
