<?php

namespace Flexbox;

/**
 * Primary core controller
 **/
class App {
	
	private static $instance = null;
	
	public $Config;
	public $Model;
	public $View;
	public $Controller;
		
	/**
	 * @return App , Singleton
	 */
	public static function getInstance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		
		return self::$instance;
	}

	private function __construct() {
	}

	private function __clone() {
	}
	
	/**
	 * Run the theme
	 **/
	public function run() {
		
		// Load default config
		$this->Config = require_once get_theme_file_path( 'App/Config.php' );
		
		// Translation support
		load_theme_textdomain( 'flex-box', get_theme_file_path( 'languages' ) );
		
		// Load core classes
		$this->_dispatch();
		
	}
	
	/**
	 * Load and instantiate all application
	 * classes neccessary for this theme
	 **/
	private function _dispatch() {
		
		$this->Model = new \stdClass();
		$this->View = new \stdClass();
		$this->Controller = new \stdClass();
		
		// Autoload models
		$this->_load_modules( 'Model', '/' );

		// Init View
		$this->View = new \Flexbox\View\View();

		// Autoload controllers
		$this->_load_modules( 'Controller', '/' );
				
	}
	
	/**
	 * Autoload core modules in a specific directory
	 *
	 * @param string
	 * @param string
	 * @param bool
	 **/
	private function _load_modules( $layer, $dir = '/' ) {

		$directory 	= get_theme_file_path( 'App/' . $layer . $dir );
		$handle    	= opendir( $directory );
		
		while ( false !== ( $file = readdir( $handle ) ) ) {
			
			if ( is_file( $directory . $file ) ) {
				// Figure out class name from file name
				$class = str_replace( '.php', '', $file );
				
				// Avoid recursion
				if ( $class !== get_class( $this ) ) {
					$classPath = "\\Flexbox\\{$layer}\\{$class}";
					$this->$layer->$class = new $classPath();
				}
				
			}
		}
		
	}
		
}
