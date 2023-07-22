<?php
/**
 * Template Name: themex Page template
 */
get_header();		

get_template_part( 'includes/header' , 'page-title' ); ?>
<div class="template-home-wrapper">

	<div class="page-content-home-page">										
		<?php while ( have_posts() ) : the_post();
				 the_content(); 
		 endwhile; ?>	
	</div>
	
</div>
<?php 
	get_footer();		
 