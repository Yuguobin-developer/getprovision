<?php
/**
 * Block Name: Utility Partners
 *
 * The template for displaying the custom gutenberg block named Utility Partners.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package Redica
 * @since 1.0.0
 */

global $wpdb;

// create align class ("alignwide") from block setting ("wide").
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Making the unique ID for the block.
$id = 'block-' . $block['id'];

// Meta fields related to current block.
$block_fields = get_fields( $block['id'] );
$blok_up_icon = $block_fields['blok_up_icon'];
$blok_up_headline = $block_fields['blok_up_headline'];
$blok_up_text = $block_fields['blok_up_text'];
$blok_cl_utility_list_type = $block_fields['utility_partner_type'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-utility-partners">	
    <div class="utility-partners-container">
		<?php if($blok_up_icon){ ?>
		<div class="utility-icon">
			<img src="<?php echo $blok_up_icon; ?>" alt="Icon">
		</div>
		<?php } ?>
		<div class="xxl-3"></div>
		<div class="section-heading center-align">
			<?php if($blok_up_headline){ ?>
				<h2><?php echo $blok_up_headline; ?></h2>
			<?php } ?>
			<?php if($blok_up_text){
				echo $blok_up_text;
			} ?>
		</div>
		<div class="utility-partners-cols">
			<?php 
			if($blok_cl_utility_list_type=='automatic') {
				$blok_cl_utility_partners = $block_fields['utility_partners'];

				if(is_array($blok_cl_utility_partners) && !empty($blok_cl_utility_partners)) {
					foreach($blok_cl_utility_partners as $upkey => $upval) {						
						                                                
                                                $sql_state = $upval['select_state'];
                                                $sql_limit = ($upval['utility_display_limit'] <= 0 ) ? '' : 'LIMIT 0, '.$upval['utility_display_limit'];
                                                
                                                $utility_partners = $wpdb->get_results( $wpdb->prepare("SELECT DISTINCT wp_posts.* FROM wp_posts LEFT JOIN wp_utility_post_data ON ( wp_posts.ID = wp_utility_post_data.post_id ) WHERE 1=1 AND ( ( wp_utility_post_data.state LIKE '%$sql_state%' ) ) AND wp_posts.post_type = 'utilities' AND (wp_posts.post_status = 'publish') ORDER BY wp_posts.menu_order ASC $sql_limit") );
						?>
						<div class="utility-partners-col">
							<?php if($upval['select_state']!="") { ?>
								<h4 class="partners-heding"><?php echo $upval['select_state']; ?></h4>
							<?php } ?>
							<div class="link-boxes">
								<?php 
								if(is_array($utility_partners) && !empty($utility_partners)) { 
									foreach($utility_partners as $uprkey => $uprval) {
										if(!empty(get_field('title',$uprval->ID))) { 
											$title = get_field('title',$uprval->ID);
										} else {
											$title = $uprval->post_title;
										}
								?>
									<div class="link-box">
										<a href="/enroll-step-2/?utility=<?php echo $uprval->post_title; ?>"><?php echo $title; ?></a>
									</div>
								<?php 
									} 
								} 
								?>
							</div>
						</div>
					<?php
					}
				}
				
			} else {
				$blok_cl_utility_group = $block_fields['add_partner'];
				if(is_array($blok_cl_utility_group) && !empty($blok_cl_utility_group)) {
					foreach($blok_cl_utility_group as $ugkey => $ugval) {
				?>
				<div class="utility-partners-col">
					<?php if($ugval['state']!="") { ?>
					<h4 class="partners-heding"><?php echo $ugval['state']; ?></h4>
					<?php } ?>
					<div class="link-boxes">
						<?php 
							if(is_array($ugval['utility_partners']) && !empty($ugval['utility_partners'])) {
								foreach($ugval['utility_partners'] as $upkey => $upval) {
						?>
							<div class="link-box">
								<a href="<?php echo $upval['utility_partner_link']; ?>"><?php echo $upval['utility_partner_name']; ?></a>
							</div>
						<?php } } ?>
					</div>
				</div>
			<?php } } } ?>
			
			<div class="clear"></div>
		</div>
	</div>
</div>
