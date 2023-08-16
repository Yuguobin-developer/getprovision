<?php
/**
 * Block Name: Features List
 *
 * The template for displaying the custom gutenberg block named Features List.
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
$blok_fl_headline = $block_fields['blok_fl_headline'];
$blok_fl_text = $block_fields['blok_fl_text'];
$blok_fl_features = $block_fields['blok_fl_features'];
$blok_fl_button = $block_fields['blok_fl_button'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-features-list">

	<section class="s-section">
		<div class="featured-list-container">
			<div class="wrapper">
				<div class="inner-featured-content">
					<div class="section-heading center-align">
						<?php if($blok_fl_headline){ ?>
							<h2><?php echo $blok_fl_headline; ?></h2>
						<?php } ?>
						<?php if($blok_fl_text){
							echo $blok_fl_text;
						} ?>
					</div>
					<!-- /.section-heading -->
					<?php if($blok_fl_features){ ?>
					<div class="feautred-list-col">
						<?php foreach ($blok_fl_features as $feature ) {
							$feature_icon = $feature['icon'];
							$feature_text = $feature['text'];
							?>
						<div class="featured-widget center-align">
							<div class="featured-image">
								<img src="<?php echo $feature_icon; ?>" alt="">
							</div>
							<!-- /.featured-image -->
							<div class="featured-title">
								<h5><?php echo $feature_text; ?></h5>
							</div>
							<!-- /.featured-widget-title -->
						</div>
						<!-- /.featured-widget -->
						<?php } ?>
						<div class="clear"></div>
					</div>
					<!-- /.featured-widget -->
					<?php } ?>
					<?php if($blok_fl_button['url']){ ?>
					<div class="center-align">
						<?php echo build_acf_button( $blok_fl_button, 'button' ); ?>
					</div>
					<?php } ?>
				</div>
				<!-- /.inner-featured-content -->
			</div>
			<!--/. wrapper -->
		</div>
		<!-- /.featured-list-container  -->
	</section>

</div>
