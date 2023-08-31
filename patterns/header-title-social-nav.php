<?php
/**
 * Title:       Header (Site Title, Social, Navigation)
 * Slug:        extendable/header-title-social-nav
 * Categories:  header
 * blockTypes:  core/template-part/header
 */
?>

<!-- wp:group {"tagName":"header","align":"full","layout":{"inherit":true,"type":"constrained"}} -->
<header class="wp-block-group alignfull">
	<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0rem","padding":{"top":"clamp(1.5rem, 5vw, 2rem)","right":"clamp(1.5rem, 5vw, 2rem)","bottom":"clamp(1.5rem, 5vw, 2rem)","left":"clamp(1.5rem, 5vw, 2rem)"}}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
	<div class="wp-block-group alignfull"
		style="padding-top:clamp(1.5rem, 5vw, 2rem);padding-right:clamp(1.5rem, 5vw, 2rem);padding-bottom:clamp(1.5rem, 5vw, 2rem);padding-left:clamp(1.5rem, 5vw, 2rem)">
		<!-- wp:group {"style":{"spacing":{"blockGap":"1.5rem"}},"layout":{"type":"flex","allowOrientation":false}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo /-->
			<!-- wp:site-title {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"medium"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"flex","allowOrientation":false}} -->
		<div class="wp-block-group">
			<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"var(\u002d\u002dwp\u002d\u002dpreset\u002d\u002dcolor\u002d\u002dforeground)","size":"has-small-icon-size","className":"is-style-logos-only","layout":{"type":"flex","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"1rem"}}} -->
			<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
				<!-- wp:social-link {"url":"https://www.instagram.com/","service":"instagram"} /-->

				<!-- wp:social-link {"url":"https://www.facebook.com/","service":"facebook"} /-->

				<!-- wp:social-link {"url":"https://twitter.com/","service":"twitter"} /-->
			</ul>
			<!-- /wp:social-links -->

			<!-- wp:navigation {"overlayMenu":"always","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"right"}} -->
			<!-- wp:page-list {"isNavigationChild":true,"showSubmenuIcon":true,"openSubmenusOnClick":false} /-->
			<!-- /wp:navigation -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</header>
<!-- /wp:group -->
