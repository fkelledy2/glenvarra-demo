<?php
/**
 * Title: Latest news – three cards
 * Slug: glenvarra/news-cards
 * Categories: query
 * Description: The three most recent news posts as cards.
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--40)">
<!-- wp:heading {"className":"gv-rule"} -->
<h2 class="wp-block-heading gv-rule">Latest from the College</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong><a href="<?php echo esc_url( home_url( '/news/' ) ); ?>">All news →</a></strong></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:query {"queryId":11,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false,"sticky":""},"className":"gv-news"} -->
<div class="wp-block-query gv-news">
<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"16rem"}} -->
<!-- wp:group {"className":"gv-card","style":{"spacing":{"blockGap":"0"},"border":{"width":"1px","color":"var:preset|color|stone"}},"backgroundColor":"white","layout":{"type":"default"}} -->
<div class="wp-block-group gv-card has-border-color has-white-background-color has-background" style="border-color:var(--wp--preset--color--stone);border-width:1px">
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/10"} /-->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"0.6rem"}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
<!-- wp:group {"style":{"spacing":{"blockGap":"0.6rem"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group">
<!-- wp:post-terms {"term":"category","className":"gv-eyebrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|forest"}}}},"fontSize":"x-small"} /-->
<!-- wp:post-date {"format":"j M Y"} /-->
</div>
<!-- /wp:group -->
<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"large"} /-->
<!-- wp:post-excerpt {"excerptLength":22,"fontSize":"small"} /-->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- /wp:post-template -->
</div>
<!-- /wp:query -->
</div>
<!-- /wp:group -->
