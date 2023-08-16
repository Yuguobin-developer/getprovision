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
global $option_fields;
global $pID;
global $fields;

$pID    = get_the_ID();
$fields = get_fields( $pID );

if ( has_post_thumbnail() ) {
	$post_img_src = get_the_post_thumbnail_url( $pID, $size = 'full' );
} else {
	$post_img_src = get_template_directory_uri() . '/assets/img/default-post-image.jpg';
}

$categories = get_the_terms( $post->ID, 'category' );

?>

	<div class="single-posting">
		<a href="<?php the_permalink(  ); ?>">
			<div class="post-image" style="background-image: url(<?php echo $post_img_src; ?>);"></div>
			<h6 class="sub-heading">
				<?php if($categories){
					foreach ($categories as $cat ) {
						echo $cat->name;
					break;
					}
				}
				?>
			</h6>
			<h5><?php the_title(); ?></h5>
		</a>
	</div>
