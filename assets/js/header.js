(function () {
	'use strict';

	const header = document.querySelector( 'header.wp-block-template-part' );
	if ( ! header ) return;

	new ResizeObserver( function ( entries ) {
		const height = entries[ 0 ].borderBoxSize[ 0 ].blockSize;
		document.documentElement.style.setProperty( '--ext-header-height', height + 'px' );
	} ).observe( header, { box: 'border-box' } );

	const hero = document.querySelector( '.entry-content > .ext-hero-section.ext-hero-section--full-screen:first-child' );
	if ( hero ) {
		new IntersectionObserver( function ( entries ) {
			header.classList.toggle( 'is-past-hero', ! entries[ 0 ].isIntersecting );
		}, { rootMargin: '-50% 0px 0px 0px' } ).observe( hero );
	}

	const topSentinel = document.createElement( 'div' );
	topSentinel.style.cssText = 'position:absolute;top:0;left:0;height:1px;width:1px;pointer-events:none;';
	document.body.prepend( topSentinel );

	new IntersectionObserver( function ( entries ) {
		header.classList.toggle( 'is-scrolled', ! entries[ 0 ].isIntersecting );
	} ).observe( topSentinel );
} )();
