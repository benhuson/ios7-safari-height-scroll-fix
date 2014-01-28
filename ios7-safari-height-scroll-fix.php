<?php

/*
Plugin Name: iOS7 Safari Height Scroll Fix
Plugin URI: https://github.com/benhuson/ios7-safari-height-scroll-fix
Description: When setting body height to 100% in Safari iOS7 the page still scrolls around 20px. <a href="http://stackoverflow.com/questions/19012135/ios-7-ipad-safari-landscape-innerheight-outerheight-layout-issue" target="IOS7_Safari_Height_Scroll_Fix">This fix</a> prevents that. Use the 'ios7_safari_height_scroll_fix_required' filter to disable the fix on certain pages.
Version: 1.0
Author: Ben Huson
*/

class IOS7_Safari_Height_Scroll_Fix {

	/**
	 * Setup Actions
	 */
	function setup_actions() {
		if ( ! is_admin() ) {
			add_action( 'wp_enqueue_scripts', array( 'IOS7_Safari_Height_Scroll_Fix', 'enqueue_jquery' ) );
			add_action( 'wp_head', array( 'IOS7_Safari_Height_Scroll_Fix', 'wp_head' ) );
		}
	}

	/**
	 * Check if fix is required
	 */
	function is_required() {
		return apply_filters( 'ios7_safari_height_scroll_fix_required', true );
	}

	/**
	 * Enqueue jQuery
	 */
	function enqueue_jquery() {
		if ( IOS7_Safari_Height_Scroll_Fix::is_required() ) {
			wp_enqueue_script( 'jquery' );
		}
	}

	/**
	 * Output script and styles for fix
	 */
	function wp_head() {
		if ( IOS7_Safari_Height_Scroll_Fix::is_required() ) {
			?>
<!--
Fix for iPad iOS7 slight scroll on 100% body height
http://stackoverflow.com/questions/19012135/ios-7-ipad-safari-landscape-innerheight-outerheight-layout-issue
-->
<script>if (navigator.userAgent.match(/iPad;.*CPU.*OS 7_\d/i)) { jQuery('html').addClass('ipad ios7'); }</script>
<style>@media (orientation:landscape) { html.ipad.ios7 > body { position: fixed; bottom: 0; width: 100%; height: 672px !important; } }</style>
			<?php
		}
	}

}

add_action( 'init', array( 'IOS7_Safari_Height_Scroll_Fix', 'setup_actions' ) );
