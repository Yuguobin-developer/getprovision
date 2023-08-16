<?php
/**
 * Custom functions added to all projects
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Redica
 * @since 1.0.0
 */
global $formSession;


/**
 * Excerpt Function
 *
 * Function used to create excerpt for single posts.
 */
function custom_excerpt( $count ) {
	global $post;
	$permalink = get_permalink( $post->ID );
	$excerpt   = get_the_content();
	$excerpt   = strip_tags( $excerpt );
	$excerpt   = substr( $excerpt, 0, $count );
	$excerpt   = substr( $excerpt, 0, strripos( $excerpt, ' ' ) );
	$excerpt   = $excerpt . ' ...';
	$excerpt   = $excerpt;
	return $excerpt;
}


/**
 * Excerpt with no Read More option
 *
 * Function used to create excerpt for single posts.
 */
function custom_excerpt_no_more( $count ) {
	$permalink = get_permalink( $post->ID );
	$excerpt   = get_the_content();
	$excerpt   = strip_tags( $excerpt );
	$excerpt   = substr( $excerpt, 0, $count );
	$excerpt   = substr( $excerpt, 0, strripos( $excerpt, ' ' ) );
	$excerpt   = $excerpt;
	return $excerpt;
}


/**
 * Pagination Function
 *
 * The pagination function to display paginatio on a archive page
 */
function pagination( $pages = '', $range = 4 ) {
	$showitems = ( $range * 2 ) + 1;

	global $paged;
	if ( empty( $paged ) ) {
		$paged = 1;
	}

	if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if ( ! $pages ) {
			$pages = 1;
		}
	}

	if ( 1 != $pages ) {
		echo '<div class="pagination"><span>Page ' . $paged . ' of ' . $pages . '</span>';
		if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( 1 ) . "'>&laquo; First</a>";
		}
		if ( $paged > 1 && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( $paged - 1 ) . "'>&lsaquo; Previous</a>";
		}

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				echo ( $paged == $i ) ? '<span class="current">' . $i . '</span>' : "<a href='" . get_pagenum_link( $i ) . "' class=\"inactive\">" . $i . '</a>';
			}
		}

		if ( $paged < $pages && $showitems < $pages ) {
			echo '<a href="' . get_pagenum_link( $paged + 1 ) . '">Next &rsaquo;</a>';
		}
		if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( $pages ) . "'>Last &raquo;</a>";
		}
		echo "<div class='clear'></div></div>\n";
	}
}


/**
 * Allow SVG files upload in WordPress Media panel
 *
 * By default the WordPress doesn't allows you to upload SVG files.
 * This function is used to remove that restriction so that you can
 * upload SVG files.
 */
function fix_svg_upload_error( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter( 'upload_mimes', 'fix_svg_upload_error' );


/**
 * Remove default WordPress login  logo link
 *
 * This function removes the default link on the login screen logo.
 * Makes this logo go to homepage of the website.
 */
function custom_login_logo_url( $url ) {
	return '"' . home_url() . '"';
}

add_filter( 'login_headerurl', 'custom_login_logo_url' );


/**
 * Add viewport meta tag in head
 */
function viewport_tag() {
	echo '
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />
	';
}

add_action( 'wp_head', 'viewport_tag' );

add_action('init', 'myStartSession', 1);
function myStartSession() {
    
    if(!session_id()) {
        session_start();
    }
    
}

function destroy_sessions() {
session_destroy();
//clear_all_cookie();
}
add_action('wp_logout', 'destroy_sessions');
add_action('wp_login', 'destroy_sessions');


/**
 * First and last menu item classes
 */
add_filter( 'wp_nav_menu_objects', 'wpb_first_and_last_menu_class' );
function wpb_first_and_last_menu_class( $items ) {
	$items[1]->classes[]                 = 'first-menu-item';
	$items[ count( $items ) ]->classes[] = 'last-menu-item';
	return $items;
}

// To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

/*==================Most View posts============================*/

/* Fuction.php*/

function wpb_set_post_views( $postID ) {
	$count_key = 'wpb_post_views_count';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		$count = 0;
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );
	} else {
		$count++;
		update_post_meta( $postID, $count_key, $count );
	}
}


add_filter( 'gform_progress_bar', 'my_custom_function', 10, 3 );
function my_custom_function( $progress_bar, $form, $confirmation_message ) {
	// if you are using the filter gform_progressbar_start_at_zero, adjust the page number as needed
	$current_page   = GFFormDisplay::get_current_page( $form['id'] );
	$page_count     = GFFormDisplay::get_max_page_number( $form );
	$first_class    = null;
	$second_class   = null;
	$first_finished = null;
	if ( $current_page == 1 ) {
		$first_class = 'active';
	} else {
		$first_class = null;
	}
	if ( $current_page == 2 ) {
		$second_class = 'active';
	} else {
		$second_class = null;
	}
	if ( $current_page > 1 ) {
		$first_finished = 'step-finished';
	} else {
		$first_finished = null;
	}
	$progress_bar = str_replace( 'Step ' . $current_page . ' of ' . $page_count, 'Level ' . $current_page . ' out of ' . $page_count . ' Level(s)', $progress_bar );
	$progress_bar = '<h3 class="gf_progressbar_title featured-form-top">
		<span class="counting ' . $first_class . $first_finished . '">1</span>
		<span class="forward-line"></span>
		<span class="counting ' . $second_class . '">2</span>
	</h3>';
	return $progress_bar;
}

add_filter( 'nav_menu_css_class', 'be_menu_item_classes', 10, 3 );
function be_menu_item_classes( $classes, $item, $args ) {
    if( ( is_category() ) && 'Resources' == $item->title )
        $classes[] = 'current-menu-item';
    return array_unique( $classes );
}


add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
function my_wp_nav_menu_objects( $items, $args ) {
    // loop
    foreach( $items as &$item ) {
        // vars
        $icon = get_field('icon', $item);

        // append icon
        if( $icon ) {
            $item->title = '<span class="menu-img common-menuclass" ><img src="' . $icon . '" /></span>'. "<span>" . $item->title . "</span>";
        }
    }
    // return
    return $items;
}


