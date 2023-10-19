<?php
/**
 * Title:       Footer with Three Columns of Menus
 * Slug:        extendable/footer-mega
 * Categories:  footer
 * blockTypes:  core/template-part/footer
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"3rem","padding":{"top":"var:preset|spacing|60"},"margin":{"top":"0"}}},"backgroundColor":"foreground","textColor":"background","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-color has-foreground-background-color has-text-color has-background"
    style="margin-top:0;padding-top:var(--wp--preset--spacing--60)">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"bottom":"1rem"},"blockGap":"3rem"}}} -->
    <div class="wp-block-columns alignwide" style="padding-bottom:1rem">
        <!-- wp:column {"width":"33.3%","style":{"spacing":{"blockGap":"1rem"}}} -->
        <div class="wp-block-column" style="flex-basis:33.3%">
            <!-- wp:site-title {"isLink":false,"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"large"} /-->

            <!-- wp:site-tagline {"fontSize":"small"} /-->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"1.5rem"}}} -->
        <div class="wp-block-column"><!-- wp:heading {"level":3,"textColor":"background","fontSize":"medium"} -->
            <h3 class="wp-block-heading has-background-color has-text-color has-medium-font-size">
                <?php echo esc_html__( 'Products', 'extendable' ); ?>
            </h3>
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
        <div class="wp-block-column"><!-- wp:heading {"level":3,"textColor":"background","fontSize":"medium"} -->
            <h3 class="wp-block-heading has-background-color has-text-color has-medium-font-size">
                <?php echo esc_html__( 'Articles', 'extendable' ); ?>
            </h3>
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
        <div class="wp-block-column"><!-- wp:heading {"level":3,"textColor":"background","fontSize":"medium"} -->
            <h3 class="wp-block-heading has-background-color has-text-color has-medium-font-size">
                <?php echo esc_html__( 'About', 'extendable' ); ?>
            </h3>
            <!-- /wp:heading -->

            <!-- wp:navigation {"overlayMenu":"never","overlayTextColor":"foreground","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"0.5rem"}}} -->
            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'About Us', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Our Team', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Careers', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Awards', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Testimonials', 'extendable' ); ?>","url":"#","kind":"custom"} /-->

            <!-- wp:navigation-link {"label":"<?php echo esc_html__( 'Contact Us', 'extendable' ); ?>","url":"#","kind":"custom"} /-->
            <!-- /wp:navigation -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:separator {"align":"full","style":{"color":{"background":"#ffffff1a"}},"className":"alignwide is-style-wide"} -->
    <hr class="wp-block-separator alignfull has-text-color has-alpha-channel-opacity has-background alignwide is-style-wide"
        style="background-color:#ffffff1a;color:#ffffff1a" />
    <!-- /wp:separator -->

    <!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":"2rem","padding":{"bottom":"1rem"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center" style="padding-bottom:1rem">
        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"flexWrap":"wrap"}} -->
            <div class="wp-block-group"><!-- wp:paragraph {"fontSize":"small"} -->
                <p class="has-small-font-size">
                    <?php echo esc_html__( '© Your Company LLC', 'extendable' ); ?>
                </p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:social-links {"iconColor":"white","iconColorValue":"#ffffff","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"top":"1.5rem","left":"1.5rem"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"right"}} -->
            <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
                <!-- wp:social-link {"url":"https://www.facebook.com/","service":"facebook"} /-->

                <!-- wp:social-link {"url":"https://twitter.com/","service":"twitter"} /-->

                <!-- wp:social-link {"url":"https://www.instagram.com/","service":"instagram"} /-->

                <!-- wp:social-link {"url":"https://www.linkedin.com/","service":"linkedin"} /-->

                <!-- wp:social-link {"url":"https://www.tiktok.com/","service":"tiktok"} /-->

                <!-- wp:social-link {"url":"https://www.youtube.com/","service":"youtube"} /-->
            </ul>
            <!-- /wp:social-links -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
