<?php

namespace Flexbox\View;

/**
 * Anything to do with templates
 * and outputting client code
 **/
class View {
	
	/**
	 * Load view. Used on back-end side
	 *
	 * @throws \Exception
	 **/
	function load( $path = '', $data = [], $return = false, $base = null ) { 

		if ( is_null( $base ) ) {
			$base = get_stylesheet_directory();
		}
		
		$full_path = $base . $path . '.php';
		
		if ( $return ) {
			ob_start();
		}
		
		if ( file_exists( $full_path ) ) {
			require $full_path;
		} else {
			throw new \Exception( 'The view path ' . $full_path . ' can not be found.' );
		}
		
		if ( $return ) {
			return ob_get_clean();
		}
		
	}

}
