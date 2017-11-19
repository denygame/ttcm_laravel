// Backend - Thanh Huy

//add 1 product to shopping cart
$(document).ready(function(){
	$(".product-hover").click(function(){
		var id = $(this).attr('id');
		$.ajax({
			url: 'add-book-cart',
			type: 'GET',
			dataType: 'json',
			cache:false,
			data: {id:id},
			success:function(data){
				$(".cart-count").html(data.count);
				$(".mobile-cart-count").html(data.count);
				$(".cart-hover").html(data.html);
				// alert(data.count);
				//  alert(data.html);
			}
		});
	});
});


//update qty product shopping cart
$(document).ready(function(){
	$(".input-qty-cart").change(function(){
		var val = $(this).attr('value');
		var valueChange = $(this).val();
		if(!isNaN(parseInt(valueChange)) && isFinite(valueChange)){
			if(isInt(valueChange)){
				var divInput = $(this).parent().parent();
				//tag <td> has div qty
				var td = divInput.parent();
				//
				var spanTotalPriceOfItem = td.next().children().children();

				$.ajax({
					url: 'update-book-cart',
					type: 'GET',
					cache:false,
					data: { rowId:divInput.attr('id') , qty: valueChange },
					dataType: 'json',
					success:function(data){
						spanTotalPriceOfItem.html(data.price);
						$(".total-table").html(data.htmlTotalPay);
						$(".cart-count").html(data.count);
						$(".mobile-cart-count").html(data.count);
						$(".cart-hover").html(data.htmlMiniCart);
					}
				});
				// set value 
				$(this).attr('value',valueChange);
			}
			else{
				$(this).val(val);
			}
		}
		else{
			$(this).val(val);
		}
	});
});


//remove product in shopping cart
$(document).ready(function(){
	$(".td-del-wrap").click(function(){
		var rowId=$(this).attr('id');

		$.ajax({
			url: 'remove-book-cart',
			type: 'GET',
			cache:false,
			data: {rowId:rowId},
			dataType: 'json',
			success:function(data){
				if(data.count!=0){
					$('.cart-items-table tr').each(function(){
						if($(this).attr('id')===rowId)
							$(this).remove();
					});
					$(".total-table").html(data.htmlTotalPay);
					$(".cart-count").html(data.count);
					$(".mobile-cart-count").html(data.count);
					$(".cart-hover").html(data.htmlMiniCart);
				}else location.reload();
			}
		});
	});
});

//register account
$(document).ready(function(){
	//array save timeOut
	var modalRegister = [];
	var route;

	$(".register-button").click(function(e){
		e.preventDefault();

		var _token = $('#register-form').find('meta[name=_token]').attr('content');
		var full_name = $('#register-form').find("input[name='full_name']").val();
		var email = $('#register-form').find("input[name='email']").val();
		var password = $('#register-form').find("input[name='password']").val();
		var re_password = $('#register-form').find("input[name='re_password']").val();

		alert(password);

		$.ajax({
			url: "post-register",
			type: 'POST',
			cache:false,
			dataType: 'json',
			data: {_token:_token,full_name:full_name,email:email,password:password,re_password:re_password},
			success:function(data){
				if($.isEmptyObject(data.error)){
				// alert(data.success);
				var popup = new Foundation.Reveal($('#success-modal'));
				popup.open();
				modalRegister.push(setTimeout(function(){
					popup.close();
					window.location=data.route;
				},5000));
				route = data.route;

			}else{
				printErrorMsg(data.error);
				backToTop();
			}
		}

	});
	});

	$(".register-close-btn").click(function(){
		for(var i=0;i<modalRegister.length;i++){
			clearTimeout(modalRegister.pop());
		}
		window.location = route;
	});

	//display errors on view
	function printErrorMsg (msg) {
		$(".errors-register").find("ul").html('');
		$(".errors-register").css('display','block');
		$.each( msg, function( key, value ) {
			$(".errors-register").find("ul").append('<li>'+value+'</li><br/>');
		});
	}
});


