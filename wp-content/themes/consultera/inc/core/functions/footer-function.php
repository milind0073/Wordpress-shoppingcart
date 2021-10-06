<?php 
/**
 * Function to get site Footer
 */
if ( ! function_exists( 'consultera_footer_markup' ) ) {

	/**
	 * Site Footer - <footer>
	 */
	function consultera_footer_markup() { ?>
		
		<!-- FOOTER SECTION START -->
		<footer class="main-footer">
			<div class="container">
				<div class="row">
					<?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
					<div class="col-md-4 col-12">
						<?php dynamic_sidebar( 'footer-widget-1' ); ?>	
					</div>
					<?php endif; 
					if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
					<div class="col-md-4 col-12">
						<?php dynamic_sidebar( 'footer-widget-2' ); ?>	
					</div>
					<?php endif; 
					if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
					<div class="col-md-4 col-12">
						<?php dynamic_sidebar( 'footer-widget-3' ); ?>	
					</div>
					<?php endif; ?>
				</div>
				<!-- #Footer bottom section -->
				
				
				<div class="copyright-wrapper">
				<div class="container">
					<div class="copyright-bar">
						<div class="col-md-12 col-sm-12 col-xs-12">
							
							<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'consultera' ) ); ?>">
								<?php
								/* translators: placeholder replaced with string */
								printf( esc_html__( 'Proudly powered by %s', 'consultera' ), 'WordPress' );
								?>
							</a>
							<span class="sep"> | </span>
							<?php
							/* translators: placeholder replaced with string */
							printf( esc_html__( 'Theme: %1$s by %2$s.', 'consultera' ), 'Consultera', '<a href="' . esc_url( __( 'https://wpazure.com/', 'consultera' ) ) . '" rel="designer">Wpazure</a>' );
							?>		
				
						</div>
					</div>
				</div>
			</div>
				<!-- End of Footer bottom -->
			</div>
		</footer>
		<!-- FOOTER SECTION END -->
		
	<?php }

}

add_action( 'consultera_footer', 'consultera_footer_markup' );