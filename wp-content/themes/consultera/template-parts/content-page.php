<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package consultera
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
	<div class="post-inner">
		<?php 
			consultera_post_thumbnail();
		?>
		<div class="post-info">
			
			<div class="entry-content">
				<?php the_content( __('Read More','consultera') ); ?>
				<?php wp_link_pages( ); ?>
			</div>
			
		</div>
		
		<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'consultera' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
	</div>
</article>