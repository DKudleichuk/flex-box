<?php

namespace Flexbox\Controller;

/**
 * Customizer controller
 **/
class Customizer {
	
	private $customizer;

	/**
	 * Constructor
	 **/
	function __construct() {

		// Register customizer settings
		add_action( 'customize_register', [ $this, 'customize_register'] );

		// Add "Reset Settings" button to customizer
		add_action( 'wp_ajax_customizer_reset', [ $this, 'ajax_customizer_reset'] );
		add_action( 'customize_controls_print_scripts', [ $this, 'load_admin_assets'] );

		// Selective refresh & preview hooks
		add_action( 'customize_preview_init', [ $this, 'setup_preview'] );

		// Generate dynamic CSS 
		add_filter( 'wp_scss_variables', [ $this, 'set_scss_variables']);

		// Generate inline CSS
		add_action( 'wp_enqueue_scripts', [ $this, 'generate_inline_css' ], 20, 1 );

	}

	/**
	 * Register custom settings
	 */
	function customize_register( $wp_customize ) {

		// Save $wp_customize instanse
		$this->wp_customize = $wp_customize;

		/**
		 * Blog name
		 */
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

    $wp_customize->selective_refresh->add_partial( 'header_site_title', [
			'selector' => '#header .text-logo',
			'settings' => [ 'blogname'],
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		]);

    $wp_customize->selective_refresh->add_partial( 'document_title', [
			'selector' => 'head > title',
			'settings' => [ 'blogname'],
			'render_callback' => 'wp_get_document_title',
		]);

		/**
		 * Blog description / tagline
		 */
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial( 'header_site_desc', [
			'selector' => '#header .text-logo-tagline',
			'settings' => [ 'blogdescription'],
			'render_callback' => function() {
				return get_bloginfo( 'description', 'display' );
			},
		]);

		/**
		 * Header settings
		 */

    $wp_customize->add_section( 'theme_header', array(
			'title'    => __('Header Settings', 'flex-box'),
		));

		$wp_customize->add_setting( 'header_display_top_bar', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		));
		
		$wp_customize->add_control( 'header_display_top_bar', array(
			'settings' => 'header_display_top_bar',
			'label'    => __('Display top bar', 'flex-box'),
			'section'  => 'theme_header',
			'type'     => 'checkbox',
		));

