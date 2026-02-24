<?php
/**
 * Animation functionality for Extendable theme
 *
 * @package Extendable
 * @since Extendable 2.0.33
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register animation settings with WordPress Settings API
 * Registers REST API endpoint for managing animation preferences
 * 
 * @since Extendable 2.0.33
 * @return void
 */
function extendable_register_animation_settings() {
	register_setting( 'extendable_animations', 'ext_animation_settings', array(
		'type' => 'object',
		'default' => array(
			'type' => 'none',
			'speed' => 'medium'
		),
		'show_in_rest' => array(
			'schema' => array(
				'type' => 'object',
				'properties' => array(
					'type' => array(
						'type' => 'string',
						'enum' => array( 'none', 'fade', 'fade-up', 'zoom-in' ),
					),
					'speed' => array(
						'type' => 'string',
						'enum' => array( 'slow', 'medium', 'fast' ),
					),
				),
			),
		),
		'sanitize_callback' => 'extendable_sanitize_animation_settings',
	));
}
add_action( 'rest_api_init', 'extendable_register_animation_settings' );

/**
 * Sanitize animation settings
 * Validates and sanitizes user input for animation configuration
 * 
 * @since Extendable 2.0.33
 * @param mixed $settings Animation settings to sanitize
 * @return array Sanitized settings with type and speed keys
 */
function extendable_sanitize_animation_settings( $settings ) {
	$valid_types = array( 'none', 'fade', 'fade-up', 'zoom-in' );
	$valid_speeds = array( 'slow', 'medium', 'fast' );
	
	if ( ! is_array( $settings ) ) {
		$settings = array();
	}
	
	$sanitized = array(
		'type' => 'none',
		'speed' => 'medium'
	);
	
	if ( isset( $settings['type'] ) && in_array( $settings['type'], $valid_types, true ) ) {
		$sanitized['type'] = $settings['type'];
	}
	
	if ( isset( $settings['speed'] ) && in_array( $settings['speed'], $valid_speeds, true ) ) {
		$sanitized['speed'] = $settings['speed'];
	}
	
	return $sanitized;
}

/**
 * Enqueue animations on frontend
 * Loads animation CSS/JS and configures based on user settings
 *
 * @since Extendable 2.0.33
 * @return void
 */
function extendable_enqueue_animations() {

	$animation_settings = get_option( 'ext_animation_settings', array(
		'type' => 'none',
		'speed' => 'medium'
	));
	
	$animation_type = $animation_settings['type'] ?? 'none';
	$animation_speed = $animation_settings['speed'] ?? 'medium';
	
	if ( is_admin() || 
	     ! apply_filters( 'extendable_enable_animations', true ) ||
	     false === $animation_type || 
	     empty( $animation_type ) ||
	     'none' === $animation_type ) {
	    return;
	}

	$config_file = get_template_directory() . '/assets/config/animations.json';
	
	if ( ! file_exists( $config_file ) || ! is_readable( $config_file ) ) {
		return;
	}
	
	$config = json_decode( file_get_contents( $config_file ), true );
	
	if ( ! is_array( $config ) ) {
		return;
	}
	
	$type = sanitize_key( $animation_type );
	
	if ( ! isset( $config['types'][ $type ] ) ) {
		$type = 'fade';
	}
	
	$mappings = $config['types'][ $type ]['mappings'] ?? array();
	$defaults = $config['defaults'] ?? array();
	$css_config = $config['css'] ?? array();

	$sanitized = array();
	foreach ( $mappings as $selector => $animation ) {
		$clean_selector = sanitize_text_field( trim( $selector ) );
		$clean_animation = sanitize_key( trim( $animation ) );
		
		if ( ! empty( $clean_selector ) && ! empty( $clean_animation ) ) {
			$sanitized[ $clean_selector ] = $clean_animation;
		}
	}
	
	if ( empty( $sanitized ) ) {
		return;
	}

	wp_enqueue_style(
		'extendable-animations',
		get_template_directory_uri() . '/assets/css/animations.css',
		array( 'extendable-style' ),
		EXTENDABLE_THEME_VERSION
	);

	wp_enqueue_script( 
		'extendable-animations', 
		get_template_directory_uri() . '/assets/js/animations-interactivity.js', 
		array(), 
		EXTENDABLE_THEME_VERSION, 
		true 
	);

	wp_localize_script( 'extendable-animations', 'ExtendableAnimations', array(
		'map' => $sanitized,
		'defaults' => array_map( 'sanitize_text_field', $defaults ),
		'speed' => sanitize_key( $animation_speed ),
	));

	// Generate FOUC prevention CSS (respects override classes and reduced motion preference)
	$animation_css = '';
	foreach ( $sanitized as $selector => $animation ) {
		$css_rule = isset( $css_config[ $animation ] ) && ! empty( $css_config[ $animation ] )
			?  $css_config[ $animation ] 
			: 'opacity: 0;';
		
		// Only hide elements if reduced motion is not preferred
		$animation_css .= '@media (prefers-reduced-motion: no-preference) { ' . $selector . ':not(.ext-animate--off) { ' . $css_rule . ' } } ';
	}
	
	if ( ! empty( $animation_css ) ) {
		wp_add_inline_style( 'extendable-style', $animation_css );
	}
}
add_action( 'wp_enqueue_scripts', 'extendable_enqueue_animations' );

/**
 * Enqueue animation control for block editor
 *
 * @since Extendable 2.0.33
 * @return void
 */
function extendable_enqueue_animation_editor_control() {
	
	$animation_settings = get_option( 'ext_animation_settings', array(
		'type' => 'none',
		'speed' => 'medium'
	));
	
	$animation_type = $animation_settings['type'] ?? 'none';
	$is_enabled = apply_filters( 'extendable_enable_animations', true ) && 
	              ! empty( $animation_type ) && 
	              'none' !== $animation_type;

	wp_enqueue_script(
		'extendable-animate-control',
		get_template_directory_uri() . '/assets/editor/block-animate-control.js',
		array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-block-editor', 'wp-compose', 'wp-hooks', 'wp-i18n' ),
		EXTENDABLE_THEME_VERSION,
		true
	);

	wp_localize_script( 'extendable-animate-control', 'ExtendableAnimateControl', array(
		'enabled' => $is_enabled ? '1' : '0',
	) );
}
add_action( 'enqueue_block_editor_assets', 'extendable_enqueue_animation_editor_control' );

/**
 * Enqueue animation settings sidebar for site editor
 *
 * @since Extendable 2.0.33
 * @return void
 */
function extendable_enqueue_animation_sidebar() {
	
	wp_enqueue_script(
		'extendable-animation-sidebar',
		get_template_directory_uri() . '/assets/editor/animation-settings-modal.js',
		array( 'wp-plugins', 'wp-element', 'wp-components', 'wp-data', 'wp-api-fetch', 'wp-i18n' ),
		EXTENDABLE_THEME_VERSION,
		true
	);

	$animation_settings = get_option( 'ext_animation_settings', array(
		'type' => 'none',
		'speed' => 'medium'
	));

	wp_localize_script( 'extendable-animation-sidebar', 'ExtendableAnimationSettings', array(
		'current' => $animation_settings,
	) );
}
add_action( 'enqueue_block_editor_assets', 'extendable_enqueue_animation_sidebar' );
