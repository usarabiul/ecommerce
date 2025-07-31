@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Galleries List')}}</title>
@endsection @push('css')
<style type="text/css"></style>
@endpush @section('contents')


<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Galleries List</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Galleries List</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a class="btn btn-success" href="{{route('admin.galleriesAction','create')}}">Add Gallery</a>
            <a href="{{route('admin.galleries')}}" class="btn btn-primary"><i class="bx bx-refresh"></i></a>
        </div>
    </div>
</div>
<!--end breadcrumb-->


@include(adminTheme().'alerts')
<div class="card">
    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
        <h4 class="card-title">Galleries List</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th style="min-width: 60px;">S:L</th>
                            <th style="min-width: 300px;">Gallery Name</th>
                            <th style="max-width: 100px;">Items</th>
                            <th style="min-width: 200px;width:200px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($galleries as $i=>$gallery)
                        <tr>
                            <td>
                                {{$i+1}}
                            </td>
                            <td>
                                <span>{{$gallery->name}}</span><br />
                                @if($gallery->status=='active')
                                <span><i class="fa fa-check" style="color: #1ab394;"></i></span>
                                @else
                                <span><i class="fa fa-times" style="color: #ed5565;"></i></span>
                                @endif @if($gallery->fetured==true)
                                <span><i class="fa fa-star" style="color: #1ab394;"></i></span>
                                @endif
                                <span style="font-size: 10px;">
                                    <i class="fa fa-user" style="color: #1ab394;"></i>
                                    {{$gallery->user?$gallery->user->name:'No Author'}}
                                </span>
                            </td>
                            <td style="text-align: center;">
                                ({{$gallery->galleryImages->count()}}) Images
                            </td>
                            <td class="center">
                                <a href="{{route('admin.galleriesAction',['edit',$gallery->id])}}" class="btn btn-md btn-info">Config</a>

                                @isset(json_decode(Auth::user()->permission->permission, true)['galleries']['delete'])
                                <a href="{{route('admin.galleriesAction',['delete',$gallery->id])}}" class="btn btn-md btn-danger" onclick="return confirm('Are You Want To Delete?')"><i class="fa fa-trash"></i></a>
                                @endisset
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$galleries->links('pagination')}}
            </div>
        </div>
    </div>
</div>


@endsection @push('js') @endpush
