<article class="wow fadeIn animated hover-up mb-30">
	<div class="post-thumb" style="background-image: url({{asset($post->image())}});">
		@if($ctg =$post->postCategories()->first())
		<div class="entry-meta">
			<a class="entry-meta meta-2" href="{{route('blogCategory',$ctg->slug?:'no-title')}}">{{$ctg->name}}</a>
		</div>
		@endif
	</div>
	<div class="entry-content-2">
		<h3 class="post-title mb-15">
			<a href="{{route('blogView',$post->slug?:'no-title')}}">{{$post->name}}</a></h3>
			
			<p class="post-exerpt mb-30">
				{!!$post->short_description!!}
			</p>

		<div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
			<div>
				<span class="post-on"> <i class="fi-rs-clock"></i> {{$post->created_at->format('d F Y')}}</span>
				<span class="hit-count has-dot">{{$post->view}} Views</span>
			</div>
			<a href="{{route('blogView',$post->slug?:'no-title')}}" class="text-brand">Read more <i class="fi-rs-arrow-right"></i></a>
		</div>
	</div>
</article>