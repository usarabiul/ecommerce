@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle(ucfirst($type).' Setting')}}</title>
@endsection 
@push('css')
<style type="text/css"></style>
@endpush 
@section('contents')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ucfirst($type)}} Setting</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ucfirst($type)}} Setting</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('admin.setting',$type)}}" class="btn btn-primary"><i class="bx bx-refresh"></i></a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->


    @include(adminTheme().'alerts')
    <form action="{{route('admin.settingUpdate',$type)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                        <h4 class="card-title">General Info</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Website Title </label>
                                    <input type="text" name="title" value="{{ $general->title }}" placeholder="Website Title" class="form-control {{$errors->has('title')?'error':''}}" />
                                    @if ($errors->has('title'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Website Subtitle</label>
                                    <input type="text" name="subtitle" value="{{ $general->subtitle }}" placeholder="Website subtitle" class="form-control {{$errors->has('subtitle')?'error':''}}" />
                                    @if ($errors->has('subtitle'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('subtitle') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="text" name="mobile" value="{{ $general->mobile }}" placeholder="Website mobile" class="form-control {{$errors->has('mobile')?'error':''}}" />
                                    @if ($errors->has('mobile'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('mobile') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="text" name="email" value="{{ $general->email }}" placeholder="Website email" class="form-control {{$errors->has('email')?'error':''}}" />
                                    @if ($errors->has('email'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Address line 1</label>
                                    <textarea name="address_one" placeholder="Address Line 1" class="form-control  {{$errors->has('address_one')?'error':''}}">{{ $general->address_one}}</textarea>
                                    @if ($errors->has('address_one'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('address_one') }}</p>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Address line 2</label>
                                    <textarea name="address_two" placeholder="Address Line 1" class="form-control {{$errors->has('address_two')?'error':''}}">{{ $general->address_two}}</textarea>
                                    @if ($errors->has('address_two'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('address_two') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Favicon</label>
                                    <input type="file" name="favicon" class="form-control {{$errors->has('favicon')?'error':''}}" />
                                    @if ($errors->has('favicon'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('favicon') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <img src="{{asset($general->favicon())}}" style="max-width: 60px;" />
                                    @if($general->favicon)
                                    <a href="{{route('admin.setting','favicon')}}" style="color: red;" onclick="return confirm('Are You Want To Delete?')"><i class="fa fa-trash"></i></a>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Logo</label>
                                    <input type="file" name="logo" class="form-control {{$errors->has('logo')?'error':''}}" />
                                    @if ($errors->has('logo'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('logo') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <img src="{{asset($general->logo())}}" style="max-width: 150px;" />
                                    @if($general->logo)
                                    <a href="{{route('admin.setting','logo')}}" style="color: red;" onclick="return confirm('Are You Want To Delete?')"><i class="fa fa-trash"></i></a>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Website Url</label>
                                    <input type="text" name="website" value="{{ $general->website }}" placeholder="Website website" class="form-control {{$errors->has('website')?'error':''}}" />
                                    @if ($errors->has('website'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('website') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
                                    <label class="form-label">Footer Text</label>
                                    <input type="text" name="footer_text" value="{{ $general->copyright_text }}" placeholder="Website Footer Text" class="form-control {{$errors->has('footer_text')?'error':''}}" />
                                    @if ($errors->has('footer_text'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('footer_text') }}</p>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary px-4">Save changes</button>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                        <h4 class="card-title">SEO Optimize</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Meta Author</label>
                                    <input type="text" name="meta_author" value="{{ $general->meta_author }}" placeholder="Meta Author" class="form-control {{$errors->has('meta_author')?'error':''}}" />
                                    @if ($errors->has('meta_author'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('meta_author') }}</p>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Meta title <small>(Max: 60 L)</small></label>
                                    <input type="text" name="meta_title" value="{{ $general->meta_title }}" placeholder="Meta title" class="form-control {{$errors->has('meta_title')?'error':''}}" />
                                    @if ($errors->has('meta_title'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('meta_title') }}</p>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Meta keyword </label>
                                    <textarea name="meta_keyword" placeholder="Meta keyword" class="form-control  {{$errors->has('meta_keyword')?'error':''}}">{{ $general->meta_keyword}}</textarea>
                                    @if ($errors->has('meta_keyword'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('meta_keyword') }}</p>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Meta Description <small>(Max: 160 L)</small></label>
                                    <textarea name="meta_description" placeholder="Meta Description" class="form-control  {{$errors->has('meta_description')?'error':''}}">{{ $general->meta_description}}</textarea>
                                    @if ($errors->has('meta_description'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('meta_description') }}</p>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Script tag Head</label>
                                    <textarea name="script_head" placeholder="Script tag Head" class="form-control  {{$errors->has('script_head')?'error':''}}">{{ $general->script_head}}</textarea>
                                    @if ($errors->has('script_head'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('script_head') }}</p>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Script tag Body</label>
                                    <textarea name="script_body" placeholder="Script tag Body" class="form-control  {{$errors->has('script_body')?'error':''}}">{{ $general->script_body}}</textarea>
                                    @if ($errors->has('script_body'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('script_body') }}</p>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Style CSS</label>
                                    <textarea name="custom_css" placeholder="Custom Css write here..." class="form-control  {{$errors->has('custom_css')?'error':''}}">{{ $general->custom_css}}</textarea>
                                    @if ($errors->has('custom_css'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('custom_css') }}</p>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                    <label class="form-label">Script js</label>
                                    <textarea name="custom_js" placeholder="Custom Script js write here..." class="form-control  {{$errors->has('custom_js')?'error':''}}">{{ $general->custom_js}}</textarea>
                                    @if ($errors->has('custom_js'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('custom_js') }}</p>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary px-4">Save changes</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>

@endsection @push('js') @endpush