//login
$(document).ready(function() {
	$(".popup-login-button").click(function(){
		clickLogin('#login-form',0);
	});

	$(".mobile-popup-login-button").click(function(){
		clickLogin('#mobile-login-form',1);
	});

	$(".page-login-button").click(function(){
		clickLogin('#page-login',0);
	});

	function clickLogin(idForm,type) {
		var _token = $(idForm).find("input[name='_token']").val();
		var email = $(idForm).find("input[name='email']").val();
		var password = $(idForm).find("input[name='password']").val();

		$.ajax({
			url: "post-login",
			type: 'POST',
			cache:false,
			dataType: 'json',
			data: {_token:_token,email:email,password:password},
			success:function(data){
				
				if(type===1){//mobile
					var userSec = $(".login-mobile");
					userSec.removeClass('slideInUp').addClass('slideOutDown');
					setTimeout(function(){},350);
				}

				if($.isEmptyObject(data.error)){
					if(data.type==0){
						showModal(data.message, 0);
					}else{
						showModal(data.message, 0);
						setTimeout(function(){},1000);
						window.location = data.route;
					}

				}else{
					showModal(data.error, 1);
				}
			}
		});
	}

	function showModal(msg, check) {
		$("#login-modal").find("#list-error-login").html('');
		if(check === 0){
			$("#login-modal").find('h3').html(msg);
		}
		else{
			$("#login-modal").find('h3').html("Có lỗi xảy ra!");
			$.each( msg, function( key, value ) {
				$("#login-modal").find("#list-error-login").append('<center><p>'+value+'</p></center>');
			});
		}

		var popup = new Foundation.Reveal($('#login-modal'));
		popup.open();
	}
});


// area vietnam select
$(document).ready(function(){
	$("#city-select").change(function(){
		var id_city = $("#city-select").val();

		$("#ward-select").html('');
		$("#ward-select").html('<option value="">--- Chọn Phường/Xã ---</option>');

		$("#district-select").html('');
		$("#district-select").html('<option value="">--- Chọn Quận/Huyện ---</option>');

		if(id_city!=0){
			$.ajax({
				url: "get-district-by-id-city",
				type: 'GET',
				cache:false,
				dataType: 'json',
				data: {id_city:id_city},
				success:function(data){
					for(var i=0;i<data.arrDistrict.length;i++){
						var id = data.arrDistrict[i]['id'];
						var name = data.arrDistrict[i]['name'];
						$("#district-select").append('<option value="'+id+'">'+name+'</option>');
					}
				}
			});
		}
	});

	$("#district-select").change(function(){
		var id_district = $("#district-select").val();
		$("#ward-select").html('');
		$("#ward-select").html('<option value="">--- Chọn Phường/Xã ---</option>');

		if(id_district!=0){
			$.ajax({
				url: "get-ward-by-id-district",
				type: 'GET',
				cache:false,
				dataType: 'json',
				data: {id_district:id_district},
				success:function(data){
					for(var i=0;i<data.arrWard.length;i++){
						var id = data.arrWard[i]['id'];
						var name = data.arrWard[i]['name'];
						$("#ward-select").append('<option value="'+id+'">'+name+'</option>');
					}
				}
			});
		}

	});
});


// area
// chua gom function lai
$(document).ready(function(){
	$("#city-select1").change(function(){
		var id_city = $("#city-select1").val();

		$("#ward-select1").html('');
		$("#ward-select1").html('<option value="">--- Chọn Phường/Xã ---</option>');

		$("#district-select1").html('');
		$("#district-select1").html('<option value="">--- Chọn Quận/Huyện ---</option>');

		if(id_city!=0){
			$.ajax({
				url: "get-district-by-id-city",
				type: 'GET',
				cache:false,
				dataType: 'json',
				data: {id_city:id_city},
				success:function(data){
					for(var i=0;i<data.arrDistrict.length;i++){
						var id = data.arrDistrict[i]['id'];
						var name = data.arrDistrict[i]['name'];
						$("#district-select1").append('<option value="'+id+'">'+name+'</option>');
					}
				}
			});
		}
	});

	$("#district-select1").change(function(){
		var id_district = $("#district-select1").val();
		$("#ward-select1").html('');
		$("#ward-select1").html('<option value="">--- Chọn Phường/Xã ---</option>');

		if(id_district!=0){
			$.ajax({
				url: "get-ward-by-id-district",
				type: 'GET',
				cache:false,
				dataType: 'json',
				data: {id_district:id_district},
				success:function(data){
					for(var i=0;i<data.arrWard.length;i++){
						var id = data.arrWard[i]['id'];
						var name = data.arrWard[i]['name'];
						$("#ward-select1").append('<option value="'+id+'">'+name+'</option>');
					}
				}
			});
		}

	});
});






