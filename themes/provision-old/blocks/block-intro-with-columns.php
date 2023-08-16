<?php
/**
 * Block Name: Intro with Columns
 *
 * The template for displaying the custom gutenberg block named Intro with Columns.
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
$blok_iwc_headline = $block_fields['blok_iwc_headline'];
$blok_iwc_text = $block_fields['blok_iwc_text'];
$blok_iwc_columns = $block_fields['blok_iwc_columns'];
$blok_iwc_button = $block_fields['blok_iwc_button'];
$blok_iwc_icons_numbers = $block_fields['blok_iwc_icons_numbers'];
$column_container_class = null;
if($blok_iwc_icons_numbers== 'Numbers'){
	$column_container_class = ' icon-lw-desc-container four-columns ';
} else {
	$column_container_class = ' intro-columns ';
}

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-intro-with-columns">
	<div class="intro-columns-container">
		<div class="section-heading">
			<?php if($blok_iwc_headline){ ?>
				<h2><?php echo $blok_iwc_headline; ?></h2>
			<?php } ?>
			<?php if($blok_iwc_text){
				echo $blok_iwc_text;
			} ?>
		</div>
		<!-- /.section-heading -->
		<div class="<?php echo $column_container_class; ?>">
		<?php if($blok_iwc_columns){ $col_counter = 0;
			foreach ($blok_iwc_columns as $column ) {
				$col_counter++;
			?>
			<div class="single-col-desc">
				<?php if($blok_iwc_icons_numbers == 'Numbers'){ ?>
					<div class="desc-col-count">
						<span><?php echo $col_counter; ?></span>
					</div>
					<!-- /.desc-col-image -->
				<?php } else { ?>

				<div class="desc-col-image" style="background-image: url(<?php echo $column['icon']; ?>);"></div>
				<!-- /.desc-col-image -->

				<?php } ?>
				<div class="desc-text">
					<?php echo $column['text']; ?>
				</div>
				<!-- /.desc-text -->
			</div>
			<!-- /.single-col-desc -->
			<?php }
		} ?>
			<div class="clear"></div>
			<?php
				if( $blok_iwc_button['url'] ) :
					echo build_acf_button( $blok_iwc_button, 'button green-button' );
				endif;
			?>
		</div>
		<!-- /.intro-colums -->
	</div>
	<!-- /.intro-colums-container -->
</div>
