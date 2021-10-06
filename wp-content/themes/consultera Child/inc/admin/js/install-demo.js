/**
 * Install Wpazure kit
 
 */

/* global consultera_install_demo */

'use strict';

// Activate plugin.
var consultEraActivatePlugin = function( url, redirect ) {
	if ( 'undefined' === typeof( url ) || ! url ) {
		return;
	}

	var request = new Request(
		url,
		{
			method: 'GET',
			credentials: 'same-origin',
			headers: new Headers({
				'Content-Type': 'text/xml'
			})
		}
	);

	fetch( request )
		.then( function( data ) {
			location.reload();
		} )
		.catch( function( error ) {
			console.log( error );
		} );
}

// Download and Install plugin.
var consultErainstallPlugin = function() {
	var installBtn = document.querySelector( '.consultera-install-demo' );
	if ( ! installBtn ) {
		return;
	}

	installBtn.addEventListener( 'click', function( e ) {
		e.preventDefault();

		var t        = this,
			url      = t.getAttribute( 'href' ),
			slug     = t.getAttribute( 'data-slug' ),
			redirect = t.getAttribute( 'data-redirect' );

		t.innerHTML = wp.updates.l10n.installing;

		t.classList.add( 'updating-message' );
		wp.updates.installPlugin(
			{
				slug: slug,
				success: function () {
					t.innerHTML = consultera_install_demo.activating + '...';
					consultEraActivatePlugin( url, redirect );
				}
			}
		);
	} );
}

// Activate plugin manual.
var consultEraHandleActivate = function() {
	var activeButton = document.querySelector( '.consultera-active-now' );
	if ( ! activeButton ) {
		return;
	}

	activeButton.addEventListener( 'click', function( e ) {
		e.preventDefault();

		var t        = this,
			url      = t.getAttribute( 'href' ),
			redirect = t.getAttribute( 'data-redirect' );

		t.classList.add( 'updating-message' );
		t.innerHTML = consultera_install_demo.activating + '...';

		consultEraActivatePlugin( url, redirect );
	} );
}

document.addEventListener( 'DOMContentLoaded', function() {
	consultErainstallPlugin();
	consultEraHandleActivate();
} );
