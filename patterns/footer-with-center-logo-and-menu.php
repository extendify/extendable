<?php
/**
 * Title:       Footer with Center Logo and Menu
 * Slug:        extendable/footer-with-center-logo-and-menu
 * Categories:  footer
 * blockTypes:  core/template-part/footer
 */
?>

<!-- wp:group {"tagName":"footer","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|30"}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<footer class="wp-block-group has-background-background-color has-background"
    style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--30)">
    <!-- wp:group {"style":{"spacing":{"blockGap":"1rem"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
    <div class="wp-block-group">
        <!-- wp:site-logo /-->

        <!-- wp:group -->
        <div class="wp-block-group">
            <!-- wp:site-title {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"medium"} /-->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:navigation {"align":"wide","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"center"}} -->
    <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Solutions', 'extendable' ); ?>","url":"#","kind":"custom"} /-->
    <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Awards', 'extendable' ); ?>","type":"","id":"","url":"#","kind":"custom"} /-->
    <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Privacy Policy', 'extendable' ); ?>","url":"#","kind":"custom"} /-->
    <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Terms \u0026 Conditions', 'extendable' ); ?>","url":"#","kind":"custom"} /-->
    <!-- /wp:navigation -->

    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30"},"margin":{"top":"var:preset|spacing|50"}},"border":{"top":{"color":"#cccccca6","width":"1px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group alignwide"
        style="border-top-color:#cccccca6;border-top-width:1px;margin-top:var(--wp--preset--spacing--50);padding-top:var(--wp--preset--spacing--30)">
        <!-- wp:paragraph {"fontSize":"small"} -->
        <p class="has-small-font-size" <?php echo esc_html__( '© Your Company LLC' , 'extendable' ); ?>/p>
            <!-- /wp:paragraph -->

            <!-- wp:social-links {"iconColor":"foreground","iconColorValue":"var(\u002d\u002dwp\u002d\u002dpreset\u002d\u002dcolor\u002d\u002dforeground)","size":"has-small-icon-size","style":{"spacing":{"blockGap":"1rem"}},"className":"is-style-logos-only ext-justify-start tablet:ext-justify-end","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
        <ul
            class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only ext-justify-start tablet:ext-justify-end">
            <!-- wp:social-link {"url":"https://www.instagram.com/","service":"instagram"} /-->

            <!-- wp:social-link {"url":"https://www.facebook.com/","service":"facebook"} /-->

            <!-- wp:social-link {"url":"https://twitter.com/","service":"twitter"} /-->
        </ul>
        <!-- /wp:social-links -->
    </div>
    <!-- /wp:group -->
</footer>
<!-- /wp:group -->
