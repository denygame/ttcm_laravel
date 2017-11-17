$(document).foundation();
jQuery(document).ready(function($) {

	// PRODUCT ITEM HOVER
	var prodItem = $(".product-item");
	var prodHover = $(".product-hover");
	prodHover.css('visibility', 'hidden');
	prodItem.mouseenter(function(event) {
		$(this).find('.product-hover').each(function(index, el) {
			$(this).removeClass('slidedown-animate').addClass('slideup-animate').css('visibility', 'visible');
		});
	});
	prodItem.mouseleave(function(event) {
		$(this).find('.product-hover').each(function(index, el) {
			$(this).removeClass('slideup-animate').addClass('slidedown-animate').css('visibility', 'hidden');
		});
	});
	// END PRODUCT ITEM HOVER

	// LOGIN ICON HOVER
	var loginLink = $(".login-link");
	var loginPopup = $(".login-popup");
	loginLink.hover(function() {
		loginPopup.css({
			visibility: 'visible',
			opacity: '1'
		});
	}, function() {
		loginPopup.css({
			opacity: '0',
			visibility: 'hidden'

		});
	});
	loginPopup.hover(function() {
		loginPopup.css({
			visibility: 'visible',
			opacity: '1'
		});
	}, function() {
		loginPopup.css({
			opacity: '0',
			visibility: 'hidden'

		});
	});
	// END LOGIN ICON HOVER

	// CART HOVER
	var cart = $(".cart-icon");
	var cartHover = $('.cart-hover');
	cart.hover(function() {
		cartHover.css({
			visibility: 'visible',
			opacity: '1'
		});
	}, function() {
		cartHover.css({
			opacity: '0',
			visibility: 'hidden'
		});
	});
	cartHover.hover(function() {
		cartHover.css({
			visibility: 'visible',
			opacity: '1'
		});
	}, function() {
		cartHover.css({
			opacity: '0',
			visibility: 'hidden'
		});
	});
	// END CART HOVER

	// MOBILE MENU ANIMATION
	var menuBtn = $('#mobile-menu-btn');
	var menuCancel =$('.side-menu-cancel i');
	var mobileNav = $('#mobile-side-menu');

	menuBtn.on('click', function(event) {
		event.preventDefault();
		mobileNav.removeClass('slideLeftOut').addClass('slideLeftIn').css('visibility', 'visible');

	});
	menuCancel.on('click', function(event) {
		event.preventDefault();
		mobileNav.removeClass('slideLeftIn').addClass('slideLeftOut');
	});
	// END MOBILE MENU ANIMATION

	
	// SHOW SEARCH SECTION
	
	var searchBtn = $(".search-icon").parent("li");
	var searchBtnM = $(".search-icon-mobile").parent("a");
	var searchSec = $("#search");
	var searchCan =$(".cancel-wrap i");

	searchBtn.on('click', function(event) {
		event.preventDefault();
		searchSec.removeClass('slideOutDown').addClass('slideInUp').css('visibility', 'visible');
	});
	searchBtnM.on('click', function(event) {
		event.preventDefault();
		searchSec.removeClass('slideOutDown').addClass('slideInUp').css('visibility', 'visible');
	});
	searchCan.on('click', function(event) {
		event.preventDefault();
		searchSec.removeClass('slideInUp').addClass('slideOutDown');
	});
	
	// END SHOW SEARCH  

	// CATOGORY MENU 

	var catBtn = $('.catogory-title-ul li a');
	var catView = $('.catogory-view-ul');

	catBtn.hover(function(event) {
		event.preventDefault();

		var viewRef = $(this).attr('href');
		catView.removeClass('cato-active');
		$(viewRef).addClass('cato-active');
	});
	
	// END CATOGORY MENU

	// USER IN MOBILE SCREEN
	var userBtn = $("#userBtn");
	var logPop = $(".mobile-login-popup");
	var userSec = $(".login-mobile");
	var userCan = $(".cancel-wrap i");

	userBtn.on('click', function(event) {
		event.preventDefault();
		userSec.removeClass('slideOutDown').addClass('slideInUp').css('visibility', 'visible');
		logPop.css('visibility', 'visible');
	});
	userCan.on('click', function(event) {
		event.preventDefault();
		userSec.removeClass('slideInUp').addClass('slideOutDown');
	});
	// END MOBILE SCREEN USER




    $(".my-dropdown-cate").hover(function () {
        $(".my-dropdown-cate-content").show(0);
        $(".my-dropdown-hot-content").hide(0);
    });
    $(".my-dropdown-hot").hover(function () {
        $(".my-dropdown-hot-content").show(0);
        $(".my-dropdown-cate-content").hide(0);
    })

	$(".before").click(function () {
		$(".img-before").show();
		$(".img-after").hide();
    })
    $(".after").click(function () {
        $(".img-before").hide();
        $(".img-after").show();
    })
	$("#card").click(function () {
		$(".my-bank").show();
    })
	$(".my-card").click(function () {
		$(".my-bank").show();
    })
	$("#cash").click(function () {
        $(".my-bank").hide();

    })
	$(".my-person-receive").click(function () {
		$(".person-receive").show();
    })
	$("#receive-not-me").click(function () {
		$(".person-receive").show();
    })
	$("#receive-me").click(function () {
		$(".person-receive").hide();
    })
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($("#change-pw").prop("checked") == true){
				$(".my-change-pw").show();
            }
            else if($("#change-pw").prop("checked") == false){
            	$(".my-change-pw").hide();
            }
        });
    });

});

