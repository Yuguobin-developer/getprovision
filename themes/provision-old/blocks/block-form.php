<?php
/**
 * Block Name: Form
 *
 * The template for displaying the custom gutenberg block named Form.
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
$blok_frm_headline = $block_fields['blok_frm_headline'];
$blok_frm_text = $block_fields['blok_frm_text'];
$form_selection = $block_fields['form_selection'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-form">
	<section class="s-section">
		<div class="form-block">
			<div class="wrapper">
				<div class="section-heading">
					<?php if($blok_frm_headline){ ?>
						<h2><?php echo $blok_frm_headline; ?></h2>
					<?php } ?>
					<?php if($blok_frm_text){
						echo $blok_frm_text;
					} ?>
				</div>
				<div class="contect-form">
					<?php echo do_shortcode( '[gravityform id="' . $form_selection . '" title=false description=false ajax=true]' ); ?>
				</div>
			</div>
		</div>
	</section>
</div>
