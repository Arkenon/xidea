<?php

namespace FLWGB\I18n;
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Frontend_Login_With_Gutenberg_Blocks
 * @subpackage Frontend_Login_With_Gutenberg_Blocks/inc
 */
class I18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_flwgb_textdomain() {

		load_plugin_textdomain(
			FLWGB_TEXT_DOMAIN,
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}

	/**
	 * Get translatable text from I18n.json file
	 *
	 * @return array $get_json Array of translatable texts
	 *
	 * @since    1.0.0
	 */
	protected static function get_translatable_texts(): array {

		$get_json = file_get_contents( plugin_dir_path( dirname( __FILE__ ) ) . '/inc/I18n/I18n.json' );

		return json_decode( $get_json, true );

	}

	/**
	 * Create an object for translatable texts
	 *
	 * @param string $text Translatable text name
	 *
	 * @return TranslatableText Object of translatable text
	 *
	 * @since    1.0.0
	 */
	public static function text( string $text ): TranslatableText {

		$texts = new TranslatableText();

		$texts->text    = self::get_translatable_texts()[ $text ]['text'];
		$texts->context = self::get_translatable_texts()[ $text ]['context'];

		return $texts;

	}

}
