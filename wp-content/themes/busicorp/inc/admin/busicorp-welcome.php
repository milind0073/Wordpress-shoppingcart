<?php
/**
 * Add admin notice
*/

add_action( 'admin_notices', 'busicorp_admin_notice'  );
add_action( 'wp_ajax_dismiss_admin_notice', 'busicorp_dismiss_admin_notice' );
add_action( 'admin_enqueue_scripts', 'busicorp_welcome_static'  );

 
function busicorp_admin_notice() {
	if ( is_admin() && ! get_user_meta( get_current_user_id(), 'welcome_box' ) ) {
		?>
		
		
		
		<div class="updated notice is-dismissible busicorp-admin-notice" data-notice="welcome_box">
			<h1><?php
			$theme_info = wp_get_theme();
			printf( esc_html__('Congratulations, Welcome to %1$s Theme', 'busicorp'), esc_html( $theme_info->Name ), esc_html( $theme_info->Version ) ); ?>
			</h1>
			<p><?php echo sprintf( esc_html__("Thank you for choosing Busicorp theme. To take full advantage of the complete features of the theme, you have to go to our %1\$s welcome page %2\$s.", "busicorp"), '<a href="' . esc_url( admin_url( 'themes.php?page=busicorp-welcome' ) ) . '">', '</a>' ); ?></p>
			
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=busicorp-welcome' ) ); ?>" class="button button-blue-secondary button_info" style="text-decoration: none;"><?php echo esc_html__('Get started with Cusicorp','busicorp'); ?></a></p>
		</div>
		
		
		<?php
	}
}


/**
 * Dismiss admin notice
 */
function busicorp_dismiss_admin_notice() {

	// Nonce check.
	check_ajax_referer( 'busicorp_dismiss_admin_notice', 'nonce' );

	// Bail if user can't edit theme options.
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_send_json_error();
	}

	$notice = isset( $_POST['notice'] ) ? sanitize_text_field( wp_unslash( $_POST['notice'] ) ) : '';

	if ( $notice ) {
		update_user_meta( get_current_user_id(), $notice, true );
		wp_send_json_success();
	}

	wp_send_json_error();
}

/**
 * Load welcome screen script and css
 */
function busicorp_welcome_static() {
	// Dismiss admin notice.
	wp_enqueue_script(
		'busicorp-dismiss-admin-notice',
		get_stylesheet_directory_uri() . '/inc/admin/js/dismiss-admin-notice.js',
		'1.0',
		true
	);
	
	wp_enqueue_script(
		'busicorp-install-demo',
		get_stylesheet_directory_uri() . '/inc/admin/js/install-demo.js',
		array('updates'),
		'1.0',
		true
	);
	

	wp_localize_script(
		'busicorp-dismiss-admin-notice',
		'busicorp_dismiss_admin_notice',
		array(
			'nonce' => wp_create_nonce( 'busicorp_dismiss_admin_notice' ),
		)
	);

	// Welcome screen style.
	wp_enqueue_style('busicorp-admin-styles', get_stylesheet_directory_uri().'/inc/admin/css/busicorp-welcome.css');

}



add_action('admin_menu', 'busicorp_welcome_page');


// busicorp welcome page register
function busicorp_welcome_page() {
	$wpazure_page_title =  apply_filters( 'busicorp_menu_page_title', __( 'Busicorp Options', 'busicorp' ) );
    add_theme_page('Busicorp Theme Options', $wpazure_page_title, 'edit_theme_options', 'busicorp-welcome', 'busicorp_settings_page');
}

function busicorp_settings_page(){
	?>
  <div class="busicorp-admin wrap">
  	<?php	do_action( 'busicorp_settings_content' ); ?>
  </div><!-- /.wrap -->
  <?php
}


/**
 * Customizer settings link
 */
