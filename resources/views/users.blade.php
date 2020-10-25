@extends('home')

@section('content')
    <div>
        <h1 class="text-center">Usuarios</h1>

        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Carnet</th>
                <th scope="col">Correo</th>
                <th scope="col">Rol</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user ->id}}</th>
                    <td>{{$user->name}}</td>
                    @if($user->carnet == null)
                        <td>N/A</td>
                    @else
                        <td>{{$user->carnet}}</td>
                    @endif
                    <td>{{$user->email}}</td>
                    <td>{{$user->rol}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
