<?php
/**
 * Block Name: State CTA
 *
 * The template for displaying the custom gutenberg block named State CTA.
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
$blok_scta_headline = $block_fields['blok_scta_headline'];
$blok_scta_states = $block_fields['blok_scta_states'];
$blok_scta_link = $block_fields['blok_scta_link'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-state-cta">

	<section class="green-container">
		<div class="state-cta">
			<div class="wrapper">
				<?php if($blok_scta_headline){ ?>
					<h3><?php echo $blok_scta_headline; ?></h3>
				<?php } ?>
				<?php if($blok_scta_states) { ?>
				<div class="states-container">
					<?php foreach ($blok_scta_states as $state ) {
						$state_image = $state['image'];
						$state_link = $state['link'];
						?>
					<div class="single-state">
					<a <?php if($state_link['url']){ ?> href="<?php echo $state_link['url']; ?>"<?php } ?>>
							<?php if($state_image){ ?>
							<div class="state-icon">
								<img src="<?php echo $state_image; ?>" alt="State Image">
							</div>
							<?php } ?>
							<span href="#" class="button"><?php echo $state_link['title']; ?></span>
						</a>
					</div>
					<?php } ?>
					<div class="clear"></div>
				</div>
				<?php } ?>
				<?php
					if(is_front_page()) {
						if( $blok_scta_link ) :
							echo build_acf_button( $blok_scta_link, 'link open-popup' );
						endif;
					} else {
						if( $blok_scta_link ) :
							echo build_acf_button( $blok_scta_link, 'link' );
						endif;
					}
				?>
			</div>
		</div>
	</section>

</div>
