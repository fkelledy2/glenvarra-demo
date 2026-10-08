<?php
/**
 * Site features: events, enquiry / newsletter forms, breadcrumb.
 *
 * In production these would normally live in a plugin; they are bundled
 * with the theme so the demo works from a single upload.
 *
 * @package Glenvarra
 */

defined( 'ABSPATH' ) || exit;

/* -------------------------------------------------------------------------
 * Post types
 * ---------------------------------------------------------------------- */

add_action(
	'init',
	static function () {
		register_post_type(
			'gv_event',
			array(
				'labels'       => array(
					'name'          => __( 'Events', 'glenvarra' ),
					'singular_name' => __( 'Event', 'glenvarra' ),
					'add_new_item'  => __( 'Add event', 'glenvarra' ),
					'edit_item'     => __( 'Edit event', 'glenvarra' ),
				),
				'public'       => true,
				'has_archive'  => false,
				'rewrite'      => array( 'slug' => 'events' ),
				'menu_icon'    => 'dashicons-calendar-alt',
				'show_in_rest' => true,
				'supports'     => array( 'title', 'editor', 'excerpt', 'custom-fields' ),
			)
		);

		foreach ( array( 'gv_event_date', 'gv_event_end', 'gv_event_time', 'gv_event_location' ) as $key ) {
			register_post_meta(
				'gv_event',
				$key,
				array(
					'type'              => 'string',
					'single'            => true,
					'show_in_rest'      => true,
					'sanitize_callback' => 'sanitize_text_field',
					'auth_callback'     => static function () {
						return current_user_can( 'edit_posts' );
					},
				)
			);
		}

		register_post_type(
			'gv_enquiry',
			array(
				'labels'          => array(
					'name'          => __( 'Enquiries', 'glenvarra' ),
					'singular_name' => __( 'Enquiry', 'glenvarra' ),
				),
				'public'          => false,
				'show_ui'         => true,
				'menu_icon'       => 'dashicons-email-alt',
				'supports'        => array( 'title' ),
				'capability_type' => 'post',
				'capabilities'    => array( 'create_posts' => 'do_not_allow' ),
				'map_meta_cap'    => true,
			)
		);
	}
);

/* -------------------------------------------------------------------------
 * Event details meta box (works in the block editor too)
 * ---------------------------------------------------------------------- */

add_action(
	'add_meta_boxes_gv_event',
	static function () {
		add_meta_box( 'gv_event_details', __( 'Event details', 'glenvarra' ), 'glenvarra_event_meta_box', 'gv_event', 'side', 'high' );
	}
);

/**
 * Render the event meta box.
 *
 * @param WP_Post $post Event.
 */
function glenvarra_event_meta_box( $post ) {
	wp_nonce_field( 'gv_event_save', 'gv_event_nonce' );
	$fields = array(
		'gv_event_date'     => array( __( 'Start date', 'glenvarra' ), 'date' ),
		'gv_event_end'      => array( __( 'End date (optional)', 'glenvarra' ), 'date' ),
		'gv_event_time'     => array( __( 'Time (e.g. 7.30pm)', 'glenvarra' ), 'text' ),
		'gv_event_location' => array( __( 'Location', 'glenvarra' ), 'text' ),
	);
	foreach ( $fields as $key => $field ) {
		printf(
			'<p><label for="%1$s"><strong>%2$s</strong></label><br><input type="%3$s" id="%1$s" name="%1$s" value="%4$s" style="width:100%%"></p>',
			esc_attr( $key ),
			esc_html( $field[0] ),
			esc_attr( $field[1] ),
			esc_attr( get_post_meta( $post->ID, $key, true ) )
		);
	}
}

