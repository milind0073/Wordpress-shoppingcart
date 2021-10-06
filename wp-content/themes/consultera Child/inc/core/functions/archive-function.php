<?php 
/**
 * Function to get archive markup
 */
if ( ! function_exists( 'consultera_archive_markup' ) ) {

	
	function consultera_archive_markup() { ?>
		<div class="col-lg-<?php echo ( !is_active_sidebar( 'sidebar-1' ) ? '12' :'8' ); ?> col-12">
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
      
	    
        <?php get_sidebar();

	} 
}

add_action( 'consultera_archive_loop', 'consultera_archive_markup' );