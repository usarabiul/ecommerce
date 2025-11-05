@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle($post->seo_title?:$post->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle($post->seo_title?:$post->name)}}" />
<meta name="description" property="og:description" content="{!!$post->seo_description?:general()->meta_description!!}" />
<meta name="keywords" content="{{$post->seo_keyword?:general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset($post->image())}}" />
<meta name="url" property="og:url" content="{{route('blogView',$post->slug?:'no-title')}}" />
<link rel="canonical" href="{{route('blogView',$post->slug?:'no-title')}}">
@endsection @push('css')
<style>

</style>
@endpush 

@section('contents')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow">Home</a>
            <span></span>
            @if($pg =pageTemplate('Latest Blog'))
            <a href="{{route('pageView',$pg->slug?:'no-title')}}" rel="nofollow">Blog </a>
            <span></span>
            @endif
            Detials
        </div>
    </div>
</div>

<section class="mt-50 mb-50">
    <div class="container custom">
        <div class="row">
            <div class="col-lg-9">
                <div class="single-page pr-30">
                    <div class="single-header style-2">
                        <h1 class="mb-30">{{$post->name}}</h1>
                        <div class="single-header-meta">
                            <div class="entry-meta meta-1 font-xs mt-15 mb-15">
                                @if($post->user)
                                <span class="post-by">By 
                                    <a href="#">{{$post->user->name}}</a>
                                </span>
                                @endif
                                <span class="post-on has-dot">{{$post->created_at->format('d F, Y')}}</span>
                                <span class="time-reading has-dot">8 mins read</span>
                                <span class="hit-count  has-dot">{{$post->view}} Views</span>
                            </div>
                            <div class="social-icons single-share">
                                <ul class="text-grey-5 d-inline-block">
                                    <li><strong class="mr-10">Share this:</strong></li>
                                    <li class="social-facebook"><a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a></li>
                                    <li class="social-twitter"> <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a></li>
                                    <li class="social-instagram"><a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a></li>
                                    <li class="social-linkedin"><a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <figure class="single-thumbnail">
                        <img src="{{asset($post->image())}}" alt="{{$post->name}}">
                    </figure>
                    <div class="single-content">
                        {!!$post->description!!}
                    </div>
                    <div class="entry-bottom mt-50 mb-30 wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
                        <div class="tags w-50 w-sm-100">
                           
                        </div>
                        <div class="social-icons single-share">
                            <ul class="text-grey-5 d-inline-block">
                                <li><strong class="mr-10">Share this:</strong></li>
                                <li class="social-facebook"><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li class="social-twitter"> <a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li class="social-instagram"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li class="social-linkedin"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 primary-sidebar sticky-sidebar">
                @include(welcomeTheme().'blogs.includes.sideBar')
            </div>
        </div>
    </div>
</section>

@endsection @push('js') @endpush