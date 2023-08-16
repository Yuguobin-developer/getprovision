<?php
/**
 * Block Name: Contact Info
 *
 * The template for displaying the custom gutenberg block named Contact Info.
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
$blok_ci_headline = $block_fields['blok_ci_headline'];
$blok_ci_call_info = $block_fields['blok_ci_call_info'];
$blok_ci_email_info = $block_fields['blok_ci_email_info'];
$blok_ci_address = $block_fields['blok_ci_address'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-contact-info">

	<div class="contact-info-container">
		<?php if($blok_ci_headline){ ?>
			<h2><?php echo $blok_ci_headline; ?></h2>
		<?php } ?>
		<div class="contact-info-widgets">
			<?php if($blok_ci_call_info['phone'] || $blok_ci_call_info['text'] ){ ?>
			<div class="contact-widget">
				<div class="icon-w-title valign-wrapper">
					<div class="contact-icon">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/contact-icon-03.svg" alt="Contact_Icon">
					</div>
					<!-- /.contact-icon -->
					<div class="contact-title">
						<h6>Call Us</h6>
					</div>
					<!-- /.contact-title -->
				</div>
				<!-- /.icon-w-title -->
				<div class="cell-and-time">
					<a href="tel:<?php echo preg_replace( '/[^0-9]/', '', $blok_ci_call_info['phone'] ); ?>">
						<h4><?php echo $blok_ci_call_info['phone']; ?></h4> <?php echo $blok_ci_call_info['text']; ?>
					</a>
				</div>
				<!-- /.phone-number -->
			</div>
			<!-- /.single-contact-widget -->
			<?php } ?>
			<?php if($blok_ci_email_info['email'] || $blok_ci_email_info['text']){ ?>
			<div class="contact-widget">
				<div class="icon-w-title valign-wrapper">
					<div class="contact-icon">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/contact-icon-02.svg" alt="Contact_Icon">
					</div>
					<!-- /.contact-icon -->
					<div class="contact-title">
						<h6>Email Us</h6>
					</div>
					<!-- /.contact-title -->
				</div>
				<!-- /.icon-w-title -->
				<div class="cell-and-time">
					<a href="mailto:<?php echo $blok_ci_email_info['email']; ?>">
						<h4><?php echo $blok_ci_email_info['email']; ?></h4><?php echo $blok_ci_email_info['text']; ?>
					</a>
				</div>
				<!-- /.phone-number -->
			</div>
			<!-- /.single-contact-widget -->
			<?php } ?>
			<?php if($blok_ci_address['address'] || $blok_ci_address['text'] ){ ?>
			<div class="contact-widget">
				<div class="icon-w-title valign-wrapper">
					<div class="contact-icon">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/contact-icon-01.svg" alt="Contact_Icon">
					</div>
					<!-- /.contact-icon -->
					<div class="contact-title">
						<h6>Address</h6>
					</div>
					<!-- /.contact-title -->
				</div>
				<!-- /.icon-w-title -->
				<div class="cell-and-time">
					<h4><?php echo $blok_ci_address['address']; ?></h4> <?php echo $blok_ci_address['text']; ?>
				</div>
				<!-- /.phone-number -->
			</div>
			<!-- /.single-contact-widget -->
			<?php } ?>
			<div class="clear"></div>
			<!-- /.clear -->
		</div>
		<!-- /.contact-info-widget -->
	</div>
	<!-- /.contact-info-container -->

</div>
