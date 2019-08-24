// start rest api
var wpRestApiObj = {

  init: function () {

    var sourceUrls = []
    var postsWrap = document.querySelector('.front-page-events');
    var loader = document.createElement('div');
    loader.classList.add('loader');

    postsWrap.appendChild(loader);

    // Get all urls passed into getPosts and put them in the sourceUrls Array;
    for (var i = 0; i < arguments.length; i++) {
      sourceUrls.push(arguments[i]);
    }

    this.getPosts(sourceUrls);
  },



  getPosts: function(sourceUrls) {
    var postsArr = [];
    var httpRequestCount = 0;
    var postsCurrentlyOnPage = document.querySelectorAll('.post-snippet .blog-title a');
    var totalPostsOnAllSites = 0;

    // Start query.
    sourceUrls.forEach(function (source) {
      // number of posts to start from on query.
      var offSet = 0;

      // Get what post to start on for the new request - first find out how many are currently on the page.
      postsCurrentlyOnPage.forEach(function(item) {
        var linkAsString = item.href;
        if(linkAsString.includes(source)) {
          offSet++;
        }
      })

      // Get 10 posts starting at the offSet
      var url = source + '/wp-json/wp/v2/posts?_embed&per_page=10&offset=' + offSet;
      console.log(url);
      fetch(url)
        .then(function(response) {

          // The total number of posts for current site/url - source
          totalPostsOnAllSites += parseInt(response.headers.get('X-WP-Total'));

          return response.json();
        })
        .then(function(posts) {
          posts.forEach(function (post) {
            var isPublished = post.status;
            if (isPublished === 'publish') {
              postsArr.push(post);
            }
          });

          httpRequestCount++;

          // if this is the last url/fetch request
          if (httpRequestCount === sourceUrls.length) {
            // Sort the array now that it's full

            postsArr.sort(function (a, b) {
              a = new Date(a.date);
              b = new Date(b.date);
              return a > b ? -1 : a < b ? 1 : 0;
            });
            return wpRestApiObj.displayPosts(postsArr, totalPostsOnAllSites);
          }
        })
        .catch(function(error) {
          console.log(error);
        });
    });

  },



  displayPosts: function(posts, totalPostsOnAllSites) {
    var loader = document.querySelector('.loader');
    var postsWrap = document.querySelector('.front-page-events');
    postsWrap.removeChild(loader);
    posts.forEach(function (post, index) {

      // Only display 10 at a time
      if (index < 10) {

        var postSnippet = document.createElement('article');
        var featuredImgWrap = document.createElement('div');
        var postExcerptWrap = document.createElement('div');
        var title = document.createElement('h2');
        var metaData = document.createElement('div');
        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var month = months[parseInt(post.date.substring(5, 7)) - 1];
        var day = post.date.substring(8, 10);
        var year = post.date.substring(0, 4);
        var postCategories = post._embedded['wp:term'][0];
        var postLink = post.link;
        var fromExternal = post.link.includes('austinmohssurgery');
        var blank = fromExternal ? 'target="_blank"' : "";
        var readMore = '<a href="' + postLink + '" class="more button" ' + blank + ' >Read More</a>';


        if (post.featured_media > 0) {
          featuredImgWrap.classList.add('thumb');
          featuredImgWrap.innerHTML = '<img width="150" height="150" src="' + post._embedded['wp:featuredmedia']['0'].source_url + '" class="attachment-thumbnail size-thumbnail wp-post-image" alt="' + post._embedded['wp:featuredmedia']['0'].alt_text + '"/>';
        }

        // Post Title
        title.classList.add('blog-title');
        title.innerHTML = '<a href="' + postLink + '" ' + blank + ' >' + post.title.rendered + '</a>';

        // Post Categories - to create markup.
        var getPostCategoriesMarkUp = function () {
          var allCategoriesForPost = [];
          postCategories.forEach(function (category) {
            var categoryName = category.name;
            var categoryLink = category.link;
            allCategoriesForPost.push('<a href="' + categoryLink + '" rel="category tag">' + categoryName + '</a>, ');
          });

          allCategoriesForPost[allCategoriesForPost.length - 1] = allCategoriesForPost[allCategoriesForPost.length - 1].replace(',', '');
          return allCategoriesForPost.join('');
        }

        // Post Meta data
        metaData.classList.add('meta-data');
        metaData.innerHTML = 'Posted on ' + month + ' ' + day + ', ' + year + ' in ' + getPostCategoriesMarkUp();


        // Excertp Wrap
        postExcerptWrap.classList.add('excerpt');
        postExcerptWrap.appendChild(title);
        postExcerptWrap.appendChild(metaData);

        // postExcerptWrap.innerHTML += post.content.rendered.split(' ').slice(0, 100).join(' ') + '...';
        postExcerptWrap.innerHTML += post.excerpt.rendered;
        postExcerptWrap.innerHTML += readMore;

        // Post Wrap
        if (fromExternal) {
          postSnippet.classList.add('from-external');
        }
        postSnippet.classList.add('post-snippet');
        if (post.featured_media > 0) { postSnippet.appendChild(featuredImgWrap) };

        postSnippet.appendChild(postExcerptWrap);

        // All posts Wrap

        postsWrap.appendChild(postSnippet);
      }
    });

    this.showMorePostsBtn(totalPostsOnAllSites);
  },



  showMorePostsBtn: function (totalPostsOnAllSites) {

    var moreBtns = document.querySelectorAll('.show-more-posts');

    if (moreBtns.length > 0) {
      moreBtns.forEach(function (btn) {
        btn.style.display = 'none';
      });
    }

    var displayedPostsNumber = document.querySelectorAll('.post-snippet .blog-title a');
    var allPostsWrap = document.querySelector('.front-page-events');
    var howManyMore = totalPostsOnAllSites - displayedPostsNumber.length;
    var showMoreBtn = document.createElement('button');
    showMoreBtn.innerText = 'Show More Posts there are ' + howManyMore + ' more.';
    showMoreBtn.classList.add('show-more-posts');
    showMoreBtn.onclick = initApiQuery;
    showMoreBtn.style.color = 'black';

    if (displayedPostsNumber.length < totalPostsOnAllSites) {
      allPostsWrap.appendChild(showMoreBtn);
    }
  }

}



