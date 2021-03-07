function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#display-image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
  }
  $("#fileInput").change(function(){
      $("#where-replace > i").replaceWith( "<img width='200' height='200' class='tm-product-img-dummy' id='display-image'/>" );
      readURL(this); 
});