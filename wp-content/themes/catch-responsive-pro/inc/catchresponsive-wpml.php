<?php
/**
 * This functions makes the theme compatible with WPML Plugin
 *
 *
 * @package Catch Themes
 * @subpackage Catch Responsive Pro
 * @since Catch Responsive 3.0 
 */
 

if ( ! function_exists( 'catchresponsive_wpml_invalidcache' ) ) :
/**
 * Template for Clearing WPML Invalid Cache
 *
 * To override this in a child theme
 * simply create your own catchresponsive_wpml_invalidcache(), and that function will be used instead.
 *
 * @since Catch Responsive Pro 2.5
 */
function catchresponsive_wpml_invalidcache() {
	delete_transient( 'catchresponsive_featured_content' );
	delete_transient( 'catchresponsive_featured_slider' );
	delete_transient( 'catchresponsive_footer_content' );	
	delete_transient( 'catchresponsive_featured_image' );
	delete_transient( 'all_the_cool_cats' );
} // catchresponsive_wpml_invalidcache
endif;

add_action( 'after_setup_theme', 'catchresponsive_wpml_invalidcache' );