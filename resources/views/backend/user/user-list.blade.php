@extends('backend.layout.app')

@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }} @if (session('id')) {{ session('id') }}
                        @endif
                    </li>

                @endforeach
            </ul>
        </div>
    @endif


    <div class="container" id="search" hidden>
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-bottom:60px">
                <form action="/backend/usuarios" method="get" class="text-center">

                    <div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
                        <label for="total" class="col-md-12">Paginacion</label>

                        <div class="col-md-12">
                            <select class="form-control input-md text-left" value="{{ old('total') }}" required="required"
                                name="total" id="total" required autofocus>
                                <option value="10">10</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="500">500</option>
                            </select>
                            @if ($errors->has('total'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('total') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
                        <h5 for="cedula" class="col-md-12">Identificacion</h5>
                        <div class="col-md-12">
                            <input style="margin-bottom:20px" id="cedula" type="cedula" class="form-control" name="cedula"
                                value="{{ old('cedula') }}">

                            @if ($errors->has('cedula'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cedula') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <h5 for="email" class="col-md-12">Email</h5>
                        <div class="col-md-12">
                            <input style="margin-bottom:20px" id="email" type="cedula" class="form-control" name="email"
                                value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group" style="margin-bottom:10px">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                Buscar / Actualizar
                            </button>
                        </div>
                    </div>
                </form>
                <br><br>
            </div>
        </div>
    </div>

    <table class="table table-hover" width="100%">
        <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>Identificación</th>
                <th>Nombres</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody style="overflow-x: scroll; ">
            @foreach ($users as $user)

                @if ($user->id != null)
                    <tr>
                        <td>ID:{{ $user->id }}</td>
                        <td>{{ $user->idnumber }}</td>
                        <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                        <a title="Ver" href="/backend/usuarios/{{ $user->id }}" style="display:inline-block"
                            class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a> <a title="Actualizar"
                            href="/backend/usuarios/{{ $user->id }}/edit" style="display:inline-block"> <button
                                type="submit" class="btn btn-xs btn-info" id="next"><i class="fa fa-pencil"></i></button>
                        </a>
                        <form title="Eliminar" style="display:inline-block" method="POST" action="/backend/usuarios/{{ $user->id }}"
                            accept-charset="UTF-8" class="form-horizontal" data-form="{{ $user->id }}">
                            <input name="_method" type="hidden" value="delete">
                            {{ csrf_field() }}
                            <button class="btn btn-xs btn-danger delete" type="submit" id="{{ $user->id }}"><i
                                    class="fa fa-trash"></i></button>
                        </form>
                        <a href="/backend/password/{{ $user->id }}"
                            style="display:inline-block" title="restaurar password" class="btn btn-success btn-xs"><i
                                class="fa fa-user"></i></a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
@endsection



@section('title') INAP - LISTADO DE USUARIOS @endsection
@section('pageTitle')
    <h1> Listado de Usuarios <small> Espacio que incluye el listado de Usuarios</small> <button class="btn btn-success"
            id="btnsearch">Buscar</button></h1>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Usuarios</a></li>
        <li class="active">Listado de usuarios</li>
    </ol>
@endsection

@section('scripts')
    @include('backend.partials.datatables')

    <script>
        $('#btnsearch').click(function() {
            $('#search').toggle();
        });
    </script>
@endsection
