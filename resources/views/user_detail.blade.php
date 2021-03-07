<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Document</title>
	<link rel="stylesheet" href="/css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
	<link rel="stylesheet" href="/jquery-ui-datepicker/jquery-ui.min.css">

	<style>
		body{
    		background: -webkit-linear-gradient(left, #3931af, #00c6ff);
		}
		.emp-profile{
			padding: 3%;
			margin-top: 3%;
			margin-bottom: 3%;
			border-radius: 0.5rem;
			background: #fff;
		}
		.profile-img{
			text-align: center;
		}
		.profile-img img{
			width: 70%;
			height: 100%;
		}
		.profile-img .file {
			position: relative;
			overflow: hidden;
			margin-top: -20%;
			width: 70%;
			border: none;
			border-radius: 0;
			font-size: 15px;
			background: #212529b8;
		}
		.profile-img .file input {
			position: absolute;
			opacity: 0;
			right: 0;
			top: 0;
		}
		.profile-head h5{
			color: #333;
		}
		.profile-head h6{
			color: #0062cc;
		}
		.profile-edit-btn{
			border: none;
			border-radius: 1.5rem;
			width: 70%;
			padding: 2%;
			font-weight: 600;
			color: #6c757d;
			cursor: pointer;
		}
		.proile-rating{
			font-size: 12px;
			color: #818182;
			margin-top: 5%;
		}
		.proile-rating span{
			color: #495057;
			font-size: 15px;
			font-weight: 600;
		}
		.profile-head .nav-tabs{
			margin-bottom:5%;
		}
		.profile-head .nav-tabs .nav-link{
			font-weight:600;
			border: none;
		}
		.profile-head .nav-tabs .nav-link.active{
			border: none;
			border-bottom:2px solid #0062cc;
		}
		.profile-work{
			padding: 14%;
			margin-top: -15%;
		}
		.profile-work p{
			font-size: 12px;
			color: #818182;
			font-weight: 600;
			margin-top: 10%;
		}
		.profile-work a{
			text-decoration: none;
			color: #495057;
			font-weight: 600;
			font-size: 14px;
		}
		.profile-work ul{
			list-style: none;
		}
		.profile-tab label{
			font-weight: 600;
		}
		.profile-tab p{
			font-weight: 600;
			color: #0062cc;
		}
	</style>
</head>
<body>
	<div class="container emp-profile">
		<form id="logout-form" action="{{ route('logout') }}" method="POST">
			@csrf
			<button class="btn btn-primary" type="submit">Logout</button>
		</form>
		<div class="row">
			<a href="http://localhost:8000/list_recipe" class="btn btn-success">Xem danh sách công thức</a>
		</div>
		<div class="row">
			<div class="col-md-4">
			<form id="form-user-upload-image" class="tm-edit-product-form" enctype="multipart/form-data">
            @if($user->photo === "image.jpg")  
                <div id="where-replace" class="tm-product-img-dummy mx-auto">
                    <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();"></i>
                </div>
              @else
                <div class="tm-product-img-dummy mx-auto">
                  <img width="200" height="200" src='{{URL::asset("/img-admin/")}}/{{$user->photo}}' class='tm-product-img-dummy' id='display-image'/>
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
			<div class="col-md-6">
				<div class="profile-head">
					<h5>
						{{$user->name}}
					</h5>
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-2">
				<a href="{{ route('user.edit_profile') }}" class="btn btn-dark" >Edit profile</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="tab-content profile-tab" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="row">
									<div class="col-md-6">
										<label>User Id</label>
									</div>
									<div class="col-md-6">
										<p>{{$user->id}}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Name</label>
									</div>
									<div class="col-md-6">
										<p>{{$user->name}}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Email</label>
									</div>
									<div class="col-md-6">
										<p>{{$user->email}}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Phone</label>
									</div>
									<div class="col-md-6">
										<p>{{$user->phone}}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Date</label>
									</div>
									<div class="col-md-6">
										<p>{{$user->birth}}</p>
									</div>
								</div>
					</div>
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<div class="row">
									<div class="col-md-6">
										<label>Experience</label>
									</div>
									<div class="col-md-6">
										<p>Expert</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Hourly Rate</label>
									</div>
									<div class="col-md-6">
										<p>10$/hr</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Total Projects</label>
									</div>
									<div class="col-md-6">
										<p>230</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>English Level</label>
									</div>
									<div class="col-md-6">
										<p>Expert</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Availability</label>
									</div>
									<div class="col-md-6">
										<p>6 months</p>
									</div>
								</div>
						<div class="row">
							<div class="col-md-12">
								<label>Your Bio</label><br/>
								<p>Your detail description</p>
							</div>
						</div>
					</div>
				</div>
			</div>
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
