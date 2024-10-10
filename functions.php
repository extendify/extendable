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

		global $wp_version;
		// Add style for WordPress older versions.
		if ( version_compare( $wp_version, '6.0.2', '<=' ) ) {
			$editor_style = array(
				'style.css',
				'/assets/css/deprecate-style.css',
			);
		} else {
			$editor_style = 'style.css';
		}
		// Enqueue editor styles.
		add_editor_style( $editor_style );
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

		global $wp_version;
		if ( version_compare( $wp_version, '6.0.2', '<=' ) ) {
			// Register deprecate stylesheet.
			wp_register_style(
				'extendable-deprecate-style',
				get_template_directory_uri() . '/assets/css/deprecate-style.css',
				array(),
				$version_string
			);
			// Enqueue deprecate stylesheet.
			wp_enqueue_style( 'extendable-deprecate-style' );
		}
	}

endif;

add_action( 'wp_enqueue_scripts', 'extendable_styles' );

/**
 * Enqueue block-specific styles.
 *
 * @since Extendable 2.0.11
 *
 * @return void
 */
function extendable_enqueue_block_styles() {
	// Check for specific blocks and enqueue their styles
	if ( has_block( 'contact-form-7/contact-form-selector' ) ) {
		wp_enqueue_style(
			'extendable-contact-form-7-style',
			get_template_directory_uri() . '/assets/css/contact-form-7.css',
			array(),
			'1.0.0'
		);
	}

	if ( has_block( 'wpforms/form-selector' ) ) {
		wp_enqueue_style(
			'extendable-wpforms-style',
			get_template_directory_uri() . '/assets/css/wpforms.css',
			array(),
			'1.0.0'
		);
	}
}

add_action( 'enqueue_block_assets', 'extendable_enqueue_block_styles' );

/**
 * Registers pattern categories.
 *
 * @since Extendable 1.0
 *
 * @return void
 */
function extendable_register_pattern_categories() {
	$block_pattern_categories = array(
		'header' => array( 'label' => __( 'Headers', 'extendable' ) ),
		'footer' => array( 'label' => __( 'Footers', 'extendable' ) ),
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

function extendable_replace_custom_variation( $response, $_server, $request ) {
	$extendable_variations_route = '/wp/v2/global-styles/themes/extendable/variations';

	// Here we make sure the code only runs when we are asking specifically
	// for Extendable's variations.
	if ( $request->get_route() !== $extendable_variations_route ) {
		return $response;
	}

	// We get the Custom variation saved in the database.
	$extendable_custom_variation_string = get_option( 'extendable_custom_variation', null );

	// If no Custom variation is stored in the database, we return the response as it is.
	if ( $extendable_custom_variation_string === null ) {
		return $response;
	}

	$extendable_custom_variation_json = json_decode( $extendable_custom_variation_string, true );

	// If the content from the database is not valid JSON, we return the response as it is.
	if ( ! $extendable_custom_variation_json ) {
		return $response;
	}

	// We parse the the content from the custom variation and transform it into the shape
	// that is expected by WordPress.
	$extendable_custom_variation = ( new WP_Theme_JSON_Data( $extendable_custom_variation_json, 'theme' ) )->get_data();

	// We append our custom variation at the start of the variations array.
	$data = $response->get_data();
	array_unshift( $data, $extendable_custom_variation );
	$response->set_data( $data );

	return $response;
}

add_filter( 'rest_post_dispatch', 'extendable_replace_custom_variation', 10, 3 );
