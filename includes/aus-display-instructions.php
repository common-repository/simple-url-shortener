<?php
/**
* Instructions Page
*
* Display the instructions
*
* @package	Artiss-URL-Shortener
* @since	2.0
*/
?>
<div class="wrap">
<div class="icon32" id="icon-edit-pages"></div>

<h2><?php _e( 'Artiss URL Shortener Instructions', 'artiss-url-shortener' ); ?></h2>

<?php
$options = aus_set_general_defaults();
if ( $options[ 'donated'] != 1 ) { artiss_plugin_ads( 'artiss-url-shortener' ); }
?>

<?php
if ( !function_exists( 'wp_readme_parser' ) ) {
	echo '<p>You shouldn\'t be able to see this but I guess that odd things can happen!<p>';
	echo '<p>To display the instructions you must install the <a href="http://wordpress.org/extend/plugins/wp-readme-parser/">README Parser plugin</a>.</p>';
} else {
	echo wp_readme_parser( array( 'exclude' => 'meta,upgrade notice,screenshots,support,changelog,links,installation,licence', 'ignore' => 'For help with this plugin,,for more information and advanced options ' ), 'http://plugins.svn.wordpress.org/simple-url-shortener/tags/' . url_shortener_version . '/readme.txt' );
}
?>
</div>