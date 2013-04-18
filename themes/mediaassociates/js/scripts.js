var daHeight, headerHeight,lefty,righty;

$(document).ready(function(){
	//make slideshow fill screen
	daHeight = $(window).height();
	headerHeight = $("header").outerHeight();
	if( $(window).width() > 930 ) {
		$(".slideshow .slideset li").css("height", ((daHeight-headerHeight)-2));
	} else if( $(window).width() <= 930 ) { 
		$(".slideshow .slideset li").css("height", ((daHeight-headerHeight)-42));
	}
	
	//Services Menu
	var daLi, navOff, menuOff, center;
	//add images to anchor tag
	$(".add-nav #menu .tv a").prepend("<img src='/wp-content/themes/mediaassociates/images/service_01.png' />");
	$(".add-nav #menu .radio a").prepend("<img src='/wp-content/themes/mediaassociates/images/service_03.png' />");
	$(".add-nav #menu .digital a").prepend("<img src='/wp-content/themes/mediaassociates/images/service_05.png' />");
	$(".add-nav #menu .print a").prepend("<img src='/wp-content/themes/mediaassociates/images/service_07.png' />");
	$(".add-nav #menu .ooh a").prepend("<img src='/wp-content/themes/mediaassociates/images/service_09.png' />");
	$(".add-nav #menu .analytic a").prepend("<img src='/wp-content/themes/mediaassociates/images/service_11.png' />");
	
	$(window).load(function() {
		
		
		//resize nav bar to fit		
		if( $(window).width() > 768 ) {
			var navWidth = $(".add-nav #menu").width(); //get width of nav container
			var liAmt = $(".add-nav #menu li").length; //get number of list items
			$(".add-nav ul li").css('padding', 0); //remove padding
			var newWidth = (navWidth/liAmt) - 2; //calculate new width for list items, subtract 1 as buffer
			$(".add-nav #menu li").width(newWidth);
			$(".add-nav #menu li a").width(newWidth);
		}
		else if( $(window).width() <= 768 ) {
			var navWidth = $(".add-nav #menu").width(); //get width of nav container
			var liAmt = $(".add-nav #menu li").length; //get number of list items
			$(".add-nav ul li").css('padding', 0); //remove padding
			var newWidth = (navWidth/liAmt) - 2; //calculate new width for list items, subtract 1 as buffer
			$(".add-nav #menu li").width(newWidth-2);
			$(".add-nav #menu li a").width(newWidth-2);
		}
		
		//get offset position of li's and menu and center img
		menuOff = $(".add-nav #menu").offset();
		
		$(".add-nav #menu li").each(function(){
			daLi = $(this).offset();
			center = (daLi.left + ($(this).width()/2)) - ($(this).children().children("img").width()/2);
			$(this).children().children("img").css("left", center);
		});
	});
	
	
	//adjust position of nav bar images depending on screen size
	/*if($(window).width() > 930) {
		$(".add-nav ul li a img").css({ 
			"position" : "fixed",
			"top" : 475
		});
	}
	else {
		$(".add-nav ul li a img").css({
			"position" : "absolute",
			"top" : 0
		});
	}
	
	//check position of img on scroll
	$(window).scroll(function(){
	
		//get offset position of nav bar images
		navOff = $(".tv a img").offset();
		
		if(($(window).width() > 930 && navOff.top < menuOff.top) ||  $(window).scrollTop() < 164) {
			$(".add-nav ul li a img").css({ 
				"position" : "fixed",
				"top" : 475
			});
		}
		else if($(window).width() < 930 || ($(window).width() > 930 && navOff.top > menuOff.top)){
			
			$(".add-nav ul li a img").css({
				"position" : "absolute",
				"top" : 0
			});
		}
	
	});*/
	
	
	jQuery.fn.exists = function(){return this.length>0;}
	if ($('.slideshow .slideset').exists()) {
		var flexslide = $('.slideshow .slideset').flexslider({
			animation: "fade",
			slideshow: true,
			slideshowSpeed: 10000,
			directionNav: true,
			controlNav: false
		});
	}
	if ($('.gallery-holder .slideset').exists()) {
		var flexslide = $('.gallery-holder .slideset').flexslider({
			animation: "fade",
			controlNav: "thumbnails"
		});
	}
	if ($('.accordion').exists()) {
		$( ".accordion" ).accordion({
			heightStyle: "content",
			collapsible: true,
			active: false
		});
	}
	if ($('.pages-holder').exists()) {
		$(".pages-holder").has("ul").addClass("has-child");
		$(".has-child > a.open").click(function(){
			if(!$(this).parent(".has-child").hasClass('drop-open')){
				$(this).parent(".has-child").toggleClass("drop-open");
				$(this).parent(".has-child").children("ul").slideDown();
				return false;
			}
		});
		$('html').click(function(){
			$('.drop-open ul').slideUp();
			$('.drop-open').removeClass('drop-open');
		})
		 $('header nav ul').click(function(event){
			event.stopPropagation();
	 	});
	}
	if ($('.mobile-nav').exists()) {
		var _parentSlide = 'div.mobile-nav'; 
		var _linkSlide = 'a.open'; 
		var _slideBlock = 'ul.drop';
		var _openClassS = 'active'; 
		var _durationSlide = 500; 
		$(_parentSlide).each(function(){
			if (!$(this).is('.' + _openClassS)) {
				$(this).find(_slideBlock).css('display', 'none');
			}
		});
		$(_linkSlide, _parentSlide).click(function(){
			if ($(this).parents(_parentSlide).is('.' + _openClassS)) {
				$(this).parents(_parentSlide).removeClass(_openClassS);
				$(this).parents(_parentSlide).find(_slideBlock).slideUp(_durationSlide);
			}
			else {
				$(this).parents(_parentSlide).addClass(_openClassS);
				$(this).parents(_parentSlide).find(_slideBlock).slideDown(_durationSlide);
			}
			return false;
		});
	}
	if ($('.choose-form').exists()) {
		customForm.lib.domReady(function(){
			customForm.customForms.replaceAll();
		});
	}
	if ($('.fade-block').exists()) {
		$(function(){
			$(".fade-block .open-close").click(function(){
				$(".fade-block .block").fadeToggle();
				$(".fade-block").toggleClass("active");
			});
			$('html').click(function(){
				$('.fade-block .block').fadeOut();
				$(".fade-block").removeClass("active");
			})
			$('.fade-block .block').click(function(event){
				event.stopPropagation();
		 	});
			$('.fade-block .open-close').click(function(event){
				event.stopPropagation();
		 	});
		});
	}
});

