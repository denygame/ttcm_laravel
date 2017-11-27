
// insert update categoty
$(document).ready(function(){
	$(".btn-insert-category").click(function(){
		$("#frm-modal-category").find("input[name='input-modal-category']").val('');
		$("#frm-modal-category").find("input[name='input-modal-category']").attr('id',0);
	});

	$(".btn-modal-accept-category").click(function(){
		var id = $("#frm-modal-category").find("input[name='input-modal-category']").attr('id');
		var _token = $("#frm-modal-category").find("input[name='_token']").attr('value');
		var valueInput = $("#frm-modal-category").find("input[name='input-modal-category']").val();

		if(!$.trim(valueInput).length){
			$("#frm-modal-category").find("input[name='input-modal-category']").val('');
			$("#frm-modal-category").find("input[name='input-modal-category']").focus();
			return false;
		}
		
		if(id==0){ //insert
			$.ajax({
				type:'post',
				url:'admin/ajax/insert-cate',
				cache:false,
				data:{value:valueInput,_token:_token},
				success:function(data){
					location.reload();
				}
			});
		}else{ // update
			$.ajax({
				type:'post',
				url:'admin/ajax/update-cate',
				cache:false,
				data:{idcate:id,value:valueInput,_token:_token},
				success:function(data){
					location.reload();
				}
			});
		}
	});

	$(".success-category").delay(2000).slideUp();
});

// show frm update category
function showUpdateCategory(idcate){
	$.ajax({
		type:'get',
		url:'admin/ajax/show-cate-update',
		cache:false,
		data:{idcate:idcate},
		success:function(data){
			$("#frm-modal-category").find("input[name='input-modal-category']").val(data['name']);
			$("#frm-modal-category").find("input[name='input-modal-category']").attr('id',data['id']);
		}
	});
}



// show modal delete category
function showDeleteCategory(idcate){
	$(".lbl-delete-cate").html('');
	$("#frm-delete-confirm-category").find("input[name='idcate']").val(idcate);
	$.ajax({
		type:'get',
		url:'admin/ajax/show-cate-delete',
		cache:false,
		data:{idcate:idcate},
		success:function(data){
			$(".lbl-delete-cate").html('Hệ thống tìm thấy '+data+' đầu sách trong danh mục này');
		}
	});
}

// delete category
$(document).ready(function(){
	$('#modal-category-delete-confirm').on('hidden.bs.modal', function () {
		$("#frm-delete-confirm-category").find("input[name='idcate']").val(0);
	});

	$(".btn-modal-accept-delete-category").click(function(){
		var _token = $("#frm-delete-confirm-category").find("input[name='_token']").val();
		var idcate = $("#frm-delete-confirm-category").find("input[name='idcate']").val();
		if (idcate!=0) {
			$.ajax({
				type:'post',
				url:'admin/ajax/delete-cate',
				cache:false,
				data:{_token:_token,idcate:idcate},
				success:function(data){
					location.reload();
				}
			});
		}
	});
});


// 
function changeImgUrl(input,idImg) {

	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function(e) {
			$(idImg).attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}













// area vietnam select
$(document).ready(function(){
	$("#city-select").change(function(){
		var id_city = $("#city-select").val();

		$("#ward-select").html('');
		$("#ward-select").html('<option value="" selected="selected">--- Chọn Phường/Xã ---</option>');

		$("#district-select").html('');
		$("#district-select").html('<option value="" selected="selected">--- Chọn Quận/Huyện ---</option>');

		$('#district-select').select2('val', 1);
		$('#ward-select').select2('val', 1);

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

		$('#ward-select').select2('val', 1);

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


$(document).ready(function(){
	// $(".btn-add-book").click(function(){
	// 	var _token = $("#frm-add-book").find("input[name='_token']").val();
	// 	var _token = $("#frm-add-book").find("input[name='_token']").val();
	// 	alert(_token);
	// });

	$('.success-manage-book').delay(2500).slideUp();
});