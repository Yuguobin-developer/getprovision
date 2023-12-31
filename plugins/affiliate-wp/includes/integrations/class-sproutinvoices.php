<?php
/**
 * Integrations: Sprout Invoices
 *
 * @package     AffiliateWP
 * @subpackage  Integrations
 * @copyright   Copyright (c) 2014, Sandhills Development, LLC
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.2
 */

/**
 * Implements an integration for Sprout Invoices.
 *
 * @since 1.2
 *
 * @see Affiliate_WP_Base
 */
class Affiliate_WP_Sprout_Invoices extends Affiliate_WP_Base {

	/**
	 * The context for referrals. This refers to the integration that is being used.
	 *
	 * @access  public
	 * @since   1.2
	 */
	public $context = 'sproutinvoices';

	/**
	 * Get things started
	 *
	 * @access  public
	 * @since   1.6
	 */
	public function init() {
		add_action( 'payment_authorized', array( $this, 'add_pending_referral' ) );
		add_action( 'payment_complete', array( $this, 'mark_referral_complete' ) );
		add_action( 'si_void_payment', array( $this, 'revoke_referral_on_refund' ) );

		add_filter( 'affwp_referral_reference_column', array( $this, 'reference_link' ), 10, 2 );

	}

	/**
	 * Record a pending referral when a payment is authorized
	 *
	 * @access  public
	 * @since   1.6
	 */
	public function add_pending_referral( SI_Payment $payment ) {

		if( $this->was_referred() ) {
			$payment_id = $payment->get_id();
			$referral_total = $this->calculate_referral_amount( $payment->get_amount(), $payment_id );
			$this->insert_pending_referral( $referral_total, $payment_id, $payment->get_title() );
		}

	}

	/**
	 * Update a referral to Unpaid when a payment is completed
	 *
	 * @access  public
	 * @since   1.6
	 */
	public function mark_referral_complete( SI_Payment $payment ) {
		$payment_id = $payment->get_id();
		$this->complete_referral( $payment_id );
		$referral = affwp_get_referral_by( 'reference', $payment_id, $this->context );

		if ( is_wp_error( $referral ) ) {
			affiliate_wp()->utils->log( 'mark_referral_complete: The referral could not be found.', $referral );

			return;
		}
		$amount   = affwp_currency_filter( affwp_format_amount( $referral->amount ) );
		$name     = affiliate_wp()->affiliates->get_affiliate_name( $referral->affiliate_id );
		/* translators: 1: Referral ID, 2: Formatted referral amount, 3: Affiliate name, 4: Referral affiliate ID  */
		$note     = sprintf( __( 'Referral #%1$d for %2$s recorded for %3$s (ID: %4$d).', 'affiliate-wp' ),
			$referral->referral_id,
			$amount,
			$name,
			$referral->affiliate_id
		);

		$new_data = wp_parse_args( $payment->get_data(), array( 'affwp_notes' => $note ) );
		$payment->set_data( $new_data );
	}

	/**
	 * Revoke a referral when a payment is refunded
	 *
	 * @access  public
	 * @since   1.6
	 */
	public function revoke_referral_on_refund( $payment_id = 0 ) {

		if( ! affiliate_wp()->settings->get( 'revoke_on_refund' ) ) {
			return;
		}

		$this->reject_referral( $payment_id );

		$referral = affwp_get_referral_by( 'reference', $payment_id, $this->context );

		if ( ! is_wp_error( $referral ) ) {
			$amount = affwp_currency_filter( affwp_format_amount( $referral->amount ) );
			$name   = affiliate_wp()->affiliates->get_affiliate_name( $referral->affiliate_id );
			$note   = sprintf( __( 'Referral #%d for %s for %s rejected', 'affiliate-wp' ), $referral->referral_id, $amount, $name );

			$payment  = SI_Payment::get_instance( $payment_id );
			$new_data = wp_parse_args( $payment->get_data(), array( 'affwp_notes' => $note ) );
			$payment->set_data( $new_data );
		} else {
			affiliate_wp()->utils->log( 'revoke_referral_on_refund: The referral could not be found.', $referral );
		}
	}

	/**
	 * Setup the reference link in the referrals table
	 *
	 * @access  public
	 * @since   1.6
	 */
	public function reference_link( $reference, $referral ) {

		if( empty( $referral->context ) || $this->context != $referral->context ) {
			return $reference;
		}

		$payment = SI_Payment::get_instance( $reference );
		$invoice_id = $payment->get_invoice_id();
		$url = get_edit_post_link( $invoice_id );
		$reference = get_the_title( $invoice_id );

		return '<a href="' . esc_url( $url ) . '">' . $reference . '</a>';
	}

	/**
	 * Runs the check necessary to confirm this plugin is active.
	 *
	 * @since 2.5
	 *
	 * @return bool True if the plugin is active, false otherwise.
	 */
	function plugin_is_active() {
		return class_exists( 'SI_Payment' );
	}
}

	new Affiliate_WP_Sprout_Invoices;