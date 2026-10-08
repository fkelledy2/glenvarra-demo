<?php
/**
 * Tiny helpers that emit valid block markup, used by the demo content files.
 *
 * @package Glenvarra
 */

defined( 'ABSPATH' ) || exit;

/**
 * Encode block attributes.
 *
 * @param array $attrs Attributes.
 * @return string
 */
function gvb_attrs( $attrs ) {
	return $attrs ? ' ' . wp_json_encode( $attrs, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) : '';
}

/** Paragraph. */
function gvb_p( $html, $size = '' ) {
	if ( $size ) {
		return "<!-- wp:paragraph {\"fontSize\":\"{$size}\"} -->\n<p class=\"has-{$size}-font-size\">{$html}</p>\n<!-- /wp:paragraph -->\n\n";
	}
	return "<!-- wp:paragraph -->\n<p>{$html}</p>\n<!-- /wp:paragraph -->\n\n";
}

/** Lead paragraph. */
function gvb_lead( $html ) {
	return gvb_p( $html, 'large' );
}

/** Heading, optional anchor id. */
function gvb_h( $text, $level = 2, $anchor = '' ) {
	$attrs = array();
	if ( 2 !== $level ) {
		$attrs['level'] = $level;
	}
	$id = '';
	if ( $anchor ) {
		$attrs['anchor'] = $anchor;
		$id              = ' id="' . esc_attr( $anchor ) . '"';
	}
	return "<!-- wp:heading" . gvb_attrs( $attrs ) . " -->\n<h{$level} class=\"wp-block-heading\"{$id}>{$text}</h{$level}>\n<!-- /wp:heading -->\n\n";
}

/** Bulleted list. */
function gvb_list( $items ) {
	$out = "<!-- wp:list -->\n<ul class=\"wp-block-list\">";
	foreach ( $items as $item ) {
		$out .= "<!-- wp:list-item -->\n<li>{$item}</li>\n<!-- /wp:list-item -->";
	}
	return $out . "</ul>\n<!-- /wp:list -->\n\n";
}

/** Table with header row. */
function gvb_table( $head, $rows, $caption = '' ) {
	$out = "<!-- wp:table {\"hasFixedLayout\":false,\"className\":\"gv-table\"} -->\n<figure class=\"wp-block-table gv-table\"><table><thead><tr>";
	foreach ( $head as $cell ) {
		$out .= "<th>{$cell}</th>";
	}
	$out .= '</tr></thead><tbody>';
	foreach ( $rows as $row ) {
		$out .= '<tr>';
		foreach ( $row as $cell ) {
			$out .= "<td>{$cell}</td>";
		}
		$out .= '</tr>';
	}
	$out .= '</tbody></table>';
	if ( $caption ) {
		$out .= "<figcaption class=\"wp-element-caption\">{$caption}</figcaption>";
	}
	return $out . "</figure>\n<!-- /wp:table -->\n\n";
}

/** Columns from an array of inner markup strings. */
function gvb_cols( $cols ) {
	$out = "<!-- wp:columns {\"style\":{\"spacing\":{\"blockGap\":{\"left\":\"var:preset|spacing|50\",\"top\":\"var:preset|spacing|40\"}}}} -->\n<div class=\"wp-block-columns\">";
	foreach ( $cols as $inner ) {
		$out .= "<!-- wp:column -->\n<div class=\"wp-block-column\">{$inner}</div>\n<!-- /wp:column -->";
	}
	return $out . "</div>\n<!-- /wp:columns -->\n\n";
}

/** Image from the theme's illustrations. */
function gvb_img( $file, $alt = '' ) {
	$url = esc_url( get_theme_file_uri( 'assets/images/' . $file ) );
	return "<!-- wp:image {\"sizeSlug\":\"full\",\"style\":{\"border\":{\"radius\":\"4px\"}}} -->\n<figure class=\"wp-block-image size-full has-custom-border\"><img src=\"{$url}\" alt=\"" . esc_attr( $alt ) . "\" style=\"border-radius:4px\"/></figure>\n<!-- /wp:image -->\n\n";
}

