$(window).ready(function() {
	
	if(!navigator.userAgent.match(/MSIE\s(?!9.0)/))
	{
		window.matchMedia = window.matchMedia || (function(doc, undefined){
	  
		  var bool,
			  docElem  = doc.documentElement,
			  refNode  = docElem.firstElementChild || docElem.firstChild,
			  // fakeBody required for <FF4 when executed in <head>
			  fakeBody = doc.createElement('body'),
			  div      = doc.createElement('div');
		  
		  div.id = 'mq-test-1';
		  div.style.cssText = "position:absolute;top:-100em";
		  fakeBody.style.background = "none !important";
		  fakeBody.appendChild(div);
		  
		  return function(q){
			
			div.innerHTML = '&shy;<style media="'+q+'"> #mq-test-1 { width: 42px; }</style>';
			
			docElem.insertBefore(fakeBody, refNode);
			bool = div.offsetWidth == 42;  
			docElem.removeChild(fakeBody);
			
			return { matches: bool, media: q };
		  };
		  
		})(document);
	
	}
	
	if(!navigator.userAgent.match(/MSIE\s(?!9.0)/))
	{
		if (matchMedia('only screen and (min-width: 960px)').matches ) {
			
			$('ul.social-icons').css('margin-top', '-100px');
			$('ul.social-icons').animate({
							'margin-top': '43'
						}, 1500 );
		}
	}
});

