<?php
	session_start();
	
	if(!array_key_exists('nombre',$_SESSION)) {
		header('Location: login.php');
	}

    include('lib/conexion.php');
    include('lib/tipos_identificacion.php');
    include('lib/tipos_identificacion_ad.php');
			
    $tiposIdentificacion = array();
			
    $objConexion = new conexion();
    $objConexion -> abrir_conexion();

    $objTiposIdentificacionAD = new tipos_identificacion_ad();
    $tiposIdentificacion = $objTiposIdentificacionAD -> read($objConexion -> pdo);

    $accion = "REGISTRAR";
    $id = 0;
    $nombres = "";
    $apellidos = "";
    $edad = "";
    $telefono = "";
    $usuario = "";
    $clave = "";
    $id_tipo_identificacion = "";
    $numero_identificacion = "";

    if(array_key_exists('id', $_POST)){
        $accion = "EDITAR";
        $id = $_POST['id'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $edad = $_POST['edad'];
        $telefono = $_POST['telefono'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $id_tipo_identificacion = $_POST['id_tipo_identificacion'];
        $numero_identificacion = $_POST['numero_identificacion'];
    }    
?>
<html>
	<head>
		<title>.:: REGISTRAR PERSONAS ::.</title>
	</head>
	<body>
		<form action="index.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
			Nombres:&nbsp;
			<input type="text" name="nombres" value="<?php echo $nombres; ?>">
			<br><br>
			Apellidos:&nbsp;
			<input type="text" name="apellidos" value="<?php echo $apellidos; ?>">
			<br><br>
			Edad:&nbsp;
			<input type="text" name="edad" value="<?php echo $edad; ?>">
			<br><br>
			Telefono:&nbsp;
			<input type="text" name="telefono" value="<?php echo $telefono; ?>">
			<br><br>
            <?php
                if($accion == "REGISTRAR"){
            ?>
			Nombre de usuario:&nbsp;
			<input type="text" name="usuario" value="<?php echo $usuario; ?>">
			<br><br>
			Clave:&nbsp;
			<input type="password" name="clave" value="<?php echo $clave; ?>">
			<br><br>
            <?php
                }
            ?>
            Tipo identificación:&nbsp;
            <select name="id_tipo_identificacion">
                <?php
                    foreach($tiposIdentificacion as $dato){
                        if($id_tipo_identificacion == $dato -> get('id')){
                            echo "<option value='".$dato -> get('id')."' selected>".$dato -> get('nombre')."</option>";
                        }else{
                            echo "<option value='".$dato -> get('id')."'>".$dato -> get('nombre')."</option>";
                        }
                    }
                ?>
            </select>
            <br><br>
            N° de identificación:&nbsp;
			<input type="text" name="numero_identificacion" value="<?php echo $numero_identificacion; ?>">
			<br><br>
			<input type="submit" name="tipo_envio" value="<?php echo $accion; ?>">
		</form>
	</body>
</html>







