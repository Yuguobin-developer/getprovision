<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Sample Theme
 * @since 1.0.0
 */

// Include header.
get_header();

// Global variables.
global $option_fields;
global $pID;
global $fields;

?>

<section>
		<div class="wrapper">
			<div class="blog-post-container">
				<div id="glide_posts_wrap">

				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						// Include specific template for the content.
						get_template_part( 'partials/content', 'archive-blog-post' );
					endwhile;
					?>
					</div>
					<?php
						global $wp_query; // you can remove this line if everything works for you

						// don't display the button if there are not enough posts
						if (  $wp_query->max_num_pages > 1 ) : ?>
							<div class="load-more-btn">
								<a id="glide_loadmore" class="button">Load more</a>
							</div>
						<?php endif;
					?>
				<div class="clear"></div>
					<?php
					else :
						// If no content, include the "No posts found" template.
						get_template_part( 'partials/content', 'none' );
				endif;
					?>

		<div class="clear"></div>
		</div>
	</div>
	<div class="xxl-3"></div>
</section>

<?php
get_footer();
