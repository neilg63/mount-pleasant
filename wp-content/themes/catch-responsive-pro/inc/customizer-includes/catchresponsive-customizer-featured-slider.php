<?php
/**
 * The template for adding Featured Slider Options in Customizer
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
	// Featured Slider
	if ( 4.3 > get_bloginfo( 'version' ) ) {
		$wp_customize->add_panel( 'catchresponsive_featured_slider', array(
		    'capability'     => 'edit_theme_options',
		    'description'    => __( 'Featured Slider Options', 'catch-responsive-pro' ),
		    'priority'       => 500,
			'title'    		 => __( 'Featured Slider', 'catch-responsive-pro' ),
		) );

		$wp_customize->add_section( 'catchresponsive_featured_slider', array(
			'panel'			=> 'catchresponsive_featured_slider',
			'priority'		=> 1,
			'title'			=> __( 'Featured Slider Options', 'catch-responsive-pro' ),
		) );
	}
	else {
		$wp_customize->add_section( 'catchresponsive_featured_slider', array(
			'priority'      => 500,
			'title'			=> __( 'Featured Slider', 'catch-responsive-pro' ),
		) );
	}

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_slider_option]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slider_option'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$featured_slider_content_options = catchresponsive_featured_slider_content_options();
	$choices = array();
	foreach ( $featured_slider_content_options as $featured_slider_content_option ) {
		$choices[$featured_slider_content_option['value']] = $featured_slider_content_option['label'];
	}

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_slider_option]', array(
		'choices'   => $choices,
		'label'    	=> __( 'Enable Slider on', 'catch-responsive-pro' ),
		'priority'	=> '1.1',
		'section'  	=> 'catchresponsive_featured_slider',
		'settings' 	=> 'catchresponsive_theme_options[featured_slider_option]',
		'type'    	=> 'select',
	) );

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_slide_transition_effect]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slide_transition_effect'],
		'sanitize_callback'	=> 'catchresponsive_sanitize_select',
	) );

	$catchresponsive_featured_slide_transition_effects = catchresponsive_featured_slide_transition_effects();
	$choices = array();
	foreach ( $catchresponsive_featured_slide_transition_effects as $catchresponsive_featured_slide_transition_effect ) {
		$choices[$catchresponsive_featured_slide_transition_effect['value']] = $catchresponsive_featured_slide_transition_effect['label'];
	}

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_slide_transition_effect]' , array(
		'active_callback'	=> 'catchresponsive_is_slider_active',
		'choices'  	=> $choices,
		'label'		=> __( 'Transition Effect', 'catch-responsive-pro' ),
		'priority'	=> '2',
		'section'  	=> 'catchresponsive_featured_slider',
		'settings' 	=> 'catchresponsive_theme_options[featured_slide_transition_effect]',
		'type'	  	=> 'select',
		)
	);

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_slide_transition_delay]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slide_transition_delay'],
		'sanitize_callback'	=> 'catchresponsive_sanitize_number_range',
	) );

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_slide_transition_delay]' , array(
		'active_callback'	=> 'catchresponsive_is_slider_active',
		'description'	=> __( 'seconds(s)', 'catch-responsive-pro' ),
		'input_attrs' => array(
            'min'   => 1,
            'style' => 'width: 60px;'
		),
    	'label'    		=> __( 'Transition Delay', 'catch-responsive-pro' ),
		'priority'		=> '2.1.1',
		'section'  		=> 'catchresponsive_featured_slider',
		'settings' 		=> 'catchresponsive_theme_options[featured_slide_transition_delay]',
		'type'	   		=> 'number',
		)
	);

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_slide_transition_length]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slide_transition_length'],
		'sanitize_callback'	=> 'catchresponsive_sanitize_number_range',
	) );

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_slide_transition_length]' , array(
		'active_callback'	=> 'catchresponsive_is_slider_active',
		'description'	=> __( 'seconds(s)', 'catch-responsive-pro' ),
		'input_attrs' => array(
            'min'   => 1,
            'style' => 'width: 60px;'
		),
    	'label'    		=> __( 'Transition Length', 'catch-responsive-pro' ),
		'priority'		=> '2.1.2.1',
		'section'  		=> 'catchresponsive_featured_slider',
		'settings' 		=> 'catchresponsive_theme_options[featured_slide_transition_length]',
		'type'	   		=> 'number',
		)
	);

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_slide_loop]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slide_loop'],
		'sanitize_callback'	=> 'catchresponsive_sanitize_number_range',
	) );

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_slide_loop]' , array(
		'active_callback'	=> 'catchresponsive_is_slider_active',
		'description'	=> __( 'The number of times an auto-advancing slideshow should loop before terminating. If the value is less than 1 then the slideshow will loop continuously. Set to 1 to loop once, etc.', 'catch-responsive-pro' ),
		'input_attrs' => array(
            'min'   => 0,
            'style' => 'width: 60px;'
		),
    	'label'    		=> __( 'Loop', 'catch-responsive-pro' ),
		'priority'		=> '2.1.2',
		'section'  		=> 'catchresponsive_featured_slider',
		'settings' 		=> 'catchresponsive_theme_options[featured_slide_loop]',
		'type'	   		=> 'number',
		)
	);

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_slider_image_loader]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slider_image_loader'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$featured_slider_image_loader_options = catchresponsive_featured_slider_image_loader();
	$choices = array();
	foreach ( $featured_slider_image_loader_options as $featured_slider_image_loader_option ) {
		$choices[$featured_slider_image_loader_option['value']] = $featured_slider_image_loader_option['label'];
	}

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_slider_image_loader]', array(
		'active_callback'	=> 'catchresponsive_is_slider_active',
		'description'	=> __( 'True: Fixes the height overlap issue. Slideshow will start as soon as two slider are available. Slide may display in random, as image is fetch.<br>Wait: Fixes the height overlap issue.<br> Slideshow will start only after all images are available.', 'catch-responsive-pro' ),
		'choices'   => $choices,
		'label'    	=> __( 'Image Loader', 'catch-responsive-pro' ),
		'priority'	=> '2.1.3',
		'section'  	=> 'catchresponsive_featured_slider',
		'settings' 	=> 'catchresponsive_theme_options[featured_slider_image_loader]',
		'type'    	=> 'select',
	) );

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_slider_type]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slider_type'],
		'sanitize_callback'	=> 'sanitize_key',
	) );

	$featured_slider_types = catchresponsive_featured_slider_types();
	$choices = array();
	foreach ( $featured_slider_types as $featured_slider_type ) {
		$choices[$featured_slider_type['value']] = $featured_slider_type['label'];
	}

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_slider_type]', array(
		'active_callback'	=> 'catchresponsive_is_slider_active',
		'choices'  	=> $choices,
		'label'    	=> __( 'Select Slider Type', 'catch-responsive-pro' ),
		'priority'	=> '2.1.3',
		'section'  	=> 'catchresponsive_featured_slider',
		'settings' 	=> 'catchresponsive_theme_options[featured_slider_type]',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_slide_number]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slide_number'],
		'sanitize_callback'	=> 'catchresponsive_sanitize_number_range',
	) );

	$wp_customize->add_control( 'catchresponsive_theme_options[featured_slide_number]' , array(
		'active_callback'	=> 'catchresponsive_is_demo_slider_inactive',
		'description'	=> __( 'Save and refresh the page if No. of Slides is changed (Max no of slides is 20)', 'catch-responsive-pro' ),
		'input_attrs' 	=> array(
            'style' => 'width: 45px;',
            'min'   => 0,
            'max'   => 20,
            'step'  => 1,
        	),
		'label'    		=> __( 'No of Slides', 'catch-responsive-pro' ),
		'priority'		=> '2.1.4',
		'section'  		=> 'catchresponsive_featured_slider',
		'settings' 		=> 'catchresponsive_theme_options[featured_slide_number]',
		'type'	   		=> 'number',
		)
	);

	$wp_customize->add_setting( 'catchresponsive_theme_options[exclude_slider_post]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['exclude_slider_post'],
		'sanitize_callback'	=> 'catchresponsive_sanitize_checkbox',
	) );

	$wp_customize->add_control(  'catchresponsive_theme_options[exclude_slider_post]', array(
		'active_callback'	=> 'catchresponsive_is_post_slider_active',
		'label'		=> __( 'Check to exclude Slider post from Homepage posts', 'catch-responsive-pro' ),
		'priority'	=> '2.1.4.1',
		'section'   => 'catchresponsive_featured_slider',
		'settings'  => 'catchresponsive_theme_options[exclude_slider_post]',
		'type'		=> 'checkbox',
	) );

	$wp_customize->add_setting( 'catchresponsive_theme_options[featured_slider_select_category]', array(
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'catchresponsive_sanitize_category_list',
	) );

	$wp_customize->add_control( new catchresponsive_Customize_Dropdown_Categories_Control( $wp_customize, 'catchresponsive_featured_slider_select_category', array(
        'active_callback'	=> 'catchresponsive_is_category_slider_active',
        'label'   	=> __('Select Categories', 'catch-responsive-pro' ),
        'name' 		=> 'catchresponsive_theme_options[featured_slider_select_category]',
		'priority'	=> '10',
        'section'  	=> 'catchresponsive_featured_slider',
        'settings' 	=> 'catchresponsive_theme_options[featured_slider_select_category]',
        'type'     	=> 'dropdown-categories',
    ) ) );

    //loop for featured post sliders
	$priority	=	'11';
	for ( $i=1; $i <=  $options['featured_slide_number'] ; $i++ ) {
		$wp_customize->add_setting( 'catchresponsive_theme_options[featured_slider_post_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'catchresponsive_sanitize_page',
		) );

		$wp_customize->add_control( 'catchresponsive_theme_options[featured_slider_post_'. $i .']', array(
			'active_callback'	=> 'catchresponsive_is_post_slider_active',
			'input_attrs' => array(
        		'style' => 'width: 80px;'
    		),
			'label'    	=> __( 'Featured Post', 'catch-responsive-pro' ) . ' # ' . $i ,
			'priority'	=>  '3' . $i,
			'section'  	=> 'catchresponsive_featured_slider',
			'settings' 	=> 'catchresponsive_theme_options[featured_slider_post_'. $i .']',
			'type'	   	=> 'text',
			)
		);

		$wp_customize->add_setting( 'catchresponsive_theme_options[featured_slider_page_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'catchresponsive_sanitize_page',
		) );

		$wp_customize->add_control( 'catchresponsive_theme_options[featured_slider_page_'. $i .']', array(
			'active_callback'	=> 'catchresponsive_is_page_slider_active',
			'label'    	=> __( 'Featured Page', 'catch-responsive-pro' ) . ' # ' . $i ,
			'priority'	=> '4' . $i,
			'section'  	=> 'catchresponsive_featured_slider',
			'settings' 	=> 'catchresponsive_theme_options[featured_slider_page_'. $i .']',
			'type'	   	=> 'dropdown-pages',
		) );


		if ( $i > 9 ) // use this condition to make sure 10 comes after 9 priority wise
			$priority++;

		$wp_customize->add_setting( 'catchresponsive_theme_options[featured_slider_note_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field',
		) );

		$wp_customize->add_control( new catchresponsive_Note_Control( $wp_customize, 'catchresponsive_theme_options[featured_slider_note_'. $i .']', array(
	        'active_callback'	=> 'catchresponsive_is_image_slider_active',
	        'label'		=> __( 'Featured Slide #', 'catch-responsive-pro' ) . $i,
			'priority'	=> $priority . '.' . $i,
	        'section'  	=> 'catchresponsive_featured_slider',
	        'settings'	=> 'catchresponsive_theme_options[featured_slider_note_'. $i .']',
	        'type'     	=> 'description',
   		) ) );

		$wp_customize->add_setting( 'catchresponsive_theme_options[featured_slider_image_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'catchresponsive_sanitize_image',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'catchresponsive_theme_options[featured_slider_image_'. $i .']' , array(
	        'active_callback'	=> 'catchresponsive_is_image_slider_active',
			'label'		=> __( 'Image', 'catch-responsive-pro' ),
			'priority'	=> $priority . '.' . $i .$i,
			'section'   => 'catchresponsive_featured_slider',
	        'settings'  => 'catchresponsive_theme_options[featured_slider_image_'. $i .']',
		) ) );

		$wp_customize->add_setting( 'catchresponsive_theme_options[featured_link_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'esc_url_raw',
		) );

		$wp_customize->add_control(  'catchresponsive_theme_options[featured_link_'. $i .']', array(
	        'active_callback'	=> 'catchresponsive_is_image_slider_active',
			'label'		=> __( 'Link', 'catch-responsive-pro' ),
	        'priority'	=> $priority . '.' .$i . $i  . $i,
			'section'   => 'catchresponsive_featured_slider',
	        'settings'  => 'catchresponsive_theme_options[featured_link_'. $i .']',
		) );

		$wp_customize->add_setting( 'catchresponsive_theme_options[featured_target_'. $i .']', array(
	        'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'catchresponsive_sanitize_checkbox',
		) );

		$wp_customize->add_control(  'catchresponsive_theme_options[featured_target_'. $i .']', array(
	        'active_callback'	=> 'catchresponsive_is_image_slider_active',
			'label'		=> __( 'Check to Open Link in New Window/Tab', 'catch-responsive-pro' ),
	        'priority'	=> $priority . '.' .$i  .$i  . $i . $i,
			'section'   => 'catchresponsive_featured_slider',
	        'settings'  => 'catchresponsive_theme_options[featured_target_'. $i .']',
			'type'		=> 'checkbox',
	    ) );

	    $wp_customize->add_setting( 'catchresponsive_theme_options[featured_title_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field',
		) );

		$wp_customize->add_control(  'catchresponsive_theme_options[featured_title_'. $i .']', array(
	        'active_callback'	=> 'catchresponsive_is_image_slider_active',
			'label'		=> __( 'Title', 'catch-responsive-pro' ),
	        'priority'	=> $priority . '.' .$i .  $i.  $i .$i . $i,
			'section'   => 'catchresponsive_featured_slider',
	        'settings'  => 'catchresponsive_theme_options[featured_title_'. $i .']',
			'type'		=> 'text',
	    ) );

	    $wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_kses_post', //Only allow html tags allowed in posts
		) );

		$wp_customize->add_control( 'catchresponsive_theme_options[featured_content_'. $i .']', array(
	        'active_callback'	=> 'catchresponsive_is_image_slider_active',
			'label'		=> __( 'Content', 'catch-responsive-pro' ),
	        'priority'	=> $priority . '.' . $i . $i .  $i . $i . $i . $i,
			'section'   => 'catchresponsive_featured_slider',
	        'settings'  => 'catchresponsive_theme_options[featured_content_'. $i .']',
			'type'		=> 'textarea',
	    ) );
	}
// Featured Slider End