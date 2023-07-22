<?php
/**
 * Widget em Recent Posts
 */
/* Register and load the widget */
	function em_load_Review_widget() {

	    register_widget( 'em_recent_Review_widget' );

	}
	add_action( 'widgets_init', 'em_load_Review_widget' );
	
	class em_recent_Review_widget extends WP_Widget {
	
	/* ---------------------------------------------------------------------------
	 * Constructor
	 * --------------------------------------------------------------------------- */
	 
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_recent_port_data',
			'description' => esc_html__( 'The most recent Review on your site.', 'themex' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'em_recent_Review_widget', esc_html__( 'EM Recent Review','themex' ), $widget_ops );
		$this->alt_option_name = 'widget_recent_port_data';
	}	

	
	/* ---------------------------------------------------------------------------
	 * Outputs the HTML for this widget.
	 * --------------------------------------------------------------------------- */
	public function widget( $args, $instance ) {

		if ( ! isset( $args['widget_id'] ) ) $args['widget_id'] = null;
		extract( $args, EXTR_SKIP );

		echo $before_widget;
		
		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base);
		
	?>
	<div class="single-Review-recent-item">
		<?php if( $title ) echo $before_title . $title . $after_title;?>
					<div class="recent-Review-area">
		<?php 			
		$args = array(
			'posts_per_page' => $instance['count'] ? intval($instance['count']) : 0,
			'post_type' =>'em_testimonial',
			'no_found_rows' => true,
			'post_status' => 'publish',
			'ignore_sticky_posts' => true
		);
		$r = new WP_Query( apply_filters( 'widget_posts_args', $args ) );
		
		if ($r->have_posts()){?> 
		<div class="recent-reviews owl-carousel">		
		<?php
		while ( $r->have_posts() ){
					$r->the_post();
				$em_rating  = get_post_meta( get_the_ID(),'_txbdm_em_rating', true );
			?>		

				<div class="recent-review">
					<div class="recent-review-content">
						<h3>
							<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
										<?php if($em_rating==5){?> 
											<span class="em_footercrating">
											
												<i class="icofont-star active"></i>
												<i class="icofont-star active"></i>
												<i class="icofont-star active"></i>
												<i class="icofont-star active"></i>
												<i class="icofont-star active"></i>
											</span>									
										
										<?php }elseif($em_rating==4){?>
											<span class="em_footercrating">
											
												<i class="icofont-star active"></i>
												<i class="icofont-star active"></i>
												<i class="icofont-star active"></i>
												<i class="icofont-star active"></i>
												<i class="icofont-star"></i>
											
											</span>												

										<?php }elseif($em_rating==3){?>
											<span class="em_footercrating">
											
												<i class="icofont-star active"></i>
												<i class="icofont-star active"></i>
												<i class="icofont-star active"></i>
												<i class="icofont-star"></i>
												<i class="icofont-star"></i>
											
											</span>											

										<?php }elseif($em_rating==2){?>
											<span class="em_footercrating">
											
												<i class="icofont-star active"></i>
												<i class="icofont-star active"></i>
												<i class="icofont-star"></i>
												<i class="icofont-star"></i>
												<i class="icofont-star"></i>
											
											</span>											

										<?php }elseif($em_rating==1){?>
											<span class="em_footercrating">
											
												<i class="icofont-star active"></i>
												<i class="icofont-star"></i>
												<i class="icofont-star"></i>
												<i class="icofont-star"></i>
												<i class="icofont-star"></i>
											
											</span>
										<?php }else{}?>	
							</h3>
						<p><?php echo get_the_content(); ?></p>


					</div>
				</div>

				
				
		
		<?php }?>
		
		</div>
		<?php 
		wp_reset_postdata();
		
		}?>
			</div>
	</div>
	<?php 
 	echo $after_widget;
	
	}
 

	/* ---------------------------------------------------------------------------
	 * Deals with the settings when they are saved by the admin.
	 * --------------------------------------------------------------------------- */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['count'] = (int) $new_instance['count'];
		
		return $instance;
	}

	
	/* ---------------------------------------------------------------------------
	 * Displays the form for this widget on the Widgets page of the WP Admin area.
	 * --------------------------------------------------------------------------- */
	public function form( $instance ) {
		
		$title = isset( $instance['title']) ? esc_attr( $instance['title'] ) : '';
		$count = isset( $instance['count'] ) ? absint( $instance['count'] ) : 6;

		?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'themex' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>			
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php esc_html_e( 'Number of posts:', 'themex' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>" size="4"/>
			</p>
			
		<?php
	}
}
