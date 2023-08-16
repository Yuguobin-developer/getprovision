<?php
/**
 * Block Name: Logo List
 *
 * The template for displaying the custom gutenberg block named Logo List.
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
$blok_ll_logos = $block_fields['blok_ll_logos'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-logo-list">
	<?php if($blok_ll_logos){ ?>
	<div class="logo-list-container">
		<?php foreach ($blok_ll_logos as $logo ) { ?>
		<div class="single-logo-list">
			<?php echo wp_get_attachment_image( $logo['logo'], 'full' ); ?>
		</div>
		<!-- /.single-logo-list -->
		<?php } ?>
		<div class="clear"></div>
	</div>
	<!-- /.logo-list-container -->
	<?php } ?>
</div>
