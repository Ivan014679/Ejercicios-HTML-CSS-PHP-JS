<?php
    session_start(); //Dentro de este archivo, se trabajará sesiones
?>
<html>
    <head>
        <title>.:: FORMULARIO INGRESO ::.</title>
    </head>
    <body>
        <form action="iniciar_sesion.php" method="post">
            Usuario:&nbsp;<input type="text" name="usuario">
            <br><br>
            Clave:&nbsp;<input type="password" name="clave">
            <br><br>
            <input type="submit" name="iniciar sesion" value="Iniciar sesión">
        </form>
    </body>
</html>