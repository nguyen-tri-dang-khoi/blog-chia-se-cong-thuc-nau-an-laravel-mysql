<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="/register_user/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="/register_user/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="/register_user/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/register_user/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/register_user/css/main.css" rel="stylesheet" media="all">
</head>
<body>
<div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
  <div class="wrapper wrapper--w960">
    <div class="card card-2">
      <div class="card-heading"></div>
      <div class="card-body">
          <h2 class="title">Registration Info</h2>
          <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input-group">
                    <label for="name">{{ __('Tên người dùng') }}</label>
                    <input id="name" type="text" class="input--style-2" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="email">{{ __('Email') }}</label>

                      <input id="email" type="email" class="input--style-2" name="email" value="{{ old('email') }}" required autocomplete="email">

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>
                <div class="input-group">
                    <label for="password">{{ __('Mật khẩu') }}</label>
                        <input id="password" type="password" class="input--style-2" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="input-group">
                    <label for="password-confirm">{{ __('Xác nhận mật khẩu') }}</label>
                    <input id="password-confirm" type="password" class="input--style-2" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="p-t-30">
                    <button type="submit" class="btn btn--radius btn--green">
                        {{ __('Đăng ký') }}
                    </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 <!-- Jquery JS-->
 <script src="/register_user/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="/register_user/vendor/select2/select2.min.js"></script>
    <script src="/register_user/vendor/datepicker/moment.min.js"></script>
    <script src="/register_user/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="/register_user/js/global.js"></script>
</body>

