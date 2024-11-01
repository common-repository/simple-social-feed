<?php

/*
Plugin Name: Simple Social Feed
Description: Add Instagram feed to your site without access token.
Version: 0.0.3
Author: siddhu09rocks
Author URI: https://www.phenomcraftstudios.com/
License: GPL2
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Instagram Feed
// Based on https://www.sowecms.com/demos/jquery.instagramFeed/index.html
	
if ( ! class_exists( 'SIMPLE_SOCIAL_FEED' ) ) {
	
	load_plugin_textdomain( 'simple-social-feed', false, dirname( plugin_basename( __FILE__ ) ) . '/' );

	class SIMPLE_SOCIAL_FEED {
		public function __construct() {

			add_action( 'init', array( &$this, 'simple_social_feed_css_js' ), 20 );
			add_action( 'template_redirect', array( &$this, 'simple_social_feed_functions' ), 20 );
			
			// indicates we are running the admin
			if ( is_admin() ) {
				//include( 'simple-social-feed-settings.php' );
			}

		}

		public function simple_social_feed_css_js() {			
			
			$asset_version = '0.0.3';
			$deps = array();
			wp_register_style('simple_social_feed_css', plugin_dir_url( __FILE__ ) . 'css/simple_social_feed.css', $deps, $asset_version );
			wp_register_script('simple_social_feed_js', plugin_dir_url( __FILE__ ) . 'js/instagramFeed.min.js', array('jquery'), $asset_version , true );

			wp_enqueue_style('simple_social_feed_css');
			wp_enqueue_script('simple_social_feed_js');

		}
		public function simple_social_feed_functions() {	
			
			// [simple-social-feed username=""]
			function simple_social_feed_shortcode_func( $atts ) {
				
				$attr = shortcode_atts( array(
					'username' => 'phenomcraftstudios',
					'limit' => '8',
					'column' => '4',
					'captions' => 'true',
					'margin' => '1',
					'max_tries' => '4',
					'cache_time' => '360',
				), $atts );


				if(  $attr['username'] != '' ){

					$random_string = substr(md5(mt_rand()), 0, 7);
					$username = $attr['username'];
					$limit = $attr['limit'];
					$column = $attr['column'];
					$captions = $attr['captions'];
					$margin = $attr['margin'];
					$max_tries = $attr['max_tries'];
					$cache_time = $attr['cache_time'];
	
					$simple_social_feed_html = '<div id="simple-social-feed-'.$random_string.'" class="simple-social-feed-container instagram_feed"></div>';
					$simple_social_feed_html .= "<script>
												(function($){
													$(window).on('load', function(){
														new InstagramFeed({
															'username': '".$username."',
															'container': document.getElementById('simple-social-feed-".$random_string."'),
															'display_profile': false,
															'display_biography': false,
															'display_gallery': true,
															'display_captions': ".$captions.",
															'callback': null,
															'styling': true,
															'items': ".$limit.",
															'items_per_row': ".$column.",
															'host': 'https://images' + ~~(Math.random() * 3333) + '-focus-opensocial.googleusercontent.com/gadgets/proxy?container=none&url=https://www.instagram.com/',
															'max_tries': ".$max_tries.",
															'cache_time': ".$cache_time.",
															'margin': ".$margin."
														});
													});
												})(jQuery)
											</script>";
					return $simple_social_feed_html;
				}
				else
				{
					if (  current_user_can('manage_options')  ){
						return '<strong>Admin Note: </strong> Please configure Shortcode properly with username';
					}
				}
			}
			add_shortcode( 'simple-social-feed', 'simple_social_feed_shortcode_func' );

		}
	}

	// finally instantiate our plugin class and add it to the set of globals
	$GLOBALS['simple-social-feed'] = new SIMPLE_SOCIAL_FEED();
}