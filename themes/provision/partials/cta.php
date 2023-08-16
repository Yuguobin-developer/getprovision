<?php
/**
 * Template part for footer cta
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/
 *
 * @package Redica
 * @since 1.0.0
 */

// Global variables
global $option_fields;
global $pID;
global $fields;


$prvsn_to_ftr_cta_form = $option_fields['prvsn_to_ftr_cta_form'];
$prvsn_to_ftr_cta_form_headline = $prvsn_to_ftr_cta_form['headline'];
$prvsn_to_ftr_cta_form_sub_headline = $prvsn_to_ftr_cta_form['sub_headline'];
$prvsn_to_ftr_cta_form_cta_btn_text = $prvsn_to_ftr_cta_form['cta_btn_text'];
$prvsn_to_ftr_cta_form_cta_btn_link = $prvsn_to_ftr_cta_form['cta_btn_link'];
$prvsn_to_ftr_cta_form_form = $prvsn_to_ftr_cta_form['form'];

?>
	<section>
		<div class="wrapper">
			<div class="get-started valign-wrapper">
				<div class="get-started-content">
					<h2><?= $prvsn_to_ftr_cta_form_headline ?></h2>
					<a href="<?= $prvsn_to_ftr_cta_form_cta_btn_link ?>" class="button red-button"><?= $prvsn_to_ftr_cta_form_cta_btn_text ?></a>
				</div>
				<div class="get-started-form">
					<h5><?= $prvsn_to_ftr_cta_form_sub_headline ?></h5>
                                        <div class="form-wrapper">
                                            <?php echo do_shortcode( '[gravityform id="' . $prvsn_to_ftr_cta_form_form . '" title=false description=false ajax=true]' ); ?>
                                        </div>
				</div>
			</div>
		</div>
	</section>
