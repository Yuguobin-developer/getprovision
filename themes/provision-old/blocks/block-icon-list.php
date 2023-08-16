<?php
/**
 * Block Name: Icon List
 *
 * The template for displaying the custom gutenberg block named Icon List.
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
$blok_il_headline = $block_fields['blok_il_headline'];
$blok_il_icons_list = $block_fields['blok_il_icons_list'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-icon-list">
	<div class="icon-list-container">
		<div class="section-heading">
			<?php if($blok_il_headline){ ?>
				<h2><?php echo $blok_il_headline; ?></h2>
			<?php } ?>
		</div>
		<!-- /.section-heading -->
		<?php if($blok_il_icons_list){ ?>
		<div class="icon-lw-desc-container icon-list">
			<?php foreach ($blok_il_icons_list as $icon ) {
				$icon_img = $icon['icon'];
				$icon_title = $icon['title'];
				?>
			<div class="single-col-desc">
				<?php if($icon_img){ ?>
				<div class="desc-col-image" style="background-image: url(<?php echo $icon_img; ?>);"></div>
				<!-- /.desc-col-image -->
				<?php } ?>
				<?php if($icon_title){ ?>
				<div class="desc-title-col">
					<h5><?php echo $icon_title; ?> </h5>
				</div>
				<!-- /.desc-title-col -->
				<?php } ?>
			</div>
			<!-- /.single-col-desc -->
			<?php } ?>
			<div class="clear"></div>
		</div>
		<!-- /.icon-w-description -->
		<?php } ?>
	</div>
	<!-- /.icon-list-container -->
</div>
