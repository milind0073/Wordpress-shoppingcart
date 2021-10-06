<?php
/**
 * Consultera functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Consultera
*/
 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
*/
 
/**
 * Define Constants
*/
define( 'CONSULTERA_THEME_VERSION', '1.2.3' );
define( 'CONSULTERA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'CONSULTERA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );


if(!function_exists('consultera_setup')):
	function consultera_setup()
	{
		 /**
		 * Make theme available for translation.
		 * Translations can be placed in the /languages/ directory.
		 */
		load_theme_textdomain( 'consultera', CONSULTERA_THEME_DIR . '/languages' );
		
		/**
		 * Load theme hooks
		 */
		require_once CONSULTERA_THEME_DIR . 'inc/menu/class-consultera-bootstrap-navwalker.php';
		
		// woocommerce support
		add_theme_support( 'woocommerce' );
		
		
		/**
		 * Add default posts and comments RSS feed links to <head>.
		 */
		add_theme_support( 'automatic-feed-links' );
		
		 /**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'consultera-720', 720 );
		
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		
		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus( array(
			'primary'   => esc_html__( 'Primary Menu', 'consultera' ),
		) );
		
		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'css/bootstrap.css', 'css/editor-style.css' ) );
		

		
	//Custom logo
		add_theme_support( 'custom-logo', array(
			'height'      => 40,
			'width'       => 175,
			'flex-height' => true,
			'flex-height' => true,
		) );
	
	// custom header Support
			$args = array(
			'default-image'		=>  get_template_directory_uri() .'/images/fun-facts.jpg',
			'width'			=> '1600',
			'height'		=> '900',
			'flex-height'		=> false,
			'flex-width'		=> false,
			'header-text'		=> true,
			'default-text-color'	=> '#143745'
		);
		add_theme_support( 'custom-header', $args );
	}
endif;
add_action('after_setup_theme','consultera_setup');
 
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
*/
 
function consultera_content_width()
{
	$GLOBALS['content_width'] = apply_filters( 'consultera_content_width', 1170 );
}
add_action( 'after_setup_theme', 'consultera_content_width', 0 );



function consultera_scripts()
{
	wp_enqueue_style( 'boostrap-css', CONSULTERA_THEME_URI . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', CONSULTERA_THEME_URI . '/css/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'consultera-style', get_stylesheet_uri() );
	wp_enqueue_style( 'consultera-default-css', CONSULTERA_THEME_URI . '/css/skins/default.css' );
	wp_enqueue_script( 'boostrap-js', CONSULTERA_THEME_URI . '/js/bootstrap.min.js', array( 'jquery' ), CONSULTERA_THEME_VERSION, true );	
	
	wp_enqueue_script( 'consultera-custom-scripts', CONSULTERA_THEME_URI . '/js/custom.js', array( 'jquery' ), CONSULTERA_THEME_VERSION, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'consultera_scripts' );


/**
* Add welcome page
**/
 if ( is_admin() ) {
	 $theme = wp_get_theme();
	if ( 'ConsultEra' == $theme->name){
 require CONSULTERA_THEME_DIR . '/inc/admin/consultera-welcome.php';
	}
 }


require CONSULTERA_THEME_DIR .'/inc/font/font.php';

/**
 * Sidebar additions.
*/
require CONSULTERA_THEME_DIR . '/inc/core/functions/sidebar-function.php';
require CONSULTERA_THEME_DIR . '/inc/core/functions/consultera_info_widget.php';
require CONSULTERA_THEME_DIR . '/inc/core/functions/consultera_social_widget.php';




/**
 * Load Custom select control in Customizer
*/
if ( class_exists( 'WP_Customize_Control' ) ) {	
require_once get_template_directory() . '/inc/customizer/custom-controls/iconpicker-control/customize-iconpicker-control.php';
}

/**
 * Customizer settings files.
*/
require CONSULTERA_THEME_DIR . 'inc/customizer/plugin_recommend.php';

/**
 * TGMPA
*/
require_once CONSULTERA_THEME_DIR . '/inc/tgmpa/class-tgm-plugin-activation.php';
function consultera_register_required_plugins_function()
{
	$plugins = array(
		
		array(
			'name'      => 'Wpazure Kit',
			'slug'      => 'wpazure-kit',
			'required'  => false,
		),
		
		
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		
		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => false,
		),
				
	);	

	$config = array(
		'id'           => 'consultera',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'consultera_register_required_plugins_function' );


/**
 * Custom template tags for this theme.
*/
require CONSULTERA_THEME_DIR . '/inc/template-tags.php';

/**
 * section functions files.
*/

require CONSULTERA_THEME_DIR . '/inc/core/themes-hooks.php';
require CONSULTERA_THEME_DIR . 'inc/core/functions/header-function.php';
require CONSULTERA_THEME_DIR . 'inc/core/functions/content-function.php';
require CONSULTERA_THEME_DIR . 'inc/core/functions/single-function.php';
require CONSULTERA_THEME_DIR . 'inc/core/functions/archive-function.php';
require CONSULTERA_THEME_DIR . 'inc/core/functions/footer-function.php';

require CONSULTERA_THEME_DIR . '/inc/consultera-pro/class-consultera-get-pro-section.php';

add_action( "customize_register", "cusultera_remove_default_customize_register" );
function cusultera_remove_default_customize_register( $wp_customize ) {

 //=============================================================
 // Remove Colors, 
 // option from theme customizer     
 //=============================================================
 $wp_customize->remove_section("colors");

}

if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}


/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */
function consultera_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#site-content">' . __( 'Skip to the content', 'consultera' ) . '</a>';
}

add_action( 'wp_body_open', 'consultera_skip_link', 5 );


// Register panels, sections, settings, controls, and partials.
	add_action( 'customize_register', 'sections'  );
	function sections( $manager ) {

		// Register custom section types.
		$manager->register_section_type( 'Consultera_Get_Pro_Section' );

		// Register sections.
		$manager->add_section(
			new Consultera_Get_Pro_Section(
				$manager,
				'consultera_upsell',
				array(
					'pro_text' => esc_html__( 'Go To Consultera pro',  'consultera' ),
					'pro_url'  => '//www.wpazure.com/consultera-pro/',
					'priority' => 0,
				)
			)
		);
	}



