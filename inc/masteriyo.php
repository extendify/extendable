<?php
/**
 * Masteriyo LMS support. functions.php loads this file only while Masteriyo is active.
 *
 * @package Extendable
 * @since Extendable 2.2.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'extendable_masteriyo_editor_style' ) ) :

	/**
	 * Adds the Masteriyo stylesheet to the editor canvas.
	 *
	 * @since Extendable 2.2.1
	 *
	 * @return void
	 */
	function extendable_masteriyo_editor_style() {
		add_editor_style( 'assets/css/masteriyo.css' );
	}

endif;

if ( ! function_exists( 'extendable_masteriyo_styles' ) ) :

	/**
	 * Enqueues the Masteriyo stylesheet and the palette tokens for its default colour settings.
	 *
	 * @since Extendable 2.2.1
	 *
	 * @return void
	 */
	function extendable_masteriyo_styles() {
		// Masteriyo loads its CSS only where its content shows; a missing dependency logs a notice.
		if ( ! wp_style_is( 'masteriyo-public', 'registered' ) ) {
			return;
		}

		// Masteriyo enqueues its own CSS late; without this dependency it overrides ours.
		wp_enqueue_style(
			'extendable-masteriyo-style',
			get_template_directory_uri() . '/assets/css/masteriyo.css',
			array( 'extendable-style', 'masteriyo-public' ),
			EXTENDABLE_THEME_VERSION
		);
		extendable_masteriyo_settable_colors();
	}

endif;

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

add_action( 'after_setup_theme', 'extendable_masteriyo_editor_style' );
// After Masteriyo registers its CSS, before its learn and account pages strip other styles.
add_action( 'wp_enqueue_scripts', 'extendable_masteriyo_styles', PHP_INT_MAX - 5 );
add_filter( 'body_class', 'extendable_masteriyo_factory_body_classes' );
add_action( 'enqueue_block_assets', 'extendable_masteriyo_editor_styles' );
add_action( 'enqueue_block_assets', 'extendable_masteriyo_editor_markers' );
