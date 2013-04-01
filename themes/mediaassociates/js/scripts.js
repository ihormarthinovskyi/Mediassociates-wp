$(document).ready(function(){
	jQuery.fn.exists = function(){return this.length>0;}
	if ($('.slideshow .slideset').exists()) {
		var flexslide = $('.slideshow .slideset').flexslider({
			animation: "fade",
			slideshow: 10000,
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

	

$(document).ready(function() {

	// leadership functions
	var mobile_true = false;
	var viewport_height = $(window).height();
	var nav_height = $('header').height();
	var window_width = $(window).width();
	var view_posistion = nav_height + 64;
	console.log(mobile_true + '---' + viewport_height  + '---' + nav_height  + '---' + window_width);
	$('#view').css({ 'position' : 'absolute', 'top' : view_posistion+'px'});
	// position #in_view
	
	function win_width() {
		var current_width = $(window).width();
		if (current_width <= 767) {
			mobile_true = true;
		} else {
			mobile_true = false;
		}
	} win_width();
	
	$('#mobi_click').click(function(){
		if (mobile_true) {
			$(this).find('.mobile p').slideToggle();
		}
	});
	$(window).resize(function() {
		win_width();
	});
	
	$('#view').bind('inview', function(event, isInView, visiblePartX, visiblePartY) {
	  if (isInView) {
	    // element is now visible in the viewport
	    if (visiblePartY == 'top') {
	      // top part of element is visible
	    } else if (visiblePartY == 'bottom') {
	      // bottom part of element is visible
	    } else {
	      // whole part of element is visible
	        $('.fix_this').css({'position':'relative', 'top':'0'});
	        $(' aside').css({'position':'relative', 'right':'0', 'top':'0'});
	      
	    }
	  } else {
	    // element has gone out of viewport
	      $('.fix_this').css({'position':'fixed', 'top':'0'});
	      $('aside').css({'position':'fixed','right':'0px','top':'162px'});
	  }
	});
	// scroll to
	
	$('.case-hash').click(function(){
		reset_o(); $paneOptions.scrollTo( '#case', 1000, { offset:{ top:-5,left:-30 } });
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