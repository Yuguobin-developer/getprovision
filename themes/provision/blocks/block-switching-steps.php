<?php
/**
 * Block Name: Switching Steps
 *
 * The template for displaying the custom gutenberg block named Switching Steps.
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
$blok_ss_headline = $block_fields['blok_ss_headline'];
$blok_ss_text = $block_fields['blok_ss_text'];
$blok_ss_steps = $block_fields['blok_ss_steps'];
$blok_ss_button = $block_fields['blok_ss_button'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-switching-steps">

	<section class="s-section">
		<div class="featured-list-container design-two">
			<div class="wrapper">
				<div class="xxl-2"></div>
				<div class="inner-featured-content">
					<div class="section-heading center-align">
						<?php if($blok_ss_headline){ ?>
							<h2><?php echo $blok_ss_headline; ?></h2>
						<?php } ?>
						<?php if($blok_ss_text){
							echo $blok_ss_text;
						} ?>
					</div>
					<!-- /.section-heading -->
					<?php if($blok_ss_steps){
						$counter = 0; ?>
					<div class="feautred-list-col">
						<?php foreach ($blok_ss_steps as $step ) {
							$counter++;
							?>
						<div class="featured-widget center-align">
							<div class="featured-count">
								<span><?php echo $counter; ?></span>
							</div>
							<!-- /.featured-image -->
							<div class="featured-title">
								<h5><?php echo $step['title']; ?></h5>
							</div>
							<!-- /.featured-widget-title -->
						</div>
						<!-- /.featured-widget -->
						<?php } ?>
						<div class="clear"></div>
					</div>
					<!-- /.featured-widget -->
					<?php } ?>
					<?php if( $blok_ss_button['url'] ) : ?>
					<div class="center-align">
						<?php echo build_acf_button( $blok_ss_button, 'button red-button' ); ?>
					</div>
					<?php	endif;	?>


				</div>
				<!-- /.inner-featured-content -->
				<div class="xxl-2"></div>
			</div>
			<!--/. wrapper -->
		</div>
		<!-- /.featured-list-container  -->
		<div class="xxl-3"></div>
		<!-- /.xxl-3 -->
	</section>

</div>
