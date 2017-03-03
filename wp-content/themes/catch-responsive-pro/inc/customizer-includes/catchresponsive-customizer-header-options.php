<?php
/**
 * The template for adding Additional Header Option in Customizer
 *
 * @package Catch Themes
 * @subpackage Catch Responsive
 * @since Catch Responsive 1.0
 */

if ( ! defined( 'CATCHRESPONSIVE_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

	// Header Options
	$wp_customize->add_setting( 'catchresponsive_theme_options[enable_featured_header_image]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['enable_featured_header_image'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$catchresponsive_enable_featured_header_image_options = catchresponsive_enable_featured_header_image_options();
	$choices = array();
	foreach ( $catchresponsive_enable_featured_header_image_options as $catchresponsive_enable_featured_header_image_option ) {
		$choices[$catchresponsive_enable_featured_header_image_option['value']] = $catchresponsive_enable_featured_header_image_option['label'];
	}

	$wp_customize->add_control( 'catchresponsive_theme_options[enable_featured_header_image]', array(
			'choices'  	=> $choices,
			'label'		=> __( 'Enable Featured Header Image on ', 'catch-responsive-pro' ),
			'section'   => 'header_image',
	        'settings'  => 'catchresponsive_theme_options[enable_featured_header_image]',
	        'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_header_image_position]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_header_image_position'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$catchresponsive_featured_header_image_position_options = catchresponsive_featured_header_image_position_options();
	$choices = array();
	foreach ( $catchresponsive_featured_header_image_position_options as $catchresponsive_featured_header_image_position_option ) {
		$choices[$catchresponsive_featured_header_image_position_option['value']] = $catchresponsive_featured_header_image_position_option['label'];
	}

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_header_image_position]', array(
			'choices'  	=> $choices,
			'label'		=> __( 'Featured Header Image Position', 'catch-responsive-pro' ),
			'section'   => 'header_image',
	        'settings'  => 'catchresponsive_theme_options[featured_header_image_position]',
	        'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_image_size]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_image_size'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$catchresponsive_featured_image_size_options = catchresponsive_featured_image_size_options();
	$choices = array();
	foreach ( $catchresponsive_featured_image_size_options as $catchresponsive_featured_image_size_option ) {
		$choices[$catchresponsive_featured_image_size_option['value']] = $catchresponsive_featured_image_size_option['label'];
	}

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_image_size]', array(
			'choices'  	=> $choices,
			'label'		=> __( 'Page/Post Featured Header Image Size', 'catch-responsive-pro' ),
			'section'   => 'header_image',
			'settings'  => 'catchresponsive_theme_options[featured_image_size]',
			'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_header_image_alt]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_header_image_alt'],
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_header_image_alt]', array(
			'label'		=> __( 'Featured Header Image Alt/Title Tag ', 'catch-responsive-pro' ),
			'section'   => 'header_image',
	        'settings'  => 'catchresponsive_theme_options[featured_header_image_alt]',
	        'type'	  	=> 'text',
	) );

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_header_image_url]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_header_image_url'],
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_header_image_url]', array(
			'label'		=> __( 'Featured Header Image Link URL', 'catch-responsive-pro' ),
			'section'   => 'header_image',
	        'settings'  => 'catchresponsive_theme_options[featured_header_image_url]',
	        'type'	  	=> 'text',
	) );

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_header_image_base]', array(
		'capability'		=> 'edit_theme_options',
		'default'	=> $defaults['featured_header_image_url'],
		'sanitize_callback' => 'catchresponsive_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_header_image_base]', array(
		'label'    	=> __( 'Check to Open Link in New Window/Tab', 'catch-responsive-pro' ),
		'section'  	=> 'header_image',
		'settings' 	=> 'catchresponsive_theme_options[featured_header_image_base]',
		'type'     	=> 'checkbox',
	) );
// Header Options End