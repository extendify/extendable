<?php
/**
 * Title:    Shop, four-column grid
 * Slug:     extendable/hidden-shop-grid-four-columns
 * Inserter: no
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|25"}}} -->
<div class="wp-block-group alignwide">
	<!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between"}} -->
	<div class="wp-block-group">
		<!-- wp:woocommerce/product-results-count /-->

		<!-- wp:woocommerce/catalog-sorting /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:woocommerce/product-collection {"queryId":0,"query":{"woocommerceAttributes":[],"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceOnSale":false,"woocommerceHandPickedProducts":[],"taxQuery":[],"isProductCollectionBlock":true,"perPage":12,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":true,"featured":false},"tagName":"div","displayLayout":{"type":"flex","columns":4,"shrinkColumns":true},"queryContextIncludes":["collection"],"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
	<div class="wp-block-woocommerce-product-collection">
		<!-- wp:woocommerce/product-template {"layout":{"type":"default"}} -->
		<!-- wp:pattern {"slug":"extendable/hidden-shop-product"} /-->
		<!-- /wp:woocommerce/product-template -->
		<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:query-pagination-previous /-->

		<!-- wp:query-pagination-numbers /-->

		<!-- wp:query-pagination-next /-->
		<!-- /wp:query-pagination -->
		<!-- wp:woocommerce/product-collection-no-results -->
		<!-- wp:pattern {"slug":"extendable/hidden-no-products"} /-->
		<!-- /wp:woocommerce/product-collection-no-results -->
	</div>
	<!-- /wp:woocommerce/product-collection -->
</div>
<!-- /wp:group -->
