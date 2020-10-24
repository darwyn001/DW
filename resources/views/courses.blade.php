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

            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <th scope="row">{{$course ->courseId}}</th>
                    <td>{{$course->courseName}}</td>
                    <td>{{$course->studentName}}</td>
                    <td>{{$course->professorName}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
