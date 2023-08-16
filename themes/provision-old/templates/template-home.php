<?php
/**
 * Template Name: Home
 * Template Post Type: page
 *
 * This template is for displaying Home page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Redica
 * @since 1.0.0
 */

// Include header
get_header();

// Global variables
global $option_fields;
global $pID;
global $fields;

?>

<?php
while ( have_posts() ) :
	the_post();

	// Include specific template for the content.
	get_template_part( 'partials/content', 'page' );
endwhile;
?>

<div class="clear"></div>

<?php
get_footer();
