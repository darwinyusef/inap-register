
<?php 
    if(!empty($_GET)) { 
        $alert =  $_GET['alert'];
        $ms =  $_GET['ms'];
    }else{
        $alert = 'default'; 
        $ms = null; 
    }

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Respuesta - Usuario Antiguo | Inap Ayudas Pedagógicas </title>

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

<div class="alert alert-<?php echo $alert ?>">
  <?php echo $ms ?>
</div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Inap Ayudas Pedagógicas</span>
        <span class="d-none d-lg-block">
          <a class="nav-link js-scroll-trigger" href="index.php#inscription"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="http://moodlepr.inapayudaspedagogicas.com.co/portal/img/logo.png" alt=""></a>
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php#about">Quienes Somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php#inscription">Volver</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

      
      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
            <?php if(!empty($_GET)) {  ?>
                <h1 class="mb-3"><?php echo strtoupper( $_GET['ms'] ); ?> </h1>
            <?php }else {?>
              <h1 class="mb-3">EL USUARIO YA SE ENCUENTRA
                <span class="text-primary">REGISTRADO</span>
              </h1>
            <?php }?>
          <div class="subheading mb-5">Inap Ayudas Pedagógicas</a>
          </div>
           <h3 class="mb-5">Sus Datos ya se encuentran registrados en nuestras bases de datos para continuar siga cualquiera de las siguientes opciones</h3>
           <br/>
           
           <a href="http://diagnosticar.com.co/moodle/login/index.php" class="btn btn-success btn-lg">Ingresar a Moodle</a>
           <a href="https://api.whatsapp.com/send?phone=573202051241&text=Hola%20acabo%20de%20inscribirme" class="btn btn-primary btn-lg">Contactar el Soporte</a>
           <a href="#" class="btn btn-danger btn-lg" id="btn-register">Restaurar la contraseña</a>
           
           <br><br>  
           
           <form action="get_changepass.php" id="register" style="display:none" method="post" style="width:100%">
                
                <h3 class="mb-5">Para restaurar la contraseña debe incluir los campos solicitados a continuación</h3>
                
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
                  <button type="submit" class="btn btn-success" id="send"> Enviar </button>
                </div>
           </form>
           
           
           <h3 class="mb-5">Cualquier problema o consulta comuniquese a través de whatsapp</h3>
           <a href="https://api.whatsapp.com/send?phone=573202051241&text=Hola%20acabo%20de%20inscribirme"><img src="http://diagnosticar.com.co/moodle/register/img/whatsapp.jpg" alt="Whatsapp" style="width:80%; margin:20px"/></a>
           <br/>
          <p class="mb-5"> Este es el tutorial de como ingresar a la plataforma paso a paso si desean descargar el tutorial en pdf haga <a href="http://diagnosticar.com.co/moodle/register/tutorial.pdf">click aquí</a></p>
          <iframe width=100% height=596 frameborder="0" scrolling="no" src="https://screencast-o-matic.com/embed?sc=cF1UlYF0RE&v=5&ff=1" allowfullscreen="true"></iframe>
        </div>
      </section>

    </div>




    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>
    
    <script>
        $('#btn-register').click(function(e){
            e.preventDefault();
        	$('#register').toggle();
        });
    </script>

  </body>

</html>