function get_utilities($zipcode = null, $city = null, $state = null, $showAll = false){
    
    $utilitiesArr = array();
    $terms = get_terms( array(
        "taxonomy" => "type",
            )
        );
    
    global $wpdb;
    $postsTable = $wpdb->prefix . 'posts';
    $postMetaTable = $wpdb->prefix . 'postmeta';
    $termRelationShip = $wpdb->prefix.'term_relationships';
    $utilityPostData = $wpdb->prefix.'utility_post_data';
    
    foreach ($terms as $term) { 
        $termId = $term->term_id;
       if(!empty($zipcode) && !$showAll){
           $sql = "SELECT SQL_CALC_FOUND_ROWS $postsTable.ID FROM $postsTable LEFT JOIN $termRelationShip ON (wp_posts.ID = $termRelationShip.object_id) LEFT JOIN $utilityPostData ON ( $postsTable.ID = $utilityPostData.post_id ) WHERE 1=1 AND ( $termRelationShip.term_taxonomy_id IN ($termId) ) AND ( $utilityPostData.zipcode LIKE '%$zipcode%' ) AND $postsTable.post_type = 'utilities' AND ($postsTable.post_status = 'publish') GROUP BY $postsTable.ID ORDER BY $postsTable.menu_order ASC";
       }elseif(!empty($state) && !empty($city) && !$showAll){
           
           $sql = "SELECT SQL_CALC_FOUND_ROWS $postsTable.ID FROM $postsTable LEFT JOIN $termRelationShip ON ($postsTable.ID = $termRelationShip.object_id) INNER JOIN $utilityPostData ON ( $postsTable.ID = $utilityPostData.post_id ) INNER JOIN $utilityPostData AS upd1 ON ( $postsTable.ID = upd1.post_id ) WHERE 1=1 AND ( $termRelationShip.term_taxonomy_id IN ($termId) ) AND ( ( $utilityPostData.state LIKE '$state' ) AND ( upd1.city LIKE '$city' ) ) AND $postsTable.post_type = 'utilities' AND ($postsTable.post_status = 'publish') GROUP BY $postsTable.ID ORDER BY $postsTable.menu_order ASC";

       }elseif(!empty($city) && !$showAll){
           
           $sql = "SELECT SQL_CALC_FOUND_ROWS $postsTable.ID FROM $postsTable LEFT JOIN $termRelationShip ON ($postsTable.ID = $termRelationShip.object_id) INNER JOIN $utilityPostData ON ( $postsTable.ID = $utilityPostData.post_id ) INNER JOIN $utilityPostData AS upd1 ON ( $postsTable.ID = upd1.post_id ) WHERE 1=1 AND ( $termRelationShip.term_taxonomy_id IN ($termId) ) AND upd1.city LIKE '$city' AND $postsTable.post_type = 'utilities' AND ($postsTable.post_status = 'publish') GROUP BY $postsTable.ID ORDER BY $postsTable.menu_order ASC";

       }elseif($showAll){
           
           if(!empty($zipcode)){ $state = get_state_city_from_zip($zipcode); $state = $state['state']; };
           
           $sql = "SELECT SQL_CALC_FOUND_ROWS $postsTable.ID FROM $postsTable LEFT JOIN $termRelationShip ON ($postsTable.ID = $termRelationShip.object_id) INNER JOIN $utilityPostData ON ( $postsTable.ID = $utilityPostData.post_id ) INNER JOIN $utilityPostData AS upd1 ON ( $postsTable.ID = upd1.post_id ) WHERE 1=1 AND ( $termRelationShip.term_taxonomy_id IN ($termId) ) AND ( $utilityPostData.state LIKE '$state' ) AND $postsTable.post_type = 'utilities' AND ($postsTable.post_status = 'publish') GROUP BY $postsTable.ID ORDER BY $postsTable.menu_order ASC";
       }
       
       $values = $wpdb->get_col( $sql );
       if(!empty($values)){
            $utilitiesArr[$termId]['term'] = array('id'=>$term->term_id ,'name'=> $term->name, 'slug'=> $term->slug);
            $utilitiesArr[$termId]['posts'] = $values;
       }else{
           $return = false;
       }
       
    }
    
    return $utilitiesArr;
    
}

function get_utilitiesByIds($ids = array()){
    if(empty($ids)) return;
    
    $utilitiesArr = array();
    $args = array(
        'post_type' => 'utilities',
        'fields'    => 'ids',
        'post__in'  => $ids,
        'posts_per_page' => -1
    );
    
            
    $the_query = new WP_Query( $args );
    
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $term = get_the_terms( get_the_ID(), 'type' );
//            print_r($term);
            $utilitiesArr[$term[0]->term_id]['term'] = array('id'=>$term[0]->term_id ,'name'=> $term[0]->name, 'slug'=> $term[0]->slug);
            if(has_term($term->ID,'type',get_the_ID())){
                $utilitiesArr[$term[0]->term_id]['posts'][] = get_the_ID();
            }
        }
    } 
    
    

    wp_reset_postdata();
    return $utilitiesArr;
}

function get_plans($utility = 0){
    $plansArr = array();
    
    $utility = get_the_title($utility);
    
    $args = array(
            'numberposts'   => -1,
            'fields'        => 'ids',
            'post_type'     => 'plans',
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'meta_query'    => array(
                    'relation'  => 'AND',
                    array(
                        'key'       => 'planscpt_utility',
                        'value'     => $utility,
                        'compare'   => '='
                    ),

            )
    );
    
    
    $the_query = new WP_Query( $args );
        
    if($the_query->have_posts()){
        $plansArr = $the_query->posts;
        wp_reset_postdata();
    }else{
        wp_reset_postdata();
        return false;
    }
    return $plansArr;
}

function isUtility_available($zipcode =  null,$city = null,$state = null){
    $return = false;
    
    global $wpdb;
    $postsTable = $wpdb->prefix . 'posts';
    $postMetaTable = $wpdb->prefix . 'postmeta';    
    $utilityPostData = $wpdb->prefix.'utility_post_data';
    
    if(!empty($zipcode)){
        
        $sql = "SELECT SQL_CALC_FOUND_ROWS $postsTable.ID FROM $postsTable INNER JOIN $utilityPostData ON ( $postsTable.ID = $utilityPostData.post_id ) INNER JOIN $utilityPostData AS mt1 ON ( $postsTable.ID = mt1.post_id ) WHERE 1=1 AND ( $utilityPostData.zipcode LIKE '$zipcode' ) AND $postsTable.post_type = 'utilities' AND ($postsTable.post_status = 'publish') GROUP BY $postsTable.ID ORDER BY $postsTable.menu_order ASC";
        
    }elseif(!empty($state) && !empty($city)){
                
        $sql = "SELECT SQL_CALC_FOUND_ROWS $postsTable.ID FROM $postsTable INNER JOIN $utilityPostData ON ( $postsTable.ID = $utilityPostData.post_id ) INNER JOIN $postMetaTable AS mt1 ON ( $postsTable.ID = mt1.post_id ) WHERE 1=1 AND ( ( $utilityPostData.state LIKE '$state' ) AND ( $utilityPostData.city LIKE '$city' ) ) AND $postsTable.post_type = 'utilities' AND ($postsTable.post_status = 'publish') GROUP BY $postsTable.ID ORDER BY $postsTable.menu_order ASC";
       
    }else{
        return false;
    }
    
    $values = $wpdb->get_col( $sql );
    if(!empty($values)){
        $return = true;
    }else{
        $return = false;
    }
    
    return $return;
    
}

function get_state_city_from_zip($zipcode = 0){
    
    $google_maps_api = get_field('map_api_key', 'option');
    
    $response = wp_remote_request(
            'https://maps.googleapis.com/maps/api/geocode/json?address='.$zipcode.'&key='.$google_maps_api.'&type=json',
            array('method'     => 'GET')
            );
    
    $body = json_decode(wp_remote_retrieve_body($response));
    
    $response = $body->results;
    foreach ($response as $result){
        if(isset($result->address_components)){
            foreach($result->address_components as $val){
                if(in_array('administrative_area_level_1', $val->types)){
                    $return['state'] = $val->long_name;
                }
                if(in_array('locality', $val->types)){
                    $return['city'] = $val->long_name;
                }
            }
            return $return;
        }else{
            return 0;
        }
        
    }
    return $response;
}

function get_pdf_url($pdfName = null){
    $uploadDir = wp_upload_dir();
    return $uploadDir['baseurl'].'/plans_pdf/'.$pdfName;//'#view=fitv#zoom=50'
}

function get_utility_by_plan($planID = 0){
    if(!$planID){ return; }
    
    $utiltiTitle = get_field('planscpt_utility',$planID);
    
    $utility = get_page_by_title($utiltiTitle, OBJECT, 'utilities');
    return $utility;
}

function get_hidden_value($ids = '',$type = '', $field = null){
    
    $return = null;
    $returnArr = array();
    if(($type !== 'plan' && $type !== 'utility') || empty($ids)){
        
        return null;
    }elseif($type == 'plan'){
        $idArr = explode(',',$ids);
        if(empty($field)) $field = 'rate_name';
        if($field == 'price'){
            foreach($idArr as $id){
                $price = (!empty(get_field('planscpt_price',$id))) ? get_field('planscpt_price',$id) : get_field('planscpt_regular_price',$id);
                $unit = get_field('planscpt_unit',$id);
                $returnArr[] = $price.' per '.$unit;
            }
            
        }else{
            foreach($idArr as $id){
                $returnArr[] = get_field($field,$id);
            }        
        }
        $return = implode(',',$returnArr);
        
    }elseif($type == 'utility'){
        $idArr = explode(',',$ids);
        if(empty($field)){
            foreach ($idArr as $id){
                $returnArr[] = get_the_title($id);
            }
        }else{
            foreach ($idArr as $id){
                $accVals = get_field('utility_master_data',$id);
                $returnArr[] = $accVals[$field];
            }
        }
        
        $return = implode(',',$returnArr);
    }
    return $return;
}

