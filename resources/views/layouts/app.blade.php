<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - App Cookie</title>
    
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="/css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="/css/templatemo-style.css">
    <link rel="stylesheet" href="/jquery-ui-datepicker/jquery-ui.min.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
    -->
</head>
<body id = "reportPages">
    @section('header')
    <div class="" id="home">
      <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
          <a class="navbar-brand" href="/home/admin">
            <h1 class="tm-site-title mb-0">Blog công thức nấu ăn admin</h1>
          </a>
          <button
            class="navbar-toggler ml-auto mr-0"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fas fa-bars tm-nav-icon"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
            <ul class="navbar-nav mx-auto h-100">
              <li class="nav-item">
                <a class="nav-link" href="http://localhost:8000/admin/type-product/index">
                  <i class="fas fa-tachometer-alt"></i>Quản lý loại công thức nấu ăn
                  <span class="sr-only">(current)</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="http://localhost:8000/admin/product/index">
                  <i class="fas fa-tachometer-alt"></i>Quản lý công thức nấu ăn
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-cog"></i>
                  <span> Về admin <i class="fas fa-angle-down"></i> </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="http://localhost:8000/admin">Chỉnh sửa thông tin cá nhân</a>
                  <a class="dropdown-item" href="http://localhost:8000/admin/list_admin">Quản lý tài khoản admin khác</a>
                </div>
              </li>
            </ul>
            @endauth
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                  @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                    </li>
                  @endguest
                    @auth
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                  Đăng xuất
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                              <a class="dropdown-item" href="http://localhost:8000/admin">Thông tin cá nhân</a>
                          </div>
                      </li>
                    @endauth
                  </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    @show
    <div class="container h-100">
        @yield('content')
    </div>
    @section('footer')
    <!--footer start-->
        <footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                Copyright khoi_dep_trai <b><?php echo date('Y');?></b> All rights reserved. 
                
                Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
                </p>
            </div>
        </footer>
    <!--footer end-->
    @show
    @yield('script')
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
    <script src="{{ URL::asset('js/chart_config.js') }}"></script> <!--http://localhost:8000/js/custom_image.js-->
    <script src="{{ URL::asset('js/custom_image.js') }}"></script>
    <script src="{{ URL::asset('js/loaicongthuc.js') }}"></script>
    <script src="{{ URL::asset('js/congthuc.js') }}"></script>
    <script src="{{ URL::asset('js/tiny_config.js') }}"></script>
    <script src="{{ URL::asset('js/admin.js') }}"></script>
    <script src="{{ URL::asset('js/super_admin.js') }}"></script>
</body>
</html>