<?php
/**
 * Template Name: Enroll Step Four
 * Template Post Type: page
 *
 * This template is for displaying Enroll Step Four page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Redica
 * @since 1.0.0
 */

// Include header
//print_r($_SESSION);
get_header();

// Global variables
global $option_fields;
global $pID;
global $fields;

?>

<div class="page-content steps-page-content">
	<section class="med-section steps-wrapper-section">
		<div class="wrapper">
			<div class="steps-container">
				<div class="single-step active">
					
					<div class="step-number">
						<span>1</span>
					</div>
					<div class="step-label"><span> Zip Code</span></div>
					
					<!--<div class="step-label"><span> Zip Code: 48025</span></div>
						<a href="#" class="form-link">Change</a>-->
					</div>
					<!-- /.step -->
					<div class="single-step active">
						
						<div class="step-number">
							<span>2</span>
						</div>
						<div class="step-label"><span> Plans</span></div>
						
					</div>
					<!-- /.step -->
					<div class="single-step active">
						
						<div class="step-number">
							<span>3</span>
						</div>
						<div class="step-label"><span> Address </span></div>
						
					</div>
					<!-- /.step -->
					<div class="single-step active current">
						
						<div class="step-number">
							<span>4</span>
						</div>
						<div class="step-label"><span> Confirmed </span></div>
						
					</div>
					<!-- /.step -->
					<div class="clear"></div>
					<!-- /.clear -->
				</div>
				<!-- /.steps-container -->
			</div>
			<!-- /.wrapper -->
		</section>
		<!-- steps header -->
		<div class="xl-3 cs-height"></div>
		<section class="med-step-roll-container provision-welcome step-4">
			<div class="wrapper">
				<div class="steps-welcome-container">
					<div class="steps-head center-align">
						<h2><?php the_field('headline'); ?></h2>
						<h4><?php the_field('sub_headline'); ?></h4>
					</div>
					<!-- /.steps-head -->
					<div class="join-steps-image">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/steps-bg.jpg" alt="Animated Image">
					</div>
					<!-- /.three-steps-image -->
                                        <div class="content-wrapper">
                                            <?php the_field('content_area'); ?>
                                        </div>
				<!-- /.steps-notice-list 
				<div class="button-bar center-align">
					<button type="button">Refer a Friend</button>
				</div>-->
				<!-- /.form-button-area -->
				<div class="welcome-steps-container">
					<div class="wrapper">
						<div class="welcome-footer-bg">
						</div>
						<!-- /.welcome-footer-bg -->
					</div>
					<!-- /.wrapper -->
				</div>
				<!-- footer image  -->
			</div>
			<!-- /.steps-welcome-container -->
		</div>
		<!-- /.wrapper -->
	</section>
	<!-- cheakbox contact Container -->
	<div class="xxl-1"></div>
</div>
<!-- /.page-content -->

<?php
get_footer();
