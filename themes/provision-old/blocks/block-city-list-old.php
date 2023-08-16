<?php
/**
 * Block Name: City List
 *
 * The template for displaying the custom gutenberg block named City List.
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
$blok_cl_headline = $block_fields['blok_cl_headline'];
$blok_cl_image_1 = $block_fields['blok_cl_image_1'];
$blok_cl_image_2 = $block_fields['blok_cl_image_2'];
$blok_cl_fact = $block_fields['blok_cl_fact'];
$blok_cl_bottom_text = $block_fields['blok_cl_bottom_text'];
$blok_cl_city_list_type = $block_fields['city_list_type'];

if($blok_cl_city_list_type=='automatic') {
	global $wpdb;
	$blok_cl_city_state = $block_fields['select_state'];
	$blok_cl_display_limit = $block_fields['city_display_limit'];
	
	$cityquery = "SELECT city, state FROM wp_import_routine WHERE state = '".$blok_cl_city_state."' GROUP BY zipcode ORDER BY zipcode ASC LIMIT 0, ".$blok_cl_display_limit;

	$blok_cl_city_group = $wpdb->get_results($cityquery, ARRAY_A);
} else {
	$blok_cl_city_group = $block_fields['add_city'];
}
?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-city-list">
	<div class="iaw-text-container with-bubbles city-list image-at-left">
		<div class="iaw-text-image desktop-hide">
			<?php if($blok_cl_image_1){ ?>
			<div class="along-side-image" style="background-image: url(<?php echo $blok_cl_image_1; ?>);">
				<div class="image-bubbles">
				</div>
			</div>
			<?php } ?>
			<div class="clear"></div>
			<?php if($blok_cl_image_2){ ?>
			<div class="al-image-small" style="background-image: url(<?php echo $blok_cl_image_2; ?>);">
				<div class="small-img-bubble"></div>
			</div>
			<?php } ?>
		</div>
		<div class="iaw-text-content checklist">
			<?php if($blok_cl_headline){ ?>
				<h2><?php echo $blok_cl_headline; ?></h2>
			<?php } ?>
			<div class="link-boxes ">
			<?php if(is_array($blok_cl_city_group) && !empty($blok_cl_city_group)) {
				foreach($blok_cl_city_group as $cgkey => $cgval) {
				?>
				<div class="link-box">
					<a href="/enroll-step-2/?city=<?php echo $cgval['city']; ?>&state=<?php echo $cgval['state']; ?>"><?php echo $cgval['city'].', '.$cgval['state']; ?></a>
				</div>
			<?php } } ?>				
				<div class="clear"></div>
			</div>
			<?php if($blok_cl_fact){ ?>
			<div class="about-fact valign-wrapper">
				<div class="fact-heading">
					<span>Fact</span>
				</div>
				<div class="fact-text">
					<?php echo $blok_cl_fact; ?>
				</div>
			</div>
			<?php } ?>
			<?php if($blok_cl_bottom_text){ ?>
			<div class="disclaimer"><?php echo $blok_cl_bottom_text; ?></a>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="clear"></div>
</div>
