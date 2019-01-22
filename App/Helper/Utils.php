<?php

namespace Flexbox\Helper;

/**
 * Utils helper
 **/
class Utils {
	
	/**
	 * Check is plugin active for WP network
	 */
	public static function is_plugin_active_for_network( $plugin ) {

		// Makes sure the plugin is defined before trying to use it
		if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
			require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
		}

		return is_plugin_active_for_network( $plugin );

	}

	/**
	 * Make sure that WP SCSS plugin is active
	 **/
	public static function is_scss() {
		return (in_array( 'wp-scss/wp-scss.php', \apply_filters( 'active_plugins', \get_option( 'active_plugins' ) ) ) || self::is_plugin_active_for_network( 'wp-scss/wp-scss.php')) && file_exists( get_stylesheet_directory() . '/assets/css/' );
	}

	/**
	 * Make sure that Visual Composer is active
	 **/
	public static function is_vc() {
		return in_array( 'js_composer/js_composer.php', \apply_filters( 'active_plugins', \get_option( 'active_plugins' ) ) ) || self::is_plugin_active_for_network( 'js_composer/js_composer.php');
	}
	
	/**
	 * Make sure that Unyson Framework plugin is active
	 **/
	public static function is_unyson() {
		return in_array( 'unyson/unyson.php', \apply_filters( 'active_plugins', \get_option( 'active_plugins' ) ) ) || self::is_plugin_active_for_network( 'unyson/unyson.php');
	}
	
	/**
	 * Make sure that WooCommerce plugin is active
	 **/
	public static function is_woocommerce() {
		return in_array( 'woocommerce/woocommerce.php', \apply_filters( 'active_plugins', \get_option( 'active_plugins' ) ) ) || self::is_plugin_active_for_network( 'woocommerce/woocommerce.php');
	}
		
	/**
	 * Determine whether this is an AMP response.
	**/
	public static function is_amp() {
		return function_exists( '\is_amp_endpoint' ) && \is_amp_endpoint();
	}

	/**
	 * Autoload PHP files in directory
	 **/
	public static function autoload_dir( $dir, $max_scan_depth = 0, $load_file = '', $current_depth = 0 ) {
		if ( $current_depth > $max_scan_depth ) {
			return;
		}
		
		// require all php files
		$scan = glob( "$dir" . DIRECTORY_SEPARATOR . "*" );
		
		foreach ( $scan as $path ) {
			
			if ( preg_match( '/\.php$/', $path ) ) {
				
				if ( is_string( $load_file ) && $load_file <> '' ) {
					
					// load specific file
					
					$dir  = dirname( $path );
					$file = $dir . '/' . $load_file;
					
					if ( is_file( $file ) ) {
						require_once $file;
					}
					
				} else {
					
					// load all PHP files in folder
					require_once $path;
					
				}
				
			} elseif ( is_dir( $path ) ) {
				
				self::autoload_dir( $path, $max_scan_depth, $load_file, $current_depth + 1 );
				
			}
		}
	}

	/**
	 * Returns widgets uri / path
	 **/
	public static function get_widgets_uri( $widget_name, $path = '' ) {
		return \FLEXBOX()->Config['widgets_uri'] . '/' . $widget_name . '/' . $path;
	}
	
	public static function get_widgets_dir( $widget_name, $path = '' ) {
		return \FLEXBOX()->Config['widgets_uri'] . '/' . $widget_name . '/' . $path;
	}

	/**
	 * Calculate bytes
	 **/
	public static function return_bytes( $val) {
		$val = absint( $val );
		$last = strtolower( $val[ strlen( $val)-1]);
		switch($last) {
			case 'g':
				$val *= 1024;
			case 'm':
				$val *= 1024;
			case 'k':
				$val *= 1024;
		}
		return $val;
	}

}
