@extends('layouts.app')

@section('content')
    <h1>Contacts</h1>
    @if(count($var1))
        @foreach($var1 as $v1)
            <div class="well">
            <a href="{{action('ContactsController@show', [$v1->id])}}"><h2>{{$v1->name}}</h2></a>
                <h3>{{$v1->type}}</h3>
                {{-- @foreach($v1->address as $address)
                    {{$address->address}}
                @endforeach --}}
            </div>

        @endforeach
            

    @endif
            
@endsection

{{-- <a href="contacts/{{$v1->id}}"><h2>{{$v1->name}}</h2></a> --}}