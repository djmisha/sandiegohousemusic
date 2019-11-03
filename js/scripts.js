
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





		/* Make it count likes */

		function countLikes() {
			
			var engageBar = document.querySelectorAll('.engage-bar');
			var onPagePosts = [];


			function readPageforLikablePosts() {
				for(let i = 0; engageBar.length > i; i++) { 
					var likeID = engageBar[i].dataset.id;
					var likeCount = engageBar[i].dataset.count;
					var likeURL = engageBar[i].dataset.link;
					var likeButton = engageBar[i].querySelector('.the-like-button i');
					var likeVisualCount = engageBar[i].querySelector('.the-like-counter');
					var theFire = engageBar[i].querySelector('.the-fire');

					const thePost = new createPost(
							likeID, 
							likeCount, 
							likeURL, 
							likeButton, 
							likeVisualCount,
							theFire
							);

					onPagePosts.push(thePost);
				}
			}

			readPageforLikablePosts();

			

			function createPost(id, count, url, button, visualcount, thefire) {
				this.postlikeID = id;
				this.postlikeCount = count;
				this.shareURL = url; 
				this.likeButton = button;
				this.likeVisualCount = visualcount;
				this.ourFire = thefire;

				/*Heart Click*/
				button.addEventListener('click', function(event) {
					this.classList.add('liked','bounce');
					countLikeClick(count, visualcount);
					count = finalCount;
					postlikeCount = finalCount;
					updatePost(id, count);

					// show the fire 
					showFire(count); 

					/* Remove Bouce Effect */
					setTimeout(function(){
						removeBounce();
					}, 1000);
				});

				function removeBounce() {
					button.classList.remove('bounce');
					// console.log('removed')
				}

				function showFire(item) {
					if (item > 100) {
						thefire.classList.add('so-hot')
					}
				}

			}

			// push like count to the array item
			// then update the Database with the new count
			function updatePost(id, count) {
				for(let i = 0; onPagePosts.length > i; i++) { 
					if ( onPagePosts[i].postlikeID == id  ) {
						onPagePosts[i].postlikeCount = count;
					}
				}
				 $.ajax({
		            type: 'POST',
		            url: ajax_object.ajaxurl,
		            data: {
		                action: 'update_post_like_count',
		                post_id: id,
		                post_count: count,
		                dataType:'Text',
						success: function(data) {
							// console.log(id, count);
							// console.log('voted');
						}
		            }
		        });
			}

			// count the click and show it on the Page
			function countLikeClick(item, target) {
				this.finalCount = item;
				this.countDiv = target;
				finalCount ++;
				countDiv.innerHTML = finalCount;
				return finalCount;
			}
		}

		countLikes();



		
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

function showSocialFeeds() {

	var socialMedia = {
		twitter: {
			link: 'feed-twitter.html',
			btnclass: 'fa-twitter'
		},
		facebook: {
			link: 'feed-facebook.html',
			btnclass: 'fa-facebook'
		},
		instagram: {
			link: 'feed-instagram.html',
			btnclass: 'fa-instagram'
		},
	};	

	var feedURL = 'https://sandiegohousemusic.com/wordpress/wp-content/themes/sandiegohousemusic/';
	var socialButtons = document.querySelectorAll('.get-social a i');
	var feedWrapper = document.querySelector('.social-feed');
	var feedFrame = document.querySelector('.social-feed .the-feed iframe'); 
	var feedClose = document.querySelector('.close-feed');

	for ( let i = 0; socialButtons.length > i ; i++) {
		socialButtons[i].addEventListener('click', function(event) {
			showFeed(event.target);
		})
	}

	function showFeed(icon){
		var activeIcon = document.querySelector('i.active');
		if(activeIcon) {
			activeIcon.classList.remove('active');
		}
		icon.classList.add('active');
		var iconName = icon.dataset.name;
		feedFrame.src = feedURL + socialMedia[iconName].link;
		feedWrapper.classList.add('active');
	}


	function closeFeed(icon) {
		feedWrapper.classList.remove('active');
		icon.classList.remove('active');
	}
	
	feedClose.addEventListener('click', function(event) {
		event.preventDefault;
		feedWrapper.classList.remove('active');
		var activeIcon = document.querySelector('i.active');
		closeFeed(activeIcon);
	})

};

showSocialFeeds();






function sharePost() {
	var shareLinkButtons = document.querySelectorAll('.the-share-button');

	function copyStringToClipboard (str) {
	   // Create new element
	   var temporaryElement = document.createElement('textarea');
	   // Set value (string to be copied)
	   temporaryElement.value = str;
	   // Set non-editable to avoid focus and move outside of view
	   temporaryElement.setAttribute('readonly', '');
	   temporaryElement.style = {position: 'absolute', left: '-9999px'};
	   document.body.appendChild(temporaryElement);
	   temporaryElement.select(); // Select text inside element
	   document.execCommand('copy'); // Copy text to clipboard
	   document.body.removeChild(temporaryElement); // Remove temporary element
	}

	if(shareLinkButtons.length > 0) {
		shareLinkButtons.forEach(function(itemToCopy) {
			itemToCopy.addEventListener('click', function(){
				copyStringToClipboard(itemToCopy.dataset.link);
				itemToCopy.classList.add('copied');
			});
		});
	}
}

sharePost();







	// const http = new XMLHttpRequest();
	// const url = 'https://sandiegohousemusic.com/wp-json/wp/v2/posts?category=music&per_page=1'
	// http.open('GET', url);
	// http.send();

	// http.onreadystatechange=(e) => {

	// 	ourData = http.responseText;
	// 		console.log(ourData.length);
	// 		// console.log('looping');


	// 	function parseData(id, likes) {
	// 		this.postID = id;
	// 		this.postLikes = likes;


	// 	}
	// }




/* Click To Share URL */






// Gallery Popup
const isGallery = document.querySelector('body');
if (isGallery) {
  (function(){
		const get = function(selector) {
			return document.querySelector(selector);
		}

		const createMarkUp = function(elementType, classList, content) {
			const element = document.createElement(elementType);
			if(classList.length > 0) {
				element.classList = classList.join(' ');
			}
			if(content) {
				element.innerHTML = content;
			}
			return element;
		}

		const onCloseAddCookie = function() {
			const d = new Date();
	  	d.setTime(d.getTime() + (1*24*60*60*1000));
	  	const expires = "expires="+ d.toUTCString();
	  	const cookieName = 'rmg';
	  	const cookieValue = 'gallerypop';
	  	document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
			const activePopUp = get('.gallery-popup');
			activePopUp.classList.add('hidden');
		}

		const createAndShowGalleryPopup = function() {
			const innerContent = '<div class="popup-content"><h2>Notice</h2><p>Images are Graphic</p><button class="gallery-ok button" class="popupbtn button">OK</button></div>';
			const popup = createMarkUp('div', ['gallery-popup'], innerContent);
			const okBtn = popup.querySelector('.gallery-ok');
			okBtn.addEventListener('click', onCloseAddCookie);
			isGallery.appendChild(popup);
		}

		const cookiesAsAString = document.cookie;
		if(!cookiesAsAString.includes('gallerypop')) {
			createAndShowGalleryPopup();
			const galleryPopUp = get('.gallery-popup');
			galleryPopUp.classList.remove('hidden');
		}
	})();
}
// End Gallery Popup









