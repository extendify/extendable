<?php
/**
 * Title:    Product gallery beside thumbnails, details beside the buy box
 * Slug:     extendable/hidden-product-gallery-mosaic-tabs
 * Inserter: no
 */
?>

<!-- wp:group {"align":"wide","className":"ext-product-layout--mosaic","style":{"spacing":{"blockGap":"var:preset|spacing|64"}}} -->
<div class="wp-block-group alignwide ext-product-layout--mosaic">
	<!-- wp:woocommerce/breadcrumbs /-->

	<!-- wp:woocommerce/store-notices /-->

	<!-- wp:woocommerce/product-gallery {"layout":{"type":"flex","flexWrap":"nowrap","orientation":"horizontal"}} -->
	<div class="wp-block-woocommerce-product-gallery wc-block-product-gallery">
		<!-- wp:woocommerce/product-gallery-large-image -->
		<div class="wp-block-woocommerce-product-gallery-large-image wc-block-product-gallery-large-image__inner-blocks">
			<!-- wp:woocommerce/product-image {"showProductLink":false,"showSaleBadge":false} -->
			<div class="is-loading"></div>
			<!-- /wp:woocommerce/product-image -->

			<!-- wp:woocommerce/product-sale-badge {"align":"right"} /-->

			<!-- wp:woocommerce/product-gallery-large-image-next-previous -->
			<div class="wp-block-woocommerce-product-gallery-large-image-next-previous"></div>
			<!-- /wp:woocommerce/product-gallery-large-image-next-previous -->
		</div>
		<!-- /wp:woocommerce/product-gallery-large-image -->

		<!-- wp:woocommerce/product-gallery-thumbnails /-->
	</div>
	<!-- /wp:woocommerce/product-gallery -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|64"}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"60%"} -->
		<div class="wp-block-column" style="flex-basis:60%">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|25"}}} -->
			<div class="wp-block-group">
				<!-- wp:post-title {"level":1,"fontSize":"large","__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

				<!-- wp:post-excerpt {"__woocommerceNamespace":"woocommerce/product-query/product-summary"} /-->

				<!-- wp:woocommerce/product-details -->
				<div class="wp-block-woocommerce-product-details">
					<!-- wp:group -->
					<div class="wp-block-group">
					<!-- wp:tabs -->
					<div class="wp-block-tabs"><!-- wp:tab-list -->
					<div role="tablist" class="wp-block-tab-list"><button type="button" role="tab"><?php echo esc_html_x( 'Description', 'Tab heading on the single product page', 'extendable' ); ?></button><button type="button" role="tab"><?php echo esc_html_x( 'Additional information', 'Tab heading on the single product page', 'extendable' ); ?></button><button type="button" role="tab"><?php echo esc_html_x( 'Reviews', 'Tab heading on the single product page', 'extendable' ); ?></button></div>
					<!-- /wp:tab-list -->

					<!-- wp:tab-panels -->
					<div class="wp-block-tab-panels"><!-- wp:tab-panel {"label":"<?php echo esc_attr_x( 'Description', 'Tab heading on the single product page', 'extendable' ); ?>"} -->
					<section role="tabpanel" tabindex="0" class="wp-block-tab-panel"><!-- wp:woocommerce/product-description /--></section>
					<!-- /wp:tab-panel -->

					<!-- wp:tab-panel {"label":"<?php echo esc_attr_x( 'Additional information', 'Tab heading on the single product page', 'extendable' ); ?>"} -->
					<section role="tabpanel" tabindex="0" class="wp-block-tab-panel"><!-- wp:woocommerce/product-specifications /--></section>
					<!-- /wp:tab-panel -->

					<!-- wp:tab-panel {"label":"<?php echo esc_attr_x( 'Reviews', 'Tab heading on the single product page', 'extendable' ); ?>"} -->
					<section role="tabpanel" tabindex="0" class="wp-block-tab-panel">
						<!-- wp:woocommerce/product-reviews -->
						<div class="wp-block-woocommerce-product-reviews">
							<!-- wp:woocommerce/product-reviews-title /-->

							<!-- wp:woocommerce/product-review-template -->
							<!-- wp:columns -->
							<div class="wp-block-columns">
								<!-- wp:column {"width":"40px"} -->
								<div class="wp-block-column" style="flex-basis:40px">
									<!-- wp:avatar {"size":40,"style":{"border":{"radius":"20px"}}} /-->
								</div>
								<!-- /wp:column -->

								<!-- wp:column -->
								<div class="wp-block-column">
									<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
									<div class="wp-block-group">
										<!-- wp:woocommerce/product-review-author-name {"fontSize":"small"} /-->

										<!-- wp:woocommerce/product-review-rating /-->
									</div>
									<!-- /wp:group -->

									<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex"}} -->
									<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px">
										<!-- wp:woocommerce/product-review-date {"fontSize":"small"} /-->
									</div>
									<!-- /wp:group -->

									<!-- wp:woocommerce/product-review-content /-->
								</div>
								<!-- /wp:column -->
							</div>
							<!-- /wp:columns -->
							<!-- /wp:woocommerce/product-review-template -->

							<!-- wp:woocommerce/product-reviews-pagination -->
							<!-- wp:woocommerce/product-reviews-pagination-previous /-->

							<!-- wp:woocommerce/product-reviews-pagination-numbers /-->

							<!-- wp:woocommerce/product-reviews-pagination-next /-->
							<!-- /wp:woocommerce/product-reviews-pagination -->

							<!-- wp:woocommerce/product-review-form /-->
						</div>
						<!-- /wp:woocommerce/product-reviews -->
					</section>
					<!-- /wp:tab-panel --></div>
					<!-- /wp:tab-panels --></div>
					<!-- /wp:tabs -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:woocommerce/product-details -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"40%"} -->
		<div class="wp-block-column" style="flex-basis:40%">
			<!-- wp:group {"className":"is-style-ext-preset--buy-box","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
			<div class="wp-block-group is-style-ext-preset--buy-box">
				<!-- wp:group {"metadata":{"name":"Price and rating"},"layout":{"type":"flex","justifyContent":"space-between"}} -->
				<div class="wp-block-group">
					<!-- wp:woocommerce/product-price {"isDescendentOfSingleProductTemplate":true,"fontSize":"medium"} /-->

					<!-- wp:woocommerce/product-rating {"isDescendentOfSingleProductTemplate":true} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:woocommerce/add-to-cart-with-options /-->

				<!-- wp:woocommerce/product-meta -->
				<div class="wp-block-woocommerce-product-meta">
					<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
					<div class="wp-block-group">
						<!-- wp:woocommerce/product-sku {"isDescendentOfSingleProductTemplate":true} /-->

						<!-- wp:post-terms {"term":"product_cat","prefix":"Category: "} /-->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:woocommerce/product-meta -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
