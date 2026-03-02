<?php
declare(strict_types=1);

namespace IndigoTree\Theme;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme',           __NAMESPACE__ . '\\setup_theme'                 );
add_action( 'wp_enqueue_scripts',          __NAMESPACE__ . '\\enqueue_frontend_assets'     );
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\enqueue_block_editor_assets' );
add_action( 'admin_enqueue_scripts',       __NAMESPACE__ . '\\enqueue_admin_panel_assets'  );

/**
 * Core changes for our theme setup.
 *
 * @return void
 */
function setup_theme() : void {
	add_theme_support( 'yoast-seo-breadcrumbs' );

	register_nav_menus( [
		'primary'   => __( 'Primary', 'indigotree-theme-2025' ),
		'secondary' => __( 'Secondary', 'indigotree-theme-2025' ),
		'policies'  => __( 'Policies', 'indigotree-theme-2025' ),
	] );
}

/**
 * Enqueue front end assets.
 *
 * This function enqueues the theme's styles and scripts for the frontend.
 *
 * @return void
 */
function enqueue_frontend_assets() : void {
	// Front-end styles
	$style_asset_file = include __DIR__ . '/build/style.asset.php';

	wp_enqueue_style(
		'indigotree-main-css',
		get_template_directory_uri() . '/build/style.css',
		$style_asset_file['dependencies'],
		$style_asset_file['version']
	);

	// Front-end scripts
	$script_asset_file = include __DIR__ . '/build/index.asset.php';

	wp_enqueue_script(
		'indigotree-main-js',
		get_template_directory_uri() . '/build/index.js',
		$script_asset_file['dependencies'],
		$script_asset_file['version']
	);
}

/**
 * Enqueue block editor assets.
 *
 * This function enqueues the theme's styles and scripts for the block editor.
 *
 * @return void
 */
function enqueue_block_editor_assets() : void {
	$editor_path = __DIR__ . '/build/editor-style.asset.php';
	$script_path = __DIR__ . '/build/editor.asset.php';

	if ( file_exists( $editor_path ) ) {
		$editor_style_asset_file = include $editor_path;

		wp_enqueue_style(
			'indigotree-editor-style',
			get_template_directory_uri() . '/build/editor-style.css',
			$editor_style_asset_file['dependencies'],
			$editor_style_asset_file['version']
		);
	}

	if ( file_exists( $script_path ) ) {
		$editor_script_asset_file = include $script_path;

		wp_enqueue_script(
			'indigotree-editor-script',
			get_template_directory_uri() . '/build/editor.js',
			$editor_script_asset_file['dependencies'],
			$editor_script_asset_file['version']
		);
	}
}

/**
 * Enqueue block admin panel assets.
 *
 * This function enqueues the theme's styles and scripts for the admin panel.
 *
 * @return void
 */
function enqueue_admin_panel_assets() : void {
	$path = __DIR__ . '/build/admin-style.asset.php';
	if ( ! file_exists( $path ) ) {
		return;
	}

	$admin_style_asset_file = include $path;

	wp_enqueue_style(
		'indigotree-admin-style',
		get_template_directory_uri() . '/build/admin-style.css',
		$admin_style_asset_file['dependencies'],
		$admin_style_asset_file['version']
	);
}
