<?php

namespace Flexbox\Controller;

/**
 * Theme init
 **/
class Init {
	
	/**
	 * Constructor
	 **/
	function __construct() {
		
		// add theme support
		add_action( 'after_setup_theme', [ $this, 'add_theme_support' ] );
		
		// register sidebars
		add_action( 'widgets_init', [ $this, 'register_sidebars' ] );
		
	}
	
	/**
	 * Add theme support
	 **/
	function add_theme_support() {

		add_theme_support( 'custom-logo', [
			'width'       => 100,
			'height'      => 40,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'text-logo', 'text-logo-tagline' ),
		]);

		add_theme_support( 'woocommerce', [
			'thumbnail_image_width' => 285,
			'single_image_width'    => 300,
			'product_grid'          => [
				'default_rows'    => 3,
				'min_rows'        => 2,
				'max_rows'        => 8,
				'default_columns' => 3,
				'min_columns'     => 2,
				'max_columns'     => 4,
			],
		]);

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-formats', [ 'aside', 'gallery', 'link', 'quote', 'status', 'video', 'audio', 'chat', 'image' ] );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );

		add_theme_support( 'custom-background', [
			'default-image' => '',
			'default-preset' => 'default',
			'default-position-x' => 'left',
			'default-position-y' => 'top',
			'default-size' => 'auto',
			'default-repeat' => 'repeat',
			'default-attachment' => 'scroll',
			'default-color' => 'ffffff',
		]);

		add_theme_support( 'custom-header', [
			'default-image' => '',
			'random-default' => false,
			'width' => 1920,
			'height' => 120,
			'flex-height' => true,
			'flex-width' => true,
			'uploads' => true,
			'video' => true,
			'default-text-color' => '333333',
		]);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'starter-content', FLEXBOX()->Config['starter_content'] );

	}
	
	/**
	 * Register theme sidebars
	 **/
	function register_sidebars() {
		
		register_sidebar([
			'name'          => esc_html__( 'Sidebar', 'flex-box' ),
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '<div class="clearfix"></div></div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		]);
		
		if( function_exists( 'is_woocommerce') ) {
			register_sidebar([
				'name'          => esc_html__( 'Shop Sidebar', 'flex-box' ),
				'id'            => 'sidebar-shop',
				'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
				'after_widget'  => '<div class="clearfix"></div></div></div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>'
			]);
		}
		
		register_sidebar([
			'name'          => esc_html__( 'Footer Col 1 Sidebar', 'flex-box' ),
			'id'            => 'sidebar-footer-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '<div class="clearfix"></div></div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		]);
		
		register_sidebar([
			'name'          => esc_html__( 'Footer Col 2 Sidebar', 'flex-box' ),
			'id'            => 'sidebar-footer-2',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '<div class="clearfix"></div></div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		]);
		
		register_sidebar([
			'name'          => esc_html__( 'Footer Col 3 Sidebar', 'flex-box' ),
			'id'            => 'sidebar-footer-3',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '<div class="clearfix"></div></div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		]);
		
		register_sidebar([
			'name'          => esc_html__( 'Footer Col 4 Sidebar', 'flex-box' ),
			'id'            => 'sidebar-footer-4',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '<div class="clearfix"></div></div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		]);
		
	}
	
}
