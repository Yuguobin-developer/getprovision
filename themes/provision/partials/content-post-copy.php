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

$author_name = null;
if ( get_the_author_meta( 'first_name', $author_id ) || get_the_author_meta( 'last_name', $author_id ) ) {
	$author_name = get_the_author_meta( 'first_name', $author_id ) . ' ' . get_the_author_meta( 'last_name', $author_id );
} elseif ( get_the_author_meta( 'display_name', $author_id ) ) {
	$author_name = get_the_author_meta( 'display_name', $author_id );
}

if ( has_post_thumbnail() ) {
	$post_img_src = get_the_post_thumbnail_url( $pID, $size = 'full' );
} else {
	$post_img_src = get_template_directory_uri() . '/assets/img/default-post-image.jpg';
}

$pwrvsn_sngl_post_introtext = $fields['pwrvsn_sngl_post_introtext'];

?>



	<section id="post-<?php the_ID(); ?>" <?php post_class( 'page-content' ); ?>>

		<div class="single-post-masthead">
			<div class="single-post-cat" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/cat-leaf.svg);">Green Energy</div>
			<h1><?php the_title(); ?></h1>
		</div>

		<div class="sidebar">
			<div class="author-detail">
				<div class="author-image" style="background-image: url(<?php echo get_avatar_url( get_the_author_meta( 'ID' ), 32 ); ?>);"></div>
				<div class="author-name"><?php echo $author_name; ?></div>
			</div>
			<div class="psot-detail"> Published on <span><?php the_date(); ?></span></div>
			<div class="xl-3"></div>
			<div class="social-links">
				<ul>
					<li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span class="social-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook-f.svg" alt=""></span></a></li>
					<li><a href="http://twitter.com/intent/tweet?text=Currently reading <?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" rel="noopener noreferrer" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span class="social-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitter.svg" alt=""></span></a></li>
					<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>"   onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span class="social-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/linked-in.svg" alt=""></span></a></li>
				</ul>
			</div>
		</div>
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="feature-image">
			<?php the_post_thumbnail( 'full' ); ?>
		</div>
		<?php } ?>
		<div class="xxl-1"></div>
		<?php if($pwrvsn_sngl_post_introtext){ ?>
		<div class="page-intro">
			<p><?php echo $pwrvsn_sngl_post_introtext; ?></p>
		</div>
		<?php } ?>
		<div class="xl-1"></div>
		<div class="page-content">
			<h3>Heading Style H3 <span>Light</span></h3>
			<p>Leo quis lectus egestas semper vestibulum egestas nulla. Mauris nascetur elementum scelerisque enim. <strong>
					Strong text style </strong> mauris nisl amet, id eu. Nisi, nunc cursus <a href="#">text link style</a>,
				varius rhoncus. Mattis <a href="#">hover link style</a> arcu tortor. Imperdiet amet eu malesuada italics
				style, suscipit gravida sed risus. Eu tellus consectetur elementum quis nibh eros. Metus cursus volutpat nec
				dolor donec dictum vitae egestas.</p>
			<p>Next paragraph. Mattis fames quam donec fermentum. Suspendisse sit nibh turpis adipiscing. Feugiat sed euismod
				faucibus fringilla. Semper tempus ut ut id. Tellus, eleifend nibh cursus pulvinar. Lobortis quis sagittis
				varius egestas nunc. </p>
		</div>
		<div class="xl-2"></div>
		<div class="numbered-list">
			<h4>Numbered List:</h4>
			<ol>
				<li>Adipiscing sit sollicitudin magna mauris quis lectus. Mi sit ac id pellentesque.</li>
				<li>Quam consequat blandit at lectus nam convallis risus sagittis vehicula. </li>
				<li>Velit amet quis pellentesque tincidunt est. Nulla vivamus natoque mattis sit velit nunc bibendum odio</li>
				<li>Libero purus odio vestibulum eu arcu eu auctor et. Laoreet consectetur.</li>
			</ol>
		</div>
		<div class="xl-3"></div>
		<section class="s-section">
			<div class="wrapper">
				<blockquote>
					<p>"Quote boxed dolor sit amet, consectetur adipiscing elit, sed do eius mod tempor incididunt ut labore
						et dolore magna aliqua."</p>
					<div class="client-detail">
						<div class="client-image" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/client-image.png);"></div>
						<div class="client-name"> Avril Lavigne <span> - Dayton, OH</span>
						</div>
						<div class="clear"></div>
					</div>
				</blockquote>
			</div>
		</section>
		<div class="xl-3"></div>
		<div class="bullet-list">
			<h4>Bullet List:</h4>
			<ul>
				<li>Simple bullet list item</li>
				<li>Sagittis, sit adipiscing volutpat nulla. Sed luctus tellus a consequat</li>
				<li>Aliquet volutpat at gravida vel sit parturient massa</li>
			</ul>
		</div>
		<div class="checklist">
			<ul>
				<li>Tick bullet list item</li>
				<li>Id ultrices laoreet lectus ligula id pellentesque</li>
				<li>Viverra faucibus enim non nisl urna</li>
			</ul>
		</div>
		<div class="xl-2"></div>
		<h4>In-body image / Smaller Heading</h4>
		<p>In neque risus at purus tellus scelerisque accumsan. Quisque elementum leo ipsum auctor neque vestibulum nulla
			phasellus. Facilisis duis accumsan euismod libero. Volutpat magna vitae pellentesque id fermentum volutpat sapien
			tempor, euismod. Tristique sed sed ultrices curabitur. At molestie consequat urna feugiat ante aliquet facilisis.
		</p>
		<figure class="wp-caption alignnone"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/content-image.jpg" alt="Feature Image">
			<figcaption class="wp-caption-text">Image Caption </figcaption>
		</figure>
		<p>Eu egestas eu sed suspendisse condimentum aliquam senectus. Vitae at risus non justo sodales. Ultrices risus
			iaculis tortor nulla ligula convallis egestas in. Ullamcorper convallis purus proin vel. Fringilla et eget vel nec
			tempus, nulla ut urna nisi. Urna dictum ut interdum ac amet sed sit. Imperdiet turpis risus odio amet dui, enim
			nibh. Nisl sagittis, ut nunc integer viverra.</p>
		<div class="xxl-2"></div>

		<?php the_content(); ?>
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
