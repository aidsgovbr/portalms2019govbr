//Breaking News 1.0.0

;(function($){

	$.fn.breakingNews = function(params){
			var defaults={
					width			:'100%',
					modul			:'breakingnews',
					color			:'default',
					effect			:'fade',
					fontstyle		:'normal',
					autoplay		:false,
					timer			:4000,
					feed			:false,
					feedlabels		:false,
					feedcount		:5
				};
			var feeds=[];
			var labels=[];
			var params=$.extend(defaults,params);
			
			return this.each(function(){
				//Variables------------------------------------
				params.modul=$("#"+$(this).attr("id"));
				var timername=params.modul;
				var active=0;
				var previous=0;
				var count=params.modul.find("ul li").length;
				var changestate=true;
				
				if (params.feed!=false)
				{
					getRSS();
				}
				else
				{
					params.modul.find("ul li").eq(active).fadeIn();
				}
				resizeEvent();
				
				if (params.autoplay)
				{
					timername=setInterval(function(){autoPlay()},params.timer);					
					$(params.modul).on("mouseenter",function (){
						clearInterval(timername);
					});
					
					$(params.modul).on("mouseleave",function (){
						timername=setInterval(function(){autoPlay()},params.timer);
					});
				}
				else
				{
					clearInterval(timername);
				}
					
				params.modul.addClass("bn-"+params.color);
				
				//Events---------------------------------------
				$(window).on("resize",function (){
					resizeEvent();
				});
				
				params.modul.find(".bn-navi span").on("click",function(){
					if (changestate)
					{
						changestate=false;
						if ($(this).index()==0)
						{
							active--;
							if (active<0)
								active=count-1;
								
							changeNews();
						}
						else
						{
							active++;
							if (active==count)
								active=0;
							
							changeNews();
						}
					}
				});
				
				//functions------------------------------------
				function resizeEvent()
				{
					if (params.modul.width()<480)
					{
						params.modul.find(".bn-label h2").css({"display":"none"});
						params.modul.find(".bn-label").css({"width":10});
						params.modul.find("ul").css({"left":30});
					}
					else
					{
						params.modul.find(".bn-label h2").css({"display":"inline-block"});
						params.modul.find(".bn-label").css({"width":"auto"});
						params.modul.find("ul").css({"left":$(params.modul).find(".bn-label").width()+20});
					}
				}
				
				function autoPlay()
				{
					active++;
					if (active==count)
						active=0;
					
					changeNews();
				}
				
				function changeNews()
				{
					if (params.effect=="fade")
					{
						params.modul.find("ul li").css({"display":"none"});
						params.modul.find("ul li").eq(active).fadeIn(1200,function (){ 
							changestate=true;
						});
					}
					else if (params.effect=="slide-h")
					{
						params.modul.find("ul li").eq(previous).animate({width:0},function(){
							$(this).css({"display":"none","width":"100%"});
							params.modul.find("ul li").eq(active).css({"width":0,"display":"block"});
							params.modul.find("ul li").eq(active).animate({width:"100%"},function(){
								changestate=true;
								previous=active;
							});
						});
					}
					else if (params.effect=="slide-v")
					{
						if (previous<=active)
						{
							params.modul.find("ul li").eq(previous).animate({top:-60});
							params.modul.find("ul li").eq(active).css({top:60,"display":"block"});
							params.modul.find("ul li").eq(active).animate({top:0},function(){
								previous=active;
								changestate=true;
							});
						}
						else
						{
							params.modul.find("ul li").eq(previous).animate({top:60});
							params.modul.find("ul li").eq(active).css({top:-60,"display":"block"});
							params.modul.find("ul li").eq(active).animate({top:0},function(){
								previous=active;
								changestate=true;
							});
						}
					}
				}
				
				
				/*RSS----------------------------*/
				function getRSS()
				{
					feeds=params.feed.split(",");
					labels=params.feedlabels.split(",");
					count=0;
					params.modul.find("ul").html("");
					xx=0;
					for (k=0; k<feeds.length; k++)
					{
						$.ajax({
							type: "GET",
							url: document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num='+params.feedcount+'&callback=?&q=' + encodeURIComponent(feeds[k].trim()),
							dataType: "json",
							success: function(xml){	
								feeddata=xml.responseData.feed.entries;								
								$(feeddata).each(function(index, element) {
									count++;
									params.modul.find("ul").append('<li><a target="_blank" href="'+feeddata[index].link+'"><span>'+labels[xx]+'</span> - '+feeddata[index].title+'</a></li>');
								});
								if (xx==0)
									params.modul.find("ul li").eq(0).fadeIn();
								xx++;
							},error: function() {
								params.modul.find("ul").append('RSS Feed Error!');
							}
						});
					}
					
				}
			});
			
				
		};
		
})(jQuery);

