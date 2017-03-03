<?php
/**
 * This functions makes the theme compatible with qTranslate Plugin
 *
 *
 * @package Catch Themes
 * @subpackage Catch Responsive Pro
 * @since Catch Responsive 3.0 
 */

if ( ! function_exists( 'catchresponsive_menuitem' ) ) :
/**
 * Template for Converting Home link in Custom Menu
 *
 * To override this in a child theme
 * simply create your own catchresponsive_menuitem(), and that function will be used instead.
 *
 * @since Catch Responsive Pro 3.0
 */
function catchresponsive_menuitem( $menu_item ) {
	// convert local URLs in custom menu items	
	if ( $menu_item->type == 'custom' && stripos($menu_item->url, get_site_url()) !== false) {
		$menu_item->url = qtrans_convertURL($menu_item->url);
	}     
		return $menu_item;
} // catchresponsive_menuitem
endif;

add_filter( 'wp_setup_nav_menu_item' , 'catchresponsive_menuitem', 0 );


if ( ! function_exists( 'catchresponsive_qtranslate_invalidcache' ) ) :
/**
 * Template for Clearing qtranslate Invalid Cache
 *
 * To override this in a child theme
 * simply create your own catchresponsive_qtranslate_invalidcache(), and that function will be used instead.
 *
 * @since Catch Responsive Pro 3.0
 */
function catchresponsive_qtranslate_invalidcache() {
	delete_transient( 'catchresponsive_featured_content' );
	delete_transient( 'catchresponsive_featured_slider' );
	delete_transient( 'catchresponsive_footer_content' );	
	delete_transient( 'catchresponsive_featured_image' );
	delete_transient( 'all_the_cool_cats' );	
} // catchresponsive_qtranslate_invalidcache
endif;

add_action( 'after_setup_theme', 'catchresponsive_qtranslate_invalidcache' );