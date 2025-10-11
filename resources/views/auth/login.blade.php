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

<section class="pt-150 pb-150">
	<div class="container">
	    <div class="row">
	        <div class="col-md-3"></div>
	        <div class="col-md-6">
				<div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
					<div class="padding_eight_all bg-white">
						<div class="heading_s1">
							<h3 class="mb-30">Login</h3>
						</div>
						<form method="post">
							<div class="form-group">
								<input type="text" required="" name="email" placeholder="Your Email">
							</div>
							<div class="form-group">
								<input required="" type="password" name="password" placeholder="Password">
							</div>
							<div class="login_footer form-group">
								<div class="chek-form">
									<div class="custome-checkbox">
										<input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
										<label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
									</div>
								</div>
								<a class="text-muted" href="#">Forgot password?</a>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Log in</button>
							</div>
						</form>
					</div>
				</div>
	            <div class="login-part">
            		<h4>LOGIN</h4>
            		<form class="form-horizontal form-simple" action="{{route('login')}}" method="post">
                        @csrf
                        <div>
                            @if($errors->has('username'))
                                <span style="color:red;display: block;">{{ $errors->first('username') }}</span>
                            @endif
                            @if($errors->has('password'))
                                <span style="color:red;display: block;">{{ $errors->first('password') }}</span>
                            @endif
                            @if (session('error'))
                            <span style="color:red;display: block;">{{ session('error') }}</span>
                            @endif
                        </div>
                        
            			<label for="email">Username or email address *</label>
            			<div class="form-group form-group-section">
            			    <input type="text" value="{{old('username')}}" name="username" class="form-control control-section" placeholder="Email Address" required="" />
            			</div>
            
            			<label for="password">Password *</label>
            			<div class="form-group form-group-section">
            				<div class="input-group">
								<input type="password" class="form-control control-section password" id="password" name="password" placeholder="Enter Password" required="" />
								<div class="input-group-append">
								<span class="input-group-text showPassword" style="cursor: pointer;"><i class="fa fa-eye-slash"></i></span>
								</div>
							</div>    
            			</div>
            			
                        {{--
            			<div class="media">
            				<input type="checkbox">
            				<div class="media-body">
            					<p>Remember Me</p>
            				</div>
            			</div>
            			--}}
            			
            			<div>
            				<button type="submit" class="btn btn-success submitbutton">LOG IN</button>
            			</div>
            		</form>
            		
                    <div class="row">
                        <div class="col-6">
                            <a href="{{route('forgotPassword')}}">Lost your password?</a>
                        </div>
                        <div class="col-6" style="text-align: end;">
                            <a href="{{route('register')}}">Not Any Account? <span>Sign-Up</span></a>
                        </div>
                    </div>
            		
        		</div>
	        </div>
	        <div class="col-md-3"></div>
	    </div>

	</div>
</section>

@endsection @push('js') @endpush