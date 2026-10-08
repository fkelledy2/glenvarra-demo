<?php
/**
 * Glenvarra College demo theme.
 *
 * @package Glenvarra
 */

defined( 'ABSPATH' ) || exit;

define( 'GLENVARRA_VERSION', '1.0.0' );

require_once get_theme_file_path( 'inc/features.php' );
require_once get_theme_file_path( 'inc/demo-content.php' );

/**
 * Theme supports and editor styles.
 */
add_action(
	'after_setup_theme',
	static function () {
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'post-thumbnails' );
		add_editor_style( 'style.css' );
	}
);

/**
 * Front-end stylesheet.
 */
add_action(
	'wp_enqueue_scripts',
	static function () {
		wp_enqueue_style( 'glenvarra', get_stylesheet_uri(), array(), GLENVARRA_VERSION );
	}
);

/**
 * Pattern category for the theme's own patterns.
 */
add_action(
	'init',
	static function () {
		register_block_pattern_category( 'glenvarra', array( 'label' => __( 'Glenvarra College', 'glenvarra' ) ) );
	}
);
