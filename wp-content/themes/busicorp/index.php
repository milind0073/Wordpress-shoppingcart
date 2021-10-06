<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Busicorp
 */
get_header();
$background_image = get_theme_support( 'custom-header', 'default-image' );

if ( has_header_image() ) {
  $background_image = get_header_image();
}
?>
	<div class="breadcrumb-section" style="background-image: url(<?php echo esc_url( $background_image ); ?>);">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="breadcrumb-title text-center">
						<h1>
							<?php $our_title = get_the_title( get_option('page_for_posts', true) );
										echo esc_html($our_title); ?>
						</h1>
					</div>
					
				</div>
			</div>
		</div>
	</div>
<section class="section-padding-100 white-bg" id="site-content">

	<div class="container">
	
		<div class="row">
		
		
		<div class="col-lg-<?php echo ( !is_active_sidebar( 'sidebar-1' ) ? '12' :'8' ); ?> col-12">
		<div class="row">
          <?php 
    		  if ( have_posts() ) {
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content','');
						endwhile;
						the_posts_pagination( array(
							'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
							'next_text'          => '<i class="fa fa-angle-double-right"></i>'
						) );
					}else {
						
						get_template_part( 'template-parts/content', 'none' );
						
					}
					?>
          </div>
		  </div>
		  <?php get_sidebar(); ?>
        </div>
		
	</div>
	
</section>
<?php get_footer();