/**
 * 
 * @param type $where
 * @return type
 * replace $ with % symobl in WP_query where condition
 */
add_filter('posts_where', 'my_posts_where');
function my_posts_where( $where ) {
    $where = str_replace("meta_key = 'zipcodes_$", "meta_key LIKE 'zipcodes_%", $where);
    return $where;
}


/*================== Ajax Functions for steps ============================*/
## step 1 searched with zipcode ##
/*
 * accepts $_POST with zipcode
 * return URL on success
 * error on fail
 * 
 * set session and cookie as per the searched zipcode
 */
add_action("wp_ajax_step_form_1_zip", 'step_form_1_zip');
add_action("wp_ajax_nopriv_step_form_1_zip", "step_form_1_zip");
function step_form_1_zip(){
    $return = array();
    if(!isset($_POST['zipcode']) || empty($_POST['zipcode'])){
        $return['status'] = 'error';
        $return['error'] = 'zip is not valid';
        wp_send_json($return);
        die();
    }elseif($utility = isUtility_available($_POST['zipcode'])){
        
        $_SESSION['enrol-step-data']['zipcode'] = $_POST['zipcode'];
        
        $stateCity = get_state_city_from_zip($_POST['zipcode']);
        
        $_SESSION['enrol-step-data']['state'] = $stateCity['state'];
        $_SESSION['enrol-step-data']['city'] = $stateCity['city'];
        
        $str = 'zipcode='.$_POST['zipcode'];//.'&utility='.implode(',',$utility);
        
        setcookie('userEnrolldetails', json_encode($_SESSION['enrol-step-data']), time() + 86400, "/");
        $return['status'] = 'success'; 
//        $return['url'] = '?k='.base64_encode($str);
        $return['url'] = $str;
        
    }else{
        $return['status'] = 'fail';
        $return['message'] = 'zip code is not available';
    }
    $_SESSION['enrol-step-data']['showAll'] = false;
    wp_send_json($return);
    die();
    
    
}

## step 1 searched with Address ##
/**
 * accepts $_POST
 * Address with state & city
 * return URL with state city to next step 2
 * error message on fails
 * 
 * set session data based on the search result for address
 */
add_action("wp_ajax_step_form_1_address", 'step_form_1_address');
add_action("wp_ajax_nopriv_step_form_1_address", "step_form_1_address");
function step_form_1_address(){
    $return = array();
    
    if (isset($_POST['zipcode']) && !empty($_POST['zipcode'])) {
        $utility = isUtility_available($_POST['zipcode']);
        
        if($utility){
            $_SESSION['enrol-step-data']['zipcode'] = $_POST['zipcode'];

            if(!empty($_POST['state']) && !empty($_POST['city'])){
                $stateCity['state'] = $_POST['state'];
                $stateCity['city'] = $_POST['city'];
            }else{
                $stateCity = get_state_city_from_zip($_POST['zipcode']);
            }


            $_SESSION['enrol-step-data']['state'] = $stateCity['state'];
            $_SESSION['enrol-step-data']['city'] = $stateCity['city'];

            $str = 'city='.$stateCity['city'].'&state='.$stateCity['state']; //.'&utility='.implode(',',$utility);
            $return['status'] = 'success'; 
    //        $return['url'] = '?k='.base64_encode($str);
            $return['url'] = $str;
        }else{
            $return['status'] = 'fail';
            $return['message'] = 'Address is not available';
        }
        
    }elseif(isset($_POST['city']) && !empty($_POST['city'])
            && isset($_POST['state']) && !empty($_POST['state'])
            ){
        $utility = isUtility_available('',$_POST['city'],$_POST['state']);
                //if
        if($utility){
            $_SESSION['enrol-step-data']['state'] = ucwords(strtolower($_POST['state']));
            $_SESSION['enrol-step-data']['city'] = ucwords(strtolower($_POST['city']));
            
            $str = 'city='.ucwords(strtolower($_POST['city'])).'&state='.ucwords(strtolower($_POST['state']));//.'&utility='.implode(',',$utility);

            $return['status'] = 'success'; 
    //        $return['url'] = '?k='.base64_encode($str);
            $return['url'] = $str;
            
        }else{
            $return['status'] = 'fail';
            $return['message'] = 'Address is not available';
        }
        //else no post available
    }else{
        $return['status'] = 'error';
        $return['error'] = 'Adress is not valid';
        wp_send_json($return);
        die();
    }
    
    if(isset($_POST['zipcode']) && !empty($_POST['zipcode']) ){
//            $str .= '&zipcode='.$_POST['zipcode'];
        $_SESSION['enrol-step-data']['zipcode'] = $_POST['zipcode'];
    }
    if(isset($_POST['address']) && !empty($_POST['address']) ){
//        $str .= '&address='.$_POST['address'];
        $_SESSION['enrol-step-data']['address'] = $_POST['address'];
    }
    if(isset($_POST['street_number']) && !empty($_POST['street_number']) ){
//            $str .= '&address='.$_POST['address'];
        $_SESSION['enrol-step-data']['street_number'] = $_POST['street_number'];
    }
    if(isset($_POST['route']) && !empty($_POST['route']) ){
//            $str .= '&address='.$_POST['address'];
        $_SESSION['enrol-step-data']['route'] = $_POST['route'];
    }
    if(isset($_POST['admin_lv_3']) && !empty($_POST['admin_lv_3']) ){
//            $str .= '&address='.$_POST['address'];
        $_SESSION['enrol-step-data']['admin_lv_3'] = $_POST['admin_lv_3'];
    }
    if(isset($_POST['admin_lv_2']) && !empty($_POST['admin_lv_2']) ){
//            $str .= '&address='.$_POST['address'];
        $_SESSION['enrol-step-data']['admin_lv_2'] = $_POST['admin_lv_2'];
    }
    
    $_SESSION['enrol-step-data']['showAll'] = false;
    setcookie('userEnrolldetails', json_encode($_SESSION['enrol-step-data']), time() + 86400, "/");
    
    wp_send_json($return);
    die();
    
    
}

## step 2 searched with Utility ##
/**
 * accepts State-city or zipcode & Utility Ids
 * return URL for select Plans steps
 * 
 */
add_action("wp_ajax_step_form_2_1", 'step_form_2_1');
add_action("wp_ajax_nopriv_step_form_2_1", "step_form_2_1");
function step_form_2_1(){
//    global $formSession;
    $return = array();
    
        
    if(isset($_POST['zipcode']) && !empty($_POST['zipcode']) && isset($_POST['utilityId']) && !empty($_POST['utilityId']) ){
        $_SESSION['enrol-step-data']['zipcode'] = $_POST['zipcode'];
        $_SESSION['enrol-step-data']['utility'] = implode(",",$_POST['utilityId']);
        
        $stateCity = get_state_city_from_zip($_POST['zipcode']);
        
        $_SESSION['enrol-step-data']['state'] = $stateCity['state'];
        $_SESSION['enrol-step-data']['city'] = $stateCity['city'];

        $str = 'zipcode='.$_POST['zipcode'].'&utility='.implode(",",$_POST['utilityId']);
        $return['status'] = 'success'; 
//        $return['url'] = '?k='.base64_encode($str);
        $return['url'] = $str;
    }elseif(
            isset($_POST['city']) && isset($_POST['state']) && !empty($_POST['city']) && !empty($_POST['state'])
            && isset($_POST['utilityId']) && !empty($_POST['utilityId'])
            ){
        $_SESSION['enrol-step-data']['utility'] = implode(",",$_POST['utilityId']);
        $_SESSION['enrol-step-data']['city'] = $_POST['city'];
        $_SESSION['enrol-step-data']['state'] = $_POST['state'];

        $str = 'state='.ucwords(strtolower($_POST['state'])).'&city='.ucwords(strtolower($_POST['city'])).'&utility='. implode(",",$_POST['utilityId']);
        $return['status'] = 'success'; 
//        $return['url'] = '?k='.base64_encode($str);
        $return['url'] = $str;
    }elseif(isset($_POST['utilityId'])){
        $_SESSION['enrol-step-data']['utility'] = implode(",",$_POST['utilityId']);
//        $str = 'state='.ucwords(strtolower($_POST['state'])).'&city='.ucwords(strtolower($_POST['city'])).'&utility='. implode(",",$_POST['utilityId']);
        $str = 'utility='. implode(",",$_POST['utilityId']).'&show=notification';
        $return['status'] = 'success'; 
//        $return['url'] = '?k='.base64_encode($str);
        $return['url'] = $str;
        
    }else{
        $return['status'] = 'error';
        $return['error'] = 'not valid';
        wp_send_json($return);
        die();
    }
    
    setcookie('userEnrolldetails', json_encode($_SESSION['enrol-step-data']), time() + 86400, "/");
    
    wp_send_json($return);
    die();
    
    
}

