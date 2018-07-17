@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {!! Form::open(['action' => ['ContactsController@update', $contacts->id], 'method'=>'POST']) !!}
                    <h2>Edit Current Contact Info</h2> 
                    <br>   
                    <div class="form-group">
                        {{Form::label('name', 'Contact name')}}
                        {{Form::text('name', $contacts->name , ['class'=>'form-control', 'placeholder'=>'Contact Name'])}}
                    </div>

                    <div class="form-group">
                            {{Form::label('type', 'Contact Type')}}
                            {{Form::text('type', $contacts->type, ['class'=>'form-control', 'placeholder'=>'Contact Type'])}}
                    </div>
                    

                    <br> 

                    <h3>Billing Address</h3>
                    <br> 


                    <div class="form-group">
                            {{Form::label('billing_address', 'Address')}}
                            {{Form::text('billing_address', 'billing address', ['class'=>'form-control', 'placeholder'=>'Address'])}}
                    </div>

                    <h3>Shipping Address</h3>
                    <br> 

                    
                    <div class="form-group">
                            {{Form::label('shipping_address', 'Address')}}
                            {{Form::text('shipping_address', 'shipping address' , ['class'=>'form-control', 'placeholder'=>'Address'])}}
                    </div>

                    {{Form::hidden('_method','PUT')}}
                    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}
            </div>
    </div>
</div>
@endsection



{{-- @extends('layouts.app')

@section('content')

<div class="col-md-8 col-md-offset-2">
    <h1>Edit this to do</h1>
    
    {!! Form::open(['action' => ['TodoController@update', $todo->id], 'method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('to_do', 'to_do')}}
        {{Form::textarea('to_do', $todo->to_do, ['class'=>'form-control', 'placeholder'=>'To Do'])}}
    </div>

    
    {{Form::hidden('_method','PUT')}}
    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}


{!! Form::close() !!}
</div>

@stop --}}