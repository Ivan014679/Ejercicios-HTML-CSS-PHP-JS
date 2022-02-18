<?php
	session_start();
	
	include('lib/conexion.php');
	include('lib/personas.php');
	include('lib/personas_ad.php');
	
	$personas = array();
	
	$objConexion = new conexion();
	$objConexion -> abrir_conexion();
	
	$objPersonasAD = new personas_ad();
	
	$personas = $objPersonasAD -> readSession($objConexion -> pdo, $_POST['usuario'], $_POST['clave']);

	if(count($personas) > 0) {
		$_SESSION['nombre'] = $personas[0] -> get('nombres') . " " . $personas[0] -> get('apellidos');
		
		header('Location: index.php');
	} else {
		header('Location: login.php');
	}
?>