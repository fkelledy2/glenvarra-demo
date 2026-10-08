<?php
/**
 * Title: Principal's welcome
 * Slug: glenvarra/home-welcome
 * Categories: text
 * Description: Image and quote from the Principal.
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"cream","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull has-cream-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center">
<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
<!-- wp:image {"sizeSlug":"full","style":{"border":{"radius":"4px"},"shadow":"var:preset|shadow|soft"}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/campus.svg' ) ); ?>" alt="Illustration of the main house at Glenvarra" style="border-radius:4px;box-shadow:var(--wp--preset--shadow--soft)"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
<!-- wp:paragraph {"className":"gv-eyebrow","textColor":"forest","fontSize":"x-small"} -->
<p class="gv-eyebrow has-forest-color has-text-color has-x-small-font-size">Welcome from the Principal</p>
<!-- /wp:paragraph -->
<!-- wp:quote -->
<blockquote class="wp-block-quote"><!-- wp:paragraph -->
<p>We are big enough to offer a remarkable breadth of opportunity, and small enough that every teacher knows every pupil by name. That combination is what makes a Glenvarra education.</p>
<!-- /wp:paragraph --><cite>Dr Aoife Brennan, Principal</cite></blockquote>
<!-- /wp:quote -->
<!-- wp:paragraph -->
<p>Our ethos is multi-denominational and inclusive: pupils of every faith and none learn side by side, and are encouraged to think for themselves, to be kind, and to contribute to the community beyond the school gates.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/about/' ) ); ?>">Read the Principal's welcome</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
