@extends('backend.layout.app')

@section('content')

    @php
    $unserialize = null;
    $infoadd = [
        'typeId' => 'No existe información',
        'typecourse' => 'No existe información',
        'gender' => 'No existe información',
        'birth' => 'No existe información',
    ];
    $gender = 'No existe información';
    if ($user->description != null) {
        if (str_contains($user->description, '|')) {
            $unserialize = json_decode(unserialize($user->description));
            $gender = 'Otro';
            if ($unserialize->gender == 'M') {
                $gender = 'Masculino';
            } elseif ($unserialize->gender == 'F') {
                $gender = 'Femenino';
            } elseif ($unserialize->gender == 'O') {
                $gender = 'Otro';
            }
            $infoadd = [
                'typeId' => $unserialize->typeId,
                'typecourse' => $unserialize->typecourse,
                'gender' => $unserialize->gender,
                'birth' => $unserialize->birth,
            ];
        }
    }
    @endphp
    <style>
        .block_image {
            display: none;
        }

        .block_image:first-child {
            display: block;
        }

        #files li {
            margin-bottom: 10px;
        }

    </style>

    <div class="col-md-6 col-md-offset-3">
        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile text-center">
                <ul class="list-group list-group-unbordered text-left">
                    <li class="list-group-item"><b>ID: </b>{{ $user->id }}</li>
                    <li class="list-group-item"><b>Identificación: </b> {{ $infoadd['typeId'] }} {{ $user->idnumber }}
                    </li>
                    <li class="list-group-item"><b>Nombres:</b> {{ $user->firstname }}</li>
                    <li class="list-group-item"><b>Apellidos:</b> {{ $user->lastname }}</li>
                    <li class="list-group-item"><b>Email:</b> {{ $user->email }}</li>
                    <li class="list-group-item"><b>Fecha de Nacimiento:</b>
                        {{ Carbon\Carbon::parse($user->birth)->format('d/m/Y') }}</li>
                    <li class="list-group-item"><b>No Celular:</b> {{ $user->phone2 }}</li>
                    <li class="list-group-item"><b>No: Celular2</b>
                        {{ $user->phone1 ? $user->phone1 : 'Sin información' }}</li>
                    <li class="list-group-item"><b>Institución:</b> {{ $user->institution }}</li>
                    <li class="list-group-item"><b>Departamento:</b> {{ $user->department }}</li>
                    <li class="list-group-item"><b>Municipio:</b> {{ $user->city }}</li>
                    <li class="list-group-item"><b>Fecha de Nacimiento:</b> {{ $infoadd['birth'] }}</li>
                    <li class="list-group-item"><b>Genero:</b> {{ $gender }}</li>
                    <li class="list-group-item"><b>Tipo de Curso:</b> {{ $infoadd['typecourse'] }}</li>
                </ul>
            </div>
            <!-- /.box-body -->
        </div>

        <div class="box box-primary">
            <div class="box-body box-profile text-center">
                <h4>Reportar un problema</h4><button class="btn btn-primary"><i
                    class="fa fa-bug"></i>  Reportar</button>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-body box-profile text-center">
                <h4>Eliminar <span style="color:red">usuario</span> permanentemente</h4>
                <form title="Eliminar" style="display:inline-block" method="POST"
                    action="/backend/usuarios/{{ $user->id }}" accept-charset="UTF-8" class="form-horizontal"
                    data-form="{{ $user->id }}">
                    <input name="_method" type="hidden" value="delete">
                    {{ csrf_field() }}
                    <button class="btn btn-danger" type="submit" id="{{ $user->id }}"><i
                            class="fa fa-trash"></i> Eliminar</button>
                </form>

            </div>
        </div>


    </div>

@endsection


@section('title') INAP AYUDAS PEDAGÓGICAS | Mostrar usuarios @endsection
@section('pageTitle')
    <h1> Mostrar <small>un Usuario</small> </h1>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Editar Usuario</a></li>
        <!--li class="active">Here</li-->
    </ol>
@endsection

@section('scripts')
    @include('backend.partials.form-includes')
    <script src="{{ url('assets/js/user.js') }}"></script>

    <script>
        $('#files li a[data-file="jpg"]').first().parent().hide();
    </script>
@endsection
