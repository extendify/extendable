<?php
/**
 * Title:       Header with Center Nav and Social
 * Slug:        extendable/header-with-center-nav-and-social
 * Categories:  header
 * blockTypes:  core/template-part/header
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"clamp(1.5rem, 5vw, 2rem)","right":"clamp(1.5rem, 5vw, 2rem)","bottom":"clamp(1.5rem, 5vw, 2rem)","left":"clamp(1.5rem, 5vw, 2rem)"}}}} -->
<div class="wp-block-group alignfull"
    style="padding-top:clamp(1.5rem, 5vw, 2rem);padding-right:clamp(1.5rem, 5vw, 2rem);padding-bottom:clamp(1.5rem, 5vw, 2rem);padding-left:clamp(1.5rem, 5vw, 2rem)">
    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group">
        <!-- wp:group {"style":{"spacing":{"blockGap":"1rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group">
            <!-- wp:site-logo /-->

            <!-- wp:site-title {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"medium"} /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:navigation {"layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"right"}} -->
        <!-- wp:page-list {"isNavigationChild":true,"showSubmenuIcon":true,"openSubmenusOnClick":false} /-->
        <!-- /wp:navigation -->

        <!-- wp:social-links {"iconColor":"foreground","iconColorValue":"var(\u002d\u002dwp\u002d\u002dpreset\u002d\u002dcolor\u002d\u002dforeground)","size":"has-small-icon-size","style":{"spacing":{"blockGap":"1rem"}},"className":"is-style-logos-only ext-hidden tablet:ext-flex","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
        <ul
            class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only ext-hidden tablet:ext-flex">
            <!-- wp:social-link {"url":"https://www.instagram.com/","service":"instagram"} /-->

            <!-- wp:social-link {"url":"https://www.facebook.com/","service":"facebook"} /-->

            <!-- wp:social-link {"url":"https://twitter.com/","service":"twitter"} /-->
        </ul>
        <!-- /wp:social-links -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
