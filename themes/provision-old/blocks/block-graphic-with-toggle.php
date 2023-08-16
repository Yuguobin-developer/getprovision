<?php
/**
 * Block Name: Graphic w/ Toggle
 *
 * The template for displaying the custom gutenberg block named Graphic w/ Toggle.
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
$blok_gwt_tabs = $block_fields['blok_gwt_tabs'];

$toggle_id = str_replace(' ', '', $id);

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-graphic-with-toggle">

	<?php if($blok_gwt_tabs){
		$first_counter = 0;
		$second_counter = 0;
	?>
	<div class="graphic-toggle-container">

		<div class="tabs-links">
			<ul class="tabs">
				<?php foreach ($blok_gwt_tabs as $tab ) {
					$first_counter++;
					if($first_counter == 1){
						$active_class = 'active';
					} else{
						$active_class = null;
					}
					?>
				<li class="tab"><a href="#toggle-<?php echo $first_counter . $toggle_id ?>" class="<?php echo $active_class; ?>"><span><img src="<?php echo  $tab['logo']; ?>"
											alt=""></span><?php echo $tab['title']; ?></a></li>
				<?php } ?>
				<li class="indicator" style="left: 0px; right: 356px;"></li>
			</ul>
		</div>
		<div class="xl-2"></div>
		<?php foreach ($blok_gwt_tabs as $tab ) {
			$second_counter++;
			$select_variation = $tab['select_variation'];
			if($second_counter == 1){
				$active_class = 'active';
				$style_class = 'block';
			} else{
				$active_class = null;
				$style_class = 'none';
			}
			$image_bubble = $tab['image_bubble'];
			$bubbletext1 = $tab['bubbletext1'];
			$bubbletext2 = $tab['bubbletext2'];
			$bubbletext3 = $tab['bubbletext3'];
			$bottom_image_text = $tab['bottom_image_text'];

			$second_bubble_class = null;
			if($bubbletext2 && !$bubbletext3){
				$second_bubble_class = ' second-box ';
			}

			$headline = $tab['headline'];
				$text = $tab['text'];
				$image = $tab['image'];
		?>
		<div id="toggle-<?php echo $second_counter . $toggle_id; ?>" class="toggle-box <?php echo $active_class; echo $second_bubble_class; ?>" style="display: <?php echo $style_class; ?>;">
		<?php if($select_variation == 'bubble'){



			?>
			<div class="toggle-graphic">
				<?php echo wp_get_attachment_image( $image_bubble, 'full' ); ?>
			</div>
			<div class="toggle-captions-area <?php echo $second_bubble_class; ?>">
				<?php if($bubbletext1){ ?>
					<div class="toggle-caption"><?php echo $bubbletext1; ?></div>
				<?php } ?>
				<?php if($bubbletext2){ ?>
					<div class="toggle-caption"><?php echo $bubbletext2; ?></div>
				<?php } ?>
				<?php if($bubbletext3){ ?>
					<div class="toggle-caption"><?php echo $bubbletext3; ?> </div>
				<?php } ?>
				<?php if($bottom_image_text){ ?>
				<div class="toggle-bottom-text">
					<?php echo $bottom_image_text; ?>
				</div>
				<?php } ?>
				</div>
			<?php } else{

				?>
				<?php if($headline){ ?>
					<h2><?php echo $headline; ?></h2>
				<?php } ?>
				<div class="toggle-box-content">
					<div class="toogle-column">
						<?php if($text){
							echo $text;
						} ?>
					</div>
					<div class="clear"></div>
					<div class="xl-3"></div>
				</div>
				<?php if($image){ ?>
				<div class="toggle-bottom-graphic center-align">
					<?php echo wp_get_attachment_image( $image, 'full' ); ?>
				</div>
				<?php } ?>

			<?php } ?>
			</div>
		<?php } ?>
	</div>
	<!-- /.graphic-toggle-container -->
	<?php } ?>

</div>
