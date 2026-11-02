<?php
/**
 * Title:    Shop header
 * Slug:     extendable/hidden-shop-header
 * Inserter: no
 */
?>

<!-- wp:group {"metadata":{"name":"Page header"},"align":"full","className":"is-style-ext-preset\u002d\u002dpage-header","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-ext-preset--page-header">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:woocommerce/breadcrumbs /-->

		<!-- wp:group {"metadata":{"name":"Title"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
		<div class="wp-block-group">
			<!-- wp:query-title {"type":"archive","showPrefix":false,"fontSize":"medium-plus"} /-->

			<!-- wp:term-description {"style":{"color":{"text":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dcolor\u002d\u002dtext-weak)"}},"fontSize":"small"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
