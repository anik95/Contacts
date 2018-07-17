@extends('layouts.app')

@section('content')

    <div class="well">
        @if(count($x))
        
            <h2>Contact Name: {{$y->name}}</h2>
            @foreach($x as $v)
                <div class="well">
                    <h2>{{$v->address_type}}</h2>
                    <h2>{{$v->address}}</h2>
                    
                </div>
            @endforeach
            <div class="btn-group">
                <a href="{{action('ContactsController@edit', [$y->id])}}" class="btn btn-default">Edit</a>
                {!!Form::open(['action'=>['ContactsController@destroy', $y->id], 'method' =>'POST', 'class'=>'pull-right' ])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                {!!Form::close()!!}
            </div>
        
        @endif
    </div>
    
@endsection
