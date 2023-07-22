<?php 
$twr_mage_size="full";
?>
<div class="col-lg-12">
	<div <?php wc_product_class( 'row tx_product_list ' ); ?>>
		<div class="col-xl-3 col-lg-3 col-md-3 tbd_product">
			<!-- sale -->
			<div class="tbd_product_thumb">							
				<div class="tbd_sale_price"> 
					<?php woocommerce_show_product_loop_sale_flash();?>
				</div>
				 <a href="<?php the_permalink();?>" class="thumbnail_link"><?php the_post_thumbnail($twr_mage_size, array( 'class' => 'img-fluid')) ?></a>					
			</div>
		</div>
		<div class="col-xl-9 col-lg-9 col-md-9">
			<!-- product item --> 	 			
			<div class="listdiv_center ">
				<div class="list_div_middle ">
					<div class="tbd_product tbd_product_list ">
						<!-- title and meta -->					
						<div class="tbd_product_title">
							<a href="<?php the_permalink() ?>" class="s_list_title">
								<h3> <?php the_title(); ?> </h3>
							</a>							
						</div>
						<div class="tbd_price_lista">
							<div class="tbd_price_opt clearfix">
								<?php woocommerce_template_loop_price();?>									
							</div>
							<div class="list_rating clearfix">
								<?php woocommerce_template_loop_rating(); ?>
							</div>
						</div>
						<p class="list_produc_content"> <?php echo get_the_excerpt() ?> </p>
						<!--  icon -->				
						<?php
						if(function_exists('themex_product_icons_list')){							
							themex_product_icons_list();
						} ?>
						<!-- end icon -->					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>