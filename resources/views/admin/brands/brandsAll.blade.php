@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Brands List')}}</title>
@endsection @push('css')
<style type="text/css"></style>
@endpush @section('contents')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Brands List</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Brands List</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a class="btn btn-success" href="{{route('admin.brandsAction','create')}}">Add Brand</a>
            <a href="{{route('admin.brands')}}" class="btn btn-primary"><i class="bx bx-refresh"></i></a>
        </div>
    </div>
</div>
<!--end breadcrumb-->


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
                            <button type="submit" class="btn btn-success btn-sm rounded-0">Search</button>
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
                            <button class="btn btn-sm btn-primary rounded-0" onclick="return confirm('Are You Want To Action?')">Action</button>
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
                                    <label>
                                        <input type="checkbox" class="form-check-input" id="checkall" > All <span class="checkCounter"></span> 
                                    </label>
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
                                    <input class="form-check-input" type="checkbox" name="checkid[]" value="{{$brand->id}}" />
                                    <br>
                                    <b>SL:</b> 
                                    {{$brands->currentpage()==1?$i+1:$i+($brands->perpage()*($brands->currentpage() - 1))+1}}
                                </td>
                                <td>
                                    <span>{{$brand->name}}</span><br />

                                    @if($brand->status=='active')
                                    <span class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">Active </span>
                                    @elseif($brand->status=='inactive')
                                    <span class="badge rounded-pill text-warning bg-light-danger p-2 text-uppercase px-3">Inactive </span>
                                    @else
                                    <span class="badge rounded-pill text-warning bg-light-danger p-2 text-uppercase px-3">Draft </span>
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
                                        <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('admin.brandsAction',['edit',$brand->id])}}"><i class="fa fa-edit"></i> Edit </a>
                                            <a class="dropdown-item" href="{{route('admin.brandsAction',['delete',$brand->id])}}" onclick="return confirm('Are You Want To Delete')" ><i class="fa fa-trash"></i> Delete </a>
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
