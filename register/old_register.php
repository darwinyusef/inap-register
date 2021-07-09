<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Formulario de Inscripción | Inap Ayudas Pedagógicas </title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/resume.css" rel="stylesheet">

  </head>

  <body id="page-top">

<?php

if(isset($_SESSION['move'])){
      if($_SESSION['move'] == '0'){
        ?>

        <div class="alert alert-danger">
          <strong>Danger!</strong> Error inesperado realice este proceso nuevamente .
        </div>
<?php } } ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Inap Ayudas Pedagógicas</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="http://moodlepr.inapayudaspedagogicas.com.co/portal/img/logo.png" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Quienes Somos</a>
          </li>
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
              <p>Si usted hace parte de la comunidad estudiantil, que desea obtener el Curso de alimentos,  Para poder acceder correctamente se requiere que incluya sus datos básicos de acceso a nuestra plataforma, nuestro sistema enviará un correo electronico al email registrado con el usuario y la contraseña pertinentes para el acceso, luego de esto usted deberá modificar estos datos para acceder con sus propios datos y generar los repectivos resultados; si esta deacuerdo  se requiere que usted diligencie los datos básicos y si es necesario la modalidad.</p>
            </div>
          </div>


          <div class="resume-item d-flex flex-column flex-md-row">
            <div class="resume-content mr-auto" style="width:100%">
              <h3 class="mb-0">Formulario de Inscripción</h3>
              <div class="subheading mb-3">Incluya estos datos en especial importancia aquellos que sean obligatorios</div>
              <form action="get_register.php" method="post" style="width:100%">
                  
                <p class="form-text text-muted">La información contenida a continuación deberá escrita con mayuscula inicial y ser verificada antes de envíar (tenga en cuenta que esta información será incluida en el diploma y en el certificado de alimentos)</p>
                <!--div class="form-group">
                  <label for="username">Nombre de Usuario<span style="color: red">(*)</span></label>
                  <input type="text" class="form-control" id="username" name="username" aria-describedby="username" required>

                  <small id="emailHelp" class="form-text text-muted">Escriba su número de identificación sin puntos ni caracteres especiales</small>
                </div-->

                <div class="form-group">
                  <label for="identidad">Número de Identificación <span style="color: red">(*)</span></label>
                  <input type="number" class="form-control" id="identidad" name="identidad" aria-describedby="identidad" required>

                  <small id="emailHelp" class="form-text text-muted">Escriba su número de identificación sin puntos ni caracteres especiales (Tenca en cuenta que estos datos iran relacionados en su certificado digital no use caracteres especiales)</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email <span style="color: red">(*)</span></label>
                  <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Email" required>
                  <small id="emailHelp" class="form-text text-muted">Escriba su email. dando uso a la @ y el .com</small>
                </div>
                
                 <div class="form-group">
                  <label for="firstname">Nombres <span style="color: red">(*)</span></label>
                  <input type="text" class="form-control" id="firstname" name="firstname" required>
                  <small id="firstname" class="form-text text-muted">Escriba su Primer y/o Segundo Nombre (Tenca en cuenta que estos datos iran relacionados en su certificado digital no use tildes)</small>
                </div>
                <div class="form-group">
                  <label for="lastname">Apellidos <span style="color: red">(*)</span></label>
                  <input type="text" class="form-control" id="lastname" name="lastname" required>
                  <small id="lastname" class="form-text text-muted">Escriba su Primer y/o Segundo Apellido (Tenca en cuenta que estos datos iran relacionados en su certificado digital no use tildes)</small>
                </div>
                <div class="form-group">
                  <label for="phone1">Celular</label>
                  <input type="number" class="form-control" id="phone1" name="phone1" required>
                  <small id="phone1" class="form-text text-muted">Escriba su número de celular</small>
                </div>
                <div class="form-group">
                  <label for="phone2">Número de telefono</label>
                  <input type="number" class="form-control" id="phone2" name="phone2" required>
                  <small id="phone2" class="form-text text-muted">Escriba su numero de telefono (Hogar) o (Trabajo)</small>
                </div>
                
                <div class="form-group">
                  <label for="company">Empresa</label>
                <select class="form-control" id="next" name="next" required>
                    <option value="">Seleccione...</option>
                <?php
                
                $url = "http://moodlepr.inapayudaspedagogicas.com.co/api/company";
                $json = file_get_contents($url);
                $obj = json_decode($json);
                //var_dump($obj);
                foreach($obj as $ob){ ?>
                  
                  <option value="<?php if($ob->id == "1"){ echo $ob->id; }else{ echo $ob->id.";".$ob->company; } ?>" 
                    data-list="<?php if($ob->id == "1"){ echo 1; } else {echo 0;} ?>"><?php echo strtoupper($ob->company); ?></option>
               <?php } ?>
               </select>
               <small id="company" class="form-text text-muted">Seleccione la empresa donde se encuentra registrado en el caso de elegir otro diligencie el siguiente campo</small>
               </div>
               
                <div class="form-group" style="display:none" id="company_name">
                  <label for="next">Nombre de la Otra (Empresa)</label>
                  <input type="text" class="form-control" id="company">
                  <small id="next" class="form-text text-muted">Escriba la empresa en la que se encuentra registrado</small>
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
                  <label for="address">Dirección</label>
                  <input type="text" class="form-control" id="address" name="address">
                  <small id="address" class="form-text text-muted">Escriba su Dirección (Ejemplo : Bogotá)</small>
                </div>
                

                
                <div class="form-group">
                  <label for="next">Tipo de Vinculación</label>
                   <select class="form-control" id="type" name="typecourse">
                    <option value="virtual">Virtual</option>
                    <option value="presencial">Presencial</option>
                  </select>
                  <small id="next" class="form-text text-muted">Selecccione el tipo de Vinculación a nuestra plataforma</small>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-success" id="send"> Enviar </button>
                </div>

              </form>
            </div>
          </div>

        </div>

      </section>

      
      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
                <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
          <h2 class="mb-3">Laboratorio
            <span class="text-primary" style="font-size:55px">Inap Ayudas Pedagógicas</span>
          </h2>
          <div class="subheading mb-5">Claudia Patricia Mesa M.</a>
          </div>
          <p class="mb-5"> Este es el tutorial de como ingresar a la plataforma paso a paso si desean descargar el tutorial en pdf haga <a href="http://diagnosticar.com.co/moodle/register/tutorial.pdf">click aquí</a></p>
          <iframe width=1020 height=596 frameborder="0" scrolling="no" src="https://screencast-o-matic.com/embed?sc=cF1UlYF0RE&v=5&ff=1" allowfullscreen="true"></iframe>
          
          
          <!--p class="mb-5">Nuestro instituto está integrado por un equipo educadores profesionales Magister, en diversos campos de la Educación, que propende hacer un aporte a la educación Colombiana desde las pruebas Saber, somos líderes en diversas instituciones entre ellas universidades e instituciones pertenecientes a las fuerzas armadas de Colombia y otras que nos certifican.El Instituto Nacional de Ayudas Pedagógicas INAP, medio de los programas desarrollados a nivel Nacional, en cuanto a pruebas de Estado, diplomados, seminarios y otros. Ha ostentado Un gerenciamiento Educativo efectivo, para encontrar un proceso paulatino pero de amplio alcance, en la conducción del sistema educativo público o privado, desde la educación inicial hasta entidades universitarias que brinde mejoramiento permanente al interior de las instituciones educativas en general.</p>
          <p class="mb-5">En este sentido, nuestro instituto, se propone innovar en relación a las pruebas de Estado, incursionando con un Modelo Pedagógico contemporáneo y Universal denominado “TIP” Teoría Investigación y Práctica, que desarrolla Aptitudes y actitudes de Aprendizaje significativo integrando las TICS para una formación integral.</p>
          <p class="mb-5">No obstante, un motivo que nos impulsa a dar lo mejor en el campo educativo, radica en los resultados que en la actualidad presentan algunas instituciones Educativas, por ende, el interés de nuestro instituto radica, en el análisis, que seriamente nos alarma y la manera como ello ha repercutido como consecuencia no favorables en las diversas pruebas de Estado. Donde recuperar el nivel académico y llevarlo a ascender significa para nosotros un baluarte en la contribución a la educación colombiana.</p-->
        </div>
      </section>

    </div>
 </div>
 </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>
    
    <script>
    
    $('#next').click(function(){
    	 var list = $(this).find('option:selected').attr('data-list');
        	if(list == "1"){
        		$('#company_name').show();
        	}else{
        		$('#company_name').hide();
        	}
    });

        $('#company').focusout(function(){
        	var let  = $('#next option:nth-child(2)').val('1;'+$(this).val());
        });

    </script>

  </body>

</html>
