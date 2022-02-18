<?php
    session_start();
    session_destroy(); //para cerrar una sesion

    header('Location: index.php');
?>