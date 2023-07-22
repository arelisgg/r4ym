<?php
/* About us widget for footer */
add_action('widgets_init', 'twr_about_us_widgets');

if(!function_exists('twr_about_us_widgets')){
	
	function twr_about_us_widgets(){
		
		register_widget('twr_about_us_Widget');
		
	}
}

if(!class_exists('twr_about_us_Widget')){
	
	class twr_about_us_Widget extends WP_Widget {

		public function __construct(){
			$widget_ops = array('classname' => 'about_us', 'description' => '');
			$control_ops = array('id_base' => 'about_us-widget');
			parent::__construct('about_us-widget', 'EM Address Widget', $widget_ops, $control_ops);
		}
		public function widget($args, $instance){
			extract($args);
			$title = apply_filters('widget_title', $instance['title']);
			echo $args['before_widget'];
			if($title) {
				echo $args['before_title'] . $title . $args['after_title'];
			}
			?>
			<!-- About Widget -->
				<div class="about-footer">
					<div class="footer-widget address">
						<div class="footer-logo">
								<?php if(!empty($instance['image_uri']) && isset($instance['image_uri'])): ?>
								   <img src="<?php echo esc_url($instance['image_uri']); ?>" alt="">    
								<?php endif; ?>
							<?php if(!empty($instance['content']) && isset($instance['content'])): ?>	
								<p><?php echo $instance['content']; ?></p>
							<?php endif; ?>
						</div>
						<div class="footer-address">
							<?php if(!empty($instance['address1']) && isset($instance['address1'])): ?>
							<div class="footer_s_inner"> 
								<div class="footer-sociala-icon">
									<i class="icofont-google-map"></i>
								</div>									
								<div class="footer-sociala-info">				
									<p><?php echo $instance['address1']; ?></p>
								</div> 
							</div> 
							<?php endif; ?>
							<?php if(!empty($instance['telephone']) && isset($instance['telephone'])): ?>
							<div class="footer_s_inner"> 
								<div class="footer-sociala-icon">
									<i class="icofont-phone"></i>
								</div> 									
								<div class="footer-sociala-info">   
										<p><?php echo $instance['telephone']; ?></p>
								</div>
							</div>
							<?php endif; ?>
							<?php if(!empty($instance['email']) && isset($instance['email'])): ?>						
								<div class="footer_s_inner"> 
									<div class="footer-sociala-icon"> 
										<i class="icofont-envelope-open"></i>
									</div> 
									<div class="footer-sociala-info">  
										<p><?php echo $instance['email']; ?></p>									
									</div>
								</div>
							<?php endif; ?>
							<?php if(!empty($instance['time']) && isset($instance['time'])): ?>						
								<div class="footer_s_inner"> 
									<div class="footer-sociala-icon"> 
										<i class="icofont-ui-clock"></i>
									</div> 
									<div class="footer-sociala-info">  
										<p><?php echo $instance['time']; ?></p>									
									</div>
								</div>
							<?php endif; ?>
							
						</div>
					</div>
				</div>	

			<?php
			echo $args['after_widget'];
		}


		public function update($new_instance, $old_instance){

			$instance = $old_instance;
			$instance['title'] = $new_instance['title'];
			$instance['content'] = $new_instance['content'];
			$instance['image_uri'] = $new_instance['image_uri'];
			$instance['address1'] = $new_instance['address1'];
			$instance['telephone'] = $new_instance['telephone'];
			$instance['email'] = $new_instance['email'];
			$instance['time'] = $new_instance['time'];

			return $instance;

		}

		public function form($instance){

			$defaults = array('title' => '', 'content' => 'Lorem ipsum dolor sit amet, consetur acing elit, sed do eiusmod ligal', 'image_uri' => '','address1' => '1245 Rang Raod, medical, E152  95RB','telephone' => 'Telephone: (922) 3354 2252','email' => 'webitrangpur1995@gmail.com<br>Web: www.webitrangpur.com','time' => 'Time: 9.00am-4.00pm');

			$instance = wp_parse_args((array) $instance, $defaults); ?>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','themex');?></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
			</p>

			<p>
				<label style="display:block;" for="<?php echo esc_attr($this->get_field_id('image_uri')); ?>"><?php esc_html_e('Upload Image:','themex');?></label>
				
				<img class="custom_media_image" src="<?php if(!empty($instance['image_uri'])){echo $instance['image_uri'];} ?>" style="margin:0;padding:0;max-width:100px;display:inline-block" />
				
				<input type="text" class="widefat custom_media_url" name="<?php echo esc_attr($this->get_field_name('image_uri')); ?>" id="<?php echo esc_attr($this->get_field_id('image_uri')); ?>" value="<?php echo esc_attr($instance['image_uri']); ?>">
				<a href="#" id="custom_media_button" style="margin-top:10px;" class="button button-primary custom_media_button"><?php esc_html_e('Upload', 'themex'); ?></a>
			</p>

			<p>

				<label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('About Text:','themex');?></label>
				<textarea class="widefat" rows="5" type="text" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo $instance['content']; ?></textarea>
				<span> <b><?php esc_html_e('Note:','themex');?></b><?php esc_html_e('use','themex');?> <b> &ltbr&gt </b><?php esc_html_e(' for line break.','themex');?></span>

			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('address1')); ?>"><?php esc_html_e('Address:','themex');?></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('address1')); ?>" name="<?php echo esc_attr($this->get_field_name('address1')); ?>" value="<?php echo esc_attr($instance['address1']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('telephone')); ?>"><?php esc_html_e('Telephone:','themex');?></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('telephone')); ?>" name="<?php echo esc_attr($this->get_field_name('telephone')); ?>" value="<?php echo esc_attr($instance['telephone']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email:','themex');?></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" value="<?php echo esc_attr($instance['email']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('time')); ?>"><?php esc_html_e('Time:','themex');?></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('time')); ?>" name="<?php echo esc_attr($this->get_field_name('time')); ?>" value="<?php echo esc_attr($instance['time']); ?>" />
			</p>
			
		<?php

		}

	}
}
?>