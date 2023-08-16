<?php
/**
 * Extra functions for the project
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Redica
 * @since 1.0.0
 */

/**
 * Custom logo for WordPress login screen
 *
 * This function replaces the default WordPress logo on the login with website logo.
 */
function custom_login_logo() {
	echo '
		<style type="text/css">
			.login h1 a {
				background-image: url(' . get_stylesheet_directory_uri() . '/assets/img/logo.svg) !important;
				background-position: center center;
				color:rgba(0, 0, 0, 0);
				background-size: contain;
				height: 80px;
				width: 65%;
				outline: 0;
			}
		</style>
	';
}

add_action( 'login_head', 'custom_login_logo' );

add_action( 'admin_head', 'z3_custom_css' );

function z3_custom_css() {
	echo '<style>
    .wp-block-glide-section-block{
		background-color: #f8f8f8 !important;
	}
  </style>';
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'theme_content_width', 640 );
}

add_action( 'after_setup_theme', 'theme_content_width', 0 );


/**
* Add custom class to gravity form submit button
*/
add_filter( 'gform_submit_button_3', 'custom_class_button', 10, 2 );
function custom_class_button( $button, $form ) {
	$dom = new DOMDocument();
	$dom->loadHTML( '<?xml encoding="utf-8" ?>' . $button );
	$input    = $dom->getElementsByTagName( 'input' )->item( 0 );
	$classes  = $input->getAttribute( 'class' );
	$classes .= ' newsletter-submit';
	$input->setAttribute( 'class', $classes );
	return $dom->saveHtml( $input );
}


/**
* Add custom class to gravity form text input
*/
add_filter( 'gform_field_css_class_3', 'custom_class_input', 10, 3 );
function custom_class_input( $classes, $field, $form ) {
	if ( $field->type == 'text' ) {
		$classes .= ' newsletter-input';
	}
	return $classes;
}

function add_my_favicon() {
	$favicon_path = get_template_directory_uri() . '/favicon.ico';
	echo '<link rel="shortcut icon" href="' . esc_url( $favicon_path ) . '" />';
}
add_action( 'admin_head', 'add_my_favicon' );


/*
 * commented as team confirmed that this is not required
 * 
add_action( 'gform_after_submission', 'set_post_content', 10, 2 );

function set_post_content( $entry, $form ) { ?>
<script>jQuery( document ).ready(function() {
    jQuery(".tmpltraq-before-submit-img").css("display", "none")
});
</script>	

<?php } 
 * 
 */
