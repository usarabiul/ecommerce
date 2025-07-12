@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle('My Profile')}}</title>
@endsection @push('css')

<style type="text/css">
    .ProfileImage {
        max-width: 64px;
        max-height: 64px;
    }
</style>
@endpush @section('contents')








<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">My Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    @include(adminTheme().'alerts')
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                    <h4 class="card-title">My Profile</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{route('admin.myProfile')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="profile" name="actionType">
                            <div class="media d-flex">
                                <a href="javascript: void(0);">
                                    <img src="{{asset($user->image())}}" class="ProfileImage rounded mr-75" alt="profile image" />
                                </a>
                                <div class="media-body mt-2">
                                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                        <label class="btn btn-sm btn-primary mx-2" for="account-upload">Upload new photo </label>
                                        <input type="file" name="image" id="account-upload" hidden="" />
                                        @if($user->imageFile)
                                        <a href="{{route('admin.mediesDelete',$user->imageFile->id)}}" class="mediaDelete btn btn-sm btn-secondary mx-2">Reset </a>
                                        @endif
                                    </div>
                                    @if ($errors->has('image'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('image') }}</p>
                                    @endif
                                    <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max size of 2048kB</small></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Name* </label>
                                    <input type="text" class="form-control {{$errors->has('name')?'error':''}}" name="name" placeholder="Enter Name" value="{{$user->name?:old('name')}}" required="" />
                                    @if ($errors->has('name'))
                                    <div style="color: red;">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Email* </label>
                                    <input type="email" class="form-control {{$errors->has('email')?'error':''}}" name="email" placeholder="Enter Email" value="{{$user->email?:old('email')}}" required="" />
                                    @if ($errors->has('email'))
                                    <div style="color: red;">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Mobile* </label>
                                    <input type="text" class="form-control {{$errors->has('mobile')?'error':''}}" name="mobile" placeholder="Enter Mobile" value="{{$user->mobile?:old('mobile')}}" />
                                    @if ($errors->has('mobile'))
                                    <div style="color: red;">{{ $errors->first('mobile') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Gender </label>
                                    <select class="form-control {{$errors->has('gender')?'error':''}}" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="Male" {{$user->gender=='Male'?'selected':''}}>Male</option>
                                        <option value="Female" {{$user->gender=='Female'?'selected':''}}>Female</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                    <div style="color: red;">{{ $errors->first('gender') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Division </label>
                                    <select id="division" class="form-control {{$errors->has('division')?'error':''}}" name="division">
                                        <option value="">Select Division</option>
                                        @foreach(App\Models\Country::where('type',2)->where('parent_id',1)->get() as $data)
                                        <option value="{{$data->id}}" {{$data->id==$user->division?'selected':''}}>{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('division'))
                                    <div style="color: red;">{{ $errors->first('division') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">District </label>
                                    <select id="district" class="form-control {{$errors->has('district')?'error':''}}" name="district">
                                        @if($user->division==null)
                                        <option value="">No District</option>
                                        @else
                                        <option value="">Select District</option>
                                        @foreach(App\Models\Country::where('type',3)->where('parent_id',$user->division)->get() as $data)
                                        <option value="{{$data->id}}" {{$data->id==$user->district?'selected':''}}>{{$data->name}}</option>
                                        @endforeach @endif
                                    </select>
                                    @if ($errors->has('district'))
                                    <div style="color: red;">{{ $errors->first('district') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">City </label>
                                    <select id="city" class="form-control {{$errors->has('city')?'error':''}}" name="city">
                                        @if($user->district==null)
                                        <option value="">No City</option>
                                        @else
                                        <option value="">Select City</option>
                                        @foreach(App\Models\Country::where('type',4)->where('parent_id',$user->district)->get() as $data)
                                        <option value="{{$data->id}}" {{$data->id==$user->city?'selected':''}}>{{$data->name}}</option>
                                        @endforeach @endif
                                    </select>
                                    @if ($errors->has('city'))
                                    <div style="color: red;">{{ $errors->first('city') }}</div>
                                    @endif
                                </div>
                                
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Postal Code</label>
                                    <input type="text" class="form-control {{$errors->has('postal_code')?'error':''}}" name="postal_code" placeholder="Enter Postal Code" value="{{$user->postal_code?:old('postal_code')}}" />
                                    @if ($errors->has('postal_code'))
                                    <div style="color: red;">{{ $errors->first('postal_code') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
                                    <label class="form-label">Address Line</label>
                                    <input type="text" class="form-control {{$errors->has('address')?'error':''}}" name="address" placeholder="Enter Address" value="{{$user->address_line1?:old('address')}}" />
                                    @if ($errors->has('address'))
                                    <div style="color: red;">{{ $errors->first('address') }}</div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                    <h4 class="card-title">Change Password</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{route('admin.myProfile')}}" method="post">
                            @csrf
                            <input type="hidden" value="change-password" name="actionType">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
                                    <label class="form-label">Old password </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control password" placeholder="Old Password" name="old_password" value="{{old('old_password')}}" required="" />
                                        <div class="input-group-text showPassword">
                                            <i class="bx bx-hide"></i>
                                        </div>
                                    </div>
                                    @if ($errors->has('old_password'))
                                    <div style="color: red;">{{ $errors->first('old_password') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
                                    <label class="form-label">New Password </label>
                                    <input type="password" class="form-control password {{$errors->has('password')?'error':''}}" name="password" placeholder="New password" required="" />
                                    @if ($errors->has('password'))
                                    <div style="color: red;">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
                                    <label class="form-label">Confirmed Password </label>
                                    <input type="password" class="form-control password {{$errors->has('password_confirmation')?'error':''}}" name="password_confirmation" placeholder="Confirmed password" required="" />
                                    @if ($errors->has('password_confirmation'))
                                    <div style="color: red;">{{ $errors->first('password_confirmation') }}</div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-danger">Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection @push('js') @endpush
