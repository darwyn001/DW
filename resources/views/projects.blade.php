@extends('home')

@section('content')
    <div>
        <div class="nav-bar-title">
            <a class="btn btn-primary btn-light" href="/courses" role="button">< Cursos</a>
            <h1 class="col-9 text-center">Proyectos</h1>
        </div>
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
                            @if(\Illuminate\Support\Facades\Auth::user()->roleId ==1)
                                No cargados
                            @else
                                <a href="/uploadFile/{{$project->id}}">
                                    Cargar archivos!
                                </a>
                            @endif
                        </td>
                    @else
                        @foreach($paths as $path )
                            @if($project->id == $path->id)
                                <td>
                                    <a href="/listFiles/{{$path->path}}">
                                        {{$path->path}}
                                    </a>
                                </td>
                            @endif
                        @endforeach

                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
