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
 * @package consultera
 */

get_header(); 

// breadcrumb section
get_template_part('index','banner');?>

<section class="section-padding-100 white-bg" id="site-content">

	<div class="container">
	
		<div class="row">
			<?php if(class_exists( 'WooCommerce' )){
			
			if( is_account_page() || is_cart() || is_checkout() ) {
							echo '<div class="col-lg-'.( !is_active_sidebar( "woocommerce" ) ?"12" :"8" ).' col-12">'; 
					}
					else{ 
					echo '<div class="col-lg-'.( !is_active_sidebar( "sidebar-1" ) ? "12" :"8" ).' col-12">';
					}
			
			} else {
			
				echo '<div class="col-lg-'.( !is_active_sidebar( "sidebar-1" ) ? "12" :"8" ).' col-12">';
				
			}
				if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'page' );
						
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					endwhile;
					
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif; ?>
			</div>
			<?php 
			
			if ( class_exists( 'WooCommerce' ) ) {
					
					if( is_account_page() || is_cart() || is_checkout() ) {
							get_sidebar('woocommerce'); 
					}
					else{ 
					get_sidebar(); 
					}
					
				} else {
					
				get_sidebar();	
				}
			
			 ?>
		</div>
	</div>
</section>
<?php get_footer();