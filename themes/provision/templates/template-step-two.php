<?php
/**
* Template Name: Enroll Step Two
* Template Post Type: page
*
* This template is for displaying Enroll Step Two page.
*
* @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
*
* @package Redica
* @since 1.0.0
*/
// Include header

$zipcode = $state = $city = $k = null;
$utilityIds = $utilitiesWildcard = $planSelected = array();

$showGasPlans = false;
$hideUtility = $wildUtility = $showplans = $showAll_uti = false;
if(isset($_GET['k']) && !empty($_GET['k'])){
    parse_str(base64_decode($_GET['k']), $output);

    $k = 'k='.$_GET['k'];
    if(isset($output['zipcode']) && !empty($output['zipcode'])){
        $zipcode = $output['zipcode'];
        if (isset($output['utility']) && !empty($output['utility'])) {
            $utilityNames = explode(',',$output['utility']);

            $regex1="/^[0-9]+$/";
            foreach($utilityNames as $utiltiTitle){

                if(!preg_match($regex1, $utiltiTitle)){
                    $utilityObj = get_page_by_title($utiltiTitle, OBJECT, 'utilities');
                    if($utilityObj){ $utiltiTitle = $utilityObj->ID; }
                }
                $utilityIds[] = $utiltiTitle;

            }

            $hideUtility = true;

            if (isset($_GET['show'])) {
                if ($_GET['show'] == 'plans') {
                    $showplans = true;
                } elseif ($_GET['show'] == 'gas') {
                    $showGasPlans = true;
                }
            }

        }
    } elseif(isset($output['city']) && !empty($output['city']) && isset($output['state']) && !empty($output['state'])){
        $city = $output['city'];
        $state = $output['state'];
        if (isset($output['utility']) && !empty($output['utility'])) {
            $utilityNames = explode(',', $output['utility']);

            $regex1 = "/^[0-9]+$/";
            foreach ($utilityNames as $utiltiTitle) {

                if (!preg_match($regex1, $utiltiTitle)) {
                    $utilityObj = get_page_by_title($utiltiTitle, OBJECT, 'utilities');
                    if ($utilityObj) {
                        $utiltiTitle = $utilityObj->ID;
                    }
                }
                $utilityIds[] = $utiltiTitle;

            }

            $hideUtility = true;

            if (isset($_GET['show'])) {
                if ($_GET['show'] == 'plans') {
                    $showplans = true;
                } elseif ($_GET['show'] == 'gas') {
                    $showGasPlans = true;
                }
            }

        }

    }elseif(isset($output['utility']) && !empty($output['utility']) ){
        $utilityNames = explode(',',$output['utility']);

        $regex1="/^[0-9]+$/";

        foreach($utilityNames as $utiltiTitle){

            if(!preg_match($regex1, $utiltiTitle)){
                $utilityObj = get_page_by_title($utiltiTitle, OBJECT, 'utilities');
                if($utilityObj){ $utiltiTitle = $utilityObj->ID; }
            }
            $utilityIds[] = $utiltiTitle;
            if($relatedUtil = get_field('related_utilities',$utiltiTitle)){
                $utilitiesWildcard = array_merge($utilityIds, $relatedUtil);
            }else{
                $utilitiesWildcard = $utilityIds;
            }
        }

        $hideUtility = $wildUtility = $showAll_uti = true;

        if (isset($_GET['show'])) {
            if ($_GET['show'] == 'plans') {
                $showplans = true;
            } elseif ($_GET['show'] == 'gas') {
                $showGasPlans = true;
            }
        }

    }else{
        wp_redirect( site_url('/enroll/') );
    }

    if(isset($output['plan'])){
        $planSelected = explode(',',$output['plan']);
    }
//    print_r($output);
}elseif(isset($_GET['zipcode']) && !empty($_GET['zipcode'])){
    $zipcode = $_GET['zipcode'];
    $k = 'zipcode='.$_GET['zipcode'];

//    if(!isUtility_available($_REQUEST['zipcode'])){
//        $str = 'zipcode='.$_REQUEST['zipcode'];
////        $url = base64_encode($str);
//        wp_redirect(site_url('/enroll/?'.$str));
//    }

    if (isset($_GET['utility']) && !empty($_GET['utility'])) {
         $k .= '&utility='.$_GET['utility'];

        $utilityNames = explode(',',$_GET['utility']);

        $regex1="/^[0-9]+$/";
        foreach($utilityNames as $utiltiTitle){

            if(!preg_match($regex1, $utiltiTitle)){
                $utilityObj = get_page_by_title($utiltiTitle, OBJECT, 'utilities');
                if($utilityObj){ $utiltiTitle = $utilityObj->ID; }
            }
            $utilityIds[] = $utiltiTitle;

        }

        $hideUtility = true;

        if (isset($_GET['show'])) {
            if ($_GET['show'] == 'plans') {
                $showplans = true;
            } elseif ($_GET['show'] == 'gas') {
                $showGasPlans = true;
            }
        }

    }
    if(isset($_GET['plan'])){
        $planSelected = explode(',',$_GET['plan']);
    }
} elseif(isset($_GET['city']) && !empty($_GET['city']) && isset($_GET['state']) && !empty($_GET['state'])){
    $city = $_GET['city'];
    $state = $_GET['state'];
    $k = 'city='.$_GET['city'].'&state='.$_GET['state'];

//    if(!isUtility_available('',$city,$state)){
//        $str = 'city='.$city.'&state='.$state;
////        $url = 'k='.base64_encode($str);
//        wp_redirect(site_url('/enroll/?'.$str));
//    }

    if (isset($_GET['utility']) && !empty($_GET['utility'])) {
        $utilityNames = explode(',',$_GET['utility']);
        $k .= '&utility='.$_GET['utility'];

        $regex1="/^[0-9]+$/";
        foreach($utilityNames as $utiltiTitle){

            if(!preg_match($regex1, $utiltiTitle)){
                $utilityObj = get_page_by_title($utiltiTitle, OBJECT, 'utilities');
                if($utilityObj){ $utiltiTitle = $utilityObj->ID; }
            }
            $utilityIds[] = $utiltiTitle;

        }

        $hideUtility = true;

        if (isset($_GET['show'])) {
            if ($_GET['show'] == 'plans') {
                $showplans = true;
            } elseif ($_GET['show'] == 'gas') {
                $showGasPlans = true;
            }
        }

    }

    if(isset($_GET['plan'])){
        $planSelected = explode(',',$_GET['plan']);
    }
}elseif(isset($_GET['city']) && !empty($_GET['city'])){
    $city = $_GET['city'];
    $k = 'city='.$_GET['city'];

    if (isset($_GET['utility']) && !empty($_GET['utility'])) {

        $utilityNames = explode(',',$_GET['utility']);
        $k .= '&utility='.$_GET['utility'];

        $regex1="/^[0-9]+$/";
        foreach($utilityNames as $utiltiTitle){

            if(!preg_match($regex1, $utiltiTitle)){
                $utilityObj = get_page_by_title($utiltiTitle, OBJECT, 'utilities');
                if($utilityObj){ $utiltiTitle = $utilityObj->ID; }
            }
            $utilityIds[] = $utiltiTitle;

        }
        $hideUtility = true;

        if (isset($_GET['show'])) {
            if ($_GET['show'] == 'plans') {
                $showplans = true;
            } elseif ($_GET['show'] == 'gas') {
                $showGasPlans = true;
            }
        }

    }

    if(isset($_GET['plan'])){
        $planSelected = explode(',',$_GET['plan']);
    }
}elseif(isset($_GET['state']) && !empty($_GET['state'])){
    $state = $_GET['state'];
    $k = 'state='.$_GET['state'];

    if(!isset($_GET['utility']) || !isset($_GET['plans'])){
        $showAll_uti = true;
        $hideUtility = false;
        $_SESSION['enrol-step-data']['showAll'] = true;
    }

    if (isset($_GET['utility']) && !empty($_GET['utility'])) {

        $utilityNames = explode(',',$_GET['utility']);
        $k .= '&utility='.$_GET['utility'];

        $regex1="/^[0-9]+$/";
        foreach($utilityNames as $utiltiTitle){

            if(!preg_match($regex1, $utiltiTitle)){
                $utilityObj = get_page_by_title($utiltiTitle, OBJECT, 'utilities');
                if($utilityObj){ $utiltiTitle = $utilityObj->ID; }
            }
            $utilityIds[] = $utiltiTitle;

        }
        $hideUtility = true;

        if (isset($_GET['show'])) {
            if ($_GET['show'] == 'plans') {
                $showplans = true;
            } elseif ($_GET['show'] == 'gas') {
                $showGasPlans = true;
            }
        }

    }

    if(isset($_GET['plan'])){
        $planSelected = explode(',',$_GET['plan']);
    }
}elseif (isset($_GET['utility']) && !empty ($_GET['utility'])) {

    $utilityNames = explode(',',$_GET['utility']);
    $showAll_uti = $wildUtility = true;
    $k = 'utility='.$_GET['utility'];

    $regex1="/^[0-9]+$/";

    foreach($utilityNames as $utiltiTitle){

        if(!preg_match($regex1, $utiltiTitle)){
            $utilityObj = get_page_by_title($utiltiTitle, OBJECT, 'utilities');
            if($utilityObj){ $utiltiTitle = $utilityObj->ID; }
        }
        $utilityIds[] = $utiltiTitle;
        if($relatedUtil = get_field('related_utilities',$utiltiTitle)){
            $utilitiesWildcard = array_merge($utilityIds, $relatedUtil);
        }else{
            $utilitiesWildcard = $utilityIds;
        }
    }

//        print_r($utilityIds);
    if(empty($utilityIds)){
        wp_redirect( site_url('/enroll/') );
    }

    if (isset($_GET['show']) && $_GET['show'] == 'notification') {
        $hideUtility = true;
        $showplans = false;
        $showGasPlans = false;
    } elseif (isset($_GET['show']) && $_GET['show'] == 'plans') {
        $hideUtility = true;
        $showplans = true;
	    $showGasPlans = false;
    } elseif (isset($_GET['show']) && $_GET['show'] == 'gas') {
        $hideUtility = true;
        $showplans = false;
	    $showGasPlans = true;
    }

    if(isset($_GET['plan'])){
        $planSelected = explode(',',$_GET['plan']);
    }
}else{
//    wp_redirect( site_url('/enroll/') );
}


