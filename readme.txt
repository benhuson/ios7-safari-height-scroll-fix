=== iOS7 Safari Height Scroll Fix ===
Contributors: husobj
Tags: ios7, safari, height, bug, fullscreen, innerheight, scroll, scrolling
Requires at least: 3.5
Tested up to: 3.8
Stable tag: 1.0

For for slight scroll on iPad when body height to 100% in iOS7.

== Description ==

When setting body height to 100% in Safari iOS7 the page still scrolls around 20px.

<a href="http://stackoverflow.com/questions/19012135/ios-7-ipad-safari-landscape-innerheight-outerheight-layout-issue" target="_blank">This fix</a> prevents that.

Use the 'ios7_safari_height_scroll_fix_required' filter to disable the fix on certain pages. For example:

`
function my_ios7_safari_height_scroll_fix_required( $required ) {
	// Disable on home page
	if ( is_front_page() ) {
		return false;
	}
	// Return default (usually true)
	return $required;
}
add_filter( 'ios7_safari_height_scroll_fix_required', 'my_ios7_safari_height_scroll_fix_required' );
`

== Installation ==

To install and configure this plugin...

1. Upload or install the plugin through your WordPress admin.
2. Activate the plugin via the 'Plugins' admin menu.
3. The plugin information on the plugins page provides links to documentation to help you get started.

= Upgrading =

If you are upgrading manually via FTP rather that through the WordPress automatic upgrade link, please de-activate and re-activate the plugin to ensure the plugin upgrades correctly.

== Frequently Asked Questions ==

= Why are there no FAQs yet? =
Just because.

== Changelog ==

= 1.0 =
Initial Release.
