<ul>
  @foreach($subcategories as $subctg)
  <li>
    <div class="custom-control custom-checkbox">
       <input type="checkbox" class="custom-control-input" value="{{$subctg->id}}" id="category_{{$subctg->id}}" name="categoryid[]" @foreach($service->serviceCtgs as $postctg) {{$postctg->reff_id==$subctg->id?'checked':''}}  @endforeach  />
       <label class="custom-control-label" for="category_{{$subctg->id}}">{{$subctg->name}}</label>
    </div>
  </li>
  @if($subctg->subCtgs->count() >0)
  @include('admin.services.includes.servicesEditSubctg',['subcategories' => $subctg->subCtgs,'i'=>$i+1])
  @endif
  @endforeach
</ul>