// update - profile customer
$(document).ready(function(){
	$("#btn-update-profile").click(function(){
		var _token = $("#profile-form").find("input[name='_token']").attr('value');
		var email = $("#profile-form").find("input[name='email']").val();
		var name = $("#profile-form").find("input[name='name']").val();
		var sex = $("#profile-form").find("input[name='sex']:checked").attr('id');
		var day = $("#profile-form").find("#day").val();
		var month = $("#profile-form").find("#month").val();
		var year = $("#profile-form").find("#year").val();
		var tel = $("#profile-form").find("input[name='tel']").val();
		var id_city = $("#profile-form").find("#city-select").val();
		var id_district = $("#profile-form").find("#district-select").val();
		var id_ward = $("#profile-form").find("#ward-select").val();
		var address = $("#profile-form").find("input[name='address']").val();

		$.ajax({
			url: 'update-profile',
			type: 'POST',
			cache: false,
			dataType: 'json',
			data:{
				_token:_token, email: email, day: day, month:month, year:year, name:name, 
				sex:sex, tel:tel, id_city:id_city, id_district:id_district, id_ward:id_ward, address:address
			},
			success:function(data){
				if($.isEmptyObject(data.error)){
					location.reload();
				}else{
					backToTop();
					showError(data.error,".errors-update-profile","Có lỗi xảy ra khi cập nhật thông tin");
				}
			}
		});
	});

	// display message 3s
	$(".success-update-profile").delay(3000).slideUp();
});


// change password
$(document).ready(function(){
	$("#btn-reset-pass").click(function(){
		var _token = $("#reset-pass-form").find("input[name='_token']").attr('value');
		var email = $("#reset-pass-form").find("input[name='email']").attr('value');
		var old_pass = $("#reset-pass-form").find("input[name='old-pass']").val();
		var new_pass = $("#reset-pass-form").find("input[name='new-pass']").val();
		var confirm_pass = $("#reset-pass-form").find("input[name='confirm-pass']").val();

		$.ajax({
			url: 'reset-pw-post',
			type: 'POST',
			cache: false,
			dataType: 'json',
			data:{
				_token:_token, email:email, old_pass: old_pass, new_pass: new_pass, confirm_pass: confirm_pass
			},
			success:function(data){
				if($.isEmptyObject(data.error)){
					location.reload();
				}else{
					backToTop();
					showError(data.error,".errors-reset-pass","Có lỗi xảy ra khi đổi mật khẩu");
				}
			}
		});
	});

	// display message 3s
	$(".success-reset-pass").delay(2000).slideUp();
});

// send mail reset password
$(document).ready(function(){
	$("#btn-forgot-pass").click(function(){
		var _token = $("#frm-forgot-pass").find("input[name='_token']").val();
		var email = $("#frm-forgot-pass").find("input[name='email']").val();
		var bool = true;
		if(isEmail(email)){
			$.ajax({
				url: 'check-exists-email',
				type: 'POST',
				cache: false,
				async: false,//set variable when success
				data:{_token:_token,email:email},
				success:function(data){
					if(data == 'false'){
						$(".errors-forgot-pass").find('h5').html('');
						$(".errors-forgot-pass").find('h5').html('Email không tồn tại trong hệ thống');
						$(".errors-forgot-pass").css('display','block');
						bool=false;
					}
				}
			});

		}else{
			$(".errors-forgot-pass").find('h5').html('');
			$(".errors-forgot-pass").find('h5').html('Vui lòng nhập email');
			$(".errors-forgot-pass").css('display','block');
			bool=false;
		}

		return bool;		
	});

	
	function isEmail(email) {
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	}
});


