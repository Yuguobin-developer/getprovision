<?php
/**
 * Template Name: Enroll Step Three
 * Template Post Type: page
 *
 * This template is for displaying Enroll Step Three page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Redica
 * @since 1.0.0
 */


$zipcode = $city = $state = $k = null;
$utilityIds = $planIds = $utilityNames = array();
$hideUtility = false;
if(isset($_GET['k']) && !empty($_GET['k'])){
	parse_str(base64_decode($_GET['k']), $output);
        $k = 'k='.$_GET['k'];

	if(isset($output['zipcode']) && !empty($output['zipcode'])
		&& isset($output['utility']) && !empty($output['utility'])
		&& isset($output['plan']) && !empty($output['plan'])
	){
            $zipcode = $output['zipcode'];
            $utilityNames = explode(',',$output['utility']);
            $regex1="/^[0-9]+$/";
            foreach($utilityNames as $utiltiTitle){

                if(!preg_match($regex1, $utiltiTitle)){
                    $utilityObj = get_page_by_title($utiltiTitle, OBJECT, 'utilities');
                    if($utilityObj){ $utiltiTitle = $utilityObj->ID; }
                }
                $utilityIds[] = $utiltiTitle;

            }
            
            
            $planIds = explode(',',$output['plan']);
        
        }elseif( isset($output['city']) && !empty($output['city'])
                && isset($output['state']) && !empty($output['state'])
                && isset($output['utility']) && !empty($output['utility'])
                && isset($output['plan']) && !empty($output['plan']))
        {
	$state = $output['state'];
	$city = $output['city'];
	$utilityNames = explode(',',$output['utility']);
        
        $regex1="/^[0-9]+$/";
        foreach($utilityNames as $utiltiTitle){

            if(!preg_match($regex1, $utiltiTitle)){
                $utilityObj = get_page_by_title($utiltiTitle, OBJECT, 'utilities');
                if($utilityObj){ $utiltiTitle = $utilityObj->ID; }
            }
            $utilityIds[] = $utiltiTitle;

        }
        
        
	$planIds = explode(',',$output['plan']);
        }elseif ( isset($output['utility']) && !empty($output['utility'])
                && isset($output['plan']) && !empty($output['plan'])) {
            $utilityNames = explode(',',$output['utility']);
            
            $regex1="/^[0-9]+$/";
            foreach($utilityNames as $utiltiTitle){

                if(!preg_match($regex1, $utiltiTitle)){
                    $utilityObj = get_page_by_title($utiltiTitle, OBJECT, 'utilities');
                    if($utilityObj){ $utiltiTitle = $utilityObj->ID; }
                }
                $utilityIds[] = $utiltiTitle;

            }
            
            
            $planIds = explode(',',$output['plan']);
        }else{
            wp_redirect( site_url('/enroll/') );
        }
}elseif(isset($_GET['zipcode']) && !empty($_GET['zipcode'])
        && isset($_GET['utility']) && !empty($_GET['utility'])
        && isset($_GET['plan']) && !empty($_GET['plan'])
){
    $zipcode = $_GET['zipcode'];
    $utilityNames = explode(',',$_GET['utility']);
    
    $regex1="/^[0-9]+$/";
    foreach($utilityNames as $utiltiTitle){

        if(!preg_match($regex1, $utiltiTitle)){
            $utilityObj = get_page_by_title($utiltiTitle, OBJECT, 'utilities');
            if($utilityObj){ $utiltiTitle = $utilityObj->ID; }
        }
        $utilityIds[] = $utiltiTitle;

    }
    
    $planIds = explode(',',$_GET['plan']);
    $k = 'zipcode='.$_GET['zipcode'].'&utility='.$_GET['utility'].'&plan='.$_GET['plan'];
    
}elseif( isset($_GET['city']) && !empty($_GET['city'])
        && isset($_GET['state']) && !empty($_GET['state'])
        && isset($_GET['utility']) && !empty($_GET['utility'])
        && isset($_GET['plan']) && !empty($_GET['plan']))
{
    $state = $_GET['state'];
    $city = $_GET['city'];
    $utilityNames = explode(',',$_GET['utility']);
    
    $regex1="/^[0-9]+$/";
    foreach($utilityNames as $utiltiTitle){

        if(!preg_match($regex1, $utiltiTitle)){
            $utilityObj = get_page_by_title($utiltiTitle, OBJECT, 'utilities');
            if($utilityObj){ $utiltiTitle = $utilityObj->ID; }
        }
        $utilityIds[] = $utiltiTitle;

    }
    
    $planIds = explode(',',$_GET['plan']);
    
    $k = 'state='.$_GET['state'].'&city='.$_GET['city'].'&utility='.$_GET['utility'].'&plan='.$_GET['plan'];
    
}elseif ( isset($_GET['utility']) && !empty($_GET['utility'])
        && isset($_GET['plan']) && !empty($_GET['plan'])) {
    $utilityNames = explode(',',$_GET['utility']);
    
    $regex1="/^[0-9]+$/";
    foreach($utilityNames as $utiltiTitle){

        if(!preg_match($regex1, $utiltiTitle)){
            $utilityObj = get_page_by_title($utiltiTitle, OBJECT, 'utilities');
            if($utilityObj){ $utiltiTitle = $utilityObj->ID; }
        }
        $utilityIds[] = $utiltiTitle;

    }
    
    $planIds = explode(',',$_GET['plan']);
    
    $k = 'utility='.$_GET['utility'].'&plan='.$_GET['plan'];
    
}else{
    wp_redirect( site_url('/enroll/') );
}

