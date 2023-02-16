<?php
/**
 * Title:       Header (Site Title, Navigation, Button)
 * Slug:        extendable/header-title-nav-button
 * Categories:  header
 * blockTypes:  core/template-part/header
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"clamp(1.5rem, 5vw, 2rem)","right":"clamp(1.5rem, 5vw, 2rem)","bottom":"clamp(1.5rem, 5vw, 2rem)","left":"clamp(1.5rem, 5vw, 2rem)"}}}} -->
<div class="wp-block-group alignfull"
	style="padding-top:clamp(1.5rem, 5vw, 2rem);padding-right:clamp(1.5rem, 5vw, 2rem);padding-bottom:clamp(1.5rem, 5vw, 2rem);padding-left:clamp(1.5rem, 5vw, 2rem)">
	<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":120} /-->

			<!-- wp:site-title {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"medium"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"}} -->
		<div class="wp-block-group">
			<!-- wp:navigation {"layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"right"}} -->
			<!-- wp:page-list {"isNavigationChild":true,"showSubmenuIcon":true,"openSubmenusOnClick":false} /-->
			<!-- /wp:navigation -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link">Get Started</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
