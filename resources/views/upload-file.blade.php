@extends('home')


@section('content')
    <div>

        <div class="nav-bar-title">
            <a class="btn btn-primary btn-light" href="/projects" role="button">< Proyectos</a>
            <h1 class="col-9 text-center">Cargar archivos</h1>
        </div>

        <form method="post" action="/uploadFile/{{$selectedProject}}" files enctype="multipart/form-data">
            <div class="card mb-3">
                <div class="card-header nav-bar-title">
                    @foreach($queryResult as $result)
                        <h6 class="col-3 text-center align-content-center">
                            <span class="badge badge-secondary">
                            Proyecto:
                            </span>
                            {{$result->name}}
                        </h6>
                        <h6 class="col-6 text-center align-content-center">
                            <span class="badge badge-secondary">
                            Descripción:
                            </span>
                            {{$result->description}}
                        </h6>
                        <h6 class="col-3 text-center align-content-center">
                            <span class="badge badge-secondary">
                            Curso:
                            </span>
                            {{$result->courseName}}
                        </h6>
                    @endforeach
                </div>
                <div class="card-body ">
                    <div class="card-group mb-2">
                        {{ csrf_field() }}
                        <input type="file" name="file_upload" id="file_upload"
                               accept='application/zip,application/rar'/>
                    </div>
                    @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                            <a href="/projects">Volver a proyectos</a>
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    {{ Form::submit('Cargar archivo!') }}
                </div>
            </div>
        </form>
    </div>
@endsection