/** Buttons. Pass label => url pairs; the first is primary. */
function gvb_buttons( $buttons ) {
	$out   = "<!-- wp:buttons -->\n<div class=\"wp-block-buttons\">";
	$first = true;
	foreach ( $buttons as $label => $url ) {
		$url = esc_url( $url );
		if ( $first ) {
			$out .= "<!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link wp-element-button\" href=\"{$url}\">{$label}</a></div>\n<!-- /wp:button -->";
		} else {
			$out .= "<!-- wp:button {\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link wp-element-button\" href=\"{$url}\">{$label}</a></div>\n<!-- /wp:button -->";
		}
		$first = false;
	}
	return $out . "</div>\n<!-- /wp:buttons -->\n\n";
}

/** Shortcode block. */
function gvb_short( $code ) {
	return "<!-- wp:shortcode -->\n{$code}\n<!-- /wp:shortcode -->\n\n";
}

/** Quote. */
function gvb_quote( $text, $cite ) {
	return "<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><!-- wp:paragraph -->\n<p>{$text}</p>\n<!-- /wp:paragraph --><cite>{$cite}</cite></blockquote>\n<!-- /wp:quote -->\n\n";
}

/** Separator. */
function gvb_sep() {
	return "<!-- wp:separator -->\n<hr class=\"wp-block-separator has-alpha-channel-opacity\"/>\n<!-- /wp:separator -->\n\n";
}

/** Cream callout box (constrained group). */
function gvb_box( $inner, $color = 'cream' ) {
	return "<!-- wp:group {\"style\":{\"spacing\":{\"padding\":{\"top\":\"var:preset|spacing|40\",\"bottom\":\"var:preset|spacing|40\",\"left\":\"var:preset|spacing|40\",\"right\":\"var:preset|spacing|40\"}},\"border\":{\"left\":{\"color\":\"var:preset|color|gold\",\"width\":\"4px\"}}},\"backgroundColor\":\"{$color}\",\"layout\":{\"type\":\"default\"}} -->\n<div class=\"wp-block-group has-{$color}-background-color has-background\" style=\"border-left-color:var(--wp--preset--color--gold);border-left-width:4px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)\">{$inner}</div>\n<!-- /wp:group -->\n\n";
}

/** Wide group (breaks out of the content column). */
function gvb_wide( $inner ) {
	return "<!-- wp:group {\"align\":\"wide\",\"layout\":{\"type\":\"default\"}} -->\n<div class=\"wp-block-group alignwide\">{$inner}</div>\n<!-- /wp:group -->\n\n";
}

/** Link cards: array of [title, text, url]. */
function gvb_cards( $cards ) {
	$cols = array();
	foreach ( $cards as $card ) {
		list( $title, $text, $url ) = $card;
		$cols[] = "<!-- wp:group {\"className\":\"gv-card\",\"style\":{\"spacing\":{\"padding\":{\"top\":\"var:preset|spacing|40\",\"bottom\":\"var:preset|spacing|40\",\"left\":\"var:preset|spacing|40\",\"right\":\"var:preset|spacing|40\"},\"blockGap\":\"0.5rem\"},\"border\":{\"top\":{\"color\":\"var:preset|color|gold\",\"width\":\"3px\"}}},\"backgroundColor\":\"cream\",\"layout\":{\"type\":\"default\"}} -->\n<div class=\"wp-block-group gv-card has-cream-background-color has-background\" style=\"border-top-color:var(--wp--preset--color--gold);border-top-width:3px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)\">"
			. gvb_h( '<a href="' . esc_url( $url ) . '">' . $title . '</a>', 3 )
			. gvb_p( $text, 'small' )
			. "</div>\n<!-- /wp:group -->";
	}
	$rows = '';
	foreach ( array_chunk( $cols, 3 ) as $chunk ) {
		while ( count( $chunk ) < 3 && count( $cols ) > 3 ) {
			$chunk[] = '';
		}
		$rows .= gvb_cols( $chunk );
	}
	return gvb_wide( $rows );
}

/** Root-relative URL helper. */
function gvb_url( $path ) {
	return home_url( $path );
}
