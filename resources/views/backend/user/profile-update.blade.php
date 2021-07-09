@extends('backend.layout.app')

@section('content')

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

    @php
    $unserialize = null;
    $infoadd = [
        'typeId' => null,
        'typecourse' => null,
        'gender' => null,
        'birth' => null,
        'pay' => 0,
        'adultId' => null,
        'adultName' => null,
    ];

    $gender = null;
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
                'pay' => $unserialize->pay,
                'adultId' => $unserialize->adultId,
                'adultName' => $unserialize->adultName,
            ];
        }
    }
    @endphp

    <div class="col-md-12">

        <form class="form-horizontal" method="POST" action="/backend/usuarios/{{ $user->id }}">
            <input name="_method" type="hidden" value="PUT">
            {{ csrf_field() }}
            @if ($cookie->rol == 'admin')
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('typeId') ? ' has-error' : '' }}">
                        <label for="typeId" class="col-md-12">Tipo de identificación</label>
                        <div class="col-md-12">
                            <select class="form-control" id="typeId" name="typeId" required>
                                <option value="">Seleccione...</option>
                                <option value="CC">Cedula de Ciudadanía</option>
                                <option value="CE">Cedula de Extrangería</option>
                                <option value="TI">Tarjeta de Identidad</option>
                                <option value="TE">Tarjeta de Extrangería</option>
                            </select>
                            @if ($errors->has('typeId'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('typeId') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('idnumber') ? ' has-error' : '' }}">
                        <label for="idnumber" class="col-md-12">Identificación del Estudiante</label>
                        <div class="col-md-12">
                            <input id="idnumber" type="number" class="form-control" name="idnumber"
                                value="{{ $user->idnumber }}" required autofocus>
                            @if ($errors->has('idnumber'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('idnumber') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <input type="hidden" name="typeId" value="{{ $infoadd['typeId'] }}">
            @endif

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                    <label for="firstname" class="col-md-12">Nombres del Estudiante</label>
                    <div class="col-md-12">
                        <input id="firstname" type="text" class="form-control" name="firstname"
                            value="{{ $user->firstname }}" required autofocus>
                        @if ($errors->has('firstname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                    <label for="lastname" class="col-md-12">Apellidos del Estudiante</label>
                    <div class="col-md-12">
                        <input id="lastname" type="text" class="form-control" name="lastname"
                            value="{{ $user->lastname }}" required autofocus>
                        @if ($errors->has('lastname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="email" class="col-md-12">Dirección de Email del Estudiante</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}"
                            required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('phone2') ? ' has-error' : '' }}">
                    <label for="phone2" class="col-md-12">Celular del Estudiante</label>
                    <div class="col-md-12">
                        <input id="phone2" type="text" class="form-control" name="phone2" value="{{ $user->phone2 }}"
                            autofocus>
                        @if ($errors->has('phone2'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone2') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                    <label for="city" class="col-md-12">Municipio / ciudad</label>
                    <div class="col-md-12">
                        <input id="city" type="text" class="form-control" name="city" value="{{ $user->city }}"
                            autofocus>
                        @if ($errors->has('city'))
                            <span class="help-block">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                    <label for="department" class="col-md-12">Departamento</label>
                    <div class="col-md-12">
                        <input id="department" type="text" class="form-control" name="department"
                            value="{{ $user->department }}" autofocus>
                        @if ($errors->has('department'))
                            <span class="help-block">
                                <strong>{{ $errors->first('department') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group{{ $errors->has('birth') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="birth">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="birth" name="birth" value="{{ $infoadd['birth'] }}"
                            autofocus>
                        <small id="birth" class="form-text text-muted">01-10-2021</small>
                        @if ($errors->has('birth'))
                            <span class="help-block">
                                <strong>{{ $errors->first('birth') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="gender">Genero</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="">Seleccione...</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                            <option value="O">Otro</option>
                        </select>
                        <small id="genderHelp" class="form-text text-muted">Selecccione el tipo de Vinculación a nuestra
                            plataforma</small>
                        @if ($errors->has('gender'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>


            <div id="acudiente" style="display: none">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('adultId') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label for="adultId">Número de Identificación Acudiente <span
                                    style="color: red">(*)</span></label>
                            <input type="number" class="form-control" id="adultId" name="adultId" aria-describedby="adultId"
                                value="{{ $infoadd['adultId'] }}" autofocus />

                            @if ($errors->has('adultId'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('adultId') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('adultName') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label for="adultName">Nombre completo del Acudiente <span style="color: red">(*)</span></label>
                            <input type="text" class="form-control" id="adultName" name="adultName"
                                aria-describedby="adultName" value="{{ $infoadd['adultName'] }}" autofocus>
                            @if ($errors->has('adultName'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('adultName') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('phone1') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label for="phone1">Número celular del Acudiente <span style="color: red">(*)</span></label>
                            <input type="number" class="form-control" id="phone1" name="phone1" aria-describedby="phone1"
                                value="{{ $user->phone1 }}" autofocus>
                            @if ($errors->has('phone1'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone1') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group{{ $errors->has('institution') ? ' has-error' : '' }}">
                    <label for="institution" class="col-md-12">Institución</label>

                    <div class="col-md-12">
                        <input id="institution" type="institution" class="form-control" name="institution"
                            value="{{ $user->institution }}" placeholder="Dirección">
                        @if ($errors->has('institution'))
                            <span class="help-block">
                                <strong>{{ $errors->first('institution') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('typecourse') ? ' has-error' : '' }}">
                    <label for="typecourse" class="col-md-12">Tipo de Curso</label>
                    <div class="col-md-12">
                        <select class="form-control input-md text-left" value="{{ old('typecourse') }}" name="typecourse"
                            id="typecourse">
                            <option value="">Seleccione... </option>
                            <option value="virtual">Virtual</option>
                            <option value="presencial">Presencial</option>
                        </select>
                        @if ($errors->has('typecourse'))
                            <span class="help-block">
                                <strong>{{ $errors->first('typecourse') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            @if ($cookie->rol == 'admin')
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('suspended') ? ' has-error' : '' }}">
                        <label for="suspended" class="col-md-12">Activación de Usuario</label>
                        <div class="col-md-12">
                            <select class="form-control input-md text-left" value="{{ old('suspended') }}"
                                name="suspended" id="suspended">
                                <option value="">Seleccione... </option>
                                <option value="1">Inactivo</option>
                                <option value="0">Activo</option>
                            </select>
                            @if ($errors->has('suspended'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('suspended') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('pay') ? ' has-error' : '' }}">
                        <label for="pay" class="col-md-12">Activación de Pago por registro</label>
                        <div class="col-md-12">
                            <select class="form-control input-md text-left" value="{{ old('pay') }}" name="pay"
                                id="pay">
                                <option value="">Seleccione... </option>
                                <option value="0">Inactivo</option>
                                <option value="1">Activo</option>
                            </select>
                            @if ($errors->has('pay'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pay') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
            @endif
    </div>


    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-12">
                <button type="submit" class="btn btn-info">
                    Editar Usuario
                </button>
            </div>
        </div>
    </div>
    </form>
    </div>


    <input type="hidden" id="gender_id" value="{{ $infoadd['gender'] }}">
    <input type="hidden" id="typeId_id" value="{{ $infoadd['typeId'] }}">
    <input type="hidden" id="typecourse_id" value="{{ $infoadd['typecourse'] }}">
    <input type="hidden" id="suspended_id" value="{{ $user->suspended }}">
    <input type="hidden" id="pay_id" value="{{ $infoadd['pay'] }}">
@endsection


@section('title') INAP | Editar Usuario @endsection
@section('pageTitle')
    <h1> Editar <small>un Usuario</small> </h1>
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
@endsection
