<?php
/**
 * The template for displaying Social Icons
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


if ( ! function_exists( 'catchresponsive_get_social_icons' ) ) :
/**
 * Generate social icons.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_get_social_icons(){
	if ( ( !$output = get_transient( 'catchresponsive_social_icons' ) ) ) {
		$output	= '';

		$options 	= catchresponsive_get_theme_options(); // Get options

		//Pre defined Social Icons Link Start
		$pre_def_social_icons 	=	catchresponsive_get_social_icons_list();

		foreach ( $pre_def_social_icons as $key => $item ) {
			if ( isset( $options[ $key ] ) && '' != $options[ $key ] ) {
				$value = $options[ $key ];

				if ( 'email_link' == $key  ) {
					$output .= '<a class="genericon_parent genericon genericon-'. sanitize_key( $item['genericon_class'] ) .'" target="_blank" title="'. esc_attr__( 'Email', 'catch-responsive-pro') . '" href="mailto:'. antispambot( sanitize_email( $value ) ) .'"><span class="screen-reader-text">'. __( 'Email', 'catch-responsive-pro') . '</span> </a>';
				}
				elseif ( 'skype_link' == $key  ) {
					$output .= '<a class="genericon_parent genericon genericon-'. sanitize_key( $item['genericon_class'] ) .'" target="_blank" title="'. esc_attr( $item['label'] ) . '" href="'. esc_attr( $value ) .'"><span class="screen-reader-text">'. esc_attr( $item['label'] ). '</span> </a>';
				}
				elseif ( 'phone_link' == $key || 'handset_link' == $key ) {
					$output .= '<a class="genericon_parent genericon genericon-'. sanitize_key( $item['genericon_class'] ) .'" target="_blank" title="'. esc_attr( $item['label'] ) . '" href="tel:' . preg_replace( '/\s+/', '', esc_attr( $value ) ) . '"><span class="screen-reader-text">'. esc_attr( $item['label'] ) . '</span> </a>';
				}
				else {
					$output .= '<a class="genericon_parent genericon genericon-'. sanitize_key( $item['genericon_class'] ) .'" target="_blank" title="'. esc_attr( $item['label'] ) .'" href="'. esc_url( $value ) .'"><span class="screen-reader-text">'. esc_attr( $item['label'] ) .'</span> </a>';
				}
			}
		}
		//Pre defined Social Icons Link End

		//Custom Social Icons Link Start
		for( $i = 1; $i <= $options['custom_social_icons'] ; $i++ ) {
			$has_hover 		= '';
			$image_hover 	= '';

			if ( ! empty( $options['custom_social_icon_image_'. $i] ) ) {
				$image = $options['custom_social_icon_image_'. $i];

				if ( ! empty( $options['custom_social_icon_image_hover_'. $i] ) ) {
					$image_hover = $options['custom_social_icon_image_hover_'. $i];
					$has_hover = " has-hover";
				}

				//Checking Link
				if ( ! empty( $options['custom_social_icon_link_'. $i] ) ) {
					$link = $options['custom_social_icon_link_'. $i];
				} else {
					$link = '#';
				}

				//Checking Title
				if ( !empty ( $options['custom_social_icon_title_'. $i]) ) {
					$title = $options['custom_social_icon_title_'. $i];
				} else {
					$title = '';
				}

				//Custom Social Icons
				$output .= '<a id="custom-icon-'. $i .'" class="custom-icon' . $has_hover . '" target="_blank" title="' . esc_attr( $title ) . '" href="' . esc_url( $link ) . '">
					<img  alt="' . esc_attr( $title ) . '" class ="icon-static" src="' . esc_url( $image ) . '" />';

					if (isset ( $image_hover ) && '' != $image_hover ) {
					$output .= '<img  alt="' . esc_attr( $title ) . '" class ="icon-hover" src="' . esc_url( $image_hover ) . '" />';
				}
				$output .= '</a>';
			}
		}
		//Custom Social Icons Link End
		set_transient( 'catchresponsive_social_icons', $output, 86940 );
	}

	return $output;
} // catchresponsive_get_social_icons
endif;