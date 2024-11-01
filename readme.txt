=== Simple Social Feed ===
Donate link: https://www.paypal.me/siddhu09rocks
Contributors: siddhu09rocks
Tags: instagram, instagram feed, no access token, instagram feed without access token, simple instagram feed, instagram without access token
Requires at least: 4.0
Tested up to: 5.7
Stable tag: 0.0.2
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Add Instagram feed to your site with only Username no access token needed.

== Description ==

To show Instagram gallery on your website, just place below shortcode with of-course your username on any page, post or widget.

<code>
[simple-social-feed username="phenomcraftstudios" limit="8" column="4" margin="1" ]
</code>

Userful Attrubutes if things go south.

<ul>
    <li><b>max_tries</b> - Number of tries ( Defualt = 4 ) to fetch Instagram data until throwing. Useful to avoid arbitrary CORS issues.</li>
    <li><b>cache_time</b> - Instagram response cache expiry time in minutes ( Defualt = 360 ). Increase this if you get banned too often.</li>
</ul>

<code>
[simple-social-feed username="phenomcraftstudios" limit="8" column="4" margin="1" max_tries="2" cache_time="720" ]
</code>

<small>* Plugin will not work if profile is age restricted.</small>

We are builidng Pro version of this plugin. <a href="https://forms.gle/XV5aUqbHsCFQvZUN9" target="_blank">Please send your suggestions or feature requests.</a>

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Insert shortcode [simple-social-feed username="phenomcraftstudios"] of-course with your username on any page, post or widget.


== Frequently Asked Questions ==

= Do I need access token? =

Nop.

= Can I buy you cup of coffee? =

Yes of-course. <a href="https://www.paypal.me/siddhu09rocks" target="_blank"> Order coffee now ☕</a>

== Screenshots ==

1. Front-end Display

== Changelog ==

= 0.0.3 =
* Fixed broken images issue

= 0.0.2 =
* Fixed HTML markup
* Added max_tries attribute 
* Added cache_time attribute 

= 0.0.1 =
* Initial release

== Upgrade Notice ==

= 0.0.3 =
Fixed broken images issue

= 0.0.2 =
Fixed HTML markup
Added max_tries attribute 
Added cache_time attribute 

= 0.0.1 =
Initial release
