<?php
/**
 * The template for displaying website header
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sample Theme
 * @since 1.0.0
 */

// Global variables
global $option_fields;
global $pID;
global $fields;
$pID = get_the_ID();

if ( is_home() ) {
	$pID = get_option( 'page_for_posts' );
}

if ( is_404() || is_archive() || is_search() ) {
	$pID = get_option( 'page_on_front' );
}

$option_fields = get_fields( 'option' );
$fields        = get_fields( $pID );

$body_class  = null;
if(is_page_template( 'templates/template-home.php' )) {
	// Page variables - Advanced custom fields variables
	$pwrvsn_hero_home_variation = $fields['pwrvsn_hero_home_variation'];
	$body_class= null;
	if($pwrvsn_hero_home_variation == 'Second'){
		$body_class = ' home-b ';
	} else{
		$body_class= null;
	}
}

if(is_page_template( 'templates/template-step-one.php' ) || is_page_template( 'templates/template-step-two.php' ) || is_page_template( 'templates/template-step-three.php' ) || is_page_template( 'templates/template-step-four.php' ) ){
	$body_class = ' greenish-bg-body ';
}

$pwrvsn_header_co_icon = $option_fields['pwrvsn_header_co_icon'];
$pwrvsn_header_co_headline = $option_fields['pwrvsn_header_co_headline'];
$pwrvsn_header_co_text = $option_fields['pwrvsn_header_co_text'];

// Online & Offline timing
$pwrvsn_header_co_online_timing = $option_fields['pwrvsn_header_co_online_timing'];
$pwrvsn_header_co_offline_timing = $option_fields['pwrvsn_header_co_offline_timing'];

$pwrvsn_header_co_phone = $option_fields['pwrvsn_header_co_phone'];
$pwrvsn_header_co_phone_icon = $pwrvsn_header_co_phone['icon'];
$pwrvsn_header_co_phone_mobile_icon = $pwrvsn_header_co_phone['mobile_icon'];
$pwrvsn_header_co_phone_phone = $pwrvsn_header_co_phone['phone'];
$pwrvsn_header_co_phone_text = $pwrvsn_header_co_phone['text'];
$pwrvsn_header_co_phone_side_text = $pwrvsn_header_co_phone['online_text'];

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
$now_available_class = ' green-text-class ';

$date = new DateTime("now", new DateTimeZone('America/Chicago') );

$begin = $pwrvsn_header_co_online_timing;
$end = $pwrvsn_header_co_offline_timing;

$date_new = $date->format('H:i');
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
?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />

	<script>
	// Identifies the Browser type in the HTML tag for specific browser CSS
	var doc = document.documentElement;
	doc.setAttribute('data-useragent', navigator.userAgent);
	doc.setAttribute("data-platform", navigator.platform);
	</script>
	
<meta name="google-site-verification" content="QbLs3_Qc1n1PoHuHsthHnDHxiQWVYLCGpVb8dYevkXw" />

	<?php wp_head(); ?>
</head>

