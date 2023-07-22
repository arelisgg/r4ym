<div class="container">
	<div class="row witr_cat_barea" id="twr_blog_category">	
	<div class="col-lg-3 col-sm-6 col-md-6 grid-sizer"></div>
	<?php
	if( is_array( $witrshowdata['witr_cat_setting'] ) ){
	foreach( $witrshowdata['witr_cat_setting'] as $witr_item){
		
		$witr_term = get_term_by( 'slug', $witr_item['_witr_cat_name'], 'product_cat' );
		 $witr_column = !empty( $witr_item['_witr_cat_column'] ) ? $witr_item['_witr_cat_column'] : '6';
		
		?>				
		<div class=" commercial  grid-item col-sm-6 col-md-6  col-lg-<?php echo esc_attr($witr_column); ?>    elementor-repeater-item-<?php echo esc_attr(  $witr_item['_id'] ) ?>">
			<div class="witr_cat_block">
			<div class="twr_cablock_thumb" >
				<?php
				if( !empty( $witr_item['_witr_cat_img']['id'] ) ){
					echo '<a href="'. esc_url( get_term_link( $witr_term->term_id ) ) .'">';
					echo wp_get_attachment_image( $witr_item['_witr_cat_img']['id'], 'full' );
					echo '</a>';
				}
				?>
				<div class="witr_cat_content">
					<?php
					echo '<a href="'. esc_url( get_term_link( $witr_term->term_id ) ) .'"><h5 class="witr_cat_name">'. esc_html( $witr_term->name ) .'</h5></a>';
					echo '<a href="'. esc_url( get_term_link( $witr_term->term_id ) ) .'" class="witr_cat_btn">'.$witr_item['_witr_cat_btn'].'</a>';
					?>
				</div>
				</div>
			</div>
		</div>
	<?php } 
	} ?>
				

		
	
	</div>
</div>

<script>
    ;(function($){
        "use strict";
        $(document).ready(function () {
            function witrcatblock() {
                var witrcblock = $("#twr_blog_category");
                if (witrcblock.length) {
                    witrcblock.imagesLoaded(function () {
                        witrcblock.isotope({
                            layoutMode: "masonry",
                            itemSelector: '.grid-item',
                            masonry: {
                                columnWidth: '.grid-sizer'
                            }
                        });				
												
                    });
                }
            }
            witrcatblock();

        })
    })(jQuery)
	
</script>	
	