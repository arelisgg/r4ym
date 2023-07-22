<?php
/**
 * Template Name: themex Shop Template
 *
 */
get_header('shop');		

get_template_part( 'includes/header' , 'page-title' ); ?>
<div class="template-home-wrapper">


	<div class="page-content-home-page witr_shop_template">
		<?php while ( have_posts() ) : the_post(); 
				 the_content();
		 endwhile; ?>						
	</div>
	
</div>
<?php 
	get_footer('shop');		
 