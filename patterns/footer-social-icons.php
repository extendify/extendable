<?php
/**
 * Title:       Footer with Social Icons
 * Slug:        extendable/footer-social-icons
 * Categories:  footer
 * blockTypes:  core/template-part/footer
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|60","top":"var:preset|spacing|60"}}},"layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull"
	style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
	<div class="wp-block-group">
		<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#0B0620","size":"has-normal-icon-size","style":{"spacing":{"blockGap":{"top":"10px","left":"10px"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
		<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only">
				<!-- wp:social-link {"url":"https://www.instagram.com/","service":"instagram"} /-->
				<!-- wp:social-link {"url":"https://www.facebook.com/","service":"facebook"} /-->
				<!-- wp:social-link {"url":"https://twitter.com/","service":"twitter"} /-->
		</ul>
		<!-- /wp:social-links -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php echo esc_html__( 'Empower Your Path to Success', 'extendable' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->