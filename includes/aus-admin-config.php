<?php
/**
* Admin Menu Functions
*
* Various functions relating to the various administration screens
*
* @package	Artiss-URL-Shortener
*/

/**
* Add Settings link to plugin list
*
* Add a Settings link to the options listed against this plugin
*
* @since	2.0
*
* @param	string  $links	Current links
* @param	string  $file	File in use
* @return   string			Links, now with settings added
*/

function aus_add_settings_link( $links, $file ) {

	static $this_plugin;

	if ( !$this_plugin ) { $this_plugin = plugin_basename( __FILE__ ); }

	if ( strpos( $file, 'simple-url-shortener.php' ) !== false ) {

		$settings_link = '<a href="admin.php?page=aus-general-options">' . __( 'Settings', 'simple-url-shortener' ) . '</a>';
		array_unshift( $links, $settings_link );

	}

	return $links;
}

add_filter( 'plugin_action_links', 'aus_add_settings_link', 10, 2 );

/**
* Add meta to plugin details
*
* Add options to plugin meta line
*
* @since	1.0
*
* @param	string  $links	Current links
* @param	string  $file	File in use
* @return   string			Links, now with settings added
*/

function aus_set_plugin_meta( $links, $file ) {

	if ( strpos( $file, 'simple-url-shortener.php' ) !== false ) {

		$links = array_merge( $links, array( '<a href="http://www.artiss.co.uk/forum">' . __( 'Support', 'simple-url-shortener' ) . '</a>' ) );

		$links = array_merge( $links, array( '<a href="http://www.artiss.co.uk/donate">' . __( 'Donate', 'simple-url-shortener' ) . '</a>'  ) );
	}

	return $links;
}
add_filter( 'plugin_row_meta', 'aus_set_plugin_meta', 10, 2 );

/**
* Admin Screen Initialisation
*
* Set up admin menu and submenu options
*
* @since	2.0
*
* @uses     aus_contextual_help_type    Work out help type
*/

function aus_menu_initialise() {

	// Depending on WordPress version and available functions decide which (if any) contextual help system to use

	$contextual_help = aus_contextual_help_type();

	// Add main admin option

	add_menu_page( __( 'Artiss URL Shortener', 'artiss-url-shortener' ), __( 'URL Shortener', 'artiss-url-shortener' ), 'edit_posts', 'aus-general-options', 'aus_general_options', plugins_url() . '/simple-url-shortener/images/menu_icon.png' );

	// Add options sub-menu

	if ( $contextual_help == 'new' ) { global $aus_options_hook; }

	$aus_options_hook = add_submenu_page( 'aus-general-options', __( 'Artiss URL Shortener Options', 'artiss-url-shortener' ),  __( 'Options', 'artiss-url-shortener' ), 'edit_posts', 'aus-general-options', 'aus_general_options' );

	if ( $contextual_help == 'new' ) { add_action( 'load-' . $aus_options_hook, 'aus_add_options_help' ); }

	if ( $contextual_help == 'old' ) { add_contextual_help( $aus_options_hook, aus_options_help() ); }

	// Add services sub-menu

	if ( $contextual_help == 'new' ) { global $aus_services_hook; }

	$aus_services_hook = add_submenu_page( 'aus-general-options', __( 'URL Shortener Services', 'artiss-url-shortener' ), __( 'Services', 'artiss-url-shortener' ), 'edit_posts', 'aus-services', 'aus_services' );

	if ( $contextual_help == 'new' ) { add_action( 'load-' . $aus_services_hook, 'aus_add_services_help' ); }

	if ( $contextual_help == 'old' ) { add_contextual_help( $aus_services_hook, aus_services_help() ); }

	// Add instructions sub-menu

	if ( function_exists( 'wp_readme_parser' ) ) {
		add_submenu_page( 'aus-general-options', __( 'Artiss URL Shortener Instructions', 'simple-url-shortener' ), __( 'Instructions', 'simple-url-shortener' ), 'edit_posts', 'aus-support-instructions', 'aus_support_instructions' );
	}

	// Add about sub-menu

	if ( $contextual_help == 'new' ) { global $aus_about_hook; }

	$aus_about_hook = add_submenu_page( 'aus-general-options', __( 'About Artiss URL Shortener', 'artiss-url-shortener' ), __( 'About', 'artiss-url-shortener' ), 'edit_posts', 'aus-support-about', 'aus_support_about' );

	if ( $contextual_help == 'new' ) { add_action( 'load-' . $aus_about_hook, 'aus_add_about_help' ); }

	if ( $contextual_help == 'old' ) { add_contextual_help( $aus_about_hook, aus_about_help() ); }

}

