<?php 
/**
 * Function to get Single content
 */
if ( ! function_exists( 'consultera_single_markup' ) ) {

	
	function consultera_single_markup() { ?>
		
		<div class="col-lg-<?php echo ( !is_active_sidebar( 'sidebar-1' ) ? '12' :'8' ); ?> col-12">
          <?php if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'single' );

						endwhile;

						//the_posts_navigation();
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
        </div>
      
	    
        <?php get_sidebar();

	} 
}

add_action( 'consultera_single_loop', 'consultera_single_markup' );