if(isset($_GET['showAll']) && $_GET['showAll']){
    $showAll_uti = true;
    $hideUtility = false;
    $_SESSION['enrol-step-data']['showAll'] = true;
}elseif(isset ($_SESSION['enrol-step-data']['showAll']) && $_SESSION['enrol-step-data']['showAll']){
    $showAll_uti = true;
}

if(($hideUtility && !$showplans && !$showGasPlans) || ($_GET['hideutility'] == 'notification') ){
    add_filter( 'body_class', 'custom_class' );
    function custom_class( $classes ) {
        $classes[] = 'scroll-to-plan-notification';
        return $classes;
    }
}
if($hideUtility && $showplans){
    add_filter( 'body_class', 'custom_class' );
    function custom_class( $classes ) {
        $classes[] = 'scroll-to-plans';
        return $classes;
    }
}
if($hideUtility && !$showplans && $showGasPlans){
    add_filter( 'body_class', 'carbon_better_custom_class' );
    function carbon_better_custom_class( $classes ) {
        $classes[] = 'scroll-to-gas-plans';
        return $classes;
    }
}

//print_r($_SESSION);

get_header();
// Global variables
global $option_fields;
global $pID;
global $fields;
global $wp;

$pageUrl = home_url( $wp->request );
$currentPageUrl = $pageUrl.'/?'.$k;

