<?php
/**
 * The template for displaying website footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sample Theme
 * @since 1.0.0
 *
*/

// Include header
get_header();

// Global variables
global $option_fields;
global $pID;
global $fields;

//popup form and titles
$pwrvsn_hero_home_form = $fields['pwrvsn_hero_home_form'];
$pwrvsn_hero_home_form_headline = $pwrvsn_hero_home_form['headline'];
$pwrvsn_hero_home_form_text = $pwrvsn_hero_home_form['text'];
$pwrvsn_hero_home_form_form = $pwrvsn_hero_home_form['form_selection'];

// Schema Markup - Advanced custom fields variables
$schema_locality				= $option_fields['locality'];
$schema_region					= $option_fields['region'];
$schema_postal_code				= $option_fields['postal_code'];
$schema_street_address			= $option_fields['street_address'];
$schema_map_short_link			= $option_fields['map_short_link'];
$schema_latitude				= $option_fields['latitude'];
$schema_longitude				= $option_fields['longitude'];
$schema_business_name			= $option_fields['business_name'];
$schema_opening_hours			= $option_fields['opening_hours'];
$schema_telephone				= $option_fields['telephone'];
$schema_business_email			= $option_fields['business_email'];
$schema_business_image_logo		= $option_fields['business_image_logo'];
$schema_business_legal_name		= $option_fields['business_legal_name'];
$schema_price_range				= $option_fields['price_range'];

// Footer Socials - Advanced custom fields variables
$prvsn_to_ftr_headline			= $option_fields['prvsn_to_ftr_headline'];

// Social Footer Links
$prvsn_to_ftr_social_links			= $option_fields['prvsn_to_ftr_social_links'];
$prvsn_to_ftr_social_links_insta = $prvsn_to_ftr_social_links['instagram'];
$prvsn_to_ftr_social_links_fb = $prvsn_to_ftr_social_links['facebook'];
$prvsn_to_ftr_social_links_tw = $prvsn_to_ftr_social_links['twitter'];

// Communication Methods Footer
$prvsn_to_ftr_communicationmethods			= $option_fields['prvsn_to_ftr_communicationmethods'];
$prvsn_to_ftr_communicationmethods_phone = $prvsn_to_ftr_communicationmethods['phone'];
$prvsn_to_ftr_communicationmethods_email = $prvsn_to_ftr_communicationmethods['email'];
$pwrvsn_header_co_phone_side_text = $prvsn_to_ftr_communicationmethods['online_hours_text'];
$chat_text_main = $prvsn_to_ftr_communicationmethods['chat_text'];
$email_text_main = $prvsn_to_ftr_communicationmethods['email_text'];

$chat_link_type = $prvsn_to_ftr_communicationmethods['linkchat'];
$chat_link_main = $prvsn_to_ftr_communicationmethods['chat_link'];
$chat_code = $prvsn_to_ftr_communicationmethods['chat_code'];

$prvsn_to_ftr_communicationmethods_email_link = $prvsn_to_ftr_communicationmethods['email_link'];


// Footer Menus & Headings
$prvsn_to_ftr_menu1 = $option_fields['prvsn_to_ftr_menu1'];
$prvsn_to_ftr_menu1_headline = $prvsn_to_ftr_menu1['headline'];
$prvsn_to_ftr_menu1_menu = $prvsn_to_ftr_menu1['menu'];

$prvsn_to_ftr_menu2 = $option_fields['prvsn_to_ftr_menu2'];
$prvsn_to_ftr_menu2_headline = $prvsn_to_ftr_menu2['headline'];
$prvsn_to_ftr_menu2_menu = $prvsn_to_ftr_menu2['menu'];

$prvsn_to_ftr_menu3 = $option_fields['prvsn_to_ftr_menu3'];
$prvsn_to_ftr_menu3_headline = $prvsn_to_ftr_menu3['headline'];
$prvsn_to_ftr_menu3_menu = $prvsn_to_ftr_menu3['menu'];

