<?php
/**
 * Block Name: Team Members
 *
 * The template for displaying the custom gutenberg block named Team Members.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package Redica
 * @since 1.0.0
 */

// create align class ("alignwide") from block setting ("wide").
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Making the unique ID for the block.
$id = 'block-' . $block['id'];

// Meta fields related to current block.
$block_fields = get_fields( $block['id'] );
$blok_tm_headline = $block_fields['blok_tm_headline'];

global $post;
global $member_counter;
$lp_select_posts = array();
$lp_select_posts = $block_fields['blok_tm_team_members'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-team">
	<div class="team-member-container">
		<?php if($blok_tm_headline){ ?>
			<h2><?php echo $blok_tm_headline; ?></h2>
		<?php } ?>
		<?php if ( $lp_select_posts ) :
		        if (is_null($member_counter)) {
			    $member_counter = 0;
			}
			?>
		<div class="team-members">
			<?php foreach ( $lp_select_posts as $lp_posts ) :
					$member_counter++;
					$post = $lp_posts;
					setup_postdata( $post );
					$pID         = $post->ID;
					$post_fields = get_fields( $pID );
					$provsn_sngl_tm_title  = $post_fields['provsn_sngl_tm_title'];
					$provsn_sngl_tm_bio  = $post_fields['provsn_sngl_tm_bio'];
					$provsn_sngl_tm_linkedin_link  = $post_fields['provsn_sngl_tm_linkedin_link'];
					$src         = wp_get_attachment_image_src( get_post_thumbnail_id( $pID ), 'full', false );
					if ( ! $src ) {
						$src = get_template_directory_uri() . '/assets/img/default-member-img.png';
					} else {
						$src = $src[0];
					}
			?>
			<div class="single-member">
				<div class="inner-content-member">
					<div class="member-image" style="background-image: url(<?php echo $src; ?>);"></div>
					<!-- /.member-image -->
					<a href="#test-popup-<?php echo $member_counter; ?>" class="open-popup-link">
						<div class="member-info">
							<div class="member-detail-per">
								<h4><?php the_title(); ?></h4>
								<h6><?php echo $provsn_sngl_tm_title; ?></h6>
							</div>
							<!-- /.member-title -->
							<div class="member-more-info">
								<span class="button-arrow">See Bio</span>
							</div>
							<!-- /.member-more-info -->
						</div>
						<!-- /.member-info -->
					</a>
					<div class="member-detail mfp-hide" id="test-popup-<?php echo $member_counter; ?>">
						<h2><?php the_title(); ?></h2>
						<h5><?php echo $provsn_sngl_tm_title; ?></h5>
						<?php if($provsn_sngl_tm_bio){
							echo $provsn_sngl_tm_bio;
						} ?>
						<?php if($provsn_sngl_tm_linkedin_link){ ?>
						<div class="social-links">
							<ul>
								<li><a href="<?php echo $provsn_sngl_tm_linkedin_link; ?>" target="_blank" class="valign-wrapper"><span class="social-icon"><img
												src="<?php echo get_template_directory_uri(  ); ?>/assets/img/linked-in.svg" alt=""></span><span>LinkedIn</span></a>
								</li>
							</ul>
						</div>
						<?php } ?>
					</div>
				</div>
				<!-- /.inner-content-member -->
			</div>
			<!-- /.single-member -->
			<?php endforeach; ?>
			<div class="clear"></div>
			<!-- /.clear -->
		</div>
		<!-- /.team-members -->
		<?php endif; wp_reset_query(); ?>
	</div>
	<!-- /.team-member-container -->
</div>
