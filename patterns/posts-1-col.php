<?php
/**
 * Title: List of posts, 1 column
 * Slug: extendable/posts-1-col
 * Categories: query
 * Block Types: core/query
 */
?>

<!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide","style":{"spacing":{"padding":{"bottom":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002dmedium)","top":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002dmedium)"},"margin":{"top":"0px","bottom":"0px"}}},"layout":{"inherit":true}} -->
<div class="wp-block-query alignwide"
	style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--custom--spacing--medium);padding-bottom:var(--wp--custom--spacing--medium)">
	<!-- wp:post-template {"align":"wide"} -->
	<!-- wp:group {"style":{"spacing":{"blockGap":"2.5rem"}},"layout":{"inherit":true}} -->
	<div class="wp-block-group">
		<!-- wp:post-featured-image {"isLink":true,"align":"wide"} /-->

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
