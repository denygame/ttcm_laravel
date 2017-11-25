//backend Thanh Huy
//Product fly to cart

$(document).ready(function(){

	var flyFinish = '.cart-icon';

	//đích đến của hình khi reponsive và resize % browser
	$(window).resize(function() {
		var windowWidth = window.innerWidth;

		if (windowWidth < 1024) {
			flyFinish = '.mobile-cart-count';
		}else flyFinish = '.cart-icon';
	});

	// tạo mảng lưu các timeout img fly
	var myTimer = [];

	$(".product-hover").click(function(e){

		// khi có hình đang bay thì xóa và xóa timeout
		if($(document).has(".item-fly-product")){

			$(document).find('.item-fly-product').remove();

			for(var i=0;i<myTimer.length;i++){
				clearTimeout(myTimer.pop());
			}
		}

		var idbook = $(this).attr('id');
		var self = $(this);

		$('.product-hover').addClass('disable');

		var parent = $(this).parent('.product-item');

		var finish = $(document).find(flyFinish);

		var nameImg = parent.attr('id');

		// tạo img
		$("<img/>", {
			class: "item-fly-product",
			src: 'upload/products/'+nameImg
		}).appendTo("body").css({
			'top':self.offset().top-5,
			'left':self.offset().left+parent.width()-50,
		});

		// hình bay
		myTimer.push(setTimeout(function(){
			$(document).find('.item-fly-product').css({
				'top': finish.offset().top,
				'left': finish.offset().left
			});

			// xóa hình trên giỏ hàng khi bay đến
			myTimer.push(setTimeout(function(){
				$(document).find('.item-fly-product').remove();
			},1200));
		}, 550));
	});



});

