<?php
/**
 * Template Name: Enroll Step One
 * Template Post Type: page
 *
 * This template is for displaying Enroll Step One page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Redica
 * @since 1.0.0
 */


$zipcode = $state = $city = null;
$showAddress = $plansNA = false;
$zip_msg = "";
if(isset($_REQUEST['zipcode']) && !empty($_REQUEST['zipcode'])){
    $zipcode = $_GET['zipcode'];
    if(isUtility_available($_REQUEST['zipcode'])){
        $str = 'zipcode='.$_REQUEST['zipcode'];
//        $url = 'k='.base64_encode($str);
        wp_redirect(site_url('/enroll-step-2/?'.$str));
    }else{
        $plansNA = true;
        add_filter( 'body_class', 'custom_class_step_na' );
    }
}elseif(isset($_GET['state']) && isset($_GET['city']) && !empty($_GET['state']) && !empty($_GET['city'])){
    
    $state = ucwords(strtolower($_GET['state']));
    $city = ucwords(strtolower($_GET['city']));
    
    if(isUtility_available('',$city,$state)){
        $str = 'city='.$city.'&state='.$state;
//        $url = 'k='.base64_encode($str);
        wp_redirect(site_url('/enroll-step-2/?'.$str));
    }else{
        $plansNA = true;
        add_filter( 'body_class', 'custom_class_step_na' );
    }
    
    $showAddress = true;
}elseif(isset($_GET['k']) && !empty($_GET['k'])){
    parse_str(base64_decode($_GET['k']), $output);
    
    if(isset($output['zipcode']) && !empty($output['zipcode'])){
        $zipcode = $output['zipcode'];
    }elseif(isset($output['city']) && !empty($output['city']) && isset($output['state']) && !empty($output['state'])){
        $city = $output['city'];
        $state = $output['state'];
        $showAddress = true;
    }
}
unset($_SESSION['enrol-step-data']);

function custom_class_step_na($classes){
    $classes[] = 'scroll-to-ste-na';
    return $classes;
}

// Include header
get_header();

// Global variables
global $option_fields;
global $pID;
global $fields;

