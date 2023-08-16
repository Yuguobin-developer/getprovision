<?php
/**
 * Template part for displaying posts in an archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Redica
 * @since 1.0.0
 */

// Global variables

$pID    = get_the_ID();
$fields = get_fields( $pID );

if ( has_post_thumbnail() ) {
	$post_img_src = get_the_post_thumbnail_url( $pID, $size = 'testimonial-thumb' );
} else {
	$post_img_src = get_template_directory_uri() . '/assets/img/default-block-image.png';
}



?>

<div id="post-<?php the_ID(); ?>" class="single-blog-post glide-block">
	<div class="img-along-text valign-wrapper">
		<div class="iat-image lines-on-images">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo $post_img_src; ?>" alt="<?php the_title(); ?>" />
			</a>
		</div>
		<div class="iat-content-area">
			<a href="<?php the_permalink(); ?>">
				<h2><?php the_title(); ?></h2>
			</a>
			<div class="iat-content medium-text">
				<p>
					<?php echo custom_excerpt( 150 ); ?>
				</p>
			</div>
			<a href="<?php echo get_the_permalink(); ?>" class="button">Learn More</a>
		</div>
		<div class="clear"></div>
	</div>
</div>
