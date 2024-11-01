<?php
/*
Plugin Name: Artiss URL Shortener
Plugin URI: http://www.artiss.co.uk/url-shortener
Description: Shorten a URL using one of over 100 shortening services
Version: 2.0
Author: David Artiss
Author URI: http://www.artiss.co.uk
*/

/**
* Plugin initialisation
*
* Loads the plugin's translated strings and the plugins' JavaScript
*
* @since	2.0
*/

function aus_plugin_init() {

	$language_dir = plugin_basename( dirname( __FILE__ ) ) . '/languages/';

	load_plugin_textdomain( 'simple-url-shortener', false, $language_dir );

}

add_action( 'init', 'aus_plugin_init' );

/**
* Artiss URL Shortener
*
* Main code - include various functions
*
* @package	Artiss-URL-Shortener
* @since	1.7
*/

define( 'url_shortener_version', '2.0' );

$functions_dir = WP_PLUGIN_DIR . '/simple-url-shortener/includes/';

// Include all the various functions

if ( is_admin() ) {

	include_once( $functions_dir . 'aus-admin-config.php' );		        // Assorted admin configuration changes

	if ( !function_exists( 'artiss_plugin_ads' ) ) {

		include_once( $functions_dir . 'artiss-plugin-ads.php' );           // Option screen ads

	}

}

include_once( $functions_dir . 'aus-shared-functions.php' );       			// Various short functions

include_once( $functions_dir . 'aus-set-up-arrays.php' );       			// Set up URL Shortening data

include_once( $functions_dir . 'aus-deprecated.php' );	        			// Deprecated functions

include_once( $functions_dir . 'aus-generate-short-url.php' );				// Generate a short URL

include_once( $functions_dir . 'aus-validate-shortener.php' );				// Validate shortener services

?>