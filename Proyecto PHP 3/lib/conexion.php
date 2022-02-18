<?php
    //Clase que hará la conexión a la base de datos
    class Conexion{
        public $pdo;
        
        public function __construct(){ //Constructor
            
        }
        
        public function abrir_conexion(){
            $host = "localhost"; //El servidor donde está alojada la base de datos
            $user = "root";
            $pass = "";
            $db = "prueba"; //Nombre de la db
            
            try{
                $this -> pdo = new PDO("mysql: host = $host; dbname = $db;", $user, $pass); //Apuntador
                echo "La conexión ha sido exitosa :3";
            }catch(Exception $e){
                die("No se ha podido establecer la conexión".$e -> getMessage());
            }
        }
        
        public function __destruct(){ //Destructor: Libera la memoria destruyendo el objeto que no se está usando
            
        }
    }
?>