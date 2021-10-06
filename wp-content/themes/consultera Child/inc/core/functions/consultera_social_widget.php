<?php
	// Register and load the widget
	function consultera_social_callout() {
	    register_widget( 'Consultera_social_callout' );
	}
	add_action( 'widgets_init', 'consultera_social_callout' );

// Creating the widget
	class Consultera_social_callout extends WP_Widget {
	 
	function __construct() {
		parent::__construct(
			'consultera_social_callout', // Base ID
			__('Wpazure : Social Widget','consultera'), // Widget Name
			array(
				'classname' => 'consultera_social_callout',
				'description' => __('ConsultEra theme social widget','consultera'),
			),
			array(
				'width' => 600,
			)
		);
		
	 }
	
	public function widget( $args, $instance ) {
		
		if ( isset( $instance[ 'fa_icon_one' ])){
	$fa_icon_one = $instance[ 'fa_icon_one' ];
	}
	else {
	$fa_icon_one =  'fa-facebook';
	}
	
	if ( isset( $instance[ 'social_icon_one_url' ])){
	$social_icon_one_url = $instance[ 'social_icon_one_url' ];
	}
	else {
	$social_icon_one_url = '#';
	}
	
	

	
	if ( isset( $instance[ 'fa_icon_two' ])){
	$fa_icon_two = $instance[ 'fa_icon_two' ];
	}
	else {
	$fa_icon_two =  'fa-twitter';
	}
	
	if ( isset( $instance[ 'social_icon_two_url' ])){
	$social_icon_two_url = $instance[ 'social_icon_two_url' ];
	}
	else {
	$social_icon_two_url = '#';
	}
	
	
	
	if ( isset( $instance[ 'fa_icon_three' ])){
	$fa_icon_three = $instance[ 'fa_icon_three' ];
	}
	else {
	$fa_icon_three =  'fa-linkedin';
	}
	
	if ( isset( $instance[ 'social_icon_three_url' ])){
	$social_icon_three_url = $instance[ 'social_icon_three_url' ];
	}
	else {
	$social_icon_three_url = '#';
	}
	
	
	if ( isset( $instance[ 'fa_icon_four' ])){
	$fa_icon_four = $instance[ 'fa_icon_four' ];
	}
	else {
	$fa_icon_four =  'fa-google';
	}
	
	if ( isset( $instance[ 'social_icon_four_url' ])){
	$social_icon_four_url = $instance[ 'social_icon_four_url' ];
	}
	else {
	$social_icon_four_url = '#';
	}
	
	
	if ( isset( $instance[ 'fa_icon_five' ])){
	$fa_icon_five = $instance[ 'fa_icon_five' ];
	}
	else {
	$fa_icon_five =  'fa-instagram';
	}
	
	if ( isset( $instance[ 'social_icon_five_url' ])){
	$social_icon_five_url = $instance[ 'social_icon_five_url' ];
	}
	else {
	$social_icon_five_url = '#';
	}
	
	echo $args['before_widget'];?>
	
						<ul class="social-icons text-center">
							<?php if($fa_icon_one!=''){?>
							<li><a href="<?php echo esc_url($social_icon_one_url);?>"><i class="fa <?php echo esc_attr($fa_icon_one); ?>" aria-hidden="true"></i></a></li>
							<?php }
							if($fa_icon_two!=''){?>
							<li><a href="<?php echo esc_url($social_icon_two_url);?>"><i class="fa <?php echo esc_attr($fa_icon_two); ?>" aria-hidden="true"></i></a></li>
							<?php }
							
							 if($fa_icon_three!=''){?>
							<li><a href="<?php echo esc_url($social_icon_three_url);?>"><i class="fa <?php echo esc_attr($fa_icon_three); ?>" aria-hidden="true"></i></a></li>
							<?php }
							
							 if($fa_icon_four!=''){?>
							<li><a href="<?php echo esc_url($social_icon_four_url);?>"><i class="fa <?php echo esc_attr($fa_icon_four); ?>" aria-hidden="true"></i></a></li>
							<?php }
							
							if($fa_icon_five!=''){?>
							<li><a href="<?php echo esc_url($social_icon_five_url);?>"><i class="fa <?php echo esc_attr($fa_icon_five); ?>" aria-hidden="true"></i></a></li>
							<?php } ?>
						</ul>
					

	<?php
	echo $args['after_widget'];
	}
	         
	// Widget Backend
	
	public function form( $instance ) {
		
	if ( isset( $instance[ 'fa_icon_one' ])){
	$fa_icon_one = $instance[ 'fa_icon_one' ];
	}
	else {
	$fa_icon_one =  'fa-facebook';
	}
	
	if ( isset( $instance[ 'social_icon_one_url' ])){
	$social_icon_one_url = $instance[ 'social_icon_one_url' ];
	}
	else {
	$social_icon_one_url = '#';
	}
	
	

	
	if ( isset( $instance[ 'fa_icon_two' ])){
	$fa_icon_two = $instance[ 'fa_icon_two' ];
	}
	else {
	$fa_icon_two =  'fa-twitter';
	}
	
	if ( isset( $instance[ 'social_icon_two_url' ])){
	$social_icon_two_url = $instance[ 'social_icon_two_url' ];
	}
	else {
	$social_icon_two_url = '#';
	}
	
	
	
	if ( isset( $instance[ 'fa_icon_three' ])){
	$fa_icon_three = $instance[ 'fa_icon_three' ];
	}
	else {
	$fa_icon_three =  'fa-linkedin';
	}
	
	if ( isset( $instance[ 'social_icon_three_url' ])){
	$social_icon_three_url = $instance[ 'social_icon_three_url' ];
	}
	else {
	$social_icon_three_url = '#';
	}
	
	
	if ( isset( $instance[ 'fa_icon_four' ])){
	$fa_icon_four = $instance[ 'fa_icon_four' ];
	}
	else {
	$fa_icon_four =  'fa-google';
	}
	
	if ( isset( $instance[ 'social_icon_four_url' ])){
	$social_icon_four_url = $instance[ 'social_icon_four_url' ];
	}
	else {
	$social_icon_four_url = '#';
	}
	
	
	if ( isset( $instance[ 'fa_icon_five' ])){
	$fa_icon_five = $instance[ 'fa_icon_five' ];
	}
	else {
	$fa_icon_five =  'fa-instagram';
	}
	
	if ( isset( $instance[ 'social_icon_five_url' ])){
	$social_icon_five_url = $instance[ 'social_icon_five_url' ];
	}
	else {
	$social_icon_five_url = '#';
	}

	// Widget admin form
	?>
	
	
	<h4 for="<?php echo esc_attr($this->get_field_id( 'fa_icon_one' )); ?>"><?php _e('Social icon one','consultera' ); ?>    
	</h4>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'fa_icon_one' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'fa_icon_one' )); ?>" type="text" placeholder="fa-facebook" value="<?php if($fa_icon_one) echo esc_attr( $fa_icon_one );?>" />
	<span><?php _e('Link to get FontAwesome icon','consultera'); ?>  <a href="<?php echo 'https://fontawesome.com/v4.7.0/icons/';?>" target="_blank" ><?php echo 'fa-icon'; ?></a></span>
	
	<h4 for="<?php echo esc_attr($this->get_field_id( 'social_icon_one_url' )); ?>"><?php _e('Social icon one','consultera' ); ?>    
	</h4>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'social_icon_one_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'social_icon_one_url' )); ?>" type="text" placeholder="#" value="<?php if($social_icon_one_url) echo esc_url( $social_icon_one_url );?>" />
	
	
	<h4 for="<?php echo esc_attr($this->get_field_id( 'fa_icon_two' )); ?>"><?php _e('Social icon two','consultera' ); ?>    
	</h4>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'fa_icon_two' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'fa_icon_two' )); ?>" type="text" placeholder="fa-twitter" value="<?php if($fa_icon_two) echo esc_attr( $fa_icon_two );?>" />
	<span><?php _e('Link to get FontAwesome icon','consultera'); ?>  <a href="<?php echo 'https://fontawesome.com/v4.7.0/icons/';?>" target="_blank" ><?php echo 'fa-icon'; ?></a></span>
	
	<h4 for="<?php echo esc_attr($this->get_field_id( 'social_icon_two_url' )); ?>"><?php _e('Social icon two','consultera' ); ?>    
	</h4>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'social_icon_two_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'social_icon_two_url' )); ?>" type="text" placeholder="#" value="<?php if($social_icon_two_url) echo esc_url( $social_icon_two_url );?>" />
	
	
	<h4 for="<?php echo esc_attr($this->get_field_id( 'fa_icon_three' )); ?>"><?php _e('Social icon three','consultera' ); ?>    
	</h4>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'fa_icon_three' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'fa_icon_three' )); ?>" type="text" placeholder="fa-linkedin" value="<?php if($fa_icon_three) echo esc_attr( $fa_icon_three );?>" />
	<span><?php _e('Link to get FontAwesome icon','consultera'); ?>  <a href="<?php echo 'https://fontawesome.com/v4.7.0/icons/';?>" target="_blank" ><?php echo 'fa-icon'; ?></a></span>
	
	<h4 for="<?php echo esc_attr($this->get_field_id( 'social_icon_three_url' )); ?>"><?php _e('Social icon three','consultera' ); ?>    
	</h4>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'social_icon_three_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'social_icon_three_url' )); ?>" type="text" value="<?php if($social_icon_three_url) echo esc_url( $social_icon_three_url );?>" />
	
	
	<h4 for="<?php echo esc_attr($this->get_field_id( 'fa_icon_four' )); ?>"><?php _e('Social icon four','consultera' ); ?>    
	</h4>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'fa_icon_four' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'fa_icon_four' )); ?>" type="text" placeholder="fa-google" value="<?php if($fa_icon_four) echo esc_attr( $fa_icon_four );?>" />
	<span><?php _e('Link to get FontAwesome icon','consultera'); ?>  <a href="<?php echo 'https://fontawesome.com/v4.7.0/icons/';?>" target="_blank" ><?php echo 'fa-icon'; ?></a></span>
	
	<h4 for="<?php echo esc_attr($this->get_field_id( 'social_icon_four_url' )); ?>"><?php _e('Social icon four','consultera' ); ?>    
	</h4>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'social_icon_four_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'social_icon_four_url' )); ?>"  type="text" placeholder="#" value="<?php if($social_icon_four_url) echo esc_url( $social_icon_four_url );?>" />
	
	
	<h4 for="<?php echo esc_attr($this->get_field_id( 'fa_icon_five' )); ?>"><?php _e('Social icon five','consultera' ); ?>    
	</h4>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'fa_icon_five' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'fa_icon_five' )); ?>" type="text" placeholder="fa-instagram" value="<?php if($fa_icon_five) echo esc_attr( $fa_icon_five );?>" />
	<span><?php _e('Link to get FontAwesome icon','consultera'); ?>  <a href="<?php echo 'https://fontawesome.com/v4.7.0/icons/';?>" target="_blank" ><?php echo 'fa-icon'; ?></a></span>
	
	<h4 for="<?php echo esc_attr($this->get_field_id( 'social_icon_five_url' )); ?>"><?php _e('Social icon five','consultera' ); ?>    
	</h4>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'social_icon_five_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'social_icon_five_url' )); ?>" type="text" placeholder="#" value="<?php if($social_icon_five_url) echo esc_url( $social_icon_five_url );?>" />
	
	
	
	<?php
    }
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
	
	$instance = array();
		$instance['fa_icon_one'] = ( ! empty( $new_instance['fa_icon_one'] ) ) ? strip_tags( $new_instance['fa_icon_one'] ) : '';
		$instance['social_icon_one_url'] = ( ! empty( $new_instance['social_icon_one_url'] ) ) ? esc_url_raw( $new_instance['social_icon_one_url'] ) : '';
		
		
		$instance['fa_icon_two'] = ( ! empty( $new_instance['fa_icon_two'] ) ) ? strip_tags( $new_instance['fa_icon_two'] ) : '';
		$instance['social_icon_two_url'] = ( ! empty( $new_instance['social_icon_two_url'] ) ) ? esc_url_raw( $new_instance['social_icon_two_url'] ) : '';
		
		$instance['fa_icon_three'] = ( ! empty( $new_instance['fa_icon_three'] ) ) ? strip_tags( $new_instance['fa_icon_three'] ) : '';
		$instance['social_icon_three_url'] = ( ! empty( $new_instance['social_icon_three_url'] ) ) ? esc_url_raw( $new_instance['social_icon_three_url'] ) : '';
		
		$instance['fa_icon_four'] = ( ! empty( $new_instance['fa_icon_four'] ) ) ? strip_tags( $new_instance['fa_icon_four'] ) : '';
		$instance['social_icon_four_url'] = ( ! empty( $new_instance['social_icon_four_url'] ) ) ? esc_url_raw( $new_instance['social_icon_four_url'] ) : '';
		$instance['fa_icon_five'] = ( ! empty( $new_instance['fa_icon_five'] ) ) ? strip_tags( $new_instance['fa_icon_five'] ) : '';
		$instance['social_icon_five_url'] = ( ! empty( $new_instance['social_icon_five_url'] ) ) ? esc_url_raw( $new_instance['social_icon_five_url'] ) : '';
		
		
		return $instance;
	}
	}
	?>