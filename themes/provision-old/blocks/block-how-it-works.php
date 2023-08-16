<?php
/**
 * Block Name: How it Works
 *
 * The template for displaying the custom gutenberg block named How it Works.
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
$blok_hiw_headline = $block_fields['blok_hiw_headline'];
$blok_hiw_text = $block_fields['blok_hiw_text'];
$blok_hiw_steps = $block_fields['blok_hiw_steps'];
$blok_hiw_button = $block_fields['blok_hiw_button'];

$total_step_counter = 0;
if($blok_hiw_steps){
	foreach ($blok_hiw_steps as $step ) {
		$total_step_counter++;
	}
}

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-how-it-works">

	<div class="how-its-works-container">
		<div class="block-head center-align">
			<?php if($blok_hiw_headline){ ?>
				<h2><?php echo $blok_hiw_headline; ?></h2>
			<?php } ?>
			<?php if($blok_hiw_text){
				echo $blok_hiw_text;
			} ?>
		</div>
		<?php if($blok_hiw_steps){
			$step_counter = 0;
			$step_line_counter = 0;
			$even_odd_counter = 0;
			?>
		<div class="how-its-work-area">
			<?php foreach ($blok_hiw_steps as $step ) {
				$step_img = $step['image'];
				$step_title = $step['title'];
				$step_text = $step['text'];
				$step_counter++;
				$step_line_counter++;
				$even_odd_counter++;
				if($step_line_counter == '1'){
					$line_class = ' line-one ';
				} elseif($step_line_counter == '2'){
					$line_class = ' line-two ';
				}elseif($step_line_counter == '4'){
					$line_class = ' line-three ';
				}

				if($even_odd_counter == 1){
				?>

				<div class="how-its-work-row">
					<div class="how-its-work-image">
						<?php echo wp_get_attachment_image( $step_img, 'full' ); ?>
					</div>
					<div class="how-its-work-content">
						<h4><?php echo $step_counter; ?>. <?php echo $step_title; ?></h4>
						<?php if($step_text){
							echo $step_text;
						} ?>
					</div>
					<div class="connector-line <?php echo $line_class; ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/line-connection-<?php echo $step_line_counter; ?>.svg" alt="">
					</div>
				</div>

				<?php } else if($even_odd_counter == 2) { ?>

					<div class="how-its-work-row">
						<div class="how-its-work-image mobile-show">
							<?php echo wp_get_attachment_image( $step_img, 'full' ); ?>
						</div>
						<div class="how-its-work-content">
							<h4><?php echo $step_counter; ?>. <?php echo $step_title; ?></h4>
							<?php if($step_text){
								echo $step_text;
							} ?>
						</div>
						<div class="how-its-work-image desktop-show">
							<?php echo wp_get_attachment_image( $step_img, 'full' ); ?>
						</div>
						<div class="connector-line <?php echo $line_class; ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/line-connection-<?php echo $step_line_counter; ?>.svg" alt="">
						</div>
					</div>

				<?php } else if($even_odd_counter == 3) { ?>

					<div class="how-its-work-row">
						<div class="how-its-work-image">
							<?php echo wp_get_attachment_image( $step_img, 'full' ); ?>
						</div>
						<div class="how-its-work-content">
							<h4><?php echo $step_counter; ?>. <?php echo $step_title; ?></h4>
							<?php if($step_text){
								echo $step_text;
							} ?>
						</div>
					</div>

				<?php } else { ?>

					<div class="how-its-work-row">
						<div class="how-its-work-image mobile-show">
							<?php echo wp_get_attachment_image( $step_img, 'full' ); ?>
						</div>
						<div class="how-its-work-content">
							<h4><?php echo $step_counter; ?>. <?php echo $step_title; ?></h4>
							<?php if($step_text){
								echo $step_text;
							} ?>
						</div>
						<div class="how-its-work-image desktop-show">
							<?php echo wp_get_attachment_image( $step_img, 'full' ); ?>
						</div>
						<div class="connector-line <?php echo $line_class; ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/line-connection-<?php echo $step_line_counter-1; ?>.svg" alt="">
						</div>
					</div>

				<?php } ?>
			<?php
			if($step_line_counter == '4'){
				$step_line_counter = 0;
			}
			if($even_odd_counter == 4){
				$even_odd_counter =0;
			}
			} ?>
			<?php if( $blok_hiw_button ) : ?>
			<div class="center-align">
				<?php echo build_acf_button( $blok_hiw_button, 'button' ); ?>
			</div>
			<?php endif; ?>
		</div>
		<?php } ?>
	</div>

</div>
