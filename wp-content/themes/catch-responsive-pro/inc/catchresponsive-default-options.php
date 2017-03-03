<?php
/**
 * Implement Default Theme/Customizer Options
 *
 * @package Catch Themes
 * @subpackage Catch Responsive Pro
 * @since Catch Responsive 1.0
 */

if ( ! defined( 'CATCHRESPONSIVE_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


/**
 * Returns the default options for catchresponsive.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_get_default_theme_options() {

	$theme_data = wp_get_theme();

	$default_theme_options = array(
		//Site Title an Tagline
		'logo'                                            => get_template_directory_uri() . '/images/headers/logo.png',
		'logo_alt_text'                                   => '',
		'logo_disable'                                    => 1,
		'move_title_tagline'                              => 0,

		//Layout
		'theme_layout'                                    => 'right-sidebar',
		'woocommerce_layout'                              => 'right-sidebar',
		'content_layout'                                  => 'excerpt-image-left',
		'single_post_image_layout'                        => 'disabled',

		//Header Image
		'enable_featured_header_image'                    => 'disabled',
		'featured_header_image_position'                  => 'before-menu',
		'featured_image_size'                             => 'full',
		'featured_header_image_url'                       => '',
		'featured_header_image_alt'                       => '',
		'featured_header_image_base'                      => 0,

		//Navigation
		'primary_menu_disable'                            => 0,
		'primary_search_disable'                          => 0,

		//Breadcrumb Options
		'breadcumb_option'                                => 0,
		'breadcumb_onhomepage'                            => 0,
		'breadcumb_seperator'                             => '&raquo;',

		//Comment Options
		'comment_option'                                  => 'use-wordpress-setting',
		'disable_notes'                                   => 0,
		'disable_website_field'                           => 0,

		//Custom CSS
		'custom_css'                                      => '',

		//Scrollup Options
		'disable_scrollup'                                => 0,

		//Header Right Sidebar Options
		'disable_header_right_sidebar'                    => 0,

		//Excerpt Options
		'excerpt_length'                                  => '55',
		'excerpt_more_text'                               => __( 'Read More ...', 'catch-responsive-pro' ),

		//Homepage / Frontpage Settings
		'front_page_category'                             => array(),

		//Pagination Options
		'pagination_type'                                 => 'default',

		//Promotion Headline Options
		'promotion_headline_option'                       => 'homepage',
		'promotion_headline_left_width'                   => '80',
		'promotion_headline'                              => __( 'Catch Responsive Pro is a Responsive WordPress Theme', 'catch-responsive-pro' ),
		'promotion_subheadline'                           => __( 'This is promotion headline. You can edit this from Appearance -> Customize -> Theme Options -> Promotion Headline Options', 'catch-responsive-pro' ),
		'promotion_headline_button'                       => __( 'Buy Now', 'catch-responsive-pro' ),
		'promotion_headline_url'                          => esc_url( 'https://catchthemes.com/' ),
		'promotion_headline_target'                       => 1,

		//Responsive Options
		'footer_mobile_menu_disable'                      => 1,

		//Search Options
		'search_text'                                     => __( 'Search...', 'catch-responsive-pro' ),

		//Feed Redirect
		'feed_redirect'                                   => '',

		//Single Post Navigation
		'disable_single_post_navigation'                  => 0,

		//Font Family Options
		'body_font'                                       => 'sans-serif',
		'title_font'                                      => 'sans-serif',
		'tagline_font'                                    => 'sans-serif',
		'content_title_font'                              => 'sans-serif',
		'content_font'                                    => 'sans-serif',
		'headings_font'                                   => 'sans-serif',
		'reset_typography'                                => 0,

		//Footer Editor Options
		'footer_content'                                  => sprintf( _x( 'Copyright &copy; %1$s %2$s. All Rights Reserved', '1: Year, 2: Site Title with home URL', 'catch-responsive-pro' ), '[the-year]', '[site-link]' ) . ' &#124; ' . $theme_data->get( 'Name') . '&nbsp;' . __( 'by', 'catch-responsive-pro' ). '&nbsp;<a target="_blank" href="'. $theme_data->get( 'AuthorURI' ) .'">'. $theme_data->get( 'Author' ) .'</a>',
		'reset_footer_content'                            => 0,

		//Update Notifier
		'update_notifier'                                 => 0,

		//Basic Color Options
		'color_scheme'                                    => 'light',
		'background_color'                                => '#f9f9f9',
		'text_color'                                      => '#404040',
		'link_color'                                      => '#1b8be0',
		'link_hover_color'                                => '#404040',
		'mobile_menu_color_scheme'                        => 'light',

		//Header Color Options
		'header_textcolor'                                => '#111111',
		'header_background_color'                         => 'transparent',
		'site_title_hover_color'                          => '#1b8be0',
		'tagline_color'                                   => '#404040',

		//Content Color Options
		'content_wrapper_background_color'                => '#ffffff',
		'content_background_color'                        => '#ffffff',
		'content_title_color'                             => '#404040',
		'content_title_hover_color'                       => '#1b8be0',
		'content_meta_color'                              => '#1b8be0',
		'content_meta_hover_color'                        => '#404040',

		//Sidebar Color Options
		'sidebar_background_color'                        => '#ffffff',
		'sidebar_widget_title_color'                      => '#404040',
		'sidebar_widget_text_color'                       => '#404040',
		'sidebar_widget_link_color'                       => '#1b8be0',

		//Pagination Color Options //Need to check in details after
		'pagination_background_color'                     => '#ffffff',
		'pagination_hover_background_color'               => '#000000',
		'pagination_text_color'                           => '#404040',
		'pagination_link_color'                           => '#1b8be0',
		'pagination_hover_active_color'                   => '#ffffff',
		'numeric_infinite_scroll_background_color'        => '#eeeeee',
		'numeric_infinite_scroll_hover_background_color'  => '#000000',

		//Footer Color Options
		'footer_background_color'                         => 'transparent',
		'footer_text_color'                               => '#666666',
		'footer_link_color'                               => '#555555',
		'footer_sidebar_area_background_color'            => 'transparent',
		'footer_widget_background_color'                  => 'transparent',
		'footer_widget_title_color'                       => '#404040',
		'footer_widget_text_color'                        => '#404040',
		'footer_widget_link_color'                        => '#1b8be0',

		//Promotion Headline Color Options
		'promotion_headline_background_color'             => '#ffffff',
		'promotion_headline_title_color'                  => '#404040',
		'promotion_headline_text_color'                   => '#404040',
		'promotion_headline_link_color'                   => '#1b8be0',
		'promotion_headline_button_background_color'      => '#f2f2f2',
		'promotion_headline_button_text_color'            => '#666666',
		'promotion_headline_button_hover_background_color'=> '#f2f2f2',
		'promotion_headline_button_hover_text_color'      => '#666666',

		//Scrollup Color Options
		'scrollup_background_color'                       => '#666666',
		'scrollup_hover_background_color'                 => '#000000',
		'scrollup_text_color'                             => '#eeeeee',
		'scrollup_hover_text_color'                       => '#ffffff',

		//Slider Color Options
		'slider_content_background_color'                 => '#444444',
		'slider_text_color'                               => '#eeeeee',
		'slider_link_color'                               => '#1b8be0',

		//Featured Content Color Options
		'featured_content_background_color'               => '#ffffff',
		'featured_content_title_color'                    => '#404040',
		'featured_content_text_color'                     => '#404040',
		'featured_content_link_color'                     => '#1b8be0',

		//Primary Menu Color Options
		'menu_background_color'                           => '#222222',
		'menu_color'                                      => '#ffffff',
		'hover_active_background_color'                   => '#ffffff',
		'hover_active_text_color'                         => '#000000',
		'sub_menu_background_color'                       => '#ffffff',
		'sub_menu_text_color'                             => '#000000',

		//Secondary Menu Color Options
		'secondary_menu_background_color'                 => '#f2f2f2',
		'secondary_menu_color'                            => '#666666',
		'secondary_hover_active_background_color'         => '#ffffff',
		'secondary_hover_active_text_color'               => '#000000',
		'secondary_sub_menu_background_color'             => '#ffffff',
		'secondary_sub_menu_text_color'                   => '#666666',

		//Header Right Color Options
		'header_right_menu_background_color'              => 'transparent',
		'header_right_menu_color'                         => '#dddddd',
		'header_right_hover_active_background_color'      => '#222222',
		'header_right_hover_active_text_color'            => '#ffffff',
		'header_right_sub_menu_background_color'          => '#222222',
		'header_right_sub_menu_text_color'                => '#ffffff',

		//Footer Menu Color Options
		'footer_menu_background_color'                    => '#222222',
		'footer_menu_color'                               => '#ffffff',
		'footer_hover_active_background_color'            => '#ffffff',
		'footer_hover_active_text_color'                  => '#000000',
		'footer_sub_menu_background_color'                => '#ffffff',
		'footer_sub_menu_text_color'                      => '#000000',

		//Featured Content Options
		'featured_content_option'                         => 'homepage',
		'featured_content_layout'                         => 'layout-three',
		'featured_content_position'                       => 0,
		'featured_content_headline'                       => '',
		'featured_content_subheadline'                    => '',
		'featured_content_type'                           => 'demo-featured-content',
		'featured_content_number'                         => '3',
		'featured_content_select_category'                => array(),
		'featured_content_show'                           => 'excerpt',

		//Featured Slider Options
		'featured_slider_option'                          => 'homepage',
		'featured_slider_image_loader'                    => 'true',
		'featured_slide_transition_effect'                => 'fadeout',
		'featured_slide_transition_delay'                 => '4',
		'featured_slide_transition_length'                => '1',
		'featured_slide_loop'                             => '0',
		'featured_slider_type'                            => 'demo-featured-slider',
		'featured_slide_number'                           => '4',
		'featured_slider_select_category'                 => array(),
		'exclude_slider_post'                             => 0,

		//Social Links
		'social_icon_size'                                => '20',
		'custom_social_icons'                             => '1',

		//Reset all settings
		'reset_all_settings'                              => 0,
	);

	return apply_filters( 'catchresponsive_default_theme_options', $default_theme_options );
}



/**
 * Returns an array of color schemes registered for catchresponsive.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_color_schemes() {
	$color_scheme_options= array(
		'light'    => array(
			'value'=> 'light',
			'label'=> __( 'Light', 'catch-responsive-pro' ),
		),
		'dark'     => array(
			'value'=> 'dark',
			'label'=> __( 'Dark', 'catch-responsive-pro' ),
		),
	);

	return apply_filters( 'catchresponsive_color_schemes', $color_scheme_options );
}


/**
 * Returns an array of layout options registered for catchresponsive.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_layouts() {
	$layout_options = array(
		'left-sidebar' 	=> array(
			'value' => 'left-sidebar',
			'label' => __( 'Primary Sidebar, Content', 'catch-responsive-pro' ),
		),
		'right-sidebar' => array(
			'value' => 'right-sidebar',
			'label' => __( 'Content, Primary Sidebar', 'catch-responsive-pro' ),
		),
		'no-sidebar'	=> array(
			'value' => 'no-sidebar',
			'label' => __( 'No Sidebar ( Content Width )', 'catch-responsive-pro' ),
		),
		'no-sidebar-one-column' => array(
			'value' => 'no-sidebar-one-column',
			'label' => __( 'No Sidebar ( One Column )', 'catch-responsive-pro' ),
		),
		'no-sidebar-full-width' => array(
			'value' => 'no-sidebar-full-width',
			'label' => __( 'No Sidebar ( Full Width )', 'catch-responsive-pro' ),
		),
	);
	return apply_filters( 'catchresponsive_layouts', $layout_options );
}


/**
 * Returns an array of content layout options registered for catchresponsive.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_get_archive_content_layout() {
	$layout_options = array(
		'excerpt-image-left' => array(
			'value' => 'excerpt-image-left',
			'label' => __( 'Excerpt Image Left', 'catch-responsive-pro' ),
		),
		'excerpt-image-right' => array(
			'value' => 'excerpt-image-right',
			'label' => __( 'Excerpt Image Right', 'catch-responsive-pro' ),
		),
		'excerpt-image-top' => array(
			'value' => 'excerpt-image-top',
			'label' => __( 'Excerpt Image Top', 'catch-responsive-pro' ),
		),
		'full-content' => array(
			'value' => 'full-content',
			'label' => __( 'Show Full Content (No Featured Image)', 'catch-responsive-pro' ),
		),
	);

	return apply_filters( 'catchresponsive_get_archive_content_layout', $layout_options );
}


/**
 * Returns an array of feature header enable options
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_enable_featured_header_image_options() {
	$enable_featured_header_image_options = array(
		'homepage' 		=> array(
			'value'	=> 'homepage',
			'label' => __( 'Homepage / Frontpage', 'catch-responsive-pro' ),
		),
		'exclude-home' 		=> array(
			'value'	=> 'exclude-home',
			'label' => __( 'Excluding Homepage', 'catch-responsive-pro' ),
		),
		'exclude-home-page-post' 	=> array(
			'value' => 'exclude-home-page-post',
			'label' => __( 'Excluding Homepage, Page/Post Featured Image', 'catch-responsive-pro' ),
		),
		'entire-site' 	=> array(
			'value' => 'entire-site',
			'label' => __( 'Entire Site', 'catch-responsive-pro' ),
		),
		'entire-site-page-post' 	=> array(
			'value' => 'entire-site-page-post',
			'label' => __( 'Entire Site, Page/Post Featured Image', 'catch-responsive-pro' ),
		),
		'pages-posts' 	=> array(
			'value' => 'pages-posts',
			'label' => __( 'Pages and Posts', 'catch-responsive-pro' ),
		),
		'disabled'		=> array(
			'value' => 'disabled',
			'label' => __( 'Disabled', 'catch-responsive-pro' ),
		),
	);

	return apply_filters( 'catchresponsive_enable_featured_header_image_options', $enable_featured_header_image_options );
}


/**
 * Returns an array of feature header image positions
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_featured_header_image_position_options() {
	$featured_header_image_position_options = array(
		'before_menu' 		=> array(
			'value'	=> 'before-menu',
			'label' => __( 'Before Menu', 'catch-responsive-pro' ),
		),
		'after_menu' 	=> array(
			'value' => 'after-menu',
			'label' => __( 'After Menu', 'catch-responsive-pro' ),
		),
		'before_header'		=> array(
			'value' => 'before-header',
			'label' => __( 'Before Header', 'catch-responsive-pro' ),
		),
		'after_slider'		=> array(
			'value' => 'after-slider',
			'label' => __( 'After Slider', 'catch-responsive-pro' ),
		),
	);

	return apply_filters( 'catchresponsive_featured_header_image_position_options', $featured_header_image_position_options );
}


/**
 * Returns an array of feature image size
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_featured_image_size_options() {
	$featured_image_size_options = array(
		'full' 		=> array(
			'value'	=> 'full',
			'label' => __( 'Full Image', 'catch-responsive-pro' ),
		),
		'large' 	=> array(
			'value' => 'large',
			'label' => __( 'Large Image', 'catch-responsive-pro' ),
		),
		'slider'		=> array(
			'value' => 'slider',
			'label' => __( 'Slider Image', 'catch-responsive-pro' ),
		),
	);

	return apply_filters( 'catchresponsive_featured_image_size_options', $featured_image_size_options );
}


/**
 * Returns an array of content and slider layout options registered for catchresponsive.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_featured_slider_content_options() {
	$featured_slider_content_options = array(
		'homepage' 		=> array(
			'value'	=> 'homepage',
			'label' => __( 'Homepage / Frontpage', 'catch-responsive-pro' ),
		),
		'entire-site' 	=> array(
			'value' => 'entire-site',
			'label' => __( 'Entire Site', 'catch-responsive-pro' ),
		),
		'disabled'		=> array(
			'value' => 'disabled',
			'label' => __( 'Disabled', 'catch-responsive-pro' ),
		),
	);

	return apply_filters( 'catchresponsive_featured_slider_content_options', $featured_slider_content_options );
}


/**
 * Returns an array of feature content types registered for catchresponsive.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_featured_content_types() {
	$featured_content_types = array(
		'demo-featured-content' => array(
			'value' => 'demo-featured-content',
			'label' => __( 'Demo Featured Content', 'catch-responsive-pro' ),
		),
		'featured-widget-content' => array(
			'value' => 'featured-widget-content',
			'label' => __( 'Featured Widget Content', 'catch-responsive-pro' ),
		),
		'featured-post-content' => array(
			'value' => 'featured-post-content',
			'label' => __( 'Featured Post Content', 'catch-responsive-pro' ),
		),
		'featured-page-content' => array(
			'value' => 'featured-page-content',
			'label' => __( 'Featured Page Content', 'catch-responsive-pro' ),
		),
		'featured-category-content' => array(
			'value' => 'featured-category-content',
			'label' => __( 'Featured Category Content', 'catch-responsive-pro' ),
		),
		'featured-image-content' => array(
			'value' => 'featured-image-content',
			'label' => __( 'Featured Image Content', 'catch-responsive-pro' ),
		),
	);

	return apply_filters( 'catchresponsive_featured_content_types', $featured_content_types );
}


/**
 * Returns an array of featured content options registered for catchresponsive.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_featured_content_layout_options() {
	$featured_content_layout_option = array(
		'layout-two' 		=> array(
			'value'	=> 'layout-two',
			'label' => __( '2 columns', 'catch-responsive-pro' ),
		),
		'layout-three' 		=> array(
			'value'	=> 'layout-three',
			'label' => __( '3 columns', 'catch-responsive-pro' ),
		),
		'layout-four' 	=> array(
			'value' => 'layout-four',
			'label' => __( '4 columns', 'catch-responsive-pro' ),
		),
	);

	return apply_filters( 'catchresponsive_featured_content_layout_options', $featured_content_layout_option );
}


/**
 * Returns an array of featured content show registered for catchresponsive.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_featured_content_show() {
	$featured_content_show_option = array(
		'excerpt' 		=> array(
			'value'	=> 'excerpt',
			'label' => __( 'Show Excerpt', 'catch-responsive-pro' ),
		),
		'full-content' 	=> array(
			'value' => 'full-content',
			'label' => __( 'Show Full Content', 'catch-responsive-pro' ),
		),
		'hide-content' 	=> array(
			'value' => 'hide-content',
			'label' => __( 'Hide Content', 'catch-responsive-pro' ),
		),
	);

	return apply_filters( 'catchresponsive_featured_content_show', $featured_content_show_option );
}


/**
 * Returns an array of feature slider types registered for catchresponsive.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_featured_slider_types() {
	$featured_slider_types = array(
		'demo-featured-slider' => array(
			'value' => 'demo-featured-slider',
			'label' => __( 'Demo Featured Slider', 'catch-responsive-pro' ),
		),
		'featured-post-slider' => array(
			'value' => 'featured-post-slider',
			'label' => __( 'Featured Post Slider', 'catch-responsive-pro' ),
		),
		'featured-page-slider' => array(
			'value' => 'featured-page-slider',
			'label' => __( 'Featured Page Slider', 'catch-responsive-pro' ),
		),
		'featured-category-slider' => array(
			'value' => 'featured-category-slider',
			'label' => __( 'Featured Category Slider', 'catch-responsive-pro' ),
		),
		'featured-image-slider' => array(
			'value' => 'featured-image-slider',
			'label' => __( 'Featured Image Slider', 'catch-responsive-pro' ),
		),
	);

	return apply_filters( 'catchresponsive_featured_slider_types', $featured_slider_types );
}


/**
 * Returns an array of feature slider transition effects
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_featured_slide_transition_effects() {
	$featured_slide_transition_effects = array(
		'fade' 		=> array(
			'value'	=> 'fade',
			'label' => __( 'Fade', 'catch-responsive-pro' ),
		),
		'fadeout' 	=> array(
			'value'	=> 'fadeout',
			'label' => __( 'Fade Out', 'catch-responsive-pro' ),
		),
		'none' 		=> array(
			'value' => 'none',
			'label' => __( 'None', 'catch-responsive-pro' ),
		),
		'scrollHorz'=> array(
			'value' => 'scrollHorz',
			'label' => __( 'Scroll Horizontal', 'catch-responsive-pro' ),
		),
		'scrollVert'=> array(
			'value' => 'scrollVert',
			'label' => __( 'Scroll Vertical', 'catch-responsive-pro' ),
		),
		'flipHorz'	=> array(
			'value' => 'flipHorz',
			'label' => __( 'Flip Horizontal', 'catch-responsive-pro' ),
		),
		'flipVert'	=> array(
			'value' => 'flipVert',
			'label' => __( 'Flip Vertical', 'catch-responsive-pro' ),
		),
		'tileSlide'	=> array(
			'value' => 'tileSlide',
			'label' => __( 'Tile Slide', 'catch-responsive-pro' ),
		),
		'tileBlind'	=> array(
			'value' => 'tileBlind',
			'label' => __( 'Tile Blind', 'catch-responsive-pro' ),
		),
		'shuffle'	=> array(
			'value' => 'shuffle',
			'label' => __( 'Shuffle', 'catch-responsive-pro' ),
		)
	);

	return apply_filters( 'catchresponsive_featured_slide_transition_effects', $featured_slide_transition_effects );
}

/**
 * Returns an array of featured slider image loader options
 *
 * @since Catch Responsive 2.1
 */
function catchresponsive_featured_slider_image_loader() {
	$color_scheme_options = array(
		'true' => array(
			'value' 				=> 'true',
			'label' 				=> __( 'True', 'catch-responsive-pro' ),
		),
		'wait' => array(
			'value' 				=> 'wait',
			'label' 				=> __( 'Wait', 'catch-responsive-pro' ),
		),
		'false' => array(
			'value' 				=> 'false',
			'label' 				=> __( 'False', 'catch-responsive-pro' ),
		),
	);

	return apply_filters( 'catchresponsive_color_schemes', $color_scheme_options );
}


/**
 * Returns an array of color schemes registered for catchresponsive.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_get_pagination_types() {
	$pagination_types = array(
		'default' => array(
			'value' => 'default',
			'label' => __( 'Default(Older Posts/Newer Posts)', 'catch-responsive-pro' ),
		),
		'numeric' => array(
			'value' => 'numeric',
			'label' => __( 'Numeric', 'catch-responsive-pro' ),
		),
		'infinite-scroll-click' => array(
			'value' => 'infinite-scroll-click',
			'label' => __( 'Infinite Scroll (Click)', 'catch-responsive-pro' ),
		),
		'infinite-scroll-scroll' => array(
			'value' => 'infinite-scroll-scroll',
			'label' => __( 'Infinite Scroll (Scroll)', 'catch-responsive-pro' ),
		),
	);

	return apply_filters( 'catchresponsive_get_pagination_types', $pagination_types );
}


/**
 * Returns an array of content featured image size.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_single_post_image_layout_options() {
	$single_post_image_layout_options = array(
		'large' => array(
			'value' => 'large',
			'label' => __( 'Large', 'catch-responsive-pro' ),
		),
		'full-size' => array(
			'value' => 'full-size',
			'label' => __( 'Full size', 'catch-responsive-pro' ),
		),
		'slider-image-size' => array(
			'value' => 'slider-image-size',
			'label' => __( 'Slider Image Size', 'catch-responsive-pro' ),
		),
		'slider-image-size' => array(
			'value' => 'featured',
			'label' => __( 'Featured Image Size', 'catch-responsive-pro' ),
		),
		'disabled' => array(
			'value' => 'disabled',
			'label' => __( 'Disabled', 'catch-responsive-pro' ),
		),
	);
	return apply_filters( 'catchresponsive_single_post_image_layout_options', $single_post_image_layout_options );
}


/**
 * Returns an array of comment options for catchresponsive.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_comment_options() {
	$comment_options = array(
		'use-wordpress-setting' => array(
			'value' => 'use-wordpress-setting',
			'label' => __( 'Use WordPress Setting', 'catch-responsive-pro' ),
		),
		'disable-in-pages' => array(
			'value' => 'disable-in-pages',
			'label' => __( 'Disable in Pages', 'catch-responsive-pro' ),
		),
		'disable-completely' => array(
			'value' => 'disable-completely',
			'label' => __( 'Disable Completely', 'catch-responsive-pro' ),
		),
	);

	return apply_filters( 'catchresponsive_comment_options', $comment_options );
}


/**
 * Returns an array of avaliable fonts registered for catchresponsive.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_avaliable_fonts() {
	$avaliable_fonts = array(
		'arial-black' => array(
			'value' => 'arial-black',
			'label' => '"Arial Black", Gadget, sans-serif',
		),
		'allan' => array(
			'value' => 'allan',
			'label' => '"Allan", sans-serif',
		),
		'allerta' => array(
			'value' => 'allerta',
			'label' => '"Allerta", sans-serif',
		),
		'amaranth' => array(
			'value' => 'amaranth',
			'label' => '"Amaranth", sans-serif',
		),
		'arial' => array(
			'value' => 'arial',
			'label' => 'Arial, Helvetica, sans-serif',
		),
		'bitter' => array(
			'value' => 'bitter',
			'label' => '"Bitter", sans-serif',
		),
		'cabin' => array(
			'value' => 'cabin',
			'label' => '"Cabin", sans-serif',
		),
		'cantarell' => array(
			'value' => 'cantarell',
			'label' => '"Cantarell", sans-serif',
		),
		'century-gothic' => array(
			'value' => 'century-gothic',
			'label' => '"Century Gothic", sans-serif',
		),
		'courier-new' => array(
			'value' => 'courier-new',
			'label' => '"Courier New", Courier, monospace',
		),
		'crimson-text' => array(
			'value' => 'crimson-text',
			'label' => '"Crimson Text", sans-serif',
		),
		'cuprum' => array(
			'value' => 'cuprum',
			'label' => '"Cuprum", sans-serif',
		),
		'dancing-script' => array(
			'value' => 'dancing-script',
			'label' => '"Dancing Script", sans-serif',
		),
		'droid-sans' => array(
			'value' => 'droid-sans',
			'label' => '"Droid Sans", sans-serif',
		),
		'droid-serif' => array(
			'value' => 'droid-serif',
			'label' => '"Droid Serif", sans-serif',
		),
		'exo' => array(
			'value' => 'exo',
			'label' => '"Exo", sans-serif',
		),
		'exo-2' => array(
			'value' => 'exo-2',
			'label' => '"Exo 2", sans-serif',
		),
		'georgia' => array(
			'value' => 'georgia',
			'label' => 'Georgia, "Times New Roman", Times, serif',
		),
		'helvetica' => array(
			'value' => 'helvetica',
			'label' => 'Helvetica, "Helvetica Neue", Arial, sans-serif',
		),
		'helvetica-neue' => array(
			'value' => 'helvetica-neue',
			'label' => '"Helvetica Neue",Helvetica,Arial,sans-serif',
		),
		'istok-web' => array(
			'value' => 'istok-web',
			'label' => '"Istok Web", sans-serif',
		),
		'impact' => array(
			'value' => 'impact',
			'label' => 'Impact, Charcoal, sans-serif',
		),
		'josefin-sans' => array(
			'value' => 'josefin-sans',
			'label' => '"Josefin Sans", sans-serif',
		),
		'lato' => array(
			'value' => 'lato',
			'label' => '"Lato", sans-serif',
		),
		'libre-baskerville' => array(
			'value' => 'libre-baskerville',
			'label' => '"Libre Baskerville",serif'
		),
		'lucida-sans-unicode' => array(
			'value' => 'lucida-sans-unicode',
			'label' => '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
		),
		'lucida-grande' => array(
			'value' => 'lucida-grande',
			'label' => '"Lucida Grande", "Lucida Sans Unicode", sans-serif',
		),
		'lobster' => array(
			'value' => 'lobster',
			'label' => '"Lobster", sans-serif',
		),
		'lora' => array(
			'value' => 'lora',
			'label' => '"Lora", serif',
		),
		'monaco' => array(
			'value' => 'monaco',
			'label' => 'Monaco, Consolas, "Lucida Console", monospace, sans-serif',
		),
		'montserrat' => array(
			'value' => 'montserrat',
			'label' => '"Montserrat", sans-serif',
		),
		'nobile' => array(
			'value' => 'nobile',
			'label' => '"Nobile", sans-serif',
		),
		'noto-serif' => array(
			'value' => 'noto-serif',
			'label' => '"Noto Serif", serif',
		),
		'neuton' => array(
			'value' => 'neuton',
			'label' => '"Neuton", serif',
		),
		'open-sans' => array(
			'value' => 'open-sans',
			'label' => '"Open Sans", sans-serif',
		),
		'oswald' => array(
			'value' => 'oswald',
			'label' => '"Oswald", sans-serif',
		),
		'palatino' => array(
			'value' => 'palatino',
			'label' => 'Palatino, "Palatino Linotype", "Book Antiqua", serif',
		),
		'patua-one' => array(
			'value' => 'patua-one',
			'label' => '"Patua One", sans-serif',
		),
		'playfair-display' => array(
			'value' => 'playfair-display',
			'label' => '"Playfair Display", sans-serif',
		),
		'pt-sans' => array(
			'value' => 'pt-sans',
			'label' => '"PT Sans", sans-serif',
		),
		'pt-serif' => array(
			'value' => 'pt-serif',
			'label' => '"PT Serif", serif',
		),
		'quattrocento-sans' => array(
			'value' => 'quattrocento-sans',
			'label' => '"Quattrocento Sans", sans-serif',
		),
		'roboto' => array(
			'value' => 'roboto',
			'label' => '"Roboto", sans-serif',
		),
		'roboto-slab' => array(
			'value' => 'roboto-slab',
			'label' => '"Roboto Slab", serif',
		),
		'sans-serif' => array(
			'value' => 'sans-serif',
			'label' => 'Sans Serif, Arial',
		),
		'source-sans-pro' => array(
			'value' => 'source-sans-pro',
			'label' => '"Source Sans Pro", sans-serif',
		),
		'tahoma' => array(
			'value' => 'tahoma',
			'label' => 'Tahoma, Geneva, sans-serif',
		),
		'trebuchet-ms' => array(
			'value' => 'trebuchet-ms',
			'label' => '"Trebuchet MS", "Helvetica", sans-serif',
		),
		'times-new-roman' => array(
			'value' => 'times-new-roman',
			'label' => '"Times New Roman", Times, serif',
		),
		'ubuntu' => array(
			'value' => 'ubuntu',
			'label' => '"Ubuntu", sans-serif',
		),
		'varela' => array(
			'value' => 'varela',
			'label' => '"Varela", sans-serif',
		),
		'verdana' => array(
			'value' => 'verdana',
			'label' => 'Verdana, Geneva, sans-serif',
		),
		'yanone-kaffeesatz' => array(
			'value' => 'yanone-kaffeesatz',
			'label' => '"Yanone Kaffeesatz", sans-serif',
		),
	);

	return apply_filters( 'catchresponsive_avaliable_fonts', $avaliable_fonts );
}


/**
 * Returns list of social icons currently supported
 *
 * @since Catch Responsive 1.0
*/
function catchresponsive_get_social_icons_list() {
	$catchresponsive_social_icons_list = array(
		'facebook_link'		=> array(
			'genericon_class' 	=> 'facebook-alt',
			'label' 			=> esc_html__( 'Facebook', 'catch-responsive-pro' )
			),
		'twitter_link'		=> array(
			'genericon_class' 	=> 'twitter',
			'label' 			=> esc_html__( 'Twitter', 'catch-responsive-pro' )
			),
		'googleplus_link'	=> array(
			'genericon_class' 	=> 'googleplus-alt',
			'label' 			=> esc_html__( 'Googleplus', 'catch-responsive-pro' )
			),
		'email_link'		=> array(
			'genericon_class' 	=> 'mail',
			'label' 			=> esc_html__( 'Email', 'catch-responsive-pro' )
			),
		'feed_link'			=> array(
			'genericon_class' 	=> 'feed',
			'label' 			=> esc_html__( 'Feed', 'catch-responsive-pro' )
			),
		'wordpress_link'	=> array(
			'genericon_class' 	=> 'wordpress',
			'label' 			=> esc_html__( 'WordPress', 'catch-responsive-pro' )
			),
		'github_link'		=> array(
			'genericon_class' 	=> 'github',
			'label' 			=> esc_html__( 'GitHub', 'catch-responsive-pro' )
			),
		'linkedin_link'		=> array(
			'genericon_class' 	=> 'linkedin',
			'label' 			=> esc_html__( 'LinkedIn', 'catch-responsive-pro' )
			),
		'pinterest_link'	=> array(
			'genericon_class' 	=> 'pinterest',
			'label' 			=> esc_html__( 'Pinterest', 'catch-responsive-pro' )
			),
		'flickr_link'		=> array(
			'genericon_class' 	=> 'flickr',
			'label' 			=> esc_html__( 'Flickr', 'catch-responsive-pro' )
			),
		'vimeo_link'		=> array(
			'genericon_class' 	=> 'vimeo',
			'label' 			=> esc_html__( 'Vimeo', 'catch-responsive-pro' )
			),
		'youtube_link'		=> array(
			'genericon_class' 	=> 'youtube',
			'label' 			=> esc_html__( 'YouTube', 'catch-responsive-pro' )
			),
		'tumblr_link'		=> array(
			'genericon_class' 	=> 'tumblr',
			'label' 			=> esc_html__( 'Tumblr', 'catch-responsive-pro' )
			),
		'instagram_link'	=> array(
			'genericon_class' 	=> 'instagram',
			'label' 			=> esc_html__( 'Instagram', 'catch-responsive-pro' )
			),
		'polldaddy_link'	=> array(
			'genericon_class' 	=> 'polldaddy',
			'label' 			=> esc_html__( 'PollDaddy', 'catch-responsive-pro' )
			),
		'codepen_link'		=> array(
			'genericon_class' 	=> 'codepen',
			'label' 			=> esc_html__( 'CodePen', 'catch-responsive-pro' )
			),
		'path_link'			=> array(
			'genericon_class' 	=> 'path',
			'label' 			=> esc_html__( 'Path', 'catch-responsive-pro' )
			),
		'dribbble_link'		=> array(
			'genericon_class' 	=> 'dribbble',
			'label' 			=> esc_html__( 'Dribbble', 'catch-responsive-pro' )
			),
		'skype_link'		=> array(
			'genericon_class' 	=> 'skype',
			'label' 			=> esc_html__( 'Skype', 'catch-responsive-pro' )
			),
		'digg_link'			=> array(
			'genericon_class' 	=> 'digg',
			'label' 			=> esc_html__( 'Digg', 'catch-responsive-pro' )
			),
		'reddit_link'		=> array(
			'genericon_class' 	=> 'reddit',
			'label' 			=> esc_html__( 'Reddit', 'catch-responsive-pro' )
			),
		'stumbleupon_link'	=> array(
			'genericon_class' 	=> 'stumbleupon',
			'label' 			=> esc_html__( 'Stumbleupon', 'catch-responsive-pro' )
			),
		'pocket_link'		=> array(
			'genericon_class' 	=> 'pocket',
			'label' 			=> esc_html__( 'Pocket', 'catch-responsive-pro' ),
			),
		'dropbox_link'		=> array(
			'genericon_class' 	=> 'dropbox',
			'label' 			=> esc_html__( 'DropBox', 'catch-responsive-pro' ),
			),
		'spotify_link'		=> array(
			'genericon_class' 	=> 'spotify',
			'label' 			=> esc_html__( 'Spotify', 'catch-responsive-pro' ),
			),
		'foursquare_link'	=> array(
			'genericon_class' 	=> 'foursquare',
			'label' 			=> esc_html__( 'Foursquare', 'catch-responsive-pro' ),
			),
		'twitch_link'		=> array(
			'genericon_class' 	=> 'twitch',
			'label' 			=> esc_html__( 'Twitch', 'catch-responsive-pro' ),
			),
		'website_link'		=> array(
			'genericon_class' 	=> 'website',
			'label' 			=> esc_html__( 'Website', 'catch-responsive-pro' ),
			),
		'phone_link'		=> array(
			'genericon_class' 	=> 'phone',
			'label' 			=> esc_html__( 'Phone', 'catch-responsive-pro' ),
			),
		'handset_link'		=> array(
			'genericon_class' 	=> 'handset',
			'label' 			=> esc_html__( 'Handset', 'catch-responsive-pro' ),
			),
		'cart_link'			=> array(
			'genericon_class' 	=> 'cart',
			'label' 			=> esc_html__( 'Cart', 'catch-responsive-pro' ),
			),
		'cloud_link'		=> array(
			'genericon_class' 	=> 'cloud',
			'label' 			=> esc_html__( 'Cloud', 'catch-responsive-pro' ),
			),
		'link_link'		=> array(
			'genericon_class' 	=> 'link',
			'label' 			=> esc_html__( 'Link', 'catch-responsive-pro' ),
			),
	);

	return apply_filters( 'catchresponsive_social_icons_list', $catchresponsive_social_icons_list );
}


/**
 * Returns list of basic color options currently supported
 *
 * @since Catch Responsive 1.0
*/
function catchresponsive_get_basic_color_options() {
	$options =	array(
					'text_color' 		=> __( 'Text Color', 'catch-responsive-pro' ),
					'link_color' 		=> __( 'Link Color', 'catch-responsive-pro' ),
					'link_hover_color'	=> __( 'Link Hover Color', 'catch-responsive-pro' ),
				);

	return apply_filters( 'catchresponsive_get_basic_color_options', $options );
}


/**
 * Returns list of content color options currently supported
 *
 * @since Catch Responsive 1.0
*/
function catchresponsive_get_content_color_options() {
	$options =	array(
					'content_wrapper_background_color' 	=> __( 'Wrapper Background Color', 'catch-responsive-pro' ),
					'content_background_color'			=> __( 'Background Color', 'catch-responsive-pro' ),
					'content_title_color' 				=> __( 'Title Color', 'catch-responsive-pro' ),
					'content_title_hover_color' 		=> __( 'Title Hover Color', 'catch-responsive-pro' ),
					'content_meta_color' 				=> __( 'Meta Color', 'catch-responsive-pro' ),
					'content_meta_hover_color' 			=> __( 'Meta Hover Color', 'catch-responsive-pro' ),
				);

	return apply_filters( 'catchresponsive_get_content_color_options', $options );
}


/**
 * Returns list of header color options currently supported
 *
 * @since Catch Responsive 1.0
*/
function catchresponsive_get_header_color_options() {
	$options =	array(
					'header_background_color' 	=> __( 'Header Background color', 'catch-responsive-pro' ),
					'site_title_hover_color' 	=> __( 'Site Title Hover Color', 'catch-responsive-pro' ),
					'tagline_color' 			=> __( 'Tagline Color', 'catch-responsive-pro' )
				);

	return apply_filters( 'catchresponsive_get_header_color_options', $options );
}


/**
 * Returns list of sidebar color options currently supported
 *
 * @since Catch Responsive 1.0
*/
function catchresponsive_get_sidebar_color_options() {
	$options =  array(
					'sidebar_background_color' 		=> __( 'Background Color', 'catch-responsive-pro' ),
					'sidebar_widget_title_color' 	=> __( 'Widget Title Color', 'catch-responsive-pro' ),
					'sidebar_widget_text_color' 	=> __( 'Widget Text Color', 'catch-responsive-pro' ),
					'sidebar_widget_link_color' 	=> __( 'Widget Link Color', 'catch-responsive-pro' ),
				);
	return apply_filters( 'catchresponsive_get_sidebar_color_options', $options );
}


/**
 * Returns list of pagination color options currently supported
 *
 * @since Catch Responsive 1.0
*/
function catchresponsive_get_pagination_color_options() {
	$options =  array(
					'pagination_background_color' 					=> __( 'Background Color', 'catch-responsive-pro' ),
					'pagination_hover_background_color' 			=> __( 'Hover Background Color', 'catch-responsive-pro' ),
					'pagination_text_color' 						=> __( 'Text Color', 'catch-responsive-pro' ),
					'pagination_link_color' 						=> __( 'Link Color', 'catch-responsive-pro' ),
					'pagination_hover_active_color' 				=> __( 'Hover/Active Color', 'catch-responsive-pro' ),
					'numeric_infinite_scroll_background_color' 		=> __( 'Numeric/Infinite Scroll Background Color', 'catch-responsive-pro' ),
					'numeric_infinite_scroll_hover_background_color'=> __( 'Numeric/Infinite Scroll Hover Background Color', 'catch-responsive-pro' ),
				);

	return apply_filters( 'catchresponsive_get_pagination_color_options', $options );
}


/**
 * Returns list of footer color options currently supported
 *
 * @since Catch Responsive 1.0
*/
function catchresponsive_get_footer_color_options() {
	$options =	array(
					'footer_background_color' 				=> __( 'Background Color', 'catch-responsive-pro' ),
					'footer_text_color' 					=> __( 'Text Color', 'catch-responsive-pro' ),
					'footer_link_color' 					=> __( 'Link Color', 'catch-responsive-pro' ),
					'footer_sidebar_area_background_color' 	=> __( 'Sidebar Area Background Color', 'catch-responsive-pro' ),
					'footer_widget_background_color' 		=> __( 'Widget Background Color', 'catch-responsive-pro' ),
					'footer_widget_title_color'				=> __( 'Widget Title Color', 'catch-responsive-pro' ),
					'footer_widget_text_color'				=> __( 'Widget Text Color', 'catch-responsive-pro' ),
					'footer_widget_link_color'				=> __( 'Widget Link Color', 'catch-responsive-pro' ),
				);

	return apply_filters( 'catchresponsive_get_footer_color_options', $options );
}


/**
 * Returns list of promotion headline color options currently supported
 *
 * @since Catch Responsive 1.0
*/
function catchresponsive_get_promotion_headline_color_options() {
	$options =	array(
					'promotion_headline_background_color'				=> __( 'Background Color', 'catch-responsive-pro' ),
					'promotion_headline_title_color'					=> __( 'Title Color', 'catch-responsive-pro' ),
					'promotion_headline_text_color'						=> __( 'Text Color', 'catch-responsive-pro' ),
					'promotion_headline_link_color'						=> __( 'Link Color', 'catch-responsive-pro' ),
					'promotion_headline_button_background_color'		=> __( 'Button Background Color', 'catch-responsive-pro' ),
					'promotion_headline_button_text_color'				=> __( 'Button Text Color', 'catch-responsive-pro' ),
					'promotion_headline_button_hover_background_color'	=> __( 'Button Hover Background Color', 'catch-responsive-pro' ),
					'promotion_headline_button_hover_text_color'		=> __( 'Button Hover Text Color', 'catch-responsive-pro' ),
				);

	return apply_filters( 'catchresponsive_get_promotion_headline_color_options', $options );
}


/**
 * Returns list of scrollup color options currently supported
 *
 * @since Catch Responsive 1.0
*/
function catchresponsive_get_scrollup_color_options() {
	$options =	array(
					'scrollup_background_color'			=> __( 'Background Color', 'catch-responsive-pro' ),
					'scrollup_hover_background_color'	=> __( 'Hover Background Color', 'catch-responsive-pro' ),
					'scrollup_text_color'				=> __( 'Text Color', 'catch-responsive-pro' ),
					'scrollup_hover_text_color'			=> __( 'Hover Text Color', 'catch-responsive-pro' ),
				);

	return apply_filters( 'catchresponsive_get_scrollup_color_options', $options );
}


/**
 * Returns list of slider color options currently supported
 *
 * @since Catch Responsive 1.0
*/
function catchresponsive_get_slider_color_options() {
	$options =	array(
					'slider_content_background_color'	=> __( 'Content Background Color', 'catch-responsive-pro' ),
					'slider_text_color'					=> __( 'Text Color', 'catch-responsive-pro' ),
					'slider_link_color'					=> __( 'Link Color', 'catch-responsive-pro' ),
				);

	return apply_filters( 'catchresponsive_get_slider_color_options', $options );
}


/**
 * Returns list of featured_content color options currently supported
 *
 * @since Catch Responsive 1.0
*/
function catchresponsive_get_featured_content_color_options() {
	$options =  array(
					'featured_content_background_color'	=> __( 'Background Color', 'catch-responsive-pro' ),
					'featured_content_title_color'		=> __( 'Title Color', 'catch-responsive-pro' ),
					'featured_content_text_color'		=> __( 'Text Color', 'catch-responsive-pro' ),
					'featured_content_link_color'		=> __( 'Link Color', 'catch-responsive-pro' ),
				);

	return apply_filters( 'catchresponsive_get_featured_content_color_options', $options );
}


/**
 * Returns list of menu color options currently supported
 *
 * @since Catch Responsive 1.0
*/
function catchresponsive_get_menu_color_options() {
	$options =	array(
					'menu_background_color'			=> __( 'Menu Background color', 'catch-responsive-pro' ),
					'menu_color'					=> __( 'Menu Color', 'catch-responsive-pro' ),
					'hover_active_background_color'	=> __( 'Hover Active Background Color', 'catch-responsive-pro' ),
					'hover_active_text_color'		=> __( 'Hover Active Text Color', 'catch-responsive-pro' ),
					'sub_menu_background_color'		=> __( 'Sub Menu Background Color', 'catch-responsive-pro' ),
					'sub_menu_text_color'			=> __( 'Sub Menu Text Color', 'catch-responsive-pro' ),
				);
	return apply_filters( 'catchresponsive_get_menu_color_options', $options );
}

/**
 * Returns an array of metabox layout options registered for catchresponsive.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_metabox_layouts() {
	$layout_options = array(
		'default' 	=> array(
			'id' 	=> 'catchresponsive-layout-option',
			'value' => 'default',
			'label' => __( 'Default', 'catch-responsive-pro' ),
		),
		'left-sidebar' 	=> array(
			'id' 	=> 'catchresponsive-layout-option',
			'value' => 'left-sidebar',
			'label' => __( 'Primary Sidebar, Content', 'catch-responsive-pro' ),
		),
		'right-sidebar' => array(
			'id' 	=> 'catchresponsive-layout-option',
			'value' => 'right-sidebar',
			'label' => __( 'Content, Primary Sidebar', 'catch-responsive-pro' ),
		),
		'no-sidebar'	=> array(
			'id' 	=> 'catchresponsive-layout-option',
			'value' => 'no-sidebar',
			'label' => __( 'No Sidebar ( Content Width )', 'catch-responsive-pro' ),
		),
		'no-sidebar-one-column' => array(
			'id' 	=> 'catchresponsive-layout-option',
			'value' => 'no-sidebar-one-column',
			'label' => __( 'No Sidebar ( One Column )', 'catch-responsive-pro' ),
		),
		'no-sidebar-full-width' => array(
			'id' 	=> 'catchresponsive-layout-option',
			'value' => 'no-sidebar-full-width',
			'label' => __( 'No Sidebar ( Full Width )', 'catch-responsive-pro' ),
		),
	);
	return apply_filters( 'catchresponsive_layouts', $layout_options );
}

/**
 * Returns an array of metabox header featured image options registered for catchresponsive.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_metabox_header_featured_image_options() {
	$header_featured_image_options = array(
		'default' => array(
			'id'		=> 'catchresponsive-header-image',
			'value' 	=> 'default',
			'label' 	=> __( 'Default', 'catch-responsive-pro' ),
		),
		'enable' => array(
			'id'		=> 'catchresponsive-header-image',
			'value' 	=> 'enable',
			'label' 	=> __( 'Enable', 'catch-responsive-pro' ),
		),
		'disable' => array(
			'id'		=> 'catchresponsive-header-image',
			'value' 	=> 'disable',
			'label' 	=> __( 'Disable', 'catch-responsive-pro' )
		)
	);
	return apply_filters( 'header_featured_image_options', $header_featured_image_options );
}


/**
 * Returns an array of metabox sidebar options registered for catchresponsive.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_metabox_sidebar_options() {
	$sidebar_options = array(
		'main-sidebar' => array(
			'id'		=> 'catchresponsive-sidebar-options',
			'value' 	=> 'default-sidebar',
			'label' 	=> __( 'Default Sidebar', 'catch-responsive-pro' )
		),
		'optional-sidebar-one' => array(
			'id' 	=> 'catchresponsive-sidebar-options',
			'value' => 'optional-sidebar-one',
			'label' => __( 'Optional Sidebar One', 'catch-responsive-pro' )
		),
		'optional-sidebar-two' => array(
			'id' 	=> 'catchresponsive-sidebar-options',
			'value' => 'optional-sidebar-two',
			'label' => __( 'Optional Sidebar Two', 'catch-responsive-pro' )
		),
		'optional-sidebar-three' => array(
			'id' 	=> 'catchresponsive-sidebar-options',
			'value' => 'optional-sidebar-three',
			'label' => __( 'Optional Sidebar three', 'catch-responsive-pro' )
		)
	);
	return apply_filters( 'sidebar_options', $sidebar_options );
}


/**
 * Returns an array of metabox featured image options registered for catchresponsive.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_metabox_featured_image_options() {
	$featured_image_options = array(
		'default' => array(
			'id'		=> 'catchresponsive-featured-image',
			'value' 	=> 'default',
			'label' 	=> __( 'Default', 'catch-responsive-pro' ),
		),
		'featured' => array(
			'id'		=> 'catchresponsive-featured-image',
			'value' 	=> 'featured',
			'label' 	=> __( 'Featured Image', 'catch-responsive-pro' )
		),
		'full' => array(
			'id' => 'catchresponsive-featured-image',
			'value' => 'full',
			'label' => __( 'Full Image', 'catch-responsive-pro' )
		),
		'slider' => array(
			'id' => 'catchresponsive-featured-image',
			'value' => 'slider',
			'label' => __( 'Slider Image', 'catch-responsive-pro' )
		),
		'disable' => array(
			'id' => 'catchresponsive-featured-image',
			'value' => 'disable',
			'label' => __( 'Disable Image', 'catch-responsive-pro' )
		)
	);
	return apply_filters( 'featured_image_options', $featured_image_options );
}


/**
 * Returns the default options for catchresponsive dark theme.
 *
 * @since Catchresponsive 1.0
 */
function catchresponsive_default_dark_color_options() {
	$default_dark_color_options = array(
		//Basic Color Options
		'background_color'									=> '#333333',
		'text_color'										=> '#bebebe',
		'link_color'										=> '#e4741f',
		'link_hover_color'									=> '#dddddd',

		//Header Color Options
		'header_textcolor'									=> '#dddddd',
		'header_background_color'							=> 'transparent',
		'site_title_hover_color'							=> '#e4741f',
		'tagline_color'										=> '#dddddd',

		//Content Color Options
		'content_wrapper_background_color'					=> '#1b1b1b',
		'content_background_color'							=> '#1b1b1b',
		'content_title_color'								=> '#dddddd',
		'content_title_hover_color'							=> '#e4741f',
		'content_meta_color'								=> '#e4741f',
		'content_meta_hover_color'							=> '#dddddd',

		//Sidebar Color Options
		'sidebar_background_color'							=> '#1b1b1b',
		'sidebar_widget_title_color'						=> '#dddddd',
		'sidebar_widget_text_color'							=> '#bebebe',
		'sidebar_widget_link_color'							=> '#e4741f',

		//Pagination Color Options
		'pagination_background_color'						=> '#444444',
		'pagination_hover_background_color'					=> '#dddddd',
		'pagination_text_color'								=> '#bebebe',
		'pagination_link_color'								=> '#e4741f',
		'pagination_hover_active_color'						=> '#000000',
		'numeric_infinite_scroll_background_color'			=> '#444444',
		'numeric_infinite_scroll_hover_background_color'	=> '#dddddd',

		//Footer Color Options
		'footer_background_color'							=> 'transparent',
		'footer_text_color'									=> '#bebebe',
		'footer_link_color'									=> '#dddddd',
		'footer_sidebar_area_background_color'				=> 'transparent',
		'footer_widget_background_color'					=> 'transparent',
		'footer_widget_title_color'							=> '#dddddd',
		'footer_widget_text_color'							=> '#bebebe',
		'footer_widget_link_color'							=> '#e4741f',

		//Promotion Headline Color Options
		'promotion_headline_background_color'				=> '#1b1b1b',
		'promotion_headline_title_color'					=> '#dddddd',
		'promotion_headline_text_color'						=> '#bebebe',
		'promotion_headline_link_color'						=> '#e4741f',
		'promotion_headline_button_background_color'		=> '#f2f2f2',
		'promotion_headline_button_text_color'				=> '#666666',
		'promotion_headline_button_hover_background_color'	=> '#f2f2f2',
		'promotion_headline_button_hover_text_color'		=> '#666666',

		//Scrollup Color Options
		'scrollup_background_color'							=> '#666666',
		'scrollup_hover_background_color'					=> '#000000',
		'scrollup_text_color'								=> '#eeeeee',
		'scrollup_hover_text_color'							=> '#ffffff',

		//Slider Color Options
		'slider_content_background_color'					=> '#444444',
		'slider_text_color'									=> '#eeeeee',
		'slider_link_color'									=> '#e4741f',

		//Featured Content Color Options
		'featured_content_background_color'					=> '#1b1b1b',
		'featured_content_title_color'						=> '#dddddd',
		'featured_content_text_color'						=> '#bebebe',
		'featured_content_link_color'						=> '#e4741f',

		//Primary Menu Color Options
		'menu_background_color'								=> '#222222',
		'menu_color'										=> '#ffffff',
		'hover_active_background_color'						=> '#ffffff',
		'hover_active_text_color'							=> '#000000',
		'sub_menu_background_color'							=> '#ffffff',
		'sub_menu_text_color'								=> '#000000',

		//Secondary Menu Color Options
		'secondary_menu_background_color'					=> '#f2f2f2',
		'secondary_menu_color'								=> '#666666',
		'secondary_hover_active_background_color'			=> '#ffffff',
		'secondary_hover_active_text_color'					=> '#000000',
		'secondary_sub_menu_background_color'				=> '#ffffff',
		'secondary_sub_menu_text_color'						=> '#666666',

		//Header Right Color Options
		'header_right_menu_background_color'				=> 'transparent',
		'header_right_menu_color'							=> '#dddddd',
		'header_right_hover_active_background_color'		=> '#222222',
		'header_right_hover_active_text_color'				=> '#ffffff',
		'header_right_sub_menu_background_color'			=> '#222222',
		'header_right_sub_menu_text_color'					=> '#ffffff',

		//Footer Menu Color Options
		'footer_menu_background_color'						=> '#222222',
		'footer_menu_color'									=> '#ffffff',
		'footer_hover_active_background_color'				=> '#ffffff',
		'footer_hover_active_text_color'					=> '#000000',
		'footer_sub_menu_background_color'					=> '#ffffff',
		'footer_sub_menu_text_color'						=> '#000000',
	);

	return apply_filters( 'catchresponsive_default_dark_color_options', $default_dark_color_options );
}


/**
 * Checks if there are options already present from Catch Responsive free version and adds it to the Catch Responsive Pro theme options
 *
 * @since Catch Responsive Pro 1.0
 * @hook after_theme_switch
 */
function catchresponsive_setup_options() {
	//Perform action only if theme_mods_theme_mods_catchbase-pro does not exist
	if ( !get_option( 'theme_mods_catch-responsive-pro' ) ) {
		//Perform action only if theme_mods_catchbase free version exists
		if ( $catchresponsive_free_options = get_option ( 'theme_mods_catch-responsive' ) ) {
			update_option('theme_mods_catch-responsive-pro', $catchresponsive_free_options );
		}
	}
}
add_action( 'after_switch_theme', 'catchresponsive_setup_options' );