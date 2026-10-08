<?php
/**
 * Title: Call to action band
 * Slug: glenvarra/cta-band
 * Categories: call-to-action
 * Description: Full-width band inviting families to register interest.
 */
?>
<!-- wp:group {"align":"full","className":"gv-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"textColor":"cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull gv-hero has-cream-color has-text-color" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
<!-- wp:heading {"textAlign":"center","textColor":"white"} -->
<h2 class="wp-block-heading has-text-align-center has-white-color has-text-color">Thinking about Glenvarra for your child?</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Register your interest and our Admissions team will be in touch within two working days.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"gold","textColor":"ink"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-ink-color has-gold-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( home_url( '/admissions/expression-of-interest/' ) ); ?>">Expression of interest</a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline","style":{"border":{"width":"1px"}},"borderColor":"cream","textColor":"cream"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-cream-color has-text-color has-border-color has-cream-border-color wp-element-button" href="<?php echo esc_url( home_url( '/admissions/fees-and-financial-aid/' ) ); ?>" style="border-width:1px">Fees &amp; bursaries</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
