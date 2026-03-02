<?php
declare(strict_types=1);

namespace IndigoTree\Site\Styles;

defined( 'ABSPATH' ) || exit;

/**
 * Register custom block styles on init.
 */
function register_custom_block_styles(): void {
	/** @var array<string, array<string, array{label: string, inline_style?: array, is_default?: bool, style_handle?: string}>> $block_styles */
	$block_styles = [
		'core/button' => get_core_button_block_styles(),
	];

	foreach ( $block_styles as $block => $styles ) {
		foreach ( $styles as $style_name => $style_data ) {
			$settings = [
				'name'  => $style_name,
				'label' => $style_data['label'],
			];

			$settings['is_default'] = ! empty( $style_data['is_default'] ) ? $style_data['is_default'] : false;

			if ( $block === 'core/paragraph' ) {
				$block_class = '';
			} else {
				$prefix_map = [
					'core/'       => 'wp-block-',
					'pb/'         => 'wp-block-pb-',
					'indigotree/' => 'wp-block-indigotree-',
				];

				$block_class = null;
				foreach ( $prefix_map as $prefix => $replacement ) {
					if ( strpos( $block, $prefix ) === 0 ) {
						$block_class = str_replace( $prefix, $replacement, $block );
						break;
					}
				}

				if ( $block_class === null ) {
					$block_class = sanitize_title( $block );
				}
			}

			$inline_style = '';

			if ( ! empty( $style_data['inline_style'] ) ) {
				$inline_style = generate_inline_styles(
					$style_name,
					$block_class,
					'',
					$style_data['inline_style'],
					$settings['is_default']
				);
			}

			if ( ! empty( $inline_style ) ) {
				$settings['inline_style'] = trim( $inline_style );
			}

			if ( ! empty( $style_data['style_handle'] ) ) {
				$settings['style_handle'] = $style_data['style_handle'];
			}

			register_block_style( $block, $settings );
		}
	}
}

/**
 * Generate CSS block string.
 *
 * @param string $block_class
 * @param string $style_name
 * @param string $target_element
 * @param array  $styles
 * @param string $pseudo
 * @param bool   $is_default
 * @param bool   $is_fully_qualified
 *
 * @return string
 */
function generate_css_block( string $block_class, string $style_name, string $target_element, array $styles, string $pseudo = '', bool $is_default = false, bool $is_fully_qualified = false ): string {
	if ( empty( $styles ) ) {
		return '';
	}

	$css           = '';
	$root_selector = '';

	if ( $is_fully_qualified ) {
		$selector = $target_element;
	} else {
		if ( $block_class === '' ) {
			$root_selector = ":root :where(.is-style-{$style_name})";
		} else {
			$root_selector = $is_default
				? ":root :where(.{$block_class})"
				: ":root :where(.{$block_class}.is-style-{$style_name})";
		}

		// Replace `&` with root selector or append selector
		if ( strpos( $target_element, '&' ) !== false ) {
			$selector = str_replace( '&', $root_selector, $target_element );
		} else {
			$selector = "{$root_selector}{$target_element}";
		}
	}

	$css .= "{$selector}{$pseudo} { ";

	foreach ( $styles as $property => $value ) {
		$css .= "{$property}: {$value}; ";
	}

	$css .= '} ';

	return $css;
}

/**
 * Generate inline styles (converted from the class method).
 *
 * @param string $style_name
 * @param string $block_class
 * @param string $target_element
 * @param array  $inline_style_data
 * @param bool   $is_default
 *
 * @return string
 */
