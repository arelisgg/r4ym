			
					<section class="twr_woo_area">
					<div class="woocommerce">
					
					<div class="row">
						<div class="col-sm-12">
							<div class="product_tl_nav  ">
								<ul class="witrp_filter" id="witrp_filter">
									<li class="ema_product_item" data-filter="*" ><?php if( !empty( $witrshowdata['witr_filtertext_button'] ) ){echo $witrshowdata['witr_filtertext_button'];}?></li>
									
										<?php
										$product_cats = get_terms( array(
											'taxonomy' => 'product_cat',
											'hide_empty' => true,
										));

										if( is_array( $product_cats ) ){
											foreach ( $product_cats as $cat ) {
												echo '<li data-filter=".'.esc_attr( $cat->slug ).'" >'. esc_html( $cat->name ) .'</li>';
											}
										}
										?>	
								</ul>
							</div>
						</div>
					</div>
					
					
					

					<div class="row " id="em_load_product">
						<?php
							while($wtxpro->have_posts()): $wtxpro->the_post(); global $product; global $post;
						
							$witr_terms= get_the_terms( get_the_ID(), 'product_cat' );
						?>
						
						<div class="eproduct_item product col-xl-<?php echo $witrshowdata['witr_col_xl'];?> col-lg-<?php echo $witrshowdata['witr_col_lg'];?> col-md-<?php echo $witrshowdata['witr_col_md'];?>  <?php foreach( $witr_terms as $single_slug){echo $single_slug->slug. ' ';}?>">
						<!-- product item --> 	 			
							<div class="tbd_product">
								<div class="tbd_product_inner">
									<!-- image --> 
									<!-- sale -->
									<div class="tbd_product_thumb">							
										<div class="tbd_sale_price"> 
											<?php woocommerce_show_product_loop_sale_flash();
											?>
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
                </section>
	


	

