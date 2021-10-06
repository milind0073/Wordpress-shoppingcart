<?php
/**
 * Sidebar Function for consultera Theme
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/

function consultera_widgets_init(){
	register_sidebar( 
				array(
					'name'          => esc_html__( 'Sidebar', 'consultera' ),
					'id'            => 'sidebar-1',
					'description'   => esc_html__( 'Add widgets here.', 'consultera' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h4 class="widget-title">',
					'after_title'   => '</h4>',
				) 
		);
		
	register_sidebar(
				array(
					'name'          => esc_html__( 'Top header section left', 'consultera' ),
					'id'            => 'top-header-left',
					'description'   => '',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			
		);
		
	register_sidebar(
				array(
					'name'          => esc_html__( 'Top header section right', 'consultera' ),
					'id'            => 'top-header-right',
					'description'   => '',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			
		);


	register_sidebar(
				array(
					'name'          => esc_html__( 'Home Woocommerce section', 'consultera' ),
					'id'            => 'front-woocommerce-section',
					'description'   => '',
					'before_widget' => '',
					'after_widget'  => '',
					'before_title'  => '',
					'after_title'   => '',
				)
			
		);
		
	
	register_sidebar(
				array(
					'name'          => esc_html__( 'Footer Left', 'consultera' ),
					'id'            => 'footer-widget-1',
					'description'   => '',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			
		);
		
	register_sidebar(
				array(
					'name'          => esc_html__( 'Footer Center', 'consultera' ),
					'id'            => 'footer-widget-2',
					'description'   => '',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			
		);
		
	register_sidebar(
				array(
					'name'          => esc_html__( 'Footer Right', 'consultera' ),
					'id'            => 'footer-widget-3',
					'description'   => '',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			
		);
		
	register_sidebar( 
				array(
					'name' => esc_html__('WooCommerce sidebar widget area', 'consultera' ),
					'id' => 'woocommerce',
					'description' => esc_html__( 'WooCommerce sidebar widget area', 'consultera' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h2 class="widget-title">',
					'after_title' => '</h2>',
				) 
	);
	
	
		
}
add_action( 'widgets_init', 'consultera_widgets_init' );