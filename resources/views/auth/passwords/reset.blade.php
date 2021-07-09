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
    <h2>Restaure su contraseña</h2>
    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <button type="submit" class="submit">
            Resetear Password
        </button>

    </form>
  </div>

</div>
<script  src="{{url('dist/js/index.js">')}}</script>

</body>

</html>
