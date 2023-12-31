<?php
/**
 * Creatives Functions
 *
 * @package     AffiliateWP
 * @subpackage  Core
 * @copyright   Copyright (c) 2014, Sandhills Development, LLC
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.1
 */

/**
 * Retrieves the creative object.
 *
 * @since 1.1.4
 *
 * @param int|AffWP\Creative $creative Creative ID or object.
 * @return AffWP\Creative|false Creative object, otherwise false.
 */
function affwp_get_creative( $creative = null ) {

	if ( is_object( $creative ) && isset( $creative->creative_id ) ) {
		$creative_id = $creative->creative_id;
	} elseif( is_numeric( $creative ) ) {
		$creative_id = absint( $creative );
	} else {
		return false;
	}

	return affiliate_wp()->creatives->get_object( $creative_id );
}

/**
 * Adds a new creative to the database.
 *
 * @since 1.1.4
 * @since 1.9.6 Modified to return the creative ID on success vs true.
 *
 * @return int|false ID of the newly-created creative, otherwise false.
 */
function affwp_add_creative( $data = array() ) {

	$args = array(
		'name'        => ! empty( $data['name'] ) ? sanitize_text_field( $data['name'] ) : __( 'Creative', 'affiliate-wp' ),
		'description' => ! empty( $data['description'] ) ? wp_kses_post( $data['description'] ) : '',
		'url'         => ! empty( $data['url'] ) ? esc_url_raw( $data['url'] ) : get_site_url(),
		'text'        => ! empty( $data['text'] ) ? sanitize_text_field( $data['text'] ) : get_bloginfo( 'name' ),
		'image'       => ! empty( $data['image'] ) ? esc_url( $data['image'] ) : '',
		'status'      => ! empty( $data['status'] ) ? sanitize_text_field( $data['status'] ) : '',
		'date'        => ! empty( $data['date'] ) ? $data['date'] : '',
	);

	if ( $creative_id = affiliate_wp()->creatives->add( $args ) ) {
		return $creative_id;
	}

	return false;
}

/**
 * Updates a creative
 *
 * @since 1.1.4
 *
 * @return bool True if the creative was updated, otherwise false.
 */
function affwp_update_creative( $data = array() ) {

	if ( empty( $data['creative_id'] )
		|| ( ! $creative = affwp_get_creative( $data['creative_id'] ) )
	) {
		return false;
	}

	$args = array(
		'name'          => ! empty( $data['name'] ) ? sanitize_text_field( $data['name'] ) : __( 'Creative', 'affiliate-wp' ),
		'description'   => ! empty( $data['description'] ) ? wp_kses_post( $data['description'] ) : '',
		'url'           => ! empty( $data['url'] ) ? esc_url_raw( $data['url'] ) : get_site_url(),
		'text'          => ! empty( $data['text'] ) ? sanitize_text_field( $data['text'] ) : get_bloginfo( 'name' ),
		'image'         => ! empty( $data['image'] ) ? sanitize_text_field( $data['image'] ) : '',
		'status'        => ! empty( $data['status'] ) ? sanitize_text_field( $data['status'] ) : '',
		'attachment_id' => 0,
	);

	$args['attachment_id'] = ( ! empty( $args['image'] ) ) 
		? attachment_url_to_postid( $args['image'] )
		: 0;

	if ( affiliate_wp()->creatives->update( $creative->ID, $args, '', 'creative' ) ) {
		return true;
	}

	return false;

}

/**
 * Deletes a creative record.
 *
 * @since 1.2
 *
 * @param int|\AffWP\Creative $creative Creative to delete.
 * @return bool True if the record was deleted, otherwise false.
 */
function affwp_delete_creative( $creative ) {

	if ( ! $creative = affwp_get_creative( $creative ) ) {
		return false;
	}

	/**
	 * Delete creative.
	 *
	 * @since 2.12.0
	 *
	 * @param int $creative_id Creative ID.
	 */
	do_action( 'affwp_delete_creative', $creative->ID );

	return affiliate_wp()->creatives->delete( $creative->ID, 'creative' );
}

/**
 * Sets the status for a creative.
 *
 * @since 1.0
 *
 * @param int|\AffWP\Creative $creative Creative ID or object.
 * @param string              $status   Optional. Status to give the creative. Default empty.
 * @return bool True if the creative was updated with the new status, otherwise false.
 */
function affwp_set_creative_status( $creative, $status = '' ) {

	if ( ! $creative = affwp_get_creative( $creative ) ) {
		return false;
	}

	$old_status = $creative->status;

	/**
	 * Fires immediately before the creative's status has been updated.
	 *
	 * @since 1.0
	 *
	 * @param int    $creative_id Creative ID.
	 * @param string $status      New creative status.
	 * @param string $old_status  Old creative status.
	 */
	do_action( 'affwp_set_creative_status', $creative->ID, $status, $old_status );

	if ( affiliate_wp()->creatives->update( $creative->ID, array( 'status' => $status ), '', 'creative' ) ) {
		return true;
	}

}

/**
 * Retrieves a creative by a given field and value.
 *
 * @since 2.7
 *
 * @param string $field Creative object field.
 * @param mixed  $value Field value.
 * @return \AffWP\Creative|\WP_Error Creative object if found, otherwise a WP_Error object.
 */
function affwp_get_creative_by( $field, $value ) {
	$result = affiliate_wp()->creatives->get_by( $field, $value );

	if ( is_object( $result ) ) {
		$creative = affwp_get_creative( intval( $result->creative_id ) );
	} else {
		$creative = new \WP_Error(
			'invalid_creative_field',
			sprintf( 'No creative could be retrieved with a(n) \'%1$s\' field value of %2$s.', $field, $value )
		);
	}

	return $creative;
}
