<?php
/**
 * Extendable functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Extendable
 * @since Extendable 1.0
 */


if ( ! defined( 'EXTENDABLE_THEME_VERSION' ) ) {
	$theme_version = wp_get_theme()->get( 'Version' );
	define( 'EXTENDABLE_THEME_VERSION', is_string( $theme_version ) ? $theme_version : '1.0.0' );
}

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
		wp_register_style(
			'extendable-style',
			get_template_directory_uri() . '/style.css',
			array(),
			EXTENDABLE_THEME_VERSION
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
				EXTENDABLE_THEME_VERSION
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
			EXTENDABLE_THEME_VERSION
		);
	}

	if ( has_block( 'wpforms/form-selector' ) ) {
		wp_enqueue_style(
			'extendable-wpforms-style',
			get_template_directory_uri() . '/assets/css/wpforms.css',
			array(),
			EXTENDABLE_THEME_VERSION
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


/**
 * Enqueue dynamic CSS for primary-foreground duotone filter.
 *
 * Ensure default logo works well on light and dark backgrounds
 *
 * @since Extendable 2.0.11
 *
 * @return void
 */
function extendable_enqueue_dynamic_duotone_css() {
    $theme_json      = WP_Theme_JSON_Resolver::get_merged_data();
    $duotone_presets = $theme_json->get_settings()['color']['duotone']['theme'] ?? [];

    $preset_index = array_search( 'primary-foreground', array_column( $duotone_presets, 'slug' ) );
    $primary_color   = '#000000';
    $foreground_color = '#ffffff';
    if ( false !== $preset_index ) {
        $primary_color   = $duotone_presets[ $preset_index ]['colors'][0];
        $foreground_color = $duotone_presets[ $preset_index ]['colors'][1];
    }
    list( $r, $g, $b ) = array_map( fn( $c ) => hexdec( $c ) / 255, sscanf( $primary_color, "#%02x%02x%02x" ) );
    $css = "
        .wp-block-site-logo img[src*='extendify-demo-'],
		.wp-block-site-logo img[src*='ext-custom-logo-'] {
            filter: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\"><filter id=\"solid-color\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\"0 0 0 0 {$r} 0 0 0 0 {$g} 0 0 0 0 {$b} 0 0 0 1 0\"/></filter></svg>#solid-color') !important;
        }
    ";
    wp_add_inline_style( 'wp-block-library', $css );
}
add_action( 'wp_enqueue_scripts', 'extendable_enqueue_dynamic_duotone_css' );

/**
 * Exclude WooCommerce Templates from the Block Editor When WooCommerce Is Inactive
 *
 * @package Extendable
 * @since Extendable 2.0.21
 */

 function extendable_exclude_wc_block_templates( $templates, $query ) {
	if ( ! class_exists( 'WooCommerce' ) ) {
		$wc_template_slugs = array( 'checkout', 'single-product', 'archive-product' );
		foreach ( $templates as $key => $template ) {
			if ( isset( $template->slug ) && in_array( $template->slug, $wc_template_slugs, true ) ) {
				unset( $templates[ $key ] );
			}
		}
	}
	return $templates;
}
add_filter( 'get_block_templates', 'extendable_exclude_wc_block_templates', 10, 2 );

/**
 * Navigation customizations
 *
 * @package Extendable
 * @since Extendable 2.0.23
 */
if ( ! function_exists( 'extendable_enqueue_navigation_customizations' ) ) :
	/**
	 * Enqueue the JS that fetches logo & site title to customize the mobile navigation.
	 *
	 */
	function extendable_enqueue_navigation_customizations() {

		$logo_id   = get_theme_mod( 'custom_logo' );
    	$logo_url  = $logo_id ? wp_get_attachment_image_url( $logo_id, 'full' ) : '';
    	$site_title = get_bloginfo( 'name' );

		wp_enqueue_script(
			'extendable-navigation_customizations',
			get_template_directory_uri() . '/assets/js/navigation-customization.js',
			array(),   // no dependencies; add 'wp-interactivity' if you switch back to that version
			null,
			true        // load in footer
		);

		wp_localize_script( 'extendable-navigation_customizations', 'ExtendableNavData', 
			array(
        		'logoUrl'   => $logo_url,
        		'siteTitle' => $site_title,
    		) 
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'extendable_enqueue_navigation_customizations' );
