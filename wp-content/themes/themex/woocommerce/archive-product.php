<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );


/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );


			/**
			 * Hook: woocommerce_archive_description.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );

			
			
    if (!is_active_sidebar( 'sidebar_shop' )) {
        if (woocommerce_product_loop()) {?>
			<div class="row">

				<div class="col-lg-12">
				
					<?php wc_print_notices();?>
				
				</div>
				<div class="col-lg-5">
				
					<?php woocommerce_result_count();?>
				
				</div>
				<div class="col-lg-7">
				
					<div class="d-flex order_tx">
					<?php woocommerce_catalog_ordering();?>
					<?php tx_product_tab_list();?>
					</div>
				</div>
				
				

			</div>
			<?php 
		}
    }

	
	
	// Start page wrapper row
	
$is_sidebar = (is_active_sidebar( 'sidebar_shop')) ? '9' : '12';	
	
	?>

<div class="row">
		<div class="col-xl-<?php echo esc_attr($is_sidebar) ?>">		
		
				<?php
				if ( woocommerce_product_loop() ) {

					if (is_active_sidebar( 'sidebar_shop' )) {
					?>
						<div class="row">

							<div class="col-lg-12">
							
								<?php wc_print_notices();?>
							
							</div>
							<div class="col-lg-5">
							
								<?php woocommerce_result_count();?>
							
							</div>
							<div class="col-lg-7">
							
								<div class="d-flex order_tx">
								<?php woocommerce_catalog_ordering();?>
								<?php tx_product_tab_list();?>
								</div>
							</div>

						</div>
					<?php     
					}
				}
				?>
				
				
				
					<div class="tab-content">
						<div id="tx_product_grid" class="bgimgload  fade tab-pane active show">
							
										<?php
										
											if ( woocommerce_product_loop() ) {
												echo '<div class=" row blog-messonary">';
												woocommerce_product_loop_start();

												if ( wc_get_loop_prop( 'total' ) ) {
													while ( have_posts() ) {
														the_post();

														/**
														 * Hook: woocommerce_shop_loop.
														 */
														do_action( 'woocommerce_shop_loop' );

														wc_get_template_part( 'content', 'product' );
													}
												}

												woocommerce_product_loop_end();

												/**
												 * Hook: woocommerce_after_shop_loop.
												 *
												 * @hooked woocommerce_pagination - 10
												 */
												 echo '</div>';
												 echo'<div class="row"><div class="col-lg-12">';
												 do_action( 'woocommerce_after_shop_loop' );
												 echo'</div></div>';
											} else {
												echo '<div class="row">';
												/**
												 * Hook: woocommerce_no_products_found.
												 *
												 * @hooked wc_no_products_found - 10
												 */
												do_action( 'woocommerce_no_products_found' );
												 echo '</div>';
											}

										?>
						
						</div><!-- end tab grid -->

						<div id="tx_product_list" class="fade tab-pane">
							<div class="row">
										<?php
											if ( woocommerce_product_loop() ) {
												woocommerce_product_loop_start();

												if ( wc_get_loop_prop( 'total' ) ) {
													while ( have_posts() ) {
														the_post();

														/**
														 * Hook: woocommerce_shop_loop.
														 */
														do_action( 'woocommerce_shop_loop' );

														wc_get_template_part( 'content', 'product-list' );
													}
												}

												woocommerce_product_loop_end();

												/**
												 * Hook: woocommerce_after_shop_loop.
												 *
												 * @hooked woocommerce_pagination - 10
												 */
												 echo'<div class="col-lg-12">';
												 do_action( 'woocommerce_after_shop_loop' );
												 echo'</div>';
											} else {
												/**
												 * Hook: woocommerce_no_products_found.
												 *
												 * @hooked wc_no_products_found - 10
												 */
												do_action( 'woocommerce_no_products_found' );
											}

										?>
							</div>
						</div><!-- end tab list -->
					</div> <!-- end tab content -->
							
				
				
				
				
				
				
				
				
				
				
				
				
				

		</div><!--  edn product column -->

<!-- sidebar -->
<?php 



/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
 ?>
</div> <!--  edn product row -->
 <?php 
 
do_action( 'woocommerce_after_main_content' );
?>

<?php 
get_footer( 'shop' );
