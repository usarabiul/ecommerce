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
            <div class="table-responsive" style="min-height:300px;">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th style="min-width: 50px;width:50px;">S:L</th>
                            <th style="min-width: 300px;">Gallery Name</th>
                            <th style="max-width: 100px;text-align:center;">Items</th>
                            <th style="min-width: 60px;width:60px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($galleries as $i=>$gallery)
                        <tr>
                            <td>{{$galleries->currentpage()==1?$i+1:$i+($galleries->perpage()*($galleries->currentpage() - 1))+1}}</td>
                            <td>
                                <span>{{$gallery->name}}
                                    @if($gallery->location)
                                    <span style="color:#ccc;">({{$gallery->location}})</span>
                                    @endif
                                </span>
                                <br />
                                @if($gallery->status=='active')
                                <span class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">Active </span>
                                @elseif($gallery->status=='inactive')
                                <span class="badge rounded-pill text-warning bg-light-danger p-2 text-uppercase px-3">Inactive </span>
                                @else
                                <span class="badge rounded-pill text-warning bg-light-danger p-2 text-uppercase px-3">Draft </span>
                                @endif
                                <span style="color:#ccc;">
                                    <i class="fa fa-user" style="color: #1ab394;"></i>
                                    {{$gallery->user?$gallery->user->name:'No Author'}}
                                </span>
                            </td>
                            <td style="text-align: center;">
                                ({{$gallery->galleryImages->count()}}) items
                            </td>
                           
                            <td style="text-align:center;">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.galleriesAction',['edit',$gallery->id])}}"><i class="fa fa-edit"></i> Edit </a>
                                        <a class="dropdown-item" href="{{route('admin.galleriesAction',['delete',$gallery->id])}}" onclick="return confirm('Are You Want To Delete')" ><i class="fa fa-trash"></i> Delete </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @if($galleries->count()==0)
                            <tr>
                                <td colspan="5" class="text-center">No Result Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{$galleries->links('pagination')}}
            </div>
        </div>
    </div>
</div>


@endsection @push('js') @endpush
