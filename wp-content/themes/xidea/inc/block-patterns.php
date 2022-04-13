<?php
/**
 * Xidea: Block Patterns
 *
 * @since Xidea 1.0.1
 */

/**
 * Registers block patterns and categories.
 *
 * @since Xidea 1.0.1
 *
 * @return void
 */
function xidea_register_block_patterns() {
	$block_pattern_categories = array(
		'featured' => array( 'label' => __( 'Featured', 'xidea' ) ),
		'footer'   => array( 'label' => __( 'Footers', 'xidea' ) ),
		'header'   => array( 'label' => __( 'Headers', 'xidea' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since Xidea 1.0.1
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'xidea_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'footer-default',
		'header-default',
		'hero-section',
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @since Xidea 1.0.1
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'xidea_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/inc/patterns/' . $block_pattern . '.php' );

		register_block_pattern(
			'xidea/' . $block_pattern,
			require $pattern_file
		);
	}
}
add_action( 'init', 'xidea_register_block_patterns', 9 );
