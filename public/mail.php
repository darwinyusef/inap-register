<?php

/*$to = "wsgestor@gmail.com";
$subject = "Asunto del email";
$message = "Este es mi primer envío de email con PHP";
 
    mail($to, $subject, $message, 'From: no-reply@diagnosticar.com.co');
echo 'email enviado'; */


$destinatario = 'wsgestor@gmail.com';
$asunto = "Usuario y contraseña | Inap Ayudas Pedagógicas";
$cuerpo = '
<html>
<head>
   <title>Inap Ayudas Pedagógicas</title>
</head>
<body>
<h3>Bienvenido señor@ '.$firstname.' '.$lastname.' a INAP!</h3>
<p>
<b>Con el fin de generar un ambiente cercano a la realidad evaluativa Habilitamos un usuario y contraseña para que usted pueda hacer uso de la plataforma academica, para la gestión Los cursos de Diagnosticar.com.co</b> su Usuario es: 
 <p></p>
 su Contraseña es: LabDiagnosticar@2021
</p>
<p></p>
<p>Se requiere que usted tan pronto ingrese a la plataforma moodle modifique los datos de acceso para mayor seguridad</p>
para acceder click aquí.

    <a href="http://inapayudaspedagogicas.com.co/moodle/login/index.php"> http://inapayudaspedagogicas.com.co/moodle/login/index.php</a></p>

    <h4>
    Cordialmente:
    <p></p>
    <p></p>
    Equipo de desarrollo
    <p></p>
    Inap Ayudas Pedagógicas 2021
    </h4>
</body>
</html>
';

//para el envío en formato HTML
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//dirección del remitente
    $headers .= 'From: no-reply@diagnosticar.com.co';
    mail($destinatario,$asunto,$cuerpo,$headers);


?>