## step 2 searched with Plans ##
/*
 * accepts plans, utilities and ste-city or zipcode
 * return URL for step 3
 */
add_action("wp_ajax_step_form_2_2", 'step_form_2_2');
add_action("wp_ajax_nopriv_step_form_2_2", "step_form_2_2");
function step_form_2_2(){
//    global $formSession;
    $return = array();
    
    if( isset($_POST['zipcode']) && !empty($_POST['zipcode']) 
            && isset($_POST['utilityId']) && !empty($_POST['utilityId'])
            && isset($_POST['planId']) && !empty($_POST['planId'])
        ){
        
        $_SESSION['enrol-step-data']['zipcode'] = $_POST['zipcode'];
        $stateCity = get_state_city_from_zip($_POST['zipcode']);
        
        $_SESSION['enrol-step-data']['state'] = $stateCity['state'];
        $_SESSION['enrol-step-data']['city'] = $stateCity['city'];
        
        if(is_array($_POST['utilityId'])){
            $_SESSION['enrol-step-data']['utility'] = implode(",",$_POST['utilityId']);
            $utility = implode(",",$_POST['utilityId']);
        }else{
            $_SESSION['enrol-step-data']['utility'] = $_POST['utilityId'];
            $utility = $_POST['utilityId'];
        }
        
        $_SESSION['enrol-step-data']['plan'] = implode(",",$_POST['planId']);
        
        if( isset($_POST['email']) && !empty($_POST['email'])){ $_SESSION['enrol-step-data']['plan_notification'] = $_POST['email']; }

        $str = 'zipcode='.$_POST['zipcode'].'&utility='.$utility.'&plan='.implode(",",$_POST['planId']);
        $return['status'] = 'success'; 
//        $return['url'] = '?k='.base64_encode($str);
        $return['url'] = $str;
        
    }elseif( isset($_POST['city']) && !empty($_POST['city'])
            && isset($_POST['state']) && !empty($_POST['state'])
            && isset($_POST['utilityId']) && !empty($_POST['utilityId'])
            && isset($_POST['planId']) && !empty($_POST['planId'])
        ){
        
        $_SESSION['enrol-step-data']['city'] = $_POST['city'];
        $_SESSION['enrol-step-data']['state'] = $_POST['state'];
        
        $_SESSION['enrol-step-data']['plan'] = implode(",",$_POST['planId']);
        if( isset($_POST['email']) && !empty($_POST['email'])){ $_SESSION['enrol-step-data']['plan_notification'] = $_POST['email']; }
        
        if(is_array($_POST['utilityId'])){
            $_SESSION['enrol-step-data']['utility'] = implode(",",$_POST['utilityId']);
            $utility = implode(",",$_POST['utilityId']);
        }else{
            $_SESSION['enrol-step-data']['utility'] = $_POST['utilityId'];
            $utility = $_POST['utilityId'];
        }
        
        $str = 'state='.$_POST['state'].'&city='.$_POST['city'].'&utility='.$utility.'&plan='.implode(",",$_POST['planId']);
        $return['status'] = 'success'; 
//        $return['url'] = '?k='.base64_encode($str);
        $return['url'] = $str;
        
    } elseif (isset($_POST['utilityId']) && !empty($_POST['utilityId'])
            && isset($_POST['planId']) && !empty($_POST['planId']) ){
        if(is_array($_POST['utilityId'])){
            $_SESSION['enrol-step-data']['utility'] = implode(",",$_POST['utilityId']);
            $utility = implode(",",$_POST['utilityId']);
        }else{
            $_SESSION['enrol-step-data']['utility'] = $_POST['utilityId'];
            $utility = $_POST['utilityId'];
        }
        $_SESSION['enrol-step-data']['plan'] = implode(",",$_POST['planId']);
        
        $str = 'utility='.$utility.'&plan='.implode(",",$_POST['planId']);
        $return['status'] = 'success'; 
//        $return['url'] = '?k='.base64_encode($str);
        $return['url'] = $str;
    }else{
        $return['status'] = 'error';
        $return['error'] = 'not valid';
        wp_send_json($return);
        die();
    }
    
    setcookie('userEnrolldetails', json_encode($_SESSION['enrol-step-data']), time() + 86400, "/");
    
    wp_send_json($return);
    die();
    
    
}

/*==================Gravity Form Related Hooks============================*/
/**
 * Gravity forms filters
 */
add_filter( 'gform_confirmation_anchor', '__return_true' );
add_filter( 'gform_init_scripts_footer', '__return_true' );

/* 
 * stop scroll for for all forms except #3 Contact form
 */
add_filter( 'gform_tabindex', '__return_false' );
add_filter( 'gform_confirmation_anchor', '__return_false' );
add_filter( 'gform_confirmation_anchor_3', '__return_true',20 );

/*
 *custom validation for email fields for email field type
 */
add_filter( 'gform_field_validation', 'custom_email_validation', 20,4 );
function custom_email_validation( $result, $value, $form, $field ) {
    if ( $field->type == 'email' && $result['is_valid']) {
        if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $value)){
            $result['is_valid'] = false;
            $result['message'] = 'Oops, please enter a valid email address.';
        }
    }
    return $result;
}


/**
 * pre popluate values to fields for enrollment form
 */