$(window).resize(function(){
	//make sure slideshow stays full height
	daHeight = $(window).height();
	headerHeight = $("header").outerHeight();
	if( $(window).width() > 930 ) {
		$(".slideshow .slideset li").css("height", ((daHeight-headerHeight)-2));
	} else if( $(window).width() <= 930 ) { 
		$(".slideshow .slideset li").css("height", ((daHeight-headerHeight)-42));
	}
	//resize nav bar to fit screen
	if( $(window).width() > 768 ) {
		var navWidth = $(".add-nav #menu").width(); //get width of nav container
		var liAmt = $(".add-nav #menu li").length; //get number of list items
		$(".add-nav ul li").css('padding', 0); //remove padding
		var newWidth = (navWidth/liAmt) - 2; //calculate new width for list items, subtract 1 as buffer
		$(".add-nav #menu li").width(newWidth);
		$(".add-nav #menu li a").width(newWidth);
	}
	else if( $(window).width() <= 768 ) {
		var navWidth = $(".add-nav #menu").width(); //get width of nav container
		var liAmt = $(".add-nav #menu li").length; //get number of list items
		$(".add-nav ul li").css('padding', 0); //remove padding
		var newWidth = (navWidth/liAmt) - 2; //calculate new width for list items, subtract 1 as buffer
		$(".add-nav #menu li").width(newWidth-2);
		$(".add-nav #menu li a").width(newWidth-2);
	}
	
	
	//get offset position of li's and menu and center img
	$(".add-nav #menu li").each(function(){
		daLi = $(this).offset();
		center = (daLi.left + ($(this).width()/2)) - ($(this).children().children("img").width()/2);
		$(this).children().children("img").css("left", center);
	});
});

