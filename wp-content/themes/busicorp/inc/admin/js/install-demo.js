/**
 * Install Wpazure kit
 
 */

/* global busicorp_install_demo */

'use strict';

// Activate plugin.
var busicorpActivatePlugin = function( url, redirect ) {
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
var busicorpinstallPlugin = function() {
	var installBtn = document.querySelector( '.busicorp-install-demo' );
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
					t.innerHTML = busicorp_install_demo.activating + '...';
					busicorpActivatePlugin( url, redirect );
				}
			}
		);
	} );
}

// Activate plugin manual.
var busicorpHandleActivate = function() {
	var activeButton = document.querySelector( '.busicorp-active-now' );
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

		busicorpActivatePlugin( url, redirect );
	} );
}

document.addEventListener( 'DOMContentLoaded', function() {
	busicorpinstallPlugin();
	busicorpHandleActivate();
} );
