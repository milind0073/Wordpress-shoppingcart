<?php
$background_image = get_theme_support( 'custom-header', 'default-image' );

if ( has_header_image() ) {
  $background_image = get_header_image();
}
?>
<div class="breadcrumb-section" style="background-image: url(<?php echo esc_url( $background_image ); ?>);">
	<div class="d-table">
		<div class="d-table-cell">
			<div class="container">
				<div class="breadcrumb-title text-center">
					<h1>
						<?php the_title(); ?>
					</h1>
				</div>
				
			</div>
		</div>
	</div>
 </div>