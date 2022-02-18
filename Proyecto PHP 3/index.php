<?php
    session_start(); //Dentro de este archivo, se trabajará sesiones

    /*if(!array_key_exists('nombre',$_SESSION)){
        header('Location: login.php');
    }*/
?>
<html>
    <head>
        <title>.:: ARREGLOS PHP ::.</title>
    </head>
    <body>
        <?php
            include('lib/conexion.php');
            include('lib/personas.php');
            include('lib/personas_dataaccess.php');
        
            $objConexion = new Conexion();        
            $objConexion -> abrir_conexion(); //En java es con el punto, aquí con la flecha
        
            $objPersonasAD = new Personas_DataAccess();
        
            $objPersonasAD -> read($objConexion -> pdo);
        ?>
        <table border=1>
            <tr>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>EDAD</th>
                <th>TELÉFONO</th>
            </tr>
        <?php
            $arreglo = array();
            $arreglo[0] = 5;
            $arreglo[1] = 10;
            $arreglo[2] = 15;
        
            //print_r($arreglo);
            
            for($i = 0;$i < count($arreglo);$i++){
                echo $arreglo[$i]."<br>";
            }
        
            $personas = array();
            $personas[0]['nombres'] = "Luis";
            $personas[0]['apellidos'] = "Benavides";
            $personas[0]['edad'] = 35;
            $personas[0]['telefono'] = 123;
        
            $personas[1]['nombres'] = "Jessica";
            $personas[1]['apellidos'] = "Chiles";
            $personas[1]['edad'] = 24;
            $personas[1]['telefono'] = "Desconocido";
            
            $personas[2]['nombres'] = "Andrés";
            $personas[2]['apellidos'] = "Peña";
            $personas[2]['edad'] = "No le he preguntado";
            $personas[2]['telefono'] = 456;
        
            $personas[3]['nombres'] = "Ivan";
            $personas[3]['apellidos'] = "Narvaez";
            $personas[3]['edad'] = 20;
            $personas[3]['telefono'] = 789;
        
            /*for($i = 0;$i < count($personas);$i++){
                echo "<tr>";
                for($j = 0;$j < count($personas[$i]);$j++){
                    echo "<td>".$personas[$i][$j]."</td>";
                }
                echo "</tr>";
            }
            for($i = 0;$i < count($personas);$i++){
                echo "<tr>";
                echo "<td>".$personas[$i]['nombres']."</td>";
                echo "<td>".$personas[$i]['apellidos']."</td>";
                echo "<td>".$personas[$i]['edad']."</td>";
                echo "<td>".$personas[$i]['telefono']."</td>";
                echo "</tr>";
            }*/
            
            foreach($personas as $fila) {
                echo "<tr>";
                echo "<td>".$fila['nombres']."</td>";
                echo "<td>".$fila['apellidos']."</td>";
                echo "<td>".$fila['edad']."</td>";
                echo "<td>".$fila['telefono']."</td>";
                echo "</tr>";
            }
        ?>
        </table>
        <br>
        <a href="cerrar_sesion.php">Cerrar sesión</a>
    </body>
</html>