$(document).ready(function() {

	$(window).resize(function() {
	  $('.social-icons').attr('style', '');
	});
	
	var properties = {
	  opacity:    '0.4'
	};

	$('.scrollers a').pulse(properties, 1500, 30, 1500);

	$.localScroll({ duration: 500, easing: 'easeOutExpo' });
	
	$("#video-embed").fitVids();
	// Navigational Arrows

	$(".vignette-scroll .btn-next").addClass("btn-next-active");
	
	$(".btn-next[title]").tooltip({
          // use the fade effect instead of the default
          effect: 'fade',
          fadeOutSpeed: 100,
          // the time before the tooltip is shown
          predelay: 100
      });

	if($('.vignette-scroll').length > 0){
		
		$(window).scroll(function(){
		$('.tooltip').css('display', 'none');
		// show distance from top in console
		
		var vignetteheight; 
		vignetteheight = $("#vignette").css('height');
		//console.log($(document).scrollTop() + "VIG-" + vignetteheight);
		
		if($(this).scrollTop() < 300 ) {
			$(".btn-prev").removeClass("btn-prev-active");
			$(".btn-next").removeClass("btn-next-active");
			$(".vignette-scroll .btn-next").addClass("btn-next-active");
			
			if($(this).scrollTop() > 150 ) {
				
				$(".btn-prev").removeClass("btn-prev-active");
				$(".vignette-scroll .btn-prev").addClass("btn-prev-active");
			}
		}
		
		
		if($(this).scrollTop() > parseInt(vignetteheight) - 20) {
			$(".btn-next").removeClass("btn-next-active");
			$(".btn-prev").removeClass("btn-prev-active");
			$(".video-scroll .btn-next").addClass("btn-next-active");
			$(".video-scroll .btn-prev").addClass("btn-prev-active");
		}
		
		if($(this).scrollTop() > parseInt(vignetteheight) + 420) {
			$(".btn-next").removeClass("btn-next-active");
			$(".btn-prev").removeClass("btn-prev-active");
			$(".images-scroll .btn-next").addClass("btn-next-active");
			$(".images-scroll .btn-prev").addClass("btn-prev-active");
		}
		
		if($(this).scrollTop() > parseInt(vignetteheight) + 620 ) {
			$(".btn-next").removeClass("btn-next-active");
			$(".btn-prev").removeClass("btn-prev-active");
			$(".twitter-scroll .btn-next").addClass("btn-next-active");
			$(".twitter-scroll .btn-prev").addClass("btn-prev-active");
		}
		
		if($(this).scrollTop() > parseInt(vignetteheight) + 950 ) {
			$(".btn-next").removeClass("btn-next-active");
			$(".btn-prev").removeClass("btn-prev-active");
			$(".tour-scroll .btn-next").addClass("btn-next-active");
			$(".tour-scroll .btn-prev").addClass("btn-prev-active");
		}
		
		if($(this).scrollTop() > parseInt(vignetteheight) + 1050 ) {
			$(".btn-next").removeClass("btn-next-active");
			$(".btn-prev").removeClass("btn-prev-active");
			$(".connected-scroll .btn-next").addClass("btn-next-active");
			$(".connected-scroll .btn-prev").addClass("btn-prev-active");
			
			
		}
		
		if($(this).scrollTop() == $(document).height()) {
			$("#yt").css("bottom", "0");
			$("#tw").css("left", "0");
			$("#fb").css("top", "0");
			$("#ws").css("right", "0");
			
		}
				
		});

			
	}

	
	$('#vignette .button a').click(function(){
		
		$('#vignette .button a').hide();
		$('.article-reveal').slideDown();
		
		$('#vignette h2').animate({
			'margin-bottom': '0px'
			}, {
				duration: 400
		});
		
		$('.close-article').fadeIn();
		
	});
	
	 $('.close-article').click(function(){
		
		$('.article-reveal').slideUp();
		$('#vignette .button a').fadeIn(2000);
		
		$('#vignette h2').animate({
			'margin-bottom': '40px'
			}, {
				duration: 400
		});
		
		$('.close-article').hide();
		
	});
	
	if(!navigator.userAgent.match(/MSIE\s(?!9.0)/))
	{
		if (matchMedia('only screen and (min-width: 960px)').matches ) {
		
			$('#twitter').hoverIntent(function(){
					
				$('#twitter').animate({
						'height': '450px'
					}, {
							duration: 400,
							easing: 'easeOutQuart'
						});
					
				$('#twitter .viewport').animate({
						'padding-top': '50px'
					}, {
							duration: 400,
							easing: 'easeOutQuart'
						} );
						
			}, function(){
				
				$('#twitter').animate({
						'height': '366px'
					}, 100 );
					
				$('#twitter .viewport').animate({
						'padding-top': '0px'
					}, 100 );
				
			});
			
			$('#video').hoverIntent(function(){
					
				$('#video').animate({
						'height': '550px'
					}, {
							duration: 400,
							easing: 'easeOutQuart'
						});
					
				$('#video .viewport').animate({
						'padding-top': '40px'
					}, {
							duration: 400,
							easing: 'easeOutQuart'
						});
						
			}, function(){
				
				$('#video').animate({
						'height': '440px'
					}, 100 );
					
				$('#video .viewport').animate({
						'padding-top': '0px'
					}, 100 );
				
			});
			
			$('#tour').hoverIntent(function(){
					
				$('#tour').animate({
						'height': '550px'
					}, {
							duration: 400,
							easing: 'easeOutQuart'
						});
					
				$('#tour .viewport').animate({
						'padding-top': '40px'
					}, {
							duration: 400,
							easing: 'easeOutQuart'
						});
						
			}, function(){
				
				$('#tour').animate({
						'height': '449px'
					}, 100 );
					
				$('#tour .viewport').animate({
						'padding-top': '0px'
					}, 100 );
				
			});
		}
	}
	

	
	 if (jQuery.browser.msie && parseFloat(jQuery.browser.version) < 8) {
		   
		  $('.flexslider').flexslider({
		  animation: "slide",
		  controlNav: false,
		  slideshowSpeed: 4500,
		  animationDuration: 1300,
		  pauseOnAction: true,
		  pauseOnHover: true,
		  
		  after: function(slider) {
			
			$('.article-reveal').hide();
			$('#vignette .button a').show();
		  }
	
	});
	
	} else {

	$('.flexslider').flexslider({
		  animation: "slide",
		  controlNav: false,
		  slideshowSpeed: 4500,
		  animationDuration: 1300,
		  pauseOnAction: true,
		  start: function(slider) {
			$('.slides li .vignette-details').animate({
				opacity: 1.0,
				'margin-left': '0'
			}, 500 );
			
			$('.vignette-details .button a').click(function() {
                slider.pause();
            });
            
            $('.close-article').click( function() {
                slider.resume();
            });
			
		  },
		  
		  before: function(slider) {
			$('.slides li .vignette-details').animate({
				opacity: 0.0,
				'margin-left': '0'
			}, 200 );
			
			

		  },
		  
		  after: function(slider) {
			
			$('.article-reveal').hide();
			$('#vignette .button a').show();
			$('.slides li .vignette-details').css('opacity', '0');
			$('.slides li .vignette-details').css('margin-left', '350px');
			$('#vignette .slides h2').css('margin-bottom', '40px');
			
			$('.slides li .vignette-details').animate({
				opacity: 1.0,
				'margin-left': '0'
			}, 500 );
			
			
		  }
	 });
	 }
	 
	
	
	   
// Scrollable sliders

	var $scrollables = $("#twit-pics #images .scrollable").scrollable({circular: true, speed:600 }).autoscroll({ autoplay: true, interval:2000 });
	
	$scrollables.each(function() {
			var $itemsToClone = $(this).scrollable().getItems().slice(1);
			var $wrap = $(this).scrollable().getItemWrap();
			var clonedClass = $(this).scrollable().getConf().clonedClass;
			$itemsToClone.each(function() {
				$(this).clone(true).appendTo($wrap)
					.addClass(clonedClass + ' hacked-' + clonedClass);
			})
		});
	
	//$("#tour .scrollable").scrollable({circular: true, speed:400 }).autoscroll({ autoplay: true, interval:6400 }).navigator();

	// Homepage Scrolling Slideshow
	if($('#tour .scrollable').length > 0) {
		$('#tour .scrollable').scrollable( {
			
			// Scrollable settings
			circular: true,
			easing: 'swing',
			speed: 500,
			
			// Reset the content styles on the scrollable items ahead of animation
			onBeforeSeek: function () {
				
				$('#tour .scrollable .event').animate({
					opacity: 0.0
				}, 150 );
				
				$('#tour .scrollable .event-lg').animate({
					opacity: 0.0,
					top: '-400'
				}, 300 );
				
				$('#tour .scrollable .event-sm').animate({
					opacity: 0.0,
					top: '+400'
				}, 300 );

			},
			
			// When scrollable moves, add a class to new item and animate its contents
			// http://flowplayer.org/tools/forum/35/53726
			onSeek: function(e, index) {
				
				$('#tour .scrollable .event').animate({
					opacity: 1.0
				}, 500 );
				
				$('#tour .scrollable .event-lg').animate({
					opacity: 1.0,
					top: '0'
				}, 300 );
				
				$('#tour .scrollable .event-sm').animate({
					opacity: 1.0,
					top: '0'
				}, 300 );
				
			}
			
		}).navigator().autoscroll({ autoplay: true, interval:6400 });
		
	};
	
	$("a.gallery").fancybox({
		
				beforeShow : function() {
					this.title = $(this.element).attr('fancy-title');
				},
				
				padding: 0,

				openEffect : 'elastic',
				closeEffect : 'elastic',
				arrows: true,
				maxWidth	: 1000,
				maxHeight	: 800,
				
				fitToView	: true,
				width		: '70%',
				height		: '70%',
				
				closeBtn  : true,
				
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedIn : 500,
						opacity : 0.8
					}
				}
			});
	
