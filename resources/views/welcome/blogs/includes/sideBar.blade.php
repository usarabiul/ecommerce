<div class="widget-area">
	<div class="sidebar-widget widget_search mb-50">
		<div class="search-form">
			<form action="{{route('blogSearch')}}">
				<input type="text" placeholder="Search…" value="{{request()->blog_search}}" name="blog_search">
				<button type="submit"> <i class="fi-rs-search"></i> </button>
			</form>
		</div>
	</div>
	<!--Widget categories-->
	<div class="sidebar-widget widget_categories mb-40">
		<div class="widget-header position-relative mb-20 pb-10">
			<h5 class="widget-title">Categories</h5>
		</div>
		<div class="post-block-list post-module-1 post-module-5">
			<ul>
				@foreach(App\Models\Attribute::where('type',6)->where('status','active')->where('parent_id',null)->orderBy('name')->limit(5)->get() as $ctg)
				<li class="cat-item cat-item-2"><a href="{{route('blogCategory',$ctg->slug?:'no-title')}}">{{$ctg->name}}</a> ({{$ctg->activePosts()->count()}})</li>
				@endforeach
			</ul>
		</div>
	</div>
	<!--Widget latest posts style 1-->
	<div class="sidebar-widget widget_alitheme_lastpost mb-20">
		<div class="widget-header position-relative mb-20 pb-10">
			<h5 class="widget-title">Trending Now</h5>
		</div>
		<div class="row">
			@foreach(App\Models\Post::where('type',1)->where('status','active')->latest()->limit(5)->get() as $t=>$lPost)
				@if($t==0)
					<div class="col-12 sm-grid-content mb-30">
						<div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
							<a href="{{route('blogView',$lPost->slug?:'no-title')}}">
								<img src="{{asset($lPost->image())}}" alt="{{$lPost->name}}">
							</a>
						</div>
						<div class="post-content media-body">
							<h4 class="post-title mb-10 text-limit-2-row">{{$lPost->name}}</h4>
							<div class="entry-meta meta-13 font-xxs color-grey">
								<span class="post-on mr-10">{{$lPost->created_at->format('d F')}}</span>
								<span class="hit-count has-dot ">{{$lPost->view}} Views</span>
							</div>
						</div>
					</div>
				@else
					<div class="col-md-6 col-sm-6 sm-grid-content mb-30">
						<div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
							<a href="{{route('blogView',$lPost->slug?:'no-title')}}">
								<img src="{{asset($lPost->image())}}" alt="{{$lPost->name}}">
							</a>
						</div>
						<div class="post-content media-body">
							<h6 class="post-title mb-10 text-limit-2-row">{{$lPost->name}}</h6>
							<div class="entry-meta meta-13 font-xxs color-grey">
								<span class="post-on mr-10">{{$lPost->created_at->format('d F')}}</span>
								<span class="hit-count has-dot ">{{$lPost->view}} Views</span>
							</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
	<!--Widget ads-->
	<!-- <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none animated">
		<img src="assets/imgs/banner/banner-11.jpg" alt="">
		<div class="banner-text">
			<span>Women Zone</span>
			<h4>Save 17% on <br>Office Dress</h4>
			<a href="shop-grid-right.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
		</div>
	</div> -->
	<!--Widget Tags-->
	<!-- <div class="sidebar-widget widget_tags mb-50">
		<div class="widget-header position-relative mb-20 pb-10">
			<h5 class="widget-title">Popular tags </h5>
		</div>
		<div class="tagcloud">
			<a class="tag-cloud-link" href="blog-category-grid.html">beautiful</a>
			<a class="tag-cloud-link" href="blog-category-grid.html">New York</a>
			<a class="tag-cloud-link" href="blog-category-grid.html">droll</a>
			<a class="tag-cloud-link" href="blog-category-grid.html">intimate</a>
			<a class="tag-cloud-link" href="blog-category-grid.html">loving</a>
			<a class="tag-cloud-link" href="blog-category-grid.html">travel</a>
			<a class="tag-cloud-link" href="blog-category-grid.html">fighting </a>
		</div>
	</div> -->
</div>
