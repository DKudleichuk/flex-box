<?php

namespace Flexbox\Controller;

/**
 * Menu controller
 **/
class Menu {
	
	/**
	 * Constructor
	 **/
	function __construct() {

		// register menus
		add_action( 'init', [ $this, 'register_menus' ]);

		// add custom elements to main menu
		add_filter( 'wp_nav_menu_items', [ $this, 'add_header_menu_items'], 10, 2 );

	}
		
	/**
	 * Register theme menus
	 **/
	function register_menus() {
		
		register_nav_menus( [
			'top_bar_menu'    => esc_html__( 'Top Bar Menu', 'flex-box' ),
			'header_menu'     => esc_html__( 'Header Menu', 'flex-box' ),
			'bottom_bar_menu' => esc_html__( 'Bottom Bar Menu', 'flex-box' ),
		]);
		
	}

	/**
	 * Add custom menu items
	 */
	function add_header_menu_items( $items, $args ) {

		if( $args->theme_location == 'header_menu' && filter_var( get_theme_mod( 'header_menu_display_search'), FILTER_VALIDATE_BOOLEAN ) ) {
			$items =  $items . '<li class="menu-item menu-item-search"><a href="' . site_url( '/?s') . '" id="header-search-toggler"><i class="fontello icon-search"></i></a></li>';
		}

		return $items;

	}
	
}
