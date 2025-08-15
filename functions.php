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
 * Add primary-foreground duotone to extendify demo Site Logo block.
 * 
 * @param array $parsed_block Parsed block data.
 * @return array Filtered block data.
 */
function extendable_add_duotone_to_extendify_demo_site_logo( array $parsed_block ) : array {

	if ( 'core/site-logo' !== $parsed_block['blockName'] ) {
		return $parsed_block;
	}

	$logo_url = $parsed_block['attrs']['url'] ?? '';

	if ( '' === $logo_url ) {
		$logo_id  = (int) get_theme_mod( 'custom_logo' );
		$logo_url = $logo_id ? wp_get_attachment_url( $logo_id ) : '';
	}

	if ( '' === $logo_url ) {
		return $parsed_block;
	}

	$logo_file        = wp_basename( $logo_url );
	$allowed_prefixes = array( 'extendify-demo-', 'ext-custom-logo-' );

	$matches = false;
	foreach ( $allowed_prefixes as $prefix ) {
		if ( function_exists( 'str_starts_with' ) ) {
			$matches = str_starts_with( $logo_file, $prefix );
		} else {
			$matches = 0 === strpos( $logo_file, $prefix );
		}
		if ( $matches ) {
			break;
		}
	}

	if ( ! $matches ) {
		return $parsed_block;
	}

	$parsed_block['attrs']['style']['color']['duotone'] =
		'var:preset|duotone|primary-foreground';

	return $parsed_block;
}
add_filter( 'render_block_data', 'extendable_add_duotone_to_extendify_demo_site_logo', 10 );

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

/**
 * Set default template for new pages in the block editor (auto-drafts)
 *
 * @since Extendable 2.0.26
 * @return void
 */
function extendable_set_default_template_for_auto_drafts( WP_REST_Response $response, WP_Post $post ) {

	if ( 'page' !== $post->post_type ) {
		return $response;
	}
	
	if ( 'auto-draft' !== $post->post_status ) {
		return $response;
	}

	$current_template = isset( $response->data['template'] ) ? $response->data['template'] : '';

	if ( ! empty( $current_template ) && 'page' !== $current_template ) {
		return $response;
	}

	$response->data['template'] = 'page-with-title';

	return $response;
}
add_filter( 'rest_prepare_page', 'extendable_set_default_template_for_auto_drafts', 10, 2 );
 
/**
 * Set default template for new pages when saved/published
 *
 * @since Extendable 2.0.28
 * @param int     $post_id Post ID.
 * @param WP_Post $post    Post object.
 * @param bool    $update  Whether this is an existing post being updated.
 * @return void
 */
function extendable_set_default_template_for_new_pages( $post_id, $post, $update ) {

	if ( 'page' !== $post->post_type ) {
		return;
	}

	if ( $update ) {
		return;
	}

	if ( 'revision' === $post->post_status ) {
		return;
	}

	$current_template = get_page_template_slug( $post_id );
    
	// If no template is set or it's the default template, set our default
	if ( empty( $current_template ) || 'page' === $current_template ) {
		update_post_meta( $post_id, '_wp_page_template', 'page-with-title' );
	}
}
add_action( 'wp_insert_post', 'extendable_set_default_template_for_new_pages', 10, 3 );
