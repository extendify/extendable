<?php
/**
 * Title:       Header (Navigation, Logo, Social)
 * Slug:        extendable/header-nav-logo-social
 * Categories:  extendable-headers
 * blockTypes:  core/template-part/header
 */
?>

<!-- wp:group {"align":"full","layout":{"inherit":true}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002dsmall, 1.25rem)","bottom":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002dsmall, 1.25rem)"}}},"backgroundColor":"tertiary","layout":{"inherit":true}} -->
<div class="wp-block-group alignfull has-tertiary-background-color has-background" style="padding-top:var(--wp--custom--spacing--small, 1.25rem);padding-bottom:var(--wp--custom--spacing--small, 1.25rem)"><!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0rem"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
<div class="wp-block-group alignfull">

<!-- wp:navigation {"overlayBackgroundColor":"foreground","overlayTextColor":"background","className":"header\u002d\u002dnav order-3 md:order-1","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"left","flexWrap":"nowrap"}} -->
<!-- wp:page-list {"isNavigationChild":true,"showSubmenuIcon":true,"openSubmenusOnClick":false} /-->
<!-- /wp:navigation -->

<!-- wp:site-logo {"width":48,"className":"header\u002d\u002dtitle order-1 md:order-2 md:text-center is-style-rounded"} /-->

<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#000000","size":"has-small-icon-size","className":"is-style-logos-only header\u002d\u002dextra order-2 md:order-3","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"},"style":{"spacing":{"blockGap":"1rem"}}} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only header--extra order-2 md:order-3"><!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
