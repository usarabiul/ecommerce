@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Sliders List')}}</title>
@endsection @push('css')
<style type="text/css"></style>
@endpush @section('contents')

<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Sliders List</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Sliders List</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a class="btn btn-success" href="{{route('admin.slidersAction','create')}}">Add Slider</a>
            <a href="{{route('admin.sliders')}}" class="btn btn-primary"><i class="bx bx-refresh"></i></a>
        </div>
    </div>
</div>
<!--end breadcrumb-->


@include(adminTheme().'alerts')
<div class="card">
    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
        <h4 class="card-title">Sliders List</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="table-responsive" style="min-height:300px;">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th style="min-width: 50px;width:50px;">SL</th>
                            <th style="min-width: 300px;">Slider Name</th>
                            <th style="max-width: 100px;width:100px;">Slide Item</th>
                            <th style="max-width: 80px;width:80px;">Image</th>
                            <th style="min-width: 60px;width: 60px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $i=>$slider)
                        <tr>
                            <td>
                                {{$i+1}}
                            </td>
                            <td>
                                <span>{{$slider->name}} 
                                @if($slider->location)
                                <span style="color:#ccc;">({{$slider->location}})</span>
                                @endif
                                </span>
                                <br />
                                @if($slider->status=='active')
                                <span class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">Active </span>
                                @elseif($slider->status=='inactive')
                                <span class="badge rounded-pill text-warning bg-light-danger p-2 text-uppercase px-3">Inactive </span>
                                @else
                                <span class="badge rounded-pill text-warning bg-light-danger p-2 text-uppercase px-3">Draft </span>
                                @endif
                                @if($slider->featured==true)
                                <span><i class="fa fa-star" style="color: #1ab394;"></i></span>
                                @endif
                                <span style="color:#ccc;">
                                    <i class="fa fa-user" style="color: #1ab394;"></i>
                                    {{$slider->user?$slider->user->name:'No Author'}}
                                </span>
                            </td>
                            <td>{{$slider->sliderItems->count()}} Items</td>
                            <td style="padding: 5px; text-align: center;">
                                <img src="{{asset($slider->image())}}" style="max-width: 80px; max-height: 50px;" />
                            </td>
                            <td style="text-align:center;">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.slidersAction',['edit',$slider->id])}}"><i class="fa fa-edit"></i> Edit </a>
                                        <a class="dropdown-item" href="{{route('admin.slidersAction',['delete',$slider->id])}}" onclick="return confirm('Are You Want To Delete')" ><i class="fa fa-trash"></i> Delete </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @if($sliders->count()==0)
                            <tr>
                                <td colspan="5" class="text-center">No Result Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{$sliders->links('pagination')}}
            </div>
        </div>
    </div>
</div>

@endsection @push('js') @endpush
