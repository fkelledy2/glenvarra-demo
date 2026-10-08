<?php
/**
 * Title: Home hero with admissions notice
 * Slug: glenvarra/home-hero
 * Categories: banner
 * Description: Full-width welcome banner with calls to action and an admissions notice card.
 */
?>
<!-- wp:group {"align":"full","className":"gv-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"cream","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull gv-hero has-cream-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center">
<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
<!-- wp:paragraph {"className":"gv-eyebrow","textColor":"gold","fontSize":"x-small"} -->
<p class="gv-eyebrow has-gold-color has-text-color has-x-small-font-size">Junior School · Secondary · Boarding — since 1894</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":1,"textColor":"white","fontSize":"display"} -->
<h1 class="wp-block-heading has-white-color has-text-color has-display-font-size">A school where every pupil is known.</h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.6"}},"fontSize":"large"} -->
<p class="has-large-font-size" style="line-height:1.6">Glenvarra College is an independent, multi-denominational day and boarding school for girls and boys aged 4 to 18, set on forty acres at the foot of the Wicklow Mountains, forty minutes from Dublin.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
<!-- wp:button {"backgroundColor":"gold","textColor":"ink"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-ink-color has-gold-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( home_url( '/admissions/expression-of-interest/' ) ); ?>">Book a place at Open Morning</a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline","style":{"border":{"width":"1px"}},"borderColor":"cream","textColor":"cream"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-cream-color has-text-color has-border-color has-cream-border-color wp-element-button" href="<?php echo esc_url( home_url( '/about/' ) ); ?>" style="border-width:1px">Discover Glenvarra</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"0.9rem"},"border":{"top":{"color":"var:preset|color|gold","width":"4px"}},"elements":{"link":{"color":{"text":"var:preset|color|forest"}}}},"backgroundColor":"cream","textColor":"ink","shadow":"var:preset|shadow|soft","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-ink-color has-cream-background-color has-text-color has-background has-link-color" style="border-top-color:var(--wp--preset--color--gold);border-top-width:4px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50);box-shadow:var(--wp--preset--shadow--soft)">
<!-- wp:paragraph {"className":"gv-eyebrow","textColor":"forest","fontSize":"x-small"} -->
<p class="gv-eyebrow has-forest-color has-text-color has-x-small-font-size">Admissions 2027/28</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size">Annual Admissions Notice</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Applications for First Year, Junior Infants and boarding places in September 2027 are now open. Read the notice and our Admissions Policy before applying.</p>
<!-- /wp:paragraph -->
<!-- wp:list {"style":{"typography":{"lineHeight":"1.9"}},"fontSize":"small"} -->
<ul style="line-height:1.9" class="wp-block-list has-small-font-size">
<!-- wp:list-item --><li><strong>Opens:</strong> 1 October 2026</li><!-- /wp:list-item -->
<!-- wp:list-item --><li><strong>Closes:</strong> 4pm, 27 November 2026</li><!-- /wp:list-item -->
<!-- wp:list-item --><li><strong>Offers issued by:</strong> 22 January 2027</li><!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong><a href="<?php echo esc_url( home_url( '/admissions/annual-admissions-notice/' ) ); ?>">Read the full notice →</a></strong></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