## enrollment form pre render values ##
add_filter("gform_pre_submission_5", "populate_choices");
add_filter( 'gform_pre_render_5', 'populate_choices' );
function populate_choices( $form ) {
    
    if(isset($_GET['k'])){
        parse_str(base64_decode($_GET['k']), $output);
    }else{
        $output = $_GET;
    }
    
    $utility1 = $utility2 = "";
    $plan1 = $plan2 = "";
    $regex1="/^[0-9]+$/";
    
    $uty = explode(',',$output['utility']);
    if(count($uty)>1) {
        
        if(!preg_match($regex1, $uty[0])){
            $utilityObj = get_page_by_title($uty[0], OBJECT, 'utilities');
            if($utilityObj){ $utility1 = $utilityObj->ID; }
        }else{
            $utility1 = $uty[0];
        }
        
        if(!preg_match($regex1, $uty[1])){
            $utilityObj = get_page_by_title($uty[1], OBJECT, 'utilities');
            if($utilityObj){ $utility2 = $utilityObj->ID; }
        }else{
            $utility2 = $uty[1];
        }
        
    } else {
        
        if(!preg_match($regex1, $output['utility'])){
            $utilityObj = get_page_by_title($output['utility'], OBJECT, 'utilities');
            if($utilityObj){ $utility1 = $utilityObj->ID; }
        }else{
            $utility1 = $output['utility'];
        }
        
    }

    $plan = explode(',',$output['plan']);
    if(count($plan)>1) {
        $plan1 = $plan[0];
        $plan2 = $plan[1];
    } else {
        $plan1 = $output['plan'];
    }
    
    
    $script = '<script type="text/javascript">';
    $scriptValidate = '';
    $scriptReady = 'window.top.jQuery( document ).ready(function($){';
    
    $ajaxScript = 'window.top.jQuery(document).on("gform_page_loaded", function(event, form_id, current_page){';
    
    $ajaxScriptEnd = '});';
    $scriptend = '});</script>';
    
    //echo "<PRE>";print_r($form['fields']);exit;
   foreach( $form['fields'] as &$field ) {
       if ( $field->label == 'zipcode' && (isset($output['zipcode'])) ) {
           $field->defaultValue = $output['zipcode'];
        }
       if ( $field->label == 'Zip Code' && (isset($output['zipcode'])) ) {
           $field->defaultValue = $output['zipcode'];
           $scriptReady .= '$("#input_5_19").attr("readonly","readonly");';
           $ajaxScript .= 'jQuery("#input_5_19").attr("readonly","readonly");';
           
        }
        if ( $field->label == 'Zip Code' && (isset($_SESSION['enrol-step-data']['zipcode'])) ) {
            $field->defaultValue = $_SESSION['enrol-step-data']['zipcode'];
            $scriptReady .= '$("#input_5_19").attr("readonly","readonly");';
            $ajaxScript .= 'jQuery("#input_5_19").attr("readonly","readonly");';
        }
        
        if ( $field->label == 'State' && isset($output['state'])) {
            
            foreach( $field->choices as &$choice ) {
                if($choice['value'] == ucwords(strtolower($output['state']))){
                    $choice[$choiceIndex]['isSelected'] = true;
                }
            }
            
            $field->defaultValue = ucwords(strtolower($output['state']));
            $field->cssClass = 'disablestate gf_left_half width-70';
            
            $scriptReady .= '$("#input_5_22").attr("disabled","disabled");';
            $ajaxScript .= 'jQuery("#input_5_22").attr("disabled","disabled");';
            
        }
        if ( $field->label == 'City' && isset($output['city']) ) {
           $field->defaultValue = $output['city'];
           $scriptReady .= '$("#input_5_23").attr("readonly","readonly");';
           $ajaxScript .= 'jQuery("#input_5_23").attr("readonly","readonly");';
        }
        
        if ( $field->label == 'State' && isset($_SESSION['enrol-step-data']['state'])) {
            
            foreach( $field->choices as &$choice ) {
                if( ucwords(strtolower($_SESSION['enrol-step-data']['state'])) == $choice['value'] ) {
                    $choice['isSelected'] = true;
                    
                }
            }
            $field->defaultValue = ucwords(strtolower($_SESSION['enrol-step-data']['state']));
            $field->cssClass = 'disablestate gf_left_half width-70';
            
            $scriptReady .= '$("#input_5_22").attr("disabled","disabled");';
            $ajaxScript .= 'jQuery("#input_5_22").attr("disabled","disabled");';
            
        }
        if ( $field->label == 'City' && isset($_SESSION['enrol-step-data']['city']) ) {
           $field->defaultValue = ucwords(strtolower($_SESSION['enrol-step-data']['city']));
           $scriptReady .= '$("#input_5_23").attr("readonly","readonly");';
           $ajaxScript .= 'jQuery("#input_5_23").attr("readonly","readonly");';
        }
        
        if ( $field->label == 'city' && isset($output['city']) ) {
           $field->defaultValue = $output['city'];
        }
       
        
        if(!empty($utility1) && $utility1 != ''){
            if ( $field->id == 17 && $utility1!="") {
                $field->defaultValue = $utility1;
            }
            if ( $field->id == 41 && $utility1!="") {
                $field->defaultValue = get_hidden_value($utility1,'utility','utility_name');
            }
            if ( $field->id == 42 && $utility1!="") {
                $field->defaultValue = get_hidden_value($utility1,'utility','utility_code');
            }
            if($field->id == 2 && $utility1!=""){
                $field->label = str_replace("<Utility Name>",get_hidden_value($utility1,'utility','utility_name'),$field->label);
            }
        }else{
            if ( $field->id == 17 || $field->id == 41 || $field->id == 42 ) {
                $field->defaultValue = "N/A";
            }
        }
        
        if(!empty($utility2) && $utility2 != ''){
            if ( $field->id == 45 && $utility2!="") {
                $field->defaultValue = $utility2;
            }
            if ( $field->id == 46 && $utility2!="") {
                $field->defaultValue = get_hidden_value($utility2,'utility','utility_name');
            }
            if ( $field->id == 47 && $utility2!="") {
                $field->defaultValue = get_hidden_value($utility2,'utility','utility_code');
            }
            
            if($field->id == 40 && $utility2!=""){
                $field->label = str_replace("<Utility Name>",get_hidden_value($utility2,'utility','utility_name'),$field->label);
            }
        }else{
            if ( $field->id == 45 || $field->id == 46 || $field->id == 47|| $field->id == 33 || $field->id == 40) {
                $field->defaultValue = "N/A";
            }
        }
        
	if(!empty($plan1) && $plan1 != ''){
            if ( $field->id == 43 && $plan1!="" ) {
                $field->defaultValue = get_the_title($plan1);//get_hidden_value($plan1,'plan','rate_name');
            }
            if ( $field->id == 53 && $plan1!="" ) {
                $field->defaultValue = get_hidden_value($plan1,'plan','rate_name');
            }
            if ( $field->id == 18 && $plan1!="" ) {
                $field->defaultValue = $plan1;
            }
            if ( $field->id == 44 && $plan1!="" ) {
                $field->defaultValue = get_hidden_value($plan1,'plan','price');
            }
        }else{
            if($field->id == 43 || $field->id == 53 || $field->id == 18 || $field->id == 44){
                $field->defaultValue = 'N/A';
            }
        }
        
        if(!empty($plan2) && $plan2 != ''){
            if ( $field->id == 49 && $plan2!="" ) {
                $field->defaultValue = get_the_title($plan2);//get_hidden_value($plan2,'plan','rate_name');
            }
            if ( $field->id == 52 && $plan2!="" ) {
                $field->defaultValue = get_hidden_value($plan2,'plan','rate_name');
            }
            if ( $field->id == 48 && $plan2!="" ) {
                $field->defaultValue = $plan2;
            }
            if ( $field->id == 51 && $plan2!="" ) {
                $field->defaultValue = get_hidden_value($plan2,'plan','price');
            }
        }else{
            if($field->id == 49 || $field->id == 52 || $field->id == 48 || $field->id == 51){
                $field->defaultValue = "N/A";
            }
        }
        
	
        
        if ( $field->label == 'Service Address 1' && isset($_SESSION['enrol-step-data']['street_number']) ) {
           $field->defaultValue = $_SESSION['enrol-step-data']['street_number'];
        }
        if ( $field->label == 'Service Address 1' && isset($_SESSION['enrol-step-data']['route']) ) {
           if(isset($_SESSION['enrol-step-data']['street_number'])){
               $field->defaultValue .= ' '.$_SESSION['enrol-step-data']['route'];
           }else{
               $field->defaultValue .= $_SESSION['enrol-step-data']['route'];
           }
            
        }


        if ( $field->label == 'Email' && isset($_SESSION['enrol-step-data']['plan_notification']) ) {
           $field->defaultValue = $_SESSION['enrol-step-data']['plan_notification'];
        }
        
        if($field->id == 10 && isset($output['utility'])){
            $field->label = str_replace("<Utility Name>",get_hidden_value($utility1,'utility','utility_name'),$field->label);
            
            $accVals = get_field('utility_master_data',$utility1);
            if(isset($accVals['account_number_type'])){
                $accountType = $accVals['account_number_type'];
                $field->label = str_replace("<Account Number Name>",$accountType,$field->label);
            }
            
            $accVals = get_field('utility_master_data',$utility1);
            if(isset($accVals['account_number_message'])){
                $valMessage = $accVals['account_number_message'];
                $field->tooltiptext = $valMessage;
            }
			
			$accVals = get_field('utility_master_data',$utility1);
            if(isset($accVals['account_number_place_holder'])){
                $placeHolder = $accVals['account_number_place_holder'];
                $field->placeholder = $placeHolder;
            }
            
        }
        if($field->id == 33 && isset($output['utility'])){
            if(!empty($utility2)){
                $field->label = str_replace("<Utility Name>",get_hidden_value($utility2,'utility','utility_name'),$field->label);
                
                $accVals = get_field('utility_master_data',$utility2);
                if(isset($accVals['account_number_message'])){
                    $valMessage = $accVals['account_number_message'];
                    $field->tooltiptext = $valMessage;
                }
                
                $accVals = get_field('utility_master_data',$utility2);
                if(isset($accVals['account_number_type'])){
                    $accountType = $accVals['account_number_type'];
                    $field->label = str_replace("<Account Number Name>",$accountType,$field->label);
                }
                
                $accVals = get_field('utility_master_data',$utility2);
                if(isset($accVals['account_number_validation'])){
                    $valRegex = $accVals['account_number_validation'];
                    $scriptValidate .= "var regx2 = $valRegex;";
                }
				
                $accVals = get_field('utility_master_data',$utility2);
                if(isset($accVals['account_number_place_holder'])){
                        $placeHolder = $accVals['account_number_place_holder'];
                        $field->placeholder = $placeHolder;
                }
            }
        }
        
        if($field->id == 31 && isset($output['utility'])){
            if(!empty($utility2)){
                $field->description = str_replace("<utility name>",'account information',$field->description);
                $field->description = htmlentities(str_replace("<account number name>",'',$field->description));
            }else{
                $field->description = htmlentities(str_replace("<utility name>",get_hidden_value($utility1,'utility','utility_name'),$field->description));
            }
        }
        
        if(($field->id == 12 || $field->id == 36) && isset($output['utility'])){
            $field->content = htmlentities(str_replace("<utility name>",get_hidden_value($utility1,'utility','utility_name'),$field->content));
        }
        
        if(($field->id == 37 || $field->id == 38) && isset($output['utility'])){
            $field->content = str_replace("<utility name 1>",get_hidden_value($utility1,'utility','utility_name'),$field->content);
            $field->content = htmlentities(str_replace("<utility name 2>",get_hidden_value($utility2,'utility','utility_name'),$field->content));
        }
        
        if($field->id == 12){
            $field->content .= $script.$scriptValidate.$scriptReady.$ajaxScript.$ajaxScriptEnd.$scriptend;
            
        }
    }
    
    return $form;
}

