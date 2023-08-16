<?php
/**
 * Block Name: Mid Page CTA w/ Steps
 *
 * The template for displaying the custom gutenberg block named Mid Page CTA w/ Steps.
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
$blok_mpctas_headline = $block_fields['blok_mpctas_headline'];
$blok_mpctas_text = $block_fields['blok_mpctas_text'];
$blok_mpctas_title_size = $block_fields['blok_mpctas_title_size'];
if($blok_mpctas_title_size == "Small"){
	$text_size_class = "3";
} else{
	$text_size_class = "2";
}
$blok_mpctas_button = $block_fields['blok_mpctas_button'];
$blok_mpctas_steps = $block_fields['blok_mpctas_steps'];
?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-midpage-cta-steps">

	<div class="midpage-cta-content">
		<?php if($blok_mpctas_headline){ ?>
			<h<?php echo $text_size_class; ?>><?php echo $blok_mpctas_headline; ?></h<?php echo $text_size_class; ?>>
		<?php } ?>
		<?php if($blok_mpctas_text){ ?>
			<p><?php echo $blok_mpctas_text; ?></p>
		<?php } ?>
		<?php
			if( $blok_mpctas_button['url'] ) :
				echo build_acf_button( $blok_mpctas_button, 'button red-button' );
			endif;
		?>
	</div>
	<?php if($blok_mpctas_steps){
		$step_counter = 0;
		?>
	<div class="midpage-cta-steps">
		<?php foreach ($blok_mpctas_steps as $step ) {
			$step_counter++;
			if($step_counter==1){ $active_class = 'active'; } else{ $active_class = ''; }
			?>
		<div class="cta-step-single <?php echo $active_class; ?> valign-wrapper">
			<div class="step-count">
				<div class="step-number"> <?php echo $step_counter; ?> </div>
			</div>
			<div class="step-text"><?php echo $step['title']; ?></div>
		</div>
		<?php } ?>
	</div>
	<?php } ?>
	<div class="clear"></div>

</div>
