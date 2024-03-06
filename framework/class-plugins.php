<?php
defined( 'ABSPATH' ) || exit;

/**
 * Plugin installation and activation for WordPress themes
 */
if ( ! class_exists( 'Maxcoach_Register_Plugins' ) ) {
	class Maxcoach_Register_Plugins {

		protected static $instance = null;

		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function initialize() {
			add_filter( 'insight_core_tgm_plugins', array( $this, 'register_required_plugins' ) );
		}

		public function register_required_plugins( $plugins ) {
			/*
			 * Array of plugin arrays. Required keys are name and slug.
			 * If the source is NOT from the .org repo, then source is also required.
			 */
			$new_plugins = array(
				array(
					'name'     => esc_html__( 'Insight Core', 'maxcoach' ),
					'slug'     => 'insight-core',
					'source'   => $this->get_plugin_source_url( 'insight-core-2.2.1-MgA4cpZFCV.zip' ),
					'version'  => '2.2.1',
					'required' => true,
				),
				array(
					'name'     => esc_html__( 'Elementor', 'maxcoach' ),
					'slug'     => 'elementor',
					'required' => true,
				),
				array(
					'name'     => esc_html__( 'Elementor Pro', 'maxcoach' ),
					'slug'     => 'elementor-pro',
					'source'   => $this->get_plugin_source_url( 'elementor-pro-3.3.1-nJYReVTbRq.zip' ),
					'version'  => '3.3.1',
					'required' => true,
				),
				array(
					'name'    => esc_html__( 'Revolution Slider', 'maxcoach' ),
					'slug'    => 'revslider',
					'source'  => $this->get_plugin_source_url( 'revslider-6.5.4-vsQ2TIHd5l.zip' ),
					'version' => '6.5.4',
				),
				array(
					'name' => esc_html__( 'LearnPress – WordPress LMS Plugin', 'maxcoach' ),
					'slug' => 'learnpress',
				),
				array(
					'name' => esc_html__( 'LearnPress – Course Review', 'maxcoach' ),
					'slug' => 'learnpress-course-review',
				),
				array(
					'name'    => esc_html__( 'ThemeMove Payment Add-ons for LearnPress', 'maxcoach' ),
					'slug'    => 'thememove-payment',
					'source'  => $this->get_plugin_source_url( 'thememove-payment-1.2.0-P25NJn8cHY.zip' ),
					'version' => '1.2.0',
				),
				array(
					'name' => esc_html__( 'Paid Memberships Pro', 'maxcoach' ),
					'slug' => 'paid-memberships-pro',
				),
				array(
					'name'    => esc_html__( 'LearnPress - Paid Membership Pro Integration', 'maxcoach' ),
					'slug'    => 'learnpress-paid-membership-pro',
					'source'  => $this->get_plugin_source_url( 'learnpress-paid-membership-pro-4.0.0-Z5ZXPHoByo.zip' ),
					'version' => '4.0.0',
				),
				array(
					'name' => esc_html__( 'WP Events Manager', 'maxcoach' ),
					'slug' => 'wp-events-manager',
				),
				array(
					'name' => esc_html__( 'Video Conferencing with Zoom', 'maxcoach' ),
					'slug' => 'video-conferencing-with-zoom-api',
				),
				array(
					'name'     => esc_html__( 'Taxonomy Thumbnail', 'maxcoach' ),
					'slug'     => 'sf-taxonomy-thumbnail',
					'required' => true,
				),
				array(
					'name' => esc_html__( 'Contact Form 7', 'maxcoach' ),
					'slug' => 'contact-form-7',
				),
				array(
					'name' => esc_html__( 'MailChimp for WordPress', 'maxcoach' ),
					'slug' => 'mailchimp-for-wp',
				),
				array(
					'name' => esc_html__( 'WooCommerce', 'maxcoach' ),
					'slug' => 'woocommerce',
				),
				array(
					'name' => esc_html__( 'WPC Smart Compare for WooCommerce', 'maxcoach' ),
					'slug' => 'woo-smart-compare',
				),
				array(
					'name' => esc_html__( 'WPC Smart Wishlist for WooCommerce', 'maxcoach' ),
					'slug' => 'woo-smart-wishlist',
				),
				array(
					'name' => esc_html__( 'WP-PostViews', 'maxcoach' ),
					'slug' => 'wp-postviews',
				),
				array(
					'name'    => esc_html__( 'Instagram Feed', 'maxcoach' ),
					'slug'    => 'elfsight-instagram-feed-cc',
					'source'  => $this->get_plugin_source_url( 'elfsight-instagram-feed-cc-4.0.2-dYYYZeP8Zo.zip' ),
					'version' => '4.0.2',
				),
			);

			$plugins = array_merge( $plugins, $new_plugins );

			return $plugins;
		}

		public function get_plugin_source_url( $file_name ) {
			return 'https://api.thememove.com/download/' . $file_name;
		}
	}

	Maxcoach_Register_Plugins::instance()->initialize();
}
