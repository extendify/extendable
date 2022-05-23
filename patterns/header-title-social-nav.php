<?php
/**
 * Title:       Header (Site Title, Social, Navigation)
 * Slug:        extendable/header-title-social-nav
 * Categories:  header
 * blockTypes:  core/template-part/header
 */
?>

<!-- wp:group {"align":"full","layout":{"inherit":true}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002dsmall, 1.25rem)","bottom":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002dsmall, 1.25rem)"}}},"layout":{"inherit":true}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--custom--spacing--small, 1.25rem);padding-bottom:var(--wp--custom--spacing--small, 1.25rem)"><!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0rem"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"style":{"spacing":{"blockGap":"1.5rem"}},"layout":{"type":"flex","allowOrientation":false}} -->
<div class="wp-block-group"><!-- wp:site-title /--></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","allowOrientation":false}} -->
<div class="wp-block-group"><!-- wp:social-links {"iconColor":"foreground","iconColorValue":"var(--wp--preset--color--foreground)","size":"has-small-icon-size","className":"is-style-logos-only","layout":{"type":"flex","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"1rem"}}} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /--></ul>
<!-- /wp:social-links -->

<!-- wp:navigation {"overlayMenu":"always","overlayBackgroundColor":"primary","overlayTextColor":"secondary","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"right"}} -->
<!-- wp:page-list /-->
<!-- /wp:navigation --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
