<?php
/**
 * Title:       Featured Three boxes with text, image.
 * Slug:        extendable/general-three-boxes
 * Categories:  columns
 */
?>

<!-- wp:group {"align":"full","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"style":{"spacing":{"blockGap":"0px"}}} -->
    <div class="wp-block-group">
        <!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"1rem"}}},"fontSize":"huge"} -->
        <h2 class="has-text-align-center has-huge-font-size" style="margin-bottom:1rem">
            <?php echo esc_html__( 'Our Comprehensive Range of Services', 'extendable' ); ?>
        </h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center">
            <?php echo esc_html__( 'We offer tailored services to meet your business needs, from planning to implementation. Let our experts assist you.', 'extendable' ); ?>
        </p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"48px"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:48px">
        <!-- wp:column {"style":{"spacing":{"blockGap":"0px"}},"backgroundColor":"tertiary"} -->
        <div class="wp-block-column has-tertiary-background-color has-background">
            <!-- wp:image {"sizeSlug":"large","className":"ext-aspect-landscape"} -->
            <figure class="wp-block-image size-large ext-aspect-landscape"><img
                    src="https://source.unsplash.com/5njylPk0gBQ/1600x1200?theme=light" alt="" /></figure>
            <!-- /wp:image -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0"},"blockGap":"8px"}}} -->
            <div class="wp-block-group"
                style="margin-top:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:heading {"level":5,"style":{"typography":{"fontSize":"25px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"700"}}} -->
                <h5 style="font-size:25px;font-style:normal;font-weight:700;text-transform:capitalize">
                    <?php echo esc_html__( 'Service 1', 'extendable' ); ?>
                </h5>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>
                    <?php echo esc_html__( 'Powerful Solutions for Your Business Success. Boost Your Performance Today.', 'extendable' ); ?>
                </p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"0px"}},"backgroundColor":"tertiary"} -->
        <div class="wp-block-column has-tertiary-background-color has-background">
            <!-- wp:image {"sizeSlug":"large","className":"ext-aspect-landscape"} -->
            <figure class="wp-block-image size-large ext-aspect-landscape"><img
                    src="https://source.unsplash.com/eOpewngf68w/1600x1200?theme=light" alt="" /></figure>
            <!-- /wp:image -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0"},"blockGap":"8px"}}} -->
            <div class="wp-block-group"
                style="margin-top:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:heading {"level":5,"style":{"typography":{"fontSize":"25px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"700"}}} -->
                <h5 style="font-size:25px;font-style:normal;font-weight:700;text-transform:capitalize">
                    <?php echo esc_html__( 'Service 2', 'extendable' ); ?>
                </h5>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>
                    <?php echo esc_html__( 'Tailored solutions to meet your unique business needs and drive success.', 'extendable' ); ?>
                </p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"0px"}},"backgroundColor":"tertiary"} -->
        <div class="wp-block-column has-tertiary-background-color has-background">
            <!-- wp:image {"sizeSlug":"large","className":"ext-aspect-landscape"} -->
            <figure class="wp-block-image size-large ext-aspect-landscape"><img
                    src="https://source.unsplash.com/YfqIxXGepKA/1600x1200?theme=light" alt="" /></figure>
            <!-- /wp:image -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0"},"blockGap":"8px"}}} -->
            <div class="wp-block-group"
                style="margin-top:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:heading {"level":5,"style":{"typography":{"fontSize":"25px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"700"}}} -->
                <h5 style="font-size:25px;font-style:normal;font-weight:700;text-transform:capitalize">
                    <?php echo esc_html__( 'Service 2', 'extendable' ); ?>
                </h5>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>
                    <?php echo esc_html__( 'Tailored solutions to meet your unique business needs and drive success.', 'extendable' ); ?>
                </p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
