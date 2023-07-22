<?php /**
* Maybe show the left sidebar
*/




if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
	<div class="col-lg-4 col-md-6  col-sm-12 col-xs-12 sidebar-right content-widget pdsl">
		<div class="blog-left-side widget">
		
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		
		</div>
	</div>
							
