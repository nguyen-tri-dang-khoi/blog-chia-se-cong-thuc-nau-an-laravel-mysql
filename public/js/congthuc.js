$(function(){
    $('#btn-them-cong-thuc').click(function(){
      $('#btn-luu-cong-thuc').val('Thêm công thức');
      $('#btn-luu-cong-thuc').text('Thêm công thức');
      $('#form-cong-thuc').trigger("reset");
      $('#modal-cong-thuc').modal('show');
      if($('#display-image').length){
        $('#display-image' ).replaceWith('<i class="fas fa-cloud-upload-alt tm-upload-icon"></i>');
      }
    });
    $(document).on('click','.tm-product-edit-link',function(event){
      let id = $(event.currentTarget).attr('data-id');
      
      let $ds = $('#cong-thuc-id' + id + ' > ' + '.tm-product-name');
      var ten_cong_thuc = $ds[0].innerText;
      var ten_loai_cong_thuc = $ds[2].innerHTML;
      var id_loai_cong_thuc = $ds[2].getAttribute('data-id_l');
      var mo_ta_cong_thuc = $ds[1].innerHTML;
      var hinh_anh = $ds[4].children[0].src;
      
      $('#btn-luu-cong-thuc').val('Sửa công thức');
      $('#btn-luu-cong-thuc').text('Sửa công thức');
      $('#form-cong-thuc').trigger("reset");
      $('#modal-cong-thuc').modal('show');
      $('input[name=ten_cong_thuc]').val(ten_cong_thuc);
      tinymce.activeEditor.setContent(mo_ta_cong_thuc,{format: 'raw'});
      $("#where-replace > i").replaceWith( "<img class='tm-product-img-dummy' id='display-image'/>" );
      $("#where-replace > img").attr('src',hinh_anh);
     
      $("option[value=" + id_loai_cong_thuc + "]" ).attr('selected',true);
      $('input[name=id]').val(id);
    });
    $(document).on('click','.tm-product-delete-link',function(event){
      let id = $(event.currentTarget).attr('data-id');
      let $ds = $('#cong-thuc-id' + id + ' > ' + '.tm-product-name');
      var ten_cong_thuc = $ds[0].innerText;
      var ten_loai_cong_thuc = $ds[2].innerText;
      var id_loai_cong_thuc = $ds[2].getAttribute('data-id_l');
      var mo_ta_cong_thuc = $ds[1].innerHTML;
      var hinh_anh = $ds[4].children[0].src;
      $('#btn-luu-cong-thuc').val('Xoá công thức');
      $('#btn-luu-cong-thuc').text('Xoá công thức');
      $('#form-cong-thuc').trigger("reset");
      $('#modal-cong-thuc').modal('show');
      $('input[name=ten_cong_thuc]').val(ten_cong_thuc);
      tinymce.get("text_area").setContent(mo_ta_cong_thuc);
      $("#where-replace > i").replaceWith( "<img class='tm-product-img-dummy' id='display-image'/>" );
      $("#where-replace > img").attr('src',hinh_anh);

      $("option[value=" + id_loai_cong_thuc + "]" ).attr('selected',true);
      $('input[name=id]').val(id);
    });
    $('#btn-luu-cong-thuc').click(function(e){
      let _token = $('meta[name="csrf-token"]').attr('content');
      e.preventDefault();
      let ten_cong_thuc = $('input[name=ten_cong_thuc]').val();
      
      let phan_loai_cong_thuc = $('select[name=phan_loai_cong_thuc]').val();
      let file = $('input[name=uploadfile]')[0].files;

      var content = tinymce.get('text_area').getContent();
      $('textarea[name=mo_ta_cong_thuc]').val(content);

      let mo_ta_cong_thuc = $('textarea[name=mo_ta_cong_thuc]').val();

      var formData = new FormData($('#form-cong-thuc')[0]);
      formData.append('_token',_token);
      formData.append('ten_cong_thuc',ten_cong_thuc);
      formData.append('mo_ta_cong_thuc',mo_ta_cong_thuc);
      formData.append('phan_loai_cong_thuc',phan_loai_cong_thuc);
      formData.append('uploadfile',file[0]);

      let thao_tac = $('#btn-luu-cong-thuc').val();
      let method = "POST";
      // thao tac Sửa,Xoá
      let id = $('input[name=id]').val();
      let url = window.location.protocol + "//" +window.location.hostname + ":" + window.location.port  + "/congthucs/";
      if(thao_tac == 'Sửa công thức'){
        formData.append('_method','put');
        // loaicongthucs/{id}
        url =  window.location.protocol + "//" +window.location.hostname + ":" + window.location.port + "/congthucs/" + id;
      } else if (thao_tac == 'Xoá công thức') {
        method = "DELETE";
        url = window.location.protocol + "//" +window.location.hostname + ":" + window.location.port  +  "/congthucs/" + id;
      }
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:method,
        url: url,
        data:formData,
        dataType:'json',
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
          let url_image = window.location.protocol + "//" +window.location.hostname + ":" + window.location.port + "/img-cong-thuc-storage/";
          let the_cong_thuc = '<tr data-id="' +data.kq.id+ '" ' + 'id="cong-thuc-id' + data.kq.id + '">';
          the_cong_thuc +=       '<td class="tm-product-name">' + data.kq.ten_cong_thuc + "</td>";
          the_cong_thuc +=       '<td style="display:none" class="tm-product-name">' + data.kq.mo_ta_cong_thuc + "</td>";
          the_cong_thuc +=       '<td>...</td>';
          the_cong_thuc +=       '<td ' + 'data-id_l="' + data.kq.loai_ct_id + '"' +' class="tm-product-name">' + data.kq.ten_loai_cong_thuc + "</td>";
          the_cong_thuc +=       '<td class="tm-product-name">' + data.kq.ngay_dang + "</td>";
          the_cong_thuc +=       '<td class="tm-product-name">'
          the_cong_thuc +=          '<img width="100" height="100" src="'+url_image + data.kq.hinh_anh + '"' + ">"
                                 "</td>";
          the_cong_thuc +='<td class="tm-product-name">'  +data.kq.name + "</td>";
          
          the_cong_thuc += '<td class="text-right">';
          the_cong_thuc +=   '<a data-id="'+ data.kq.id + '" class="tm-product-delete-link">';
          the_cong_thuc +=    '<i class="far fa-trash-alt tm-product-delete-icon"></i>';
          the_cong_thuc +=   '</a>';
          the_cong_thuc +=   '<a data-id="'+ data.kq.id + '" class="tm-product-edit-link">';
          the_cong_thuc +=      '<i class="far fa-edit tm-product-edit-icon"></i>';
          the_cong_thuc +=   '</a>'
          the_cong_thuc +=  '</td>'
          the_cong_thuc += "</tr>";
          if(thao_tac == "Thêm công thức"){
            $('#list-cong-thuc').prepend(the_cong_thuc);
            
          } else if(thao_tac == "Sửa công thức"){
            $('#cong-thuc-id' + data.kq.id).replaceWith(the_cong_thuc);
            $('#display-image' ).replaceWith('<i class="fas fa-cloud-upload-alt tm-upload-icon"></i>');
          } else {
            $('#cong-thuc-id' + data.kq.id).remove();
            $('#display-image' ).replaceWith('<i class="fas fa-cloud-upload-alt tm-upload-icon"></i>');
          }
          $('#form-cong-thuc').trigger('reset');
          $('#modal-cong-thuc').modal('hide');

         // $('input[name=ten-cong-thuc]').show();
         // $('#title-cong-thuc').text('Tên loại công thức');
        },
        error: function (data) {
          console.log('Error:', data);
        }
      });
    })
  });