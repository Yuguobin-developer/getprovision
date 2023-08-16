<?php
/**
 * Block Name: Energy Choice CTA
 *
 * The template for displaying the custom gutenberg block named Energy Choice CTA.
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
$blok_eccta_headline = $block_fields['blok_eccta_headline'];
$blok_eccta_text = $block_fields['blok_eccta_text'];
$blok_eccta_dropdown = $block_fields['blok_eccta_dropdown'];
$ddown_headline = $blok_eccta_dropdown['headline'];
$ddown_options = $blok_eccta_dropdown['options'];

?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js'></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.1/lottie.min.js"></script>

<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-energy-choice-cta">

	<div class="energy-choice-cta">
		<div class="block-head center-align">
			<?php if($blok_eccta_headline){ ?>
				<h2><?php echo $blok_eccta_headline; ?></h2>
			<?php } ?>
			<?php if($blok_eccta_text){
				echo $blok_eccta_text;
			} ?>
		</div>
		<div class="animation">
			<div id="lottie" class="waypoint"></div>
		</div>
		<?php if($ddown_headline || $ddown_options){ ?>
		<div class="state-menu">
			<dl id="" class="dropdown">
				<dt>
					<a href="#"><span><?php echo $ddown_headline; ?></span></a>
				</dt>
				<dd>

					<div class="state-menu-container">
						<?php if($ddown_options){ ?>
						<ul id="state-menu">
							<?php foreach ($ddown_options as $option ) {
								$option_icon = $option['icon'];
								$option_title = $option['title'];
								$option_link = $option['link'];
								?>
							<li>
								<a href="<?php echo $option_link; ?>">
									<span class="menu-img">
										<img src="<?php echo $option_icon; ?>" alt="<?php echo $option_title; ?>">
									</span>
									<span><?php echo $option_title; ?></span>
								</a>
							</li>
							<?php } ?>
						</ul>
						<?php } ?>
					</div>
				</dd>
			</dl>
		</div>
		<!-- /.energy-choice-cta -->
		<?php } ?>
	</div>

</div>
<script src="<?php echo get_template_directory_uri(  )?>/assets/lottie-animation.js "></script>
