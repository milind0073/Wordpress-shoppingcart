<?php
	// Register and load the widget
	function consultera_info_callout() {
	    register_widget( 'Consultera_info_callout' );
	}
	add_action( 'widgets_init', 'consultera_info_callout' );

// Creating the widget
	class Consultera_info_callout extends WP_Widget {
	 
	function __construct() {
		parent::__construct(
			'consultera_info_callout', // Base ID
			__('Wpazure : Conatct Info Widget','consultera'), // Widget Name
			array(
				'classname' => 'consultera_info_callout',
				'description' => __('ConsultEra theme information widget','consultera'),
			),
			array(
				'width' => 600,
			)
		);
		
	 }
	
	public function widget( $args, $instance ) {
		
		if ( isset( $instance[ 'fa_icon_phone' ])){
	$fa_icon_phone = $instance[ 'fa_icon_phone' ];
	}
	else {
	$fa_icon_phone = 'fa-envelope';
	}
	if ( isset( $instance[ 'phone_text' ])){
	$phone_text = $instance[ 'phone_text' ];
	}
	else {
	$phone_text =  '+8800 235 2451';
	}
	if ( isset( $instance[ 'phone_link' ])){
	$phone_link = $instance[ 'phone_link' ];
	}
	else {
	$phone_link = '#';
	}
	
	

	if ( isset( $instance[ 'fa_icon_email' ])){
	$fa_icon_email = $instance[ 'fa_icon_email' ];
	}
	else {
	$fa_icon_email = 'fa-envelope';
	}
	if ( isset( $instance[ 'email_text' ])){
	$email_text = $instance[ 'email_text' ];
	}
	else {
	$email_text =  'info@yourdomain.com';
	}
	if ( isset( $instance[ 'email_link' ])){
	$email_link = $instance[ 'email_link' ];
	}
	else {
	$email_link = '#';
	}
	
	echo $args['before_widget'];?>
	
						<ul class="social-icons">
							<li>
								<a href="<?php echo esc_url($phone_link);?>">
									<i class="fa <?php echo esc_attr($fa_icon_phone); ?>" aria-hidden="true"></i> <span> <?php  echo esc_html($phone_text);?> </span> 
								</a>
							</li>
							<li>
								<a href="<?php echo esc_url($email_link); ?>">
									<i class="fa <?php echo esc_attr($fa_icon_email); ?>" aria-hidden="true"></i> <span> <?php echo sanitize_email($email_text); ?> </span> 
								</a>
							</li>
						</ul>
					

	<?php
	echo $args['after_widget'];
	}
	         
	// Widget Backend
	
	public function form( $instance ) {
	if ( isset( $instance[ 'fa_icon_phone' ])){
	$fa_icon_phone = $instance[ 'fa_icon_phone' ];
	}
	else {
	$fa_icon_phone = 'fa-envelope';
	}
	if ( isset( $instance[ 'phone_text' ])){
	$phone_text = $instance[ 'phone_text' ];
	}
	else {
	$phone_text =  '+8800 235 2451';
	}
	if ( isset( $instance[ 'phone_link' ])){
	$phone_link = $instance[ 'phone_link' ];
	}
	else {
	$phone_link = '#';
	}
	
	

	if ( isset( $instance[ 'fa_icon_email' ])){
	$fa_icon_email = $instance[ 'fa_icon_email' ];
	}
	else {
	$fa_icon_email = 'fa-envelope';
	}
	if ( isset( $instance[ 'email_text' ])){
	$email_text = $instance[ 'email_text' ];
	}
	else {
	$email_text =  'info@yourdomain.com';
	}
	if ( isset( $instance[ 'email_link' ])){
	$email_link = $instance[ 'email_link' ];
	}
	else {
	$email_link = '#';
	}

	// Widget admin form
	?>
	
	
	<h4 for="<?php echo esc_attr( $this->get_field_id( 'fa_icon_phone' )); ?>"><?php _e('FontAwesome icon one','consultera' ); ?>    
	 </h4>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'fa_icon_phone' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'fa_icon_phone' )); ?>" type="text" placeholder="fa-phone" value="<?php if($fa_icon_phone) echo esc_attr( $fa_icon_phone );?>" />
	<span><?php _e('Link to get FontAwesome icon','consultera'); ?>  <a href="<?php echo 'https://fontawesome.com/v4.7.0/icons/';?>" target="_blank" ><?php echo 'fa-icon'; ?></a></span>
	<h4 for="<?php echo esc_attr($this->get_field_id( 'phone_text' )); ?>"><?php _e('Title One','consultera' ); ?></h4>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'phone_text' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'phone_text' )); ?>" type="text" value="<?php if($phone_text) echo esc_attr( $phone_text );?>" />
	
	<h4 for="<?php echo esc_attr($this->get_field_id( 'phone_link' )); ?>"><?php _e('Link one','consultera' ); ?></h4>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'phone_link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'phone_link' )); ?>" type="text" value="<?php if($phone_link) echo esc_url($phone_link);?>" /><br><br>
	
	
	<h4 for="<?php echo esc_attr($this->get_field_id( 'fa_icon_email' )); ?>"><?php _e('FontAwesome icon two','consultera' ); ?></h4>
	
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'fa_icon_email' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'fa_icon_email' )); ?>" type="text" placeholder="fa-envelope" value="<?php if($fa_icon_email) echo esc_attr( $fa_icon_email ); ?>" />
	<span><?php _e('Link to get FontAwesome icon','consultera'); ?>  <a href="<?php echo 'https://fontawesome.com/v4.7.0/icons/';?>" target="_blank" ><?php echo 'fa-icon'; ?></a></span>
	
	
	<h4 for="<?php echo esc_attr($this->get_field_id( 'email_text' )); ?>"><?php _e('Text two','consultera' ); ?></h4>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'email_text' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'email_text' )); ?>" type="text" value="<?php if($email_text) echo sanitize_email( $email_text ); ?>" />
	
	<h4 for="<?php echo esc_attr($this->get_field_id( 'email_link' )); ?>"><?php _e('Link two','consultera' ); ?></h4>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'email_link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'email_link' )); ?>" type="text" value="<?php if($email_link) echo sanitize_email($email_link);?>" /><br><br>
	
	<?php
    }
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
	
	$instance = array();
		$instance['fa_icon_phone'] = ( ! empty( $new_instance['fa_icon_phone'] ) ) ? strip_tags( $new_instance['fa_icon_phone'] ) : '';
		$instance['phone_text'] = ( ! empty( $new_instance['phone_text'] ) ) ? strip_tags( $new_instance['phone_text'] ) : '';
		$instance['phone_link'] = ( ! empty( $new_instance['phone_link'] ) ) ? esc_url_raw($new_instance['phone_link']) : '';
		
		$instance['fa_icon_email'] = ( ! empty( $new_instance['fa_icon_email'] ) ) ? strip_tags( $new_instance['fa_icon_email'] ) : '';
		$instance['email_text'] = ( ! empty( $new_instance['email_text'] ) ) ? strip_tags( $new_instance['email_text'] ) : '';
		$instance['email_link'] = ( ! empty( $new_instance['email_link'] ) ) ? sanitize_email($new_instance['email_link']) : '';
		
		return $instance;
	}
	}
	?>