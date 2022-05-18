<?php
/**
 * Title:       Header (Logo, Navigation, Button)
 * Slug:        extendable/header-logo-nav-button
 * Categories:  header
 * blockTypes:  core/template-part/header
 */
?>

<!-- wp:group {"align":"full","layout":{"inherit":true}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002dsmall, 1.25rem)","bottom":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002dsmall, 1.25rem)"}}},"layout":{"inherit":true}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--custom--spacing--small, 1.25rem);padding-bottom:var(--wp--custom--spacing--small, 1.25rem)"><!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0rem"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"className":"header\u002d\u002dtitle order-1"} -->
<div class="wp-block-group header--title order-1"><!-- wp:site-title {"className":"is-style-rounded"} /--></div>
<!-- /wp:group -->

<!-- wp:navigation {"overlayBackgroundColor":"foreground","overlayTextColor":"background","className":"header\u002d\u002dnav order-3 md:order-2","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"center","flexWrap":"nowrap"}} -->
<!-- wp:page-list {"isNavigationChild":true,"showSubmenuIcon":true,"openSubmenusOnClick":false} /-->
<!-- /wp:navigation -->

<!-- wp:buttons {"className":"header\u002d\u002dextra order-2 md:order-3","layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons header--extra order-2 md:order-3"><!-- wp:button {"fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
