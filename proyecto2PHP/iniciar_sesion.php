<?php
    session_start(); //Dentro de este archivo, se trabajará sesiones

    include('lib/conexion.php');
    include('lib/personas.php');
    include('lib/personas_dataaccess.php');
        
    $personas = array();
        
    $objConexion = new Conexion();        
    $objConexion -> abrir_conexion(); //En java es con el punto, aquí con la flecha
        
    $objPersonasAD = new Personas_DataAccess();

    $personas = $objPersonasAD -> readSession($objConexion -> pdo, $_POST['usuario'], $_POST['clave']);

    if(count($personas) > 0){
        $_SESSION['nombre'] = $personas[0] -> get('nombres')." ".$personas[0] -> get('apellidos');
        
        header('Location: index.php');
    }else{
        header('Location: login.php');
    }
?>