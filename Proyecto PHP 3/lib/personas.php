<?php
    class Personas{
        private $id;
        private $nombres;
        private $apellidos;
        private $edad;
        private $telefono;
        
        public function __construct(){ //Constructor
            $this -> id = 0;
            $this -> nombres = "";
            $this -> apellidos = "";
            $this -> edad = 0;
            $this -> telefono = "";
        }
        
        public function set($atributo, $valor){
            $this -> $atributo = $valor;
        }
        
        public function get($atributo){
            return $this -> $atributo;
        }
        
        public function __destruct(){ //Destructor: Libera la memoria destruyendo el objeto que no se está usando
            
        }
    }
?>