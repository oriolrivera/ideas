<?php

//Le decimos a PHP que vamos a devolver objetos JSON
header('Content-type: application/json');

//Importamos la libreria de ActiveRecord
require_once 'php-activerecord/ActiveRecord.php';
require('Pusher.php');
//Configuracion de ActiveRecord
ActiveRecord\Config::initialize(function($cfg)
{
	//Ruta de una carpeta que contiene los modelos de la BD (tablas)
	$cfg->set_model_directory('models');
	//Creamos la conexion
	$cfg->set_connections(array(
		'development' => 'mysql://USUARIO:PASS@HOST/NOMBRE_BD'));
});


//Peticion para devolver los diferentes paises regisrados en ls BD
if(isset($_GET['getMarcadores'])){
	//Hacemos la consulta
	$marcadores = Marcador::find('all');
	//Devolvemos los registros de la BD en un formato JSON
	echo json_encode(datosJSON($marcadores));
}

//Peticion para guardar un nuevo marcador y repartirlo a los demas usuarios
if(isset($_GET['nuevoMarcador'])){
	unset($_GET['nuevoMarcador']);
	$marcador = Marcador::create($_GET);
	if($marcador){
		$res['scs'] = true;
		$res['msg'] = 'Marcador Agregado Correctamente';
		/*creamos un objeto pusher*/
		$pusher = new Pusher('KEY', 'SECRET', 'API_ID');
		//enviamos los datos del marcador recibido a todos los clientes conectados
		$pusher->trigger('marcador', 'nuevo', array('latitud' => $_GET['latitud'],'longitud' => $_GET['longitud'],'descripcion' => strip_tags($_GET['descripcion']),'src' => $_GET['src']));
		echo json_encode($res);
	}
	else{
		$res['scs'] = false;
		$res['msg'] = 'Error al agregar el marcador';
		echo json_encode($res);
	}
}


//funcion que convierte objetos regresados por la BD a JSON
function datosJSON($data, $options = null) {
	$out = "[";
	foreach( $data as $row) { 
		if ($options != null)
			$out .= $row->to_json($options);
		else 
			$out .= $row->to_json();
		$out .= ",";
	}
	$out = rtrim($out, ',');
	$out .= "]";
	return $out;
}


?>