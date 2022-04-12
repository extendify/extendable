<?php
/**
 * Extendable functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Extendable
 * @since Extendable 1.0
 */

if ( ! function_exists( 'extendable_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Extendable 1.0
	 *
	 * @return void
	 */
	function extendable_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'extendable_support' );

if ( ! function_exists( 'extendable_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Extendable 1.0
	 *
	 * @return void
	 */
	function extendable_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'extendable-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'extendable-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'extendable_styles' );

/**
 * Registers font families.
 *
 * @since Extendable 1.0
 *
 * @return void
 */
add_action( 'after_setup_theme', function() {
	if ( ! function_exists( 'wp_register_webfonts' ) ) {
		return;
	}
	wp_register_webfonts(
		array(
			array(
				'font-family'  => 'Inter',
				'font-weight'  => '400',
				'font-style'   => 'normal',
				'font-stretch' => 'normal',
				'src'          => array( 'file:./assets/fonts/Inter-VariableFont.ttf' ),
			),
			array(
				'font-family'  => 'Source Serif 4',
				'font-weight'  => '400',
				'font-style'   => 'normal',
				'font-stretch' => 'normal',
				'src'          => array( 'file:./assets/fonts/SourceSerif4-VariableFont.ttf' ),
			),
			array(
				'font-family'  => 'Oswald',
				'font-weight'  => '600',
				'font-style'   => 'normal',
				'font-stretch' => 'normal',
				'src'          => array( 'file:./assets/fonts/Oswald-VariableFont.ttf' ),
			),
		)
	);
} );

/**
 * Registers pattern categories.
 *
 * @since Extendable 1.0
 *
 * @return void
 */
function extendable_register_pattern_categories() {
	$block_pattern_categories = array(
		'extendable-all'     => array( 'label' => __( 'Extendable All', 'extendable' ) ),
		'extendable-footers' => array( 'label' => __( 'Extendable Footers', 'extendable' ) ),
		'extendable-headers' => array( 'label' => __( 'Extendable Headers', 'extendable' ) ),
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

}
add_action( 'init', 'extendable_register_pattern_categories', 9 );
