<?php
/**
 * Block Name: Block Quote
 *
 * The template for displaying the custom gutenberg block named Block Quote.
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
$blok_bq_variation = $block_fields['blok_bq_variation'];
$blok_bq_text = $block_fields['blok_bq_text'];
$blok_bq_name = $block_fields['blok_bq_name'];
$blok_bq_image = $block_fields['blok_bq_image'];
$blok_bq_location = $block_fields['blok_bq_location'];
$blok_bq_icon = $block_fields['blok_bq_icon'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-block-quote">
	<?php if($blok_bq_variation == 'First'){ ?>

		<blockquote>
			<p>"<?php echo $blok_bq_text; ?>"</p>
			<div class="client-detail">
				<div class="client-image" style="background-image: url(<?php echo $blok_bq_image; ?>);"></div>
					<div class="client-name"> <?php echo $blok_bq_name; ?> <span> <?php if($blok_bq_location){ ?> -  <?php echo $blok_bq_location; ?> <?php } ?></span>
				</div>
				<div class="clear"></div>
			</div>
		</blockquote>

	<?php } else if($blok_bq_variation == 'Second'){ ?>

		<div class="blockqoute-veriation">
			<div class="blockqoute-image">
				<div class="client-image" style="background-image: url(<?php echo $blok_bq_image; ?>);"></div>
			</div>
			<div class="blockqoute-content">
				<blockquote>
					<p>"<?php echo $blok_bq_text; ?>"</p>
					<div class="client-detail">
						<div class="client-name"> <?php echo $blok_bq_name; ?> <span> <?php if($blok_bq_location){ ?> -  <?php echo $blok_bq_location; ?> <?php } ?></span>
						</div>
						<div class="clear"></div>
					</div>
				</blockquote>
			</div>
			<div class="clear"></div>
		</div>

	<?php } else { ?>

		<div class="blockqoute-veriation-2">
			<div class="wrapper">
				<blockquote>
					<?php if($blok_bq_icon){ ?>
					<div class="blockqoute-icon" style="background-image: url(<?php echo $blok_bq_icon; ?>);"></div>
					<?php } ?>
					<p>“<?php echo $blok_bq_text; ?>”</p>
					<div class="client-detail">
						<div class="client-image" style="background-image: url(<?php echo $blok_bq_image; ?>);"></div>
						<div class="client-name"> <?php echo $blok_bq_name; ?> <span> <?php if($blok_bq_location){ ?> -  <?php echo $blok_bq_location; ?> <?php } ?></span>
						</div>
					</div>
				</blockquote>
			</div>
		</div>

	<?php } ?>


</div>
