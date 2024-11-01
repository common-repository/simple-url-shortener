<?php
/**
* General Options Page
*
* Screen for generic options
*
* @package	Artiss-URL-Shortener
* @since	2.0
*/

?>
<div class="wrap">
<div class="icon32"><img src="<?php echo plugins_url(); ?>/simple-url-shortener/images/screen_icon.png" alt="" title="" height="32px" width="32px"/><br /></div>
<h2><?php _e( 'Artiss URL Shortener Options', 'simple-url-shortener' ); ?></h2>

<?php

// If options have been updated on screen, update the database

if ( ( !empty( $_POST ) ) && ( check_admin_referer( 'aus-options-general', 'aus_options_general_nonce' ) ) ) {

	$options[ 'donated' ] = $_POST[ 'donated' ];
	$options[ 'service' ] = $_POST[ 'service' ];
	$options[ 'apikey' ] = $_POST[ 'apikey' ];
	$options[ 'login' ] = $_POST[ 'login' ];
	$options[ 'password' ] = $_POST[ 'password' ];
	$options[ 'username' ] = $_POST[ 'username' ];
	$options[ 'uid' ] = $_POST[ 'uid' ];
	$options[ 'token' ] = $_POST[ 'token' ];

	// Update the options

	update_option( 'artiss_url_shortener', $options );
	$update_message = __( 'Settings Saved.', 'simple-url-shortener' );

	echo '<div class="updated fade"><p><strong>' . $update_message . "</strong></p></div>\n";
}

// Get options

$options = aus_set_general_defaults();
$services = aus_build_services_array();

// Display ads

if ( $options[ 'donated'] != 1 ) { artiss_plugin_ads( 'simple-url-shortener' ); }
?>

<p><?php _e( 'These are the general settings for Artiss URL Shortener.', 'youtube-embed' ); ?></p>

<form method="post" action="<?php echo get_bloginfo( 'wpurl' ).'/wp-admin/admin.php?page=aus-general-options' ?>">

<table class="form-table">

<tr>
<th scope="row"><?php _e( 'Remove Adverts', 'simple-url-shortener' ); ?></th>
<td><input type="checkbox" name="donated" value="1"<?php if ( $options[ 'donated' ] == 1 ) { echo ' checked="checked"'; } ?>/>&nbsp;<span class="description"><?php
if ( $options[ 'donated' ] != 1 ) {
	_e( "If you've <a href=\"http://www.artiss.co.uk/donate\">donated</a>, tick here to remove the adverts from these administration screens", 'simple-url-shortener' );
} else {
	echo '<strong>' . __( "Thank you for donating", 'simple-url-shortener' ) . '</strong>';
}
?></span></td>
</tr>

</table>

<h3>Default Options</h3>

<table class="form-table">

<tr>
<th scope="row"><?php _e( 'Shortening Service', 'simple-url-shortener' ); ?></th>
<td><select name="service">
<?php

// Generate a list of available services

echo '<option value=""';
if ( $options[ 'service' ] == '' ) { echo ' selected="selected"'; }
echo '>None</option>';

foreach ( $services as $key => $value ) {
	echo '<option value="' . $key . '"';
	if ( $key == $options[ 'service' ] ) { echo ' selected="selected"'; }
	echo '>' . $key . '</option>';
}
?>
</select></td>
</tr>

<tr>
<th scope="row"><?php _e( 'API Key', 'simple-url-shortener' ); ?></th>
<td><input name="apikey" type="text" size="40" width="100%" value="<?php echo $options[ 'apikey' ]; ?>"/></td>
</tr>

<tr>
<th scope="row"><?php _e( 'Login', 'simple-url-shortener' ); ?></th>
<td><input name="login" type="text" size="20" width="100%" value="<?php echo $options[ 'login' ]; ?>"/></td>
</tr>

<tr>
<th scope="row"><?php _e( 'Password', 'simple-url-shortener' ); ?></th>
<td><input name="password" type="text" size="20" width="100%" value="<?php echo $options[ 'password' ]; ?>"/></td>
</tr>

<tr>
<th scope="row"><?php _e( 'Username', 'simple-url-shortener' ); ?></th>
<td><input name="username" type="text" size="20" width="100%" value="<?php echo $options[ 'username' ]; ?>"/></td>
</tr>

<tr>
<th scope="row"><?php _e( 'UID', 'simple-url-shortener' ); ?></th>
<td><input name="uid" type="text" size="20" width="100%" value="<?php echo $options[ 'uid' ]; ?>"/></td>
</tr>

<tr>
<th scope="row"><?php _e( 'Token', 'simple-url-shortener' ); ?></th>
<td><input name="token" type="text" size="20" width="100%" value="<?php echo $options[ 'token' ]; ?>"/></td>
</tr>

</table>

<?php wp_nonce_field( 'aus-options-general', 'aus_options_general_nonce', true, true ); ?>

<p class="submit"><input type="submit" name="Submit" class="button-primary" value="<?php _e( 'Save Settings', 'simple-url-shortener' ); ?>"/></p>

</form>

</div>