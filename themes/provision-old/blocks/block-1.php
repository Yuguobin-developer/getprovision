<?php
/**
 * Block Name: Amenities CTA
 *
 * The template for displaying the custom gutenberg block named Amenities CTA.
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

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-">

</div>
