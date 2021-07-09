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
$email = $_POST['email'];
$firstname = $_POST['first'];
$lastname = $_POST['last'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];
$institution = $_POST['intitution'];
$department = $_POST['department'];
$address = $_POST['address'];
$city = $_POST['city'];
$typecourse = $_POST['typecourse'];
$gender = $_POST['gender'];
$bird = $_POST['bird'];
$pay = $_POST['pay'];
$allCourses = $_POST['allCourses'];

 $sql = "UPDATE `mdl_user` SET `firstname` = '".$firstname."', `lastname` = '".$lastname."', `email` = '".$email."', `phone1` = '".$phone1."', `phone2` = '".$phone2."', `institution` = '".$institution."', `address` = '".$institution."' WHERE `mdl_user`.`id` = '".$id."';";
 
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