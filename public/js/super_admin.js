$(function(){
    $( "#ngay_sinh" ).datepicker({
        dateFormat: 'yy-mm-dd'
    });
    // begin thao tac them
    $('#btn-them-admin').click(function(){
      $('#btn-luu-admin').val('Thêm Admin');
      $('#btn-luu-admin').text('Thêm Admin');
      $('#form-admin').trigger("reset");
      $('#modal-admin').modal('show');
      if($('#display-image').length){
        $('#display-image' ).replaceWith('<i class="fas fa-cloud-upload-alt tm-upload-icon"></i>');
      }
    });
    // end thao tac them

    // begin thao tac update
    $(document).on('click','.update-admin',function(event){
      let id = $(event.currentTarget).attr('data-id');
      
      let $ds = $('#admin-id' + id + ' > ' + '.tm-product-name');
      let name = $ds[0].innerText;
      let email = $ds[1].innerText;
      let birth = $ds[2].innerText;
      let phone = $ds[3].innerText;
      let photo = $ds[4].children[0].src;
      let is_supper = $ds[5].getAttribute('data-is_supper');
      let is_supper_name = $ds[5].innerText;
      let day_created_account = $ds[6].innerText;
      // gan gia tri va text hien thi vao button#btn-luu-admin
      $('#btn-luu-admin').val('Sửa Admin');
      $('#btn-luu-admin').text('Sửa Admin');
      // reset modal khong hien thi du lieu cu moi khi show len
      $('#form-admin').trigger("reset");
      // mo modal len
      $('#modal-admin').modal('show');

      // binding cac gia tri thuoc dong td vao input
      $('input[name=ten_admin]').val(name);
      $('input[name=email]').val(email);
      $('input[name=birth]').val(birth);
      $('input[name=phone]').val(phone);
      $('select[name=is_supper] > option:selected' ).attr('value',is_supper);
      $('select[name=is_supper] > option:selected' ).text(is_supper_name);
      
      
      $("#where-replace > i").replaceWith( "<img class='tm-product-img-dummy' id='display-image'/>" );
      $("#where-replace > img").attr('src',photo);
      
      $('input[name=id]').val(id);
    });
    // end thao tac update

    // begin thao tac delete
    $(document).on('click','.delete-admin',function(event){
      let id = $(event.currentTarget).attr('data-id');
      let $ds = $('#admin-id' + id + ' > ' + '.tm-product-name');
      let name = $ds[0].innerText;
      let email = $ds[1].innerText;
      let birth = $ds[2].innerText;
      let phone = $ds[3].innerText;
      let photo = $ds[4].children[0].src;
      let is_supper = $ds[5].getAttribute('data-is_supper');
      let is_supper_name = $ds[5].innerText;
      let day_created_account = $ds[6].innerText;
      $('#btn-luu-admin').val('Xoá Admin');
      $('#btn-luu-admin').text('Xoá Admin');

      $('#form-admin').trigger("reset");
      $('#modal-admin').modal('show');
      $('input[name=ten_admin]').val(name);
      $('input[name=email]').val(email);
      $('input[name=birth]').val(birth);
      $('input[name=phone]').val(phone);
     
      
      
      $("#where-replace > i").replaceWith( "<img class='tm-product-img-dummy' id='display-image'/>" );
      $("#where-replace > img").attr('src',photo);
      
      $('input[name=id]').val(id);
    });
    // end thao tac delete

    // begin lay du lieu va goi ajax
    $('#btn-luu-admin').click(function(e){
      let password = $('input[name=password]').val();
      let password2 = $('input[name=password2]').val();
      e.preventDefault();
      if(password == ""){
        alert('Mật khẩu không được để trống');
      } 
      else if(password != password2)
      {
        alert('Bạn xác nhận mật khẩu không khớp với mật khẩu bạn nhập');
      }
      else 
      {
        let _token = $('meta[name="csrf-token"]').attr('content');
        let name = $('input[name=ten_admin]').val();
        let email = $('input[name=email]').val();
        let birth = $('input[name=birth]').val();
        let phone = $('input[name=phone]').val();
        let file = $('input[name=uploadfile]')[0].files;      
        var formData = new FormData($('#form-admin')[0]);
        formData.append('_token',_token);
        formData.append('name',name);
        formData.append('email',email);
        formData.append('birth',birth);
        formData.append('phone',phone);
        formData.append('password',password);
        formData.append('uploadfile',file[0]);
  
  
        let thao_tac = $('#btn-luu-admin').val();
        let method = "POST";
        // thao tac Sửa,Xoá
        let id = $('input[name=id]').val();
        let url = window.location.protocol + "//" +window.location.hostname + ":" + window.location.port  + "/admins/";
        if(thao_tac == 'Sửa Admin'){
          formData.append('_method','put');
          // loaicongthucs/{id}
          url =  window.location.protocol + "//" +window.location.hostname + ":" + window.location.port + "/admins/" + id;
        } else if (thao_tac == 'Xoá Admin') {
          method = "DELETE";
          url = window.location.protocol + "//" +window.location.hostname + ":" + window.location.port  +  "/admins/" + id;
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
            let url_image = window.location.protocol + "//" +window.location.hostname + ":" + window.location.port + "/img-admin/";
            let tag_admin = '<tr data-id="' + data.id+ '" ' + 'id="admin-id' + data.id + '">';
            tag_admin +=       '<td class="tm-product-name">' + data.name + "</td>";
            tag_admin +=       '<td class="tm-product-name">' + data.email + "</td>";
            tag_admin +=       '<td class="tm-product-name">' + data.birth + "</td>";
            tag_admin +=       '<td class="tm-product-name">' + data.phone + "</td>";
            tag_admin +=       '<td class="tm-product-name">';
            tag_admin +=          '<img width="100" height="100" src="'+url_image + data.photo + '"' + ">";
            tag_admin +=       "</td>";
            tag_admin += '<td class="tm-product-name">'  + "Nhân viên" + "</td>";
            tag_admin +=       '<td class="tm-product-name">' + data.day_account_created + "</td>";
            tag_admin += '<td class="text-right">';
            tag_admin +=   '<a data-id="'+ data.id + '" class="delete-admin">';
            tag_admin +=    '<i class="far fa-trash-alt tm-product-delete-icon"></i>';
            tag_admin +=   '</a>';
            tag_admin +=   '<a data-id="'+ data.id + '" class="update-admin">';
            tag_admin +=      '<i class="far fa-edit tm-product-edit-icon"></i>';
            tag_admin +=   '</a>'
            tag_admin +=  '</td>'
            tag_admin += "</tr>";
            if(thao_tac == "Thêm Admin"){
              $('#list-admin').prepend(tag_admin);
              
            } else if(thao_tac == "Sửa Admin"){
              $('#admin-id' + data.id).replaceWith(tag_admin);
              $('#display-image' ).replaceWith('<i class="fas fa-cloud-upload-alt tm-upload-icon"></i>');
            } else {
              $('#admin-id' + data.id).remove();
              $('#display-image' ).replaceWith('<i class="fas fa-cloud-upload-alt tm-upload-icon"></i>');
            }
            $('#form-admin').trigger('reset');
            $('#modal-admin').modal('hide');
  
           // $('input[name=ten-admin]').show();
           // $('#title-admin').text('Tên loại Admin');
          },
          error: function (data) {
            console.log('Error:', data);
          }
        });
      }
    })
    // end lay du lieu va goi ajax

  });