$(document).ready(function() {
	
	
	// leadership functions
	var mobile_true = false;
	var viewport_height = $(window).height();
	var window_width = $(window).width();
	var view_posistion = 1;
	
	// console.log(mobile_true + '---' + viewport_height  + '---' + nav_height  + '---' + window_width);
	$('#view').css({ 'position' : 'absolute', 'top' : view_posistion+'px'});
	
	// position #in_view
	
	function win_width() {
		var current_width = $(window).width();
		if (current_width <= 930) {
			mobile_true = true;
		} else {
			mobile_true = false;
		}
	} win_width();
	
	$('.mobi_click').click(function(){
		if (mobile_true) {
			$(this).find('.mobile').slideToggle();
		}
	});
	$(window).resize(function() {
		win_width();
		fix_nav(mobile_true);
	});
	
	// without inview
	function fix_nav(mobile_true) {
		var header_height = $('header').outerHeight();
		var nav_height = $('header').outerHeight();
		var plus = 60;
		
		if (mobile_true)
			plus = 0;
			
		var side_posistion = header_height + nav_height + plus;
		var main_pad = header_height + nav_height + plus;
		
		$('header').css({'position':'fixed', 'top':'0'});
		$('.fix_this').css({'position':'fixed', 'top':header_height});
		//$('aside').css({'position':'fixed', 'right':'0', 'top':side_posistion+'px'});
		//$('aside').css({'position':'fixed','right':'0px','top':'162px'});
		if (!mobile_true) {
			$('#main, .portal').css('padding-top',main_pad+'px');
			} else if (mobile_true) {
				$('#main, .portal').css('padding-top',main_pad+30+'px');
				}
		$('.slideshow .slideset, .container-holder').css('padding-top',nav_height+'px');
	} fix_nav(mobile_true);
	// with inview
	
	$('#view').bind('inview', function(event, isInView, visiblePartX, visiblePartY) {
	  if (isInView) {
	    // element is now visible in the viewport
	    if (visiblePartY == 'top') {
	      // top part of element is visible
	    } else if (visiblePartY == 'bottom') {
	      // bottom part of element is visible
	    } else {
	      // whole part of element is visible
	      //$('aside').css({'position':'relative', 'right':'0', 'top':'0'});
	      // remove comments for nav fix on inview event
	      /*
	      	$('header').css({'position':'relative', 'top':'0'});
	        $('.fix_this').css({'position':'relative', 'top':'0'});
	        
	        $('#main').css('padding-top','0px');
	      */
	    }
	  } else {
	    // element has gone out of viewport
	      
	      //var header_height = $('header').outerHeight();
	      //var nav_height = $('header').height();
	      //var side_posistion = header_height + nav_height + 120;
	      //var main_pad = header_height + nav_height + 130;
	      
	      //$('aside').css({'position':'fixed', 'right':'0', 'top':side_posistion+'px'});
	      // remove comments for nav fix on inview event
	      /*
	      	$('header').css({'position':'fixed', 'top':'0'});
	      	$('.fix_this').css({'position':'fixed', 'top':header_height});
	      	$('#main').css('padding-top',main_pad+'px');
	      */
	  }
	});
	// scroll to
	var hashname = window.location.hash.replace('#', '');
	var elem = $('#' + hashname);
	if(hashname.length > 1) {
		if (!mobile_true) {
			$(window).scrollTo( '#'+hashname, 1000, { offset:{ top:-260,left:-30 } });
		} else if (mobile_true) {
			$(window).scrollTo( '#'+hashname, 1000, { offset:{ top:-160,left:-30 } });
		}
	}
	if (!mobile_true) {
		$('.case-hash').click(function(){
			$(window).scrollTo( '#case', 1000, { offset:{ top:-260,left:-30 } });
		});
		$('.clients-hash').click(function(){
			$(window).scrollTo( '#clients', 1000, { offset:{ top:-280,left:-30 } });
		});
		$('.about-hash').click(function(){
			$(window).scrollTo( '#content', 1000, { offset:{ top:-240,left:-30 } });
		});
		$('.planning-hash').click(function(){
			$(window).scrollTo( '#planning', 1000, { offset:{ top:-250,left:-30 } });
		});
		$('.leadership-hash').click(function(){
			$(window).scrollTo( '#team', 1000, { offset:{ top:-250,left:-30 } });
		});
		$('.principles-hash').click(function(){
			$(window).scrollTo( '#mod_0', 1000, { offset:{ top:-250,left:-30 } });
		});
		$('.eeffect-hash').click(function(){
			$(window).scrollTo( '#mod_1', 1000, { offset:{ top:-250,left:-30 } });
		});
	} else if (mobile_true) {
		$('.case-hash').click(function(){
			$(window).scrollTo( '#case', 1000, { offset:{ top:-170,left:-30 } });
		});
		$('.clients-hash').click(function(){
			$(window).scrollTo( '#clients', 1000, { offset:{ top:-180,left:-30 } });
		});
		$('.about-hash').click(function(){
			$(window).scrollTo( '#content', 1000, { offset:{ top:-150,left:-30 } });
		});
		$('.planning-hash').click(function(){
			$(window).scrollTo( '#planning', 1000, { offset:{ top:-140,left:-30 } });
		});
		$('.leadership-hash').click(function(){
			$(window).scrollTo( '#team', 1000, { offset:{ top:-140,left:-30 } });
		});
		$('.principles-hash').click(function(){
			$(window).scrollTo( '#mod_0', 1000, { offset:{ top:-140,left:-30 } });
		});
		$('.eeffect-hash').click(function(){
			$(window).scrollTo( '#mod_1', 1000, { offset:{ top:-155,left:-30 } });
		});
	}
	
	//client display 
	$("#clients .col .ttl").click(function(){
		if($(this).attr('id') != "lastTTL" ) {
			$(this).next().slideToggle();
		}
		else {
			$(this).next().slideToggle();
			var next = $(this).parent().next();
			$(next).children(":first-child").slideToggle();
		}
	});
});
	
//hide browser stuff
window.addEventListener("load",function() {
	// Set a timeout...
	setTimeout(function(){
		// Hide the address bar!
		window.scrollTo(0, 1);
	}, 0);
});
// remove this if breaking IOS mobile
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
    var doc = w.document;
    if( !doc.querySelector ){ return; }
    var meta = doc.querySelector( "meta[name=viewport]" ),
        initialContent = meta && meta.getAttribute( "content" ),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
		x, y, z, aig;
    if( !meta ){ return; }
    function restoreZoom(){
        meta.setAttribute( "content", enabledZoom );
        enabled = true; }
    function disableZoom(){
        meta.setAttribute( "content", disabledZoom );
        enabled = false; }
    function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
        if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );