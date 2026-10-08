<?php
/**
 * Title: Site header
 * Slug: glenvarra/header
 * Categories: header
 * Block Types: core/template-part/header
 * Inserter: no
 */

$glenvarra_nav_id = (int) get_option( 'glenvarra_nav_id' );
?>
<!-- wp:group {"className":"gv-topbar","style":{"spacing":{"padding":{"top":"0.45rem","bottom":"0.45rem"}},"elements":{"link":{"color":{"text":"var:preset|color|cream"}}}},"backgroundColor":"ink","textColor":"cream","fontSize":"x-small","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group gv-topbar has-cream-color has-ink-background-color has-text-color has-background has-link-color has-x-small-font-size" style="padding-top:0.45rem;padding-bottom:0.45rem">
<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"gv-hide-mobile"} -->
<p class="gv-hide-mobile">Independent · Multi-denominational · Junior School, Secondary &amp; Boarding</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p><a href="<?php echo esc_url( home_url( '/parents/' ) ); ?>">Parents</a>  ·  <a href="<?php echo esc_url( home_url( '/past-pupils/' ) ); ?>">Past Pupils</a>  ·  <a href="<?php echo esc_url( home_url( '/academic/transition-year/' ) ); ?>">TY</a>  ·  <a href="<?php echo esc_url( home_url( '/calendar/' ) ); ?>">Calendar</a>  ·  <a href="tel:+35312345678">+353 1 234 5678</a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"gv-header","style":{"spacing":{"padding":{"top":"0.9rem","bottom":"0.9rem"}}},"backgroundColor":"white","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group gv-header has-white-background-color has-background" style="padding-top:0.9rem;padding-bottom:0.9rem">
<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group">
<!-- wp:group {"style":{"spacing":{"blockGap":"0.8rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:image {"width":"44px","sizeSlug":"full","linkDestination":"custom"} -->
<figure class="wp-block-image size-full is-resized"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/crest.svg' ) ); ?>" alt="Glenvarra College crest – home" style="width:44px"/></a></figure>
<!-- /wp:image -->
<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group">
<!-- wp:site-title {"level":0} /-->
<!-- wp:paragraph {"className":"gv-eyebrow gv-hide-mobile","style":{"typography":{"fontSize":"0.66rem"}},"textColor":"muted"} -->
<p class="gv-eyebrow gv-hide-mobile has-muted-color has-text-color" style="font-size:0.66rem">Est. 1894 · Ad lucem per laborem</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":"0.6rem"}}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline gv-hide-mobile","style":{"border":{"width":"1px"}},"borderColor":"forest","textColor":"forest"} -->
<div class="wp-block-button is-style-outline gv-hide-mobile"><a class="wp-block-button__link has-forest-color has-text-color has-border-color has-forest-border-color wp-element-button" href="<?php echo esc_url( home_url( '/admissions/expression-of-interest/' ) ); ?>" style="border-width:1px">Book a visit</a></div>
<!-- /wp:button -->
<!-- wp:button {"backgroundColor":"gold","textColor":"ink"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-ink-color has-gold-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( home_url( '/admissions/' ) ); ?>">Apply</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"gv-navbar","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"backgroundColor":"forest","textColor":"white","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group gv-navbar has-white-color has-forest-background-color has-text-color has-background has-link-color" style="padding-top:0;padding-bottom:0">
<?php if ( $glenvarra_nav_id && 'wp_navigation' === get_post_type( $glenvarra_nav_id ) ) : ?>
<!-- wp:navigation {"ref":<?php echo (int) $glenvarra_nav_id; ?>,"overlayMenu":"mobile","overlayBackgroundColor":"ink","overlayTextColor":"white","layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"0"}}} /-->
<?php else : ?>
<!-- wp:navigation {"overlayMenu":"mobile","overlayBackgroundColor":"ink","overlayTextColor":"white","layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"0"}}} -->
<!-- wp:page-list /-->
<!-- /wp:navigation -->
<?php endif; ?>
</div>
<!-- /wp:group -->
