@extends(general()->adminTheme.'.layouts.app') @section('title')
<title>{{websiteTitle('Attributes List')}}</title>
@endsection @push('css')
<style type="text/css">
	.itemBtn {
		display: inline-block;
		padding: 5px 15px;
		background: #efeded;
		border-radius: 3px;
	}

</style>
@endpush @section('contents')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Attributes List</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                    <li class="breadcrumb-item active">Attributes List</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12 mb-md-0 mb-2">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <a class="btn btn-outline-primary" href="{{route('admin.productsAttributesAction','create')}}">Add Attribute</a>
            <a class="btn btn-outline-primary reloadPage1" href="{{route('admin.productsAttributes')}}">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>

@include('admin.alerts')

<div class="card">
    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
        <h4 class="card-title">Attributes List</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 250px;min-width: 250px;">Attributes</th>
                            <th style="min-width: 350px;">Items</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attributes as $i=>$attribute)
                        <tr>
                            <td>
                                <b>Name:</b> <span>{{$attribute->name}}</span>
                                @if($attribute->view==3)
                                <small style="color:#a3a3a3;">(Image)</small>
								@elseif($attribute->view==2)
                                <small style="color:#a3a3a3;">(Color)</small>
								@else
                                <small style="color:#a3a3a3;">(Text)</small>
								@endif
                                <br />
								@if($attribute->description)
								<p>{{$attribute->description}}</p>
								@endif
								<b>Status:</b>
                                @if($attribute->status=='active')
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                                @if($attribute->featured)
                                <span class="badge" style="background-color: #ff864a;"><i class="fa fa-star"></i></span>
                                @endif
                                <br>
                                <b>Date:</b> {{$attribute->created_at->format('d-m-Y')}}
								<br>
								<a href="{{route('admin.productsAttributesAction',['edit',$attribute->id])}}" class="btn btn-md btn-info"><i class="fa fa-edit"></i> Config</a>
								<a href="{{route('admin.productsAttributesAction',['delete',$attribute->id])}}"  onclick="return confirm('Are you want to delete?')" class="btn btn-md btn-danger"><i class="fa fa-trash"></i></a>

                            </td>
                            <td>
                               @foreach($attribute->subAttributes as $item)
								<span class="itemBtn">
									{{$item->name}}

									@if($attribute->view==2)
									<span style="background:{{$item->icon?:'#000'}};height: 12px;width: 30px;display: inline-block;"></span>
									@elseif($attribute->view==3)
									<img src="{{asset($item->image())}}" style="max-height: 25px;box-shadow: 0 0 4px 0px #bfbfbf;border-radius: 3px;">
									@endif 

								</span>
							   @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$attributes->links('pagination')}}
            </div>
        </div>
    </div>
</div>

@endsection @push('js') @endpush
