<?php
/**
 * Title: Three schools – Junior, Secondary, Boarding
 * Slug: glenvarra/home-sections
 * Categories: featured
 * Description: Three illustrated cards linking to the main parts of the school.
 */
$gv_cards = array(
	array( 'campus.svg', 'Junior School', 'Ages 4–12', 'Small classes from Junior Infants to Sixth Class, with French from Third Class, swimming every week and a forest-school morning in the grounds.', '/junior-school/' ),
	array( 'science.svg', 'Secondary School', 'Ages 12–18', 'Junior Cycle, a full Transition Year and a wide Leaving Certificate programme — 26 subjects, with timetables built around each pupil.', '/academic/' ),
	array( 'boarding.svg', 'Boarding', '5-day &amp; 7-day', 'Two boarding houses with resident housemasters and a school nurse on site. A home from home for pupils from Ireland and fourteen other countries.', '/boarding/' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"ink","textColor":"cream","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull has-cream-color has-ink-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
<!-- wp:heading {"textAlign":"center","className":"gv-rule","textColor":"white"} -->
<h2 class="wp-block-heading has-text-align-center gv-rule has-white-color has-text-color">One school, from Junior Infants to the Leaving Cert</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
<p class="has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--50)">Pupils can join at any stage and stay right the way through, on one campus.</p>
<!-- /wp:paragraph -->
<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40","top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns">
<?php foreach ( $gv_cards as $gv_card ) : ?>
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"className":"gv-card","style":{"spacing":{"blockGap":"0"},"elements":{"link":{"color":{"text":"var:preset|color|forest"}}}},"backgroundColor":"white","textColor":"ink","layout":{"type":"default"}} -->
<div class="wp-block-group gv-card has-ink-color has-white-background-color has-text-color has-background has-link-color">
<!-- wp:image {"sizeSlug":"full","linkDestination":"custom","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<figure class="wp-block-image size-full" style="margin-top:0;margin-bottom:0"><a href="<?php echo esc_url( home_url( $gv_card[4] ) ); ?>"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/' . $gv_card[0] ) ); ?>" alt=""/></a></figure>
<!-- /wp:image -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"0.6rem"}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
<!-- wp:paragraph {"className":"gv-eyebrow","textColor":"muted","fontSize":"x-small"} -->
<p class="gv-eyebrow has-muted-color has-text-color has-x-small-font-size"><?php echo wp_kses_post( $gv_card[2] ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><a href="<?php echo esc_url( home_url( $gv_card[4] ) ); ?>"><?php echo esc_html( $gv_card[1] ); ?></a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><?php echo esc_html( $gv_card[3] ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
