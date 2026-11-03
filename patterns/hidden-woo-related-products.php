<?php
/**
 * Title:    Related-Products
 * Slug:     extendable/hidden-woo-related-products
 * Inserter: no
 */
?>

<!-- wp:group {"align":"full","className":"ext-section is-style-ext-preset\u002d\u002dsection","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ext-section is-style-ext-preset--section has-tertiary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:woocommerce/product-collection {"queryId":0,"query":{"perPage":4,"pages":1,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":[],"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false,"relatedBy":{"categories":true,"tags":true}},"tagName":"div","displayLayout":{"type":"flex","columns":4,"shrinkColumns":false},"dimensions":{"widthType":"fill"},"collection":"woocommerce/product-collection/related","hideControls":["inherit"],"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":true,"previewMessage":"Actual products will vary depending on the product being viewed."},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"align":"wide"} -->
	<div class="wp-block-woocommerce-product-collection alignwide">
		<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"color":{"text":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dcolor\u002d\u002dtext-weak)"}},"fontSize":"medium-plus"} -->
			<h2 class="wp-block-heading has-text-color has-medium-plus-font-size" style="color:var(--wp--custom--color--text-weak);margin-top:0;margin-bottom:0">
	    		<?php echo esc_html_x( 'Related products', 'Heading for a single product page related products section', 'extendable' ); ?>
	  		</h2>
	  	<!-- /wp:heading -->

	  <!-- wp:woocommerce/product-template -->
	    <!-- wp:pattern {"slug":"extendable/hidden-shop-product"} /-->
	  <!-- /wp:woocommerce/product-template -->
	</div>
	<!-- /wp:woocommerce/product-collection -->
</div>
<!-- /wp:group -->
