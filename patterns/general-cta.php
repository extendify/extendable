<?php
/**
 * Title:       Call to action
 * Slug:        extendable/general-cta
 * Categories:  text
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0px","padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"tertiary","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull has-tertiary-background-color has-background"
    style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
    <!-- wp:heading {"textAlign":"center","level":6,"fontSize":"small"} -->
    <h6 class="has-text-align-center has-small-font-size">
        <?php echo esc_html__( 'Get Started', 'extendable' ); ?>
    </h6>
    <!-- /wp:heading -->

    <!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"top":"0px","bottom":"1rem"}}}} -->
    <h1 class="has-text-align-center" style="margin-top:0px;margin-bottom:1rem">
        <?php echo esc_html__( 'Ready to Take the Next Step?', 'extendable' ); ?>
    </h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center">
        <?php echo esc_html__( 'Take action now to improve your business and achieve success.', 'extendable' ); ?>
    </p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"3rem"},"blockGap":"1.5rem"}}} -->
    <div class="wp-block-buttons" style="margin-top:3rem"><!-- wp:button -->
        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button">
                <?php echo esc_html__( 'Get Started', 'extendable' ); ?>
            </a></div>
        <!-- /wp:button -->

        <!-- wp:button {"className":"is-style-outline"} -->
        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">
                <?php echo esc_html__( 'Learn More', 'extendable' ); ?>
            </a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->
