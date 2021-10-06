<?php /**
 * Theme Hook.
 *
 * @package     Consultera
 */
/**
 * Header
 */
 
function consultera_header(){
	do_action( 'consultera_header' );
}
/**
 * Before Header
 */
function consultera_header_before(){
	do_action( 'consultera_header_before' );
}
/**
 * After Header
 */
function consultera_header_after(){
	do_action( 'consultera_header_after' );
}


/**
 * Before primary content
 */
function consultera_content_loop(){
	do_action( 'consultera_content_loop' );
}

/**
 * primary content
 */
function consultera_primary_content_before(){
	do_action( 'consultera_primary_content_before' );
}



/**
 * After primary content
 */
function consultera_primary_content_after(){
	do_action( 'consultera_primary_content_after' );
}

/**
* Before archive content
*/
function consultera_archive_before(){
	do_action( 'consultera_archive_before' );
}

/**
* Archive content 
*/
function consultera_archive_loop(){
	do_action( 'consultera_archive_loop' );
}

/**
* After Archive content 
*/
function consultera_archive_after(){
	do_action( 'consultera_archive_after' );
}


/**
 * Before single
 */
function consultera_single_before(){
	do_action( 'consultera_single_before' );
}

/**
 * single
 */
function consultera_single_loop(){
	do_action( 'consultera_single_loop' );
}

/**
 * After single
 */
function consultera_single_after(){
	do_action( 'consultera_single_after' );
}


/**
 * Before Footer 
 */
function consultera_footer_before(){
	do_action( 'consultera_footer_before' );
}

/**
 * widget Footer 
 */
function consultera_footer(){
	do_action( 'consultera_footer' );
}

/**
 * After Footer 
 */
function consultera_footer_after(){
	do_action( 'consultera_footer_after' );
}

/**
 * Scroll to top button 
 */
function consultera_scroll_to_top(){
	do_action( 'consultera_scroll_to_top' );
}