<?php
	class personas_ad {
		public function __construct() {}
		
		public function read($pdo) {
			$sql = "select * from personas";
			$sentencia = $pdo -> prepare($sql);
			$sentencia -> execute();
			
			$resultado = $sentencia -> fetchAll();
			$personas = array();
			
			foreach($resultado as $dato) {
				$objPersonas = new personas();
				$objPersonas -> set('id', $dato['id']);
				$objPersonas -> set('nombres', $dato['nombres']);
				$objPersonas -> set('apellidos', $dato['apellidos']);
				$objPersonas -> set('edad', $dato['edad']);
				$objPersonas -> set('telefono', $dato['telefono']);
				$objPersonas -> set('usuario', $dato['usuario']);
				$objPersonas -> set('clave', $dato['clave']);
                
                $objTiposIdentificacionAD = new tipos_identificacion_ad();
                $objPersonas -> set('tipo_identificacion', $objTiposIdentificacionAD -> findById($pdo, $dato['id_tipo_identificacion']));
                $objTiposIdentificacionAD -> __destruct();
                
                $objPersonas -> set('numero_identificacion', $dato['numero_identificacion']);
				array_push($personas, $objPersonas);
				$objPersonas -> __destruct();
			}
			
			return $personas;
		}
		
		public function readSession($pdo, $usuario, $clave) {
			$sql = "select * from personas where usuario=? and clave=?";
			$sentencia = $pdo -> prepare($sql);
			$sentencia -> execute(array($usuario, md5($clave)));
			
			$resultado = $sentencia -> fetchAll();
			$personas = array();
			
			foreach($resultado as $dato) {
				$objPersonas = new personas();
				$objPersonas -> set('id', $dato['id']);
				$objPersonas -> set('nombres', $dato['nombres']);
				$objPersonas -> set('apellidos', $dato['apellidos']);
				$objPersonas -> set('edad', $dato['edad']);
				$objPersonas -> set('telefono', $dato['telefono']);
				array_push($personas, $objPersonas);
				$objPersonas -> __destruct();
			}
			
			return $personas;
		}
		
		public function save($pdo, $objAux) {
            $id = $objAux -> get('id');
			$nombres = $objAux -> get('nombres');
			$apellidos = $objAux -> get('apellidos');
			$edad = $objAux -> get('edad');
			$telefono = $objAux -> get('telefono');
			$usuario = $objAux -> get('usuario');
			$clave = $objAux -> get('clave');
			$id_tipo_identificacion = $objAux -> get('tipo_identificacion') -> get('id');
			$numero_identificacion = $objAux -> get('numero_identificacion');
            
            if($id == 0){
                $sql = "insert into personas (nombres,apellidos,edad,telefono,usuario,clave,id_tipo_identificacion,numero_identificacion) values (?,?,?,?,?,?,?,?)";
                $sentencia = $pdo -> prepare($sql);
                $sentencia -> execute(array($nombres, $apellidos, $edad, $telefono, $usuario, md5($clave), $id_tipo_identificacion, $numero_identificacion));
            }else{
                $sql = "update personas set nombres=?,apellidos=?,edad=?,telefono=?,id_tipo_identificacion=?,numero_identificacion=? where id=?";
                $sentencia = $pdo -> prepare($sql);
                $sentencia -> execute(array($nombres, $apellidos, $edad, $telefono, $id_tipo_identificacion, $numero_identificacion, $id));
            }
		}
		
		public function delete($pdo, $objAux) {
            $id = $objAux -> get('id');
			$sql = "delete from personas where id=?";
			$sentencia = $pdo -> prepare($sql);
			$sentencia -> execute(array($id));
		}
		
		public function __destruct() {}
	}
?>






