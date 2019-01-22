<?php
namespace Flexbox\Controller;

/**
 * Backend controller
 **/
class Backend {
	
	/**
	 * Constructor
	 **/
	function __construct() {
		
		// load admin assets
		add_action( 'admin_enqueue_scripts', [ $this, 'load_assets' ] );
		
		// add welcome screen
		if( is_admin() ) {
			add_action( 'after_setup_theme', [ $this, 'theme_activation_hook' ] );
		}
		add_action( 'admin_menu', [ $this, 'add_welcome_screen_menu' ]);

		// add editor style
		add_action( 'admin_init', [ $this, 'add_editor_style'] );

		// ask to install recommended plugins
		require_once get_template_directory() . '/vendor/tgm/class-tgm-plugin-activation.php';
		add_action( 'tgmpa_register', [ $this, 'register_recommended_plugins' ] );

	}
	
	/**
	 * Load admin assets
	 **/
	function load_assets() {
		wp_enqueue_style( 'flexbox-backend', get_theme_file_uri( '/assets/css/admin/admin.css' ), false, FLEXBOX()->Config['cache_time'] );
	}

	/**
	 * Theme activation hook
	 */
	function theme_activation_hook() {

		// Skip if activating from network
		if ( is_network_admin() ) {
			return;
		}

		// redirect to WelcomeScreen on a first activation
		if ( false === get_transient( '_flexbox_theme_welcome_redirect' ) ) {
			set_transient( '_flexbox_theme_welcome_redirect', true, 0 );
			wp_safe_redirect( add_query_arg( array( 'page' => 'flexbox-theme-welcome' ), admin_url( 'themes.php' ) ) );
		}

	}

	/**
	 * Add theme welcome screen in the menu
	 */
	function add_welcome_screen_menu() {
		add_theme_page(
			__('FlexBox Theme', 'flex-box'),
			__('FlexBox Theme', 'flex-box'),
			'read',
			'flexbox-theme-welcome',
			[ $this, 'render_welcome_screen']
		);
	}

	/**
	 * Render theme welcome screen
	 */
	function render_welcome_screen() {

		FLEXBOX()->View->load(
			'/App/View/Admin/Welcome',
			[
				'current_user' => wp_get_current_user()
			]
		);

	}

	/**
	 * Add Editor Style for TinyMCE
	 **/
	function add_editor_style() {

		// Load Google Fonts
    $fonts_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Roboto:400,700|Raleway:700' );
		add_editor_style( $fonts_url );

		// Load Icons
		add_editor_style( get_theme_file_uri( '/assets/libs/fontello/css/fontello.min.css' ) );
		
		// Typography
		add_editor_style( get_theme_file_uri( '/assets/css/admin/editor-style.css' ) );

	}

	/**
	 * Ask to install recommended plugins
	 **/
	function register_recommended_plugins() {

		$plugins = [
			[
				'name'      => 'WP SCSS',
				'slug'      => 'wp-scss',
				'required'  => false,
			],
			[
				'name'      => 'SVG Support',
				'slug'      => 'svg-support',
				'required'  => false,
			],
			[
				'name'      => 'Breadcrumb NavXT',
				'slug'      => 'breadcrumb-navxt',
				'required'  => false,
			],
			[
				'name'      => 'Fast Velocity Minify',
				'slug'      => 'fast-velocity-minify',
				'required'  => false,
			],
			[
				'name'      => 'WP Fastest Cache',
				'slug'      => 'wp-fastest-cache',
				'required'  => false,
			],
			[
				'name'      => 'YOAST SEO',
				'slug'      => 'wordpress-seo',
				'required'  => false,
			],
			[
				'name'      => 'WooCommerce',
				'slug'      => 'woocommerce',
				'required'  => false,
			],
		];

		$config = [
			'id'           => 'flex-box',
			'default_path' => '',
			'menu'         => 'tgmpa-install-plugins',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',
		];

		tgmpa( $plugins, $config );

	}
	
}
