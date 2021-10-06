<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Busicorp
 */

get_header();

get_template_part('index','banner'); ?>

<section class="section-padding-100 white-bg" id="site-content">

	<div class="container">
	
		<div class="row">
			<div class="col-lg-<?php echo ( !is_active_sidebar( 'sidebar-1' ) ? '12' :'8' ); ?> col-12">
				<?php if ( have_posts() ) 
				{?>
					<h2 class="page-title search-title mb-4"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'busicorp' ), '<span>' . get_search_query() . '</span>' );?>
					</h2><div class="row"><?php
					
					/* Start the Loop */
					while ( have_posts() ) : the_post();
					
						get_template_part( 'template-parts/content','');
					endwhile;
					the_posts_pagination( array(
						'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
						'next_text'          => '<i class="fa fa-angle-double-right"></i>'
					) );
					
					?></div><?php
				}
				else
				{
					get_template_part( 'template-parts/content', 'none' );
							
				}
				?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer();