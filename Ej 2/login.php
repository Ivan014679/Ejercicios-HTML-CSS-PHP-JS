<?php
	session_start();
?>
<html>
	<head>
		<title>.:: INICIO DE SESION ::.</title>
	</head>
	<body>
		<form action="iniciar_sesion.php" method="post">
			Usuario:&nbsp;
			<input type="text" name="usuario">
			<br><br>
			Clave:&nbsp;
			<input type="password" name="clave">
			<br><br>
			<input type="submit" value="Iniciar sesion">
		</form>
	</body>
</html>