function busicorp_info_customizer_settings() {
	$customizer_settings = apply_filters(
		'busicorp_panel_customizer_settings',
		array(
			'upload_logo' => array(
				'icon'     => 'dashicons dashicons-format-image',
				'name'     => __( 'Upload Logo', 'busicorp' ),
				'type'     => 'control',
				'setting'  => 'custom_logo',
				'required' => '',
			),
			
			'home_section' => array(
				'icon'     => 'dashicons dashicons-admin-settings',
				'name'     => __( 'Home section settings', 'busicorp' ),
				'type'     => 'panel',
				'setting'  => 'homepage_sections',
				'required' => '',
			),
			
			'widget' => array(
				'icon'     => 'dashicons dashicons-tagcloud',
				'name'     => __( 'Widgets', 'busicorp' ),
				'type'     => 'section',
				'setting'  => 'sidebar-widgets-top-header-left',
				'required' => '',
			),
		)
	);

	return $customizer_settings;
}


add_action( 'busicorp_settings_content', 'busicorp_welcome_render_options_page' );

function busicorp_welcome_render_options_page() {  

$busicorp_url = 'https://wpazure.com';
			?>
	<div class="busicorp-options-wrap admin-welcome-screen">


				<div class="busicorp-enhance">
					<div class="busicorp-info-container">
						<div class="busicorp-enhance-content">
							<div class="busicorp-enhance__column busicorp-bundle">
								<h3><?php esc_html_e( 'Link to Customizer Settings', 'busicorp' ); ?></h3>
								<div class="busicorp-quick-setting-section">
									<ul class="busicorp-list">
									<?php
									foreach ( busicorp_info_customizer_settings() as $key ) {
										$url = get_admin_url() . 'customize.php?autofocus[' . $key['type'] . ']=' . $key['setting'];

										$disabled = '';
										$title    = '';
										if ( '' !== $key['required'] && ! class_exists( $key['required'] ) ) {
											$disabled = 'disabled';

											/* translators: 1: Class name */
											$title = sprintf( __( '%s not activated.', 'busicorp' ), ucfirst( $key['required'] ) );

											$url = '#';
										}
										?>

										<li class="link-to-customie-item <?php echo esc_attr( $disabled ); ?>" title="<?php echo esc_attr( $title ); ?>">
											<a class="wst-quick-setting-title wp-ui-text-highlight" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener">
												<span class="<?php echo esc_attr( $key['icon'] ); ?>"></span>
												<?php echo esc_html( $key['name'] ); ?>
											</a>
										</li>

									<?php } ?>
									</ul>
									
									
								</div>
							</div>

								
						
							
								<div class="busicorp-enhance__column busicorp-pro-featured pro-featured-list">
									<h3>
										<a class="busicorp-learn-more wp-ui-text-highlight" href="https://www.wpazure.com/consultera-pro/" target="_blank"><?php esc_html_e( 'Get The consultera Pro Version!', 'consultera' ); ?></a>
									</h3>

									<div class="busicorp-quick-setting-section">
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Top Header', 'busicorp' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Multiple Slider Layout and Video Background', 'busicorp' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Multiple Header & Footer Layout', 'busicorp' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'About section', 'busicorp' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Unlimited Servives', 'busicorp' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Unlimited Portfolio', 'busicorp' ); ?>
											</strong>
											
										</div>
										
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Unlimited Testimonial', 'busicorp' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Pricing Section', 'busicorp' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Team section', 'busicorp' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Client section', 'busicorp' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( '17 Page Templates', 'busicorp' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Multiple Portfolio Layouts', 'busicorp' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Multiple Blog Layouts', 'busicorp' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Theme section Layout Manager', 'busicorp' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Theme Section Hooks', 'busicorp' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Theme settings', 'busicorp' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Typography', 'busicorp' ); ?>
											</strong>
											
										</div>

										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Read more about pro', 'busicorp' ); ?>
											</strong>
											<p>
										<a href="<?php echo esc_url( $consultera_url ); ?>/consultera-pro" class="busicorp-button button-primary" target="_blank"><?php esc_html_e( 'Read more', 'consultera' ); ?></a>
									</p>
										</div>
										
									</div>
								</div>
						</div>

						<div class="busicorp-enhance-sidebar">
							<?php do_action( 'busicorp_pro_panel_sidebar' ); ?>

							<div class="busicorp-enhance__column">
								<h3><?php esc_html_e( 'About Theme', 'busicorp' ); ?></h3>

								<div class="busicorp-quick-setting-section">
									<img src="<?php echo esc_url(  get_stylesheet_directory_uri(). '/images/banner.jpg' ); ?>" alt="busicorp Banner" />

									<p>
										<?php esc_html_e( 'busicorp is a modern,responsive and fully customizable lightning fast WordPress theme for professionals. This theme comes with a stunning COOL & BEAUTIFUL LOOK, SERVICE SECTION, PORTFOLIO SECTION, TESTIMONIAL SECTION, WOOCOMMERCE PRODUCT SECTION, CALL TO ACTION SECTION, BLOG POST SECTION. ', 'busicorp' ); ?>
									</p>

									<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="busicorp-button button-primary " target="_blank"><?php echo esc_html__( 'Go to customizer', 'busicorp' ); ?></a>
		
								</div>
							</div>
							
							<div class="busicorp-enhance__column">
								<h3><?php esc_html_e( 'Recommend Plugins', 'busicorp' ); ?></h3>
								
								
								<?php
									$plugin_slug = 'wpazure-kit';
									$slug        = 'wpazure-kit/wpazure-kit.php';
									$redirect    = admin_url( 'admin.php?page=busicorp-welcome' );
									$nonce       = add_query_arg(
										array(
											'action'        => 'activate',
											'plugin'        => rawurlencode( $slug ),
											'plugin_status' => 'all',
											'paged'         => '1',
											'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $slug ),
										),
										network_admin_url( 'plugins.php' )
									);

									// Check busicorp Sites status.
									$type = 'install';
									if ( file_exists( ABSPATH . 'wp-content/plugins/' . $plugin_slug ) ) {
										$activate = is_plugin_active( $plugin_slug . '/wpazure-kit.php' ) ? 'activate' : 'deactivate';
										$type = $activate;
									}

									
									$button = '<a href="' . esc_url( admin_url( 'customize.php' ) ) . '" class="busicorp-button " target="_blank">' . esc_html__( 'Plugin activated', 'busicorp' ) . '</a>';

									
									if ( ! defined( 'WPAZURE_KIT_VERSION' ) ) {
										if ( 'deactivate' == $type ) {
											$button = '<a data-redirect="' . esc_url( $redirect ) . '" data-slug="' . esc_attr( $slug ) . '" class="busicorp-button button busicorp-active-now" href="' . esc_url( $nonce ) . '">' . esc_html__( 'Activate', 'busicorp' ) . '</a>';
										} else {
											$button = '<a data-redirect="' . esc_url( $redirect ) . '" data-slug="' . esc_attr( $plugin_slug ) . '" href="' . esc_url( $nonce ) . '" class="busicorp-button install-now button busicorp-install-demo">' . esc_html__( 'Install Wpazure kit', 'busicorp' ) . '</a>';
										}
									}

									// Data.
									wp_localize_script(
										'busicorp-install-demo',
										'busicorp_install_demo',
										array(
											'activating' => esc_html__( 'Activating', 'busicorp' ),
										)
									);
									?>
									<div class="busicorp-quick-setting-section">
										<p>
											<?php echo $button; // WPCS: XSS ok. ?>
										</p>
									</div>

								
							</div>

							<div class="busicorp-enhance__column">
								<h3><?php esc_html_e( 'Learn More', 'busicorp' ); ?></h3>

								<div class="busicorp-quick-setting-section">
									<p>
										<?php esc_html_e( 'Want to know more about busicorp? Click on the below link to read full detail.', 'busicorp' ); ?>
									</p>

									<p>
										<a href="<?php echo esc_url( $busicorp_url ); ?>/busicorp-free/" class="busicorp-button"><?php esc_html_e( 'Visit Us', 'busicorp' ); ?></a>
									</p>
								</div>
							</div>
							
							
						</div>
					</div>
				</div>
			</div>
	
<?php }
