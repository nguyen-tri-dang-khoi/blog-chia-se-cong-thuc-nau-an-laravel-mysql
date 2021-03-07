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
                  <th scope="col">Tên công thức</th>
                  <th scope="col">Mô tả công thức</th>
                  <th scope="col">Phân loại</th>
                  <th scope="col">Ngày đăng</th>
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">Người đăng</th>
                  <th scope="col">Thao tác</th>
                </tr>
              </thead>
              <tbody id="list-cong-thuc">
                @foreach($congthucs as $congthuc)
                  <tr data-id="{{$congthuc->id}}" id="cong-thuc-id{{$congthuc->id}}">
                    <td class="tm-product-name">{{$congthuc->ten_cong_thuc}}</td>
                    <td style="display:none" class="tm-product-name">{!!$congthuc->mo_ta_cong_thuc!!}</td>
                    <td>...</td>
                    <td data-id_l="{{$congthuc->loai_ct_id}}" class="tm-product-name">{{$congthuc->ten_loai_cong_thuc}}</td>
                    <td class="tm-product-name">{{$congthuc->ngay_dang}}</td>
                    <td class="tm-product-name">
                        <img width="100" height="100" src="{{URL::asset('/img-cong-thuc-storage/')}}/{{$congthuc->hinh_anh}}" alt="">
                    </td>
                    <td class="tm-product-name">{{$congthuc->name}}</td>
                    <td class="text-right">
                      <a data-id="{{$congthuc->id}}" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                      <a data-id="{{$congthuc->id}}" class="tm-product-edit-link">
                        <i class="far fa-edit tm-product-edit-icon"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- table container -->
          <button id="btn-them-cong-thuc" class="btn btn-primary btn-block text-uppercase">
            Thêm công thức nấu ăn
          </button>
          <div class="modal fade" id="modal-cong-thuc" aria-hidden="true">
            <div style="max-width:85%;" class="modal-dialog modal-lg">
              <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 id="title-cong-thuc" class="modal-title">Tên công thức nấu ăn</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                  <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                      <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Nhập công thức nấu ăn</h2>
                      </div>
                    </div>
                    <div class="row tm-edit-product-row">
                      <div class="col-12">
                        <form id="form-cong-thuc" class="tm-edit-product-form" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group mb-3">
                            <label for="name">Tên công thức nấu ăn</label>
                            <input id="name" name="ten_cong_thuc" type="text" class="form-control validate" required/>
                          </div>
                          <div class="form-group mb-3">
                            <label for="description">Mô tả công thức nấu ăn</label>
                            <textarea id="text_area" rows="10" cols="10" name="mo_ta_cong_thuc" class="form-control tinymce-editor validate"  required></textarea>
                          </div>
                          <div class="form-group mb-3">
                            <label for="category">Phân loại công thức nấu ăn</label>
                            <select name="phan_loai_cong_thuc" class="custom-select tm-select-accounts" id="category">
                              @foreach($loaicongthucs as $loaicongthuc)
                                <option value="{{$loaicongthuc->id}}">{{$loaicongthuc->ten_loai_cong_thuc}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                            <div id="where-replace" class="tm-product-img-dummy mx-auto">
                              <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();"></i>
                            </div>
                            <div class="custom-file mt-3 mb-3">
                              <input name="uploadfile" id="fileInput" type="file" style="display:none;" />
                              <input type="button" class="btn btn-primary btn-block mx-auto" value="Ảnh đại diện công thức nấu ăn" onclick="document.getElementById('fileInput').click();"/>
                            </div>
                          </div>
                          <div class="col-12">
                            <input type="hidden" name="id">
                            <button id="btn-luu-cong-thuc" type="submit" class="btn btn-primary btn-block text-uppercase"></button>
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


