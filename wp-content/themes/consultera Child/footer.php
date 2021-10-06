<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package consultera
 */

get_sidebar( 'footer' );

consultera_scroll_to_top();
 wp_footer(); ?>
 </div>
</div>
</body>
<!-- SCROLL TO TOP SECTION -->
<a href="#" class="scroll-to-top"> 
	<div class="tooltip-text">
		<span><?php _e('Back To Top','consultera');?></span>
	</div>
	<div class="top-arrow"></div>
	<div class="bottom-line"></div>
</a>
</html>