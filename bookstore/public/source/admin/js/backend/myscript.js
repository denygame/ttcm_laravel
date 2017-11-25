// $(document).ready(function(){  
//   $("#img-input-after-detail").change(function() {
//     readURL(this,'#img_after_detail');
//   });
// });



function changeImgUrl(input,idImg) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $(idImg).attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}