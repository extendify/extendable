<?php
/**
 * Title:       Header with Center Logo and Social
 * Slug:        extendable/header-with-center-logo-and-social
 * Categories:  header
 * blockTypes:  core/template-part/header
 */
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
    <!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"align":"full","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"},"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-columns alignfull are-vertically-aligned-center is-not-stacked-on-mobile"
        style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
        <!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%">
            <!-- wp:navigation {"layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"left"}} -->
            <!-- wp:page-list /-->
            <!-- /wp:navigation -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"16%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:16%">
            <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
            <div class="wp-block-group"><!-- wp:site-logo /--></div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%">
            <!-- wp:social-links {"iconColor":"foreground","iconColorValue":"var(\u002d\u002dwp\u002d\u002dpreset\u002d\u002dcolor\u002d\u002dforeground)","size":"has-small-icon-size","style":{"spacing":{"blockGap":"1rem"}},"className":"is-style-logos-only","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
            <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
                <!-- wp:social-link {"url":"https://www.instagram.com/","service":"instagram"} /-->

                <!-- wp:social-link {"url":"https://www.facebook.com/","service":"facebook"} /-->

                <!-- wp:social-link {"url":"https://twitter.com/","service":"twitter"} /-->
            </ul>
            <!-- /wp:social-links -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
