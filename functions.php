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
		if ( class_exists( 'WooCommerce' ) ) {
			$editor_style = array_merge( (array) $editor_style, array( 'assets/css/woocommerce.css' ) );
		}
		if ( class_exists( 'Masteriyo\Masteriyo' ) ) {
			$editor_style = array_merge( (array) $editor_style, array( 'assets/css/masteriyo.css' ) );
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

		if ( class_exists( 'WooCommerce' ) ) {
			wp_enqueue_style(
				'extendable-woocommerce-style',
				get_template_directory_uri() . '/assets/css/woocommerce.css',
				array( 'extendable-style' ),
				EXTENDABLE_THEME_VERSION
			);
		}

		if ( class_exists( 'Masteriyo\Masteriyo' ) ) {
			// Masteriyo enqueues its own CSS late; without this dependency it overrides ours.
			wp_enqueue_style(
				'extendable-masteriyo-style',
				get_template_directory_uri() . '/assets/css/masteriyo.css',
				array( 'extendable-style', 'masteriyo-public' ),
				EXTENDABLE_THEME_VERSION
			);
			extendable_masteriyo_settable_colors();
		}

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

if ( ! function_exists( 'extendable_masteriyo_settable_map' ) ) :

	/**
	 * Reads masteriyo-settable-colors.json once per request.
	 *
	 * @since Extendable 2.2.1
	 *
	 * @return array
	 */
	function extendable_masteriyo_settable_map() {
		static $settings = null;
		if ( null !== $settings ) {
			return $settings;
		}

		$settings = array();
		$map_path = get_template_directory() . '/assets/css/masteriyo-settable-colors.json';
		if ( ! is_readable( $map_path ) ) {
			return $settings;
		}

		$map = wp_json_file_decode( $map_path, array( 'associative' => true ) );
		if ( ! empty( $map['settings'] ) && is_array( $map['settings'] ) ) {
			$settings = $map['settings'];
		}

		return $settings;
	}

endif;

if ( ! function_exists( 'extendable_masteriyo_settings_at_factory' ) ) :

	/**
	 * Settings from masteriyo-settable-colors.json still at Masteriyo's factory value.
	 *
	 * @since Extendable 2.2.1
	 *
	 * @return array
	 */
	function extendable_masteriyo_settings_at_factory() {
		if ( ! function_exists( 'masteriyo_get_setting' ) || ! function_exists( 'masteriyo_get_default_settings' ) || ! function_exists( 'masteriyo_array_get' ) ) {
			return array();
		}

		$defaults   = masteriyo_get_default_settings();
		$at_factory = array();

		foreach ( extendable_masteriyo_settable_map() as $setting ) {
			if ( empty( $setting['key'] ) ) {
				continue;
			}
			$current = masteriyo_get_setting( $setting['key'] );
			$factory = masteriyo_array_get( $defaults, $setting['key'] );
			if ( strtolower( trim( (string) $current ) ) === strtolower( trim( (string) $factory ) ) ) {
				$at_factory[] = $setting;
			}
		}

		return $at_factory;
	}

endif;

if ( ! function_exists( 'extendable_masteriyo_settable_colors' ) ) :

	/**
	 * Gives each Masteriyo colour setting our palette token while it still holds Masteriyo's
	 * factory value, so a colour the site owner picked always wins.
	 *
	 * @since Extendable 2.2.1
	 *
	 * @return void
	 */
	function extendable_masteriyo_settable_colors() {
		$css = extendable_masteriyo_settable_css();

		if ( '' !== $css ) {
			wp_add_inline_style( 'extendable-masteriyo-style', $css );
		}
	}

endif;

if ( ! function_exists( 'extendable_masteriyo_settable_css' ) ) :

	/**
	 * The :root rule of default-setting colours, for the front end and the editor canvas alike.
	 *
	 * @since Extendable 2.2.1
	 *
	 * @return string The rule, or an empty string when every colour setting has been changed.
	 */
	function extendable_masteriyo_settable_css() {
		$css = '';
		foreach ( extendable_masteriyo_settings_at_factory() as $setting ) {
			foreach ( (array) ( $setting['vars'] ?? array() ) as $var ) {
				$css .= "\t{$var['name']}: {$var['token']};\n";
			}
		}

		return '' === $css ? '' : ":root {\n{$css}}";
	}

endif;

if ( ! function_exists( 'extendable_masteriyo_editor_styles' ) ) :

	/**
	 * Masteriyo's editor stylesheet loads after the theme's and resets its colours to blue, so the
	 * canvas gets ours again, one step more specific.
	 *
	 * @since Extendable 2.2.1
	 *
	 * @return void
	 */
	function extendable_masteriyo_editor_styles() {
		if ( ! is_admin() ) {
			return;
		}

		$css  = '';
		$file = get_template_directory() . '/assets/css/masteriyo.css';
		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- A file inside this theme, not a URL.
		if ( is_readable( $file ) && preg_match( '/(?:^|\n):root\s*\{[^}]*\}/', (string) file_get_contents( $file ), $match ) ) {
			$css .= trim( $match[0] ) . "\n";
		}
		$css .= extendable_masteriyo_settable_css();
		if ( '' === trim( $css ) ) {
			return;
		}

		wp_register_style( 'extendable-masteriyo-editor', false, array(), EXTENDABLE_THEME_VERSION );
		wp_enqueue_style( 'extendable-masteriyo-editor' );
		wp_add_inline_style( 'extendable-masteriyo-editor', str_replace( ':root {', ':root:root {', $css ) );
	}

endif;

if ( ! function_exists( 'extendable_masteriyo_editor_markers' ) ) :

	/**
	 * The canvas never runs body_class, and the editor resets its body's classes, so the default
	 * setting markers are re-added each time.
	 *
	 * @since Extendable 2.2.1
	 *
	 * @return void
	 */
	function extendable_masteriyo_editor_markers() {
		if ( ! is_admin() ) {
			return;
		}

		$markers = array();
		foreach ( extendable_masteriyo_settings_at_factory() as $setting ) {
			if ( ! empty( $setting['marker'] ) ) {
				$markers[] = $setting['marker'];
			}
		}
		if ( ! $markers ) {
			return;
		}

		wp_register_script( 'extendable-masteriyo-editor', false, array(), EXTENDABLE_THEME_VERSION, false );
		wp_enqueue_script( 'extendable-masteriyo-editor' );
		wp_add_inline_script(
			'extendable-masteriyo-editor',
			sprintf(
				'(function (markers) { var add = function () { markers.forEach(function (marker) { if (!document.body.classList.contains(marker)) { document.body.classList.add(marker); } }); }; var watch = function () { add(); new MutationObserver(add).observe(document.body, { attributes: true, attributeFilter: ["class"] }); }; var start = function () { if (document.body) { watch(); } else { setTimeout(start, 50); } }; start(); })(%s);',
				wp_json_encode( $markers )
			)
		);
	}

endif;

if ( ! function_exists( 'extendable_masteriyo_factory_body_classes' ) ) :

	/**
	 * Masteriyo's course_card_styles settings print !important at any value, factory or not.
	 * Adds a class per setting only while it still holds the factory one.
	 *
	 * @since Extendable 2.2.1
	 *
	 * @param array $classes The body_class filter's existing classes.
	 * @return array
	 */
	function extendable_masteriyo_factory_body_classes( $classes ) {
		foreach ( extendable_masteriyo_settings_at_factory() as $setting ) {
			if ( ! empty( $setting['marker'] ) ) {
				$classes[] = $setting['marker'];
			}
		}

		return $classes;
	}

endif;

if ( class_exists( 'Masteriyo\Masteriyo' ) ) {
	add_filter( 'body_class', 'extendable_masteriyo_factory_body_classes' );
	add_action( 'enqueue_block_assets', 'extendable_masteriyo_editor_styles' );
	add_action( 'enqueue_block_assets', 'extendable_masteriyo_editor_markers' );
}

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
 * Hide the system block styles from the style picker. Patterns and design styles set them;
 * WordPress still registers them, so their CSS prints.
 *
 * @since Extendable 2.1.10
 *
 * @return void
 */
function extendable_hide_block_presets() {
	wp_enqueue_style(
		'extendable-hide-block-presets',
		get_template_directory_uri() . '/assets/css/hide-block-presets.css',
		array(),
		EXTENDABLE_THEME_VERSION
	);
}
add_action( 'enqueue_block_editor_assets', 'extendable_hide_block_presets' );

/**
 * Include animation functionality
 */
require_once get_template_directory() . '/inc/animations.php';

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
		$wc_template_slugs = array(
			'archive-product',
			'single-product',
			'product-search-results',
			'page-cart',
			'page-checkout',
			'order-confirmation',
			'checkout',
		);
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
 * WooCommerce prints upsells after product-details, which sits in the buy box; the template has its own row.
 *
 * @package Extendable
 */
function extendable_remove_wc_upsells_hook() {
	if ( function_exists( 'is_product' ) && is_product() ) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	}
}
add_action( 'template_redirect', 'extendable_remove_wc_upsells_hook' );

