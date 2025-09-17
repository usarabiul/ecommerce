@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Brands List')}}</title>
@endsection @push('css')
<style type="text/css"></style>
@endpush @section('contents')

<header class="page-title-bar">
    <div class="d-md-flex align-items-md-start">
        <div class="mr-sm-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-1 p-0 mb-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" >Brands List</li>
                </ol>
            </nav>
        </div>
        <div class="btn-toolbar">
            <a href="{{route('admin.brandsAction','create')}}" type="button" class="btn btn-outline-success mr-2"><i class="fas fa-plus"></i> Add Brand</a>
            <a href="{{route('admin.brands')}}" type="button" class="btn btn-primary"><i class="fas fa-spinner"></i></a>
        </div>
    </div>
</header>


@include(adminTheme().'alerts')
<div class="card">
    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
        <h4 class="card-title">Brands List</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form action="{{route('admin.brands')}}">
                <div class="row">
                    <div class="col-md-12 mb-0">
                        <div class="input-group">
                            <input type="text" name="search" value="{{request()->search?request()->search:''}}" placeholder="Brand Name" class="form-control {{$errors->has('search')?'error':''}}" />
                            <button type="submit" class="btn btn-success rounded-0">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form action="{{route('admin.brands')}}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-1">
                            <select class="form-control form-control-sm rounded-0" name="action" required="">
                                <option value="">Select Action</option>
                                <option value="1">Active</option>
                                <option value="2">InActive</option>
                                <option value="3">Feature</option>
                                <option value="4">Un-Feature</option>
                                <option value="5">Delete</option>
                            </select>
                            <button class="btn btn-primary rounded-0" onclick="return confirm('Are You Want To Action?')">Action</button>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <ul class="statuslist">
                            <li><a href="{{route('admin.brands')}}">All ({{$totals->total}})</a></li>
                            <li><a href="{{route('admin.brands',['status'=>'active'])}}">Active ({{$totals->active}})</a></li>
                            <li><a href="{{route('admin.brands',['status'=>'inactive'])}}">Inactive ({{$totals->inactive}})</a></li>
                        </ul>
                    </div>
                </div>
                <div class="table-responsive" style="min-height:300px;">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th style="min-width: 100px;width:100px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox"  id="checkall" >  <label class="custom-control-label" for="checkall">All <span class="checkCounter"></span> </label>
                                    </div>
                                </th>
                                <th style="min-width: 300px;">Brand Name</th>
                                <th style="max-width: 80px;width:80px;">Image</th>
                                <th style="min-width: 60px;width:60px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $i=>$brand)
                            <tr>
                                <td>
                                    <div class="custom-control custom-control-inline custom-control-nolabel custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox" name="checkid[]" value="{{$brand->id}}" id="ckb1">  <label class="custom-control-label" for="ckb1">ID </label>
                                    </div>
                                    {{$brands->currentpage()==1?$i+1:$i+($brands->perpage()*($brands->currentpage() - 1))+1}}
                                </td>
                                <td>
                                    <span>{{$brand->name}}</span><br />

                                    @if($brand->status=='active')
                                    <span class="badge badge-success">Active </span>
                                    @elseif($brand->status=='inactive')
                                    <span class="badge badge-danger">Inactive </span>
                                    @else
                                    <span class="badge badge-danger">Draft </span>
                                    @endif
                                    
                                    @if($brand->featured==true)
                                    <span><i class="fa fa-star" style="color: #faca51;"></i></span>
                                    @endif
                                    <span style="color: #ccc;">
                                        <i class="fa fa-user" style="color: #1ab394;"></i>
                                        {{$brand->user?$brand->user->name:'No Author'}}
                                    </span>
                                    <span style="color: #ccc;"><i class="fa fa-calendar" style="color: #1ab394;"></i> {{$brand->created_at->format('d-m-Y')}}</span>
                                </td>
                                <td style="padding: 5px; text-align: center;">
                                    <img src="{{asset($brand->image())}}" style="max-width: 80px; max-height: 50px;" />
                                </td>
                                <td style="text-align:center;">

                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success btn-ico" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-arrow"></div>
                                            <a href="{{route('admin.brandsAction',['edit',$brand->id])}}" class="dropdown-item"><i class="fa fa-edit"></i> Edit </a>
                                            <a href="{{route('admin.brandsAction',['delete',$brand->id])}}" onclick="return confirm('Are You Want To Delete')" class="dropdown-item"><i class="fa fa-trash"></i> Delete </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @if($brands->count()==0)
                                <tr>
                                    <td colspan="5" class="text-center">No Result Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{$brands->links('pagination')}}
                </div>
            </form>
        </div>
    </div>
</div>


@endsection @push('js') @endpush
