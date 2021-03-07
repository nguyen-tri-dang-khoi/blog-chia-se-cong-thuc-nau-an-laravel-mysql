$(function(){
    $('#btn-them').click(function(){
      $('#btn-luu-loai-cong-thuc').val('Thêm');
      $('#form-loai-cong-thuc').trigger("reset");
      $('#modal-loai-cong-thuc').modal('show');
    });
    $(document).on("click",'.tm-product-edit-link',function(event){
      let id = $(event.currentTarget).attr('data-id');
      let ten_loai_cong_thuc = $('#loai-cong-thuc-id' + id + ' > ' + '.tm-product-name').text();
      $('#btn-luu-loai-cong-thuc').val('Sửa');
      $('#form-loai-cong-thuc').trigger("reset");
      $('#modal-loai-cong-thuc').modal('show');
      $('input[name=ten-loai-cong-thuc]').val(ten_loai_cong_thuc);
      $('#loai-cong-thuc-id').val(id);
    });
    $(document).on("click",'.tm-product-delete-link',function(event){
      let id = $(event.currentTarget).attr('data-id');
      let ten_loai_cong_thuc = $('#loai-cong-thuc-id' + id + ' > ' + '.tm-product-name').text();
      $('#btn-luu-loai-cong-thuc').val('Xoá');
      $('#form-loai-cong-thuc').trigger("reset");
      $('#modal-loai-cong-thuc').modal('show');
      $('input[name=ten-loai-cong-thuc]').val(ten_loai_cong_thuc);
      $('#loai-cong-thuc-id').val(id);
     // $('#title-loai-cong-thuc').text("Bạn có chắc chắn muốn xoá '" +ten_loai_cong_thuc + "'");
      // $('input[name=ten-loai-cong-thuc]').hide();

    });
    $('#btn-luu-loai-cong-thuc').click(function(e){
      let _token = $('meta[name="csrf-token"]').attr('content');
      e.preventDefault();
      let ten_loai_cong_thuc = $('input[name=ten-loai-cong-thuc]').val();
      let thao_tac = $('#btn-luu-loai-cong-thuc').val();
      let method = "POST";
      let id = $('#loai-cong-thuc-id').val();
      // thao tac Sửa,Xoá
      let url = window.location.protocol + "//" +window.location.hostname + ":" + window.location.port  + "/loaicongthucs";
      if(thao_tac == 'Sửa'){
        method = "PUT";
        // loaicongthucs/{id}
        url = window.location.protocol + "//" +window.location.hostname + ":" + window.location.port  + "/loaicongthucs" + "/" + id;
      } else if (thao_tac == 'Xoá') {
        method = "DELETE";
        url = window.location.protocol + "//" +window.location.hostname + ":" + window.location.port  + "/loaicongthucs"+ "/" + id;

      }
      $.ajax({
        url: url,
        type: method,
        data:{
          _token,
          ten_loai_cong_thuc,
        },
        dataType: 'json',
        success: function(data) {
          let the_loai_cong_thuc = "<tr id='loai-cong-thuc-id" + data.id + "'>";
          the_loai_cong_thuc +=       '<td class="tm-product-name">' + data.ten_loai_cong_thuc + "</td>";
          the_loai_cong_thuc += '<td class="text-right">';
          the_loai_cong_thuc +=   '<a data-id="'+ data.id + '" class="tm-product-delete-link">';
          the_loai_cong_thuc +=    '<i class="far fa-trash-alt tm-product-delete-icon"></i>';
          the_loai_cong_thuc +=   '</a>';
          the_loai_cong_thuc +=   '<a data-id="'+ data.id + '" class="tm-product-edit-link">';
          the_loai_cong_thuc +=      '<i class="far fa-edit tm-product-edit-icon"></i>';
          the_loai_cong_thuc +=   '</a>'
          the_loai_cong_thuc +=  '</td>'
          the_loai_cong_thuc += "</tr>";
          if(thao_tac == "Thêm"){
            $('#list-loai-cong-thuc').append(the_loai_cong_thuc);
          } else if(thao_tac == "Sửa"){
            $('#loai-cong-thuc-id' + data.id).replaceWith(the_loai_cong_thuc);
          } else {
            $('#loai-cong-thuc-id' + data.id).remove();
          }
          $('#form-loai-cong-thuc').trigger('reset');
          $('#modal-loai-cong-thuc').modal('hide');
         // $('input[name=ten-loai-cong-thuc]').show();
         // $('#title-loai-cong-thuc').text('Tên loại công thức');
        },
        error: function (data) {
          console.log('Error:', data);
        }
      });
    })
  });