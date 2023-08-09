<?php
/**
 * Title:       Footer (Logo, Copyright, Social)
 * Slug:        extendable/footer-default
 * Categories:  footer
 * blockTypes:  core/template-part/footer
 */
?>

<!-- wp:group {"align":"full","layout":{"inherit":true},"style":{"spacing":{"padding":{"bottom":"var(--wp--style--block-gap)","top":"var(--wp--style--block-gap)"}}}} -->
<div class="wp-block-group alignfull" style="padding-bottom:var(--wp--style--block-gap);padding-top:var(--wp--style--block-gap)"><!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":64} /-->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:site-title /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">© Your Company LLC</p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:social-links {"iconColor":"foreground","iconColorValue":"var(--wp--preset--color--foreground)","size":"has-small-icon-size","className":"is-style-logos-only","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"},"style":{"spacing":{"blockGap":"1rem"}}} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"https://www.instagram.com/","service":"instagram"} /-->

<!-- wp:social-link {"url":"https://www.facebook.com/","service":"facebook"} /-->

<!-- wp:social-link {"url":"https://twitter.com/","service":"twitter"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
