<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Busicorp
 */

get_header();

//Banner
get_template_part('index','banner'); ?>

<section class="section-padding-100 white-bg" id="site-content">

	<div class="container">
	
		<div class="row"><?php 
			
			consultera_single_before(); 
			?>
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
        </div> <?php
		get_sidebar();
			consultera_single_after();?>
			
		</div>
	</div>
</section>
<?php get_footer();