// Footer Subscribe Form
$prvsn_to_ftr_subscribe_form = $option_fields['prvsn_to_ftr_subscribe_form'];
$prvsn_to_ftr_subscribe_form_headline = $prvsn_to_ftr_subscribe_form['headline'];
$prvsn_to_ftr_subscribe_form_form = $prvsn_to_ftr_subscribe_form['form'];
$prvsn_to_ftr_subscribe_form_text = $prvsn_to_ftr_subscribe_form['text'];
$prvsn_to_ftr_copyright_text = $option_fields['prvsn_to_ftr_copyright_text'];
$prvsn_to_ftr_footer_menu = $option_fields['prvsn_to_ftr_footer_menu'];
$prvsn_to_ftr_logos1 = $option_fields['prvsn_to_ftr_logos1'];
$prvsn_to_ftr_logos2 = $option_fields['prvsn_to_ftr_logos2'];

// global
$pwrvsn_header_co_online_timing = $option_fields['pwrvsn_header_co_online_timing'];
$pwrvsn_header_co_offline_timing = $option_fields['pwrvsn_header_co_offline_timing'];

$pwrvsn_header_co_headline = $option_fields['pwrvsn_header_co_headline'];
$pwrvsn_header_co_text = $option_fields['pwrvsn_header_co_text'];

$pwrvsn_header_co_phone = $option_fields['pwrvsn_header_co_phone'];
$pwrvsn_header_co_phone_phone = $pwrvsn_header_co_phone['phone'];
$pwrvsn_header_co_phone_text = $pwrvsn_header_co_phone['text'];
$pwrvsn_header_co_phone_side_text = $pwrvsn_header_co_phone['online_text'];
$pwrvsn_header_co_phone_icon = $pwrvsn_header_co_phone['icon'];

$pwrvsn_header_co_chat = $option_fields['pwrvsn_header_co_chat'];
$pwrvsn_header_co_chat_icon = $pwrvsn_header_co_chat['icon'];
$pwrvsn_header_co_chat_title = $pwrvsn_header_co_chat['title'];
$pwrvsn_header_co_chat_text = $pwrvsn_header_co_chat['text'];
$pwrvsn_header_co_chat_type = $pwrvsn_header_co_chat['linkchat'];
$pwrvsn_header_co_chat_link = $pwrvsn_header_co_chat['link'];
$pwrvsn_header_co_chat_code = $pwrvsn_header_co_chat['chat_code'];

$pwrvsn_header_co_email = $option_fields['pwrvsn_header_co_email'];
$pwrvsn_header_co_email_icon = $pwrvsn_header_co_email['icon'];
$pwrvsn_header_co_email_link = $pwrvsn_header_co_email['link'];
$pwrvsn_header_co_email_linktitle = $pwrvsn_header_co_email_link['title'];
$pwrvsn_header_co_email_linkurl = $pwrvsn_header_co_email_link['url'];
$pwrvsn_header_co_email_title = $pwrvsn_header_co_email['title'];

$pwrvsn_header_co_button = $option_fields['pwrvsn_header_co_button'];

// Online & Offline date
$pwrvsn_header_co_weekend_days = $option_fields['pwrvsn_header_co_weekend_days'];
$pwrvsn_header_co_holidays_rep = $option_fields['pwrvsn_header_co_holidays_rep'];
$pwrvsn_header_co_holidays = $pwrvsn_header_co_holiday_message = array();
foreach($pwrvsn_header_co_holidays_rep as $holiday){
    $pwrvsn_header_co_holidays[] = $holiday['pwrvsn_header_co_holidays'];
    $pwrvsn_header_co_holiday_message[] = $holiday['holiday_offline_message'];
}


$begin = $pwrvsn_header_co_online_timing;
$end = $pwrvsn_header_co_offline_timing;
$date = new DateTime("now", new DateTimeZone('America/Chicago') );

$now_available_class = ' green-text-class ';

$date_new = $date->format('H:i:s');
$date_today = $date->format('m/d/Y');
$day_today = $date->format('l');

