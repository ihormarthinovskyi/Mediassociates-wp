$(document).ready(function(){
	jQuery.fn.exists = function(){return this.length>0;}
	if ($('.slideshow .slideset').exists()) {
		var flexslide = $('.slideshow .slideset').flexslider({
			animation: "fade",
			slideshow: 10000,
			directionNav: false,
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