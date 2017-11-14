@if(count($errors))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if(Session::has('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        <ul>
            <li>{{ Session::get('error') }}</li>
        </ul>
    </div>
@endif