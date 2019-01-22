<?php

// nice dump function

if ( ! function_exists( 'wp_dump' ) ) {
	function wp_dump( ...$params ) {
		echo '<pre style="text-align: left; font-family: \'Courier New\'; font-size: 12px;line-height: 20px;background: #efefef;border: 1px solid #777;border-radius: 5px;color: #333;padding: 10px;margin:0;overflow: auto;overflow-y: hidden;">';
		var_dump( $params );
		echo '</pre>';
	}
}
