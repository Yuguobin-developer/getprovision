<?php
/**
 * Block Name: FAQ
 *
 * The template for displaying the custom gutenberg block named FAQ.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package Redica
 * @since 1.0.0
 */

global $option_fields;

// create align class ("alignwide") from block setting ("wide").
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Making the unique ID for the block.
$id = 'block-' . $block['id'];

// Meta fields related to current block.
$block_fields = get_fields( $block['id'] ); 

$contact_headline = $block_fields['contact_headline'];
$contact_subheadline = $block_fields['contact_subheadline'];
$contact_headline_offline = $block_fields['contact_headline_offline'];
$contact_subheadline_offline = $block_fields['contact_subheadline_offline'];
$call_icon = $block_fields['call_icon'];
$call_hover_icon = $block_fields['call_hover_icon'];
$call_text = $block_fields['call_text'];
$phone_number = $block_fields['phone_number'];

$prvsn_to_ftr_communicationmethods_steps    = $option_fields['prvsn_to_ftr_communicationmethods_steps'];


$chat_icon = $block_fields['chat_icon'];
$chat_hover_icon = $block_fields['chat_hover_icon'];
$chat_text = $block_fields['chat_text'];
$chat_link = $block_fields['chat_link'];
$email_icon = $block_fields['email_icon'];
$email_hover_icon = $block_fields['email_hover_icon'];
$email_text = $block_fields['email_text'];
$email_address = $block_fields['email_address'];
$phone_message_text = $block_fields['call_message_online'];

$now_available_class = ' green-text-class ';

//values from footer options
$prvsn_to_ftr_communicationmethods  = $option_fields['prvsn_to_ftr_communicationmethods'];



// global
$pwrvsn_header_co_online_timing = $option_fields['pwrvsn_header_co_online_timing'];
$pwrvsn_header_co_offline_timing = $option_fields['pwrvsn_header_co_offline_timing'];
// Online & Offline date
$pwrvsn_header_co_weekend_days      = $option_fields['pwrvsn_header_co_weekend_days'];
$pwrvsn_header_co_holidays_rep      = $option_fields['pwrvsn_header_co_holidays_rep'];
$pwrvsn_header_co_holidays          = array();
foreach($pwrvsn_header_co_holidays_rep as $holiday){
    $pwrvsn_header_co_holidays[] = $holiday['pwrvsn_header_co_holidays'];
}


$begin  = $pwrvsn_header_co_online_timing;
$end    = $pwrvsn_header_co_offline_timing;
$date   = new DateTime("now", new DateTimeZone('America/Chicago') );

$now_available_class = ' green-text-class ';

$date_new = $date->format('H:i:s');
$date_today = $date->format('m/d/Y');
$day_today = $date->format('l');

if ( in_array($date_today,$pwrvsn_header_co_holidays) || in_array(strtolower($day_today),$pwrvsn_header_co_weekend_days) || (!($date_new >= $begin && $date_new <= $end)) ){

    $contact_headline = $block_fields['contact_headline_offline'];
    $contact_subheadline = $block_fields['contact_subheadline_offline'];
    $phone_message_text = $block_fields['call_message_offline'];
    $now_available_class = ' red-text-class ';

}

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-contact-details">
	<div class="wrapper"><?php 
		if(!empty($contact_headline)){ ?>
			<h2><?php echo $contact_headline; ?></h2><?php 
		}
		if(!empty($contact_subheadline)){ ?>
			<p><?php echo $contact_subheadline; ?></p><?php 
		}?>
		<section class="contact-details">
			<div class="contact-details-columns">
				<div class="contact-column">
					<div class="inner-wrapper">
						<a href="tel:<?php echo $phone_number; ?>" class="contact-link">
                            <span class="<?php echo $now_available_class; ?>"><?php echo $phone_message_text; ?></span>
							<div class="contact-detail">
								<div class="contact-image">
									<img src="<?php echo $call_icon; ?>">
								</div>
								<div class="contact-hover-image">
									<img src="<?php echo $call_hover_icon; ?>">
								</div>
								<h6 class="contact-title"><?php echo $call_text; ?></h6>
							</div>
						</a>
					</div>
				</div>
				<div class="contact-column">
					<div class="inner-wrapper">
						<a href="<?= $chat_link ?>" class="contact-link">
							<div class="contact-detail">
								<div class="contact-image">
									<img src="<?php echo $chat_icon; ?>">
								</div>
								<div class="contact-hover-image">
									<img src="<?php echo $chat_hover_icon; ?>">
								</div>
								<h6 class="contact-title"><?php echo $chat_text; ?></h6>
							</div>
						</a>
					</div>
				</div>
				<div class="contact-column">
					<div class="inner-wrapper">
						<a href="<?php echo $email_address; ?>" class="contact-link">
							<div class="contact-detail">
								<div class="contact-image">
									<img src="<?php echo $email_icon; ?>">
								</div>
								<div class="contact-hover-image">
									<img src="<?php echo $email_hover_icon; ?>">
								</div>
								<h6 class="contact-title"><?php echo $email_text; ?></h6>
							</div>
						</a>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>