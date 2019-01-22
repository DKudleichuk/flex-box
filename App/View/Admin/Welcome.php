<div class="wrap">

	<h1><a href="https://wpguide.me/" target="_blank"><img class="flexbox-wpguide-logo" width="250" src="<?php echo get_template_directory_uri(); ?>/assets/images/wpguide.me_logo.svg" alt="WPGuide.Me"></a></h1>

	<div class="flexbox-main-welcome-box welcome-panel">
		<div class="welcome-panel-content">

			<h2><?php printf( __('Welcome to the Flexbox Starter Theme v%s', 'flex-box' ), wp_get_theme()->get( 'Version' ) ); ?></h2>

			<p><?php printf( __( 'Hi, %s! And here is a Big Thank You for downloading and using this product. Be sure that it is absolutely free and always will be only free: this theme is my gratitude to WordPress developers, volunteers, users and the whole WordPress community. I hope that you will find it useful when creating your next web sites.', 'flex-box'), $data['current_user']->display_name ); ?></p>

		</div>
	</div>

	<div id="welcome-panel" class="flexbox-main-welcome-box welcome-panel">
		<div class="welcome-panel-content">

			<div class="flex-box">
				<div class="flex-col">
					<div class="flex-col-inner">
						<h2><?php _e( 'System health status', 'flex-box'); ?></h2>

						<hr>

						<?php
							global $wp_version, $wpdb;

							$debug_active = defined('WP_DEBUG') && WP_DEBUG ? 'Enabled' : 'Disabled';
							$gzip_active = class_exists( 'ZipArchive' ) ? 'Enabled' : 'Disabled';
							$child_active = is_child_theme() ? 'Active' : 'Not used';
							$zip_active = extension_loaded('zip') ? 'Enabled' : 'Disabled';
							$curl_active = function_exists('curl_version') ? 'Enabled' : 'Disabled';
							$memory_limit = \Flexbox\Helper\Utils::return_bytes( ini_get('memory_limit') );
							$is_multisite = is_multisite() ? 'Yes' : 'No';
							$plugins_list = array();
							$active_plugins = (array) get_option( 'active_plugins', array() );

							if ( $is_multisite ) {
								$active_plugins = array_merge( $active_plugins, get_site_option( 'active_sitewide_plugins', array() ) );
							}

							foreach ( $active_plugins as $plugin) {
								$plugin_data = @get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
								if( $plugin_data['Name'] <> '' ) {
									$plugins_list[] = esc_html( $plugin_data['Name'] );
								}
							}

							$info = '
Website URL: ' . get_option('siteurl') . '
Home URL: ' . home_url() . '
Host: ' . $_SERVER['SERVER_NAME'] . '
Multisite: ' . $is_multisite . '

WordPress version: ' . $wp_version . '
Active plugins: ' . implode(', ', $plugins_list) . '
Language: ' . get_locale() . '
WP Debug: ' . $debug_active . '

Theme version: ' . wp_get_theme()->get('Version') . '
Child theme: ' . $child_active . '

Server software: ' . $_SERVER['SERVER_SOFTWARE'] . '
GZip: ' . $gzip_active . '
MySQL version: ' . $wpdb->get_var( 'SELECT VERSION();' ) . '
PHP version: ' . PHP_VERSION . '
PHP memory limit: ' . $memory_limit . '
PHP Zip: ' . $zip_active . '
CURL: ' . $curl_active . '
PHP post max size: ' . ini_get('post_max_size') . '
PHP max upload size: ' . size_format( wp_max_upload_size() ) . '
PHP max input vars: ' . ini_get('max_input_vars') . '
PHP max flexboxcution time: ' . ini_get('max_flexboxcution_time') . '
';
						?>
						<p><textarea readonly="readonly" style="width: 100%; height: 500px;"><?php echo wp_kses_post( $info ); ?></textarea></p>

						<p><?php _e( 'Please do not forget to provide us following information within your support tickets, it will help us to determine and resolve your possible problem much faster.', 'flex-box'); ?></p>
					</div>

				</div>
				<div class="flex-col">
					<div class="flex-col-inner">
						<h2><?php _e( 'Changelog', 'flex-box'); ?></h2>

						<hr>

						<p><textarea readonly="readonly" style="width: 100%; height: 500px;">
29/11/2018 - First release</textarea></p>
					</div>

				</div>
			</div>

		</div>
	</div>

</div>