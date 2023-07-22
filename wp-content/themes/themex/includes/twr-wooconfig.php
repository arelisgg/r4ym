<?php 

if(class_exists( 'WooCommerce' )){

add_filter( 'woocommerce_add_to_cart_fragments', 'themex_cart_link_fragment' );

if ( ! function_exists( 'themex_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments
	 * Ensure cart contents update when products are added to the cart via AJAX
	 *
	 * @param  array $fragments Fragments to refresh via AJAX.
	 * @return array            Fragments to refresh via AJAX
	 */
	function themex_cart_link_fragment( $fragments ) {
		global $woocommerce;

		ob_start();
		themex_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();
		
		return $fragments;
	}
}



if ( ! function_exists( 'themex_mini_shop_output' ) ) {
	
		function themex_mini_shop_output(){


			if( WC()->cart->get_cart_contents_count() > 0){ 

				if ( is_cart() ) {
					$class = 'current-menu-item';
				} else {
					$class = '';
				}
				?>
				<div class="mini_shop_content site-header-cart"  id="site-header-cart">
					<div class="<?php echo esc_attr( $class ); ?>">
							<?php themex_cart_link();?>
					</div>
					<div class="twr_mini_cart">
						<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
					</div>
				</div>										

				<?php }else{

				if ( is_cart() ) {
					$class = 'current-menu-item';
				} else {
					$class = '';
				}
				?>
				<div class="mini_shop_content site-header-cart"  id="site-header-cart">
					<div class="<?php echo esc_attr( $class ); ?>">
							<?php themex_cart_link();?>
					</div>
					<div class="twr_mini_cart">
						<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
					</div>
				</div>	
				<?php }	





		
		}
	
	
}
if ( ! function_exists( 'themex_cart_link' ) ) {
	/**
	 * Cart Link
	 * Displayed a link to the cart including the number of items present and the cart total
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function themex_cart_link() {

		?>
			<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'themex' ); ?>"><i class="icofont-cart"></i>
				<span class="count"><?php echo wp_kses_data( sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'themex' ), WC()->cart->get_cart_contents_count() ) ); ?></span>
			</a>
		<?php
	}
}

if( ! function_exists( 'tx_product_tab_list' ) ) {
function tx_product_tab_list(){?>
	<ul class="tx_product_tab nav">
	<li><a href="#tx_product_grid" data-toggle="tab" class="active"><i class="icofont-navigation-menu"></i></a></li>
	<li><a href="#tx_product_list" data-toggle="tab" class=""><i class="icofont-listing-number"></i></a></li>
	</ul>
<?php 	
}}


/* show_cart_cbtn */
if ( ! function_exists( 'themex_show_cart_button' ) ) {
	function themex_show_cart_button() {
		?>
			<a class="show_cart_cbtn" href="<?php echo esc_url( wc_get_cart_url() ); ?>" >Show Card</a>
		<?php
	}
}



function themex_product_icons_grid(){
	global $product;
?>		
	<!--  icon -->	
	<div class="thb_product_car">
		<!-- Add to yith_wcwl_add_to_wishlist Button -->							
		<?php if ( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ) {
			echo do_shortcode('[yith_wcwl_add_to_wishlist]'); 
		} 																		
		/* cart icon */	
		  woocommerce_template_loop_add_to_cart();								
		/* Add to yith_quick_view Button */
		 if ( shortcode_exists( 'yith_quick_view' ) ) {
			echo do_shortcode('[yith_quick_view]'); 

		} 
		if(function_exists('yith_woocompare_constructor')) : 
		?>
		<!-- Add to compare Button -->
		<a class="compare button" title="<?php echo esc_attr('compare','themex');?>" data-product_id="<?php echo get_the_ID(); ?>" href="<?php echo esc_url(home_url()); ?>/?action=yith-woocompare-add-product&amp;id=<?php echo get_the_ID(); ?>"></a>
		<?php endif; ?>
	</div>	
	<!-- end icon -->	

<?php 

}
function themex_product_icons_list(){
	global $product;
?>		
	<!--  icon -->	
	<div class="thb_product_car thb_product_carlist ">
		<!-- Add to yith_wcwl_add_to_wishlist Button -->							
		<?php if ( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ) {
			echo do_shortcode('[yith_wcwl_add_to_wishlist]'); 
		} 																		
		/* cart icon */	
		  woocommerce_template_loop_add_to_cart();								
		/* Add to yith_quick_view Button */
		 if ( shortcode_exists( 'yith_quick_view' ) ) {
			echo do_shortcode('[yith_quick_view]'); 

		} 
		if(function_exists('yith_woocompare_constructor')) :
			?>
				<!-- Add to compare Button -->
				<a class="compare button" data-product_id="<?php echo get_the_ID(); ?>" href="<?php  echo esc_url(home_url()); ?>/?action=yith-woocompare-add-product&amp;id=<?php echo get_the_ID(); ?>"></a>
			<?php 		
		 endif; ?>								
	</div>	
	<!-- end icon -->	

<?php 

}

add_action( 'woocommerce_single_product_summary', 'themex_single_product_icons', 35 );
function themex_single_product_icons(){
	global $product;
?>		
	<div class="tbd_product single_summery_p_icon">								
	<!--  icon -->	
		<div class="thb_product_car">
			<!-- Add to yith_wcwl_add_to_wishlist Button -->							
			<?php if ( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ) {
				echo do_shortcode('[yith_wcwl_add_to_wishlist]'); 
			} 
			if(function_exists('yith_woocompare_constructor')) : 
				/* echo do_shortcode('[yith_compare_button]');  */	
			?>
				<!-- Add to compare Button -->
				<a class="compare button" data-product_id="<?php echo get_the_ID(); ?>" href="<?php echo esc_url(home_url()); ?>/?action=yith-woocompare-add-product&amp;id=<?php echo get_the_ID(); ?>"></a>
			<?php 							
			 endif; ?>
		</div>	
	<!-- end icon -->	

	</div>

<?php 

}	

	remove_action( 'woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10 );
	remove_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5 );
	/* change your default oderby text */
	if(! function_exists('witr_customize_product_sorting')){
	add_filter('woocommerce_catalog_orderby', 'witr_customize_product_sorting');
		function witr_customize_product_sorting($witr_sorting_options){
			$witr_sorting_options = array(
				'menu_order' => esc_html__( 'Default Sort', 'themex' ),
				'popularity' => esc_html__( 'Top Sale', 'themex' ),
				'rating'     => esc_html__( 'Top Rating', 'themex' ),
				'date'       => esc_html__( 'New Product', 'themex' ),
				'price'      => esc_html__( 'Price: low to high', 'themex' ),
				'price-desc' => esc_html__( 'Price: high to low', 'themex' ),
			);

			return $witr_sorting_options;
		}
	}
	/* change your breadcrumb options */
	if(! function_exists('witr_customize_breadcrumbs')){
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb',20 );

	add_filter( 'woocommerce_breadcrumb_defaults', 'witr_customize_breadcrumbs' );
		function witr_customize_breadcrumbs($witr_bread_options) {			
			 global $themex_opt;
			 $witr_home_text="";
			if(!empty($themex_opt['themex_breadhome_textc'])){
				$witr_home_text= $themex_opt['themex_breadhome_textc'];
			}else{
				$witr_home_text = 'Home';
			}			 
			 
			$witr_bread_options['home'] = $witr_home_text;
			$witr_bread_options['delimiter'] = '<i class="icofont-thin-right"></i>';
			$witr_bread_options['wrap_before'] = '<div class="breadcumb-inner witr_breadcumb_shop"><ul><li>';
			$witr_bread_options['wrap_after'] = '</li></ul></div>';
			$witr_bread_options['before'] = '<span>';
			$witr_bread_options['after'] = '</span>';			
			return $witr_bread_options;       
		}
	}
	
	
	if(! function_exists('witr_shop_custom_breadcrumb')){	
add_action( 'woocommerce_before_main_content', 'witr_shop_custom_breadcrumb',5 );	
function witr_shop_custom_breadcrumb(){
 global $themex_opt;    
 if(!is_front_page()){  
$page_text_align=$page_text_transform="";
 if (!empty($themex_opt['bpage_text_align']) && $themex_opt['bpage_text_align']=="text-left"){
	$page_text_align  = $themex_opt['bpage_text_align']; 
 }elseif(!empty($themex_opt['bpage_text_align']) && $themex_opt['bpage_text_align']=="text-center"){
	$page_text_align  = $themex_opt['bpage_text_align'];  
 }elseif(!empty($themex_opt['bpage_text_align']) && $themex_opt['bpage_text_align']=="text-right"){
	$page_text_align  = $themex_opt['bpage_text_align'];  
 }
  
 if (!empty($themex_opt['bpage_text_transform']) && $themex_opt['bpage_text_transform']=="lcase"){
	$page_text_transform  = $themex_opt['bpage_text_transform'];
  
 }elseif(!empty($themex_opt['bpage_text_transform']) && $themex_opt['bpage_text_transform']=="ucase"){
	$page_text_transform  = $themex_opt['bpage_text_transform'];
  
 }elseif(!empty($themex_opt['bpage_text_transform']) && $themex_opt['bpage_text_transform']=="ccase"){
	$page_text_transform  = $themex_opt['bpage_text_transform'];
  
 }
   
   if(!empty($themex_opt['themex_breadcr_style']) && $themex_opt['themex_breadcr_style']==1){?>	
		<div class="breadcumb-area msope_bgarea">
			<div class="container">				
				<div class="row">
					<div class="col-md-12 txtc  <?php echo esc_attr( $page_text_align );?> <?php echo esc_attr( $page_text_transform );?>">		
					<?php if (!empty($themex_opt['themex_bread_titleh']) && $themex_opt['themex_bread_titleh']==true){?>
						<div class="brpt brptsize">
							<?php 
							if ( is_singular( 'product' )) {
								?>
									<h2 class=""><?php wp_title(''); ?></h2>
								<?php 
							}else{ 
								if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
									<h2 class=""><?php woocommerce_page_title(); ?></h2>
								<?php endif; 
							}?>
						</div>
					<?php }else{					
					} /* end title */
					if (!empty($themex_opt['themex_bread_menuhide']) && $themex_opt['themex_bread_menuhide']==true){
						
					}else{
						woocommerce_breadcrumb();											
					 } ?>
					</div>
				</div>
			</div>
		</div>
	<?php }elseif(!empty($themex_opt['themex_breadcr_style']) && $themex_opt['themex_breadcr_style']==2){?>	
		<div class="breadcumb-area breadcumb_st2 msope_bgarea">
			<div class="container">				
				<div class="row">
					<div class="col-md-12 alignlrt txtc <?php echo esc_attr( $page_text_transform );?>">
							<?php if (!empty($themex_opt['themex_bread_titleh']) && $themex_opt['themex_bread_titleh']==true){?>
								<div class="brpt">
									<?php 
									if ( is_singular( 'product' )) {
										?>
											<h2 class=""><?php wp_title(''); ?></h2>
										<?php 
									}else{ 
										if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
											<h2 class=""><?php woocommerce_page_title(); ?></h2>
										<?php endif; 
									}?>
								</div>
							<?php }else{						
							} /* end title */
						 woocommerce_breadcrumb();?>							
					</div>
				</div>
			</div>
		</div>
	<?php }elseif(!empty($themex_opt['themex_breadcr_style']) && $themex_opt['themex_breadcr_style']==3){
		} else{?>
		<div class="breadcumb-area breadcumb_st2 msope_bgarea">
			<div class="container">				
				<div class="row">
					<div class="col-md-12 alignlrt txtc <?php echo esc_attr( $page_text_transform );?>">
							<?php if (!empty($themex_opt['themex_bread_titleh']) && $themex_opt['themex_bread_titleh']==true){?>
								<div class="brpt">
									<?php 
									if ( is_singular( 'product' )) {
										?>
											<h2 class=""><?php wp_title(''); ?></h2>
										<?php 
									}else{ 
										if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
											<h2 class=""><?php woocommerce_page_title(); ?></h2>
										<?php endif; 
									}?>
								</div>
							<?php }else{						
							} /* end title */
						 woocommerce_breadcrumb();?>							
					</div>
				</div>
			</div>
		</div>		
	<?php }	


	}	
 }
 }
	 
	
	/* change your related options */
	if(! function_exists('witr_related_products_args')){
	add_filter( 'woocommerce_output_related_products_args', 'witr_related_products_args', 20 );
		function witr_related_products_args( $args ) {
			$args['posts_per_page'] = 20; 
			$args['columns'] = 12 .' '.'col-md-12'; 
			return $args;
		}
	}
	/* change your upsell options */ 
	if(! function_exists('witr_upsell_products_args')){
	add_filter( 'woocommerce_upsell_display_args', 'witr_upsell_products_args', 20 );
		function witr_upsell_products_args( $args ) {
			$args['posts_per_page'] = 12;
			$args['columns'] = 12 .' '.'col-md-12'; 
			return $args;
		}
	}
	/* change your cross options */
	if(! function_exists('witr_cross_sells_products_args')){
	add_filter( 'woocommerce_cross_sells_columns', 'witr_cross_sells_products_args', 20 );
		function witr_cross_sells_products_args( $columns ) {
			return 12 .' '.'col-md-12';
		}
	}

		
	
	
} /* end class	 */

