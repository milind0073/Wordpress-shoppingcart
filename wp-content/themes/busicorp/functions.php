<?php
function busicorp_css() {
	
	wp_enqueue_style( 'consultera-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'busicorp-style', get_stylesheet_uri(), array( 'consultera-parent-style' ));
	
	wp_enqueue_style('busicorp-color-default',get_stylesheet_directory_uri() .'/css/default.css');
	wp_dequeue_style('consultera-color-default');
}
add_action( 'wp_enqueue_scripts', 'busicorp_css',999);


if ( is_admin() ) {

 require_once( get_stylesheet_directory(). '/inc/admin/busicorp-welcome.php' );
 }
/**
 * Get the comments
 */

if ( ! function_exists( 'busicorp_get_comments_number' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function busicorp_get_comments_number() {
		
		echo '<li class="post-comment"> <i class="fa fa-comment" aria-hidden="true"></i>';
	$comment_count = get_comments_number();
	if ( '1' === $comment_count ) {
		esc_html_e( '1 ', 'busicorp' );
	} else {
		printf( // WPCS: XSS OK.
			
			esc_html( _nx( ' %1$s ', ' %1$s ', $comment_count, 'comments title', 'busicorp' ) ),
			number_format_i18n( $comment_count )
		);
	}
	echo '</li>';
		
	}
endif;
   	

/**
 * All categories
 */
if ( ! function_exists( 'busicorp_all_categories' ) ) :
function busicorp_all_categories() {
	$Separate_meta = ', ';
	$categories_list = get_the_category_list($Separate_meta);

	if ( $categories_list ) {
		echo '<li class="post-category"><i class="fa fa-folder-open" aria-hidden="true"></i> ' . $categories_list . '</li>';
	}
}
endif;

/**
* Blog post meta post by 
*/
if ( ! function_exists( 'busicorp_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function busicorp_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'busicorp' ),
			'<a class="author" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
		);

		echo '<li class="post-author">' . $byline ;
		_e(' At ','busicorp');
		echo get_the_time().' </li>'; // WPCS: XSS OK.
	}
endif;





/**
 * Post author
 */
if ( ! function_exists( 'busicorp_post_author_image' ) ) :
function busicorp_post_author_image() {
	
	
		echo '<li class="post-author-image">'.get_avatar( get_the_author_meta( 'ID' ), 32, '', '' , $args = array( 'class' => array( 'img-fluid ', 'author-img' ) )).'</li>';
	
}
endif;

function busicorp_widgets_init(){
register_sidebar(
				array(
					'name'          => esc_html__( 'Top header right social', 'busicorp' ),
					'id'            => 'top-header-social',
					'description'   => '',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			
		);
		
}

add_action( 'widgets_init', 'busicorp_widgets_init' );




/**
 * Before Footer 
 */
function busicorp_footer_before(){
	do_action( 'busicorp_footer_before' );
}

/**
 * widget Footer 
 */
function busicorp_footer(){
	do_action( 'busicorp_footer' );
}

/**
 * After Footer 
 */
function busicorp_footer_after(){
	do_action( 'busicorp_footer_after' );
}

/**
 * Scroll to top button 
 */
function busicorp_scroll_to_top(){
	do_action( 'busicorp_scroll_to_top' );
}

/**
 * Function to get site Footer
 */
if ( ! function_exists( 'busicorp_footer_markup' ) ) {

	/**
	 * Site Footer - <footer>
	 */
	function busicorp_footer_markup() { ?>
		
		<!-- FOOTER SECTION START -->
		<footer class="main-footer">
			<div class="container">
				<div class="row">
					<?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
					<div class="col-md-4 col-12">
						<?php dynamic_sidebar( 'footer-widget-1' ); ?>	
					</div>
					<?php endif; 
					if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
					<div class="col-md-4 col-12">
						<?php dynamic_sidebar( 'footer-widget-2' ); ?>	
					</div>
					<?php endif; 
					if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
					<div class="col-md-4 col-12">
						<?php dynamic_sidebar( 'footer-widget-3' ); ?>	
					</div>
					<?php endif; ?>
				</div>
				<!-- #Footer bottom section -->
				
				
				<div class="copyright-wrapper">
				<div class="container">
					<div class="copyright-bar">
						<div class="col-md-12 col-sm-12 col-xs-12">
							
							<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'busicorp' ) ); ?>">
								<?php
								/* translators: placeholder replaced with string */
								printf( esc_html__( 'Proudly powered by %s', 'busicorp' ), 'WordPress' );
								?>
							</a>
							<span class="sep"> | </span>
							<?php
							/* translators: placeholder replaced with string */
							printf( esc_html__( 'Theme: %1$s by %2$s.', 'busicorp' ), 'Busicorp', '<a href="' . esc_url( __( 'https://wpazure.com/', 'busicorp' ) ) . '" rel="designer">Wpazure</a>' );
							?>		
				
						</div>
					</div>
				</div>
			</div>
				<!-- End of Footer bottom -->
			</div>
		</footer>
		<!-- FOOTER SECTION END -->
		
	<?php }

}

add_action( 'busicorp_footer', 'busicorp_footer_markup' );

add_filter('get_custom_logo','busicorp_logo_class');


	function busicorp_logo_class($html)
	{
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	return $html;
	}