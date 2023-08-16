<?php 
/*
Plugin Name: Smart SEO Data CSV Import/Export
Plugin URI: http://twitter.com/freddielore
Description: Bulk-update your site's SEO meta data in seconds by importing a comma-delimited CSV file. CSV export also supported. Navigate to <code><em><strong>Settings > SEO Import/Export</strong></em></code> to get started.
Version: 7.1.0
Author: Freddie Lore
Author URI: http://twitter.com/freddielore
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

require_once( plugin_dir_path(__FILE__) . '/lib/config.php');
require_once( plugin_dir_path(__FILE__) . '/lib/class.parsecsv.php');
require_once( plugin_dir_path(__FILE__) . '/lib/class.logger.php');
require_once( plugin_dir_path(__FILE__) . '/lib/class.helper.php');
require_once( plugin_dir_path(__FILE__) . '/lib/class.google.php');
require_once( plugin_dir_path(__FILE__) . '/lib/class.wpseo.php');
require_once( plugin_dir_path(__FILE__) . '/lib/class.export.php');
require_once( plugin_dir_path(__FILE__) . '/lib/class.import.php');
require_once( plugin_dir_path(__FILE__) . '/lib/class.update.checker.php');


if (!class_exists('FL_SEO_CSV_Import_Export')) {
 
	class FL_SEO_CSV_Import_Export extends FL_SEO_CSV_Import_Helper{

		public $wpseo;

		public function __construct() {
			
			$export = new FL_SEO_CSV_Export();
			$import = new FL_SEO_CSV_Import();
			$this->wpseo = new FL_WPSEO_Taxonomy_Meta();

			register_activation_hook( __FILE__, array( &$this, 'fl_yoast_activation_hook' ) );

			add_action('init', array($this, 'fl_yoast_activate'));

			// Add settings link on plugin page
			add_filter('plugin_action_links_' . plugin_basename(__FILE__), array(&$this,'fl_yoast_csv_settings_link' ));

			// create custom plugin settings menu
			add_action('admin_menu', array(&$this, 'fl_yoast_csv_tweaks'));
			add_action( 'admin_enqueue_scripts', array(&$this, 'fl_yoast_csv_enqueue_custom_scripts_css' ));
			add_action( 'wp_ajax_fl_csv_import', array(&$import, 'fl_yoast_ajax_csv_import'));
			add_action( 'wp_ajax_fl_csv_export', array(&$export, 'fl_yoast_ajax_csv_export'));

			add_action( 'wp_ajax_fl_csv_license_validate', array(&$this, 'fl_yoast_ajax_license_validate'));
			add_action('after_setup_theme', array(&$this, 'custom_filters_hooks') );

		}

		
		function fl_yoast_activate(){

            $plugin = new FL_SEO_Updater( FL_SEO_VERSION, FL_SEO_UPDATE_URL, plugin_basename(__FILE__) );
            
        }

		function fl_yoast_activation_hook() {
			if ( !class_exists('WPSEO_Option') && !class_exists('All_in_One_SEO_Pack') && !class_exists('seopress_options') && !class_exists('seopress_pro_options') ) {

				deactivate_plugins( plugin_basename( __FILE__ ) );
				wp_die( sprintf( __( 'Sorry, you can\'t activate unless you have <a target="_blank" href="%s">WordPress SEO by Yoast</a> or <a target="_blank" href="%s">All-In-One SEO Pack</a> installed', 'apl' ), 'https://wordpress.org/plugins/wordpress-seo/', 'https://wordpress.org/plugins/all-in-one-seo-pack/' ) );
			}

			if ( !file_exists( FL_UPLOADS ) ) {
			    if( !wp_mkdir_p( FL_UPLOADS ) ){
			    	deactivate_plugins( plugin_basename( __FILE__ ) );
					wp_die( sprintf( __( 'Your /wp-content/uploads/ folder is not writable. Please ensure it\'s writable', 'apl' ) ) );
			    }
			}
		}

		function fl_yoast_csv_settings_link($links) { 
			$settings_link = '<a href="options-general.php?page=fl-seo-data-csv&tab=csv_import">Import</a> | <a href="options-general.php?page=fl-seo-data-csv&tab=csv_export">Export</a>'; 
		  	array_unshift($links, $settings_link); 
		  	return $links; 
		}

		function fl_yoast_csv_tweaks() {

			//create new top-level menu
			add_submenu_page('options-general.php', 'Smart SEO Data CSV Import/Export', 'SEO Import/Export', 'publish_posts', 'fl-seo-data-csv', array(&$this, 'fl_seo_data_csv_settings_page'));

			//call register settings function
			add_action( 'admin_init', array(&$this, 'fl_yoast_csv_settings' ));

		}

		function fl_yoast_csv_settings() {
			//register our settings
			register_setting( 'fl_seo_data_csv_settings_group', 'smart_csv_is_key_valid' );
			register_setting( 'fl_seo_data_csv_settings_group', 'smart_csv_license_key' );
		}

		function fl_yoast_csv_enqueue_custom_scripts_css($hook) {
		    wp_register_style( 'fontawesome', '//use.fontawesome.com/releases/v5.6.3/css/all.css' );
		    wp_enqueue_style( 'fontawesome' );

		    wp_register_style( 'pretty_checkbox_css', plugin_dir_url( __FILE__ ) . 'css/pretty-checkbox.min.css' );
		    wp_enqueue_style( 'pretty_checkbox_css' );

		    wp_register_style( 'custom_fl_yoast_csv_wp_admin_css', plugin_dir_url( __FILE__ ) . 'css/dash-style-6.0.3.min.css' );
		    wp_enqueue_style( 'custom_fl_yoast_csv_wp_admin_css' );


		    wp_register_script( 'custom_fl_yoast_csv_wp_admin_wallform_js', plugin_dir_url( __FILE__ ) . 'js/jquery.csvUploader.js' );
		    wp_enqueue_script( 'custom_fl_yoast_csv_wp_admin_wallform_js' );

		    wp_enqueue_script( 'jquery-ui-draggable' );
		    wp_enqueue_script( 'jquery-ui-droppable' );

		    wp_enqueue_script( 'jquery-ui-datepicker' );
		    wp_register_style( 'jquery-ui-datepicker-css', '//ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css' );
		    wp_enqueue_style( 'jquery-ui-datepicker-css' );

			wp_register_script( 'custom_fl_yoast_csv_wp_admin_js', plugin_dir_url( __FILE__ ) . 'js/dash-js-6.0.3.min.js' );
			wp_localize_script( 'custom_fl_yoast_csv_wp_admin_js', '_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ))); 
		    wp_enqueue_script( 'custom_fl_yoast_csv_wp_admin_js', array( 'jquery-ui-datepicker', 'jquery-ui-draggable', 'jquery-ui-droppable' ) );
		}

		function fl_seo_data_csv_settings_page() {

			$html = '<div class="wrap fl_seo_data_csv_settings_page">
						<h2>Smart SEO Data CSV Import/Export</h2>
						<p style="margin-top: 0;"><span>The first SEO meta data importer/exporter for Yoast SEO, All-In-One SEO Pack, SEOPress, and The SEO Framework</span></p>';

						$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'csv_import';
						$csv_import_class = ($active_tab == 'csv_import') ? 'nav-tab-active' : '';
						$csv_export_class = ($active_tab == 'csv_export') ? 'nav-tab-active' : '';
						$license_class = ($active_tab == 'license') ? 'nav-tab-active' : '';

						$html .= '<div id="fsl-content">';
				
						$html .= '<h2 class="nav-tab-wrapper">
									    <a href="?page=fl-seo-data-csv&tab=csv_import" class="nav-tab ' . $csv_import_class . '"><i class="fa fa-file-import"></i> Import</a>
									    <a href="?page=fl-seo-data-csv&tab=csv_export" class="nav-tab ' . $csv_export_class . '"><i class="fa fa-file-export"></i> Export</a>
									    <a href="?page=fl-seo-data-csv&tab=license" class="nav-tab ' . $license_class . '"><i class="fa fa-life-ring"></i> License &amp; Support</a>
									</h2>';

						if( $active_tab == 'csv_import' ) { 

							$html .= '<div class="fsl-content-tab">';

							$upload_dir = wp_upload_dir();
							if( !get_option('smart_csv_is_key_valid') ){
								$html .= '<div class="_error"><p>Please activate your copy by going to <a href="' . site_url() . '/wp-admin/options-general.php?page=fl-seo-data-csv&tab=license" rel="nofollow">License &amp; Support</a> tab to continue.</p></div>';
							}
							else{
								$html .= '<form id="imageform" method="post" enctype="multipart/form-data" action="' . plugin_dir_url(__FILE__) . 'lib/csv.upload.php">
									<div id="plupload-upload-ui" class="hide-if-no-js drag-drop">
										<div class="update-nag" style="margin-top: 0;"><strong>IMPORTANT:</strong> Be sure to create a full database backup of your site before you begin the import process. The <code>Import</code> function works by updating each and every post meta entry created by <code>' . $this->current_installation() . '</code>.</div>
										<p>Upload your CSV File below</p> 

										<div id="drag-drop-area" style="position: relative;">
											<div class="drag-drop-inside" style="margin-top: 85px;">
												<p class="drag-drop-buttons" id="csvloadbutton">
													<input type="file" name="fl-seo-data-csv" id="fl-seo-data-csv" style="position: relative; z-index: 1;" />
													<label class="button" id="fl-seo-data-csv-label" for="fl-seo-data-csv">Select CSV File</label>
													<input type="hidden" name="upload_dir" value="' . FL_UPLOADS . '">
												</p>
											</div>
										</div>
									</div>
								</form>

								<div id="csv_upload_result"></div>';
							}

							$html .= '</div><!-- end .fsl-content-tab -->';

							echo $html;
						}
						elseif ( $active_tab == 'csv_export' ) {

							$html .= '<div class="fsl-content-tab">';

							if( !get_option('smart_csv_is_key_valid') ){
								$html .= '<div class="_error"><p>Please activate your copy by going to <a href="' . site_url() . '/wp-admin/options-general.php?page=fl-seo-data-csv&tab=license" rel="nofollow">License &amp; Support</a> tab to continue.</p></div>';
							}
							else{

								$html .= '<p>When you click the Export button below, a comma-delimited CSV file will be created for you to save to your computer or Google Drive.</p>

								<p>This CSV file will contain SEO meta data for your posts, pages and other custom post types you specify below. Once you have saved the CSV file, you can use the <code>Import</code> function to bulk update your SEO meta data in seconds.</p>

								<h3>Choose what to export <a class="tooltip" href="' . $this->fl_yoast_check_current_seo_plugin_link( $this->current_installation() ) . '" onclick="return false;" rel="tooltip" title="Only <strong>' . $this->current_installation() . '</strong> data will be exported.">&nbsp;</a></h3>

								<form method="POST" id="yoast-csv-export" action="' . plugin_dir_url(__FILE__) . 'ajax.php">
									<div class="pretty p-icon p-smooth">
										<input id="radio-all-content" type="radio" name="post_type" value="all" checked="checked" data-type="post"> 
										<div class="state p-primary">
											<i class="icon fa fa-check"></i>
											<label for="radio-all-content">All contents (<i class="post-total">' . $this->get_total_post_count('all', '', '') . ')</i></label>
										</div>
									</div>
									<p class="description">This will contain all SEO meta data of your posts, pages, and custom posts.</p>

									<div class="pretty p-icon p-smooth">
										<input id="radio-post" type="radio" name="post_type" value="post" data-type="post">
										<div class="state p-primary">
											<i class="icon fa fa-check"></i>
											<label for="radio-post"> Post <i class="post-total">(' . $this->get_total_post_count('post', '', '') . ')</i></label>
										</div>
									</div>
									<div class="pretty p-icon p-smooth">
										<input id="radio-post" type="radio" name="post_type" value="page" data-type="post"> 
										<div class="state p-primary">
											<i class="icon fa fa-check"></i>
											<label for="radio-page">Page <i class="page-total">(' . $this->get_total_post_count('page', '', '') . ')</i></label>
										</div>
									</div>';
									

									$args = array(
									   'public'   => true,
									   '_builtin' => false
									);

									$output = 'names'; // names or objects, note names is the default
									$operator = 'and'; // 'and' or 'or'

									$post_types = get_post_types( $args, $output, $operator );

									foreach ( $post_types  as $post_type ) {
									   $html .= '<div class="pretty p-icon p-smooth">
									   				<input id="radio-' . $post_type . '" type="radio" name="post_type" value="' . $post_type . '" data-type="post"> 
									   				<div class="state p-primary">
														<i class="icon fa fa-check"></i>
									   					<label for="radio-' . $post_type . '">' . ucfirst($post_type) . ' <i class="' . $post_type .'-total">(' . $this->get_total_post_count($post_type, '', '') . ')</i></label>
									   				</div>
									   			</div>';
									}

									if( class_exists('WPSEO_Option') || class_exists('All_in_One_SEO_Pack') || class_exists('seopress_pro_options') || class_exists('seopress_options') || class_exists('\The_SEO_Framework\Core') ){
										
										$html .= '<h3 style="margin-top: 2em;">Taxonomies <a class="tooltip" href="' . $this->fl_yoast_check_current_seo_plugin_link( $this->current_installation() ) . '" onclick="return false;" rel="tooltip" title="Only <strong>' . $this->current_installation() . '</strong> data will be exported.">&nbsp;</a></h3>';

										// $html .= '<p><label><input type="radio" name="post_type" value="taxonomy_all"> All taxonomies (<i class="post-total">' . $this->get_total_taxonomy_count('all') . ')</label></p>
										// 		<p class="description">This will contain all SEO meta data of your default and custom taxonomies.</p>';

										if( $this->get_total_taxonomy_count('category') > 0 ){
											$html .= '<div class="pretty p-icon p-smooth">
														<input id="radio-category" type="radio" name="post_type" value="category" data-type="taxonomy">
														<div class="state p-primary">
															<i class="icon fa fa-check"></i>
															<label for="radio-category">' . ucfirst('category') . ' <i class="category-total">(' . $this->get_total_taxonomy_count('category') . ')</i></label>
														</div>
													</div>';
										}

										if( $this->get_total_taxonomy_count('post_tag') > 0 ){
											$html .= '<div class="pretty p-icon p-smooth">	
														<input id="radio-post_tag" type="radio" name="post_type" value="post_tag" data-type="taxonomy">
														<div class="state p-primary">
															<i class="icon fa fa-check"></i>
															<label for="radio-post_tag">' . ucfirst('post_tag') . ' <i class="post_tag-total">(' . $this->get_total_taxonomy_count('post_tag') . ')</i></label>
														</div>
													</div>';
										}

										$args = array(
										  'public'   => true,
										  '_builtin' => false ); 

										$output = 'names'; // or objects
										$operator = 'and'; // 'and' or 'or'
										$taxonomies = get_taxonomies( $args, $output, $operator ); 

										if ( $taxonomies ) {
										  	foreach ( $taxonomies  as $taxonomy ) {

										  		if( $this->get_total_taxonomy_count($taxonomy) > 0 ){
										  			$html .= '<div class="pretty p-icon p-smooth">
										  						<input id="radio-' . $taxonomy . '" type="radio" name="post_type" value="' . $taxonomy . '">
										  						<div class="state p-primary">
																	<i class="icon fa fa-check"></i>
										  							<label for="radio-' . $taxonomy . '">' . ucfirst($taxonomy) . ' <i class="' . $taxonomy .'-total">(' . $this->get_total_taxonomy_count($taxonomy) . ')</i></label>
										  						</div>
										  					</div>';
										  		}
										  	}
										}
									}

									$html .= '<div class="fsl-export-settings">
													<h3 style="margin-top: 2em;">Export Settings <a class="tooltip" href="#" onclick="return false;" rel="tooltip" title="Optionally, you can specify the posts to export by date range. Leave empty to export all.">&nbsp;</a></h3>
													<p><label for="fsl-export-from">Only export posts between: </label><input type="text" id="fsl-export-from" name="seo_export_from" readonly> and <input type="text" id="fsl-export-to" name="seo_export_to" readonly></p>

													<div class="pretty p-icon p-smooth">
								  						<input id="exclude_default" type="checkbox" name="exclude_default">
								  						<div class="state p-primary">
															<i class="icon fa fa-check"></i>
								  							<label for="radio-publisher">Only export posts with default SEO meta titles/descriptions </label>
								  						</div>
								  					</div>

											</div>';

									// after authentication
									if( isset( $_GET['path'] ) && $_GET['path'] != "" ){
										echo str_replace( FL_UPLOADS, FL_UPLOADS_BASE_URL, urldecode( $_GET['path'] ) );
										
										$google_link = sprintf( '<a class="google-link" href="#" data-path="%s"><em class="lds-ripple"><span></span><span></span></em><i class="fab fa-google-drive">&nbsp;</i> <strong>Open in Google Sheet</strong></a>', urldecode( $_GET['path'] ) );
										
										$html .= sprintf( '<p class="submit" style="display: none;">
																<button type="submit" name="submit" id="start-export" class="button button-primary"><i class="fa fa-download"></i> <span>Export to CSV</span></button> 
															</p>
															<input type="hidden" name="action" value="fl_csv_export">
															<input type="hidden" name="_wpnonce" value="%s">
															<div id="smart-export-complete">
																<a target="_blank" class="button-primary file-download" href="%s"><i class="fas fa-file-csv"></i> Download CSV</a>
																%s
															</div>
												</form>', 
											wp_create_nonce( 'csv_export_nonce' ),
											str_replace( FL_UPLOADS, FL_UPLOADS_BASE_URL, urldecode( $_GET['path'] ) ),
											$google_link
										);
									}
									else{
										$google_link = sprintf( '<a class="google-link" href="#"><em class="lds-ripple"><span></span><span></span></em><i class="fab fa-google-drive">&nbsp;</i> <strong>Open in Google Sheet</strong></a>' );
										
										$html .= sprintf( '<p class="submit">
																<button type="submit" name="submit" id="start-export" class="button button-primary"><i class="fa fa-download"></i> <span>Export to CSV</span></button> 
															</p>
															<input type="hidden" name="action" value="fl_csv_export">
															<input type="hidden" name="_wpnonce" value="%s">
															<div id="smart-export-complete" style="display: none;">
																<a target="_blank" class="button-primary file-download" href="#"><i class="fas fa-file-csv"></i> Download CSV</a>
																%s
															</div>
												</form>', 
											wp_create_nonce( 'csv_export_nonce' ),
											$google_link
										);
									}
								
							}	

							$html .= '</div><!-- end .fsl-content-tab -->';

							echo $html;

						} 
						else{

							$html .= '<div class="fsl-content-tab">';

							if( $_POST ){
								$html .= $this->license_activation_hook($_POST);
							}

							$key_valid_class = ( get_option('smart_csv_is_key_valid') ) ? 'isValid' : 'isInValid';
							$license_key = ( get_option('smart_csv_license_key') != '' ) ? get_option('smart_csv_license_key') : '';
							$is_key_valid_class = ( get_option('smart_csv_is_key_valid') ) ? 'active' : 'inactive';
							$is_key_valid_button_class = ( get_option('smart_csv_is_key_valid') ) ? 'Activate' : 'Activate';

							$protocol = ( !isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on' ) ? 'http://' : 'https://';

							// user info
							global $current_user;
      						get_currentuserinfo();

      						$upgrade_notice = '';

      						if( get_option( 'smart_csv_license_type' ) == 'Personal' || get_option( 'smart_csv_license_type' ) == 'Business' ){
	      						$upgrade_notice = sprintf( '<a class="fsl-upgrade-notice" style="display: inline-block;padding-left: 88px;margin: 5px 0 0 0;" href="https://labs.freddielore.com/smart-seo-data-csv-import-export/?next=upgrade&from=%s&key=%s&website=%s" target="_blank">Go limitless! <strong>20%% OFF</strong> when you upgrade to Developer version</a>', 
	      							get_option( 'smart_csv_license_type' ),
	      							get_option( 'smart_csv_license_key' ),
	      							$this->get_domain_name( site_url() )
	      						);
	      					}

							$html .= '<div class="fl-yoast-license-key-wrap">
									<form method="POST" id="yoast-csv-export" action="' . $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '">
										<p style="margin-bottom: 0;"><label for="fl_yoasy_license_key"><span>License Key</span></label>
										<input type="text" name="fl_yoast_license_key" id="fl_yoast_license_key" class="regular-text ' . $key_valid_class . '" value="' . $license_key . '" placeholder="Enter License Key"></p>
										' . $upgrade_notice . '
										<input type="hidden" name="action" value="fl_csv_license_validate">
										<input type="hidden" name="activation_status" id="fl_activation_status" value="' . $is_key_valid_class . '">

										<p class="submit" style="margin-top: 0;"><input type="submit" name="submit" id="fl_yoasy_license_button" class="button button-primary" value="' . $is_key_valid_button_class . '"></p>
									</form>

									<div class="one-third">
										<div class="fsl-widget help">
											<h3><i class="fa fa-life-ring"></i> Need Help?</h3>
											<p>Feel free to get in touch.</p>
											<p><a target="_blank" href="https://labs.freddielore.com/smart-seo-data-csv-import-export/?from=' . $current_user->display_name . '&email=' . get_option('admin_email') . '&subject=I+need+your+help#front-page-7">Submit Ticket</a></p>
										</div>
										<div class="fsl-widget help">
											<h3><i class="fa fa-info"></i> Feature Request</h3>
											<p>Want to make this tool a lot better? Help us improve this tool.</p>
											<p><a target="_blank" href="https://labs.freddielore.com/smart-seo-data-csv-import-export/?from=' . $current_user->display_name . '&email=' . get_option('admin_email') . '&subject=I+have+a+feature+to+request#front-page-7">Request a Feature</a></p>
										</div>
										<div class="fsl-widget help">
											<h3><i class="fa fa-edit"></i> Write a review</h3>
											<p>Your feedback inspires and helps us improve. Drop us a line.</p>
											<p><a target="_blank" href="https://labs.freddielore.com/smart-seo-data-csv-import-export/review/?from=' . $current_user->display_name . '&email=' . get_option('admin_email') . '">Review</a></p>
										</div>
									</div>
									<div class="two-third">
										<h3>Frequently Asked Questions</h3>
										<div id="fsl-faqs" class="fsl-widget od-accordion accordion" style="padding: 0;">
											<h4 class="accordion-toggle"><span class="dashicons1 dashicons-plus1"></span>The “Export” button doesn\'t seem to work. I\'m not getting any exported file. What\'s wrong?</h4>
											<div class="accordion-content" style="display: none;"><p>Some browser\'s configuration might prevent download popup dialogs from appearing. Some browser\'s extensions can also interfere this behaviour. Try to go incognito or use another browser to confirm. If problem persists, please submit a ticket using the form below.</p></div>

											<h4 class="accordion-toggle"><span class="dashicons1 dashicons-plus1"></span>I have problem with plugin license activation. It constantly says “invalid”. What should I do?</h4>
											<div class="accordion-content " style="display: none;"><p>Please be reminded that a Personal license is only valid for 1 site and Business is valid for 5 sites. If you\'re sure there\'s a mistake, please notify me immediately.</p></div>

											<h4 class="accordion-toggle"><span class="dashicons1 dashicons-plus1"></span>The exported CSV file contains weird, unrecognised characters and it\'s not displaying correctly on my Excel. What should I do?</h4>
											<div class="accordion-content" style="display: none;"><p>This is character encoding issue of Microsoft\'s Excel, especially if you\'re dealing with CSV file containing text like Chinese, Greek or French or Italian. It is recommended to open the exported CSV file using Google Sheet and do all the modification there.</p></div>

											<h4 class="accordion-toggle"><span class="dashicons1 dashicons-plus1"></span>The exported CSV file contains empty `seo_meta_title` column. How can I make sure Yoast SEO meta titles get exported as well?</h4>
											<div class="accordion-content" style="display: none;"><p>Smart SEO CSV Import/Export Suite normally exports user-defined SEO meta titles and descriptions. Which means if there\'s no custom SEO titles and descriptions being defined on each post/page, there\'s nothing to export and you\'ll see empty seo_meta_title or seo_meta_description column. </p>
												<p>However, you can force WordPress to export Yoast global SEO meta title settings by adding below\'s script to your functions.php:</p> <script src="https://gist.github.com/freddielore/fbf3e3311c33143d74ea47f9ad3b59b8.js"></script>
												<p><a href="https://labs.freddielore.com/update-seopress-csv-bulk-editing-support-more-powerful-hooks-and-filters-v7-0-0/">Learn more</a> about <code>smart_seo_export_title</code> filter</p>
											</div>
										</div>
									</div>

									<div class="clear"></div>

								</div><!-- end .fl-yoast-license-key-wrap -->';

							$html .= '</div><!-- end .fsl-content-tab -->';

							echo $html;

						} 

						echo '</div><!-- end #fsl-content -->'; ?>

						<div id="fsl-sidebar">
							<div class="fsl-widget cta">
								<img src="<?php echo plugin_dir_url(__FILE__); ?>images/seo-meta-csv-import-export-wordpress.png">
								<span>v<?php echo FL_SEO_VERSION; ?></span>
							</div>
							
							<?php $this->smart_seo_settings_sidebar( get_option( 'smart_csv_license_type' ) ); ?>

							<div class="fsl-widget docs">
								<h3><i class="fa fa-bookmark"></i> Documentation</h3>
								<p>Do more with Smart SEO CSV Import/Export. Check out our custom action hooks and filters you can use to extend your import and export needs.</p>
								<p><a target="_blank" href="https://labs.freddielore.com/smart-seo-data-csv-import-export/docs/">Read the documentation</a></p>
							</div>
							<div class="fsl-widget" style="border-top: 1px solid #ddd;">
								<small><strong>Smart SEO Data CSV Import/Export</strong> is not affiliated nor associated in any way with Yoast SEO, All-In-One SEO Pack, SEOPress, and The SEO Framework</small>
							</div>
						</div>


						<?php



			echo '</div>';

			$this->smart_seo_settings_page_loaded();

		}

		function custom_filters_hooks(){
			add_action( 'smart_seo_settings_page_loaded', array(&$this, 'fl_yoast_validate_license_type') );
			add_action( 'smart_seo_settings_sidebar', array(&$this, 'fl_upgrade_notifier'), 1 );
		}

	}
}

new FL_SEO_CSV_Import_Export();