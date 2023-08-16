<?php
/**
 * Block Name: Lead Paragraph
 *
 * The template for displaying the custom gutenberg block named Lead Paragraph.
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
$blok_lp_headline = $block_fields['blok_lp_headline'];
$blok_lp_text = $block_fields['blok_lp_text'];
$blok_lp_button = $block_fields['blok_lp_button'];
?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-lead-paragraph">

	<div class="lead-paragraph-container">
		<div class="section-heading center-align">
			<?php if($blok_lp_headline){ ?>
				<h2><?php echo $blok_lp_headline; ?></h2>
			<?php } ?>
			<?php if($blok_lp_text){
				echo $blok_lp_text;
			} ?>
		</div>
		<!-- /.section-heading -->
		<?php if( $blok_lp_button ) : ?>
			<div class="center-align">
			<?php echo build_acf_button( $blok_lp_button, 'button' ); ?>
			</div>
		<?php endif; ?>
	</div>
	<!-- /.lead-paragraph -->

</div>
