<?php
/**
 * Title:       Header (Logo, Navigation, Button)
 * Slug:        extendable/header-logo-nav-social-button
 * Categories:  header
 * blockTypes:  core/template-part/header
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0rem","padding":{"top":"2rem","bottom":"2rem"}}},"backgroundColor":"background","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
<div class="wp-block-group alignfull has-background-background-color has-background" style="padding-top:2rem;padding-bottom:2rem"><!-- wp:group {"style":{"spacing":{"blockGap":"1.5rem"}},"layout":{"type":"flex","allowOrientation":false}} -->
<div class="wp-block-group"><!-- wp:site-title {"className":"is-style-rounded order-2 md:order-1"} /-->

<!-- wp:navigation {"overlayBackgroundColor":"foreground","overlayTextColor":"background","className":"order-1 md:order-2","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"right"}} -->
<!-- wp:page-list /-->
<!-- /wp:navigation --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","allowOrientation":false}} -->
<div class="wp-block-group"><!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#000000","size":"has-small-icon-size","className":"is-style-logos-only","layout":{"type":"flex","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"1rem"}}} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /--></ul>
<!-- /wp:social-links -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
