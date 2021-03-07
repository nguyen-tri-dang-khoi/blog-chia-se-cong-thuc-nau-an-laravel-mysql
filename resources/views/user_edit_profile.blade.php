<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="/css/fontawesome.min.css" />

    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="/jquery-ui-datepicker/jquery-ui.min.css">
    <style>
        body 
        {
            background: rgb(99, 39, 120);
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>
</head>
<body>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img width="200" height="200" class="rounded-circle mt-5" src='{{URL::asset("/img-admin/")}}/{{$user->photo}}' ><span class="font-weight-bold">{{$user->name}}</span><span class="text-black-50">{{$user->email}}</span><span> </span></div>
        </div>
        <form id="form-profile-user" method="" class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form id="form-user-profile" class="tm-signup-form row">
            <div class="form-group col-lg-6">
              <label for="name">Tên tài khoản</label>
              <input id="name" name="name" type="text" class="form-control validate" value='{{$user->name}}'/>
            </div>
            <div class="form-group col-lg-6">
              <label for="email">Email</label>
              <input id="email" name="email" type="email" class="form-control validate" value='{{$user->email}}'/>
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
              <input id="ngay_sinh" name="ngay_sinh" type="text" class="form-control validate" value='{{$user->birth}}'/>
            </div>
            <div class="form-group col-lg-6">
              <label for="phone">Số điện thoại</label>
              <input id="phone" name="phone" type="tel" class="form-control validate" value='{{$user->phone}}'/>
            </div>
            <div class="form-group col-12">
              <label class="tm-hide-sm">&nbsp;</label>
              <button id="upload_profile" type="submit" class="btn btn-primary btn-block text-uppercase">Cập nhật tài khoản</button>
            </div>
          </form>
    </div>
</div>
<script src="/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->  
    <script src="/js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="/js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="/js/tooplate-scripts.js"></script>
    <!-- https://jquerytoolplate-script.com/download/ -->
    <script src="/jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="/js/tinymce/js/tinymce/tinymce.min.js"></script> 
    <script src="{{ URL::asset('js/chart_config.js') }}"></script>
    <script src="{{ URL::asset('js/custom_image.js') }}"></script>
    <script src="{{ URL::asset('js/loaicongthuc.js') }}"></script>
    <script src="{{ URL::asset('js/congthuc.js') }}"></script>
    <script src="{{ URL::asset('js/tiny_config.js') }}"></script>
    <script src="{{ URL::asset('js/user.js') }}"></script>
</body>
</html>


