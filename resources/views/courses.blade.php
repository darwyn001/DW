@extends('home')

@section('content')
    <div>
        <h1 class="text-center">Cursos</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Estudiante</th>
                <th scope="col">Profesor</th>
                @if(\Illuminate\Support\Facades\Auth::user()->roleId ==2)
                    <th scope="col">Proyecto</th>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->roleId ==1)
                    <th scope="col">Archivos</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <th scope="row">{{$course ->courseId}}</th>
                    <td>{{$course->courseName}}</td>
                    <td>{{$course->studentName}}</td>
                    <td>{{$course->professorName}}</td>
                    @if(\Illuminate\Support\Facades\Auth::user()->roleId ==2)
                        <td><a href="/projects">Ver proyectos</a></td>
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::user()->roleId ==1)

                        @foreach($a as $info)
                            <td>
                                <a href="{{$info->path}}">
                                    {{$info->path}}
                                </a>
                            </td>

                        @endforeach
                    @endif
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
@endsection
