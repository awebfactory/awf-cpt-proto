<?php
/**
 * Title: single-project
 * Slug: awforgtheme/single-project
 * Categories: hidden
 * Inserter: no
 */
?>
<!-- wp:template-part {"slug":"header","theme":"awforgtheme","tagName":"header","className":"site-header"} /-->

<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<main class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|70","top":"var:preset|spacing|100"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--100);margin-bottom:var(--wp--preset--spacing--70)"><!-- wp:post-title {"textAlign":"left","level":1,"align":"wide"} /-->

<!-- wp:post-featured-image {"align":"wide"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:awebfactory/render-single-meta-field {"selectedPostType":"project","selectedPostField":"awebfactory_project_short_name"} /-->

<!-- wp:post-content {"layout":{"inherit":true}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"866px"}} -->
<div class="wp-block-group alignwide"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"none"}},"fontSize":"heading-4"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-4-font-size" style="font-style:normal;font-weight:700;text-transform:none">This is really happening!</h2>
<!-- /wp:heading -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>Starting: </p>
<!-- /wp:paragraph -->

<!-- wp:awebfactory/render-single-meta-field {"selectedPostType":"project","selectedPostField":"awebfactory_project_start_date"} /-->

<!-- wp:paragraph -->
<p>Ending: </p>
<!-- /wp:paragraph -->

<!-- wp:awebfactory/render-single-meta-field {"selectedPostType":"project","selectedPostField":"awebfactory_project_completion_date"} /--></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"center","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size">This block is calling you to action! It is time to buy
		something, read something, contact someone or whatever else this section is asking you to do.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">Read more</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"}}},"gradient":"bg-color-bottom","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide has-bg-color-bottom-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"0","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"blockGap":"var:preset|spacing|40","padding":{"bottom":"var:preset|spacing|80"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size"><strong>The Time is Now</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Make a Change</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained","contentSize":"660px","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:awebfactory/render-single-meta-field {"selectedPostType":"project","selectedPostField":"awebfactory_project_description"} /-->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size">We’re calling you to action! It is time to buy something, read something,
					or whatever else this section is asking of you.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">Read More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom","width":"33%"} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:33%"><!-- wp:image {"linkDestination":"none"} -->
<figure class="wp-block-image"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/black-3x4.png" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|body-gutter"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--body-gutter)"><!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|90"},"padding":{"top":"var:preset|spacing|10"},"blockGap":"var:preset|spacing|40"},"border":{"top":{"width":"1px"}}},"layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group" style="border-top-width:1px;margin-top:var(--wp--preset--spacing--90);padding-top:var(--wp--preset--spacing--10)"><!-- wp:group {"style":{"textColor":"primary","spacing":{"blockGap":"0em"}},"textColor":"secondary","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","flexWrap":"nowrap"}} -->
<div class="wp-block-group has-secondary-color has-text-color"><!-- wp:group {"style":{"spacing":{"blockGap":"0.2em"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>By</p>
<!-- /wp:paragraph -->

<!-- wp:post-author-name {"isLink":true} /--></div>
<!-- /wp:group -->

<!-- wp:post-date {"format":"Y.m.d"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"textColor":"primary","spacing":{"blockGap":"var:preset|spacing|10"}},"textColor":"secondary","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","flexWrap":"nowrap"}} -->
<div class="wp-block-group has-secondary-color has-text-color"><!-- wp:paragraph -->
<p>Posted in</p>
<!-- /wp:paragraph -->

<!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.01em"}},"className":"is-style-awforgtheme-terms-buttons","fontSize":"tiny"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"comments","theme":"awforgtheme","align":"full","className":"comments"} /-->

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|100"}}},"className":"hide-empty","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide hide-empty" style="margin-top:var(--wp--preset--spacing--100)"><!-- wp:query-pagination {"align":"wide","style":{"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase"}},"className":"alignwide","layout":{"type":"flex","justifyContent":"stretch","orientation":"vertical"},"fontSize":"heading-1"} -->
<!-- wp:post-navigation-link {"type":"previous","label":"previous","arrow":"arrow"} /-->

<!-- wp:post-navigation-link {"label":"Next","linkLabel":true,"arrow":"arrow"} /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","theme":"awforgtheme","tagName":"footer","className":"site-footer"} /-->