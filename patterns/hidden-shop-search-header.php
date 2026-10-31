<?php
/**
 * Title:    Shop search header
 * Slug:     extendable/hidden-shop-search-header
 * Inserter: no
 */
?>

<!-- wp:group {"align":"full","className":"ext-section is-style-ext-preset\u002d\u002dsection","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ext-section is-style-ext-preset--section" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:0">
	<!-- wp:woocommerce/store-notices {"align":"wide"} /-->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:woocommerce/breadcrumbs /-->

		<!-- wp:group {"metadata":{"name":"Title"},"layout":{"type":"constrained","justifyContent":"left"}} -->
		<div class="wp-block-group">
			<!-- wp:query-title {"type":"search","showPrefix":false,"fontSize":"medium-large"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
