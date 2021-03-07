@extends('layouts.app')
@section('title','Products')
@section('header')
  @parent
@endsection
@section('content')
  <div class="container mt-5">
    <div class="row tm-content-row">
      <div class="col-sm-12 col-md-12 col-lg-8 col-xl-12 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
          <h2 class="tm-block-title">Loại công thức nấu ăn</h2>
          <div class="tm-product-table-container">
            <table id = "table-loai-cong-thuc" class="table tm-table-small tm-product-table">
              <tbody id = "list-loai-cong-thuc">
              @foreach($loaicongthucs as $loaicongthuc)
                <tr id="loai-cong-thuc-id{{$loaicongthuc->id}}">
                  <td class="tm-product-name">{{$loaicongthuc->ten_loai_cong_thuc}}</td>
                  <td class="text-right">
                    <a data-id="{{$loaicongthuc->id}}" class="tm-product-delete-link">
                      <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                    <a data-id="{{$loaicongthuc->id}}" class="tm-product-edit-link">
                      <i class="far fa-edit tm-product-edit-icon"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- table container -->
          <button id="btn-them" class="btn btn-primary btn-block text-uppercase mb-3">
            Thêm loại công thức
          </button>
           <!-- Thêm xoa sua loại công thức nấu ăn-->
          <div class="modal fade" id="modal-loai-cong-thuc" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 id="title-loai-cong-thuc" class="modal-title">Tên loại công thức</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                  <form name="form-loai-cong-thuc" id="form-loai-cong-thuc">
                    <div class="form-group">
                      <label for="ten-loai-cong-thuc"></label>
                      <input type="text" name="ten-loai-cong-thuc" class="form-control">
                    </div>
                    <div class="form-group">
                      <input id="btn-luu-loai-cong-thuc" class="btn btn-primary" type="submit">  
                      <input type="hidden" id="loai-cong-thuc-id" name="loai-cong-thuc-id" value="0">
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
@endsection
@section('footer')
  @parent
@endsection
@section('script','')
