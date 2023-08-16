<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * Please note that missing files will produce a fatal error.
 *
 * @package Sample Theme
 * @since 1.0.0
 *
 */

$file_includes = [
	'includes/loadmore.php',           // Basic theme setup
	'includes/setup.php',			// Basic theme setup
	'includes/scripts.php',			// Enqeue theme styles and scripts
	'includes/widgets.php',			// Theme widget area
	'includes/project.php',			// Custom functions for this specific project
	'includes/acf.php',				// Advanced custom fields functions
	'includes/blocks.php',			// Custom Gutenberg blocks
	'includes/cpt.php',				// Custom post types setup
	'includes/custom.php',			// Custom functions
	'includes/ajax.php',			// Ajax related functions
	'includes/browsers.php',		// Browser detection function
	// 'includes/dashboard.php',		// Custom Dashboard Widget
	'includes/import-csv-plan.php',		// Custom Dashboard Widget
        'includes/import-csv-utilities.php',

];

/**
 * Checks if any file have error while including it.
 *
 */
foreach ($file_includes as $file) {
	if (!$filepath = locate_template($file)) {
		trigger_error(sprintf(__('Error locating %s for inclusion', 'theme_textdomain'), $file), E_USER_ERROR);
	}
	require_once $filepath;
}
unset($file, $filepath);
global $browser;
$browser = new Browsersphp\Browsers();




function add_theme_menu_item()
{
	add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");


function theme_settings_page()
{

		  if($_FILES['file']['name'] != ''){
		    $uploadedfile = $_FILES['file'];
		    $upload_overrides = array( 'test_form' => false );

		    $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
		    $imageurl = "";
		    if ( $movefile && ! isset( $movefile['error'] ) ) {
		       $imageurl = $movefile['url'];
		       echo "url : ".$imageurl;
		    } else {
		       echo $movefile['error'];
		    }
		  }
    ?>
	    <div class="wrap">
	    <h1>Theme Panel</h1>
	    <form method="post" action="" name="myform" enctype='multipart/form-data'>
	    	 <input type='file' name='file'>
	        <?php submit_button();?>
	    </form>
		</div>
	<?php
}

function getprovision_display_footer_code()
{
	echo <<<HTMLCODE
	
	<script>
	if (jQuery(window).width() > 767) {
	
		jQuery(".single-state:has(span.button:contains('Pennsylvania'))").hide();
		jQuery(".utility-partners-col:has(h4.partners-heding:contains('Pennsylvania'))").hide();
		jQuery("li:has(span:contains('Pennsylvania'))").hide();
	
	}
	</script>
	
HTMLCODE;
	
}
add_action("wp_footer", "getprovision_display_footer_code");

/*
function cb_add_query_vars_filter($vars): array
{
    $vars[] = "a";

    return $vars;
}
add_filter('query_vars', 'cb_add_query_vars_filter');

function cb_rep_id_step_3_value_filler($value): string
{
    return get_query_var('a');
}
add_filter('gform_field_value_rep_id_step_3', 'cb_rep_id_step_3_value_filler');
 */

/*
function csv_import_settings_page(){

 ?>
	    <div class="wrap">
	    <h1>Import Plan Settings</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("import_plan_settings");
	            do_settings_sections("theme-options");?>

				         Select CSV to upload:
				<input type="file" name="import_plan_settings['csv_file']" id="import_plan_settings['csv_file']">
				<input type="submit" value="Upload" name="submit">
				<?php
	            submit_button();
	        ?>
	    </form>

			    <?php if(isset($_POST["submit"])) {
					echo $_FILES["import_plan_settings['csv_file']"];
					exit;
		}?>
		</div>
	<?php

}

function add_menu_item_csv_import()
{
	add_menu_page("Import CSV Settings", "Import CSV Settings", "manage_options", "import-csv-settings", "csv_import_settings_page", null, 99);
}

add_action("admin_menu", "add_menu_item_csv_import");

add_settings_field('import-plan-csv-upload', 'Upload File', "csv_import_settings_page", "theme-options", "import_plan_settings");

register_setting("import_plan_settings","import-plan-csv-upload");*/

function custom_file_size_limit( $file ) {
    $size_in_bytes = 750 * 1024; 
    
    if ( $file['type'] == 'image/jpeg' || $file['type'] == 'image/png' ) { 
        if ( $file['size'] > $size_in_bytes ) {
            $file['error'] = 'Image file size exceeds the allowed limit of 750KB.'; 
        }
    }

    return $file;
}
add_filter( 'wp_handle_upload_prefilter', 'custom_file_size_limit' );