if(in_array($date_today,$pwrvsn_header_co_holidays)) {
    $key = array_search($date_today,$pwrvsn_header_co_holidays);
    $pwrvsn_header_co_text = $pwrvsn_header_co_holiday_message[$key];
    $pwrvsn_header_co_headline = $option_fields['pwrvsn_header_co_headline_offline'];
    $pwrvsn_header_co_icon = $option_fields['pwrvsn_header_co_icon_offline'];
    $pwrvsn_header_co_phone_side_text = $pwrvsn_header_co_phone['offline_text'];
    $now_available_class = ' red-text-class ';
}else if(in_array(strtolower($day_today),$pwrvsn_header_co_weekend_days)){
    $pwrvsn_header_co_text = $option_fields['pwrvsn_header_co_text_holidays'];
    $pwrvsn_header_co_headline = $option_fields['pwrvsn_header_co_headline_offline'];
    $pwrvsn_header_co_icon = $option_fields['pwrvsn_header_co_icon_offline'];
    $pwrvsn_header_co_phone_side_text = $pwrvsn_header_co_phone['offline_text'];
    $now_available_class = ' red-text-class ';
}else if ((!($date_new >= $begin && $date_new <= $end))){
    $pwrvsn_header_co_text = $option_fields['pwrvsn_header_co_text_offline'];
    $pwrvsn_header_co_headline = $option_fields['pwrvsn_header_co_headline_offline'];
    $pwrvsn_header_co_icon = $option_fields['pwrvsn_header_co_icon_offline'];
    $pwrvsn_header_co_phone_side_text = $pwrvsn_header_co_phone['offline_text'];
    $now_available_class = ' red-text-class ';
}
$statesServed = $option_fields['select_states'];

/*global theme options for Location Popup text*/
$st1_locationPop_headline = $option_fields['pwrvsn_location_pop_st1_headline'];
$st1_locationPop_sub_headline = $option_fields['pwrvsn_location_pop_st1_sub_headline'];
$st1_locationPop_btn_text = $option_fields['pwrvsn_location_pop_st1_btn_text'];
        
$st2_locationPop_headline = $option_fields['pwrvsn_location_pop_co_headline'];
$st2_locationPop_sub_headline = $option_fields['pwrvsn_location_pop_co_sub_headline'];
$st2_locationPop_btn_text_1 = $option_fields['pwrvsn_location_pop_btn_text_1'];
$st2_locationPop_btn_text_2 = $option_fields['pwrvsn_location_pop_btn_text_2'];
?>

</main>

