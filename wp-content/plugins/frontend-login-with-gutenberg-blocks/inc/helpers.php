<?php

/**
 * Helper functions.
 * @since 1.0.0
 * @package    Frontend_Login_With_Gutenberg_Blocks
 * @subpackage Frontend_Login_With_Gutenberg_Blocks/inc
 */


/**
 * Filters string for $_POST, $_GET or $_REQUEST operations
 *
 * @param string $str
 *
 * @return array|string $str or array
 * @since 1.0.0
 */
function filter_request_string( $str ) {

	return is_array( $str ) ? array_map( 'filter_request_string', $str ) : htmlspecialchars( trim( $str ) );

}

/**
 * Secures $_POST operation
 *
 * @param string $name $_POST['name']
 *
 * @return mixed|null $_POST['name'] or null when !isset($_POST['name'])
 * @since 1.0.0
 */
function post( $name ) {

	$_POST = array_map( 'filter_request_string', $_POST );

	return $_POST[ $name ] ?? null;

}

/**
 * Secures $_GET operation
 *
 * @param string $name $_GET['name']
 *
 * @return mixed|null $_GET['name'] or null when !isset($_GET['name'])
 * @since 1.0.0
 */
function get( $name ) {

	$_GET = array_map( 'filter_request_string', $_GET );

	return $_GET[ $name ] ?? null;

}

/**
 * Secures $_REQUEST operation
 *
 * @param string $name $_REQUEST['name']
 *
 * @return mixed|null $_REQUEST['name'] or null when !isset($_REQUEST['name'])
 * @since 1.0.0
 */
function request( $name ) {

	$_REQUEST = array_map( 'filter_request_string', $_REQUEST );

	return $_REQUEST[ $name ] ?? null;

}

/**
 * Print a php page as a view
 * To return a view uses include_once() function
 *
 * @param string $path Path for view page
 *
 * @since 1.0.0
 */
function print_view( $path ) {

	include_once plugin_dir_path( dirname( __FILE__ ) ) . $path;

}

/**
 * Returns an html variable as a view
 * To return a view uses include_once() function
 *
 * @param string $path Path for view page
 *
 * @return string $view
 * @var string $view html output
 * @since 1.0.0
 *
 */
function view( $path ): string {

	$view = "";

	//Include php file which has a variable named $view and equals to html output
	include_once plugin_dir_path( dirname( __FILE__ ) ) . $path;

	return $view;

}

/**
 * Includes a class or function.
 *
 * @param string $path Path for view page
 *
 * @since 1.0.0
 */
function using( $path ) {

	require_once plugin_dir_path( dirname( __FILE__ ) ) . $path;

}


// Değiştireceğimiz değeri oluşturan fonksiyon
function flwgb_replace_text( $content_option ) {


	$text = get_option( $content_option );

	$dynamicText = preg_replace_callback( '/{{(.*?)}}/', function ( $matches ) {

		$placeholder = $matches[1];

		if ( $placeholder === 'username' ) {
			return 'John';
		} else {
			return null;
		}

	}, $text );


	echo $dynamicText;

}


function get_select_options_from_query( $query_item, $option_name ) {

	$selected = $query_item->post_name === esc_attr( get_option( $option_name ) ) ? " selected" : "";

	echo '<option value="' . esc_attr( $query_item->post_name ) . '"' . $selected . '>
			' . $query_item->post_title . '
		  </option>';

}
