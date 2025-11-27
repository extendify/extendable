<?php
/**
 * Title: List of posts, 1 column
 * Slug: extendable/posts-1-col
 * Categories: query
 * Block Types: core/query
 */
?>

<!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide","layout":{"inherit":true}} -->
<div class="wp-block-query alignwide">
    <!-- wp:post-template {"align":"wide"} -->
    <!-- wp:group {"style":{"spacing":{"blockGap":"2.5rem"}},"layout":{"inherit":true}} -->
    <div class="wp-block-group">
		<!-- wp:group {"metadata":{"name":"Featured Image"},"align":"wide","className":"is-style-ext-preset\u002d\u002dgroup\u002d\u002dnatural-1\u002d\u002ditem-card-1\u002d\u002dalign-start","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group alignwide is-style-ext-preset--group--natural-1--item-card-1--align-start" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","align":"wide"} /-->
			</div>
		<!-- /wp:group -->
        <!-- wp:group {"style":{"spacing":{"blockGap":"1rem"}},"layout":{"inherit":false},"fontSize":"small"} -->
        <div class="wp-block-group has-small-font-size">
            <!-- wp:post-title {"isLink":true} /-->

            <!-- wp:group {"style":{"spacing":{"blockGap":"1.5rem"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
            <div class="wp-block-group">
                <!-- wp:post-date /-->

                <!-- wp:post-terms {"term":"category"} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- wp:post-excerpt {"style":{"spacing":{"margin":{"top":"1.5rem"}}}} /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:spacer {"height":"3rem"} -->
    <div style="height:3rem" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->
    <!-- /wp:post-template -->

    <!-- wp:query-pagination {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
    <!-- wp:query-pagination-previous /-->

    <!-- wp:query-pagination-numbers /-->

    <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->

    <!-- wp:query-no-results -->
    <!-- wp:pattern {"slug":"extendable/hidden-no-results"} /-->
    <!-- /wp:query-no-results -->

</div>
<!-- /wp:query -->
