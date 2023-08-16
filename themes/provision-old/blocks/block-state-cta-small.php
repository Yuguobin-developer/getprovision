<?php
/**
 * Block Name: State CTA Small
 *
 * The template for displaying the custom gutenberg block named State CTA Small.
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
$blok_scs_headline = $block_fields['blok_scs_headline'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-state-cta-small">

	<div class=" valign-wrapper">
		<div class="state-cta-left">
			<?php if($blok_scs_headline){ ?>
				<h4><?php echo $blok_scs_headline; ?></h4>
			<?php } ?>
		</div>
		<div class="state-cta-right">
			<div class="cta-newsletter">
				<div class="gf_browser_chrome gform_wrapper" id="gform_wrapper_1">
					<div id="gf_1" class="gform_anchor" tabindex="-1"></div>
					<form method="post" enctype="multipart/form-data" target="gform_ajax_frame_1" id="gform_1"
						action="/#gf_1">
						<div class="gform_body">
							<ul id="gform_fields_1"
								class="gform_fields top_label form_sublabel_below description_below">
								<li id="field_1_1"
									class="gfield subscriber-field field_sublabel_below field_description_below gfield_visibility_visible">
									<label class="gfield_label" for="input_1_1"></label>
									<div class="ginput_container ginput_container_email">
										<input name="input_1" id="input_1_1" type="text" value="" class="large"
											placeholder="Enter zip code" aria-invalid="false">
									</div>
								</li>
							</ul>
						</div>
						<div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_1"
								class="gform_button button" value="See clean energy plans"
								onclick="if(window[&quot;gf_submitting_1&quot;]){return false;}  window[&quot;gf_submitting_1&quot;]=true;  "
								onkeypress="if( event.keyCode == 13 ){ if(window[&quot;gf_submitting_1&quot;]){return false;} window[&quot;gf_submitting_1&quot;]=true;  jQuery(&quot;#gform_1&quot;).trigger(&quot;submit&quot;,[true]); }">
							<input type="hidden" name="gform_ajax"
								value="form_id=1&amp;title=&amp;description=&amp;tabindex=0">
							<input type="hidden" class="gform_hidden" name="is_submit_1" value="1">
							<input type="hidden" class="gform_hidden" name="gform_submit" value="1">
							<input type="hidden" class="gform_hidden" name="gform_unique_id" value="">
							<input type="hidden" class="gform_hidden" name="state_1"
								value="WyJbXSIsIjUyNWQzZDhjZGM3YzBkMTA2YzgzYWZhNmRlODkzY2U2Il0=">
							<input type="hidden" class="gform_hidden" name="gform_target_page_number_1"
								id="gform_target_page_number_1" value="0">
							<input type="hidden" class="gform_hidden" name="gform_source_page_number_1"
								id="gform_source_page_number_1" value="1">
							<input type="hidden" name="gform_field_values" value="">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>

</div>
