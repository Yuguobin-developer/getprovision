<?php
/**
 * Block Name: Energy Choice Options
 *
 * The template for displaying the custom gutenberg block named Energy Choice Options.
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
$blok_eco_headline = $block_fields['blok_eco_headline'];
$blok_eco_text = $block_fields['blok_eco_text'];

// Customer Left Side
$blok_eco_customerleftside = $block_fields['blok_eco_customerleftside'];
$blok_eco_customerleftside_name = $blok_eco_customerleftside['name'];
$blok_eco_customerleftside_thought = $blok_eco_customerleftside['thought'];
$blok_eco_customerleftside_option = $blok_eco_customerleftside['option'];

$blok_eco_customerrightside = $block_fields['blok_eco_customerrightside'];
$blok_eco_customerrightside_name = $blok_eco_customerrightside['name'];
$blok_eco_customerrightside_text = $blok_eco_customerrightside['text'];
$blok_eco_customerrightside_supplier = $blok_eco_customerrightside['supplier'];
$blok_eco_customerrightside_supplier_title = $blok_eco_customerrightside_supplier['title'];
$blok_eco_customerrightside_supplier_icon = $blok_eco_customerrightside_supplier['icon'];

$blok_eco_button = $block_fields['blok_eco_button'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-energy-choice-options">

	<div class="section-heading">
		<?php if($blok_eco_headline){ ?>
			<h2><?php echo $blok_eco_headline; ?></h2>
		<?php } ?>
		<?php if($blok_eco_text){
			echo $blok_eco_text;
		} ?>
	</div>
	<div class="energy-choice-left energy-choice">
		<div class="customer-detail">
			<div class="customer-icon" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/customer-icon.svg);">
			<?php if($blok_eco_customerleftside_thought){ ?>
				<div class="tooltip"><?php echo $blok_eco_customerleftside_thought; ?></div>
			<?php } ?>
			</div>
			<?php if($blok_eco_customerleftside_name){ ?>
				<h5><?php echo $blok_eco_customerleftside_name; ?></h5>
			<?php } ?>
		</div>
		<?php if($blok_eco_customerleftside_option){ ?>
		<div class="supplier-container">
			<?php foreach ($blok_eco_customerleftside_option as $option ) { ?>
			<div class="supplier-single">
				<div class="supplier-tag"><?php echo $option['tag']; ?></div>
				<h6><?php echo $option['title']; ?></h6>
			</div>
			<?php } ?>
			<div class="clear"></div>
		</div>
		<?php } ?>
	</div>
	<div class="energy-choice-right energy-choice">
		<div class="customer-detail">
			<div class="customer-icon" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/customer-icon.svg);"></div>
			<?php if($blok_eco_customerrightside_name){ ?>
				<h5><?php echo $blok_eco_customerrightside_name; ?></h5>
			<?php } ?>
		</div>
		<span class="supply-button"><?php echo $blok_eco_customerrightside_text; ?></span>
		<div class="supply-with-icon" style="background-image:url(<?php echo $blok_eco_customerrightside_supplier_icon; ?>);"><?php echo $blok_eco_customerrightside_supplier_title; ?></div>
	</div>
	<div class="clear"></div>
	<?php
		if( $blok_eco_button ) :
			echo build_acf_button( $blok_eco_button, 'button' );
		endif;
	?>

</div>
