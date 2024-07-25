<?php
/**
 * Title:    Related-Products
 * Slug:     extendable/hidden-woo-related-products
 * Inserter: no
 */
?>

<!-- wp:woocommerce/related-products {"align":"wide"} -->
<div class="wp-block-woocommerce-related-products alignwide">
	<!-- wp:query {"queryId":0,"query":{"perPage":5,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":false},"namespace":"woocommerce/related-products","lock":{"remove":true,"move":true}} -->
	<div class="wp-block-query">
		<!-- wp:heading {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|30"}}},"fontSize":"large"} -->
		<h2 class="wp-block-heading has-large-font-size" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--30)"><?php echo esc_html_x( 'Related products ', 'Heading for a single product page related products section', 'extendable' ); ?></h2>
		<!-- /wp:heading -->
		<!-- wp:post-template {"className":"products-block-post-template","layout":{"type":"grid","columnCount":5},"__woocommerceNamespace":"woocommerce/product-query/product-template"} -->
		<!-- wp:woocommerce/product-image {"imageSizing":"thumbnail","isDescendentOfQueryLoop":true,"style":{"spacing":{"margin":{"bottom":"1.5rem"}}}} /-->
		<!-- wp:post-title {"textAlign":"left","level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"0.5rem"}}},"fontSize":"medium","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->
		<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"left","fontSize":"small","style":{"spacing":{"margin":{"bottom":"1.5rem"}}}} /-->
		<!-- wp:woocommerce/product-button {"textAlign":"left","isDescendentOfQueryLoop":true,"className":"is-style-fill is-layout-flex wp-block-buttons-is-layout-flex","fontSize":"small","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->
		<!-- wp:spacer {"height":"2rem"} -->
		<div style="height:2rem" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:woocommerce/related-products -->
