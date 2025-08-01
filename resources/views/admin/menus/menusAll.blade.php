@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Menus List')}}</title>
@endsection @push('css')
<style type="text/css"></style>
@endpush @section('contents')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Menus List</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Menus List</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a class="btn btn-success" href="{{route('admin.menusAction','create')}}">Add Menu</a>
            <a href="{{route('admin.menus')}}" class="btn btn-primary"><i class="bx bx-refresh"></i></a>
        </div>
    </div>
</div>
<!--end breadcrumb-->


@include(adminTheme().'alerts')
<div class="card">
    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
        <h4 class="card-title">Menus List</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="min-width: 50px;width:50px;">S:L</th>
                            <th style="min-width: 300px;">Menu Name</th>
                            <th style="max-width: 150px;width:150px;">Location</th>
                            <th style="max-width: 100px;width:100px;">Items</th>
                            <th style="min-width: 60px;width: 60px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $i=>$menu)
                        <tr>
                            <td>
                                {{$i+1}}
                            </td>
                            <td>
                                <span>{{$menu->name}}</span><br />
                                @if($menu->status=='active')
                                <span class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">Active </span>
                                @elseif($menu->status=='inactive')
                                <span class="badge rounded-pill text-warning bg-light-danger p-2 text-uppercase px-3">Inactive </span>
                                @else
                                <span class="badge rounded-pill text-warning bg-light-danger p-2 text-uppercase px-3">Draft </span>
                                @endif
                                @if($menu->featured==true)
                                <span><i class="fa fa-star" style="color: #1ab394;"></i></span>
                                @endif
                                <span style="font-size: 10px;">
                                    <i class="fa fa-user" style="color: #1ab394;"></i>
                                    {{$menu->user?$menu->user->name:'No Author'}}
                                </span>
                            </td>
                            <td>
                                {{ucfirst($menu->location)}}
                            </td>
                            <td style="text-align: center;">
                                {{$menu->MenuItems->count()}} items
                            </td>
                            <td style="text-align:center;">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.menusAction',['edit',$menu->id])}}"><i class="fa fa-edit"></i> Edit </a>
                                        <a class="dropdown-item" href="{{route('admin.menusAction',['delete',$menu->id])}}" onclick="return confirm('Are You Want To Delete')" ><i class="fa fa-trash"></i> Delete </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @if($menus->count()==0)
                            <tr>
                                <td colspan="5" class="text-center">No Result Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{$menus->links('pagination')}}
            </div>
        </div>
    </div>
</div>

@endsection @push('js') @endpush
