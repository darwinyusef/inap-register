@extends('backend.layout.app')

@php
  $type_page = 'register';
@endphp

@section('content')
  <div class="container">
    <div class="row">

  <div class="register-box-body col-md-4 col-md-offset-4">
  <h3 class="login-box-msg"><small>INSTITUTO DE AYUDAS PEDAGÓGICAS </small><br> Registro de Usuarios </h3>

    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <input id="rol" type="hidden" rol="rol" value="2">

        <div class="form-group{{ $errors->has('first') ? ' has-error' : '' }}">
            <label for="first" class="col-md-12 control-label">Nombres</label>

            <div class="col-md-12">
                <input id="first" type="text" class="form-control" name="first" value="{{ old('first') }}" required autofocus>

                @if ($errors->has('first'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('last') ? ' has-error' : '' }}">
            <label for="last" class="col-md-12 control-label">Apellidos</label>

            <div class="col-md-12">
                <input id="last" type="text" class="form-control" name="last" value="{{ old('last') }}" required autofocus>

                @if ($errors->has('last'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('card_id') ? ' has-error' : '' }}">
            <label for="card_id" class="col-md-12 control-label">Número de Identificación</label>

            <div class="col-md-12">
                <input id="card_id" type="number" class="form-control" name="card_id" value="{{ old('card_id') }}" required autofocus>

                @if ($errors->has('card_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('card_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-12 control-label">Dirección de Email</label>

            <div class="col-md-12">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-12 control-label">Password</label>

            <div class="col-md-12">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="password-confirm" class="col-md-12 control-label">Confirma el Password</label>

            <div class="col-md-12">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
            </div>
        </div>
    </form>


    <a href="login" class="text-center">Ya cuento con un usuario</a>
  </div>
  <!-- /.form-box -->
</div>
@endsection
