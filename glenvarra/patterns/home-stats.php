<?php
/**
 * Title: Key facts strip
 * Slug: glenvarra/home-stats
 * Categories: text
 * Description: Five headline numbers about the school.
 */
$gv_stats = array(
	array( '1894', 'Founded in Co. Wicklow' ),
	array( '640', 'Pupils aged 4 to 18' ),
	array( '11:1', 'Pupil–teacher ratio' ),
	array( '140', 'Weekly &amp; full boarders' ),
	array( '24', 'Sports &amp; 40+ clubs' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"backgroundColor":"cream","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull has-cream-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
<!-- wp:columns {"isStackedOnMobile":false,"className":"gv-stats","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30","top":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns is-not-stacked-on-mobile gv-stats">
<?php foreach ( $gv_stats as $gv_stat ) : ?>
<!-- wp:column {"className":"gv-stat"} -->
<div class="wp-block-column gv-stat">
<!-- wp:heading {"textAlign":"center","level":3,"textColor":"forest","fontSize":"xx-large"} -->
<h3 class="wp-block-heading has-text-align-center has-forest-color has-text-color has-xx-large-font-size"><?php echo esc_html( $gv_stat[0] ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","textColor":"muted","fontSize":"x-small","className":"gv-eyebrow"} -->
<p class="has-text-align-center gv-eyebrow has-muted-color has-text-color has-x-small-font-size"><?php echo wp_kses_post( $gv_stat[1] ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