add_action(
	'save_post_gv_event',
	static function ( $post_id ) {
		if ( ! isset( $_POST['gv_event_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['gv_event_nonce'] ), 'gv_event_save' ) ) {
			return;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
		foreach ( array( 'gv_event_date', 'gv_event_end', 'gv_event_time', 'gv_event_location' ) as $key ) {
			if ( isset( $_POST[ $key ] ) ) {
				update_post_meta( $post_id, $key, sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) );
			}
		}
	}
);

add_filter(
	'manage_gv_event_posts_columns',
	static function ( $cols ) {
		$cols['gv_date'] = __( 'Event date', 'glenvarra' );
		unset( $cols['date'] );
		return $cols;
	}
);
add_action(
	'manage_gv_event_posts_custom_column',
	static function ( $col, $post_id ) {
		if ( 'gv_date' === $col ) {
			$d = get_post_meta( $post_id, 'gv_event_date', true );
			echo $d ? esc_html( date_i18n( 'D j M Y', strtotime( $d ) ) ) : '—';
		}
	},
	10,
	2
);

/* -------------------------------------------------------------------------
 * [glenvarra_events limit="5"]
 * ---------------------------------------------------------------------- */

add_shortcode(
	'glenvarra_events',
	static function ( $atts ) {
		$atts  = shortcode_atts( array( 'limit' => 5 ), $atts, 'glenvarra_events' );
		$today = current_time( 'Y-m-d' );

		$events = get_posts(
			array(
				'post_type'      => 'gv_event',
				'posts_per_page' => (int) $atts['limit'],
				'meta_key'       => 'gv_event_date',
				'orderby'        => 'meta_value',
				'order'          => 'ASC',
				'meta_query'     => array(
					'relation' => 'OR',
					array(
						'key'     => 'gv_event_date',
						'value'   => $today,
						'compare' => '>=',
						'type'    => 'DATE',
					),
					array(
						'key'     => 'gv_event_end',
						'value'   => $today,
						'compare' => '>=',
						'type'    => 'DATE',
					),
				),
			)
		);

		if ( ! $events ) {
			return '<p class="gv-events-empty">' . esc_html__( 'No upcoming events are listed just now.', 'glenvarra' ) . '</p>';
		}

		$html = '<ul class="gv-events">';
		foreach ( $events as $event ) {
			$start = strtotime( get_post_meta( $event->ID, 'gv_event_date', true ) );
			$end   = get_post_meta( $event->ID, 'gv_event_end', true );
			$time  = get_post_meta( $event->ID, 'gv_event_time', true );
			$where = get_post_meta( $event->ID, 'gv_event_location', true );

			$when = $end ? date_i18n( 'D j M', $start ) . ' – ' . date_i18n( 'D j M', strtotime( $end ) ) : date_i18n( 'l j F', $start );
			$meta = array_filter( array( $when, $time, $where ) );

			$html .= '<li class="gv-event">';
			$html .= '<span class="gv-event__date" aria-hidden="true"><span class="gv-event__day">' . esc_html( date_i18n( 'j', $start ) ) . '</span><span class="gv-event__mon">' . esc_html( date_i18n( 'M', $start ) ) . '</span></span>';
			$html .= '<span class="gv-event__body"><a class="gv-event__title" href="' . esc_url( get_permalink( $event ) ) . '">' . esc_html( get_the_title( $event ) ) . '</a>';
			$html .= '<span class="gv-event__meta">' . esc_html( implode( ' · ', $meta ) ) . '</span></span>';
			$html .= '</li>';
		}
		$html .= '</ul>';
		return $html;
	}
);

/* -------------------------------------------------------------------------
 * Forms: [glenvarra_enquiry_form] and [glenvarra_newsletter]
 * Submissions are stored as private "Enquiries" in wp-admin and emailed
 * to the site admin address.
 * ---------------------------------------------------------------------- */

/**
 * Status message after a form posts back.
 *
 * @param string $form Form id.
 * @return string
 */
function glenvarra_form_notice( $form ) {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- display only.
	$status = isset( $_GET['gv_form'], $_GET['gv_status'] ) && $form === $_GET['gv_form'] ? sanitize_key( $_GET['gv_status'] ) : '';
	if ( 'sent' === $status ) {
		$msg = 'newsletter' === $form ? __( 'Thank you — you are subscribed.', 'glenvarra' ) : __( 'Thank you. Our Admissions team will be in touch within two working days.', 'glenvarra' );
		return '<p class="gv-notice gv-notice--ok" role="status">' . esc_html( $msg ) . '</p>';
	}
	if ( 'error' === $status ) {
		return '<p class="gv-notice gv-notice--err" role="alert">' . esc_html__( 'Please complete the required fields and tick the consent box.', 'glenvarra' ) . '</p>';
	}
	return '';
}

/**
 * Hidden fields shared by both forms.
 *
 * @param string $form Form id.
 * @return string
 */
function glenvarra_form_hidden( $form ) {
	return '<input type="hidden" name="action" value="glenvarra_form">'
		. '<input type="hidden" name="gv_form" value="' . esc_attr( $form ) . '">'
		. '<input type="hidden" name="gv_return" value="' . esc_url( is_singular() ? get_permalink() : home_url( '/' ) ) . '">'
		. wp_nonce_field( 'glenvarra_form', 'gv_nonce', false, false )
		. '<div class="gv-hp" aria-hidden="true"><label>Leave blank<input type="text" name="gv_website" tabindex="-1" autocomplete="off"></label></div>';
}

add_shortcode(
	'glenvarra_newsletter',
	static function () {
		$id = 'gv-nl-' . wp_rand( 100, 999 );
		return '<form class="gv-form gv-form--newsletter" id="newsletter" method="post" action="' . esc_url( admin_url( 'admin-post.php' ) ) . '">'
			. glenvarra_form_notice( 'newsletter' )
			. glenvarra_form_hidden( 'newsletter' )
			. '<label class="screen-reader-text" for="' . $id . '-email">Email address</label>'
			. '<div class="gv-form__row gv-form__inline"><input id="' . $id . '-email" type="email" name="gv_email" placeholder="Your email address" required><button type="submit" class="wp-element-button">Subscribe</button></div>'
			. '<fieldset class="gv-form__checks"><legend class="screen-reader-text">Lists</legend><label><input type="checkbox" name="gv_lists[]" value="Secondary" checked> Secondary</label><label><input type="checkbox" name="gv_lists[]" value="Junior School"> Junior School</label></fieldset>'
			. '<label class="gv-form__consent"><input type="checkbox" name="gv_consent" value="1" required> I agree to the <a href="' . esc_url( home_url( '/privacy/' ) ) . '">privacy notice</a>.</label>'
			. '</form>';
	}
);

add_shortcode(
	'glenvarra_enquiry_form',
	static function () {
		$entry_points = array( 'Junior Infants', 'Other Junior School class', 'First Year', 'Transition Year', 'Fifth Year', 'Not sure yet' );
		$options      = '';
		foreach ( $entry_points as $ep ) {
			$options .= '<option>' . esc_html( $ep ) . '</option>';
		}
		$years = '';
		for ( $y = (int) gmdate( 'Y' ) + 1; $y <= (int) gmdate( 'Y' ) + 6; $y++ ) {
			$years .= '<option>' . $y . '/' . substr( (string) ( $y + 1 ), 2 ) . '</option>';
		}

		return '<form class="gv-form gv-form--enquiry" id="enquiry" method="post" action="' . esc_url( admin_url( 'admin-post.php' ) ) . '">'
			. glenvarra_form_notice( 'enquiry' )
			. glenvarra_form_hidden( 'enquiry' )
			. '<div class="gv-form__grid">'
			. '<label>Parent / guardian name *<input type="text" name="gv_name" required autocomplete="name"></label>'
			. '<label>Email *<input type="email" name="gv_email" required autocomplete="email"></label>'
			. '<label>Phone<input type="tel" name="gv_phone" autocomplete="tel"></label>'
			. '<label>Child\'s first name<input type="text" name="gv_child"></label>'
			. '<label>Entry point<select name="gv_entry">' . $options . '</select></label>'
			. '<label>Year of entry<select name="gv_year">' . $years . '</select></label>'
			. '<label>Interested in<select name="gv_type"><option>Day place</option><option>5-day boarding</option><option>7-day boarding</option></select></label>'
			. '<label>I would like to<select name="gv_visit"><option>Book a private tour</option><option>Attend the next Open Morning</option><option>Receive a prospectus</option><option>Ask a question</option></select></label>'
			. '</div>'
			. '<label class="gv-form__full">Message<textarea name="gv_message" rows="4"></textarea></label>'
			. '<label class="gv-form__consent"><input type="checkbox" name="gv_consent" value="1" required> I consent to Glenvarra College using these details to respond to my enquiry, as set out in the <a href="' . esc_url( home_url( '/privacy/' ) ) . '">privacy notice</a>. *</label>'
			. '<p><button type="submit" class="wp-element-button">Send enquiry</button></p>'
			. '<p class="gv-form__note">An expression of interest is not an application and does not reserve a place. Applications are made under our <a href="' . esc_url( home_url( '/admissions/admissions-policy/' ) ) . '">Admissions Policy</a>.</p>'
			. '</form>';
	}
);

/**
 * Handle both forms.
 */
function glenvarra_handle_form() {
	$return = isset( $_POST['gv_return'] ) ? esc_url_raw( wp_unslash( $_POST['gv_return'] ) ) : home_url( '/' );
	$return = wp_validate_redirect( $return, home_url( '/' ) );
	$form   = isset( $_POST['gv_form'] ) && 'newsletter' === $_POST['gv_form'] ? 'newsletter' : 'enquiry';
	$anchor = 'newsletter' === $form ? '#newsletter' : '#enquiry';

	$back = static function ( $status ) use ( $return, $form, $anchor ) {
		wp_safe_redirect( add_query_arg( array( 'gv_form' => $form, 'gv_status' => $status ), remove_query_arg( array( 'gv_form', 'gv_status' ), $return ) ) . $anchor );
		exit;
	};

	if ( ! isset( $_POST['gv_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['gv_nonce'] ), 'glenvarra_form' ) ) {
		$back( 'error' );
	}
	// Honeypot: pretend success for bots.
	if ( ! empty( $_POST['gv_website'] ) ) {
		$back( 'sent' );
	}

	$email = isset( $_POST['gv_email'] ) ? sanitize_email( wp_unslash( $_POST['gv_email'] ) ) : '';
	if ( ! is_email( $email ) || empty( $_POST['gv_consent'] ) ) {
		$back( 'error' );
	}

	$text   = static function ( $key ) {
		return isset( $_POST[ $key ] ) ? sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Missing -- verified above.
	};
	$fields = array( 'Email' => $email );

	if ( 'newsletter' === $form ) {
		$lists          = isset( $_POST['gv_lists'] ) ? array_map( 'sanitize_text_field', (array) wp_unslash( $_POST['gv_lists'] ) ) : array();
		$fields['Lists'] = implode( ', ', $lists );
		$title          = 'Newsletter: ' . $email;
	} else {
		$name = $text( 'gv_name' );
		if ( '' === $name ) {
			$back( 'error' );
		}
		$fields = array(
			'Name'        => $name,
			'Email'       => $email,
			'Phone'       => $text( 'gv_phone' ),
			'Child'       => $text( 'gv_child' ),
			'Entry point' => $text( 'gv_entry' ),
			'Year'        => $text( 'gv_year' ),
			'Place type'  => $text( 'gv_type' ),
			'Request'     => $text( 'gv_visit' ),
			'Message'     => isset( $_POST['gv_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['gv_message'] ) ) : '',
		);
		$title  = 'Enquiry: ' . $name . ' – ' . $fields['Entry point'] . ' ' . $fields['Year'];
	}
	$fields['Consent'] = 'Yes, ' . current_time( 'mysql' );

	$id = wp_insert_post(
		array(
			'post_type'   => 'gv_enquiry',
			'post_status' => 'private',
			'post_title'  => $title,
		)
	);
	if ( $id && ! is_wp_error( $id ) ) {
		update_post_meta( $id, '_gv_form', $form );
		update_post_meta( $id, '_gv_fields', $fields );
	}

	$body = '';
	foreach ( $fields as $label => $value ) {
		$body .= $label . ': ' . $value . "\n";
	}
	wp_mail( get_option( 'admin_email' ), '[Glenvarra website] ' . $title, $body, array( 'Reply-To: ' . $email ) );

	$back( 'sent' );
}
add_action( 'admin_post_nopriv_glenvarra_form', 'glenvarra_handle_form' );
add_action( 'admin_post_glenvarra_form', 'glenvarra_handle_form' );

/* Show the submitted fields on the enquiry screen. */
add_action(
	'add_meta_boxes_gv_enquiry',
	static function () {
		add_meta_box(
			'gv_enquiry_fields',
			__( 'Submission', 'glenvarra' ),
			static function ( $post ) {
				$fields = (array) get_post_meta( $post->ID, '_gv_fields', true );
				echo '<table class="widefat striped"><tbody>';
				foreach ( $fields as $label => $value ) {
					echo '<tr><th style="width:160px">' . esc_html( $label ) . '</th><td>' . nl2br( esc_html( $value ) ) . '</td></tr>';
				}
				echo '</tbody></table>';
			},
			'gv_enquiry',
			'normal',
			'high'
		);
	}
);

/* -------------------------------------------------------------------------
 * [glenvarra_breadcrumb]
 * ---------------------------------------------------------------------- */

add_shortcode(
	'glenvarra_breadcrumb',
	static function () {
		if ( ! is_page() || is_front_page() ) {
			return '';
		}
		$items = array( '<a href="' . esc_url( home_url( '/' ) ) . '">Home</a>' );
		foreach ( array_reverse( get_post_ancestors( get_queried_object_id() ) ) as $ancestor ) {
			$items[] = '<a href="' . esc_url( get_permalink( $ancestor ) ) . '">' . esc_html( get_the_title( $ancestor ) ) . '</a>';
		}
		return '<nav class="gv-breadcrumb" aria-label="Breadcrumb">' . implode( ' <span aria-hidden="true">/</span> ', $items ) . '</nav>';
	}
);

/*
 * Block templates run do_shortcode() before do_blocks(), so shortcode blocks
 * that live inside patterns or template parts would print literally. Render
 * them when the block itself renders.
 */
add_filter(
	'render_block_core/shortcode',
	static function ( $content ) {
		return false !== strpos( $content, '[' ) ? do_shortcode( $content ) : $content;
	}
);
