<?php
/**
 * Function to get site Header
 */
if ( ! function_exists( 'consultera_header_markup' ) ) {

	function consultera_header_markup() {
	
	?>
		
		<!-- top bar -->
	<header class="site-header header-style-2 dark-version">
			<!-- middle header -->
			<div class="main-header-wrapper navbar-expand-lg">
				<div class="main-header clearfix">
					<?php if ( is_active_sidebar( 'top-header-left' ) || is_active_sidebar( 'top-header-right' )) { ?>
						<div class="top-bar">
							<div class="container">
								<div class="row d-flex justify-content-between">
								<?php if ( is_active_sidebar( 'top-header-left' ) ) { ?>
									<div class="col-sm-6 col-12 ce-top-bar-left">
										<?php dynamic_sidebar( 'top-header-left'); ?>
									</div>
								<?php } 
									if ( is_active_sidebar( 'top-header-right' ) ) { ?>
									<div class="col-sm-6 col-12 ce-top-bar-right">
										<?php dynamic_sidebar( 'top-header-right'); ?>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php }  ?>
		<!-- middle header -->
		
		
		<!-- main header END -->
		<div class="main-bar-wraper">
			<div class="container clearfix">
			<?php  if ( display_header_text() ) : ?>
									<div class="ce-logo">
										<?php consultera_site_branding(); ?>
										
									</div>
									<?php endif;?>
									
									<div class="menu-area">
										<button class="navbar-toggler justify-content-end collapsed" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
											<span class="fa fa-bars" aria-hidden="true"></span>
										</button>
										
										
										
										</div>
										<nav class="navbar-collapse collapse mainmenu justify-content-end" id="navbarNavDropdown">
											<?php
												   wp_nav_menu(
												array(
													'theme_location'  => 'primary',
													'container'  => 'nav-collapse collapse navbar-inverse-collapse',
													'menu_class' => 'nav navbar-nav',
													'fallback_cb'     => 'Consultera_Bootstrap_Navwalker::fallback',
													'walker'          => new Consultera_Bootstrap_Navwalker(),
												)
											);
										?>
										</nav>
										
									</div>
		</div>
		</div>
		</div>
	</header>
	<!-- HEADER END -->
	
		
	<?php }
} 
add_action( 'consultera_header', 'consultera_header_markup' );