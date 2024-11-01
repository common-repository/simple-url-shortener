<?php
/**
* Services Page
*
* Screen for listing available services
*
* @package	Artiss-URL-Shortener
* @since	2.0
*/

?>
<div class="wrap">
<div class="icon32"><img src="<?php echo plugins_url(); ?>/simple-url-shortener/images/screen_icon.png" alt="" title="" height="32px" width="32px"/><br /></div>
<h2><?php _e( 'Artiss URL Shortener Services', 'simple-url-shortener' ); ?></h2>

<?php

$options = aus_set_general_defaults();
$services = aus_build_services_array();

// Display ads

if ( $options[ 'donated'] != 1 ) { artiss_plugin_ads( 'simple-url-shortener' ); }

?>

<table class="form-table">
<tr><td><strong>Service Name</strong></td><td></td><td><strong>Required Parameters</strong></td></tr>
<tr><td colspan=3></td></tr>
<?php

foreach ( $services as $key => $value ) {
	echo '<tr>';
	echo '<td>' . $key . '</td><td width="20px"></td>';

	$paras = '';
	if ( strpos( $value, '{key}' ) !== false ) { $paras .= ', API key (apikey)'; }
	if ( strpos( $value, '{login}' ) !== false ) { $paras .= ', Login'; }
	if ( strpos( $value, '{password}' ) !== false ) { $paras .= ', Password'; }
	if ( strpos( $value, '{username}' ) !== false ) { $paras .= ', Username'; }
	if ( strpos( $value, '{uid}' ) !== false ) { $paras .= ', User ID (UID)'; }
	if ( strpos( $value, '{token}' ) !== false ) { $paras .= ', Token'; }

	if ( $paras != '' ) { $paras = substr( $paras, 2 ); }

	echo '<td width="100%">' . $paras . '</td>';

	echo "</tr>\n";
}

?>
</table>
</div>