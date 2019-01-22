<?php

namespace Flexbox\Controller;

/**
 * Controller that builds global theme layout using actions
 **/
class LayoutGlobal {
	
	/**
	 * Constructor
	 **/
	function __construct() {

		// Header
		add_action( 'flexbox_before_header', [ $this, 'before_header'] );
		add_action( 'flexbox_header', [ $this, 'header'] );
		add_action( 'flexbox_after_header', [ $this, 'after_header'] );

		// Footer
		add_action( 'flexbox_before_footer', [ $this, 'before_footer'] );
		add_action( 'flexbox_footer', [ $this, 'footer'] );
		add_action( 'flexbox_after_footer', [ $this, 'after_footer'] );

		// Grid
		add_action( 'flexbox_layout_start', [ $this, 'layout_start'] );
		add_action( 'flexbox_layout_end', [ $this, 'layout_end'] );

		// Sidebar
		add_action( 'flexbox_sidebar', [ $this, 'sidebar'] );

		// Page 404
		// add_action( 'flexbox_before_page_404_content', [ $this, 'before_page_404_content'] );
		add_action( 'flexbox_page_404_content', [ $this, 'page_404_content'] );
		// add_action( 'flexbox_after_page_404_content', [ $this, 'after_page_404_content'] );

		// Loops
		add_action( 'flexbox_before_loop', [ $this, 'before_loop'] );
		add_action( 'flexbox_after_loop', [ $this, 'after_loop'] );

	}
	
	/**
	 * Template layout hook
	 * flexbox_before_header
	 */
	function before_header() {

		get_template_part( '/template-parts/header/top-bar');

	}

	/**
	 * Template layout hook
	 * flexbox_header
	 */
	function header() {

		get_template_part( '/template-parts/header/header-default');

	}

	/**
	 * Template layout hook
	 * flexbox_after_header
	 */
	function after_header() {

		get_template_part( '/template-parts/header/breadcrumbs');

	}

	/**
	 * Template layout hook
	 * flexbox_before_footer
	 */
	function before_footer() {

		get_template_part( '/template-parts/footer/cta');

	}

	/**
	 * Template layout hook
	 * flexbox_footer
	 */
	function footer() {

		get_template_part( '/template-parts/footer/4_columns');

	}

	/**
	 * Template layout hook
	 * flexbox_after_footer
	 */
	function after_footer() {

	}

	/**
	 * Template layout hook
	 * flexbox_layout_start
	 */
	function layout_start() {

		get_template_part( '/template-parts/layout/start');

	}

	/**
	 * Template layout hook
	 * flexbox_layout_end
	 */
	function layout_end() {

		get_template_part( '/template-parts/layout/end');

	}

	/**
	 * Template layout hook
	 * flexbox_sidebar
	 */
	function sidebar() {

		get_template_part( '/template-parts/sidebar');

	}

	/**
	 * Template layout hook
	 * flexbox_before_page_404_content
	 */
	function before_page_404_content() {

	}

	/**
	 * Template layout hook
	 * flexbox_page_404_content
	 */
	function page_404_content() {

		get_template_part( '/template-parts/page_404_content');

	}

	/**
	 * Template layout hook
	 * flexbox_after_page_404_content
	 */
	function after_page_404_content() {

	}


	/**
	 * Template layout hook
	 * flexbox_before_loop
	 */
	function before_loop() {

		get_template_part( '/template-parts/loop/before');

	}

	/**
	 * Template layout hook
	 * flexbox_after_loop
	 */
	function after_loop() {

		get_template_part( '/template-parts/pagination');
		get_template_part( '/template-parts/loop/after');

	}

}
