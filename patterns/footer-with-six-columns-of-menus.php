<?php
/**
 * Title:       Footer with Six Columns of Menus
 * Slug:        extendable/footer-with-six-columns-of-menus
 * Categories:  footer
 * blockTypes:  core/template-part/footer
 */
?>

<!-- wp:group {"tagName":"footer","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|40"}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<footer class="wp-block-group has-background-background-color has-background" style="padding-top:0;padding-bottom:0">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-columns alignwide"
        style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--30)">
        <!-- wp:column {"style":{"spacing":{"blockGap":"1.5rem"}}} -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":3,"fontSize":"medium"} -->
            <h3 class="wp-block-heading has-medium-font-size"><?php echo esc_html__( 'Articles', 'extendable' ); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:navigation {"overlayMenu":"never","overlayTextColor":"foreground","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"0.5rem"}}} -->
            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Blog', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Case Studies', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Whitepapers', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Industry Insights', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'News', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Webinars', 'extendable' ); ?>","url":"#","kind":"custom"} /-->
            <!-- /wp:navigation -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"1.5rem"}}} -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":3,"fontSize":"medium"} -->
            <h3 class="wp-block-heading has-medium-font-size"><?php echo esc_html__( 'Products', 'extendable' ); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:navigation {"overlayMenu":"never","overlayTextColor":"foreground","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"0.5rem"}}} -->
            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Product Overview', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Pricing Plans', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Product Support', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Product FAQ', 'extendable' ); ?>","url":"#","kind":"custom"} /-->
            <!-- /wp:navigation -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"1.5rem"}}} -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":3,"fontSize":"medium"} -->
            <h3 class="wp-block-heading has-medium-font-size"><?php echo esc_html__( 'Use cases', 'extendable' ); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:navigation {"overlayMenu":"never","overlayTextColor":"foreground","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"0.5rem"}}} -->
            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'E-commerce', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Marketing', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Education', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Non-profit', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Healthcare', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Real Estate', 'extendable' ); ?>","url":"#","kind":"custom"} /-->
            <!-- /wp:navigation -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"1.5rem"}}} -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":3,"fontSize":"medium"} -->
            <h3 class="wp-block-heading has-medium-font-size">
                <?php echo esc_html__( 'Resources', 'extendable' ); ?>
            </h3>
            <!-- /wp:heading -->

            <!-- wp:navigation {"overlayMenu":"never","overlayTextColor":"foreground","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"0.5rem"}}} -->
            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Guides', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Tutorials', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Templates', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Videos', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Webinars', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'FAQ', 'extendable' ); ?>","url":"#","kind":"custom"} /-->
            <!-- /wp:navigation -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"1.5rem"}}} -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":3,"fontSize":"medium"} -->
            <h3 class="wp-block-heading has-medium-font-size"><?php echo esc_html__( 'Company', 'extendable' ); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:navigation {"overlayMenu":"never","overlayTextColor":"foreground","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"0.5rem"}}} -->
            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'About Us', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Our Team', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Careers', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Awards', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Testimonials', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Contact us', 'extendable' ); ?>","url":"#","kind":"custom"} /-->
            <!-- /wp:navigation -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"1.5rem"}}} -->
        <div class="wp-block-column"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
            <h3 class="wp-block-heading has-medium-font-size"><?php echo esc_html__( 'Follow', 'extendable' ); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:navigation {"overlayMenu":"never","overlayTextColor":"foreground","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"0.5rem"}}} -->
            <!-- wp:navigation-link {"label":"Facebook","url":"https://www.facebook.com/","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"Twitter","url":"https://twitter.com/","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"Instagram","url":"https://www.instagram.com/","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"YouTube","url":"https://www.youtube.com/","kind":"custom"} /-->
            <!-- /wp:navigation -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull has-tertiary-background-color has-background"
        style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
        <!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
        <div class="wp-block-group alignwide">
            <!-- wp:paragraph {"fontSize":"small"} -->
            <p class="has-small-font-size"><?php echo esc_html__( '© Your Company LLC' , 'extendable' ); ?></p>
            <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"1rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group">
                <!-- wp:group -->
                <div class="wp-block-group">
                    <!-- wp:site-title {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"medium"} /-->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:social-links {"iconColor":"foreground","iconColorValue":"var(\u002d\u002dwp\u002d\u002dpreset\u002d\u002dcolor\u002d\u002dforeground)","size":"has-normal-icon-size","style":{"spacing":{"blockGap":"1rem"}},"className":"is-style-logos-only ext-justify-start tablet:ext-justify-end","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
            <ul
                class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only ext-justify-start tablet:ext-justify-end">
                <!-- wp:social-link {"url":"https://www.instagram.com/","service":"instagram"} /-->

                <!-- wp:social-link {"url":"https://www.facebook.com/","service":"facebook"} /-->

                <!-- wp:social-link {"url":"https://twitter.com/","service":"twitter"} /-->
            </ul>
            <!-- /wp:social-links -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</footer>
<!-- /wp:group -->