// Parallax Related Animations
	
	$('#video').parallax("10%", 1, 0.7, true);
	$('#connected').parallax("10%", 1, 0.7, true);
	$('#twitter').parallax("10%", 1, 0.7, true);
		
	// initialize the plugin, pass in the class selector for the sections of content (blocks)
	var scrollorama = $.scrollorama({ blocks:'.scrollblock', enablePin:false });
	
	if(!navigator.userAgent.match(/MSIE\s(?!9.0)/))
	{
		if (matchMedia('only screen and (min-width: 960px)').matches ) {
		
		// animate
		scrollorama.animate('#video-details .button',{ delay: 150, duration: 200, property:'bottom', start:-220, end:0 });
		scrollorama.animate('#video-details h3',{ delay: 50, duration: 300, property:'bottom', start:-220, end:0 });
		scrollorama.animate('#images img',{ delay: 230, duration: 230, property:'opacity', start:0, end:1.0 });
		
		scrollorama.animate('.followers .amount',{ delay: 400, duration: 500, property:'top', start:-150, end:0 });
		scrollorama.animate('.followers .amount',{ delay: 400, duration: 200, property:'opacity', start:0, end:1.0 });
		scrollorama.animate('.followers .type',{ delay: 400, duration: 500, property:'opacity', start:0, end:1.0 });
		//scrollorama.animate('.followers .type',{ delay: 400, duration: 500, property:'left', start:200, end:0 });
		scrollorama.animate('.followers .button',{ delay: 400, duration: 500, property:'bottom', start:-400, end:0 });
		
		scrollorama.animate('.latest-tweet',{ delay: 400, duration: 500, property:'opacity', start:0, end:1.0 });
		
		scrollorama.animate('#yt',{ delay: 1200, duration: 500, property:'bottom', start:-1000, end:0 },{ delay: 0, duration: 300, property:'opacity', start:0, end:1 });
		scrollorama.animate('#tw',{ delay: 1200, duration: 500, property:'left', start:-1000, end:0 },{ delay: 0, duration: 300, property:'opacity', start:0, end:1 });
		scrollorama.animate('#fb',{ delay: 1200, duration: 500, property:'top', start:-1000, end:0 },{ delay: 0, duration: 300, property:'opacity', start:0, end:1 });
		scrollorama.animate('#ws',{ delay: 1200, duration: 500, property:'right', start:-1000, end:0 },{ delay: 0, duration: 300, property:'opacity', start:0, end:1 });
		
		}
	}
});