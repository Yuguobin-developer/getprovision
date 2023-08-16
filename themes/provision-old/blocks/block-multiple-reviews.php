<?php
/**
 * Block Name: Multiple Reviews
 *
 * The template for displaying the custom gutenberg block named Multiple Reviews.
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

global $post;
$lp_select_posts = array();
$lp_select_posts = $block_fields['blok_mr_reviews'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-multiple-reviews">
	<section class="full-width-mobile">
		<div class="wrapper">
			<?php if ( $lp_select_posts ) : ?>
			<div class="multiple-reviews-container owl-carousel owl-theme">
				<?php
					foreach ( $lp_select_posts as $lp_posts ) :
						$post = $lp_posts;
						setup_postdata( $post );
						$pID         = $post->ID;
						$post_fields = get_fields( $pID );
						$pwrvsn_sngl_rv_rating  = $post_fields['pwrvsn_sngl_rv_rating'];
						$pwrvsn_sngl_rv_author  = $post_fields['pwrvsn_sngl_rv_author'];
						$numerator = 0;
						$whole_number = 0;
						$float        = $pwrvsn_sngl_rv_rating;
						$parts        = explode('.', (string)$float);
						$whole_number = $parts[0];
						$numerator    = trim($parts[1], '0');
						$denominator  = pow(10, strlen(rtrim($parts[1], '0')));
						$src         = wp_get_attachment_image_src( get_post_thumbnail_id( $pID ), 'full', false );
						if ( ! $src ) {
							$src = get_template_directory_uri() . '/assets/img/default-project-image.jpg';
						}
				?>
				<div class="single-review">
					<div class="item">
							<?php if($pwrvsn_sngl_rv_rating){ ?>
							<div class="rating-star">
								<?php for ($i=0; $i < $whole_number; $i++) { ?>
									<span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/star rating.svg" alt="Icon Star"></span>
								<?php } ?>

								<?php if($numerator){ ?>
									<span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/star-rating-half.png" alt="Icon Star"></span>
								<?php } ?>
							</div>
							<!-- /.rating-star -->
							<?php } ?>
							<div class="review-title">
								<h3><?php the_title(); ?></h3>
							</div>
							<!-- /.review-title -->
							<div class="review-desc">
								<p>
									<?php echo get_the_content(); ?>
								</p>
								<div class="testimonial-author"> <?php echo $pwrvsn_sngl_rv_author; ?> </div>
							</div>
							<!-- /.review-desc -->
					</div>
				</div>
				<!-- /.single-review -->
				<?php endforeach; ?>
			</div>
			<!-- /.multiple-reviews-container -->
			<?php endif; wp_reset_query(); ?>
		</div>
		<!-- /.wrapper -->
	</section>
</div>
