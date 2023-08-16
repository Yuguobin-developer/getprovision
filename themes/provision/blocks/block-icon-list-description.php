<?php
/**
 * Block Name: Icon List w/ Description
 *
 * The template for displaying the custom gutenberg block named Icon List w/ Description.
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
$blok_ilwd_icon_list = $block_fields['blok_ilwd_icon_list'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-icon-list-description">
	<?php if($blok_ilwd_icon_list){ ?>
	<div class="icon-lw-desc-container">
		<?php foreach ($blok_ilwd_icon_list as $icon ) {
			$icon_img = $icon['icon'];
			$icon_title = $icon['title'];
			$icon_text = $icon['text'];
			?>
		<div class="single-col-desc">
			<?php if($icon_img){ ?>
				<div class="desc-col-image" style="background-image: url(<?php echo $icon_img; ?>);"></div>
				<!-- /.desc-col-image -->
			<?php } ?>
			<?php if($icon_title){ ?>
			<div class="desc-title-col">
				<h4><?php echo $icon_title; ?></h4>
			</div>
			<!-- /.desc-title-col -->
			<?php } ?>
			<?php if($icon_text){ ?>
			<div class="desc-text">
				<p><?php echo $icon_text; ?></p>
			</div>
			<!-- /.desc-text -->
			<?php } ?>
		</div>
		<!-- /.single-col-desc -->
		<?php } ?>
		<div class="clear"></div>
	</div>
	<!-- /.icon-w-description -->
	<?php } ?>
</div>
