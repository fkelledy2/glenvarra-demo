<?php
/**
 * Title: Upcoming events and contact
 * Slug: glenvarra/home-events-contact
 * Categories: text
 * Description: Upcoming events list beside contact details and a visit call to action.
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60","top":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns">
<!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%">
<!-- wp:heading {"className":"gv-rule"} -->
<h2 class="wp-block-heading gv-rule">Upcoming events</h2>
<!-- /wp:heading -->
<!-- wp:shortcode -->
[glenvarra_events limit="5"]
<!-- /wp:shortcode -->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong><a href="<?php echo esc_url( home_url( '/calendar/' ) ); ?>">View the full calendar →</a></strong></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%">
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"elements":{"link":{"color":{"text":"var:preset|color|gold"}}}},"backgroundColor":"forest","textColor":"cream","layout":{"type":"default"}} -->
<div class="wp-block-group has-cream-color has-forest-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
<!-- wp:heading {"level":3,"textColor":"white"} -->
<h3 class="wp-block-heading has-white-color has-text-color">Come and see us</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">The best way to know Glenvarra is to walk around it. Our Admissions team runs individual tours most weekday mornings during term.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong>Glenvarra College</strong><br>Glenvarra Road, Glenvarra<br>Co. Wicklow, A98 X0X0</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Admissions: <a href="tel:+35312345679">+353 1 234 5679</a><br>School office: <a href="tel:+35312345678">+353 1 234 5678</a><br><a href="mailto:admissions@glenvarra.example">admissions@glenvarra.example</a></p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"gold","textColor":"ink"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-ink-color has-gold-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( home_url( '/admissions/expression-of-interest/' ) ); ?>">Arrange a tour</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
