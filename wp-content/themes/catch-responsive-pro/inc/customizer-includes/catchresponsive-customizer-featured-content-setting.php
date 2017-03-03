<?php
/**
 * The template for adding Featured Content Settings in Customizer
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
	// Featured Content Options
	if ( 4.3 > get_bloginfo( 'version' ) ) {
		$wp_customize->add_panel( 'catchresponsive_featured_content_options', array(
		    'capability'     => 'edit_theme_options',
			'description'    => __( 'Options for Featured Content', 'catch-responsive-pro' ),
		    'priority'       => 400,
		    'title'    		 => __( 'Featured Content', 'catch-responsive-pro' ),
		) );


		$wp_customize->add_section( 'catchresponsive_featured_content_settings', array(
			'panel'			=> 'catchresponsive_featured_content_options',
			'priority'		=> 1,
			'title'			=> __( 'Featured Content Options', 'catch-responsive-pro' ),
		) );
	}
	else {
		$wp_customize->add_section( 'catchresponsive_featured_content_settings', array(
			'priority'      => 400,
			'title'			=> __( 'Featured Content', 'catch-responsive-pro' ),
		) );
	}

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_option]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_option'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$catchresponsive_featured_slider_content_options = catchresponsive_featured_slider_content_options();
	$choices = array();
	foreach ( $catchresponsive_featured_slider_content_options as $catchresponsive_featured_slider_content_option ) {
		$choices[$catchresponsive_featured_slider_content_option['value']] = $catchresponsive_featured_slider_content_option['label'];
	}

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_content_option]', array(
		'choices'  	=> $choices,
		'label'    	=> __( 'Enable Featured Content on', 'catch-responsive-pro' ),
		'priority'	=> '1',
		'section'  	=> 'catchresponsive_featured_content_settings',
		'settings' 	=> 'catchresponsive_theme_options[featured_content_option]',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_layout]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_layout'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$catchresponsive_featured_content_layout_options = catchresponsive_featured_content_layout_options();
	$choices = array();
	foreach ( $catchresponsive_featured_content_layout_options as $catchresponsive_featured_content_layout_option ) {
		$choices[$catchresponsive_featured_content_layout_option['value']] = $catchresponsive_featured_content_layout_option['label'];
	}

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_content_layout]', array(
		'active_callback'	=> 'catchresponsive_is_featured_content_active',
		'choices'  	=> $choices,
		'label'    	=> __( 'Select Featured Content Layout', 'catch-responsive-pro' ),
		'priority'	=> '2',
		'section'  	=> 'catchresponsive_featured_content_settings',
		'settings' 	=> 'catchresponsive_theme_options[featured_content_layout]',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_position]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_position'],
		'sanitize_callback' => 'catchresponsive_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_content_position]', array(
		'active_callback'	=> 'catchresponsive_is_featured_content_active',
		'label'		=> __( 'Check to Move above Footer', 'catch-responsive-pro' ),
		'priority'	=> '3',
		'section'  	=> 'catchresponsive_featured_content_settings',
		'settings'	=> 'catchresponsive_theme_options[featured_content_position]',
		'type'		=> 'checkbox',
	) );

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_type]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_type'],
		'sanitize_callback'	=> 'sanitize_key',
	) );

	$catchresponsive_featured_content_types = catchresponsive_featured_content_types();
	$choices = array();
	foreach ( $catchresponsive_featured_content_types as $catchresponsive_featured_content_type ) {
		$choices[$catchresponsive_featured_content_type['value']] = $catchresponsive_featured_content_type['label'];
	}

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_content_type]', array(
		'active_callback'	=> 'catchresponsive_is_featured_content_active',
		'choices'  	=> $choices,
		'label'    	=> __( 'Select Content Type', 'catch-responsive-pro' ),
		'priority'	=> '3',
		'section'  	=> 'catchresponsive_featured_content_settings',
		'settings' 	=> 'catchresponsive_theme_options[featured_content_type]',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_headline]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_headline'],
		'sanitize_callback'	=> 'wp_kses_post',
	) );

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_content_headline]' , array(
		'active_callback'	=> 'catchresponsive_is_featured_content_active',
		'description'	=> __( 'Leave field empty if you want to remove Headline', 'catch-responsive-pro' ),
		'label'    		=> __( 'Headline for Featured Content', 'catch-responsive-pro' ),
		'priority'		=> '4',
		'section'  		=> 'catchresponsive_featured_content_settings',
		'settings' 		=> 'catchresponsive_theme_options[featured_content_headline]',
		'type'	   		=> 'text',
		)
	);

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_subheadline]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_subheadline'],
		'sanitize_callback'	=> 'wp_kses_post',
	) );

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_content_subheadline]' , array(
		'active_callback'	=> 'catchresponsive_is_featured_content_active',
		'description'	=> __( 'Leave field empty if you want to remove Sub-headline', 'catch-responsive-pro' ),
		'label'    		=> __( 'Sub-headline for Featured Content', 'catch-responsive-pro' ),
		'priority'		=> '5',
		'section'  		=> 'catchresponsive_featured_content_settings',
		'settings' 		=> 'catchresponsive_theme_options[featured_content_subheadline]',
		'type'	   		=> 'text',
		)
	);

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_number]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_number'],
		'sanitize_callback'	=> 'catchresponsive_sanitize_number_range',
	) );

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_content_number]' , array(
		'active_callback'	=> 'catchresponsive_is_demo_featured_content_inactive',
		'description'	=> __( 'Save and refresh the page if No. of Featured Content is changed (Max no of Featured Content is 20)', 'catch-responsive-pro' ),
		'input_attrs' 	=> array(
            'style' => 'width: 45px;',
            'min'   => 0,
            'max'   => 20,
            'step'  => 1,
        	),
		'label'    		=> __( 'No of Featured Content', 'catch-responsive-pro' ),
		'priority'		=> '6',
		'section'  		=> 'catchresponsive_featured_content_settings',
		'settings' 		=> 'catchresponsive_theme_options[featured_content_number]',
		'type'	   		=> 'number',
		)
	);

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_show]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_show'],
		'sanitize_callback'	=> 'sanitize_key',
	) );

	$catchresponsive_featured_content_show = catchresponsive_featured_content_show();
	$choices = array();
	foreach ( $catchresponsive_featured_content_show as $catchresponsive_featured_content_shows ) {
		$choices[$catchresponsive_featured_content_shows['value']] = $catchresponsive_featured_content_shows['label'];
	}

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_content_show]', array(
		'active_callback'	=> 'catchresponsive_is_demo_featured_content_inactive',
		'choices'  	=> $choices,
		'label'    	=> __( 'Display Content', 'catch-responsive-pro' ),
		'priority'	=> '6.1',
		'section'  	=> 'catchresponsive_featured_content_settings',
		'settings' 	=> 'catchresponsive_theme_options[featured_content_show]',
		'type'	  	=> 'select',
	) );


	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_select_category]', array(
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'catchresponsive_sanitize_category_list',
	) );

	$wp_customize->add_control( new catchresponsive_Customize_Dropdown_Categories_Control( $wp_customize, 'catchresponsive_featured_content_select_category', array(
        'active_callback'	=> 'catchresponsive_is_featured_category_content_active',
        'label'   	=> __( 'Select Categories', 'catch-responsive-pro' ),
        'name' 		=> 'catchresponsive_theme_options[featured_content_select_category]',
        'section'  	=> 'catchresponsive_featured_content_settings',
        'settings' 	=> 'catchresponsive_theme_options[featured_content_select_category]',
        'type'     	=> 'dropdown-categories',
    ) ) );

	$priority	=	11;

	//loop for featured post content
	for ( $i=1; $i <=  $options['featured_content_number'] ; $i++ ) {
		$wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_post_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'catchresponsive_sanitize_page',
		) );

		$wp_customize->add_control( 'catchresponsive_featured_content_post_'. $i, array(
			'active_callback'	=> 'catchresponsive_is_featured_post_content_active',
			'input_attrs' => array(
            	'style' => 'width: 40px;'
        	),
			'label'    	=> __( 'Featured Post', 'catch-responsive-pro' ) . ' ' . $i ,
			'priority'	=>  '4' . $i,
			'section'  	=> 'catchresponsive_featured_content_settings',
			'settings' 	=> 'catchresponsive_theme_options[featured_content_post_'. $i .']',
			'type'	   	=> 'text',
			)
		);

		$wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_page_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'catchresponsive_sanitize_page',
		) );

		$wp_customize->add_control( 'catchresponsive_featured_content_page_'. $i .'', array(
			'active_callback'	=> 'catchresponsive_is_featured_page_content_active',
			'label'    	=> __( 'Featured Page', 'catch-responsive-pro' ) . ' ' . $i ,
			'priority'	=> '5' . $i,
			'section'  	=> 'catchresponsive_featured_content_settings',
			'settings' 	=> 'catchresponsive_theme_options[featured_content_page_'. $i .']',
			'type'	   	=> 'dropdown-pages',
		) );

		if ( $i > 9 ) // use this condition to make sure 10 comes after 9 priority wise
			$priority++;

		$wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_note_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field',
		) );

		$wp_customize->add_control( new catchresponsive_Note_Control( $wp_customize, 'featured_content_note_'. $i, array(
			'active_callback'	=> 'catchresponsive_is_featured_image_content_active',
	        'label'		=> __( 'Featured Content #', 'catch-responsive-pro' ) .  $i,
			'priority'	=> $priority . '.' . $i,
	        'section'  	=> 'catchresponsive_featured_content_settings',
	        'settings'	=> 'catchresponsive_theme_options[featured_content_note_'. $i .']',
	        'type'     	=> 'description',
   		) ) );

		$wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_image_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'catchresponsive_sanitize_image',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featured_content_image_'. $i , array(
			'active_callback'	=> 'catchresponsive_is_featured_image_content_active',
			'label'		=> __( 'Image', 'catch-responsive-pro' ),
	        'priority'	=> $priority . '.' . $i .$i,
			'section'   => 'catchresponsive_featured_content_settings',
	        'settings'  => 'catchresponsive_theme_options[featured_content_image_'. $i .']',
		) ) );

		$wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_link_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'esc_url_raw',
		) );

		$wp_customize->add_control(  'catchresponsive_theme_options[featured_content_link_'. $i .']', array(
			'active_callback'	=> 'catchresponsive_is_featured_image_content_active',
			'label'		=> __( 'Link', 'catch-responsive-pro' ),
	        'priority'	=> $priority . '.' .$i . $i  . $i ,
			'section'   => 'catchresponsive_featured_content_settings',
	        'settings'  => 'catchresponsive_theme_options[featured_content_link_'. $i .']',
		) );

		$wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_target_'. $i .']', array(
	        'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'catchresponsive_sanitize_checkbox',
		) );

		$wp_customize->add_control(  'catchresponsive_theme_options[featured_content_target_'. $i .']', array(
			'active_callback'	=> 'catchresponsive_is_featured_image_content_active',
			'label'		=> __( 'Check to Open Link in New Window/Tab', 'catch-responsive-pro' ),
	        'priority'	=> $priority . '.' .$i  .$i  . $i . $i,
			'section'   => 'catchresponsive_featured_content_settings',
	        'settings'  => 'catchresponsive_theme_options[featured_content_target_'. $i .']',
			'type'		=> 'checkbox',
	    ) );

	    $wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_title_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_kses_post',
		) );

		$wp_customize->add_control(  'catchresponsive_theme_options[featured_content_title_'. $i .']', array(
			'active_callback'	=> 'catchresponsive_is_featured_image_content_active',
			'label'		=> __( 'Title', 'catch-responsive-pro' ),
	        'priority'	=> $priority . '.' .$i .  $i.  $i .$i . $i,
			'section'   => 'catchresponsive_featured_content_settings',
	        'settings'  => 'catchresponsive_theme_options[featured_content_title_'. $i .']',
			'type'		=> 'text',
	    ) );

	    $wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_content_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_kses_post',
		) );

		$wp_customize->add_control( 'catchresponsive_theme_options[featured_content_content_'. $i .']', array(
			'active_callback'	=> 'catchresponsive_is_featured_image_content_active',
			'label'		=> __( 'Content', 'catch-responsive-pro' ),
	        'priority'	=> $priority . '.' . $i . $i .  $i . $i . $i . $i,
			'section'   => 'catchresponsive_featured_content_settings',
	        'settings'  => 'catchresponsive_theme_options[featured_content_content_'. $i .']',
			'type'		=> 'textarea',
	    ) );
	}
// Featured Content Setting End