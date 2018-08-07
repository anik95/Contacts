@extends('layouts.app')

@section('content')

    <h1>Contacts</h1>
    @if(count($var1))
    
<table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col"><a href="{{action('ContactsController@index', $value)}}">Name</a></th>
            <th scope="col"><a href="{{action('ContactsController@index', $value)}}">Type</a></th>
            <th scope="col"><a href="{{action('ContactsController@index', $value)}}">Created At</a></th>
            <th scope="col"><a href="{{action('ContactsController@index', $value)}}">Updated At</a></th>
          </tr>
        </thead>
        <tbody>
        @foreach($var1 as $v1)
          <tr>
            <td>{{$num++}}</td>
            <td><a href="{{action('ContactsController@show',[$v1->id])}}">{{$v1->name}}</a></td>
            <td>{{$v1->type}}</td>
            <td>{{$v1->created_at}}</td>
            <td>{{$v1->updated_at}}</td>
            <td>                <div class="btn-group pull-right ">
                    
                        <a href="{{action('ContactsController@edit', [$v1->id])}}" class="btn btn-default">Edit</a>
                        {!!Form::open(['action'=>['ContactsController@destroy', $v1->id], 'method' =>'POST', 'class'=>'pull-right' ])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                        {!!Form::close()!!}
                        
                    
                </div></td>
          </tr>
          @endforeach
        </tbody>
      </table>


    @endif
    <a href="{{action('ContactsController@create')}}" class="btn btn-primary">Create</a>
            
@endsection

{{-- <a href="contacts/{{$v1->id}}"><h2>{{$v1->name}}</h2></a> --}}


{{-- <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
          </tr>
        </thead>
        <tbody>
        @foreach($var as $v1)
          <tr>
            <th scope="row">1</th>
            <td><a href="{{action('ContactsController@show', [$v1->id])}}"><h2>{{$v1->name}}</h2></a></td>
            <td>{{$v1->type}}</td>
            <td>{{$v1->created_at}}</td>
            <td>{{$v1->updateded_at}}</td>
            <td>                <div class="btn-group pull-right ">
                    
                        <a href="{{action('ContactsController@edit', [$v1->id])}}" class="btn btn-default">Edit</a>
                        {!!Form::open(['action'=>['ContactsController@destroy', $v1->id], 'method' =>'POST', 'class'=>'pull-right' ])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                        {!!Form::close()!!}
                        <br>
                    
                </div></td>
          </tr>
          @endforeach
        </tbody>
      </table> --}}


{{-- 
      @foreach($var1 as $v1)
      <div class="well">
          <a href="{{action('ContactsController@show', [$v1->id])}}"><h2>{{$v1->name}}</h2></a>
          <small>{{$v1->type}}</small>
          {{-- @foreach($v1->address as $address)
              {{$address->address}}
          @endforeach --}}
{{--           
          <div class="btn-group pull-right ">
              
                  <a href="{{action('ContactsController@edit', [$v1->id])}}" class="btn btn-default">Edit</a>
                  {!!Form::open(['action'=>['ContactsController@destroy', $v1->id], 'method' =>'POST', 'class'=>'pull-right' ])!!}
                      {{Form::hidden('_method', 'DELETE')}}
                      {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                  {!!Form::close()!!}
                  <br>
              
          </div>
          
      </div>

  @endforeach
   --}}
