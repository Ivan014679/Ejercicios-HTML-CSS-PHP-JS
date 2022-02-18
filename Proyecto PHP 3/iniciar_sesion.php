<?php
    session_start(); //Dentro de este archivo, se trabajará sesiones

    if($_POST['usuario'] == "admin" && $_POST['clave'] == "admin"){
        $_SESSION['nombre'] = "Un valor X";
        
        header('Location: index.php');
    }else{
        header('Location: login.php');
    }
?>