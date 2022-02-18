<?php
    class Personas_DataAccess{
        public function __construct(){ //Constructor
            
        }
        
        public function read($pdo){
            try {
            $sql = "select * from personas";
            $sentencia = $pdo -> prepare($sql); //Prepara la consulta a ser ejecutada

            
            $sentencia -> execute(); //Ejecuta la consulta    

            
            
            $resultado = $sentencia -> fetchAll(); //Tomar los datos dentro de la tabla
            
            print_r($resultado);
            } catch(Exception $e) {
                echo $e -> getMessage();
                    
            }
        }
        
        public function __destruct(){ //Destructor: Libera la memoria destruyendo el objeto que no se está usando
            
        }
    }
?>