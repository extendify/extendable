<?php
/**
 * Title:       Header (Social, Center Logo & Navigation, Button)
 * Slug:        extendable/header-social-centered-logo-nav-button
 * Categories:  extendable-headers
 * blockTypes:  core/template-part/header
 */
?>

<!-- wp:group {"align":"full","layout":{"inherit":true}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002dsmall, 1.25rem)","bottom":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002dsmall, 1.25rem)"}}},"backgroundColor":"tertiary","layout":{"inherit":true}} -->
<div class="wp-block-group alignfull has-tertiary-background-color has-background" style="padding-top:var(--wp--custom--spacing--small, 1.25rem);padding-bottom:var(--wp--custom--spacing--small, 1.25rem)"><!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0rem"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
<div class="wp-block-group alignfull"><!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#000000","size":"has-small-icon-size","className":"is-style-logos-only header\u002d\u002dtitle order-2 md:order-1 hide-on-mobile","layout":{"type":"flex","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"1rem"}}} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only header--title order-2 md:order-1 hide-on-mobile"><!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /--></ul>
<!-- /wp:social-links -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem"}},"className":"header\u002d\u002dnav order-1 md:order-2 flex flex-row md:flex-col items-center no-mobile-gap","layout":{"inherit":false}} -->
<div class="wp-block-group header--nav order-1 md:order-2 flex flex-row md:flex-col items-center no-mobile-gap"><!-- wp:site-logo {"width":48,"className":"md:text-center order-2 is-style-rounded"} /-->

<!-- wp:navigation {"overlayBackgroundColor":"foreground","overlayTextColor":"background","className":"no-mobile-gap order-1 md:order-2","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"center"}} -->
<!-- wp:page-list {"isNavigationChild":true,"showSubmenuIcon":true,"openSubmenusOnClick":false} /-->
<!-- /wp:navigation -->

</div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"header\u002d\u002dextra order-3","layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons header--extra order-3"><!-- wp:button {"fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
