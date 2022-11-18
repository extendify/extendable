<?php
/**
 * Title:    404 error content.
 * Slug:     extendable/hidden-404
 * Inserter: false
 */
?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)">

<!-- wp:heading {"level":2} -->
<h2><?php echo esc_html__( 'Not found, error 404', 'extendable' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html__( 'Oops, the page you are looking for does not exist or is no longer available. We are sorry about that. Just use the search form to find your way.', 'extendable' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:search {"width":75,"widthUnit":"%","showLabel":false,"buttonText":"Search"} /-->

</div>
<!-- /wp:group -->
