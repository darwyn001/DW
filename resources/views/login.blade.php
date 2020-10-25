<!doctype html>
<html lang="es">
<meta charset="UTF-8"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<head>

</head>
<body class="text-center">
<div class="login-container">
    <div class="jumbotron">

        {{ Form::open(array('url' => '/')) }}
        <h1>Desarrollo Web</h1>

        <div class="form-group ">
            {{ Form::label('email', 'Correo electrónico') }}
            {{ Form::text('email', Request::old('email'), array('placeholder' => 'usuario@correo.com')) }}
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Contraseña')  }}
            {{ Form::password('password')}}
        </div>

        <p class="btn btn-primary">{{ Form::submit('Ingresar!') }}</p>
        {{ Form::close() }}

        @if($errors->any())
            <div class="">
                @foreach($errors->all() as $error)
                    <div class="alert alert-primary">{{$error}}</div>
                @endforeach
            </div>
        @endif
    </div>
</div>
</body>
