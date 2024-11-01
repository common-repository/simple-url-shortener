<?php
/**
* About Page
*
* About the plugin
*
* @package	Artiss-URL-Shortener
* @since	2.0
*/
?>
<div class="wrap">
<div class="icon32"><img src="<?php echo plugins_url(); ?>/simple-url-shortener/images/screen_icon.png" alt="" title="" height="32px" width="32px"/><br /></div>

<h2><?php _e( 'About Artiss URL Shortener', 'simple-url-shortener' ); ?></h2>

<?php

// Display ads

$options = aus_set_general_defaults();
if ( $options[ 'donated'] != 1 ) { artiss_plugin_ads( 'simple-url-shortener' ); }
?>

<p><?php echo sprintf( __( 'You are using Artiss URL Shortener version %s. It was written by David Artiss.', 'simple-url-shortener' ), url_shortener_version ); ?></p>

<?php

echo '<h3>' . __( 'Acknowledgements', 'simple-url-shortener' ) . '</h3>';

echo '<p>' . __( 'Images have been compressed with <a href="http://www.smushit.com/ysmush.it/">Smush.it</a>.', 'simple-url-shortener' ) . '</p>';

echo '<h3>' . __( 'Support Information', 'simple-url-shortener' ) . '</h3>';

echo '<p>' . __( 'Useful support information and links can be found by clicking on the Help tab at the top of each of the Artiss URL Shortener administration screens.', 'simple-url-shortener' ) . '</p>';

echo '<h4>' . __( 'This plugin, and all support, is supplied for free, but <a title="Donate" href="http://artiss.co.uk/donate" target="_blank">donations</a> are always welcome.', 'simple-url-shortener' ) . '</h4>';

echo '<h3>' . __( 'Stay in Touch', 'simple-url-shortener' ) . '</h3>';

echo '<p>' . __( '<a href="http://www.artiss.co.uk/wp-plugins">See the full list</a> of Artiss plugins, including beta releases.', 'simple-url-shortener' ) . '</p>';

echo '<p>' . __( '<a href="http://www.twitter.com/artiss_tech">Follow Artiss.co.uk</a> on Twitter.', 'simple-url-shortener' ) . '</p>';

echo '<p>' . __( '<a href="http://www.artiss.co.uk/feed">Subscribe</a> to the Artiss.co.uk news feed.', 'simple-url-shortener' ) . '</p>';

?>
</div>