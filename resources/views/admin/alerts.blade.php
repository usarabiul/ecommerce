
@if(Session::has('success'))
<div class="alert alert-success border-0 bg-success alert-dismissible fade show">
    <div class="text-white"><strong>Success! </strong> {{Session::get('success') }}.</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if(session('error'))
<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
    <div class="text-white"><strong>Oops! </strong> {{Session::get('error') }}.</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('info'))
<div class="alert alert-info border-0 bg-info alert-dismissible fade show">
    <div class="text-white"><strong>Info! </strong> {{Session::get('info') }}.</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('errors'))
<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
    <div class="text-white"><strong>Oops! </strong> Need to Validation.</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif