<?php
/**
 * Shortcodes Bootstrap
 *
 * @package     AffiliateWP
 * @subpackage  Core
 * @copyright   Copyright (c) 2014, Sandhills Development, LLC
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

class Affiliate_WP_Shortcodes {

	public function __construct() {

		add_shortcode( 'affiliate_area',              array( $this, 'affiliate_area'         ) );
		add_shortcode( 'affiliate_login',             array( $this, 'affiliate_login'        ) );
		add_shortcode( 'affiliate_registration',      array( $this, 'affiliate_registration' ) );
		add_shortcode( 'affiliate_conversion_script', array( $this, 'conversion_script'      ) );
		add_shortcode( 'affiliate_referral_url',      array( $this, 'referral_url'           ) );
		add_shortcode( 'affiliate_content',           array( $this, 'affiliate_content'      ) );
		add_shortcode( 'non_affiliate_content',       array( $this, 'non_affiliate_content'  ) );
		add_shortcode( 'affiliate_creative',          array( $this, 'affiliate_creative'     ) );
		add_shortcode( 'affiliate_creatives',         array( $this, 'affiliate_creatives'    ) );
		add_shortcode( 'opt_in',                      array( $this, 'opt_in_form'            ) );
		add_shortcode( 'affiliate_coupons',           array( $this, 'affiliate_coupons'      ) );

	}

	/**
	 *  Renders the affiliate area
	 *
	 *  @since 1.0
	 *  @return string
	 */
	public function affiliate_area( $atts, $content = null ) {

		// See https://github.com/AffiliateWP/AffiliateWP/issues/867
		if( is_admin() && ( ! wp_doing_ajax() ) ) {
			return;
		}

		affwp_enqueue_script( 'affwp-frontend', 'affiliate_area' );

		/**
		 * Filters the display of the registration form
		 *
		 * @since 2.0
		 *
		 * @param bool $show Whether to show the registration form. Default true.
		 */
		$show_registration = apply_filters( 'affwp_affiliate_area_show_registration', true );

		/**
		 * Filters the display of the login form
		 *
		 * @since 2.0
		 *
		 * @param bool $show Whether to show the login form. Default true.
		 */
		$show_login = apply_filters( 'affwp_affiliate_area_show_login', true );

		ob_start();

		if ( is_user_logged_in() && affwp_is_affiliate() ) {
			affiliate_wp()->templates->get_template_part( 'dashboard' );
		} elseif ( is_user_logged_in() && affiliate_wp()->settings->get( 'allow_affiliate_registration' ) ) {

			if ( true === $show_registration ) {
				affiliate_wp()->templates->get_template_part( 'register' );
			}

		} else {

			if ( affiliate_wp()->settings->get( 'allow_affiliate_registration' ) ) {

				if ( true === $show_registration ) {
					affiliate_wp()->templates->get_template_part( 'register' );
				}

			} else {
				affiliate_wp()->templates->get_template_part( 'no', 'access' );
			}

			if ( ! is_user_logged_in() ) {

				if ( true === $show_login ) {
					affiliate_wp()->templates->get_template_part( 'login' );
				}

			}

		}

		return ob_get_clean();

	}

	/**
	 *  Renders the affiliate login form
	 *
	 *  @since 1.1
	 *  @return string
	 */
	public function affiliate_login( $atts, $content = null ) {

		$atts = shortcode_atts(
			array(
				'redirect' => '',
			),
			$atts,
			'affiliate_login'
		);

		$redirect = ! empty( $atts['redirect'] ) ? $atts['redirect'] : '';

		// redirect added to shortcode
		if ( $redirect ) {

			if ( 'current' === $redirect ) {
				// redirect to current page
				$redirect = '';
			} elseif ( 'referrer' === $redirect && wp_get_referer() ) {
				// redirect to the page before landing on login page
				$redirect = wp_get_referer();
			} else {
				// redirect to the location entered in the shortcode
				$redirect = $redirect;
			}

		} else {
			// redirect to the affiliate area
			$redirect = affiliate_wp()->login->get_login_url();
		}

		if ( ! is_user_logged_in() ) {
			return affiliate_wp()->login->login_form( $redirect );
		}

	}

	/**
	 *  Renders the affiliate registration form
	 *
	 *  @since 1.1
	 *  @return string
	 */
	public function affiliate_registration( $atts, $content = null ) {

		$atts = shortcode_atts(
			array(
				'redirect' => '',
			),
			$atts,
			'affiliate_registration'
		);

		$redirect = ! empty( $atts['redirect'] ) ? $atts['redirect'] : '';

		if ( ! affiliate_wp()->settings->get( 'allow_affiliate_registration' ) ) {
			return;
		}

		if ( affwp_is_affiliate() ) {
			return;
		}

		affwp_enqueue_script( 'affwp-frontend', 'affiliate_registration' );

		// redirect added to shortcode
		if ( $redirect ) {

			if ( 'current' === $redirect ) {
				// redirect to current page
				$redirect = '';
			} elseif ( 'referrer' === $redirect && wp_get_referer() ) {
				// redirect to the page before landing on login page
				$redirect = wp_get_referer();
			} else {
				// redirect to the location entered in the shortcode
				$redirect = $redirect;
			}

		} else {
			// redirect to the affiliate area
			$redirect = affiliate_wp()->login->get_login_url();
		}

		return affiliate_wp()->register->register_form( $redirect );

	}

	/**
	 *  Outputs a generic conversion script for custom referral tracking
	 *
	 *  @since 1.0
	 *  @return string
	 */
	public function conversion_script( $atts, $content = null ) {

		if ( is_admin() ) {
			return;
		}

		if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) {
			return;
		}

		$atts = shortcode_atts(
			array(
				'amount'      => '',
				'description' => '',
				'reference'   => '',
				'context'     => '',
				'campaign'    => '',
				'status'      => '',
				'type'        => 'sale',
			),
			$atts,
			'affwp_conversion_script'
		);

		$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
		wp_enqueue_script( 'jquery-cookie', AFFILIATEWP_PLUGIN_URL . 'assets/js/jquery.cookie' . $suffix . '.js', array( 'jquery' ), '1.4.0' );
		wp_localize_script( 'jquery-cookie', 'affwp_scripts', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

		return affiliate_wp()->tracking->conversion_script( $atts );

	}

	/**
	 * Outputs the referral URL for the current affiliate
	 *
	 *  @since 1.0.1
	 *  @return string
	 */
	public function referral_url( $atts, $content = null ) {

		if ( ! ( affwp_is_affiliate() && affwp_is_active_affiliate() ) ) {
			return;
		}

		$atts = shortcode_atts( array(
			'url'    => '',
			'format' => '',
			'pretty' => ''
		), $atts, 'affiliate_referral_url' );

		// format
		$format = isset( $atts['format'] ) ? $atts['format'] : '';

		// base URL
		if ( ! empty( $content ) ) {
			$base_url = $content;
		} else {
			$base_url = ! empty( $atts[ 'url' ] ) ? $atts[ 'url' ] : affiliate_wp()->tracking->get_current_page_url();
		}

		// pretty URLs
		if ( ! empty( $atts['pretty'] ) ) {
			if ( 'yes' == $atts['pretty'] ) {
				$pretty = true;
			} elseif ( 'no' == $atts['pretty'] ) {
				$pretty = false;
			}
		} else {
			$pretty = '';
		}

		$args = array(
			'base_url' => $base_url,
			'format'   => $format,
			'pretty'   => $pretty
		);

		$content = affwp_get_affiliate_referral_url( $args );

		return $content;
	}

	/**
	 * Affiliate content shortcode.
	 * Renders the content if the current user is an affiliate.
	 * @since  1.0.4
	 * @return string
	 */
	public function affiliate_content( $atts, $content = null ) {

		if ( ! ( affwp_is_affiliate() && affwp_is_active_affiliate() ) ) {
			return;
		}

		return do_shortcode( $content );
	}

	/**
	 * Non Affiliate content shortcode.
	 * Renders the content if the current user is not an affiliate.
	 * @since  1.1
	 * @return string
	 */
	public function non_affiliate_content( $atts, $content = null ) {

		if ( affwp_is_affiliate() && affwp_is_active_affiliate() ) {
			return;
		}

		return do_shortcode( $content );
	}

	/**
	 * Affiliate creative shortcode.
	 *
	 * @param array  $atts    Shortcode atttributes.
	 * @param string $content Default content.
	 *
	 * @since  1.1.4
	 *
	 * @return string
	 */
	public function affiliate_creative( $atts, $content = null ) {

		$atts = shortcode_atts(
			array(
				'id'          => '',    // ID of the creative.
				'image_id'    => '',    // ID of image from media library if not using creatives section.
				'image_link'  => '',    // External URL if image is hosted off-site.
				'link'        => '',    // Where the banner links to.
				'preview'     => 'yes', // Display an image/text preview above HTML code.
				'text'        => '',    // Text shown in alt/title tags.
				'description' => '',    // Description for creative.
			),
			$atts,
			'affiliate_creative'
		);

		$default = is_string( $content )
			? $content
			: '';

		if ( ! ( affwp_is_affiliate() && affwp_is_active_affiliate() ) ) {
			return $default;
		}

		if ( ! affiliate_wp()->creative->groups->affiliate_can_access( $atts['id'] ) ) {
			return $default;
		}

		return do_shortcode( affiliate_wp()->creative->affiliate_creative( $atts ) );
	}

	/**
	 * Affiliate creatives shortcode.
	 *
	 * Shows all the creatives from Affiliates -> Creatives.
	 *
	 * @param array $atts    Shortcode attributes.
	 * @param null  $content Default content.
	 *
	 * @since 1.1.4
	 *
	 * @return string
	 */
	public function affiliate_creatives( $atts, $content = null ) {

		$default = is_string( $content )
			? $content
			: '';

		if ( ! ( affwp_is_affiliate() && affwp_is_active_affiliate() ) ) {
			return $default;
		}

		return do_shortcode(
			affiliate_wp()->creative->affiliate_creatives(
				shortcode_atts(
					array(
						'preview' => 'yes', // Display an image/text preview above HTML code.
						'number'  => 20,   // Number to show.
					),
					$atts,
					'affiliate_creatives'
				)
			)
		);
	}

	/**
	 *  Renders the opt-in
	 *
	 *  @since 2.2
	 *  @return string
	 */
	public function opt_in_form( $atts, $content = null ) {

		$atts = shortcode_atts(
			array(
				'redirect' => '',
			),
			$atts,
			'opt_in'
		);

		$redirect = ! empty( $atts['redirect'] ) ? $atts['redirect'] : '';

		// redirect added to shortcode
		if ( $redirect ) {

			if ( 'current' === $redirect ) {
				// redirect to current page
				$redirect = '';
			} elseif ( 'referrer' === $redirect && wp_get_referer() ) {
				// redirect to the page before landing on login page
				$redirect = wp_get_referer();
			} else {
				// redirect to the location entered in the shortcode
				$redirect = $redirect;
			}

		}

		return affiliate_wp()->integrations->opt_in->form( $redirect );

	}

	/**
	 *  Affiliate coupons shortcode.
	 *
	 *  @since 2.6
	 *  @return string
	 */
	public function affiliate_coupons( $atts, $content = null ) {

		if ( function_exists( 'affiliatewp_show_affiliate_coupons' ) ) {
			return;
		}

		if ( ! ( affwp_is_affiliate() && affwp_is_active_affiliate() ) ) {
			return;
		}

		ob_start();

		affiliate_wp()->templates->get_template_part( 'dashboard-tab', 'coupons' );

		$content = ob_get_clean();

		return do_shortcode( $content );
	}


}
new Affiliate_WP_Shortcodes;
