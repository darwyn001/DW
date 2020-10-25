@extends('home')

@section('content')
    <div>
        <h1 class="text-center">Proyectos</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descrpción</th>
                <th scope="col">Curso</th>
                <th scope="col">Archivos</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <th scope="row">{{$project ->id}}</th>
                    <td>{{$project->name}}</td>
                    <td>{{$project->description}}</td>
                    <td>{{$project->courseName}}</td>
                    @if($project->uploadedFileId == null)
                        <td>
                            <a href="/uploadFile">
                                Cargar archivos!
                            </a>
                        </td>
                    @else
                        <td>
                            <a href="{{$project->path}}">
                                {{$project->path}}
                            </a>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
