@extends('backend.layout.app')

@section('content')
      <form class="form-horizontal" method="POST" action="{{ route('pass.store') }}">
           {{ csrf_field() }}
           <input id="id" type="hidden" class="form-control" name="id" value="{{ $id }}">

           <div class="col-md-8 col-md-offset-2">
           <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
               <label for="old_password" class="col-md-12">Password Antiguo</label>
               <div class="col-md-12">
                   <input id="old_password" type="password" class="form-control" name="old_password" required>
                   @if ($errors->has('old_password'))
                       <span class="help-block">
                           <strong>{{ $errors->first('old_password') }}</strong>
                       </span>
                   @endif
               </div>
           </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-12">Nuevo Password</label>
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
                <label for="password-confirm" class="col-md-12">Confirma el Password</label>
                <div class="col-md-12">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

          <div class="form-group">
              <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">
                      Modificar el Password
                  </button>
              </div>
          </div>
        </div>

      </form>

@endsection


@section('title') INAP AYUDAS PEDAGÓGICAS | Modificar Password @endsection
@section('pageTitle')
  <h1> Usuarios <small>Modificar Password</small> </h1>
@endsection

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/usuarios/password"><i class="fa fa-user"></i> Password</a></li>
  </ol>
@endsection
