@extends('layouts.app')
@section('title','Products')
@section('header')
  @parent
@endsection
@section('content')
  <div class="container mt-5">
    <div class="row tm-content-row">
      <div class="col-sm-12 col-md-12 col-lg-8 col-xl-12 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-products">
          <div class="tm-product-table-container">
            <table class="table table-hover tm-table-small tm-product-table">
              <thead>
                <tr>
                  <th scope="col">Tên nhân viên</th>
                  <th scope="col">Email</th>
                  <th scope="col">Ngày sinh</th>
                  <th scope="col">Số điện thoại</th>
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">Quyền</th>
                  <th scope="col">Ngày giờ tạo tài khoản</th>
                  <th scope="col">Thao tác</th>
                </tr>
              </thead>
              <tbody id="list-admin">
                @foreach($admins as $admin)
                  <tr data-id="{{$admin->id}}" id="admin-id{{$admin->id}}">
                    <td class="tm-product-name">{{$admin->name}}</td>
                    <td class="tm-product-name">{{$admin->email}}</td>
                    <td class="tm-product-name">{{$admin->birth}}</td>
                    <td class="tm-product-name">{{$admin->phone}}</td>
                    <td class="tm-product-name">
                        <img width="100" height="100" src="{{URL::asset('/img-admin/')}}/{{$admin->photo}}" alt="">
                    </td>
                    <td data-role="{{$admin->is_supper}}" class="tm-product-name">
                      Nhân viên
                    </td>
                    <td class="tm-product-name">{{$admin->day_account_created}}</td>
                    <td class="text-right">
                      <a data-id="{{$admin->id}}" class="delete-admin">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                      <a data-id="{{$admin->id}}" class="update-admin">
                        <i class="far fa-edit tm-product-edit-icon"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- table container -->
          <button id="btn-them-admin" class="btn btn-primary btn-block text-uppercase">
            Thêm nhân viên
          </button>
          <div class="modal fade" id="modal-admin" aria-hidden="true">
            <div style="max-width:85%;" class="modal-dialog modal-lg">
              <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 id="title-admin" class="modal-title">Thông tin nhân viên</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                  <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                      <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Nhập thông tin nhân viên</h2>
                      </div>
                    </div>
                    <div class="row tm-edit-product-row">
                      <div class="col-12">
                        <form id="form-admin" class="tm-edit-product-form" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group mb-3">
                            <label for="name">Tên nhân viên</label>
                            <input id="name" name="ten_admin" type="text" class="form-control validate" required/>
                          </div>
                          <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control validate" required/>
                          </div>
                          <div class="form-group mb-3">
                            <label for="ngay_sinh">Ngày sinh</label>
                            <input type="text" name="birth" id="ngay_sinh" class="form-control validate">
                          </div>
                          <div class="form-group mb-3">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" name="phone" id="phone" class="form-control validate">
                          </div>
                          <div class="form-group custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="customRadio2" name="is_supper" value="0" checked>
                            <label class="custom-control-label" for="customRadio2">Nhân viên</label>
                          </div>
                          <div class="form-group mb-3">
                            <label for="password">Mật khẩu</label>
                            <input type="password" name="password" id="password" class="form-control validate">
                          </div>
                          <div class="form-group mb-3">
                            <label for="password2">Xác nhận mật khẩu</label>
                            <input type="password" name="password2" id="password2" class="form-control validate">
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                            <div id="where-replace" class="tm-product-img-dummy mx-auto">
                              <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();"></i>
                            </div>
                            <div class="custom-file mt-3 mb-3">
                              <input name="uploadfile" id="fileInput" type="file" style="display:none;" />
                              <input type="button" class="btn btn-primary btn-block mx-auto" value="Ảnh đại diện nhân viên" onclick="document.getElementById('fileInput').click();"/>
                            </div>
                          </div>
                          <div class="col-12">
                            <input type="hidden" name="id">
                            <button id="btn-luu-admin" type="submit" class="btn btn-primary btn-block text-uppercase"></button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('footer')
  @parent
@endsection
@section('script','')