<?php if(is_page_template( 'templates/template-step-one.php' ) || is_page_template( 'templates/template-step-two.php' ) || is_page_template( 'templates/template-step-three.php' )  || is_page_template( 'templates/template-step-four.php' ) ){ ?>

	<footer class="med-section">
		<div class="wrapper">
			<div class="steps-contact-container">
                            <div class="contact-dropdown-">
                                <div class="dropdown-heading-box center-align">
                                        <!-- <h4>Question?</h4>
                                        <span>We're here to help.</span> -->
                                        <?php if($pwrvsn_header_co_headline){ ?>
                                                <h4><?php echo $pwrvsn_header_co_headline; ?></h4>
                                        <?php } ?>
                                        <span><?php echo $pwrvsn_header_co_text; ?></span>
                                </div>
                                <div class="header-contact-container">
                                        <div class="header-contact">
                                                
                                                <a href="tel:<?php echo preg_replace( '/[^0-9]/', '', $pwrvsn_header_co_phone_phone ); ?>">
                                                        <span class="contact-icon">
                                                                <img src="<?php echo $pwrvsn_header_co_phone_icon; ?>" alt="">
                                                        </span>
                                                        <span>
                                                                <h6> <?php echo $pwrvsn_header_co_phone_phone; ?> </h6>
                                                                <div class="available-btn <?php echo $now_available_class; ?>"><?php echo $pwrvsn_header_co_phone_side_text; ?></div>
                                                                <small><?php echo $pwrvsn_header_co_phone_text; ?></small>
                                                        </span>
                                                </a>
                                        </div>


                                        <div class="header-contact">
                                                
                                                <?php if($pwrvsn_header_co_chat_link=='link') { ?>
													<a href="<?php echo $pwrvsn_header_co_chat_link; ?>">
												<?php } else { ?>
													<a href="javascript:void(0)" onclick="<?php echo $pwrvsn_header_co_chat_code; ?>">
												<?php } ?>
                                                        <span class="contact-icon">
                                                                <img src="<?php echo $pwrvsn_header_co_chat_icon; ?>" alt="">
                                                        </span>
                                                        <span>
                                                                <h6><?php echo $pwrvsn_header_co_chat_title; ?></h6>
                                                                <small><?php echo $pwrvsn_header_co_chat_text; ?></small>
                                                        </span>
                                                </a>
                                        </div>
                                        <div class="header-contact">
                                                
                                            <a target="_blank" href="<?php echo $pwrvsn_header_co_email_linkurl; ?>">
                                                        <span class="contact-icon">
                                                                <img src="<?php echo $pwrvsn_header_co_email_icon; ?>" alt="">
                                                        </span>
                                                        <span>
                                                                <h6><?php echo $pwrvsn_header_co_email_title; ?></h6>
                                                                <small><?php echo $pwrvsn_header_co_email_linktitle; ?></small>
                                                        </span>
                                                </a>
                                        </div>
                                </div>
                            </div>

			</div>
			<!-- /.steps-contact-container -->
			<div class="copyright"> ©<?php echo date('Y'); ?> Provision Power & Gas. All rights reserved. </div>
				<!-- /.copyright -->
		</div>
		<!-- /.wrapper -->
	</footer>
	<div class="xxl-1"></div>

<?php } else{ ?>

<?php get_template_part( 'partials/cta' ); ?>

<footer class="footer">
	<div class="footer-container">
		<div class="wrapper">
			<div class="footer-top valign-wrapper">
				<div class="footer-top-left">
					<div class="footer-logo">
                                            <a href="<?php echo home_url(); ?>">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-logo.svg" alt="">
                                            </a>
					</div>
					<?php if($prvsn_to_ftr_headline){ ?>
						<h3><?php echo $prvsn_to_ftr_headline; ?></h3>
					<?php } ?>
				</div>
				<div class="footer-top-right">
					<div class="footer-socials">
						<?php if($prvsn_to_ftr_social_links_insta){ ?>
							<a href="<?php echo $prvsn_to_ftr_social_links_insta; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/instagram-icon.svg" alt="Instagram"></a>
						<?php } ?>
						<?php if($prvsn_to_ftr_social_links_fb){ ?>
							<a href="<?php echo $prvsn_to_ftr_social_links_fb; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook-icon.svg" alt="Facebook"></a>
						<?php } ?>
						<?php if($prvsn_to_ftr_social_links_tw){ ?>
							<a href="<?php echo $prvsn_to_ftr_social_links_tw; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitter-icon.svg" alt="Twitter"></a>
						<?php } ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="widgets-container">
				<div class="footer-widget contact-widget">
					<?php if($prvsn_to_ftr_communicationmethods_phone){ ?>
						<a href="tel:<?php echo preg_replace( '/[^0-9]/', '', $prvsn_to_ftr_communicationmethods_phone ); ?>" class="footer-call"><?php echo $prvsn_to_ftr_communicationmethods_phone; ?><span class="<?php echo $now_available_class; ?>"><?php echo $pwrvsn_header_co_phone_side_text; ?></span></a><br>
					<?php } ?>
					<?php if($chat_link_type=='link') { ?>
						<a href="<?php echo $chat_link_main; ?>" class="footer-chat"><?php echo $chat_text_main; ?></a><br>
					<?php } else { ?>
						<a href="javascript:void(0)" onclick="<?php echo $chat_code; ?>" class="footer-chat"><?php echo $chat_text_main; ?></a><br>
					<?php } ?>
					<?php if($prvsn_to_ftr_communicationmethods_email){ ?>
						<a href="<?php echo $prvsn_to_ftr_communicationmethods_email_link; ?>" class="footer-email"><?php echo $email_text_main; ?>l</a>
					<?php } ?>
				</div>
				<div class="footer-widget">
					<?php if($prvsn_to_ftr_menu1_headline){ ?>
						<h5><?php echo $prvsn_to_ftr_menu1_headline; ?></h5>
					<?php } ?>
					<?php echo $prvsn_to_ftr_menu1_menu; ?>
				</div>
				<div class="footer-widget">
					<?php if($prvsn_to_ftr_menu2_headline){ ?>
						<h5><?php echo $prvsn_to_ftr_menu2_headline; ?></h5>
					<?php } ?>
					<?php echo $prvsn_to_ftr_menu2_menu; ?>
				</div>
				<div class="footer-widget">
					<?php if($prvsn_to_ftr_menu3_headline){ ?>
						<h5><?php echo $prvsn_to_ftr_menu3_headline; ?></h5>
					<?php } ?>
					<?php echo $prvsn_to_ftr_menu3_menu; ?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="footer-cta-container">
				<?php if($prvsn_to_ftr_subscribe_form_headline){ ?>
					<h5><?php echo $prvsn_to_ftr_subscribe_form_headline; ?></h5>
				<?php } ?>
				<div class="valign-wrapper">
					<?php if($prvsn_to_ftr_subscribe_form_form){ ?>
					<div class="footer-subscribe">
						<?php echo do_shortcode( '[gravityform id="' . $prvsn_to_ftr_subscribe_form_form . '" title=false description=false ajax=true]' ); ?>
					</div>
					<?php } ?>
					<?php if($prvsn_to_ftr_subscribe_form_text){ ?>
					<div class="footer-cta-text">
						<?php echo $prvsn_to_ftr_subscribe_form_text; ?>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="copyright"> <?php echo $prvsn_to_ftr_copyright_text; ?>
				<?php	if ( is_page_template( 'templates/template-home.php' ) ) { ?>
					<span class="sitebyglide">
						 - Site by <a href="https://www.glidedesign.com/">Glide</a>
					</span> <!-- /.sitebyglide -->
				<?php } ?>
				</div>

				<div class="footer-menu">
					<?php echo $prvsn_to_ftr_footer_menu; ?>
				</div>
				<div class="footer-logos">
					<?php if($prvsn_to_ftr_logos1){ ?>
						<span class="f-b-logo"><img src="<?php echo $prvsn_to_ftr_logos1; ?>" alt=""></span>
					<?php } ?>
					<?php if($prvsn_to_ftr_logos2){ ?>
						<span class="f-b-logo"><img src="<?php echo $prvsn_to_ftr_logos2; ?>" alt=""></span>
					<?php } ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "Restaurant",
			"address": {
				"@type": "PostalAddress",
				"addressLocality": "<?php echo $schema_locality; ?> ",
				"addressRegion": "<?php echo  $schema_region;?> ",
				"postalCode": "<?php echo  $schema_postal_code;?> ",
				"streetAddress": "<?php echo $schema_street_address; ?> "
			},

			"hasMap": "<?php echo $schema_map_short_link; ?>",
			"geo": {
				"@type": "GeoCoordinates",
				"latitude": "<?php echo $schema_latitude; ?> ",
				"longitude": "<?php echo $schema_longitude; ?> "
			},

			"name": "<?php echo $schema_business_name; ?>",

			"openingHours": [
				<?php echo $schema_opening_hours; ?>
			],

			"telephone": "<?php echo  $schema_telephone;?> ",
			"email": "<?php echo $schema_business_email; ?> ",
			"url": "<?php echo esc_url( home_url() ) ; ?>",
			"image": "<?php echo $schema_business_image_logo; ?> ",
			"legalName": "<?php echo $schema_business_legal_name; ?> ",
			"priceRange":"<?php echo $schema_price_range; ?>"
		}
	</script>
</footer>

<?php } ?>

