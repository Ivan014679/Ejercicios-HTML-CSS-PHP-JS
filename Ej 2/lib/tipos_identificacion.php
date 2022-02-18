<?php
	class tipos_identificacion {
		private $id;
		private $nombre;
		private $abreviatura;
		
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