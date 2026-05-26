(function () {
	'use strict';

	const header = document.querySelector( 'header.wp-block-template-part' );
	if ( ! header ) return;

	// Temporary: when our header is rendered inside a wrapping template part
	// that opts in by carrying .ext-header-wrapper (e.g. no-title-sticky-
	// header.html in the agent plugin), strip the overlay-system classes so
	// none of our CSS rules fire — the outer wrapper handles layout natively.
	// Remove once the upstream template stops wrapping.
	if ( header.closest( '.ext-header-wrapper' ) ) {
		const overlay = header.querySelector( '.ext-header-overlay' );
		if ( overlay ) {
			overlay.classList.remove(
				'ext-header-overlay',
				'ext-header-glass',
				'ext-header-sticky',
				'ext-header-sticky--floating-pill',
				'ext-header--dark'
			);
		}
	}

	const findHero = () => document.querySelector(
		'.entry-content > .ext-hero-section.ext-hero-section--full-screen:first-child'
	);

	new ResizeObserver( function ( entries ) {
		document.documentElement.style.setProperty(
			'--ext-header-height',
			entries[ 0 ].borderBoxSize[ 0 ].blockSize + 'px'
		);
	} ).observe( header, { box: 'border-box' } );

	// Normal mode: IntersectionObservers against the viewport.
	// Original behavior, preserved for real frontend pages.
	const setupNormal = () => {
		const hero = findHero();
		let heroObs;
		if ( hero ) {
			heroObs = new IntersectionObserver( function ( entries ) {
				header.classList.toggle( 'is-past-hero', ! entries[ 0 ].isIntersecting );
			}, { rootMargin: '-50% 0px 0px 0px' } );
			heroObs.observe( hero );
		}

		const sentinel = document.createElement( 'div' );
		sentinel.style.cssText = 'position:absolute;top:0;left:0;height:16px;width:1px;pointer-events:none;';
		document.body.prepend( sentinel );

		const scrollObs = new IntersectionObserver( function ( entries ) {
			header.classList.toggle( 'is-scrolled', ! entries[ 0 ].isIntersecting );
		} );
		scrollObs.observe( sentinel );

		return () => {
			heroObs?.disconnect();
			scrollObs.disconnect();
			sentinel.remove();
		};
	};

	// Agent mode: rAF-throttled scroll/resize listener with CSS-pixel math.
	// The agent's transform: scale() on .wp-site-blocks breaks
	// IntersectionObserver geometry, but offsetTop / offsetHeight / scrollTop
	// are unaffected by transforms — stable at any scale.
	const setupAgent = ( root ) => {
		let rafId = 0;
		const update = () => {
			rafId = 0;
			header.classList.toggle( 'is-scrolled', root.scrollTop > 0 );
			const hero = findHero();
			if ( ! hero ) return;
			const heroBottom = hero.offsetTop + hero.offsetHeight;
			header.classList.toggle( 'is-past-hero', root.scrollTop > heroBottom );
		};
		const schedule = () => {
			if ( rafId ) return;
			rafId = requestAnimationFrame( update );
		};

		root.addEventListener( 'scroll', schedule, { passive: true } );
		window.addEventListener( 'resize', schedule, { passive: true } );
		update();

		return () => {
			if ( rafId ) cancelAnimationFrame( rafId );
			root.removeEventListener( 'scroll', schedule );
			window.removeEventListener( 'resize', schedule );
		};
	};

	let teardown;
	const setup = ( root ) => {
		teardown?.();
		teardown = root ? setupAgent( root ) : setupNormal();
	};

	setup( null );

	// Optional integration: if the Extendify Agent is active it dispatches
	// extendify-agent:layout-shift on open/close (see useLayoutShift in
	// SidebarLayout.jsx). When the agent isn't installed this listener is
	// simply never invoked — the file works standalone with normal-mode
	// IntersectionObservers, identical to its original behavior.
	window.addEventListener( 'extendify-agent:layout-shift', function ( event ) {
		const open = event?.detail?.open;
		const root = open ? document.querySelector( '.wp-site-blocks' ) : null;
		// Wait one frame so the agent's transform / overflow changes commit
		// before we attach handlers and read geometry.
		requestAnimationFrame( () => setup( root ) );
	} );
} )();
