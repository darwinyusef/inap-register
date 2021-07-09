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


//$username = $_POST['username'];
$identidad = $_POST['identidad'];
$email = $_POST['email'];
$password = '$2y$10$nYIqAaqnjI4LNJBGCg1qj.jXOC9gq9pr6rG9uN1oHc.93RIQZbJqa';
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];
$institution = $_POST['institution'];
$department = $_POST['department'];
$address = $_POST['address'];
$city = $_POST['city'];
$typecourse = $_POST['typecourse'];
$gender = $_POST['gender'];
$bird = $_POST['bird'];
$pay = $_POST['pay'];
$allCourses = $_POST['allCourses'];

$fecha = new DateTime(); 
$date = $fecha->getTimestamp(); 




$validate1 = "SELECT COUNT(*) 'email' FROM `mdl_user` WHERE `email` = '".$email."'"; 
$valresult = mysql_query($validate1) or die(mysql_error());

if (!$valresult) {
    die('Consulta no válida: ' . mysql_error());
    $_SESSION['move'] = 0;
    header('Location: index.php#inscription');
}else{
    if( (int)mysql_fetch_array($valresult)['email'] > 0 ){
        header('Location: oldresponseuser.php');
    }
}


$validate2 = "SELECT COUNT(*) 'ident' FROM `mdl_user` WHERE `idnumber` = '".$identidad."'"; 
$identresult = mysql_query($validate2) or die(mysql_error());

if (!$identresult) {
    die('Consulta no válida: ' . mysql_error());
    $_SESSION['move'] = 0;
    header('Location: index.php#inscription');
}else{
    
    if( (int)mysql_fetch_array($identresult)['ident'] > 0 ){
        header('Location: oldresponseuser.php');
    }
}

$sql = "INSERT INTO `mdl_user` (`id`, `auth`, `confirmed`, `policyagreed`, `deleted`, `suspended`, `mnethostid`, `username`, `password`, `idnumber`, `firstname`, `lastname`, `email`, `emailstop`, `icq`, `skype`, `yahoo`, `aim`, `msn`, `phone1`, `phone2`, `institution`, `department`, `address`, `city`, `country`, `lang`, `calendartype`, `theme`, `timezone`, `firstaccess`, `lastaccess`, `lastlogin`, `currentlogin`, `lastip`, `secret`, `picture`, `url`, `description`, `descriptionformat`, `mailformat`, `maildigest`, `maildisplay`, `autosubscribe`, `trackforums`, `timecreated`, `timemodified`, `trustbitmask`, `imagealt`, `lastnamephonetic`, `firstnamephonetic`, `middlename`, `alternatename`, `certificate`, `certificate_description`, `typecourse`) VALUES (NULL, 'manual', '1', '0', '0', '0', '1', '".$identidad."', '".$password."', '".$identidad."', '".$firstname."', '".$lastname."', '".$email."', '0', '', '', '', '', '', '".$phone1."', '".$phone2."', '".$institution."',  '".$department."', '".$address."', '".$city."', 'CO', 'es', 'gregorian', '', '99', '0', '0', '0', '0', '', '', '0', '', NULL, '1', '1', '0', '2', '1', '0', '".$date."', '0', '0', NULL, NULL, NULL, NULL, NULL, '0', NULL, '".$typecourse."')";

 $result = mysql_query($sql) or die(mysql_error());


 if (!$result) {
    die('Consulta no válida: ' . mysql_error());
    $_SESSION['move'] = 0;
    header('Location: index.php#inscription');
 }else{

$destinatario = $email;
$asunto = "Usuario y contraseña | Inap Ayudas Pedagógicas";
$asuntoadmin = "Nuevo Usuario para Matricular | Inap Ayudas Pedagógicas";

$admin = 'wsgestor@gmail.com';
$lab = 'desyugo@hotmail.com';

$subject = "Usuario y contraseña | Inap Ayudas Pedagógicas";

$message = "Bienvenido señor@ $firstname $lastname a Inap Ayudas Pedagógicas! Usuario es: $identidad  su Contraseña es: InapAyudasPedagogicas@2018 Para dar inicio al curso Online, es de vital importancia enviar un mensaje al whatsapp al +57 3202051241 para que podamos matricularle pues hasta el momento solo se encuentra inscrito. este proceso se hará en las siguientes 24 horas luego de inciar el chat por whatsapp; ingresa a diagnosticar.com.co/moodle";


    

$messageadmin = "Se ha realizado una preinscripción a nombre de $firstname $lastname a Inap Ayudas Pedagógicas! Usuario es: $identidad su Contraseña es: InapAyudasPedagogicas@2018 solicitele el cambio de contraseña Cordialmente: Inap Ayudas Pedagógicas 2018";
 
 
    mail($destinatario, $asunto, $message, 'From: desyugo@hotmail.com');
   // mail($admin, $asuntoadmin, $messageadmin, 'From: wsgestor@gmail.com');
    mail($lab, $asuntoadmin, $messageadmin, 'From: wsgestor@gmail.com');

     echo 'email enviado'; 
 }


 header('Location: response.php');

?>
