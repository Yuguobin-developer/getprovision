<?php
/**
 * Block Name: Video
 *
 * The template for displaying the custom gutenberg block named Video.
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
$blok_vid_headline = $block_fields['blok_vid_headline'];
$blok_vid_image = $block_fields['blok_vid_image'];
$blok_vid_videolink = $block_fields['blok_vid_videolink'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-video">

	<div class="video-container">
		<a <?php if($blok_vid_videolink){ ?>href="<?php echo $blok_vid_videolink; ?>" <?php } ?> class="mfp-iframe">
			<div class="provision-video" style="background-image: url(<?php echo $blok_vid_image; ?>)">
				<div class="video-play video"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/play-icon.svg" alt="Play Icon">
				</div>
			</div><!-- /.client-video -->
		</a>
	</div>

</div>
