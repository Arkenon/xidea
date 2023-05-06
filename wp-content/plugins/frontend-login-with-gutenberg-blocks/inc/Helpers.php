<?php

namespace FLWGB;
/**
 * Class with static helper functions.
 */
class Helpers {

	/**
	 * Filters string for $_POST, $_GET or $_REQUEST operations
	 * @param string $str
	 * @return $str
	 */
	public static function filter_request_string( $str ) {
		return is_array( $str ) ? array_map( 'filter_request_string', $str ) : htmlspecialchars( trim( $str ) );
	}

	/**
	 * Secures $_POST operation
	 * @param string $name $_POST['name']
	 * @return $_POST['name'] or null when !isset($_POST['name'])
	 */
	public static function post( $name ) {
		$_POST = array_map( 'filter_request_string', $_POST );
		if ( isset( $_POST[ $name ] ) ) {
			return $_POST[ $name ];
		}else  {
			return null;
		}
	}

	/**
	 * Secures $_GET operation
	 * @param string $name $_GET['name']
	 * @return $_GET['name'] or null when !isset($_GET['name'])
	 */
	public static function get( $name ) {
		$_GET = array_map( 'filter_request_string', $_GET );
		if ( isset( $_GET[ $name ] ) ) {
			return $_GET[ $name ];
		} else  {
			return null;
		}
	}

	/**
	 * Secures $_REQUEST operation
	 * @param string $name $_REQUEST['name']
	 * @return $_REQUEST['name'] or null when !isset($_REQUEST['name'])
	 */
	public static function request( $name ) {
		$_REQUEST = array_map( 'filter_request_string', $_REQUEST );
		if ( isset( $_REQUEST[ $name ] ) ) {
			return $_REQUEST[ $name ];
		} else {
			return null;
		}
	}

}
