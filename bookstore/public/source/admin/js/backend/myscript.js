$(document).ready(function(){
	$(".btn-update-category").click(function(){
		var idcate=$(this).attr('id');
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
	});

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



function changeImgUrl(input,idImg) {

	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function(e) {
			$(idImg).attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}