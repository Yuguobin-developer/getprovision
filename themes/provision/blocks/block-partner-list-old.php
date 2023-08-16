<?php
/**
 * Block Name: Partner List
 *
 * The template for displaying the custom gutenberg block named Partner List.
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
$blok_pl_headline = $block_fields['blok_pl_headline'];
$blok_pl_select_variation = $block_fields['blok_pl_select_variation'];
$blok_pl_icon = $block_fields['blok_pl_icon'];
$blok_pl_title = $block_fields['blok_pl_title'];
$blok_pl_top_spacing = $block_fields['blok_pl_top_spacing'];
$contains_icon_class = null;
if($blok_pl_select_variation != 'icon' ){
	$contains_icon_class = ' pd-top ';
}

global $post;
$lp_select_posts = array();
if($block_fields['logo_selection']=='manually') {
	$lp_select_posts = $block_fields['blok_pl_logos'];
	//echo "<pre>"; print_r($lp_select_posts); exit;
} else if($block_fields['logo_selection']=='automatic') {
	$lp_utility_type = $block_fields['utility_selection']['select_utility_type'];
	$lp_utility_state = $block_fields['utility_selection']['state'];
	$lp_utility_display_limit = $block_fields['utility_selection']['utility_display_limit'];
		
	$args = array(
		'posts_per_page'	=> $lp_utility_display_limit,
		'post_type'		=> 'utilities',
		'meta_query'	=> array(
			'relation'		=> 'AND',
			array(
				'key'		=> 'zipcodes_$_state',
				'value'		=> $lp_utility_state,
				'compare'   => 'LIKE'
			),
		),
		'tax_query' => array(
			array(
				'taxonomy' => 'type',
				'terms'    => $lp_utility_type,
			),
		),
	);
	
	$the_query = new WP_Query( $args );
	$lp_select_posts = $the_query->posts;
	//echo "<pre>";print_r($lp_select_posts); exit;
}
?>
<div id="<?= $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-partner-list">
	<?php if($blok_pl_select_variation == 'icon' && $blok_pl_icon){ ?>
		<div class="xxl-3"></div>
		<div class="utility-icon">
			<img src="<?php echo $blok_pl_icon; ?>" alt="Icon">
		</div>
	<?php } ?>
	<?php if($blok_pl_top_spacing) { ?>
		<div class="xxl-3"></div>
	<?php } ?>
	<div class="partner-list-container <?php echo $contains_icon_class; ?>">
		<?php if($blok_pl_headline){ ?>
			<h2 class="center-align"><?php echo $blok_pl_headline; ?></h2>
		<?php } ?>
		<div class="partner-list">
			<?php if($blok_pl_title){ ?>
				<h4><?php echo $blok_pl_title; ?></h4>
			<?php } ?>
			<?php if ( $lp_select_posts ) {
					foreach ( $lp_select_posts as $lp_posts ) {
						$post = $lp_posts;
						setup_postdata( $post );
						$pID         = $post->ID;
						$post_fields = get_fields( $pID );
						$provsn_spd_link  = site_url( '/enroll-step-2/?utility='.get_the_title());
			?>
					<div class="partner-logo-widget center-align">
					<a <?php if($provsn_spd_link){ ?>href="<?php echo $provsn_spd_link; ?>" <?php } ?> target="_blank">
						<span>
							<?php if ( has_post_thumbnail() ) {
								the_post_thumbnail('full');
							} ?>
						</span>
					</a>
					</div>
					<!-- /.partner-logo-widget -->
			<?php }
			} wp_reset_query();?>
			<div class="clear"></div>
		</div>
		<!-- /.partner-list -->
	</div>
	<!-- /.partner-list-container -->
</div>
