<?php
    class Personas_DataAccess{
        public function __construct(){ //Constructor
            
        }
        
        public function read($pdo){
            $sql = "select * from personas";
            $sentencia = $pdo -> prepare($sql); //Prepara la consulta a ser ejecutada
            
            $sentencia -> execute(); //Ejecuta la consulta            
            
            $resultado = $sentencia -> fetchAll(); //Tomar los datos dentro de la tabla
            $personas = array();
            
            foreach($resultado as $dato){
                $objPersonas = new Personas();
                $objPersonas -> set('id', $dato['id']);
                $objPersonas -> set('nombres', $dato['nombres']);
                $objPersonas -> set('apellidos', $dato['apellidos']);
                $objPersonas -> set('edad', $dato['edad']);
                $objPersonas -> set('telefono', $dato['telefono']);
                array_push($personas, $objPersonas); //Añade un item a un arreglo
                $objPersonas -> __destruct();
            }
            
            return $personas;
        }
        
        public function readSession($pdo, $usuario, $clave){
            $sql = "select * from personas where usuario=? and clave=md5(?)"; //update personas set clave=md5(clave)
            $sentencia = $pdo -> prepare($sql); //Prepara la consulta a ser ejecutada
            
            $sentencia -> execute(array($usuario, $clave)); //Ejecuta la consulta            
            
            $resultado = $sentencia -> fetchAll(); //Tomar los datos dentro de la tabla
            $personas = array();
            
            foreach($resultado as $dato){
                $objPersonas = new Personas();
                $objPersonas -> set('id', $dato['id']);
                $objPersonas -> set('nombres', $dato['nombres']);
                $objPersonas -> set('apellidos', $dato['apellidos']);
                $objPersonas -> set('edad', $dato['edad']);
                $objPersonas -> set('telefono', $dato['telefono']);
                array_push($personas, $objPersonas); //Añade un item a un arreglo
                $objPersonas -> __destruct();
            }
            
            return $personas;
        }
        
        public function create($pdo, $objAux){
            $nombres = $objAux -> get('nombres');
            $apellidos = $objAux -> get('apellidos');
            $edad = $objAux -> get('edad');
            $telefono = $objAux -> get('telefono');
            
            $sql = "insert into personas(nombres,apellidos,edad,telefono) values (?,?,?,?)";
            $sentencia = $pdo -> prepare($sql); //Prepara la consulta a ser ejecutada
            
            $sentencia -> execute(array($nombres, $apellidos, $edad, $telefono)); //Ejecuta la consulta
        }
        
        public function __destruct(){ //Destructor: Libera la memoria destruyendo el objeto que no se está usando
            
        }
    }
?>