<?php
if(is_page('enroll-step-3')){
	parse_str(base64_decode($_GET['k']), $output);
	if(isset($output['zipcode']))  {
	?>
	<script>
		 jQuery( document ).ready(function($){
		var date = new Date();
		$.getJSON('https://maps.googleapis.com/maps/api/geocode/json?address=<?php echo $output['zipcode'] ?>&key=AIzaSyA_dFAj4f_AQt950YtFM4syoaqwGhZ848w&type=json&_=' + date.getTime()  , function(response){

		var address_components = response.results[0].address_components;
		$.each(address_components, function(index, component){
			var types = component.types;
			$.each(types, function(index, type){
				if(type == "locality") {
					city = component.long_name;
				}
				if(type == "administrative_area_level_1") {
					state_shortname = component.short_name;
					state_longname = component.long_name;
				}
			});
		});

		$("#input_5_22").val(state_longname);
		$("#input_5_23").val(city);

	});
	});
	</script>
<?php } } ?>

<?php wp_footer(); ?>
        
        <div id="location-subscribe" class="homepage-banner-popup mfp-hide user-pop">
             <div class="wrapper">
                <div class=" popup-box">
                     <a class="cross-button mfp-close"></a>
                    <div class="popup-first-step">
                        <h2><?= $st1_locationPop_headline ?></h2>
                            <p><?= $st1_locationPop_sub_headline ?></p>
                            <div class="site-user-img user-max-site"> 
                            	<img src="/wp-content/themes/provision/assets/img/site-name.svg" width="452" height="212" />
                            </div>
                            <div class="get-started-form">
                                <div class="gf_browser_chrome gform_wrapper" id="">
                                    
                                    <input name="_Latitude" id="_Latitude" type="hidden" value="">
                                    <input name="_Longitude" id="_Longitude" type="hidden" value="">
                                    <input name="_Accuracy" id="_Accuracy" type="hidden" value="">
                                    <input type="hidden" name="state" id="state" value="">
                                    <input type="hidden" name="city" id="city" value="">
                                    <input type="hidden" name="zipcode" id="zipcode" value="">
                                    <button type="button" id="geolocationGo" class="button red-button"><?= $st1_locationPop_btn_text ?></button>
                                </div>
                            </div>
                    </div>
                    <div class="popup-second-step" style="display: none;">
                        <h1><?= $st2_locationPop_headline ?></h1>
                        <h3><?= $st2_locationPop_sub_headline ?><span id="serve-in-city"></span></h3>
                        <div class="user-good-news">
	                        <div class="row">
	                            <div class="col s12 m12 l6">
	                            	<div class="icon-card">
                            			<div class="card-ic">
                            				<img src="/wp-content/themes/provision/assets/img/green-energy-trees.svg" width="156" height="156" />
                            			</div>
	                            		<a href="/ohio/" id="about-anergy-choice" class="button green-button"><?= $st2_locationPop_btn_text_1 ?></a>
	                            	</div>	                                
	                            </div>
	                            <div class="col s12 m12 l6">
	                            	<div class="icon-card">
                            			<div class="card-ic">
                            				<img src="/wp-content/themes/provision/assets/img/enegy-plan.svg" width="156" height="156" />
                            			</div>
	                            		<a id="clean-anergy-plan" class="button red-button"><?= $st2_locationPop_btn_text_2 ?></a>
	                            	</div>
	                               
	                            </div>
	                        </div>
                        </div>
                    </div>
                     <div class="popup-default-step" style="display: none;">
                        <div class="homepage-banner-popup">
                            <div class="wrapper">
                                <h2><?php echo $pwrvsn_hero_home_form_headline; ?></h2>
                                <p><?php echo $pwrvsn_hero_home_form_text; ?></p>
                                <div class="get-started-form">
                                <?php echo do_shortcode( '[gravityform id="' . $pwrvsn_hero_home_form_form . '" title=false description=false ajax=true]' ); ?>
                                </div>
                                    
                            </div>
                        </div>
                    </div>
                <input type="hidden" name="service_states" id="service_states" value='<?= $statesServed ?>'>
                </div>
             </div>			
        </div>
</body>

</html>
