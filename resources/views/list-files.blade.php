@extends('home')

@section('content')
    <div>
        <div class="nav-bar-title">
            <a class="btn btn-primary btn-light" href="/projects" role="button">< Proyectos</a>
            <h1 class="col-9 text-center">Archivos cargados</h1>
        </div>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Porcentaje de copia</th>
            </tr>
            </thead>
            <tbody>
            @for($i=0; $i<(count($listFiles)); $i++)
                <tr>
                    <td>
                        <a href="{{$urlFiles[$i]}}">
                            {{$listFiles[$i]}}
                        </a>
                    </td>
                    <td>
                        <a href="#">
                            1%
                        </a>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
@endsection