// reset password with email send 
$(document).ready(function(){
	$("#btn-reset-pass-with-email").click(function(){
		var _token = $("#frm-reset-pass").find("input[name='_token']").attr('value');
		var email = $("#frm-reset-pass").find("input[name='email']").val();
		var password = $("#frm-reset-pass").find("input[name='password']").val();
		var confirm = $("#frm-reset-pass").find("input[name='confirm']").val();

		$.ajax({
			url: 'password/reset-pass-after-email',
			type: 'POST',
			cache: false,
			dataType: 'json',
			data:{
				_token:_token, email:email, password: password, confirm: confirm
			},
			success:function(data){
				if($.isEmptyObject(data.error)){
					window.location=data.success;
				}else{
					backToTop();
					showError(data.error,".errors-reset-pass-with-email","Có lỗi xảy ra khi cập nhật mật khẩu mới");
				}
			}
		});
	});
});


// checkout
$(document).ready(function(){
	$("#btn-order").click(function(){
		var checkReceive = false;
		var arr = [];

		var id_user = $('#frm-info-order').find('input[name="name"]').attr('id');
		var email = $('#frm-info-order').find('input[name="email"]').val();
		var name = $('#frm-info-order').find('input[name="name"]').val();
		var tel = $('#frm-info-order').find('input[name="tel"]').val();
		var id_city = $('#frm-info-order').find("#city-select").val();
		var id_district = $('#frm-info-order').find("#district-select").val();
		var id_ward = $('#frm-info-order').find("#ward-select").val();
		var address = $('#frm-info-order').find('input[name="address"]').val();

		var gh = $("#frm-order-protocol").find("input[name='gh']:checked").attr('value');
		var nn = $("#frm-order-protocol").find("input[name='nn']:checked").attr('value');
		var tt = $("#frm-order-protocol").find("input[name='tt']:checked").attr('value');

		if(nn==1){
			checkReceive = true;
			var name1 = $('#frm-order-protocol').find('input[name="name"]').val();
			var tel1 = $('#frm-order-protocol').find('input[name="tel"]').val();
			var id_city1 = $('#frm-order-protocol').find("#city-select1").val();
			var id_district1 = $('#frm-order-protocol').find("#district-select1").val();
			var id_ward1 = $('#frm-order-protocol').find("#ward-select1").val();
			var address1 = $('#frm-order-protocol').find('input[name="address"]').val();

			if(!checkReceiveNotMe(name1,0))
				arr.push('Họ tên người nhận không được trống');
			if(!checkReceiveNotMe(tel1,0))
				arr.push('Số điện thoại người nhận không được trống');
			if(!checkReceiveNotMe(id_city1,1))
				arr.push('Thành phố người nhận chưa được chọn');
			if(!checkReceiveNotMe(id_district1,1))
				arr.push('Quận huyện người nhận chưa được chọn');
			if(!checkReceiveNotMe(id_ward1,1))
				arr.push('Phường xã người nhận chưa được chọn');
			if(!checkReceiveNotMe(address1,0))
				arr.push('Địa chỉ người nhận không được trống');

			if(arr.length>0){
				showErrorReceive(arr,".errors-checkout","Thông tin Người nhận không phải tôi chưa đầy đủ");
				backToTop();
				return false;
			}
		}

		if(!checkReceive){
			$.ajax({
				url: 'order-bill',
				type: 'GET',
				cache: false,
				dataType: 'json',
				data:{
					id_user:id_user,email:email,name:name,tel:tel,id_city:id_city,id_district:id_district,id_ward:id_ward,
					address:address,gh:gh,nn:nn,tt:tt
				},
				success:function(data){
					if($.isEmptyObject(data.error)){
						window.location=data.route;
					}else{
						backToTop();
						showError(data.error,".errors-checkout","Có lỗi xảy ra khi đặt hàng");
					}
				}
			});
		}else{
			$.ajax({
				url: 'order-bill',
				type: 'GET',
				cache: false,
				dataType: 'json',
				data:{
					id_user:id_user,email:email,name:name,tel:tel,id_city:id_city,id_district:id_district,id_ward:id_ward,
					address:address,gh:gh,nn:nn,tt:tt,name1:name1,tel1:tel1,id_city1:id_city1,id_district1:id_district1,
					id_ward1:id_ward1,address1:address1
				},
				success:function(data){
					if($.isEmptyObject(data.error)){
						window.location=data.route;
					}else{
						backToTop();
						showError(data.error,".errors-checkout","Có lỗi xảy ra khi đặt hàng");
					}
				}
			});
		}
	});

	function checkReceiveNotMe(variable,type) {
		if(type==0){
			if(variable==null)return false;
			return true;
		}else{
			if(variable==0)return false;
			return true;
		}
	}

	function showErrorReceive(err, object_alert, title_h5) {
		$(object_alert).find("h5").html(title_h5);
		$(object_alert).find("ul").html('');
		$(object_alert).css('display','block');
		$.each( err, function( key, value ) {
			$(object_alert).find("ul").append('<li>'+value+'</li><br/>');
		});
	}
});