?>

	<section class="med-section steps-wrapper-section">
		<div class="wrapper">
			<div class="steps-container">
				<div class="single-step active current">
					
						<div class="step-number">
							<span>1</span>
						</div>
					<div class="step-label"><span> Zip Code </span></div>
					
				</div>
				<!-- /.step -->
				<div class="single-step">
					
					<div class="step-number">
						<span>2</span>
					</div>
					<div class="step-label"><span> Plans</span></div>
					
				</div>
				<!-- /.step -->
				<div class="single-step">
					
					<div class="step-number">
						<span>3</span>
					</div>
					<div class="step-label"><span> Address </span></div>
					
				</div>
				<!-- /.step -->
				<div class="single-step">
					
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
	<div class="xl-3 cs-height"></div>
	<!-- /.xxl-1 -->
        <?php $style_zipform = ($plansNA) ? 'style="display: none;"' : ''; ?>
        <section class="med-step-roll-container step-forms step-1" <?= $style_zipform ?>>
		<div class="wrapper">
			<div class="steps-form-container">
                            <h2 class="center-align">See if CarbonBetter<sup>&#8482;</sup><br/> energy is nearby</h2>
                                
				<div class="tabs-links">
					<ul class="tabs">
						<li class="tab"><a href="#zipcode" id="tab_zip">Zip code</a></li>
                                                <li class="tab"><a href="#address" id="tab_address" <?php if($state && $city) echo 'class="active"' ?>>Address</a></li>
					</ul>
				</div>
				<!-- Tabs Link -->
				<div id="zipcode" class="toggle-box" <?php if($state && $city) echo 'style="display: none;"' ?>>
					<div class="zip-code-form">
                                            <form id="zipcode_form" action="#">
                                                <label for="text">Your zip code</label>
                                                <input type="text" id="postal_code" name="zip-code" placeholder="e.g. 43002" maxlength="5" value="<?= $zipcode ?>">
                                            </form>
					</div>
					<!-- /.zip-code-form -->
				</div>
				<div id="address" class="toggle-box <?php if($state && $city) echo 'active' ?>" <?php if($state && $city) echo 'style="display: block;"' ?>>
					<div class="zip-code-form">
                                            <form id="address_form" action="#">
                                                <label for="text">Your Address</label>
                                                    <?php
                                                    $city_state = ""; 
                                                    if($city != "" && $state != ""){
                                                            $city_state = $city .', '. $state;
                                                    }
                                                    ?>
                                                <input id="autocomplete" name="address" placeholder="Enter your address" onFocus="geolocate()" type="text" value="<?= $city_state; ?>">
                                                <input style="display:none"  type="text" name="city" id="locality" placeholder="City" value="<?= $city ?>">
                                                <input style="display:none"  type="text" name="state" id="administrative_area_level_1" placeholder="State" value="<?= $state ?>">
                                                <input style="display:none"  type="hidden" name="street_number" id="street_number" value="<?= $street_number ?>">
                                                <input style="display:none"  type="hidden" name="route" id="route" value="<?= $route ?>">
                                                <input style="display:none"  type="hidden" name="admin_lv_3" id="administrative_area_level_3" value="<?= $adLev3 ?>">
                                                <input style="display:none"  type="hidden" name="admin_lv_2" id="administrative_area_level_2" value="<?= $adLev2 ?>">
                                            </form>
					</div>
				</div>
				
				<div class="center-align">
                                    <button type="button" id="see_plan" class="form-red-btn" onclick="step_form_1(this)">Check Availability</button><div class="form-loader"></div>
				</div>
<!--				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_dFAj4f_AQt950YtFM4syoaqwGhZ848w&libraries=places&callback=initAutocomplete" async defer></script>-->
				<script>
                                    document.getElementById('postal_code').addEventListener('keypress', function(event) {
                                        if (event.keyCode == 13) {
                                            event.preventDefault();
                                            document.getElementById('see_plan').click();
                                        }
                                    });

                                    document.getElementById('administrative_area_level_1').addEventListener('keypress', function(event) {
                                        if (event.keyCode == 13) {
                                            event.preventDefault();
                                            document.getElementById('see_plan').click();
                                        }
                                    });

                		// Populate the hidden field address on plan check button click.
                                jQuery('.steps-form-container').on('click', '#see_plan', function() {
                                    document.getElementById('#input_7_30').value = jQuery('#autocomplete').val();
                                });
				</script>

			</div>
			<!-- /.form-container -->
		</div>
		<!-- /.wrapper -->
	</section>
        <div class="xxl-1"></div>
	<?php $style_step_na = ($plansNA) ? 'style="display: block;"' : 'style="display: none;"'; ?>
        <section class="med-step-roll-container step-na" <?= $style_step_na ?>>
		<div class="wrapper">
	
		
				<a class="inactive-zipbox " href="javascript:void(0)">
					 <div class="left-col">
					 	<h4>Your zip code</h4>
					 	<p><?= $zipcode ?></p>
					 </div>
					 <div class="right-col">
					 	<div class="change-btn">change <img src="<?php echo get_template_directory_uri(); ?>/assets/img/change-icon.svg" /></div>
					 </div>
				</a>
		
			<div class="steps-form-container not-available">
				<h2 class="center-align">Bummer, we don't serve your<br>area yet - but we will soon!</h2>
                                <?php echo do_shortcode('[gravityform id="6" title="false" description="false" ajax="true"]'); ?>
			</div>
			<!-- /.form-container -->
		</div>
		<!-- /.wrapper -->
	</section>
	
	
	<div class="xxl-1"></div>

<div class="clear"></div>

<?php
get_footer();
