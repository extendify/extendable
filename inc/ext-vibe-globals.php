<?php
/**
 * Vibe globals — the read endpoint for this theme's per-vibe GLOBAL theme.json settings.
 *
 * The payload lives in inc/ext-vibe-globals.json, keyed by the full vibe slug (e.g.
 * "linen-1"), and holds the parts of a vibe that are SITE-WIDE rather than per-block:
 * settings.layout (contentSize/wideSize), settings.custom scale knobs, and the element
 * typography a vibe's heading scale produces.
 *
 * Why the data is NOT under styles/: WordPress auto-reads that whole tree as selectable
 * style variations, so these payloads surfaced in the Site Editor's style browser and —
 * because a payload of only styles.elements matches its elements+typography filter exactly
 * — in a font picker, offering users a "font" that is really a layout partial. Keeping the
 * file outside styles/ makes it inert to WP, so nothing can surface it by accident.
 *
 * Why an endpoint at all: the file is read directly by anything running on the server (a
 * CLI or cron task can just read it), but a browser-side client — the block editor, an
 * in-admin AI assistant — cannot touch the filesystem. This route is that window.
 *
 * Read is public on purpose. The JSON is theme configuration served as a static file at a
 * known path under wp-content, so it is already world-readable; requiring a nonce here
 * would add no privacy while making the data unreachable to any client that does not hold
 * one. Nothing here writes, and nothing here reads request input beyond one slug that is
 * only ever used as an array key.
 *
 * @package Extendable
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Absolute path to the vibe-globals manifest, honouring a child theme.
 *
 * @return string
 */
function extendable_vibe_globals_path() {
	return get_theme_file_path( 'inc/ext-vibe-globals.json' );
}

/**
 * The decoded manifest, or an empty shape when the file is absent or unreadable.
 *
 * A theme build that ships no marked vibes has no manifest at all, so absence is a normal
 * state and returns the same shape as a present-but-empty one — a caller never has to
 * distinguish "no file" from "no vibes".
 *
 * @return array
 */
function extendable_vibe_globals_data() {
	$path = extendable_vibe_globals_path();

	if ( ! file_exists( $path ) || ! is_readable( $path ) ) {
		return array(
			'version' => 1,
			'vibes'   => array(),
		);
	}

	$decoded = json_decode( (string) file_get_contents( $path ), true );

	if ( ! is_array( $decoded ) || ! isset( $decoded['vibes'] ) || ! is_array( $decoded['vibes'] ) ) {
		return array(
			'version' => 1,
			'vibes'   => array(),
		);
	}

	return $decoded;
}

/**
 * GET /extendable/v1/vibe-globals
 *
 * Returns the whole manifest, or a single vibe's payload with ?vibe=<slug>. An unknown slug
 * is a 404 rather than an empty body, so a client can tell "this theme has no globals for
 * that vibe" apart from "that vibe has an empty payload".
 *
 * @param WP_REST_Request $request Request object.
 * @return WP_REST_Response|WP_Error
 */
function extendable_vibe_globals_rest( $request ) {
	$data = extendable_vibe_globals_data();
	$slug = $request->get_param( 'vibe' );

	if ( null === $slug || '' === $slug ) {
		return new WP_REST_Response( $data, 200 );
	}

	if ( ! array_key_exists( $slug, $data['vibes'] ) ) {
		return new WP_Error(
			'extendable_vibe_globals_not_found',
			__( 'No vibe globals for that slug in this theme.', 'extendable' ),
			array( 'status' => 404 )
		);
	}

	return new WP_REST_Response(
		array(
			'version' => $data['version'] ?? 1,
			'vibe'    => $slug,
			'globals' => $data['vibes'][ $slug ],
		),
		200
	);
}

/**
 * Register the route.
 *
 * @return void
 */
function extendable_register_vibe_globals_route() {
	register_rest_route(
		'extendable/v1',
		'/vibe-globals',
		array(
			'methods'             => WP_REST_Server::READABLE,
			'callback'            => 'extendable_vibe_globals_rest',
			'permission_callback' => '__return_true',
			'args'                => array(
				'vibe' => array(
					'description'       => __( 'Return only this vibe slug, e.g. linen-1.', 'extendable' ),
					'type'              => 'string',
					'required'          => false,
					'sanitize_callback' => 'sanitize_key',
				),
			),
		)
	);
}
add_action( 'rest_api_init', 'extendable_register_vibe_globals_route' );
