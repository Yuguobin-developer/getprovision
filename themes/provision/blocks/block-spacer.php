<?php
/**
 * Block Name: Spacer
 *
 * The template for displaying the custom gutenberg block named Spacer.
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

$blok_spcr_spcaer_size = $block_fields['blok_spcr_spcaer_size'];

if ( $blok_spcr_spcaer_size == 'space-xl' ) {
	$blok_spcr_spcaer_size_class = 'xl-1';
} elseif ( $blok_spcr_spcaer_size == 'space-xl2' ) {
	$blok_spcr_spcaer_size_class = 'xl-2';
} elseif ( $blok_spcr_spcaer_size == 'space-xl3' ) {
	$blok_spcr_spcaer_size_class = 'xl-3';
} elseif ( $blok_spcr_spcaer_size == 'space-xxl' ) {
	$blok_spcr_spcaer_size_class = 'xxl-1';
} elseif ( $blok_spcr_spcaer_size == 'space-xxl2' ) {
	$blok_spcr_spcaer_size_class = 'xxl-2';
} elseif ( $blok_spcr_spcaer_size == 'space-xxl3' ) {
	$blok_spcr_spcaer_size_class = 'xxl-3';
} elseif ( $blok_spcr_spcaer_size == 'space-xxl4' ) {
	$blok_spcr_spcaer_size_class = 'xxl-4';
} elseif ( $blok_spcr_spcaer_size == 'space-xxl5' ) {
	$blok_spcr_spcaer_size_class = 'xxl-5';
}

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block-glide=spacer">
	<div class="glide-spacer <?php echo $blok_spcr_spcaer_size_class; ?>"> </div>
	<!-- /.stroke-headline -->
</div>
