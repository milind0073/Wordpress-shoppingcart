<header class="site-header header-style-2 dark-version">
		<!-- middle header -->
		<div class="main-header-wrapper navbar-expand-lg">
			<div class="main-header clearfix">
				<!-- top bar -->
				<?php if ( is_active_sidebar( 'top-header-left' ) || is_active_sidebar( 'top-header-right' )) { ?>
				<div class="top-bar">
					<div class="container">
						<div class="row d-flex justify-content-between">
						
						<?php if ( is_active_sidebar( 'top-header-left' ) ) { ?>
									<div class="col-sm-4 col-12 ce-top-bar-left">
										<?php dynamic_sidebar( 'top-header-left'); ?>
									</div>
								<?php } 
									if ( is_active_sidebar( 'top-header-right' ) ) { ?>
									<div class="col-sm-4 col-12 ce-top-bar-right">
										<?php dynamic_sidebar( 'top-header-right'); ?>
									</div>
									<?php } 
							
							
							if ( is_active_sidebar( 'top-header-social' ) ) { ?>
									<div class="col-sm-4 col-12 ce-top-bar-right">
										<?php dynamic_sidebar( 'top-header-social'); ?>
									</div>
									<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<div class="sticky-header">
					<div class="container clearfix">
						<div class="ce-logo">
							<?php consultera_site_branding(); ?>
						</div>
						
						<div class="menu-area">
							<div class="d-flex justify-content-end align-items-center">
								<button class="navbar-toggler justify-content-end collapsed" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'busicorp' ); ?>">
				                    <span class="fa fa-bars" aria-hidden="true"></span>
				                </button>
				                <ul class="extra-nav d-block d-lg-none">
		                            <li>
		                                <a href="#" data-toggle="modal" data-target="#searchModal">
		                                    <i class="fa fa-search" aria-hidden="true"></i>
		                                </a>
		                            </li>
									
									
									<?php if ( class_exists( 'WooCommerce' ) ) { ?>
									  <li class="nav-cart">
										<a id="shopping-cart"  href="<?php echo wc_get_cart_url(); ?>" ><span><?php echo WC()->cart->get_cart_contents_count(); ?></span><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
										</li>
										<?php } ?>
									
		                        </ul>
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
			                    <ul class="extra-nav d-none d-lg-block">
		                            <li>
		                                <a href="#" data-toggle="modal" data-target="#searchModal">
		                                    <i class="fa fa-search" aria-hidden="true"></i>
		                                </a>
		                            </li>
									<?php if ( class_exists( 'WooCommerce' ) ) { ?>
		                            <li>
		                                <a href="javascript:void(0);" class="nav-cart">
		                                    <span><?php echo WC()->cart->get_cart_contents_count(); ?></span>
		                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
		                                </a>
		                            </li>
									<?php } ?>
		                        </ul>
				            </nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- main header END -->
	</header>
	<!-- SEARCH MODAL START -->
	<div class="modal fade right searchModal" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog-full-width modal-dialog" role="document">
	        <div class="modal-content-full-width modal-content">
            	<button type="button" class="close" data-dismiss="modal" aria-label="<?php esc_attr_e( 'Close', 'busicorp' ); ?>">
                    <span aria-hidden="true">×</span>
                </button>
	          	<div class="modal-body">
	          		<h2><?php _e('Search your query here','busicorp');?> </h2>
	            	<div class="search-box">
	            		<form role="search" class="search-form" action="<?php echo esc_url(home_url('/'));?>">
							<input type="text" name="s" class="form-control" placeholder="<?php esc_attr_e("Enter your keyword here...","busicorp");?>">
					      	<button type="submit">
					      		<i class="fa fa-search"></i>
					      	</button>
					    </form>
	            	</div>
	          	</div>
	        </div>
	    </div>
    </div>
	<?php