add_action( 'admin_menu', 'aus_menu_initialise' );

/**
* Get contextual help type
*
* Return whether this WP installation requires the new or old contextual help type, or none at all
*
* @since	2.0
*
* @return   string			Contextual help type - 'new', 'old' or false
*/

function aus_contextual_help_type() {

	global $wp_version;

	$type = false;

	if ( ( float ) $wp_version >= 3.3 ) {
		$type = 'new';
	} else {
		if ( function_exists( 'add_contextual_help' ) ) {
			$type = 'old';
		}
	}

	return $type;
}

/**
* Include general options screen
*
* XHTML options screen to prompt and update some general plugin options
*
* @since	2.0
*/

function aus_general_options() {

	include_once( WP_PLUGIN_DIR . '/simple-url-shortener/includes/aus-options-general.php' );

}

/**
* Include services screen
*
* XHTML about screen which will, optionally, display service details as well
*
* @since	2.0
*/

function aus_services() {

	include_once( WP_PLUGIN_DIR . '/simple-url-shortener/includes/aus-list-services.php' );

}

/**
* Include instructions screen
*
* Display the instructions
*
* @since	2.0
*/

function aus_support_instructions() {

	include_once( WP_PLUGIN_DIR . '/simple-url-shortener/includes/aus-display-instructions.php' );

}

/**
* Include about and support screen
*
* XHTML about screen which will, optionally, display help details as well
*
* @since	2.0
*/

function aus_support_about() {

	include_once( WP_PLUGIN_DIR . '/simple-url-shortener/includes/aus-display-about.php' );

}

/**
* Add Options Help
*
* Add help tab to options screen
*
* @since	2.0
*
* @uses     aus_options_help    Return help text
*/

function aus_add_options_help() {

	global $aus_options_hook;
	$screen = get_current_screen();

	if ( $screen->id != $aus_options_hook ) { return; }

	$screen -> add_help_tab( array( 'id' => 'aus-options-help-tab', 'title'	=> __( 'Help', 'simple-url-shortener' ), 'content' => aus_options_help() ) );
}

/**
* Options Help
*
* Return help text for options screen
*
* @since	2.0
*
* @return	string	Help Text
*/

function aus_options_help() {

	$help_text = '<p>' . __( 'This screen allows you to define default settings for the Artiss URL Shortener plugin.', 'simple-url-shortener' ) . '</p>';
	$help_text .= '<p>' . __( 'Remember to click the Save Settings button at the bottom of the screen for new settings to take effect.', 'simple-url-shortener' ) . '</p>';
	$help_text .= '<p><strong>' . __( 'For more information:', 'simple-url-shortener' ) . '</strong></p>';
	$help_text .= '<p><a href="http://www.artiss.co.uk/url-shortener">' . __( 'Artiss URL Shortener Plugin Documentation', 'simple-url-shortener' ) . '</a></p>';
'</a></p>';
	$help_text .= '<p><a href="http://www.artiss.co.uk/forum">' . __( 'Artiss.co.uk Plugin Support Forum', 'simple-url-shortener' ) . '</a></p>';
	$help_text .= '<h4>' . __( 'This plugin, and all support, is supplied for free, but <a title="Donate" href="http://artiss.co.uk/donate" target="_blank">donations</a> are always welcome.', 'simple-url-shortener' ) . '</h4>';

	return $help_text;
}

/**
* Add About Help
*
* Add help tab to about screen
*
* @since	2.0
*
* @uses     aus_about_help    Return help text
*/

function aus_add_about_help() {

	global $aus_about_hook;
	$screen = get_current_screen();

	if ( $screen->id != $aus_about_hook ) { return; }

	$screen -> add_help_tab( array( 'id' => 'aus-about-help-tab', 'title'	=> __( 'Help', 'simple-url-shortener' ), 'content' => aus_about_help() ) );
}

/**
* About Help
*
* Return help text for about screen
*
* @since	2.0
*
* @return	string	Help Text
*/

function aus_about_help() {

	$help_text = '<p>' . __( 'This screen provides useful information about this plugin along with methods of support.', 'simple-url-shortener' ) . '</p>';
	$help_text .= '<p><strong>' . __( 'For more information:', 'simple-url-shortener' ) . '</strong></p>';
	$help_text .= '<p><a href="http://www.artiss.co.uk/url-shortener">' . __( 'Artiss URL Shortener Plugin Documentation', 'simple-url-shortener' ) . '</a></p>';
'</a></p>';
	$help_text .= '<p><a href="http://www.artiss.co.uk/forum">' . __( 'Artiss.co.uk Plugin Support Forum', 'simple-url-shortener' ) . '</a></p>';
	$help_text .= '<h4>' . __( 'This plugin, and all support, is supplied for free, but <a title="Donate" href="http://artiss.co.uk/donate" target="_blank">donations</a> are always welcome.', 'simple-url-shortener' ) . '</h4>';

	return $help_text;
}

