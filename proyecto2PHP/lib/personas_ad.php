<?php
	class personas_ad {
		public function __construct() {}
		
		public function read($pdo) {
			$sql = "select * from personas";
			$sentencia = $pdo -> prepare($sql);
			$sentencia -> execute();
			
			$resultado = $sentencia -> fetchAll();
			return $resultado;
		}
		
		public function __destruct() {}
	}
?>