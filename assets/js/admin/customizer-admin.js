(function ($) {

	"use strict";

	window.themeCustomizerAdmin = {

		/**
			Build customizer custom elements and handle events
		 **/
		init: function () {

			// add "Reset Customizations" button
			this.addResetButton();

		},

		/**
		 * Add "Reset" button to WP Customizer
		 **/
		addResetButton: function() {

			var $container = $('#customize-header-actions'),
			$button = $('<input type="submit" name="customizer-reset" id="customizer-reset" value="' + themeCustomizerJsVars.langStrReset + '" class="button button-secondary">');

			$container.prepend( $button);

			$button.css({
				'float': 'right',
				'margin-left': '10px',
				'margin-top': '9px'
			});

			$button.on( 'click', function( event) {
				event.preventDefault();
	
				var data = {
					wp_customize: 'on',
					action: 'customizer_reset',
					nonce: themeCustomizerJsVars.nonce.customizerReset
				};
	
				var areYouSure = confirm( themeCustomizerJsVars.langStrConfirm );

				if( ! areYouSure ) {
					return;
				} 

				$button.attr( 'disabled', 'disabled');

				$.post( ajaxurl, data, function() {
					wp.customize.state( 'saved').set( true);
					location.reload();
				});

			});

		}

	}

	window.themeCustomizerAdmin.init();

})(window.jQuery);
