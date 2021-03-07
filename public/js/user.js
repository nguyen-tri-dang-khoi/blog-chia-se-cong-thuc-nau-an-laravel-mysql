$( function() {
    // custom input có id="ngay_sinh" jquery
    $( "#ngay_sinh" ).datepicker({
      dateFormat: 'yy-mm-dd'
    });

    // ajax load anh user
    // lay anh user
    $(document).on('click','#upload_image',function(e){
      e.preventDefault();
      // code
      let formImage = new FormData($('#form-user-upload-image')[0]);
      let file = $('input[name=uploadfile]')[0].files;
      formImage.append('uploadfile',file[0]);
      let url = window.location.protocol + "//" +window.location.hostname + ":" + window.location.port+'/user/upload_image';
      formImage.append('_method','PUT');

      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:url,
        type:"POST",
        data:formImage,
        dataType:'json',
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
          let url_image = window.location.protocol + "//" +window.location.hostname + ":" + window.location.port + "/img-admin/";
          let image = '<img width="200" height="200" src="' + url_image + data.photo+ '"' + " class='tm-product-img-dummy' id='display-image'/>";
          if($('#where_replace2').length > 0){
            $('#where_replace2').replaceWith(image);
          } else {
            $('#where_replace').replaceWith(image);
          }
          alert('Bạn đã tải ảnh lên thành công');
        },
        error:function(data){
          console.log("Error: " , data);
        }
      });
    });
    $(document).on('click','#upload_profile',function(e){
      // ngan khong cho du lieu form gui di truoc khi ajax thuc thi
      e.preventDefault();
      let formProfile = new FormData($('#form-user-profile')[0]);
      // lay du lieu tu input
      let name = $('input[name=name]').val();
      let email = $('input[name=email]').val();
      let password = $('input[name=password]').val();
      let confirm_password = $('input[name=password2]').val();
      let birth = $('input[name=ngay_sinh]').val();
      let phone = $('input[name=phone]').val();
      
      // khoi tao form data de gui qua ajax

      // lay duong dan ajax se gui qua do
      let url = window.location.protocol + "//" +window.location.hostname + ":" + window.location.port+'/user/upload_profile';
      // nap thong tin va du lieu vao formProfile
      formProfile.append('_method','PUT');
      formProfile.append('name',name);
      formProfile.append('email',email);
      formProfile.append('password',password);
      formProfile.append('phone',phone);
      formProfile.append('birth',birth);
      

      /*
        headers: gui csrf
        url: duong dan ajax se gui
        type: phuong thuc cua form (get, post, put, delete, patch)
        dataType: kieu du lieu dinh dang de gui
        contentType: ?
        processData: ?
        success: neu thuc thi ajax dc se gui data ve bao, neu ko se ko gui hoac bao loi
        error: bat loi de sua (debug)
      */
     if(password === confirm_password){
      let url = window.location.protocol + "//" +window.location.hostname + ":" + window.location.port+'/user/upload_profile';
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:url,
        type:"POST",
        data:formProfile,
        dataType:'json',
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
          let url_image = window.location.protocol + "//" +window.location.hostname + ":" + window.location.port + "/user";
        },
        error:function(data){
          console.log("Error: " , data);
        }
      });
      alert('Cập nhật tài khoản thành công');
      alert('Đăng nhập lại để tiếp tục');
     } else {
      alert('Mật khẩu bạn xác nhận không khớp với mật khẩu bạn nhập');
     }
    });
    $(document).on('click','#delete_account',function(e){
      let url = window.location.protocol + "//" +window.location.hostname + ":" + window.location.port+'/user/delete_account';
      if(confirm("Bạn có chắc chắn muốn xoá tài khoản ?"))
      {
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url:url,
          type:"POST",
          data:"",
          dataType:'json',
          cache: false,
          contentType: false,
          processData: false,
          success:function(data){
            alert("Bạn đã xoá tài khoản thành công");
            location.replace(window.location.protocol + "//" +window.location.hostname + ":" + window.location.port+"user/login");
          },
          error:function(data){
            console.log("Error: " , data);
          }
        });
      }
    });
  });