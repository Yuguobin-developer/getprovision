<?php
/**
 * Setup function for the project
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Redica
 * @since 1.0.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
class import_csv_utilities {

    public function __construct() {
        
        add_action( 'init', array($this,'stop_heartbeat'), 1 );

        add_action('admin_init', array($this, 'register_icUtilities_setting'));

        add_action('admin_menu', array($this, 'utilities_admin_sub_menu'));

        add_action("wp_ajax_utility_clear_all_settings", array($this,'utility_clear_all_settings'));

        add_action("wp_ajax_ic_import_utility_csv_routine", array($this,'ic_import_utility_csv_routine'));
        
        add_action("wp_ajax_ic_import_dbutility_", array($this,'ic_import_dbutility_'));

        add_action('admin_footer', array($this,'add_setting_scripts'));
    }
    public function stop_heartbeat() {
        wp_deregister_script('heartbeat');
    }

    public function register_icUtilities_setting() {
        //add setting for utility CSV
        register_setting('ic_utilitiy_options_group', 'ic_utility_csv', $this->utility_handle_file_upload()); //Field Register
        register_setting('ic_utilitiy_map_options_group', 'ic_utility_map', $this->utility_map_csv());


    }

    public function utilities_admin_sub_menu() {
//        add_menu_page(
//                __('Import Plans CSV', 'provision_td'), __('Import Plans CSV', 'provision_td'), 'manage_options', 'import-plans-csv', array($this, 'view')
//        );
        add_submenu_page(
                'import-plans-csv', 'Import Utility', 'Import Utility', 'manage_options', 'import-utilities-csv', array($this, 'view')
        );
    }

    /*
     * Useful link to add ACF data in posts
     * https://www.advancedcustomfields.com/resources/update_field/
     */

    public function view() {
        $utilityCsv = get_option('ic_utility_csv');
        $utilityCsvMap = get_option('ic_utility_map');
//        $this->utility_clear_all_settings();
        ?>
        <div class="iutility_options_main wrap">
            <div class="wrap">

                <?php
                if (!empty($utilityCsv) && empty($utilityCsvMap) && ($handle = fopen($utilityCsv, "r")) !== FALSE) {
                    fclose($handle);
                    $this->CSV_Map();
                } elseif (!empty($utilityCsv) && !empty($utilityCsvMap) && ($handle = fopen($utilityCsv, "r")) !== FALSE) {
                    fclose($handle);
                    ?>
                    <h2>Import CSV Data</h2>
                    <p>Please do not close the browser!</p>
                    
                    <button type="button" onclick="clearAll_utility()">Remove CSV</button>
                    &nbsp;&nbsp;<a href="<?= $utilityCsv ?>"> View Uploaded CSV</a>
                    <br/><br/>
                    
                    <?php
                    $this->CSV_import_DBTable();
                    $this->CSV_import_();
                }else {
                    delete_option( 'ic_utility_csv' );
                    delete_option( 'ic_utility_map' );
                    $this->csv_upload_form();
                }
                ?>
            </div>
        </div>

        <?php
    }

    public function csv_upload_form() {
        ?>
        <h2>Upload Utility CSV</h2>

        <form method="post" action="options.php" enctype='multipart/form-data'>
            <?php
            settings_fields('ic_utilitiy_options_group');
            ?>
            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th scope="row">Upload Plans CSV</th>
                        <td align="left">
                            <label><input type="file" name="ic_utility_csv" value="" class="regular-text code"></label>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p> <?php submit_button('Upload CSV'); ?></p>
        </form>
        <?php
        
    }

    public function CSV_Map() {
        $utilityCsv = get_option("ic_utility_csv");

        ?>
        <h2>Map CSV Data</h2>
        <button type="button" onclick="clearAll_utility()" class="button">Remove CSV</button>
        &nbsp;&nbsp;<a href="<?= $utilityCsv ?>" class="button"> View Uploaded CSV</a><br/><br/>
        <form method="post" action="options.php">
            <?php settings_fields('ic_utilitiy_map_options_group'); ?>
            <?php
            if (($handle = fopen($utilityCsv, "r")) !== FALSE) {
                while (($csv_data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                    echo "<table>";

                    foreach ($csv_data as $data => $labels) {

                        echo "<tr><td>$labels</td>";

                        echo "<td>";
                        $acfFields = $this->utility_acf_field('utilities');
//                        $this->print_pre($acfFields);
                        echo '<select name="ic_utility_map['.$labels.']" id="cars">';
                            foreach ($acfFields as $field){

                                //count1

                                if(array_key_exists('sub_fields',$field)){
                                    foreach($field['sub_fields'] as $sub_field){
                                        $optionValue = $field['name']."_-_".$sub_field['name'];
                                        echo '<option value="'.$optionValue.'">'.$sub_field['label'].'</option>';
                                    }
                                }else{
                                    echo '<option value="'.$field['name'].'">'.$field['label'].'</option>';
                                }

                                //countlast
                            }
                        echo '</select>';

                        echo "</td></tr>";
                    }

                    echo "</table>";
                    break;
                }
            }
            ?>
            <p>
                <input type="radio" id="delete_old" name="ic_utility_map[delete_old]" value="delete" checked>
                <label for="delete_old">Delete existing data & re-import everything</label><br>
                <input type="radio" id="insert_new" name="ic_utility_map[delete_old]" value="insert">
                <label for="insert_new">Keep existing data as it is and add new zipcodes into existing utilities. Also, create new utilities and add zip-codes</label><br>
                <!--<input type="radio" id="insert_new" name="ic_utility_map[delete_old]" value="update">
                <label for="insert_new">Update Existing Utilities</label><br>-->
            </p>
            <p> <?php submit_button('Import CSV'); ?></p>
        </form>
        <?php
    }
    
    public function CSV_import_DBTable(){
        //create temp sql table before actual import process
        global $wpdb;
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        
        $utilityCsv = get_option('ic_utility_csv');
        $utilityCsvMap = get_option('ic_utility_map');        
        $utilityCsvMapFlip = array();
        foreach ($utilityCsvMap as $key => $value) {
            if($key != 'delete_old'){
            $utilityCsvMapFlip[$key] = str_replace('zipcodes_-_','',$value);
            }
        }

        $charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'import_routine';      

	$sql = "CREATE TABLE `$table_name` (
                zipcode VARCHAR(40) NOT NULL , 
                city VARCHAR(40) NOT NULL , 
                municipal VARCHAR(40) NOT NULL , 
                county VARCHAR(40) NOT NULL , 
                state VARCHAR(40) NOT NULL , 
                post_title VARCHAR(40) NOT NULL , 
                brand VARCHAR(40) NOT NULL , 
                sub_territory VARCHAR(40) NOT NULL
                ) $charset_collate;";
	
	maybe_create_table( $table_name, $sql );
        $wpdb->query("TRUNCATE TABLE $table_name");
        
        $colcount = count($utilityCsvMap);
        
        if (($handle = fopen($utilityCsv, "r")) !== FALSE) {

            $row = 0;
            $columnsNames = array();
            while (($csv_data = fgetcsv($handle)) !== FALSE) { //fgetcsv($handle, 1000, ",")
                if($row > 0){     
                $insertArr = array_combine($utilityCsvMapFlip,$csv_data);

                $wpdb->insert($table_name, $insertArr);
                }
                $row++;

            }

            fclose($handle);
        }
        
        $tablename = $wpdb->prefix."utility_post_data"; 
        $main_sql_create = "CREATE TABLE `$tablename` (
          `id` int NOT NULL AUTO_INCREMENT,
          `post_title` varchar(50) NOT NULL,
          `post_id` int(11) NOT NULL,
          `zipcode` varchar(10) NOT NULL,
          `city` varchar(50) NOT NULL,
          `municipal` varchar(50) NOT NULL,
          `county` varchar(50) NOT NULL,
          `state` varchar(50) NOT NULL,
          `brand` varchar(50) NOT NULL,
          `sub_territory` varchar(50) NOT NULL,
           PRIMARY KEY (`id`)
        ) $charset_collate;";    
        maybe_create_table( $tablename, $main_sql_create );
        
        //delete the old utility data if delete option is selected in import.
        if(isset($utilityCsvMap['delete_old']) && ($utilityCsvMap['delete_old'] == 'delete')){
            $wpdb->query("TRUNCATE TABLE $tablename");
        }
        unset($utilityCsvMap['delete_old']);
    }
    
    public function CSV_import_() {        
        ?>        
        
        <script>
            jQuery( document ).ready(function($) {
                $(".spinner").addClass("is-active");
//                AjAXcall();
            });
            function AjAXcall(){
                var page = parseInt(jQuery('input[name="cur_page"]').val());
                var curr_util = jQuery('input[name="curr_util"]').val();
                var utils = jQuery('input[name="utils"]').val();
                var utilsArr = utils.split(',');
                var max_page = parseInt(jQuery('input[name="max_page"]').val());
                
                jQuery('.utilstatus').text('importing '+ utilsArr[page]);
                jQuery.ajax({
                    url : ajaxurl,
                    type : 'post',
                    data : {
                        action : 'ic_import_dbutility_',
                        utility : curr_util,
                        utilitylist: utils,
                        paged: page,
                    },
                    success : function( response ) {
                        var obj = jQuery.parseJSON(response);
                        
                        console.log(obj.data);
                        var student = '';
                        jQuery.each(obj.data, function (key, value) {  
                            student += '<tr>'; 
                            student += '<td>' +  
                                value.zipcode + '</td>'; 
  
                            student += '<td>' +  
                                value.city + '</td>'; 
  
                            student += '<td>' +  
                                value.municipal + '</td>'; 
  
                            student += '<td>' +  
                                value.county + '</td>';
                        
                            student += '<td>' +  
                                value.state + '</td>';
                        
                            student += '<td>' +  
                                value.post_title + '</td>';
                            
                            student += '<td>' +  
                                value.brand + '</td>';
                            
                            student += '<td>' +  
                                value.sub_territory + '</td>';
  
                            student += '</tr>'; 
                        }); 
                        jQuery('.plan_import_table tbody').append(student); 
//                        $('.plan_import_table').append(response);
                        if(page < max_page){
                            jQuery('input[name="cur_page"]').val(page+1);                            
                            AjAXcall();
                        }else{
                            jQuery(".spinner").removeClass("is-active");
                            jQuery('.utilstatus').text('import process finished');
                            clearAll_utility(false);
                            return false;
                        }
                        
                    }
                });
            }
        </script>
        <?php
        $utilityCsv = get_option('ic_utility_csv');
        $utilityCsvMap = get_option('ic_utility_map');
        
        global $wpdb;
        $table_name = $wpdb->prefix . 'import_routine';
        
        $results = $wpdb->get_col( "SELECT DISTINCT post_title FROM `$table_name`" );
        
        if(empty($results)){
            exit;
        }
//        unset($results[0]);
//        unset($results[1]);
        $utils = implode(',',$results);
        ?>
        <br/><br/>
        <div class="data-import">
            <style>
            table.plan_import_table,
            table.plan_import_table th,
            table.plan_import_table td {
              border: 1px solid black;
              border-collapse: collapse;
            }
            </style>
            <table class="plan_import_table">
                <tr>
                    <td colspan="3" class="status"><span class="spinner" style="float: left;"></span><p>Data Import is in Progress</p></td>
                    <td colspan="3" class="utilstatus">importing <?= $results[0] ?></td>
                    <td colspan="3" class="">
                        <script>
                            jQuery( document ).ready(function($) {
                                AjAXcall();
                            });
                        </script>
                        <!--<button type="button" onclick="AjAXcall()" >Next call</button>-->
                    </td>
                </tr>
                <tr>
                    <!--<td>ID</td>-->
                    <?php
                    foreach($utilityCsvMap as $key => $val){
                        echo '<td>'.$key.'</td>';
                    }
                    ?>
                </tr>
                
            </table>
            <input type="hidden" name="cur_page" value="0"/>
            <input type="hidden" name="curr_util" value="<?= $results[0] ?>" />
            <input type="hidden" name="utils" value="<?= $utils ?>" />
            <input type="hidden" name="max_page" value="<?= count($results) ?>" />
        </div>
        <?php
    }
    
    public function ic_import_dbutility_() {
        ini_set('max_execution_time', 0); 
        set_time_limit(0);
        $page = $_POST['paged'];
        
        global $wpdb;
        $table_name = $wpdb->prefix . 'import_routine';
        $table_name_post_data = $wpdb->prefix . 'utility_post_data';
        
        $results = $wpdb->get_col( "SELECT DISTINCT post_title FROM `$table_name`" );
//        unset($results[0]);
//        unset($results[1]);
        if(!isset($results[$page])){
            $return['fail'] = 'no data available';
            echo json_encode($return);
            die();
        }
        $post_title = $results[$page];
        $entries = $wpdb->get_results( $wpdb->prepare("SELECT DISTINCT zipcode, city, municipal, county, state, post_title, brand, sub_territory FROM $table_name WHERE post_title = '%s'", $results[$page]), ARRAY_A );
                                                      //SELECT DISTINCT * FROM `wp_import_routine` WHERE post_title = 'FE:CEI'

        $post_id = post_exists( $results[$page],'','','');
        $postStatus = get_post_status($post_id);

        if(!$post_id){
            $post_data = array(
                'post_title' => $results[$page],
                'post_type' => 'utilities',
                'post_status' => 'publish',
            );
            $post_id = wp_insert_post($post_data,true);                        
        }
        $zip_array = array();
        if(is_array($entries) && !empty($entries)) {
            foreach($entries as $ekey => $eval) {
                
                $results = $wpdb->get_col( "SELECT zipcode FROM `$table_name_post_data` WHERE zipcode='".$eval['zipcode']."' AND city='".$eval['city']."' AND post_title='$post_title'" );
                if(empty($results)) {
                    //echo $results[$page]; exit;
                    $data = array(
                                   'post_title'    => $post_title,
                                   'post_id'       => $post_id,
                                   'zipcode'       => $eval['zipcode'],
                                   'city'          => $eval['city'],
                                   'municipal'     => $eval['municipal'],
                                   'county'        => $eval['county'],
                                   'state'         => $eval['state'],
                                   'brand'         => $eval['brand'],
                                   'sub_territory' => $eval['sub_territory'],
                                );

                    $wpdb->insert($table_name_post_data, $data);
                    
                }
            }            
        }
        
//        $field_key = 'zipcodes';
//        $update_value = $entries;
//        update_field( $field_key, $update_value, $post_id );
        
        $return['data'] = $entries;
        echo json_encode($return);
        die();
    }
    
    public function CSV_import() {
        $utilityCsv = get_option('ic_utility_csv');
        $utilityCsvMap = get_option('ic_utility_map');

        $colcount = count($utilityCsvMap);
        $utilityCsvMapFlipped = array_flip($utilityCsvMap);


//        $this->print_pre($utilityCsvMap);

//        $this->print_pre($utilityCsvMapFlipped);

        echo '<hr/>';
        ?>
        <h2>Import CSV Data</h2>
        <button type="button" onclick="clearAll_utility()">Remove CSV</button>
        &nbsp;&nbsp;<a href="<?= $utilityCsv ?>"> View Uploaded CSV</a>
        <br/><br/>
        <div class="data-import">
            <style>
            table.plan_import_table,
            table.plan_import_table th,
            table.plan_import_table td {
              border: 1px solid black;
              border-collapse: collapse;
            }
            </style>
            <table class="plan_import_table">
                <tr>
                    <td colspan="<?= $colcount+1 ?>" class="status"><span class="spinner" style="float: left;"></span><p>Data Import is in Progress</p></td>
                </tr>
                <tr>
                    <td>ID</td>
                    <?php
                    foreach($utilityCsvMap as $key => $val){
                        echo '<td>'.$key.'</td>';
                    }
                    ?>
                </tr>

            </table>
            <div class="result"></div>
            <script>
                jQuery( document ).ready(function($) {
                    $(".spinner").addClass("is-active");

                    jQuery.ajax({
                        url : ajaxurl,
                        type : 'post',
                        data : {
                            action : 'ic_import_utility_csv_routine',
                        },
                        success : function( response ) {
                            console.log(response);
                            $('.plan_import_table').append(response);
                            $(".spinner").removeClass("is-active");
                        }
                    });

                });
            </script>
        </div>
        <?php
    }

    public function ic_import_utility_csv_routine() {

        set_time_limit(0);

        $utilityCsv = get_option('ic_utility_csv');
        $utilityCsvMap = get_option('ic_utility_map');


        if(isset($utilityCsvMap['delete_old']) && ($utilityCsvMap['delete_old'] == 'delete')){ $delResult = $this->delete_utilities_posts('utilities'); }

        unset($utilityCsvMap['delete_old']);

        $colcount = count($utilityCsvMap);
        $utilityCsvMapFlipped = array_flip($utilityCsvMap);

       if (($handle = fopen($utilityCsv, "r")) !== FALSE) {

            $row = 0;
            $columnsNames = array();
            while (($csv_data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                echo '<tr>';

                $returnArr = array();

                if ($row == 0) {
                    $columnsNames = $csv_data;
                }else{
                    $csv_data = array_combine($columnsNames, $csv_data);
                    // Create new post.

    //                            $this->print_pre($csv_data);

                    //check if utility title existis
                    $title  = $csv_data[$utilityCsvMapFlipped['post_title']];

                    $post_id = post_exists( $title,'','','');
                    $postStatus = get_post_status($post_id);

                    if(!$post_id){
                        $post_data = array(
                            'post_title' => $title,
                            'post_type' => 'utilities',
                            'post_status' => 'publish',
                        );
                        $post_id = wp_insert_post($post_data,true);
                    }

                    echo "<td>$post_id</td>";
                    $acfValueArr = array();
                    foreach($csv_data as $key => $val){
                        //Plan Block

                        if($key != $utilityCsvMapFlipped['post_title']){
                            $acfFieldKey = str_replace('zipcodes_-_','',$utilityCsvMap[$key]);
                            $acfValueArr[$acfFieldKey] = $val;
                        }
                       echo "<td>$val</td>";
                        /*// Save a repeater field value.
                        $field_key = "field_12345678";
                        $value = array(
                            array(
                                "sub_field_1"   => "Foo",
                                "sub_field_2"   => "Bar"
                            )
                        );
                        update_field( $field_key, $value, $post_id );*/

    //                               echo '<td>'.$val.'</td>';
                      //echo wp_json_encode($returnArr);
                    }
                    $field_key = 'zipcodes';
                    $update_value = $acfValueArr;

                    $if_rec_exists = $this->check_if_record_exists($title, $acfValueArr);
    //                            $this->print_pre($update_value);

                    if($if_rec_exists == 'no'){
                        $success = add_row( $field_key, $update_value, $post_id );
                    }


    //                            $tempArr = array($post_id,$title,$field_key,$update_value, $success);
    //                            $this->print_pre($tempArr);
                }
    //                        $this->print_pre($csv_data);

                $row++;
                echo "</tr>";
            }

            fclose($handle);
        }

        echo '<tr><td colspan="9"><a href="#" onclick="clearAll_utility()"> Finished Importing Data!</a></td></tr>';
        delete_option( 'ic_utility_csv' );
        delete_option( 'ic_utility_map' );
    }
    
    public function check_if_record_exists($title, $arr){
        //echo "<PRE>";print_r($arr);exit;
            // args
            $args = array(
                'numberposts'	=> -1,
                'post_type'		=> 'utilities',
                'name'  =>  $title,
                'meta_query'	=> array(
                    'relation'		=> 'AND',
                    array(
                        'key'		=> 'zipcodes_$_zipcode',
                        'value'		=> $arr['zipcode'],
                        'compare'	=> '='
                    ),
                    array(
                        'key'		=> 'zipcodes_$_city',
                        'value'		=> $arr['city'],
                        'compare'	=> '='
                    ),
                    array(
                        'key'		=> 'zipcodes_$_state',
                        'value'		=> $arr['state'],
                        'compare'	=> '='
                    ),
                    array(
                        'key'		=> 'zipcodes_$_brand',
                        'value'		=> $arr['brand'],
                        'compare'	=> '='
                    )

                )
            );

            //echo "<PRE>";print_r($args);exit;
            // query
            $the_query = new WP_Query( $args );
            $res = "";
            //echo "Last Query SQL-Query: {$the_query->request}";exit;
            if( $the_query->have_posts() ):
                $res = 'yes';
            else:
                $res = 'no';
            endif;

            wp_reset_query();	 // Restore global post data stomped by the_post().
            return $res;
    }
    
    function utitlity_exists($title = null) {
        if(empty($title)){
            return 0;
        }


    }

    public function utility_handle_file_upload() {
        if (!empty($_FILES["ic_utility_csv"]["tmp_name"])) {

            require_once( ABSPATH . 'wp-admin/includes/file.php' );
            $urls = wp_handle_upload($_FILES["ic_utility_csv"], array('test_form' => false));
            //print_r($urls);
            $temp = $urls['url'];

            $_POST['ic_utility_csv'] = $temp;
            return $_POST;
        }
    }

    public function utility_map_csv() {
        if($_POST['option_page'] == 'ic_utilitiy_map_options_group'){
//        $this->print_pre($_POST);
//        die();
            return $_POST;
        }
    }

    public function utility_clear_all_settings() {
        delete_option( 'ic_utility_csv' );
        delete_option( 'ic_utility_map' );

        die('true');
    }

    public function add_setting_scripts(){
        ?>
        <script>
            jQuery( document ).ready(function($) {
            });
            function clearAll_utility(isRedirect = true){
                    jQuery.ajax({
                        url : ajaxurl,
                        type : 'post',
                        data : {
                            action : 'utility_clear_all_settings',
                        },
                        success : function( response ) {
                            if(isRedirect){
                                location.reload(true);                                
                            }
                        }
                    });
                }
        </script>
        <?php
    }

    function delete_utilities_posts($post_type = 'utilities'){
        global $wpdb;
        $result = $wpdb->query(
            $wpdb->prepare("
                DELETE posts,pt,pm
                FROM wp_posts posts
                LEFT JOIN ".$wpdb->prefix."term_relationships pt ON pt.object_id = posts.ID
                LEFT JOIN ".$wpdb->prefix."postmeta pm ON pm.post_id = posts.ID
                WHERE posts.post_type = %s
                ",
                $post_type
            )
        );

        if($result){ return $result; }
        else{ return $wpdb->last_error; }

    }

    function utility_acf_field($cpt = 'utilities') {

        // need to create cache or transient for this data?

        $result = array();
        $acf_field_groups = acf_get_field_groups();
        foreach ($acf_field_groups as $acf_field_group) {
            foreach ($acf_field_group['location'] as $group_locations) {
                foreach ($group_locations as $rule) {
                    if ($rule['param'] == 'post_type' && $rule['operator'] == '==' && $rule['value'] == $cpt) {

                        $result = acf_get_fields($acf_field_group);
                    }
                }
            }
        }
        $result[] = array('name' => 'post_title', 'label' => 'Utility'); //add title field in the mapping
        return $result;
    }

    function print_pre($arr = array()) {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }

}

