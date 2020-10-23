@extends('home')

@section('content')
    <div>
        <h1 class="text-center">Proyectos</h1>

        {{Form::open(array('url'=>'/projects', 'files'=>'true'))}}
        <div class="card mb-3">
            <div class="card-header">
                Cargar Archivos
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
                    <div class="mr-3">{{Form::label('file_uploaded', 'Selecciona archivo para cargar ')}}</div>
                    {{Form::file('file_upload')}}
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

        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descrpción</th>
                <th scope="col">Ruta</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <th scope="row">{{$project ->id}}</th>
                    <td>{{$project->name}}</td>
                    <td>{{$project->description}}</td>
                    <td>
                        <a href="{{"storage/".$project->path}}">
                            {{$project->path}}
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
