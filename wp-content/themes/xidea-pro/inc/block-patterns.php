<?php
/**
 * Xidea Blocks: Block Patterns
 *
 * @since Xidea Blocks 1.0
 */

/**
 * Registers block patterns and categories.
 *
 * @return void
 * @since Xidea Blocks 1.0
 *
 */
function xidea_blocks_register_block_patterns() {
	$block_pattern_categories = array(
		'featured' => array( 'label' => __( 'Featured', 'xidea-pro' ) ),
		'footer'   => array( 'label' => __( 'Footers', 'xidea-pro' ) ),
		'header'   => array( 'label' => __( 'Headers', 'xidea-pro' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 * @type array[] $properties {
	 *         An array of block category properties.
	 *
	 * @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 * @since Xidea Blocks 1.0
	 *
	 */
	$block_pattern_categories = apply_filters( 'xidea_blocks_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'footer-default',
		'header-default',
		'header-flat-with-top-bar',
		'header-with-centered-logo',
		'header-boxed-with-social-icons',
		'section-hero',
		'section-icon-boxes',
		'section-icon-cards',
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @param array $block_patterns List of block patterns by name.
	 *
	 * @since Xidea Blocks 1.0
	 *
	 */
	$block_patterns = apply_filters( 'xidea_blocks_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {

		$explode_pattern_names = explode( '-', $block_pattern );
		$pattern_path          = $explode_pattern_names[0] . 's';
		$pattern_file          = get_theme_file_path( '/inc/patterns/' . $pattern_path . '/' . $block_pattern . '.php' );

		register_block_pattern(
			'xidea-pro/' . $block_pattern,
			require $pattern_file
		);
	}
}

add_action( 'init', 'xidea_blocks_register_block_patterns', 9 );