/**
 * Header helper.
 *
 * @package Extendable
 * @since Extendable 2.1.5
 */
function extendable_enqueue_header_scripts() {
	wp_enqueue_script(
		'extendable-header',
		get_template_directory_uri() . '/assets/js/header.js',
		array(),
		EXTENDABLE_THEME_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'extendable_enqueue_header_scripts' );

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

	// A page template would replace WooCommerce's cart, checkout and account templates on its own pages.
	if ( has_block( 'woocommerce/cart', $post ) || has_block( 'woocommerce/checkout', $post ) || has_shortcode( $post->post_content, 'woocommerce_my_account' ) ) {
		return;
	}

	$current_template = get_page_template_slug( $post_id );
    
	// If no template is set or it's the default template, set our default
	if ( empty( $current_template ) || 'page' === $current_template ) {
		update_post_meta( $post_id, '_wp_page_template', 'page-with-title' );
	}
}
add_action( 'wp_insert_post', 'extendable_set_default_template_for_new_pages', 10, 3 );

/**
 * Render WooCommerce's cart, checkout and account pages with their store templates
 * even when an older Extendable saved page-with-title on them.
 *
 * @param array $templates Template candidates for the page.
 * @return array
 */
function extendable_store_pages_skip_page_with_title( $templates ) {
	if ( ! function_exists( 'wc_get_page_id' ) ) {
		return $templates;
	}

	$store_pages = array( wc_get_page_id( 'cart' ), wc_get_page_id( 'checkout' ), wc_get_page_id( 'myaccount' ) );
	if ( ! in_array( get_queried_object_id(), $store_pages, true ) ) {
		return $templates;
	}

	return array_values( array_diff( $templates, array( 'page-with-title' ) ) );
}
add_filter( 'page_template_hierarchy', 'extendable_store_pages_skip_page_with_title' );

