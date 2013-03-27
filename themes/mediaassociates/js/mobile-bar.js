$(document).ready(function(){
	var formFrame = $('.form-frame');
	var menuFrame = $('.menu-frame');
	
	formFrame.hide();
	menuFrame.hide();
	
	$('.mobile-bar .line .open-nav').click(function(){
		formFrame.hide();
		menuFrame.slideDown();
		return false;
	});
	$('.mobile-bar .line .open-form').click(function(){
		menuFrame.hide();
		formFrame.slideDown();
		return false;
	});
	$('.mobile-bar .form-ttl em').click(function(){
		formFrame.slideUp();
	});
	$('.mobile-bar .menu-ttl span').click(function(){
		menuFrame.slideUp();
	})
	
});