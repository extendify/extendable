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

		// Register WooCommerce theme features.
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support(
			'woocommerce',
			array(
				'thumbnail_image_width' => 400,
				'single_image_width'    => 600,
			)
		);

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
		if(version_compare( $wp_version, '6.0.2', '<=' )) {
			wp_add_inline_style( 'extendable-style', extendable_backward_compatibilitye_styles() );
		};
	}

endif;

add_action( 'wp_enqueue_scripts', 'extendable_styles' );

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

if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	// This theme does not have a traditional sidebar.
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

	/**
	 * Alter the queue for WooCommerce styles and scripts.
	 *
	 * @since Extendable 1.0.5
	 *
	 * @param array $styles Array of registered styles.
	 *
	 * @return array
	 */
	function extendable_woocommerce_enqueue_styles( $styles ) {
		// Get a theme version for cache busting.
		$theme_version = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;

		// Add Extendable's WooCommerce styles.
		$styles['extendable-woocommerce'] = array(
			'src'     => get_template_directory_uri() . '/assets/css/woocommerce.css',
			'deps'    => '',
			'version' => $version_string,
			'media'   => 'all',
			'has_rtl' => true,
		);

		return apply_filters( 'woocommerce_extendable_styles', $styles );
	}
	add_filter( 'woocommerce_enqueue_styles', 'extendable_woocommerce_enqueue_styles' );
}

if ( ! function_exists( 'extendable_inline_editor_styles' ) ) :

	/**
	 * Enqueue editor styles.
	 *
	 * @since Extendable 1.1.0
	 *
	 * @return void
	 */
	function extendable_inline_editor_styles() {

		// Add editor styles inline.
		global $wp_version;
		if(version_compare( $wp_version, '6.0.2', '<=' )) {
			wp_add_inline_style( 'wp-block-library', extendable_backward_compatibilitye_styles() );
		}
	}

endif;

add_action( 'admin_init', 'extendable_inline_editor_styles' );
if ( ! function_exists( 'extendable_backward_compatibilitye_styles' ) ) :

	/**
	 * Get editor styles.
	 *
	 * @since Extendable 1.1.0
	 *
	 * @return string
	 */
	function extendable_backward_compatibilitye_styles() {

		return "
			/*
			* Alignment styles.
			* These rules are temporary, and should not be relied on or
			* modified too heavily by themes or plugins that build on
			* Twenty Twenty-Two. These are meant to be a precursor to
			* a global solution provided by the Block Editor.
			*
			* Relevant issues:
			* https://github.com/WordPress/gutenberg/issues/35607
			* https://github.com/WordPress/gutenberg/issues/35884
			*/
		
		   .block-editor-block-list__layout.is-root-container > .alignfull,
		   .block-editor-block-list__layout.is-root-container > .alignfull > .alignfull,
		   .is-root-container > .wp-block-group.has-background,
		   .wp-site-blocks .alignfull,
		   .wp-site-blocks > .wp-block-group.has-background,
		   .wp-site-blocks > .wp-block-cover,
		   .wp-site-blocks > .wp-block-template-part > .wp-block-group.has-background,
		   .wp-site-blocks > .wp-block-template-part > .wp-block-cover,
		   body > .is-root-container > .wp-block-cover,
		   body > .is-root-container > .wp-block-template-part > .wp-block-group.has-background,
		   body > .is-root-container > .wp-block-template-part > .wp-block-cover,
		   .is-root-container .wp-block[data-align=\"full\"] {
				margin-right: calc(clamp(1.5rem, 5vw, 2rem) * -1) !important;
				margin-left: calc(clamp(1.5rem, 5vw, 2rem) * -1) !important;
				width: unset;
		   }
		";

	}

endif;