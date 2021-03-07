@extends('layouts.app')
@section('title','Accounts')
@section('header')
  @parent
@endsection
  @section('content')
    <!-- row -->
    <div class="row tm-content-row">
      <div class="tm-block-col tm-col-avatar">
        <div class="tm-bg-primary-dark tm-block tm-block-avatar">
          <form id="form-user-upload-image" class="tm-edit-product-form" enctype="multipart/form-data">
            @if($admin->photo === "image.jpg")  
                <div id="where-replace" class="tm-product-img-dummy mx-auto">
                    <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();"></i>
                </div>
              @else
                <div class="tm-product-img-dummy mx-auto">
                  <img src='{{URL::asset("/img-admin/")}}/{{$admin->photo}}' class='tm-product-img-dummy' id='display-image'/>
                </div>
              @endif
              <div class="custom-file mt-3 mb-3">
                <input name="uploadfile" id="fileInput" type="file" style="display:none;" />
              </div>
              <input type="button" class="btn btn-primary btn-block mx-auto" onclick="document.getElementById('fileInput').click();"  value="Tải ảnh cá nhân"/>
              <br>
              <br>
              <br>
              <div class="form-group">
                <input id="upload_image" class="btn btn-primary btn-block mx-auto" type="submit" value="Upload">
              </div>
          </form>
        </div>
      </div>
      <div class="tm-block-col tm-col-account-settings">
        <div class="tm-bg-primary-dark tm-block tm-block-settings">
          <h2 class="tm-block-title">Thiết lập tài khoản</h2>
          <form id="form-user-profile" class="tm-signup-form row">
            <div class="form-group col-lg-6">
              <label for="name">Tên tài khoản</label>
              <input id="name" name="name" type="text" class="form-control validate" value='{{$admin->name}}'/>
            </div>
            <div class="form-group col-lg-6">
              <label for="email">Email</label>
              <input id="email" name="email" type="email" class="form-control validate" value='{{$admin->email}}'/>
            </div>
            <div class="form-group col-lg-6">
              <label for="password">Nhập mật khẩu của bạn</label>
              <input id="password" name="password" type="password" class="form-control validate"/>
            </div>
            <div class="form-group col-lg-6">
              <label for="password2">Xác nhận mật khẩu</label>
              <input id="password2" name="password2" type="password" class="form-control validate"/>
            </div>
            <div class="form-group col-lg-6">
              <label for="ngay_sinh">Ngày sinh</label>
              <input id="ngay_sinh" name="ngay_sinh" type="text" class="form-control validate" value='{{$admin->birth}}'/>
            </div>
            <div class="form-group col-lg-6">
              <label for="phone">Số điện thoại</label>
              <input id="phone" name="phone" type="tel" class="form-control validate" value='{{$admin->phone}}'/>
            </div>
            <div class="form-group col-12">
              <label class="tm-hide-sm">&nbsp;</label>
              <button id="upload_profile" type="submit" class="btn btn-primary btn-block text-uppercase">Cập nhật tài khoản</button>
            </div>
          </form>
          <div class="col-12">
              <button id="delete_account" class="btn btn-primary btn-block text-uppercase">Xoá tài khoản</button>
            </div>
        </div>
      </div>
    </div>
@endsection
@section('footer')
  @parent
@endsection
@section('script','')



