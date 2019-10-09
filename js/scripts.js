
(function($) {

	if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent ) ) {$("html").addClass("is--device"); if (/iPad/i.test(navigator.userAgent)) {$("html").addClass("is--ipad"); } } else {$("html").addClass("not--device"); }

	$(function() {
		//doc.ready[shorthand] start

		var $desktop = 1080;
		var $tablet = 768;
		var theme_path = rm_data.tmplDirUri;
		var site_path = rm_data.siteUrl;

		/*=============================
		=            Blazy            =
		=============================*/
		
		var bLazy = new Blazy();
		


// ADD LIKE FUNCTIONALITY 




		/* --------------------------------------------------
			Owl Carousel HomePage
		-------------------------------------------------- */

			$('.owl-rotator').owlCarousel({
				items:3,
				margin:20,
				lazyLoad:true,
				loop:true,
				nav:true,
				dots:false,
				autoplay: true,
				autoplayTimeout: 9000,
				smartSpeed: 1000,
				navText : ["<span class=\"button\"><i class='fa fa-angle-left'></i></span>"
							,"<span class=\"button\"><i class='fa fa-angle-right'></i></span>"],
				responsive:{
				        0:{
				            items:1
				        },
				        768:{
				            items:3
				        }
				    }
			});




		/* Infinite Scroll on Category Pages */

		// $('.tmpl_type_category .post-snippet').infiniteScroll({
		//   path: '.next',
		//   append: '.excerpt',
		//   history: false,
		// });


		
		/* Append Navigation Items */
		
		// $(".tmpl_type_page_landing .site-crumbs").appendTo("header");
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
						// $(".parallax-welcome").parallax("50%", -0.3, true, "is-parallaxing");
						// $(".parallax-header").parallax("50%", -0.3, true, "is-parallaxing");
						$(".parallax-footer").parallax("50%", -0.1, true, "is-parallaxing");
						// $(".parallax-inside").parallax("50%", -0.3, true, "is-parallaxing");
					});
				}
			}
		});
		
	}); // end of doc.ready
})(jQuery);


/* Attach Video on Homepage*/

function attachVideo() {
  var myVideoWrap = document.querySelector('.welcome .home-video');
      
  if(myVideoWrap) {
	  var theme_path = rm_data.tmplDirUri;
	  var mobileVideo ='video-mobile.mp4';
	  var desktopVideo ='video-desktop.mp4';
	  let thevid = "";

    if(window.innerWidth > 768) {
       thevid = desktopVideo;
    }
    else {
       thevid = mobileVideo;
    }

	myVideoWrap.innerHTML = createVideoMarkup(thevid);

  	function createVideoMarkup(item) {
  		let videoMarkup = '<video playsinline autoplay muted loop poster=\"' + theme_path + '/images/slide-1.jpg\" class=\"bgvid\"><source src=\"' + theme_path + '/images/' + item +'\" type=\"video/mp4\"></video>';
  		return videoMarkup;
  	}
  }
}

attachVideo();

/* Load Social Feeds */

function showTwitter() {

	/* todo
		- create iframe using JS
		- select all social icons
			add data attrbute in the markup 
			for each social icon add a mouse enter event 
			on hover get data attr for icon, 
			set a variable to data attr 
			the 
			feedFrame.scr = socialMedia.variable.link


	*/
	// var socialMedia = {
	// 	twitter: {
	// 		link:'';
	// 		btnclass:'';
	// 	}
	// };
	
	// var socialMedia = [
	// 	{
	// 		name: 'twitter', 
	// 		link: 'feed-twitter.html',
	// 		btnclass: 'fa-twitter'
	// 	},
	// 	{
	// 		name: 'facebook', 
	// 		link: 'feed-facebook.html',
	// 		btnclass: 'fa-facebook'
	// 	},
	// 	{
	// 		name: 'instagram', 
	// 		link: 'feed-instagram.html',
	// 		btnclass: 'fa-instagram'
	// 	},
	// ];

	var theme_path = rm_data.tmplDirUri;

	var twitterScript = 'https://sandiegohousemusic.com/wordpress/wp-content/themes/sandiegohousemusic/feed-twitter.html';
	var twitterButton = document.querySelector('.get-social a i.fa-twitter');


	var feedWrapper = document.querySelector('.social-feed');
	var feedFrame = document.querySelector('.social-feed .the-feed iframe'); 
	var feedClose = document.querySelector('.close-feed');

	// console.log(twitterScript);

	twitterButton.addEventListener('mouseenter', function(event) {
		event.preventDefault;
		feedFrame.src = twitterScript;
		feedWrapper.classList.add('active');
		twitterButton.classList.add('active');
	})

	feedClose.addEventListener('click', function(event) {
		event.preventDefault;
		feedWrapper.classList.remove('active');
		twitterButton.classList.remove('active');
	})
};

showTwitter();






/**/


function countLikes(button, counter) {
	var likeButton = document.querySelectorAll('.the-like-button');
	var allButtons = [];
	for(let i = 0; likeButton.length > i; i++) {
		// likeButton[i];
		likeButton[i].push(allButtons);
	}
		// console.log(allButtons);

	// likeButton.addEventListener('click', function(event) {
	// 	console.log('clicked!');
	// });

	// console.log(likeButton)
}

countLikes();



// (fuction() {
// 	var loadSocialFeed(type, button, tracker) {
// 		var theHungryFeed = this.type;
// 		var theButton = this.button;

// 		function attachFeedToPage() {
// 			theButton.addEventListener('click', function (event) {
// 				event.preventDefault;
// 			});
// 		}
// 	}
// });










// function showfacebook() {
// 	var facebookScript = 'This is the script';
// 	var facebookButton = document.querySelector('.get-social a i.fa-facebook');
// 	var facebookFeed = document.querySelector('.social-feed');
// 	var facebookClose = document.querySelector('.close-feed');

// 	facebookButton.addEventListener('mouseenter', function(event) {
// 		event.preventDefault;
// 		facebookFeed.classList.add('active');
// 		facebookButton.classList.add('active');
// 	})

// 	facebookClose.addEventListener('click', function(event) {
// 		event.preventDefault;
// 		facebookFeed.classList.remove('active');
// 		facebookButton.classList.remove('active');
// 	})
// };

// showTwitter();