<body <?php body_class($body_class); ?>>
    <?php
    if (is_page_template( 'templates/template-step-one.php' ) || is_page_template( 'templates/template-step-two.php' ) || is_page_template( 'templates/template-step-three.php' ) || is_page_template( 'templates/template-step-four.php' )  ){
        echo '<div class="bg-width"></div>';
    }
    ?>

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'theme_textdomain' ); ?></a>

	<?php if(is_page_template( 'templates/template-step-one.php' ) || is_page_template( 'templates/template-step-two.php' ) || is_page_template( 'templates/template-step-three.php' ) || is_page_template( 'templates/template-step-four.php' )  ){ ?>
		<header class="step-header">
			<div class="big-wrapper">
				<div class="left-header">
					<div class="logo">
						<a href="<?php echo home_url(  ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Site Logo"></a>
					</div>
					<div class="login-icon desktop-hide" target="_blank"><img src="<?php echo $pwrvsn_header_co_icon; ?>" alt="">

					</div>
					<div class="contact-dropdown m-contact-dropdown">
							<div class="dropdown-heading-box center-align">
								<?php if($pwrvsn_header_co_headline){ ?>
									<h4><?php echo $pwrvsn_header_co_headline; ?></h4>
								<?php } ?>
							<span><?php echo $pwrvsn_header_co_headline_offline; ?></span>
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
									<!-- <a href="#">
										<span class="contact-icon">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/img/chat-icon.svg" alt="">
										</span>
										<span>
											<h6>Chat with Us</h6>
											<small>Ornare quam nunc in dui magna</small>
										</span>
									</a> -->
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
									<!-- <a href="#">
										<span class="contact-icon">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/img/mail-icon.svg" alt="">
										</span>
										<span>
											<h6>Email Us</h6>
											<small>Volutpat ligula orci blandit</small>
										</span>
									</a> -->
									<a href="<?php echo $pwrvsn_header_co_email_linkurl; ?>">
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
					<div class="clear"></div>
				</div>
				<!--add days section-->
				<div class="right-header">
					<div class="menu-overlay">
						<div class="menu-container">
							<div class="menu-content">
								<div class="header-btns">
									<div class="login-icon" target="_blank"><img src="<?php echo $pwrvsn_header_co_icon; ?>" alt="">
										<div class="contact-dropdown">
											<div class="dropdown-heading-box center-align">
												<!-- <h4>Question?</h4>
												<span>We're here to help.</span> -->
												<?php if($pwrvsn_header_co_headline){ ?>
													<h4><?php echo $pwrvsn_header_co_headline; ?></h4>
												<?php } ?>
												<span><?php// echo $pwrvsn_header_co_headline_offline; ?></span>
												<span><?php echo $pwrvsn_header_co_text; ?></span>
											</div>
											<div class="header-contact-container">
												<div class="header-contact">
													<!-- <a href="#">
														<span class="contact-icon">
															<img src="<?php echo get_template_directory_uri(); ?>/assets/img/call-icon.svg" alt="">
														</span>
														<span>
															<h6> 800-930-5427 </h6>
															<small>Mon - Fri 8:00 a.m. - 6:30 p.m. CST</small>
														</span>
													</a> -->
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
													<!-- <a href="#">
														<span class="contact-icon">
															<img src="<?php echo get_template_directory_uri(); ?>/assets/img/chat-icon.svg" alt="">
														</span>
														<span>
															<h6>Chat with Us</h6>
															<small>Ornare quam nunc in dui magna</small>
														</span>
													</a> -->
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
													<!-- <a href="#">
														<span class="contact-icon">
															<img src="<?php echo get_template_directory_uri(); ?>/assets/img/mail-icon.svg" alt="">
														</span>
														<span>
															<h6>Email Us</h6>
															<small>Volutpat ligula orci blandit</small>
														</span>
													</a> -->
													<a href="<?php echo $pwrvsn_header_co_email_linkurl; ?>">
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
									<a href="#" class="cell-nmber">1-800-930-5427</a>
								</div>
								<!-- /.header-btns -->
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<!-- /.wrapper -->
		</header>
	<?php } else{ ?>

	<header class="site-header">
		<div class="big-wrapper">
			<div class="left-header">
				<div class="logo">
					<a href="<?php echo home_url(  ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Site Logo"></a>
				</div>
				<div class="mobile-logo">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/header-white-logo.svg" alt="Site Logo">
				</div>
				<div class="login-icon desktop-hide" target="_blank"><img src="<?php echo $pwrvsn_header_co_icon; ?>" alt="">
				</div>
				<div class="contact-dropdown m-contact-dropdown">
						<div class="dropdown-heading-box center-align">
							<?php if($pwrvsn_header_co_headline){ ?>
								<h4><?php echo $pwrvsn_header_co_headline; ?></h4>
							<?php } ?>
							<span><?php// echo $pwrvsn_header_co_headline_offline; ?></span>
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
								<a href="<?php echo $pwrvsn_header_co_email_linkurl; ?>">
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
				<div class="clear"></div>
			</div>
			<div class="right-header">
				<div class="menu-overlay">
					<div class="menu-container">
						<div class="menu-content">
							<div class="main-menu">
								<?php
									wp_nav_menu(
										array(
										'theme_location' => 'main',
										'fallback_cb' => 'fallbackmenu1',
										)
									);
								?>
							</div>
							<div class="header-btns">
								<div class="login-icon" target="_blank"><img src="<?php echo $pwrvsn_header_co_icon; ?>" alt="">
									<div class="contact-dropdown">
										<div class="dropdown-heading-box center-align">
											<?php if($pwrvsn_header_co_headline){ ?>
												<h4><?php echo $pwrvsn_header_co_headline; ?></h4>
											<?php } ?>
											<span><?php// echo $pwrvsn_header_co_headline_offline; ?></span>
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
											<!--print section here-->
											
											<div class="header-contact">
												<a href="<?php echo $pwrvsn_header_co_email_linkurl; ?>">
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

								<div class="search-area">
									<div class="serach-bar">
										<img alt="" src="<?php echo get_template_directory_uri(); ?>/assets/img/search-icon.svg">
									</div>
								</div>

								<?php
									if( $pwrvsn_header_co_button ) :
										echo build_acf_button( $pwrvsn_header_co_button, 'button' );
									endif;
								?>
								<div class="mobile-widget desktop-hide">
									<div class="mobile-call">
										<a href="tel:+<?php echo preg_replace( '/[^0-9]/', '', $pwrvsn_header_co_phone_phone ); ?>"><?php echo $pwrvsn_header_co_phone_phone; ?></a>
									</div>
									<div class="mobile-timing"><?php echo $pwrvsn_header_co_phone_text; ?></div>
									<div class="available-btn <?php echo $now_available_class; ?>"><?php echo $pwrvsn_header_co_phone_side_text; ?></div>
									<div class="more-contact">
										<div class="contact-title"> More Contacts </div>
										<div class="mobile-more-contact">
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
												<a href="<?php echo $pwrvsn_header_co_email_linkurl; ?>">
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
							</div>
							<!-- /.header-btns -->
							<div class="header-search-container">
								<div class="search-form-header">
									<form role="search" method="get" id="searchform" action="<?php echo home_url(  ); ?>">
										<div id="search-top">
											<input type="text" id="s" class="search-input" name="s" value="" placeholder="Search anything">
											<div class="clear"></div>
										</div>
									</form>
									<div class="search-close">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/close-icon.svg" alt="">
									</div>
									<div class="clear"></div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				<div class="menu-btn">
					<span class="top"></span>
					<span class="middle"></span>
					<span class="bottom"></span>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<!-- /.wrapper -->
	</header>

	<?php } 
        
        
        ?>

	<main id="content" class="site-content">

		<?php
		/**
		 * Include masthead
		 *
		 * Contains masthead settings for each type and template for the theme
		 */
		get_template_part( 'partials/masthead' );
		?>
