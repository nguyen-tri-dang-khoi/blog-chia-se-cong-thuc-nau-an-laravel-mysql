@extends('layouts.user')
@section('title','User about')
@section('header')
  @parent
@endsection
@section('content_page')
	<article class="blog-post px-3 py-5 p-md-5">
		<div class="container">
			@foreach($congthucs as $congthuc)
			<header id="post" data-id="{{$congthuc->id}}" class="blog-post-header">
				<h2 class="title mb-2">{{$congthuc->ten_cong_thuc}}</h2>
				<div class="meta mb-3"><span class="date">{{$congthuc->ngay_dang}}</span><span class="time">{{$congthuc->name}}</span><span class="comment"><a href="#">{{$congthuc->ten_loai_cong_thuc}}</a></span></div>
			</header>
			<div class="blog-post-body">
				<figure class="blog-banner">
					<img class="img-fluid" src="{{URL::asset('img-cong-thuc-storage')}}/{{$congthuc->hinh_anh}}" alt="image">
				</figure>
				<h3>Mô tả công thức</h3>
				{!!$congthuc->mo_ta_cong_thuc!!}
			</div>
			@endforeach
			<br>
			<br>
			<br>
			<h3>Bình luận</h3>
			<br>
			<div id="list-binh-luan" class="geser">
				@foreach($binhluans as $binhluan)
				<div class="media">
					<div class="media-left">
						<img src='{{URL::asset("/img-admin/")}}/{{$binhluan->photo}}' class="media-object" style="width:40px">
					</div>
					<div class="media-body">
						<h4 class="media-heading title">{{$binhluan->name}}</h4>
						<p class="komen">{{$binhluan->noi_dung_binh_luan}}</p>
						<p class="komen">{{$binhluan->thoi_gian_binh_luan}}</p>
					</div>
				</div>
				@endforeach
			</div>
			<form id="form-binh-luan" method="post">
				@csrf
				<div class="form-group">
					<label for="comment">Bình luận của bạn: </label>
					<textarea cols="70" rows="2" name="comment" id="comment"></textarea>
				</div>
				<div class="form-group">
					<button id="btn-gui-binh-luan" class="btn btn-primary" type="submit">Gửi</button>
				</div>
			</form>
		</div><!--//container-->
	</article>
@endsection
@section('javascript','')
