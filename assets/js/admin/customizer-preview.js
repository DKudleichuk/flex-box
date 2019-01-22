(function ($) {

	"use strict";

	window.themeCustomizerPreview = {

		/**
			Build customizer custom elements and handle events
		 **/
		init: function () {

			// Selective refresh support
			this.initSelectiveRefresh();

		},

		/**
		 * Selective refresh support
		 */
		initSelectiveRefresh: function() {

			/**
			 * Header text color
			 */
			wp.customize( 'header_textcolor', function( value ) {
        value.bind( function( to ) {
          $('#header .text-logo, #header .text-logo-tagline, #header .menu > li > a').css('color', to );
        });
			});

			/**
			 * Breadcrumbs background image
			 */
			wp.customize( 'breadcrumbs_bg_image', function( value ) {
        value.bind( function( src ) {
          $('.breadcrumbs').css('background-image', 'url(' + src + ')' );
        });
			});

		}

	}

	window.themeCustomizerPreview.init();

})(window.jQuery);
