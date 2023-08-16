<?php
/**
 * Plugin Name: AffiliateWP - Zapier - Automated Tasks
 * Plugin URI: https://affiliatewp.com/add-ons/pro/zapier-for-affiliatewp/
 * Description: Add Zapier triggers to AffiliateWP
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Version: 1.4
 * Text Domain: affiliatewp-zapier
 * Domain Path: languages
 *
 * AffiliateWP is distributed under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * AffiliateWP is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with AffiliateWP. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package AffiliateWP Zapier
 * @category Core
 * @version 1.4
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AffiliateWP_Requirements_Check_v1_1' ) ) {
	require_once dirname( __FILE__ ) . '/includes/lib/affwp/class-affiliatewp-requirements-check-v1-1.php';
}

/**
 * Class used to check requirements for and bootstrap the plugin.
 *
 * @since 1.3
 *
 * @see Affiliate_WP_Requirements_Check
 */
class AffiliateWP_Zapier_Requirements_Check extends AffiliateWP_Requirements_Check_v1_1 {

	/**
	 * Plugin slug.
	 *
	 * @since 1.3
	 * @var   string
	 */
	protected $slug = 'affiliatewp-zapier';

	/**
	 * Add-on requirements.
	 *
	 * @since 1.3
	 * @var   array[]
	 */
	protected $addon_requirements = array(
		// AffiliateWP.
		'affwp' => array(
			'minimum' => '2.6',
			'name'    => 'AffiliateWP',
			'exists'  => true,
			'current' => false,
			'checked' => false,
			'met'     => false
		),
	);

	/**
	 * Bootstrap everything.
	 *
	 * @since 1.3
	 */
	public function bootstrap() {
		if ( ! class_exists( 'Affiliate_WP' ) ) {

			if ( ! class_exists( 'AffiliateWP_Activation' ) ) {
				require_once 'includes/lib/affwp/class-affiliatewp-activation.php';
			}

			// AffiliateWP activation
			if ( ! class_exists( 'Affiliate_WP' ) ) {
				$activation = new AffiliateWP_Activation( plugin_dir_path( __FILE__ ), basename( __FILE__ ) );
				$activation = $activation->run();
			}
		} else {
			\AffiliateWP_Zapier::instance( __FILE__ );
		}
	}

	/**
	 * Loads the add-on.
	 *
	 * @since 1.3
	 */
	protected function load() {
		// Maybe include the bundled bootstrapper.
		if ( ! class_exists( 'AffiliateWP_Zapier' ) ) {
			require_once dirname( __FILE__ ) . '/includes/class-affiliatewp-zapier.php';
		}

		// Maybe hook-in the bootstrapper.
		if ( class_exists( 'AffiliateWP_Zapier' ) ) {

			$affwp_version = get_option( 'affwp_version' );

			if ( version_compare( $affwp_version, '2.7', '<' ) ) {
				add_action( 'plugins_loaded', array( $this, 'bootstrap' ), 100 );
			} else {
				add_action( 'affwp_plugins_loaded', array( $this, 'bootstrap' ), 100 );
			}

			// Register the activation hook.
			register_activation_hook( __FILE__, array( $this, 'install' ) );

			// Register the deactivation hook.
			register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
		}
	}

	/**
	 * Install, usually on an activation hook.
	 *
	 * @since 1.3
	 */
	public function install() {
		// Bootstrap to include all of the necessary files
		$this->bootstrap();

		affiliatewp_zapier()->flush();
		affiliatewp_zapier()->logs->create_table();
		affiliatewp_zapier()->schedule_logs_event();

		update_option( 'affwp_zapier_is_installed', '1' );

		if ( defined( 'AFFWP_ZAPIER_VERSION' ) ) {
			update_option( 'affwp_zapier_version', AFFWP_ZAPIER_VERSION );
		}
	}

	/**
	 * Actions to perform when the plugin is deactivated.
	 *
	 * Note the presence of uninstall.php in the root directory. This handles removing
	 * of plugin-specific data when the plugin is completely uninstalled.
	 *
	 * @since 1.3
	 */
	public function deactivate() {
		affiliatewp_zapier()->clear_scheduled_event();
	}

	/**
	 * Plugin-specific aria label text to describe the requirements link.
	 *
	 * @since 1.3
	 *
	 * @return string Aria label text.
	 */
	protected function unmet_requirements_label() {
		return esc_html__( 'AffiliateWP - Zapier Requirements', 'affiliatewp-zapier' );
	}

	/**
	 * Plugin-specific text used in CSS to identify attribute IDs and classes.
	 *
	 * @since 1.3
	 *
	 * @return string CSS selector.
	 */
	protected function unmet_requirements_name() {
		return 'affiliatewp-zapier-requirements';
	}

	/**
	 * Plugin specific URL for an external requirements page.
	 *
	 * @since 1.3
	 *
	 * @return string Unmet requirements URL.
	 */
	protected function unmet_requirements_url() {
		return 'https://docs.affiliatewp.com/article/2361-minimum-requirements-roadmaps';
	}

}

$requirements = new AffiliateWP_Zapier_Requirements_Check( __FILE__ );

$requirements->maybe_load();
