=== Artiss URL Shortener ===
Contributors: dartiss
Donate link: http://artiss.co.uk/donate
Tags: artiss, bit.ly, budurl, cli.gs, is.gd, service, shorten, shortener, shortening, shrink, simple, small, su.pr, tiny, tinyurl, url
Requires at least: 2.0
Tested up to: 3.4.2
Stable tag: 2.0

Artiss URL Shortener will shorten a supplied URL using one of over 80 different shortening services

== Description ==

Artiss URL Shortener is one of the most powerful URL shortening plugins available with over 80 shortening services instantly available. Maintaining a database of over 600 such services only those with compatible (and working) APIs are included.

**If you are upgrading from a version previous to 2.0 then please read the Caching section in "Other Notes"**

Features include...

* Access to over 80 URL shortening services
* Specific functionality for developers
* Efficient caching of results
* Administration screen allowing you to set default shortening values
* Fully internationalized ready for translations. **If you would like to add a translation to his plugin then please [contact me](http://artiss.co.uk/contact "Contact")**

The code to access Artiss URL Shortener can be put anywhere within your WordPress theme wherever you need to convert a long URL to a short one. Here is an example...

`<?php echo url_shortener( 'http://www.artiss.co.uk', 'service=is.gd' ); ?>`

This will display the is.gd shortened URL for http://www.artiss.co.uk.

The above should get you started - for more information and advanced options please read the "Other Notes" tab.

**For help with this plugin, or simply to comment or get in touch, please read the appropriate section in "Other Notes" for details. This plugin, and all support, is supplied for free, but [donations](http://artiss.co.uk/donate "Donate") are always welcome.**

== Parameters ==

There are 2 parameters when using the `url_shortener` function..

The first parameter is the URL that you wish to have shortened. If left blank it will use the URL of the current post/page.

The second parameter is a list of options. These are separated by an ampersand and can be any of the following...

* *service=* - Which shortening service do you wish to use?
* *cache=reset* - This is the only option for this parameter and, if specified, will reset the cache.

Additionally, some services require information such as keys and password to be specified. In which case, use one of the following to supply this...

* *apikey=*
* *login=*
* *password=*
* *username=*
* *uid=*
* *token=*

For example...

`<?php echo url_shortener( 'http://www.artiss.co.uk', 'service=bit.ly+key&apikey=3003948393993&login=test' ); ?>`

I've **not** used a valid API key in the above example - you will need to get one for yourself.

For a list of which services are available and which additional information they require, a screen within administration will list them. Within Administration, click on "Services" under the "URL Shortener" menu option.

== Options Screen ==

Within the Administration screen there is a side menu named "URL Shortener". Clicking on this will present you wish an options screen. From here you can specify default settings. So, if you nearly always use the same shortening service you can specify it here - you then don't need to supply it when calling the `url_shortener` function.

== Developers ==

It is envisaged that this plugin is probably more of use to developers who want to include it as part of a plugin or theme. In particular, this plugin can be called from another. For example, a social bookmarking plugin could use this to provide a number of possible URL shortening services.

To this end another routine is provided, `validate_url_shortener`, which can be used to validate whether a shortening service is valid.

This routine has two parameters. The first parameter is a line of text that you wish to have checked to see if it includes a validate shortening service.

The second, optional, parameter is a mask. Use the text `{service}` to indicate where in the mask the name of the service should appear.

If the shortening service was valid, the name of it will be returned.

Let's try some examples...

`validate_url_shortener( 'is.gd' );`

This will return `is.gd` if `is.gd` is, indeed, one of the shortening services that this plugin accepts. Otherwise a null will be returned.

`validate_url_shortener( 'Is there a shortening service in this sentence is.gd' );`

Again, this will return `is.gd`, as it was found within the first parameter.

`validate_url_shortener( 'Start %is.gd% End', '%{service}%' );`

This time a mask has been specified showing that the service should appear within percent signs. As a valid service is found within the first parameter in this format, it will be valid and `is.gd` will once again be return.

In this example, a null will be specified as the mask condition was not met...

`validate_url_shortener( 'Start is.gd End', '%{service}%' );`

Use this routine in conjunction with the actual shortener to validate passed services before then using them. However, if Artiss URL Shortener is passed a service that is not valid, it will simply return the original URL.

== Caching ==

This plugin makes use of caching to improve performance. When a shortening services returns a short URL, theoretically that should never need to change. Therefore, this plugin will cache them indefinately. If, for whatever reason, you need it to be re-fetched you can do this by simply using the `cache=reset` parameter.

Caching is performed using WordPress Transients. Housekeeping of these is a known issue and I would highly recommend using another plugin of mine - [Artiss Transient Cleaner](http://wordpress.org/extend/plugins/artiss-transient-cleaner/ "Artiss Transient Cleaner"). In particular, if you are upgrading from a version prior to 2.0 then all the old cache will remain indefinately (apologies for this, I didn't use a naming convention that would allow me to identify it at a later time) - this plugin will clear this down.

== Licence ==

This WordPress plugin is licensed under the [GPLv2 (or later)](http://wordpress.org/about/gpl/ "GNU General Public License").

== Support ==

All of my plugins are supported via [my website](http://www.artiss.co.uk "Artiss.co.uk").

Please feel free to visit the site for plugin updates and development news - either visit the site regularly or [follow me on Twitter](http://www.twitter.com/artiss_tech "Artiss.co.uk on Twitter") (@artiss_tech).

For problems, suggestions or enhancements for this plugin, there is [a dedicated page](http://www.artiss.co.uk/url-shortener "Artiss URL Shortener") and [a forum](http://www.artiss.co.uk/forum "WordPress Plugins Forum"). The dedicated page will also list any known issues and planned enhancements.

**This plugin, and all support, is supplied for free, but [donations](http://artiss.co.uk/donate "Donate") are always welcome.**

== Reviews & Mentions ==

[Custom Short URLs in WordPress](http://ianhin.es/wrote-about/short-urls/ "Custom Short URLs in WordPress")

[Behind the Scenes - The Brooks Review](http://brooksreview.net/2011/01/behind-scenese/ "Behind the Scenes")

[How to make a Twitter button with your choice of service URL](http://neosting.net/wordpress/faire-un-bouton-pour-twitter-avec-le-choix-du-service.html "Faire un bouton pour twitter avec le choix du service d’URL")

== Installation ==

1. Upload the entire `simple-url-shortener` folder to your wp-content/plugins/ directory.
2. Alternatively, use the "Add Plugin" option and search for Artiss URL Shortener.
2. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= You haven't included my favourite URL shortening service =

Just let me know and I'll include it in a future release if it has a compatible API that this plugin can access.

= Where's the list of Shortening Services? =

I used to include them on this README but they change so often it's difficult to maintain. So, after version 2 an administration screen is included which lists all the services, as well as which additional parameters are required for them to work (e.g. API key, etc).

= I only ever get the original URL returned from the plugin =

The original, long URL is returned if the short URL could, for whatever reason, not be retrieved. Please ensure you have specified the service name correctly and supplied any additional information that the provider requires (e.g. API key).

= Which version of PHP does this plugin work with? =

It has been tested and been found valid from PHP 4 upwards.

Please note, however, that the minimum for WordPress is now PHP 5.2.4. Even though this plugin supports a lower version, I am not coding specifically to achieve this - therefore this minimum may change in the future.

== Changelog ==

= 2.0 =

* Maintenance: Reviewed all URL shortening services - many broken sites removed with some new ones added
* Bug: Assorted code bugs fixed as part of site review
* Enhancement: Added internationalisation
* Enhancement: Added feature pointer upon activation
* Enhancement: Added uninstaller to remove any database options
* Enhancement: Completely re-written caching, which is now also cleared when the plugin is activated or deleted
* Enhancement: Administration screen added for default options
* Enhancement: Enhanced existing function to use default options if none are specified
* Enhancement: Services screen will list available URL shorteners and which parameters they require

= 1.7.1 =
* Bug: Not formatting the key used for the cache so cache may fail
* Maintenance: Removed tr.im

= 1.7 =
* Maintenance: Renamed to Artiss URL Shortener
* Maintenance: Brought code up to date
* Maintenance: Removed debug option
* Maintenance: Fixed bit.ly
* Maintenance: Re-written the instructions!
* Enhancement: Now using built-in WP caching - **if you have WP Plugin Cache installed you can now remove it!**
* Enhancement: Added adf.ly, goo.by, ity.im, lnk.co, lnk.co+key, lnk.co+banner and yvy.me

= 1.6.2 =
* Bug: Fixed file fetching bug

= 1.6.1 =
* Maintenance: Removed bit.ly (you can still use bit.ly+key though)
* Enhancenment: Added v.gd

= 1.6 =
* Maintenance: url.co.uk now requires an API key
* Maintenance: Confirmed WP 3.0 compatibility
* Bug: Fixed critical bug in file fetching routine
* Enhancement: Rewrite of main code, especially debugging data
* Enhancement: Using WP Plugin Cache for caching, instead of old internal routines
* Enhancement: Added extra Linkbee service for members
* Enhancement: Added ez.com and minify.us to list of services

= 1.5 =
* Enhancement: Added debugging facility

= 1.4 =
* Enhancement: Replaced str_ireplace with str_replace to ensure PHP 4 compatibility

= 1.3 =
* Enhancement: Added new services - 2Zeus, 9mp, BudURL, HURL, kl.am, Lnk.by, to.vg, url.co.uk

= 1.2 =
* Enhancement: Added 87 new shortening services. pic.gd removed.
* Enhancement: Ability to specify API key and/or login and password details for certain services
* Enhancement: Can now read XML and JSON return formats, not just plain text
* Enhancement: Failed shortening of URLs are no longer cached

= 1.1 =
* Maintenance: New versions of shared functions added in
* Enhancement: Now uses caching system to save shortened URLs
* Enhancement: Sub-parameter system added to allow for switching off of cache

= 1.0 =
* Initial release

== Upgrade Notice ==

= 2.0 =
* Update to add new functionality, including much improved caching

= 1.7.1 =
* Upgrade to fix a minor issue with the caching

= 1.7 =
* Upgrade to improve caching, fix bit.ky and to add new services

= 1.6.2 =
* Upgrade to fix critical file fetching bug

= 1.6.1 =
* Upgrade if you use bit.ly or want to use v.gd

= 1.6 =
* Update to include new, more efficient, caching
* Update if you wish to use ez.com or minify.us or Linkbee member shortening
* Critical fix to file routine

= 1.5 =
* Update if you are having problems with URLs not being shortened - this will add debugging facilities

= 1.4 =
* Update if you are using PHP 4

= 1.3 =
* New services - 2Zeus, 9mp, BudURL, HURL, kl.am, Lnk.by, to.vg, url.co.uk. You only need to upgrade is you want to use any of these