<?php

/**
 * Core config
 **/

return [
	'cache_time'      => '260920181044',
	'assets_uri'  		=> get_theme_file_uri( '/assets/' ),
	'widgets_dir'     => get_theme_file_path( '/App/Widget/' ),
	'widgets_uri'     => get_theme_file_uri( '/App/Widget/' ),
	'social_icons' => [
		'facebook' 		=> 'fontello icon-facebook-official',
		'twitter' 		=> 'fontello icon-twitter-squared',
		'tumblr' 			=> 'fontello icon-tumblr-squared',
		'pinterest' 	=> 'fontello icon-pinterest-squared',
		'vimeo' 			=> 'fontello icon-vimeo-squared',
		'linkedin' 		=> 'fontello icon-linkedin-squared',
	],
	'fonts' => [
		'font-family-monospace' 						=> 'monospace',
		'font-family-primary' 							=> '"Roboto", sans-serif',
		'font-family-secondary' 						=> '"Raleway", sans-serif',
		'font-family-icons' 								=> 'fontello',
	],
	'colors' => [
		'color-accent-red' 									=> '#e5493a',
		'color-accent-green' 								=> '#8dc63f',
		'color-accent-blue' 								=> '#00aeef',
		'color-accent-black' 								=> '#252525',
		'color-accent-inner' 								=> '#fff',
		'color-text' 												=> '#555',
		'color-text-light' 									=> '#959595',
		'color-headers' 										=> '#333',
		'color-grey' 												=> '#f5f5f5',
		'color-light-grey' 									=> '#fafafa',
		'color-borders' 										=> '#ebebeb',
		'color-overlay' 										=> 'rgba( 54, 54, 54, 0.85)',
		'header-link-color' 								=> '#555',
		'header-link-hover-color' 					=> '#e5493a',
		'header-icons-color' 								=> '#ccc',
		'header-accent-color' 							=> '#e5493a',
		'header-accent-inner-color' 				=> '#fff',
		'header-dropdown-bg-color' 					=> '#fafafa',
		'header-dropdown-link-color' 				=> '#636363',
		'header-dropdown-hover-link-color' 	=> '#e5493a',
		'header-dropdown-separator-color' 	=> '#f2f2f2',
		'header-dropdown-icon-color' 				=> '#ccc',
		'footer-bg-color' 									=> '#252525',
		'footer-bar-bg-color' 							=> '#111',
		'footer-text-color' 								=> '#636363',
		'footer-link-color' 								=> '#959595',
		'footer-link-hover-color' 					=> '#e5493a',
		'footer-headers-color' 							=> '#fff',
		'footer-borders-color' 							=> '#363636',
	],
	'customizer_lang_vars' => [
		'font-family-monospace' 						=> __( 'Monospace font family', 'flex-box'),
		'font-family-primary' 							=> __( 'Primary font family', 'flex-box'),
		'font-family-secondary' 						=> __( 'Secondary font family', 'flex-box'),
		'font-family-icons' 								=> __( 'Iconic font', 'flex-box'),
		'color-accent-red' 									=> __( 'Primary accent color', 'flex-box'),
		'color-accent-green' 								=> __( 'Secondary accent color', 'flex-box'),
		'color-accent-blue' 								=> __( 'Third accent color', 'flex-box'),
		'color-accent-black' 								=> __( 'Fourth accent color', 'flex-box'),
		'color-accent-inner' 								=> __( 'Accent inner color', 'flex-box'),
		'color-text' 												=> __( 'Text color', 'flex-box'),
		'color-text-light' 									=> __( 'Light text color', 'flex-box'),
		'color-headers' 										=> __( 'Headers color', 'flex-box'),
		'color-grey' 												=> __( 'Grey color', 'flex-box'),
		'color-light-grey' 									=> __( 'Light Grey color', 'flex-box'),
		'color-borders' 										=> __( 'Borders color', 'flex-box'),
		'color-overlay' 										=> __( 'Overlay color', 'flex-box'),
		'header-link-color' 								=> __( 'Header: Link color', 'flex-box'),
		'header-link-hover-color' 					=> __( 'Header: Link hover color', 'flex-box'),
		'header-icons-color' 								=> __( 'Header: Icons color', 'flex-box'),
		'header-accent-color' 							=> __( 'Header: Accent color', 'flex-box'),
		'header-accent-inner-color' 				=> __( 'Header: Accent inner color', 'flex-box'),
		'header-dropdown-bg-color' 					=> __( 'Header: Dropdown bg color', 'flex-box'),
		'header-dropdown-link-color' 				=> __( 'Header: Dropdown link color', 'flex-box'),
		'header-dropdown-hover-link-color' 	=> __( 'Header: Dropdown hover link color', 'flex-box'),
		'header-dropdown-separator-color' 	=> __( 'Header: Dropdown separator color', 'flex-box'),
		'header-dropdown-icon-color' 				=> __( 'Header: Dropdown icon color', 'flex-box'),
		'footer-bg-color' 									=> __( 'Footer: Background color', 'flex-box'),
		'footer-bar-bg-color' 							=> __( 'Footer: Bottom bar background color', 'flex-box'),
		'footer-text-color' 								=> __( 'Footer: Text color', 'flex-box'),
		'footer-link-color' 								=> __( 'Footer: Links color', 'flex-box'),
		'footer-link-hover-color' 					=> __( 'Footer: Links hover color', 'flex-box'),
		'footer-headers-color' 							=> __( 'Footer: Headers color', 'flex-box'),
		'footer-borders-color' 							=> __( 'Footer: Borders color', 'flex-box'),
	],
	'starter_content' => [
		'attachments' => [
			'demo_image_1' => [
				'post_title' => 'Demo image 1',
				'file' => 'assets/images/demo/demo-photo-1.jpg'
			],
		],
		'posts' => [
			'home',
			'blog',
			'about' => [
				'post_type' => 'page',
				'post_title' => 'About',
				'post_name' => 'about',
				'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut semper ex. Sed pellentesque justo id urna placerat, rutrum aliquet urna tempus. Aliquam turpis libero, efficitur at malesuada nec, pulvinar id metus. Nunc vel condimentum arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse potenti. Integer molestie enim nec nisi semper blandit. Maecenas a blandit turpis. Nulla facilisi. Aenean a nibh nulla. Nulla porttitor diam vel lacinia volutpat. Mauris ultricies nunc eget ipsum suscipit eleifend. Fusce finibus in enim vel consequat. Pellentesque nec varius ex. Maecenas ligula odio, lacinia a efficitur et, fringilla in tortor.

				Quisque commodo, metus non ultricies sodales, augue dolor porttitor nibh, sit amet euismod leo arcu eget quam. Maecenas finibus massa in nisl tincidunt, vel tempor ante porta. Sed et mollis augue. Nam congue mollis enim, efficitur sagittis neque porta et. Phasellus fermentum mattis nunc vitae viverra. Sed arcu ante, laoreet vel pellentesque quis, dapibus sed lectus. Nam vehicula ante in nulla finibus convallis. Quisque dictum massa eu tortor facilisis, eget tincidunt elit hendrerit. Nunc blandit tortor et turpis dapibus tincidunt. Donec pretium malesuada massa id fringilla. Mauris leo metus, mattis faucibus interdum vitae, efficitur a nunc. Proin gravida orci eget mi congue pulvinar. Aliquam efficitur magna eu turpis congue ultrices. Pellentesque accumsan tellus nunc, et hendrerit nunc pharetra in.
				
				Ut eget vehicula ante, placerat aliquam quam. Etiam lacinia, ante quis maximus vestibulum, dolor mauris venenatis est, vitae bibendum ex lacus eget diam. Vivamus commodo leo a sollicitudin interdum. Donec non sem at nulla consequat blandit vitae ut neque. Aenean cursus lobortis enim ut tristique. Phasellus et consectetur dui. Donec at ex non velit tempus lacinia. Integer at sapien mi.
				
				In hac habitasse platea dictumst. Suspendisse a leo at lorem vehicula dignissim vel a erat. Nam neque orci, accumsan sit amet sodales sed, fringilla quis quam. Donec posuere eleifend dui, vitae tempor metus porttitor id. Donec id finibus ligula. Maecenas cursus tempus tortor ut euismod. Mauris vel interdum nisl. Mauris vitae metus fringilla, imperdiet nisl vitae, interdum libero. Aenean tempus hendrerit laoreet. Donec nec lacus fringilla, mollis ipsum ut, scelerisque dui.
				
				Vivamus dignissim suscipit pretium. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent bibendum sed libero id egestas. Fusce a dolor nec eros vulputate laoreet ut eu risus. Fusce sit amet ipsum at ex tincidunt lobortis. Suspendisse ligula nibh, cursus egestas laoreet ac, dictum ut enim. Curabitur non urna eget velit eleifend tristique. Mauris ac nunc diam.'
			],
			'contact' => [
				'post_type' => 'page',
				'post_title' => 'Contact',
				'post_name' => 'contact',
				'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut semper ex. Sed pellentesque justo id urna placerat, rutrum aliquet urna tempus. Aliquam turpis libero, efficitur at malesuada nec, pulvinar id metus. Nunc vel condimentum arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse potenti. Integer molestie enim nec nisi semper blandit. Maecenas a blandit turpis. Nulla facilisi. Aenean a nibh nulla. Nulla porttitor diam vel lacinia volutpat. Mauris ultricies nunc eget ipsum suscipit eleifend. Fusce finibus in enim vel consequat. Pellentesque nec varius ex. Maecenas ligula odio, lacinia a efficitur et, fringilla in tortor.

				Quisque commodo, metus non ultricies sodales, augue dolor porttitor nibh, sit amet euismod leo arcu eget quam. Maecenas finibus massa in nisl tincidunt, vel tempor ante porta. Sed et mollis augue. Nam congue mollis enim, efficitur sagittis neque porta et. Phasellus fermentum mattis nunc vitae viverra. Sed arcu ante, laoreet vel pellentesque quis, dapibus sed lectus. Nam vehicula ante in nulla finibus convallis. Quisque dictum massa eu tortor facilisis, eget tincidunt elit hendrerit. Nunc blandit tortor et turpis dapibus tincidunt. Donec pretium malesuada massa id fringilla. Mauris leo metus, mattis faucibus interdum vitae, efficitur a nunc. Proin gravida orci eget mi congue pulvinar. Aliquam efficitur magna eu turpis congue ultrices. Pellentesque accumsan tellus nunc, et hendrerit nunc pharetra in.
				
				Ut eget vehicula ante, placerat aliquam quam. Etiam lacinia, ante quis maximus vestibulum, dolor mauris venenatis est, vitae bibendum ex lacus eget diam. Vivamus commodo leo a sollicitudin interdum. Donec non sem at nulla consequat blandit vitae ut neque. Aenean cursus lobortis enim ut tristique. Phasellus et consectetur dui. Donec at ex non velit tempus lacinia. Integer at sapien mi.
				
				In hac habitasse platea dictumst. Suspendisse a leo at lorem vehicula dignissim vel a erat. Nam neque orci, accumsan sit amet sodales sed, fringilla quis quam. Donec posuere eleifend dui, vitae tempor metus porttitor id. Donec id finibus ligula. Maecenas cursus tempus tortor ut euismod. Mauris vel interdum nisl. Mauris vitae metus fringilla, imperdiet nisl vitae, interdum libero. Aenean tempus hendrerit laoreet. Donec nec lacus fringilla, mollis ipsum ut, scelerisque dui.
				
				Vivamus dignissim suscipit pretium. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent bibendum sed libero id egestas. Fusce a dolor nec eros vulputate laoreet ut eu risus. Fusce sit amet ipsum at ex tincidunt lobortis. Suspendisse ligula nibh, cursus egestas laoreet ac, dictum ut enim. Curabitur non urna eget velit eleifend tristique. Mauris ac nunc diam.'
			],
		],
		'widgets' => [
			'sidebar' => [
				'search',
				'archives',
				'meta'
			],
			'sidebar-footer-1' => [
				'recent-posts'
			],
			'sidebar-footer-2' => [
				'recent-comments',
			],
			'sidebar-footer-3' => [
				'archives',
			],
			'sidebar-footer-4' => [
				'meta'
			],
		],
		'options' => [
			'show_on_front' => 'posts'
		],
		'theme_mods' => [
			'footer_cta_display' 					=> 'yes',
			'footer_cta_title' 						=> __('The Flexbox Starter Theme', 'flex-box'),
			'footer_cta_text' 						=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquet justo vitae mattis egestas. Morbi elementum accumsan ante sagittis imperdiet.',
			'footer_cta_btn1_text' 				=> __('Preview', 'flex-box'),
			'footer_cta_btn2_text' 				=> __('Install', 'flex-box'),
			'header_menu_display_cart' 		=> 'yes',
			'header_menu_display_search' 	=> 'yes',
			'header_display_breadcrumbs' 	=> 'yes',
			'header_display_top_bar' 			=> 'yes',
			'facebook_url' 								=> '//facebook.com',
			'twitter_url' 								=> '//twitter.com',
			'linkedin_url' 								=> '//linkedin.com',
			'tumblr_url' 									=> '//tumblr.com',
			'pinterest_url' 							=> '//pinterest.com',
			'vimeo_url' 									=> '//vimeo.com',
		],
		'nav_menus' => [
			'header_menu' => [
				'name' => 'Header Menu',
				'items' => [
					'link_home',
					'page_about',
					'page_contact'
				]
			]
		]
	]
];