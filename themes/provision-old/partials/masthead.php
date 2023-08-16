<?php
/**
 * Template part for displaying content of about us page.
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
$pwrvsn_hero_home_form = $fields['pwrvsn_hero_home_form'];
$pwrvsn_hero_home_form_headline = $pwrvsn_hero_home_form['headline'];
$pwrvsn_hero_home_form_text = $pwrvsn_hero_home_form['text'];
$pwrvsn_hero_home_form_form = $pwrvsn_hero_home_form['form_selection'];

?>
<?php

/**
 * Homepage Masthead
 */
if ( is_page_template( 'templates/template-home.php' ) ) {
	$pwrvsn_hero_home_variation = $fields['pwrvsn_hero_home_variation'];
	$pwrvsn_hero_home_headline = $fields['pwrvsn_hero_home_headline'];
	if ( ! $pwrvsn_hero_home_headline ) {
		$pwrvsn_hero_home_headline = get_the_title();
	}
	$pwrvsn_hero_home_text               = $fields['pwrvsn_hero_home_text'];
	$pwrvsn_hero_home_banner_form               = $fields['pwrvsn_hero_home_banner_form'];
        $pwrvsn_hero_home_form               = $fields['pwrvsn_hero_home_form'];
	$pwrvsn_hero_home_statistics               = $fields['pwrvsn_hero_home_statistics'];
	$pwrvsn_hero_home_bg_image               = $fields['pwrvsn_hero_home_bg_image'];

	$pwrvsn_hero_home_intro               = $fields['pwrvsn_hero_home_intro'];
	$pwrvsn_hero_home_intro_title = $pwrvsn_hero_home_intro['title'];
	$pwrvsn_hero_home_intro_text = $pwrvsn_hero_home_intro['text'];
	$pwrvsn_hero_home_intro_button = $pwrvsn_hero_home_intro['button'];
	$pwrvsn_hero_home_intro_icon = $pwrvsn_hero_home_intro['icon'];

	if($pwrvsn_hero_home_variation == 'First'){ ?>
	<section>
		<div class="home-banner-container">
			<div class="wrapper">
				<div class="home-banner-inner">
					<div class="home-banner-right">
						<div class="banner-video">
							<video id="video" class="hero__video" muted="" preload="metadata" autoplay=""
								style="transition: opacity 2s ease 0s; opacity: 1;">
								<source class="video__source" type="video/mp4" src="<?php echo $pwrvsn_hero_home_bg_image; ?>">
								<p>Your browser doesn't support HTML5 video. Here is a <a
										href="#">link to the
										video</a> instead.</p>
							</video>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/home-hero-mobile.png" alt="" class="home-hero-mobile">
						</div>
					</div>
					<div class="home-banner-left">
						<h1><?php echo $pwrvsn_hero_home_headline; ?></h1>
						<div class="banner-intro">
							<?php if($pwrvsn_hero_home_text){
								echo $pwrvsn_hero_home_text;
							} ?>
						</div>
						<?php if($pwrvsn_hero_home_banner_form){ ?>
						<div class="hero-form">
							<div class="cta-newsletter">
								<?php echo do_shortcode( '[gravityform id="' . $pwrvsn_hero_home_banner_form . '" title=false description=false ajax=true]' ); ?>
							</div>
						</div>
						<?php } ?>
						<?php if($pwrvsn_hero_home_statistics){ ?>
						<div class="hero-stats">
							<?php foreach ($pwrvsn_hero_home_statistics as $stat ) {
								$stat_icon = $stat['icon'];
								$stat_title = $stat['title'];
								?>
							<div class="single-stats">
								<?php if($stat_icon){ ?>
								<span class="stats-icon">
									<img src="<?php echo $stat_icon; ?>" alt="<?php echo $stat_title; ?>">
								</span>
								<?php } ?>
								<span class="stats-title">
									<span><?php echo $stat_title; ?></span>
							</div>
							<?php } ?>
							<div class="clear"></div>
						</div>
						<?php } ?>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<!-- /.home-banner-container -->
	</section>
	<section class="home-intro-section">
		<div class="wrapper">
			<div class="home-intro-inner">
				<div class="home-intro-icon">
				<div class="intro-animation">
				</div>
					<img src="<?php echo $pwrvsn_hero_home_intro_icon; ?>" alt="">
				</div>
				<div class="lead-paragraph-container">
					<div class="section-heading">
						<?php if($pwrvsn_hero_home_intro_title){ ?>
							<h2><?php echo $pwrvsn_hero_home_intro_title; ?></h2>
						<?php } ?>
						<?php if($pwrvsn_hero_home_intro_text){
							echo $pwrvsn_hero_home_intro_text;
						} ?>
					</div>
					<!-- /.section-heading -->
					<?php
						if( $pwrvsn_hero_home_intro_button ) :
							echo build_acf_button( $pwrvsn_hero_home_intro_button, 'button' );
						endif;
					?>
				</div>
				<!-- /.lead-paragraph -->
			</div>
		</div>
		<!-- /.wrapper -->
	</section>
	<?php } else{ ?>

	<section>
		<div class="home-sec-banner-container">
		<div class="sec-hero-container">
			</div>
			<div class="wrapper">
				<div class="sec-banner-inner">

					<div class="home-sec-banner-content">
						<h1><?php echo $pwrvsn_hero_home_headline; ?></h1>
						<div class="banner-intro">
							<?php if($pwrvsn_hero_home_text){
								echo $pwrvsn_hero_home_text;
							} ?>
						</div>
						<?php if($pwrvsn_hero_home_form){ ?>
						<div class="hero-form">
							<div class="cta-newsletter">
								<?php echo do_shortcode( '[gravityform id="' . $pwrvsn_hero_home_form . '" title=false description=false ajax=true]' ); ?>
							</div>
						</div>
						<?php } ?>
					</div>
					<?php if($pwrvsn_hero_home_statistics){ ?>
					<div class="hero-stats">
						<?php foreach ($pwrvsn_hero_home_statistics as $stat ) {
							$stat_icon = $stat['icon'];
							$stat_title = $stat['title'];
							?>
						<div class="single-stats">
							<?php if($stat_icon){ ?>
							<span class="stats-icon">
								<img src="<?php echo $stat_icon; ?>" alt="<?php echo $stat_title; ?>">
							</span>
							<?php } ?>
							<span class="stats-title">
								<span><?php echo $stat_title; ?></span>
						</div>
						<?php } ?>
						<div class="clear"></div>
					</div>
					<?php } ?>
				</div>
			</div>

		</div>
	</section>
	<section class="m-section">
		<div class="wrapper">
			<div class="lead-paragraph-container">
				<div class="section-heading center-align">
					<?php if($pwrvsn_hero_home_intro_title){ ?>
						<h2><?php echo $pwrvsn_hero_home_intro_title; ?></h2>
					<?php } ?>
					<?php if($pwrvsn_hero_home_intro_text){
							echo $pwrvsn_hero_home_intro_text;
						} ?>
				</div>
				<!-- /.section-heading -->
				<?php if( $pwrvsn_hero_home_intro_button ) : ?>
				<div class="center-align">
					<?php echo build_acf_button( $pwrvsn_hero_home_intro_button, 'button' ); ?>
				</div>
				<?php endif; ?>
			</div>
			<!-- /.lead-paragraph -->
		</div>
	</section>


	<?php } ?>

	<?php
}