/**
 * WooCommerce saves its own product card into the cart page's cross-sells, out of the
 * templates' reach, so render the shop's card under the related products heading instead.
 *
 * @param array $parsed_block Parsed block data.
 * @return array Filtered block data.
 */
function extendable_cross_sells_use_shop_card( array $parsed_block ) : array {
	if ( 'woocommerce/product-collection' !== $parsed_block['blockName'] ) {
		return $parsed_block;
	}
	if ( 'woocommerce/product-collection/cross-sells' !== ( $parsed_block['attrs']['collection'] ?? '' ) ) {
		return $parsed_block;
	}

	$heading = '';
	foreach ( $parsed_block['innerBlocks'] as $inner_block ) {
		if ( 'core/heading' === $inner_block['blockName'] ) {
			$heading = sprintf(
				'<!-- wp:heading {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"0"}},"color":{"text":"var(--wp--custom--color--text-weak)"}},"fontSize":"medium-plus"} --><h2 class="wp-block-heading has-text-color has-medium-plus-font-size" style="color:var(--wp--custom--color--text-weak);margin-top:var(--wp--preset--spacing--40);margin-bottom:0">%s</h2><!-- /wp:heading -->',
				esc_html( trim( wp_strip_all_tags( $inner_block['innerHTML'] ) ) )
			);
			break;
		}
	}

	$attrs                                 = $parsed_block['attrs'];
	$attrs['style']['spacing']['blockGap'] = 'var:preset|spacing|30';

	$markup = sprintf(
		'<!-- wp:woocommerce/product-collection %s --><div class="wp-block-woocommerce-product-collection">%s<!-- wp:woocommerce/product-template --><!-- wp:pattern {"slug":"extendable/hidden-shop-product"} /--><!-- /wp:woocommerce/product-template --></div><!-- /wp:woocommerce/product-collection -->',
		serialize_block_attributes( $attrs ),
		$heading
	);

	return parse_blocks( $markup )[0];
}
add_filter( 'render_block_data', 'extendable_cross_sells_use_shop_card' );

