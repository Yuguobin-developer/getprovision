<?php
/**
 * Block Name: Comparison Table
 *
 * The template for displaying the custom gutenberg block named Comparison Table.
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
$blok_ct_headline = $block_fields['blok_ct_headline'];
$blok_ct_table_head = $block_fields['blok_ct_table_head'];
$blok_ct_table_head_comp = $blok_ct_table_head['competitor'];
$blok_ct_table_head_provision_logo = $blok_ct_table_head['provision_logo'];

$blok_ct_content_rows = $block_fields['blok_ct_content_rows'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-comparison-table">
	<div class="camprision-table-container">
		<?php if($blok_ct_headline){ ?>
			<h2 class="center-align"><?php echo $blok_ct_headline; ?></h2>
		<?php } ?>
		<div class="comparison-table">
			<div class="title-head-row">
				<div class="single-head">
				</div>
				<!-- /.single-head -->
				<?php if($blok_ct_table_head_comp){ ?>
				<div class="single-head off-white center-align">
					<span><?php echo $blok_ct_table_head_comp; ?></span>
				</div>
				<!-- /.single-head -->
				<?php } ?>
				<?php if($blok_ct_table_head_provision_logo){ ?>
				<div class="single-head green-bg center-align">
					<img src="<?php echo $blok_ct_table_head_provision_logo; ?>" alt="provision logo">
				</div>
				<!-- /.single-head --->
				<?php } ?>
				<div class="clear"></div>
				<!-- /.clear -->
			</div>
			<!-- /.title-head-row -->
			<?php if($blok_ct_content_rows){
				foreach ($blok_ct_content_rows as $content ) {
					if($content['competitor']){
						$competitor_img = 'arrow-right';
					} else{
						$competitor_img = 'arrow-false';
					}

					if($content['provision']){
						$provision_img = 'arrow-right';
					} else{
						$provision_img = 'arrow-false';
					}
				?>
			<div class="content-row valign-wrapper">
				<div class="content-row-widget">
					<p><?php echo $content['title']; ?></p>
				</div>
				<!-- /.content-row-widget -->
				<div class="content-row-widget center-align half-row">
					<span>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/<?php echo $competitor_img; ?>.svg" alt="">
					</span>
				</div>
				<!-- /.content-row-widget -->
				<div class="content-row-widget center-align half-row">
					<span>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/<?php echo $provision_img; ?>.svg" alt="">
					</span>
				</div>
				<!-- /.content-row-widget -->
				<div class="clear"></div>
				<!-- /.clear -->
			</div>
			<?php }
			} ?>
		</div>
		<!-- /.comparison-table -->
	</div>
	<!-- /.camprision-table-container -->
</div>
