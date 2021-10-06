<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package consultera
 */

get_header();

//Banner
get_template_part('index','banner'); ?>

<section class="section-padding-100 white-bg" id="site-content">

	<div class="container">
	
		<div class="row"><?php 
			
			consultera_single_before(); 
			consultera_single_loop(); 
			consultera_single_after();?>
			
		</div>
	</div>
</section>
<?php get_footer();