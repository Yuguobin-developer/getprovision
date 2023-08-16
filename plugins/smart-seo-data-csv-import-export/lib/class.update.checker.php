<?php

if (!class_exists('FL_SEO_Updater')) {

    class FL_SEO_Updater extends FL_SEO_CSV_Import_Helper{

        /**

         * The plugin current version

         * @var string

         */

        public $current_version;



        /**

         * The plugin remote update path

         * @var string

         */

        public $update_path;



        /**

         * Plugin Slug (plugin_directory/plugin_file.php)

         * @var string

         */

        public $plugin_slug;



        /**

         * Plugin name (plugin_file)

         * @var string

         */

        public $slug;

        public $license_info;


        /**

         * Initialize a new instance of the WordPress Auto-Update class

         * @param string $current_version

         * @param string $update_path

         * @param string $plugin_slug

         */

        function __construct($current_version, $update_path, $plugin_slug)

        {

            // Set the class public variables

            $this->current_version = $current_version;

            $this->update_path = $update_path;

            $this->plugin_slug = $plugin_slug;

            list ($t1, $t2) = explode('/', $plugin_slug);

            $this->slug = str_replace('.php', '', $t2);

            // define the alternative API for updating checking
            add_filter('pre_set_site_transient_update_plugins', array(&$this, 'check_update'));

            // Define the alternative response for information checking

            add_filter('plugins_api', array(&$this, 'check_info'), 10, 3);

            // add_filter('plugins_api', array(&$this, 'check_license'), 10, 3);

            add_action( 'after_plugin_row_' . FL_SEO_PLUGIN_FILE, array( &$this, 'add_plugin_row' ) );
        }

        public function add_plugin_row() {

            add_action( 'in_plugin_update_message-' . FL_SEO_PLUGIN_FILE, array( &$this, 'update_message' ), 10, 2 );

            $this->license_info = $this->getRemote_license();
            if( $this->license_info ){
                $validity = json_decode( $this->license_info );
                if( $validity->Code != 200 ){
                    echo sprintf( '<tr class="plugin-update-tr">
                            <td colspan="3" class="plugin-update">
                                <div class="update-message notice inline notice-warning notice-alt">
                                    <p><a href="%s">Manage Licenses</a> A valid License Key is required to qualify for automatic plugin updates. Need a license key? <a href="%s" target="_blank">Purchase one now.</a></p>
                                </div>
                            </td>
                        </tr>', site_url() . '/wp-admin/options-general.php?page=fl-seo-data-csv&tab=license', 'http://labs.freddielore.com/smart-seo-data-csv-import-export/' );
                }
            }

        }

        /**
         * Get update information back from the server, display to the user on the plugins page.
         */
        public function update_message( $plugin_data, $r ) {
            // echo sprintf( " <br><strong>Notice</strong>: A valid license key could not be found. Please make sure you've copied it correctly from your order receipt to your settings page. Don't have a license key? <a href='%s' target='_blank'>Click here</a> to purchase.", 'http://labs.freddielore.com/smart-seo-data-csv-import-export/' );
        }

        /**

         * Add our self-hosted autoupdate plugin to the filter transient

         *

         * @param $transient

         * @return object $ transient

         */

        public function check_update($transient)

        {

            if (empty($transient->checked)) {

                return $transient;

            }

            $this->license_info = $this->getRemote_license();
            if( $this->license_info ){
                $validity = json_decode( $this->license_info );
                if( $validity->Code != 200 ){
                    unset( $transient->response[$this->plugin_slug] );
                    return $transient;
                }
            }
            
            // Get the remote version
            $remote_version = $this->getRemote_version();

            // If a newer version is available, add the update
            if (version_compare($this->current_version, $remote_version, '<')) {

                $obj = new stdClass();

                $obj->slug = $this->slug;

                $obj->new_version = $remote_version;

                $obj->url = $this->update_path;

                $obj->package = $this->update_path;

                $transient->response[$this->plugin_slug] = $obj;

            }

            //var_dump($transient);

            return $transient;

        }

        /**

         * Add our self-hosted description to the filter

         *

         * @param boolean $false

         * @param array $action

         * @param object $arg

         * @return bool|object

         */

        public function check_info($false, $action, $arg)

        {

            if ($arg->slug === $this->slug) {

                $information = $this->getRemote_information();

                return $information;

            }

            return false;

        }

        public function check_license()

        {

            if ($arg->slug === $this->slug) {

                $information = $this->getRemote_license();

                return $information;

            }

            return false;

        }



        /**

         * Return the remote version

         * @return string $remote_version

         */

        public function getRemote_version()

        {

            $request = wp_remote_post($this->update_path, array('body' => array('action' => 'version')));

            if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {

                return $request['body'];

            }

            return false;

        }



        /**

         * Get information about the remote version

         * @return bool|object

         */

        public function getRemote_information()

        {

            $request = wp_remote_post($this->update_path, array('body' => array('action' => 'info')));

            if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {

                return unserialize($request['body']);

            }

            return false;

        }



        /**

         * Return the status of the plugin licensing

         * @return boolean $remote_license

         */

        public function getRemote_license()

        {

            $args = array( 
                            'do' => 'check_license',
                            'key' => get_option('smart_csv_license_key'),
                            'website' => $this->get_domain_name( site_url() ) );

            $request = wp_remote_get(FL_SEO_LICENSE_MANAGER, array('body' => $args ));

            if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {

                return $request['body'];

            }

            return false;

        }

    }
}

?>