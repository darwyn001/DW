@extends('home')

@section('content')
    <div>

        <div class="nav-bar-title">
            <a class="btn btn-primary btn-light back-button" href="/listFiles/{{$rootPath}}" role="button">< Listado de archivos</a>
            <h1 class="col-9 text-center">Similitud de archivos</h1>
        </div>

        <div class="card mb-3">
            <div class="card-header text-center">
                <h6>
                    <span class="badge badge-secondary">Archivo:</span>
                    {{$fileOriginalPath}}
                </h6>

            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center" colspan="2">Coincidencias</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Ruta y nombre</td>
                        <td>{{$sameRoute}}</td>
                    </tr>
                    <tr>
                        <td>Contenido</td>
                        <td>{{$sameCotent}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

@endsection
