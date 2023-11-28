<?php
/**
 * Title:    404 error content.
 * Slug:     extendable/hidden-404
 * Inserter: false
 */
?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)">

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading" id="page-not-found"><?php echo esc_html_x( 'Page Not Found', 'Heading for a webpage that is not found', 'extendable' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html_x( 'The page you are looking for does not exist, or it has been moved. Please try searching using the form below.', 'Message to convey that a webpage could not be found', 'extendable' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:pattern {"slug":"extendable/hidden-search"} /-->
</div>
<!-- /wp:group -->
