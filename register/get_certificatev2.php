<?php

$servername   = 'localhost';
$dbname    = 'moodlepr_cop';
$usernamer    = 'moodlepr_usr';
$passworder   = ':administrator2014!';


if( !isset($_POST) ){
    var_dump(0);
}

$enlace = mysql_connect($servername, $usernamer, $passworder);
if (!$enlace) {
    die('No se pudo conectar : ' . mysql_error());
}

// Hacer que foo sea la base de datos actual
$bd_seleccionada = mysql_select_db($dbname, $enlace);
if (!$bd_seleccionada) {
    die ('No se puede usar : ' . mysql_error());
}



$id = $_POST['id'];
$certificate = $_POST['certificate'];
$cedula = $_POST['cedula'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$certificate_description = $_POST['certificate_description'];
$othercompany = $_POST['othercompany'];


$sql = "UPDATE `mdl_user` SET certificate='".$certificate."', institution='".$othercompany."', certificate_description= '".$certificate_description."' WHERE id='".$id."'";

 $result = mysql_query($sql) or die(mysql_error());


 if (!$result) {
    die('Consulta no válida: ' . mysql_error());
    $_SESSION['move'] = 0;
    header('Location: index.php#inscription');
 }else{
     
   if($certificate == 1){
    $destinatario = $email;
    $asunto = "Certificacion Digital Generada | Inap Ayudas Pedagógicas";
    $message = "Cordial saludo Señor@ $firstname $lastname le informamos que su certificacion ha sido generada con numero de Cedula ($cedula), El curso que realizo ha sido aprobado. \n El concepto de aprobación es el sigiente: \n $certificate_description \n, Cordialmente: Inap Ayudas Pedagógicas 2021 puede descargar el documento ingresando a: http://moodlepr.inapayudaspedagogicas.com.co/backend/moodle/certificate/".$id;

    echo $destinatario;
    mail($destinatario, $asunto, $message, 'From: wsgestor@gmail.com');
    echo 'email enviado'; 
       
   }  
   
}
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

?>
