@if(count($errors) > 0)
<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
</div>
@endif

@if(Session::has('message'))
<div class="alert {{Session::get('class')}}">
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
    {{Session::get('message')}}
</div>
@endif
