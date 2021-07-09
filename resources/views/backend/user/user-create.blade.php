@extends('backend.layout.app')

@section('content')

    <form class="form-horizontal" method="POST" action="/backend/usuarios">
         {{ csrf_field() }}

        <div class="col-md-6">
          <div class="form-group{{ $errors->has('first') ? ' has-error' : '' }}">
              <label for="first" class="col-md-12">Nombres</label>

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
              <label for="last" class="col-md-12">Apellidos</label>

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
              <label for="card_id" class="col-md-12">Identificación</label>

              <div class="col-md-6">
                  <select class="form-control input-md text-left" value="{{ old('type_card') }}" required="required" name="type_card" id="type_card" required autofocus>
                    <option value="CC">C.C.</option>
                    <option value="TI">T.I</option>
                    <option value="CE">C.E.</option>
                    <option value="PS">P.S.</option>
                    <option value="NT">N.T.</option>
                  </select>
                  @if ($errors->has('type_card'))
                      <span class="help-block">
                          <strong>{{ $errors->first('type_card') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="col-md-6">
                  <input id="card_id" type="number" class="form-control" name="card_id" value="{{ old('card_id') }}" placeholder="Número de Identificación" required autofocus>

                  @if ($errors->has('card_id'))
                      <span class="help-block">
                          <strong>{{ $errors->first('card_id') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-12">Dirección de Email</label>

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
              <label for="password" class="col-md-12">Password</label>

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

        </div>
        <div class="col-md-6">


          <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
              <label for="mobile" class="col-md-12">Celular</label>

              <div class="col-md-12">
                  <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" autofocus>

                  @if ($errors->has('mobile'))
                      <span class="help-block">
                          <strong>{{ $errors->first('mobile') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('phone_home') ? ' has-error' : '' }}">
              <label for="phone_home" class="col-md-12">Teléfono</label>

              <div class="col-md-12">
                  <input id="phone_home" type="number" class="form-control" name="phone_home" value="{{ old('phone_home') }}" autofocus>

                  @if ($errors->has('phone_home'))
                      <span class="help-block">
                          <strong>{{ $errors->first('phone_home') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
              <label for="address" class="col-md-12">Dirección y Barrio</label>

              <div class="col-md-6">
                  <input id="address" type="address" class="form-control" name="address" value="{{ old('address') }}" placeholder="Dirección" autofocus>

                  @if ($errors->has('address'))
                      <span class="help-block">
                          <strong>{{ $errors->first('address') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="col-md-6">
                  <input id="neighborhood" type="text" class="form-control" name="neighborhood" placeholder="Barrio">
                  @if ($errors->has('neighborhood'))
                      <span class="help-block">
                          <strong>{{ $errors->first('neighborhood') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
        
          @if (true) <!--Auth::user()->hasRole('admin')-->

            <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
              <label for="active" class="col-md-12">Activación de Usuario</label>
              <div class="col-md-12">
                <select class="form-control input-md text-left" value="{{old('active')}}" name="active" id="active">
                  <option value="">Seleccione... </option>
                  <option value="0">Inactivo</option>
                  <option value="1">Activo</option>
                </select>
                @if ($errors->has('active'))
                  <span class="help-block">
                    <strong>{{ $errors->first('active') }}</strong>
                  </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
                <label for="company_id" class="col-md-12">Empresa</label>

                <div class="col-md-12">
                    <select class="form-control input-md text-left" value="{{ old('company_id') }}" required="required" name="company_id" id="company_id" required autofocus>
                     <option value="">Seleccione...</option>
                     @foreach ($company as $comp)
                       <option value="{{$comp->id}}">{{$comp->company}}</option>
                     @endforeach
                   </select>

                    @if ($errors->has('company_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('company_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            {{--<div class="form-group{{ $errors->has('pago') ? ' has-error' : '' }}">
              <label for="pago" class="col-md-12">Activación de Usuario Por Registro</label>
              <div class="col-md-12">
                <select class="form-control input-md text-left" value="{{old('pago')}}" name="pago" id="pago">
                  <option value="">Seleccione... </option>
                  <option value="0">Inactivo</option>
                  <option value="1">Activo</option>
                </select>
                @if ($errors->has('pago'))
                  <span class="help-block">
                    <strong>{{ $errors->first('pago') }}</strong>
                  </span>
                @endif
              </div>
            </div>--}}

          @endif

        </div>
        <input id="rol" type="hidden" rol="rol" value="2">



        <div class="form-group">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">
                    Nuevo Usuario
                </button>
            </div>
        </div>
    </form>


@endsection

@section('title') INAP | Crear Nuevo Usuario @endsection
@section('pageTitle')
  <h1> Crear  <small>un Nuevo Usuario</small> </h1>
@endsection

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Nuevo Usuario</a></li>
    <!--li class="active">Here</li-->
  </ol>
@endsection

@section('scripts')
  @include('backend.partials.form-includes')
  <script src="{{url('dist/js/user.js')}}"></script>
@endsection
