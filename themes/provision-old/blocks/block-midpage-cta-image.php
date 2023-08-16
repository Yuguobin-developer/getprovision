<?php
/**
 * Block Name: Mid Page CTA w/ Image
 *
 * The template for displaying the custom gutenberg block named Mid Page CTA w/ Image.
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
$blok_mpctai_headline = $block_fields['blok_mpctai_headline'];
$blok_mpctai_text = $block_fields['blok_mpctai_text'];
$blok_mpctai_button = $block_fields['blok_mpctai_button'];
$blok_mpctai_image = $block_fields['blok_mpctai_image'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-midpage-cta-image">

	<div class="cta-with-image">
		<div class="cta-with-image-content">
			<?php if($blok_mpctai_headline){ ?>
				<h2><?php echo $blok_mpctai_headline; ?></h2>
			<?php } ?>
			<?php if($blok_mpctai_text){ ?>
				<p><?php echo $blok_mpctai_text; ?></p>
			<?php } ?>
			<?php
				if( $blok_mpctai_button ) :
					echo build_acf_button( $blok_mpctai_button, 'button' );
				endif;
			?>
		</div>
		<?php if($blok_mpctai_image){ ?>
		<div class="cta-with-image-right">
			<div class="cta-image-shape">
				<div class="cta-image-bubble"></div>
				<div class="cta-right-image" style="background-image: url(<?php echo $blok_mpctai_image; ?>);">
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="clear"></div>
	</div>

</div>
