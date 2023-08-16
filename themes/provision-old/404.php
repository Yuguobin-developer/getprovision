<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

<div class="wrapper">
	<section class="error-404 not-found">
		<div class="page-content">
			<p>
				<?php _e( 'It looks like you may have taken a wrong turn', 'theme_textdomain' ); ?><br/>
				<?php _e( 'Don\'t worry... it happens to the best of us.', 'theme_textdomain' ); ?>
			</p>
			<p>
				<?php _e( 'Here\'s a little map that might help you get back on track:', 'theme_textdomain' ); ?>
			</p>
			<div class="error">
				<?php wp_nav_menu( array( 'theme_location' => 'main','fallback_cb'=> 'fallbackmenu' ) ); ?>
			</div>
			<div class="clear"></div>
			<p>
				<?php _e( 'Or you can look for your way here:', 'theme_textdomain' ); ?>
			</p>
			<?php get_search_form(); ?>
		</div><!-- .page-content -->
	</section><!-- .error-404 -->
</div>

<?php
get_footer();
