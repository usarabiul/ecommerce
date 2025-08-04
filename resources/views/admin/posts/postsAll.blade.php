@extends(adminTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle('Posts List')}}</title>
@endsection 

@push('css')
<style type="text/css"></style>
@endpush 

@section('contents')

<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Posts List</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" >Posts List</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a class="btn btn-outline-primary" href="{{route('admin.postsAction','create')}}">Add Post</a>
                <a href="{{route('admin.posts')}}" class="btn btn-primary"><i class="bx bx-refresh"></i></a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

@include(adminTheme().'alerts')

<div class="card">
    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
        <h4 class="card-title">Posts List</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form action="{{route('admin.posts')}}">
                <div class="row">
                    <div class="col-md-6 mb-1">
                        <div class="input-group">
                            <input type="date" name="startDate" value="{{request()->startDate?Carbon\Carbon::parse(request()->startDate)->format('Y-m-d') :''}}" class="form-control {{$errors->has('startDate')?'error':''}}" />
                            <input type="date" value="{{request()->endDate?Carbon\Carbon::parse(request()->endDate)->format('Y-m-d') :''}}" name="endDate" class="form-control {{$errors->has('endDate')?'error':''}}" />
                        </div>
                    </div>
                    <div class="col-md-6 mb-1">
                        <div class="input-group">
                            <input type="text" name="search" value="{{request()->search?request()->search:''}}" placeholder="Post Name, Category Name" class="form-control {{$errors->has('search')?'error':''}}" />
                            <button type="submit" class="btn btn-success btn-sm rounded-0">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form action="{{route('admin.posts')}}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-1">
                            <select class="form-control form-control-sm rounded-0" name="action" required="">
                                <option value="">Select Action</option>
                                <option value="1">Active</option>
                                <option value="2">InActive</option>
                                <option value="3">Feature</option>
                                <option value="4">Un-feature</option>
                                <option value="5">Delete</option>
                            </select>
                            <button class="btn btn-sm btn-primary rounded-0" onclick="return confirm('Are You Want To Action?')">Action</button>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <ul class="statuslist">
                            <li><a href="{{route('admin.posts')}}">All ({{$totals->total}})</a></li>
                            <li><a href="{{route('admin.posts',['status'=>'active'])}}">Active ({{$totals->active}})</a></li>
                            <li><a href="{{route('admin.posts',['status'=>'inactive'])}}">Inactive ({{$totals->inactive}})</a></li>
                        </ul>
                    </div>
                </div>
                <div class="table-responsive" style="min-height:300px;">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th style="min-width: 60px;">
                                    <label style="cursor: pointer; margin-bottom: 0;"> <input class="checkbox" type="checkbox" class="form-control" id="checkall" /> All <span class="checkCounter"></span> </label>
                                </th>
                                <th style="min-width: 300px;">Post Name</th>
                                <th style="min-width: 80px;width:80px;">Image</th>
                                <th style="min-width: 200px;">Category</th>
                                <th style="min-width: 60px;width:60px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $i=>$post)
                            <tr>
                                <td>
                                    <input class="checkbox" type="checkbox" name="checkid[]" value="{{$post->id}}" /><br />
                                    {{$posts->currentpage()==1?$i+1:$i+($posts->perpage()*($posts->currentpage() - 1))+1}}
                                </td>
                                <td>
                                    <span><a href="{{route('blogView',$post->slug?:'no-title')}}" target="_blank">{{$post->name}}</a></span><br />

                                    <span><i class="fa fa-eye" style="color: #1ab394;"></i> 0</span>
                                    @if($post->status=='active')
                                    <span class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">Active </span>
                                    @elseif($post->status=='inactive')
                                    <span class="badge rounded-pill text-warning bg-light-danger p-2 text-uppercase px-3">Inactive </span>
                                    @else
                                    <span class="badge rounded-pill text-warning bg-light-danger p-2 text-uppercase px-3">Draft </span>
                                    @endif

                                    @if($post->featured==true)
                                    <span><i class="fa fa-star" style="color: #1ab394;"></i></span>
                                    @endif

                                    <span><i class="fa fa-calendar" style="color: #1ab394;"></i> {{$post->created_at->format('d-m-Y')}}</span>

                                    <span>
                                        <a href="{{route('admin.postsComments',$post->id)}}"><i class="fa fa-comment" style="color: #1ab394;"></i> ({{$post->postComments->where('status','<>','temp')->count()}})</a>
                                    </span>
                                </td>
                                <td style="padding: 5px;">
                                    <img src="{{asset($post->image())}}" style="max-width: 80px; max-height: 50px;" />
                                </td>
                                <td>
                                    @foreach($post->postCategories as $i=>$ctg) {{$i==0?'':'-'}} {{$ctg->name}} @endforeach
                                </td>
                                <td style="text-align:center;">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('admin.postsAction',['edit',$post->id])}}"><i class="fa fa-edit"></i> Edit </a>
                                            <a class="dropdown-item" href="{{route('admin.postsAction',['delete',$post->id])}}" onclick="return confirm('Are You Want To Delete')" ><i class="fa fa-trash"></i> Delete </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$posts->links('pagination')}}
                </div>
            </form>
        </div>
    </div>
</div>


@endsection 

@push('js')
<script type="text/javascript">
    
</script>
@endpush
