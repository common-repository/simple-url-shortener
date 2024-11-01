<?php
/**
* Uninstaller
*
* Uninstall the plugin by removing any options from the database
*
* @package	Artiss-URL-Shortener
* @since	2.0
*/

// If the uninstall was not called by WordPress, exit

if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) { exit(); }

// Delete all options

delete_option( 'url_shortener_activated' );
delete_option( 'artiss_url_shortener' );

// Delete cache

global $wpdb;

$wpdb -> query( "DELETE FROM $wpdb->options WHERE option_name LIKE '_transient%_aus_cache_%'" );
?>