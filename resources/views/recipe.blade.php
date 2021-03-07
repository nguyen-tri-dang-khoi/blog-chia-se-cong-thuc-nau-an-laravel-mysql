@extends('layouts.user')
@section('title','User about')
@section('header')
  @parent
@endsection
@section('content_page')
	    <section class="cta-section theme-bg-light py-5">
		    <div class="container text-center">
			    <h2 class="heading">Website công thức nấu ăn</h2>
			    <div class="intro">Nơi sưu tầm công thức nấu ăn ngon nhất thế giới</div>
			    <form id="form-search-recipe" method="GET" class="signup-form form-inline justify-content-center pt-3">
                    @csrf
					<div class="form-group">
                        <label class="sr-only" for="recipe">Tìm kiếm công thức...</label>
                        <input type="text" id="keyword" name="keyword" class="form-control mr-md-1 semail" placeholder="Nhập công thức nấu ăn...">
                    </div>
                    <button id="btn-search" type="submit" class="btn btn-primary">Tìm kiếm</button>
                </form>
		    </div><!--//container-->
	    </section>
	    <section class="blog-list px-3 py-5 p-md-5">
		    <div class="container">
				@foreach($congthucs as $congthuc)
			    <div class="item mb-5">
				    <div class="media">
					    <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="{{URL::asset('img-cong-thuc-storage')}}/{{$congthuc->hinh_anh}}" alt="image">
					    <div class="media-body">
						    <h3 class="title mb-1"><a href="{{ url('list_recipe') }}/{{$congthuc->id}}">{{$congthuc->ten_cong_thuc}}</a></h3>
						    <div class="meta mb-1"><span class="date">Published 2 days ago</span><span class="time">5 min read</span><span class="comment"><a href="#">8 comments</a></span></div>

						    <a class="more-link" href="blog-post.html">Read more &rarr;</a>
					    </div><!--//media-body-->
				    </div><!--//media-->
			    </div><!--//item-->
				@endforeach
			    <nav class="blog-nav nav nav-justified my-5">
				  <a class="nav-link-prev nav-item nav-link d-none rounded-left" href="#">Previous<i class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
				  <a class="nav-link-next nav-item nav-link rounded" href="blog-list.html">Next<i class="arrow-next fas fa-long-arrow-alt-right"></i></a>
				</nav>
		    </div>
	    </section>
	    
	    <footer class="footer text-center py-2 theme-bg-dark">
		   
	        <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can buy the commercial license via our website: themes.3rdwavemedia.com */-->
                <small class="copyright">Designed with <i class="fas fa-heart" style="color: #fb866a;"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
		   
	    </footer>
@endsection
@section('style_themes')
 @parent
@endsection
@section('javascript','')