/**
 * Only $parent_block says this is the empty cart's own copy, so mark it here
 * before the swap below would otherwise hit every Newest Products block.
 *
 * @param array         $parsed_block Parsed block data.
 * @param array         $source_block Unmodified copy of $parsed_block, as parsed from the source.
 * @param WP_Block|null $parent_block The parent block instance, if this one is nested.
 * @return array Filtered block data.
 */
function extendable_mark_empty_cart_product_new( array $parsed_block, array $source_block, $parent_block = null ) : array {
	if ( 'woocommerce/product-new' !== $parsed_block['blockName'] ) {
		return $parsed_block;
	}
	if ( ! $parent_block instanceof WP_Block || 'woocommerce/empty-cart-block' !== $parent_block->name ) {
		return $parsed_block;
	}

	$parsed_block['attrs']['__extendableEmptyCart'] = true;

	return $parsed_block;
}
add_filter( 'render_block_data', 'extendable_mark_empty_cart_product_new', 10, 3 );

/**
 * WooCommerce also saves its own grid block into the cart page's empty-cart content, out of
 * the templates' reach, so render the shop's card there too, the same fix already used for
 * the cart's cross-sells list.
 *
 * @param string $block_content Rendered block content.
 * @param array  $parsed_block  Parsed block data.
 * @return string Filtered block content.
 */
function extendable_empty_cart_new_products_use_shop_card( string $block_content, array $parsed_block ) : string {
	if ( empty( $parsed_block['attrs']['__extendableEmptyCart'] ) ) {
		return $block_content;
	}

	$columns = (int) ( $parsed_block['attrs']['columns'] ?? 4 );
	$rows    = (int) ( $parsed_block['attrs']['rows'] ?? 1 );

	$markup = sprintf(
		'<!-- wp:woocommerce/product-collection %s --><div class="wp-block-woocommerce-product-collection"><!-- wp:woocommerce/product-template --><!-- wp:pattern {"slug":"extendable/hidden-shop-product"} /--><!-- /wp:woocommerce/product-template --></div><!-- /wp:woocommerce/product-collection -->',
		serialize_block_attributes(
			array(
				'queryId'       => 0,
				'query'         => array(
					'woocommerceAttributes'         => array(),
					'woocommerceStockStatus'        => array( 'instock', 'outofstock', 'onbackorder' ),
					'woocommerceOnSale'              => false,
					'woocommerceHandPickedProducts' => array(),
					'taxQuery'                      => array(),
					'isProductCollectionBlock'      => true,
					'perPage'                       => $columns * $rows,
					'pages'                         => 1,
					'offset'                        => 0,
					'postType'                      => 'product',
					'order'                         => 'desc',
					'orderBy'                       => 'date',
					'search'                        => '',
					'exclude'                       => array(),
					'inherit'                       => false,
					'featured'                      => false,
				),
				'tagName'       => 'div',
				'displayLayout' => array(
					'type'          => 'flex',
					'columns'       => $columns,
					'shrinkColumns' => true,
				),
				'style'         => array( 'spacing' => array( 'blockGap' => 'var:preset|spacing|30' ) ),
			)
		)
	);

	return do_blocks( $markup );
}
add_filter( 'render_block', 'extendable_empty_cart_new_products_use_shop_card', 10, 2 );

/**
 * Hide block style variations from editor UI while keeping them registered
 */
function extendable_hide_block_style_variations() {
	$css = '
		.block-editor-block-styles__item[aria-label*="Brutalism 1"],
		.block-editor-block-styles__item[aria-label*="Organic 1"],
		.block-editor-block-styles__item[aria-label*="Soft 1"],
		.block-editor-block-styles__item[aria-label*="Gradient 1"],
		.block-editor-block-styles__item[aria-label*="Matrix 1"],
		.block-editor-block-styles__item[aria-label*="Prism 1"],
		.block-editor-block-styles__item[aria-label*="Wave 1"] {
			display: none !important;
		}
	';
	
	wp_add_inline_style('wp-edit-blocks', $css);
}
add_action( 'enqueue_block_editor_assets', 'extendable_hide_block_style_variations' );

