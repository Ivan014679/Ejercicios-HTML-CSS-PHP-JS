<?php
	session_start();
	
	if(!array_key_exists('nombre',$_SESSION)) {
		header('Location: login.php');
	}
?>
<html>
	<head>
		<title>.:: ARREGLOS PHP ::.</title>
	</head>
	<body>
		Bienvenido <?php echo $_SESSION['nombre']; ?>
		<br><br>
		<?php
			include('lib/conexion.php');
			include('lib/personas.php');
			include('lib/personas_ad.php');
            include('lib/tipos_identificacion.php');
			include('lib/tipos_identificacion_ad.php');
			
			$personas = array();
			
			$objConexion = new conexion();
			$objConexion -> abrir_conexion();
			
			$objPersonasAD = new personas_ad();
			
			if(array_key_exists('nombres', $_POST)) {
				$objPersonas = new personas();
                $objPersonas -> set('id', $_POST['id']);
				$objPersonas -> set('nombres', $_POST['nombres']);
				$objPersonas -> set('apellidos', $_POST['apellidos']);
				$objPersonas -> set('edad', $_POST['edad']);
				$objPersonas -> set('telefono', $_POST['telefono']);
                if($_POST['tipo_envio'] == "REGISTRAR"){
                    $objPersonas -> set('usuario', $_POST['usuario']);
				    $objPersonas -> set('clave', $_POST['clave']);
                }
                
                $objTiposIdentificacionAD = new tipos_identificacion_ad();
                $objPersonas -> set('tipo_identificacion', $objTiposIdentificacionAD -> findById($objConexion -> pdo, $_POST['id_tipo_identificacion']));
                $objTiposIdentificacionAD -> __destruct();
                
                $objPersonas -> set('numero_identificacion', $_POST['numero_identificacion']);
				$objPersonasAD -> save($objConexion -> pdo, $objPersonas);
				$objPersonas -> __destruct();
			}else if(array_key_exists('id', $_POST)){
                $objPersonas = new personas();
                $objPersonas -> set('id', $_POST['id']);
				$objPersonasAD -> delete($objConexion -> pdo, $objPersonas);
                $objPersonas -> __destruct();
			}
			
			$personas = $objPersonasAD -> read($objConexion -> pdo);
		?>
		<table border="1">
			<tr>
				<th>NOMBRES</th>
				<th>APELLIDOS</th>
				<th>EDAD</th>
				<th>TELEFONO</th>
				<th>USUARIO</th>
				<th>TIPO IDENTI.</th>
                <th>N° IDENTI.</th>
				<th>OPCIONES</th>
			</tr>
		<?php
			foreach($personas as $fila) {
				echo "<tr>";
				echo "<td>".$fila -> get('nombres')."</td>";
				echo "<td>".$fila -> get('apellidos')."</td>";
				echo "<td>".$fila -> get('edad')."</td>";
				echo "<td>".$fila -> get('telefono')."</td>";
				echo "<td>".$fila -> get('usuario')."</td>";
				echo "<td>".$fila -> get('tipo_identificacion') -> get('nombre')."</td>";
				echo "<td>".$fila -> get('numero_identificacion')."</td>";
				echo "<td>
					<form  action='formulario_personas.php' method='post'>
						<input type='hidden' name='id' value='".$fila -> get('id')."'>
                        <input type='hidden' name='nombres' value='".$fila -> get('nombres')."'>
                        <input type='hidden' name='apellidos' value='".$fila -> get('apellidos')."'>
                        <input type='hidden' name='edad' value='".$fila -> get('edad')."'>
                        <input type='hidden' name='telefono' value='".$fila -> get('telefono')."'>
                        <input type='hidden' name='usuario' value='".$fila -> get('usuario')."'>                        
                        <input type='hidden' name='clave' value='".$fila -> get('clave')."'>
                        <input type='hidden' name='id_tipo_identificacion' value='".$fila -> get('tipo_identificacion') -> get('id')."'>
                        <input type='hidden' name='numero_identificacion' value='".$fila -> get('numero_identificacion')."'>
						<input type='submit' value='Editar'>
					</form>
                    <form method='post'>
						<input type='hidden' name='id' value='".$fila -> get('id')."'>
						<input type='submit' value='Eliminar'>
					</form>
				</td>";
				echo "</tr>";
			}
			
		?>
		</table>
		<br>
		<a href="formulario_personas.php">Registrar nueva persona</a>
		<br>
		<a href="cerrar_sesion.php">Cerrar sesion</a>
	</body>
</html>








