<?php

    require_once "../model/asociadoModel.php";
    $asociadoModel = new AsociadoModel();

        
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){

                
                echo json_encode($asociadoModel->getAll());
            
        }else{
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $fecha_nac = $_POST['fecha_nac'];
            $telefono = $_POST['telefono'];
            $dui = $_POST['dui'];
            $estado = "A";
           
    
            $input=["nombre"=>$nombre,"apellido"=>$apellido,"fecha_nac"=>$fecha_nac,"telefono"=>$telefono,"dui"=>$dui,"estado"=>$estado];
            
            if($input != null){
                if($asociadoModel->create($input)){
                
                    echo "entro";
                }else{
                    echo "Llenar";
                }
            }else{
                echo "vacio";
    
            }
        }

       

      
        
        
        
        

?>
