<?php
/**
 * Title: Site footer
 * Slug: glenvarra/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Inserter: no
 */

$gv_u = static function ( $path ) {
	return esc_url( home_url( $path ) );
};
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|40"}},"elements":{"link":{"color":{"text":"var:preset|color|cream"},":hover":{"color":{"text":"var:preset|color|gold"}}}}},"backgroundColor":"ink","textColor":"cream","fontSize":"small","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group has-cream-color has-ink-background-color has-text-color has-background has-link-color has-small-font-size" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--40)">

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns">

<!-- wp:column {"width":"34%"} -->
<div class="wp-block-column" style="flex-basis:34%">
<!-- wp:group {"style":{"spacing":{"blockGap":"0.8rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:image {"width":"48px","sizeSlug":"full"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/crest.svg' ) ); ?>" alt="" style="width:48px"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"1.4rem"}},"textColor":"white"} -->
<h2 class="wp-block-heading has-white-color has-text-color" style="font-size:1.4rem">Glenvarra College</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph -->
<p>Glenvarra Road, Glenvarra<br>Co. Wicklow, A98 X0X0<br>Ireland</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>T: <a href="tel:+35312345678">+353 1 234 5678</a><br>E: <a href="mailto:office@glenvarra.example">office@glenvarra.example</a></p>
<!-- /wp:paragraph -->
<!-- wp:social-links {"iconColor":"cream","iconColorValue":"#F7F3EA","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"left":"1rem"}}}} -->
<ul class="wp-block-social-links has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"instagram"} /--><!-- wp:social-link {"url":"#","service":"youtube"} /--><!-- wp:social-link {"url":"#","service":"x"} /--><!-- wp:social-link {"url":"#","service":"linkedin"} /--></ul>
<!-- /wp:social-links -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3,"className":"gv-eyebrow","style":{"typography":{"fontSize":"0.75rem","fontFamily":"var:preset|font-family|sans"}},"textColor":"gold"} -->
<h3 class="wp-block-heading gv-eyebrow has-gold-color has-text-color" style="font-family:var(--wp--preset--font-family--sans);font-size:0.75rem">Explore</h3>
<!-- /wp:heading -->
<!-- wp:list {"className":"is-style-default","style":{"spacing":{"padding":{"left":"0"}},"typography":{"lineHeight":"2"}}} -->
<ul style="padding-left:0;line-height:2;list-style:none" class="wp-block-list is-style-default">
<!-- wp:list-item --><li><a href="<?php echo $gv_u( '/about/' ); ?>">About the College</a></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><a href="<?php echo $gv_u( '/admissions/' ); ?>">Admissions</a></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><a href="<?php echo $gv_u( '/junior-school/' ); ?>">Junior School</a></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><a href="<?php echo $gv_u( '/boarding/' ); ?>">Boarding</a></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><a href="<?php echo $gv_u( '/news/' ); ?>">News</a></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><a href="<?php echo $gv_u( '/contact/' ); ?>">Contact &amp; location</a></li><!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3,"className":"gv-eyebrow","style":{"typography":{"fontSize":"0.75rem","fontFamily":"var:preset|font-family|sans"}},"textColor":"gold"} -->
<h3 class="wp-block-heading gv-eyebrow has-gold-color has-text-color" style="font-family:var(--wp--preset--font-family--sans);font-size:0.75rem">Information</h3>
<!-- /wp:heading -->
<!-- wp:list {"style":{"spacing":{"padding":{"left":"0"}},"typography":{"lineHeight":"2"}}} -->
<ul style="padding-left:0;line-height:2;list-style:none" class="wp-block-list">
<!-- wp:list-item --><li><a href="<?php echo $gv_u( '/admissions/annual-admissions-notice/' ); ?>">Annual Admissions Notice</a></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><a href="<?php echo $gv_u( '/policies/' ); ?>">School policies</a></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><a href="<?php echo $gv_u( '/policies/#safeguarding' ); ?>">Child Safeguarding Statement</a></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><a href="<?php echo $gv_u( '/calendar/' ); ?>">Calendar &amp; term dates</a></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><a href="<?php echo $gv_u( '/careers/' ); ?>">Careers at Glenvarra</a></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><a href="<?php echo $gv_u( '/privacy/' ); ?>">Privacy &amp; data protection</a></li><!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->

<!-- wp:column {"width":"28%"} -->
<div class="wp-block-column" style="flex-basis:28%">
<!-- wp:heading {"level":3,"className":"gv-eyebrow","style":{"typography":{"fontSize":"0.75rem","fontFamily":"var:preset|font-family|sans"}},"textColor":"gold"} -->
<h3 class="wp-block-heading gv-eyebrow has-gold-color has-text-color" style="font-family:var(--wp--preset--font-family--sans);font-size:0.75rem">School newsletter</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>News, fixtures and events, once a fortnight.</p>
<!-- /wp:paragraph -->
<!-- wp:shortcode -->
[glenvarra_newsletter]
<!-- /wp:shortcode -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

<!-- wp:separator {"className":"is-style-wide","style":{"color":{"background":"#ffffff22"},"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|30"}}}} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--30);background-color:#ffffff22;color:#ffffff22"/>
<!-- /wp:separator -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"fontSize":"x-small"} -->
<p class="has-x-small-font-size">© <?php echo esc_html( gmdate( 'Y' ) ); ?> Glenvarra College · Roll No. 00000X · A company limited by guarantee</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"gv-demo-note","fontSize":"x-small"} -->
<p class="gv-demo-note has-x-small-font-size">Glenvarra College is a fictional school. This is a demonstration website.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
