<?php
add_action( 'wp_enqueue_scripts', 'glide_script_and_styles', 1 );

function glide_script_and_styles() {
	global $wp_query;


	// wp_enqueue_style( 'parent_style', get_template_directory_uri() . '/style.css' );
	// wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_uri(), array('parent_style'), time() );


	// register our main script but do not enqueue it yet
	wp_register_script( 'glide_scripts', get_stylesheet_directory_uri() . '/assets/loadmore.js', array('jquery'), time() );

	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'glide_scripts', 'glide_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => $wp_query->query_vars['paged'] ? $wp_query->query_vars['paged'] : 1,
		'max_page' => $wp_query->max_num_pages
	) );

 	wp_enqueue_script( 'glide_scripts' );
}


add_action('wp_ajax_loadmore', 'glide_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'glide_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

function glide_loadmore_ajax_handler(){

	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';

	// it is always better to use WP_Query but not here
	query_posts( $args );

	if( have_posts() ) :

		// run the loop
		while( have_posts() ): the_post();

			get_template_part( 'partials/content', 'archive-blog-post' );

		endwhile;

	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}



add_action('wp_ajax_mishafilter', 'glide_filter_function');
add_action('wp_ajax_nopriv_mishafilter', 'glide_filter_function');

function glide_filter_function(){

	// example: date-ASC
	$order = explode( '-', $_POST['glide_order_by'] );

	$args = array(
		'posts_per_page' => $_POST['glide_posts_per_page'], // -1 to show all posts
		'orderby' => $order[0], // example: date
		'order'	=> $order[1] // example: ASC
	);


	query_posts( $args );

	global $wp_query;

	if( have_posts() ) :

 		ob_start(); // start buffering because we do not need to print the posts now

		while( have_posts() ): the_post();

			get_template_part( 'partials/content', 'archive-blog-post' );

		endwhile;

 		$content = ob_get_contents(); // we pass the posts to variable
   		ob_end_clean(); // clear the buffer

	endif;

	// no wp_reset_query() required

 	echo json_encode( array(
		'posts' => serialize( $wp_query->query_vars ),
		'max_page' => $wp_query->max_num_pages,
		'found_posts' => $wp_query->found_posts,
		'content' => $content
	) );

	die();
}
