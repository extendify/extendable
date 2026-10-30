<?php
/**
 * Title:    Shop, filters sidebar, left
 * Slug:     extendable/hidden-shop-filters-sidebar-left
 * Inserter: no
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
<div class="wp-block-group alignwide">
	<!-- wp:woocommerce/breadcrumbs /-->

	<!-- wp:group {"metadata":{"name":"Title"},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group">
		<!-- wp:query-title {"type":"archive","showPrefix":false} /-->

		<!-- wp:term-description /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|64"}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"288px"} -->
		<div class="wp-block-column" style="flex-basis:288px">
			<!-- wp:woocommerce/product-filters -->
			<div class="wp-block-woocommerce-product-filters wc-block-product-filters">
				<!-- wp:woocommerce/product-filter-active -->
				<div class="wp-block-woocommerce-product-filter-active">
					<!-- wp:woocommerce/product-filter-removable-chips -->
					<div class="wp-block-woocommerce-product-filter-removable-chips wc-block-product-filter-removable-chips"></div>
					<!-- /wp:woocommerce/product-filter-removable-chips -->

					<!-- wp:woocommerce/product-filter-clear-button -->
					<!-- wp:buttons {"layout":{"type":"flex","verticalAlignment":"stretched"}} -->
					<div class="wp-block-buttons"><!-- wp:button {"className":"wc-block-product-filter-clear-button is-style-outline","style":{"border":{"width":"1px"},"typography":{"textDecoration":"none"},"outline":"none","fontSize":"medium","spacing":{"padding":{"left":"8px","right":"8px","top":"5px","bottom":"5px"}}}} -->
					<div class="wp-block-button wc-block-product-filter-clear-button is-style-outline"><a class="wp-block-button__link wp-element-button" style="border-width:1px;padding-top:5px;padding-right:8px;padding-bottom:5px;padding-left:8px;text-decoration:none"><?php echo esc_html_x( 'Clear filters', 'Button clearing every active shop filter', 'extendable' ); ?></a></div>
					<!-- /wp:button --></div>
					<!-- /wp:buttons -->
					<!-- /wp:woocommerce/product-filter-clear-button -->
				</div>
				<!-- /wp:woocommerce/product-filter-active -->

				<!-- wp:heading {"level":3} -->
				<h3 class="wp-block-heading"><?php echo esc_html_x( 'Filters', 'Heading above the shop sidebar filters', 'extendable' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:woocommerce/product-results-count /-->

				<!-- wp:woocommerce/product-filter-taxonomy {"taxonomy":"product_cat"} -->
				<div class="wp-block-woocommerce-product-filter-taxonomy">
					<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0.625rem","top":"0"}}}} -->
					<h3 class="wp-block-heading" style="margin-top:0;margin-bottom:0.625rem"><?php echo esc_html_x( 'Category', 'Shop sidebar filter heading', 'extendable' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:woocommerce/product-filter-checkbox-list -->
					<div class="wp-block-woocommerce-product-filter-checkbox-list wc-block-product-filter-checkbox-list"></div>
					<!-- /wp:woocommerce/product-filter-checkbox-list -->
				</div>
				<!-- /wp:woocommerce/product-filter-taxonomy -->

				<!-- wp:woocommerce/product-filter-price -->
				<div class="wp-block-woocommerce-product-filter-price">
					<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0.625rem","top":"0"}}}} -->
					<h3 class="wp-block-heading" style="margin-top:0;margin-bottom:0.625rem"><?php echo esc_html_x( 'Price', 'Shop sidebar filter heading', 'extendable' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:woocommerce/product-filter-price-slider -->
					<div class="wp-block-woocommerce-product-filter-price-slider wc-block-product-filter-price-slider"></div>
					<!-- /wp:woocommerce/product-filter-price-slider -->
				</div>
				<!-- /wp:woocommerce/product-filter-price -->

				<!-- wp:woocommerce/product-filter-attribute {"displayStyle":"woocommerce/product-filter-chips"} -->
				<div class="wp-block-woocommerce-product-filter-attribute">
					<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0.625rem","top":"0"}}}} -->
					<h3 class="wp-block-heading" style="margin-top:0;margin-bottom:0.625rem"><?php echo esc_html_x( 'Color', 'Shop sidebar filter heading', 'extendable' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:woocommerce/product-filter-chips -->
					<div class="wp-block-woocommerce-product-filter-chips wc-block-product-filter-chips"></div>
					<!-- /wp:woocommerce/product-filter-chips -->
				</div>
				<!-- /wp:woocommerce/product-filter-attribute -->

				<!-- wp:woocommerce/product-filter-status -->
				<div class="wp-block-woocommerce-product-filter-status">
					<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0.625rem","top":"0"}}}} -->
					<h3 class="wp-block-heading" style="margin-top:0;margin-bottom:0.625rem"><?php echo esc_html_x( 'Availability', 'Shop sidebar filter heading', 'extendable' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:woocommerce/product-filter-checkbox-list -->
					<div class="wp-block-woocommerce-product-filter-checkbox-list wc-block-product-filter-checkbox-list"></div>
					<!-- /wp:woocommerce/product-filter-checkbox-list -->
				</div>
				<!-- /wp:woocommerce/product-filter-status -->
			</div>
			<!-- /wp:woocommerce/product-filters -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|25"}}} -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","justifyContent":"right"}} -->
			<div class="wp-block-group">
				<!-- wp:woocommerce/catalog-sorting /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:woocommerce/product-collection {"queryId":0,"query":{"woocommerceAttributes":[],"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceOnSale":false,"woocommerceHandPickedProducts":[],"taxQuery":[],"isProductCollectionBlock":true,"perPage":12,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":true,"featured":false},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"queryContextIncludes":["collection"],"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
			<div class="wp-block-woocommerce-product-collection">
				<!-- wp:woocommerce/product-template {"layout":{"type":"default"}} -->
				<!-- wp:pattern {"slug":"extendable/hidden-shop-product"} /-->
				<!-- /wp:woocommerce/product-template -->
				<!-- wp:query-pagination {"style":{"typography":{"lineHeight":"3"}},"layout":{"type":"flex","justifyContent":"center"}} -->
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
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