		$wp_customize->add_setting( 'header_display_breadcrumbs', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control( 'header_display_breadcrumbs', array(
			'settings' => 'header_display_breadcrumbs',
			'label'    => __('Display breadcrumbs in header (using Breadcrumb NavXT plugin)', 'flex-box'),
			'section'  => 'theme_header',
			'type'     => 'checkbox',
		));

		$wp_customize->add_setting( 'header_menu_display_search', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control( 'header_menu_display_search', array(
			'settings' => 'header_menu_display_search',
			'label'    => __('Display search icon in menu', 'flex-box'),
			'section'  => 'theme_header',
			'type'     => 'checkbox',
		));

		$wp_customize->add_setting( 'header_menu_display_cart', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control( 'header_menu_display_cart', array(
			'settings' => 'header_menu_display_cart',
			'label'    => __('Display cart icon in menu (if WooCommerce plugin is active)', 'flex-box'),
			'section'  => 'theme_header',
			'type'     => 'checkbox',
		));

		/**
		 * Header text color
		 */
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		/**
		 * Breadcrumbs background image
		 */
    $wp_customize->add_setting( 'breadcrumbs_bg_image', [
			'default' => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_url',
		]);

		$wp_customize->get_setting( 'breadcrumbs_bg_image' )->transport = 'postMessage';

    $wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'breadcrumbs_bg_image', [
			'label'    => __('Breadcrumbs background image', 'flex-box'),
			'section'  => 'header_image',
			'settings' => 'breadcrumbs_bg_image',
		]));

		/**
		 * Theme colors
		 */
		if( \Flexbox\Helper\Utils::is_scss() ) {

			foreach( FLEXBOX()->Config['colors'] as $key => $value ) {

				$wp_customize->add_setting( $key, [
					'default'           => $value,
					'sanitize_callback' => 'sanitize_hex_color',
					'capability'        => 'edit_theme_options',
				]);
		
				$wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, $key, [
					'label'    => FLEXBOX()->Config['customizer_lang_vars'][ $key ],
					'section'  => 'colors',
					'settings' => $key,
				]));
	
			}

		}

		/**
		 * Social icons
		 */
    $wp_customize->add_section( 'social_profiles', array(
			'title'    => __('Social Profiles', 'flex-box'),
			'priority' => 120,
		));

		foreach( FLEXBOX()->Config['social_icons'] as $key => $icon ) {

			$option_name = $key . '_url';

			$wp_customize->add_setting( $option_name, [
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_url',
			]);
	
			$wp_customize->add_control( $option_name, [
				'label'    => ucfirst( $key ),
				'section'  => 'social_profiles',
				'settings' => $option_name,
			]);

		}

		/**
		 * Footer CTA
		 */

    $wp_customize->add_section( 'footer_cta', array(
			'title'    => __('Footer Call To Action', 'flex-box'),
			'priority' => 120,
		));

		$wp_customize->add_setting('footer_cta_display', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		));
		
		$wp_customize->add_control('footer_cta_display', array(
			'settings' => 'footer_cta_display',
			'label'    => __('Display Call To Action Block', 'flex-box'),
			'section'  => 'footer_cta',
			'type'     => 'checkbox',
		));

		$wp_customize->add_setting( 'footer_cta_title', [
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		]);

		$wp_customize->add_control( 'footer_cta_title', [
			'label'    => __('Block title', 'flex-box'),
			'section'  => 'footer_cta',
			'settings' => 'footer_cta_title',
		]);

		$wp_customize->add_setting( 'footer_cta_text', [
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		]);

		$wp_customize->add_control( 'footer_cta_text', [
			'label'    => __('Content', 'flex-box'),
			'section'  => 'footer_cta',
			'settings' => 'footer_cta_text',
		]);

		$wp_customize->add_setting( 'footer_cta_btn1_text', [
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		]);

		$wp_customize->add_control( 'footer_cta_btn1_text', [
			'label'    => __('Button 1 text', 'flex-box'),
			'section'  => 'footer_cta',
			'settings' => 'footer_cta_btn1_text',
		]);

		$wp_customize->add_setting( 'footer_cta_btn1_link', [
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_url',
		]);

		$wp_customize->add_control( 'footer_cta_btn1_link', [
			'label'    => __('Button 1 link', 'flex-box'),
			'section'  => 'footer_cta',
			'settings' => 'footer_cta_btn1_link',
		]);

		$wp_customize->add_setting( 'footer_cta_btn2_text', [
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		]);

		$wp_customize->add_control( 'footer_cta_btn2_text', [
			'label'    => __('Button 2 text', 'flex-box'),
			'section'  => 'footer_cta',
			'settings' => 'footer_cta_btn2_text',
		]);

		$wp_customize->add_setting( 'footer_cta_btn2_link', [
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_url',
		]);

		$wp_customize->add_control( 'footer_cta_btn2_link', [
			'label'    => __('Button 2 link', 'flex-box'),
			'section'  => 'footer_cta',
			'settings' => 'footer_cta_btn2_link',
		]);

	}

	/**
	 * Reset customizer settings through AJAX call
	 */
	function ajax_customizer_reset() {

		if ( ! $this->wp_customize->is_preview() ) {
			wp_send_json_error( 'access_denied' );
		}

		if ( ! check_ajax_referer( 'customizer_reset', 'nonce', false ) ) {
			wp_send_json_error( 'invalid_nonce' );
		}

		$settings = $this->wp_customize->settings();

		// remove theme_mod settings registered in customizer
		foreach ( $settings as $setting ) {
			if ( 'theme_mod' == $setting->type ) {
				remove_theme_mod( $setting->id );
			}
		}

		wp_send_json_success();
	}
	
	/**
	 * Load custom assets to default WP Customizer
	 */
	function load_admin_assets() {

		wp_enqueue_script( 'flexbox-customizer-admin', get_theme_file_uri( '/assets/js/admin/customizer-admin.js' ), ['jquery'], FLEXBOX()->Config['cache_time'], true );
		wp_localize_script( 'flexbox-customizer-admin', 'themeCustomizerJsVars', array(
			'langStrReset'   => __( 'Reset', 'flex-box' ),
			'langStrConfirm' => __( 'Attention! This will remove absolutely all customizations that was made using Customizer!', 'flex-box' ),
			'nonce'   => array(
				'customizerReset' => wp_create_nonce( 'customizer_reset' ),
			)
		));

	}

	/**
	 * Setup preview
	 */
	function setup_preview() {

		// Selective refresh & preview live hooks
		wp_enqueue_script( 'flexbox-customizer-preview', get_theme_file_uri( '/assets/js/admin/customizer-preview.js' ), ['jquery'], FLEXBOX()->Config['cache_time'], true );

		// Setup WP SCSS plugin
		if( \Flexbox\Helper\Utils::is_scss() ) {

			if ( is_customize_preview() ) {
				wp_scss_compile();
				wpscss_handle_errors();
			}
	
			$wpscss_options = get_option( 'wpscss_options' );
			if ( $wpscss_options['scss_dir'] !== '/assets/css/front/' || $wpscss_options['css_dir'] !== '/assets/css/front/' ) {
				// Alter the options array appropriately.
				$wpscss_options['scss_dir'] = '/assets/css/front/';
				$wpscss_options['css_dir']  = '/assets/css/front/';
				// Update entire array
				update_option( 'wpscss_options', $wpscss_options );
			}

		}

	}

	/**
	 * Generates dynamic CSS styles based on these variables
	 */
	function set_scss_variables() {

		$vars = [];

		foreach( FLEXBOX()->Config['colors'] as $key => $value ) {
			$vars[ $key ] = get_theme_mod( $key, $value );
		}

		return $vars + FLEXBOX()->Config['fonts'];
	}

	/**
	 * Generate and load dynamic inline CSS
	 */
	function generate_inline_css() {

		$custom_css = '';

		$header_textcolor = get_theme_mod( 'header_textcolor');

		if( $header_textcolor <> '' ) {
			$custom_css .= '#header .text-logo, #header .text-logo-tagline, #header .menu > li > a { color: url(' . $header_textcolor . ') }';
		}

		$custom_breadcrumbs_bg = get_theme_mod( 'breadcrumbs_bg_image');

		if( $custom_breadcrumbs_bg <> '' ) {
			$custom_css .= '.breadcrumbs { background-image: url(' . $custom_breadcrumbs_bg . ') }';
		}

		if( $custom_css <> '' ) {
			wp_add_inline_style( 'flexbox-style', $custom_css );
		}

	}

}