foreach ($utilityIds as $ID){
    if ( FALSE === get_post_status( $ID ) ) {
        wp_redirect( site_url('/enroll/') );
    }
}
foreach ($planIds as $ID){
    if ( FALSE === get_post_status( $ID ) ) {
        wp_redirect( site_url('/enroll/') );
    }
}

//echo 'asd';
//print_r($_SESSION);

// Include header
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
					<a class="stepnumber-link" href="<?php echo site_url('/enroll/?');?>">
					<div class="step-number">
						<span>1</span>
					</div>
					<div class="step-label"><span><?php if(!empty($city)){echo 'City: '.ucwords(strtolower($city)); }elseif(!empty($zipcode)){ echo 'Zip Code: '.$zipcode; } ?></span></div>
					</a>
					<a href="<?php echo site_url('/enroll/');?>" class="form-link">Change</a>
				</div>
				<!-- /.step -->
				<div class="single-step active">
					<a class="stepnumber-link" href="<?php echo site_url('/enroll-step-2/?'.$k.'&show=plans'); ?>">
					<div class="step-number">
						<span>2</span>
					</div>
					<div class="step-label"><span> Plans</span></div>
					</a>
				</div>
				<!-- /.step -->
				<div class="single-step active current">
					
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
	<!-- steps header -->
	<div class="xl-3 cs-height"></div>
        
	<section class="med-step-roll-container step-3">
		<div class="wrapper">
			<div class="steps-address-container">
				<div class="steps-head center-align">
                                    <h2>You're almost ready to switch.</h2>
				</div>
				<!-- /.steps-head -->
				<div class="steps-form-w-sidebar">
					<div class="steps-with-sidebar center-align">
                                            <?php
                                             foreach ($planIds as $key => $plan) {
                                                 $utilityObj = get_utility_by_plan($plan);
                                                 $utility = $utilityObj->ID;
                                               ?>
                                            <div class="selected-plans-wrapper">
						<div class="title-sidebar">YOUR SELECTED PLAN:</div>
						<div class="sidebar-image">
							<span>
								<?php echo get_the_post_thumbnail("$utility",'full'); ?>
								<!--<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-05.svg" alt="">-->
							</span>
						</div>
						<!-- /.sidebar-image -->
						<div class="content-form-sidebar">
							<h6><?php echo get_the_title($plan); ?></h6>
							<span class="slide-toggle form-link desktop-hide">See More</span>
							<div class="mobile-toggle">
								<p>
									<?php
									$regularPrice = get_field('planscpt_regular_price',$plan);
									$price = get_field('planscpt_price',$plan);
									if(!empty($regularPrice)){
                                                                            echo '$'.$price.' per '.get_field('planscpt_unit',$plan);
                                                                            echo "<span class='regular-price'>(Regular Price: <em>$$regularPrice</em> )</span>";
                                                                        }else{
                                                                            echo '$'.$price.' per '.get_field('planscpt_unit',$plan);
                                                                        }
									echo '<br/>'.get_field('planscpt_benefit_1',$plan); 
									echo '<br/>'.get_field('planscpt_benefits_2',$plan);


									$t_cPdf = get_field('t_c_pdf_name',$plan); 
									if( !empty($t_cPdf) ){
                                                                            $t_cPdfurl = get_pdf_url($t_cPdf);
                                                                            echo '<div class="term-and-condition"><a href="'.$t_cPdfurl.'" class="form-link t_c_link" target="_blank">Terms & Conditions</a></div>';
									}
									?> 
								</p>
								<div class="button-bar">
                                                                    <a class="form-link" href="<?php echo site_url('/enroll-step-2/?'.$k.'&show=plans'); ?>">Change Plan</a>
								</div>
								<!-- /.button-bar -->
							</div>
						</div>
						<!-- /.content-form-sidebar -->
					
                                            </div><!-- /. plans-wrapper -->
                                            <?php
                                            }
                                            ?>
                                            	<div class="sidebar-footer">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/step-footer-sm.svg" alt="Side-Bar">
						</div>
						<!-- /.sidebar-footer -->
                                        </div>
					<!-- /.steps-with-sidebar -->
					<div class="steps-form">
						<?php echo do_shortcode('[gravityform id=5 title=false description=false ajax=true]'); ?>
					</div>
					<!-- /.steps-form -->
					<div class="clear"></div>
				</div>
                                
                                <div class="content-wrapper">
                                <?php
                                the_content();
                                ?>
                                </div>
                                
                            </div>
				<!-- /.steps-address-container -->
			</div>
			<!-- /.wrapper -->
		</section>
		<!-- cheakbox contact Container -->
		<!-- cheakbox contact Container -->
		<div class="xxl-1"></div>
	</div>
	<?php
	get_footer();
