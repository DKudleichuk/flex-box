<?php

namespace Flexbox\Controller;

/**
 * WooCommerce plugin controller
 **/
class WooCommerce {
	
	/**
	 * Constructor
	 **/
	function __construct() {

		if( \Flexbox\Helper\Utils::is_woocommerce() ) {

			// load custom styles for WooCommerce plugin
			add_action( 'wp_enqueue_scripts', [ $this, 'load_assets' ] );

			// Remove WooCommerce default styles
			add_filter( 'woocommerce_enqueue_styles', '__return_false' );

			// override breadcrumbs
			remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
			add_filter( 'woocommerce_show_page_title', '__return_false' );

			// Override search form
			add_filter( 'get_product_search_form', [ $this, 'custom_woo_search' ] );

			// Add cart icon to header
			add_filter( 'wp_nav_menu_items', [ $this, 'add_cart_to_header_menu'], 10, 2 );

			// Update cart totals through AJAX
			add_filter( 'woocommerce_add_to_cart_fragments', [ $this, 'update_header_cart_totals' ] );

		}

	}
	
	/**
	 * Load WooCommerce-specific assets
	 **/
	function load_assets() {

		wp_enqueue_style( 'flexbox-woocommerce-style', get_theme_file_uri( '/assets/css/front/woocommerce.css' ), false, FLEXBOX()->Config['cache_time'] );

		if( is_product() ) {
			wp_enqueue_style( 'simple-lightbox', get_theme_file_uri( '/assets/libs/simple-lightbox/simplelightbox.min.css' ), false, FLEXBOX()->Config['cache_time'] );
			wp_register_script( 'simple-lightbox', get_theme_file_uri( '/assets/libs/simple-lightbox/simple-lightbox.min.js' ), false, FLEXBOX()->Config['cache_time'], true );
			wp_register_script( 'flexbox-single-product', get_theme_file_uri( '/assets/js/single-product.js' ), [
				'jquery',
				'simple-lightbox',
			], FLEXBOX()->Config['cache_time'], true );
			wp_enqueue_script( 'flexbox-single-product' );
		}

	}

	/**
	 * Override default WooCommerce Search Form
	 **/
	function custom_woo_search() {

		ob_start();
		get_template_part( '/template-parts/search-form-woocommerce');
		return ob_get_clean();

	}

	/**
	 * Update header cart totals
	 **/
	function update_header_cart_totals( $fragments ) {

		$fragments['#header-products-num'] = '<span id="header-products-num">' . WC()->cart->get_cart_contents_count() . '</span>';

		return $fragments;
	}

	/**
	 * Add Cart icon to the header menu
	 **/
	function add_cart_to_header_menu( $items, $args ) {

		if( $args->theme_location == 'header_menu' && filter_var( get_theme_mod( 'header_menu_display_cart'), FILTER_VALIDATE_BOOLEAN ) ) {
			$items =  $items . '<li class="menu-item menu-item-cart"><a href="' . get_permalink( wc_get_page_id( 'cart' ) ) . '" id="header-cart-toggler"><div><i class="fontello icon-basket"></i><span id="header-products-num">' . WC()->cart->get_cart_contents_count() . '</span></div></a></li>';
		}

		return $items;

	}

}
