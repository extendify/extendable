<?php
/**
 * Title:       Footer, Logo and Navigation TEST
 * Slug:        extendable/footer-logo-nav
 * Categories:  footer
 * blockTypes:  core/template-part/footer
 */
?>

<!-- wp:group {"tagName":"footer","align":"full"} -->
<footer class="wp-block-group alignfull">
	<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0rem","padding":{"top":"clamp(1.5rem, 5vw, 2rem)","right":"clamp(1.5rem, 5vw, 2rem)","bottom":"clamp(1.5rem, 5vw, 2rem)","left":"clamp(1.5rem, 5vw, 2rem)"}}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
	<div class="wp-block-group alignfull"
		style="padding-top:clamp(1.5rem, 5vw, 2rem);padding-right:clamp(1.5rem, 5vw, 2rem);padding-bottom:clamp(1.5rem, 5vw, 2rem);padding-left:clamp(1.5rem, 5vw, 2rem)">
		<!-- wp:group {"layout":{"type":"flex","allowOrientation":false}} -->
		<div class="wp-block-group">
			<!-- wp:site-title {"className":"is-style-rounded"} /-->

			<!-- wp:paragraph {"align":"right","fontSize":"small"} -->
			<p class="has-text-align-right has-small-font-size">Proudly powered by <a href="https://wordpress.org"
					rel="nofollow">WordPress</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:navigation {"ref":85,"className":"header\u002d\u002dnav order-3 md:order-2","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"right","flexWrap":"nowrap"}} /-->
	</div>
	<!-- /wp:group -->
</footer>
<!-- /wp:group -->
