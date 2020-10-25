@extends('home')


@section('content')
    <div>
        <h1 class="text-center">Cargar archivos</h1>

        {{Form::open(array('url'=>'/uploadFile', 'files'=>'true'))}}
        <div class="card mb-3">
            <div class="card-header">
                Seleccionar archivos
            </div>
            <div class="card-body ">
                <div class="card-group mb-2">
                    <div class="mr-3">{{Form::label('name', 'Nombre: ')}}</div>
                    {{Form::text('name')}}
                </div>
                <div class="card-group mb-2">
                    <div class="mr-3">{{Form::label('description', 'Descripción: ')}}</div>
                    {{Form::text('description')}}
                </div>
                <div class="card-group mb-2">
                    {{ csrf_field() }}
                    <input type="file" name="file_upload" id="file_upload" accept='application/zip,application/rar'/>
                </div>
                @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>
            <div class="card-footer">
                {{ Form::submit('Cargar archivo!') }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection
