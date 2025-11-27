<?php
/**
 * Title: Order Confirmation
 * Slug: extendable/hidden-order-confirmation
 * Inserter: no
 */
?>
<!-- wp:group {"tagName":"main","className":"is-style-ext-preset\u002d\u002dgroup\u002d\u002dnatural-1\u002d\u002dtemplate","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"inherit":true,"type":"constrained"}} -->
<main
	class="wp-block-group is-style-ext-preset--group--natural-1--template"
	style="
		margin-top: 0;
		margin-bottom: 0;
		padding-top: var(--wp--preset--spacing--60);
		padding-bottom: var(--wp--preset--spacing--60);
	"
>
	<!-- wp:woocommerce/order-confirmation-status {"fontSize":"large"} /-->

	<!-- wp:woocommerce/order-confirmation-summary /-->

	<!-- wp:woocommerce/order-confirmation-totals-wrapper {"align":"wide"} -->
	<!-- wp:heading {"style":{"typography":{"fontSize":"24px"}}} -->
	<h2 class="wp-block-heading" style="font-size: 24px"><?php echo esc_html_x( 'Order details', 'Heading for order confirmation page order details section', 'extendable' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:woocommerce/order-confirmation-totals {"lock":{"remove":true}} /-->
	<!-- /wp:woocommerce/order-confirmation-totals-wrapper -->

	<!-- wp:woocommerce/order-confirmation-downloads-wrapper {"align":"wide"} -->
	<!-- wp:heading {"style":{"typography":{"fontSize":"24px"}}} -->
	<h2 class="wp-block-heading" style="font-size: 24px"><?php echo esc_html_x( 'Downloads', 'Heading for order confirmation page downloadable products section', 'extendable' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:woocommerce/order-confirmation-downloads {"lock":{"remove":true}} /-->
	<!-- /wp:woocommerce/order-confirmation-downloads-wrapper -->

	<!-- wp:columns {"align":"wide","className":"wc-block-order-confirmation-address-wrapper"} -->
	<div
		class="wp-block-columns alignwide wc-block-order-confirmation-address-wrapper"
	>
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:woocommerce/order-confirmation-shipping-wrapper {"align":"wide"} -->
			<!-- wp:heading {"style":{"typography":{"fontSize":"24px"}}} -->
			<h2 class="wp-block-heading" style="font-size: 24px"><?php echo esc_html_x( 'Shipping address', 'Heading for order confirmation page shipping address section', 'extendable' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:woocommerce/order-confirmation-shipping-address {"lock":{"remove":true}} /-->
			<!-- /wp:woocommerce/order-confirmation-shipping-wrapper -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:woocommerce/order-confirmation-billing-wrapper {"align":"wide"} -->
			<!-- wp:heading {"style":{"typography":{"fontSize":"24px"}}} -->
			<h2 class="wp-block-heading" style="font-size: 24px"><?php echo esc_html_x( 'Billing address', 'Heading for order confirmation page billing address section', 'extendable' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:woocommerce/order-confirmation-billing-address {"lock":{"remove":true}} /-->
			<!-- /wp:woocommerce/order-confirmation-billing-wrapper -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:woocommerce/order-confirmation-additional-fields-wrapper {"align":"wide"} -->
	<!-- wp:heading {"style":{"typography":{"fontSize":"24px"}}} -->
	<h2 class="wp-block-heading" style="font-size: 24px">
		<?php echo esc_html_x( 'Additional information', 'Heading for order confirmation page additional information section', 'extendable' ); ?>
	</h2>
	<!-- /wp:heading -->

	<!-- wp:woocommerce/order-confirmation-additional-fields /-->
	<!-- /wp:woocommerce/order-confirmation-additional-fields-wrapper -->

	<!-- wp:woocommerce/order-confirmation-additional-information /-->
</main>
<!-- /wp:group -->
