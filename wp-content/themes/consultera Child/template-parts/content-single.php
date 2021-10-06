<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package consultera
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
<div class="post-wrapper">
		<div class="post-thumb"> <?php 
			consultera_post_thumbnail();
			consultera_all_categories(); ?>
		</div>
		<div class="post-meta">
			<ul>
				<ul>
				<?php consultera_posted_by();
				consultera_get_comments_number();
				consultera_posted_on(); ?>
			</ul>
			</ul>
		</div>
		<article class="post-info">
			<header class="entry-header">
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
				</h1>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			
		</article>
	</div>
</div>