/**
 * change value of Address Same to False if not same
 */
add_filter("gform_pre_submission_5", "change_same_address_true_false");
function change_same_address_true_false($form){
    if(empty($_POST['input_9_1'])){
        $_POST['input_9_1'] = 'false';
    }elseif(!empty($_POST['input_9_1'])){
        $_POST['input_9_1'] = 'true';
    }
}

/**
 * set data attributes for custon Jquery based validation
 * for account number fields only
 */
add_filter( 'gform_field_content_5', 'add_data_attr_forimg', 10, 2 );
function add_data_attr_forimg( $field_content, $field ) {
    
    if(isset($_GET['k'])){
    parse_str(base64_decode($_GET['k']), $output);
    }else{
        $output = $_GET;
    }
    
    $utility1 = $utility2 = null;
    $regex1="/^[0-9]+$/";
    
    if(isset($output['utility'])){
        $uty = explode(',',$output['utility']);
        
        if(!preg_match($regex1, $uty[0])){
            $utilityObj = get_page_by_title($uty[0], OBJECT, 'utilities');
            if($utilityObj){ $utility1 = $utility2 = $utilityObj->ID; }
        }else{
            $utility1 = $utility2 = $uty[0];
        }
        
        
        if(isset($uty[1])){ 
            
            if(!preg_match($regex1, $uty[1])){
                $utilityObj = get_page_by_title($uty[1], OBJECT, 'utilities');
                if($utilityObj){ $utility2 = $utilityObj->ID; }
            }else{
                $utility2 = $uty[1];
            }
        }
    }
    
    if ( $field->id == 10 ) {
        $img = get_the_post_thumbnail_url($utility1,'full');
        $accVals = get_field('utility_master_data',$utility1);
        $field_content = str_replace( '<input', "<div class='ac-name-icon gray-icon' style='background-image:url($img);'></div> <input", $field_content );
        if(isset($accVals['account_number_validation'])){
            $valRegex = $accVals['account_number_validation'];
            $field_content = str_replace( '<input', "<input data-reg='$valRegex'", $field_content );
        }
        if(isset($accVals['account_number_message'])){
            $valMessage = $accVals['account_number_message'];
            $field_content = str_replace( '<input', "<input data-mess='$valMessage'", $field_content );
        }
        return $field_content;
    }
    if($field->id == 33){
        $img = get_the_post_thumbnail_url($utility2,'full');
        $accVals = get_field('utility_master_data',$utility2);
        $field_content = str_replace( '<input', "<div class='ac-name-icon gray-icon' style='background-image:url($img);'></div> <input", $field_content );
        if(isset($accVals['account_number_validation'])){
            $valRegex = $accVals['account_number_validation'];
            $field_content = str_replace( '<input', "<input data-reg='$valRegex'", $field_content );
        }
        if(isset($accVals['account_number_message'])){
            $valMessage = $accVals['account_number_message'];
            $field_content = str_replace( '<input', "<input data-mess='$valMessage'", $field_content );
        }
        return $field_content;
    }
    return $field_content;
}


/**
 * Pre render values for State city Utility Plans
 * forms footer CTA & Footer subscribe
 */
add_filter( 'gform_pre_render_9', 'populate_choices_2_or_9' );
add_filter( 'gform_pre_render_2', 'populate_choices_2_or_9' );
function populate_choices_2_or_9($form) {

    $cookie = $_COOKIE['userEnrolldetails'];
    $cookie = stripslashes($cookie);
    $cookieArr = json_decode($cookie, true);
    
    $utility1 = $utility2= $plan1 = $plan2 = "";
    $regex1="/^[0-9]+$/";
    
    if(isset($cookieArr['utility'])){
        $uty = explode(',',$cookieArr['utility']);
        if(count($uty)>1) {
        
            if(!preg_match($regex1, $uty[0])){
                $utilityObj = get_page_by_title($uty[0], OBJECT, 'utilities');
                if($utilityObj){ $utility1 = $utilityObj->ID; }
            }else{
                $utility1 = $uty[0];
            }

            if(!preg_match($regex1, $uty[1])){
                $utilityObj = get_page_by_title($uty[1], OBJECT, 'utilities');
                if($utilityObj){ $utility2 = $utilityObj->ID; }
            }else{
                $utility2 = $uty[1];
            }

        } else {

            if(!preg_match($regex1, $cookieArr['utility'])){
                $utilityObj = get_page_by_title($cookieArr['utility'], OBJECT, 'utilities');
                if($utilityObj){ $utility1 = $utilityObj->ID; }
            }else{
                $utility1 = $cookieArr['utility'];
            }

        }
    }
    
    if(isset($cookieArr['plan'])){
        $plan = explode(',',$cookieArr['plan']);
        if(count($plan)>1) {
                $plan1 = $plan[0];
                $plan2 = $plan[1];
        } else {
                $plan1 = $cookieArr['plan'];
        }
    }
    
    
    foreach( $form['fields'] as &$field ) {
       
       if($form['id'] == 2 && $field->id == 2 && isset($cookieArr['zipcode'])){
           $field->defaultValue = $cookieArr['zipcode'];
       }
       
        
       if ( $field->id == 3 && isset($cookieArr['state']) ) {
            $field->defaultValue = $cookieArr['state'];
        }
        
	if ( $field->id == 4 && isset($cookieArr['city'])) {
            $field->defaultValue = $cookieArr['city'];
        }
        
        
        if(isset($utility1) && !empty($utility1)){
            if ( $field->id == 5 && $utility1!="") {
                $field->defaultValue = $utility1;
            }
            if ( $field->id == 9 && $utility1!="") {
                $field->defaultValue = get_hidden_value($utility1,'utility','utility_code');
            }
            if ( $field->id == 10 && $utility1!="") {
                $field->defaultValue = get_hidden_value($utility1,'utility','utility_name');
            }
        }else{
            if ( $field->id == 5 || $field->id == 9 || $field->id == 10 ) {
                $field->defaultValue = "N/A";
            }
        }
        
        if(isset($utility2) && !empty($utility2)){
            
            if ( $field->id == 6 && $utility2!="") {
                $field->defaultValue = $utility2;
            }
            if ( $field->id == 11 && $utility2!="") {
                $field->defaultValue = get_hidden_value($utility2,'utility','utility_code');
            }
            if ( $field->id == 12 && $utility2!="") {
                $field->defaultValue = get_hidden_value($utility2,'utility','utility_name');
            }
        }else{
            if ( $field->id == 6 || $field->id == 11 || $field->id == 12 ) {
                $field->defaultValue = "N/A";
            }
        }
        

        
        if(!empty($plan1) && $plan1 != ''){
            if ( $field->id == 7 && $plan1!="" ) {
                $field->defaultValue = get_the_title($plan1);//get_hidden_value($plan1,'plan','rate_name');
            }
            if ( $field->id == 8 && $plan1!="" ) {
                $field->defaultValue = get_hidden_value($plan1,'plan','rate_name');
            }
        }else{
            if ( $field->id == 7 || $field->id == 8) {
                $field->defaultValue = "N/A";
            }
        }
        
        if(!empty($plan2) && $plan2 != ''){
            if ( $field->id == 13 && $plan1!="" ) {
                $field->defaultValue = get_the_title($plan2);//get_hidden_value($plan1,'plan','rate_name');
            }
            if ( $field->id == 14 && $plan2!="" ) {
                $field->defaultValue = get_hidden_value($plan2,'plan','rate_name');
            }
        }else{
            if ( $field->id == 13 || $field->id == 14){
                $field->defaultValue = "N/A";
            }
        }
        
    }
    return $form;
}

