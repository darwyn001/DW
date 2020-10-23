@extends('home')

@section('content')
    <div>
        <h1 class="text-center">Cursos</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <th scope="row">{{$course ->id}}</th>
                    <td>{{$course->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
