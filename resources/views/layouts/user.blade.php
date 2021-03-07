<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Blog chia sẻ công thức nấu ăn</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Template">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - App Cookie</title>
    <!-- FontAwesome JS-->
    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>
    
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.14.2/styles/monokai-sublime.min.css">
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="/assets/css/theme-1.css">
    <style>
        .title {
        font-size: 14px;
        font-weight:bold;
        }
        .komen {
            font-size:14px;
        }
    </style>
</head> 
<body>
    @section('header')
    <header style="width:350px;" class="header text-center">	    
	    <h1 class="blog-name pt-lg-4 mb-0">{{$user->name}}</h1>
        
	    <nav class="navbar navbar-expand-lg navbar-dark" >
           
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div id="navigation" class="collapse navbar-collapse flex-column" >
				<div class="profile-section pt-3 pt-lg-0">
                    <img class="profile-image mb-3 rounded-circle mx-auto" src="{{URL::asset('/img-admin/')}}/{{$user->photo}}" alt="image" >
                    <h4 class="blog-name">{{$user->email}}</h4>		
			        <hr> 
				</div><!--//profile-section-->
				<div class="my-2 my-md-3">
				    <a class="btn btn-primary" href="{{ route('user.profile') }}" target="_blank">Thông tin cá nhân</a>
                </div>
                <div class="my-2 my-md-3">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-primary" type="submit">Đăng xuất</button>
                    </form>
				</div>
			</div>
		</nav>
    </header>
    @show
    <div class="main-wrapper">
        @yield('content_page')
    </div>
    @yield('javascript')
    <!-- Javascript -->          
    <script src="/assets/plugins/jquery-3.3.1.min.js"></script>
    <script src="/assets/plugins/popper.min.js"></script> 
    <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
    <!-- Page Specific JS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.14.2/highlight.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/blog.js"></script>
    <!-- Style Switcher (REMOVE ON YOUR PRODUCTION SITE) -->
    <script src="/assets/js/demo/style-switcher.js"></script>    
    <script src="{{ URL::asset('js/binhluan.js') }}"></script>
</body>