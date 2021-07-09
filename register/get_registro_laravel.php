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
$identidad = $_POST['card_id'];
$email = $_POST['email'];
$password = '$2y$10$nYIqAaqnjI4LNJBGCg1qj.jXOC9gq9pr6rG9uN1oHc.93RIQZbJqa';
$firstname = $_POST['first'];
$lastname = $_POST['last'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];
$institution = $_POST['institution'];
$department = $_POST['department'];
$address = $_POST['address'];
$city = $_POST['city'];
$typecourse = $_POST['typecourse'];

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
    
    echo 'Error';
 }else{
    
    $id = "SELECT id FROM mdl_user ORDER BY id DESC LIMIT 1";
    $list = mysql_query($id) or die(mysql_error());
    $idfin = (int)mysql_fetch_array($list)['id'];
    
    $response = array('response' => 'ok', 'id' => $idfin);
    
    echo json_encode($response);
    
 }

?>