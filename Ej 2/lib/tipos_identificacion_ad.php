<?php
	class tipos_identificacion_ad {
		public function __construct() {}
		
		public function read($pdo) {
			$sql = "select * from tipos_identificacion";
			$sentencia = $pdo -> prepare($sql);
			$sentencia -> execute();
			
			$resultado = $sentencia -> fetchAll();
            $tiposIdentificacion = array();
			
			foreach($resultado as $dato) {
				$objTiposIdentificacion = new tipos_identificacion();
				$objTiposIdentificacion -> set('id', $dato['id']);
				$objTiposIdentificacion -> set('nombre', $dato['nombre']);
				$objTiposIdentificacion -> set('abreviatura', $dato['abreviatura']);
				array_push($tiposIdentificacion, $objTiposIdentificacion);
				$objTiposIdentificacion -> __destruct();
			}
			
			return $tiposIdentificacion;
		}
        
        public function findById($pdo, $id) {
			$sql = "select * from tipos_identificacion where id=?";
			$sentencia = $pdo -> prepare($sql);
			$sentencia -> execute(array($id));
			
			$resultado = $sentencia -> fetchAll();
			
			foreach($resultado as $dato) {
				$objtiposIdentificacion = new tipos_identificacion();
				$objtiposIdentificacion -> set('id', $dato['id']);
				$objtiposIdentificacion -> set('nombre', $dato['nombre']);
				$objtiposIdentificacion -> set('abreviatura', $dato['abreviatura']);
                $objAux = $objtiposIdentificacion;
				$objtiposIdentificacion -> __destruct();
			}
			
            return $objAux;
		}
		
		public function __destruct() {}
	}
?>