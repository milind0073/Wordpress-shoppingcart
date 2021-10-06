<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Consultera
 */

get_header();
$background_image = get_theme_support( 'custom-header', 'default-image' );
if ( has_header_image() ) {
  $background_image = get_header_image(); 
  }

?>
<div class="breadcrumb-section" style="background-image: url(<?php echo esc_url( $background_image ); ?>)">
  			<div class="d-table">
  				<div class="d-table-cell">
  					<div class="container">
  						<div class="breadcrumb-title text-center">
      						<h1>
          						<?php esc_html_e('404 Not Found','consultera');?>
          					</h1>
      					</div>
      					
  					</div>
  				</div>
  			</div>
  		</div>
		<!-- BREADCRUMB SECTION END -->
		<section class="section-padding-100 white-bg page-404" id="site-content">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="text-center">
	                        <h2 class="heading-404">
	                            <span><?php esc_html_e('4','consultera');?></span>
	                            <span class="text-blue">0</span>
	                            <span><?php esc_html_e('4','consultera');?></span>
	                        </h2>
	                        <h3><?php esc_html_e('Sorry, Page not found','consultera');?></h3>
	                        <a href="<?php echo esc_url(home_url());?>" class="default-button bg-blue button-lg effect-1 mt-4">
								<span class="btn-text"><?php esc_html_e('Back to Home','consultera');?></span>
							</a>
	                    </div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- CONTENT AREA END -->
<?php
get_footer();
?>