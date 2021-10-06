<?php
/**
 * Add admin notice
*/

add_action( 'admin_notices', 'consultera_admin_notice'  );
add_action( 'wp_ajax_dismiss_admin_notice', 'consultera_dismiss_admin_notice' );
add_action( 'admin_enqueue_scripts', 'consultera_welcome_static'  );

 
function consultera_admin_notice() {
	if ( is_admin() && ! get_user_meta( get_current_user_id(), 'welcome_box' ) ) {
		?>
		
		
		
		<div class="updated notice is-dismissible consultera-admin-notice" data-notice="welcome_box">
			<h1><?php
			$theme_info = wp_get_theme();
			printf( esc_html__('Congratulations, Welcome to %1$s Theme', 'consultera'), esc_html( $theme_info->Name ), esc_html( $theme_info->Version ) ); ?>
			</h1>
			<p><?php echo sprintf( esc_html__("Thank you for choosing ConsultEra theme. To take full advantage of the complete features of the theme, you have to go to our %1\$s welcome page %2\$s.", "consultera"), '<a href="' . esc_url( admin_url( 'themes.php?page=consultera-welcome' ) ) . '">', '</a>' ); ?></p>
			
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=consultera-welcome' ) ); ?>" class="button button-blue-secondary button_info" style="text-decoration: none;"><?php echo esc_html__('Get started with ConsultEra','consultera'); ?></a></p>
		</div>
		
		
		<?php
	}
}


/**
 * Dismiss admin notice
 */
