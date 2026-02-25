<?php
/**
 * Plugin name: Indigo Tree - core functionality
 * Plugin URI: https://indigotree.co.uk
 * Description: Provides core functionality for the website.
 * Version: 1.0.0
 * Requires PHP: 8.2
 * Author: Indigo Tree
 * Author URI: https://indigotree.co.uk
 * Text Domain: indigotree-site-core
 */

declare(strict_types=1);

namespace IndigoTree\Site;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/includes/settings.php';
require_once __DIR__ . '/includes/block-bindings.php';
require_once __DIR__ . '/includes/block-styles.php';

// Core behaviour filters.
add_filter( 'should_load_remote_block_patterns', '__return_false' );
add_filter( 'should_load_separate_core_block_assets', '__return_true' );
add_filter( 'img_caption_shortcode_width', '__return_false' );

// Setup & menus.
add_action( 'after_setup_theme', __NAMESPACE__ . '\\theme_setup_changes'          );
add_action( 'admin_menu',        __NAMESPACE__ . '\\add_patterns_admin_menu_item' );

// Thumbnail fallback image.
add_filter( 'post_thumbnail_html', __NAMESPACE__ . '\\custom_fallback_post_thumbnail_html', 10, 5 );

// Gravity Forms modifications.
add_filter( 'gform_submit_button', __NAMESPACE__ . '\\add_class_to_gravity_forms_buttons', 10, 2 );
add_filter( 'gform_previous_button', __NAMESPACE__ . '\\add_class_to_gravity_forms_buttons', 10, 2 );
add_filter( 'gform_next_button', __NAMESPACE__ . '\\add_class_to_gravity_forms_buttons', 10, 2 );

// Settings.
add_action( 'init',       __NAMESPACE__ . '\\Bindings\\indigotree_register_block_bindings' );
add_action( 'admin_menu', __NAMESPACE__ . '\\Settings\\add_settings_page' );

// Styles.
add_action( 'init', __NAMESPACE__ . '\\Styles\register_custom_block_styles' );

/**
 * Core changes for our theme setup.
 *
 * @return void
 */
function theme_setup_changes(): void {
	add_filter( 'should_load_remote_block_patterns', '__return_false' );
	add_filter( 'should_load_separate_core_block_assets', '__return_true' );
	add_filter( 'img_caption_shortcode_width', '__return_false' );
}

/**
 * Add the `Patterns` menu item to the admin area.
 *
 * @return void
 */
function add_patterns_admin_menu_item() : void {
	// TODO: fix duplicate.
	//add_submenu_page( 'themes.php', __( 'Patterns', 'indigotree-site-core' ), __( 'Patterns', 'indigotree-site-core' ), 'edit_posts', 'edit.php?post_type=wp_block', '', 0 );
}

/**
 * Add custom fallback for post thumbnails.
 *
 * @param string          $html               The post thumbnail HTML.
 * @param int             $post_id            The post ID.
 * @param int             $post_thumbnail_id  The post thumbnail ID, or 0 if there isn’t one.
 * @param string|int[]    $size               Requested image size.
 * @param string|array    $attr               Query string or array of attributes.
 *
 * @return string
 */
function custom_fallback_post_thumbnail_html( $html, $post_id, $post_thumbnail_id, $size, $attr ) : string {
	if ( $html !== '' ) {
		return $html;
	}

	// Inline SVGs for different sizes (grey background).
	$src_600  = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='600' height='375'%3E%3Crect width='100%25' height='100%25' fill='grey'/%3E%3C/svg%3E";
	$src_1200 = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='1200' height='750'%3E%3Crect width='100%25' height='100%25' fill='grey'/%3E%3C/svg%3E";
	$src_2400 = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='2400' height='1500'%3E%3Crect width='100%25' height='100%25' fill='grey'/%3E%3C/svg%3E";

	$attr = wp_parse_args( $attr, [
		'aria-hidden' => 'true',
		'alt'         => '',
		'class'       => "attachment-$size size-$size wp-post-image",
		'sizes'       => '(max-width: 600px) 600px, (max-width: 1200px) 1200px, 2400px',
		'src'         => $src_600,
		'srcset'      => sprintf( '%s 600w, %s 1200w, %s 2400w', $src_600, $src_1200, $src_2400 ),
	] );

	$html = '<img';
	foreach ( $attr as $name => $value ) {
		$html .= ' ' . esc_attr( $name ) . '="' . esc_attr( $value ) . '"';
	}
	$html .= ' />';

	return $html;
}

/**
 * Add the `wp-element-button` class to Gravity Form buttons.
 *
 * This is required for the buttons to inherit `theme.json` styles.
 *
 * @param string $button The button object.
 * @param array  $form   The form object.
 *
 * @return string $button_before The updated button HTML.
 */
function add_class_to_gravity_forms_buttons( $button, $form ) {
	$fragment = \WP_HTML_Processor::create_fragment( $button );

	// Get the input element inside the outer button element.
	$fragment->next_token();
	$fragment->add_class( 'wp-element-button' );

	return $fragment->get_updated_html();
}
