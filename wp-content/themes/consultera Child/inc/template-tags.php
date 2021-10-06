<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Consultera
 */

 
 
/**
 * Site branding
 */
if ( !function_exists( 'consultera_site_branding' ) ) {
	function consultera_site_branding()
	{
		if ( has_custom_logo() ) :
				the_custom_logo();
		else : ?>
			<div class="site-branding-text">
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?>
					</a>
				</h1>
			<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo esc_html($description); ?></p><?php 
				endif;?>
			</div>
			<?php
		
		endif;
	}
}
/**
* Blog post meta date */
 
if ( ! function_exists( 'consultera_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function consultera_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		

		$posted_on = '<li class="posted-on"><i class="fa fa-clock-o" aria-hidden="true"></i><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></li>';

		echo  $posted_on ;
	}
endif;


/**
* Blog post meta post by 
*/
if ( ! function_exists( 'consultera_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function consultera_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'consultera' ),
			'<a class="author" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
		);

		echo '<li class="post-author"> <i class="fa fa-user" aria-hidden="true"></i>' . $byline . '</li>'; // WPCS: XSS OK.
	}
endif;

/**
* Blog post featured image 
*/
if ( ! function_exists( 'consultera_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function consultera_post_thumbnail() {
				
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}
	if ( is_singular() ) :
	?>
	<div class="post-img">
		<?php the_post_thumbnail( 'consultera-720' ); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>
	<div class="post-img">
		<a  href="<?php the_permalink(); ?>" class="post-thumbnail" aria-hidden="true">
			<?php
				the_post_thumbnail( '', array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) ),
					'class' => 'img-fluid mx-auto',
					
				) );
			?>
		</a>
	</div>

	<?php endif; // End is_singular().
}
endif;



/**
 * All categories
 */
if ( ! function_exists( 'consultera_all_categories' ) ) :
function consultera_all_categories() {
	$Separate_meta = ', ';
	$categories_list = get_the_category_list($Separate_meta);

	if ( $categories_list ) {
		echo '<div class="post-category"> ' . $categories_list . '</div>';
	}
}
endif;

/**
 * Get the comments
 */

if ( ! function_exists( 'consultera_get_comments_number' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function consultera_get_comments_number() {
		
		echo '<li class="post-comment"> <i class="fa fa-comment-o" aria-hidden="true"></i>';
	$comment_count = get_comments_number();
	if ( '1' === $comment_count ) {
		esc_html_e( '1 comment', 'consultera' );
	} else {
		printf( // WPCS: XSS OK.
			/* translators: 1: comment count number, 2: title. */
			esc_html( _nx( '%1$s comment', '%1$s comments', $comment_count, 'comments title', 'consultera' ) ),
			number_format_i18n( $comment_count )
		);
	}
	echo '</li>';
		
	}
endif;

if ( ! function_exists( 'consultera_get_tags' ) ) :
function consultera_get_tags(){
	
/* translators: used between list items, there is a space after the comma */
	$tag_list = get_the_tag_list();
	if ( $tag_list ) {
	echo '<li class="ce-tags"> <i class="fa fa-tags" aria-hidden="true"></i>' . $tag_list .'</li>';
	}
}
endif;