function generate_inline_styles( string $style_name, string $block_class, string $target_element, array $inline_style_data, bool $is_default = false ): string {
	$inline_style = '';

	$pseudo_elements = array(
		'before' => '::before',
		'after'  => '::after',
	);

	$pseudo_classes = array(
		'hover'  => ':hover',
		'focus'  => ':focus',
		'active' => ':active',
	);

	// base
	if ( ! empty( $inline_style_data['base'] ) ) {
		$inline_style .= generate_css_block(
			$block_class,
			$style_name,
			$target_element,
			$inline_style_data['base'],
			'',
			$is_default
		);
	}

	// before/after on main element
	foreach ( $pseudo_elements as $pseudo_key => $pseudo_suffix ) {
		if ( ! empty( $inline_style_data[ $pseudo_key ] ) ) {
			$inline_style .= generate_css_block(
				$block_class,
				$style_name,
				$target_element,
				$inline_style_data[ $pseudo_key ],
				$pseudo_suffix,
				$is_default
			);
		}
	}

	// pseudo-classes on main element (and nested before/after)
	foreach ( $pseudo_classes as $pseudo_key => $pseudo_suffix ) {
		if ( ! empty( $inline_style_data[ $pseudo_key ] ) && is_array( $inline_style_data[ $pseudo_key ] ) ) {
			$filtered_pseudo_styles = array_filter(
				$inline_style_data[ $pseudo_key ],
				function ( $value ) {
					return is_string( $value );
				}
			);

			if ( ! empty( $filtered_pseudo_styles ) ) {
				$inline_style .= generate_css_block(
					$block_class,
					$style_name,
					$target_element,
					$filtered_pseudo_styles,
					$pseudo_suffix,
					$is_default
				);
			}

			foreach ( $pseudo_elements as $pseudo_element_key => $pseudo_element_suffix ) {
				if ( ! empty( $inline_style_data[ $pseudo_key ][ $pseudo_element_key ] ) &&
					is_array( $inline_style_data[ $pseudo_key ][ $pseudo_element_key ] )
				) {
					$inline_style .= generate_css_block(
						$block_class,
						$style_name,
						$target_element,
						$inline_style_data[ $pseudo_key ][ $pseudo_element_key ],
						"$pseudo_suffix$pseudo_element_suffix",
						$is_default
					);
				}
			}
		}
	}

	// a inside target element
	if ( ! empty( $inline_style_data['a'] ) ) {
		$anchor_styles = array_filter(
			$inline_style_data['a'],
			function ( $value ) {
				return is_string( $value );
			}
		);

		if ( ! empty( $anchor_styles ) ) {
			$inline_style .= generate_css_block(
				$block_class,
				$style_name,
				"{$target_element} a",
				$anchor_styles,
				'',
				$is_default
			);
		}
	}

	// children
	if ( ! empty( $inline_style_data['child'] ) ) {
		foreach ( $inline_style_data['child'] as $child => $child_style ) {
			if ( ! empty( $child_style ) && ! empty( $child_style['style'] ) ) {
				$child_selector      = $child_style['selector'];
				$is_fully_qualified  = false;

				if ( strpos( $child_selector, '&' ) !== false ) {
					$child_selector     = str_replace( '&', $target_element, $child_selector );
					$is_fully_qualified = true;
				} else {
					$child_selector = "{$target_element} {$child_selector}";
				}

				$child_styles = array_filter(
					$child_style['style'],
					function ( $value ) {
						return is_string( $value );
					}
				);

				if ( ! empty( $child_styles ) ) {
					$inline_style .= generate_css_block(
						$block_class,
						$style_name,
						$child_selector,
						$child_styles,
						'',
						$is_default,
						$is_fully_qualified
					);
				}

				foreach ( $pseudo_elements as $pseudo_key => $pseudo_suffix ) {
					if ( ! empty( $child_style[ $pseudo_key ] ) && is_array( $child_style[ $pseudo_key ] ) ) {
						$child_selector = $child_style['selector'];
						$child_styles   = array_filter( $child_style[ $pseudo_key ], 'is_string' );

						if ( ! empty( $child_styles ) ) {
							$inline_style .= generate_css_block(
								$block_class,
								$style_name,
								"{$target_element} {$child_selector}",
								$child_styles,
								$pseudo_suffix,
								$is_default
							);
						}
					}
				}
			}
		}
	}

	// a pseudo-elements
	foreach ( $pseudo_elements as $pseudo_key => $pseudo_suffix ) {
		if ( ! empty( $inline_style_data['a'][ $pseudo_key ] ) && is_array( $inline_style_data['a'][ $pseudo_key ] ) ) {
			$inline_style .= generate_css_block(
				$block_class,
				$style_name,
				"{$target_element} a",
				$inline_style_data['a'][ $pseudo_key ],
				$pseudo_suffix,
				$is_default
			);
		}
	}

	// a pseudo-classes
	foreach ( $pseudo_classes as $pseudo_key => $pseudo_suffix ) {
		if ( ! empty( $inline_style_data['a'][ $pseudo_key ] ) && is_array( $inline_style_data['a'][ $pseudo_key ] ) ) {
			$filtered_pseudo_styles = array_filter(
				$inline_style_data['a'][ $pseudo_key ],
				function ( $value ) {
					return is_string( $value );
				}
			);

			if ( ! empty( $filtered_pseudo_styles ) ) {
				$inline_style .= generate_css_block(
					$block_class,
					$style_name,
					"{$target_element} a",
					$filtered_pseudo_styles,
					$pseudo_suffix,
					$is_default
				);
			}

			foreach ( $pseudo_elements as $pseudo_element_key => $pseudo_element_suffix ) {
				if ( ! empty( $inline_style_data['a'][ $pseudo_key ][ $pseudo_element_key ] ) &&
					is_array( $inline_style_data['a'][ $pseudo_key ][ $pseudo_element_key ] )
				) {
					$inline_style .= generate_css_block(
						$block_class,
						$style_name,
						"{$target_element} a",
						$inline_style_data['a'][ $pseudo_key ][ $pseudo_element_key ],
						"$pseudo_suffix$pseudo_element_suffix",
						$is_default
					);
				}
			}
		}
	}

	// media queries
	if ( ! empty( $inline_style_data['media'] ) && is_array( $inline_style_data['media'] ) ) {
		foreach ( $inline_style_data['media'] as $media_query => $media_styles ) {
			$media_css = "@media {$media_query} { ";

			if ( ! empty( $media_styles['base'] ) ) {
				$media_css .= generate_css_block(
					$block_class,
					$style_name,
					$target_element,
					$media_styles['base'],
					'',
					$is_default
				);
			}

			if ( ! empty( $media_styles['child'] ) && is_array( $media_styles['child'] ) ) {
				foreach ( $media_styles['child'] as $child ) {
					if ( ! empty( $child['selector'] ) && ! empty( $child['style'] ) && is_array( $child['style'] ) ) {
						$child_selector = $child['selector'];
						$child_styles   = array_filter( $child['style'], 'is_string' );

						if ( ! empty( $child_styles ) ) {
							$media_css .= generate_css_block(
								$block_class,
								$style_name,
								strpos( $child['selector'], '&' ) !== false
									? str_replace( '&', $target_element, $child['selector'] )
									: "{$target_element} {$child['selector']}",
								$child_styles,
								'',
								$is_default
							);
						}
					}

					foreach ( $pseudo_elements as $pseudo_key => $pseudo_suffix ) {
						if ( ! empty( $child[ $pseudo_key ] ) && is_array( $child[ $pseudo_key ] ) ) {
							$pseudo_styles = array_filter( $child[ $pseudo_key ], 'is_string' );

							if ( ! empty( $pseudo_styles ) ) {
								$media_css .= generate_css_block(
									$block_class,
									$style_name,
									strpos( $child['selector'], '&' ) !== false
										? str_replace( '&', $target_element, $child['selector'] )
										: "{$target_element} {$child['selector']}",
									$pseudo_styles,
									$pseudo_suffix,
									$is_default
								);
							}
						}
					}
				}
			}

			foreach ( $pseudo_elements as $pseudo_key => $pseudo_suffix ) {
				if ( ! empty( $media_styles[ $pseudo_key ] ) ) {
					$media_css .= generate_css_block(
						$block_class,
						$style_name,
						$target_element,
						$media_styles[ $pseudo_key ],
						$pseudo_suffix,
						$is_default
					);
				}
			}

			foreach ( $pseudo_classes as $pseudo_key => $pseudo_suffix ) {
				if ( ! empty( $media_styles[ $pseudo_key ] ) && is_array( $media_styles[ $pseudo_key ] ) ) {
					$filtered_pseudo_styles = array_filter( $media_styles[ $pseudo_key ], 'is_string' );

					if ( ! empty( $filtered_pseudo_styles ) ) {
						$media_css .= generate_css_block(
							$block_class,
							$style_name,
							$target_element,
							$filtered_pseudo_styles,
							$pseudo_suffix,
							$is_default
						);
					}

					foreach ( $pseudo_elements as $pseudo_element_key => $pseudo_element_suffix ) {
						if ( ! empty( $media_styles[ $pseudo_key ][ $pseudo_element_key ] ) ) {
							$media_css .= generate_css_block(
								$block_class,
								$style_name,
								$target_element,
								$media_styles[ $pseudo_key ][ $pseudo_element_key ],
								"$pseudo_suffix$pseudo_element_suffix",
								$is_default
							);
						}
					}
				}
			}

			$media_css    .= ' } ';
			$inline_style .= $media_css;
		}
	}

	return $inline_style;
}

/**
 * Get core button block styles.
 *
 * @return array[] Array of core button block styles.
 */
function get_core_button_block_styles(): array {
	return [
		'round-button' => [
			'label'        => _x(
				'Round Button',
				'core/button block style label: Round Button',
				'indigotree-site-core'
			),
			'is_default'   => false,
			'inline_style' => [
				'child' => [
					'button' => [
						'selector' => '&.is-style-round-button .wp-block-button__link',
						'style'    => [
							'border-radius' => '50%',
							'min-width'     => '54px !important',
						],
					],
				],
			],
		],
	];
}