new import_csv_utilities();

/*
 *
 *
 Post values stored like this
Array
(
    [planscpt_rate_type] =>
    [planscpt_regular_price] => 0.399
    [planscpt_price] => 0.299
    [planscpt_discount] => 30% off first month rate
    [planscpt_unit] => per CCF
    [planscpt_t&c_link] => Array
        (
            [title] => Terms & Conditions
            [url] => http://terms
            [target] =>
        )

    [planscpt_benefit_1] => Pay only for What you use
    [planscpt_benefits_2] => Rate changes monthly
    [planscpt_benefits_3] => No Cancellation fees
    [planscpt_benefits_4] => This Plan Plants Trees
    [planscpt_benefits_5] => 100% Carbon Offset
)

    public function import_csv_routine() {

        $plan_dataMap = get_option("plan_dataMap");

        $csv_file = get_option("import_csv_plan");
        if (empty($csv_file) || empty($plan_dataMap)) {
            echo 'failure';
            die();
        }

        $plan_dataMapFlipped = array_flip($plan_dataMap);
//        $this->print_pre($plan_dataMap);


        if (($handle = fopen($csv_file, "r")) !== FALSE) {
            $row = 0;
            $columnsNames = array();
            while (($csv_data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($row == 0) {
                    $columnsNames = $csv_data;
                }else{
                $csv_data = array_combine($columnsNames, $csv_data);
//                $this->print_pre($csv_data);

                // Create new post.
                $post_data = array(
                    'post_title' => $csv_data[$plan_dataMapFlipped['post_title']],
                    'post_type' => 'plans',
                    'post_status' => 'publish',
                );

//                print_r($post_data);

                $post_id = wp_insert_post($post_data,true);
                print_r($post_id);
                foreach($csv_data as $key => $val){
                    //Plan Block
                    $fielId = $plan_dataMap[$key];
                    $fieldVal = $val;

                    "$fielId: $fieldVal <br/>";

                    if($fielId == 'planscpt_t&c_link'){
                        $fieldVal = array(
                            'title' => 'Terms & Conditoins',
                            'url' => "$fieldVal",
                            'target' => "_blank",
                            );
                    }
                   update_field( $fielId, $fieldVal, $post_id );
                }
                // Save a basic text value.
//                            $field_key = "field_123456";
//                            $value = "some new string";
//

                // Save a checkbox or select value.
//                            $field_key = "field_1234567";
//                            $value = array("red", "blue", "yellow");
//                            update_field( $field_key, $value, $post_id );
                }
                echo '<br/><br/>';
                $row++;
            }


            // break;
            fclose($handle);
        }
        ?>

        <?php
//        delete_option( 'import_csv_plan' );
//        delete_option( 'plan_dataMap' );
    } */
