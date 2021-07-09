<?php  

$servername   = 'localhost';
$dbname    = 'moodlepr_cop';
$usernamer    = 'moodlepr_usr';
$passworder   = ':administrator2014!';

$enlace = mysql_connect($servername, $usernamer, $passworder);
if (!$enlace) {
    die('No se pudo conectar : ' . mysql_error());
}

// Hacer que foo sea la base de datos actual
$bd_seleccionada = mysql_select_db($dbname, $enlace);
if (!$bd_seleccionada) {
    die ('No se puede usar : ' . mysql_error());
}

$sql       = 'SELECT * FROM mdl_user';
$resultado = mysql_query($sql, $enlace);

if (!$resultado) {
    echo "Error de BD, no se pudo consultar la base de datos\n";
    echo "Error MySQL: " . mysql_error();
    exit;
}

while ($fila = mysql_fetch_assoc($resultado)) {
   $data[] = $fila; 
}

echo json_encode($data);
mysql_free_result($resultado);

?>