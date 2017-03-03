<?php
/**
 * The template for Social Links in Customizer
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

	// Social Icons
	$wp_customize->add_panel( 'catchresponsive_social_links', array(
	    'capability'     => 'edit_theme_options',
	    'description'	=> __( 'Note: Enter the url for correponding social networking website', 'catch-responsive-pro' ),
	    'priority'       => 700,
		'title'    		 => __( 'Social Links', 'catch-responsive-pro' ),
	) );

	$wp_customize->add_section( 'catchresponsive_social_links', array(
		'panel'			=> 'catchresponsive_social_links',
		'priority' 		=> 1,
		'title'   	 	=> __( 'Social Links', 'catch-responsive-pro' ),
	) );

	$wp_customize->add_setting( 'catchresponsive_theme_options[social_icon_size]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['social_icon_size'],
		'sanitize_callback'	=> 'absint',
	) );

	$wp_customize->add_control( 'catchresponsive_theme_options[social_icon_size]', array(
		'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
            'style' => 'width: 60px;'
            ),
		'label'    	=> __( 'Social Icon Size(px)', 'catch-responsive-pro' ),
		'priority'	=> '1.5',
		'section' 	=> 'catchresponsive_social_links',
		'settings'	=> 'catchresponsive_theme_options[social_icon_size]',
		'type'	   => 'number',
		)
	);


	$catchresponsive_social_icons 	=	catchresponsive_get_social_icons_list();

	foreach ( $catchresponsive_social_icons as $key => $value ){
		if ( 'skype_link' == $key ){
			$wp_customize->add_setting( 'catchresponsive_theme_options['. $key .']', array(
					'capability'		=> 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',
				) );

			$wp_customize->add_control( 'catchresponsive_theme_options['. $key .']', array(
				'description'	=> __( 'Skype link can be of formats:<br>callto://+{number}<br> skype:{username}?{action}. More Information in readme file', 'catch-responsive-pro' ),
				'label'    		=> $value['label'],
				'section'  		=> 'catchresponsive_social_links',
				'settings' 		=> 'catchresponsive_theme_options['. $key .']',
				'type'	   		=> 'url',
			) );
		}
		else {
			if ( 'email_link' == $key ){
				$wp_customize->add_setting( 'catchresponsive_theme_options['. $key .']', array(
						'capability'		=> 'edit_theme_options',
						'sanitize_callback' => 'sanitize_email',
					) );
			}
			elseif ( 'handset_link' == $key || 'phone_link' == $key ){
				$wp_customize->add_setting( 'catchresponsive_theme_options['. $key .']', array(
						'capability'		=> 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field',
					) );
			}
			else {
				$wp_customize->add_setting( 'catchresponsive_theme_options['. $key .']', array(
						'capability'		=> 'edit_theme_options',
						'sanitize_callback' => 'esc_url_raw',
					) );
			}

			$wp_customize->add_control( 'catchresponsive_theme_options['. $key .']', array(
				'label'    => $value['label'],
				'section'  => 'catchresponsive_social_links',
				'settings' => 'catchresponsive_theme_options['. $key .']',
				'type'	   => 'url',
			) );
		}
	}

	$wp_customize->add_section( 'catchresponsive_custom_social_links', array(
		'description'	=> __( 'Save and refresh the page if No. of custom social icon is changed (Max number of icons is 10)', 'catch-responsive-pro' ),
		'panel'			=> 'catchresponsive_social_links',
		'priority' 		=> 2,
		'title'   	 	=> __( 'Custom Social Links', 'catch-responsive-pro' ),
	) );

	$wp_customize->add_setting( 'catchresponsive_theme_options[custom_social_icons]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['custom_social_icons'],
		'sanitize_callback'	=> 'catchresponsive_sanitize_number_range',
		)
	);

	$wp_customize->add_control( 'catchresponsive_theme_options[custom_social_icons]', array(
		'input_attrs' => array(
            'min'   => 0,
            'max'   => 10,
            'step'  => 1,
            'style' => 'width: 45px;'
            ),
		'label'    	=> __( 'Number of Custom Social Icons', 'catch-responsive-pro' ),
		'priority'	=> '1.5',
		'section' 	=> 'catchresponsive_custom_social_links',
		'settings'	=> 'catchresponsive_theme_options[custom_social_icons]',
		'type'		=> 'number'
		)
	);

	$priority	=	6;
	//loop for custom social icons
	for( $i = 1; $i <= $options['custom_social_icons'] ; $i++ ){
		if ( $i > 9 ) // use this condition to make sure 10 comes after 9 priority wise
			$priority++;

		$wp_customize->add_setting( 'catchresponsive_theme_options[custom_social_icon_note_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field',
		) );

		$wp_customize->add_control( new catchresponsive_Note_Control( $wp_customize, 'catchresponsive_theme_options[custom_social_icon_note_'. $i .']', array(
	        'label'		=> __( 'Custom Social Icon #', 'catch-responsive-pro' ) . $i,
			'priority'	=> $priority . '.' . $i,
	        'section'  	=> 'catchresponsive_custom_social_links',
	        'settings'	=> 'catchresponsive_theme_options[custom_social_icon_note_'. $i .']',
	        'type'     	=> 'description',
   		) ) );

   		$wp_customize->add_setting( 'catchresponsive_theme_options[custom_social_icon_title_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field',
		) );

		$wp_customize->add_control(  'catchresponsive_theme_options[custom_social_icon_title_'. $i .']', array(
			'label'		=> __( 'Title', 'catch-responsive-pro' ),
			'priority'	=> $priority . '.' .$i .$i,
			'section'   => 'catchresponsive_custom_social_links',
			'settings'  => 'catchresponsive_theme_options[custom_social_icon_title_'. $i .']',
		) );

		$wp_customize->add_setting( 'catchresponsive_theme_options[custom_social_icon_image_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'catchresponsive_sanitize_image',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'catchresponsive_theme_options[custom_social_icon_image_'. $i .']', array(
			'label'		=> __( 'Image', 'catch-responsive-pro' ),
	        'priority'	=> $priority . '.' . $i .$i .$i,
			'section'   => 'catchresponsive_custom_social_links',
	        'settings'  => 'catchresponsive_theme_options[custom_social_icon_image_'. $i .']',
		) ) );

   		$wp_customize->add_setting( 'catchresponsive_theme_options[custom_social_icon_image_hover_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'catchresponsive_sanitize_image',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'catchresponsive_theme_options[custom_social_icon_image_hover_'. $i .']' , array(
			'label'		=> __( 'Hover Image(Optional)', 'catch-responsive-pro' ),
	        'priority'	=> $priority . '.' . $i .$i . $i  .$i,
			'section'   => 'catchresponsive_custom_social_links',
	        'settings'  => 'catchresponsive_theme_options[custom_social_icon_image_hover_'. $i .']',
		) ) );

		$wp_customize->add_setting( 'catchresponsive_theme_options[custom_social_icon_link_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'esc_url_raw',
		) );

		$wp_customize->add_control(  'catchresponsive_theme_options[custom_social_icon_link_'. $i .']', array(
			'label'		=> __( 'Link', 'catch-responsive-pro' ),
	        'priority'	=> $priority . '.' .$i . $i  . $i  .$i .$i,
			'section'   => 'catchresponsive_custom_social_links',
	        'settings'  => 'catchresponsive_theme_options[custom_social_icon_link_'. $i .']',
		) );
	}
	// Social Icons End