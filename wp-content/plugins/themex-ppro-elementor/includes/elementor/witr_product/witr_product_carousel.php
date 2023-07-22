<?php 
		$infinite=$autoplay=$autoplayspeed=$speed=$slidestoShow=$slidestoscroll=$arrows=$dots=$res1=$res2=$res3=$unic_id="";

		if(! empty($witrshowdata['witr_slides_to_show'])){
			$slidestoShow=$witrshowdata['witr_slides_to_show'];
		}
		if(! empty($witrshowdata['witr_c_infinite'])){
			$infinite=$witrshowdata['witr_c_infinite'];
		}
		if(! empty($witrshowdata['witr_c_autoplay'])){
			$autoplay=$witrshowdata['witr_c_autoplay'];
		}
		if(! empty($witrshowdata['witr_c_autoplaySpeed'])){
			$autoplayspeed=$witrshowdata['witr_c_autoplaySpeed'];
		}
		if(! empty($witrshowdata['witr_c_speed'])){
			$speed=$witrshowdata['witr_c_speed'];
		}
		if(! empty($witrshowdata['witr_c_slidestoScroll'])){
			$slidestoscroll=$witrshowdata['witr_c_slidestoScroll'];
		}
		if(! empty($witrshowdata['witr_c_arrows'])){
			$arrows=$witrshowdata['witr_c_arrows'];
		}
		if(! empty($witrshowdata['witr_c_dots'])){
			$dots=$witrshowdata['witr_c_dots'];
		}
		if(! empty($witrshowdata['witr_c_res1'])){
			$res1=$witrshowdata['witr_c_res1'];
		}
		if(! empty($witrshowdata['witr_c_res2'])){
			$res2=$witrshowdata['witr_c_res2'];
		}
		if(! empty($witrshowdata['witr_c_res3'])){
			$res3=$witrshowdata['witr_c_res3'];
		}
		if(! empty($witrshowdata['witr_unicid_c'])){
			$unic_id=$witrshowdata['witr_unicid_c'];
		}



		
?>				
					
					
		<div class="woocommerce">									
		<div class="row witr_unid_<?php echo $unic_id;?>">
			<?php
				while($wtxpro->have_posts()): $wtxpro->the_post(); global $product; global $post;
			?>
			<div <?php wc_product_class( 'col-md-12' ); ?>>
						<!-- product item --> 	 			
							<div class="tbd_product">
								<div class="tbd_product_inner">
									<!-- image --> 
									<!-- sale -->
									<div class="tbd_product_thumb">							
										<div class="tbd_sale_price"> 
											<?php woocommerce_show_product_loop_sale_flash();?>
										</div>

										<a href="<?php the_permalink();?>" class="thumbnail_link"><?php the_post_thumbnail() ?></a>
										<?php if($witrshowdata['witr_show_icon']=='yes'){ ?>
											<!--  icon -->				
											<?php
											if(function_exists('themex_product_icons_grid')){							
												themex_product_icons_grid();
										} } ?>	
									</div>
								</div>
								<!-- title and meta -->
								<div class="tbd_product_content">
									<div class="tbd_product_content_inner">
										<div class="tbd_product_title tbd_fload_right">
												<a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="<?php the_permalink();?>"><h2 class="woocommerce-loop-product__title"><?php the_title();?></h2></a>
										</div>
										<div class="tbd_price_opt clearfix">
										<?php 
										
										woocommerce_template_loop_price();
										if($witrshowdata['witr_show_rating']=='yes'){ 
											woocommerce_template_loop_rating();
										 } ?>
										</div>
									</div>
								</div>				
							</div>
			</div>
			<?php endwhile;
			 wp_reset_query(); wp_reset_postdata();
			?>

	</div>
	</div>
	
				
				
				

<script>
    ;(function($){
        "use strict";
        $(document).ready(function () {

			 var witr_prc = $(".witr_unid_<?php echo esc_js($unic_id);?>");
			if( witr_prc.length > 0 ){
				witr_prc.slick({
					infinite: <?php echo esc_js($infinite);?>,
					autoplay: <?php echo esc_js($autoplay);?>,
					autoplaySpeed: <?php echo esc_js($autoplayspeed);?>,
					speed: <?php echo esc_js($speed);?>,					
					slidesToShow: <?php echo esc_js($slidestoShow);?>,
					slidesToScroll: <?php echo esc_js($slidestoscroll);?>,
					<?php echo ( is_rtl() ) ? "rtl: true," : ''; ?>
					arrows: <?php echo esc_js($arrows);?>,
					dots: <?php echo esc_js($dots);?>,
					responsive: [
						{
							breakpoint: 1200,
							settings: {
								slidesToShow: <?php echo esc_js($res1);?>,
								slidesToScroll: 1,
							}
					},
						{
							breakpoint: 992,
							settings: {
								slidesToShow: <?php echo esc_js($res2);?>,
								slidesToScroll: 1,
							}
					},
						{
							breakpoint: 767,
							settings: {
								slidesToShow: <?php echo esc_js($res3);?>,
								slidesToScroll: 1,
							}
					}

					]
				});
        
			}
			
			
			
        })
    })(jQuery)
</script>	