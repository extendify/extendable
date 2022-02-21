<?php
/**
 * Default footer
 */
return array(
	'title'      => __( 'Footer with a call to action (Dark)', 'extendable' ),
	'categories' => array( 'ext-all', 'ext-footer' ),
	'blockTypes' => array( 'core/template-part/footer' ),
	'content'    => '<!-- wp:group {"align":"full","layout":{"inherit":true}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002dlarge, 8rem)","bottom":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002dsmall, 1.25rem)"}}},"backgroundColor":"foreground","textColor":"background","layout":{"inherit":false}} -->
<div class="wp-block-group alignfull has-background-color has-foreground-background-color has-text-color has-background" style="padding-top:var(--wp--custom--spacing--large, 8rem);padding-bottom:var(--wp--custom--spacing--small, 1.25rem)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002dmedium, 5rem)","bottom":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002dlarge, 8rem)","right":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002douter, 1.25rem)","left":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002douter, 1.25rem)"}}},"layout":{"inherit":false}} -->
<div class="wp-block-group" style="padding-top:var(--wp--custom--spacing--medium, 5rem);padding-right:var(--wp--custom--spacing--outer, 1.25rem);padding-bottom:var(--wp--custom--spacing--large, 8rem);padding-left:var(--wp--custom--spacing--outer, 1.25rem)"><!-- wp:heading {"textAlign":"center","fontSize":"x-large"} -->
<h2 class="has-text-align-center has-x-large-font-size" id="let-s-work-together">Let\'s Work Together</h2>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link">Contact Us</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0rem"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"style":{"spacing":{"blockGap":"0rem"}},"className":"flex-col md:flex-row items-start md:items-center","layout":{"type":"flex","allowOrientation":false}} -->
<div class="wp-block-group flex-col md:flex-row items-start md:items-center"><!-- wp:site-title {"style":{"spacing":{"margin":{"right":"1.75rem"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} /-->

<!-- wp:paragraph {"align":"right","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"0.95rem"}},"textColor":"secondary"} -->
<p class="has-text-align-right has-secondary-color has-text-color has-link-color" style="font-size:0.95rem">Proudly powered by <a href="https://wordpress.org" rel="nofollow">WordPress</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:navigation {"ref":177,"textColor":"secondary","overlayBackgroundColor":"foreground","overlayTextColor":"background","className":"header\u002d\u002dnav order-3 md:order-2","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"right","flexWrap":"nowrap"}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
);
