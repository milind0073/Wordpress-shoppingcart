<?php
get_header();
get_template_part('index','banner');
?>
<!-- Blog & Sidebar Section -->
<section class="section-padding" id="site-content">
	<div class="container">
		<div class="row">	
			<!--Blog Section-->
			<div class="col-lg-<?php echo ( !is_active_sidebar( 'woocommerce' ) ? '12' :'8' ); ?> col-12">
		        <div class="site-content">
			     <?php woocommerce_content(); ?>
			    </div>
            </div>				
			<!--/Blog Section-->
			<?php get_sidebar('woocommerce'); ?>
		</div>
	</div>
</section>
<!-- /Blog Section with Sidebar -->
<?php get_footer();