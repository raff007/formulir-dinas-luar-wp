<?php

/**
 * @package BB Mobile Application
 * @subpackage bb-mobile-application
 * Setup the WordPress core custom header feature.
 *
 * @uses bb_mobile_application_header_style()
*/

function bb_mobile_application_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'bb_mobile_application_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1355,
		'height'                 => 110,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'bb_mobile_application_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'bb_mobile_application_custom_header_setup' );

if ( ! function_exists( 'bb_mobile_application_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see bb_mobile_application_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'bb_mobile_application_header_style' );
function bb_mobile_application_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$bb_mobile_application_custom_css = "
        .page-template-custom-front-page #header, #header {
			background-image:url('".esc_url(get_header_image())."') !important;
			background-position: center top;
			background-size:cover;
		}";
	   	wp_add_inline_style( 'bb-mobile-application-basic-style', $bb_mobile_application_custom_css );
	endif;
}
endif; // bb_mobile_application_header_style