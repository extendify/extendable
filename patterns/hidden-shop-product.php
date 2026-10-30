<?php
/**
 * Title: Shop product
 * Slug: extendable/hidden-shop-product
 * Inserter: no
 */
?>
<!-- wp:group {"className":"ext-card ext-card-media-top is-style-ext-preset--card ext-animate--on","style":{"spacing":{"blockGap":"var:preset|spacing|25"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Product Card"}} -->
<div class="wp-block-group ext-card ext-card-media-top is-style-ext-preset--card ext-animate--on"><!-- wp:woocommerce/product-image {"showSaleBadge":false,"isDescendentOfQueryLoop":true,"aspectRatio":"1"} -->
<!-- wp:woocommerce/product-sale-badge {"isDescendentOfQueryLoop":true} /-->
<!-- /wp:woocommerce/product-image -->

<!-- wp:group {"className":"ext-card-body","style":{"layout":{"selfStretch":"fill"},"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":"Card Body"}} -->
<div class="wp-block-group ext-card-body"><!-- wp:post-title {"level":3,"isLink":true,"fontSize":"medium-plus","className":"is-style-ext-preset--card-title"} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"className":"is-style-ext-preset--price"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ext-card-footer","metadata":{"name":"Card Footer"}} -->
<div class="wp-block-group ext-card-footer"><!-- wp:woocommerce/product-button {"isDescendentOfQueryLoop":true,"className":"is-style-ext-secondary"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
