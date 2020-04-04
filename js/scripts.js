
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
						$(".parallax-footer").parallax("50%", -0.2, true, "is-parallaxing");
						// $(".parallax-inside").parallax("50%", -0.3, true, "is-parallaxing");
					});
				}
			}
		});





		/*================================================
		=            Engabe Bar - Count Likes            =
		================================================*/
		
		function countLikes() {
			
			var engageBar = document.querySelectorAll('.engage-bar');
			var onPagePosts = [];

			/*===============================================================================
			=            Read the page for Likelable Content and push into array            =
			===============================================================================*/

			function readPageforLikablePosts() {
				for(let i = 0; i < engageBar.length; i++) { 
					var likeID = engageBar[i].dataset.id,
					 	likeCount = engageBar[i].dataset.count,
					 	likeURL = engageBar[i].dataset.link,
					 	likeButton = engageBar[i].querySelector('.the-like-button i'),
					 	likeVisualCount = engageBar[i].querySelector('.the-like-counter'),
					 	theFire = engageBar[i].querySelector('.the-fire'),
					 	hasVoted = false;

					const thePost = new mapPostData(likeID, likeCount, likeURL, likeButton, likeVisualCount, theFire, hasVoted,);

					onPagePosts.push(thePost);
				}
			}

			readPageforLikablePosts();

			/*=====  End of Read the page for Likelable Content and push into array  ======*/

			/*===============================================
			=            Cookie check and Toggle            =
			===============================================*/
			
			function toggleCookie(likeID) {

					const d = new Date();
				  	d.setTime(d.getTime() + (365*24*60*60*1000)); 
				  	const expires = "expires="+ d.toUTCString();
				  	const cookieName = likeID; // name the cookie the id of the post
				  	const cookieValue = 'Voted for ' + likeID ;
				  	let thereIsCookie = false;

					if (!document.cookie.split(';').filter((item) => item.trim().startsWith(likeID)).length) {
					    // console.log( id + ' no cookie set,  creating cookie')
					  	document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
					  	thereIsCookie = true;
					}
					else {
					    // console.log( id + ' cookie already set, expiring cookie')
						document.cookie = cookieName + "=" + cookieValue + ";" + "expires=Thu, 01 Jan 1970 00:00:00 GMT" + ";path=/";
				  		thereIsCookie = false;
					}
			  		console.log(thereIsCookie);
					return thereIsCookie;
				}
			
			/*=====  End of Cookie check and Toggle  ======*/
			

			/*============================================================
			=            Create a Post for each Likeable Item            =
			============================================================*/
			
			function mapPostData(id, count, url, button, visualcount, thefire) {
				this.postlikeID = id;
				this.postlikeCount = count;
				this.shareURL = url; 
				this.likeButton = button;
				this.likeVisualCount = visualcount;
				this.ourFire = thefire;


				/*=============================================
				=            Actions that Each Post will have =
				=============================================*/
				
				
				
				function postLikedActions(event) {
					this.classList.add('liked','bounce');
					this.parentElement.classList.add('liked')

					// CHECK FOR COOOKIE BEFORE ALLOWING click to count
					// if (thereIsCookie === true) {
					if (!document.cookie.split(';').filter((item) => item.trim().startsWith(id)).length) {
						countLikeClick(count, visualcount);
						count = finalCount;
						postlikeCount = finalCount;
						/* Update the Page and DB wit new likes count*/
						updatePostInWordPress(id, count);
						/* check the count and show fire */
						checkLikeCountandShowFire(count); 
						toggleCookie(id);
					}
					else {
						this.classList.remove('liked','bounce');
						this.parentElement.classList.remove('liked')
						toggleCookie(id);
						uncountLikeClick(count, visualcount);
						count = finalCount;
						updatePostInWordPress(id, count);
					}
					/* Remove Bouce Effect class from heart */
					removeBounce();
				}

				/* Listen For Heart Clicks */
				button.addEventListener('click', postLikedActions);


				function removeBounce() {
					setTimeout(function(){
						button.classList.remove('bounce');
					}, 1000);
				}

				function checkLikeCountandShowFire(item) {
					if (item > 0) {
						button.classList.add('liked');
						button.parentElement.classList.add('liked')
					} 
					if (item >= 5) {
						thefire.classList.add('so-hot');
					}
					thefire.addEventListener('click', function() {
						let moreFire = thefire.innerHTML;
						thefire.append(moreFire);

					})
				}

				if (document.cookie.split(';').filter((item) => item.trim().startsWith(id)).length) {
					checkLikeCountandShowFire(count);
				}
			}
			
			/*=====  End of Create a Post for each Likeable Item  ======*/
			


			// push like count to the array item
			// then update the Database with the new count
			function updatePostInWordPress(id, count) {
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

			function uncountLikeClick(item, target) {
				this.finalCount = item;
				this.countDiv = target;
				finalCount = finalCount - 1;
				countDiv.innerHTML = finalCount;
				return finalCount;
			}

			// start to refactor


			// const addOneLike = item => item + 1
			// const removeOneLike = item => item - 1 


			function addOneLike(item) {
				item = item + 1;
				return item; 
			}

			function removeOneLike(item) {
				item = item + 1;
				return item; 
			}

			function updateLikeCountOnPage(item, target) {
				this.countContainer = target;
				this.finalCount = item; 
				countContainer.innerHTML = finalCount;
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
	console.log('video attached to document after 3 seconds');
  	function createVideoMarkup(item) {
  		let videoMarkup = '<video playsinline autoplay muted loop poster=\"' + theme_path + '/images/slide-1.jpg\" class=\"bgvid\"><source src=\"' + theme_path + '/images/' + item +'\" type=\"video/mp4\"></video>';
  		return videoMarkup;
  	}
  }
}


/* Delay Loading of Video */

setTimeout(function() {
	attachVideo();
}, 0);



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

/* Show Event Page */

function showEventFeed() {

	var eventsLink =  'https://events.sandiegohousemusic.com'; 
	var eventButtons = document.querySelectorAll('.get-events a');
	var feedWrapper = document.querySelector('.social-feed');
	var feedFrame = document.querySelector('.social-feed .the-feed iframe'); 
	var feedClose = document.querySelector('.close-feed');

	for ( let i = 0; eventButtons.length > i ; i++) {
		eventButtons[i].addEventListener('click', function(event) {
			event.preventDefault();
			showFeed();
		})
	}

	function showFeed(icon){
		feedFrame.src = eventsLink;
		feedWrapper.classList.add('active');
		feedWrapper.classList.add('events');
	}

	function closeFeed(icon) {
		feedWrapper.classList.remove('active');
		feedWrapper.classList.remove('events');
	}
	
	feedClose.addEventListener('click', function(event) {
		event.preventDefault;
		feedWrapper.classList.remove('active');
		var activeIcon = document.querySelector('i.active');
		closeFeed(activeIcon);
	})

};

showEventFeed();




function sharePost() {
	var shareUrlButtons = document.querySelectorAll('.the-share-button');
	if(shareUrlButtons.length > 0) {
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
		shareUrlButtons.forEach(function(itemToCopy) {
			itemToCopy.addEventListener('click', function(){
				copyStringToClipboard(itemToCopy.dataset.link);
				itemToCopy.classList.add('copied');
				setTimeout(function() {
					itemToCopy.classList.remove('copied');
				}, 2000);
			});
		});
	}
}

sharePost();





function requestPostsAndAttachtoPage(category, numberofposts) {

	const http = new XMLHttpRequest();
	const url = 'https://sandiegohousemusic.com/wp-json/wp/v2/posts?category=' + category + '&per_page=' + numberofposts;
	http.open('GET', url);
	http.send();

	http.onreadystatechange= function() {
		if(http.readyState === XMLHttpRequest.DONE && http.status === 200) {
			var PostResponce = JSON.parse(http.responseText);
			parseData(PostResponce);
		}
	}
	
	function parseData(data) {
		for ( let i = 0; i < data.length; i++) {
			let postID = data[i].id;
			let postTitle = data[i].title.rendered;
			let postURL = data[i].link;
			let postIMG = data[i].jetpack_featured_media_url;

			var pageElement = document.createElement('div');
			pageElement.classList.add('parsed__post');

			pageElement.innerHTML = '<a class=\"\" href=\"' + postURL + '\"><img src=\"' + postIMG + '\"><span>' + postTitle + '</span></a>';
			
			document.body.appendChild(pageElement);
			setTimeout(function(){
				pageElement.classList.add('active');
			},2000);
		}
	}
}




/* Susbribe Input Clear */

var inputSearch = document.getElementById('email');

inputSearch.addEventListener('focusin', function (event) {
	inputSearch.value = '';
});




/*Fire Off Featured Post slide in */
// if (document.body.classList.contains('home')) { // only do on homepage
// 	setTimeout(function() {
// 		requestPostsAndAttachtoPage('music', 1); // post requested after 30 seconds 
// 	}, 30000);
// }