// use for reset-pass and profile-customer , reset pass with email
function showError(err, object_alert, title_h5) {
	$(object_alert).find("h5").html(title_h5);
	$(object_alert).find("ul").html('');
	$(object_alert).css('display','block');
	$.each( err, function( key, value ) {
		$(object_alert).find("ul").append('<li>'+value+'</li><br/>');
	});
}

function backToTop() {
	$('html,body').animate({
		scrollTop: 0
	}, 1000);
}

function isInt(value){
	return value%1===0;
}

// when click Add-to-cart in detail
function addToCartDetail(idbook){
	var val = $(".input-qty-book-detail").attr('value');
	var getQty = $(".input-qty-book-detail").val();
	
	if(!isNaN(parseInt(getQty)) && isFinite(getQty)){
		if(isInt(getQty)){

			$.ajax({
				url: 'add-book-cart-qty',
				type: 'GET',
				cache: false,
				data: { id: idbook, qty: getQty },
				success: function(data){
					location.href = data;
				} 
			});
		}
		else{
			$(".input-qty-book-detail").val(val);
		}
	}
	else{
		$(".input-qty-book-detail").val(val);
	}
}



//select - option birthday on profile view
var numDays = {
	'1': 31, '2': 28, '3': 31, '4': 30, '5': 31, '6': 30,
	'7': 31, '8': 31, '9': 30, '10': 31, '11': 30, '12': 31
};
function setDays(oMonthSel, oDaysSel, oYearSel)
{
	var nDays, oDaysSelLgth, opt, i;
	year = (oYearSel.selectedIndex == 0)? -1 : oYearSel[oYearSel.selectedIndex].value;
	month = oMonthSel[oMonthSel.selectedIndex].value;
	nDays = numDays[month];

	if (nDays==28 && ((year%4==0)&&(year%100!=0)) || (year%400==0) )
		++nDays;
	oDaysSelLgth = oDaysSel.length;

	if (nDays < oDaysSelLgth)
		oDaysSel.length = nDays + 1;
	else for (i = 0; i < nDays - oDaysSelLgth + 1; i++)
	{
		opt = new Option(oDaysSelLgth + i, oDaysSelLgth + i);
		oDaysSel.options[oDaysSel.length] = opt;
	}
	
	var oForm = oMonthSel.form;
	var month = oMonthSel.options[oMonthSel.selectedIndex].value;
	var day = oDaysSel.options[oDaysSel.selectedIndex].value;
	var year = oYearSel.options[oYearSel.selectedIndex].value;	
	oForm.hidden.value = month + '/' + day + '/' + year;
}