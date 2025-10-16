@extends(welcomeTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle('Login')}}</title>
@endsection 
@section('SEO')
<meta name="description" content="{!!general()->meta_description!!}" />
<meta name="keywords" content="{{general()->meta_keyword}}" />
<meta property="og:title" content="{{websiteTitle('Login')}}" />
<meta property="og:description" content="{!!general()->meta_description!!}" />
<meta property="og:image" content="{!!general()->meta_description!!}" />
<meta property="og:url" content="{{route('login')}}" />
<link rel="canonical" href="{{route('login')}}">
@endsection 
@push('css')
<style>
    .lostpassheader{
        text-align:center;   
    }
    .login-part {
        border: 1px solid #d5d5d5;
        padding: 25px;
        border-radius: 10px;
    }
</style>
@endpush 
@section('contents')

<section class="pt-100 pb-100">
	<div class="container">
	    <div class="row">
	        <div class="col-md-3"></div>
	        <div class="col-md-6">
				<div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
					<div class="padding_eight_all bg-white">
						<div class="heading_s1">
							<h3 class="mb-30">Login</h3>
						</div>
						@include(welcomeTheme().'alerts')
						<form action="{{route('login')}}" method="post">
							@csrf
							<div class="form-group">
								<input type="text" required="" value="{{old('username')}}" name="username" placeholder="Your Email / Mobile">
							</div>
							<div class="form-group">
								<input required="" type="password" name="password" placeholder="Password">
							</div>
							<div class="login_footer form-group">
								<div class="chek-form">
									<div class="custome-checkbox">
										<input class="form-check-input" type="checkbox" name="remember" id="exampleCheckbox1" value="">
										<label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
									</div>
								</div>
								<a class="text-muted" href="{{route('forgotPassword')}}">Forgot password?</a>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Log in</button>
							</div>
						</form>
					</div>
				</div>
	        </div>
	        <div class="col-md-3"></div>
	    </div>

	</div>
</section>

@endsection @push('js') @endpush