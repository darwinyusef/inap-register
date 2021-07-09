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


$identidad = $_POST['identidad'];
$email = $_POST['email'];
$password = '$2y$10$nYIqAaqnjI4LNJBGCg1qj.jXOC9gq9pr6rG9uN1oHc.93RIQZbJqa';



$validate1 = "SELECT COUNT(*) 'user' FROM `mdl_user` WHERE `idnumber` LIKE '".$identidad."' AND `email` LIKE '".$email."' ORDER BY `id` ASC";

$valresult = mysql_query($validate1) or die(mysql_error());

if (!$valresult) {
    die('Consulta no válida: ' . mysql_error());

     header('Location: oldresponseuser.php?alert=danger&ms=Error en la consulta');
    
}else{
    
if( (int)mysql_fetch_array($valresult)['user'] > 0 ){
    
$sql = "SELECT id, username FROM `mdl_user` WHERE `idnumber` LIKE '".$identidad."' AND `email` LIKE '".$email."' ORDER BY `id` ASC";
$result = mysql_query($sql) or die(mysql_error());

$idusert = mysql_fetch_array($result);


$sql2 = "UPDATE `mdl_user` SET `password` = '".$password."' WHERE `mdl_user`.`id` = '".(int)$idusert['id']."'";

$result = mysql_query($sql2) or die(mysql_error());


 if (!$result) {
    die('Consulta no válida: ' . mysql_error());
    header('Location: oldresponseuser.php?alert=danger&ms=Error en la base de datos');
 }else{
     

$destinatario = $email;
$asunto = "Restauracion de contraseña | Inap Ayudas Pedagógicas";
$asuntoadmin = "Restauracion de contrasena | Inap Ayudas Pedagógicas";

$admin = 'wsgestor@gmail.com';
$lab = 'desyugo@hotmail.com';

$subject = "Usuario y contraseña | Inap Ayudas Pedagógicas";

$message = "Usted ha restaurado su contraseña. Su usuario es: ".$idusert['username']."  su Contraseña es: InapAyudasPedagogicas@2018 Para dar inicio al curso Online, es de vital importancia enviar un mensaje al whatsapp al +57 3202051241 para que podamos matricularle. este proceso se hará en las siguientes 24 horas luego de inciar el chat por whatsapp; ingresa a diagnosticar.com.co/moodle";


$messageadmin = "Se ha realizado una restauración el usuario con ID ".(int)$idusert['id']." a Inap Ayudas Pedagógicas! Usuario es: $identidad su Contraseña es: InapAyudasPedagogicas@2018 solicitele el cambio de contraseña Cordialmente: Inap Ayudas Pedagógicas 2021";
 
    mail($destinatario, $asunto, $message, 'From: wsgestor@gmail.com');
    mail($lab, $asuntoadmin, $messageadmin, 'From: wsgestor@gmail.com');

     echo 'email enviado'; 
 }

 header('Location: oldresponseuser.php?alert=success&ms=Se ha restaurado la contraseña');
 
    }else{

        header('Location: oldresponseuser.php?alert=danger&ms=Error en los datos ingresados');
    }
}


?>
