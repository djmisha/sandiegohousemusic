(function($) {

	if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent ) ) {$("html").addClass("is--device"); if (/iPad/i.test(navigator.userAgent)) {$("html").addClass("is--ipad"); } } else {$("html").addClass("not--device"); }

	$(function() {
		//doc.ready[shorthand] start

		var $desktop = 1080;
		var $tablet = 768;
		var theme_path = rm_data.tmplDirUri;
		var site_path = rm_data.siteUrl;


		/* Homepage Slideshow */

		// $('.main-carousel').flickity({
		//   cellAlign: 'left',
		//   contain: true,
		//   autoPlay: 4000,
		//   fade: true, 
		// });

		/* Infinite Scroll */

		$('.tmpl_type_category .post-snippet').infiniteScroll({
		  path: '.next',
		  append: '.excerpt',
		  history: false,
		});


		/*=============================
		=            Blazy            =
		=============================*/
		
		var bLazy = new Blazy();
		
		
		/* Append Navigation Items */
		
		$(".tmpl_type_page_landing .site-crumbs").appendTo("header");
		// $(".tmpl_type_page_landing .page-title").appendTo("header");


		/* sTick the Add fixed when scrolling down*/

		var stickyAddTop = 0;

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
						$(".parallax-footer").parallax("50%", -0.1, true, "is-parallaxing");
						$(".parallax-inside").parallax("50%", -0.3, true, "is-parallaxing");
					});
				}
			}
		});
		
	}); // end of doc.ready
})(jQuery);