/**
 * set data for utility state city
 * form #7 plan options by email step 2
 */
add_filter( 'gform_pre_render_7', 'populate_choices_7' );
function populate_choices_7( $form ) {
   
    if(isset($_GET['k'])){
        parse_str(base64_decode($_GET['k']), $output);
    }else{
        $output = $_GET;
    }
	
    $utility1 = $utility2 = "";
    $plans = $utyIds = array();

    $uty = explode(',',$output['utility']);
    if(count($uty)>1) {
        if(!preg_match($regex1, $uty[0])){
            $utilityObj = get_page_by_title($uty[0], OBJECT, 'utilities');
            if($utilityObj){ $utility1 = $utilityObj->ID; $utyIds[] = $utilityObj->ID; }
        }else{
            $utility1 = $uty[0];
            $utyIds[] = $uty[0];
        }

        if(!preg_match($regex1, $uty[1])){
            $utilityObj = get_page_by_title($uty[1], OBJECT, 'utilities');
            if($utilityObj){ $utility2 = $utilityObj->ID; $utyIds[] = $utilityObj->ID; }
        }else{
            $utility2 = $uty[1];
            $utyIds[] = $uty[1];
        }
    } else {
        if(!preg_match($regex1, $output['utility'])){
            $utilityObj = get_page_by_title($output['utility'], OBJECT, 'utilities');
            if($utilityObj){ $utility1 = $utilityObj->ID; $utyIds[] = $utilityObj->ID; }
        }else{
            $utility1 = $output['utility'];
            $utyIds[] = $output['utility'];
        }
    }

    foreach($utyIds as $utyId){
        $newPlans = get_plans($utyId);
        if(count($newPlans)>3){unset($newPlans[2]);}
        $plans = array_merge($plans, $newPlans);;
    }
        
   foreach( $form['fields'] as &$field ) {
       
       if ( ($field->label == 'zipcode' || $field->label == 'Zip Code') ) {
           if(isset($output['zipcode']) && !empty($output['zipcode'])){
               $field->defaultValue = $output['zipcode'];
           }elseif(isset($_SESSION['enrol-step-data']['zipcode'])){
               $field->defaultValue = $_SESSION['enrol-step-data']['zipcode'];
           }
           
       }
       if ( $field->label == 'state' ) {
           if(isset($output['state'])){
               $field->defaultValue = $output['state'];
           }elseif(isset($_SESSION['enrol-step-data']['state'])){
               $field->defaultValue = $_SESSION['enrol-step-data']['state'];
           }
          
       }
       if ( $field->label == 'city') {
           if(isset($output['city'])){
               $field->defaultValue = $output['city'];
           }elseif(isset ($_SESSION['enrol-step-data']['city'])){
               $field->defaultValue = $_SESSION['enrol-step-data']['city'];
           }
          
       }
       
       if(!empty($utility1)){
            if ( $field->id == 6) {
                $field->defaultValue = $utility1;
            }
            if ( $field->id == 8) {
                $field->defaultValue = get_hidden_value($utility1,'utility','utility_name');
            }
            if ( $field->id == 10) {
                $field->defaultValue = get_hidden_value($utility1,'utility','utility_code');
            }
       }else{
           if ( $field->id == 6 || $field->id == 8 || $field->id == 10) {
                $field->defaultValue = "N/A";
            }
       }
        
       if(!empty($utility2)){
           if ( $field->id == 7 && $utility2!="") {
               $field->defaultValue = $utility2;
           }
           if ( $field->id == 9 && $utility2!="") {
               $field->defaultValue = get_hidden_value($utility2,'utility','utility_name');
           }
           if ( $field->id == 11 && $utility2!="") {
               $field->defaultValue = get_hidden_value($utility2,'utility','utility_code');
           }
       }else{
           if ( $field->id == 7 || $field->id == 9 || $field->id == 11) {
               $field->defaultValue = "N/A";
           }
       }
       
       if(isset($plans[0]) && !empty($plans[0])){
           if ( $field->id == 12 && isset($plans[0]) ) {
               $field->defaultValue = get_the_title($plans[0]);//get_hidden_value($plans[0],'plan','rate_name');
           }
           if ( $field->id == 14 && isset($plans[0]) ) {
               $field->defaultValue = $plans[0];
           }
           if ( $field->id == 16 && isset($plans[0]) ) {
               $field->defaultValue = get_hidden_value($plans[0],'plan','price');
           }
           if ( $field->id == 24 && isset($plans[0]) ) {
               $field->defaultValue = get_hidden_value($plans[0],'plan','rate_name');
           }
       }else{
           if ( $field->id == 12 || $field->id == 14 || $field->id == 16 || $field->id == 24 ) {
               $field->defaultValue = "N/A";
           }
       }
       
       if(isset($plans[1]) && !empty($plans[1])){
           if ( $field->id == 18 && isset($plans[1]) ) {
               $field->defaultValue = $plans[1];
           }
           if ( $field->id == 19 && isset($plans[1]) ) {
               $field->defaultValue = get_the_title($plans[1]);//get_hidden_value($plans[1],'plan','rate_name');
           }
           if ( $field->id == 20 && isset($plans[1]) ) {
               $field->defaultValue = get_hidden_value($plans[1],'plan','price');
           }
           if ( $field->id == 25 && isset($plans[1]) ) {
               $field->defaultValue = get_hidden_value($plans[1],'plan','rate_name');
           }
       }else{
           if ( $field->id == 18 || $field->id == 19 || $field->id == 20 || $field->id == 25 ) {
               $field->defaultValue = "N/A";
           }
       }
       
       if(isset($plans[2]) && !empty($plans[2])){
            if ( $field->id == 15 && isset($plans[2]) ) {
               $field->defaultValue = $plans[2];
            }
            if ( $field->id == 13 && isset($plans[2]) ) {
               $field->defaultValue = get_the_title($plans[2]);//get_hidden_value($plans[2],'plan','rate_name');
            }
            if ( $field->id == 17 && isset($plans[2]) ) {
               $field->defaultValue = get_hidden_value($plans[2],'plan','price');
            }
            if ( $field->id == 26 && isset($plans[2]) ) {
               $field->defaultValue = get_hidden_value($plans[2],'plan','rate_name');
            }           
       }else{
           if ( $field->id == 15 || $field->id == 13 || $field->id == 17 || $field->id == 26 ) {
               $field->defaultValue = "N/A";
            }
       }
       
       if(isset($plans[3]) && !empty($plans[3])){
            if ( $field->id == 21 && isset($plans[3]) ) {
               $field->defaultValue = $plans[3];
            }
            if ( $field->id == 22 && isset($plans[3]) ) {
               $field->defaultValue = get_the_title($plans[3]);//get_hidden_value($plans[3],'plan','rate_name');
            }
            if ( $field->id == 23 && isset($plans[3]) ) {
               $field->defaultValue = get_hidden_value($plans[3],'plan','price');
            }
            if ( $field->id == 27 && isset($plans[3]) ) {
               $field->defaultValue = get_hidden_value($plans[3],'plan','rate_name');
            }           
       }else{
           if ( $field->id == 21 || $field->id == 22 || $field->id == 23 || $field->id == 27 ) {
               $field->defaultValue = "N/A";
            }
       }
        
    }
    return $form;
}


