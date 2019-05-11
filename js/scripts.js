(function($) {

	if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent ) ) {$("html").addClass("is--device"); if (/iPad/i.test(navigator.userAgent)) {$("html").addClass("is--ipad"); } } else {$("html").addClass("not--device"); }

	$(function() {
		//doc.ready[shorthand] start

		var $desktop = 1080;
		var $tablet = 768;
		var theme_path = rm_data.tmplDirUri;
		var site_path = rm_data.siteUrl;


		/* Homepage Slideshow */

		$('.main-carousel').flickity({
		  cellAlign: 'left',
		  contain: true,
		  autoPlay: 4000,
		  fade: true, 
		});

		/* Infinite Scroll */

		$('.tmpl_type_category .post-snippet').infiniteScroll({
		  path: '.next',
		  append: '.excerpt',
		  history: false,
		});


		// $('.tmpl_type_single .interior').infiniteScroll({
		//   path: '.prev-blog-button',
		//   append: '.content',
		//   history: false,
		// });

		/* Append Navigation Items */
		
		$(".tmpl_type_page_landing .site-crumbs").appendTo("header");
		// $(".tmpl_type_page_landing .page-title").appendTo("header");


		/* sTick the Add fixed when scrolling down*/

		var stickyAddTop = 225;

		var stickyAdvertisement = function() {
			var scrollTop = $(window).scrollTop();

			if (scrollTop > stickyAddTop) {
				$(".sidebar-add").addClass("stick-me");
			} else {
				$(".sidebar-add").removeClass("stick-me");
			}
		};

		stickyAdvertisement();

		$(window).scroll(function() {
			stickyAdvertisement();
		});




		var stickyContactTop = 800;

		var stickyContact = function(){
			var scrollTop = $(window).scrollTop();

			if (scrollTop > stickyContactTop) {
				$('.footer-show-form').addClass('hithere');
			} else {
				$('.footer-show-form').removeClass('hithere');
			}
		};

		stickyContact();

		$(window).scroll(function() {
			stickyContact();
		});




		/*Show hide Contact forms*/
		$('.show-form').click(function(event) {
			/* Act on the event */
			$('#overlay-contact-form').addClass('show-form');
		});

		$('.close-form').click(function(event) {
			/* Act on the event */
			$('#overlay-contact-form').removeClass('show-form');
		});


		/*================================
		=            Parallax            =
		================================*/

		$(window).on("load resize", function(e) {
			if ($("html").hasClass("is--device")) {
				if ($(".is-parallaxing").length > 0) {
					$(".will-parallax")
						.removeClass("is-parallaxing")
						.removeAttr("style");
				}
			} else {
				$(".will-parallax").addClass("parallax");
				$(".will-parallax").addClass("is-parallaxing");

				if ($(".will-parallax").hasClass("parallax")) {
					$(".parallax").waypoint(function() {
						$(".parallax-welcome").parallax("50%", -0.3, true, "is-parallaxing");
						$(".parallax-header").parallax("50%", -0.3, true, "is-parallaxing");
						$(".parallax-footer").parallax("50%", 0.3, true, "is-parallaxing");
						$(".parallax-inside").parallax("50%", -0.3, true, "is-parallaxing");
					});
				}
			}
		});




		/*===============================================
		=            Smooth Anchor Scrolling            =
		===============================================*/
		// Select all links with hashes
		$('a[href*="#"]')
			// Remove links that don't actually link to anything
			.not('[href="#"]')
			.not('[href="#0"]')
			.click(function(event) {
				// On-page links
				if (
					location.pathname.replace(/^\//, "") ==
						this.pathname.replace(/^\//, "") &&
					location.hostname == this.hostname
				) {
					// Figure out element to scroll to
					var target = $(this.hash);
					target = target.length
						? target
						: $("[name=" + this.hash.slice(1) + "]");
					// Does a scroll target exist?
					if (target.length) {
						// Only prevent default if animation is actually gonna happen
						event.preventDefault();

						// if ($("html").hasClass("not--device")) {
						$("html, body").animate(
							{
								scrollTop: target.offset().top
							},
							1200,
							function() {
								// Callback after animation
								// Must change focus!
								var $target = $(target);
								$target.focus();
								if ($target.is(":focus")) {
									// Checking if the target was focused
									return false;
								} else {
									// $target.attr("tabindex", "-1"); // Adding tabindex for elements not focusable
									// $target.focus(); // Set focus again
								}
							}
						);
						// }
					}
				}
			});
	}); // end of doc.ready
})(jQuery);