/**
 * Donation Page
 */
elseif ( is_page_template( 'templates/template-step-one.php' ) || is_page_template( 'templates/template-step-two.php' )  || is_page_template( 'templates/template-step-three.php' ) || is_page_template( 'templates/template-step-four.php' ) ) {

	?>
<!-- This is blank for this tempalate -->
	<?php
}

/**
 * Donation Page
 */
elseif ( is_page_template( 'templates/template-energy-choice.php' ) ) {
	$pwrvsn_tmplt_ec_hero_headline = $fields['pwrvsn_tmplt_ec_hero_headline'];
	if ( ! $pwrvsn_tmplt_ec_hero_headline ) {
		$pwrvsn_tmplt_ec_hero_headline = get_the_title();
	}
	$pwrvsn_tmplt_ec_hero_text           = $fields['pwrvsn_tmplt_ec_hero_text'];
	$pwrvsn_tmplt_ec_hero_button           = $fields['pwrvsn_tmplt_ec_hero_button'];
	$pwrvsn_tmplt_ec_hero_states_selection           = $fields['pwrvsn_tmplt_ec_hero_states_selection'];
	$pwrvsn_tmplt_ec_hero_states_selection_title = $pwrvsn_tmplt_ec_hero_states_selection['title'];
	$pwrvsn_tmplt_ec_hero_states_selection_states = $pwrvsn_tmplt_ec_hero_states_selection['states'];
	$pwrvsn_tmplt_ec_hero_bgimage           = $fields['pwrvsn_tmplt_ec_hero_bgimage'];
	if(!$pwrvsn_tmplt_ec_hero_bgimage){
		$pwrvsn_tmplt_ec_hero_bgimage = get_template_directory_uri(  )."/assets/img/e-choice-banner-bg.png";
	}
	?>
	<section>
		<div class="e-choice-banner" style="background-image: url(<?php echo $pwrvsn_tmplt_ec_hero_bgimage; ?>);">
			<div class="wrapper">
				<div class="e-choice-banner-inner">
					<div class="valign-wrapper">
						<div class="e-choice-banner-left">
							<h1><?php echo $pwrvsn_tmplt_ec_hero_headline; ?></h1>
							<?php if($pwrvsn_tmplt_ec_hero_text){
								echo $pwrvsn_tmplt_ec_hero_text;
							} ?>
							<?php
								if( $pwrvsn_tmplt_ec_hero_button ) :
									echo build_acf_button( $pwrvsn_tmplt_ec_hero_button, 'button red-button' );
								endif;
							?>
						</div>
						<?php if($pwrvsn_tmplt_ec_hero_states_selection_title || $pwrvsn_tmplt_ec_hero_states_selection_states){
							?>
						<div class="e-choice-banner-right">
							<div class="state-menu-container state-menu">
								<div class="select-state"> <?php echo $pwrvsn_tmplt_ec_hero_states_selection_title; ?> </div>
								<ul id="state-menu">
								<?php foreach ($pwrvsn_tmplt_ec_hero_states_selection_states as $state ) { ?>
									<li><a <?php if($state['link']){ ?> href="<?php echo $state['link']; ?>" <?php } ?>>
											<span class="menu-img">
												<img src="<?php echo $state['icon']; ?>" alt="">
											</span>
											<span><?php echo $state['name']; ?></span>
										</a>
									</li>
								<?php } ?>
								</ul>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
}

/**
 * Donation Page
 */
elseif ( is_page_template( 'templates/template-residential.php' ) ) {
	$pwrvsn_tmplr_hero_variation = $fields['pwrvsn_tmplr_hero_variation'];
	$blok_tmplr_hero_headline = $fields['blok_tmplr_hero_headline'];
	if ( ! $blok_tmplr_hero_headline ) {
		$blok_tmplr_hero_headline = get_the_title();
	}
	$blok_tmplr_hero_text          = $fields['blok_tmplr_hero_text'];
	$blok_tmplr_hero_button          = $fields['blok_tmplr_hero_button'];
	$blok_tmplr_hero_bgimage          = $fields['blok_tmplr_hero_bgimage'];
	$blok_tmplr_hero_dropdown          = $fields['blok_tmplr_hero_dropdown'];
	$blok_tmplr_hero_dropdown_title = $blok_tmplr_hero_dropdown['title'];
	$blok_tmplr_hero_dropdown_options = $blok_tmplr_hero_dropdown['options'];

	if($pwrvsn_tmplr_hero_variation == 'First'){
		if(!$blok_tmplr_hero_bgimage){
			$blok_tmplr_hero_bgimage = get_template_directory_uri(  )."/assets/img/residential-banner-image.png";
		}
	?>
	<div class="residential-banner" style="background-image: url(<?php echo $blok_tmplr_hero_bgimage; ?>);">
		<div class="residential-banner-inner">
			<div class="wrapper">
				<div class="residential-content">
					<h1><?php echo $blok_tmplr_hero_headline; ?></h1>
					<?php if($blok_tmplr_hero_text){ ?>
					<div class="banner-intro">
						<?php echo $blok_tmplr_hero_text; ?>
					</div>
					<?php } ?>
					<?php if($blok_tmplr_hero_dropdown_title || $blok_tmplr_hero_dropdown_options){ ?>
					<div class="state-menu">
						<dl id="" class="dropdown">
							<dt>
								<a href="#"><span><?php echo $blok_tmplr_hero_dropdown_title; ?></span></a>
							</dt>
							<dd>
								<div class="state-menu-container">
									<?php if($blok_tmplr_hero_dropdown_options){ ?>
									<ul id="state-menu">
									<?php
										foreach ($blok_tmplr_hero_dropdown_options as $option ) {
											$option_link = $option['link'];
											$option_icon = $option['icon'];
											$option_name = $option['name'];
									?>
										<li>
											<a href="<?php echo $option_link; ?>">
												<span class="menu-img">
													<img src="<?php echo $option_icon; ?>" alt="<?php echo $option_name; ?>">
												</span>
												<span><?php echo $option_name; ?></span>
											</a>
										</li>
										<?php } ?>
									</ul>
								<?php } ?>
								</div>
							</dd>
						</dl>
					</div>
					<?php } ?>
				</div>
				<div class="banner-bubbles"></div>
			</div>
		</div>
	</div>
	<?php } elseif($pwrvsn_tmplr_hero_variation == 'Second') {
		if(!$blok_tmplr_hero_bgimage){
			$blok_tmplr_hero_bgimage = get_template_directory_uri(  )."/assets/img/residential-banner-b.jpg";
		}
		?>

		<section>
			<div class="residential-banner-b mt-top" style="background-image: url(<?php echo $blok_tmplr_hero_bgimage; ?>);">
				<div class="wrapper">
					<div class="residential-b-content">
						<h1><?php echo $blok_tmplr_hero_headline; ?></h1>
						<?php if($blok_tmplr_hero_text){ ?>
						<div class="banner-intro">
							<?php echo $blok_tmplr_hero_text; ?>
						</div>
						<?php } ?>
						<?php
							if( $blok_tmplr_hero_button ) :
								echo build_acf_button( $blok_tmplr_hero_button, 'button red-button' );
							endif;
						?>
					</div>
				</div>
			</div>
		</section>

	<?php } else {
		if(!$blok_tmplr_hero_bgimage){
			$blok_tmplr_hero_bgimage = get_template_directory_uri(  )."/assets/img/residential-banner-c.jpg";
		}
		?>

		<section>
			<div class="residential-banner-c mt-top">
				<div class="residential-c-left center-align">
					<div class="residential-c-left-inner">
						<h1><?php echo $blok_tmplr_hero_headline; ?></h1>
						<?php if($blok_tmplr_hero_headline){ ?>
						<div class="banner-intro">
							<?php echo $blok_tmplr_hero_text; ?>
						</div>
						<?php } ?>
						<?php
							if( $blok_tmplr_hero_button ) :
								echo build_acf_button( $blok_tmplr_hero_button, 'button red-button' );
							endif;
						?>
					</div>
				</div>
				<div class="residential-c-right" style="background-image: url(<?php echo $blok_tmplr_hero_bgimage; ?>);">
				</div>
			</div>
		</section>

	<?php } ?>
	<?php
}

/***** Blog Page */
elseif ( is_page_template( 'templates/template-blog.php' ) ) {
	?>
	 <div class="blog-masthead">
</div>
	<?php
}
/**
 * Service Details Page
 */
elseif ( is_page_template( 'templates/template-single-service.php' ) ) {
	$z3_tmplt_sd_headline = $fields['z3_tmplt_sd_headline'];
	if ( ! $z3_tmplt_sd_headline ) {
		$z3_tmplt_sd_headline = get_the_title();
	}
	$z3_tmplt_sd_text   = $fields['z3_tmplt_sd_text'];
	$z3_tmplt_sd_button = $fields['z3_tmplt_sd_button'];
	$z3_tmplt_sd_image  = $fields['z3_tmplt_sd_image'];
	?>
<!-- Services Details Masthead -->
<div class="inner-masthead big-section service-details-masthead">
	<div class="wrapper">
		<div class="masthead-container">
			<div class="banner-content-side">
				<div class="banner-content-container">
					<div class="banner-content medium-text">
						<h1><?php echo $z3_tmplt_sd_headline; ?></h1>
									   <?php
										if ( $z3_tmplt_sd_text ) {
											echo $z3_tmplt_sd_text;
										}
										?>
								 <?php
									if ( $z3_tmplt_sd_button ) :
										echo build_acf_button( $z3_tmplt_sd_button, 'button white-bg' );
									endif;
									?>
					</div>
				</div>
			</div>
			<?php
			if ( $z3_tmplt_sd_image ) {
				?>
				 <div class="banner-image-side body-img">
				<?php echo wp_get_attachment_image( $z3_tmplt_sd_image, 'full' ); ?> </div> <?php } ?>
		</div>
		<div class="clear"></div>
	</div>
</div>
	<?php
}
/**
 * About Page
 */
elseif ( is_page_template( 'templates/template-about.php' ) ) {
	$blok_tmpla_hero_headline = $fields['blok_tmpla_hero_headline'];
	if ( ! $blok_tmpla_hero_headline ) {
		$blok_tmpla_hero_headline = get_the_title();
	}
	$blok_tmpla_hero_text  = $fields['blok_tmpla_hero_text'];
	$blok_tmpla_hero_button = $fields['blok_tmpla_hero_button'];
	$blok_tmpla_hero_image = $fields['blok_tmpla_hero_image'];
	if(!$blok_tmpla_hero_image){
		$blok_tmpla_hero_image = get_template_directory_uri(  )."/assets/img/about-banner-image.jpg";
	}
	?>

	<section>
		<div class="about-banner-contianer mt-top">
			<div class="wrapper">
				<div class="about-banner-inner">
					<div class="about-banner-left">
						<h1><?php echo $blok_tmpla_hero_headline; ?></h1>
						<div class="banner-intro">
							<?php if($blok_tmpla_hero_text){
								echo $blok_tmpla_hero_text;
							} ?>
						</div>
						<?php
							if( $blok_tmpla_hero_button ) :
								echo build_acf_button( $blok_tmpla_hero_button, 'button red-button' );
							endif;
						?>
					</div>
					<div class="about-banner-right" style="background-image: url(<?php echo $blok_tmpla_hero_image; ?>)"></div>
				</div>
			</div>
		</div>
	</section>

	<?php
}

/**
 * FAQ Page
 */
elseif ( is_page_template( 'templates/template-faq.php' ) ) {
	$z3_tmplt_faq_headline = $fields['z3_tmplt_faq_headline'];
	if ( ! $z3_tmplt_faq_headline ) {
		$z3_tmplt_faq_headline = get_the_title();
	}
	?>
<!-- FAQs Masthead -->
<div class="faqs-masthead">
	<div class="wrapper">
		<h1><?php echo $z3_tmplt_faq_headline; ?></h1>
	</div>
</div>
	<?php

}
/**
 * Center title Page
 */
elseif ( is_page_template( 'templates/template-center-title.php' ) ) {
        // Default page ACF Masthead values
	$pwrvsn_page_hero_headline = $fields['pwrvsn_page_hero_headline'];
	if(!$pwrvsn_page_hero_headline){
		$pwrvsn_page_hero_headline = get_the_title();
	}
	$pwrvsn_page_hero_text = $fields['pwrvsn_page_hero_text'];
	$pwrvsn_page_hero_button = $fields['pwrvsn_page_hero_button'];
	$pwrvsn_page_hero_image = $fields['pwrvsn_page_hero_image'];

?>

	<section>
		<div class="banner-container">
			<div class="wrapper">
				<div class="banner-inner-area center-title">
					<div class="valign-wrapper-block">
						<div class="banner-center-align">
							<h1><?php echo $pwrvsn_page_hero_headline; ?></h1>
							<?php if($pwrvsn_page_hero_text){ ?>
							<div class="banner-intro">
								<?php echo $pwrvsn_page_hero_text; ?>
							</div>
							<?php } ?>
							<?php
								if( $pwrvsn_page_hero_button ) :
									echo build_acf_button( $pwrvsn_page_hero_button, 'button red-button' );
								endif;
							?>
						</div>
						<?php if($pwrvsn_page_hero_image){ ?>
						<div class="banner-right">
							<div class="along-side-image" style="background-image: url(<?php echo $pwrvsn_page_hero_image; ?>);">
								<div class="image-bubbles">
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php

}
elseif ( is_singular( 'post' ) ) {

	?>

	<?php

}


	/**
	 * 404 Error page masthead
	 */
elseif ( is_404() ) {

	?>

	<div class="s-section single-post-container">
		<div class="wrapper">
			<div class="single-post-masthead">
				<h1>404!</h1>
				<p>
					Not Found
				</p>
			</div>
		</div>
	</div>

	<?php
}


	/**
	 * Archive masthead
	 */
elseif ( is_archive() ) {
	?>

	<div class="s-section single-post-container">
		<div class="wrapper">
			<div class="single-post-masthead">
				<h1><?php the_archive_title(); ?></h1>
			</div>
		</div>
	</div>

	<?php
}


	/**
	 * Search masthead
	 */
elseif ( is_search() ) {
	?>

	<div class="s-section single-post-container">
		<div class="wrapper">
			<div class="single-post-masthead">
				<h1>Search Results for</h1>
				<p>"<?php echo the_search_query(); ?>"</p>
			</div>
		</div>
	</div>

	<?php
}


	/**
	 * Index masthead
	 */
elseif ( is_home() & is_front_page() ) {
	?>

	<?php
}  elseif ( is_home()  ) {
?>

<?php }
	/**
	 * Page masthead
	 */
else {
	// Default page ACF Masthead values
	$pwrvsn_page_hero_headline = $fields['pwrvsn_page_hero_headline'];
	if(!$pwrvsn_page_hero_headline){
		$pwrvsn_page_hero_headline = get_the_title();
	}
	$pwrvsn_page_hero_text = $fields['pwrvsn_page_hero_text'];
	$pwrvsn_page_hero_button = $fields['pwrvsn_page_hero_button'];
	$pwrvsn_page_hero_image = $fields['pwrvsn_page_hero_image'];

?>

	<section>
		<div class="banner-container">
			<div class="wrapper">
				<div class="banner-inner-area">
					<div class="valign-wrapper">
						<div class="banner-left">
							<h1><?php echo $pwrvsn_page_hero_headline; ?></h1>
							<?php if($pwrvsn_page_hero_text){ ?>
							<div class="banner-intro">
								<?php echo $pwrvsn_page_hero_text; ?>
							</div>
							<?php } ?>
							<?php
								if( $pwrvsn_page_hero_button ) :
									echo build_acf_button( $pwrvsn_page_hero_button, 'button red-button' );
								endif;
							?>
						</div>
						<?php if($pwrvsn_page_hero_image){ ?>
						<div class="banner-right">
							<div class="along-side-image" style="background-image: url(<?php echo $pwrvsn_page_hero_image; ?>);">
								<div class="image-bubbles">
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
	}
?>
