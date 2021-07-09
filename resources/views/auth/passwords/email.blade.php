<!DOCTYPE html>
<html lang="es" >

<head>
  <meta charset="UTF-8">
  <title>Login/Registration</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="{{url('dist/css/style.css')}}">

</head>

<body>

  <p class="tip" style="margin-bottom:0px"><img src="https://inapayudaspedagogicas.com.co/files/logo2.jpg" alt="" width="71%"></p>
<div class="cont">
  <div class="form sign-in" style="width: initial; align:center">
    <h2>Recuperación de Contraseña</h2>
    @if (session('status'))
        <h3 style="color:red; text-align: center;"> {{ session('status') }} <a href="/" class="submit"> volver al inicio </a></div>

    @endif
    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label"><small>Escriba su Email y envíe para recuperar su contraseña</small></label>
            <br>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="E-Mail">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <button type="submit" class="submit">
            Envíe para Recuperar </button>
    </form>
  </div>
</div>
<script  src="dist/js/index.js"></script>




</body>

</html>