$prvsn_to_ftr_communicationmethods = $option_fields['prvsn_to_ftr_communicationmethods'];
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

?>

<!-- <div class="xxl-1"></div> -->
<section class="med-section steps-wrapper-section">
    <div class="wrapper">
        <div class="steps-container">
            <div class="single-step active">
                <a class="stepnumber-link" href="<?php echo site_url('/enroll/?');?>">
                <div class="step-number">
                    <span>1</span>
                </div>
                <div class="step-label">
                    <span>
                        <?php
                        if(!empty($city)){echo 'City: '.ucwords(strtolower($city)); }
                        elseif(!empty($zipcode)){ echo 'Zip Code: '.$zipcode; }
                        ?>
                    </span>
                </div>
                </a>
                <a href="<?php echo site_url('/enroll/?');?>" class="form-link">Change</a>
            </div>
            <!-- /.step -->
            <div class="single-step active current">

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
<!-- steps header -->
<div class="xl-3 cs-height"></div>

<div class="med-step-roll-container step-2">
    <div class="wrapper">
        <ul class="accordion">
            <li class="accordion-item first-step">
                <?php

                if($wildUtility && !empty($utilitiesWildcard) ){
                    $utilitiesArr = get_utilitiesByIds($utilitiesWildcard);
                }else{
                    $utilitiesArr = get_utilities($zipcode,$city,$state,$showAll_uti);
                }


