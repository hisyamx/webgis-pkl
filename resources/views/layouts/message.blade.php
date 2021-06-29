@if(count($errors) >= 1 )
<div class="alert alert-danger mt-3 mb-3" role="alert">
    @foreach($errors->all() AS $error)
    <ul>
        <li>{{$error}}</li>
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    @endforeach
</div>
@endif


@if(session('success'))

<div class="alert alert-success mt-3 mb-3" role="alert">
    {{ session('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>

@endif

@if(session('error'))

<div class="alert alert-danger mt-3 mb-3" role="alert">
    {{ session('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>

@endif
