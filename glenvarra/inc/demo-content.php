<?php
/**
 * One-click demo content.
 *
 * Runs automatically the first time the theme is activated, and can be
 * re-run from Appearance → Glenvarra demo. Existing pages with the same
 * slug are never overwritten.
 *
 * @package Glenvarra
 */

defined( 'ABSPATH' ) || exit;

require_once get_theme_file_path( 'inc/blocks.php' );

add_action( 'after_switch_theme', 'glenvarra_maybe_import' );

/**
 * Import once, on first activation.
 */
function glenvarra_maybe_import() {
	if ( ! get_option( 'glenvarra_demo_imported' ) ) {
		glenvarra_import_demo();
	}
}

/**
 * Admin page with a button to (re)import.
 */
add_action(
	'admin_menu',
	static function () {
		add_theme_page( __( 'Glenvarra demo', 'glenvarra' ), __( 'Glenvarra demo', 'glenvarra' ), 'manage_options', 'glenvarra-demo', 'glenvarra_demo_screen' );
	}
);

/**
 * Render the admin screen.
 */
function glenvarra_demo_screen() {
	$done = get_option( 'glenvarra_demo_imported' );
	echo '<div class="wrap"><h1>' . esc_html__( 'Glenvarra College demo content', 'glenvarra' ) . '</h1>';
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( isset( $_GET['imported'] ) ) {
		echo '<div class="notice notice-success"><p>' . esc_html__( 'Demo content imported. Any pages that already existed were left as they were.', 'glenvarra' ) . '</p></div>';
	}
	echo '<p>' . ( $done ? esc_html( sprintf( __( 'Demo content was imported on %s.', 'glenvarra' ), $done ) ) : esc_html__( 'Demo content has not been imported yet.', 'glenvarra' ) ) . '</p>';
	echo '<p>' . esc_html__( 'Importing creates the pages, news posts, events, menu and media for the demo school, sets the homepage and news page, and switches permalinks to "Post name". Pages that already exist (matched by their address) are not overwritten; missing ones are recreated.', 'glenvarra' ) . '</p>';
	echo '<form method="post" action="' . esc_url( admin_url( 'admin-post.php' ) ) . '">';
	wp_nonce_field( 'glenvarra_import' );
	echo '<input type="hidden" name="action" value="glenvarra_import">';
	submit_button( $done ? __( 'Re-run import', 'glenvarra' ) : __( 'Import demo content', 'glenvarra' ) );
	echo '</form></div>';
}

add_action(
	'admin_post_glenvarra_import',
	static function () {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Sorry, you are not allowed to do that.', 'glenvarra' ) );
		}
		check_admin_referer( 'glenvarra_import' );
		glenvarra_import_demo();
		wp_safe_redirect( admin_url( 'themes.php?page=glenvarra-demo&imported=1' ) );
		exit;
	}
);

/**
 * Do the import.
 */
