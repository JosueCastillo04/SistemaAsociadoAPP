<?php

    require_once 'conexion.php';
    class conexionConfig{

       

        //metodo para la conexion con la base de datos
      protected function connect(){
        $pdo = new PDO(DBMS,USER,PASS);
        return $pdo;
      }
        
    }
    




?>