<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Formulario de Inscripción | Inap Ayudas Pedagógicas </title>

    <!-- Bootstrap core CSS -->
    <link href="register/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="register/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="register/vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="register/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <link href="register/css/resume.css" rel="stylesheet">

  </head>

  <body id="page-top">
    @if ($errors->any())
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </div>
    @endif
    
    @if(Session::has('duplicado'))
        <div class="alert alert-danger">
            {{Session::get('duplicado')}}  <a href="https://api.whatsapp.com/send?phone=573102079111&amp;text=Hola%20quisiera%20informacion" class="btn btn-xs btn-danger"><i class="fa fa-whatsapp"></i></a>
        </div>
    @endif

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav" style="background-color: #000a82 !important">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">InapAyudas</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/logos/logo.png" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <!--li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Quienes Somos</a>
          </li-->
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#inscription">Inscripción</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">
      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="inscription">
        <div class="my-auto">
          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Formato de Inscripción a la plataforma</h3>
              <p>Si usted hace parte de la comunidad estudiantil, que desea mejorar sus conocimientos,
                  Para poder acceder correctamente se requiere que incluya sus datos básicos de acceso a nuestra plataforma,
                   nuestro sistema enviará un correo electronico al email registrado con el usuario y 
                   la contraseña pertinentes para el acceso, luego de esto usted deberá modificar 
                   estos datos para acceder con sus propios datos y generar los repectivos resultados; 
                   si esta deacuerdo  se requiere que usted diligencie los datos básicos y si es necesario la modalidad.</p>
            </div>
          </div>

          <div class="resume-item d-flex flex-column flex-md-row">
            <div class="resume-content mr-auto" style="width:100%">
              <h3 class="mb-0">Formulario de Inscripción</h3>
              <div class="subheading mb-3">Incluya estos datos en especial importancia aquellos que sean obligatorios</div>
              <form action="/registro" method="post" style="width:100%">
                {{ csrf_field() }}
                <p class="form-text text-muted">La información contenida a continuación deberá escrita con mayuscula inicial y ser verificada antes de envíar (tenga en cuenta que esta información será 
                 incluida en el diploma y en el certificado de alimentos)</p>
                 
                 <div class="form-group">
                  <label for="typeId">Tipo de Identificación</label>
                   <select class="form-control" id="typeId" name="typeId" required>
                      <option value="">Seleccione...</option>
                      <option value="CC">Cedula de Ciudadanía</option>
                      <option value="CE">Cedula de Extrangería</option>
                      <option value="TI">Tarjeta de Identidad</option>
                      <option value="TE">Tarjeta de Extrangería</option>
                  </select>
                  <small id="typeId" class="form-text text-muted">Selecccione el tipo de Vinculación a nuestra plataforma</small>
                </div>


                <div id="acudiente" style="display: none">
                  <div class="form-group">
                    <label for="adultId">Número de Identificación Acudiente <span style="color: red">(*)</span></label>
                    <input type="number" class="form-control" id="adultId" name="adultId" aria-describedby="adultId" />
                    <small id="adultHelp" class="form-text text-muted">Escriba su número de identificación sin puntos ni caracteres especiales de un adulto (+18) que sea acudiente del estudiante</small>
                  </div>
  
  
                  <div class="form-group">
                    <label for="adultName">Nombre completo del Acudiente  <span style="color: red">(*)</span></label>
                    <input type="text" class="form-control" id="adultName" name="adultName">
                    <small id="adultHelp" class="form-text text-muted">Escriba El nombre completo del acudiente</small>
                  </div>

                  <div class="form-group">
                    <label for="phone1">Número celular del Acudiente <span style="color: red">(*)</span></label>
                    <input type="number" class="form-control" id="phone1" name="phone1">
                    <small id="phone1Help" class="form-text text-muted">Escriba su numero Celular para informale anomalias del estudiante</small>
                  </div>
                </div>
           

                <div class="form-group">
                  <label for="idnumber">Número de Identificación Estudiante <span style="color: red">(*)</span></label>
                  <input type="number" class="form-control" id="idnumber" name="idnumber" aria-describedby="idnumber" required />
                  <small id="emailHelp" class="form-text text-muted">Escriba su número de identificación sin puntos ni caracteres especiales Tenca en cuenta que estos datos iran relacionados en su certificado 
                    digital no use caracteres especiales</small>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email <span style="color: red">(<strong>Recomendamos un correo GMAIL</strong>)</span></label>
                  <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Email" required>
                  <small id="emailHelp" class="form-text text-muted">Escriba su email. dando uso a la @ y el .com - Recomendamos el uso del correo GMAIL para evitar problemas debido a las politicas antispam de outlook <a href="https://sendersupport.olc.protection.outlook.com/pm/troubleshooting.aspx">Politica Anti Spam</a> - En el caso de no tener un correo GMAIL le agradecemos este pendiente de los envíos de correos <a href="https://api.whatsapp.com/send?phone=573102079111&text=Hola%20tengo%20problemas%20con%20mi%20email%20informacion">Contactandonos directamente</a></small>
                </div>


                <div class="form-group">
                  <label for="password" style="display: block">Password</label>
                  <input type="password" class="form-control" id="password" name="password" required style="width: 97%; display: inline-block;"> 
                  <span id="validate" style="display: inline-block; margin-left:10px; color:black; z-index=600" >
                    <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                      <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                      <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                    </svg>
                  </span>
                  <small class="form-text text-muted">Password</small>
                </div>

                
                <div class="form-group">
                  <label for="firstname">Nombres<span style="color: red">(*)</span></label>
                  <input type="text" class="form-control" id="firstname" name="firstname" required>
                  <small id="firstname" class="form-text text-muted">Escriba su Primer y/o Segundo Nombre (Tenga en cuenta que estos datos iran relacionados en su certificado digital no use tildes)</small>
                </div>

                <div class="form-group">
                  <label for="lastname">Apellidos <span style="color: red">(*)</span></label>
                  <input type="text" class="form-control" id="lastname" name="lastname" required>
                  <small id="lastname" class="form-text text-muted">Escriba su Primer y/o Segundo Apellido (Tenga en cuenta que estos datos iran relacionados en su certificado digital no use tildes)</small>
                </div>

                <div class="form-group">
                  <label for="birth">Fecha de Nacimiento</label>
                  <input type="date" class="form-control" id="birth" name="birth" required>
                  <small id="birth" class="form-text text-muted">01-10-2021</small>
                </div>


                <div class="form-group">
                  <label for="gender">Sexo</label>
                   <select class="form-control" id="gender" name="gender" required>
                      <option value="">Seleccione...</option>
                      <option value="M">Masculino</option>
                      <option value="F">Femenino</option>
                      <option value="O">Otro</option>
                  </select>
                  <small id="genderHelp" class="form-text text-muted">Selecccione el tipo de Vinculación a nuestra plataforma</small>
                </div>

                
                <div class="form-group">
                  <label for="phone2">Celular</label>
                  <input type="number" class="form-control" id="phone2" name="phone2" required>
                  <small id="phone2" class="form-text text-muted">Escriba su número de celular</small>
                </div>

                
                <div class="form-group">
                  <label for="department">Departamento</label>
                  <input type="text" class="form-control" id="department" name="department" required>
                  <small id="department" class="form-text text-muted">Escriba Departamento (Ejemplo : Cundinamarca)</small>
                </div>
                <div class="form-group">
                  <label for="city">Ciudad</label>
                  <input type="text" class="form-control" id="city" name="city" required>
                  <small id="city" class="form-text text-muted">Escriba su Ciudad (Ejemplo : Bogotá)</small>
                </div>

                <div class="form-group">
                  <label for="institution">Institución</label>
                  <input type="text" class="form-control" id="institution" name="institution">
                  <small id="institution" class="form-text text-muted">Escriba el nombre de la institución donde pertenece (Ejemplo : Colegio María Inmaculada)</small>
                </div>

                
                <div class="form-group">
                  <label for="typecourse">Tipo de Vinculación</label>
                   <select class="form-control" id="type" name="typecourse" required>
                      <option value="">Seleccione...</option>
                    <option value="virtual">Virtual</option>
                    <option value="presencial">Presencial</option>
                  </select>
                  <small id="typecourse" class="form-text text-muted">Selecccione el tipo de Vinculación a nuestra plataforma</small>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-success" id="send"> Enviar </button>
                </div>

              </form>
            </div>
          </div>

        </div>

      </section>

    </div>
 </div>
 </div>
    <!-- Bootstrap core JavaScript -->
    <script src="register/vendor/jquery/jquery.min.js"></script>
    <script src="register/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="register/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="register/js/resume.min.js"></script>

    <script>
      $('#typeId').change(function() {
        if( $( "#typeId option:selected" ).val() == 'TI'){
          $("#acudiente").show();
          $("#estudiantePhone").hide();
          
        }else{
          $("#acudiente").hide();
          $("#estudiantePhone").show();
        }
      });

      $('#validate').click(function () { 
        if( $('#password').attr('type') == 'text' ){
          $('#password').attr('type', 'password');
        }else {
          $('#password').attr('type', 'text');
        }
        
      });


    </script>
    
  </body>

</html>