function glenvarra_import_demo() {
	// Only one import at a time (activation can fire on overlapping requests, e.g. cron).
	$lock = get_option( 'glenvarra_import_lock' );
	if ( $lock && time() - (int) $lock < 300 ) {
		return;
	}
	if ( $lock ) {
		delete_option( 'glenvarra_import_lock' );
	}
	if ( ! add_option( 'glenvarra_import_lock', time(), '', false ) ) {
		return;
	}

	if ( function_exists( 'set_time_limit' ) ) {
		@set_time_limit( 120 ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
	}

	// Our content is trusted theme markup; don't let KSES strip block attributes
	// if this happens to run in a request without unfiltered_html.
	$kses = has_filter( 'content_save_pre', 'wp_filter_post_kses' );
	kses_remove_filters();

	update_option( 'blogname', 'Glenvarra College' );
	update_option( 'blogdescription', 'Independent co-educational day and boarding school, Co. Wicklow' );
	update_option( 'timezone_string', 'Europe/Dublin' );
	update_option( 'date_format', 'j F Y' );
	update_option( 'start_of_week', 1 );

	$media = glenvarra_import_media();
	$pages = glenvarra_import_pages( $media );
	glenvarra_import_posts( $media );
	if ( post_type_exists( 'gv_event' ) ) {
		glenvarra_import_events();
	}

	// Static front page + news page.
	if ( isset( $pages['home'], $pages['news'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $pages['home'] );
		update_option( 'page_for_posts', $pages['news'] );
	}
	if ( isset( $pages['privacy'] ) ) {
		update_option( 'wp_page_for_privacy_policy', $pages['privacy'] );
	}
	update_option( 'posts_per_page', 9 );

	glenvarra_import_navigation( $pages );

	// Pretty permalinks so the header/footer links resolve.
	global $wp_rewrite;
	if ( '' === get_option( 'permalink_structure' ) ) {
		$wp_rewrite->set_permalink_structure( '/%postname%/' );
	}
	update_option( 'glenvarra_flush_rewrite', 1 );

	update_option( 'glenvarra_demo_imported', current_time( 'j F Y, H:i' ) );

	if ( $kses ) {
		kses_init_filters();
	}
	delete_option( 'glenvarra_import_lock' );
}

/* Flush rewrites on the next request, after the post types are registered. */
add_action(
	'init',
	static function () {
		if ( get_option( 'glenvarra_flush_rewrite' ) ) {
			delete_option( 'glenvarra_flush_rewrite' );
			flush_rewrite_rules( false );
		}
	},
	99
);

/**
 * Copy the illustrations into the media library.
 *
 * @return array slug => attachment id
 */
function glenvarra_import_media() {
	require_once ABSPATH . 'wp-admin/includes/image.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';

	$ids = (array) get_option( 'glenvarra_media', array() );
	foreach ( array( 'campus', 'sport', 'science', 'boarding', 'music', 'art' ) as $slug ) {
		if ( ! empty( $ids[ $slug ] ) && get_post( $ids[ $slug ] ) ) {
			continue;
		}
		$src    = get_theme_file_path( "assets/photos/{$slug}.jpg" );
		$upload = wp_upload_bits( "glenvarra-{$slug}.jpg", null, file_get_contents( $src ) ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		if ( ! empty( $upload['error'] ) ) {
			continue;
		}
		$id = wp_insert_attachment(
			array(
				'post_mime_type' => 'image/jpeg',
				'post_title'     => 'Glenvarra illustration – ' . $slug,
				'post_status'    => 'inherit',
			),
			$upload['file']
		);
		if ( $id && ! is_wp_error( $id ) ) {
			wp_update_attachment_metadata( $id, wp_generate_attachment_metadata( $id, $upload['file'] ) );
			update_post_meta( $id, '_wp_attachment_image_alt', 'Illustration: ' . $slug );
			$ids[ $slug ] = $id;
		}
	}
	update_option( 'glenvarra_media', $ids );
	return $ids;
}

/**
 * Create pages from inc/content/pages.php.
 *
 * @param array $media Media ids.
 * @return array key => page id
 */
function glenvarra_import_pages( $media ) {
	$defs = require get_theme_file_path( 'inc/content/pages.php' );
	$ids  = array();

	foreach ( $defs as $key => $def ) {
		$parent_id = 0;
		$path      = $def['slug'];
		if ( ! empty( $def['parent'] ) ) {
			$parent_id = isset( $ids[ $def['parent'] ] ) ? $ids[ $def['parent'] ] : 0;
			$path      = $defs[ $def['parent'] ]['slug'] . '/' . $def['slug'];
		}

		$existing = get_page_by_path( $path );
		if ( $existing ) {
			$ids[ $key ] = $existing->ID;
			continue;
		}

		$id = wp_insert_post(
			wp_slash( array(
				'post_type'     => 'page',
				'post_status'   => 'publish',
				'post_title'    => $def['title'],
				'post_name'     => $def['slug'],
				'post_parent'   => $parent_id,
				'menu_order'    => isset( $def['order'] ) ? $def['order'] : 0,
				'post_content'  => isset( $def['content'] ) ? $def['content'] : '',
				'post_excerpt'  => isset( $def['excerpt'] ) ? $def['excerpt'] : '',
				'page_template' => isset( $def['template'] ) ? $def['template'] : '',
			) )
		);
		if ( $id && ! is_wp_error( $id ) ) {
			$ids[ $key ] = $id;
			if ( ! empty( $def['image'] ) && ! empty( $media[ $def['image'] ] ) ) {
				set_post_thumbnail( $id, $media[ $def['image'] ] );
			}
		}
	}
	return $ids;
}

/**
 * Create news posts, dated relative to today.
 *
 * @param array $media Media ids.
 */
function glenvarra_import_posts( $media ) {
	$posts = require get_theme_file_path( 'inc/content/posts.php' );

	foreach ( $posts as $slug => $def ) {
		if ( get_page_by_path( $slug, OBJECT, 'post' ) ) {
			continue;
		}
		$cat = get_term_by( 'name', $def['category'], 'category' );
		if ( ! $cat ) {
			$made = wp_insert_term( $def['category'], 'category' );
			$cat  = is_wp_error( $made ) ? null : get_term( $made['term_id'], 'category' );
		}
		$date = gmdate( 'Y-m-d H:i:s', current_time( 'timestamp' ) - $def['days_ago'] * DAY_IN_SECONDS - wp_rand( 2, 9 ) * HOUR_IN_SECONDS ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested
		$id   = wp_insert_post(
			wp_slash( array(
				'post_type'     => 'post',
				'post_status'   => 'publish',
				'post_title'    => $def['title'],
				'post_name'     => $slug,
				'post_excerpt'  => $def['excerpt'],
				'post_content'  => $def['content'],
				'post_date'     => $date,
				'post_category' => $cat ? array( $cat->term_id ) : array(),
			) )
		);
		if ( $id && ! is_wp_error( $id ) && ! empty( $media[ $def['image'] ] ) ) {
			set_post_thumbnail( $id, $media[ $def['image'] ] );
		}
	}

	// Tidy WordPress's sample content if it's untouched.
	$hello = get_page_by_path( 'hello-world', OBJECT, 'post' );
	if ( $hello && $hello->post_modified === $hello->post_date ) {
		wp_delete_post( $hello->ID, true );
	}
	$sample = get_page_by_path( 'sample-page' );
	if ( $sample && $sample->post_modified === $sample->post_date ) {
		wp_delete_post( $sample->ID, true );
	}
	$uncat = get_term_by( 'slug', 'uncategorized', 'category' );
	if ( $uncat ) {
		wp_update_term( $uncat->term_id, 'category', array( 'name' => 'General', 'slug' => 'general' ) );
	}
}

/**
 * Create upcoming events relative to today.
 */
function glenvarra_import_events() {
	$events = require get_theme_file_path( 'inc/content/events.php' );
	$today  = current_time( 'timestamp' ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested

	foreach ( $events as $slug => $def ) {
		if ( get_page_by_path( $slug, OBJECT, 'gv_event' ) ) {
			continue;
		}
		$start = $today + $def['in_days'] * DAY_IN_SECONDS;
		if ( ! empty( $def['weekday'] ) ) { // Snap to the next given weekday, e.g. "saturday".
			$start = strtotime( 'next ' . $def['weekday'], $start - DAY_IN_SECONDS );
		}
		$id = wp_insert_post(
			wp_slash( array(
				'post_type'    => 'gv_event',
				'post_status'  => 'publish',
				'post_title'   => $def['title'],
				'post_name'    => $slug,
				'post_content' => $def['content'],
			) )
		);
		if ( $id && ! is_wp_error( $id ) ) {
			update_post_meta( $id, 'gv_event_date', gmdate( 'Y-m-d', $start ) );
			if ( ! empty( $def['length'] ) ) {
				update_post_meta( $id, 'gv_event_end', gmdate( 'Y-m-d', $start + ( $def['length'] - 1 ) * DAY_IN_SECONDS ) );
			}
			update_post_meta( $id, 'gv_event_time', isset( $def['time'] ) ? $def['time'] : '' );
			update_post_meta( $id, 'gv_event_location', isset( $def['location'] ) ? $def['location'] : '' );
		}
	}
}

/**
 * Build the main navigation (wp_navigation post) with dropdowns.
 *
 * @param array $pages Page ids.
 */
function glenvarra_import_navigation( $pages ) {
	$menu = array(
		'about'      => array( 'Welcome' => 'about', 'History' => 'history', 'Board of Governors' => 'governors', 'Campus & facilities' => 'campus', 'Staff' => 'staff', 'Policies' => 'policies', 'Contact & location' => 'contact' ),
		'admissions' => array( 'Admissions overview' => 'admissions', 'Why Glenvarra?' => 'why', 'Fees & financial aid' => 'fees', 'Expression of interest' => 'eoi', 'Admissions Policy' => 'admissions-policy', 'Annual Admissions Notice' => 'notice' ),
		'academic'   => array( 'Secondary School' => 'academic', 'Junior Cycle' => 'junior-cycle', 'Transition Year' => 'ty', 'Leaving Certificate' => 'leaving-cert', 'Learning support & guidance' => 'support' ),
		'junior'     => array(),
		'boarding'   => array( 'Boarding at Glenvarra' => 'boarding', 'Boarding life' => 'boarding-life', 'International pupils' => 'international' ),
		'arts'       => array(),
		'activities' => array(),
		'news'       => array(),
	);

	$link = static function ( $id, $label = null ) {
		$attrs = array(
			'label' => $label ? $label : get_the_title( $id ),
			'type'  => 'page',
			'id'    => (int) $id,
			'url'   => get_permalink( $id ),
			'kind'  => 'post-type',
		);
		return '<!-- wp:navigation-link ' . wp_json_encode( $attrs, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . ' /-->';
	};

	$markup = '';
	foreach ( $menu as $top => $children ) {
		if ( empty( $pages[ $top ] ) ) {
			continue;
		}
		if ( ! $children ) {
			$markup .= $link( $pages[ $top ] ) . "\n";
			continue;
		}
		$attrs   = array(
			'label' => get_the_title( $pages[ $top ] ),
			'type'  => 'page',
			'id'    => (int) $pages[ $top ],
			'url'   => get_permalink( $pages[ $top ] ),
			'kind'  => 'post-type',
		);
		$markup .= '<!-- wp:navigation-submenu ' . wp_json_encode( $attrs, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . ' -->' . "\n";
		foreach ( $children as $label => $key ) {
			if ( ! empty( $pages[ $key ] ) ) {
				$markup .= $link( $pages[ $key ], $label ) . "\n";
			}
		}
		$markup .= "<!-- /wp:navigation-submenu -->\n";
	}

	$existing = (int) get_option( 'glenvarra_nav_id' );
	$args     = array(
		'post_type'    => 'wp_navigation',
		'post_status'  => 'publish',
		'post_title'   => 'Main menu',
		'post_content' => $markup,
	);
	if ( $existing && get_post( $existing ) ) {
		$args['ID'] = $existing;
		wp_update_post( wp_slash( $args ) );
	} else {
		$id = wp_insert_post( wp_slash( $args ) );
		if ( $id && ! is_wp_error( $id ) ) {
			update_option( 'glenvarra_nav_id', $id );
		}
	}
}
