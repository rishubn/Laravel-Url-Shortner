@extends('app')

@section('content')







<div class="container">
    <div class="row clearfix">
        <div class="col-md-6 col-md-offset-3">
            <h2 style="text-align:center;"> URL Shortener </h2>
 
            {!! Form::open(array('url' => '/home', 'route' => 'urls.store')) !!}
 
                <div class="form-group">
                {!!
                    Form::text('url', Input::old('url'),array('class' => 'form-control', 'placeholder' => 'Insert your Url and Press Enter', 'required' => 'required'))
               !!}
                </div>
 
            {!! Form::close() !!}


        </div>
    </div>
</div>





<br>
<br>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Url</td>
            <td>ShortCode</td>
            <td>Click Count</td>
            <td>Date Created</td>
            <td>Delete Entry</td>
        </tr>
    </thead>
    <tbody>

    @foreach($urls as $key => $value)
        <tr>
            <td>{{ $value->url }}</td>
            <td>{{ $value->hash }}</td>
            <td>{{ $value->counter }}</td>
            <td>{{ $value->created_at }}</td>
            <td>{!! Form::open(array('route' => array('urls.destroy', $value->id), 'method' => 'delete')) !!} 
                {!! Form::submit('Delete') !!}
           {!! Form::close() !!}
           </tr> 



@endforeach





@endsection
