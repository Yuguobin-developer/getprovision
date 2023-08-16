<?php
/**
 * Block Name: Amenities CTA
 *
 * The template for displaying the custom gutenberg block named Amenities CTA.
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
$blok_iat_select_variation = $block_fields['blok_iat_select_variation'];
$blok_iat_image = $block_fields['blok_iat_image'];
$blok_iat_image_alignment = $block_fields['blok_iat_image_alignment'];
$blok_iat_iconwithimage = $block_fields['blok_iat_iconwithimage'];
$blok_iat_textalongicon = $block_fields['blok_iat_textalongicon'];
$blok_iat_headline = $block_fields['blok_iat_headline'];
$blok_iat_text = $block_fields['blok_iat_text'];
$blok_iat_iconsdescriptions = $block_fields['blok_iat_iconsdescriptions'];
$blok_iat_button = $block_fields['blok_iat_button'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-image-alongside-text">
	<?php if($blok_iat_select_variation == 'icon'){ ?>
		<div class="iat-with-icons valign-wrapper">
			<div class="iat-image-area">
				<?php if($blok_iat_image){ ?>
				<div class="iat-image">
					<?php echo wp_get_attachment_image( $blok_iat_image, 'iat-thumb' ); ?>
				</div>
				<?php } ?>
				<div class="iat-image-caption">
					<?php if($blok_iat_iconwithimage){ ?>
					<div class="iat-caption-icon">
						<img src="<?php echo $blok_iat_iconwithimage; ?>" alt="icon">
					</div>
					<?php } ?>
					<div class="iat-caption-title"> <?php echo $blok_iat_textalongicon; ?> </div>
				</div>
			</div>
			<!-- /.iat-image-area -->
			<div class="iat-content-area">
				<?php if($blok_iat_headline){ ?>
					<h2><?php echo $blok_iat_headline; ?></h2>
				<?php } ?>
				<?php if($blok_iat_text){
					 echo $blok_iat_text;
					} ?>
				<?php if($blok_iat_iconsdescriptions){ ?>
				<div class="iat-iocns-container">
					<?php foreach ($blok_iat_iconsdescriptions as $icon ) { ?>
					<div class="iat-icon-column">
						<div class="iat-icon" style="background-image: url(<?php echo $icon['icon']; ?>);"></div>
						<span><?php echo $icon['text']; ?></span>
					</div>
					<?php } ?>
					<div class="clear"></div>
				</div>
				<?php } ?>
				<?php
					if( $blok_iat_button['url'] ) :
						echo build_acf_button( $blok_iat_button, 'button' );
					endif;
				?>
			</div>
			<!-- /.iat-content-area -->
		</div>
		<!-- /.iat-with-icons -->
	<?php } elseif($blok_iat_select_variation == 'shape'){
			$iat_image = wp_get_attachment_image_src( $blok_iat_image, 'full' );
		if($blok_iat_image_alignment == 'Left'){
		?>

		<div class="iaw-text-container with-bubbles image-at-left">
			<?php if($iat_image){ ?>
			<div class="iaw-text-image desktop-hide">
				<div class="along-side-image" style="background-image: url(<?php echo $iat_image[0]; ?>);">
					<div class="image-bubbles">
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="iaw-text-content">
				<?php if($blok_iat_headline){ ?>
					<h2><?php echo $blok_iat_headline; ?></h2>
				<?php } ?>
				<?php if($blok_iat_text){
					echo $blok_iat_text;
				} ?>
				<?php
					if( $blok_iat_button['url'] ) :
						echo build_acf_button( $blok_iat_button, 'button' );
					endif;
				?>
			</div>
			<?php if($iat_image){ ?>
			<div class="iaw-text-image mobile-show">
				<div class="along-side-image" style="background-image: url(<?php echo $iat_image[0]; ?>);">
					<div class="image-bubbles">
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<!-- /.iaw-text-container -->

		<?php } else { ?>
			<div class="iaw-text-container with-bubbles">
				<div class="iaw-text-image desktop-hide">
					<?php if($iat_image){ ?>
					<div class="along-side-image" style="background-image: url(<?php echo $iat_image[0]; ?>);">
						<div class="image-bubbles">
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="iaw-text-content">
					<?php if($blok_iat_headline){ ?>
						<h2><?php echo $blok_iat_headline; ?></h2>
					<?php } ?>
					<?php if($blok_iat_text){
						echo $blok_iat_text;
					} ?>
					<?php
						if( $blok_iat_button['url'] ) :
							echo build_acf_button( $blok_iat_button, 'button' );
						endif;
					?>
				</div>
				<?php if($iat_image){ ?>
				<div class="iaw-text-image mobile-show">
					<div class="along-side-image" style="background-image: url(<?php echo $iat_image[0]; ?>);">
						<div class="image-bubbles">
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<!-- /.iaw-text-container -->
		<?php } ?>

	<?php } else {
		if($blok_iat_image_alignment == 'Right'){
			$iat_image = wp_get_attachment_image_src( $blok_iat_image, 'full' );
		?>
		<div class="iaw-text-container">
			<div class="iaw-text-image desktop-hide">
				<div class="along-side-image" style="background-image: url(<?php echo $iat_image[0]; ?>);"></div>
			</div>
			<div class="iaw-text-content">
				<?php if($blok_iat_headline){ ?>
					<h2><?php echo $blok_iat_headline; ?></h2>
				<?php } ?>
				<?php if($blok_iat_text){
					 echo $blok_iat_text;
				} ?>
				<?php
					if( $blok_iat_button['url'] ) :
						echo build_acf_button( $blok_iat_button, 'button' );
					endif;
				?>
			</div>
			<div class="iaw-text-image mobile-show">
				<div class="along-side-image" style="background-image: url(<?php echo $iat_image[0]; ?>);"></div>
			</div>
		</div>
		<!-- /.iaw-text-container -->
		<?php } else {
			$iat_image = wp_get_attachment_image_src( $blok_iat_image, 'full' );
		?>
			<div class="iaw-text-container image-at-left">
				<div class="iaw-text-image desktop-hide">
					<div class="along-side-image" style="background-image: url(<?php echo $iat_image[0]; ?>);"></div>
				</div>
				<div class="iaw-text-content">
					<?php if($blok_iat_headline){ ?>
						<h2><?php echo $blok_iat_headline; ?></h2>
					<?php } ?>
					<?php if($blok_iat_text){
					 	echo $blok_iat_text;
					} ?>
					<?php
					if( $blok_iat_button['url'] ) :
						echo build_acf_button( $blok_iat_button, 'button' );
					endif;
					?>
				</div>
				<div class="iaw-text-image mobile-show">
					<div class="along-side-image" style="background-image: url(<?php echo $iat_image[0]; ?>);"></div>
				</div>
			</div>
			<!-- /.iaw-text-container -->
		<?php } ?>
	<?php } ?>
</div>
