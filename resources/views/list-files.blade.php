@extends('home')

@section('content')
    <div>
        <h1 class="text-center">Archivos cargados</h1>
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
                    <td>1%</td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
@endsection
