<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Consultera
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
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
				</div>
				
			</div>
		</div>
	</div>
 </div>
 
<section class="section-padding-100 white-bg" id="site-content">

	<div class="container">
	
		<div class="row"><?php 
		
			consultera_archive_before(); 
			consultera_archive_loop(); 
			consultera_archive_after();?>
			
		</div>
		
	</div>
	
</section>
<?php get_footer();