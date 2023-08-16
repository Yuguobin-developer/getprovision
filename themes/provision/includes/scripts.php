<?php
/**
 * Setup function for the project
 *
 * @link https://developer.wordpress.org/themes/basics/including-css-javascript/
 *
 * @package Redica
 * @since 1.0.0
 */


/**
 * Theme assets
 *
 * Define variable to store asset directory folder in it.
 *
 * That can be used afterward to call stylesheet / scripts etc
 */

// Time format for the_time()
DEFINE( 'tFormat', 'M d, Y' );

// Define assets folder
DEFINE( 'assetDir', get_template_directory_uri() . '/assets' );

// Define bundle version
DEFINE( 'ASSET_VERSION', filemtime( get_template_directory() . '/assets/css/bundle.min.css' ) + filemtime( get_template_directory() . '/assets/js/bundle.min.js' ) + filemtime( get_template_directory() . '/assets/js/custom.js')+ filemtime( get_template_directory() . '/assets/css/custom.css') );


/**
 * Theme assets
 *
 * Enqueue and Dequeue required files
 */
function assets() {

	$google_maps_api = get_field('map_api_key', 'option');
	
	// Enqueue theme styles
	wp_enqueue_style( 'theme-style', assetDir . '/css/bundle.min.css?v=' . ASSET_VERSION, false, null );
        
        // Enqueue theme styles
	//wp_enqueue_style( 'theme-custom-style', assetDir . '/css/custom.css?v=' . ASSET_VERSION, false, null );

	// Elminiate the emoji script
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	// Enqueue comments reply script on single post pages
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( ! is_admin() && ! is_user_logged_in() ) {

		// Deregister dashicons on frontend
		wp_deregister_style( 'dashicons' );
	}

	// Deregister jQuery
	wp_deregister_script( 'jquery' );

	// Dequeue files
	wp_dequeue_script( 'jquery' );
        
	// Register project jQuery file
	wp_register_script( 'jquery', assetDir . '/js/jquery.min.js', array(), null, false );

	// Enqueue project jQuery file
	wp_enqueue_script( 'jquery' );

	// Register project scripts
        if(is_page_template( 'templates/template-step-one.php' )){
            wp_register_script( 'google-map-script', 'https://maps.googleapis.com/maps/api/js?key='.$google_maps_api.'&libraries=places&callback=initAutocomplete', array( 'jquery' ), null, true );
        }else{
           wp_register_script( 'google-map-script', 'https://maps.googleapis.com/maps/api/js?key='.$google_maps_api, array( 'jquery' ), null, true ); 
        }
	// Register project scripts
	//wp_register_script( 'theme-scripts', assetDir . '/js/bundle.js?v=' . ASSET_VERSION, array( 'jquery' ), null, true );
	wp_register_script('theme-scripts', assetDir . '/js/bundle.js', ['jquery'], null, true);

	// Localize
	wp_localize_script(
		'theme-scripts',
		'localVars',
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		)
	);

	// Enqueue project scripts

        
	wp_enqueue_script( 'theme-scripts' );
        wp_enqueue_script( 'google-map-script' );
       // wp_register_script( 'custom-script', assetDir . '/js/custom.js?v=' . ASSET_VERSION, array('theme-scripts'), null, false );
        //wp_enqueue_script( 'custom-script' );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 11 );

function dequeue_assets(){
    if(is_home() || is_front_page()){
        wp_dequeue_script( 'gravity-forms-tooltip' );
        wp_dequeue_style( 'section_block-cgb-style-css' );
        wp_dequeue_style( 'gravity-forms-tooltip' );
    }
    if(is_front_page()){
        wp_dequeue_script( 'glide_scripts' );
    }
    
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\dequeue_assets', 99 );
        
        
function crunchify_print_scripts_styles() {
    
    $result = [];
    $result['scripts'] = [];
    $result['styles'] = [];

    // Print all loaded Scripts
    global $wp_scripts;
    foreach( $wp_scripts->queue as $script ) :
       $result['scripts'][$script] =  $wp_scripts->registered[$script]->src . ";";
    endforeach;

    // Print all loaded Styles (CSS)
    global $wp_styles;
    foreach( $wp_styles->queue as $style ) :
       $result['styles'][$style] =  $wp_styles->registered[$style]->src . ";";
    endforeach;

    return $result;
}