/**
 * set state city data to the contact form
 * using cookie
 */
add_filter( 'gform_pre_render_3', 'populate_choices_contact_form' );
function populate_choices_contact_form($form) {

    $cookie = $_COOKIE['userEnrolldetails'];
    $cookie = stripslashes($cookie);
    $cookieArr = json_decode($cookie, true);
    
    
    
    foreach( $form['fields'] as &$field ) {
       
       if($field->id == 7 && isset($cookieArr['zipcode'])){
           $field->defaultValue = $cookieArr['zipcode'];
       }
       
        
       if ( $field->id == 5 && isset($cookieArr['state']) ) {
            $field->defaultValue = $cookieArr['state'];
        }
        
	if ( $field->id == 6 && isset($cookieArr['city'])) {
            $field->defaultValue = $cookieArr['city'];
        }
       
    }
    return $form;
}

/**
 * custom validation for #5 enrollment form
 * 
 * check for zipcode, street address
 * and account number fields
 */
add_filter( 'gform_validation_5', 'custom_validation' );
function custom_validation( $validation_result ) {
    
    $form = $validation_result['form'];
    
    foreach( $form['fields'] as &$field ) {
        
        //check for street address
        if ( $field->id == '5' ) {
            if(!empty( rgpost( 'input_5' ) ) ){
                $streetAdd1 = rgpost( 'input_5' );
                if (!preg_match('/^\\d+, [a-zA-Z ]+$/', $streetAdd1) && !preg_match('/^\\d+ [a-zA-Z ]+$/', $streetAdd1)){
                    //preg_match('/^\\d+ [a-zA-Z ]+, \\d+ [a-zA-Z ]+, [a-zA-Z ]+$/', $input)
                    //#, Street name, Zip Code, City, Country is the address format.
                    $validation_result['is_valid'] = false;
                    $field->failed_validation = true;
                    $field->validation_message = 'Addrees should start with # Street name';
                }
            }
        }
        
        //zipcode validation
        if ( $field->id == '19' ) {
            if(!empty( rgpost( 'input_19' ) ) ){
                $zipcode = rgpost( 'input_19' );
                if (!preg_match('/^[0-9]{5}([- ]?[0-9]{4})?$/', $zipcode)){
                    $validation_result['is_valid'] = false;
                    $field->failed_validation = true;
                    $field->validation_message = 'Zipcode is not valid!';
                }
            }
        }
        
        //billing zipcode validation
        if ( $field->id == '29' ) {
            if(!empty( rgpost( 'input_29' ) ) ){
                $zipcode = rgpost( 'input_29' );
                if (!preg_match('/^[0-9]{5}([- ]?[0-9]{4})?$/', $zipcode)){
                    $validation_result['is_valid'] = false;
                    $field->failed_validation = true;
                    $field->validation_message = 'Zipcode is not valid!';
                }
            }
        }
        
        //if I cant find account number is not selected give error for Account Number field
        if($field->id == '10'){
            if(empty(rgpost('input_10')) && empty(rgpost('input_11_1')) ){
                $validation_result['is_valid'] = false;
                $field->failed_validation = true;
                $field->validation_message = 'This field is required.';
            }
        }
        
        //check for Account number 2 in validation
        if($field->id == '33'){
            if(empty(rgpost('input_33')) && empty(rgpost('input_11_1')) && empty(rgpost('input_45')) ){
                $validation_result['is_valid'] = false;
                $field->failed_validation = true;
                $field->validation_message = 'This field is required.';
            }
        }
        
        
        
    }
    
    //Assign modified $form object back to the validation result
    $validation_result['form'] = $form;
    return $validation_result;
}

/**
 * save values to session before actual submission
 */
add_action( 'gform_pre_submission_5', 'pre_submission_home_banner' );
add_action( 'gform_pre_submission_9', 'pre_submission_home_banner' );
function pre_submission_home_banner($form){
    $zipcode = rgpost( 'input_1' );
    $_SESSION['enrol-step-data']['zipcode'] = $zipcode;
        
    $stateCity = get_state_city_from_zip($zipcode);

    $_SESSION['enrol-step-data']['state'] = $stateCity['state'];
    $_SESSION['enrol-step-data']['city'] = $stateCity['city'];
    
    setcookie('userEnrolldetails', json_encode($_SESSION['enrol-step-data']), time() + 86400, "/");
}

/**
 * destroy the session values after form submitted on step3
 */
add_action( 'gform_after_submission_5', 'destroy_session_after_submission', 10, 2 );
function destroy_session_after_submission($entry, $form){
    unset($_SESSION['enrol-step-data']);
    session_destroy();
}

/**
 * generic zipcode field validation
 */
add_filter( 'gform_validation_1', 'custom_zipcode_validation' );
add_filter( 'gform_validation_5', 'custom_zipcode_validation' );
add_filter( 'gform_validation_9', 'custom_zipcode_validation' );
function custom_zipcode_validation( $validation_result ) {
    
    $form = $validation_result['form'];
    
    if(!empty( rgpost( 'input_1' ) ) ){
        $zipcode = rgpost( 'input_1' );
        if (!preg_match('/^[0-9]{5}([- ]?[0-9]{4})?$/', $zipcode)){
            $validation_result['is_valid'] = false;
            foreach( $form['fields'] as &$field ) {                
                if ( $field->id == '1' ) {
                    $field->failed_validation = true;
                    $field->validation_message = 'Please enter 5 digits.';
                    break;
                }
            }
	} 
    }
    
    $validation_result['form'] = $form;
    return $validation_result;
}
add_filter( 'gform_validation_4', 'custom_zipcode_validation_4' );
function custom_zipcode_validation_4( $validation_result ) {
    
    $form = $validation_result['form'];
    
    $zipcode = rgpost( 'input_4' );
    if (!preg_match('/^[0-9]{5}([- ]?[0-9]{4})?$/', $zipcode)){
        $validation_result['is_valid'] = false;
        foreach( $form['fields'] as &$field ) {                
            if ( $field->id == '4' ) {
                $field->failed_validation = true;
                $field->validation_message = "Please enter 5 digits.";
                break;
            }
        }
    }
    
    $validation_result['form'] = $form;
    return $validation_result;
}


/**
 * add email address to acordion header
 * to the step 2
 * plans by options
 */
add_filter( 'gform_confirmation_7', 'custom_confirmation_message', 10, 4 );
function custom_confirmation_message( $confirmation, $form, $entry, $ajax ) {
    
    if($entry['5'] == 1){
        return $confirmation;
    }else{
    $confirmation .= "<script>window.top.jQuery( document ).ready(function() {
    window.top.jQuery(document).on('gform_confirmation_loaded', function () {
    jQuery('.accordion-notification h4.toggle-active-title').hide();
    jQuery('#notification_email').val('{$entry['1']}');
    jQuery('.accordion-notification #notification-email').text('{$entry['1']}');	
    jQuery('.accordion-notification div.active-data').show();
    jQuery('.accordion-plans.accordion-trigger').click();
        });
    });
    </script>";
    }
    return $confirmation;
}


/*================== Generic code starts ============================*/
//add_filter( 'gform_field_container_5', 'add_container_data_attr_forimg', 10, 6 );
function add_container_data_attr_forimg( $field_container, $field, $form, $css_class, $style, $field_content ) {
    if ( $field->id == 10 || $field->id == 33 ) {
        return str_replace( 'div class=', "div data-img='https://provisionstagi.wpengine.com/wp-content/themes/provision-live/assets/img/logo-12.svg' class=", $field_container );
    }
    return $field_container;
}

/*
 * debug tool
 */
function print_pre($arr = array()){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}