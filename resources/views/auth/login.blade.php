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
<br>
<div class="authSection">
	<div class="lostpassheader">
		<h3>My Account</h3>
		<p>Log-In</p>
	</div>
	<div class="container">
	    <div class="row">
	        <div class="col-md-3"></div>
	        <div class="col-md-6">
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
</div>
<br>
@endsection @push('js') @endpush