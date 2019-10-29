(function($){
    "use strict";
    $.fn.socialTimeLine = function(options){

        var defaults = {

            //VIDEO supported: youtube, vimeo
            width: 330,
            height: 600,
            enabled: 'twitter', //enable the social in the start
            facebook: {
                limit: 10, //how many post to display
                showOnly: null, //show the specified TYPE from the last LIMIT number posts, values: 'photo, 'link', 'status', 'video', 'event'
                descriptionLength: 200, //set length of message (characters)
                linkLength: 35, //set length of link (characters) - displayed when post is link type
                media: true, //display media or not (photos and videos)
                linkText:  '<i class="icon-angle-double-right"></i>', //put here text or HTML for displaying link to read more content, i.g. ..read more etc.
                disable: null, // disable elements in this social, values: 'header, 'information', 'stats', 'thumbnail', 'shares', 'likes', 'comments', 'date', 'name'
                afterLoad: null,
                likeButton: false

            },
            twitter:{
                limit: 10,
                media: true,
                disable: null, // disable elements in this social, values: 'header, 'information', 'stats', 'thumbnail', 'retweets', 'tweets', 'date', 'name'
                linkText: '<i class="icon-angle-double-right"></i>',
                afterLoad: null,
                followButton: false
            },
            instagram: {
                limit: 10,
                media: true,
                disable: null, // disable elements in this social, values: 'header, 'information', 'stats', 'thumbnail', 'likes', 'comments', 'date', 'name'
                linkText: '<i class="icon-angle-double-right"></i>',
                descriptionLength: 200,
                afterLoad: null
            },
            pinterest: {
                linkText: '<i class="icon-angle-double-right"></i>',
                descriptionLength: 200,
                disable: null, // disable elements in this social, values: 'header, 'information', 'stats', 'thumbnail', 'likes', 'repins', 'name'
                media: true,
                afterLoad: null
            },
            vkontakte: {
                linkText: '<i class="icon-angle-double-right"></i>',
                limit: 10,
                descriptionLength: 200,
                disable: null, // disable elements in this social, values: 'header, 'information', 'stats', 'thumbnail', 'likes', 'comments', 'shares', 'name', 'date
                media: true,
                afterLoad: null
            }

        };
        var settings = $.extend(true, {}, defaults, options),
            container = $(this);

        var Utility = {
            request: function(url, callback){
                $.ajax({
                    url: url,
                    dataType: 'jsonp',
                    crossDomain: true,
                    success: callback
                });
            },
            truncate: function(data, type, length_str){
                switch(type){
                    case 'message':
                        if(data.length > length_str || data.length == length_str){
                            //cut string in this way to not have cut words
                            var index;
                            index = data.indexOf(' ', length_str);

                            return data.substr(0, index) + ' ..';
                        }
                        else{
                            return data;
                        }
                        break;
                    case 'link':
                        if(data.length > length_str || data.length == length_str){
                            return data.substr(0, length_str) + '..';
                        }
                        else{
                            return data;
                        }
                        break;
                    default:
                }
            },
            //function which checks the string from the disable property in user settings
            checkState: function(property, el){
                if(property){
                    if(property.indexOf(el) != -1){
                        return true;
                    }
                }
            },
            findVideo: function(url){
                if(url.indexOf('youtube.com/') != -1){
                    return true;
                } else if(url.indexOf('youtu.be/') != -1){
                    return true;
                } else if(url.indexOf('vimeo.com/') != -1){
                    return true;
                }

                return false;
            },
            createLayout: function(){
                var navigation, menuitem = '', content, section ='', i= 0, infosocial = '', number;

                //check set settings
                if(settings.available.length > 0){

                    settings.available.forEach(function(item){
                        var iconholder, social_info = '';
                        iconholder = item;

                        if(iconholder == 'instagram')
                            iconholder = 'instagramm';
                        else if(iconholder == 'pinterest')
                            iconholder = 'pinterest-circled';

                        //each social name has to occur in Feed.socials
                        if(Feed.socials.indexOf(item) != -1){
                            menuitem += '<li role="menuitem"><a href="#" class="'+item+'-link"><i class="icon-'+iconholder+'"></i></a></li>';
                            section += '<section class="'+item+'"></section>';
                            infosocial += '<div class="social-info-'+item+'"></div>';
                            i++;
                        }
                    });
                }

                //compare if i is more than 0 to prevent displaying empty content
                if(i>0){
                    navigation = ' <nav role="navigation" class="socialMedia-nav">'+
                        '<ul role="menubar" class="socialMedia-nav-list socialMedia-nav-list-col'+i+'">'+
                        menuitem +
                        '</ul>'+
                        '</nav>'+
                        '<div class="social-info">' + infosocial +'</div>';

                    container.append(navigation);

                    content = '<div class="socialMedia-content">'+
                        '<div class="socialMedia-content-inner">'+
                        '<div class="loader">'+
                        '<div class="ball-spin-fade-loader">' +
                        '<div></div>'+
                        '<div></div>'+
                        '<div></div>'+
                        '<div></div>'+
                        '<div></div>'+
                        '<div></div>'+
                        '<div></div>'+
                        '<div></div>'+
                        '</div>'+
                        '</div>'+
                        section +
                        '</div>'+
                        '</div>';

                    container.append(content);


                    //set width, height with options
                    container.css(
                        {
                            width: settings.width + 'px'
                            //height: settings.height + 'px'
                        });
                    container.find('.socialMedia-content-inner').css(
                        {
                            width: (settings.width) + 'px',
                            height: settings.height+'px'
                        });

                    //if there is at least one social passed then execute init of the plugin

                    Feed.init();
                }
            }
        };

        var Feed = {
            enabled: settings.enabled,
            socials: ['facebook', 'twitter', 'instagram', 'pinterest', 'vkontakte'],
            init: function(){

                var l = container.find('.loader');
                //init socials and service of all links

                // $(document).on("click", function(){
                //
                //     jQuery('body').prepend(jQuery('<a href="https://twitter.com/tomaszynski123" class="twitter-follow-button" data-show-count="false">Follow @tomaszynski123</a>'))
                //
                //
                // });

                container.find('.facebook-link').on('click', function(e){
                    e.preventDefault();
                    container.find('.social-info .active').removeClass('active');
                    container.find('.social-info .social-info-facebook').addClass('active');
                    container.find('.socialMedia-nav-list li a').removeClass('active');
                    $(this).addClass('active');
                    container.find('.socialMedia-content-inner section').removeClass('active');
                    container.find('.facebook').addClass('active');

                    if(!Feed.facebook.is_loaded){

                        container.find('.loader').show();
                        l.addClass('facebook-loader');
                        Feed.facebook.getData(options.facebook.account);
                        Feed.facebook.is_loaded = true; //doesnt havta be inside the ajax, not important
                    }

                });

                container.find('.twitter-link').on('click', function(e){

                    e.preventDefault();
                    container.find('.social-info .active').removeClass('active');
                    container.find('.social-info .social-info-twitter').addClass('active');
                    container.find('.socialMedia-nav-list li a').removeClass('active');
                    $(this).addClass('active');
                    container.find('.socialMedia-content-inner section').removeClass('active');
                    container.find('.twitter').addClass('active');

                    if(!Feed.twitter.is_loaded){

                        container.find('.loader').show();
                        l.addClass('twitter-loader');

                        Feed.twitter.getData(options.twitter.account);
                        Feed.twitter.is_loaded = true; //doesnt havta be inside the ajax, not important
                    }

                });

                container.find('.instagram-link').on('click', function(e){
                    e.preventDefault();
                    container.find('.social-info .active').removeClass('active');
                    container.find('.social-info .social-info-instagram').addClass('active');
                    container.find('.socialMedia-nav-list li a').removeClass('active');
                    $(this).addClass('active');
                    container.find('.socialMedia-content-inner section').removeClass('active');
                    container.find('.instagram').addClass('active');

                    if(!Feed.instagram.is_loaded){

                        container.find('.loader').show();
                        l.addClass('instagram-loader');
                        Feed.instagram.getData(options.instagram.account);
                        Feed.instagram.is_loaded = true; //doesnt havta be inside the ajax, not important
                    }

                });

                container.find('.pinterest-link').on('click', function(e){
                    e.preventDefault();
                    container.find('.social-info .active').removeClass('active');
                    container.find('.social-info .social-info-pinterest').addClass('active');
                    container.find('.socialMedia-nav-list li a').removeClass('active');
                    $(this).addClass('active');
                    container.find('.socialMedia-content-inner section').removeClass('active');
                    container.find('.pinterest').addClass('active');

                    if(!Feed.pinterest.is_loaded){

                        container.find('.loader').show();
                        l.addClass('pinterest-loader');
                        Feed.pinterest.getData(options.pinterest.account);
                        Feed.pinterest.is_loaded = true; //doesnt havta be inside the ajax, not important
                    }

                });

                container.find('.vkontakte-link').on('click', function(e){
                    e.preventDefault();
                    container.find('.social-info .active').removeClass('active');
                    container.find('.social-info .social-info-vkontakte').addClass('active');
                    container.find('.socialMedia-nav-list li a').removeClass('active');
                    $(this).addClass('active');
                    container.find('.socialMedia-content-inner section').removeClass('active');
                    container.find('.vkontakte').addClass('active');

                    if(!Feed.vkontakte.is_loaded){

                        container.find('.loader').show();
                        l.addClass('vkontakte-loader');
                        Feed.vkontakte.getData(options.vkontakte.account);
                        Feed.vkontakte.is_loaded = true; //doesnt havta be inside the ajax, not important
                    }

                });


                //if exists html element with the same class as was given to the initalization of the plugin then fill with enabled, if there wasny element like that,
                // init was triggered unnecesary and operations was added
                if($(container.selector).length > 0){

                    if((Feed.enabled != undefined) && (Feed.socials.indexOf(Feed.enabled) != -1)){

                        container.find('.social-info .social-info-'+Feed.enabled).addClass('active');
                        l.addClass(Feed.enabled+'-loader');
                        container.find('.'+ Feed.enabled + '-link').addClass('active');
                        container.find('.'+Feed.enabled).addClass('active');
                        Feed[Feed.enabled].getData(options[Feed.enabled].account);
                        Feed[Feed.enabled].is_loaded = true;
                        Feed.enabled = undefined; //this has to be on the end

                    }
                }

                //Feed.socials.forEach(function(social){
                //    //check all socials if they exist as objects or no
                //    if(options[social] && Feed[social]){
                //
                //        Feed[social].getData(options[social].account);
                //    }
                //});


            },
            facebook: {
                is_loaded: false,
                len: null, //this variable is needed for comparising so that we dont have to repeat ourselves in rendering code
                len_show: 0, //this variable is also required for comparising if facebook > show exist
                graph: 'https://graph.facebook.com/',
                type: ['photo', 'link', 'status', 'video', 'event'], //5 of our allowed types of feed on Facebook


                getData: function(account){


                    if((settings.facebook.token != undefined) && (account != undefined)){

                        var limit = 'limit='+settings.facebook.limit,
                            token = '&access_token='+settings.facebook.token,
                            callback_str = '&callback=?',
                            api_version = 'v2.6/', //v2.3/
                            request = Feed.facebook.graph+api_version+account+'/posts?fields=type,created_time,name,message,picture,from,link,source,object_id&'+limit+token+callback_str;

                        Utility.request(request, Feed.facebook.utility.getPosts);
                    }
                },
                utility: {
                    getPosts: function(json){

                        if(json['data']){
                            json['data'].forEach(function(element){
                                //save the elements number
                                Feed.facebook.len = json['data'].length;

                                Feed.facebook.utility.getDataPosts(element);

                            });
                        }
                    },

                    getDataPosts: function(element){
                        if(Feed.facebook.type.indexOf(element.type) != -1){

                            //if we have property show in facebook then we do not want to proceed other type posts except of its value which is set in this property
                            //we also need to count the variable to compare it before the render of the page, it's required
                            if(settings.facebook.showOnly){
                                if((Feed.facebook.type.indexOf(settings.facebook.showOnly) != -1) && (element.type == settings.facebook.showOnly)){
                                    ++Feed.facebook.len_show;
                                }
                                else{
                                    return false;
                                }
                            }

                            //create own object where we can store the data we want to
                            var post = {};
                            post.id = element.id;
                            post.page_name = element.from.name;
                            post.page_id = element.from.id;
                            post.type = element.type;
                            post.created = element.created_time;
                            post.thumbnail_page = Feed.facebook.graph + element.from.id + '/picture';

                            //determine what kind of feed you get and what you are going to display then, depends on types
                            switch(post.type){
                                case 'photo':
                                    Feed.facebook.utility.getFeedType.photo(post,element);
                                    break;
                                case 'link':
                                    Feed.facebook.utility.getFeedType.link(post,element);
                                    break;
                                case 'status':
                                    Feed.facebook.utility.getFeedType.status(post,element);
                                    break;
                                case 'video':
                                    Feed.facebook.utility.getFeedType.video(post,element);
                                    break;
                                case 'event':
                                    Feed.facebook.utility.getFeedType.event(post,element);
                                    break;
                                default:
                            }

                            if(element.shares != undefined){
                                post.shares = element.shares.count;
                            } else{
                                post.shares = 0;
                            }

                            // get another 2 nested each other ajax calls to get number of likes and comments
                            Feed.facebook.utility.getComments(post, element);
                        }
                    },
                    getFeedType: {
                        event: function(postobj, data){
                            postobj.caption = data.caption;
                            postobj.link = data.link;

                            //can be undefined description
                            if(data.description != undefined){
                                postobj.description = data.description;
                            }
                        },
                        link: function(postobj, data){
                            postobj.link = data.link;

                            //can be undefined message
                            if(data.message != undefined){
                                postobj.message = data.message;
                            }
                        },
                        status: function(postobj, data){
                            postobj.message = data.message;
                        },
                        video: function(postobj, data){
                            postobj.link = data.link;
                            postobj.source = data.source;

                            //can be undefined message
                            if(data.message != undefined){
                                postobj.message = data.message;
                            }
                        },
                        photo: function(postobj, data){
                            postobj.link = data.link;
                            postobj.picture = Feed.facebook.utility.getImageAttachment(Feed.facebook.graph, data.object_id);

                            //can be undefined message
                            if(data.message != undefined){
                                postobj.message = data.message;
                            }
                        }
                    },

                    //get the primary link of the picture if the type is photo
                    getImageAttachment: function(api, id){
                        return api + id + '/picture';
                    },
                    getComments: function(post, element){

                        var token = '&access_token='+settings.facebook.token,
                            request = Feed.facebook.graph + element.id + '/comments?summary=true'+token;
                        Utility.request(request, function(json){
                            if(json['summary']){

                                //add the count likes into the object post
                                post.comments = json['summary'].total_count;
                                Feed.facebook.utility.getLikes(post, element);
                            }

                        });
                    },
                    getLikes: function(post, element){
                        var token = '&access_token='+settings.facebook.token,
                            request = Feed.facebook.graph + element.id + '/likes?summary=true'+token;

                        Utility.request(request, function(json){
                            if(json['summary']){
                                //add the count likes into the object post
                                post.likes = json['summary'].total_count;

                                //add data to the table
                                Feed.facebook.savedData.push(post);

                                //make variables which can be compared if it's the same value of savedData length to the real elements length
                                //it's needed for not repeating itself in saving data and comparing date where we want to sort them

                                var saved_len = Feed.facebook.savedData.length,
                                    feed_len = Feed.facebook.len;

                                //if both values are equal then pass the whole data and go for sorting

                                //we have double security for getting data into rendering which has to be realized, in second expression when user will set the property -> show
                                //after that we compare if its equal or not, thats the same example as for first expression BECAUSE we do not want to repeat our object ORDER data many times

                                if((saved_len == feed_len) || (saved_len == Feed.facebook.len_show)){
                                    Feed.facebook.orderData(Feed.facebook.savedData);
                                }

                            }
                        });
                    }
                },
                savedData: [],
                sortedData: null,
                orderData: function(data){

                    //ascending function for sorting set of elements
                    function compare(a,b) {
                        if (a.created < b.created)
                            return -1;
                        if (a.created > b.created)
                            return 1;
                        return 0;
                    }

                    //set data to seperate variable, set DESC sorting and return to the object because api by default retunrs not sorted elements, after all we reverse data
                    var s_data = data;
                    s_data.sort(compare);
                    Feed.facebook.sortedData = s_data.reverse();

                    //cannt be null, it has to exist
                    if(Feed.facebook.sortedData != null){
                        Render.facebook(Feed.facebook.sortedData);
                    }
                }
            },
            twitter: {
                len: null,
                is_loaded: false,


                getData: function(account){


                    //if are declared these properties
                    if((settings.twitter.consumer_key != undefined) && (settings.twitter.consumer_secret != undefined) && (account != undefined)){

                        //initialization authorization with codebird which allows us to pass our secret tokens and rest staff
                        var authO = new Codebird;
                        authO.setConsumerKey(settings.twitter.consumer_key, settings.twitter.consumer_secret);
                        //check if the limit is more then 0 - it prevents against setting incorrect value
                        if(options.twitter.limit > 0){

                            authO.__call(
                                "statuses_userTimeline",
                                "id=" + account + "&count=" + options.twitter.limit +'&callback=?',
                                Feed.twitter.utility.getPosts,
                                true
                            );
                        }
                    }
                },
                utility: {
                    getPosts: function (json) {

                        if (json) {
                            Feed.twitter.len = json.length;
                            json.forEach(function (element, i) {

                                //TODO SOMETIMES API PASS THE 0 COUNTS LIKES below the post
                                //prepare posts
                                Feed.twitter.utility.getDataPosts(element, i);

                            });
                        }

                    },
                    getDataPosts: function(element, i){



                        var tweet = {}, entities_media, info = container.find('.social-info .social-info-twitter');
                        tweet.id = element.id_str;
                        tweet.created = element.created_at;
                        tweet.description = element.text;
                        tweet.tweets = element.favorite_count;
                        tweet.retweets = element.retweet_count;
                        tweet.username = element.user.name;
                        tweet.thumbnail = element.user.profile_image_url;
                        tweet.page_name = element.user.screen_name;
                        tweet.link = 'http://twitter.com/' + tweet.page_name + '/status/' + tweet.id;

                        if(i===0){


                            if (settings.twitter.followButton) {
                                var followBTN = jQuery(
                                    // '<a href="https://twitter.com/tomaszynski123" class="twitter-follow-button" data-show-count="false">Follow @tomaszynski123</a>' +

                                    '<div class="social-info-avatar">'+

                                    '<img src="'+tweet.thumbnail+'" alt="Thumbnail Twitter">' +
                                    '</div>' +
                                    '<div class="social-info-name">'+
                                    tweet.page_name +
                                    '</div>' +

                                    '<div class="social-info-action">' +

                                    '<a href="https://twitter.com/'+ tweet.page_name + '" class="twitter-follow-button" data-show-count="false" data-size="default" data-lang="en" data-show-screen-name="false"></a>'+

                                    '</div>'
                                );

                                info.append(followBTN,[]);
                                $.getScript("http://platform.twitter.com/widgets.js");
                            } else {
                                var followBTN = jQuery(
                                    // '<a href="https://twitter.com/tomaszynski123" class="twitter-follow-button" data-show-count="false">Follow @tomaszynski123</a>' +

                                    '<div class="social-info-avatar">'+

                                    '<img src="'+tweet.thumbnail+'" alt="Thumbnail Twitter">' +
                                    '</div>' +
                                    '<div class="social-info-name">'+
                                    tweet.page_name +
                                    '</div>' +

                                    '<div class="social-info-action">' +

                                    '<a href="https://twitter.com/'+ tweet.page_name +'">Follow</a>'+

                                    '</div>'
                                );

                                info.append(followBTN,[]);
                            }

                        }

                        //check the properties of the media because you can have image or video or nothing, there is a need to compare all conditions to prevent collisions
                        entities_media = element.entities.media;
                        if(entities_media){
                            if(entities_media[0].type && entities_media[0].type == 'photo'){
                                tweet.image = entities_media[0].media_url;
                            }
                        } else {
                            //in this snippet we havta specify do we have video or now, there will be array of urls, simple url or none of url, we neea test it out
                            if(element.entities.urls.length != 0){
                                var url;
                                //if we have more url videos then check if there is any and choose and break if exist at least one
                                if(element.entities.urls.length > 1){
                                    var property;
                                    for(property in element.entities.urls){
                                        if(element.entities.urls.hasOwnProperty(property)){
                                            url = element.entities.urls[property].expanded_url;

                                            //break if we find the video
                                            if(Utility.findVideo(url)){
                                                tweet.video = url;
                                                break;
                                            }
                                        }
                                    }
                                } else{
                                    url = element.entities.urls[0].expanded_url;
                                    if(Utility.findVideo(url)){
                                        tweet.video = url;
                                    }
                                }
                            }
                        }

                        Render.twitter(tweet, i);
                    }
                }
            },
            instagram: {
                len: null,
                is_loaded: false,
                api: 'https://api.instagram.com/v1/',
                getData: function () {

                    if (settings.instagram.access_token != undefined) {
                        var url = Feed.instagram.api + 'users/self/media/recent/?access_token=' + settings.instagram.access_token + '&count='+ settings.instagram.limit;
                        Utility.request(url, Feed.instagram.utility.getUser);
                    }
                },
                utility: {
                    getUser: function(user){
                        if(user.data){
                            Feed.instagram.utility.getDataUser(user.data);
                        }
                    },
                    getDataUser: function(json){
                        Feed.instagram.len = json.length;
                        json.forEach(function(data, i){
                            Feed.instagram.utility.getDataPosts(data, i);
                        });
                    },
                    getDataPosts: function(element, i){
                        
                        var photo = {}, date,
                            months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'], info = container.find('.social-info .social-info-instagram');

                        if(i==0){
                            info.append(
                                '<div class="social-info-avatar">'+
                                '<img src="'+element.user.profile_picture+'" alt="Thumbnail Instagram">' +
                                '</div>' +
                                '<div class="social-info-name">'+
                                element.user.username +
                                '</div>' +
                                '<div class="social-info-action">'+
                                '<a href="https://instagram.com/'+ element.user.username +'">Follow</a>'+
                                '</div>'
                            );
                        }

                        photo.type = element.type;

                        date = new Date(parseInt(element.created_time,10) * 1000);

                        photo.created = months[date.getMonth()]+' '+date.getDate()+', '+date.getFullYear();
                        photo.link = element.link;
                        photo.likes = element.likes.count;
                        photo.comments = element.comments.count;
                        photo.username = element.user.full_name;
                        photo.thumbnail = element.user.profile_picture;
                        photo.page_name = element.user.username;

                        if(element.caption != undefined){
                            photo.caption = element.caption.text;
                        }

                        if(element.type === 'image'){
                            photo.image = element.images.standard_resolution.url;
                        } else if(element.type === 'video'){
                            if(element.videos != undefined){
                                photo.video = element.videos.standard_resolution.url;
                            }
                        }
                        Render.instagram(photo, i);
                    }
                }
            },
            pinterest: {
                is_loaded: false,
                len: null,
                api: 'https://api.pinterest.com/v3/',
                getData: function (account) {

                    if (account != undefined){
                        var url = Feed.pinterest.api + 'pidgets/users/' + settings.pinterest.account + '/pins';


                        //get user to retrieve id and call another ajax thanks to it
                        Utility.request(url, Feed.pinterest.utility.getPins);

                        //TODO Pinterest display latest 50 added pins
                    }

                },
                utility: {
                    getPins: function(json){
                        if(json.data.pins){
                            Feed.pinterest.len = json.data.pins.length;

                            json.data.pins.forEach(function(data, i){
                                Feed.pinterest.utility.getDataPosts(data, i);
                            });

                        }
                    },
                    getDataPosts: function(element, i){

                        var pin = {}, info = container.find('.social-info .social-info-pinterest'), pom, photo;
                        pin.id = element.id;
                        //pin.created = element.board.image_thumbnail_url; //get date from this img link
                        pin.created ='';
                        pin.description = element.description;
                        pin.likes = element.like_count;
                        pin.repins = element.repin_count;
                        pin.page_name = element.pinner.full_name;
                        pin.page_url = element.pinner.profile_url;
                        pin.thumbnail = element.pinner.image_small_url;
                        pin.link = 'http://www.pinterest.com/pin/'+pin.id;
                        photo = element.images['237x'].url;
                        pom = photo.replace('237x', '1200x');
                        pin.image = pom;
                        if(i==0){
                            info.append(
                                '<div class="social-info-avatar">'+
                                '<img src="'+pin.thumbnail+'" alt="Thumbnail Pinterest">' +
                                '</div>' +
                                '<div class="social-info-name">'+
                                pin.page_name +
                                '</div>' +
                                '<div class="social-info-action">'+
                                '<a href="'+ pin.page_url +'">Follow</a>'+
                                '</div>'
                            );
                        }

                        Render.pinterest(pin, i);
                    }
                }
            },
            vkontakte: {
                is_loaded: false,
                len: null,
                api: 'https://api.vk.com/',
                //we are creating additional seperated properties so that to keep the values in one place - vkontakte doesnt have username details in api call, thats the reason
                full_name: null,
                thumbnail: null,
                username: null,
                getData: function (account) {

                    if (account != undefined){

                        var userUrl = Feed.vkontakte.api + 'method/users.get?user_ids=' + settings.vkontakte.account + '&fields=screen_name,photo_medium';

                        Utility.request(userUrl, function(json){

                            if(json.response){
                                if(json.response[0]){

                                    Feed.vkontakte.full_name = json.response[0].first_name + ' ' + json.response[0].last_name;
                                    Feed.vkontakte.thumbnail = json.response[0].photo_medium;
                                    Feed.vkontakte.username = json.response[0].screen_name;

                                    var url = Feed.vkontakte.api + 'method/wall.get?owner_id=' + settings.vkontakte.account + '&count=' + settings.vkontakte.limit;
                                    //get user to retrieve id and call another ajax thanks to it
                                    Utility.request(url, Feed.vkontakte.utility.getPosts);
                                }
                            }
                        });

                    }

                },
                utility: {
                    getPosts: function(json){

                        if(json.response){
                            Feed.vkontakte.len = json.response.length;
                            json.response.forEach(function(data,i){
                                //first element which is returned in VK is the length of elements - a number, so we need to omit it this and move on
                                if(!(i==0)){
                                    Feed.vkontakte.utility.getDataPosts(data, i);
                                }
                            });
                        }
                    },
                    getDataPosts: function(element, i){

                        var post = {}, info = container.find('.social-info .social-info-vkontakte'),
                            date = new Date(parseInt(element.date, 10) * 1000),
                            months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

                        post.created = months[date.getMonth()]+' '+date.getDate()+', '+date.getFullYear();
                        post.comments = element.comments.count;
                        post.likes = element.likes.count;
                        post.shares = element.reposts.count;
                        post.text = element.text;
                        post.thumbnail = Feed.vkontakte.thumbnail;
                        post.full_name = Feed.vkontakte.full_name;
                        post.username = Feed.vkontakte.username;
                        post.link = 'https://vk.com/' + Feed.vkontakte.username;

                        if(element.attachment){
                            if(element.attachment.type == 'photo'){
                                post.photo = element.attachment.photo.src_big;
                            } else if(element.attachment.type == 'video'){
                                post.video = element.attachment.video.image_big;
                                post.videoTitle = element.attachment.video.title;
                            }
                        }

                        if(i==1){
                            info.append(
                                '<div class="social-info-avatar">' +
                                '<img src="'+post.thumbnail+'" alt="Thumbnail Vkontakte">' +
                                '</div>' +
                                '<div class="social-info-name">' +
                                post.full_name +
                                '</div>' +
                                '<div class="social-info-action">'+
                                '<a href="'+ post.link +'">Follow</a>' +
                                '</div>'
                            );
                        }

                        Render.vkontakte(post, i);
                    }
                }
            }
        };

        var Render = {
            facebook: function(post) {

                //post - array of objects
                var data = post,
                    fb = container.find('.facebook'), info = container.find('.social-info .social-info-facebook');

                var id, page_id, page_name, type, created, thumbnail_page, shares, likes, comments, link, picture, message, caption, description, source, facebook_url, html,
                    result, header_markup, thumbnail_markup, page_markup, page_name_markup, post_created_markup, post_stats_markup, likes_markup, comments_markup, shares_markup, disable; //results

                for(var i=0, len=data.length; i<len; i++){
                    if(i==0){

                        if (settings.facebook.likeButton) {
                            info.append(
                                '<div class="social-info-avatar">'+
                                '<img src="'+data[i].thumbnail_page+'" alt="Thumbnail Facebook">' +
                                '</div>' +
                                '<div class="social-info-name">'+
                                data[i].page_name +
                                '</div>' +
                                '<div class="social-info-action">'+
                                '<div class="fb-like" data-share="false" data-width="100" data-show-faces="false" data-href="https://facebook.com/'+ data[i].page_id + '" data-layout="button"></div>' +
                                '</div>'
                            );

                            if (typeof (FB) != 'undefined') {
                                FB.init({ status: true, cookie: true, xfbml: true });
                            } else {
                                $.getScript("http://connect.facebook.net/en_US/all.js#xfbml=1", function () {
                                    FB.init({ status: true, cookie: true, xfbml: true });
                                });
                            }
                        } else {
                            info.append(
                                '<div class="social-info-avatar">'+
                                '<img src="'+data[i].thumbnail_page+'" alt="Thumbnail Facebook">' +
                                '</div>' +
                                '<div class="social-info-name">'+
                                data[i].page_name +
                                '</div>' +
                                '<div class="social-info-action">'+
                                '<a href="https://facebook.com/'+ data[i].page_id +'">Like it</a>'+
                                '</div>'
                            );
                        }

                    }

                    id = data[i].id;
                    page_id = data[i].page_id;
                    page_name = data[i].page_name;
                    type = data[i].type;
                    created = moment(data[i].created).format('LL');
                    thumbnail_page = data[i].thumbnail_page;
                    shares = data[i].shares;
                    likes = data[i].likes;
                    comments = data[i].comments;
                    facebook_url = 'https://www.facebook.com/';

                    switch(type){

                        // PHOTO ----------------------------------------------------------------------------------------------------------------------------------

                        case 'photo':

                            link = data[i].link;
                            picture =  data[i].picture;
                            html = '';

                            //can be undefined message
                            if(data[i].message != undefined){
                                message = '<div class="social-message">' + Utility.truncate(data[i].message, 'message', settings.facebook.descriptionLength);
                                html = message;
                                html += '<a href="' + link + '">' + settings.facebook.linkText +'</a>';
                                html += "</div>";
                            }

                            //if default property media is true then we display image
                            if(settings.facebook.media){
                                html += '<div class="social-image"><a href="' + link + '"><img src="' + picture + '" alt="Post Picture"></a>';
                            }
                            else{
                                //if there is no message and also media is set to false the we dont have any content, in this case we should write out sth to show to user
                                //in this case it will be simple link
                                if(data[i].message == undefined){
                                    message = '<div class="social-message"><a href="' + link + '">' + settings.facebook.linkText +'</a></div>';
                                    html = message;
                                }
                            }
                            break;

                        // LINK ----------------------------------------------------------------------------------------------------------------------------------

                        case 'link':

                            link = data[i].link;
                            html = '';

                            //can be undefined message
                            if(data[i].message != undefined){
                                message = '<div class="social-message">' + Utility.truncate(data[i].message, 'message', settings.facebook.descriptionLength);
                                html = message;
                                html += '<a href="' + facebook_url + id + '">' + settings.facebook.linkText +'</a>';
                                html += "</div>";
                            }
                            html += '<div class="social-link"><a href="'+ link +'">'+ Utility.truncate(link, 'link', settings.facebook.linkLength) +'</a>';
                            break;

                        // STATUS ----------------------------------------------------------------------------------------------------------------------------------

                        case 'status':

                            //status always have description
                            html = '<div class="social-message">' + Utility.truncate(data[i].message, 'message', settings.facebook.descriptionLength);
                            html += '<a href="' + facebook_url + id + '">' + settings.facebook.linkText +'</a>';
                            html += "</div>";
                            break;

                        // VIDEO ----------------------------------------------------------------------------------------------------------------------------------

                        case 'video':

                            link = data[i].link;
                            source = data[i].source;
                            html = '';

                            if(data[i].message != undefined){
                                message = '<div class="social-message">' + Utility.truncate(data[i].message, 'message', settings.facebook.descriptionLength);
                                html = message;
                                html += '<a href="' + facebook_url + id + '">' + settings.facebook.linkText +'</a>';
                                html += "</div>";
                            }

                            //if default property media is true then we display video media
                            if(settings.facebook.media){
                                //we get url for the video (from facebook) and we havta specify the type of media to display most of players
                                if(source.indexOf('youtube.com') != -1){
                                    html += '<div class="social-video"><iframe src="' + source + '?autoplay=0"></iframe></div>';
                                }
                                else if(source.indexOf('youtu.be') != -1){
                                    html += '<div class="social-video"><iframe src="' + source + '?autoplay=0"></iframe></div>';
                                }
                                else if(source.indexOf('vimeo') != -1){

                                    //replace string with aoutoplay because fb adds automatically autoplay and we cant add another action to the link, we need to change this in advance
                                    var rep_source = source.replace('autoplay=1', 'autoplay=0');

                                    html += '<div class="social-video"><iframe src="' + rep_source + '"></iframe></div>';

                                }
                                else{
                                    html += '<div class="social-video"><video controls=""><source src="' + source + '">Your browser does not support video tag</video></div>';
                                }
                            }
                            else{
                                //if there is no message and also media is set to false the we dont have any content, in this case we should write out sth to show to user
                                //in this case it will be simple link
                                if(data[i].message == undefined){
                                    message = '<div class="social-message"><a href="' + link + '">' + settings.facebook.linkText +'</a></div>';
                                    html = message;
                                }
                            }
                            break;

                        // EVENT ----------------------------------------------------------------------------------------------------------------------------------

                        case 'event':

                            link = data[i].link;
                            caption =  '<div class="social-caption"><h3><a href="' + link + '">' + data[i].caption + '</a></h3></div>';
                            html = '';
                            html += caption;

                            //event have description instead message
                            if(data[i].description != undefined){
                                description = '<div class="social-message">' + Utility.truncate(data[i].description, 'message', settings.facebook.descriptionLength);
                                html += description;
                                html += '<a href="' + facebook_url + id + '"><i class="icon-angle-double-right"></i></a>';
                                html += "</div>";
                            }
                            break;

                        default:
                    }


                    disable = settings.facebook.disable;

                    //rendering visible and disabled parts of html, user can choose that what content do display and do not display
                    //DISABLE WHEN: if there is disable property and word occurs in indexof the element, then assign empty string - otherwise write out normal html with variables


                    // show/disable NAME ------------------------------------------------------------------------------------------------------------------


                    if(disable && Utility.checkState(disable, 'name')){
                        page_name_markup = '';
                    } else{
                        page_name_markup = '<div class="social-page-name">' +
                            '<a href="' + facebook_url + page_id + '">' +
                            page_name +
                            '</a>' +
                            '</div>';
                    }

                    // show/disable DATE -------------------------------------------------------------------------------------------------------------------

                    if(disable && Utility.checkState(disable, 'date')){
                        post_created_markup = '';
                    } else{
                        post_created_markup = '<div class="social-post-created">' + created + '</div>';
                    }

                    // show/disable LIKES ------------------------------------------------------------------------------------------------------------------

                    if(disable && Utility.checkState(disable, 'likes')){
                        likes_markup = '';
                    } else{
                        likes_markup = '<div class="social-likes">' +
                            '<i class="icon-thumbs-up"></i>' + likes +
                            '</div>';
                    }

                    // show/disable COMMENTS ---------------------------------------------------------------------------------------------------------------

                    if(disable && Utility.checkState(disable, 'comments')){
                        comments_markup = '';
                    } else{
                        comments_markup = '<div class="social-comments">' +
                            '<i class="icon-comment"></i>' + comments +
                            '</div>';
                    }

                    // show/disable SHARES ------------------------------------------------------------------------------------------------------------------

                    if(disable && Utility.checkState(disable, 'shares')){
                        shares_markup = '';
                    } else{
                        shares_markup = '<div class="social-shares">' +
                            '<i class="icon-share"></i>' + shares +
                            '</div>';
                    }

                    // show/disable STATS --------------------------------------------------------------------------------------------------------------------

                    if(disable && Utility.checkState(disable, 'stats')){
                        post_stats_markup = '';
                    } else{
                        post_stats_markup = '<div class="social-post-stats">' +
                            likes_markup +
                            comments_markup +
                            shares_markup +
                            '</div>';
                    }

                    // show/disable INFORMATION ---------------------------------------------------------------------------------------------------------------


                    if(disable && Utility.checkState(disable, 'information')){
                        page_markup = '';
                    } else{
                        page_markup = '<div class="social-page">' +
                            page_name_markup +
                            post_created_markup +
                            '<div class="clear"></div>' +
                            post_stats_markup +
                            '</div>';
                    }

                    // show/disable THUMBNAIL ------------------------------------------------------------------------------------------------------------------

                    if(disable && Utility.checkState(disable, 'thumbnail')){
                        thumbnail_markup = '';
                    } else{
                        thumbnail_markup = '<div class="social-thumbnail"><a href="'+ facebook_url + page_id + '"><img src="' + thumbnail_page + '" alt="' + page_name + '"></a></div>';
                    }


                    // show/disable HEADER --------------------------------------------------------------------------------------------------------------------

                    if(disable && Utility.checkState(disable, 'header')){
                        header_markup = '';
                    } else{
                        header_markup = '<div class="social-header">' +
                            thumbnail_markup +
                            page_markup +
                            '</div>';
                    }

                    result = '<div class="social-post">' +
                        header_markup +
                        '<div class="social-content">' +
                        html +
                        '</div>' +
                        '</div>';

                    //attach main result of the rendered html and variables
                    fb.append(result);
                }
                container.find('.loader').removeClass('facebook-loader');
                container.find('.loader').hide();

                if(settings.facebook.afterLoad && (typeof settings.facebook.afterLoad == 'function')){
                    settings.facebook.afterLoad();
                }

            },
            twitter: function(tweet, i) {

                var data = tweet,
                    tw = container.find('.twitter'), html, disable,
                    created, description, tweets, retweets, username, thumbnail, page_name, link, video, image, result,
                    created_markup, description_markup, tweets_markup, retweets_markup, page_name_markup,
                    header_markup, page_markup, thumbnail_markup, tweet_stats_markup;


                created = moment(data.created).format('LL');
                description = data.description;
                tweets = data.tweets;
                retweets = data.retweets;
                username = data.username;
                thumbnail = data.thumbnail;
                page_name = data.page_name;
                link = data.link;

                //show if media is true
                if(settings.twitter.media){
                    //if there are video and image then assign to the new variables
                    if(data.image)image = data.image;
                    else if(data.video) video = data.video;
                }


                // show/disable HEADER --------------------------------------------------------------------------------------------------------------------

                disable = settings.twitter.disable;
                html = '';
                description_markup = '<div class="social-message">' + description + '<a href="' + link + '">' + settings.twitter.linkText +'</a></div>';
                html += description_markup;

                if(image != undefined){
                    html += '<div class="social-image"><a href="' + link + '"><img src="' + image + '" alt="Post Picture"></a>';
                } else if(video != undefined){
                    var rep_video;
                    if(video.indexOf('youtube.com/') != -1){

                        rep_video = video.replace('watch?v=', 'embed/');
                        html += '<div class="social-video"><iframe src="' + rep_video + '?autoplay=0"></div>';

                    } else if(video.indexOf('vimeo.com/') != -1){

                        rep_video = video.replace('vimeo.com/', 'player.vimeo.com/video/');
                        html += '<div class="social-video"><iframe src="' + rep_video + '?autoplay=0"></div>';

                    }
                }

                // show/disable NAME ------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'name')){
                    page_name_markup = '';
                } else{
                    page_name_markup = '<div class="social-page-name">' +
                        '<a href="http://twitter.com/' + page_name + '">' +
                        username +
                        '</a>' +
                        '</div>';
                }

                // show/disable DATE -------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'date')){
                    created_markup = '';
                } else{
                    created_markup = '<div class="social-post-created">' + created + '</div>';
                }

                // show/disable LIKES ------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'tweets')){
                    tweets_markup = '';
                } else{
                    tweets_markup = '<div class="social-likes">' +
                        '<i class="icon-star"></i>' + tweets +
                        '</div>';
                }

                // show/disable COMMENTS ---------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'retweets')){
                    retweets_markup = '';
                } else{
                    retweets_markup = '<div class="social-comments">' +
                        '<i class="icon-retweet"></i>' + retweets +
                        '</div>';
                }

                // show/disable STATS --------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'stats')){
                    tweet_stats_markup = '';
                } else{
                    tweet_stats_markup = '<div class="social-post-stats">' +

                        tweets_markup +
                        retweets_markup +

                        '</div>';
                }

                // show/disable INFORMATION ---------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'information')){
                    page_markup = '';
                } else{
                    page_markup = '<div class="social-page">' +
                        page_name_markup +
                        created_markup +
                        '<div class="clear"></div>' +
                        tweet_stats_markup +
                        '</div>';
                }

                // show/disable THUMBNAIL ------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'thumbnail')){
                    thumbnail_markup = '';
                } else{
                    thumbnail_markup = '<div class="social-thumbnail"><a href="http://twitter.com/'+ page_name + '"><img src="' + thumbnail + '" alt="' + page_name + '"></a></div>';
                }

                // show/disable HEADER --------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'header')){
                    header_markup = '';
                } else{
                    header_markup = '<div class="social-header">' +
                        thumbnail_markup +
                        page_markup +
                        '</div>';
                }

                result= '<div class="social-post">' +
                    header_markup +
                    '<div class="social-content">' +
                    html +
                    '</div>' +
                    '</div>';


                tw.append(result);
                container.find('.loader').removeClass('twitter-loader');
                container.find('.loader').hide();
                if(Feed.twitter.len == (i+1)){
                    if(settings.twitter.afterLoad && (typeof settings.twitter.afterLoad == 'function')){
                        settings.twitter.afterLoad();
                    }
                }
            },
            instagram: function(photo, i) {

                var data = photo, disable, html, result, instagram = container.find('.instagram'),
                    created, link, likes, comments, username, thumbnail, page_name, image, video,
                    header_markup, thumbnail_markup, page_markup, instagram_stats_markup, page_name_markup, created_markup, likes_markup, comments_markup, description_markup,
                    year, month, day, date, parsed_date;

                created = data.created;

                link = data.link;
                likes = data.likes;
                comments = data.comments;
                username = data.username;
                thumbnail = data.thumbnail;
                page_name = data.page_name;

                // show/disable HEADER --------------------------------------------------------------------------------------------------------------------

                if(settings.instagram.media){
                    //if there are video and image then assign to the new variables
                    if(data.image) image = data.image;
                    else if(data.video) video = data.video;
                }

                disable = settings.instagram.disable;
                html = '';


                if(data.caption != undefined){
                    description_markup = '<div class="social-message">' + Utility.truncate(data.caption, 'message', settings.instagram.descriptionLength) + '<a href="' + link + '">' + settings.instagram.linkText +'</a></div>';
                    html += description_markup;
                } else {
                    description_markup = '<div class="social-message"><a href="' + link + '">' + settings.instagram.linkText +'</a></div>';
                    html += description_markup;
                }


                if(image != undefined){
                    html += '<div class="social-image"><a href="' + link + '"><img src="' + data.image + '" alt="Post Picture"></a></div>';
                } else if(video != undefined){
                    html += '<div class="social-video"><video controls=""><source src="' + data.video + '">Your browser does not support video tag</video></div>';
                }

                // show/disable NAME ------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'name')){
                    page_name_markup = '';
                } else{
                    page_name_markup = '<div class="social-page-name">' +
                        '<a href="http://instagram.com/' + page_name + '">' +
                        username +
                        '</a>' +
                        '</div>';
                }

                // show/disable DATE -------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'date')){
                    created_markup = '';
                } else{
                    created_markup = '<div class="social-post-created">' + created + '</div>';
                }

                // show/disable LIKES ------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'likes')){
                    likes_markup = '';
                } else{
                    likes_markup = '<div class="social-likes">' +
                        '<i class="icon-heart"></i>' + likes +
                        '</div>';
                }

                // show/disable COMMENTS ---------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'comments')){
                    comments_markup = '';
                } else{
                    comments_markup = '<div class="social-comments">' +
                        '<i class="icon-comment"></i>' + comments +
                        '</div>';
                }

                // show/disable STATS --------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'stats')){
                    instagram_stats_markup = '';
                } else{
                    instagram_stats_markup = '<div class="social-post-stats">' +
                        likes_markup +
                        comments_markup +
                        '</div>';
                }

                // show/disable INFORMATION ---------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'information')){
                    page_markup = '';
                } else{
                    page_markup = '<div class="social-page">' +
                        page_name_markup +
                        created_markup +
                        '<div class="clear"></div>' +
                        instagram_stats_markup +
                        '</div>';
                }

                // show/disable THUMBNAIL ------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'thumbnail')){
                    thumbnail_markup = '';
                } else{
                    thumbnail_markup = '<div class="social-thumbnail"><a href="http://instagram.com/'+ page_name + '"><img src="' + thumbnail + '" alt="' + page_name + '"></a></div>';
                }

                // show/disable HEADER --------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'header')){
                    header_markup = '';
                } else{
                    header_markup = '<div class="social-header">' +
                        thumbnail_markup +
                        page_markup +
                        '</div>';
                }

                result= '<div class="social-post">' +
                    header_markup +
                    '<div class="social-content">' +
                    html +
                    '</div>' +
                    '</div>';

                container.find('.loader').removeClass('instagram-loader');
                container.find('.loader').hide();
                instagram.append(result);
                if(Feed.instagram.len == (i+1)){
                    if(settings.instagram.afterLoad && (typeof settings.instagram.afterLoad == 'function')){
                        settings.instagram.afterLoad();
                    }
                }
            },
            pinterest: function(pin, i){

                var pinterest = container.find('.pinterest'), result, html = '', disable, image,
                    header_markup, thumbnail_markup, page_markup, page_name_markup, created_markup, repins_markup, likes_markup, pinterest_stats_markup;

                html += '<div class="social-message">'+ Utility.truncate(pin.description, 'message', settings.pinterest.descriptionLength) +' <a href="' + pin.link + '">' + settings.pinterest.linkText +'</a></div>';
                disable = settings.pinterest.disable;


                if(settings.pinterest.media){
                    if(pin.image != undefined){
                        html += '<div class="social-image"><a href="' + pin.link + '"><img src="' + pin.image + '" alt="Photo"></a></div>';
                    }
                }

                // show/disable NAME ------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'name')){
                    page_name_markup = '';
                } else{
                    page_name_markup = '<div class="social-page-name">' +
                        '<a href="' + pin.page_url + '">' +
                        pin.page_name +
                        '</a>' +
                        '</div>';
                }

                // show/disable DATE -------------------------------------------------------------------------------------------------------------------

                //NOT available for now
                //if(disable && Utility.checkState(disable, 'date')){
                //    created_markup = '';
                //} else{
                //    created_markup = '<div class="social-post-created">' + pin.created + '</div>';
                //}

                // show/disable LIKES ------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'likes')){
                    likes_markup = '';
                } else{
                    likes_markup = '<div class="social-likes">' +
                        '<i class="icon-heart"></i>' + pin.likes +
                        '</div>';
                }

                // show/disable COMMENTS ---------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'repins')){
                    repins_markup = '';
                } else{
                    repins_markup = '<div class="social-repins">' +
                        '<i class="icon-pinboard"></i>' + pin.repins +
                        '</div>';
                }

                // show/disable STATS --------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'stats')){
                    pinterest_stats_markup = '';
                } else{
                    pinterest_stats_markup = '<div class="social-post-stats">' +
                        likes_markup +
                        repins_markup +
                        '</div>';
                }

                // show/disable INFORMATION ---------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'information')){
                    page_markup = '';
                } else{
                    page_markup = '<div class="social-page">' +
                        page_name_markup +
                        //created_markup +
                        '<div class="clear"></div>' +
                        pinterest_stats_markup +
                        '</div>';
                }

                // show/disable THUMBNAIL ------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'thumbnail')){
                    thumbnail_markup = '';
                } else{
                    thumbnail_markup = '<div class="social-thumbnail"><a href="'+ pin.page_url + '"><img src="' + pin.thumbnail + '" alt="' + pin.page_name + '"></a></div>';
                }

                // show/disable HEADER --------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'header')){
                    header_markup = '';
                } else{
                    header_markup = '<div class="social-header">' +
                        thumbnail_markup +
                        page_markup +
                        '</div>';
                }

                result= '<div class="social-post">' +
                    header_markup +
                    '<div class="social-content">' +
                    html +
                    '</div>' +
                    '</div>';

                pinterest.append(result);

                container.find('.loader').removeClass('pinterest-loader');
                container.find('.loader').hide();


                //execute callback if it's the last value
                if(Feed.pinterest.len == (i+1)){
                    if(settings.pinterest.afterLoad && (typeof settings.pinterest.afterLoad == 'function')){
                        settings.pinterest.afterLoad();
                    }
                }
            },
            vkontakte: function(post, i){

                var vkontakte = container.find('.vkontakte'), result, html = '', disable, image,
                    header_markup, thumbnail_markup, page_markup, page_name_markup, created_markup, shares_markup, likes_markup, stats_markup, comments_markup;

                html += '<div class="social-message">'+ Utility.truncate(post.text, 'message', settings.vkontakte.descriptionLength) +' <a href="' + post.link + '">' + settings.vkontakte.linkText +'</a></div>';
                disable = settings.vkontakte.disable;

                if(settings.vkontakte.media){
                    if(post.photo != undefined){
                        html += '<div class="social-image"><a href="' + post.link + '"><img src="' + post.photo + '" alt="Photo"></a></div>';
                    } else if(post.video != undefined){
                        html += '<div class="social-video"><a href="' + post.link + '"><img src="' + post.video + '" alt="Video Photo"></a></div>';
                    }
                }

                // show/disable NAME ------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'name')){
                    page_name_markup = '';
                } else{
                    page_name_markup = '<div class="social-page-name">' +
                        '<a href="' + post.link + '">' +
                        post.full_name +
                        '</a>' +
                        '</div>';
                }

                // show/disable DATE -------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'date')){
                    created_markup = '';
                } else{
                    created_markup = '<div class="social-post-created">' + post.created + '</div>';
                }

                // show/disable LIKES ------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'likes')){
                    likes_markup = '';
                } else{
                    likes_markup = '<div class="social-likes">' +
                        '<i class="icon-heart"></i>' + post.likes +
                        '</div>';
                }

                // show/disable COMMENTS ---------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'comments')){
                    comments_markup = '';
                } else{
                    comments_markup = '<div class="social-comments">' +
                        '<i class="icon-comment"></i>' + post.comments +
                        '</div>';
                }

                // show/disable SHARES ---------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'shares')){
                    shares_markup = '';
                } else{
                    shares_markup = '<div class="social-shares">' +
                        '   <i class="icon-share"></i>' + post.shares +
                        '</div>';
                }

                // show/disable STATS --------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'stats')){
                    stats_markup = '';
                } else{
                    stats_markup = '<div class="social-post-stats">' +
                        likes_markup +
                        comments_markup +
                        shares_markup +
                        '</div>';
                }

                // show/disable INFORMATION ---------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'information')){
                    page_markup = '';
                } else{
                    page_markup = '<div class="social-page">' +
                        page_name_markup +
                        created_markup +
                        '<div class="clear"></div>' +
                        stats_markup +
                        '</div>';
                }

                // show/disable THUMBNAIL ------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'thumbnail')){
                    thumbnail_markup = '';
                } else{
                    thumbnail_markup = '<div class="social-thumbnail"><a href="'+ post.link + '"><img src="' + post.thumbnail + '" alt="' + post.username + '"></a></div>';
                }

                // show/disable HEADER --------------------------------------------------------------------------------------------------------------------

                if(disable && Utility.checkState(disable, 'header')){
                    header_markup = '';
                } else{
                    header_markup = '<div class="social-header">' +
                        thumbnail_markup +
                        page_markup +
                        '</div>';
                }

                result= '<div class="social-post">' +
                    header_markup +
                    '<div class="social-content">' +
                    html +
                    '</div>' +
                    '</div>';

                vkontakte.append(result);

                container.find('.loader').removeClass('vkontakte-loader');
                container.find('.loader').hide();


                //execute callback if it's the last value

                if(Feed.vkontakte.len == (i+1)){

                    if(settings.vkontakte.afterLoad && (typeof settings.vkontakte.afterLoad == 'function')){
                        settings.vkontakte.afterLoad();
                    }
                }
            }
        };

        Utility.createLayout();
    };
})(jQuery);
