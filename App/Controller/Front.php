<?php

namespace Flexbox\Controller;

/**
 * Front side controller
 **/
class Front {
	
	/**
	 * Constructor
	 **/
	function __construct() {
		
		// add site icon
		add_action( 'wp_head', [ $this, 'add_site_icon' ] );
		
		// load assets
		add_action( 'wp_enqueue_scripts', [ $this, 'load_assets' ] );
		
		// Change excerpt dots
		add_filter( 'excerpt_more', [ $this, 'change_excerpt_more' ] );
		
		// Custom search form
		add_filter( 'get_search_form', [ $this, 'modify_search_template' ] );

	}
	
	/**
	 * Add site icon from customizer
	 **/
	function add_site_icon() {
		
		if ( function_exists( 'has_site_icon' ) && has_site_icon() ) {
			wp_site_icon();
		}
		
	}
	
	/**
	 * Load JavaScript and CSS files in a front-end
	 **/
	function load_assets() {
		
		// JS scripts
		wp_enqueue_script( 'jquery' );
		wp_register_script( 'google-fonts', get_theme_file_uri( '/assets/libs/google-fonts/webfont.js' ), false, FLEXBOX()->Config['cache_time'], true );
		wp_register_script( 'slick', get_theme_file_uri( '/assets/libs/slick/slick.min.js' ), false, FLEXBOX()->Config['cache_time'], true );
		wp_register_script( 'flexbox-front', get_theme_file_uri( '/assets/js/front.js' ), [
			'jquery',
			'google-fonts',
			'slick'
		], FLEXBOX()->Config['cache_time'], true );
		
		$js_vars = [
			'ajaxurl'    => esc_url(admin_url( 'admin-ajax.php' )),
			'assetsPath' => get_theme_file_uri( '/assets' ),
		];
		
		wp_enqueue_script( 'flexbox-front' );
		wp_localize_script( 'flexbox-front', 'themeJsVars', $js_vars );
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		// CSS styles
		wp_enqueue_style( 'normalize', get_theme_file_uri( '/assets/libs/normalize/normalize.min.css' ), false, FLEXBOX()->Config['cache_time'] );
		wp_enqueue_style( 'bootstrap-grid', get_theme_file_uri( '/assets/libs/bootstrap/bootstrap-grid.min.css' ), false, FLEXBOX()->Config['cache_time'] );
		wp_enqueue_style( 'slick', get_theme_file_uri( '/assets/libs/slick/slick.min.css' ), false, FLEXBOX()->Config['cache_time'] );
		wp_enqueue_style( 'flexbox-fontello', get_theme_file_uri( '/assets/libs/fontello/css/fontello.min.css' ), false, FLEXBOX()->Config['cache_time'] );

		if( \Flexbox\Helper\Utils::is_scss() ) {
			wp_enqueue_style( 'flexbox-style', get_theme_file_uri( '/assets/css/front/front-dynamic.css' ), false, FLEXBOX()->Config['cache_time'] );
		} else {
			wp_enqueue_style( 'flexbox-style', get_theme_file_uri( '/assets/css/front/front.css' ), false, FLEXBOX()->Config['cache_time'] );
		}

	}
	
	/**
	 * Change excerpt More text
	 **/
	function change_excerpt_more( $more ) {
		return '...';
	}

	/**
	 * Custom search template
	 */
	function modify_search_template() {
		ob_start();
			get_template_part( '/template-parts/search-form');
		return ob_get_clean();
	}
	
}
