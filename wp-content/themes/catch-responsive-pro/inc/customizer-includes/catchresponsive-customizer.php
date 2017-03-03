<?php
/**
 * The main template for implementing Theme/Customzer Options
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
 * Implements catchresponsive theme options into Theme Customizer.
 *
 * @param $wp_customize Theme Customizer object
 * @return void
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport			= 'postMessage';

	/**
	  * Set priority of blogname (Site Title) to 1.
	  *  Strangly, if more than two options is added, Site title is moved below Tagline. This rectifies this issue.
	  */
	$wp_customize->get_control( 'blogname' )->priority			= 1;

	$wp_customize->get_setting( 'blogdescription' )->transport	= 'postMessage';

	$options  = catchresponsive_get_theme_options();

	$defaults = catchresponsive_get_default_theme_options();

	//Custom Controls
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/catchresponsive-customizer-custom-controls.php';

	//@remove Remove this block when WordPress 4.8 is released
	if ( ! function_exists( 'has_custom_logo' ) ) {
		// Custom Logo (added to Site Title and Tagline section in Theme Customizer)
		$wp_customize->add_setting( 'catchresponsive_theme_options[logo]', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults['logo'],
			'sanitize_callback'	=> 'catchresponsive_sanitize_image'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
			'label'		=> __( 'Logo', 'catch-responsive-pro' ),
			'priority'	=> 100,
			'section'   => 'title_tagline',
	        'settings'  => 'catchresponsive_theme_options[logo]',
	    ) ) );

	    $wp_customize->add_setting( 'catchresponsive_theme_options[logo_disable]', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults['logo_disable'],
			'sanitize_callback' => 'catchresponsive_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'catchresponsive_theme_options[logo_disable]', array(
			'label'    => __( 'Check to disable logo', 'catch-responsive-pro' ),
			'priority' => 101,
			'section'  => 'title_tagline',
			'settings' => 'catchresponsive_theme_options[logo_disable]',
			'type'     => 'checkbox',
		) );

		$wp_customize->add_setting( 'catchresponsive_theme_options[logo_alt_text]', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults['logo_alt_text'],
			'sanitize_callback'	=> 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'catchresponsive_logo_alt_text', array(
			'label'    	=> __( 'Logo Alt Text', 'catch-responsive-pro' ),
			'priority'	=> 102,
			'section' 	=> 'title_tagline',
			'settings' 	=> 'catchresponsive_theme_options[logo_alt_text]',
			'type'     	=> 'text',
		) );
	}

	$wp_customize->add_setting( 'catchresponsive_theme_options[move_title_tagline]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['move_title_tagline'],
		'sanitize_callback' => 'catchresponsive_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'catchresponsive_theme_options[move_title_tagline]', array(
		'label'    => __( 'Check to move Site Title and Tagline before logo', 'catch-responsive-pro' ),
		'priority' => function_exists( 'has_custom_logo' ) ? 10 : 103,
		'section'  => 'title_tagline',
		'settings' => 'catchresponsive_theme_options[move_title_tagline]',
		'type'     => 'checkbox',
	) );
	// Custom Logo End

	// Header Options (added to Header section in Theme Customizer)
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/catchresponsive-customizer-header-options.php';


   	//Additional Menu Options
	$wp_customize->add_section( 'catchresponsive_menu_options', array(
		'description'	=> __( 'Extra Menu Options specific to this theme', 'catch-responsive-pro' ),
		'priority' 		=> 105,
		'title'    		=> __( 'Menu Options', 'catch-responsive-pro' ),
	) );

	$wp_customize->add_setting( 'catchresponsive_theme_options[primary_menu_disable]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['primary_menu_disable'],
		'sanitize_callback' => 'catchresponsive_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'catchresponsive_theme_options[primary_menu_disable]', array(
		'label'    => __( 'Check to disable Primary Menu', 'catch-responsive-pro' ),
		'section'  => 'catchresponsive_menu_options',
		'settings' => 'catchresponsive_theme_options[primary_menu_disable]',
		'type'     => 'checkbox',
	) );

   	$wp_customize->add_setting( 'catchresponsive_theme_options[primary_search_disable]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['primary_search_disable'],
		'sanitize_callback' => 'catchresponsive_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'catchresponsive_theme_options[primary_search_disable]', array(
		'label'    => __( 'Check to disable search box in Primary Menu', 'catch-responsive-pro' ),
		'section'  => 'catchresponsive_menu_options',
		'settings' => 'catchresponsive_theme_options[primary_search_disable]',
		'type'     => 'checkbox',
	) );
	//Additional Menu Options End

	//Theme Options
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/catchresponsive-customizer-theme-options.php';

	// Color Options
	// Moved from Default Color Control to Catbase Color Options
	$wp_customize->get_control( 'background_color' )->section = 'catchresponsive_color_scheme';
	$wp_customize->get_control( 'header_textcolor' )->section = 'catchresponsive_header_color_options';

   	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/catchresponsive-customizer-color-options.php';

	//Featured Content Setting
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/catchresponsive-customizer-featured-content-setting.php';

	//Featured Slider
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/catchresponsive-customizer-featured-slider.php';

	//Social Links
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/catchresponsive-customizer-social-icons.php';

	// Reset all settings to default
	$wp_customize->add_section( 'catchresponsive_reset_all_settings', array(
		'description'	=> __( 'Caution: Reset all settings to default. Refresh the page after save to view full effects.', 'catch-responsive-pro' ),
		'priority' 		=> 700,
		'title'    		=> __( 'Reset all settings', 'catch-responsive-pro' ),
	) );

	$wp_customize->add_setting( 'catchresponsive_theme_options[reset_all_settings]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['reset_all_settings'],
		'sanitize_callback' => 'catchresponsive_sanitize_checkbox',
		'transport'			=> 'postMessage',
	) );

	$wp_customize->add_control( 'catchresponsive_theme_options[reset_all_settings]', array(
		'label'    => __( 'Check to reset all settings to default', 'catch-responsive-pro' ),
		'section'  => 'catchresponsive_reset_all_settings',
		'settings' => 'catchresponsive_theme_options[reset_all_settings]',
		'type'     => 'checkbox',
	) );
	// Reset all settings to default end


	//Important Links
		$wp_customize->add_section( 'important_links', array(
			'priority' => 999,
			'title'    => __( 'Important Links', 'catch-responsive-pro' ),
		) );

		/**
		 * Has dummy Sanitizaition function as it contains no value to be sanitized
		 */
		$wp_customize->add_setting( 'important_links', array(
			'sanitize_callback'	=> 'sanitize_text_field',
		) );

		$wp_customize->add_control( new catchresponsive_Important_Links( $wp_customize, 'important_links', array(
				'label'    => __( 'Important Links', 'catch-responsive-pro' ),
				'section'  => 'important_links',
				'settings' => 'important_links',
				'type'     => 'important_links',
	    ) ) );
	    //Important Links End
}
add_action( 'customize_register', 'catchresponsive_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously for catchresponsive.
 * And flushes out all transient data on preview
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_customize_preview() {
	wp_enqueue_script( 'catchresponsive_customizer', get_template_directory_uri() . '/js/catchresponsive-customizer.min.js', array( 'customize-preview' ), '20120827', true );

	//Flush transients
	catchresponsive_flush_transients();
}
add_action( 'customize_preview_init', 'catchresponsive_customize_preview' );


/**
 * Custom scripts and styles on customize.php for catchresponsive.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_customize_scripts() {
	wp_enqueue_script( 'catchresponsive_customizer_custom', get_template_directory_uri() . '/js/catchresponsive-customizer-custom-scripts.min.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20150630', true );

	$catchresponsive_data = array(
			'catchresponsive_color_list' => catchresponsive_color_list(),
			'reset_message'              => esc_html__( 'Refresh the customizer page after saving to view reset effects', 'catch-responsive-pro' )
		);
	// Send list of color variables as object to custom customizer js
	wp_localize_script( 'catchresponsive_customizer_custom', 'catchresponsive_data', $catchresponsive_data );
}
add_action( 'customize_controls_enqueue_scripts', 'catchresponsive_customize_scripts');


/**
 * Returns list of color keys of array with default values for each color scheme as index
 *
 * @since Catch Responsive Pro 3.1
 */
function catchresponsive_color_list() {
	// Get default color scheme values
	$default 		= catchresponsive_get_default_theme_options();
	// Get default dark color scheme valies
	$default_dark 	= catchresponsive_default_dark_color_options();

	$catchresponsive_color_list['background_color']['light']	= $default['background_color'];
	$catchresponsive_color_list['background_color']['dark']	= $default_dark['background_color'];

	$catchresponsive_color_list['header_textcolor']['light']	= $default['header_textcolor'];
	$catchresponsive_color_list['header_textcolor']['dark']	= $default_dark['header_textcolor'];

	// Get coloy keys for menu
	$catchresponsive_menu_color_option = catchresponsive_get_menu_color_options();

	// Get coloy keys for all other options except menu
	$catchresponsive_get_color_list = array_merge(
									catchresponsive_get_basic_color_options(),
									catchresponsive_get_header_color_options(),
									catchresponsive_get_content_color_options(),
									catchresponsive_get_sidebar_color_options(),
									catchresponsive_get_pagination_color_options(),
									catchresponsive_get_footer_color_options(),
									catchresponsive_get_promotion_headline_color_options(),
									catchresponsive_get_scrollup_color_options(),
									catchresponsive_get_slider_color_options(),
									catchresponsive_get_featured_content_color_options(),
									$catchresponsive_menu_color_option // Primary Menu Color Options
									);

	// Set light and dark color keys with default values for each color scheme as index
	foreach( $catchresponsive_get_color_list as $key => $color_option ) {
		$lower_color_option	=	$key;

		$catchresponsive_color_list[ 'catchresponsive_theme_options[' . $lower_color_option . ']' ]['light'] 	= $default[ $lower_color_option ];
		$catchresponsive_color_list[ 'catchresponsive_theme_options[' . $lower_color_option . ']' ]['dark'] 	= $default_dark[ $lower_color_option ];
	}

	//Add Secondary Menu Color Options
	foreach( $catchresponsive_menu_color_option as $key => $color_option ) {
		$lower_color_option	=	'secondary_' . $key;

		$catchresponsive_color_list[ 'catchresponsive_theme_options[' . $lower_color_option . ']' ]['light'] 	= $default[ $lower_color_option ];
		$catchresponsive_color_list[ 'catchresponsive_theme_options[' . $lower_color_option . ']' ]['dark'] 	= $default_dark[ $lower_color_option ];

		//Add Header Right Menu Color Options
		$lower_color_option	=	'header_right_' . $key;

		$catchresponsive_color_list[ 'catchresponsive_theme_options[' . $lower_color_option . ']' ]['light'] 	= $default[ $lower_color_option ];
		$catchresponsive_color_list[ 'catchresponsive_theme_options[' . $lower_color_option . ']' ]['dark'] 	= $default_dark[ $lower_color_option ];

		//Add Footer Menu Color Options
		$lower_color_option	=	'footer_' . $key;

		$catchresponsive_color_list[ 'catchresponsive_theme_options[' . $lower_color_option . ']' ]['light'] 	= $default[ $lower_color_option ];
		$catchresponsive_color_list[ 'catchresponsive_theme_options[' . $lower_color_option . ']' ]['dark'] 	= $default_dark[ $lower_color_option ];
	}

	return $catchresponsive_color_list;
}


/**
 * Function to reset date with respect to condition
 */
function catchresponsive_reset_data() {
	$options  = catchresponsive_get_theme_options();
    if ( $options['reset_all_settings'] ) {
    	remove_theme_mods();

        // Flush out all transients	on reset
        catchresponsive_flush_transients();

        return;
    }

	$defaults = catchresponsive_get_default_theme_options();
    if ( $options['reset_footer_content'] ) {
    	//Reset Footer Editor Options
		$options[ 'footer_content' ]     = $defaults[ 'footer_content' ];
		$options['reset_footer_content'] = 0;

		set_theme_mod( 'catchresponsive_theme_options', $options );
    }

    if ( $options['reset_typography'] ) {
    	$font_family_options = array(
			'title_font',
			'body_font',
			'tagline_font',
			'content_title_font',
			'content_font',
			'headings_font'
		);

		foreach ( $font_family_options as $font_family_option ) {
			$options[ $font_family_option ] = $defaults[ $font_family_option ];
		}

		$options['reset_typography'] = 0;

        set_theme_mod( 'catchresponsive_theme_options', $options );
    }
}
add_action( 'customize_save_after', 'catchresponsive_reset_data' );


//Active callbacks for customizer
require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/catchresponsive-customizer-active-callbacks.php';


//Sanitize functions for customizer
require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/catchresponsive-customizer-sanitize-functions.php';