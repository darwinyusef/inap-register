<!DOCTYPE html>
<html lang="es" >

<head>
  <meta charset="UTF-8">
  <title>Login/Registration</title>


  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="assets/css/style.css">


</head>

<body>

  <p class="tip" style="margin-bottom:0px"><img src="{{asset('assets/img/logodiagnosticar.jpg')}}" alt="" width="71%"></p>
<div class="cont">
  <div class="form sign-in">
    <h2>Bienvenidos al sistema de Certificación</h2>
    <form class="form sign-in" method="POST" action="{{ route('autenticacion') }}" style="text-align:center">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">E-Mail</label>
            <div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="control-label">Password</label>
            <div>
                <input id="password" type="password" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <a href="/password/reset" class="forgot-pass">Olvido su password?</a>
        <button type="submit" class="submit">Sign In</button>
    </form>
    
    
  </div>
  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">
        <h2>Es usted una empresa que desea vincularse con nosotros</h2>
        <p>Registrese y vinculese a nuestra plataforma aqui podrá acceder y evaluar los certificados de su empresa</p>
      </div>
      <div class="img__text m--in">
        <h2>Ya tiene una cuenta?</h2>
        <p>Si ya tiene una cuenta, simplemente inicie sesión. ¡Lo hemos extrañado!</p>
      </div>
      <div class="img__btn">
        <span class="m--up">Empresas</span>
        <span class="m--in">Sign In</span>
      </div>
    </div>

      
    <form class="form sign-up"  style="height:550px; overflow-y:scroll" method="POST" action="/backend/usuarios">
        {{ csrf_field() }}
        
              <img src="http://enterpriseiron.com/wp-content/uploads/2014/04/stock-photo-lady-press-touch-interface-in-virtual-space-future-business-technology-series-outstanding-49931152.jpg" width="100%" />
        <h2>Diligencie este formulario solo en el caso que usted sea un funcionario de una empresa asociada</h2>
        
        <br>
        <p style="text-align: center">Este registro quedará luego de validado su correo electronico,  Inactivo hasta la activación por parte de su Empresa / Adminsitrador</p>
        <br>
        <h4>Si usted es un estudiante registrese <a href="http://portal.diagnosticar.com.co/registro">aquí</a> (<small style="text-align: center">Este formulario es solo para registrar estudiantes pues tendrá un acceso a moodle</small>)</h4>
      <br> 
      
      <input id="rol" type="hidden" rol="rol" value="2">
<br><br>
    <h3>Datos básicos</h3>
        <hr>
        <br>
        <div class="form-group{{ $errors->has('card_id') ? ' has-error' : '' }}">
            <label for="card_id" class="col-md-12 control-label">Número de Identificación</label>

            <div class="col-md-12">
                <input id="card_id" type="number" name="card_id" value="{{ old('card_id') }}" required autofocus>

                @if ($errors->has('card_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('card_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
       
       
        <div class="form-group{{ $errors->has('first') ? ' has-error' : '' }}">
            <label for="first" class="col-md-12 control-label">Nombres</label>

            <div class="col-md-12">
                <input id="first" type="text" name="first" value="{{ old('first') }}" required autofocus>

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
                <input id="last" type="text" name="last" value="{{ old('last') }}" required autofocus>

                @if ($errors->has('last'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last') }}</strong>
                    </span>
                @endif
            </div>
        </div>



        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-12 control-label">Dirección de Email</label>

            <div class="col-md-12">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <br><br>
        <h3>Datos de acceso</h3>
        <hr>
        <br>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-12 control-label">Password</label>

            <div class="col-md-12">
                <input id="password" type="password" name="password" required>

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
                <input id="password-confirm" type="password" name="password_confirmation" required>
            </div>
        </div>
        <button type="submit" class="submit">Registrarse</button>

    </form>
    <div class="form sign-up">
    </div>
  </div>
</div>
<script  src="assets/js/index.js"></script>




</body>

</html>
