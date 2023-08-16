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
class import_csv_plans {

    public function __construct() {

        add_action('admin_menu', array($this, 'admin_menu'));
        add_action('admin_init', array($this, 'register_icplans_setting'));
        add_action("wp_ajax_plan_clear_all_settings", array($this,'plan_clear_all_settings'));
        add_action("wp_ajax_aj_import_csv_routine", array($this,'aj_import_csv_routine'));
        
//        add_action("wp_ajax_nopriv_my_user_vote", "my_must_login");
    }

    public function admin_menu() {
        add_menu_page(
                __('Import Plans CSV', 'importcsvplans'), __('Import Plans CSV', 'importcsvplans'), 'manage_options', 'import-plans-csv', array($this, 'view')
        );
    }

    /*
     * Useful link to add ACF data in posts
     * https://www.advancedcustomfields.com/resources/update_field/
     */
    public function view() {
        
        $csv = get_option("import_csv_plan");
        $plan_dataMap = get_option("plan_dataMap");
        ?><div class="rb_options_main wrap">

            <h2>Upload Your CSV</h2>
            <div class="wrap">
                
                <?php 
                if (empty($csv)) {
                   ?>
                <form method="post" action="options.php" enctype='multipart/form-data'>
                    <?php
                    settings_fields('rb_options_group');
                    $view_options = get_option('rb_display_view');
                    ?>
                    <table class="form-table" role="presentation">
                        <tbody>
                            <tr>
                                <th scope="row">Upload Plans CSV</th>
                                <td align="left">
                                    <label><input type="file" name="import_plan_csv" value="" class="regular-text code" required=""></label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p> <?php submit_button('Upload CSV'); ?></p>
                </form>
                <?php
                }
                if (!empty($csv) && empty($plan_dataMap)) {
                    
                    echo '<a class="button" href="'.$csv.'"> View Uploaded CSV</a>';
                    echo '&nbsp;&nbsp;<a href="#" class="button" onclick="clearAll()"> Remove CSV and Upload again</a>';
                                        
                    $this->map_csv_data_fields();
                }

                
                if (!empty($csv) && !empty($plan_dataMap)) {
//                    $this->import_csv_routine();
                    $colcount = count($plan_dataMap);
                    
                        //$this->aj_import_csv_routine();
                    ?>
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
                            foreach($plan_dataMap as $key => $val){
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
                                    action : 'aj_import_csv_routine',
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
                ?>
            </div>	
        </div>

        <?php
    }

    public function register_icplans_setting() {
        register_setting('rb_options_group', 'rb_display_view', $this->handle_file_upload()); //Field Register
        register_setting('rb_data_maping', 'rb_data_maping', $this->update_data_maping_setting()); //Field Register
        
        add_action('admin_footer', array($this,'add_setting_scripts'));
    }

    public function handle_file_upload() {
        if (!empty($_FILES["import_plan_csv"]["tmp_name"])) {

            require_once( ABSPATH . 'wp-admin/includes/file.php' );
            $urls = wp_handle_upload($_FILES["import_plan_csv"], array('test_form' => false));
            //print_r($urls);
            $temp = $urls['url'];
            update_option("import_csv_plan", $temp);
            return $temp;
        }
    }

    public function update_data_maping_setting() {
        if (isset($_POST['option_page']) && $_POST['option_page'] == 'rb_data_maping') {
            update_option('plan_dataMap', $_POST['datamap'], false);
        }
    }

    function map_csv_data_fields() {
        $csv_file = get_option("import_csv_plan");
        if (empty($csv_file)) {
            return;
        }
        $num = 0;
        $row = 0;
        $row_val = array();
        ?>
        <form method="post" action="options.php">
            <?php settings_fields('rb_data_maping'); ?>
            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th>Column Name</th>
                        <th>Post Field</th>
                    </tr>
                    <?php
                    $meta_values_dropdown = $this->get_acf_field_groups_by_cpt('plans');

                    if (($handle = fopen($csv_file, "r")) !== FALSE) {
                        while (($csv_data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                            foreach ($csv_data as $data => $labels) {
                                ?>
                                <tr>
                                    <th><?= $labels ?></th>
                                    <td><select name="datamap[<?php echo $labels ?>]">
                                            <option value="">--</option>
                                            <?php foreach ($meta_values_dropdown as $key => $value) { ?>
                                                <option value="<?php echo $value['name']; ?>" <?php selected($labels,$value['label']); ?>><?php echo $value['label']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <?php
                            }

                            if ($row == 0) {
                                break;
                            }
                        }

                }
                        // break;
                        fclose($handle);
                  
                    ?>
                </tbody>
            </table>
            <p>
                <input type="radio" id="delete_old" name="datamap[delete_old]" value="delete" checked>
                <label for="delete_old">Delete existing data & re-import everything</label><br>
                <input type="radio" id="insert_new" name="datamap[delete_old]" value="insert">
                <label for="insert_new">Just insert new plans</label><br>
<!--                <input type="radio" id="insert_update" name="datamap[delete_old]" value="update">
                <label for="insert_update">Update existing plans and their data partially or fully</label><br>-->
            </p>
            <p> 
                
                <?php $other_attributes = array( 'class' => 'import-sbmt-click' );
                         submit_button( _('Import Plan') ,$other_attributes); ?></p>
        </form>

        <?php
    }
    
    public function aj_import_csv_routine() {
        
        $plan_dataMap = get_option("plan_dataMap");
        $csv_file = get_option("import_csv_plan");
        
        
        if (empty($csv_file) || empty($plan_dataMap)) {
            echo wp_json_encode(array('status'=>'failure'));
            die();
        }
        
        if(isset($plan_dataMap['delete_old']) && ($plan_dataMap['delete_old'] == 'delete') ) { $dbStatus = $this->delete_plans_posts(); }
        unset($plan_dataMap['delete_old']);
        
        $plan_dataMapFlipped = array_flip($plan_dataMap);
        
        if (($handle = fopen($csv_file, "r")) !== FALSE) {
            $row = 0;
            $columnsNames = array();
            while (($csv_data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $returnArr = array();
                
                if ($row == 0) {
                    $columnsNames = $csv_data;
                }else{
                    $csv_data = array_combine($columnsNames, $csv_data);
                    // Create new post.
                    $post_data = array(
                        'post_title' => $csv_data[$plan_dataMapFlipped['post_title']],
                        'post_type' => 'plans',
                        'post_status' => 'publish',
                    );
                    $post_id = wp_insert_post($post_data,true);
                    if(!empty($post_id))
                    {
                    //$returnArr['status'] = '1';
                    echo '<tr><td>'.$post_id.'</td>';
                    foreach($csv_data as $key => $val){
                        //Plan Block
                        $fielId = $plan_dataMap[$key];
                        $fieldVal = $val;
                        
                        $fielObj = acf_get_field($fielId);
                        if($fielObj['type'] == 'true_false'){
                            $fieldVal = (strtolower($fieldVal) == 'yes') ? 1 : 0;
                        }

                        /*if($fielId == 'planscpt_t&c_link'){
                            $fieldVal = array(
                                'title' => 'Terms & Conditoins',
                                'url' => "$fieldVal",
                                'target' => "_blank",
                                );
                        }*/
                        update_field( $fielId, $fieldVal, $post_id );

                       //$returnArr[$key] = $val;

                       echo '<td>'.$val.'</td>';  
                      //echo wp_json_encode($returnArr);
                    }
                    echo '</tr>';
                
                }

                }
                
                $row++;
            }

            fclose($handle);
        }
        
        //echo wp_json_encode(array('status'=>'finish'));
        echo '<tr><td colspan="3"><a href="#" onclick="clearAll()"> Finished Importing Data!</a></td></tr>';
       // die();
         delete_option("plan_dataMap");
         delete_option("import_csv_plan");
         die();
    }


    /**
     * Returns an array of field groups with fields for the passed CPT, where field group ACF location rule of "post_type == CPT" exists.
     *  - each field group points at an array of its fields, in turn pointed at an array of that field's detailed information:
     *    - array of info for each field [ ID, key, label, name, type, menu_order, instructions, required, id, class, conditional_logic[array()], etc. ]
     *  
     * @since    1.0.0      
     */
    function get_acf_field_groups_by_cpt($cpt) {
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
        $result[] = array('name' => 'post_title', 'label' => 'Plan Name'); //add title field in the mapping
        return $result;
    }
    
    function delete_plans_posts($post_type = 'plans'){
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
        
        if($result)            return $result;
        else            return $wpdb->last_error;;
//        return $result!==false;
    }
    
    public function plan_clear_all_settings() {
        delete_option( 'import_csv_plan' );
        delete_option( 'plan_dataMap' );
        
        die('true');
    }
    
    
    public function add_setting_scripts(){
        ?>
        <script>
            jQuery( document ).ready(function($) {                
            });
            function clearAll(){
                    jQuery.ajax({
                        url : ajaxurl,
                        type : 'post',
                        data : {
                            action : 'plan_clear_all_settings',
                        },
                        success : function( response ) {
                            location.reload(true);
                        }
                    });
                }
        </script>
        <?php
    }

    function print_pre($arr = array()) {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }

}

new import_csv_plans();