//                print_pre($utilitiesArr);
                if(is_array($utilitiesArr) && !empty($utilitiesArr)){
                    ?>
                    <a class="toggle single-plans accordion-trigger <?php if(!$hideUtility){ echo 'accordion-open'; }?>" href="javascript:void(0)">
                        <!-- <h4 class="toggle-active-title center-align">Confirm your utility</h4> -->
                        <div class="active-data">
                            <?php

                            echo '<div class="col-left"><div class="toggle-inactive-title">Confirm your utility</div>';
                            foreach($utilityIds as $utilityId){
                                if(get_field('title',$utilityId)){ $title = get_field('title',$utilityId); }
                                else{$title = get_the_title($utilityId);}

                                $typs = get_the_terms( $utilityId, 'type' );
                                foreach($typs as $t){
                                    $typ = $t->name;
                                }
                                echo '<div class="toggle-inactive-sub-title">'.$typ .': '. $title.'</div>';
                            }
                            echo '</div>';
                            ?>
                            <div class="change-btn">Change <img src="<?php echo get_template_directory_uri(); ?>/assets/img/change-icon.svg" /></div>
                        </div>
                    </a>
                    <div class="inner cheakbox-container single-plans accordion-collapse" <?php if($hideUtility){ echo 'style="display: none"'; }?>>

                        <h2 class="center-align">Confirm your utility</h2>
                        <div class="cheakboxes">
                            <form id="utility_form">
                                <?php
                                foreach ($utilitiesArr as $UtilTerm){

                                    $post = $UtilTerm['posts'];
                                    $typeTerm = $UtilTerm['term'];
                                    echo '<div class="single-widget">';
                                    echo '<h5>'.$typeTerm['name'].':</h5>';
                                    echo '<div class="utility-content">
                                    <ul>';
                                    foreach ($post as $postID){
                                        $labelID = 'utility_'.$postID;
                                        $img = get_the_post_thumbnail($postID,'full');
                                        if(has_post_thumbnail($postID)){
                                            $inputLabel = get_the_post_thumbnail($postID,'full');
                                        }  else {
                                            $inputLabel = get_field('title',$postID);
                                        }
                                        $title = get_the_title($postID);
                                        ?>
                                        <li>
                                            <input type="radio" id="<?= $labelID ?>" name="utility_<?= $typeTerm['slug'] ?>" value="<?= $title ?>" <?php if(in_array($postID, $utilityIds)) echo 'checked'; ?>/>
                                            <label for="<?=$labelID ?>"><span><?= $inputLabel; ?></span></label>
                                        </li>
                                        <?php
                                    }
                                    echo '</ul></div>';
                                    echo '</div><!--single-widget -->';
                                }
                                ?>
                                <div class="clear"></div>

                                <div class="form-button-area center-align">
                                    <button type="button" class="form-red-btn" onclick="step_form_2_1(this)">Confirm</button><div class="form-loader"></div>
                                    <?php if(!$showAll_uti): ?>
                                    <span>Don't see your utility? <a href="<?= $currentPageUrl.'&showAll=true'; ?>" class="form-link">Show All</a></span>
                                    <?php endif; ?>

                                </div>
                                <input type="hidden" value="<?= $zipcode ?>" name="zip-code"/>
                                <input type="hidden" value="<?= $city ?>" name="city"/>
                                <input type="hidden" value="<?= $state ?>" name="state"/>
                            </form>
                        </div>
                        <?php
                    }else{
                        wp_redirect( site_url('/enroll/') );
                        ?>
                        <h2 class="center-align">Notify When utility Available!</h2>
                        <div class="form-wrapper notify-me-box">
                            <?php
                            echo do_shortcode('[gravityform id="6" title="false" description="false" ajax="true"]');

                            ?>
                        </div>
                        <?php
                    }
                    ?>



                </div>
            </li>
			<?php if($_GET['utility']!="") { ?>
            <li class="accordion-item accordion-notification second-step">
                <a class="toggle single-plans accordion-trigger  <?php if($hideUtility && (!$showplans && !$showGasPlans)) echo 'accordion-open'; ?>" href="javascript:void(0)">

                    <h4 class="toggle-active-title center-align">Want a copy of available plans by email?</h4>
                    <div class="active-data" style="display:none;">
                        <div class="col-left" sty>
                            <div class="toggle-inactive-title">Want a copy of available plans by email?</div>
                            <div class="toggle-inactive-sub-title" id="notification-email"></div>
                        </div>

                        <!-- <div class="change-btn">Change <img src="<?php echo get_template_directory_uri(); ?>/assets/img/change-icon.svg" /></div> -->
                    </div>
                </a>
                <div class="inner single-plans accordion-collapse"<?php if($hideUtility && (!$showplans && !$showGasPlans)){ echo 'style="display: block;"'; } ?> >
                    <div id="popup" class="plan-option-overview">
                        <h2 class="center-align">Want your plan options sent by email?</h2>
                        <div class="state-cta-right">
                            <div  class="cta-newsletter" id="popup-form-nl">

                                <?= do_shortcode('[gravityform id="7" title="false" description="false" ajax="true"]'); ?>

		    		<span id="spanPartnerCode" class="partner-code form-link" style="visibility: hidden;">+ Partner Code?</span>

				<div id="divPartnerContainer" class="gf_browser_chrome gform_wrapper gform_legacy_markup_wrapper" style="display: none; clear: both;">
				    <input type="text" id="inputPartnerCode" style="background-color: #F5F5F5;">
				</div>

                                <div class="form-button-area center-align">
                                    <a href="#" class="form-link skip-plans">Skip to plans </a>
                                </div>
                                <!-- /.link-bar -->
                            </div>
                            <!-- /.plan-option-overview -->
                        </div>
                    </div>
                    </li>
                    <li class="accordion-item accordion-plans center-align third-step">
                        <a class="toggle single-plans accordion-trigger accordion-plans choose-plan-module <?php if($hideUtility && ($showplans || $showGasPlans)) echo 'accordion-open'; ?>" href="javascript:void(0)">
                            <h4 class="center-align">Choose your plan</h4>
                        </a>

                        <div class="inner single-plans steps-address-container accordion-collapse" <?php if($hideUtility && ($showplans || $showGasPlans)){ echo 'style="display: block;"'; } ?>>
                            <form id="plan_form">
                                <input type="hidden" name="utility" value="<?= implode(',',$utilityNames) ?>" />
                                <input type="hidden" name="zip-code" value="<?= $zipcode ?>" />
                                <input type="hidden" name="state" value="<?= $state ?>" />
                                <input type="hidden" name="city" value="<?= $city ?>" />
                                <input type="hidden" id="notification_email" name="email" value="" />
                            <?php

                             foreach ($utilityIds as $utility){

                                 $typs = get_the_terms( $utility, 'type' );
                                 foreach($typs as $t){
                                     $typ = $t->name;
                                     $typSlug = $t->slug;
                                 }

                                $plansArr = get_plans($utility);

                                if(is_array($plansArr) && !empty($plansArr)){
                                    ?>

                                <!-- /.join-two-plans -->

				    <h2 <?= (strtolower($typ) == 'natural gas') ? 'class="accordion-gas-plans"' : ''; ?>>Choose your <?php echo strtolower($typ); ?> plan </h2>
                                    <div class="join-two-plans">
                                        <?php
                                        if(has_post_thumbnail($utility)){
                                            echo get_the_post_thumbnail("$utility",'full');
                                        }else{
                                            echo get_field('title',$utility);
                                        }

                                        ?>
                                    </div>
                                    <div class="steps-widgets-two">

                                        <?php
                                        foreach($plansArr as $planId){
                                            $planTitle = get_the_title($planId);
                                            $lableFor = 'plan_'.$planId;
                                            $rate_type = get_field('planscpt_rate_type',$planId);
                                            $benefit1 = get_field('planscpt_benefit_1',$planId);
                                            $benefit2 = get_field('planscpt_benefits_2',$planId);
                                            $benefit3 = get_field('planscpt_benefits_3',$planId);
                                            $benefit4 = get_field('planscpt_benefits_4',$planId);
                                            $benefit5 = get_field('planscpt_benefits_5',$planId);
                                            $most_popular = get_field('planscpt_most_popular_plan',$planId);
                                            $carbonBetter = get_field('planscpt_carbon_better_plan',$planId);

                                            $faq_1 = get_field('faq_1',$planId);
                                            $faq_2 = get_field('faq_2',$planId);

                                            $class = ($most_popular) ? 'popular' : '';
                                            $t_cPdf = get_field('t_c_pdf_name',$planId);
                                            ?>
                                            <div class="single-step-widget <?php echo $class; ?>">


                                                <div class="widget <?php if(in_array($planId,$planSelected)){ echo 'selected'; } ?>">
                                                    <div class="step-widget-inner">
                                                        <?php
                                                        if(!empty($most_popular)){
                                                            echo '<div class="popular-plans">OUR MOST POPULAR PLAN</div><!-- /.popular-plans -->';
                                                        }
                                                        if($carbonBetter){
                                                            echo '<h5 class="trade-mark"> CarbonBetter&#8482; </h5>';
                                                        }else{
                                                            echo '<h5 class="trade-mark"></h5>';
                                                        }
                                                        ?>

                                                        <h2 class="doration"><?php echo get_the_title($planId); ?></h2>
                                                        <p class="plan_benifits">
                                                            <?php
                                                            if(!empty($benefit1)){
                                                                echo $benefit1;
                                                            }
                                                            if(!empty($benefit2)){
                                                                echo '<br/>'.$benefit2;
                                                            }
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <!-- /.step-widget-inner -->
                                                    <div class="price-bar-area">
                                                        <div class="price-area">
                                                            <div class="inner-area">
                                                                <?php if($regularPrice = get_field('planscpt_regular_price',$planId)){?>
                                                                    <h6>Regular price: <span>$<?= $regularPrice?> </span></h6>
                                                                <?php }?>
                                                                <div class="block-div">
                                                                    <h2 class="price-list">$<?php echo get_field('planscpt_price',$planId);?></h2>
                                                                    <?php
                                                                    if(!empty($faq_1)){
                                                                        ?>
                                                                        <div class="tooltip-bar">
                                                                        <div class="tooltip-inner">
                                                                            <a href="#" class="tooltip">
                                                                                <div class="tooltip-content">
                                                                                    <?= $faq_1 ?>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                        <?php
                                                                    }

                                                                    ?>
                                                                </div>
                                                                <!-- /.tooltip-bar -->
                                                                <h6 class="light">per <?php echo get_field('planscpt_unit',$planId);?></h6>
                                                            </div>
                                                            <?php if($planDiscount = get_field('planscpt_discount',$planId)){?>
                                                                <div class="discount-bar"><?= $planDiscount ?>off first month rate </div>
                                                            <?php }?>
                                                            <!-- /.discount-bar -->
                                                        </div>
                                                        <!-- price area -->

                                                    </div>
                                                    <!-- /.price-bar-area -->
                                                    <div class="button-bar">
                                                        <input type="radio" name="plan_<?= $typSlug ?>" id="plans_<?= $planId ?>" value="<?= $planId ?>" <?php if(in_array($planId,$planSelected)){ echo 'checked'; } ?> >
                                                        <label for="plans_<?= $planId ?>">
                                                            <button type="button" class="form-green-btn sel-radio"> select this plan</button>
                                                        </label>
                                                        <?php
                                                        if(!empty($benefit3)){
                                                            echo '<span class="about-fees">'.$benefit3.'</span>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="about-tress">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/steps-form-image-03.svg" alt="Tress Image">
                                                        <div class="garranty">
                                                            <?php if(!empty($benefit4)): echo '<p>'.$benefit4.'</p>'; endif; ?>
                                                            <?php if(!empty($benefit5)): echo '<p>'.$benefit5.'</p>'; endif; ?>
                                                            <?php
                                                            if(!empty($faq_2)){
                                                                ?>
                                                                <span class="tooltip-bar">
                                                                    <div class="tooltip-inner">
                                                                        <span href="#" class="tooltip">
                                                                            <div class="tooltip-content">
                                                                                <?= $faq_2 ?>
                                                                            </div>
                                                                        </span>
                                                                    </div>
                                                                </span>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <!-- /.garranty -->
                                                    </div>
                                                    <!-- /.about-tress -->
                                                </div>
                                                <?php if($t_cPdf){
                                                    $t_cPdfurl = get_pdf_url($t_cPdf);
                                                    $handle = @fopen($t_cPdfurl, 'r');
                                                    if(!$handle){
                                                        $t_cPdfurl = false;
                                                    }else{
                                                        $t_cPdfurl = $t_cPdfurl;
                                                    }
                                                    if($t_cPdfurl){
                                                    ?>
                                                    <div class="term-and-condition"><a href="<?= $t_cPdfurl?>" target="_blank" class="form-link"> Terms & Conditions<?php // $t_cLink['title'] ?></a></div>
                                                <?php }} ?>
                                            </div>
                                            <!-- /.widget -->
                                            <?php
                                        }
                                        ?>
                                        <!-- /.widget -->
                                        <div class="clear"></div>
                                    </div>

                                <!-- /.steps-widgets-two -->

                                <?php
                                // finish plans existing
                                }
                                else{
                                ?>
                                <h2>Choose your plan </h2>
                                <p>Please select Utility First!</p>
                                <?php
                                 }

                             //foreach utilities end
                            }
                            ?>
                            </form>
                            <div class="more-links">
                                <!--<a href="#" class="disabled button">Confirm selected plan</a>-->

                                <button type="button" onclick="step_form_2_2(this)" class="button" id="sel_plan_btn" disabled="disabled">Confirm Selected Plan </button><div class="form-loader"></div>
                                <div class="image-with-links">
                                        <div class="link-image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/call-us-icon.svg" alt="Call Us">
                                            <div class="contact-dropdown">
                                                <div class="dropdown-heading-box center-align">
<!--                                                    <h4>Question?</h4>
                                                    <span>We're here to help.</span>-->
                                                    <h4><?php echo $pwrvsn_header_co_headline; ?></h4>
                                                    <span><?php echo $pwrvsn_header_co_text; ?></span>

                                                </div>
                                                <div class="header-contact-container">
                                                    <div class="header-contact">
<!--                                                        <a href="#">
                                                            <span class="contact-icon">
                                                                <img src="https://provisionstagi.wpengine.com/wp-content/themes/provision/assets/img/call-icon.svg" alt="">
                                                            </span>
                                                            <span>
                                                                <h6> 800-930-5427 </h6>
                                                                <small>Mon - Fri 8:00 a.m. - 6:30 p.m. CST</small>
                                                            </span>
                                                        </a>-->
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
                                        </div>
                                        <!-- /.link-image -->
                                        <div class="need-help">
                                            <h4>Need Help?</h4>
                                        </div>
                                        <!-- /.more-link -->
                                </div>
                                <!-- /.image-with-links -->
                                <p>Want more detailed plan info? <a href="#popup" id="request_pricing">Request pricing sheet</a></p>
                            </div>
                            <div class="content-wrapper">
                                <?php the_content(); ?>
                            </div>
                    </div>
                </li>
			<?php } ?>
                <div class="clear"></div>
                <!-- /.clear -->
            </ul>
        </div>
        <!-- /.wrapper -->
    </div>
    <!-- cheakbox contact Container -->
    <div class="xxl-1"></div>
		<script>

		jQuery(function() {

		    var $partnerCodeHiddenInput = jQuery('#input_7_29');
		    var partnerCodeHiddenInputText = 'input_7_29';

		    var fullAddressHiddenInputId = 'input_7_30';
		    var $fullAddressHiddenInput = jQuery('#input_7_30');
		    var fullAddress = { 
                        "address": <?= isset($_SESSION["enrol-step-data"]["address"]) && !empty($_SESSION["enrol-step-data"]["address"]) ? json_encode($_SESSION['enrol-step-data']['address']) : "''"; ?>
                    };

                    jQuery('.partner-code').css('display', 'inherit');
                    jQuery('.partner-code').css('font-size', '12px');
                    jQuery('.partner-code').css('margin-right', '10px');
                    jQuery('.partner-code').css('visibility', 'visible');
                    jQuery('#inputPartnerCode').css('width', '100%');

                    jQuery('.partner-code').mouseenter(function() {
    			jQuery(this).css('cursor', 'pointer');
		    }).mouseleave(function() {
    			jQuery(this).css('cursor', 'default');
		    });

		    // Set a higher margin above the partner code on smaller screens.
		    document.querySelector('style').textContent += "@media screen and (max-width:767px) { .partner-code { margin-top: 25px; }}";

		    // Set the address.
		    document.getElementById(fullAddressHiddenInputId).value = fullAddress.address;

		    jQuery('#spanPartnerCode').click(function() {

			    jQuery('#divPartnerContainer').slideToggle('slow', function() {

				    jQuery(this).focus();

			    });

			    if (jQuery(this).text().indexOf('+') !== -1) {
			        jQuery(this).text('- Partner Code?');
			    } else {
			        jQuery(this).text('+ Partner Code?');
			    }
		    });

		    // Populate the hidden field partner code on keyup.
		    jQuery('#divPartnerContainer').on('keyup', '#inputPartnerCode', function() {
			    document.getElementById(partnerCodeHiddenInputText).value = jQuery(this).val();
		    });

		    // Populate the hidden field partner code on form submission, in case it was pasted in.
		    jQuery(document).on('submit', 'gform_7', function() {

			    document.getElementById(partnerCodeHiddenInputText).value = jQuery('#inputPartnerCode').val();

		    });

		    // Animate scrolling to the gas plans.
		    if (jQuery('body').hasClass('scroll-to-gas-plans')) { 

			var offsetToGasPlans = 20;

			<?php if (is_admin_bar_showing()) { ?>
			    offsetToGasPlans += 32;
			<?php } ?>

                        jQuery('html, body').animate({
                            scrollTop: ($('.accordion-gas-plans').offset().top - jQuery('header.step-header').height() - offsetToGasPlans)
                        }, 500);
                    }

		});

		</script>
    <?php
    get_footer();
