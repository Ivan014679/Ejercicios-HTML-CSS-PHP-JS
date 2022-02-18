<?php
    session_start();

    if(!array_key_exists('nombre',$_SESSION)){
        header('Location: login.php');
    }
?>
<html>
    <head>
        <title>.:: REGISTRO DE PERSONAS ::.</title>
    </head>
    <body>
        <form action = "index.php" method = "post">
            Nombres:&nbsp;
            <input type="text" name="nombres">
            <br>
            Apellidos:&nbsp;
            <input type="text" name="apellidos">
            <br>
            Edad:&nbsp;
            <input type="text" name="edad">
            <br>
            Tel&eacute;fono:&nbsp;
            <input type="text" name="telefono">
            <br><br>
            <input type="submit" value="Registrar persona">
        </form>
    </body>
</html>