/**
 * Hide block style variations from site editor style panel
 */
function extendable_hide_site_editor_block_style_variations() {
	$css = '
		/* Hide specific design aesthetic variations in site editor */
		.components-navigator-button[id*="brutalism-1--"],
		.components-navigator-button[id*="organic-1--"],
		.components-navigator-button[id*="soft-1--"],
		.components-navigator-button[id*="gradient-1--"],
		.components-navigator-button[id*="matrix-1--"],
		.components-navigator-button[id*="prism-1--"],
		.components-navigator-button[id*="wave-1--"] {
			display: none !important;
		}
		
		/* Hide the Style Variations heading if all variations are hidden */
		.components-h-stack:has(.components-navigator-button[id*="ext-preset--"]:not([style*="display: none"])) .edit-site-global-styles-subtitle:contains("Style Variations") {
			display: none !important;
		}
		
		/* Alternative approach - hide the entire Style Variations section */
		.edit-site-global-styles-subtitle:contains("Style Variations") + .components-item-group {
			display: none !important;
		}
		
		.edit-site-global-styles-subtitle:contains("Style Variations") {
			display: none !important;
		}
	';
	
	wp_add_inline_style('wp-edit-site', $css);
}
add_action( 'admin_enqueue_scripts', 'extendable_hide_site_editor_block_style_variations' );

// Temporary fix: Hide matrix-1, prism-1, wave-1 variations when Extendify < 2.4.0
function extendable_filter_global_styles_rest_response( $response, $handler, $request ) {
	$route = $request->get_route();
	if ( strpos( $route, '/wp/v2/global-styles/themes/' ) === false ) {
		return $response;
	}

	if ( ! function_exists( 'get_plugins' ) ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
	}

	$plugins       = get_plugins();
	$should_filter = false;

	foreach ( $plugins as $plugin_file => $plugin_data ) {
		if ( 'extendify-local' === $plugin_data['TextDomain'] && is_plugin_active( $plugin_file ) ) {
			if ( version_compare( $plugin_data['Version'], '2.4.0', '<' ) ) {
				$should_filter = true;
			}
			break;
		}
	}

	if ( ! $should_filter ) {
		return $response;
	}

	$patterns = array( 'matrix-1', 'prism-1', 'wave-1' );
	$data     = $response->get_data();

	if ( isset( $data['styles']['blocks'] ) && is_array( $data['styles']['blocks'] ) ) {
		foreach ( $data['styles']['blocks'] as $block_name => $block_data ) {
			if ( isset( $block_data['variations'] ) && is_array( $block_data['variations'] ) ) {
				foreach ( $block_data['variations'] as $variation_slug => $variation_data ) {
					foreach ( $patterns as $pattern ) {
						if ( strpos( $variation_slug, $pattern ) !== false ) {
							unset( $data['styles']['blocks'][ $block_name ]['variations'][ $variation_slug ] );
							break;
						}
					}
				}
				if ( empty( $data['styles']['blocks'][ $block_name ]['variations'] ) ) {
					unset( $data['styles']['blocks'][ $block_name ]['variations'] );
				}
			}
		}
	}

	if ( isset( $data['_links']['wp:block-style-variations'] ) ) {
		$data['_links']['wp:block-style-variations'] = array_filter(
			$data['_links']['wp:block-style-variations'],
			function( $variation ) use ( $patterns ) {
				$href = $variation['href'] ?? '';
				foreach ( $patterns as $pattern ) {
					if ( strpos( $href, $pattern ) !== false ) {
						return false;
					}
				}
				return true;
			}
		);
		$data['_links']['wp:block-style-variations'] = array_values( $data['_links']['wp:block-style-variations'] );
	}

	$response->set_data( $data );
	return $response;
}
add_filter( 'rest_post_dispatch', 'extendable_filter_global_styles_rest_response', 10, 3 );
