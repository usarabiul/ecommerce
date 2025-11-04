@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Search')}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle('Search')}}" />
        <meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
        <meta name="keywords" content="{{general()->meta_keyword}}" />
        <meta name="image" property="og:image" content="{{asset(general()->logo())}}" />
        <meta name="url" property="og:url" content="{{route('blogSearch')}}" />
        <link rel="canonical" href="{{route('blogSearch')}}">
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
            Search : {{request()->blog_search}}
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

@endsection 
@push('js') @endpush