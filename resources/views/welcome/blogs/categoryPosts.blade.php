@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle($category->seo_title?:$category->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle($category->seo_title?:$category->name)}}" />
<meta name="description" property="og:description" content="{!!$category->seo_description?:general()->meta_description!!}" />
<meta name="keywords" content="{{$category->seo_keyword?:general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset($category->image())}}" />
<meta name="url" property="og:url" content="{{route('blogCategory',$category->slug?:'no-title')}}" />
<link rel="canonical" href="{{route('blogCategory',$category->slug?:'no-title')}}">
@endsection @push('css')
<style>

</style>
@endpush 
@section('contents')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{route('index')}}" rel="nofollow">Home </a>
            <span></span>
            @if($pg =pageTemplate('Latest Blog'))
            <a href="{{route('pageView',$pg->slug?:'no-title')}}" rel="nofollow">Blog </a>
            <span></span>
            @endif
            {{$category->name}}
        </div>
    </div>
</div>

<section class="mt-50 mb-50">
    <div class="container custom">
        <div class="row">
            <div class="col-lg-9">
                <div class="loop-grid loop-list pr-30">
                    @foreach($posts as $post)
                        @include(welcomeTheme().'blogs.includes.blogGrid')
                    @endforeach
                </div>
                <!--post-grid-->
                {{$posts->links(welcomeTheme().'blogs.pagination')}}
            </div>
            <div class="col-lg-3 primary-sidebar sticky-sidebar">
                @include(welcomeTheme().'blogs.includes.sideBar')
            </div>
        </div>
    </div>
</section>


@endsection @push('js') @endpush