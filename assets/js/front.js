(function ($) {

	"use strict";

	window.themeFront = {

		/**
			Build page elements and handle events
		 **/
		init: function () {

			this.loadGoogleFonts();
			this.setupHeader();
			this.setupContent();
			this.makeResponsiveVideos();

		},

		/**
		 * Load Google Fonts
		 **/
		loadGoogleFonts: function () {

			WebFont.load({google: {families: ["Roboto:400,700", "Raleway:700"]}});

		},

		/**
		 * Setup page header
		 */
		setupHeader: function() {

			var $menu = $('#header ul.menu');

			// Mobile menu toggler
			$('#mobile-menu-toggler').on( 'click', function() {
				$(this).toggleClass( 'is-active');
				$menu.toggleClass( 'open');
				return false;
			});

			// Append togglers for mobile menu
			$menu.find('.menu-item-has-children').append('<span class="mobile-submenu-toggler"></span>');

			$('.mobile-submenu-toggler').on( 'click', function() {
				$(this).toggleClass('open').prev('.sub-menu').toggleClass('open');
			});

		},

		/**
		 * Setup content
		 */
		setupContent: function() {

			// Select first word of every paragraph in post format chat
			$('.format-chat p').each(function(){
				var text_splited = $(this).text().split(" ");
				$(this).html("<strong>" + text_splited.shift() + "</strong> <div>" + text_splited.join(" ") + '</div>' );
			});

			// Post format gallery carousel
			$('.format-gallery .carousel').slick({
				lazyLoad: 'ondemand',
				infinite: true,
				slidesToShow: 1,
				slidesToScroll: 1,
				fade: true,
				adaptiveHeight: true,
				dots: true,
				arrows: true
			});

		},

		/**
		 * Make responsive videos
		 */
		makeResponsiveVideos: function() {

			$('iframe').each( function() {

				var $iframe = $( this),
				url = $iframe.attr( 'src'),
				delimeter = url.indexOf( '?') > 0 ? '&' : '?';

				$iframe.attr({
					"src" : url + delimeter + 'wmode=transparent',
					"wmode" : "opaque"
				});

			});

			$('.format-video iframe').wrap('<div class="responsive-video-wrapper"></div>');

		},

		/** Check for mobile device **/
		isMobile: function () {
			return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
		},
		stringToBoolean: function( string) {

			switch (string) {
				case "true":
				case "yes":
				case "1":
					return true;
				case "false":
				case "no":
				case "0":
				case null:
				case '':
					return false;
				default:
					return Boolean(string);
			}

		},
		/** Check email address **/
		isValidEmailAddress: function( emailAddress) {
			var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
			return pattern.test(emailAddress);
		}

	}

	window.themeFront.init();

})(window.jQuery);
