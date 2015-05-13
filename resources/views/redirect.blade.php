@extends('app')

@section('content')







<div class="container">
    <div class="row clearfix">
        <div class="col-md-6 col-md-offset-3">
 
                Your Shortened URL:  {!! Request::root() . '/' . $hash !!}
                <br> Press back or Home to return
        </div>
    </div>
</div>










@endsection
