<?php
/**
 * Title:       Header (Logo, Site Title, Navigation)
 * Slug:        extendable/header-default
 * Categories:  header
 * blockTypes:  core/template-part/header
 */
?>

<!-- wp:group {"align":"full","layout":{"inherit":true},"style":{"spacing":{"padding":{"bottom":"var(--wp--style--block-gap)","top":"var(--wp--style--block-gap)"}}}} -->
<div class="wp-block-group alignfull" style="padding-bottom:var(--wp--style--block-gap);padding-top:var(--wp--style--block-gap)"><!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:site-logo /-->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:site-title /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">

<!-- wp:navigation {"layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"right"}} -->
<!-- wp:page-list {"isNavigationChild":true,"showSubmenuIcon":true,"openSubmenusOnClick":false} /-->
<!-- /wp:navigation --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
