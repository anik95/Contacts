@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
                <div class="col-md-8 col-md-offset-2">
                <div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                        </div>
                        @endif
                </div>
                {!! Form::open(['action' => 'ContactsController@store', 'method'=>'POST']) !!}
                <h2>Contact Info</h2> 
                <br>   
                <div class="form-group">
                        {{Form::label('name', 'Contact name')}}
                        {{Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Contact Name'])}}
                        </div>

                <div class="form-group">
                        {{Form::label('type', 'Contact Type')}}
                        {{Form::text('type', '', ['class'=>'form-control', 'placeholder'=>'Contact Type'])}}
                </div>


                <br> 

                <h3>Billing Address</h3>
                <br> 


                <div class="form-group">
                        {{Form::label('billing_address', 'Address')}}
                        {{Form::text('billing_address', '', ['class'=>'form-control', 'placeholder'=>'Address'])}}
                </div>

                <h3>Shipping Address</h3>
                <br> 

                
                <div class="form-group">
                        {{Form::label('shipping_address', 'Address')}}
                        {{Form::text('shipping_address', '', ['class'=>'form-control', 'placeholder'=>'Address'])}}
                </div>

                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

                {!! Form::close() !!}
                </div>
        </div>
</div>
@endsection