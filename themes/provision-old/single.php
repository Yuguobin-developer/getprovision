<?php
/**
 * The template for displaying all posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Sample Theme
 * @since 1.0.0
 *
 */

// Include header
get_header();

// Global variables
global $option_fields;
global $pID;
global $fields;

?>

	<div class="s-section single-post-container">
		<div class="wrapper">
			<?php while ( have_posts() ) : the_post();

				//Include specific template for the content.
				get_template_part( 'partials/content', get_post_type() );
			endwhile; ?>

			<div class="clear"></div>
		</div>
	</div>

<?php get_footer();
