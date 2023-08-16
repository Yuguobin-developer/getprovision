<?php
/**
* The Helper class
*/
if (!class_exists('FL_SEO_CSV_Import_Helper')) {
	class FL_SEO_CSV_Import_Helper extends FL_SEO_CSV_Logger{
		
		function __construct(){
			add_filter( 'wp_mail_content_type', array(&$this, 'fl_set_content_type') );
		}

		function base64url_encode( $data ){
		  return rtrim( strtr( base64_encode( $data ), '+/', '-_'), '=');
		}

		function base64url_decode( $data ){
		  return base64_decode( strtr( $data, '-_', '+/') . str_repeat('=', 3 - ( 3 + strlen( $data )) % 4 ));
		}

		function fl_set_content_type(){
		    return "text/html";
		}

		function remove_brackets($str){
		    $str = str_replace('{', '', $str);
		    $str = str_replace('}', '', $str);

		    return trim($str);
		}

		function remove_http($url) {
		   $disallowed = array('http://', 'https://');
		   foreach($disallowed as $d) {
		      if(strpos($url, $d) === 0) {
		         return str_replace($d, '', $url);
		      }
		   }
		   return $url;
		}

		function protocol_agnostic( $url ){
			$url = str_replace( 'http://', '//', $url );
			$url = str_replace( 'https://', '//', $url );
			return $url;
		}

		function get_domain_name($url){
			if (strpos($url,'http') !== false) {
				$domain = parse_url( $url, PHP_URL_HOST);
			}
			else{
				$domain = parse_url('http://' . $url, PHP_URL_HOST);
			}
			return str_replace('www.', '', $domain);
		}


		function get_total_post_count($type='all', $date_from='', $date_to=''){
			
			global $wpdb;

			if( $type != 'all' ){

				if( $date_from != "" && $date_to != "" ){
					$posts = $wpdb->get_results("SELECT $wpdb->posts.post_date, $wpdb->posts.post_type, COUNT($wpdb->posts.ID) as total FROM $wpdb->posts WHERE $wpdb->posts.post_status='publish' AND ( $wpdb->posts.post_type = '$type' ) AND ( $wpdb->posts.post_date BETWEEN '$date_from' AND '$date_to' )");
				}
				else{
					$posts = $wpdb->get_results("SELECT $wpdb->posts.post_type, COUNT($wpdb->posts.ID) as total FROM $wpdb->posts WHERE $wpdb->posts.post_status='publish' AND ( $wpdb->posts.post_type = '$type' )");
				}
				
				wp_reset_query();

				// die($posts[0]->total);

				return $posts[0]->total;
			}
			else{

				$args = array(
				   'public'   => true,
				   '_builtin' => false
				);
				
				$out = 'names'; 
				
				$operator = 'and'; 
				
				$post_types = get_post_types( $args, $out, $operator );
				
				$builtin = "$wpdb->posts.post_type = 'page' OR $wpdb->posts.post_type = 'post'";

				foreach ( $post_types  as $post_type ) {
					$builtin .= " OR $wpdb->posts.post_type = '{$post_type}'";
				}

				if( $date_from != "" && $date_to != "" ){
					$posts = $wpdb->get_results("SELECT $wpdb->posts.post_date, COUNT($wpdb->posts.ID) as total FROM $wpdb->posts WHERE $wpdb->posts.post_status='publish' AND ($builtin) AND ( $wpdb->posts.post_date BETWEEN '$date_from' AND '$date_to' )");
				}
				else{
					$posts = $wpdb->get_results("SELECT COUNT($wpdb->posts.ID) as total FROM $wpdb->posts WHERE $wpdb->posts.post_status='publish' AND ($builtin)");
				}
				
				wp_reset_query();

				// die($posts[0]->total);

				return $posts[0]->total;

			}
		}

		function get_total_taxonomy_count($taxonomy){

			if( $taxonomy == 'all' ){ // all taxonomies

				$total = 0;

				$args = array(
				  'public'   => true,
				  '_builtin' => false ); 

				$output = 'names'; // or objects
				$operator = 'and'; // 'and' or 'or'
				$taxonomies = get_taxonomies( $args, $output, $operator );

				if ( $taxonomies ) {
				  	foreach ( $taxonomies  as $taxonomy ) {
				  		$total += $this->get_total_taxonomy_count($taxonomy);
				  	}
				}

				$total += $this->get_total_taxonomy_count('category');

				return $total;
			}
			else{
				$args = array( 'taxonomy' => $taxonomy, 'hide_empty' => false );
				$terms = get_terms($args);

				return sizeof($terms);
			}
		}

		function objectify($array) {
		    if (!is_array($array)) {
		        return $array;
		    }
		    
		    $object = new stdClass();
		    if (is_array($array) && count($array) > 0) {
		        foreach ($array as $name=>$value) {
		            $name = trim($name);
		            if (!empty($name)) {
		                $object->$name = $this->objectify($value);
		            }
		        }
		        return $object;
		    }
		    else {
		        return FALSE;
		    }
		}

		function fl_yoast_check_current_seo_plugin_link($active){

			if( $active == 'WordPress SEO By Yoast' ){
				return 'https://wordpress.org/plugins/wordpress-seo/';
			}
			elseif ( $active == 'All-In-One SEO Pack' ) {
				return 'https://wordpress.org/plugins/all-in-one-seo-pack/';
			}
			else{
				return '#';
			}
		}

		function current_installation(){
			if ( !class_exists('WPSEO_Option') && !class_exists('All_in_One_SEO_Pack') && !class_exists('seopress_options') && !class_exists('seopress_pro_options') && !class_exists('\The_SEO_Framework\Core') ) {
				return 'No SEO plugin found';
			}
			else{
				if( class_exists('WPSEO_Option' ) ){
					return 'WordPress SEO By Yoast';
				}

				if( class_exists('All_in_One_SEO_Pack') ){
					return 'All-In-One SEO Pack';
				}

				if( class_exists('seopress_pro_options') || class_exists('seopress_options') ){
					return 'SEOPress';
				}
				
				if( class_exists('\The_SEO_Framework\Core') ){
					return 'The SEO Framework';
				}

			}
		}

		function fl_yoast_ajax_license_validate(){
			
			$url = FL_SEO_LICENSE_MANAGER;
		    $url .= '?key=' . get_option('smart_csv_license_key');
		    $url .= '&do=check_license';
		    $url .= '&website=' . $this->get_domain_name( site_url() );

		    $res = @wp_remote_get( $url, array( 'sslverify' => false, 'timeout '=> 120 ) );

		    // echo sizeof( $res['errors'] );
		    // echo '<pre>';
		    // print_r( $res );
		    // echo '</pre>';

		    $result_arr = json_decode( $res['body'] );

		    if ( $result_arr->Code == 200 ){
				
				update_option( 'smart_csv_license_type', $result_arr->LicenseType );
				echo wp_send_json( $result_arr );
			}
			else{
				
				update_option( 'smart_csv_license_type', "" );
				echo wp_send_json( $result_arr );
			}

		}


		function license_activation_hook($data){
			$action = ( $data['activation_status'] == 'inactive' ) ? 'Activate' : 'Activate';
			$url = FL_SEO_LICENSE_MANAGER;
		    $url .= '?license_key=' . $data['fl_yoast_license_key'];
		    $url .= '&do=' . $action;
		    $url .= '&website=' . $this->get_domain_name( site_url() );

		    $res = wp_remote_get( $url, array( 'sslverify' => false, 'timeout '=> 120 ) );

		    // echo '<pre>';
		    // print_r( $res );
		    // echo '</pre>';

		    if( isset( $res->errors ) ){
		    	echo '<div class="error"><p>Plugin activation failed. Please try again later.</p></div>';

			    	wp_mail( 'freddielore89@gmail.com', '[Smart SEO CSV Import Export] Plugin Activation Failed', 'Unable to communicate to www.freddielore.com');
		    }
		    else{

			    // echo get_bloginfo( 'url' );
			    // echo $this->get_domain_name( site_url() );
			    // echo $this->get_domain_name( get_bloginfo( 'url' ) );

			    $result_arr = json_decode( $res['body'] );

			    $message = '<p><strong>License: </strong>' . $data['fl_yoast_license_key'] . '</p>';
				$message .= '<p><strong>Website: </strong>' . $this->get_domain_name( site_url() ) . '</p>';

			    
				if ( is_wp_error( $res ) || 200 != $res['response']['code'] ) {

			    	echo '<div class="error"><p>Plugin activation failed. The plugin author has just been notified.</p></div>';

			    	wp_mail( 'freddielore89@gmail.com', '[Smart SEO CSV Import Export] Plugin Activation Failed - ' . $res['response']['code'] . ' ' . $res['response']['message'], $message );

			    }
			    else{

				    if (is_object($result_arr) && (count(get_object_vars($result_arr)) > 0)) {
					    if ( $result_arr->Code == 200 ){
							
							update_option( 'smart_csv_is_key_valid', true );
							update_option( 'smart_csv_license_type', $result_arr->LicenseType );
							update_option( 'smart_csv_license_key', $data['fl_yoast_license_key'] );
							
							echo '<div class="updated"><p>Plugin activation successful for domain <code>' . $this->get_domain_name( site_url() ) . '</code>.</p></div>';

							wp_mail( 'freddielore89@gmail.com', '[Smart SEO CSV Import Export] Plugin Activation Successful', $message );

						}
						else{
							
							update_option( 'smart_csv_is_key_valid', false );
							update_option( 'smart_csv_license_type', "" );
							update_option( 'smart_csv_license_key', $data['fl_yoast_license_key'] );
							
					    	// echo '<script type="text/javascript">jQuery(document).ready(function(){ alert("' . $result_arr->Message . '"); });</script>';
					    	echo '<div class="error"><p>' . $result_arr->Message . '</p></div>';
							wp_mail( 'freddielore89@gmail.com', '[Smart SEO CSV Import Export] Plugin Activation Failed', $message );
						}
					}
					else{
						echo '<div class="error"><p>Plugin activation failed. The plugin author has just been notified.</p></div>';

						wp_mail( 'freddielore89@gmail.com', '[Smart SEO CSV Import Export] Plugin Activation Failed', $message );
					}
				}
			}
		}

		function smart_seo_settings_page_loaded() {
	        do_action('smart_seo_settings_page_loaded');
	    }

	    function smart_seo_settings_sidebar( $license_type ) {
	        do_action( 'smart_seo_settings_sidebar', $license_type );
	    }

	    function fl_yoast_validate_license_type(){
	    	if( get_option('smart_csv_license_type') ){
				$licence_type = get_option('smart_csv_license_type');
				switch ( $licence_type ) {
					case 'Personal':
						break;
					case 'Business':
						break;
					default:
						break;
				}
			}
			else{ ?>

				<script type="text/javascript">
					var request = new XMLHttpRequest();
					request.open('GET', _ajax.ajaxurl + '?action=fl_csv_license_validate', true);

					request.onload = function() {
						if (request.status == 200 ) {
					    	var data = JSON.parse(request.responseText);
							console.log('success');
							console.log(data);
					  	} 
					  	else {
							console.log('We reached our target server, but it returned an error');
					  	}
					};

					request.onerror = function() {
					  	console.log('There was a connection error of some sort');
					};

					request.send();

				</script>

			<?php 
			}
	    }

	    function fl_upgrade_notifier($type){
	    	if( $type == 'Personal' || $type == 'Business' ){

	    		echo '<div class="fsl-widget fsl-testimonial">
						<div class="bsr-stars">
							<span class="dashicons dashicons-star-filled"></span>
							<span class="dashicons dashicons-star-filled"></span>
							<span class="dashicons dashicons-star-filled"></span>
							<span class="dashicons dashicons-star-filled"></span>
							<span class="dashicons dashicons-star-filled"></span>
						</div>
						<h3>"Worked great and saved me a ton of time!"</h3>
						<img src="https://labs.freddielore.com/wp-content/uploads/2016/11/tyler_barnes.png">
						<p>Tyler Barnes</p>
					</div>';

	    		echo '<div class="fsl-widget fsl-upgrade" id="fsl-upgrade">
								<h3><em>20% off</em> when you upgrade to <strong style="border-bottom: 1px solid #fff;">Developer</strong> version</h3>
								<p><a target="_blank" href="https://labs.freddielore.com/smart-seo-data-csv-import-export/?next=upgrade&from=' . $type . '&key=' . get_option( 'smart_csv_license_key' ) . '&website=' . $this->get_domain_name( site_url() ) . '">Upgrade Now</a></p>
	    					  </div>';
	    	}

	    }
	}
}