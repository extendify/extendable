<?php
/**
 * Title:    Product gallery, thumbnails below, left
 * Slug:     extendable/hidden-product-gallery-left-thumbs-below
 * Inserter: no
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|64"}}} -->
<div class="wp-block-group alignwide">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|25"}}} -->
	<div class="wp-block-group">
		<!-- wp:woocommerce/breadcrumbs /-->

		<!-- wp:woocommerce/store-notices /-->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|64"}}} -->
		<div class="wp-block-columns alignwide">
			<!-- wp:column {"width":"50%"} -->
			<div class="wp-block-column" style="flex-basis:50%">
				<!-- wp:woocommerce/product-gallery {"layout":{"type":"flex","orientation":"vertical"}} -->
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
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"50%"} -->
			<div class="wp-block-column" style="flex-basis:50%">
				<!-- wp:group {"className":"is-style-ext-preset--buy-box","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
				<div class="wp-block-group is-style-ext-preset--buy-box">
					<!-- wp:group {"metadata":{"name":"Intro"},"style":{"spacing":{"blockGap":"var:preset|spacing|25"}}} -->
					<div class="wp-block-group">
						<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
						<div class="wp-block-group">
							<!-- wp:group {"metadata":{"name":"Name"},"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
							<div class="wp-block-group">
								<!-- wp:post-title {"level":1,"fontSize":"large","__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

								<!-- wp:woocommerce/product-price {"isDescendentOfSingleProductTemplate":true,"fontSize":"medium"} /-->
							</div>
							<!-- /wp:group -->

							<!-- wp:woocommerce/product-rating {"isDescendentOfSingleProductTemplate":true} /-->
						</div>
						<!-- /wp:group -->

						<!-- wp:post-excerpt {"__woocommerceNamespace":"woocommerce/product-query/product-summary"} /-->
					</div>
					<!-- /wp:group -->

					<!-- wp:woocommerce/add-to-cart-form {"quantitySelectorStyle":"stepper"} /-->

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

					<!-- wp:woocommerce/product-details -->
					<div class="wp-block-woocommerce-product-details">
						<!-- wp:accordion {"metadata":{"isDescendantOfProductDetails":true}} -->
						<div role="group" class="wp-block-accordion">
							<!-- wp:accordion-item {"openByDefault":true} -->
							<div class="wp-block-accordion-item is-open">
								<!-- wp:accordion-heading {"openByDefault":true} -->
								<h3 class="wp-block-accordion-heading has-icon has-icon-right"><button type="button" class="wp-block-accordion-heading__toggle"><span class="wp-block-accordion-heading__toggle-title"><?php echo esc_html_x( 'Description', 'Accordion section heading on the single product page', 'extendable' ); ?></span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
								<!-- /wp:accordion-heading -->

								<!-- wp:accordion-panel -->
								<div role="region" class="wp-block-accordion-panel"><!-- wp:woocommerce/product-description /--></div>
								<!-- /wp:accordion-panel -->
							</div>
							<!-- /wp:accordion-item -->

							<!-- wp:accordion-item -->
							<div class="wp-block-accordion-item">
								<!-- wp:accordion-heading -->
								<h3 class="wp-block-accordion-heading has-icon has-icon-right"><button type="button" class="wp-block-accordion-heading__toggle"><span class="wp-block-accordion-heading__toggle-title"><?php echo esc_html_x( 'Additional information', 'Accordion section heading on the single product page', 'extendable' ); ?></span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
								<!-- /wp:accordion-heading -->

								<!-- wp:accordion-panel -->
								<div role="region" class="wp-block-accordion-panel"><!-- wp:woocommerce/product-specifications /--></div>
								<!-- /wp:accordion-panel -->
							</div>
							<!-- /wp:accordion-item -->

							<!-- wp:accordion-item -->
							<div class="wp-block-accordion-item">
								<!-- wp:accordion-heading -->
								<h3 class="wp-block-accordion-heading has-icon has-icon-right"><button type="button" class="wp-block-accordion-heading__toggle"><span class="wp-block-accordion-heading__toggle-title"><?php echo esc_html_x( 'Reviews', 'Accordion section heading on the single product page', 'extendable' ); ?></span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
								<!-- /wp:accordion-heading -->

								<!-- wp:accordion-panel -->
								<div role="region" class="wp-block-accordion-panel">
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
								</div>
								<!-- /wp:accordion-panel -->
							</div>
							<!-- /wp:accordion-item -->
						</div>
						<!-- /wp:accordion -->
					</div>
					<!-- /wp:woocommerce/product-details -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
