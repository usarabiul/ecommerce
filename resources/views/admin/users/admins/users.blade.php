@extends(adminTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle('Admin Users')}}</title>
@endsection @push('css')
<style type="text/css"></style>
@endpush @section('contents')

 <!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Admin Users</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Admin Users</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#AddUser">Add User</button>
            <a href="{{route('admin.usersAdmin')}}" class="btn btn-primary"><i class="bx bx-refresh"></i></a>
        </div>
    </div>
</div>
<!--end breadcrumb-->

@include(adminTheme().'alerts')

<div class="card">
    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
        <h4 class="card-title">Admin users List</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
        <form action="{{route('admin.usersAdmin')}}">
            <div class="row">
                <div class="col-md-4 mb-1">
                <select name="role" class="form-control {{$errors->has('role')?'error':''}}">
                    <option value="">Select Role</option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}" {{request()->role==$role->id?'selected':''}}>{{$role->name}}</option>
                    @endforeach
                </select>
                </div>
                <div class="col-md-8 mb-1">
                    <div class="input-group">
                        <input type="text" name="search" value="{{request()->search?request()->search:''}}" placeholder="User Name, Email, Mobile" class="form-control {{$errors->has('search')?'error':''}}" />
                        <button type="submit" class="btn btn-success btn-sm rounded-0">Search</button>
                    </div>
                </div>
            </div>
        </form>
        <hr>
        <form action="{{route('admin.usersAdmin')}}">
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group mb-1">
                        <select class="form-control form-control-sm rounded-0" name="action" required="">
                            <option value="">Select Action</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                            <option value="5">Remove</option>
                        </select>
                        <button class="btn btn-sm btn-primary rounded-0" onclick="return confirm('Are You Want To Action?')">Action</button>
                    </div>
                </div>
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">
                    <ul class="statuslist">
                        <li><a href="{{route('admin.usersAdmin')}}">All ({{$totals->total}})</a></li>
                        <li><a href="{{route('admin.usersAdmin',['status'=>'active'])}}">Active ({{$totals->active}})</a></li>
                        <li><a href="{{route('admin.usersAdmin',['status'=>'inactive'])}}">Inactive ({{$totals->inactive}})</a></li>
                    </ul>
                </div>
            </div>

            <div class="table-responsive" style="min-height:300px;">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th style="min-width: 100px; width: 100px;">
                            <label style="cursor: pointer; margin-bottom: 0;"> <input class="checkbox" type="checkbox" class="form-control" id="checkall" /> All <span class="checkCounter"></span> </label>
                            </th>
                            <th style="min-width: 80px;">Image</th>
                            <th style="min-width: 250px; width: 250px;">Name</th>
                            <th style="min-width: 150px;">Email</th>
                            <th style="min-width: 100px;">Role</th>
                            <th style="min-width: 80px;">Status</th>
                            <th style="min-width: 80px; width: 80px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $i=>$user)
                        <tr>
                            <td>
                                @if($user->id==Auth::id()) @else
                                <input class="checkbox" type="checkbox" name="checkid[]" value="{{$user->id}}" />
                                @endif
                                {{$users->currentpage()==1?$i+1:$i+($users->perpage()*($users->currentpage() - 1))+1}}
                            </td>
                            <td style="padding: 0 3px; text-align: center;">
                                <span>
                                    <img src="{{asset($user->image())}}" style="max-width: 60px; max-height: 50px;" />
                                </span>
                            </td>
                            <td>
                                <a href="{{route('admin.usersAdminAction',['edit',$user->id])}}" class="invoice-action-view mr-1">{{$user->name}} </a>
                            </td>
                            <td>{{$user->email}}</td>
                            <td> 
                                @if($user->permission)
                                <span class="badge badge-info">{{$user->permission->name}}</span>
                                @else
                                <span class="badge badge-danger">Un-athorize</span>
                                @endif
                            </td>

                            <td>
                                @if($user->status)
                                <span class="badge badge-success">Active </span>
                                @else
                                <span class="badge badge-danger">Inactive </span>
                                @endif
                            </td>
                            <td style="text-align:center;">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.usersAdminAction',['edit',$user->id])}}"><i class="fa fa-edit"></i> Edit </a>
                                        @if($user->id!=Auth::id())
                                        <a class="dropdown-item" href="{{route('admin.usersAdminAction',['delete',$user->id])}}" onclick="return confirm('Are You Want To Delete')" ><i class="fa fa-trash"></i> Delete </a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$users->links('pagination')}}
        </form>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade text-left" id="AddUser" tabindex="-1" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('admin.usersAdminAction','create')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">Add Admin User</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times; </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="controls">
                            <input type="text" class="form-control {{$errors->has('username')?'error':''}}" name="username" placeholder="Enter Email/Mobile" value="" required="" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection @push('js') @endpush
