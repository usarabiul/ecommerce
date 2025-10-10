<div class="card card-expansion-item mt-0 mb-2">
    <div class="card-header border-0" id="productList">
        <button
            class="btn btn-reset collapsed"
            data-toggle="collapse"
            data-target="#collapseProductList"
            aria-expanded="false"
            aria-controls="collapseProductList"
        >
            <span class="collapse-indicator mr-2"><i class="fa fa-fw fa-caret-right"></i></span>
            <span>Service Categories</span>
        </button>
    </div>
    <div id="collapseProductList" class="collapse" aria-labelledby="productList" data-parent="#accordion">
        <div class="card-body pt-0">
            <form action="{{route('admin.menusItemsPost',$menu->id)}}" method="post">
                @csrf
                <input type="hidden" name="parent" value="{{$parent->id}}" />
                <div class="form-group" style="margin-bottom: 5px;">
                    <label for="name">Select Categories</label>
                    <select data-placeholder="Select Categories..." name="productCategories[]" class="select2 form-control" multiple="multiple" required="">
                        @foreach($productCategories as $i=>$productCtg)
                        <option value="{{$productCtg->id}}">{{$productCtg->name}}</option>
                        
                        @if($productCtg->subctgs->count() >0) @include(adminTheme().'menus.includes.serviceCategorySubList',['subcategories' => $productCtg->subctgs,'i'=>1]) @endif
                        
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-block btn-primary" onclick="return confirm('Are You Want To Add?')"><i class="fa fa-plus"></i> Add</button>
            </form>
        </div>
    </div>
</div>