//Instamax 4.0 - http://www.codehandling.com/2015/04/instamax-20-embed-complete-instagram.html
//Buy at http://codecanyon.net/item/instamax-instagram-photo-gallery-on-your-website/11012618

var instamaxLoggedInUser = {};
var instamaxRefreshTimer;
var instamaxReloadCount = 1;

(function ($) {

	//get photos of any user using instagram API
	var getUserPhotos = function ($instamaxContainer,nextPageUrl) {
		//console.log('inside getUserPhotos');
		var loadMoreFlag = false;
		var instamax_global_options = $instamaxContainer.data('instamax_global_options');

		if(null!=nextPageUrl && nextPageUrl!="") {
			apiUserPhotosURL = nextPageUrl;
			loadMoreFlag = true;		
		} else {
			apiUserPhotosURL = "https://api.instagram.com/v1/users/"+instamax_global_options.userId+"/media/recent?count="+instamax_global_options.maxResults+"&client_id="+instamax_global_options.clientId;
		}
		
		//console.log('getUserPhotos apiUserPhotosURL-'+apiUserPhotosURL);
		
		$.ajax({
			url: apiUserPhotosURL,
			type: "GET",
			async: true,
			cache: true,
			dataType: 'jsonp',
			success: function(response) { insertUserPhotos(response,loadMoreFlag,$instamaxContainer);},
			error: function(html) { alert(html); },
			beforeSend: setHeader
		});
	},
	

	//get photos of any user using instagram API
	getUserPhotosBasedOnTags = function (tabId,$instamaxContainer,nextPageUrl) {
		//console.log('inside getUserPhotos');
		var loadMoreFlag = false;
		var instamax_global_options = $instamaxContainer.data('instamax_global_options');
		
		if(null!=nextPageUrl && nextPageUrl!="") {
			apiUserPhotosURL = nextPageUrl;
			loadMoreFlag = true;		
		} else {
			apiUserPhotosURL = "https://api.instagram.com/v1/users/"+instamax_global_options.userId+"/media/recent?count=100&client_id="+instamax_global_options.clientId;
		}
		
		var hashTag = tabId.substring(tabId.indexOf('_')+1);
		hashTag = hashTag.replace(/\s*/g,'');		
		
		//console.log('getUserPhotos apiUserPhotosURL-'+apiUserPhotosURL);
		
		$.ajax({
			url: apiUserPhotosURL,
			type: "GET",
			async: true,
			cache: true,
			dataType: 'jsonp',
			success: function(response) { insertUserPhotos(response,loadMoreFlag,$instamaxContainer,hashTag);},
			error: function(html) { alert(html); },
			beforeSend: setHeader
		});
	},	
	
	//get photos of any hashtag using instagram API
	getTagPhotos = function (tabId,$instamaxContainer,nextPageUrl) {
		//console.log('inside getTagPhotos');
		var loadMoreFlag = false;
		var instamax_global_options = $instamaxContainer.data('instamax_global_options');

		var hashTag = tabId.substring(tabId.indexOf('_')+1);
		hashTag = hashTag.replace(/\s*/g,'');
		
		if(null!=nextPageUrl && nextPageUrl!="") {
			apiUserPhotosURL = nextPageUrl;
			loadMoreFlag = true;		
		} else {
			apiUserPhotosURL = "https://api.instagram.com/v1/tags/"+hashTag+"/media/recent?count="+instamax_global_options.maxResults+"&client_id="+instamax_global_options.clientId;
		}
		
		//console.log('getTagPhotos apiUserPhotosURL-'+apiUserPhotosURL);
		
		$.ajax({
			url: apiUserPhotosURL,
			type: "GET",
			async: true,
			cache: true,
			dataType: 'jsonp',
			success: function(response) { insertUserPhotos(response,loadMoreFlag,$instamaxContainer);},
			error: function(html) { alert(html); },
			beforeSend: setHeader
		});
	},
	

	
	//display Instagram Follow button
	renderSubscribeButton = function() {
	
		$.ajaxSetup({
		  cache: true
		});
		
		$.getScript("")
		.done(function( script, textStatus ) {
			//alert( textStatus );
		})
		.fail(function( jqxhr, settings, exception ) {
			//alert( "Triggered ajaxError handler." );
		});
		

		
	},
	
	//initialize youamx - add necessary HTML code
	initInstamax = function($instamaxContainer) {
	
		var instamax_global_options = $instamaxContainer.data('instamax_global_options');
		
		//Empty the container - ajax compatibility
		$instamaxContainer.empty();
		
		//tabs
		$instamaxContainer.append('<div id="instamax-tabs"></div>');
		
		//list
		$instamaxContainer.append('<div class="su-instagram-container"><ul class="su-instagram-items"></ul></div>');
		
		//load more
		//$instamaxContainer.append('<button id="instamax-load-more-div">LOAD MORE</button>');
		$instamaxLoadMoreDiv = $instamaxContainer.find('#instamax-load-more-div');
		
		$instamaxLoadMoreDiv.data('nextpagetoken','');
		
		$instamaxLoadMoreDiv.on('click',function(){
			loadMorePhotos($instamaxContainer);
			return false;
		});
		
		$instamaxContainer.find('#instamax-tabs').on('click','.instamax-tab',function() {
			$instamaxContainer.find('#instamax-load-more-div').removeAttr('disabled');
			displayPhotos(this.id,$instamaxContainer);
		});
		
		$instamaxContainer.find('#instamax-select').change(function() {
			var tabId = $(this).find(":selected").val();
			displayPhotos(tabId,$instamaxContainer);
		});
		
		//added in 3.0 
		$instamaxContainer.on('keyup','#instamax-search-box', function (e) {
			if (e.keyCode == 13) {
				searchText = "query_" + $(this).val();
				displayPhotos(searchText,$instamaxContainer);
			}
		});	
	},
	
	//load more button functionality
	loadMorePhotos = function($instamaxContainer) {
		var $instamaxLoadMoreDiv = $instamaxContainer.find('#instamax-load-more-div');
		$instamaxLoadMoreDiv.text('LOADING...');
		$instamaxLoadMoreDiv.addClass('instamax-load-more-div-click');
		var tabId = $instamaxContainer.find('.instamax-tab.instamax-tab-hover').attr('id');
		var nextPageUrl = $instamaxLoadMoreDiv.data('nextpageurl');
		//console.log('load more clicked : nextStartIndex-'+nextStartIndex);		
		var instamax_global_options = $instamaxContainer.data('instamax_global_options');
		if(null!=nextPageUrl && nextPageUrl!="") {
			if(tabId.indexOf("photos")!=-1) {
				getUserPhotos($instamaxContainer,nextPageUrl);
			} else if(tabId.indexOf("hashtag_")!=-1) {
				if(instamax_global_options.tagScope=="user") {
					getUserPhotosBasedOnTags(tabId,$instamaxContainer,nextPageUrl);
				} else {
					getTagPhotos(tabId,$instamaxContainer,nextPageUrl);
				}
			} else if(tabId.indexOf("query_")!=-1) {
				if(instamax_global_options.searchScope=="user") {
					getUserPhotosBasedOnTags(tabId,$instamaxContainer,nextPageUrl);
				} else {
					getTagPhotos(tabId,$instamaxContainer,nextPageUrl);
				}
			}
		} else {
			$instamaxLoadMoreDiv.text('ALL DONE');
		}
	},
	
	//gets user Id using Instagram API
	getUserId = function ($instamaxContainer) {
		//console.log('inside getUserDetails');
		var instamax_global_options = $instamaxContainer.data('instamax_global_options');
		//console.log(instamax_global_options);
		apiUrl = "https://api.instagram.com/v1/users/search?q="+instamax_global_options.userName+"&client_id="+instamax_global_options.clientId+"&count=1";
		//console.log('getUserId apiUrl-'+apiUrl);
		//showLoader();
		
		$.ajax({
			url: apiUrl,
			type: "GET",
			async: true,
			cache: true,
			dataType: 'jsonp',
			success: function(response) { saveUserId(response,$instamaxContainer);},
			error: function(html) { alert(html); },
			beforeSend: setHeader
		});
	},

	saveUserId = function (response,$instamaxContainer) {
		//console.log(response);
		var instamax_global_options = $instamaxContainer.data('instamax_global_options');
		instamax_global_options.userName = response.data[0].username;
		instamax_global_options.userId = response.data[0].id;
		getUserDetailsForHeader($instamaxContainer);
	},

	//gets user details using Instagram API
	getUserDetailsForHeader = function ($instamaxContainer) {
		//console.log('inside getUserDetails');
		var instamax_global_options = $instamaxContainer.data('instamax_global_options');
		//console.log(instamax_global_options);
		apiUrl = "https://api.instagram.com/v1/users/"+instamax_global_options.userId+"?client_id="+instamax_global_options.clientId+"&count=1";
		//console.log('apiUrl-'+apiUrl);
		//showLoader();
		
		$.ajax({
			url: apiUrl,
			type: "GET",
			async: true,
			cache: true,
			dataType: 'jsonp',
			success: function(response) { displayUserHeader(response,$instamaxContainer);},
			error: function(html) { alert(html); },
			beforeSend: setHeader
		});
	},
	
	setHeader = function (xhr) {
		if(xhr && xhr.overrideMimeType) {
			xhr.overrideMimeType("application/j-son;charset=UTF-8");
		}
	},
	
	//utility function to displaye view counts
	convertViewCount = function(photoViewCount) {
		photoViewCount = parseInt(photoViewCount,10);
		if(photoViewCount<1000) {
			
		} else if (photoViewCount<1000000) {
			photoViewCount = Math.round(photoViewCount/1000) + "K";
			
		} else if (photoViewCount<1000000000) {
			photoViewCount = (photoViewCount/1000000).toFixed(1) + "M";
		} else {
			photoViewCount = (photoViewCount/1000000000).toFixed(1) + "B";
		}
		
		return photoViewCount;
		
	},
	
	//display user header
	displayUserHeader = function(response,$instamaxContainer) {
		//console.log("displayUserHeader");
		//console.log(response);
		var instamax_global_options = $instamaxContainer.data('instamax_global_options');
		var userData = response;
		
		//alert(photoArray.length);
		userId = instamax_global_options.userId;
		userTitle = instamax_global_options.userName;
		userImage = userData.data.profile_picture;
		
		//added in 4.0
		userBio = userData.data.bio;
		userWebsite = userData.data.website;
		userFullname = userData.data.full_name;
		userFollowing = convertViewCount(userData.data.counts.follows);
		/*if(userImage.indexOf("?")!=-1) {
			userImage = userImage.substring(0,userImage.indexOf("?"));
		}*/
		
		userFollowers = convertViewCount(userData.data.counts.followed_by);
		userPosts = convertViewCount(userData.data.counts.media);
		//not present via the API
		//userViews = userData.statistics.viewCount;
		
		userBackgroundImage = instamax_global_options.coverImage;
		//console.log('userBackgroundImage-',userBackgroundImage);
		
		$instmaxStatHolder = $instamaxContainer.find('#instamax-stat-holder');
		if(instamax_global_options.showSearchBox) {
			$instmaxStatHolder.append('<div id="instamax-search-holder"><input id="instamax-search-box" type="text" placeholder=""/><i class="fa fa-search instamax-search-icon"></i></div>');
		} else {
			if(null!=userFollowers && userFollowers>0) {
				$instmaxStatHolder.append('<div class="instamax-stat"><span class="instamax-stat-count">'+convertViewCount(userFollowers)+'</span><br/>FOLLOWERS</div>');
			}
			
			if(null!=userPosts && userPosts>0) {
				$instmaxStatHolder.append('<div class="instamax-stat"><span class="instamax-stat-count">'+convertViewCount(userPosts)+'</span><br/>POSTS</div>');
			}		
		}
		
		//$instamaxContainer.find('#instamax-header-wrapper').append('');
		
		$instamaxContainer.find('#instamax-tabs').prepend('<span id="photos" class="instamax-tab" >Photos</span>');
		
		$instamaxContainer.find('#instamax-select').prepend('<option value="photos" class="instamax-option-highlight" >Photos</option>');

		//selected Tab
		if(instamax_global_options.selectedTab.charAt(0)=='p') {
			$instamaxContainer.find('#photos').click();
		}
		
		
		//renderSubscribeButton();
	},
	
	//insert HTML for photo thumbnails into instamax grid
	insertUserPhotos = function(response,loadMoreFlag,$instamaxContainer,hashTag) {
		//console.log('into insertUserPhotos');
		//console.log(response);
		var photoIdArray = [];
		var $instamaxContainerList = $instamaxContainer.find('ul');
		//console.log('insertAlbumPhotos loadMoreFlag-'+loadMoreFlag);
		
		if(!loadMoreFlag) {
			//$instamaxContainerList.empty();
			if($instamaxContainer.find('.instamax-tab-hover').length==0) {
				query = $instamaxContainer.find('#instamax-search-box').val();
				$instamaxContainer.find('#instamax-showing-title').append('<div id="query_'+query+'" class="instamax-tab instamax-tab-hover">Showing Search for "'+query+'"</div>').show();
			}
		}
		
		/*if(!loadMoreFlag) {
			$instamaxContainerList.empty();
		}*/
		
		var photoArray = response.data;
		
		var $instamaxLoadMoreDiv = $instamaxContainer.find('#instamax-load-more-div');
		var instamax_global_options = $instamaxContainer.data('instamax_global_options');	
		var nextPageUrl = response.pagination;
		
		if(null!=nextPageUrl && null!=nextPageUrl.next_url) {
			nextPageUrl = nextPageUrl.next_url;
			$instamaxLoadMoreDiv.data('nextpageurl',nextPageUrl);
		} else {
			$instamaxLoadMoreDiv.data('nextpageurl','');
		}
		//console.log('nextStartIndex-'+nextStartIndex);

		if(null!=hashTag && hashTag!="") {
		
			if(instamaxReloadCount>=instamax_global_options.maxAutoReloads) {
				instamaxReloadCount = 1;
			} else {
				$instamaxLoadMoreDiv.click();
				instamaxReloadCount++;
			}
			
		}
	
		if(null==photoArray || photoArray.length==0) {
			$instamaxContainerList.empty().append('<div class="instamax-not-found"><span style="opacity:0;">.</span><br><br><br><br><br><br>No Photos Found..<br><br><br><br><br><br><span style="opacity:0;">.</span></div>');
			return;
		}		
		
		//alert(photoArray.length);
		for(var i=0; i<photoArray.length; i++) {
			photoId = photoArray[i].id;
			//albumId = photoArray[i].gphoto$albumid.$t;
			if($instamaxContainerList.find('#'+photoId).length>0) {
				continue;
			}
			
			photoTitle = photoArray[i].caption;
			if(null!=photoTitle) {
				photoTitle = photoTitle.text;
			} else {
				photoTitle="";
			}
			
			if(null!=hashTag && hashTag!="" && photoTitle.indexOf(hashTag)==-1) {
				continue;
			}
			
			//console.log('Photo title-'+photoTitle);
			photoThumbnail = photoArray[i].images.thumbnail.url;
			photoThumbnail = photoArray[i].images.thumbnail.url;
			photoHD = photoArray[i].images.standard_resolution.url;
			photoLD = photoArray[i].images.low_resolution.url;

			photoUploaded = photoArray[i].created_time;			
			//photoComments = photoArray[i].comments.count;
			photoLikes = photoArray[i].likes.count;
			
			photoLink = photoArray[i].link;
			type = photoArray[i].type;
			
			videoLink = "";
			videoIcon = "";
			if(type=="video") {
				videoLink = photoArray[i].videos.standard_resolution.url;
				videoIcon = '<div class="instamax-play-icon"><i class="fa fa-play fa-5x"></i></div>';
			}
			//photoIdArray.push(albumId+"_"+photoId);
			
			if(instamax_global_options.displayMode=="link") {
				linkHtmlStart = '<a class="instamax-photo-link" href="'+photoLink+'" target="_blank">';
				linkHtmlEnd = '</a>';
			} else {
				linkHtmlStart = "";
				linkHtmlEnd = "";
			}
			
			//console.log('photoUploaded-'+photoUploaded);
			
			$instamaxContainerList.append('<li id="'+photoId+'" href="'+photoHD+'" class="instamax-gallery-item">'+linkHtmlStart+videoIcon+'<div class="instamax-hover"></div><img class="instamax-thumbnail" src="'+photoThumbnail+'" data-photold="'+photoLD+'" data-photolink="'+photoLink+'" data-videolink="'+videoLink+'">'+linkHtmlEnd+'</li>');
		}
		
		createGrid($instamaxContainer);
		
		//getPhotoStats(photoIdArray,response.feed.gphoto$user.$t,$instamaxContainer);
		
	},
	
	//utility function for date time
	// getDateDiff = function (photoUploadDate) {
	// 	dateDiffMS = Math.abs(new Date() - new Date(photoUploadDate * 1000));
	// 	//console.log("dateDiffMS-"+dateDiffMS);
		
	// 	dateDiffHR = dateDiffMS/1000/60/60;
	// 	if(dateDiffHR>24) {
	// 		dateDiffDY = dateDiffHR/24;
	// 		if(dateDiffDY>30) {
	// 			dateDiffMH = dateDiffDY/12;
	// 			if(dateDiffMH>12) {
	// 				dateDiffYR = dateDiffMH/12;
	// 				dateDiffYR = Math.round(dateDiffYR);
	// 				if(dateDiffYR<=1) {
	// 					return dateDiffYR+" year ago";
	// 				} else {
	// 					return dateDiffYR+" years ago";
	// 				}						
	// 			} else {
	// 				dateDiffMH = Math.round(dateDiffMH);
	// 				if(dateDiffMH<=1) {
	// 					return dateDiffMH+" month ago";
	// 				} else {
	// 					return dateDiffMH+" months ago";
	// 				}						
	// 			}
	// 		} else {
	// 			dateDiffDY = Math.round(dateDiffDY);
	// 			if(dateDiffDY<=1) {
	// 				return dateDiffDY+" day ago";
	// 			} else {
	// 				return dateDiffDY+" days ago";
	// 			}
	// 		}
	// 	} else {
	// 		dateDiffHR = Math.round(dateDiffHR);
	// 		if(dateDiffHR<1) {
	// 			return "just now";
	// 		} else if(dateDiffHR==1) {
	// 			return dateDiffHR+" hour ago";
	// 		} else {
	// 			return dateDiffHR+" hours ago";
	// 		}
	// 	}
	// },
	
	//create grid layout using Wookmark plugin
	createGrid = function($instamaxContainer) {
		var instamax_global_options = $instamaxContainer.data('instamax_global_options');	
		var $instamaxContainerList = $instamaxContainer.find('ul');
		$instamaxContainerList.imagesLoaded(function() {

			$instamaxContainerList.find('.instamax-loading-div').remove();			
		
			// var options = {
			//   autoResize: true, // This will auto-update the layout when the browser window is resized.
			//   container: $instamaxContainer.find('.su-instagram-container'), // Optional, used for some extra CSS styling
			//   offset: instamax_global_options.innerOffset, // Optional, the distance between grid items
			//   itemWidth: instamax_global_options.minItemWidth, // Optional, the width of a grid item
			//   flexibleWidth : instamax_global_options.maxItemWidth,
			//   outerOffset: instamax_global_options.outerOffset
			// };

			
			//var handler = $instamaxContainerList.find('li');
			
			// Call the layout function.
			//handler.wookmark(options);
			
			if(instamax_global_options.displayMode=="popup") {
				registerPopup($instamaxContainer);
			}
			
			resetLoadMoreButton($instamaxContainer);
			
			window.clearTimeout(instamaxRefreshTimer);
			instamaxRefreshTimer = setTimeout(function(){updateThumbnails($instamaxContainer);}, instamax_global_options.refreshTimeout);

			//updateThumbnails($instamaxContainer);
		});
	},
	
	updateThumbnails = function($instamaxContainer) {
		//var $instamaxContainerImg = $instamaxContainer.find('ul>li>img');
		var instamax_global_options = $instamaxContainer.data('instamax_global_options');	
		var albumThumbnail,updatedAlbumThumbnail;
		//console.log("in updateThumbnails");

		var items = document.getElementsByClassName("instamax-thumbnail");
		for (var i = items.length; i--;) {
			albumThumbnail = items[i].src;
			updatedAlbumThumbnail=albumThumbnail.replace("s150x150","s306x306");
			items[i].src = updatedAlbumThumbnail;
		}
		//instamaxRefreshGrid($instamaxContainer);
		
	},
	
	//display tabs for hashtags
	displayTabs = function(hashTagArray,$instamaxContainer) {
		//console.log(response);
		var instamax_global_options = $instamaxContainer.data('instamax_global_options');
		//var playlistArray = response.items;
		
		//alert(videoArray.length);
		$instamaxTabs = $instamaxContainer.find('#instamax-tabs');
		$instamaxSelect = $instamaxContainer.find('#instamax-select');
		for(var i=0; i<hashTagArray.length; i++) {
			if(hashTagArray[i].length>instamax_global_options.maxTabNameLength) {
				tabTitleShort = hashTagArray[i].substring(0,instamax_global_options.maxTabNameLength) + "..";
			} else {
				tabTitleShort = hashTagArray[i];
			}
			
			$instamaxTabs.append('<span id="hashtag_'+hashTagArray[i]+'" class="instamax-tab" >#'+tabTitleShort+'</span>');
			$instamaxSelect.append('<option value="hashtag_'+hashTagArray[i]+'" >#'+hashTagArray[i]+'</option>');
		}
		
		//click the selectedTab
		if(instamax_global_options.selectedTab.charAt(0)=='h') {
			tabSelect = (instamax_global_options.selectedTab.charAt(1)) - 1;
			if(null!=hashTagArray[tabSelect]) {
				$('#hashtag_'+hashTagArray[tabSelect]).click();
			}
		}
	},
	
	
	resetLoadMoreButton = function($instamaxContainer) {
		var $instamaxLoadMoreDiv = $instamaxContainer.find('#instamax-load-more-div');
		$instamaxLoadMoreDiv.removeClass('instamax-load-more-div-click');
		$instamaxLoadMoreDiv.text('LOAD MORE');
	},
	
	//register photo popup on photo thumbnails
	registerPopup = function($instamaxContainer) {
	
		var instamax_global_options = $instamaxContainer.data('instamax_global_options');

		
			$instamaxContainer.find('.su-instagram-container li').magnificPopup({
				type:'image',
				tLoading: '',
				gallery: {
					enabled:true
				},
				preloader:true,
				showCloseBtn: true, 
				closeBtnInside: true, 
				closeOnContentClick: false, 
				closeOnBgClick: true, 
				enableEscapeKey: true, 
				modal: false, 
				alignTop: false, 
				removalDelay: 500, 
				mainClass: 'mfp-zoom-in mfp-img-mobile',
				prependTo: $instamaxContainer.get(),
				callbacks: {
					open: function() {

						//overwrite default prev + next function. Add timeout for css3 crossfade animation
						$.magnificPopup.instance.next = function() {
							var self = this;
							self.wrap.removeClass('mfp-image-loaded');
							setTimeout(function() { $.magnificPopup.proto.next.call(self); }, 120);
						}
						$.magnificPopup.instance.prev = function() {
							var self = this;
							self.wrap.removeClass('mfp-image-loaded');
							setTimeout(function() { $.magnificPopup.proto.prev.call(self); }, 120);
						}
					},
					change: function() {
						
						//console.log(this);
						var $baseElement = $(this.currItem.el.context);
						mediaId = $baseElement.attr("id");
						mediaLikes = $baseElement.find(".instamax-definition").text().trim();
						//mediaComments = $baseElement.find(".instamax-duration").text().trim();
						mediaUploaded = $baseElement.find(".instamax-photo-list-views").text().trim();
						mediaLink = $baseElement.find(".instamax-thumbnail").data("photolink");
						videoLink = $baseElement.find(".instamax-thumbnail").data("videolink");
						
						userLink = "https://instagram.com/" + instamax_global_options.userName;
						//console.log("mediaLikes-"+mediaLikes);
						photoTitle = $baseElement.find(".instamax-photo-list-title").text();
						
						//console.log($(".mfp-bottom-bar"));
						setTimeout(function(){
							if(null!=videoLink && videoLink!="") {
								//console.log("videoLink-"+videoLink);
								$(".mfp-content figure>img").hide();
								maximumHeight = $(".mfp-content figure>img").css("max-height").replace("px","");
								maximumHeight = parseInt(maximumHeight,10);
								$(".mfp-content figure").prepend('<video controls class="mfp-video"><source src="'+videoLink+'" type="video/mp4">Your browser does not support the video tag.</video>');
							} else {
								$(".mfp-content figure>video").remove();
							}
						}, 100);

						
					},
					imageLoadComplete: function() {
						var self = this;
						setTimeout(function() { self.wrap.addClass('mfp-image-loaded'); }, 16);
					}
				}
	  
	  
			});
	
	},
	
	
	//display loading.. text
	// showLoader = function($instamaxContainer) {
	// 	$instamaxContainer.find('.su-instagram-container>ul').empty();
	// 	//$instamaxContainer.find('#instamax-photo').hide();
	// 	//$instamaxContainer.find('#instamax-photo').attr('src','');
	// 	$instamaxContainer.find('.su-instagram-container>ul').append('<div class="instamax-loading-div" style="text-align:center; height:200px; font:14px Calibri;"><br><br><br><br><br><br>loading HD...<br><br><br><br><br><br></div>');
	// 	$instamaxContainer.find('#instamax-showing-title').empty().hide();
	// },
	
	displayPhotos = function(tabId,$instamaxContainer) {
	
		//showLoader($instamaxContainer);
		var instamax_global_options = $instamaxContainer.data('instamax_global_options');
		
		if(tabId.indexOf("photos")!=-1) {
			getUserPhotos($instamaxContainer,null);
		} else if(tabId.indexOf("hashtag_")!=-1) {
			if(instamax_global_options.tagScope=="user") {
				getUserPhotosBasedOnTags(tabId,$instamaxContainer,null);
			} else {
				getTagPhotos(tabId,$instamaxContainer,null);
			}
		} else if(tabId.indexOf("query_")!=-1) {
			if(instamax_global_options.searchScope=="user") {
				getUserPhotosBasedOnTags(tabId,$instamaxContainer,null);
			} else {
				getTagPhotos(tabId,$instamaxContainer,null);
			}
		}
		
		$instamaxContainer.find('.instamax-tab').removeClass('instamax-tab-hover');	
		$('#'+tabId).addClass('instamax-tab-hover');
		$instamaxContainer.find('#instamax-select').val(tabId);

	};	

	//instamax plugin definition
    $.fn.instamax = function(options) {
		
		var instamax_global_options = {};
		var $instamaxContainer = this;
		//console.log($instamaxContainer.attr('id'));
		
		
		//set local options
		instamax_global_options.clientId = options.clientId;
		instamax_global_options.maxResults = options.maxResults||9;
		instamax_global_options.innerOffset = options.innerOffset||0;
		instamax_global_options.outerOffset = options.outerOffset||0;
		instamax_global_options.minItemWidth = options.minItemWidth||250;
		instamax_global_options.maxItemWidth = options.maxItemWidth||400;

		instamax_global_options.refreshTimeout = options.refreshTimeout||1000;
		instamax_global_options.coverImage = options.coverImage||"";
		
		//3.0 options
		instamax_global_options.selectedTab = options.selectedTab||"p"; //can be p|h1|h2|...
		instamax_global_options.alwaysUseDropdown = options.alwaysUseDropdown;
		instamax_global_options.maxTabNameLength = 22;
		instamax_global_options.showSearchBox = options.showSearchBox;
		

		//4.0 options
		//instamax_global_options.maxComments = options.maxComments||20;
		instamax_global_options.tagScope = options.tagScope||"user"; //can be user or global
		instamax_global_options.searchScope = options.searchScope||"user"; //can be user or global
		instamax_global_options.widgetMode = options.widgetMode; 
		instamax_global_options.maxAutoReloads = options.maxAutoReloads||6;
		instamax_global_options.displayMode = options.displayMode||"popup"; //can be popup or link
		instamax_global_options.skin=options.skin;

		
		options.maxContainerWidth = options.maxContainerWidth||1200;
		$instamaxContainer.css('max-width',(options.maxContainerWidth)+'px');
		

		if(options.maxContainerWidth<500) {
			$("body").append("<style>#instamax-stat-holder {display:none;}.instamax-subscribe {display:none;}.instamax-tab {width: 42%;text-align: center;}</style>");
		}

		if(options.maxContainerWidth<300) {
			$("body").append("<style>.instamax-tab {width: 90%;text-align: center;}</style>");
		}
		
		
		//console.log(options);
		
		
		var s,albumId,apiUrl;
		var hashTagArray = [];
		
		//Get User header and details 
		if(options.user!=null) {
			s=options.user.lastIndexOf("/");
			//console.log('s-'+s);
			if(s!=-1) {
				instamax_global_options.userName = options.user.substring(s+1);
			} else {
				instamax_global_options.userName="";
				alert("Could Not Find User..");
				return;
			}
		}
		
		//set the options into Instamax
		$instamaxContainer.data('instamax_global_options',instamax_global_options);
		
		//init Instamax
		initInstamax($instamaxContainer);
		getUserId($instamaxContainer);
		
		
		//get hashtag details
		if($.isArray(options.hashtag)) {
			for(var i=0; i<options.hashtag.length; i++) {
				hashTag = options.hashtag[i].replace(/#/g,'');
				//console.log('hashTag-'+hashTag);
				hashTagArray.push(hashTag);
			}
		}
		
		displayTabs(hashTagArray,$instamaxContainer);
		
		//return this for chaining
		return this;
 
    };
	
 
}( jQuery ));