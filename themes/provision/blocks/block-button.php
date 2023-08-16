<?php
/**
 * Block Name: Button
 *
 * The template for displaying the custom gutenberg block named button.
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

$blok_btn_link = $block_fields['blok_btn_link'];
$blok_btn_button_style = $block_fields['blok_btn_button_style'];

$btn_style_class            = null;
if ( $blok_btn_button_style == 'Red' ) {
	$btn_style_class = '  button red-button  ';
} else if ( $blok_btn_button_style == 'Green' ) {
	$btn_style_class = ' button green-button ';
} else {
	$btn_style_class = ' button ';
}


?>

<?php if ( $blok_btn_link['url'] ) : ?>
	<div id="<?php echo $id; ?>" class="<?php echo $theme_align_class . ' ' . $theme_class_name; ?> glide-block-button">

		<?php
		if ( $blok_btn_link ) :
			echo build_acf_button( $blok_btn_link, $btn_style_class );
			endif;
		?>

	</div>
<?php endif; ?>