/**
* Add Services Help
*
* Add help tab to services screen
*
* @since	2.0
*
* @uses     aus_services_help    Return help text
*/

function aus_add_services_help() {

	global $aus_services_hook;
	$screen = get_current_screen();

	if ( $screen->id != $aus_services_hook ) { return; }

	$screen -> add_help_tab( array( 'id' => 'aus-services-help-tab', 'title'	=> __( 'Help', 'simple-url-shortener' ), 'content' => aus_services_help() ) );
}

/**
* Services Help
*
* Return help text for services screen
*
* @since	2.0
*
* @return	string	Help Text
*/

function aus_services_help() {

	$help_text = '<p>' . __( 'This screen lists the available URL shortening services and which additional parameters, if at all, are required.', 'simple-url-shortener' ) . '</p>';
	$help_text .= '<p><strong>' . __( 'For more information:', 'simple-url-shortener' ) . '</strong></p>';
	$help_text .= '<p><a href="http://www.artiss.co.uk/url-shortener">' . __( 'Artiss URL Shortener Plugin Documentation', 'simple-url-shortener' ) . '</a></p>';
	$help_text .= '<p><a href="http://www.artiss.co.uk/forum">' . __( 'Artiss.co.uk Plugin Support Forum', 'simple-url-shortener' ) . '</a></p>';
	$help_text .= '<h4>' . __( 'This plugin, and all support, is supplied for free, but <a title="Donate" href="http://artiss.co.uk/donate" target="_blank">donations</a> are always welcome.', 'simple-url-shortener' ) . '</h4>';

	return $help_text;
}

/**
* Detect plugin activation
*
* Upon detection of activation set an option
*
* @since	2.0
*/

function aus_plugin_activate() {

	// Set option to indicate that plugin has been activated

	update_option( 'url_shortener_activated', true );

	// Clear existing cache

	global $wpdb;
	$wpdb -> query( "DELETE FROM $wpdb->options WHERE option_name LIKE '_transient%_aus_cache_%'" );

}

register_activation_hook( WP_PLUGIN_DIR . "/simple-url-shortener/simple-url-shortener.php", 'aus_plugin_activate' );

// If plugin activated, run activation commands and delete option

global $wp_version;

if ( get_option( 'url_shortener_activated' ) && ( ( float ) $wp_version >= 3.3 ) ) {

	add_action( 'admin_enqueue_scripts', 'aus_admin_enqueue_scripts' );

	delete_option( 'url_shortener_activated' );
}

/**
* Enqueue Feature Pointer files
*
* Add the required feature pointer files
*
* @since	2.0
*/

function aus_admin_enqueue_scripts() {

	wp_enqueue_style( 'wp-pointer' );
	wp_enqueue_script( 'wp-pointer' );

	add_action( 'admin_print_footer_scripts', 'aus_admin_print_footer_scripts' );
}

/**
* Show Feature Pointer
*
* Display feature pointer
*
* @since	2.0
*/

function aus_admin_print_footer_scripts() {

	$pointer_content = '<h3>' . __( 'Welcome to Artiss URL Shortener', 'simple-url-shortener' ) . '</h3>';
	$pointer_content .= '<p style="font-style:italic;">' . __( 'Thank you for installing this plugin.', 'simple-url-shortener' ) . '</p>';
	$pointer_content .= '<p>' . __( 'These new menu options will allow you to define default settings and provide links for help and support.', 'simple-url-shortener' ) . '</p>';
?>
<script>
jQuery(function () {
	var body = jQuery(document.body),
	menu = jQuery('#toplevel_page_aus-general-options'),
	collapse = jQuery('#collapse-menu'),
	feature = menu.find("a[href='admin.php?page=aus-general-options']"),
	options = {
		content: '<?php echo $pointer_content; ?>',
		position: {
			edge: 'left',
			align: 'center',
			of: menu.is('.wp-menu-open') && !menu.is('.folded *') ? feature : menu
		},
		close: function() {
		}};

	if ( !feature.length )
		return;

	body.pointer(options).pointer('open');
});
</script>
<?php
}
?>