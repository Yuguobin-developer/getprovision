<?php
/**
 * Block Name: Bullet List
 *
 * The template for displaying the custom gutenberg block named Bullet List.
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
$blok_bl_select_variation = $block_fields['blok_bl_select_variation'];
$blok_bl_headline = $block_fields['blok_bl_headline'];
$blok_bl_list = $block_fields['blok_bl_list'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-bullet-list">

	<?php if($blok_bl_select_variation == "Regular"){ ?>
	<div class="bullet-list">
		<?php if($blok_bl_headline){ ?>
			<h4><?php echo $blok_bl_headline; ?></h4>
		<?php } ?>
		<?php if($blok_bl_list){ ?>
		<ul>
			<?php foreach ($blok_bl_list as $list ) { ?>
				<li><?php echo $list['title']; ?></li>
			<?php } ?>
		</ul>
		<?php } ?>
	</div>
	<?php } else{ ?>

	<div class="checklist">
		<?php if($blok_bl_headline){ ?>
			<h4><?php echo $blok_bl_headline; ?></h4>
		<?php } ?>
		<?php if($blok_bl_list){ ?>
		<ul>
			<?php foreach ($blok_bl_list as $list ) { ?>
				<li><?php echo $list['title']; ?></li>
			<?php } ?>
		</ul>
		<?php } ?>
	</div>
	<?php } ?>

</div>
