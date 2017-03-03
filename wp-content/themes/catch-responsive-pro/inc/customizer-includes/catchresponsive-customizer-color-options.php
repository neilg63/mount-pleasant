<?php
/**
 * The template for adding color options in Customizer
 *
 * @package catchresponsive
 * @subpackage Catch Responsive Pro
 * @since Catch Responsive 1.0
 */

 if ( ! defined( 'CATCHRESPONSIVE_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}
  	//Basic Color Options
  	$wp_customize->add_panel( 'catchresponsive_color_options', array(
	    'capability'     => 'edit_theme_options',
	    'description'    => __( 'Color Options', 'catch-responsive-pro' ),
	    'priority'       => 300,
	    'title'    		 => __( 'Color Options', 'catch-responsive-pro' ),
	) );

	//Basic Color Options
	$wp_customize->add_section( 'catchresponsive_color_scheme', array(
		'panel'	   => 'catchresponsive_color_options',
		'priority' => 301,
		'title'    => __( 'Basic Color Options', 'catch-responsive-pro' ),
	) );

	$wp_customize->add_setting( 'catchresponsive_theme_options[color_scheme]', array(
		'capability' 		=> 'edit_theme_options',
		'default'    		=> $defaults['color_scheme'],
		'sanitize_callback'	=> 'sanitize_key'
	) );

	$schemes = catchresponsive_color_schemes();

	$choices = array();

	foreach ( $schemes as $scheme ) {
		$choices[ $scheme['value'] ] = $scheme['label'];
	}

	$wp_customize->add_control( 'catchresponsive_theme_options[color_scheme]', array(
		'choices'  => $choices,
		'label'    => __( 'Color Scheme', 'catch-responsive-pro' ),
		'priority' => 5,
		'section'  => 'catchresponsive_color_scheme',
		'settings' => 'catchresponsive_theme_options[color_scheme]',
		'type'     => 'radio',
	) );

	$catchresponsive_basic_color_options	=	catchresponsive_get_basic_color_options();

	$i = 10;
	foreach ( $catchresponsive_basic_color_options as $key => $color_option ) {
		$lower_color_option	=	$key;

		$wp_customize->add_setting( 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults[ $lower_color_option ],
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'label'		=> $color_option,
			'priority'	=> $i,
			'section'	=> 'catchresponsive_color_scheme',
			'settings'	=> 'catchresponsive_theme_options['. $lower_color_option .']',
		) ) );

		$i++;
	}

	$wp_customize->add_setting( 'catchresponsive_theme_options[mobile_menu_color_scheme]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['mobile_menu_color_scheme'],
		'sanitize_callback' => 'sanitize_key'
	) );

	$wp_customize->add_control( 'catchresponsive_theme_options[mobile_menu_color_scheme]', array(
		'choices'  => $choices,
		'label'    => __( 'Mobile Menu Color Scheme', 'catch-responsive-pro' ),
		'priority'	=> 50,
		'section'  => 'catchresponsive_color_scheme',
		'settings' => 'catchresponsive_theme_options[mobile_menu_color_scheme]',
		'type'     => 'radio',
	) );

	//Header Color Option
	$wp_customize->add_section( 'catchresponsive_header_color_options', array(
		'panel'	   => 'catchresponsive_color_options',
		'priority' => 302,
		'title'    => __( 'Header Color Options', 'catch-responsive-pro' ),
	) );

	$catchresponsive_header_color_options	=	catchresponsive_get_header_color_options();

	$i = 10;
	foreach ( $catchresponsive_header_color_options as $key => $color_option ) {
		$lower_color_option	=	$key;

		$wp_customize->add_setting( 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults[ $lower_color_option ],
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'label'		=> $color_option,
			'priority'	=> $i,
			'section'	=> 'catchresponsive_header_color_options',
			'settings'	=> 'catchresponsive_theme_options['. $lower_color_option .']',
		) ) );

		$i++;
	}

	//Content Color Option
	$wp_customize->add_section( 'catchresponsive_content_color_options', array(
		'panel'	   => 'catchresponsive_color_options',
		'priority' => 303,
		'title'    => __( 'Content Color Options', 'catch-responsive-pro' ),
	) );

	$catchresponsive_content_color_options	=	catchresponsive_get_content_color_options();

	$i = 10;
	foreach ( $catchresponsive_content_color_options as $key => $color_option ) {
		$lower_color_option	=	$key;

		$wp_customize->add_setting( 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults[ $lower_color_option ],
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'label'		=> $color_option,
			'priority'	=> $i,
			'section'	=> 'catchresponsive_content_color_options',
			'settings'	=> 'catchresponsive_theme_options['. $lower_color_option .']',
		) ) );

		$i++;
	}

	//Sidebar Color Option
	$wp_customize->add_section( 'catchresponsive_sidebar_color_options', array(
		'description'	=> __( 'Only for Primary and Secondary Sidebars', 'catch-responsive-pro' ),
		'panel'	   		=> 'catchresponsive_color_options',
		'priority' 		=> 304,
		'title'    		=> __( 'Sidebar Color Options', 'catch-responsive-pro' ),
	) );

	$catchresponsive_sidebar_color_options	=	catchresponsive_get_sidebar_color_options();

	$i = 1;
	foreach ( $catchresponsive_sidebar_color_options as $key => $color_option ) {
		$lower_color_option	=	$key;

		$wp_customize->add_setting( 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults[ $lower_color_option ],
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'label'		=> $color_option,
			'priority'	=> $i,
			'section'	=> 'catchresponsive_sidebar_color_options',
			'settings'	=> 'catchresponsive_theme_options['. $lower_color_option .']',
		) ) );

		$i++;
	}

	//Pagination Color Option
	$wp_customize->add_section( 'catchresponsive_pagination_color_options', array(
		'panel'	   		=> 'catchresponsive_color_options',
		'priority' 		=> 305,
		'title'    		=> __( 'Pagination Color Options', 'catch-responsive-pro' ),
	) );

	$catchresponsive_pagination_color_options	=	catchresponsive_get_pagination_color_options();

	$i = 1;
	foreach ( $catchresponsive_pagination_color_options as $key => $color_option ) {
		$lower_color_option	=	$key;

		$wp_customize->add_setting( 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults[ $lower_color_option ],
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'label'		=> $color_option,
			'priority'	=> $i,
			'section'	=> 'catchresponsive_pagination_color_options',
			'settings'	=> 'catchresponsive_theme_options['. $lower_color_option .']',
		) ) );

		$i++;
	}

	//Footer Color Option
	$wp_customize->add_section( 'catchresponsive_footer_color_options', array(
		'panel'	   => 'catchresponsive_color_options',
		'priority' => 306,
		'title'    => __( 'Footer Color Options', 'catch-responsive-pro' ),
	) );

	$catchresponsive_footer_color_options	=	catchresponsive_get_footer_color_options();

	$i = 1;
	foreach ( $catchresponsive_footer_color_options as $key => $color_option ) {
		$lower_color_option	=	$key;

		$wp_customize->add_setting( 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults[ $lower_color_option ],
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'label'		=> $color_option,
			'priority'	=> $i,
			'section'	=> 'catchresponsive_footer_color_options',
			'settings'	=> 'catchresponsive_theme_options['. $lower_color_option .']',
		) ) );

		$i++;
	}

	//Promotion Headline Color Option
	$wp_customize->add_section( 'catchresponsive_promotion_headline_color_options', array(
		'panel'	   => 'catchresponsive_color_options',
		'priority' => 307,
		'title'    => __( 'Promotion Headline Color Options', 'catch-responsive-pro' ),
	) );

	$catchresponsive_promotion_headline_options	=	catchresponsive_get_promotion_headline_color_options();

	$i = 1;
	foreach ( $catchresponsive_promotion_headline_options as $key => $color_option ) {
		$lower_color_option	=	$key;

		$wp_customize->add_setting( 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults[ $lower_color_option ],
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'label'		=> $color_option,
			'priority'	=> $i,
			'section'	=> 'catchresponsive_promotion_headline_color_options',
			'settings'	=> 'catchresponsive_theme_options['. $lower_color_option .']',
		) ) );

		$i++;
	}

	//Scrollup Color Option
	$wp_customize->add_section( 'catchresponsive_scrollup_color_options', array(
		'panel'	   => 'catchresponsive_color_options',
		'priority' => 308,
		'title'    => __( 'Scrollup Color Options', 'catch-responsive-pro' ),
	) );

	$catchresponsive_scrollup_options	=	catchresponsive_get_scrollup_color_options();

	$i = 1;
	foreach ( $catchresponsive_scrollup_options as $key => $color_option ) {
		$lower_color_option	=	$key;

		$wp_customize->add_setting( 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults[ $lower_color_option ],
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'label'		=> $color_option,
			'priority'	=> $i,
			'section'	=> 'catchresponsive_scrollup_color_options',
			'settings'	=> 'catchresponsive_theme_options['. $lower_color_option .']',
		) ) );

		$i++;
	}

	//Slider Color Option
	$wp_customize->add_section( 'catchresponsive_slider_color_options', array(
		'panel'	   => 'catchresponsive_color_options',
		'priority' => 309,
		'title'    => __( 'Slider Color Options', 'catch-responsive-pro' ),
	) );

	$catchresponsive_slider_options	=	catchresponsive_get_slider_color_options();

	$i = 1;
	foreach ( $catchresponsive_slider_options as $key => $color_option ) {
		$lower_color_option	=	$key;

		$wp_customize->add_setting( 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults[ $lower_color_option ],
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'label'		=> $color_option,
			'priority'	=> $i,
			'section'	=> 'catchresponsive_slider_color_options',
			'settings'	=> 'catchresponsive_theme_options['. $lower_color_option .']',
		) ) );

		$i++;
	}

	//Featured Content Color Options
	$wp_customize->add_section( 'catchresponsive_featured_content_color_options', array(
		'panel'	   => 'catchresponsive_color_options',
		'priority' => 310,
		'title'    => __( 'Featured Content Color Options', 'catch-responsive-pro' ),
	) );

	$catchresponsive_featured_content_options	=	catchresponsive_get_featured_content_color_options();

	$i = 1;
	foreach ( $catchresponsive_featured_content_options as $key => $color_option ) {
		$lower_color_option	=	$key;

		$wp_customize->add_setting( 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults[ $lower_color_option ],
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'label'		=> $color_option,
			'priority'	=> $i,
			'section'	=> 'catchresponsive_featured_content_color_options',
			'settings'	=> 'catchresponsive_theme_options['. $lower_color_option .']',
		) ) );

		$i++;
	}

	//Menu Color Options
	$wp_customize->add_section( 'catchresponsive_primary_menu_color_options', array(
		'panel'	   => 'catchresponsive_color_options',
		'title'    => __( 'Primary Menu Color Options', 'catch-responsive-pro' ),
		'priority' => 351,
	) );

	$catchresponsive_menu_color_options	=	catchresponsive_get_menu_color_options();

	$i = 1;

	foreach ( $catchresponsive_menu_color_options as $key => $color_option ) {
		$lower_color_option	=	$key;

		$wp_customize->add_setting( 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults[ $lower_color_option ],
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'label'		=> $color_option,
			'priority'	=> $i++,
			'section'	=> 'catchresponsive_primary_menu_color_options',
			'settings'	=> 'catchresponsive_theme_options['. $lower_color_option .']',
		) ) );
	}

	$wp_customize->add_section( 'catchresponsive_secondary_menu_color_options', array(
		'panel'	   => 'catchresponsive_color_options',
		'priority' => 352,
		'title'    => __( 'Secondary Menu Color Options', 'catch-responsive-pro' ),
	) );

	foreach ( $catchresponsive_menu_color_options as $key => $color_option ) {
		$lower_color_option	=	'secondary_' . $key;

		$wp_customize->add_setting( 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults[ $lower_color_option ],
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'label'		=> $color_option,
			'priority'	=> $i,
			'section'	=> 'catchresponsive_secondary_menu_color_options',
			'settings'	=> 'catchresponsive_theme_options['. $lower_color_option .']',
		) ) );

		$i++;
	}

	$wp_customize->add_section( 'catchresponsive_header_right_menu_color_options', array(
		'panel'	   => 'catchresponsive_color_options',
		'priority' => 352.5,
		'title'    => __( 'Header Right Menu Color Options', 'catch-responsive-pro' ),
	) );

	foreach ( $catchresponsive_menu_color_options as $key => $color_option ) {
		$lower_color_option	=	'header_right_' . $key;

		$wp_customize->add_setting( 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults[ $lower_color_option ],
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'label'		=> $color_option,
			'priority'	=> $i,
			'section'	=> 'catchresponsive_header_right_menu_color_options',
			'settings'	=> 'catchresponsive_theme_options['. $lower_color_option .']',
		) ) );

		$i++;
	}

	$wp_customize->add_section( 'catchresponsive_footer_menu_color_options', array(
		'panel'	   => 'catchresponsive_color_options',
		'priority' => 353,
		'title'    => __( 'Footer Menu Color Options', 'catch-responsive-pro' ),
	) );

	foreach ( $catchresponsive_menu_color_options as $key => $color_option ) {
		$lower_color_option	=	'footer_' . $key;

		$wp_customize->add_setting( 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults[ $lower_color_option ],
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'catchresponsive_theme_options['. $lower_color_option .']', array(
			'label'		=> $color_option,
			'section'	=> 'catchresponsive_footer_menu_color_options',
			'settings'	=> 'catchresponsive_theme_options['. $lower_color_option .']',
			'priority'	=> $i
		) ) );

		$i++;
	}
	//Basic Color Options End