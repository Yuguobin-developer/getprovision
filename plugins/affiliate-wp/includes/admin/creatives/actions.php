<?php
/**
 * Admin: Creatives Action Callbacks
 *
 * @package     AffiliateWP
 * @subpackage  Admin/Creatives
 * @copyright   Copyright (c) 2021, Sandhills Development, LLC
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.2
 */

/**
 * Process the add creative request
 *
 * @since 1.2
 * @return void
 */
function affwp_process_add_creative( $data ) {

	if ( ! is_admin() ) {
		return false;
	}

	if ( ! current_user_can( 'manage_creatives' ) ) {
		wp_die( __( 'You do not have permission to manage creatives', 'affiliate-wp' ), __( 'Error', 'affiliate-wp' ), array( 'response' => 403 ) );
	}

	if ( affwp_add_creative( $data ) ) {
		wp_safe_redirect( affwp_admin_url( 'creatives', array( 'affwp_notice' => 'creative_added' ) ) );
		exit;
	} else {
		wp_safe_redirect( affwp_admin_url( 'creatives', array( 'affwp_notice' => 'creative_added_failed' ) ) );
		exit;
	}

}
add_action( 'affwp_add_creative', 'affwp_process_add_creative' );

/**
 * Process creative deletion requests
 *
 * @since 1.2
 * @param $data array
 * @return void
 */
function affwp_process_creative_deletion( $data ) {

	if ( ! is_admin() ) {
		return;
	}

	if ( ! current_user_can( 'manage_creatives' ) ) {
		wp_die( __( 'You do not have permission to delete a creative', 'affiliate-wp' ), __( 'Error', 'affiliate-wp' ), array( 'response' => 403 ) );
	}

	if ( ! wp_verify_nonce( $data['affwp_delete_creatives_nonce'], 'affwp_delete_creatives_nonce' ) ) {
		wp_die( __( 'Security check failed', 'affiliate-wp' ), __( 'Error', 'affiliate-wp' ), array( 'response' => 403 ) );
	}

	if ( empty( $data['affwp_creative_ids'] ) || ! is_array( $data['affwp_creative_ids'] ) ) {
		wp_die( __( 'No creative IDs specified for deletion', 'affiliate-wp' ), __( 'Error', 'affiliate-wp' ), array( 'response' => 400 ) );
	}

	$to_delete = array_map( 'absint', $data['affwp_creative_ids'] );

	foreach ( $to_delete as $creative_id ) {
		affwp_delete_creative( $creative_id );
	}

	wp_safe_redirect( affwp_admin_url( 'creatives', array( 'affwp_notice' => 'creative_deleted' ) ) );
	exit;

}
add_action( 'affwp_delete_creatives', 'affwp_process_creative_deletion' );

/**
 * Process the add affiliate request
 *
 * @since 1.2
 * @return void
 */
function affwp_process_update_creative( $data ) {

	if ( ! is_admin() ) {
		return false;
	}

	if ( ! current_user_can( 'manage_creatives' ) ) {
		wp_die( __( 'You do not have permission to manage creatives', 'affiliate-wp' ), __( 'Error', 'affiliate-wp' ), array( 'response' => 403 ) );
	}

	if ( affwp_update_creative( $data ) ) {
		wp_safe_redirect( affwp_admin_url( 'creatives', array( 'action' => 'edit_creative', 'affwp_notice' => 'creative_updated', 'creative_id' => $data['creative_id'] ) ) );
		exit;
	} else {
		wp_safe_redirect( affwp_admin_url( 'creatives', array( 'action' => 'edit_creative', 'affwp_notice' => 'creative_update_failed' ) ) );
		exit;
	}

}
add_action( 'affwp_update_creative', 'affwp_process_update_creative' );

/**
 * Initialize Creative + Grouping Connections UI.
 *
 * @since  2.12.0
 */
function affwp_creatives_admin_connect() {

	static $instance = null;

	if ( ! is_null( $instance ) ) {
		return $instance;
	}

	require_once __DIR__ . '/categories/class-connector.php';

	$instance = new \AffiliateWP\Admin\Creatives\Categories\Connector();
}
add_action( 'plugins_loaded', 'affwp_creatives_admin_connect', 9 );

/**
 * Initialize Creative Categories Screen.
 *
 * @since  2.12.0
 */
function affwp_creatives_admin_categories() {

	static $instance = null;

	if ( ! is_null( $instance ) ) {
		return $instance;
	}

	require_once __DIR__ . '/categories/class-management.php';

	$instance = new \AffiliateWP\Admin\Creatives\Categories\Management();
}
add_action( 'plugins_loaded', 'affwp_creatives_admin_categories', 10 );
