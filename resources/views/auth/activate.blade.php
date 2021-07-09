@extends('backend.layout.auth')

@php
  $type_page = 'login';
  $list = 0;
  $data = \App\Entities\User::find(session('user'));

@endphp


@if (!Auth::check())
  <script>window.location.href = "/login";</script>
@else
  @php
    $list = Auth::user()->id;
  @endphp
@endif


@section('content')

  <div class="container">
    <div class="row">
      <!-- /.login-logo -->
      <br><br>
      <div class="login-box-body col-md-4 col-md-offset-4 text-center" style="padding:10px 40px;">
        <img src="{{url('assets/img/books.svg')}}" alt="" width="70%">
        @if ($data == null)
          <h3>USTED NO HA ACTIVADO SU CORREO ELECTRÓNICO</h3>
          <p>Para poder ingresar a nuestra plataforma debe ingresar y validar sus datos de correo electronico</p>
        @else
          <h3>VERIFIQUE SU CORREO</h3>
          <p>Para poder ingresar a nuestra plataforma valide su email desde {{$data->email}}</p>
        @endif
        <br><br><br><br>
        <a href="/sendValidator/{{$list}}" class="text-center"><h3>Click aquí para enviar un Mensaje de Validación @if ($data != null) Nuevamente @endif </h3></a>
        <br><br><br><br>
        <p>Si usted no cuenta con un usuario Registrado</p>
        <a href="register" class="text-center">Registrar nuevo Usuario</a>

      </div>
      <!-- /.login-box-body -->
    </div>
  </div>

  </div>
@endsection
