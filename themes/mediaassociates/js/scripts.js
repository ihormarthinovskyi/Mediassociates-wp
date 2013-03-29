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
// inview library
/*
 * Viewport - jQuery selectors for finding elements in viewport
 *
 * Copyright (c) 2008-2009 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *  http://www.appelsiini.net/projects/viewport
 *
 */
(function($) {
    
    $.belowthefold = function(element, settings) {
        var fold = $(window).height() + $(window).scrollTop();
        return fold <= $(element).offset().top - settings.threshold;
    };

    $.abovethetop = function(element, settings) {
        var top = $(window).scrollTop();
        return top >= $(element).offset().top + $(element).height() - settings.threshold;
    };
    
    $.rightofscreen = function(element, settings) {
        var fold = $(window).width() + $(window).scrollLeft();
        return fold <= $(element).offset().left - settings.threshold;
    };
    
    $.leftofscreen = function(element, settings) {
        var left = $(window).scrollLeft();
        return left >= $(element).offset().left + $(element).width() - settings.threshold;
    };
    
    $.inviewport = function(element, settings) {
        return !$.rightofscreen(element, settings) && !$.leftofscreen(element, settings) && !$.belowthefold(element, settings) && !$.abovethetop(element, settings);
    };
    
    $.extend($.expr[':'], {
        "below-the-fold": function(a, i, m) {
            return $.belowthefold(a, {threshold : 0});
        },
        "above-the-top": function(a, i, m) {
            return $.abovethetop(a, {threshold : 0});
        },
        "left-of-screen": function(a, i, m) {
            return $.leftofscreen(a, {threshold : 0});
        },
        "right-of-screen": function(a, i, m) {
            return $.rightofscreen(a, {threshold : 0});
        },
        "in-viewport": function(a, i, m) {
            return $.inviewport(a, {threshold : 0});
        }
    });

    
})(jQuery);
//	usage
// $(":in-viewport")
// $(":below-the-fold")
// $(":above-the-top")
// $(":left-of-screen")
// $(":right-of-screen")
//
// resize the home page slide show
$(document).ready(function() {

	// leadership functions
	var mobile_true = false;
	var veiwport_height = $(window).height();
	var nav_height = $('header').height();
	var window_width = $(window).width();
	
	function win_width() {
		var current_width = $(window).width();
		if (current_width <= 767) {
			mobile_true = true;
		} else {
			mobile_true = false;
			$(
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
	
	// home slide resize

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