<?php
	class personas {
		private $id;
		private $nombres;
		private $apellidos;
		private $edad;
		private $telefono;
		private $usuario;
		private $clave;
        private $tipo_identificacion;
        private $numero_identificacion;
		
		public function __construct() {}
		
		public function set($atributo, $valor) {
			$this -> $atributo = $valor;
		}
		
		public function get($atributo) {
			return $this -> $atributo;
		}
		
		public function __destruct() {}
	}
?>





