<?php
/**
 * Title:       Header
 * Slug:        extendable/header
 * Categories:  header
 * blockTypes:  core/template-part/header
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30","top":"var:preset|spacing|30"}}},"layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull"
    style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
    <!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group alignwide"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group"><!-- wp:site-logo /-->

            <!-- wp:group -->
            <div class="wp-block-group">
                <!-- wp:site-title {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"medium"} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group">
            <!-- wp:navigation {"layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"right"}} -->
            <!-- wp:page-list {"isNavigationChild":true,"showSubmenuIcon":true,"openSubmenusOnClick":false} /-->
            <!-- /wp:navigation -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
