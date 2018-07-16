<html>
</<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
{!! Form::open(['action' => 'ContactsController@create', 'method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('address_type', 'Address Type')}}
        {{Form::text('address_type', '', ['class'=>'form-control', 'placeholder'=>'Address Type'])}}
    </div>

    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}


{!! Form::close() !!}
</div>
</body>
</html>
