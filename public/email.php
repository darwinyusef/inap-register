<?php
// El mensaje
$mensaje = "Correo de prueba";

// Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
$mensaje = wordwrap($mensaje, 70, "\r\n");

// Enviarlo
mail('dzapata@imaginacolombia.com', 'Mi título', $mensaje);
?>