<?php
/**
 * Block Name: Zipcode List
 *
 * The template for displaying the custom gutenberg block named Zipcode List.
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
$blok_zl_headline = $block_fields['blok_zl_headline'];
$blok_zl_image1 = $block_fields['blok_zl_image1'];
$blok_zl_image2 = $block_fields['blok_zl_image2'];
if($block_fields['add_zipcode']=='automatic') {
	global $wpdb;
	$zipcode_state = $block_fields['select_state'];	
	$zipcode_display_limit = $block_fields['zipcode_display_limit'];	
	
	$zipquery = "SELECT zipcode FROM wp_import_routine WHERE state = '".$zipcode_state."' GROUP BY zipcode ORDER BY zipcode ASC LIMIT 0, ".$zipcode_display_limit;

	$blok_zl_zipcodes = $wpdb->get_results($zipquery, ARRAY_A);
	
} else {
	$blok_zl_zipcodes = $block_fields['blok_zl_zipcodes'];
}
?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-zipcode-list">
	<div class="iaw-text-container with-bubbles zipcode-list image-at-left">
		<div class="iaw-text-image desktop-hide">
			<?php if($blok_zl_image1){ ?>
			<div class="along-side-image" style="background-image: url(<?php echo $blok_zl_image1; ?>);">
				<div class="image-bubbles">
				</div>
			</div>
			<?php } ?>
			<div class="clear"></div>
			<?php if($blok_zl_image2){ ?>
			<div class="al-image-small" style="background-image: url(<?php echo $blok_zl_image2; ?>);">
			</div>
			<?php } ?>
		</div>
		<div class="iaw-text-content checklist">
			<?php if($blok_zl_headline){ ?>
				<h2><?php echo $blok_zl_headline; ?></h2>
			<?php } 
                        if( $blok_zl_zipcodes ){
                        ?>
			<div class="link-boxes ">
                            <?php foreach( $blok_zl_zipcodes as $zipcode ) { ?>
				<div class="link-box">
					<?php if($block_fields['add_zipcode']=='automatic') { ?>
						<a href="<?php echo '/enroll-step-2/?zipcode='.$zipcode['zipcode']; ?>"><?= $zipcode['zipcode']; ?></a>
					<?php } else {?>
						<a href="<?= $zipcode['blok_zl_zip_code_link']; ?>"><?= $zipcode['blok_zl_zipcode'] ?></a>
					<?php } ?>
				</div>
                            <?php } ?>
				<div class="clear"></div>
			</div>
                        <?php } ?>
		</div>
		<div class="iaw-text-image mobile-show">
			<?php if($blok_zl_image1){ ?>
			<div class="along-side-image" style="background-image: url(<?php echo $blok_zl_image1; ?>);">
				<div class="image-bubbles">
				</div>
			</div>
			<?php } ?>
			<div class="clear"></div>
			<?php if($blok_zl_image2){ ?>
			<div class="al-image-small" style="background-image: url(<?php echo $blok_zl_image2; ?>);">
			</div>
			<?php } ?>
		</div>
		<div class="clear"></div>
	</div>
	<!-- /.iaw-text-container -->
</div>
