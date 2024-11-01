<?php

/**
* Generate a short URL
*
* Functions to generate a shortened URL
*
* @package	Artiss-URL-Shortener
* @since	1.7
*/

/**
* Shorten URL
*
* Function to return a shortened URL
*
* @since	1.0
*
* @uses     aus_build_shortening_url    Create the shortening URL
* @uses     aus_convert_return_format   Convert the form of the returned URL
* @uses     aus_get_parameters          Extract parameters from a string
*
* @param	$url	string	The URL to shorten
* @param	$paras	string	A list of shortening parameters
* @return			string	The short URL
*/

function url_shortener( $url, $paras ) {

	$options = aus_set_general_defaults();

	// Get parameters and set up initial variable assignments

	$service_name = strtolower( aus_get_parameters( $paras, 'service' ) );
	if ( $service_name == '' ) { $service_name = $options[ 'service' ]; }
	$key = aus_get_parameters( $paras, 'apikey' );
	if ( $key == '' ) { $key = $options[ 'apikey' ]; }
	$login = aus_get_parameters( $paras, 'login' );
	if ( $login == '' ) { $login = $options[ 'login' ]; }
	$password = aus_get_parameters( $paras, 'password' );
	if ( $para == '' ) { $password = $options[ 'password' ]; }
	$username = aus_get_parameters( $paras, 'username' );
	if ( $username == '' ) { $username = $options[ 'username' ]; }
	$uid = aus_get_parameters( $paras, 'uid' );
	if ( $uid == '' ) { $uid = $options[ 'uid' ]; }
	$token = aus_get_parameters( $paras, 'token' );
	if ( $token == '' ) { $token = $options[ 'token' ]; }
	$cache = strtolower( aus_get_parameters( $paras, 'cache' ) );

	// If no URL was specified, get the current post URL

	if ( $url == '' ) {
		global $post;
		$url = get_permalink( $post -> ID );
	}

	// Generate Cache details

	$filekey = 'aus_cache_' . md5( $url . $service_name . $key . $login . $password . $username . $uid . $token );

	// Clear cache, if required

	if ( $cache == 'reset') { delete_transient( $filekey ); }

	// Check if a cached version already exists - if so, return it

	$shorturl = get_transient( $filekey );

	// If no cached version returned, fetch and convert

	if ( !$shorturl ) {

		// Build service URL

		$shortening_services = aus_build_services_array();

		$service_url = aus_build_shortening_url( $shortening_services[ $service_name ], $service_name, $key, $login, $password, $username, $uid, $token, $url );

		if ( $service_url != '' ) {

			// If I don't yet have the short code data, fetch it

			$file_return = aus_get_file( $service_url );
			$return_data = $file_return[ 'file' ];

			// Convert the returned data into a short URL

			$shorturl = aus_convert_return_format( $return_data, $service_name );
		}

		// If shorturl was not valid, make it the current URL. Otherwise, update cache

		if ( substr( $shorturl, 0, 4 ) != 'http' ) {
			$shorturl = $url;
		} else {
			set_transient( $filekey, $shorturl, 0 );
		}
	}

	return $shorturl;
}

/**
* Build Shortening URL
*
* Function to build the shortening URL
*
* @since	1.6
*
* @param	$service_url	string	The URL of the shortening call
* @param	$service_name	string	The URL shortening service
* @param	$key	        string	Users key
* @param    $login          string  Users login
* @param    $password       string  Users password
* @param    $url            string  URL to shorten
* @return			        string	The URL of the shortening call
*/

function aus_build_shortening_url( $service_url, $service_name, $key, $login, $password, $username, $uid, $token, $url ) {

	// Encrypt password for certain services

	if ( substr( $service_name, 0, 6 ) == 'LNK.co' ) { $password = urlencode( md5( $password, true ) ); }

	// Make any API key, login, etc changes

	$service_url = str_replace( '{key}', $key, $service_url );
	$service_url = str_replace( '{login}', $login, $service_url );
	$service_url = str_replace( '{password}', $password, $service_url );
	$service_url = str_replace( '{username}', $username, $service_url );
	$service_url = str_replace( '{uid}', $uid, $service_url );
	$service_url = str_replace( '{token}', $token, $service_url );

	// Access the service API and get the shortened URL

	if ( substr( $service_url, 0, 1 ) == 'N' ) {
		$service_url = substr( $service_url, 1 ) . $url;
	} else {
		if ( substr( $service_url, 0, 1 ) == '6' ) {
			$service_url .= base64_encode( $url );
		} else {
			$service_url .= urlencode( $url );
		}
	}

	return $service_url;
}

/**
* Convert Return Format
*
* Function to convert return format (if necessary)
*
* @since	1.6
*
* @uses     aus_extract_json    Extract JSON
* @uses     aus_extract_xml     Extract XML
*
* @param	$shorturl	    string	The short URL
* @param	$service_name	string  The name of the service
* @return			        string	The short URL
*/

function aus_convert_return_format( $shorturl, $service_name ) {

	// Extract the URL from XML files

	$xml_convert = build_xml_array();
	if ( isset( $xml_convert[ $service_name ] ) ) { $shorturl = aus_extract_xml( $shorturl, $xml_convert[ $service_name ] ); }

	// Extract the URL from JSON files

	$json_convert = build_json_array();
	if ( isset( $json_convert[ $service_name ] ) ) { $shorturl = aus_extract_json( $shorturl, $json_convert[ $service_name ] ); }

	// Trim specific number of characters from beginning of output

	$output_trim = build_trim_array();
	if ( isset( $output_trim[ $service_name ] ) ) { $shorturl = substr( $shorturl, $output_trim[ $service_name ] ); }

	// If only a short code is returned, append the rest of the URL on

	$url_addition = build_url_array();
	if ( isset( $url_addition[ $service_name ] ) ) { $shorturl = $url_addition[ $service_name ] . $shorturl; }

	return $shorturl;
}
?>