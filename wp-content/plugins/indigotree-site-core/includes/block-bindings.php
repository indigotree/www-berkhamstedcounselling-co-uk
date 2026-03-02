<?php
declare(strict_types=1);

namespace IndigoTree\Site\Bindings;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Register all block binding sources on init.
 */
function indigotree_register_block_bindings(): void {
	register_block_bindings_source(
		'indigotree/site-copyright',
		[
			'label'              => __( 'Site copyright (edit in theme options)', 'indigotree-site-core' ),
			'get_value_callback' => __NAMESPACE__ . '\\site_copyright_source',
		]
	);

	register_block_bindings_source(
		'indigotree/site-credit',
		[
			'label'              => __( 'Site credit', 'indigotree-site-core' ),
			'get_value_callback' => __NAMESPACE__ . '\\site_credit_source',
		]
	);
}

/**
 * Create the `Site Copyright` source.
 *
 * @return string - The site copyright text.
 */
function site_copyright_source(): string {
	$fallback_text       = __( 'Copyright %1$s %2$s %3$s, all rights reserved.', 'indigotree-site-core' );
	$theme_options_text  = get_option( 'copyright_notice' ) ?: '';
	$site_copyright_text = ! empty( $theme_options_text ) ? $theme_options_text : $fallback_text;

	return sprintf(
		$site_copyright_text,
		'&#169;',
		date( 'Y' ),
		get_bloginfo( 'name' )
	);
}

/**
 * Create the `Site Credit` source.
 *
 * @return string - The site credit text.
 */
function site_credit_source(): string {
	$credit_text = sprintf(
		__( 'Website by Indigo Tree %1$s(opens a new window)%2$s', 'indigotree-site-core' ),
		'<span class="screen-reader-text">',
		'</span>'
	);

	return sprintf(
		'%1$s %2$s %3$s %4$s %5$s',
		'<a href="https://indigotree.co.uk/?utm_campaign=client%2Bwebsite&amp;utm_source=',
		esc_attr( parse_url( get_site_url(), PHP_URL_HOST ) ),
		'%2Bwebsite&amp;utm_medium=footer%2Blink&amp;utm_content=Website+by+Indigo+Tree" target="_blank" rel="noopener">',
		$credit_text,
		'</a>'
	);
}
