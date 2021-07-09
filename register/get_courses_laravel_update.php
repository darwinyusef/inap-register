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




$id = $_GET['id'];
$url = $_GET['url'];



$sql = "UPDATE `mdl_course` SET `url` = '".$url."' WHERE `mdl_course`.`id` = '".$id."';";


 
$result = mysql_query($sql) or die(mysql_error());

 if (!$result) {
    die('Consulta no válida: ' . mysql_error());
    $_SESSION['move'] = 0;
    echo 'Error';
 }else{
      $id = "SELECT *  FROM `mdl_course` WHERE `id` = '".$id."';";
    $list = mysql_query($id) or die(mysql_error());
    $idfin = (int)mysql_fetch_array($list)['id'];
    $response = array('response' => 'ok', 'id' => $idfin);
    echo json_encode($response);
    header("Location:".$_SERVER['HTTP_REFERER']);
 }
 

?>