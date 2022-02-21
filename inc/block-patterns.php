<?php
/**
 * Extendable: Block Patterns
 *
 * @since Extendable 1.0
 */

/**
 * Registers block patterns and categories.
 *
 * @since Extendable 1.0
 *
 * @return void
 */
function extendable_register_block_patterns() {
	$block_pattern_categories = array(
		'ext-all' => array( 'label' => __( 'Extendable All', 'extendable' ) ),
		'ext-footer'   => array( 'label' => __( 'Extendable Footers', 'extendable' ) ),
		'ext-header'   => array( 'label' => __( 'Extendable Headers', 'extendable' ) ),
		'ext-query'    => array( 'label' => __( 'Extendable Query', 'extendable' ) ),
		'ext-pages'    => array( 'label' => __( 'Extendable Pages', 'extendable' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since Extendable 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'extendable_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'footer-call-to-action',
		'footer-call-to-action-dark',
		'footer-logo-description-two-nav',
		'footer-logo-nav',
		'footer-offset-heading-buttons',
		'footer-offset-heading-buttons-dark',
		'footer-offset-heading-buttons-primary',
		'header-logo-nav-button',
		'header-logo-nav-social-button',
		'header-logo-tagline-nav-button',
		'header-logo-tagline-social',
		'header-nav-logo-social',
		'header-social-centered-logo-nav-button'
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @since Extendable 1.0
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'extendable_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/inc/patterns/' . $block_pattern . '.php' );

		register_block_pattern(
			'extendable/' . $block_pattern,
			require $pattern_file
		);
	}
}
add_action( 'init', 'extendable_register_block_patterns', 9 );
