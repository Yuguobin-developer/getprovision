<?php
/**
 * Core: Plugin Bootstrap
 *
 * @package     AffiliateWP Zapier
 * @subpackage  Core
 * @copyright   Copyright (c) 2021, Sandhills Development, LLC
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.3
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'AffiliateWP_Zapier' ) ) {

	final class AffiliateWP_Zapier {

		/**
		 * Holds the instance
		 *
		 * Ensures that only one instance of AffiliateWP_Zapier exists in memory at any one
		 * time and it also prevents needing to define globals all over the place.
		 *
		 * TL;DR This is a static property property that holds the singleton instance.
		 *
		 * @var object
		 * @static
		 * @since 1.0
		 */
		private static $instance;

		/**
		 * The version number of AffiliateWP - Zapier
		 *
		 * @since 1.0
		 */
		private $version = '1.4';

		/**
		 * Plugin loader file.
		 *
		 * @since 1.3
		 * @var   string
		 */
		private $file = '';

		/**
		 * The logs instance variable.
		 *
		 * @var   Affiliate_WP_Zapier_Logs_DB
		 * @since 1.0
		 */
		public $logs;

		/**
		 * Debug variable.
		 *
		 * @var boolean True if debug is active.
		 */
		public $debug;

		/**
		 * An array of error messages.
		 *
		 * @access public
		 * @since  1.0
		 * @var    array
		 */
		public $errors;

		/**
		 * Error-logging class object
		 *
		 * @access public
		 * @since  1.0
		 * @var    Affiliate_WP_Logging
		 */
		public $error;

		/**
		 * Sets up the main plugin instance.
		 *
		 * @since  1.0
		 *
		 * @param string $file Path to the main plugin file.
		 * @return \AffiliateWP_Zapier The one true bootstrap instance.
		 */
		public static function instance( $file = '' ) {

			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof AffiliateWP_Zapier ) ) {

				self::$instance = new AffiliateWP_Zapier;
				self::$instance->file = $file;

				self::$instance->setup_constants();
				self::$instance->load_textdomain();
				self::$instance->includes();
				self::$instance->init();
				self::$instance->hooks();

			}

			return self::$instance;
		}

		/**
		 * Throw error on object clone
		 *
		 * The whole idea of the singleton design pattern is that there is a single
		 * object therefore, we don't want the object to be cloned.
		 *
		 * @since 1.0
		 * @access protected
		 * @return void
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'affiliatewp-zapier' ), '1.0' );
		}

		/**
		 * Disable unserializing of the class
		 *
		 * @since 1.0
		 * @access protected
		 * @return void
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'affiliatewp-zapier' ), '1.0' );
		}

		/**
		 * Constructor Function
		 *
		 * @since 1.0
		 * @access private
		 */
		private function __construct() {
			self::$instance = $this;

			$this->errors = $this->errors();
			$this->debug = (bool) affiliate_wp()->settings->get( 'debug_mode', false );


			if( $this->debug ) {
				$this->error = new Affiliate_WP_Logging;
			}
		}

		/**
		 * Reset the instance of the class
		 *
		 * @since 1.0
		 * @access public
		 * @static
		 */
		public static function reset() {
			self::$instance = null;
		}

		/**
		 * Setup plugin constants
		 *
		 * @access private
		 * @since 1.0
		 * @return void
		 */
		private function setup_constants() {
			// Plugin version
			if ( ! defined( 'AFFWP_ZAPIER_VERSION' ) ) {
				define( 'AFFWP_ZAPIER_VERSION', $this->version );
			}

			// Plugin Folder Path
			if ( ! defined( 'AFFWP_ZAPIER_PLUGIN_DIR' ) ) {
				define( 'AFFWP_ZAPIER_PLUGIN_DIR', plugin_dir_path( $this->file ) );
			}

			// Plugin Folder URL
			if ( ! defined( 'AFFWP_ZAPIER_PLUGIN_URL' ) ) {
				define( 'AFFWP_ZAPIER_PLUGIN_URL', plugin_dir_url( $this->file ) );
			}

			// Plugin Root File
			if ( ! defined( 'AFFWP_ZAPIER_PLUGIN_FILE' ) ) {
				define( 'AFFWP_ZAPIER_PLUGIN_FILE', $this->file );
			}
		}

		/**
		 * Loads the plugin language files
		 *
		 * @access public
		 * @since 1.0
		 * @return void
		 */
		public function load_textdomain() {

			// Set filter for plugin's languages directory
			$lang_dir = dirname( plugin_basename( $this->file ) ) . '/languages/';
			$lang_dir = apply_filters( 'affiliatewp_zapier_languages_directory', $lang_dir );

			// Traditional WordPress plugin locale filter
			$locale   = apply_filters( 'plugin_locale',  get_locale(), 'affiliatewp-zapier' );
			$mofile   = sprintf( '%1$s-%2$s.mo', 'affiliatewp-zapier', $locale );

			// Setup paths to current locale file
			$mofile_local  = $lang_dir . $mofile;
			$mofile_global = WP_LANG_DIR . '/affiliatewp-zapier/' . $mofile;

			if ( file_exists( $mofile_global ) ) {
				// Look in global /wp-content/languages/affiliatewp-zapier/ folder
				load_textdomain( 'affiliatewp-zapier', $mofile_global );
			} elseif ( file_exists( $mofile_local ) ) {
				// Look in local /wp-content/plugins/affiliatewp-zapier/languages/ folder
				load_textdomain( 'affiliatewp-zapier', $mofile_local );
			} else {
				// Load the default language files
				load_plugin_textdomain( 'affiliatewp-zapier', false, $lang_dir );
			}
		}

		/**
		 * Include necessary files
		 *
		 * @access      private
		 * @since       1.0
		 * @return      void
		 */
		private function includes() {

			if ( is_admin() ) {
				require_once AFFWP_ZAPIER_PLUGIN_DIR . 'includes/class-admin.php';
				require_once AFFWP_ZAPIER_PLUGIN_DIR . 'includes/class-upgrades.php';
			}

			require_once AFFWP_ZAPIER_PLUGIN_DIR . '/includes/class-affwp-zapier-db.php';
			require_once AFFWP_ZAPIER_PLUGIN_DIR . '/includes/class-affwp-zapier-logs-db.php';
			require_once AFFWP_ZAPIER_PLUGIN_DIR . '/includes/zapier-log-functions.php';
			require_once AFFWP_ZAPIER_PLUGIN_DIR . '/includes/class-affwp-zapier-endpoints.php';
		}

		/**
		 * Checks for updates to the add-on on plugin initialization.
		 *
		 * @access private
		 * @since  1.0.1
		 *
		 * @see \AffWP_AddOn_Updater
		 */
		private function init() {

			if ( is_admin() && class_exists( 'AffWP_AddOn_Updater' ) ) {
				$updater = new AffWP_AddOn_Updater( 142032, $this->file, $this->version );
			}

			$this->logs = new Affiliate_WP_Zapier_Logs_DB;
		}

		/**
		 * Writes a log message.
		 *
		 * @since   1.0
		 * @access  public
		 *
		 * @param string $message An optional message to log. Default is an empty string.
		 */
		public function error( $message = '' ) {

			if ( $this->debug ) {

				$this->error->log( $message );

			}
		}

		/**
		 * An array of error messages.
		 *
		 * Note: The user insertion failure error is not included in this method,
		 * as it is defined inline, to provide access to the $args array.
		 *
		 * @access  public
		 * @since   1.0
		 *
		 * @param array $error An array of error messages.
		 */
		public function errors() {

			if ( ! $this->debug ) {

				return false;

			}

			$errors = array(
				'created' => __( 'A Zapier log was inserted when this object was created.', 'affiliatewp-zapier' ),
				'updated' => __( 'A Zapier log was inserted when this object was created.', 'affiliatewp-zapier' ),
				'deleted' => __( 'A Zapier log was inserted when this object was created.', 'affiliatewp-zapier' )
			);

			return $errors;
		}

		/**
		 * Setup the default hooks and actions
		 *
		 * @since   1.0
		 * @access  private
		 *
		 * @return  void
		 */
		private function hooks() {

			add_action( 'affwp_zapier_log_deletion_event', array( $this, 'delete_logs' ) );

			add_action( 'rest_api_init', array( $this, 'register_routes' ) );

			// Add the affiliate name to the core affiliates endpoint.
			add_action( 'affwp_rest_affiliates_query_args', array( $this, 'affiliate_name' ) );
		}

		/**
		 * Add the affiliate name to the core affiliates endpoint.
		 *
		 * @since  1.0
		 *
		 * @return array $args Affiliate object query arguments.
		 */
		public function affiliate_name( $args ) {

			$affiliate_id = isset( $args['affiliate_id'] ) ? $args['affiliate_id'] : 0;

			$args['name'] = affwp_get_affiliate_name( $affiliate_id );

			return $args;
		}

		/**
		 * Determine if the user is on a version of AffiliateWP lower than 1.9.
		 *
		 * @since   1.0
		 * @access  public
		 *
		 * @return  boolean
		 */
		public function has_1_9() {

			$return = true;

			if ( version_compare( AFFILIATEWP_VERSION, '1.9', '<' ) ) {
				$return = false;
			}

			return $return;
		}

		/**
		 * Schedule an event to delete queried Zapier logs at a specified interval.
		 *
		 * @since  1.0
		 *
		 * @return void
		 */
		public function schedule_logs_event() {

			/**
			 * Specify a human-readable time interval on which Zapier logs should be deleted.
			 *
			 * @var    $interval  Deletion interval. Default is `daily`.
			 *
			 * @since  1.0
			 */
			$interval = apply_filters( 'affwp_zapier_log_deletion_interval', 'daily' );

		    if ( ! wp_next_scheduled ( 'affwp_zapier_log_deletion_event' ) ) {
				wp_schedule_event( time(), $interval, 'affwp_zapier_log_deletion_event' );
		    }
		}

		/**
		 * Clear scheduled Zapier log deletions on deactivation.
		 *
		 * @since  1.0
		 *
		 * @return void
		 */
		public function clear_scheduled_event() {
			wp_clear_scheduled_hook( 'affwp_zapier_log_deletion_event' );
		}


		/**
		 * Delete any queried Zapier log, on a daily recurring cron.
		 *
		 * @since  1.0
		 *
		 * @return void
		 */
		public function delete_logs() {

			$args = array(
				'queried' => true,
			);

			$logs = affiliatewp_zapier()->logs->get_logs(

				/**
				 * Log deletion query arguments.
				 *
				 * @var    array  $args  Query arguments.
				 *                       Default is `queried => true`.
				 *
				 * @since  1.0
				 */
				apply_filters ( 'affwp_zapier_log_deletion_args', $args )
			);

			foreach ( $logs as $log ) {

				$log_id = $log->log_id;

				affwp_zapier_delete_log( $log_id );
			}
		}

		/**
		 * Flushes rewrite rules on activation.
		 *
		 * @since  1.0
		 *
		 * @return void
		 */
		public function flush() {
			flush_rewrite_rules();
		}

		public function register_routes() {

			$routes = new AffWP\Zapier_Endpoints;
			$routes->register_routes();
		}

	}
}

/**
 * The main function responsible for returning the one true AffiliateWP_Zapier
 * Instance to functions everywhere.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $affiliatewp_zapier = affiliatewp_zapier(); ?>
 *
 * @since 1.0
 * @return AffiliateWP_Zapier The one true AffiliateWP_Zapier Instance
 */
function affiliatewp_zapier() {
	return AffiliateWP_Zapier::instance();
}
