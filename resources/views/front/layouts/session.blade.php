@if(Session::has('message'))

<div class="alert alert-success">

    {{Session::get('message')}}
    {{Session::forget('message')}}

</div>

@endif