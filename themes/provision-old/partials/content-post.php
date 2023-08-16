<?php
/**
 * Template part for displaying single post
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
$pID        = get_the_ID();
$fields     = get_fields( $pID );
$author_id  = get_the_author_meta( 'ID' );
$categories = get_the_category();

// Author Name
$author_name = null;
if ( get_the_author_meta( 'first_name', $author_id ) || get_the_author_meta( 'last_name', $author_id ) ) {
	$author_name = get_the_author_meta( 'first_name', $author_id ) . ' ' . get_the_author_meta( 'last_name', $author_id );
} elseif ( get_the_author_meta( 'display_name', $author_id ) ) {
	$author_name = get_the_author_meta( 'display_name', $author_id );
}

// Category Icon
$categories = get_the_category();
$category = $categories[0];
$cat_icon = get_field('pwrvsn_cat_select_icon', $category );

// Post Intro Text
$pwrvsn_sngl_post_introtext = $fields['pwrvsn_sngl_post_introtext'];

// Author Image
$get_author_id = get_the_author_meta('ID');
$get_author_gravatar = get_avatar_url($get_author_id, array('size' => 450));
$post_thumb = get_the_post_thumbnail_url( $pID, 'full' );

?>



	<section id="post-<?php the_ID(); ?>" <?php post_class( 'page-content' ); ?>>

		<div class="single-post-masthead">
			<div class="single-post-cat" style="background-image: url(<?php echo $cat_icon; ?>);"><?php echo $category->name; ?></div>
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="single-post-content">
		<?php // Check if the post has a Post Thumbnail assigned to it.
			if ( has_post_thumbnail() ) { ?>
			<div class="feature-image" style="background-image: url(<?php echo $post_thumb; ?>);"></div>
		<?php } ?>
			<div class="sidebar">
				<div class="author-detail">
					<div class="author-image" style="background-image: url(<?php echo $get_author_gravatar; ?>);"></div>
					<div class="author-meta">
						<div class="author-name"><?php echo $author_name; ?></div>
						<div class="psot-detail"> Published on <span><?php the_date(); ?></span></div>
					</div>
				</div>
				<div class="social-links">
					<ul>
						<li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span class="social-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook-f.svg" alt=""></span></a></li>
						<li><a href="http://twitter.com/intent/tweet?text=Currently reading <?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" rel="noopener noreferrer" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span class="social-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitter.svg" alt=""></span></a></li>
						<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>"   onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span class="social-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/linked-in.svg" alt=""></span></a></li>
					</ul>
				</div>
			</div>
			<?php if($pwrvsn_sngl_post_introtext){ ?>
			<div class="page-intro">
				<p><?php echo $pwrvsn_sngl_post_introtext; ?></p>
			</div>
			<?php } ?>
		</div>
		<div class="page-content">
			<div class="blog-detail-container">
				<?php the_content(); ?>

			</div>
			<div class="xxl-2"></div>
		</div>

		<div style="display:none">
			<?php
			the_tags();
				// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			the_posts_pagination();
			?>
		</div>

	</section>
