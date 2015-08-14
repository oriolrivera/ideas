<?php
include("clases/conect.php");
$mensaje = $_POST['mensaje'];
$tipo = $_POST['tipo'];

$timestamp = date("Y-m-d H:i:s");

$q = "INSERT INTO mensajes values ('','$mensaje','$timestamp','1','$tipo')";
$res = mysql_query($q) or die (mysql_error());

$arrayjson = array();

$arrayjson[] = array(
					'tipo'          => $tipo,//tipo de actualizacion
					'mensaje'      => $mensaje,//mensaje
					'fecha'         => $timestamp,//fecha de envio
					'actualizacion' => '1'
);

echo json_encode($arrayjson);
?>