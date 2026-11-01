<?php
/**
 * Title:    Shop header
 * Slug:     extendable/hidden-shop-header
 * Inserter: no
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
<div class="wp-block-group alignwide">
	<!-- wp:woocommerce/breadcrumbs /-->

	<!-- wp:group {"metadata":{"name":"Title"},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group">
		<!-- wp:query-title {"type":"archive","showPrefix":false,"fontSize":"medium-plus"} /-->

		<!-- wp:term-description /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