function consultera_dismiss_admin_notice() {

	// Nonce check.
	check_ajax_referer( 'consultera_dismiss_admin_notice', 'nonce' );

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
function consultera_welcome_static() {
	// Dismiss admin notice.
	wp_enqueue_script(
		'consultera-dismiss-admin-notice',
		get_template_directory_uri() . '/inc/admin/js/dismiss-admin-notice.js',
		'1.0',
		true
	);
	
	wp_enqueue_script(
		'consultera-install-demo',
		get_template_directory_uri() . '/inc/admin/js/install-demo.js',
		array('updates'),
		'1.0',
		true
	);
	

	wp_localize_script(
		'consultera-dismiss-admin-notice',
		'consultera_dismiss_admin_notice',
		array(
			'nonce' => wp_create_nonce( 'consultera_dismiss_admin_notice' ),
		)
	);

	// Welcome screen style.
	wp_enqueue_style('consultera-admin-styles', get_template_directory_uri().'/inc/admin/css/consultera-welcome.css');

}



add_action('admin_menu', 'consultera_welcome_page');


// Consultera welcome page register
function consultera_welcome_page() {
	$wpazure_page_title =  apply_filters( 'consultera_menu_page_title', __( 'Consultera Options', 'consultera' ) );
    add_theme_page('Consultera Theme Options', $wpazure_page_title, 'manage_options', 'consultera-welcome', 'consultera_settings_page');
}

function consultera_settings_page(){
	?>
  <div class="consultera-admin wrap">
  	<?php	do_action( 'consultera_settings_content' ); ?>
  </div><!-- /.wrap -->
  <?php
}


/**
 * Customizer settings link
 */
function consultera_info_customizer_settings() {
	$customizer_settings = apply_filters(
		'consultera_panel_customizer_settings',
		array(
			'upload_logo' => array(
				'icon'     => 'dashicons dashicons-format-image',
				'name'     => __( 'Upload Logo', 'consultera' ),
				'type'     => 'control',
				'setting'  => 'custom_logo',
				'required' => '',
			),
			
			'home_section' => array(
				'icon'     => 'dashicons dashicons-admin-settings',
				'name'     => __( 'Home section settings', 'consultera' ),
				'type'     => 'panel',
				'setting'  => 'homepage_sections',
				'required' => '',
			),
			
			'widget' => array(
				'icon'     => 'dashicons dashicons-tagcloud',
				'name'     => __( 'Widgets', 'consultera' ),
				'type'     => 'section',
				'setting'  => 'sidebar-widgets-top-header-left',
				'required' => '',
			),
		)
	);

	return $customizer_settings;
}


add_action( 'consultera_settings_content', 'consultera_welcome_render_options_page' );

function consultera_welcome_render_options_page() {  

$consultera_url = 'https://wpazure.com';
			?>
	<div class="consultera-options-wrap admin-welcome-screen">


				<div class="consultera-enhance">
					<div class="consultera-info-container">
						<div class="consultera-enhance-content">
							<div class="consultera-enhance__column consultera-bundle">
								<h3><?php esc_html_e( 'Link to Customizer Settings', 'consultera' ); ?></h3>
								<div class="consultera-quick-setting-section">
									<ul class="consultera-list">
									<?php
									foreach ( consultera_info_customizer_settings() as $key ) {
										$url = get_admin_url() . 'customize.php?autofocus[' . $key['type'] . ']=' . $key['setting'];

										$disabled = '';
										$title    = '';
										if ( '' !== $key['required'] && ! class_exists( $key['required'] ) ) {
											$disabled = 'disabled';

											/* translators: 1: Class name */
											$title = sprintf( __( '%s not activated.', 'consultera' ), ucfirst( $key['required'] ) );

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

								<div class="consultera-enhance__column consultera-pro-featured pro-featured-list">
									<h3>
										<a class="consultera-learn-more wp-ui-text-highlight" href="https://www.wpazure.com/consultera-pro/" target="_blank"><?php esc_html_e( 'Get The consultera Pro Version!', 'consultera' ); ?></a>
									</h3>

									<div class="consultera-quick-setting-section">
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Top Header', 'consultera' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Multiple Slider Layout and Video Background', 'consultera' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Multiple Header & Footer Layout', 'consultera' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'About section', 'consultera' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Unlimited Servives', 'consultera' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Unlimited Portfolio', 'consultera' ); ?>
											</strong>
											
										</div>
										
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Unlimited Testimonial', 'consultera' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Pricing Section', 'consultera' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Team section', 'consultera' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Client section', 'consultera' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( '17 Page Templates', 'consultera' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Multiple Portfolio Layouts', 'consultera' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Multiple Blog Layouts', 'consultera' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Theme section Layout Manager', 'consultera' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Theme Section Hooks', 'consultera' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Theme settings', 'consultera' ); ?>
											</strong>
											
										</div>
										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Typography', 'consultera' ); ?>
											</strong>
											
										</div>

										<div class="pro-featured-item">
											<strong class="pro-featured-name">
												<?php esc_html_e( 'Read more about pro', 'consultera' ); ?>
											</strong>
											<p>
										<a href="<?php echo esc_url( $consultera_url ); ?>/consultera-pro" class="consultera-button button-primary" target="_blank"><?php esc_html_e( 'Read more', 'consultera' ); ?></a>
									</p>
										</div>
										
									</div>
								</div>
						
							<?php do_action( 'consultera_pro_panel' ); ?>
						</div>

						<div class="consultera-enhance-sidebar">
							<?php do_action( 'consultera_pro_panel_sidebar' ); ?>

							<div class="consultera-enhance__column">
								<h3><?php esc_html_e( 'About Theme', 'consultera' ); ?></h3>

								<div class="consultera-quick-setting-section">
									<img src="<?php echo esc_url( CONSULTERA_THEME_URI . 'images/banner.jpg' ); ?>" alt="Consultera Banner" />

									<p>
										<?php esc_html_e( 'ConsultEra is a modern,responsive and fully customizable lightning fast WordPress theme for professionals. This theme comes with a stunning COOL & BEAUTIFUL LOOK, SERVICE SECTION, PORTFOLIO SECTION, TESTIMONIAL SECTION, WOOCOMMERCE PRODUCT SECTION, CALL TO ACTION SECTION, BLOG POST SECTION. ', 'consultera' ); ?>
									</p>

									<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="consultera-button button-primary " target="_blank"><?php echo esc_html__( 'Go to customizer', 'consultera' ); ?></a>
		
								</div>
							</div>
							
							<div class="consultera-enhance__column">
								<h3><?php esc_html_e( 'Recommend Plugins', 'consultera' ); ?></h3>
								
								
								<?php
									$plugin_slug = 'wpazure-kit';
									$slug        = 'wpazure-kit/wpazure-kit.php';
									$redirect    = admin_url( 'admin.php?page=consultera-welcome' );
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

									// Check consultera Sites status.
									$type = 'install';
									if ( file_exists( ABSPATH . 'wp-content/plugins/' . $plugin_slug ) ) {
										$activate = is_plugin_active( $plugin_slug . '/wpazure-kit.php' ) ? 'activate' : 'deactivate';
										$type = $activate;
									}

									
									$button = '<a href="' . esc_url( admin_url( 'customize.php' ) ) . '" class="consultera-button " target="_blank">' . esc_html__( 'Plugin activated', 'consultera' ) . '</a>';

									
									if ( ! defined( 'WPAZURE_KIT_VERSION' ) ) {
										if ( 'deactivate' == $type ) {
											$button = '<a data-redirect="' . esc_url( $redirect ) . '" data-slug="' . esc_attr( $slug ) . '" class="consultera-button button consultera-active-now" href="' . esc_url( $nonce ) . '">' . esc_html__( 'Activate', 'consultera' ) . '</a>';
										} else {
											$button = '<a data-redirect="' . esc_url( $redirect ) . '" data-slug="' . esc_attr( $plugin_slug ) . '" href="' . esc_url( $nonce ) . '" class="consultera-button install-now button consultera-install-demo">' . esc_html__( 'Install Wpazure kit', 'consultera' ) . '</a>';
										}
									}

									// Data.
									wp_localize_script(
										'consultera-install-demo',
										'consultera_install_demo',
										array(
											'activating' => esc_html__( 'Activating', 'consultera' ),
										)
									);
									?>
									<div class="consultera-quick-setting-section">
										<p>
											<?php echo $button; // WPCS: XSS ok. ?>
										</p>
									</div>

								
							</div>

							<div class="consultera-enhance__column">
								<h3><?php esc_html_e( 'Learn More', 'consultera' ); ?></h3>

								<div class="consultera-quick-setting-section">
									<p>
										<?php esc_html_e( 'Want to know more about ConsultEra? Click on the below link to read full detail.', 'consultera' ); ?>
									</p>

									<p>
										<a href="<?php echo esc_url( $consultera_url ); ?>/consultera-free/" class="consultera-button"><?php esc_html_e( 'Visit Us', 'consultera' ); ?></a>
									</p>
								</div>
							</div>
							
							
						</div>
					</div>
				</div>
			</div>
	
<?php }
