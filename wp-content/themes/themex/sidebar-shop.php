<?php /**
* Maybe show the right sidebar
*/

if ( ! is_active_sidebar( 'sidebar_shop' ) ) {
	return;
}
?>

	<div class="col-lg-4 col-xl-3 col-md-6  col-sm-12 col-xs-12  sidebar-right content-widget pdsr">
		<div class="widget twr_product_sidebar">
		
			<?php dynamic_sidebar( 'sidebar_shop' ); ?>
		</div>
	</div>
	
