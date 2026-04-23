(function () {
	'use strict';

	const header = document.querySelector( 'header.wp-block-template-part' );
	if ( ! header ) return;

	new ResizeObserver( function ( entries ) {
		const height = entries[ 0 ].borderBoxSize[ 0 ].blockSize;
		document.documentElement.style.setProperty( '--ext-header-height', height + 'px' );
	} ).observe( header, { box: 'border-box' } );
} )();
